<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $categories = [
            [
                'id' => 1,
                'name' => 'Seminar',
            ],
            [
                'id' => 2,
                'name' => 'Lomba',
            ],
            [
                'id' => 3,
                'name' => 'Musik',
            ],
            [
                'id' => 4,
                'name' => 'Kaderisasi',
            ],
            [
                'id' => 5,
                'name' => 'Pelatihan',
            ],
            [
                'id' => 6,
                'name' => 'Forum',
            ],
        ];
        $this->db->table('categories')->insertBatch($categories);
    }
}
