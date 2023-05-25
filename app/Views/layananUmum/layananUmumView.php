<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>
<div class="card shadow mb-4 mt-4">
    <div class="card-header py-3">
        <button type="button" class="btn tombolTambahData" data-bs-toggle="modal" data-bs-target="#formModal" style="color:white;background-color: rgb(48,123,109);">
            Tambah
        </button>
        <button type="button" class="btn import" data-bs-toggle="modal" data-bs-target="#importModal" style="color:white;background-color: rgb(48,123,109);">
            Import Xls-Csv-Xlsx
        </button>
    </div>
    <ol class="list-group list-group-numbered">
        <li class="list-group-item d-flex justify-content-between align-items-start">
            <div class="ms-2 me-auto">
                <div class="fw-bold">Surat Keterangan Domisili</div>
                -Fotocopy kk dan ktp <br>
                -surat pengantar rt setempat<br>
                -fotocopy kartu vaksin dan kartu sampah<br>
                -fotocopy pelunasan PBB(Pajak Bumi Dan Bangunan)rumah tahun berjalan
            </div>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-start">
            <div class="ms-2 me-auto">
                <div class="fw-bold">Surat Keterangan Campuran</div>
                -Fotocopy kk (wajib kk desa tanah merah ) dan ktp <br>
                -surat pengantar rt setempat<br>
                -fotocopy kartu vaksin dan kartu sampah<br>
                -fotocopy pelunasan PBB(Pajak Bumi Dan Bangunan)rumah tahun berjalan
                -berkas lain yang dirasa perlu
            </div>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-start">
            <div class="ms-2 me-auto">
                <div class="fw-bold">Surat Keterangan Usaha</div>
                -Fotocopy kk dan ktp <br>
                -surat pengantar rt setempat usaha<br>
                -pas foto 3x4 (2lembar)<br>
                -foto usaha<br>
                -fotocopy kartu vaksin dan kartu sampah<br>
                -fotocopy pelunasan PBB(Pajak Bumi Dan Bangunan)rumah tahun berjalan
            </div>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-start">
            <div class="ms-2 me-auto">
                <div class="fw-bold">Surat Pengantar KK</div>
                -Formulir F1.01<br>
                -surat pindah dari disdukcapil (bagi diluar kab.kampar)<br>
                -Fotocopy kk dan ktp <br>
                -Fotocopy surat nikah (apabila sudah nikah) <br>
                -Fotocopy surat keterangan lahir anak (apabila sudah punya anak)<br>
                -fotocopy kartu vaksin dan kartu sampah<br>
                -fotocopy pelunasan PBB(Pajak Bumi Dan Bangunan)rumah tahun berjalan
            </div>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-start">
            <div class="ms-2 me-auto">
                <div class="fw-bold">Surat Keterangan Nikah</div>
                -Formulir N1.N4<br>
                -Fotocopy kk (wajib kk desa tanah merah ) dan ktp(yang bersangkutan,orang tua)<br>
                -pas foto 2x3 (2lembar) laki laki pakai peci<br>
                -fotocopy kartu vaksin dan kartu sampah<br>
                -fotocopy pelunasan PBB(Pajak Bumi Dan Bangunan)rumah tahun berjalan
            </div>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-start">
            <div class="ms-2 me-auto">
                <div class="fw-bold">Surat Pengantar Pindah</div>
                -Formulir Pindah<br>
                -Fotocopy kk dan ktp<br>
                -pas foto 3x4 (2lembar)<br>
                -fotocopy kartu vaksin dan kartu sampah<br>
                -fotocopy pelunasan PBB(Pajak Bumi Dan Bangunan)rumah tahun berjalan
            </div>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-start">
            <div class="ms-2 me-auto">
                <div class="fw-bold">Surat Keterangan Lahir & Masukkan Anak Dalam KK</div>
                -Fotocopy kk (wajib kk desa tanah merah ) dan ktp<br>
                -Surat Pengantar RT Setempat<br>
                -fotocopy surat nikah<br>
                -fotocopy surat keterangan lahir dari bidan rs<br>
                -fotocopy kartu vaksin dan kartu sampah<br>
                -fotocopy pelunasan PBB(Pajak Bumi Dan Bangunan)rumah tahun berjalan
            </div>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-start">
            <div class="ms-2 me-auto">
                <div class="fw-bold">Surat Keterangan Belum Memiliki Rumah</div>
                -Fotocopy kk (wajib kk desa tanah merah ) dan ktp<br>
                -Surat Pengantar RT Setempat<br>
                -surat pernyataan dari developer<br>
                -fotocopy kartu vaksin dan kartu sampah<br>
                -fotocopy pelunasan PBB(Pajak Bumi Dan Bangunan)rumah tahun berjalan
            </div>
        </li>
    </ol>
    <div class="card-body">
        <div class="table-responsive mt-2">
            <table id="sample_table3" class="table table-bordered table-hover">
                <thead class="table-light">
                    <tr>
                        <th scope="col">Ceklis</th>
                        <th scope="col">Surat</th>
                        <th scope="col">No Hp</th>
                        <th scope="col">Username Atau Email</th>
                        <th scope="col">File</th>
                        <th scope="col">Tindakan</th>
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
                <form method="post" id="layananImport_form" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <div class="mb-3">
                        <label class="form-label" for="file">Pilih File</label>
                        <input type="file" class="form-control" id="file" name="file">
                    </div>
            </div>
            <div class="modal-footer">
                <input type="hidden" id="action" name="action" value="Add" />
                <input type="submit" class="btn btn-success" name="submit" id="submit_button" value="Add"></input>
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
                <form method="post" id="layananumum_form" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="file_lama" id="file_lama">
                    <label class="form-check-label" for="judul">
                        Surat
                    </label>
                    <select class="form-select mb-3" aria-label="Default select example" name="judul" id="judul">
                        <option value="Surat Keterangan Domisili">Surat Keterangan Domisili</option>
                        <option value="Surat Keterangan Campuran">Surat Keterangan Campuran</option>
                        <option value="Surat Keterangan Usaha">Surat Keterangan Usaha</option>
                        <option value="Surat Pengantar KK">Surat Keterangan Pengantar KK</option>
                        <option value="Surat Keterangan Nikah">Surat Keterangan Nikah</option>
                        <option value="Surat Pengantar Pindah">Surat Keterangan Pengantar Pindah</option>
                        <option value="Surat Lahir Dan Masukkan Anak Dalam KK">Surat Keterangan Lahir Dan Masukkan Anak Dalam KK</option>
                        <option value="Surat Keterangan Belum Memiliki Rumah">Surat Keterangan Keterangan Belum Memiliki Rumah</option>
                    </select>
                    <div class="mb-3">
                        <label for="nohp" class="form-label">Nohp</label>
                        <input type="number" class="form-control" id="nohp" name="nohp">
                        <span id="nohp_error" class="text-danger"></span>
                    </div>
                    <span id="keterangan_error" class="text-danger"></span>
                    <div class="mb-3">
                        <label for="usernameoremail" class="form-label">Username Atau Email</label>
                        <input type="text" class="form-control" id="usernameoremail" name="usernameoremail">
                        <span id="usernameoremail_error" class="text-danger"></span>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="file">Pilih File</label>
                        <input type="file" class="form-control" id="file" name="file_upload[]" multiple="true">
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