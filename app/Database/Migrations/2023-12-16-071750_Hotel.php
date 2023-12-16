<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Hotel extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'         => ['type' => 'INT', 'constraint' => 5, 'unsigned' => true, 'auto_increment' => true],
            'name'       => ['type' => 'VARCHAR', 'constraint' => 255],
            'location'   => ['type' => 'VARCHAR', 'constraint' => 255],
            'rating'     => ['type' => 'VARCHAR', 'constraint' => 5],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('hotels');
    }

    public function down()
    {
        $this->forge->dropTable('hotels');
    }
}
