<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\KnowledgeModel;
use App\Models\KnowledgeCategoryModel;

class Knowledge extends BaseController
{
    protected $knowledgeModel;
    protected $knowledgeCategoryModel;

    public function __construct()
    {
        $this->knowledgeModel = new KnowledgeModel();
        $this->knowledgeCategoryModel = new KnowledgeCategoryModel();
    }

    public function index()
    {
        $data['knowledge'] = $this->knowledgeModel->findAll();
        $data['categories'] = $this->knowledgeCategoryModel->findAll();
        return view('admin/knowledge/index', $data);
    }

    public function create()
    {
        $data['categories'] = $this->knowledgeCategoryModel->findAll();
        return view('admin/knowledge/create', $data);
    }

    public function store()
    {
        $rules = [
            'title' => 'required|min_length[3]',
            'content' => 'required|min_length[10]',
            'category_id' => 'required|integer',
        ];
        
        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Get image path from file manager
        $imagePath = $this->request->getPost('image_path') ?: null;

        $this->knowledgeModel->save([
            'title' => $this->request->getPost('title'),
            'content' => $this->request->getPost('content'),
            'category_id' => $this->request->getPost('category_id'),
            'is_hot' => $this->request->getPost('is_hot') ? true : false,
            'image' => $imagePath,
        ]);
        
        return redirect()->to('/admin/knowledge')->with('success', 'Bài viết kiến thức đã được tạo thành công');
    }

    public function edit($id)
    {
        $knowledge = $this->knowledgeModel->find($id);
        
        if (!$knowledge) {
            return redirect()->to('/admin/knowledge')->with('error', 'Bài viết không tồn tại');
        }
        
        $data['knowledge'] = $knowledge;
        $data['categories'] = $this->knowledgeCategoryModel->findAll();
        return view('admin/knowledge/edit', $data);
    }

    public function update($id)
    {
        $rules = [
            'title' => 'required|min_length[3]',
            'content' => 'required|min_length[10]',
            'category_id' => 'required|integer',
        ];
        
        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $knowledge = $this->knowledgeModel->find($id);
        if (!$knowledge) {
            return redirect()->to('/admin/knowledge')->with('error', 'Bài viết không tồn tại');
        }

        // Get image path from file manager
        $imagePath = $this->request->getPost('image_path') ?: null;
        
        // If image path is different from current, delete old image
        if ($knowledge['image'] && $imagePath !== $knowledge['image'] && file_exists(WRITEPATH . '../public' . $knowledge['image'])) {
            unlink(WRITEPATH . '../public' . $knowledge['image']);
        }

        $this->knowledgeModel->update($id, [
            'title' => $this->request->getPost('title'),
            'content' => $this->request->getPost('content'),
            'category_id' => $this->request->getPost('category_id'),
            'is_hot' => $this->request->getPost('is_hot') ? true : false,
            'image' => $imagePath,
        ]);
        
        return redirect()->to('/admin/knowledge')->with('success', 'Bài viết kiến thức đã được cập nhật thành công');
    }

    public function delete($id)
    {
        $knowledge = $this->knowledgeModel->find($id);
        if (!$knowledge) {
            return redirect()->to('/admin/knowledge')->with('error', 'Bài viết không tồn tại');
        }

        // Delete image if exists
        if ($knowledge['image'] && file_exists(WRITEPATH . '../public' . $knowledge['image'])) {
            unlink(WRITEPATH . '../public' . $knowledge['image']);
        }

        $this->knowledgeModel->delete($id);
        return redirect()->to('/admin/knowledge')->with('success', 'Bài viết kiến thức đã được xóa thành công');
    }
} 