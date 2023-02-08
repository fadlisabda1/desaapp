<?php

namespace App\Controllers;

class beritaController extends BaseController
{
    public function detail($id)
    {
        $berita = [
            'title' => 'Publikasi Umum | Desa Tanah Merah',
            'data' => $this->beritaModel->getBerita($id)
        ];
        return view('beritaView/index', $berita);
    }

    public function create()
    {
        $data = [
            'title' => 'Form Tambah Data Berita',
            'validation' => \Config\Services::validation()
        ];

        return view('beritaView/create', $data);
    }

    public function save()
    {
        if (!$this->validate([
            'judul' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} berita harus di isi.'
                ]
            ],
            'keterangan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} berita harus di isi.'
                ]
            ],
            'gambar' => [
                'rules' => 'max_size[gambar,1024]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Yang anda pilih bukan gambar'
                ]
            ]
        ])) {
            return redirect()->to('/beritaController/create')->withInput();
        }
        $fileGambar = $this->request->getFile('gambar');
        if ($fileGambar->getError() == 4) {
            $namaGambar = 'default.svg';
        } else {
            $namaGambar = $fileGambar->getRandomName();
            $fileGambar->move('gambar', $namaGambar);
        }
        $this->beritaModel->save([
            'judul' => $this->request->getVar('judul'),
            'keterangan' => $this->request->getVar('keterangan'),
            'gambar' => $namaGambar
        ]);
        session()->setFlashData('pesan', 'Ditambahkan.');
        return redirect()->to('/profil#publikasiumum');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Form Ubah Data Berita',
            'validation' => \Config\Services::validation(),
            'berita' => $this->beritaModel->getBerita($id)
        ];

        return view('beritaView/edit', $data);
    }

    public function update($id)
    {
        if (!$this->validate([
            'judul' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} berita harus di isi.'
                ]
            ],
            'keterangan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} berita harus di isi.'
                ]
            ],
            'gambar' => [
                'rules' => 'max_size[gambar,1024]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Yang anda pilih bukan gambar'
                ]
            ]
        ])) {
            return redirect()->to('/beritaController/edit/' . $this->request->getVar('id_berita'))->withInput();
        }
        $fileGambar = $this->request->getFile('gambar');
        if ($fileGambar->getError() == 4) {
            $namaGambar = $this->request->getVar('gambarLama');
        } else if ($fileGambar->getName() != 'default.svg') {
            $namaGambar = $fileGambar->getRandomName();
            $fileGambar->move('gambar', $namaGambar);
            unlink('gambar/' . $this->request->getVar('gambarLama'));
        } else {
            $namaGambar = $fileGambar->getRandomName();
        }
        $this->beritaModel->save([
            'id_berita' => $id,
            'judul' => $this->request->getVar('judul'),
            'keterangan' => $this->request->getVar('keterangan'),
            'gambar' => $namaGambar
        ]);
        session()->setFlashData('pesan', 'Diubah.');
        return redirect()->to('/profil#publikasiumum');
    }

    public function delete($id)
    {
        $berita = $this->beritaModel->find($id);

        if ($berita['gambar'] != 'default.svg') {
            unlink('gambar/' . $berita['gambar']);
        }
        $this->beritaModel->delete($id);
        session()->setFlashData('pesan', 'Dihapus');
        return redirect()->to('/profil#publikasiumum');
    }
}
