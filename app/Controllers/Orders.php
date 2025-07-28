<?php

namespace App\Controllers;

use App\Models\OrderModel;
use App\Models\ProductModel;
use App\Models\UserModel;
use App\Models\CartModel;
use CodeIgniter\Controller;

class Orders extends BaseController
{
    protected $session;
    protected $orderModel;
    protected $productModel;
    protected $userModel;
    protected $cartModel;
    
    public function __construct()
    {
        $this->session = session();
        $this->orderModel = new OrderModel();
        $this->productModel = new ProductModel();
        $this->userModel = new UserModel();
        $this->cartModel = new CartModel();
        $this->db = \Config\Database::connect();
    }
    
    public function index()
    {
        $userId = session()->get('id');
        
        if (!$userId) {
            return redirect()->to('login')->with('error', 'Vui lòng đăng nhập để xem đơn hàng');
        }
        
        $orders = $this->orderModel->where('user_id', $userId)
                                  ->orderBy('created_at', 'DESC')
                                  ->findAll();
                                  
        // Lấy thêm thông tin chi tiết cho mỗi đơn hàng
        $orderItemModel = new \App\Models\OrderItemModel();
        
        foreach ($orders as &$order) {
            // Lấy danh sách sản phẩm và dịch vụ cho mỗi đơn hàng
            $items = $orderItemModel->getItemsWithProductDetails($order['id']);
            
            // Tính toán số lượng sản phẩm và dịch vụ
            $productCount = 0;
            $serviceCount = 0;
            
            foreach ($items as $item) {
                if (isset($item['type']) && $item['type'] === 'service') {
                    $serviceCount++;
                } else {
                    $productCount++;
                }
            }
            
            // Thêm thông tin vào đơn hàng
            $order['product_count'] = $productCount;
            $order['service_count'] = $serviceCount;
            $order['item_summary'] = array_slice($items, 0, 2); // Lấy 2 mục đầu tiên để hiển thị
            $order['total_items'] = count($items);
        }
        
        $data = [
            'title' => 'Đơn Hàng Của Tôi',
            'orders' => $orders
        ];
        
        return view('orders/index', $data);
    }
    
    public function view($orderId)
    {
        $userId = session()->get('id');
        
        if (!$userId) {
            return redirect()->to('login');
        }
        
        $order = $this->orderModel->getOrderWithItems($orderId, $userId);
        
        if (!$order) {
            return redirect()->to('orders')->with('error', 'Đơn hàng không tồn tại hoặc bạn không có quyền truy cập');
        }
        
        $data = [
            'title' => 'Chi Tiết Đơn Hàng #' . $orderId,
            'order' => $order
        ];
        
        return view('orders/view', $data);
    }
    
    public function create()
    {
        $userId = session()->get('id');
        
        if (!$userId) {
            return redirect()->to('login')->with('error', 'Vui lòng đăng nhập để tiếp tục');
        }
        
        $cartItems = $this->cartModel->getContents();
        
        if (empty($cartItems['items'])) {
            return redirect()->to('cart')->with('error', 'Giỏ hàng trống');
        }
        
        $user = $this->userModel->find($userId);
        
        $data = [
            'title' => 'Thanh Toán',
            'cartItems' => $cartItems,
            'user' => $user
        ];
        
        return view('orders/checkout', $data);
    }
    
