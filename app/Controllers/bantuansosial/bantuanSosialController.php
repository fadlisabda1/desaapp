<?php

namespace App\Controllers\bantuansosial;

use App\Controllers\BaseController;

use monken\TablesIgniter;


class bantuanSosialController extends BaseController
{
    public function index()
    {
        $bantuanSosial = [
            'title' => 'Bantual Sosial'
        ];
        return view('bantuansosial/index', $bantuanSosial);
    }

    public function ambilData()
    {
        $data_table = new TablesIgniter();
        $data_table->setTable($this->bantuanSosialModel->getDataNull())
            ->setDefaultOrder('id_bantuansosial', 'ESC')
            ->setSearch([
                'nomorktp', 'namapenerima', 'jenisbantuan', 'statuspenerimaan', 'jeniskelamin', 'dusun', 'rt'
            ])
            ->setOrder([
                'nomorktp', 'namapenerima', 'jenisbantuan', 'statuspenerimaan', 'jeniskelamin', 'dusun', 'rt'
            ])
            ->setOutput([
                $this->bantuanSosialModel->ceklisDelete(),
                'nomorktp', 'namapenerima', 'jenisbantuan', 'statuspenerimaan', 'jeniskelamin', 'dusun', 'rt', $this->bantuanSosialModel->button()
            ]);
        return $data_table->getDatatable();
    }

    public function action()
    {
        if ($this->request->getVar('action')) {
            helper(['form', 'url']);
            $nomorktp_error = '';
            $namapenerima_error = '';
            $dusun_error = '';
            $rt_error = '';
            $error = 'no';
            $success = 'no';
            $message = '';
            $error = $this->validate([
                'nomorktp' => 'required',
                'namapenerima' => 'required',
                'dusun' => 'required',
                'rt' => 'required'
            ]);
            if (!$error) {
                $error = 'yes';
                $validation = \Config\Services::validation();
                if ($validation->getError('nomorktp')) {
                    $nomorktp_error = $validation->getError('nomorktp');
                }
                if ($validation->getError('namapenerima')) {
                    $namapenerima_error = $validation->getError('namapenerima');
                }
                if ($validation->getError('dusun')) {
                    $dusun_error = $validation->getError('dusun');
                }
                if ($validation->getError('rt')) {
                    $rt_error = $validation->getError('rt');
                }
            } else {
                $success = 'yes';
                if ($this->request->getVar('action') == 'Add') {
                    $this->bantuanSosialModel->save([
                        'nomorktp' => $this->request->getVar('nomorktp'),
                        'namapenerima' => $this->request->getVar('namapenerima'),
                        'jenisbantuan' => $this->request->getVar('jenisbantuan'),
                        'statuspenerimaan' => $this->request->getVar('statuspenerimaan'),
                        'jeniskelamin' => $this->request->getVar('jeniskelamin'),
                        'dusun' => $this->request->getVar('dusun'),
                        'rt' => $this->request->getVar('rt')
                    ]);
                    session()->setFlashData('pesan', 'ditambahkan');
                    $message = session()->getFlashdata('pesan');
                }
                if ($this->request->getVar('action') == 'Edit') {
                    $id = $this->request->getVar('hidden_id');
                    $data = [
                        'nomorktp' => $this->request->getVar('nomorktp'),
                        'namapenerima' => $this->request->getVar('namapenerima'),
                        'jenisbantuan' => $this->request->getVar('jenisbantuan'),
                        'statuspenerimaan' => $this->request->getVar('statuspenerimaan'),
                        'jeniskelamin' => $this->request->getVar('jeniskelamin'),
                        'dusun' => $this->request->getVar('dusun'),
                        'rt' => $this->request->getVar('rt')
                    ];
                    $this->bantuanSosialModel->update($id, $data);
                    session()->setFlashData('pesan', 'diubah');
                    $message = session()->getFlashdata('pesan');
                }
            }
            $output = [
                'nomorktp_error' => $nomorktp_error,
                'namapenerima_error' => $namapenerima_error,
                'dusun_error' => $dusun_error,
                'rt_error' => $rt_error,
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
            $bantuanSosial = $this->bantuanSosialModel->where('id_bantuansosial', $this->request->getVar('id'))->first();
            echo json_encode($bantuanSosial);
        }
    }

    public function delete()
    {
        if ($this->request->getVar('id')) {
            $id = $this->request->getVar('id');
            $this->bantuanSosialModel->delete($id);
            session()->setFlashData('pesan', 'dihapus.');
            echo session()->getFlashdata('pesan');
        }
    }

    public function ceklisDeleteButton()
    {
        $id = $this->request->getVar('id');
        $this->bantuanSosialModel->checkboxDelete($id);
        session()->setFlashData('pesan', 'dihapus.');
        echo session()->getFlashdata('pesan');
    }
}
