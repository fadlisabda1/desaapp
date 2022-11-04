<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class PeraturanDesa extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create('id_ID');
        for ($i = 0; $i < 100; $i++) {
            $data =
                [
                    'nomor_tgl_peraturan' => $faker->city,
                    'tentang'    => $faker->country,
                    'uraiansingkat'    => $faker->streetName,
                    'created_at' => Time::now(),
                    'updated_at' => NULL,
                    'deleted_at' => NULL,
                ];
            $this->db->table('peraturan_desa')->insert($data);
        }
    }
}
