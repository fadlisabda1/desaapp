<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>
<div class="card shadow mb-4 mt-4">
    <?php if (in_groups('admin')) : ?>
        <div class="card-header py-3">
            <button type="button" class="btn tombolTambahData" data-bs-toggle="modal" data-bs-target="#formModal" style="color:white;background-color: rgb(48,123,109);">
                Tambah
            </button>
            <button type="button" class="btn import" data-bs-toggle="modal" data-bs-target="#importModal" style="color:white;background-color: rgb(48,123,109);">
                Import Xls-Csv-Xlsx
            </button>
        </div>
    <?php endif; ?>
    <div class="card-body">
        <div class="table-responsive mt-2">
            <table id="sample_table" class="table table-bordered table-hover">
                <thead class="table-light">
                    <tr>
                        <th scope="col">Ceklis</th>
                        <th scope="col">Nomor Dan Tgl Peraturan Desa</th>
                        <th scope="col">Tentang</th>
                        <th scope="col">Uraian Singkat</th>
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
            <div class="modal-headerr">
                <h1 class="modal-title fs-5" id="judulModalLabel"></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" id="peraturanImport_form" enctype="multipart/form-data">
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
                <form method="post" id="peraturan_form">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="id" id="id">
                    <div class="mb-3">
                        <label for="nomorTglPeraturanDesa" class="form-label">Nomor Dan Tgl Peraturan Desa</label>
                        <input type="text" class="form-control" id="nomorTglPeraturanDesa" name="nomorTglPeraturanDesa">
                        <span id="nomorTglPeraturanDesa_error" class="text-danger"></span>
                    </div>
                    <div class="form-floating mb-3">
                        <textarea class="form-control" id="tentang" name="tentang"></textarea>
                        <label for="tentang">Tentang</label>
                        <span id="tentang_error" class="text-danger"></span>
                    </div>
                    <div class="form-floating mb-3">
                        <textarea class="form-control" id="uraiansingkat" name="uraiansingkat"></textarea>
                        <label for="uraiansingkat">Uraian Singkat</label>
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