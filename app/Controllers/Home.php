<?php

namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\CategoryModel;
use App\Models\KnowledgeModel;
use App\Models\KnowledgeCategoryModel;
use App\Models\ServiceModel;

class Home extends BaseController
{
    protected $productModel;
    protected $categoryModel;
    protected $serviceModel;
    
    public function __construct()
    {
        $this->productModel = new ProductModel();
        $this->categoryModel = new CategoryModel();
        $this->KnowledgeModel = new KnowledgeModel();
        $this->KnowledgeCategoryModel = new KnowledgeCategoryModel();
        $this->serviceModel = new ServiceModel();
    }
    
    public function index()
    {
        // Chỉ lấy sản phẩm thực tế, không lấy dịch vụ
        $featuredProducts = $this->productModel->where('status', 'active')
                                           ->orderBy('id', 'DESC')
                                           ->limit(8)
                                           ->find();
        
        // Lấy dịch vụ nổi bật
        $featuredServices = $this->serviceModel->where('status', 'active')
                                          ->orderBy('id', 'ASC')
                                          ->limit(4)
                                          ->find();
        
        $categories = $this->categoryModel->findAll();
        
        // Debug: Lưu thông tin vào file log
        log_message('debug', 'Số lượng sản phẩm: ' . count($featuredProducts));
        log_message('debug', 'Số lượng dịch vụ: ' . count($featuredServices));
        log_message('debug', 'Số lượng danh mục: ' . count($categories));
        
        if (empty($featuredProducts)) {
            log_message('debug', 'Không tìm thấy sản phẩm nào. Kiểm tra truy vấn: ' . $this->productModel->getLastQuery()->getQuery());
        }
        
        $data = [
            'featuredProducts' => $featuredProducts,
            'featuredServices' => $featuredServices,
            'categories' => $categories,
        ];
        
        return view('home', $data);
    }
    
    public function about()
    {
        return view('about');
    }
    
    public function contact()
    {
        return view('contact');
    }
    
    public function submitContact()
    {
        $rules = [
            'name' => 'required|min_length[3]',
            'email' => 'required|valid_email',
            'subject' => 'required|min_length[5]',
            'message' => 'required|min_length[10]',
        ];
        
        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        
        // In a real application, you would save the message to the database
        // and/or send an email notification
        
        return redirect()->to('/contact')->with('success', 'Cảm ơn bạn đã liên hệ! Chúng tôi sẽ phản hồi sớm nhất có thể.');
    }
    
    public function faq()
    {
        return view('faq');
    }
    
    public function terms()
    {
        return view('terms');
    }
    
    public function privacy()
    {
        return view('privacy');
    }

    public function home()
    {
        return view('home', [
            'title' => 'Trang chủ',
            'featuredProducts' => $this->productModel->where('status', 'active')
                                                 ->orderBy('id', 'DESC')
                                                 ->limit(8)
                                                 ->find(),
            'categories' => $this->categoryModel->findAll(),
        ]);
    }
    
    public function help()
    {
        return view('help', [
            'title' => 'Trung Tâm Hỗ Trợ'
        ]);
    }
    
    public function knowledge()
    {
        $KnowledgeModel = new \App\Models\KnowledgeModel();
        $KnowledgeCategoryModel = new \App\Models\KnowledgeCategoryModel();
        $categoryId = $this->request->getGet('category');
        $search = $this->request->getGet('search');
        $page = $this->request->getGet('page') ?? 1;

        // Lấy bài viết nổi bật (mới nhất)
        $featuredProduct = $KnowledgeModel->where('is_hot', 1)->orderBy('created_at', 'DESC')->first();

        // Lọc danh sách bài viết (không lấy lại featured)
        $productsQuery = $KnowledgeModel->where('is_hot', 0);
        if ($categoryId) {
            $productsQuery = $productsQuery->where('category_id', $categoryId);
        }
        if ($search) {
            $productsQuery = $productsQuery->groupStart()
                ->like('title', $search)
                ->orLike('description', $search)
                ->groupEnd();
        }
        if ($featuredProduct) {
            $productsQuery = $productsQuery->where('id !=', $featuredProduct['id']);
        }
        $products = $productsQuery->orderBy('created_at', 'DESC')->paginate(6);
        $pager = $KnowledgeModel->pager;
        $categories = $KnowledgeCategoryModel->findAll();

        $data = [
            'title' => 'Kiến Thức & Hướng Dẫn',
            'featuredProduct' => $featuredProduct,
            'products' => $products,
            'pager' => $pager,
            'categories' => $categories,
            'currentCategory' => $categoryId,
            'search' => $search,
        ];
        return view('knowledge', $data);
    }
    
