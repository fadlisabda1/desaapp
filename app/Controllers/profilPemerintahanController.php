<?php

namespace App\Controllers;

class profilPemerintahanController extends BaseController
{
    public function index()
    {
        $profilPemerintahan = [
            'title' => 'Profil | Desa Tanah Merah',
            'dataPemerintah' => $this->profilPemerintahanModel->findAll(),
            'dataBerita' => $this->beritaModel->findAll(),
            'barang' => $this->epasarModel->getEpasar()
        ];
        return view('profilView/index', $profilPemerintahan);
    }
}
