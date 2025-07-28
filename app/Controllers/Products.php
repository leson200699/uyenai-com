<?php

namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\CategoryModel;

class Products extends BaseController
{
    protected $productModel;
    protected $categoryModel;
    
    public function __construct()
    {
        $this->productModel = new ProductModel();
        $this->categoryModel = new CategoryModel();
    }
    
    public function index()
    {
        $data = [
            'categories' => $this->categoryModel->findAll(),
            'products' => $this->productModel->getActiveProducts(),
        ];
        
        return view('products/index', $data);
    }
    
    /**
     * Hiển thị danh sách sản phẩm theo danh mục
     */
    public function category($categoryId)
    {
        $category = $this->categoryModel->find($categoryId);
        
        if (!$category) {
            return redirect()->to('products')->with('error', 'Không tìm thấy danh mục');
        }
        
        $products = $this->productModel->getByCategory($categoryId);
        
        $data = [
            'title' => $category['name'],
            'products' => $products,
            'category' => $category,
            'categories' => $this->categoryModel->findAll()
        ];
        
        return view('products/category', $data);
    }
    
    /**
     * Hiển thị danh sách tài khoản AI
     */
    public function aiAccounts()
    {
        // Tìm danh mục "Tài khoản AI"
        $category = $this->categoryModel->where('name', 'Tài khoản AI')->first();
        
        if (!$category) {
            // Nếu không tìm thấy danh mục, tạo mới
            $categoryId = $this->categoryModel->insert([
                'name' => 'Tài khoản AI',
                'description' => 'Các tài khoản AI chính hãng: ChatGPT, Gemini, Midjourney, Claude và nhiều loại khác'
            ]);
            $category = $this->categoryModel->find($categoryId);
        }
        
        // Lấy sản phẩm từ danh mục
        $products = $this->productModel->getByCategory($category['id']);
        
        // Nếu không có sản phẩm, tạo dữ liệu mẫu
        if (empty($products)) {
            $products = [
                [
                    'id' => 'gpt',
                    'name' => 'ChatGPT Plus',
                    'description' => 'Truy cập GPT-4, DALL-E 3, Advanced Data Analysis và các tính năng cao cấp khác.',
                    'price' => 499000,
                    'image' => 'https://placehold.co/300x300/4f46e5/ffffff?text=GPT',
                    'stock' => 15,
                    'status' => 'active'
                ],
                [
                    'id' => 'gemini',
                    'name' => 'Gemini Advanced',
                    'description' => 'Sức mạnh của mô hình Gemini 1.5 Pro, tích hợp trong Google Apps.',
                    'price' => 480000,
                    'image' => 'https://placehold.co/300x300/0ea5e9/ffffff?text=GEMINI',
                    'stock' => 10,
                    'status' => 'active'
                ],
                [
                    'id' => 'midjourney',
                    'name' => 'Midjourney',
                    'description' => 'Công cụ tạo ảnh bằng AI hàng đầu thế giới, sáng tạo không giới hạn.',
                    'price' => 550000,
                    'image' => 'https://placehold.co/300x300/10b981/ffffff?text=MID',
                    'stock' => 8,
                    'status' => 'active'
                ],
                [
                    'id' => 'canva',
                    'name' => 'Canva Pro',
                    'description' => 'Thiết kế mọi thứ với bộ công cụ Pro và kho tài nguyên khổng lồ.',
                    'price' => 250000,
                    'image' => 'https://placehold.co/300x300/ef4444/ffffff?text=CANVA',
                    'stock' => 20,
                    'status' => 'active'
                ]
            ];
        }
        
        $data = [
            'title' => 'Tài Khoản AI',
            'products' => $products,
            'category' => $category
        ];
        
        return view('products/ai_accounts', $data);
    }
    
    public function view($id)
    {
        $product = $this->productModel->getWithCategory($id);
        
        if (!$product || $product['status'] != 'active') {
            return redirect()->to('/products')->with('error', 'Sản phẩm không tồn tại hoặc đã ngừng kinh doanh');
        }
        
        $data = [
            'product' => $product,
            'relatedProducts' => $this->productModel->where('category_id', $product['category_id'])
                                                 ->where('id !=', $product['id'])
                                                 ->where('status', 'active')
                                                 ->orderBy('RAND()')
                                                 ->limit(4)
                                                 ->find(),
        ];
        
        return view('products/view', $data);
    }
    
    public function search()
    {
        $keyword = $this->request->getGet('keyword');
        
        if (empty($keyword)) {
            return redirect()->to('/products');
        }
        
        $data = [
            'keyword' => $keyword,
            'categories' => $this->categoryModel->findAll(),
            'products' => $this->productModel->like('name', $keyword)
                                          ->orLike('description', $keyword)
                                          ->where('status', 'active')
                                          ->findAll(),
        ];
        
        return view('products/search', $data);
    }
    
    // Admin methods are now in Admin/Products controller
} 