<?php

namespace App\Models;

use CodeIgniter\Model;

class beritaModel extends Model
{
    protected $table      = 'berita';
    protected $primaryKey = 'id_berita';
    protected $useTimestamps = true;
    protected $useSoftDeletes = true;
    public function getBerita($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id_berita' => $id])->first();
    }
}