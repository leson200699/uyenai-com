<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\KnowledgeCategoryModel;

class KnowledgeCategories extends BaseController
{
    protected $knowledgeCategoryModel;

    public function __construct()
    {
        $this->knowledgeCategoryModel = new KnowledgeCategoryModel();
    }

    public function index()
    {
        $data['categories'] = $this->knowledgeCategoryModel->findAll();
        return view('admin/knowledge/categories/index', $data);
    }

    public function create()
    {
        return view('admin/knowledge/categories/create');
    }

    public function store()
    {
        $rules = [
            'name' => 'required|min_length[3]',
        ];
        
        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->knowledgeCategoryModel->save([
            'name' => $this->request->getPost('name'),
        ]);
        
        return redirect()->to('/admin/knowledge/categories')->with('success', 'Danh mục kiến thức đã được tạo thành công');
    }

    public function edit($id)
    {
        $category = $this->knowledgeCategoryModel->find($id);
        
        if (!$category) {
            return redirect()->to('/admin/knowledge/categories')->with('error', 'Danh mục không tồn tại');
        }
        
        $data['category'] = $category;
        return view('admin/knowledge/categories/edit', $data);
    }

    public function update($id)
    {
        $rules = [
            'name' => 'required|min_length[3]',
        ];
        
        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->knowledgeCategoryModel->update($id, [
            'name' => $this->request->getPost('name'),
        ]);
        
        return redirect()->to('/admin/knowledge/categories')->with('success', 'Danh mục kiến thức đã được cập nhật thành công');
    }

    public function delete($id)
    {
        // Check if category has knowledge posts
        $knowledgeModel = new \App\Models\KnowledgeModel();
        $knowledgeCount = $knowledgeModel->where('category_id', $id)->countAllResults();
        
        if ($knowledgeCount > 0) {
            return redirect()->to('/admin/knowledge/categories')->with('error', 'Không thể xóa danh mục này vì vẫn còn bài viết kiến thức thuộc danh mục');
        }
        
        $this->knowledgeCategoryModel->delete($id);
        return redirect()->to('/admin/knowledge/categories')->with('success', 'Danh mục kiến thức đã được xóa thành công');
    }
} 