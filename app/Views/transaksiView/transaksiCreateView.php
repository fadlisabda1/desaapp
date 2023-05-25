<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <h2 class="my-3 text-center">Form Booking Barang</h2>
    <form action="/transaksiController/save" method="post">
        <?= csrf_field(); ?>
        <input type="hidden" name="username" value="<?= user()->username; ?>">
        <input type="hidden" name="idbarang" value="<?= $dataepasar['id_barang']; ?>">
        <input type="hidden" name="harga" value="<?= $dataepasar['harga']; ?>">
        <div class="mb-3">
            <label for="jumlahbarang" class="form-label">Jumlah Barang</label>
            <input type="number" class="form-control <?= ($validation->hasError('jumlahbarang')) ? 'is-invalid' : ''; ?>" id="jumlahbarang" name="jumlahbarang" value="<?= old('jumlahbarang'); ?>">
            <div class="invalid-feedback">
                <?= $validation->getError('jumlahbarang'); ?>
            </div>
        </div>
        <div class="mb-3">
            <label for="nohp" class="form-label">Nohp</label>
            <input type="number" class="form-control <?= ($validation->hasError('nohp')) ? 'is-invalid' : ''; ?>" id="nohp" name="nohp" value="<?= old('nohp'); ?>">
            <div class="invalid-feedback">
                <?= $validation->getError('nohp'); ?>
            </div>
        </div>
        <div class="mb-3">
            <label for="pambayaran" class="form-label">Pembayaran</label>
            <select class="form-select" id="pembayaran" name="pembayaran" aria-describedby="pembayaranHelp">
                <option value="cod">cod</option>
                <option value="antar">antar</option>
            </select>
            <div id="pembayaranHelp" class="form-text">Jika Diantar Ongkir 10000</div>
        </div>
        <button type="submit" class="btn btn-primary">Booking</button>
</div>
</form>
</div>
<?= $this->endSection(); ?>