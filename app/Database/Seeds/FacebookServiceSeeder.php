<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class FacebookServiceSeeder extends Seeder
{
    public function run()
    {
        // Clean up existing facebook services to prevent duplicate entries
        $this->db->table('services')->where('category', 'facebook')->delete();
        $this->db->table('services')->where('category', 'facebook-ads')->delete();
        $this->db->table('services')->where('category', 'facebook-management')->delete();
        
        $services = [
            [
                'id'          => 'fb-like-1',
                'name'        => 'Gói Tăng Like Fanpage S',
                'description' => 'Tăng 1,000 like thật cho Fanpage của bạn.',
                'price'       => 500000,
                'image'       => '/template/images/services/fb-like.png',
                'category'    => 'facebook',
                'type'        => 'service',
                'duration'    => 'once',
                'features'    => json_encode([
                    'likes' => '1,000 Likes',
                    'quality' => 'Người dùng thật, tương tác cao',
                    'time' => 'Hoàn thành trong 3-5 ngày',
                    'warranty' => 'Bảo hành không tụt'
                ]),
                'status'      => 'active'
            ],
            [
                'id'          => 'fb-like-2',
                'name'        => 'Gói Tăng Like Fanpage M',
                'description' => 'Tăng 5,000 like thật cho Fanpage của bạn, phù hợp cho doanh nghiệp vừa và nhỏ.',
                'price'       => 2000000,
                'image'       => '/template/images/services/fb-like.png',
                'category'    => 'facebook',
                'type'        => 'service',
                'duration'    => 'once',
                'features'    => json_encode([
                    'likes' => '5,000 Likes',
                    'quality' => 'Người dùng thật, tương tác cao',
                    'time' => 'Hoàn thành trong 7-10 ngày',
                    'warranty' => 'Bảo hành không tụt'
                ]),
                'status'      => 'active'
            ],
            [
                'id'          => 'fb-ads-1',
                'name'        => 'Gói Quảng Cáo Cơ Bản',
                'description' => 'Thiết lập và vận hành chiến dịch quảng cáo Facebook cơ bản.',
                'price'       => 3000000,
                'image'       => '/template/images/services/fb-ads.png',
                'category'    => 'facebook',
                'type'        => 'service',
                'duration'    => 'month',
                'features'    => json_encode([
                    'budget' => 'Ngân sách quảng cáo lên đến 10M',
                    'targeting' => 'Targeting cơ bản',
                    'report' => 'Báo cáo hiệu suất hàng tuần',
                    'support' => 'Hỗ trợ 24/7'
                ]),
                'status'      => 'active'
            ],
            [
                'id'          => 'fb-ads-2',
                'name'        => 'Gói Quảng Cáo Chuyên Sâu',
                'description' => 'Chiến dịch quảng cáo được tối ưu hóa chuyên sâu, retargeting và A/B testing.',
                'price'       => 8000000,
                'image'       => '/template/images/services/fb-ads.png',
                'category'    => 'facebook-ads',
                'type'        => 'service',
                'duration'    => 'month',
                'features'    => json_encode([
                    'budget' => 'Ngân sách không giới hạn',
                    'targeting' => 'Targeting nâng cao & Retargeting',
                    'optimization' => 'Tối ưu hóa chiến dịch hàng ngày',
                    'report' => 'Báo cáo chi tiết & phân tích'
                ]),
                'status'      => 'active'
            ],
            [
                'id'          => 'fb-manage-1',
                'name'        => 'Quản lý Fanpage Chuyên Nghiệp',
                'description' => 'Dịch vụ quản lý nội dung và tương tác cho Fanpage.',
                'price'       => 4000000,
                'image'       => '/template/images/services/fb-manage.png',
                'category'    => 'facebook-management',
                'type'        => 'service',
                'duration'    => 'month',
                'features'    => json_encode([
                    'posts' => '15-20 bài đăng/tháng',
                    'design' => 'Thiết kế hình ảnh cơ bản',
                    'interaction' => 'Tương tác, trả lời bình luận',
                    'report' => 'Báo cáo tăng trưởng hàng tháng'
                ]),
                'status'      => 'active'
            ]
        ];

        foreach ($services as $service) {
            // Using `insert` will not update existing records but add new ones.
            // Replace with `save` if you need to update on conflict
            $this->db->table('services')->insert($service);
        }
    }
} 