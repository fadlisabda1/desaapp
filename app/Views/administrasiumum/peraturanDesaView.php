<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container" style="margin-top: 90px;">
    <div class="flash-data" data-flashdata="<?= session()->getFlashdata('pesan'); ?>"></div>
    <br>
    <?php if ($validation->getError('nomorTglPeraturanDesa') != '') : ?>
        <div class=" alert alert-danger text-center" role="alert">
            <?= $validation->getError('nomorTglPeraturanDesa'); ?>
        </div>
    <?php elseif ($validation->getError('tentang') != '') : ?>
        <div class="alert alert-danger text-center" role="alert">
            <?= $validation->getError('tentang'); ?>
        </div>
    <?php elseif ($validation->getError('uraiansingkat') != '') : ?>
        <div class="alert alert-danger text-center" role="alert">
            <?= $validation->getError('uraiansingkat'); ?>
        </div>
    <?php endif; ?>
    <button type="button" class="btn tombolTambahData" data-bs-toggle="modal" data-bs-target="#formModal" style="color:white;background-color: rgb(48,123,109);">
        Tambah
    </button>
    <a class="btn" style="color:black;background-color: rgb(249,163,60);" href="">Print</a>
    <div class="table-responsive mt-2">
        <table id="sample_table" class="table table-bordered table-hover">
            <thead class="table-light">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nomor Dan Tgl Peraturan Desa</th>
                    <th scope="col">Tentang</th>
                    <th scope="col">Uraian Singkat</th>
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
                <form action="/peraturanDesaController/save" method="post">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="id" id="id" class="inputPeraturan">
                    <div class="mb-3">
                        <label for="nomorTglPeraturanDesa" class="form-label">Nomor Dan Tgl Peraturan Desa</label>
                        <input type="text" class="form-control <?= ($validation->hasError('nomorTglPeraturanDesa')) ? 'is-invalid' : ''; ?> inputPeraturan" id="nomorTglPeraturanDesa" name="nomorTglPeraturanDesa" value="<?= old('nomorTglPeraturanDesa'); ?>">
                    </div>
                    <div class="mb-3">
                        <label for="tentang" class="form-label">Tentang</label>
                        <input type="text" class="form-control <?= ($validation->hasError('tentang')) ? 'is-invalid' : ''; ?> inputPeraturan" id="tentang" name="tentang" value="<?= old('tentang'); ?>">
                    </div>
                    <div class="mb-3">
                        <label for="uraiansingkat" class="form-label">Uraian Singkat</label>
                        <input type="text" class="form-control <?= ($validation->hasError('uraiansingkat')) ? 'is-invalid' : ''; ?> inputPeraturan" id="uraiansingkat" name="uraiansingkat" value="<?= old('uraiansingkat'); ?>">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success" name="submit"></button>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>