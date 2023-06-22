<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <h2 class="my-3 text-center">Form Edit Barang</h2>
    <form action="/transaksiController/update/<?= $transaksi['id_transaksi']; ?>" method="post">
        <?= csrf_field(); ?>
        <input type="hidden" name="username" value="<?= user()->username; ?>">
        <input type="hidden" name="idbarang" value="<?= $dataepasar['id_barang']; ?>">
        <input type="hidden" name="harga" value="<?= $dataepasar['harga']; ?>">
        <input type="hidden" name="namabarang" value="<?= $dataepasar['nama']; ?>">
        <div class="mb-3">
            <label for="jumlahbarang" class="form-label">Jumlah Barang</label>
            <input type="number" class="form-control <?= ($validation->hasError('jumlahbarang')) ? 'is-invalid' : ''; ?>" id="jumlahbarang" name="jumlahbarang" value="<?= (old('jumlahbarang')) ? old('jumlahbarang') : $transaksi['jumlahbarang'] ?>">
            <div class="invalid-feedback">
                <?= $validation->getError('jumlahbarang'); ?>
            </div>
        </div>
        <div class="mb-3">
            <label for="nohp" class="form-label">Nohp</label>
            <input type="number" class="form-control <?= ($validation->hasError('nohp')) ? 'is-invalid' : ''; ?>" id="nohp" name="nohp" value="<?= (old('nohp')) ? old('nohp') : $transaksi['nohp'] ?>">
            <div class="invalid-feedback">
                <?= $validation->getError('nohp'); ?>
            </div>
        </div>
        <div class="mb-3">
            <label for="pambayaran" class="form-label">Pembayaran</label>
            <select class="form-select" id="pembayaran" name="pembayaran" aria-describedby="pembayaranHelp">
                <option <?= ($transaksi['pembayaran'] == "cod") ? "selected" : "" ?> value="cod">cod</option>
                <option <?= ($transaksi['pembayaran'] == "online") ? "selected" : "" ?> value="online">online</option>
            </select>
            <div id="pembayaranHelp" class="form-text">Ongkir 10000</div>
        </div>
        <button type="submit" class="btn btn-primary">Ubah</button>
</div>
</form>
</div>
<?= $this->endSection(); ?>