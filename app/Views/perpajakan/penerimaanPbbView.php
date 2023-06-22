<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>
<div class="card shadow mb-4 mt-4">
    <?php if (in_groups('admin')) : ?>
        <div class="card-header py-3">
            <button type="button" class="btn tambahPenerimaanPbb" data-bs-toggle="modal" data-bs-target="#formModal" style="color:white;background-color: rgb(48,123,109);">
                Tambah
            </button>
            <button type="button" class="btn import" data-bs-toggle="modal" data-bs-target="#importModal" style="color:white;background-color: rgb(48,123,109);">
                Import Xls-Csv-Xlsx
            </button>
            <h1>Jangan Lupa Pembayaran Terakhir Pajak 24 September Setiap Tahun Mau Denda?</h1>
        </div>
    <?php endif; ?>
    <div class="card-body">
        <div class="table-responsive mt-2">
            <table id="tablePenerimaanPbb" class="table table-bordered table-hover">
                <thead class="table-light">
                    <tr>
                        <th scope="col">Ceklis</th>
                        <th scope="col">Nomor Objek Pajak</th>
                        <th scope="col">No Hp</th>
                        <th scope="col">Nama Wajib Pajak</th>
                        <th scope="col">Tanggal Pengiriman Bukti Bayar</th>
                        <th scope="col">Total pbb yang dibayar</th>
                        <th scope="col">Bukti Bayar</th>
                        <th scope="col">Tindakan</th>
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
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="judulModalLabel"></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" id="formImportPenerimaanPbb" enctype="multipart/form-data">
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
<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="namaModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="namaModalLabel"></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" id="formPenerimaanPbb" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="gambar_lama" id="gambar_lama">
                    <div class="mb-3">
                        <label for="nop" class="form-label">Nomor Objek Pajak</label>
                        <input type="number" class="form-control" id="nop" name="nop">
                        <span id="nop_error" class="text-danger"></span>
                    </div>
                    <div class="mb-3">
                        <label for="nohp" class="form-label">No Hp</label>
                        <input type="number" class="form-control" id="nohp" name="nohp">
                        <span id="nohp_error" class="text-danger"></span>
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Username Atau Email</label>
                        <input type="text" class="form-control" id="nama" name="nama">
                        <span id="nama_error" class="text-danger"></span>
                    </div>
                    <div class="mb-3">
                        <label for="totalyangdibayar" class="form-label">Total Yang Dibayar</label>
                        <input type="number" class="form-control" id="totalyangdibayar" name="totalyangdibayar">
                        <span id="totalyangdibayar_error" class="text-danger"></span>
                    </div>
                    <div class="mb-3">
                        <label for="filePajak" class="form-label">File</label>
                        <input type="file" class="form-control" name="file" id="filePajak">
                        <span id="file_error" class="text-danger"></span>
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