<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class EventSeeder extends Seeder
{
    public function run()
    {
        $event = [
          'id' => 1,
          'name' => 'Ekosistem Pengembangan Perangkat Lunak',
          'description' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ab est, nam reprehenderit quisquam perspiciatis error cumque amet, vero tempora rem reiciendis accusantium laboriosam cum quibusdam fuga itaque ipsa modi eaque.',
          'banner' => 'images/events/banner.png',
          'target_audience' => 'Mahasiswa',
          'quota' => 100,
          'event_type' => false,
          'link' => 'https://www.google.co.id/',
          'price' => 0,
          'date' => date("Y-m-d"),
          'country' => 'Indonesia',
          'province' => 'Jawa Barat',
          'city' => 'Karawang',
          'postal_code' => '41363',
          'street' => 'Jl. HS. Ronggowaluyo, Telukjambe Timur, Karawang',
          'host' => 'Ardianto',
          'host_email' => 'ardi@gmail.com',
          'required_approval' => true,
          'category_id' => 3,
          'owner' => 2
        ];
        $this->db->table('events')->insert($event);
    }
}
