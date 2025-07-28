<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\CategoryModel;

class Categories extends BaseController
{
    protected $categoryModel;
    
    public function __construct()
    {
        $this->categoryModel = new CategoryModel();
    }
    
    public function index()
    {
        $data = [
            'categories' => $this->categoryModel->findAll(),
        ];
        
        return view('admin/categories/index', $data);
    }
    
    public function create()
    {
        return view('admin/categories/create');
    }
    
    public function store()
    {
        $rules = [
            'name' => 'required|min_length[3]',
            'description' => 'required',
        ];
        
        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        
        $data = [
            'name' => $this->request->getPost('name'),
            'description' => $this->request->getPost('description'),
        ];
        
        $this->categoryModel->insert($data);
        
        return redirect()->to('/admin/categories')->with('success', 'Danh mục đã được tạo thành công');
    }
    
    public function edit($id)
    {
        $category = $this->categoryModel->find($id);
        
        if (!$category) {
            return redirect()->to('/admin/categories')->with('error', 'Danh mục không tồn tại');
        }
        
        $data = [
            'category' => $category,
        ];
        
        return view('admin/categories/edit', $data);
    }
    
    public function update($id)
    {
        $category = $this->categoryModel->find($id);
        
        if (!$category) {
            return redirect()->to('/admin/categories')->with('error', 'Danh mục không tồn tại');
        }
        
        $rules = [
            'name' => 'required|min_length[3]',
            'description' => 'required',
        ];
        
        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        
        $data = [
            'name' => $this->request->getPost('name'),
            'description' => $this->request->getPost('description'),
        ];
        
        $this->categoryModel->update($id, $data);
        
        return redirect()->to('/admin/categories')->with('success', 'Danh mục đã được cập nhật thành công');
    }
    
    public function delete($id)
    {
        $category = $this->categoryModel->find($id);
        
        if (!$category) {
            return redirect()->to('/admin/categories')->with('error', 'Danh mục không tồn tại');
        }
        
        // Check if there are any products in this category
        $db = \Config\Database::connect();
        $productCount = $db->table('products')
                         ->where('category_id', $id)
                         ->countAllResults();
        
        if ($productCount > 0) {
            return redirect()->to('/admin/categories')->with('error', 'Không thể xóa danh mục này vì có ' . $productCount . ' sản phẩm trong danh mục');
        }
        
        $this->categoryModel->delete($id);
        
        return redirect()->to('/admin/categories')->with('success', 'Danh mục đã được xóa thành công');
    }
} 