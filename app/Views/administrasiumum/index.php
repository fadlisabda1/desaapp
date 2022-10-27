<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <a href="/" class="btn btn-success mt-3 mb-3">Kembali ke profil desa</a>
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
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="table-light">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nomor Dan Tgl Peraturan Desa</th>
                    <th scope="col">Tentang</th>
                    <th scope="col">Uraian Singkat</th>
                    <th scope="col">Tindakan</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($data as $d) : ?>
                    <tr>
                        <th scope="row"><?= $i++; ?></th>
                        <td><?= $d['nomor_tgl_peraturan']; ?></td>
                        <td><?= $d['tentang']; ?></td>
                        <td><?= $d['uraiansingkat']; ?></td>
                        <td>
                            <a href="/peraturanDesaController/edit/<?= $d['id_peraturan_desa']; ?>" class="btn btn-warning mb-1 tampilModalUbah" data-bs-toggle="modal" data-bs-target="#formModal" data-id="<?= $d['id_peraturan_desa']; ?>">Edit</a>
                            <form action="/peraturanDesaController/delete/<?= $d['id_peraturan_desa']; ?>" method="post" class="d-inline tombol-hapus" id="myCheck">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="judulModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="judulModalLabel">Tambah Data Peraturan</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/peraturanDesaController/save" method="post">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="id" id="id">
                    <div class="mb-3">
                        <label for="nomorTglPeraturanDesa" class="form-label">Nomor Dan Tgl Peraturan Desa</label>
                        <input type="text" class="form-control <?= ($validation->hasError('nomorTglPeraturanDesa')) ? 'is-invalid' : ''; ?>" id="nomorTglPeraturanDesa" name="nomorTglPeraturanDesa" autofocus value="<?= old('nomorTglPeraturanDesa'); ?>">
                    </div>
                    <div class="mb-3">
                        <label for="tentang" class="form-label">Tentang</label>
                        <input type="text" class="form-control <?= ($validation->hasError('tentang')) ? 'is-invalid' : ''; ?>" id="tentang" name="tentang" value="<?= old('tentang'); ?>">
                    </div>
                    <div class="mb-3">
                        <label for="uraiansingkat" class="form-label">Uraian Singkat</label>
                        <input type="text" class="form-control <?= ($validation->hasError('uraiansingkat')) ? 'is-invalid' : ''; ?>" id="uraiansingkat" name="uraiansingkat" value="<?= old('uraiansingkat'); ?>">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success" name="submit">Tambah Data</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>