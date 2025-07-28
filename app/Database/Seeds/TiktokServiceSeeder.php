<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TiktokServiceSeeder extends Seeder
{
    public function run()
    {
        // Define services data
        $services = [
            [
                'id' => 'tiktok-basic',
                'name' => 'TikTok Marketing Cơ Bản',
                'description' => 'Gói xây dựng & chăm sóc kênh TikTok cơ bản: 12 video/tháng, kịch bản cơ bản, báo cáo hàng tháng.',
                'price' => 10000000,
                'image' => 'https://placehold.co/300x300/6366f1/ffffff?text=TikTok+Basic',
                'category' => 'tiktok',
                'type' => 'service',
                'duration' => 1,
                'features' => json_encode([
                    '12 video/tháng',
                    'Kịch bản cơ bản',
                    'Báo cáo hàng tháng',
                    'Nghiên cứu xu hướng cơ bản'
                ]),
                'status' => 'active',
            ],
            [
                'id' => 'tiktok-pro',
                'name' => 'TikTok Marketing Chuyên Nghiệp',
                'description' => 'Gói chuyên nghiệp: 24 video/tháng, kịch bản chuyên nghiệp, báo cáo hàng tuần, thiết lập quảng cáo.',
                'price' => 20000000,
                'image' => 'https://placehold.co/300x300/4f46e5/ffffff?text=TikTok+Pro',
                'category' => 'tiktok',
                'type' => 'service',
                'duration' => 1,
                'features' => json_encode([
                    '24 video/tháng',
                    'Kịch bản chuyên nghiệp',
                    'Báo cáo hàng tuần',
                    'Nghiên cứu xu hướng chi tiết',
                    'Thiết lập quảng cáo'
                ]),
                'status' => 'active',
            ],
            [
                'id' => 'tiktok-premium',
                'name' => 'TikTok Marketing Cao Cấp',
                'description' => 'Gói cao cấp: 48 video/tháng, kịch bản premium, báo cáo hàng ngày, nghiên cứu chuyên sâu, quảng cáo full.',
                'price' => 40000000,
                'image' => 'https://placehold.co/300x300/3730a3/ffffff?text=TikTok+Premium',
                'category' => 'tiktok',
                'type' => 'service',
                'duration' => 1,
                'features' => json_encode([
                    '48 video/tháng',
                    'Kịch bản premium',
                    'Báo cáo hàng ngày',
                    'Nghiên cứu xu hướng chuyên sâu',
                    'Thiết lập quảng cáo',
                    'Tối ưu chuyển đổi'
                ]),
                'status' => 'active',
            ],
        ];

        foreach ($services as $service) {
            $exists = $this->db->table('services')
                               ->where('id', $service['id'])
                               ->countAllResults() > 0;

            if (!$exists) {
                $this->db->table('services')->insert($service);
            }
        }
    }
}