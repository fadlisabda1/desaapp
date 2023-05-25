<?php

namespace App\Controllers;

class userController extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'My Profile',
            'validation' => \Config\Services::validation()
        ];
        return view('user/myProfileView', $data);
    }

    public function edit()
    {
        if ($this->request->getVar('id')) {
            $user_data = $this->userModel->where('id', $this->request->getVar('id'))->first();
            echo json_encode($user_data);
        }
    }

    public function action()
    {
        if ($this->request->getVar('action')) {
            helper(['form', 'url']);
            $email_error = '';
            $username_error = '';
            $user_image_error = '';
            $error = 'no';
            $success = 'no';
            $message = '';
            $error = $this->validate([
                'email' => 'required',
                'username' => 'required',
                'user_image' => 'max_size[user_image,1024]|is_image[user_image]|mime_in[user_image,image/jpg,image/jpeg,image/png]',
            ]);
            if (!$error) {
                $error = 'yes';
                $validation = \Config\Services::validation();
                if ($validation->getError('email')) {
                    $email_error = $validation->getError('email');
                }
                if ($validation->getError('username')) {
                    $username_error = $validation->getError('username');
                }
                if ($validation->getError('user_image')) {
                    $user_image_error = $validation->getError('user_image');
                }
            } else {
                $success = 'yes';
                if ($this->request->getVar('action') == 'Edit') {
                    $id = $this->request->getVar('hidden_id');
                    $fileUserImage = $this->request->getFile('user_image');

                    if ($fileUserImage->getError() == 4) {
                        $namaUserImage = $this->request->getVar('user_image_lama');
                    } else {
                        $namaUserImage = $fileUserImage->getRandomName();
                        $fileUserImage->move('gambar', $namaUserImage);
                        if ($this->request->getVar('user_image_lama') != 'default.svg') {
                            unlink('gambar/' . $this->request->getVar('user_image_lama'));
                        }
                    }
                    $data = [
                        'email' => $this->request->getVar('email'),
                        'username' => $this->request->getVar('username'),
                        'fullname' => $this->request->getVar('fullname'),
                        'user_image' => $namaUserImage
                    ];
                    $this->userModel->update($id, $data);
                    session()->setFlashData('pesan', 'diubah');
                    $message = session()->getFlashdata('pesan');
                }
            }
            $output = [
                'email_error' => $email_error,
                'username_error' => $username_error,
                'user_image_error' => $user_image_error,
                'error' => $error,
                'success' => $success,
                'message' => $message
            ];
            echo json_encode($output);
        }
    }
}
