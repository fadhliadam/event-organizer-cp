<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'username' => 'superadmin',
                'email' => 'superadmin@gmail.com',
                'password' => password_hash(12345678, PASSWORD_DEFAULT),
                'role_id' => 1
            ],
            [
                'username' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => password_hash(12345678, PASSWORD_DEFAULT),
                'role_id' => 2
            ],
            [
                'username' => 'user',
                'email' => 'user@gmail.com',
                'password' => password_hash(12345678, PASSWORD_DEFAULT),
                'role_id' => 3
            ],
            [
                'username' => 'user1',
                'email' => 'user1@gmail.com',
                'password' => password_hash(12345678, PASSWORD_DEFAULT),
                'role_id' => 3
            ],
        ];

        $this->db->table('users')->insertBatch($users);
    }
}
