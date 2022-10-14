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
}
