<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderModel extends Model
{
    protected $table      = 'orders';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['user_id', 'total_amount', 'status', 'created_at', 'updated_at'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'user_id'      => 'required|integer',
        'total_amount' => 'required|numeric',
        'status'       => 'required|in_list[pending,processing,completed,cancelled]',
    ];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    /**
     * Get orders for a specific user with pagination
     */
    public function getUserOrders($userId, $limit = 10, $offset = 0)
    {
        return $this->where('user_id', $userId)
                    ->orderBy('created_at', 'DESC')
                    ->findAll($limit, $offset);
    }

    /**
     * Get order with its items
     */
    public function getOrderWithItems($orderId, $userId = null)
    {
        $order = $this->find($orderId);
        
        if (!$order || ($userId !== null && $order['user_id'] != $userId)) {
            return null;
        }
        
        // Get order items
        $orderItemModel = new \App\Models\OrderItemModel();
        $order['items'] = $orderItemModel->getItemsWithProductDetails($orderId);
        
        return $order;
    }

    /**
     * Create a new order with items
     */
    public function createOrder($userId, $items, $totalAmount)
    {
        $this->db->transBegin();
        
        try {
            // Create order
            $orderId = $this->insert([
                'user_id' => $userId,
                'total_amount' => $totalAmount,
                'status' => 'pending'
            ]);
            
            if (!$orderId) {
                throw new \Exception("Failed to create order");
            }
            
            // Create order items
            $orderItemModel = new \App\Models\OrderItemModel();
            $productModel = new \App\Models\ProductModel();
            
            foreach ($items as $item) {
                // Get current product price
                $product = $productModel->find($item['product_id']);
                if (!$product) {
                    throw new \Exception("Product not found");
                }
                
                // Check stock
                if ($product['stock'] < $item['quantity']) {
                    throw new \Exception("Insufficient stock for product: " . $product['name']);
                }
                
                // Create order item
                $orderItemModel->insert([
                    'order_id' => $orderId,
                    'product_id' => $item['product_id'],
                    'quantity' => $item['quantity'],
                    'price' => $product['price']
                ]);
                
                // Update product stock
                $productModel->updateStock($item['product_id'], $item['quantity']);
            }
            
            // Update user balance
            $userModel = new \App\Models\UserModel();
            $balanceUpdated = $userModel->updateBalance($userId, -$totalAmount);
            
            if (!$balanceUpdated) {
                throw new \Exception("Insufficient balance");
            }
            
            // Create transaction record
            $transactionModel = new \App\Models\TransactionModel();
            $transactionModel->insert([
                'user_id' => $userId,
                'amount' => -$totalAmount,
                'type' => 'purchase',
                'reference' => 'Order #' . $orderId,
                'status' => 'completed'
            ]);
            
            $this->db->transCommit();
            return $orderId;
            
        } catch (\Exception $e) {
            $this->db->transRollback();
            return ['error' => $e->getMessage()];
        }
    }

    /**
     * Get orders with user details.
     * If an ID is provided, it fetches a single order.
     * Otherwise, it fetches all orders.
     */
    public function getOrdersWithUserDetails($id = null)
    {
        $builder = $this->db->table($this->table);
        $builder->select('orders.*, users.name, users.email');
        $builder->join('users', 'users.id = orders.user_id');
        $builder->orderBy('orders.created_at', 'DESC');
        
        if ($id === null) {
            return $builder->get()->getResultArray();
        }

        return $builder->where('orders.id', $id)->get()->getRowArray();
    }
} 