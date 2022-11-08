<?php

namespace App\Controllers\administrasiumum;

use App\Controllers\BaseController;

use monken\TablesIgniter;

class peraturanDesaController extends BaseController
{
    public function index()
    {
        $peraturan = [
            'title' => 'Administrasi Umum | Peraturan Desa',
            // 'data' => $this->peraturanDesaModel->getPeraturan(),
            'validation' => \Config\Services::validation()
        ];
        return view('administrasiumum/peraturanDesaView', $peraturan);
    }

    public function ambilData()
    {
        $data_table = new TablesIgniter();
        $data_table->setTable($this->peraturanDesaModel->getPeraturan())
            ->setDefaultOrder('id_peraturan_desa', 'ESC')
            ->setSearch(['nomor_tgl_peraturan', 'tentang'])
            ->setOrder(['id_peraturan_desa', 'nomor_tgl_peraturan', 'tentang', 'uraiansingkat'])
            ->setOutput(["id_peraturan_desa", "nomor_tgl_peraturan", "tentang", "uraiansingkat"]);
        return $data_table->getDatatable();
    }

    public function action()
    {
        if ($this->request->getVar('action')) {
            helper(['form', 'url']);
            $nomorTglPeraturanDesa_error = '';
            $tentang_error = '';
            $uraiansingkat_error = '';
            $error = 'no';
            $success = 'no';
            $message = '';
            $error = $this->validate([
                'nomorTglPeraturanDesa' => 'required',
                'tentang' => 'required',
                'uraiansingkat' => 'required'
            ]);
            if (!$error) {
                $error = 'yes';
                $validation = \Config\Services::validation();
                if ($validation->getError('nomorTglPeraturanDesa')) {
                    $nomorTglPeraturanDesa_error = $validation->getError('nomorTglPeraturanDesa');
                }
                if ($validation->getError('tentang')) {
                    $tentang_error = $validation->getError('tentang');
                }
                if ($validation->getError('uraiansingkat')) {
                    $uraiansingkat_error = $validation->getError('uraiansingkat');
                }
            } else {
                $success = 'yes';
                if ($this->request->getVar('action') == 'Add') {
                    $this->peraturanDesaModel->save([
                        'nomor_tgl_peraturan' => $this->request->getVar('nomorTglPeraturanDesa'),
                        'tentang' => $this->request->getVar('tentang'),
                        'uraiansingkat' => $this->request->getVar('uraiansingkat')
                    ]);
                    session()->setFlashData('pesan', 'ditambahkan');
                    $message = session()->getFlashdata('pesan');
                }
            }
            $output = [
                'nomorTglPeraturanDesa_error' => $nomorTglPeraturanDesa_error,
                'tentang_error' => $tentang_error,
                'uraiansingkat_error' => $uraiansingkat_error,
                'error' => $error,
                'success' => $success,
                'message' => $message
            ];
            echo json_encode($output);
        }
    }

    public function delete($id)
    {
        $this->peraturanDesaModel->delete($id);
        session()->setFlashData('pesan', 'dihapus.');
        return redirect()->to(base_url('/peraturanDesaController'));
    }

    public function edit()
    {
        echo json_encode($this->peraturanDesaModel->getPeraturan($_POST['id']));
    }
    public function update()
    {
        if (!$this->validate([
            'nomorTglPeraturanDesa' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nomor Dan Tanggal Peraturan Desa harus di isi.'
                ]
            ],
            'tentang' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} peraturan harus di isi.'
                ]
            ],
            'uraiansingkat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'uraian singkat peraturan harus di isi.'
                ]
            ],
        ])) {
            return redirect()->to(base_url('/peraturanDesaController'))->withInput();
        }
        $this->peraturanDesaModel->save([
            'id_peraturan_desa' => $_POST['id'],
            'nomor_tgl_peraturan' => $this->request->getVar('nomorTglPeraturanDesa'),
            'tentang' => $this->request->getVar('tentang'),
            'uraiansingkat' => $this->request->getVar('uraiansingkat')
        ]);
        session()->setFlashData('pesan', 'diubah.');
        return redirect()->to(base_url('/peraturanDesaController'));
    }
}
