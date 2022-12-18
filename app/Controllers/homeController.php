<?php

namespace App\Controllers;

class homeController extends BaseController
{
    public function __construct()
    {
        $this->config = config('Auth');
    }
    public function login()
    {
        $data = [
            'title' => 'Login | Desa Tanah Merah',
            'config' => $this->config
        ];
        return view('auth/login', $data);
    }

    public function register()
    {
        $data = [
            'title' => 'Register | Desa Tanah Merah'
        ];
        return view('auth/register', $data);
    }
}
