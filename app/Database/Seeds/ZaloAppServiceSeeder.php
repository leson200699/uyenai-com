<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ZaloAppServiceSeeder extends Seeder
{
    public function run()
    {
        // Clean up existing Zalo App services to prevent duplicate entries
        $this->db->table('services')->where('category', 'zalo-app')->delete();
        $this->db->table('services')->where('category', 'zalo-app-management')->delete();
        
        $services = [
            [
                'id'          => 'zalo-app-basic',
                'name'        => 'Gói Cơ Bản',
                'description' => 'Phát triển Zalo Mini App với các tính năng cơ bản, phù hợp cho cửa hàng nhỏ và cá nhân.',
                'price'       => 15000000,
                'image'       => '/template/images/services/zalo-app-1.png',
                'category'    => 'zalo-app',
                'type'        => 'service',
                'duration'    => 'project',
                'features'    => json_encode([
                    'Tối đa 5 màn hình chức năng',
                    'Thiết kế theo mẫu có sẵn',
                    'Tích hợp ZaloPay cơ bản',
                    'Hiển thị danh sách sản phẩm',
                    'Hỗ trợ kỹ thuật 1 tháng'
                ]),
                'status'      => 'active'
            ],
            [
                'id'          => 'zalo-app-pro',
                'name'        => 'Gói Chuyên Nghiệp',
                'description' => 'Giải pháp tối ưu cho doanh nghiệp vừa và nhỏ muốn tối ưu hóa trải nghiệm người dùng và bán hàng.',
                'price'       => 35000000,
                'image'       => '/template/images/services/zalo-app-2.png',
                'category'    => 'zalo-app',
                'type'        => 'service',
                'duration'    => 'project',
                'features'    => json_encode([
                    'Tối đa 10 màn hình chức năng',
                    'Thiết kế tùy chỉnh theo thương hiệu',
                    'Tích hợp ZaloPay nâng cao (hoàn tiền, khuyến mãi)',
                    'Quản lý giỏ hàng & đơn hàng',
                    'Thông báo đẩy (Push Notification)',
                    'Hỗ trợ kỹ thuật 3 tháng'
                ]),
                'status'      => 'active'
            ],
            [
                'id'          => 'zalo-app-enterprise',
                'name'        => 'Gói Doanh Nghiệp',
                'description' => 'Giải pháp toàn diện với các tính năng phức tạp, tích hợp hệ thống và yêu cầu riêng biệt.',
                'price'       => 70000000,
                'image'       => '/template/images/services/zalo-app-3.png',
                'category'    => 'zalo-app',
                'type'        => 'service',
                'duration'    => 'project',
                'features'    => json_encode([
                    'Không giới hạn màn hình chức năng',
                    'Thiết kế độc quyền & UX/UI chuyên sâu',
                    'Tích hợp API với hệ thống bên ngoài (CRM, ERP)',
                    'Chương trình khách hàng thân thiết',
                    'Phân tích & báo cáo chuyên sâu',
                    'Hỗ trợ ưu tiên & tư vấn chiến lược'
                ]),
                'status'      => 'active'
            ],
            [
                'id'          => 'zalo-app-maintain',
                'name'        => 'Dịch vụ Bảo trì & Vận hành',
                'description' => 'Đảm bảo Mini App của bạn luôn hoạt động ổn định, cập nhật và an toàn.',
                'price'       => 2000000,
                'image'       => '/template/images/services/zalo-app-4.png',
                'category'    => 'zalo-app-management',
                'type'        => 'service',
                'duration'    => 'month',
                'features'    => json_encode([
                    'Sao lưu dữ liệu hàng tuần',
                    'Giám sát hiệu suất 24/7',
                    'Cập nhật phiên bản & vá lỗi bảo mật',
                    'Hỗ trợ xử lý sự cố nhanh',
                ]),
                'status'      => 'active'
            ]
        ];

        foreach ($services as $service) {
            $this->db->table('services')->insert($service);
        }
    }
} 