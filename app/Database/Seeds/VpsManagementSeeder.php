<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class VpsManagementSeeder extends Seeder
{
    public function run()
    {
        $services = [
            [
                'id'          => 'vps-manage-basic',
                'name'        => 'Quản trị VPS Cơ bản',
                'description' => 'Gói quản trị VPS cơ bản, phù hợp cho các website nhỏ và cá nhân. Bao gồm giám sát, cập nhật và hỗ trợ cơ bản.',
                'price'       => 250000,
                'image'       => 'https://placehold.co/600x400/6366f1/ffffff?text=Basic+Admin',
                'category'    => 'vps-management',
                'type'        => 'service',
                'duration'    => 1, // Default duration in months
                'features'    => json_encode([
                    'Giám sát hệ thống 24/7',
                    'Cập nhật hệ điều hành',
                    'Hỗ trợ qua email',
                    'Thời gian phản hồi 24 giờ'
                ]),
                'status'      => 'active',
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s'),
            ],
            [
                'id'          => 'vps-manage-pro',
                'name'        => 'Quản trị VPS Chuyên nghiệp',
                'description' => 'Gói quản trị toàn diện cho doanh nghiệp. Bao gồm giám sát, tối ưu hóa, bảo mật và hỗ trợ ưu tiên.',
                'price'       => 700000,
                'image'       => 'https://placehold.co/600x400/4f46e5/ffffff?text=Pro+Admin',
                'category'    => 'vps-management',
                'type'        => 'service',
                'duration'    => 1,
                'features'    => json_encode([
                    'Tất cả tính năng của gói Cơ bản',
                    'Tối ưu hóa hiệu suất',
                    'Cấu hình tường lửa & bảo mật',
                    'Hỗ trợ qua điện thoại & email',
                    'Thời gian phản hồi 4-8 giờ'
                ]),
                'status'      => 'active',
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s'),
            ],
            [
                'id'          => 'vps-manage-premium',
                'name'        => 'Quản trị VPS Cao cấp',
                'description' => 'Giải pháp quản trị cao cấp nhất, dành cho các hệ thống quan trọng, yêu cầu độ sẵn sàng cao và hỗ trợ tức thì.',
                'price'       => 1500000,
                'image'       => 'https://placehold.co/600x400/3730a3/ffffff?text=Premium+Admin',
                'category'    => 'vps-management',
                'type'        => 'service',
                'duration'    => 1,
                'features'    => json_encode([
                    'Tất cả tính năng của gói Chuyên nghiệp',
                    'Hỗ trợ khẩn cấp 24/7',
                    'Tư vấn & triển khai giải pháp',
                    'Sao lưu & phục hồi dữ liệu',
                    'Cam kết thời gian phản hồi (SLA) < 1 giờ'
                ]),
                'status'      => 'active',
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s'),
            ],
        ];

        foreach ($services as $service) {
            // Check if the service already exists
            $exists = $this->db->table('services')->where('id', $service['id'])->countAllResults() > 0;

            if (!$exists) {
                $this->db->table('services')->insert($service);
            }
        }
    }
} 