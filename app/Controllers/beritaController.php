<?php

namespace App\Controllers;

class beritaController extends BaseController
{
    public function detail()
    {
        $judul['title'] = 'Publikasi Umum | Desa Tanah Merah';
        return view('beritaView/index', $judul);
    }
}
