<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class WebDemoSeeder extends Seeder
{
    public function run()
    {
        $categoryModel = new \App\Models\CategoryModel();

        // Define categories for web demos
        $demoCategories = [
            'Doanh nghiệp' => 'Các mẫu website cho công ty, tập đoàn.',
            'Bán hàng' => 'Giao diện cho các cửa hàng online, shop thời trang.',
            'Nhà hàng' => 'Website cho nhà hàng, quán cafe, dịch vụ ăn uống.',
            'Blog' => 'Giao diện cho blog cá nhân, trang tin tức.',
            'Portfolio' => 'Trưng bày dự án cá nhân, công ty.',
            'Landing Page' => 'Trang đích tối ưu cho các chiến dịch marketing.',
            'Bất động sản' => 'Website cho các dự án, môi giới bất động sản.',
        ];

        $categoryIds = [];
        foreach ($demoCategories as $name => $description) {
            $category = $categoryModel->where('name', $name)->first();
            if (!$category) {
                $categoryId = $categoryModel->insert([
                    'name' => $name,
                    'description' => $description,
                ]);
                $categoryIds[$name] = $categoryId;
            } else {
                $categoryIds[$name] = $category['id'];
            }
        }

        // Seed Web Demos (as products)
        $products = [
            [
                'name' => 'Mẫu Business Premium',
                'description' => 'Thiết kế hiện đại, tốc độ tải nhanh, tối ưu SEO và trải nghiệm người dùng xuất sắc cho doanh nghiệp của bạn.',
                'price' => 3500000,
                'image' => 'https://placehold.co/600x400/e0e7ff/4338ca?text=Business+Premium',
                'category_id' => $categoryIds['Doanh nghiệp'],
                'stock' => 99,
                'status' => 'active',
                'is_featured' => true,
            ],
            [
                'name' => 'Mẫu Doanh Nghiệp Hiện Đại',
                'description' => 'Giao diện chuyên nghiệp, phù hợp cho các công ty giới thiệu dịch vụ và sản phẩm.',
                'price' => 2500000,
                'image' => 'https://placehold.co/600x450/1f2937/ffffff?text=Corporate',
                'category_id' => $categoryIds['Doanh nghiệp'],
                'stock' => 99,
                'status' => 'active',
                'is_featured' => false,
            ],
            [
                'name' => 'Mẫu Shop Thời Trang',
                'description' => 'Tích hợp đầy đủ tính năng giỏ hàng, thanh toán, tối ưu cho ngành hàng thời trang.',
                'price' => 3200000,
                'image' => 'https://placehold.co/600x450/be123c/ffffff?text=eCommerce',
                'category_id' => $categoryIds['Bán hàng'],
                'stock' => 99,
                'status' => 'active',
                'is_featured' => true,
            ],
            [
                'name' => 'Mẫu Nhà Hàng Sang Trọng',
                'description' => 'Thiết kế ấm cúng, sang trọng, có tính năng đặt bàn và menu trực tuyến.',
                'price' => 2800000,
                'image' => 'https://placehold.co/600x450/047857/ffffff?text=Restaurant',
                'category_id' => $categoryIds['Nhà hàng'],
                'stock' => 99,
                'status' => 'active',
                'is_featured' => false,
            ],
            [
                'name' => 'Blog Chuyên Nghiệp',
                'description' => 'Giao diện sạch sẽ, tối ưu cho việc đọc và chia sẻ nội dung.',
                'price' => 1800000,
                'image' => 'https://placehold.co/600x450/4338ca/ffffff?text=Blog',
                'category_id' => $categoryIds['Blog'],
                'stock' => 99,
                'status' => 'active',
                'is_featured' => false,
            ],
            [
                'name' => 'Landing Page Chuyển Đổi Cao',
                'description' => 'Thiết kế tập trung vào việc kêu gọi hành động, tối ưu hóa tỷ lệ chuyển đổi cho chiến dịch marketing.',
                'price' => 1200000,
                'image' => 'https://placehold.co/600x450/7e22ce/ffffff?text=Landing+Page',
                'category_id' => $categoryIds['Landing Page'],
                'stock' => 99,
                'status' => 'active',
                'is_featured' => true,
            ],
        ];

        foreach ($products as $product) {
            $exists = $this->db->table('products')
                               ->where('name', $product['name'])
                               ->where('category_id', $product['category_id'])
                               ->countAllResults() > 0;

            if (!$exists) {
                $this->db->table('products')->insert($product);
            }
        }
    }
} 