<?php

namespace App\Controllers\pelayanandesa;

use App\Controllers\BaseController;

use monken\TablesIgniter;

class layananUmumController extends BaseController
{
    public function index()
    {
        $layananumum = [
            'title' => 'Layanan Umum | Syarat Pengurusan Desa'
        ];
        return view('layananUmum\index', $layananumum);
    }

    public function ambilData()
    {
        $data_table = new TablesIgniter();
        $data_table->setTable($this->layananUmumModel->getDataNull())
            ->setDefaultOrder('id_layananumum', 'ESC')
            ->setSearch(['judul', 'keterangan'])
            ->setOrder(['judul', 'keterangan'])
            ->setOutput([$this->layananUmumModel->ceklisDelete(), 'judul', 'keterangan', $this->layananUmumModel->button()]);
        return $data_table->getDatatable();
    }

    public function action()
    {
        if ($this->request->getVar('action')) {
            helper(['form', 'url']);
            $judul_error = '';
            $keterangan_error = '';
            $error = 'no';
            $success = 'no';
            $message = '';
            $error = $this->validate([
                'judul' => 'required',
                'keterangan' => 'required',
            ]);
            if (!$error) {
                $error = 'yes';
                $validation = \Config\Services::validation();
                if ($validation->getError('judul')) {
                    $judul_error = $validation->getError('judul');
                }
                if ($validation->getError('keterangan')) {
                    $keterangan_error = $validation->getError('keterangan');
                }
            } else {
                $success = 'yes';
                if ($this->request->getVar('action') == 'Add') {
                    $this->layananUmumModel->save([
                        'judul' => $this->request->getVar('judul'),
                        'keterangan' => $this->request->getVar('keterangan'),
                    ]);
                    session()->setFlashData('pesan', 'ditambahkan');
                    $message = session()->getFlashdata('pesan');
                }
                if ($this->request->getVar('action') == 'Edit') {
                    $id = $this->request->getVar('hidden_id');
                    $data = [
                        'judul' => $this->request->getVar('judul'),
                        'keterangan' => $this->request->getVar('keterangan'),
                    ];
                    $this->layananUmumModel->update($id, $data);
                    session()->setFlashData('pesan', 'diubah');
                    $message = session()->getFlashdata('pesan');
                }
            }
            $output = [
                'judul_error' => $judul_error,
                'keterangan_error' => $keterangan_error,
                'error' => $error,
                'success' => $success,
                'message' => $message
            ];
            echo json_encode($output);
        }
    }

    public function edit()
    {
        if ($this->request->getVar('id')) {
            $layananumum_data = $this->layananUmumModel->where('id_layananumum', $this->request->getVar('id'))->first();
            echo json_encode($layananumum_data);
        }
    }

    public function delete()
    {
        if ($this->request->getVar('id')) {
            $id = $this->request->getVar('id');
            $this->layananUmumModel->delete($id);
            session()->setFlashData('pesan', 'dihapus.');
            echo session()->getFlashdata('pesan');
        }
    }

    public function ceklisDeleteButton()
    {
        $id = $this->request->getVar('id');
        $this->layananUmumModel->checkboxDelete($id);
        session()->setFlashData('pesan', 'dihapus.');
        echo session()->getFlashdata('pesan');
    }
}
