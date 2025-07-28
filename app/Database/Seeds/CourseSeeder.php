<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CourseSeeder extends Seeder
{
    public function run()
    {
        // Find or create the 'Online Courses' category
        $categoryModel = new \App\Models\CategoryModel();
        $category = $categoryModel->where('name', 'Online Courses')->first();

        if (!$category) {
            $categoryId = $categoryModel->insert([
                'name' => 'Online Courses',
                'description' => 'Various courses for learning new skills'
            ]);
        } else {
            $categoryId = $category['id'];
        }

        $products = [
            [
                'name' => 'Ứng dụng AI vào Marketing và Sáng tạo nội dung',
                'description' => 'Học cách sử dụng các công cụ AI mạnh mẽ nhất để tự động hóa, tối ưu hóa chiến dịch marketing và sản xuất nội dung đột phá.',
                'price' => 2500000,
                'image' => 'https://placehold.co/600x400/312e81/ffffff?text=AI+Marketing',
                'category_id' => $categoryId,
                'stock' => 100,
                'status' => 'active'
            ],
            [
                'name' => 'SEO Mastery 2025: Từ cơ bản đến chuyên sâu',
                'description' => 'Toàn bộ kiến thức về SEO từ nghiên cứu từ khóa, on-page, off-page đến technical SEO và các chiến lược thống trị Google.',
                'price' => 1800000,
                'image' => 'https://placehold.co/600x400/047857/ffffff?text=SEO+Mastery',
                'category_id' => $categoryId,
                'stock' => 100,
                'status' => 'active'
            ],
            [
                'name' => 'Lập trình Web Frontend cho người mới bắt đầu',
                'description' => 'Xây dựng nền tảng vững chắc với HTML, CSS, JavaScript và các framework phổ biến như React.',
                'price' => 1200000,
                'image' => 'https://placehold.co/600x400/be123c/ffffff?text=Web+Dev',
                'category_id' => $categoryId,
                'stock' => 100,
                'status' => 'active'
            ],
            [
                'name' => 'Thiết kế UI/UX chuyên nghiệp với Figma',
                'description' => 'Học cách tạo ra các giao diện người dùng đẹp mắt, thân thiện và hiệu quả bằng công cụ thiết kế hàng đầu Figma.',
                'price' => 1500000,
                'image' => 'https://placehold.co/600x400/7c3aed/ffffff?text=Design',
                'category_id' => $categoryId,
                'stock' => 100,
                'status' => 'active'
            ],
        ];

        foreach ($products as $product) {
            // Check if product exists by name and category to avoid duplicates
            $exists = $this->db->table('products')
                               ->where('name', $product['name'])
                               ->where('category_id', $categoryId)
                               ->countAllResults() > 0;

            if (!$exists) {
                $this->db->table('products')->insert($product);
            }
        }
    }
} 