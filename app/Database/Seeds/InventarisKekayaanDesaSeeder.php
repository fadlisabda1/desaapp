<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class InventarisKekayaanDesaSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'jenis_barang' => 'cuci parit perbatasan rw 1 dan rw 8 dusun iv',
            'lokasi'    => 'perbatasan rw 1 dan rw 8',
            'jumlah'    => '205x1,30x1,5 meter',
            'sumber_pembiayaan'    => 'Dana Desa',
            'perkiraan_biaya'    => '8000000',
            'created_at' => Time::now(),
            'updated_at' => null,
            'deleted_at' => null,
        ];
        $this->db->table('inventaris_kekayaan_desa')->insert($data);
    }
}
