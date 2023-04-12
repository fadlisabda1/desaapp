<?php

namespace App\Models\pelayanandesa;

use CodeIgniter\Model;

class layananUmumModel extends Model
{
    protected $table      = 'layananumum';
    protected $primaryKey = 'id_layananumum';
    protected $useTimestamps = true;
    protected $useSoftDeletes = true;
    protected $allowedFields = ['judul', 'keterangan', 'created_at', 'updated_at', 'deleted_at'];
    public function getLayananUmum($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id_layananumum' => $id])->first();
    }
}
