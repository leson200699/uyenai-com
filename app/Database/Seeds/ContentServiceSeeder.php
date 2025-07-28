<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ContentServiceSeeder extends Seeder
{
    public function run()
    {
        // We will no longer use delete(), but replace() for each item to ensure data is always fresh and avoid duplicate errors.
        
        $services = [
            // ===== Content Website Packages =====
            [
                'id'          => 'content-web-basic',
                'name'        => 'Gói Website Cơ Bản',
                'description' => 'Cung cấp nền tảng nội dung vững chắc cho website mới, tập trung vào các bài viết cốt lõi và giới thiệu.',
                'price'       => 150000,
                'image'       => '/template/images/services/content-writing.png',
                'category'    => 'content-website',
                'type'        => 'service',
                'duration'    => 'per_article',
                'features'    => json_encode([
                    'Độ dài: 800 - 1000 từ/bài',
                    'Nghiên cứu từ khóa cơ bản',
                    'Cấu trúc chuẩn SEO',
                    'Tối ưu 1-2 hình ảnh/bài',
                    '1 lần chỉnh sửa'
                ]),
                'status'      => 'active'
            ],
            [
                'id'          => 'content-web-pro',
                'name'        => 'Gói Website Chuyên Nghiệp',
                'description' => 'Dành cho các website muốn đẩy mạnh SEO, tăng traffic với các bài viết chuyên sâu và được tối ưu toàn diện.',
                'price'       => 250000,
                'image'       => '/template/images/services/content-writing.png',
                'category'    => 'content-website',
                'type'        => 'service',
                'duration'    => 'per_article',
                'features'    => json_encode([
                    'Độ dài: 1200 - 1500 từ/bài',
                    'Nghiên cứu từ khóa chuyên sâu',
                    'Tối ưu On-page đầy đủ',
                    'Tối ưu 3-5 hình ảnh/bài',
                    'Tối ưu Schema Markup',
                    '2 lần chỉnh sửa'
                ]),
                'status'      => 'active'
            ],
            [
                'id'          => 'content-web-premium',
                'name'        => 'Gói Website Cao Cấp',
                'description' => 'Giải pháp nội dung toàn diện, tập trung vào các bài viết có chiều sâu, tăng cường uy tín và dẫn dắt thị trường.',
                'price'       => 350000,
                'image'       => '/template/images/services/content-writing.png',
                'category'    => 'content-website',
                'type'        => 'service',
                'duration'    => 'per_article',
                'features'    => json_encode([
                    'Độ dài: 1500 - 2500+ từ/bài',
                    'Nghiên cứu & phân tích đối thủ',
                    'Sáng tạo Infographic/ảnh bìa độc quyền',
                    'Tối ưu chuyển đổi (CTA)',
                    'Không giới hạn chỉnh sửa'
                ]),
                'status'      => 'active'
            ],
            
            // ===== Content Facebook Packages =====
            [
                'id'          => 'fanpage-basic',
                'name'        => 'Gói Fanpage Cơ Bản',
                'description' => 'Duy trì sự hiện diện đều đặn trên Fanpage, tương tác cơ bản với khách hàng.',
                'price'       => 3000000,
                'image'       => '/template/images/services/fanpage-manage.png',
                'category'    => 'content-facebook',
                'type'        => 'service',
                'duration'    => 'month',
                'features'    => json_encode([
                    '12 bài đăng/tháng (3 bài/tuần)',
                    'Thiết kế hình ảnh theo mẫu',
                    'Lên lịch đăng bài',
                    'Báo cáo hiệu quả cuối tháng'
                ]),
                'status'      => 'active'
            ],
            [
                'id'          => 'fanpage-pro',
                'name'        => 'Gói Fanpage Chuyên Nghiệp',
                'description' => 'Tăng trưởng Fanpage với nội dung sáng tạo, đa định dạng và chiến lược rõ ràng.',
                'price'       => 5000000,
                'image'       => '/template/images/services/fanpage-manage.png',
                'category'    => 'content-facebook',
                'type'        => 'service',
                'duration'    => 'month',
                'features'    => json_encode([
                    '20 bài đăng/tháng (5 bài/tuần)',
                    'Thiết kế hình ảnh chuyên nghiệp',
                    'Sản xuất 1-2 video ngắn/tháng',
                    'Tổ chức minigame/giveaway',
                    'Báo cáo hiệu quả hàng tuần'
                ]),
                'status'      => 'active'
            ],
            [
                'id'          => 'fanpage-enterprise',
                'name'        => 'Gói Fanpage Toàn Diện',
                'description' => 'Giải pháp tổng thể từ nội dung, quảng cáo đến chăm sóc khách hàng chuyên sâu trên Fanpage.',
                'price'       => 8000000,
                'image'       => '/template/images/services/fanpage-manage.png',
                'category'    => 'content-facebook',
                'type'        => 'service',
                'duration'    => 'month',
                'features'    => json_encode([
                    '30+ bài đăng/tháng (đa định dạng)',
                    'Thiết kế/sản xuất theo yêu cầu',
                    'Quản lý chiến dịch quảng cáo cơ bản',
                    'Phân tích & tối ưu nội dung hàng tuần',
                    'Hỗ trợ seeding, quản lý cộng đồng'
                ]),
                'status'      => 'active'
            ],
        ];

        // Use replace() to avoid duplicate entry errors by overwriting existing records.
        foreach ($services as $service) {
            $this->db->table('services')->replace($service);
        }
    }
} 