    public function academy()
    {
        $category = $this->categoryModel->where('name', 'Academy')->first();
        $products = $category ? $this->productModel->getByCategory($category['id']) : [];

        return view('academy', [
            'title' => 'Kho Tài Liệu',
            'products' => $products,
            'category' => $category,
            'categories' => $this->categoryModel->findAll()
        ]);
    }
    
    public function hostingManage()
    {
        return view('hosting-manage', [
            'title' => 'Quản Lý Hosting & VPS'
        ]);
    }
    
    public function invoice()
    {
        return view('invoice', [
            'title' => 'Dịch Vụ Định Kỳ & Hoá Đơn'
        ]);
    }
    
    public function courseDetail()
    {
        return view('course-detail', [
            'title' => 'Chi tiết khoá học'
        ]);
    }
    
    public function courses()
    {
        $category = $this->categoryModel->where('name', 'Online Courses')->first();
        $products = $category ? $this->productModel->getByCategory($category['id']) : [];

        return view('courses', [
            'title' => 'Khoá Học Online',
            'products' => $products,
            'category' => $category,
            'categories' => $this->categoryModel->findAll()
        ]);
    }
    
    public function warehouse()
    {
        $userId = session()->get('id');

        if (!$userId) {
            return redirect()->to('/login')->with('error', 'Vui lòng đăng nhập để xem kho sản phẩm của bạn.');
        }

        $orderItemModel = new \App\Models\OrderItemModel();
        $purchasedAccounts = $orderItemModel->getPurchasedAccountsByUserId($userId);

        return view('warehouse', [
            'title' => 'Kho Sản Phẩm Của Tôi',
            'purchasedAccounts' => $purchasedAccounts
        ]);
    }
    
    public function knowledgeCategory($category = 'hosting')
    {
        $categories = [
            'hosting' => 'Hosting & VPS',
            'domain' => 'Tên miền',
            'security' => 'Bảo mật website',
            'email' => 'Email'
        ];
        
        $category_name = $categories[$category] ?? 'Hosting & VPS';
        
        return view('knowledge-category', [
            'title' => 'Kiến Thức: ' . $category_name,
            'category_name' => $category_name
        ]);
    }
    
    public function orderHistory()
    {
        return view('order-history', [
            'title' => 'Lịch Sử Đơn Hàng'
        ]);
    }
    
    public function deposit()
    {
        return view('deposit', [
            'title' => 'Nạp Tiền & Lịch Sử Giao Dịch'
        ]);
    }
    
    public function news()
    {
        $newsModel = new \App\Models\NewsModel();
        $categoryModel = new \App\Models\NewsCategoryModel();
        $categoryId = $this->request->getGet('category');
        $search = $this->request->getGet('search');
        $page = $this->request->getGet('page') ?? 1;

        // Lấy bài viết nổi bật (is_hot = 1), nếu không có thì lấy bài mới nhất
        $featuredNews = $newsModel->where('is_hot', 1)->orderBy('created_at', 'DESC')->first();
        if (!$featuredNews) {
            $featuredNews = $newsModel->orderBy('created_at', 'DESC')->first();
        }

        // Lọc danh sách bài viết (không lấy lại featured)
        $newsQuery = $newsModel;
        if ($categoryId) {
            $newsQuery = $newsQuery->where('category_id', $categoryId);
        }
        if ($search) {
            $newsQuery = $newsQuery->groupStart()
                ->like('title', $search)
                ->orLike('content', $search)
                ->groupEnd();
        }
        if ($featuredNews) {
            $newsQuery = $newsQuery->where('id !=', $featuredNews['id']);
        }
        $data['news'] = $newsQuery->orderBy('created_at', 'DESC')->paginate(6);
        $data['pager'] = $newsModel->pager;
        $data['categories'] = $categoryModel->findAll();
        $data['currentCategory'] = $categoryId;
        $data['search'] = $search;
        $data['featuredNews'] = $featuredNews;
        $data['title'] = 'Blog & Tin Tức';
        return view('news', $data);
    }
    
