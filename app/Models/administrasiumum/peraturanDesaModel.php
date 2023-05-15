<?php

namespace App\Models\administrasiumum;

use CodeIgniter\Model;

class peraturanDesaModel extends Model
{
    protected $table = 'peraturan_desa';
    protected $primaryKey = 'id_peraturan_desa';
    protected $useTimestamps = true;
    protected $useSoftDeletes = true;
    protected $allowedFields = ['nomor_tgl_peraturan', 'tentang', 'uraiansingkat', 'created_at', 'updated_at', 'deleted_at'];
    public function getDataNull()
    {
        return $this->db->table('peraturan_desa')->where('deleted_at', NULL);
    }

    public function getDataAll()
    {
        return $this->findAll();
    }

    public function ceklisDelete()
    {
        $ceklis_button = function ($row) {
            return '
            <input type="checkbox" name="checkbox_value[]" value="' . $row['id_peraturan_desa'] . '">
            ';
        };
        return $ceklis_button;
    }

    public function button()
    {
        $aksi_button = function ($row) {
            if (in_groups('admin')) {
                return '
                <button type="button" name="edit" class="btn btn-warning btn-sm edit" data-id="' . $row["id_peraturan_desa"] . '">Edit</button>&nbsp;
                <button type="button" class="btn btn-danger btn-sm delete" data-id="' . $row["id_peraturan_desa"] . '">Delete</button>&nbsp;<button type="button" class="btn btn-danger btn-sm deleteAllButton">Delete All</button>&nbsp;<button type="button" onclick="selects()" class="btn btn-primary btn-sm">Ceklis All</button>
                ';
            }
        };
        return $aksi_button;
    }

    public function checkboxDelete($id)
    {
        return $this->whereIn('id_peraturan_desa', $id)->delete();
    }
}
