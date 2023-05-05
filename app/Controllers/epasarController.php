<?php

namespace App\Controllers;

class epasarController extends BaseController
{
    public function detail($id)
    {
        $berita = [
            'title' => 'Detail Barang | Desa Tanah Merah',
            'data' => $this->epasarModel->getEpasar($id)
        ];
        return view('epasarView/detail', $berita);
    }

    public function create()
    {
        $data = [
            'title' => 'Form Tambah Data Barang',
            'validation' => \Config\Services::validation()
        ];

        return view('epasarView/create', $data);
    }

    public function save()
    {
        if (!$this->validate([
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} barang harus di isi.'
                ]
            ],
            'harga' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} barang harus di isi.'
                ]
            ],
        ])) {
            return redirect()->to('/epasarController/create')->withInput();
        }
        $files = $this->request->getFiles();
        $namaGambar = $files['file_upload'][0]->getName();
        $i = 0;
        foreach ($files['file_upload'] as $file) {
            if ($file->getError() === 0) {
                $file->move('gambar', str_replace(' ', '', $file->getName()));
                if ($i !== 0) {
                    $namaGambar .= '|';
                    $namaGambar .= $file->getName();
                }
            }
            $i++;
        }
        $this->epasarModel->save([
            'nama' => $this->request->getVar('nama'),
            'stok' => $this->request->getVar('stok'),
            'gambar' => ($file->getError() === 4) ?  null : str_replace(' ', '', $namaGambar),
            'harga' => $this->request->getVar('harga')
        ]);
        session()->setFlashData('pesan', 'Ditambahkan.');
        return redirect()->to('/profil#epasar');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Form Ubah Data Barang',
            'validation' => \Config\Services::validation(),
            'barang' => $this->epasarModel->getEpasar($id)
        ];

        return view('epasarView/edit', $data);
    }

    public function update($id)
    {
        if (!$this->validate([
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} barang harus di isi.'
                ]
            ],
            'harga' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} barang harus di isi.'
                ]
            ],
        ])) {
            return redirect()->to('/epasarController/edit/' . $this->request->getVar('id_barang'))->withInput();
        }
        $files = $this->request->getFiles();
        $namaGambar = $files['file_upload'][0]->getName();
        $i = 0;
        foreach ($files['file_upload'] as $file) {
            if ($file->getError() == 4) {
                $namaGambar = $this->request->getVar('gambarLama');
            } else {
                $file->move('gambar', str_replace(' ', '', $file->getName()));
                if ($i !== 0) {
                    $namaGambar .= '|';
                    $namaGambar .= $file->getName();
                }
            }
            $i++;
        }
        if ($this->request->getVar('gambarLama') != null && $file->getError() != 4) {
            $str = explode('|', $this->request->getVar('gambarLama'));
            for ($j = 0; $j < count($str); $j++) {
                unlink('gambar/' . $str[$j]);
            }
        }
        $this->epasarModel->save([
            'id_barang' => $id,
            'nama' => $this->request->getVar('nama'),
            'stok' => $this->request->getVar('stok'),
            'gambar' => ($files['file_upload'][0]->getError() == 4) ? $namaGambar : str_replace(' ', '', $namaGambar),
            'harga' => $this->request->getVar('harga')
        ]);
        session()->setFlashData('pesan', 'Diubah.');
        return redirect()->to('/profil#epasar');
    }

    public function delete($id)
    {
        $str = explode('|', $this->epasarModel->getEpasar($id)['gambar']);

        for ($i = 0; $i < count($str); $i++) {
            if ($str[$i] != null) {
                unlink('gambar/' . $str[$i]);
            }
        }
        $this->epasarModel->delete($id);
        session()->setFlashData('pesan', 'Dihapus');
        return redirect()->to('/profil#epasar');
    }
}
