<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        // $this->db->table('users')->insert(
        //     [
        //         'username' => 'superadmin',
        //         'email' => 'superadmin@gmail.com',
        //         'role_id' => 1
        //     ],
        // );

        $data = [
            [
                'username' => 'superadmin',
                'email' => 'superadmin@gmail.com',
                'role_id' => 1
            ],
            [
                'username' => 'admin',
                'email' => 'admin@gmail.com',
                'role_id' => 2
            ],
        ];
        $this->db->table('users')->insertBatch($data);
    }
}
