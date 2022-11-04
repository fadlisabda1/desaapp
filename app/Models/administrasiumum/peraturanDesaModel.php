<?php

namespace App\Models\administrasiumum;

use CodeIgniter\Model;

class peraturanDesaModel extends Model
{
    protected $table = 'peraturan_desa';
    protected $primaryKey = 'id_peraturan_desa';
    protected $useTimestamps = true;
    protected $useSoftDeletes = true;
    protected $allowedFields = ['nomor_tgl_peraturan', 'tentang', 'uraiansingkat'];
    public function getPeraturan($id = false)
    {
        if ($id == false) {
            return $this->db->table('peraturan_desa');
        }
        return $this->where(['id_peraturan_desa' => $id])->first();
    }
}
