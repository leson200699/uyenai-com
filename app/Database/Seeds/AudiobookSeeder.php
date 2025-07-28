<?php
namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AudiobookSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'title' => 'Đắc Nhân Tâm',
                'author' => 'Dale Carnegie',
                'description' => 'Cuốn sách kinh điển về nghệ thuật giao tiếp và ứng xử.',
                'audio_file' => 'writable/uploads/audiobooks/dacnhantam.mp3',
                'cover_image' => 'writable/uploads/audiobooks/dacnhantam.jpg',
                'status' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'title' => 'Nhà Giả Kim',
                'author' => 'Paulo Coelho',
                'description' => 'Hành trình phiêu lưu và khám phá bản thân.',
                'audio_file' => 'writable/uploads/audiobooks/nhagiakim.mp3',
                'cover_image' => 'writable/uploads/audiobooks/nhagiakim.jpg',
                'status' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'title' => 'Tư Duy Nhanh Và Chậm',
                'author' => 'Daniel Kahneman',
                'description' => 'Khám phá hai hệ thống tư duy của con người.',
                'audio_file' => 'writable/uploads/audiobooks/tuduynhanhcham.mp3',
                'cover_image' => 'writable/uploads/audiobooks/tuduynhanhcham.jpg',
                'status' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'title' => 'Sapiens: Lược Sử Loài Người',
                'author' => 'Yuval Noah Harari',
                'description' => 'Lịch sử phát triển của loài người từ thời sơ khai.',
                'audio_file' => 'writable/uploads/audiobooks/sapiens.mp3',
                'cover_image' => 'writable/uploads/audiobooks/sapiens.jpg',
                'status' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'title' => 'Atomic Habits',
                'author' => 'James Clear',
                'description' => 'Thay đổi thói quen nhỏ để tạo nên thành công lớn.',
                'audio_file' => 'writable/uploads/audiobooks/atomichabits.mp3',
                'cover_image' => 'writable/uploads/audiobooks/atomichabits.jpg',
                'status' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ];
        $this->db->table('audiobooks')->insertBatch($data);
    }
} 