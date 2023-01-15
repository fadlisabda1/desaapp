<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class adminController extends BaseController
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
        $query = $this->builder->get();
        $data['users'] = $query->getResult();
        return view('admin/index', $data);
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
        return view('admin/detail', $data);
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
                if ($userr->user_image != 'default.svg') {
                    unlink('gambar/' . $userr->user_image);
                }
            }
            $this->builder->delete(['id' => $id]);
            session()->setFlashData('pesan', 'dihapus.');
            echo session()->getFlashdata('pesan');
        }
    }
}
