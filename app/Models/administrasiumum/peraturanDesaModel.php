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

    public function button()
    {
        $aksi_button = function ($row) {
            return '
            <button type="button" name="edit" class="btn btn-warning btn-sm edit" data-id="' . $row["id_peraturan_desa"] . '">Edit</button>&nbsp
            <a href="peraturanDesaController/delete/' . $row["id_peraturan_desa"] . '" class="btn btn-danger btn-sm tombol-hapus">Hapus</a>
            ';
        };
        return $aksi_button;
    }
}
