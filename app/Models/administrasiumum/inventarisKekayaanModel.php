<?php

namespace App\Models\administrasiumum;

use CodeIgniter\Model;

class inventarisKekayaanModel extends Model
{
    protected $table = 'inventaris_kekayaan_desa';
    protected $primaryKey = 'id_inventaris_kekayaan_desa';
    protected $useTimestamps = true;
    protected $useSoftDeletes = true;
    protected $allowedFields = ['jenis_barang', 'lokasi', 'jumlah', 'sumber_pembiayaan', 'keadaan_barang_bangunan_awal_tahun', 'keadaan_barang_bangunan_akhir_tahun', 'perkiraan_biaya', 'ket'];

    public function getDataNull()
    {
        return $this->db->table('inventaris_kekayaan_desa')->where('deleted_at', NULL);
    }

    public function getDataAll()
    {
        return $this->db->table('inventaris_kekayaan_desa');
    }

    public function button()
    {
        $aksi_button = function ($row) {
            if (in_groups('admin')) {
                return '
                <button type="button" name="edit" class="btn btn-warning btn-sm edit2" data-id="' . $row["id_inventaris_kekayaan_desa"] . '">Edit</button>&nbsp;
                <button type="button" class="btn btn-danger btn-sm delete2" data-id="' . $row["id_inventaris_kekayaan_desa"] . '">Delete</button>&nbsp;
                ';
            }
        };
        return $aksi_button;
    }
}
