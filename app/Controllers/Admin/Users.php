<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Users extends BaseController
{
    protected $userModel;
    
    public function __construct()
    {
        $this->userModel = new UserModel();
    }
    
    public function index()
    {
        $data = [
            'users' => $this->userModel->findAll(),
        ];
        
        return view('admin/users/index', $data);
    }
    
    public function view($id)
    {
        $user = $this->userModel->find($id);
        
        if (!$user) {
            return redirect()->to('/admin/users')->with('error', 'Người dùng không tồn tại');
        }
        
        $data = [
            'user' => $user,
        ];
        
        return view('admin/users/view', $data);
    }
    
    public function create()
    {
        return view('admin/users/create');
    }
    
    public function store()
    {
        $rules = [
            'name' => 'required|min_length[3]',
            'email' => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[8]',
            'password_confirm' => 'required|matches[password]',
            'role' => 'required|in_list[admin,user]',
        ];
        
        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        
        $data = [
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'balance' => (float)$this->request->getPost('balance') ?: 0,
            'role' => $this->request->getPost('role'),
        ];
        
        $this->userModel->insert($data);
        
        return redirect()->to('/admin/users')->with('success', 'Người dùng đã được tạo thành công');
    }
    
    public function edit($id)
    {
        $user = $this->userModel->find($id);
        
        if (!$user) {
            return redirect()->to('/admin/users')->with('error', 'Người dùng không tồn tại');
        }
        
        $data = [
            'user' => $user,
        ];
        
        return view('admin/users/edit', $data);
    }
    
    public function update($id)
    {
        $user = $this->userModel->find($id);
        
        if (!$user) {
            return redirect()->to('/admin/users')->with('error', 'Người dùng không tồn tại');
        }
        
        $rules = [
            'name' => 'required|min_length[3]',
            'email' => "required|valid_email|is_unique[users.email,id,$id]",
            'role' => 'required|in_list[admin,user]',
        ];
        
        // Only validate password if it's provided
        $password = $this->request->getPost('password');
        if (!empty($password)) {
            $rules['password'] = 'required|min_length[8]';
            $rules['password_confirm'] = 'required|matches[password]';
        }
        
        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        
        $data = [
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'balance' => (float)$this->request->getPost('balance'),
            'role' => $this->request->getPost('role'),
        ];
        
        // Only update password if it's provided
        if (!empty($password)) {
            $data['password'] = password_hash($password, PASSWORD_DEFAULT);
        }
        
        $this->userModel->update($id, $data);
        
        return redirect()->to('/admin/users')->with('success', 'Người dùng đã được cập nhật thành công');
    }
    
    public function delete($id)
    {
        // Don't allow deletion of self
        if ($id == session()->get('id')) {
            return redirect()->to('/admin/users')->with('error', 'Bạn không thể xóa tài khoản đang đăng nhập');
        }
        
        $user = $this->userModel->find($id);
        
        if (!$user) {
            return redirect()->to('/admin/users')->with('error', 'Người dùng không tồn tại');
        }
        
        $this->userModel->delete($id);
        
        return redirect()->to('/admin/users')->with('success', 'Người dùng đã được xóa thành công');
    }
} 