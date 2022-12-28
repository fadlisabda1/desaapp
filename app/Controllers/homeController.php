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
    public function forgot()
    {
        $data = [
            'title' => 'Forgot Password | Desa Tanah Merah'
        ];
        return view('auth/forgot', $data);
    }
    public function reset()
    {
        $data = [
            'title' => 'Reset Password | Desa Tanah Merah'
        ];
        return view('auth/reset', $data);
    }
}
