<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Booking extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'             => ['type' => 'INT', 'constraint' => 5, 'unsigned' => true, 'auto_increment' => true],
            'user_id'        => ['type' => 'INT', 'constraint' => 5, 'unsigned' => true],
            'hotel_id'       => ['type' => 'INT', 'constraint' => 5, 'unsigned' => true],
            'room_number'    => ['type' => 'INT', 'constraint' => 5],
            'check_in_date'  => ['type' => 'DATE'],
            'check_out_date' => ['type' => 'DATE'],
            'created_at'     => ['type' => 'DATETIME', 'null' => true],
            'updated_at'     => ['type' => 'DATETIME', 'null' => true],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('user_id', 'users', 'id');
        $this->forge->addForeignKey('hotel_id', 'hotels', 'id');
        $this->forge->createTable('bookings');
    }

    public function down()
    {
        $this->forge->dropTable('bookings');
    }
}
