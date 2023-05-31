<?php

namespace App\Controllers\administrasiumum;

use App\Controllers\BaseController;

use monken\TablesIgniter;

class peraturanDesaController extends BaseController
{
    public function index()
    {
        $peraturan = [
            'title' => 'Administrasi Umum | Peraturan Desa'
        ];
        return view('administrasiumum/peraturanDesaView', $peraturan);
    }

    public function ambilData()
    {
        $data_table = new TablesIgniter();
        $data_table->setTable($this->peraturanDesaModel->getDataNull())
            ->setDefaultOrder('id_peraturan_desa', 'ESC')
            ->setSearch(['nomor_tgl_peraturan', 'tentang'])
            ->setOrder(['nomor_tgl_peraturan', 'tentang', 'uraiansingkat'])
            ->setOutput([$this->peraturanDesaModel->ceklisDelete(), 'nomor_tgl_peraturan', 'tentang', 'uraiansingkat', $this->peraturanDesaModel->button()]);
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
                if ($this->request->getVar('action') == 'Edit') {
                    $id = $this->request->getVar('hidden_id');
                    $data = [
                        'nomor_tgl_peraturan' => $this->request->getVar('nomorTglPeraturanDesa'),
                        'tentang' => $this->request->getVar('tentang'),
                        'uraiansingkat' => $this->request->getVar('uraiansingkat')
                    ];
                    $this->peraturanDesaModel->update($id, $data);
                    session()->setFlashData('pesan', 'diubah');
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
            $this->peraturanDesaModel->delete($id);
            session()->setFlashData('pesan', 'dihapus.');
            echo session()->getFlashdata('pesan');
        }
    }

    public function ceklisDeleteButton()
    {
        $id = $this->request->getVar('id');
        $this->peraturanDesaModel->checkboxDelete($id);
        session()->setFlashData('pesan', 'dihapus.');
        echo session()->getFlashdata('pesan');
    }

    public function import()
    {
        if ($this->request->getVar('actionn')) {
            helper(['form', 'url']);
            $message = '';
            $success = 'yes';
            if ($this->request->getVar('actionn') == 'Add') {
                $file = $this->request->getFile('file');
                $extension = $file->getClientExtension();
                if ($extension == 'xls' || $extension == 'csv' || $extension == 'xlsx') {
                    if ($extension == 'xls') {
                        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
                    } else if ($extension == 'csv') {
                        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
                    } else {
                        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
                    }
                    $spreadsheet = $reader->load($file);
                    $contacts = $spreadsheet->getActiveSheet()->toArray();
                    foreach ($contacts as $key => $value) {
                        if ($key == 0) {
                            continue;
                        }
                        $data = [
                            'nomor_tgl_peraturan' => $value[0],
                            'tentang' => $value[1],
                            'uraiansingkat' => $value[2],
                        ];
                        $this->peraturanDesaModel->save($data);
                    }
                    session()->setFlashData('pesan', 'ditambahkan');
                    $message = session()->getFlashdata('pesan');
                }
            }
            $output = [
                'success' => $success,
                'message' => $message
            ];
            echo json_encode($output);
        }
    }
}
