<?php

namespace App\Models;

use CodeIgniter\Model;

class epasarModel extends Model
{
    protected $table      = 'epasar';
    protected $primaryKey = 'id_barang';
    protected $useTimestamps = true;
    protected $useSoftDeletes = true;
    protected $allowedFields = ['nama', 'stok', 'gambar', 'harga', 'created_at', 'updated_at', 'deleted_at'];
    public function getEpasar($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id_barang' => $id])->first();
    }
}
