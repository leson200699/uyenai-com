<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AcademySeeder extends Seeder
{
    public function run()
    {
        // Find or create the 'Academy' category
        $categoryModel = new \App\Models\CategoryModel();
        $category = $categoryModel->where('name', 'Academy')->first();

        if (!$category) {
            $categoryId = $categoryModel->insert([
                'name' => 'Academy',
                'description' => 'Exclusive documents, templates, and resources.'
            ]);
        } else {
            $categoryId = $category['id'];
        }

        $products = [
            [
                'name' => 'Bộ 500+ Mẫu Content Marketing Đa Ngành',
                'description' => 'Tiết kiệm thời gian, bùng nổ ý tưởng với bộ sưu tập mẫu content cho Facebook, Blog, Email...',
                'price' => 99000,
                'image' => 'https://placehold.co/300x300/ef4444/ffffff?text=Content',
                'category_id' => $categoryId,
                'stock' => 999,
                'status' => 'active'
            ],
            [
                'name' => 'Template Lập Kế Hoạch Kinh Doanh (Excel)',
                'description' => 'Biểu mẫu chi tiết giúp bạn xây dựng một kế hoạch kinh doanh hoàn chỉnh từ A-Z.',
                'price' => 0, // Free
                'image' => 'https://placehold.co/300x300/22c55e/ffffff?text=Plan',
                'category_id' => $categoryId,
                'stock' => 999,
                'status' => 'active'
            ],
            [
                'name' => 'Tuyển Tập 100+ Font Chữ Việt Hóa Đẹp',
                'description' => 'Bộ font chữ đa dạng, đã được Việt hóa, phù hợp cho mọi nhu cầu thiết kế.',
                'price' => 49000,
                'image' => 'https://placehold.co/300x300/eab308/ffffff?text=Fonts',
                'category_id' => $categoryId,
                'stock' => 999,
                'status' => 'active'
            ],
            [
                'name' => 'Ebook: Thành Thạo Google Analytics 4',
                'description' => 'Hướng dẫn toàn diện về GA4, từ thiết lập ban đầu đến phân tích dữ liệu chuyên sâu.',
                'price' => 79000,
                'image' => 'https://placehold.co/300x300/8b5cf6/ffffff?text=GA4',
                'category_id' => $categoryId,
                'stock' => 999,
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