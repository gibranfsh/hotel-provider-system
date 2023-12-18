<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Payment extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
			'bill_total'       => [
				'type'           => 'INT'
			],
			'payment_method'      => [
				'type'           => 'ENUM',
				'constraint'     => ['Card', 'Debit']
			],
			'payment_status' => [
				'type'           => 'ENUM',
				'constraint'     => ['Paid', 'Unpaid']
			],
			'created_at' => [
                'type'       => 'DATETIME',
                'null'       => true,
            ],
            'updated_at' => [
                'type'       => 'DATETIME',
                'null'       => true,
            ],
            'deleted_at' => [
                'type'       => 'DATETIME',
                'null'       => true,
            ],
		]);

		$this->forge->addKey('id', TRUE);

		$this->forge->createTable('payments', TRUE);
    }

    public function down()
    {
        //
        $this->forge->dropTable('payments');
    }
}
