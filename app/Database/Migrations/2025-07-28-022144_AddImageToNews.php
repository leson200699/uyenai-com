<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddImageToNews extends Migration
{
    public function up()
    {
        $this->forge->addColumn('news', [
            'image' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
                'after' => 'is_hot'
            ]
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('news', 'image');
    }
}