    public function store()
    {
        $userId = session()->get('id');
        
        if (!$userId) {
            return redirect()->to('login')->with('error', 'Vui lòng đăng nhập để tiếp tục');
        }
        
        $cartItems = $this->cartModel->getContents();
        
        if (empty($cartItems['items'])) {
            return redirect()->to('cart')->with('error', 'Giỏ hàng trống');
        }
        
        $user = $this->userModel->find($userId);
        $totalAmount = $cartItems['subtotal'];
        
        // Check if user has enough balance
        if ($user['balance'] < $totalAmount) {
            return redirect()->to('checkout')->with('error', 'Số dư không đủ, vui lòng nạp thêm tiền');
        }
        
        // Start database transaction
        $this->db->transStart();
        
        try {
            // 1. Create the order
            $orderData = [
                'user_id' => $userId,
                'total_amount' => $totalAmount,
                'status' => 'completed' // Or 'pending' if you have a manual review process
            ];
            $orderId = $this->orderModel->insert($orderData);

            if (!$orderId) {
                throw new \Exception("Không thể tạo đơn hàng trong cơ sở dữ liệu.");
            }

            // 2. Create order items and update stock
            $orderItemModel = new \App\Models\OrderItemModel();
            $productInstanceModel = new \App\Models\ProductInstanceModel();
            $categoryModel = new \App\Models\CategoryModel();

            foreach ($cartItems['items'] as $item) {
                $orderItemData = [
                    'order_id' => $orderId,
                    'product_id' => $item['id'],
                    'quantity' => $item['quantity'],
                    'price' => $item['price'],
                    'type' => $item['type'] === 'service' ? 'service' : 'product'
                ];
                $orderItemId = $orderItemModel->insert($orderItemData);

                // If it's a product, check if it's an account and assign an instance
                if ($item['type'] === 'product') {
                    $product = $this->productModel->getWithCategory($item['id']);
                    
                    if ($product && $product['category_name'] === 'Tài khoản AI') {
                        // Find an available instance
                        $instance = $productInstanceModel->where('product_id', $item['id'])
                                                         ->where('status', 'available')
                                                         ->first();
                        
                        if (!$instance) {
                            throw new \Exception('Rất tiếc, tài khoản "' . $item['name'] . '" đã tạm hết hàng.');
                        }

                        // Assign the instance to the user and order item
                        $productInstanceModel->update($instance['id'], [
                            'status' => 'sold',
                            'order_item_id' => $orderItemId,
                            'user_id' => $userId
                        ]);
                    }

                    // Update general product stock
                    $this->productModel->updateStock($item['id'], $item['quantity']);
                }
            }

            // 3. Deduct user balance
            $this->userModel->updateBalance($userId, -$totalAmount);

            // 4. Log the transaction
            $transactionModel = new \App\Models\TransactionModel();
            $transactionModel->insert([
                'user_id' => $userId,
                'amount' => -$totalAmount,
                'type' => 'purchase',
                'reference' => 'Thanh toán cho đơn hàng #' . $orderId,
                'status' => 'completed'
            ]);

            // If everything is fine, commit the transaction
            $this->db->transCommit();

            // 5. Update session balance
            $newUser = $this->userModel->find($userId);
            session()->set('balance', $newUser['balance']);

            // 6. Clear the cart and redirect
            $this->cartModel->clear();
            
            return redirect()->to('orders/view/' . $orderId)->with('success', 'Đơn hàng đã được tạo và thanh toán thành công!');

        } catch (\Exception $e) {
            // If something goes wrong, rollback the transaction
            $this->db->transRollback();
            log_message('error', '[Checkout] Lỗi khi xử lý đơn hàng: ' . $e->getMessage());
            return redirect()->to('checkout')->with('error', 'Đã có lỗi xảy ra trong quá trình xử lý đơn hàng. Vui lòng thử lại.');
        }
    }
    
    public function cancel($orderId)
    {
        $userId = session()->get('id');
        
        if (!$userId) {
            return redirect()->to('login');
        }
        
        $order = $this->orderModel->find($orderId);
        
        if (!$order || $order['user_id'] != $userId) {
            return redirect()->to('orders')->with('error', 'Đơn hàng không tồn tại hoặc bạn không có quyền hủy');
        }
        
        // Chỉ cho phép hủy đơn hàng đang chờ xử lý
        if ($order['status'] != 'pending') {
            return redirect()->to('orders/view/' . $orderId)->with('error', 'Chỉ có thể hủy đơn hàng đang chờ xử lý');
        }
        
        // Bắt đầu transaction
        $this->db->transStart();
        
        try {
            // Cập nhật trạng thái đơn hàng
            $this->orderModel->update($orderId, ['status' => 'cancelled']);
            
            // Hoàn tiền vào tài khoản
            $this->userModel->updateBalance($userId, $order['total_amount']);
            
            // Ghi lại giao dịch hoàn tiền
            $transactionModel = new \App\Models\TransactionModel();
            $transactionModel->insert([
                'user_id' => $userId,
                'amount' => $order['total_amount'],
                'type' => 'refund',
                'reference' => 'Hoàn tiền cho đơn hàng #' . $orderId,
                'status' => 'completed'
            ]);
            
            // Khôi phục số lượng sản phẩm
            $orderItemModel = new \App\Models\OrderItemModel();
            $orderItems = $orderItemModel->where('order_id', $orderId)->findAll();
            
            foreach ($orderItems as $item) {
                $product = $this->productModel->find($item['product_id']);
                if ($product) {
                    $this->productModel->update($item['product_id'], [
                        'stock' => $product['stock'] + $item['quantity']
                    ]);
                }
            }
            
            $this->db->transCommit();
            return redirect()->to('orders/view/' . $orderId)->with('success', 'Đơn hàng đã được hủy và tiền đã được hoàn về tài khoản của bạn');
            
        } catch (\Exception $e) {
            $this->db->transRollback();
            return redirect()->to('orders/view/' . $orderId)->with('error', 'Có lỗi xảy ra khi hủy đơn hàng. Vui lòng thử lại sau.');
        }
    }
} 