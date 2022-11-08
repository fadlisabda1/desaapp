<?php

namespace App\Controllers\administrasiumum;

use App\Controllers\BaseController;

class inventarisKekayaanDesaController extends BaseController
{
    public function index()
    {
        $inventarisKekayaan = [
            'title' => 'Administrasi Umum | Inventaris Dan Kekayaan Desa',
            'data' => $this->inventarisKekayaanModel->getInventarisKekayaan(),
            'validation' => \Config\Services::validation()
        ];
        return view('administrasiumum/inventarisKekayaanDesaView', $inventarisKekayaan);
    }

    public function save()
    {
        if (!$this->validate([
            'jenis_barang' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'jenis barang harus di isi.'
                ]
            ],
            'lokasi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus di isi.'
                ]
            ],
            'jumlah' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus di isi.'
                ]
            ],
            'sumber_pembiayaan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'sumber pembiayaan harus di isi.'
                ]
            ],
            'perkiraan_biaya' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'perkiraan biaya harus di isi.'
                ]
            ],
        ])) {
            return redirect()->to(base_url('/inventarisKekayaanDesaController'))->withInput();
        }
        $this->inventarisKekayaanModel->save([
            'jenis_barang' => $this->request->getVar('jenis_barang'),
            'lokasi' => $this->request->getVar('lokasi'),
            'jumlah' => $this->request->getVar('jumlah'),
            'sumber_pembiayaan' => $this->request->getVar('sumber_pembiayaan'),
            'perkiraan_biaya' => $this->request->getVar('perkiraan_biaya')
        ]);
        return redirect()->to(base_url('/inventarisKekayaanDesaController'));
    }

    public function delete($id)
    {
        $this->inventarisKekayaanModel->delete($id);
        session()->setFlashData('pesan', 'dihapus.');
        return redirect()->to(base_url('/inventarisKekayaanDesaController'));
    }
    public function edit()
    {
        echo json_encode($this->inventarisKekayaanModel->getInventarisKekayaan($_POST['id']));
    }
    public function update()
    {
        if (!$this->validate([
            'jenis_barang' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'jenis barang harus di isi.'
                ]
            ],
            'lokasi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus di isi.'
                ]
            ],
            'jumlah' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus di isi.'
                ]
            ],
            'sumber_pembiayaan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'sumber pembiayaan harus di isi.'
                ]
            ],
            'perkiraan_biaya' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'perkiraan biaya harus di isi.'
                ]
            ],
        ])) {
            return redirect()->to(base_url('/inventarisKekayaanDesaController'))->withInput();
        }
        $this->inventarisKekayaanModel->save([
            'id_inventaris_kekayaan_desa' => $_POST['id'],
            'jenis_barang' => $this->request->getVar('jenis_barang'),
            'lokasi' => $this->request->getVar('lokasi'),
            'jumlah' => $this->request->getVar('jumlah'),
            'sumber_pembiayaan' => $this->request->getVar('sumber_pembiayaan'),
            'perkiraan_biaya' => $this->request->getVar('perkiraan_biaya')
        ]);
        session()->setFlashData('pesan', 'diubah.');
        return redirect()->to(base_url('/inventarisKekayaanDesaController'));
    }
}
