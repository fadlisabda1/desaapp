<?php

namespace App\Controllers\perpajakan;

use App\Controllers\BaseController;

use monken\TablesIgniter;

class penerimaanPbbController extends BaseController
{
    public function index()
    {
        $perpajakan = [
            'title' => 'Perpajakan | Penerimaan Pajak Bumi & Bangunan',
        ];
        return view('perpajakan\index', $perpajakan);
    }

    public function ambilData()
    {
        $data_table = new TablesIgniter();
        $data_table->setTable($this->penerimaanPbbModel->getDataNull())
            ->setDefaultOrder('id_pbb', 'ESC')
            ->setSearch(['nomor_objek_pajak', 'nohp', 'nama_wajib_pajak', 'tahun', 'total_pbb_dibayar'])
            ->setOrder(['nomor_objek_pajak', 'nohp', 'nama_wajib_pajak', 'tahun', 'total_pbb_dibayar', 'gambar'])
            ->setOutput([$this->penerimaanPbbModel->ceklisDelete(), 'nomor_objek_pajak', 'nohp', 'nama_wajib_pajak', 'tahun', 'total_pbb_dibayar', 'gambar', $this->penerimaanPbbModel->button()]);
        return $data_table->getDatatable();
    }

    public function action()
    {
        if ($this->request->getVar('action')) {
            helper(['form', 'url']);
            $nop_error = '';
            $nohp_error = '';
            $nama_error = '';
            $tahun_error = '';
            $totalyangdibayar_error = '';
            $file_error = '';
            $error = 'no';
            $success = 'no';
            $message = '';
            $error = $this->validate([
                'nop' => 'required',
                'nohp' => 'required',
                'nama' => 'required',
                'tahun' => 'required',
                'totalyangdibayar' => 'required',
                'file' => 'max_size[file,1024]|is_image[file]|mime_in[file,image/jpg,image/jpeg,image/png]',
            ]);
            if (!$error) {
                $error = 'yes';
                $validation = \Config\Services::validation();
                if ($validation->getError('nop')) {
                    $nop_error = $validation->getError('nop');
                }
                if ($validation->getError('nohp')) {
                    $nohp_error = $validation->getError('nohp');
                }
                if ($validation->getError('nama')) {
                    $nama_error = $validation->getError('nama');
                }
                if ($validation->getError('tahun')) {
                    $tahun_error = $validation->getError('tahun');
                }
                if ($validation->getError('totalyangdibayar')) {
                    $totalyangdibayar_error = $validation->getError('totalyangdibayar');
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
                        $filegambar->move('gambar/buktipembayaran/', $namagambar);
                    }
                    $this->penerimaanPbbModel->save([
                        'nomor_objek_pajak' => $this->request->getVar('nop'),
                        'nohp' => $this->request->getVar('nohp'),
                        'nama_wajib_pajak' => $this->request->getVar('nama'),
                        'tahun' => $this->request->getVar('tahun'),
                        'total_pbb_dibayar' => $this->request->getVar('totalyangdibayar'),
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
                        $fileImage->move('gambar/buktipembayaran/', $namaImage);
                        if ($this->request->getVar('gambar_lama') != null && $fileImage->getError() != 4 && file_exists('/xampp/htdocs/desaapp/public/gambar/buktipembayaran/' . $namaImage)) {
                            unlink('gambar/buktipembayaran/' . $this->request->getVar('gambar_lama'));
                        }
                    }
                    $data = [
                        'nomor_objek_pajak' => $this->request->getVar('nop'),
                        'nohp' => $this->request->getVar('nohp'),
                        'nama_wajib_pajak' => $this->request->getVar('nama'),
                        'tahun' => $this->request->getVar('tahun'),
                        'total_pbb_dibayar' => $this->request->getVar('totalyangdibayar'),
                        'gambar' => $namaImage
                    ];
                    $this->penerimaanPbbModel->update($id, $data);
                    session()->setFlashData('pesan', 'diubah');
                    $message = session()->getFlashdata('pesan');
                }
            }
            $output = [
                'nop_error' => $nop_error,
                'nohp_error' => $nohp_error,
                'nama_error' => $nama_error,
                'tahun_error' => $tahun_error,
                'totalyangdibayar_error' => $totalyangdibayar_error,
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
            $perpajakan_data = $this->penerimaanPbbModel->where('id_pbb', $this->request->getVar('id'))->first();
            echo json_encode($perpajakan_data);
        }
    }

    public function delete()
    {
        if ($this->request->getVar('id')) {
            $id = $this->request->getVar('id');
            $gambar = $this->penerimaanPbbModel->getData($id)['gambar'];
            if (file_exists('/xampp/htdocs/desaapp/public/gambar/buktipembayaran/' . $gambar) && $gambar != null) {
                unlink('gambar/buktipembayaran/' . $gambar);
            }
            $this->penerimaanPbbModel->delete($id);
            session()->setFlashData('pesan', "dihapus.");
            echo session()->getFlashdata('pesan');
        }
    }

    public function deleteUser()
    {
        if ($this->request->getVar('id')) {
            $id = $this->request->getVar('id');
            $gambar = $this->penerimaanPbbModel->getData($id)['gambar'];
            if (file_exists('/xampp/htdocs/desaapp/public/gambar/buktipembayaran/' . $gambar) && $gambar != null) {
                unlink('gambar/buktipembayaran/' . $gambar);
            }
            session()->setFlashData('pesan', "dihapus.");
            echo session()->getFlashdata('pesan');
        }
    }

    public function ceklisDeleteButton()
    {
        $id = $this->request->getVar('id');
        for ($i = 0; $i < count($id); $i++) {
            $gambar = $this->penerimaanPbbModel->getData($id[$i])['gambar'];
            if (file_exists('/xampp/htdocs/desaapp/public/gambar/buktipembayaran/' . $gambar) && $gambar != null) {
                unlink('gambar/buktipembayaran/' . $gambar);
            }
        }
        $this->penerimaanPbbModel->checkboxDelete($id);
        session()->setFlashData('pesan', "dihapus.");
        echo session()->getFlashdata('pesan');
    }
}
