<?php

namespace App\Controllers;

class profilController extends BaseController
{
    public function index()
    {
        $profil['data'] = $this->profilModel->findAll();
        return view('profilView/index', $profil);
    }
}
