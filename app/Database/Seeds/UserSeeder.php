<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $this->db->table('users')->insert([
            'username' => 'superadmin',
            'email' => 'superadmin@gmail.com',
            'role_id' => 1
        ]);
    }
}
