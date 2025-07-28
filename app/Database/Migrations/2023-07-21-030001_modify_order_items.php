<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ModifyOrderItems extends Migration
{
    public function up()
    {
        // Thay đổi kiểu dữ liệu của cột product_id
        $fields = [
            'product_id' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => false,
            ]
        ];
        $this->forge->modifyColumn('order_items', $fields);
        
        // Thêm cột type
        $fields = [
            'type' => [
                'type' => 'ENUM',
                'constraint' => ['product', 'service'],
                'default' => 'product',
                'after' => 'price'
            ]
        ];
        $this->forge->addColumn('order_items', $fields);
    }

    public function down()
    {
        // Xóa cột type
        $this->forge->dropColumn('order_items', 'type');
        
        // Đổi lại kiểu dữ liệu của product_id
        $fields = [
            'product_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => false,
            ]
        ];
        $this->forge->modifyColumn('order_items', $fields);
    }
} 