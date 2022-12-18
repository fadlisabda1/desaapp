<?php

namespace App\Controllers;

class userController extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'My Profile'
        ];
        return view('user/index', $data);
    }
}
