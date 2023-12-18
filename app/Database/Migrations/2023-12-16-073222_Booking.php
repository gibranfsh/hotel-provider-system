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
            'room_id'       => ['type' => 'INT', 'constraint' => 5, 'unsigned' => true],
            'room_number'    => ['type' => 'INT', 'constraint' => 5],
            'room_floor'    => ['type' => 'INT', 'constraint' => 5],
            'room_type'    => ['type' => 'ENUM', 'constraint' => ['Deluxe', 'Superior', 'Family', 'Suite']],
            'check_in_date'  => ['type' => 'DATE'],
            'check_out_date' => ['type' => 'DATE'],
            'payment_id'    => ['type' => 'INT', 'constraint' => 5, 'unsigned' => true, 'null' => true],
            'created_at'     => ['type' => 'DATETIME', 'null' => true],
            'updated_at'     => ['type' => 'DATETIME', 'null' => true],
        ]);

        // turn on ON UPDATE CASCADE AND ON DELETE CASCADE 
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'CASCADE', 'fk_bookings_users');
        $this->forge->addForeignKey('hotel_id', 'hotels', 'id', 'CASCADE', 'CASCADE', 'fk_bookings_hotels');
        $this->forge->addForeignKey('payment_id', 'payments', 'id', 'CASCADE', 'CASCADE', 'fk_bookings_payments');
        $this->forge->createTable('bookings');
    }

    public function down()
    {
        $this->forge->dropTable('bookings');
    }
}
