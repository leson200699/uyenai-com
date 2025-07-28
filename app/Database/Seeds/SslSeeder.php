<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SslSeeder extends Seeder
{
    public function run()
    {
        // Truncate the table first to avoid duplicate entry errors on re-seed
        $this->db->table('services')->where('type', 'ssl')->delete();

        $data = [
            [
                'id' => 'ssl_positive_1y',
                'name' => 'PositiveSSL',
                'description' => 'Bảo mật cơ bản cho các trang blog, website cá nhân. Xác thực tên miền (DV).',
                'price' => 250000,
                'category' => 'ssl',
                'type' => 'ssl',
                'image' => 'images/ssl/positivessl.png',
                'status' => 'active',
                'duration' => 'year',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => 'ssl_wildcard_1y',
                'name' => 'EssentialSSL Wildcard',
                'description' => 'Bảo mật cho tên miền chính và không giới hạn tên miền phụ (subdomain). Xác thực tên miền (DV).',
                'price' => 1800000,
                'category' => 'ssl',
                'type' => 'ssl',
                'image' => 'images/ssl/wildcard.png',
                'status' => 'active',
                'duration' => 'year',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => 'ssl_pro_1y',
                'name' => 'InstantSSL Pro',
                'description' => 'Bảo mật cao hơn, dành cho các website thương mại điện tử, yêu cầu xác thực tổ chức (OV).',
                'price' => 3500000,
                'category' => 'ssl',
                'type' => 'ssl',
                'image' => 'images/ssl/instantssl_pro.png',
                'status' => 'active',
                'duration' => 'year',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ];

        // Using Query Builder
        $this->db->table('services')->insertBatch($data);
    }
} 