<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\NewsCategoryModel;

class NewsCategories extends BaseController
{
    protected $newsCategoryModel;

    public function __construct()
    {
        $this->newsCategoryModel = new NewsCategoryModel();
    }

    public function index()
    {
        $data['categories'] = $this->newsCategoryModel->findAll();
        return view('admin/news/categories/index', $data);
    }

    public function create()
    {
        return view('admin/news/categories/create');
    }

    public function store()
    {
        $this->newsCategoryModel->save([
            'name' => $this->request->getPost('name'),
        ]);
        return redirect()->to('/admin/news/categories');
    }

    public function edit($id)
    {
        $data['category'] = $this->newsCategoryModel->find($id);
        return view('admin/news/categories/edit', $data);
    }

    public function update($id)
    {
        $this->newsCategoryModel->update($id, [
            'name' => $this->request->getPost('name'),
        ]);
        return redirect()->to('/admin/news/categories');
    }

    public function delete($id)
    {
        $this->newsCategoryModel->delete($id);
        return redirect()->to('/admin/news/categories');
    }
}
