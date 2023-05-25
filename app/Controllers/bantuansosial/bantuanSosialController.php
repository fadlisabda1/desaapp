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
                'nomorktp', 'namapenerima', 'jenisbantuan', 'statuspenerimaan', 'jeniskelamin', 'alamat', 'pekerjaan', 'tanggallahir', 'tanggalpenerimaan'
            ])
            ->setOrder([
                'nomorktp', 'namapenerima', 'jenisbantuan', 'statuspenerimaan', 'jeniskelamin', 'alamat', 'pekerjaan', 'tanggallahir', 'tanggalpenerimaan', 'gambar'
            ])
            ->setOutput([
                $this->bantuanSosialModel->ceklisDelete(),
                'nomorktp', 'namapenerima', 'jenisbantuan', 'statuspenerimaan', 'jeniskelamin', 'alamat', 'pekerjaan', 'tanggallahir', 'tanggalpenerimaan', 'gambar', $this->bantuanSosialModel->button()
            ]);
        return $data_table->getDatatable();
    }

    public function action()
    {
        if ($this->request->getVar('action')) {
            helper(['form', 'url']);
            $nomorktp_error = '';
            $namapenerima_error = '';
            $alamat_error = '';
            $pekerjaan_error = '';
            $tgllahir_error = '';
            $tglpenerimaan_error = '';
            $file_error = '';
            $error = 'no';
            $success = 'no';
            $message = '';
            $error = $this->validate([
                'nomorktp' => 'required',
                'namapenerima' => 'required',
                'alamat' => 'required',
                'pekerjaan' => 'required',
                'tgllahir' => 'required',
                'tglpenerimaan' => 'required',
                'file' => 'max_size[file,1024]|is_image[file]|mime_in[file,image/jpg,image/jpeg,image/png]',
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
                if ($validation->getError('alamat')) {
                    $alamat_error = $validation->getError('alamat');
                }
                if ($validation->getError('pekerjaan')) {
                    $pekerjaan_error = $validation->getError('pekerjaan');
                }
                if ($validation->getError('tgllahir')) {
                    $tgllahir_error = $validation->getError('tgllahir');
                }
                if ($validation->getError('tglpenerimaan')) {
                    $tglpenerimaan_error = $validation->getError('tglpenerimaan');
                }
                if ($validation->getError('file')) {
                    $file_error = $validation->getError('file');
                }
            } else {
                $success = 'yes';
                if ($this->request->getVar('action') == 'Add') {
                    $filegambar = $this->request->getFile('file');
                    $namagambar = $filegambar->getRandomName();
                    if ($filegambar->getError() === 0) {
                        $filegambar->move('gambar/bantuansosial/', $namagambar);
                    }
                    $this->bantuanSosialModel->save([
                        'nomorktp' => $this->request->getVar('nomorktp'),
                        'namapenerima' => $this->request->getVar('namapenerima'),
                        'jenisbantuan' => $this->request->getVar('jenisbantuan'),
                        'statuspenerimaan' => $this->request->getVar('statuspenerimaan'),
                        'jeniskelamin' => $this->request->getVar('jeniskelamin'),
                        'alamat' => $this->request->getVar('alamat'),
                        'pekerjaan' => $this->request->getVar('pekerjaan'),
                        'tanggallahir' => $this->request->getVar('tgllahir'),
                        'tanggalpenerimaan' => $this->request->getVar('tglpenerimaan'),
                        'gambar' => ($filegambar->getError() === 4) ?  '' : $namagambar
                    ]);
                    session()->setFlashData('pesan', 'ditambahkan');
                    $message = session()->getFlashdata('pesan');
                }
                if ($this->request->getVar('action') == 'Edit') {
                    $id = $this->request->getVar('hidden_id');
                    $fileImage = $this->request->getFile('file');
                    if ($fileImage->getError() == 4) {
                        $namaImage = $this->request->getVar('gambar_lama');
                    } else {
                        $namaImage = $fileImage->getRandomName();
                        $fileImage->move('gambar/bantuansosial/', $namaImage);
                        if ($this->request->getVar('gambar_lama') != null && $fileImage->getError() != 4 && file_exists('/xampp/htdocs/desaapp/public/gambar/bantuansosial/' . $namaImage)) {
                            unlink('gambar/bantuansosial/' . $this->request->getVar('gambar_lama'));
                        }
                    }
                    $data = [
                        'nomorktp' => $this->request->getVar('nomorktp'),
                        'namapenerima' => $this->request->getVar('namapenerima'),
                        'jenisbantuan' => $this->request->getVar('jenisbantuan'),
                        'statuspenerimaan' => $this->request->getVar('statuspenerimaan'),
                        'jeniskelamin' => $this->request->getVar('jeniskelamin'),
                        'alamat' => $this->request->getVar('alamat'),
                        'pekerjaan' => $this->request->getVar('pekerjaan'),
                        'tanggallahir' => $this->request->getVar('tgllahir'),
                        'tanggalpenerimaan' => $this->request->getVar('tglpenerimaan'),
                        'gambar' => $namaImage
                    ];
                    $this->bantuanSosialModel->update($id, $data);
                    session()->setFlashData('pesan', 'diubah');
                    $message = session()->getFlashdata('pesan');
                }
            }
            $output = [
                'nomorktp_error' => $nomorktp_error,
                'namapenerima_error' => $namapenerima_error,
                'alamat_error' => $alamat_error,
                'pekerjaan_error' => $pekerjaan_error,
                'tgllahir_error' => $tgllahir_error,
                'tglpenerimaan_error' => $tglpenerimaan_error,
                'file_error' => $file_error,
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
            $gambar = $this->bantuanSosialModel->getData($id)['gambar'];
            if (file_exists('/xampp/htdocs/desaapp/public/gambar/bantuansosial/' . $gambar) && $gambar != null) {
                unlink('gambar/bantuansosial/' . $gambar);
            }
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
