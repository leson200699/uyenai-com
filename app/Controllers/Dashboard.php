<?php

namespace App\Controllers;

use App\Models\OrderModel;
use App\Models\TransactionModel;
use App\Models\UserModel;

class Dashboard extends BaseController
{
    protected $orderModel;
    protected $transactionModel;
    protected $userModel;
    
    public function __construct()
    {
        $this->orderModel = new OrderModel();
        $this->transactionModel = new TransactionModel();
        $this->userModel = new UserModel();
    }
    
    public function index()
    {
        // Check if user is logged in
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }
        
        $userId = session()->get('id');
        
        // Get recent orders
        $recentOrders = $this->orderModel->getUserOrders($userId, 5);
        
        // Get recent transactions
        $recentTransactions = $this->transactionModel->getUserTransactions($userId, 5);
        
        $data = [
            'recentOrders' => $recentOrders,
            'recentTransactions' => $recentTransactions,
        ];
        
        return view('dashboard/index', $data);
    }
    
    public function deposit()
    {
        // Check if user is logged in
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }
        
        return view('dashboard/deposit');
    }
    
    public function processDeposit()
    {
        // Check if user is logged in
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }
        
        $userId = session()->get('id');
        $amount = (float)$this->request->getPost('amount');
        $paymentMethod = $this->request->getPost('payment_method');
        
        // Validate amount
        if ($amount <= 0) {
            return redirect()->back()->with('error', 'Số tiền nạp phải lớn hơn 0');
        }
        
        // In a real application, you would integrate with payment gateways here
        // For now, we'll just create a successful transaction record
        
        $reference = 'Payment via ' . $paymentMethod . ' at ' . date('Y-m-d H:i:s');
        
        $result = $this->transactionModel->createDeposit($userId, $amount, $reference);
        
        if (is_array($result) && isset($result['error'])) {
            return redirect()->back()->with('error', $result['error']);
        }
        
        // Update session balance
        $user = $this->userModel->find($userId);
        session()->set('balance', $user['balance']);
        
        return redirect()->to('/dashboard')->with('success', 'Nạp tiền thành công! Số dư tài khoản của bạn đã được cập nhật.');
    }
    
    public function transactions()
    {
        // Check if user is logged in
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }
        
        $userId = session()->get('id');
        
        $data = [
            'transactions' => $this->transactionModel->getUserTransactions($userId, 20),
        ];
        
        return view('dashboard/transactions', $data);
    }
    
    // Admin Dashboard
    
    public function adminIndex()
    {
        // Check if user is admin
        if (session()->get('role') != 'admin') {
            return redirect()->to('/dashboard');
        }
        
        // Get stats
        $totalUsers = $this->userModel->where('role', 'user')->countAllResults();
        $totalOrders = $this->orderModel->countAllResults();
        $completedOrders = $this->orderModel->where('status', 'completed')->countAllResults();
        $totalRevenue = $this->orderModel->selectSum('total_amount')->where('status', 'completed')->first()['total_amount'] ?? 0;
        
        // Get recent orders
        $recentOrders = $this->orderModel->orderBy('created_at', 'DESC')->findAll(10);
        
        $data = [
            'totalUsers' => $totalUsers,
            'totalOrders' => $totalOrders,
            'completedOrders' => $completedOrders,
            'totalRevenue' => $totalRevenue,
            'recentOrders' => $recentOrders,
        ];
        
        return view('admin/dashboard', $data);
    }
} 