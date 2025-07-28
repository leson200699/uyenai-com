<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\OrderModel;
use App\Models\OrderItemModel;
use App\Models\UserModel;

class Orders extends BaseController
{
    protected $orderModel;
    protected $orderItemModel;
    protected $userModel;

    public function __construct()
    {
        $this->orderModel = new OrderModel();
        $this->orderItemModel = new OrderItemModel();
        $this->userModel = new UserModel();
    }

    /**
     * Display a list of all orders.
     */
    public function index()
    {
        $orders = $this->orderModel->getOrdersWithUserDetails();

        // Efficiently fetch all items for the orders displayed
        $orderIds = array_column($orders, 'id');
        $orderItems = [];

        if (!empty($orderIds)) {
            $items = $this->orderItemModel->whereIn('order_id', $orderIds)
                                          ->join('products', 'products.id = order_items.product_id')
                                          ->select('order_items.order_id, products.name as product_name, order_items.quantity')
                                          ->findAll();
            
            // Group items by order_id
            foreach ($items as $item) {
                $orderItems[$item['order_id']][] = $item['product_name'] . ' (x' . $item['quantity'] . ')';
            }
        }
        
        // Attach product names to each order
        foreach ($orders as &$order) {
            $order['products_summary'] = isset($orderItems[$order['id']]) ? implode(', ', $orderItems[$order['id']]) : 'N/A';
        }

        $data = [
            'orders' => $orders,
        ];
        
        return view('admin/orders/index', $data);
    }

    /**
     * Display a single order with its items.
     */
    public function view($id)
    {
        $order = $this->orderModel->getOrdersWithUserDetails($id);

        if (!$order) {
            return redirect()->to('/admin/orders')->with('error', 'Không tìm thấy đơn hàng.');
        }

        $data = [
            'order' => $order,
            'items' => $this->orderItemModel->getItemsByOrderId($id),
        ];

        return view('admin/orders/view', $data);
    }

    /**
     * Update the status of an order.
     */
    public function updateStatus($id)
    {
        $newStatus = $this->request->getPost('status');
        if (empty($newStatus) || !in_array($newStatus, ['pending', 'completed', 'cancelled'])) {
            return redirect()->back()->with('error', 'Trạng thái không hợp lệ.');
        }

        $order = $this->orderModel->find($id);
        if (!$order) {
            return redirect()->to('/admin/orders')->with('error', 'Không tìm thấy đơn hàng.');
        }
        
        // Prevent action if status is not changing
        if ($order['status'] === $newStatus) {
            return redirect()->to('/admin/orders/view/' . $id)->with('info', 'Trạng thái đơn hàng không thay đổi.');
        }

        $db = \Config\Database::connect();
        $db->transStart();

        try {
            // If cancelling an order that was not already cancelled, refund the user
            if ($newStatus === 'cancelled' && $order['status'] !== 'cancelled') {
                $refundSuccess = $this->userModel->updateBalance($order['user_id'], $order['total_amount']);
                
                if (!$refundSuccess) {
                    throw new \Exception('Không thể hoàn tiền cho người dùng. Vui lòng kiểm tra lại số dư.');
                }
                
                // Return associated account instances to stock
                $this->returnAccountInstancesToStock($id);
            }

            // Update the order status
            $this->orderModel->update($id, ['status' => $newStatus]);
            
            $db->transCommit();
            return redirect()->to('/admin/orders/view/' . $id)->with('success', 'Trạng thái đơn hàng đã được cập nhật thành công.');

        } catch (\Exception $e) {
            $db->transRollback();
            return redirect()->to('/admin/orders/view/' . $id)->with('error', 'Đã xảy ra lỗi: ' . $e->getMessage());
        }
    }

    /**
     * Finds product instances associated with a cancelled order and returns them to stock.
     */
    private function returnAccountInstancesToStock($orderId)
    {
        $orderItems = $this->orderItemModel->where('order_id', $orderId)->findAll();
        $orderItemIds = array_column($orderItems, 'id');

        if (empty($orderItemIds)) {
            return;
        }

        $productInstanceModel = new \App\Models\ProductInstanceModel();
        $productInstanceModel->whereIn('order_item_id', $orderItemIds)
                             ->set(['status' => 'available', 'order_item_id' => null, 'user_id' => null])
                             ->update();
    }
} 