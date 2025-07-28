<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProductInstanceSeeder extends Seeder
{
    public function run()
    {
        $productModel = new \App\Models\ProductModel();
        
        // Find ChatGPT Plus product
        $chatGptProduct = $productModel->where('name', 'ChatGPT Plus')->first();

        if ($chatGptProduct) {
            $instances = [
                // Instance 1 for ChatGPT Plus
                [
                    'product_id' => $chatGptProduct['id'],
                    'instance_data' => json_encode([
                        'email' => 'chatgpt_user1@email.com',
                        'password' => 'SecurePass1!',
                        'notes' => 'Subscription valid until 2025-12-31'
                    ]),
                    'status' => 'available',
                ],
                // Instance 2 for ChatGPT Plus
                [
                    'product_id' => $chatGptProduct['id'],
                    'instance_data' => json_encode([
                        'email' => 'chatgpt_user2@email.com',
                        'password' => 'AnotherSecurePass2@',
                        'notes' => 'Handle with care'
                    ]),
                    'status' => 'available',
                ],
            ];

            foreach ($instances as $instance) {
                // To avoid duplicates, check if an instance with this exact data exists
                $exists = $this->db->table('product_instances')
                                   ->where('product_id', $instance['product_id'])
                                   ->where('instance_data', $instance['instance_data'])
                                   ->countAllResults() > 0;
                
                if (!$exists) {
                    $this->db->table('product_instances')->insert($instance);
                }
            }
        }
    }
} 