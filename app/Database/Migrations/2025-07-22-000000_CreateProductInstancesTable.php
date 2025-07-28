<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateProductInstancesTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'product_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'instance_data' => [
                'type' => 'TEXT',
                'comment' => 'JSON containing account credentials like email, password, notes, etc.',
            ],
            'status' => [
                'type' => 'ENUM',
                'constraint' => ['available', 'sold', 'revoked'],
                'default' => 'available',
            ],
            'order_item_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => true,
            ],
            'user_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => true,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('product_id', 'products', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('order_item_id', 'order_items', 'id', 'SET NULL', 'SET NULL');
        $this->forge->addForeignKey('user_id', 'users', 'id', 'SET NULL', 'SET NULL');
        $this->forge->createTable('product_instances');
    }

    public function down()
    {
        $this->forge->dropTable('product_instances');
    }
} 