<?php

namespace App\Models\perpajakan;

use CodeIgniter\Model;

class penerimaanPbbModel extends Model
{
    protected $table      = 'penerimaan_pajak_bumi_bangunan';
    protected $primaryKey = 'id_pbb';
    protected $useTimestamps = true;
    protected $useSoftDeletes = true;
    protected $allowedFields = ['nomor_objek_pajak', 'nohp', 'nama_wajib_pajak', 'total_pbb_dibayar', 'gambar', 'created_at', 'updated_at', 'deleted_at'];
    public function getData($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id_pbb' => $id])->first();
    }
    public function getDataNull()
    {
        return $this->db->table('penerimaan_pajak_bumi_bangunan')->where('deleted_at', NULL);
    }
    public function ceklisDelete()
    {
        $ceklis_button = function ($row) {
            return '
            <input type="checkbox" name="checkbox_value[]" value="' . $row['id_pbb'] . '">
            ';
        };
        return $ceklis_button;
    }
    public function button()
    {
        $aksi_button = function ($row) {
            if (in_groups('user') && user()->username == $row["nama_wajib_pajak"]) {
                return '<button type="button" name="edit" class="btn btn-warning btn-sm edit4" data-id="' . $row["id_pbb"] . '">Edit</button>&nbsp
                <button type="button" class="btn btn-danger btn-sm delete4user" data-id="' . $row["id_pbb"] . '">Delete</button>&nbsp;
                ';
            }
            if (in_groups('admin')) {
                return '<button type="button" name="edit" class="btn btn-warning btn-sm edit4" data-id="' . $row["id_pbb"] . '">Edit</button>&nbsp
                <button type="button" class="btn btn-danger btn-sm delete4" data-id="' . $row["id_pbb"] . '">Delete</button>&nbsp;<button type="button" class="btn btn-danger btn-sm deleteAllButton4">Delete All</button>&nbsp;<button type="button" onclick="selects()" class="btn btn-primary btn-sm">Ceklis All</button>
                ';
            }
        };
        return $aksi_button;
    }
    public function checkboxDelete($id)
    {
        return $this->whereIn('id_pbb', $id)->delete();
    }
}
