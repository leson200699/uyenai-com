<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
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
            'products' => $this->productModel->findAll(),
        ];
        
        return view('admin/products/index', $data);
    }
    
    public function create()
    {
        $data = [
            'categories' => $this->categoryModel->findAll(),
        ];
        
        return view('admin/products/create', $data);
    }
    
    public function store()
    {
        $rules = [
            'name' => 'required|min_length[3]',
            'description' => 'required',
            'price' => 'required|numeric',
            'category_id' => 'required|integer',
            'stock' => 'permit_empty|integer',
        ];
        
        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        
        $categoryId = $this->request->getPost('category_id');
        $category = $this->categoryModel->find($categoryId);
        $isAccountProduct = ($category && $category['name'] === 'Tài khoản AI');
        
        $accountInstancesRaw = $this->request->getPost('account_instances');
        $instancesToAdd = [];
        $stock = $this->request->getPost('stock');

        if ($isAccountProduct && !empty($accountInstancesRaw)) {
            $lines = explode("\n", trim($accountInstancesRaw));
            foreach ($lines as $line) {
                $trimmedLine = trim($line);
                if (!empty($trimmedLine)) {
                    $decoded = json_decode($trimmedLine, true);
                    if (json_last_error() === JSON_ERROR_NONE) {
                        $instancesToAdd[] = ['instance_data' => $trimmedLine];
                    } else {
                        return redirect()->back()->withInput()->with('error', 'Dữ liệu tài khoản không hợp lệ: ' . $trimmedLine);
                    }
                }
            }
            $stock = count($instancesToAdd);
        }

        $image = $this->request->getFile('image');
        $imageName = 'default.jpg';
        
        if ($image && $image->isValid() && !$image->hasMoved()) {
            $newName = $image->getRandomName();
            $image->move(ROOTPATH . 'public/uploads/products', $newName);
            $imageName = $newName;
        }
        
        $data = [
            'name' => $this->request->getPost('name'),
            'description' => $this->request->getPost('description'),
            'price' => $this->request->getPost('price'),
            'image' => $imageName,
            'category_id' => $categoryId,
            'stock' => $stock,
            'status' => $this->request->getPost('status') ?? 'active',
        ];
        
        $productId = $this->productModel->insert($data);

        if ($isAccountProduct && !empty($instancesToAdd)) {
            $productInstanceModel = new \App\Models\ProductInstanceModel();
            foreach ($instancesToAdd as $instanceData) {
                $productInstanceModel->insert([
                    'product_id' => $productId,
                    'instance_data' => $instanceData['instance_data'],
                    'status' => 'available'
                ]);
            }
        }
        
        return redirect()->to('/admin/products')->with('success', 'Sản phẩm đã được tạo thành công');
    }
    
    public function edit($id)
    {
        $product = $this->productModel->find($id);
        
        if (!$product) {
            return redirect()->to('/admin/products')->with('error', 'Sản phẩm không tồn tại');
        }
        
        $data = [
            'product' => $product,
            'categories' => $this->categoryModel->findAll(),
        ];
        
        return view('admin/products/edit', $data);
    }
    
    public function update($id)
    {
        $rules = [
            'name' => 'required|min_length[3]',
            'description' => 'required',
            'price' => 'required|numeric',
            'category_id' => 'required|integer',
            'stock' => 'permit_empty|integer',
        ];
        
        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $product = $this->productModel->find($id);
        if (!$product) {
            return redirect()->to('/admin/products')->with('error', 'Sản phẩm không tồn tại.');
        }
        
        $categoryId = $this->request->getPost('category_id');
        $category = $this->categoryModel->find($categoryId);
        $isAccountProduct = ($category && $category['name'] === 'Tài khoản AI');
        
        $accountInstancesRaw = $this->request->getPost('account_instances');
        $instancesToAdd = [];
        $stock = $this->request->getPost('stock');

        if ($isAccountProduct && !empty($accountInstancesRaw)) {
            $lines = explode("\n", trim($accountInstancesRaw));
            foreach ($lines as $line) {
                $trimmedLine = trim($line);
                if (!empty($trimmedLine)) {
                    $decoded = json_decode($trimmedLine, true);
                    if (json_last_error() === JSON_ERROR_NONE) {
                        $instancesToAdd[] = ['instance_data' => $trimmedLine];
                    } else {
                        return redirect()->back()->withInput()->with('error', 'Dữ liệu tài khoản không hợp lệ: ' . $trimmedLine);
                    }
                }
            }
            $stock = $product['stock'] + count($instancesToAdd);
        }
        
        $data = [
            'name' => $this->request->getPost('name'),
            'description' => $this->request->getPost('description'),
            'price' => $this->request->getPost('price'),
            'category_id' => $categoryId,
            'stock' => $stock,
            'status' => $this->request->getPost('status'),
        ];
        
        $image = $this->request->getFile('image');
        if ($image && $image->isValid() && !$image->hasMoved()) {
            $newName = $image->getRandomName();
            $image->move(ROOTPATH . 'public/uploads/products', $newName);
            $data['image'] = $newName;
        }
        
        $this->productModel->update($id, $data);

        if ($isAccountProduct && !empty($instancesToAdd)) {
            $productInstanceModel = new \App\Models\ProductInstanceModel();
            foreach ($instancesToAdd as $instanceData) {
                $productInstanceModel->insert([
                    'product_id' => $id,
                    'instance_data' => $instanceData['instance_data'],
                    'status' => 'available'
                ]);
            }
        }
        
        return redirect()->to('/admin/products')->with('success', 'Sản phẩm đã được cập nhật thành công');
    }
    
    public function delete($id)
    {
        $product = $this->productModel->find($id);
        
        if (!$product) {
            return redirect()->to('/admin/products')->with('error', 'Sản phẩm không tồn tại');
        }
        
        $this->productModel->delete($id);
        
        return redirect()->to('/admin/products')->with('success', 'Sản phẩm đã được xóa thành công');
    }
} 