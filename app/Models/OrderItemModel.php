<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderItemModel extends Model
{
    protected $table      = 'order_items';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['order_id', 'product_id', 'quantity', 'price', 'type', 'created_at', 'updated_at'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // Validation
    protected $validationRules      = [
        'order_id'   => 'required|integer',
        'product_id' => 'required',
        'quantity'   => 'required|integer',
        'price'      => 'required|numeric',
        'type'       => 'required|in_list[product,service]',
    ];
    protected $validationMessages   = [];
    protected $skipValidation       = false;

    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function getItemsByOrderId($orderId)
    {
        return $this->where('order_id', $orderId)
                    ->join('products', 'products.id = order_items.product_id', 'left')
                    ->select('order_items.*, products.name as product_name')
                    ->findAll();
    }

    /**
     * Get items for a specific order with product details
     */
    public function getItemsWithProductDetails($orderId)
    {
        $builder = $this->db->table('order_items');
        $builder->select('order_items.*, order_items.type');
        $builder->where('order_items.order_id', $orderId);
        $items = $builder->get()->getResultArray();
        
        // Process each item to get proper details
        foreach ($items as &$item) {
            // Nếu là sản phẩm, lấy thông tin từ bảng products
            if ($item['type'] === 'product' || empty($item['type'])) {
                $product = $this->db->table('products')
                                   ->select('products.name as product_name, products.image')
                                   ->where('products.id', $item['product_id'])
                                   ->get()
                                   ->getRowArray();
                
                if ($product) {
                    $item['product_name'] = $product['product_name'];
                    $item['image'] = $product['image'];
                } else {
                    $item['product_name'] = 'Sản phẩm không tồn tại';
                    $item['image'] = 'https://placehold.co/80x80/indigo/white';
                }
            }
            // Nếu là dịch vụ, kiểm tra trong bảng services hoặc dùng dữ liệu mẫu
            else if ($item['type'] === 'service') {
                $service = $this->db->table('services')
                                  ->select('services.name as product_name, services.image')
                                  ->where('services.id', $item['product_id'])
                                  ->get()
                                  ->getRowArray();
                
                if ($service) {
                    $item['product_name'] = $service['product_name'];
                    $item['image'] = $service['image'];
                } else {
                    // Dữ liệu mẫu cho VPS services
                    $vpsServices = [
                        'vps1' => ['name' => 'VPS 1'],
                        'vps2' => ['name' => 'VPS 2'],
                        'vps3' => ['name' => 'VPS 3'],
                        'vps4' => ['name' => 'VPS 4'],
                        'vps-mgmt-basic' => ['name' => 'Quản Trị VPS - Cơ Bản'],
                        'vps-mgmt-pro' => ['name' => 'Quản Trị VPS - Chuyên Nghiệp']
                    ];
                    
                    if (isset($vpsServices[$item['product_id']])) {
                        $item['product_name'] = $vpsServices[$item['product_id']]['name'];
                    } else {
                        $item['product_name'] = 'Dịch vụ #' . $item['product_id'];
                    }
                    
                    $item['image'] = 'https://placehold.co/80x80/indigo/white?text=Service';
                }
            }
        }
        
        return $items;
    }

    /**
     * Get purchased "account" type products for a user.
     * "Accounts" are identified by specific categories.
     */
    public function getPurchasedAccountsByUserId($userId)
    {
        // Define which categories are considered "accounts" (use Vietnamese names as per application)
        $accountCategoryNames = ['Tài khoản AI', 'Social Media Accounts'];

        $builder = $this->db->table($this->table);
        $builder->select('products.name, products.description, products.image, orders.created_at as purchase_date, order_items.id as order_item_id');
        $builder->join('orders', 'orders.id = order_items.order_id');
        $builder->join('products', 'products.id = order_items.product_id');
        $builder->join('categories', 'categories.id = products.category_id');
        $builder->where('orders.user_id', $userId);
        $builder->where('orders.status', 'completed');
        $builder->where('order_items.type', 'product');
        $builder->whereIn('categories.name', $accountCategoryNames);
        $builder->orderBy('orders.created_at', 'DESC');
        
        return $builder->get()->getResultArray();
    }
} 