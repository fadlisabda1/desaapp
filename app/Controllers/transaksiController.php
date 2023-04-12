<?php

namespace App\Controllers;

class transaksiController extends BaseController
{
    protected $db, $builder;
    public function __construct()
    {
        $this->db      = \Config\Database::connect();
        $this->builder = $this->db->table('transaksi');
    }

    public function index()
    {
        $this->builder->select('transaksi.id_barang,nama');
        $this->builder->join('epasar', 'epasar.id_barang = transaksi.id_barang');
        $this->builder->where('transaksi.deleted_at', NULL);
        $query = $this->builder->get();
        $transaksi = [
            'title' => 'Transaksi Detail | Desa Tanah Merah',
            'data' => $this->transaksiModel->findAll(),
            'barang' => $query->getResult()
        ];
        return view('transaksiView/index', $transaksi);
    }

    public function create($id)
    {
        $data = [
            'title' => 'Form Booking Barang',
            'validation' => \Config\Services::validation(),
            'dataepasar' => $this->epasarModel->getEpasar($id)
        ];

        return view('transaksiView/create', $data);
    }

    public function save()
    {
        if (!$this->validate([
            'jumlahbarang' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus di isi.'
                ]
            ],
            'nohp' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus di isi.'
                ]
            ],
        ])) {
            return redirect()->to('/transaksiController/create' . $this->request->getVar('id'))->withInput();
        }
        $this->transaksiModel->save([
            'id_barang' => $this->request->getVar('idbarang'),
            'username' => $this->request->getVar('username'),
            'saldo' => ($this->request->getVar('pembayaran') == 'antar') ? $this->request->getVar('harga') * $this->request->getVar('jumlahbarang') + 10000 : $this->request->getVar('harga') * $this->request->getVar('jumlahbarang'),
            'jumlahbarang' => $this->request->getVar('jumlahbarang'),
            'nohp' => $this->request->getVar('nohp'),
            'pembayaran' => $this->request->getVar('pembayaran')
        ]);
        $hasil = 0;
        foreach ($this->transaksiModel->getTransaksi() as $dt) {
            if ($dt['username'] != 'admin') {
                $hasil += $dt['saldo'];
            }
        }
        session()->setFlashData('pesan', 'Ditambahkan.');
        return redirect()->to('/transaksiController/index');
    }

    public function edit($idBarang, $idTransaksi)
    {
        $data = [
            'title' => 'Form Ubah Data Barang',
            'validation' => \Config\Services::validation(),
            'transaksi' => $this->transaksiModel->getTransaksi($idTransaksi),
            'dataepasar' => $this->epasarModel->getEpasar($idBarang)
        ];

        return view('transaksiView/edit', $data);
    }

    public function update($id)
    {
        if (!$this->validate([
            'jumlahbarang' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus di isi.'
                ]
            ],
            'nohp' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus di isi.'
                ]
            ],
        ])) {
            return redirect()->to('/transaksiController/edit/' . $this->request->getVar('idbarang') . '/' . $id)->withInput();
        }
        $this->transaksiModel->save([
            'id_transaksi' => $id,
            'username' => $this->request->getVar('username'),
            'saldo' => ($this->request->getVar('pembayaran') == 'antar') ? $this->request->getVar('harga') * $this->request->getVar('jumlahbarang') + 10000 : $this->request->getVar('harga') * $this->request->getVar('jumlahbarang'),
            'jumlahbarang' => $this->request->getVar('jumlahbarang'),
            'nohp' => $this->request->getVar('nohp'),
            'pembayaran' => $this->request->getVar('pembayaran')
        ]);
        session()->setFlashData('pesan', 'Diubah.');
        return redirect()->to('/transaksiController/index');
    }

    public function delete($id)
    {
        $hasil = $this->transaksiModel->getAdmin("admin")['saldo'] += $this->transaksiModel->getTransaksi($id)['saldo'];
        $this->db->transBegin();
        $sql1 = "UPDATE transaksi SET saldo = " . $hasil . " WHERE username = 'admin'";
        $this->db->query($sql1);
        $sql2 = "UPDATE epasar SET stok = stok - " . $this->transaksiModel->getTransaksi($id)['jumlahbarang'] . " WHERE id_barang = " . "'" . $this->transaksiModel->getTransaksi($id)['id_barang'] . "'";
        $this->db->query($sql2);
        if ($this->db->transStatus() === false) {
            $this->db->transRollback();
        } else {
            $this->db->transCommit();
        }
        $this->transaksiModel->delete($id);
        session()->setFlashData('pesan', 'Dihapus');
        return redirect()->to('/transaksiController/index');
    }
}
