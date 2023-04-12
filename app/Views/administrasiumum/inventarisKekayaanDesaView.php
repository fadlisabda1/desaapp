<?= $this->extend('administrasiumum/templates/index'); ?>
<?= $this->section('page-content'); ?>
<div class="card shadow mb-4 mt-4">
    <?php if (in_groups('admin')) : ?>
        <div class="card-header py-3">
            <button type="button" class="btn tombolTambahData2" data-bs-toggle="modal" data-bs-target="#formModal" style="color:white;background-color: rgb(48,123,109);">
                Tambah
            </button>
        </div>
    <?php endif; ?>
    <div class="card-body">
        <div class="table-responsive mt-2">
            <table id="sample_table2" class="table table-bordered table-hover">
                <thead class="table-light">
                    <tr>
                        <th scope="col">Jenis Barang</th>
                        <th scope="col">Lokasi</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col">Sumber Pembiayaan</th>
                        <th scope="col">Keadaan Barang & Bangunan Awal Tahun</th>
                        <th scope="col">Keadaan Barang & Bangunan Akhir Tahun</th>
                        <th scope="col">Perkiraan Biaya</th>
                        <th scope="col">Keterangan</th>
                        <th scope="col">Tanggal Penghapusan</th>
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
<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="judulModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="judulModalLabel"></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" id="inventarisKekayaan_form">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="id" id="id">
                    <div class="mb-3">
                        <label for="jenisbarang" class="form-label">Jenis Barang</label>
                        <input type="text" class="form-control" id="jenisbarang" name="jenisbarang">
                        <span id="jenisbarang_error" class="text-danger"></span>
                    </div>
                    <div class="mb-3">
                        <label for="tentang" class="form-label">Lokasi</label>
                        <input type="text" class="form-control" id="lokasi" name="lokasi">
                        <span id="lokasi_error" class="text-danger"></span>
                    </div>
                    <div class="mb-3">
                        <label for="jumlah" class="form-label">Jumlah</label>
                        <input type="text" class="form-control" id="jumlah" name="jumlah">
                        <span id="jumlah_error" class="text-danger"></span>
                    </div>
                    <div class="mb-3">
                        <label for="sumberpembiayaan" class="form-label">Sumber Pembiayaan</label>
                        <input type="text" class="form-control" id="sumberpembiayaan" name="sumberpembiayaan">
                        <span id="sumberpembiayaan_error" class="text-danger"></span>
                    </div>
                    <label class="form-check-label" for="baik">
                        Keadaan Barang Bangunan Awal Tahun
                    </label>
                    <div class="form-check">
                        <input class="form-check-input awal" type="radio" name="awal" id="baik" value="baik" checked>
                        <label class="form-check-label" for="baik">
                            Baik
                        </label>
                    </div>
                    <div class="form-check mb-3">
                        <input class="form-check-input awal" type="radio" name="awal" id="rusak" value="rusak">
                        <label class="form-check-label" for="rusak">
                            Rusak
                        </label>
                    </div>
                    <label class="form-check-label" for="akhir">
                        Keadaan Barang Bangunan Akhir Tahun
                    </label>
                    <select class="form-select mb-3" aria-label="Default select example" name="akhir" id="akhir">
                        <option value="baik">Baik</option>
                        <option value="rusak">Rusak</option>
                        <option value="belum">Belum</option>
                    </select>
                    <div class="mb-3">
                        <label for="perkiraanbiaya" class="form-label">Perkiraan Biaya</label>
                        <input type="text" class="form-control" id="perkiraanbiaya" name="perkiraanbiaya">
                        <span id="perkiraanbiaya_error" class="text-danger"></span>
                    </div>
                    <div class="form-floating">
                        <textarea class="form-control" placeholder="Catatan Lain Yang Dianggap Perlu" id="ket" name="ket"></textarea>
                        <label for="ket">Keterangan</label>
                        <span id="ket_error" class="text-danger"></span>
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