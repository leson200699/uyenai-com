<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    protected $userModel;
    
    public function __construct()
    {
        $this->userModel = new UserModel();
    }
    
    public function index()
    {
        // If user is already logged in, redirect to dashboard
        if (session()->get('isLoggedIn')) {
            return redirect()->to('/dashboard');
        }
        
        return view('auth/login');
    }
    
    public function login()
    {
        // If user is already logged in, redirect to dashboard
        if (session()->get('isLoggedIn')) {
            return redirect()->to('/dashboard');
        }
        
        return view('auth/login');
    }
    
    public function processLogin()
    {
        $rules = [
            'email' => 'required|valid_email',
            'password' => 'required|min_length[8]',
        ];
        
        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        
        $user = $this->userModel->where('email', $email)->first();
        
        if (!$user) {
            return redirect()->back()->withInput()->with('error', 'Email hoặc mật khẩu không chính xác.');
        }
        
        if (!$this->userModel->verifyPassword($password, $user['password'])) {
            return redirect()->back()->withInput()->with('error', 'Email hoặc mật khẩu không chính xác.');
        }
        
        // Set session data
        session()->set([
            'id' => $user['id'],
            'name' => $user['name'],
            'email' => $user['email'],
            'balance' => $user['balance'],
            'role' => $user['role'],
            'isLoggedIn' => true,
        ]);
        
        // Redirect based on role
        if ($user['role'] == 'admin') {
            return redirect()->to('/admin/dashboard');
        } else {
            return redirect()->to('/dashboard');
        }
    }
    
    public function register()
    {
        // If user is already logged in, redirect to dashboard
        if (session()->get('isLoggedIn')) {
            return redirect()->to('/dashboard');
        }
        
        return view('auth/register');
    }
    
    public function processRegister()
    {
        $rules = [
            'name' => 'required|min_length[3]',
            'email' => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[8]',
            'password_confirm' => 'required|matches[password]',
        ];
        
        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        
        $data = [
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'balance' => 0.00,
            'role' => 'user',
        ];
        
        $this->userModel->insert($data);
        
        return redirect()->to('/login')->with('success', 'Đăng ký tài khoản thành công! Vui lòng đăng nhập.');
    }
    
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }

    public function profile()
    {
        // Check if user is logged in
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }
        
        $userId = session()->get('id');
        $user = $this->userModel->find($userId);
        
        if (!$user) {
            return redirect()->to('/login');
        }
        
        return view('auth/profile', ['user' => $user]);
    }

    public function updateProfile()
    {
        // Check if user is logged in
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }
        
        $userId = session()->get('id');
        
        $rules = [
            'name' => 'required|min_length[3]',
            'email' => "required|valid_email|is_unique[users.email,id,$userId]",
        ];
        
        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        
        $data = [
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
        ];
        
        // Update password if provided
        $password = $this->request->getPost('password');
        if ($password && !empty($password)) {
            if (strlen($password) < 8) {
                return redirect()->back()->withInput()->with('error', 'Mật khẩu phải có ít nhất 8 ký tự');
            }
            
            $data['password'] = password_hash($password, PASSWORD_DEFAULT);
        }
        
        $this->userModel->update($userId, $data);
        
        // Update session data
        session()->set([
            'name' => $data['name'],
            'email' => $data['email'],
        ]);
        
        return redirect()->to('/profile')->with('success', 'Thông tin cá nhân đã được cập nhật.');
    }
} 