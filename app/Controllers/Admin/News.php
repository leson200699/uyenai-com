<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\NewsModel;
use App\Models\NewsCategoryModel;

class News extends BaseController
{
    protected $newsModel;
    protected $newsCategoryModel;

    public function __construct()
    {
        $this->newsModel = new NewsModel();
        $this->newsCategoryModel = new NewsCategoryModel();
    }

    public function index()
    {
        $search = $this->request->getGet('search');
        $category = $this->request->getGet('category');
        $status = $this->request->getGet('status');
        
        $query = $this->newsModel->select('news.*, news_categories.name as category_name')
                                ->join('news_categories', 'news_categories.id = news.category_id', 'left');
        
        if ($search) {
            $query->like('news.title', $search);
        }
        
        if ($category) {
            $query->where('news.category_id', $category);
        }
        
        if ($status !== '' && $status !== null) {
            $query->where('news.is_hot', $status);
        }
        
        $data = [
            'news' => $query->orderBy('news.created_at', 'DESC')->findAll(),
            'categories' => $this->newsCategoryModel->findAll(),
            'search' => $search,
            'currentCategory' => $category,
            'currentStatus' => $status
        ];
        
        return view('admin/news/index', $data);
    }

    public function create()
    {
        $data['categories'] = $this->newsCategoryModel->findAll();
        return view('admin/news/create', $data);
    }

    public function store()
    {
        $rules = [
            'title' => 'required|min_length[5]|max_length[255]',
            'content' => 'required|min_length[10]',
            'category_id' => 'required|numeric',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Get image path from file manager
        $imagePath = $this->request->getPost('image_path') ?: null;
        
        $this->newsModel->save([
            'title' => $this->request->getPost('title'),
            'content' => $this->request->getPost('content'),
            'category_id' => $this->request->getPost('category_id'),
            'is_hot' => $this->request->getPost('is_hot') ? true : false,
            'image' => $imagePath,
        ]);
        return redirect()->to('/admin/news')->with('success', 'Tin tức đã được tạo thành công');
    }

    public function edit($id)
    {
        $data['news'] = $this->newsModel->find($id);
        $data['categories'] = $this->newsCategoryModel->findAll();
        return view('admin/news/edit', $data);
    }

    public function update($id)
    {
        $rules = [
            'title' => 'required|min_length[5]|max_length[255]',
            'content' => 'required|min_length[10]',
            'category_id' => 'required|numeric',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $news = $this->newsModel->find($id);
        if (!$news) {
            return redirect()->to('/admin/news')->with('error', 'Tin tức không tồn tại');
        }

        // Get image path from file manager
        $imagePath = $this->request->getPost('image_path') ?: null;

        // If image path is different from current, delete old image
        if ($news['image'] && $imagePath !== $news['image'] && file_exists(WRITEPATH . '../public' . $news['image'])) {
            unlink(WRITEPATH . '../public' . $news['image']);
        }
        
        $this->newsModel->update($id, [
            'title' => $this->request->getPost('title'),
            'content' => $this->request->getPost('content'),
            'category_id' => $this->request->getPost('category_id'),
            'is_hot' => $this->request->getPost('is_hot') ? true : false,
            'image' => $imagePath,
        ]);
        return redirect()->to('/admin/news')->with('success', 'Tin tức đã được cập nhật thành công');
    }

    public function delete($id)
    {
        $news = $this->newsModel->find($id);
        if (!$news) {
            return redirect()->to('/admin/news')->with('error', 'Tin tức không tồn tại');
        }

        if ($news['image'] && file_exists(WRITEPATH . '../public' . $news['image'])) {
            unlink(WRITEPATH . '../public' . $news['image']);
        }
        $this->newsModel->delete($id);
        return redirect()->to('/admin/news')->with('success', 'Tin tức đã được xóa thành công');
    }
}
