<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class EmailServicesSeeder extends Seeder
{
    public function run()
    {
        $services = [
            [
                'id' => 'email-basic',
                'name' => 'E-Basic',
                'description' => 'Gói email cơ bản cho cá nhân và doanh nghiệp nhỏ.',
                'price' => 20000,
                'category' => 'email',
                'features' => json_encode([
                    'popular' => false,
                    'list' => [
                        '<b>5 GB</b> Dung lượng/user',
                        'Giao diện Webmail',
                        'Bảo mật Antispam & Antivirus',
                        'Hỗ trợ 24/7'
                    ]
                ]),
                'status' => 'active',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => 'email-pro',
                'name' => 'E-Pro',
                'description' => 'Gói email chuyên nghiệp với dung lượng lớn và nhiều tính năng hơn.',
                'price' => 40000,
                'category' => 'email',
                'features' => json_encode([
                    'popular' => true,
                    'list' => [
                        '<b>15 GB</b> Dung lượng/user',
                        'Giao diện Webmail',
                        'Bảo mật Antispam & Antivirus',
                        'Hỗ trợ 24/7',
                        'Đồng bộ Lịch & Danh bạ'
                    ]
                ]),
                'status' => 'active',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => 'email-business',
                'name' => 'E-Business',
                'description' => 'Giải pháp email toàn diện cho doanh nghiệp lớn, yêu cầu cao về lưu trữ và quản lý.',
                'price' => 70000,
                'category' => 'email',
                'features' => json_encode([
                    'popular' => false,
                    'list' => [
                        '<b>30 GB</b> Dung lượng/user',
                        'Giao diện Webmail',
                        'Bảo mật Antispam & Antivirus',
                        'Hỗ trợ 24/7',
                        'Đồng bộ Lịch & Danh bạ',
                        'Lưu trữ Email'
                    ]
                ]),
                'status' => 'active',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ];

        // Sử dụng upsert để tránh trùng lặp dữ liệu khi chạy seeder nhiều lần
        foreach ($services as $service) {
            $this->db->table('services')->upsert($service);
        }
    }
} 