<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class HotelsSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'name' => 'GIN Hotel',
                'description' => 'A beautiful hotel, located in the heart of Jakarta. A luxury pool and a five star restaurant.',
                'location' => 'Jakarta',
                'rating' => '4.9',
                'status' => 'AVAILABLE',
                'created_at' => '2021-01-01 00:00:00',
                'updated_at' => '2021-01-01 00:00:00',
            ],
            [
                'name' => 'Ashwa Hotel',
                'location' => 'Bekasi',
                'description' => 'A wonderful hotel in Bekasi. A mediocre pool and a three star restaurant.',
                'status' => 'UNAVAILABLE',
                'rating' => '4.1',
                'created_at' => '2021-01-01 00:00:00',
                'updated_at' => '2021-01-01 00:00:00',
            ],
            // Add 8 more hotels
            [
                'name' => 'Klugee Hotel',
                'location' => 'Bandung',
                'description' => 'A wonderful hotel in Bandung. A good pool and a four star restaurant.',
                'status' => 'UNAVAILABLE',
                'rating' => '4.7',
                'created_at' => '2021-01-01 00:00:00',
                'updated_at' => '2021-01-01 00:00:00',
            ],
            [
                'name' => 'Mega Hotel',
                'location' => 'Surabaya',
                'description' => 'A wonderful hotel in Surabaya. A mediocre pool and a three star restaurant.',
                'status' => 'UNAVAILABLE',
                'rating' => '4.5',
                'created_at' => '2021-01-01 00:00:00',
                'updated_at' => '2021-01-01 00:00:00',
            ],
            [
                'name' => 'Triguna Hotel',
                'location' => 'Bali',
                'description' => 'A wonderful hotel in Bali. A mediocre pool and a three star restaurant.',
                'status' => 'UNAVAILABLE',
                'rating' => '4.5',
                'created_at' => '2021-01-01 00:00:00',
                'updated_at' => '2021-01-01 00:00:00',
            ],
            [
                'name' => 'SingPentingIso Hotel',
                'location' => 'Yogyakarta',
                'description' => 'A wonderful hotel in Yogyakarta. A mediocre pool and a three star restaurant.',
                'status' => 'UNAVAILABLE',
                'rating' => '4',
                'created_at' => '2021-01-01 00:00:00',
                'updated_at' => '2021-01-01 00:00:00',
            ],
            [
                'name' => 'Kappa Hotel',
                'location' => 'Medan',
                'description' => 'A wonderful hotel in Medan. A mediocre pool and a three star restaurant.',
                'status' => 'UNAVAILABLE',
                'rating' => '3.9',
                'created_at' => '2021-01-01 00:00:00',
                'updated_at' => '2021-01-01 00:00:00',
            ],
        ];

        // Using Query Builder to insert data
        $this->db->table('hotels')->insertBatch($data);
    }
}
