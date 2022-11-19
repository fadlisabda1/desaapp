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
    public function getDataNull()
    {
        return $this->db->table('peraturan_desa')->where('deleted_at', NULL);
    }

    public function getDataAll()
    {
        return $this->findAll();
    }

    public function ceklisDeleteButton()
    {
        $ceklis_button = function ($row) {
            return '
            <input type="checkbox" class="text-center" name="checkbox_value[]" value="' . $row["id_peraturan_desa"] . '">
            ';
        };
        return $ceklis_button;
    }

    public function button()
    {
        $aksi_button = function ($row) {
            return '
            <button type="button" name="edit" class="btn btn-warning btn-sm edit" data-id="' . $row["id_peraturan_desa"] . '">Edit</button>&nbsp;
            <button type="button" class="btn btn-danger btn-sm delete" data-id="' . $row["id_peraturan_desa"] . '">Delete</button>
            ';
        };
        return $aksi_button;
    }

    public function checkboxDelete($arrCeklisId)
    {
        $hapus = $this->whereIn('id_peraturan_desa', $arrCeklisId);
        return $this->delete($hapus);
    }
}
