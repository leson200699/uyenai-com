<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class KnowledgeSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'title' => 'Hướng dẫn trỏ tên miền từ GoDaddy về Hosting tại TechHub',
                'content' => 'Chi tiết các bước trỏ tên miền từ GoDaddy về hosting...',
                'category_id' => 3,
                'is_hot' => true,
                'image' => 'https://placehold.co/600x400/e0e7ff/4338ca',
                'created_at' => '2025-07-20 10:00:00',
                'updated_at' => '2025-07-20 10:00:00',
            ],
            [
                'title' => 'Cách cài đặt chứng chỉ SSL miễn phí cho website',
                'content' => 'Hướng dẫn từng bước cài đặt SSL miễn phí...',
                'category_id' => 2,
                'is_hot' => false,
                'image' => 'https://placehold.co/600x400/f0fdf4/166534',
                'created_at' => '2025-07-18 09:00:00',
                'updated_at' => '2025-07-18 09:00:00',
            ],
            [
                'title' => '5 cách tăng tốc độ website WordPress hiệu quả nhất',
                'content' => 'Các phương pháp tối ưu tốc độ cho WordPress...',
                'category_id' => 1,
                'is_hot' => false,
                'image' => 'https://placehold.co/600x400/fff7ed/9a3412',
                'created_at' => '2025-07-15 14:00:00',
                'updated_at' => '2025-07-15 14:00:00',
            ],
            [
                'title' => 'Cấu hình email doanh nghiệp trên Outlook và Gmail',
                'content' => 'Hướng dẫn cấu hình email doanh nghiệp...',
                'category_id' => 6,
                'is_hot' => false,
                'image' => 'https://placehold.co/600x400/4f46e5/ffffff',
                'created_at' => '2025-07-12 11:00:00',
                'updated_at' => '2025-07-12 11:00:00',
            ],
            [
                'title' => 'Tối ưu hóa Core Web Vitals để tăng thứ hạng Google',
                'content' => 'Các chỉ số Core Web Vitals và cách cải thiện...',
                'category_id' => 4,
                'is_hot' => false,
                'image' => 'https://placehold.co/600x400/fff7ed/9a3412',
                'created_at' => '2025-07-10 08:00:00',
                'updated_at' => '2025-07-10 08:00:00',
            ],
            [
                'title' => 'Mẹo sử dụng ChatGPT cho công việc hiệu quả',
                'content' => 'Các mẹo sử dụng AI ChatGPT trong công việc...',
                'category_id' => 5,
                'is_hot' => false,
                'image' => 'https://placehold.co/600x400/7e22ce/ffffff',
                'created_at' => '2025-07-08 16:00:00',
                'updated_at' => '2025-07-08 16:00:00',
            ],
        ];
        $this->db->table('knowledges')->insertBatch($data);
    }
} 