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
        return view('bantuansosial/bantuanSosialView', $bantuanSosial);
    }

    public function ambilData()
    {
        $data_table = new TablesIgniter();
        $data_table->setTable($this->bantuanSosialModel->getDataNull())
            ->setDefaultOrder('id_bantuansosial', 'ESC')
            ->setSearch([
                'nomorktp', 'namapenerima', 'nohp', 'jenisbantuan', 'statuspenerimaan', 'jeniskelamin', 'alamat', 'pekerjaan', 'norekening', 'tanggallahir', 'tanggalpenerimaan'
            ])
            ->setOrder([
                'nomorktp', 'namapenerima', 'nohp', 'jenisbantuan', 'statuspenerimaan', 'jeniskelamin', 'alamat', 'pekerjaan', 'norekening', 'tanggallahir', 'tanggalpenerimaan', 'file'
            ])
            ->setOutput([
                $this->bantuanSosialModel->ceklisDelete(),
                'nomorktp', 'namapenerima', 'nohp', 'jenisbantuan', 'statuspenerimaan', 'jeniskelamin', 'alamat', 'pekerjaan', 'norekening', 'tanggallahir', 'tanggalpenerimaan', 'file', $this->bantuanSosialModel->button()
            ]);
        return $data_table->getDatatable();
    }

    public function action()
    {
        if ($this->request->getVar('action')) {
            helper(['form', 'url']);
            $nomorktp_error = '';
            $namapenerima_error = '';
            $nohp_error = '';
            $alamat_error = '';
            $pekerjaan_error = '';
            $norekening_error = '';
            $tgllahir_error = '';
            $error = 'no';
            $success = 'no';
            $message = '';
            $error = $this->validate([
                'nomorktp' => 'required',
                'namapenerima' => 'required',
                'nohp' => 'required',
                'alamat' => 'required',
                'pekerjaan' => 'required',
                'norekening' => 'required',
                'tgllahir' => 'required',
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
                if ($validation->getError('nohp')) {
                    $nohp_error = $validation->getError('nohp');
                }
                if ($validation->getError('alamat')) {
                    $alamat_error = $validation->getError('alamat');
                }
                if ($validation->getError('pekerjaan')) {
                    $pekerjaan_error = $validation->getError('pekerjaan');
                }
                if ($validation->getError('norekening')) {
                    $norekening_error = $validation->getError('norekening');
                }
                if ($validation->getError('tgllahir')) {
                    $tgllahir_error = $validation->getError('tgllahir');
                }
            } else {
                $success = 'yes';
                if ($this->request->getVar('action') == 'Add') {
                    $files = $this->request->getFiles();
                    $namaFile = $files['file_upload'][0]->getName();
                    $i = 0;
                    foreach ($files['file_upload'] as $file) {
                        if ($file->getError() === 0) {
                            $file->move('file/bantuansosial/', str_replace(' ', '', $file->getName()));
                            if ($i !== 0) {
                                $namaFile .= '|';
                                $namaFile .= $file->getName();
                            }
                        }
                        $i++;
                    }
                    $this->bantuanSosialModel->save([
                        'nomorktp' => $this->request->getVar('nomorktp'),
                        'namapenerima' => $this->request->getVar('namapenerima'),
                        'nohp' => $this->request->getVar('nohp'),
                        'jenisbantuan' => $this->request->getVar('jenisbantuan'),
                        'statuspenerimaan' => $this->request->getVar('statuspenerimaan'),
                        'jeniskelamin' => $this->request->getVar('jeniskelamin'),
                        'alamat' => $this->request->getVar('alamat'),
                        'pekerjaan' => $this->request->getVar('pekerjaan'),
                        'norekening' => $this->request->getVar('norekening'),
                        'tanggallahir' => $this->request->getVar('tgllahir'),
                        'tanggalpenerimaan' => $this->request->getVar('tglpenerimaan'),
                        'file' => ($file->getError() === 4) ?  null : str_replace(' ', '', $namaFile)
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
                            $file->move('file/bantuansosial/', str_replace(' ', '', $file->getName()));
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
                            if (file_exists('/xampp/htdocs/desaapp/public/file/bantuansosial/' . $str[$j])) {
                                unlink('file/bantuansosial/' . $str[$j]);
                            }
                        }
                    }
                    $data = [
                        'nomorktp' => $this->request->getVar('nomorktp'),
                        'namapenerima' => $this->request->getVar('namapenerima'),
                        'nohp' => $this->request->getVar('nohp'),
                        'jenisbantuan' => $this->request->getVar('jenisbantuan'),
                        'statuspenerimaan' => $this->request->getVar('statuspenerimaan'),
                        'jeniskelamin' => $this->request->getVar('jeniskelamin'),
                        'alamat' => $this->request->getVar('alamat'),
                        'pekerjaan' => $this->request->getVar('pekerjaan'),
                        'norekening' => $this->request->getVar('norekening'),
                        'tanggallahir' => $this->request->getVar('tgllahir'),
                        'tanggalpenerimaan' => $this->request->getVar('tglpenerimaan'),
                        'file' => ($files['file_upload'][0]->getError() == 4) ? $namaFile : str_replace(' ', '', $namaFile)
                    ];
                    $this->bantuanSosialModel->update($id, $data);
                    session()->setFlashData('pesan', 'diubah');
                    $message = session()->getFlashdata('pesan');
                }
            }
            $output = [
                'nomorktp_error' => $nomorktp_error,
                'namapenerima_error' => $namapenerima_error,
                'nohp_error' => $nohp_error,
                'alamat_error' => $alamat_error,
                'pekerjaan_error' => $pekerjaan_error,
                'norekening_error' => $norekening_error,
                'tgllahir_error' => $tgllahir_error,
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
            $str = explode('|', $this->bantuanSosialModel->getData($id)['file']);

            for ($i = 0; $i < count($str); $i++) {
                if (file_exists('/xampp/htdocs/desaapp/public/file/bantuansosial/' . $str[$i]) && $str[$i] != null) {
                    unlink('file/bantuansosial/' . $str[$i]);
                }
            }
            $this->bantuanSosialModel->delete($id);
            session()->setFlashData('pesan', 'dihapus.');
            echo session()->getFlashdata('pesan');
        }
    }

    public function ceklisDeleteButton()
    {
        $id = $this->request->getVar('id');
        for ($i = 0; $i < count($id); $i++) {
            $str = explode('|', $this->bantuanSosialModel->getData($id[$i])['file']);
            for ($j = 0; $j < count($str); $j++) {
                if (file_exists('/xampp/htdocs/desaapp/public/file/bantuansosial/' . $str[$j]) && $str[$j] != null) {
                    unlink('file/bantuansosial/' . $str[$j]);
                }
            }
        }
        $this->bantuanSosialModel->checkboxDelete($id);
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
                            'nomorktp' => $value[0],
                            'namapenerima' => $value[1],
                            'nohp' => $value[2],
                            'jenisbantuan' => $value[3],
                            'statuspenerimaan' => $value[4],
                            'jeniskelamin' => $value[5],
                            'alamat' => $value[6],
                            'pekerjaan' => $value[7],
                            'norekening' => $value[8],
                            'tanggallahir' => $value[9],
                            'tanggalpenerimaan' => $value[10],
                        ];
                        $this->bantuanSosialModel->save($data);
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
