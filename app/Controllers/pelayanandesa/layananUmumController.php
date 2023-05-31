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
        return view('layananUmum\layananUmumView', $layananumum);
    }

    public function ambilData()
    {
        $data_table = new TablesIgniter();
        $data_table->setTable($this->layananUmumModel->getDataNull())
            ->setDefaultOrder('id_layananumum', 'ESC')
            ->setSearch(['judul', 'nohp', 'usernameoremail'])
            ->setOrder(['judul', 'nohp', 'usernameoremail', 'file'])
            ->setOutput([$this->layananUmumModel->ceklisDelete(), 'judul', 'nohp', 'usernameoremail', 'file', $this->layananUmumModel->button()]);
        return $data_table->getDatatable();
    }

    public function action()
    {
        if ($this->request->getVar('action')) {
            helper(['form', 'url']);
            $judul_error = '';
            $nohp_error = '';
            $usernameoremail_error = '';
            $error = 'no';
            $success = 'no';
            $message = '';
            $error = $this->validate([
                'judul' => 'required',
                'nohp' => 'required',
                'usernameoremail' => 'required',
            ]);
            if (!$error) {
                $error = 'yes';
                $validation = \Config\Services::validation();
                if ($validation->getError('judul')) {
                    $judul_error = $validation->getError('judul');
                }
                if ($validation->getError('nohp')) {
                    $nohp_error = $validation->getError('nohp');
                }
                if ($validation->getError('usernameoremail')) {
                    $usernameoremail_error = $validation->getError('usernameoremail');
                }
            } else {
                $success = 'yes';
                if ($this->request->getVar('action') == 'Add') {
                    $files = $this->request->getFiles();
                    $namaFile = $files['file_upload'][0]->getName();
                    $i = 0;
                    foreach ($files['file_upload'] as $file) {
                        if ($file->getError() === 0) {
                            $file->move('file/fileSyaratSurat/', str_replace(' ', '', $file->getName()));
                            if ($i !== 0) {
                                $namaFile .= '|';
                                $namaFile .= $file->getName();
                            }
                        }
                        $i++;
                    }
                    $this->layananUmumModel->save([
                        'judul' => $this->request->getVar('judul'),
                        'nohp' => $this->request->getVar('nohp'),
                        'usernameoremail' => $this->request->getVar('usernameoremail'),
                        'file' => ($file->getError() === 4) ?  null : str_replace(' ', '', $namaFile),
                    ]);
                    session()->setFlashData('pesan', 'ditambahkan');
                    $message = session()->getFlashdata('pesan');
                }
                if ($this->request->getVar('action') == 'Edit') {
                    $id = $this->request->getVar('hidden_id');
                    $files = $this->request->getFiles();
                    $namaFile = $files['file_upload'][0]->getName();
                    $i = 0;
                    foreach ($files['file_upload'] as $file) {
                        if ($file->getError() == 4) {
                            $namaFile = $this->request->getVar('file_lama');
                        } else {
                            $file->move('file/fileSyaratSurat/', str_replace(' ', '', $file->getName()));
                            if ($i !== 0) {
                                $namaFile .= '|';
                                $namaFile .= $file->getName();
                            }
                        }
                        $i++;
                    }
                    $str = explode('|', $this->request->getVar('file_lama'));
                    if ($this->request->getVar('file_lama') != null && $file->getError() != 4) {
                        for ($j = 0; $j < count($str); $j++) {
                            if (file_exists('/xampp/htdocs/desaapp/public/file/fileSyaratSurat/' . $str[$j])) {
                                unlink('file/fileSyaratSurat/' . $str[$j]);
                            }
                        }
                    }
                    $data = [
                        'judul' => $this->request->getVar('judul'),
                        'nohp' => $this->request->getVar('nohp'),
                        'usernameoremail' => $this->request->getVar('usernameoremail'),
                        'file' => ($files['file_upload'][0]->getError() == 4) ? $namaFile : str_replace(' ', '', $namaFile),
                    ];
                    $this->layananUmumModel->update($id, $data);
                    session()->setFlashData('pesan', 'diubah');
                    $message = session()->getFlashdata('pesan');
                }
            }
            $output = [
                'judul_error' => $judul_error,
                'nohp_error' => $nohp_error,
                'usernameoremail_error' => $usernameoremail_error,
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
            $str = explode('|', $this->layananUmumModel->getData($id)['file']);

            for ($i = 0; $i < count($str); $i++) {
                if (file_exists('/xampp/htdocs/desaapp/public/file/fileSyaratSurat/' . $str[$i]) && $str[$i] != null) {
                    unlink('file/fileSyaratSurat/' . $str[$i]);
                }
            }
            $this->layananUmumModel->delete($id);
            session()->setFlashData('pesan', 'dihapus.');
            echo session()->getFlashdata('pesan');
        }
    }

    public function ceklisDeleteButton()
    {
        $id = $this->request->getVar('id');
        for ($i = 0; $i < count($id); $i++) {
            $str = explode('|', $this->layananUmumModel->getData($id[$i])['file']);
            for ($j = 0; $j < count($str); $j++) {
                if (file_exists('/xampp/htdocs/desaapp/public/file/fileSyaratSurat/' . $str[$j]) && $str[$j] != null) {
                    unlink('file/fileSyaratSurat/' . $str[$j]);
                }
            }
        }
        $this->layananUmumModel->checkboxDelete($id);
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
                            'judul' => $value[0],
                            'nohp' => $value[1],
                            'usernameoremail' => $value[2]
                        ];
                        $this->layananUmumModel->save($data);
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
