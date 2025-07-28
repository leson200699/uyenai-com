<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class NewsSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'title' => 'Case Study: Tăng 300% traffic cho website chỉ trong 3 tháng với SEO tổng thể',
                'content' => 'Phân tích chi tiết chiến lược SEO thành công của chúng tôi cho một khách hàng trong lĩnh vực bán lẻ.',
                'category_id' => 1,
                'is_hot' => true,
                'created_at' => '2025-07-15 10:00:00',
                'updated_at' => '2025-07-15 10:00:00',
            ],
            [
                'title' => 'Top 5 công cụ AI giúp viết content nhanh gấp 10 lần',
                'content' => 'Khám phá các công cụ AI mạnh mẽ giúp tăng năng suất viết content cho doanh nghiệp và cá nhân.',
                'category_id' => 3,
                'is_hot' => false,
                'created_at' => '2025-07-12 09:00:00',
                'updated_at' => '2025-07-12 09:00:00',
            ],
            [
                'title' => 'Hướng dẫn tối ưu quảng cáo Facebook cho người mới bắt đầu',
                'content' => 'Những chiến lược và kỹ thuật cơ bản giúp người mới có thể chạy quảng cáo Facebook hiệu quả.',
                'category_id' => 2,
                'is_hot' => false,
                'created_at' => '2025-07-10 14:00:00',
                'updated_at' => '2025-07-10 14:00:00',
            ],
            [
                'title' => 'Checklist 20 yếu tố SEO On-page quan trọng nhất 2025',
                'content' => 'Danh sách toàn diện các yếu tố SEO On-page cần tối ưu để cải thiện thứ hạng website.',
                'category_id' => 1,
                'is_hot' => false,
                'created_at' => '2025-07-08 11:00:00',
                'updated_at' => '2025-07-08 11:00:00',
            ],
            [
                'title' => 'Tăng tốc website: 10 mẹo tối ưu tốc độ tải trang',
                'content' => 'Các phương pháp giúp website của bạn tải nhanh hơn, giữ chân khách hàng tốt hơn.',
                'category_id' => 5,
                'is_hot' => false,
                'created_at' => '2025-07-05 16:00:00',
                'updated_at' => '2025-07-05 16:00:00',
            ],
            [
                'title' => 'Kinh doanh online: 7 bí quyết thành công năm 2025',
                'content' => 'Những bí quyết giúp bạn xây dựng và phát triển kinh doanh online hiệu quả.',
                'category_id' => 4,
                'is_hot' => false,
                'created_at' => '2025-07-03 13:00:00',
                'updated_at' => '2025-07-03 13:00:00',
            ],
            [
                'title' => 'Thiết kế web hiện đại: Xu hướng nổi bật 2025',
                'content' => 'Cập nhật các xu hướng thiết kế web mới nhất giúp website của bạn nổi bật.',
                'category_id' => 6,
                'is_hot' => false,
                'created_at' => '2025-07-01 08:00:00',
                'updated_at' => '2025-07-01 08:00:00',
            ],
        ];

        // Chèn dữ liệu vào bảng news
        $this->db->table('news')->insertBatch($data);
    }
}
