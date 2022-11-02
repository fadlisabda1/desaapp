<?php

namespace App\Models\administrasiumum;

use CodeIgniter\Model;

class inventarisKekayaanModel extends Model
{
    protected $table = 'inventaris_kekayaan_desa';
    protected $primaryKey = 'id_inventaris_kekayaan_desa';
    protected $useTimestamps = true;
    protected $useSoftDeletes = true;
    protected $allowedFields = ['jenis_barang', 'lokasi', 'jumlah', 'sumber_pembiayaan', 'perkiraan_biaya'];
    public function getInventarisKekayaan($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id_inventaris_kekayaan_desa' => $id])->first();
    }
}
