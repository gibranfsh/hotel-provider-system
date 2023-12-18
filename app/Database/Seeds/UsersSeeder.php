<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UsersSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'fullName'    => 'Namaku Admin Hoteloka',
                'email'    => 'admin@hoteloka.com',
                'password' => password_hash('admin', PASSWORD_DEFAULT),
                'role' => 'ADMIN',
                'phoneNumber'    => '081234567890',
            ],
            [
                'fullName'    => 'Namaku Customer Hoteloka',
                'email'    => 'customer@hoteloka.com',
                'password' => password_hash('customer', PASSWORD_DEFAULT),
                'role' => 'CUSTOMER',
                'phoneNumber'    => '081234567890',
            ],
            [
                'fullName'    => 'GIN Hotel',
                'email'    => 'ginhotel@hoteloka.com',
                'password' => password_hash('ginhotelxhoteloka', PASSWORD_DEFAULT),
                'role' => 'HOTEL',
                'phoneNumber'    => '081234567890',
            ]
        ];

        // Insert data into the table
        $this->db->table('users')->insertBatch($data);
    }
}
