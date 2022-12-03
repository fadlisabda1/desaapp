<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container" style="margin-top: 10px;">
    <button type="button" class="btn tombolTambahData" data-bs-toggle="modal" data-bs-target="#formModal" style="color:white;background-color: rgb(48,123,109);">
        Tambah
    </button>
    <a class="btn" style="color:black;background-color: rgb(249,163,60);" href="peraturanDesaController/cetak" target="_blank">Print</a>
    <div class="table-responsive mt-2">
        <table id="sample_table" class="table table-bordered table-hover">
            <thead class="table-light">
                <tr>
                    <th scope="col">Ceklis</th>
                    <th scope="col">No</th>
                    <th scope="col">Nomor Dan Tgl Peraturan Desa</th>
                    <th scope="col">Tentang</th>
                    <th scope="col">Uraian Singkat</th>
                    <th scope="col">Tindakan</th>
                </tr>
            </thead>
        </table>
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
                <form method="post" id="peraturan_form">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="id" id="id">
                    <div class="mb-3">
                        <label for="nomorTglPeraturanDesa" class="form-label">Nomor Dan Tgl Peraturan Desa</label>
                        <input type="text" class="form-control" id="nomorTglPeraturanDesa" name="nomorTglPeraturanDesa">
                        <span id="nomorTglPeraturanDesa_error" class="text-danger"></span>
                    </div>
                    <div class="mb-3">
                        <label for="tentang" class="form-label">Tentang</label>
                        <input type="text" class="form-control" id="tentang" name="tentang">
                        <span id="tentang_error" class="text-danger"></span>
                    </div>
                    <div class="mb-3">
                        <label for="uraiansingkat" class="form-label">Uraian Singkat</label>
                        <input type="text" class="form-control" id="uraiansingkat" name="uraiansingkat">
                        <span id="uraiansingkat_error" class="text-danger"></span>
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