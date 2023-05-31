<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <h2 class="my-3 text-center">Form Ubah Data Berita</h2>
    <form action="/beritaController/update/<?= $berita['id_berita']; ?>" method="post" enctype="multipart/form-data">
        <?= csrf_field(); ?>
        <input type="hidden" name="id_berita" value="<?= $berita['id_berita']; ?>">
        <input type="hidden" name="fileLama" value="<?= $berita['file']; ?>">
        <div class="mb-3">
            <label for="judul" class="form-label">Judul</label>
            <input type="text" class="form-control <?= ($validation->hasError('judul')) ? 'is-invalid' : ''; ?>" id="judul" name="judul" value="<?= (old('judul')) ? old('judul') : $berita['judul'] ?>">
            <div class="invalid-feedback">
                <?= $validation->getError('judul'); ?>
            </div>
        </div>
        <div class="mb-3">
            <label for="keterangan" class="form-label">Keterangan</label>
            <textarea type="text" class="form-control <?= ($validation->hasError('keterangan')) ? 'is-invalid' : ''; ?>" id="keterangan" name="keterangan" rows="3"><?= (old('keterangan')) ? old('keterangan') : $berita['keterangan'] ?></textarea>
            <div class="invalid-feedback">
                <?= $validation->getError('keterangan'); ?>
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label labelFile" for="file">Pilih File</label>
            <input type="file" class="form-control <?= ($validation->hasError('file')) ? 'is-invalid' : ''; ?>" id="file" name="file_upload[]" multiple="true">
            <div class="invalid-feedback">
                <?= $validation->getError('file'); ?>
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