    public function newsDetail($id)
    {
        $newsModel = new \App\Models\NewsModel();
        $categoryModel = new \App\Models\NewsCategoryModel();
        
        $news = $newsModel->find($id);
        if (!$news) {
            return redirect()->to('/news')->with('error', 'Không tìm thấy bài viết.');
        }
        
        $category = $categoryModel->find($news['category_id']);
        $relatedNews = $newsModel->where('category_id', $news['category_id'])
                                 ->where('id !=', $id)
                                 ->limit(3)
                                 ->find();
        
        $data = [
            'news' => $news,
            'category' => $category,
            'relatedNews' => $relatedNews,
            'title' => $news['title']
        ];
        
        return view('news-detail', $data);
    }
    
    public function knowledgeDetail($id)
    {
        $knowledgeModel = new \App\Models\KnowledgeModel();
        $categoryModel = new \App\Models\KnowledgeCategoryModel();
        
        $knowledge = $knowledgeModel->find($id);
        if (!$knowledge) {
            return redirect()->to('/knowledge')->with('error', 'Không tìm thấy bài viết.');
        }
        
        $category = $categoryModel->find($knowledge['category_id']);
        $relatedKnowledge = $knowledgeModel->where('category_id', $knowledge['category_id'])
                                          ->where('id !=', $id)
                                          ->limit(3)
                                          ->find();
        
        $data = [
            'knowledge' => $knowledge,
            'category' => $category,
            'relatedKnowledge' => $relatedKnowledge,
            'title' => $knowledge['title']
        ];
        
        return view('knowledge-detail', $data);
    }
    
    public function product()
    {
        return view('product', [
            'title' => 'Cửa hàng sản phẩm'
        ]);
    }
    
    public function generalService()
    {
        return view('service', [
            'title' => 'Đặt Hàng Dịch Vụ'
        ]);
    }
    
    public function userProfile()
    {
        return view('user-profile', [
            'title' => 'Thông Tin Cá Nhân'
        ]);
    }
    
    public function vpsManage($id = null)
    {
        return view('vps-manage', [
            'title' => 'Quản Lý Chi Tiết VPS - vps-main-server',
            'id' => $id
        ]);
    }
    
    public function webDemo()
    {
        // Define web demo categories
        $demoCategoryNames = [
            'Doanh nghiệp', 'Bán hàng', 'Nhà hàng', 'Blog', 
            'Portfolio', 'Landing Page', 'Bất động sản'
        ];

        // Fetch category IDs
        $demoCategories = $this->categoryModel->whereIn('name', $demoCategoryNames)->findAll();
        $categoryIds = array_column($demoCategories, 'id');

        // Fetch products (templates)
        $products = $this->productModel->whereIn('category_id', $categoryIds)
                                       ->where('status', 'active')
                                       ->orderBy('is_featured', 'DESC')
                                       ->findAll();

        // Find the first featured product
        $featuredProduct = null;
        foreach ($products as $product) {
            if ($product['is_featured']) {
                $featuredProduct = $product;
                break;
            }
        }
        
        $data = [
            'title' => 'Kho Giao Diện Mẫu',
            'categories' => $demoCategories,
            'products' => $products,
            'featuredProduct' => $featuredProduct,
        ];
        
        return view('web-demo', $data);
    }
}
