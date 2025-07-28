<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Ajax extends BaseController
{
    public function search()
    {
        if ($this->request->isAJAX()) {
            $keyword = $this->request->getVar('keyword');
            
            // Bạn có thể sửa lại logic tìm kiếm dựa trên cấu trúc model của bạn
            // Đây chỉ là ví dụ
            $data = [];
            
            if (!empty($keyword)) {
                // Tìm kiếm sản phẩm
                $productModel = new \App\Models\ProductModel();
                $products = $productModel->like('name', $keyword)->limit(5)->find();
                
                foreach ($products as $product) {
                    $data[] = [
                        'id' => $product['id'],
                        'title' => $product['name'],
                        'type' => 'product',
                        'url' => site_url('products/detail/' . $product['id']),
                        'image' => !empty($product['image']) ? $product['image'] : 'https://placehold.co/40x40/indigo/white'
                    ];
                }
                
                // Tìm kiếm dịch vụ (mô phỏng, thay thế bằng model thực tế của bạn)
                $services = [
                    ['id' => 1, 'name' => 'Thiết kế Website', 'slug' => 'web'],
                    ['id' => 2, 'name' => 'Dịch vụ Hosting', 'slug' => 'hosting'],
                    ['id' => 3, 'name' => 'Đăng ký Domain', 'slug' => 'domain'],
                    ['id' => 4, 'name' => 'Dịch vụ SEO', 'slug' => 'seo'],
                    ['id' => 5, 'name' => 'Email Marketing', 'slug' => 'email-marketing']
                ];
                
                foreach ($services as $service) {
                    if (stripos($service['name'], $keyword) !== false) {
                        $data[] = [
                            'id' => $service['id'],
                            'title' => $service['name'],
                            'type' => 'service',
                            'url' => site_url('services/' . $service['slug']),
                            'image' => 'https://placehold.co/40x40/indigo/white'
                        ];
                    }
                }
            }
            
            return $this->response->setJSON([
                'success' => true,
                'results' => $data
            ]);
        }
        
        return $this->response->setJSON([
            'success' => false,
            'message' => 'Invalid request'
        ]);
    }

    public function get_account_details()
    {
        if (!$this->request->isAJAX()) {
            return $this->response->setStatusCode(403)->setJSON(['success' => false, 'message' => 'Truy cập không hợp lệ']);
        }
        
        $userId = session()->get('id');
        if (!$userId) {
            return $this->response->setStatusCode(401)->setJSON(['success' => false, 'message' => 'Vui lòng đăng nhập.']);
        }

        $orderItemId = $this->request->getGet('order_item_id');
        if (!$orderItemId) {
            return $this->response->setStatusCode(400)->setJSON(['success' => false, 'message' => 'Thiếu thông tin yêu cầu.']);
        }

        $productInstanceModel = new \App\Models\ProductInstanceModel();
        $instance = $productInstanceModel->where('order_item_id', $orderItemId)
                                           ->where('user_id', $userId)
                                           ->first();

        if (!$instance) {
            return $this->response->setStatusCode(404)->setJSON(['success' => false, 'message' => 'Không tìm thấy thông tin tài khoản hoặc bạn không có quyền truy cập.']);
        }

        return $this->response->setJSON([
            'success' => true,
            'data' => json_decode($instance['instance_data'], true)
        ]);
    }

    public function getNewCsrf()
    {
        try {
            $security = service('security');
            // Sử dụng phương thức đúng
            return $this->response->setJSON([
                'success' => true,
                'csrf_token' => csrf_token(),
                'csrf_hash'  => csrf_hash()
            ]);
        } catch (\Exception $e) {
            log_message('error', 'Error generating CSRF token: ' . $e->getMessage());
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Không thể tạo CSRF token',
                'error' => $e->getMessage()
            ]);
        }
    }
} 