<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class NewsCategorySeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'name' => 'SEO',
                'created_at' => '2025-07-01 00:00:00',
                'updated_at' => '2025-07-01 00:00:00',
            ],
            [
                'name' => 'Marketing',
                'created_at' => '2025-07-01 00:00:00',
                'updated_at' => '2025-07-01 00:00:00',
            ],
            [
                'name' => 'AI',
                'created_at' => '2025-07-01 00:00:00',
                'updated_at' => '2025-07-01 00:00:00',
            ],
            [
                'name' => 'Kinh Doanh',
                'created_at' => '2025-07-01 00:00:00',
                'updated_at' => '2025-07-01 00:00:00',
            ],
            [
                'name' => 'Hosting',
                'created_at' => '2025-07-01 00:00:00',
                'updated_at' => '2025-07-01 00:00:00',
            ],
            [
                'name' => 'Web Design',
                'created_at' => '2025-07-01 00:00:00',
                'updated_at' => '2025-07-01 00:00:00',
            ],
        ];
        $this->db->table('news_categories')->insertBatch($data);
    }
} 