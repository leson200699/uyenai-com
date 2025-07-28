<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ZaloMarketingSeeder extends Seeder
{
    public function run()
    {
        // Clean up existing 'zalo' category services to avoid duplicates
        $this->db->table('services')->where('category', 'zalo')->delete();
        $this->db->table('services')->where('category', 'zalo-management')->delete();
        $this->db->table('services')->where('category', 'zalo-ads')->delete();

        $services = [
            // Zalo OA Verification
            [
                'id'          => 'zalo-oa-verify',
                'name'        => 'Xác thực Zalo OA (Tick Vàng)',
                'description' => 'Xây dựng uy tín thương hiệu với tick vàng chính chủ, mở khóa các tính năng nâng cao của Zalo Official Account.',
                'price'       => 2000000,
                'image'       => '/template/images/services/zalo-oa.png',
                'category'    => 'zalo',
                'type'        => 'service',
                'duration'    => 'once',
                'features'    => json_encode(['Tư vấn hồ sơ', 'Hỗ trợ nộp đơn', 'Cam kết thành công']),
                'status'      => 'active'
            ],
            // Zalo Ads
            [
                'id'          => 'zalo-ads-basic',
                'name'        => 'Quảng cáo Zalo Ads - Gói Cơ Bản',
                'description' => 'Thiết lập và tối ưu chiến dịch quảng cáo trên hệ sinh thái Zalo, tiếp cận đúng khách hàng tiềm năng.',
                'price'       => 3000000,
                'image'       => '/template/images/services/zalo-ads.png',
                'category'    => 'zalo-ads',
                'type'        => 'service',
                'duration'    => 'month',
                'features'    => json_encode(['Ngân sách 3M', 'Targeting cơ bản', 'Báo cáo tuần']),
                'status'      => 'active'
            ],
            // Chatbot
            [
                'id'          => 'zalo-chatbot-basic',
                'name'        => 'Tích hợp Chatbot - Gói Cơ Bản',
                'description' => 'Tích hợp Chatbot thông minh vào Zalo OA để trả lời tin nhắn, tư vấn và chốt đơn hàng tự động 24/7.',
                'price'       => 4000000,
                'image'       => '/template/images/services/zalo-chatbot.png',
                'category'    => 'zalo',
                'type'        => 'service',
                'duration'    => 'setup',
                'features'    => json_encode(['10 kịch bản', 'Tích hợp Zalo OA', 'Bàn giao & hướng dẫn']),
                'status'      => 'active'
            ],
            // Zalo OA Management
            [
                'id'          => 'zalo-manage-basic',
                'name'        => 'Quản lý Zalo OA - Gói Cơ Bản',
                'description' => '5 bài viết/tháng, tư vấn 8h/ngày, báo cáo hiệu quả hàng tháng.',
                'price'       => 3000000,
                'image'       => '/template/images/services/zalo-manage.png',
                'category'    => 'zalo-management',
                'type'        => 'service',
                'duration'    => 'month',
                'features'    => json_encode(['5 bài viết/tháng', 'Tư vấn 8/5', 'Báo cáo tháng']),
                'status'      => 'active'
            ],
            [
                'id'          => 'zalo-manage-pro',
                'name'        => 'Quản lý Zalo OA - Gói Chuyên Nghiệp',
                'description' => '15 bài viết/tháng, tư vấn 12/7, chatbot cơ bản, báo cáo hàng tuần.',
                'price'       => 5000000,
                'image'       => '/template/images/services/zalo-manage.png',
                'category'    => 'zalo-management',
                'type'        => 'service',
                'duration'    => 'month',
                'features'    => json_encode(['15 bài viết/tháng', 'Tư vấn 12/7', 'Chatbot cơ bản', 'Báo cáo tuần']),
                'status'      => 'active'
            ],
            [
                'id'          => 'zalo-manage-premium',
                'name'        => 'Quản lý Zalo OA - Gói Cao Cấp',
                'description' => '30 bài viết/tháng, tư vấn 24/7, chatbot nâng cao, chạy Ads, báo cáo hàng ngày.',
                'price'       => 8000000,
                'image'       => '/template/images/services/zalo-manage.png',
                'category'    => 'zalo-management',
                'type'        => 'service',
                'duration'    => 'month',
                'features'    => json_encode(['30 bài viết/tháng', 'Tư vấn 24/7', 'Chatbot nâng cao', 'Chạy Ads', 'Báo cáo ngày']),
                'status'      => 'active'
            ]
        ];

        foreach ($services as $service) {
            $this->db->table('services')->insert($service);
        }
    }
} 