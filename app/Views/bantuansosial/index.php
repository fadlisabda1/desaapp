<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>
<div class="card shadow mb-4 mt-4">
    <?php if (in_groups('admin')) : ?>
        <div class="card-header py-3">
            <button type="button" class="btn tombolTambahData" data-bs-toggle="modal" data-bs-target="#formModal" style="color:white;background-color: rgb(48,123,109);">
                Tambah
            </button>
        </div>
    <?php endif; ?>
    <div class="card-body">
        <div class="table-responsive mt-2">
            <table id="sample_table5" class="table table-bordered table-hover">
                <thead class="table-light">
                    <tr>
                        <th scope="col">Ceklis</th>
                        <th scope="col">Nomor KTP/Cekpos</th>
                        <th scope="col">Nama Penerima</th>
                        <th scope="col">Jenis Bantuan</th>
                        <th scope="col">Status Penerimaan</th>
                        <th scope="col">Jenis Kelamin</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Pekerjaan</th>
                        <th scope="col">Tanggal Lahir</th>
                        <th scope="col">Tanggal Penerimaan</th>
                        <th scope="col">Bukti Penerimaan</th>
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
<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="judulModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="judulModalLabel"></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" id="bantuansosial_form">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="id" id="id">
                    <input type="hidden" name="gambar_lama" id="gambar_lama">
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
                    <label class="form-check-label" for="jenisbantuan">
                        Jenis Bantuan
                    </label>
                    <select class="form-select mb-3" aria-label="Default select example" name="jenisbantuan" id="jenisbantuan">
                        <option value="danadesablt">Dana Desa & Blt</option>
                        <option value="pkh">Pkh</option>
                        <option value="bnba">Bnba</option>
                    </select>
                    <label class="form-check-label" for="statuspenerimaan">
                        Status Penerimaan
                    </label>
                    <select class="form-select mb-3" aria-label="Default select example" name="statuspenerimaan" id="statuspenerimaan">
                        <option value="belum">Belum</option>
                        <option value="selesai">Selesai</option>
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
                        <label for="tgllahir" class="form-label">Tanggal Lahir</label>
                        <input type="date" class="form-control" id="tgllahir" name="tgllahir">
                        <span id="tgllahir_error" class="text-danger"></span>
                    </div>
                    <div class="mb-3">
                        <label for="tglpenerimaan" class="form-label">Tanggal Penerimaan</label>
                        <input type="datetime-local" class="form-control" id="tglpenerimaan" name="tglpenerimaan">
                        <span id="tglpenerimaan_error" class="text-danger"></span>
                    </div>
                    <div class="mb-3">
                        <label for="file" class="form-label">File</label>
                        <input type="file" class="form-control" name="file" id="file" onchange="previewFile()">
                        <span id="file_error" class="text-danger"></span>
                        <img src="" class="img-fluid file-preview mt-2 tampilanfile">
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