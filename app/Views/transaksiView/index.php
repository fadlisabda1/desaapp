<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row text-center mb-3">
        <div class="col">
            <h2 style="color: green;">Transaksi Detail</h2>
        </div>
    </div>
    <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="flash-data" data-flashdata="<?= session()->getFlashdata('pesan'); ?>">
        </div>
    <?php endif; ?>
    <div class="table-responsive">
        <table class="table table-hover table-bordered border-dark caption-top">
            <caption>Pembeli List</caption>
            <thead class="table-dark">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Pembeli</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Harga Pembelian</th>
                    <th scope="col">Jumlah Barang</th>
                    <th scope="col">Nohp</th>
                    <th scope="col">Pembayaran</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if (in_groups('admin')) : ?>
                    <h1>Total Uang : <?= $data[0]['saldo'] ?></h1>
                <?php endif; ?>
                <?php $i = 1; ?>
                <?php $j = 0; ?>
                <?php foreach ($data as $d) : ?>
                    <?php if ($d['username'] !== 'admin') : ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $d['username']; ?></td>
                            <td><?= $barang[$j]->nama; ?></td>
                            <td><?= $d['saldo']; ?></td>
                            <td><?= $d['jumlahbarang']; ?></td>
                            <td><?= $d['nohp']; ?></td>
                            <td><?= $d['pembayaran']; ?></td>
                            <td>
                                <a href="/transaksiController/edit/<?= $barang[$j]->id_barang ?>/<?= $d['id_transaksi']; ?>" class="btn btn-warning mb-1">Edit</a>
                                <form action="/transaksiController/delete/<?= $d['id_transaksi']; ?>" method="post" class="d-inline tombol-hapus" id="tombol-hapus">
                                    <?= csrf_field(); ?>
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        <?php $j++; ?>
                    <?php endif; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?= $this->endSection(); ?>