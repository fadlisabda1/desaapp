<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container" style="margin-top: 120px;">
    <div class="flash-data" data-flashdata="<?= session()->getFlashdata('pesan'); ?>"></div>
    <br>
    <?php if ($validation->getError('jenis_barang') != '') : ?>
        <div class=" alert alert-danger text-center" role="alert">
            <?= $validation->getError('jenis_barang'); ?>
        </div>
    <?php elseif ($validation->getError('lokasi') != '') : ?>
        <div class="alert alert-danger text-center" role="alert">
            <?= $validation->getError('lokasi'); ?>
        </div>
    <?php elseif ($validation->getError('jumlah') != '') : ?>
        <div class="alert alert-danger text-center" role="alert">
            <?= $validation->getError('jumlah'); ?>
        </div>
    <?php elseif ($validation->getError('sumber_pembiayaan') != '') : ?>
        <div class="alert alert-danger text-center" role="alert">
            <?= $validation->getError('sumber_pembiayaan'); ?>
        </div>
    <?php elseif ($validation->getError('perkiraan_biaya') != '') : ?>
        <div class="alert alert-danger text-center" role="alert">
            <?= $validation->getError('perkiraan_biaya'); ?>
        </div>
    <?php endif; ?>
    <button type="button" class="btn tombolTambahData" data-bs-toggle="modal" data-bs-target="#formModal" style="color:white;background-color: rgb(48,123,109);">
        Tambah
    </button>
    <a class="btn" style="color:black;background-color: rgb(249,163,60);" href="">Print</a>
    <div class="table-responsive mt-2">
        <table class="table table-bordered table-hover">
            <thead class="table-light">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Jenis Barang</th>
                    <th scope="col">Lokasi</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">Sumber Pembiayaan</th>
                    <th scope="col">Perkiraan Biaya</th>
                    <th scope="col">Tindakan</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($data as $d) : ?>
                    <tr>
                        <th scope="row"><?= $i++; ?></th>
                        <td><?= $d['jenis_barang']; ?></td>
                        <td><?= $d['lokasi']; ?></td>
                        <td><?= $d['jumlah']; ?></td>
                        <td><?= $d['sumber_pembiayaan']; ?></td>
                        <td><?= $d['perkiraan_biaya']; ?></td>
                        <td>
                            <a href="/inventarisKekayaanDesaController/edit/<?= $d['id_inventaris_kekayaan_desa']; ?>" class="btn btn-warning mb-1 tampilModalUbah" data-bs-toggle="modal" data-bs-target="#formModal" data-id="<?= $d['id_inventaris_kekayaan_desa']; ?>" data-namacontroller="<?= class_basename(service('router')->controllerName()) ?>">Edit</a>
                            <form action="/inventarisKekayaanDesaController/delete/<?= $d['id_inventaris_kekayaan_desa']; ?>" method="post" class="d-inline tombol-hapus" id="myCheck">
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
                <form action="/inventarisKekayaanDesaController/save" method="post">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="id" id="id" class="inputPeraturan">
                    <div class="mb-3">
                        <label for="jenis_barang" class="form-label">Jenis Barang</label>
                        <input type="text" class="form-control <?= ($validation->hasError('jenis_barang')) ? 'is-invalid' : ''; ?> inputPeraturan" id="jenis_barang" name="jenis_barang" value="<?= old('jenis_barang'); ?>">
                    </div>
                    <div class="mb-3">
                        <label for="lokasi" class="form-label">Lokasi</label>
                        <input type="text" class="form-control <?= ($validation->hasError('lokasi')) ? 'is-invalid' : ''; ?> inputPeraturan" id="lokasi" name="lokasi" value="<?= old('lokasi'); ?>">
                    </div>
                    <div class="mb-3">
                        <label for="jumlah" class="form-label">Jumlah</label>
                        <input type="text" class="form-control <?= ($validation->hasError('jumlah')) ? 'is-invalid' : ''; ?> inputPeraturan" id="jumlah" name="jumlah" value="<?= old('jumlah'); ?>">
                    </div>
                    <div class="mb-3">
                        <label for="sumber_pembiayaan" class="form-label">Sumber Pembiayaan</label>
                        <input type="text" class="form-control <?= ($validation->hasError('sumber_pembiayaan')) ? 'is-invalid' : ''; ?> inputPeraturan" id="sumber_pembiayaan" name="sumber_pembiayaan" value="<?= old('sumber_pembiayaan'); ?>">
                    </div>
                    <div class="mb-3">
                        <label for="perkiraan_biaya" class="form-label">Perkiraan Biaya</label>
                        <input type="number" class="form-control <?= ($validation->hasError('perkiraan_biaya')) ? 'is-invalid' : ''; ?> inputPeraturan" id="perkiraan_biaya" name="perkiraan_biaya" value="<?= old('perkiraan_biaya'); ?>">
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