<?php

namespace App\Controllers\administrasiumum;

use App\Controllers\BaseController;

use monken\TablesIgniter;

class inventarisKekayaanDesaController extends BaseController
{
    protected $db;
    public function __construct()
    {
        $this->db      = \Config\Database::connect();
    }
    public function index()
    {
        $inventarisKekayaan = [
            'title' => 'Administrasi Umum | Inventaris Dan Kekayaan Desa',
        ];
        return view('administrasiumum/inventarisKekayaanDesaView', $inventarisKekayaan);
    }

    public function ambilData()
    {
        $data_table = new TablesIgniter();
        $data_table->setTable($this->inventarisKekayaanModel->getDataAll())
            ->setDefaultOrder('id_inventaris_kekayaan_desa', 'ESC')
            ->setSearch(['jenis_barang', 'lokasi', 'sumber_pembiayaan'])
            ->setOrder(['jenis_barang', 'lokasi', 'jumlah', 'sumber_pembiayaan', 'keadaan_barang_bangunan_awal_tahun', 'keadaan_barang_bangunan_akhir_tahun', 'perkiraan_biaya', 'ket', 'deleted_at'])
            ->setOutput(['jenis_barang', 'lokasi', 'jumlah', 'sumber_pembiayaan', 'keadaan_barang_bangunan_awal_tahun', 'keadaan_barang_bangunan_akhir_tahun', 'perkiraan_biaya', 'ket', 'deleted_at', $this->inventarisKekayaanModel->button()]);
        return $data_table->getDatatable();
    }

    public function action()
    {
        if ($this->request->getVar('action')) {
            helper(['form', 'url']);
            $jenisbarang_error = '';
            $lokasi_error = '';
            $jumlah_error = '';
            $sumberpembiayaan_error = '';
            $perkiraanbiaya_error = '';
            $ket_error = '';
            $error = 'no';
            $success = 'no';
            $message = '';
            $error = $this->validate([
                'jenisbarang' => 'required',
                'lokasi' => 'required',
                'jumlah' => 'required',
                'sumberpembiayaan' => 'required',
                'ket' => 'required',
                'perkiraanbiaya' => 'required'
            ]);
            if (!$error) {
                $error = 'yes';
                $validation = \Config\Services::validation();
                if ($validation->getError('jenisbarang')) {
                    $jenisbarang_error = $validation->getError('jenisbarang');
                }
                if ($validation->getError('lokasi')) {
                    $lokasi_error = $validation->getError('lokasi');
                }
                if ($validation->getError('jumlah')) {
                    $jumlah_error = $validation->getError('jumlah');
                }
                if ($validation->getError('sumberpembiayaan')) {
                    $sumberpembiayaan_error = $validation->getError('sumberpembiayaan');
                }
                if ($validation->getError('perkiraanbiaya')) {
                    $perkiraanbiaya_error = $validation->getError('perkiraanbiaya');
                }
                if ($validation->getError('ket')) {
                    $ket_error = $validation->getError('ket');
                }
            } else {
                $success = 'yes';
                if ($this->request->getVar('action') == 'Add') {
                    $this->inventarisKekayaanModel->save([
                        'jenis_barang' => $this->request->getVar('jenisbarang'),
                        'lokasi' => $this->request->getVar('lokasi'),
                        'jumlah' => $this->request->getVar('jumlah'),
                        'sumber_pembiayaan' => $this->request->getVar('sumberpembiayaan'),
                        'keadaan_barang_bangunan_awal_tahun' => $this->request->getVar('awal'),
                        'keadaan_barang_bangunan_akhir_tahun' => $this->request->getVar('akhir'),
                        'perkiraan_biaya' => $this->request->getVar('perkiraanbiaya'),
                        'ket' => $this->request->getVar('ket'),
                    ]);
                    session()->setFlashData('pesan', 'ditambahkan');
                    $message = session()->getFlashdata('pesan');
                }
                if ($this->request->getVar('action') == 'Edit') {
                    $id = $this->request->getVar('hidden_id');
                    $data = [
                        'jenis_barang' => $this->request->getVar('jenisbarang'),
                        'lokasi' => $this->request->getVar('lokasi'),
                        'jumlah' => $this->request->getVar('jumlah'),
                        'sumber_pembiayaan' => $this->request->getVar('sumberpembiayaan'),
                        'keadaan_barang_bangunan_awal_tahun' => $this->request->getVar('awal'),
                        'keadaan_barang_bangunan_akhir_tahun' => $this->request->getVar('akhir'),
                        'perkiraan_biaya' => $this->request->getVar('perkiraanbiaya'),
                        'ket' => $this->request->getVar('ket'),
                    ];
                    $this->inventarisKekayaanModel->update($id, $data);
                    session()->setFlashData('pesan', 'diubah');
                    $message = session()->getFlashdata('pesan');
                }
            }
            $output = [
                'jenisbarang_error' => $jenisbarang_error,
                'lokasi_error' => $lokasi_error,
                'jumlah_error' => $jumlah_error,
                'sumberpembiayaan_error' => $sumberpembiayaan_error,
                'perkiraanbiaya_error' => $perkiraanbiaya_error,
                'ket_error' => $ket_error,
                'error' => $error,
                'success' => $success,
                'message' => $message
            ];
            echo json_encode($output);
        }
    }

    public function edit()
    {
        if ($this->request->getVar('id')) {
            $inventarisKekayaan_data = $this->inventarisKekayaanModel->where('id_inventaris_kekayaan_desa', $this->request->getVar('id'))->first();
            echo json_encode($inventarisKekayaan_data);
        }
    }

    public function delete()
    {
        if ($this->request->getVar('id') && $this->request->getVar('penyebabdihapus')) {
            $data = [
                'ket' => $this->request->getVar('penyebabdihapus')
            ];

            $this->inventarisKekayaanModel->update($this->request->getVar('id'), $data);

            $id = $this->request->getVar('id');
            $this->inventarisKekayaanModel->delete($id);
            session()->setFlashData('pesan', 'dihapus.');
            echo session()->getFlashdata('pesan');
        }
    }
}
