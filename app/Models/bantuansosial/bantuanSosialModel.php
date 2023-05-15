<?php

namespace App\Models\bantuansosial;

use CodeIgniter\Model;

class bantuanSosialModel extends Model
{
    protected $table = 'bantuansosial';
    protected $primaryKey = 'id_bantuansosial';
    protected $useTimestamps = true;
    protected $useSoftDeletes = true;
    protected $allowedFields = ['nomorktp', 'namapenerima', 'jenisbantuan', 'statuspenerimaan', 'jeniskelamin', 'dusun', 'rt', 'created_at', 'updated_at', 'deleted_at'];
    public function getDataNull()
    {
        return $this->db->table('bantuansosial')->where('deleted_at', NULL);
    }

    public function getDataAll()
    {
        return $this->findAll();
    }

    public function ceklisDelete()
    {
        $ceklis_button = function ($row) {
            return '
            <input type="checkbox" name="checkbox_value[]" value="' . $row['id_bantuansosial'] . '">
            ';
        };
        return $ceklis_button;
    }

    public function button()
    {
        $aksi_button = function ($row) {
            if (in_groups('admin')) {
                return '
                <button type="button" name="edit" class="btn btn-warning btn-sm edit5" data-id="' . $row["id_bantuansosial"] . '">Edit</button>&nbsp;
                <button type="button" class="btn btn-danger btn-sm delete5" data-id="' . $row["id_bantuansosial"] . '">Delete</button>&nbsp;<button type="button" class="btn btn-danger btn-sm deleteAllButton5">Delete All</button>&nbsp;<button type="button" onclick="selects()" class="btn btn-primary btn-sm">Ceklis All</button>
                ';
            }
        };
        return $aksi_button;
    }

    public function checkboxDelete($id)
    {
        return $this->whereIn('id_bantuansosial', $id)->delete();
    }
}
