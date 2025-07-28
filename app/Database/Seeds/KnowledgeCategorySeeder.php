<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class KnowledgeCategorySeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'name' => 'Hosting & VPS',
                'description' => 'Hướng dẫn quản lý, cài đặt và tối ưu hosting, máy chủ ảo.',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Bảo Mật',
                'description' => 'Các hướng dẫn tăng cường bảo mật cho website và tài khoản.',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Tên Miền & DNS',
                'description' => 'Quản lý, trỏ tên miền và cấu hình các bản ghi DNS.',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'SEO Kỹ Thuật',
                'description' => 'Các thủ thuật và hướng dẫn tối ưu kỹ thuật cho SEO.',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Công Cụ AI',
                'description' => 'Mẹo và hướng dẫn sử dụng các công cụ AI hiệu quả.',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Email Doanh Nghiệp',
                'description' => 'Cài đặt và sử dụng email theo tên miền riêng.',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ];
        $this->db->table('knowledge_categories')->insertBatch($data);
    }
} 