<?php

namespace App\Models;

use CodeIgniter\Model;

class transaksiModel extends Model
{
    protected $table      = 'transaksi';
    protected $primaryKey = 'id_transaksi';
    protected $useTimestamps = true;
    protected $useSoftDeletes = true;
    protected $allowedFields = ['id_barang', 'username', 'saldo', 'jumlahbarang', 'nohp', 'pembayaran', 'created_at', 'updated_at', 'deleted_at'];
    public function getTransaksi($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id_transaksi' => $id])->first();
    }
    public function getAdmin($username = false)
    {
        return $this->where(['username' => $username])->first();
    }
}
