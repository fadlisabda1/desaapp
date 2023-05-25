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
        return view('beritaView/beritaDetailView', $berita);
    }

    public function create()
    {
        $data = [
            'title' => 'Form Tambah Data Berita',
            'validation' => \Config\Services::validation()
        ];

        return view('beritaView/beritaCreateView', $data);
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
        $namaFile = $files['file_upload'][0]->getName();
        $i = 0;
        foreach ($files['file_upload'] as $file) {
            if ($file->getError() === 0) {
                $file->move('file/berita', str_replace(' ', '', $file->getName()));
                if ($i !== 0) {
                    $namaFile .= '|';
                    $namaFile .= $file->getName();
                }
            }
            $i++;
        }
        $this->beritaModel->save([
            'judul' => $this->request->getVar('judul'),
            'keterangan' => $this->request->getVar('keterangan'),
            'file' => ($file->getError() === 4) ?  null : str_replace(' ', '', $namaFile)
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

        return view('beritaView/beritaEditView', $data);
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
        $namaFile = $files['file_upload'][0]->getName();
        $i = 0;
        foreach ($files['file_upload'] as $file) {
            if ($file->getError() == 4) {
                $namaFile = $this->request->getVar('fileLama');
            } else {
                $file->move('file/berita', str_replace(' ', '', $file->getName()));
                if ($i !== 0) {
                    $namaFile .= '|';
                    $namaFile .= $file->getName();
                }
            }
            $i++;
        }
        $str = explode('|', $this->request->getVar('fileLama'));
        if ($this->request->getVar('fileLama') != null && $file->getError() != 4) {
            for ($j = 0; $j < count($str); $j++) {
                if (file_exists('/xampp/htdocs/desaapp/public/file/berita/' . $str[$j])) {
                    unlink('file/berita/' . $str[$j]);
                }
            }
        }
        $this->beritaModel->save([
            'id_berita' => $id,
            'judul' => $this->request->getVar('judul'),
            'keterangan' => $this->request->getVar('keterangan'),
            'file' => ($files['file_upload'][0]->getError() == 4) ? $namaFile : str_replace(' ', '', $namaFile)
        ]);
        session()->setFlashData('pesan', 'Diubah.');
        return redirect()->to('/profil#publikasiumum');
    }

    public function delete($id)
    {
        $str = explode('|', $this->beritaModel->getBerita($id)['file']);

        for ($i = 0; $i < count($str); $i++) {
            if (file_exists('/xampp/htdocs/desaapp/public/file/berita/' . $str[$i]) && $str[$i] != null) {
                unlink('file/berita/' . $str[$i]);
            }
        }
        $this->beritaModel->delete($id);
        session()->setFlashData('pesan', 'Dihapus');
        return redirect()->to('/profil#publikasiumum');
    }
}
