<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <h2 class="my-3 text-center">Form Ubah Data Layanan Umum</h2>
    <form action="/layananUmumController/update/<?= $layananumum['id_layananumum']; ?>" method="post" enctype="multipart/form-data">
        <?= csrf_field(); ?>
        <input type="hidden" name="id_layananumum" value="<?= $layananumum['id_layananumum']; ?>">
        <div class="mb-3">
            <label for="judul" class="form-label">Judul</label>
            <input type="text" class="form-control <?= ($validation->hasError('judul')) ? 'is-invalid' : ''; ?>" id="judul" name="judul" value="<?= (old('judul')) ? old('judul') : $layananumum['judul'] ?>">
            <div class="invalid-feedback">
                <?= $validation->getError('judul'); ?>
            </div>
        </div>
        <div class="mb-3">
            <label for="keterangan" class="form-label">Keterangan</label>
            <textarea type="text" class="form-control <?= ($validation->hasError('keterangan')) ? 'is-invalid' : ''; ?>" id="keterangan" name="keterangan" rows="3"><?= (old('keterangan')) ? old('keterangan') : $layananumum['keterangan'] ?></textarea>
            <div class="invalid-feedback">
                <?= $validation->getError('keterangan'); ?>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Ubah Data</button>
        <script>
            CKEDITOR.replace('keterangan');
        </script>
</div>
</form>
</div>
<?= $this->endSection(); ?>