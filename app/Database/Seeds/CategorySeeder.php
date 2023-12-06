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
                'name' => 'Manufaktur',
            ],
            [
                'id' => 2,
                'name' => 'Keuangan',
            ],
            [
                'id' => 3,
                'name' => 'Teknologi Informasi',
            ],
            [
                'id' => 4,
                'name' => 'Pertanian',
            ],
            [
                'id' => 5,
                'name' => 'Transportasi',
            ],
        ];
        $this->db->table('categories')->insertBatch($categories);
    }
}
