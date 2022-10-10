<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container" style="margin-top: 80px;">
    <div class="row text-center mb-3">
        <div class="col">
            <h2 style="color: green;">Publikasi Umum Detail</h2>
        </div>
    </div>
    <div class="card mb-3">
        <div class="row g-0">
            <div class="col-md-4">
                <div id="carouselExampleControls" class="carousel slide m-auto" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="<?= base_url('gambar/fotoberitapenyerahan.jpeg'); ?>" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="<?= base_url('gambar/fotoberitapenyerahan2.jpeg'); ?>" class="d-block w-100" alt="...">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">Menteri Desa PDTT RI Serahkan Penghargaan Kepada Beberapa Kepala Desa</h5>
                    <p class="card-text">Menteri Desa, Pembangunan Daerah Tertinggal dan Transmigrasi Republik Indonesia, Bpk. Dr.(HC) Drs.A.Halim Iskandar, M.Pd, didampingi Pj Bupati Kampar Dr Kamsol,MM, secara simbolis Menteri Halim Iskandar menyerahkan Penghargaan status Desa Mandiri kepada Kepala Desa Tanah Merah H. Syahrual Amri Nasution</p>
                    <p class="card-text"><small class="text-muted">13 Agustus 2022 06:14:29</small></p>
                    <a href="/" class="btn btn-primary">Kembali ke profil desa</a>
                </div>
            </div>
        </div>
    </div>
    <div class="card mb-3">
        <div class="row g-0">
            <div class="col-md-4">
                <div id="carouselExampleControls" class="carousel slide m-auto" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="<?= base_url('gambar/desadepan.jpeg'); ?>" class="d-block w-100" alt="...">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">SEJARAH DESA TANAH MERAH KECAMATAN SIAK HULU KABUPATEN KAMPAR</h5>
                    <p class="card-text">Desa Tanah Merah adalah nama suatu wilayah di Kecamatan Siak Hulu
                        Kabupaten Kampar ini yang nama Tanah Merah tersebut diambil dari salah satu nama
                        RK (Rukun Kampung) yang saat ini menjadi salah satu wilayah dusun berbatas
                        lansung dengan Desa Baru sebagai Desa Induk. Pemekeran Desa Tanah Merah adalah
                        usulan dari para tokoh masyarakat setempat pada tahun 1999, berdasarkan Surat
                        Keputusan Kepala Daerah Tingkat 1 Riau Nomor 41 Tahun 1999 tentang Pemekaran
                        Desa persiapan Tanah Merah maka Desa Tanah Merah secara resmi menjadi
                        Pemerintahan Desa persiapan. Desa Tanah Merah “sebelah Utara berbatas dengan
                        kelurahan Simpang Tiga Kota Pekanbaru, sebelah Timur berbatas dengan Desa Baru,
                        sebelah Selatan berbatas dengan Desa Pandau Jaya dan sebelah Barat berbatas
                        Dengan Kelurahan Simpang Tiga Kecamatan Bukitraya Kota Pekanbaru. Sedangkan
                        luas wilayah diperkirakan sekitar 1.096 Ha dan ketinggian tanah dari permukaan laut
                        sekitar 20 M, banyaknya curah hujan sekitar 2545 MM/HM, topografi (Dataran
                        Rendah, Tinggi Pantai) sekitar 75,25 MM/HM dan suhu rata — rata 35'C. Adapun
                        jarak tempuh menuju Ibu Kota Kecamatan diperkirakan sepanjang 10 KM, ke Ibu
                        Kota Kabupaten sepanjang 70 KM dan ke Ibu Kota Provinsi sepanjang 7,5 KM.</p>
                    <p class="card-text"><small class="text-muted">07 Agustus 2022 05:08:35</small></p>
                    <a href="/" class="btn btn-primary">Kembali ke profil desa</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>