<?php

namespace App\Models\pelayanandesa;

use CodeIgniter\Model;

class layananUmumModel extends Model
{
    protected $table      = 'layananumum';
    protected $primaryKey = 'id_layananumum';
    protected $useTimestamps = true;
    protected $useSoftDeletes = true;
    protected $allowedFields = ['judul', 'nohp', 'usernameoremail', 'file', 'created_at', 'updated_at', 'deleted_at'];
    public function getDataNull()
    {
        return $this->db->table('layananumum')->where('deleted_at', NULL);
    }
    public function getData($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id_layananumum' => $id])->first();
    }
    public function ceklisDelete()
    {
        $ceklis_button = function ($row) {
            return '
            <input type="checkbox" name="checkbox_value[]" value="' . $row['id_layananumum'] . '">
            ';
        };
        return $ceklis_button;
    }
    public function button()
    {
        $aksi_button = function ($row) {
            if (in_groups('user') && user()->username == $row["usernameoremail"]) {
                return '<button type="button" name="edit" class="btn btn-warning btn-sm editLayananUmum" data-id="' . $row["id_layananumum"] . '">Edit</button>&nbsp;
                <button type="button" class="btn btn-danger btn-sm deleteLayananUmum" data-id="' . $row["id_layananumum"] . '">Delete</button>&nbsp;
                ';
            }
            if (in_groups('admin')) {
                return '
                <button type="button" name="edit" class="btn btn-warning btn-sm editLayananUmum" data-id="' . $row["id_layananumum"] . '">Edit</button>&nbsp;
                <button type="button" class="btn btn-danger btn-sm deleteLayananUmum" data-id="' . $row["id_layananumum"] . '">Delete</button>&nbsp;<button type="button" class="btn btn-danger btn-sm deleteAllLayanan">Delete All</button>&nbsp;<button type="button" onclick="selects()" class="btn btn-primary btn-sm">Ceklis All</button>
                ';
            }
        };
        return $aksi_button;
    }
    public function checkboxDelete($id)
    {
        return $this->whereIn('id_layananumum', $id)->delete();
    }
}
