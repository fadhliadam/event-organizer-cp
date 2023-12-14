<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class EventSeeder extends Seeder
{
  public function run()
  {
    $faker = \Faker\Factory::create();

    $values = [];
    $event = [
        'name' => $faker->sentence(4),
        'description' => $faker->text(100),
        'banner' => 'images/events/banner.png',
        'target_audience' => 'Mahasiswa',
        'quota' => $faker->numberBetween(65, 200),
        'event_type' => false,
        'link' => $faker->url(),
        'price' => $faker->numberBetween(100, 200).'000',
        'date' => $faker->date(),
        'country' => 'Indonesia',
        'province' => 'Jawa Barat',
        'city' => 'Karawang',
        'postal_code' => '41363',
        'street' => 'Jl. HS. Ronggowaluyo, Telukjambe Timur, Karawang',
        'host' => $faker->userName(),
        'host_email' => $faker->email(),
        'required_approval' => true,
        'is_completed' => false,
        'category_id' => $faker->numberBetween(1, 5),
        'owner' => 2,
    ];
    for($i = 0; $i < 10; $i++) {
      $values[] = $event;
    };

    $this->db->table('events')->insertBatch($values);
  }
}
