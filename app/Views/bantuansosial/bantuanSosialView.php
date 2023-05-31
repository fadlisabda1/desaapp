<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>
<div class="card shadow mb-4 mt-4">
    <div class="card-header py-3">
        <ol class="list-group list-group-numbered">
            <li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                    <div class="fw-bold">Peraturan Program Keluarga Harapan(PKH) dari pemerintah pusat melalui kementerian sosial</div>
                    -bantuan hanya dikasi 3 bulan sekali selama 1 tahun atau 4kali setahun berupa uang dan sembako<br>
                    -syarat ambil bantuan kirim foto kk,ktp dan Kartu Keluarga Sejahtera (KKS) jika belum ada urus ke dinas sosial <br>
                </div>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                    <div class="fw-bold">Peraturan Bantuan Pangan Non Tunai(BPNT) dari pemerintah pusat melalui kementerian sosial</div>
                    -bantuan hanya dikasi 3 bulan sekali selama 1 tahun atau 4kali setahun berupa uang<br>
                    -syarat ambil bantuan kirim foto kk,ktp dan undangan yang dikasih oleh desa<br>
                </div>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                    <div class="fw-bold">Peraturan bantuan langsung tunai(BLT) Dana Desa dari Pemerintah Desa</div>
                    -bantuan hanya dikasi 3 bulan sekali selama 1 tahun atau 4kali setahun berupa uang<br>
                    -syarat ambil bantuan kirim foto kk,ktp<br>
                </div>
            </li>
        </ol>
        <button type="button" class="btn tombolTambahData" data-bs-toggle="modal" data-bs-target="#formModal" style="color:white;background-color: rgb(48,123,109);">
            Tambah
        </button>
        <?php if (in_groups('admin')) : ?>
            <button type="button" class="btn import" data-bs-toggle="modal" data-bs-target="#importModal" style="color:white;background-color: rgb(48,123,109);">
                Import Xls-Csv-Xlsx
            </button>
        <?php endif; ?>
    </div>
    <div class="card-body">
        <div class="table-responsive mt-2">
            <table id="sample_table5" class="table table-bordered table-hover">
                <thead class="table-light">
                    <tr>
                        <th scope="col">Ceklis</th>
                        <th scope="col">Nomor KTP/KK</th>
                        <th scope="col">Nama Penerima/Kepala Keluarga</th>
                        <th scope="col">Nomor Hp</th>
                        <th scope="col">Jenis Bantuan</th>
                        <th scope="col">Status Penerimaan</th>
                        <th scope="col">Jenis Kelamin</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Pekerjaan</th>
                        <th scope="col">Nomor Rekening</th>
                        <th scope="col">Tanggal Lahir</th>
                        <th scope="col">Tanggal Penerimaan</th>
                        <th scope="col">File</th>
                        <?php if (in_groups('admin')) : ?>
                            <th scope="col">Tindakan</th>
                        <?php endif; ?>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="importModal" tabindex="-1" aria-labelledby="judulModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="judulModalLabel"></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" id="bantuanSosialImport_form" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <div class="mb-3">
                        <label class="form-label" for="file">Pilih File</label>
                        <input type="file" class="form-control" id="file" name="file">
                    </div>
            </div>
            <div class="modal-footer">
                <input type="hidden" id="actionn" name="actionn" value="Add" />
                <input type="submit" class="btn btn-success" name="submit" id="submit_buttonn" value="Add"></input>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="judulModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="judulModalLabel"></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" id="bantuansosial_form" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="file_lama" id="file_lama">
                    <div class="mb-3">
                        <label for="nomorktp" class="form-label">Nomor Ktp/Cekpos</label>
                        <input type="number" class="form-control" id="nomorktp" name="nomorktp">
                        <span id="nomorktp_error" class="text-danger"></span>
                    </div>
                    <div class="mb-3">
                        <label for="namapenerima" class="form-label">Nama Penerima</label>
                        <input type="text" class="form-control" id="namapenerima" name="namapenerima">
                        <span id="namapenerima_error" class="text-danger"></span>
                    </div>
                    <div class="mb-3">
                        <label for="nohp" class="form-label">No Hp</label>
                        <input type="number" class="form-control" id="nohp" name="nohp">
                        <span id="nohp_error" class="text-danger"></span>
                    </div>
                    <label class="form-check-label" for="jenisbantuan">
                        Jenis Bantuan
                    </label>
                    <select class="form-select mb-3" aria-label="Default select example" name="jenisbantuan" id="jenisbantuan">
                        <option selected value="danadesablt">Dana Desa & Blt</option>
                        <option value="pkh">Pkh</option>
                        <option value="bnba">Bnba</option>
                    </select>
                    <label class="form-check-label" for="statuspenerimaan">
                        Status Penerimaan
                    </label>
                    <select class="form-select mb-3" aria-label="Default select example" name="statuspenerimaan" id="statuspenerimaan">
                        <option value="tahap ke-1">Tahap ke-1</option>
                        <option value="tahap ke-2">Tahap ke-2</option>
                        <option value="tahap ke-3">Tahap ke-3</option>
                        <option value="tahap ke-4">Tahap ke-4</option>
                    </select>
                    <label class="form-check-label" for="pria">
                        Jenis Kelamin
                    </label>
                    <div class="form-check">
                        <input class="form-check-input jeniskelamin" type="radio" name="jeniskelamin" id="pria" value="pria" checked>
                        <label class="form-check-label" for="pria">
                            Pria
                        </label>
                    </div>
                    <div class="form-check mb-3">
                        <input class="form-check-input jeniskelamin" type="radio" name="jeniskelamin" id="wanita" value="wanita">
                        <label class="form-check-label" for="wanita">
                            Wanita
                        </label>
                    </div>
                    <div class="form-floating mb-3">
                        <textarea class="form-control" placeholder="Tolong Isi Dengan Lengkap" id="alamat" name="alamat"></textarea>
                        <label for="alamat">Alamat</label>
                        <span id="alamat_error" class="text-danger"></span>
                    </div>
                    <div class="mb-3">
                        <label for="pekerjaan" class="form-label">Pekerjaan</label>
                        <input type="text" class="form-control" id="pekerjaan" name="pekerjaan">
                        <span id="pekerjaan_error" class="text-danger"></span>
                    </div>
                    <div class="mb-3">
                        <label for="norekening" class="form-label">No Rekening</label>
                        <input type="number" class="form-control" id="norekening" name="norekening">
                        <span id="norekening_error" class="text-danger"></span>
                    </div>
                    <div class="mb-3">
                        <label for="tgllahir" class="form-label">Tanggal Lahir</label>
                        <input type="date" class="form-control" id="tgllahir" name="tgllahir">
                        <span id="tgllahir_error" class="text-danger"></span>
                    </div>
                    <?php if (in_groups('admin')) : ?>
                        <div class="mb-3">
                            <label for="tglpenerimaan" class="form-label">Tanggal Penerimaan</label>
                            <input type="datetime-local" class="form-control" id="tglpenerimaan" name="tglpenerimaan">
                        </div>
                    <?php endif; ?>
                    <div class="mb-3">
                        <label class="form-label" for="fileBantuan">Pilih File</label>
                        <input type="file" class="form-control" id="fileBantuan" name="file_upload[]" multiple="true">
                    </div>
            </div>
            <div class="modal-footer">
                <input type="hidden" id="hidden_id" name="hidden_id" />
                <input type="hidden" id="action" name="action" value="Add" />
                <input type="submit" class="btn btn-success" name="submit" id="submit_button" value="Add"></input>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>