<?php

namespace App\Controllers;

class profilPemerintahanController extends BaseController
{
    public function index()
    {
        $profilPemerintahan = [
            'title' => 'Profil | Desa Tanah Merah',
            'data' => $this->profilPemerintahanModel->findAll()
        ];
        return view('profilView/index', $profilPemerintahan);
    }
}
