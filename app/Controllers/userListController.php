<?php

namespace App\Controllers;

class userListController extends BaseController
{
    protected $db, $builder;

    public function __construct()
    {
        $this->db      = \Config\Database::connect();
        $this->builder = $this->db->table('users');
    }
    public function index()
    {
        $data = [
            'title' => 'User List'
        ];
        $this->builder->select('users.id as userid,username,email,name');
        $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $this->builder->where('deleted_at', NULL);
        $query = $this->builder->get();
        $data['users'] = $query->getResult();
        return view('userlist/userListView', $data);
    }

    public function detail($id)
    {
        $data = [
            'title' => 'User Detail'
        ];
        $this->builder->select('users.id as userid,username,email,fullname,user_image,name');
        $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $this->builder->where('users.id', $id);
        $query = $this->builder->get();
        $data['user'] = $query->getRow();
        return view('userlist/userListDetailView', $data);
    }
    public function edit()
    {
        if ($this->request->getVar('id')) {
            $peraturan_data = $this->peraturanDesaModel->where('id_peraturan_desa', $this->request->getVar('id'))->first();
            echo json_encode($peraturan_data);
        }
    }
    public function delete()
    {
        if ($this->request->getVar('id')) {
            $id = $this->request->getVar('id');
            $user = $this->builder->getWhere(['id' => $id]);
            foreach ($user->getResult() as $userr) {
                if (file_exists('/xampp/htdocs/desaapp/public/gambar/myprofile/' . $userr->user_image) && $userr->user_image != null) {
                    unlink('gambar/myprofile/' . $userr->user_image);
                }
            }
            $this->userModel->delete($id);
            session()->setFlashData('pesan', 'dihapus.');
            echo session()->getFlashdata('pesan');
        }
    }

    public function ceklisDeleteButton()
    {
        if ($this->request->getVar('id')) {
            $id = $this->request->getVar('id');
            foreach ($id as $i) {
                $data = $this->userModel->where('id', $i)->first();
                if (file_exists('/xampp/htdocs/desaapp/public/gambar/myprofile/' . $data['user_image']) && $data['user_image'] != null) {
                    unlink('gambar/myprofile/' . $data['user_image']);
                }
            }
            $this->userModel->checkboxDelete($id);
            session()->setFlashData('pesan', 'dihapus.');
            echo session()->getFlashdata('pesan');
        }
    }
}
