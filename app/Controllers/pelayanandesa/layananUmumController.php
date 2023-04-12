<?php

namespace App\Controllers\pelayanandesa;

use App\Controllers\BaseController;

class layananUmumController extends BaseController
{
    public function create()
    {
        $data = [
            'title' => 'Form Tambah Data Layanan Umum',
            'validation' => \Config\Services::validation()
        ];

        return view('layananUmumView/create', $data);
    }

    public function save()
    {
        if (!$this->validate([
            'judul' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} layanan umum harus di isi.'
                ]
            ],
            'keterangan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} layanan umum harus di isi.'
                ]
            ]
        ])) {
            return redirect()->to('/layananUmumController/create')->withInput();
        }
        $this->layananUmumModel->save([
            'judul' => $this->request->getVar('judul'),
            'keterangan' => $this->request->getVar('keterangan')
        ]);
        session()->setFlashData('pesan', 'Ditambahkan.');
        return redirect()->to('/profil#bankdatadesa');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Form Ubah Data Layanan Umum',
            'validation' => \Config\Services::validation(),
            'layananumum' => $this->layananUmumModel->getLayananUmum($id)
        ];

        return view('layananUmumView/edit', $data);
    }

    public function update($id)
    {
        if (!$this->validate([
            'judul' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} layanan umum harus di isi.'
                ]
            ],
            'keterangan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} layanan umum harus di isi.'
                ]
            ]
        ])) {
            return redirect()->to('/layananUmumController/edit/' . $this->request->getVar('id_layananumum'))->withInput();
        }
        $this->layananUmumModel->save([
            'id_layananumum' => $id,
            'judul' => $this->request->getVar('judul'),
            'keterangan' => $this->request->getVar('keterangan')
        ]);
        session()->setFlashData('pesan', 'Diubah.');
        return redirect()->to('/profil#bankdatadesa');
    }

    public function delete($id)
    {
        $this->layananUmumModel->delete($id);
        session()->setFlashData('pesan', 'Dihapus');
        return redirect()->to('/profil#bankdatadesa');
    }
}
