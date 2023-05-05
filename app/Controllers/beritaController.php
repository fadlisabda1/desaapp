<?php

namespace App\Controllers;

class beritaController extends BaseController
{
    public function detail($id)
    {
        $berita = [
            'title' => 'Detail Berita | Desa Tanah Merah',
            'data' => $this->beritaModel->getBerita($id)
        ];
        return view('beritaView/detail', $berita);
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
            ]
        ])) {
            return redirect()->to('/beritaController/create')->withInput();
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
        $this->beritaModel->save([
            'judul' => $this->request->getVar('judul'),
            'keterangan' => $this->request->getVar('keterangan'),
            'gambar' => ($file->getError() === 4) ?  null : str_replace(' ', '', $namaGambar)
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
            ]
        ])) {
            return redirect()->to('/beritaController/edit/' . $this->request->getVar('id_berita'))->withInput();
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
        if ($this->request->getVar('gambarLama') != null && $file->getError() != 4 && file_exists('/xampp/htdocs/desaapp/public/gambar/buktipembayaran' . $this->request->getVar('gambarLama'))) {
            $str = explode('|', $this->request->getVar('gambarLama'));
            for ($j = 0; $j < count($str); $j++) {
                unlink('gambar/' . $str[$j]);
            }
        }
        $this->beritaModel->save([
            'id_berita' => $id,
            'judul' => $this->request->getVar('judul'),
            'keterangan' => $this->request->getVar('keterangan'),
            'gambar' => ($files['file_upload'][0]->getError() == 4) ? $namaGambar : str_replace(' ', '', $namaGambar)
        ]);
        session()->setFlashData('pesan', 'Diubah.');
        return redirect()->to('/profil#publikasiumum');
    }

    public function delete($id)
    {
        $str = explode('|', $this->beritaModel->getBerita($id)['gambar']);

        for ($i = 0; $i < count($str); $i++) {
            if (file_exists('gambar/' . $str[$i]) && $str[$i] != null) {
                unlink('gambar/' . $str[$i]);
            }
        }
        $this->beritaModel->delete($id);
        session()->setFlashData('pesan', 'Dihapus');
        return redirect()->to('/profil#publikasiumum');
    }
}
