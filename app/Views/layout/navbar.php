<!-- Navbar -->
<?php if (!isset($_GET['n'])) : ?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-success shadow-sm fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand page-scroll" href="#Home"><img src="<?= base_url('gambar/LogoKampar.png'); ?>" alt="Logo" width="30" height="24" class="d-inline-block align-text-top"><span class="text-wrap badge bg-success" style="width:15.8rem">Website Desa Tanah Merah Kec. Siak Hulu Kab. Kampar Prov. Riau</span></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav container-fluid">
                    <li class="nav-item">
                        <a class="nav-link active page-scroll" aria-current="page" href="#Home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="#profil">Profil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="#visimisi">Visi Misi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="#petaWilayahDesa">Peta</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="#profilPemerintahan">Profil Pemerintahan</a>
                    </li>
                </ul>
                <ul class="navbar-nav container-fluid">
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="#statistik">Statistik</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="#publikasiumum">Publikasi Umum</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="#bankdatadesa">Syarat Pengurusan Kantor</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="#wisata">Wisata</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Administrasi Umum
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="/peraturanDesaController?n=2">Peraturan Desa</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
<?php endif; ?>
<?php if (isset($_GET['n'])) : ?>
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: rgb(46,181,94);">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Administrasi Umum <br> Buku Peraturan Desa</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse d-flex justify-content-end" id="navbarSupportedContent">
                <button type="button" class="btn tombolTambahData" data-bs-toggle="modal" data-bs-target="#formModal" style="color:white;background-color: rgb(48,123,109);">
                    Tambah
                </button>
                <a class="btn ms-2" style="color:black;background-color: rgb(249,163,60);" href="">Print</a>
            </div>
    </nav>
<?php endif; ?>
<!-- Akhir Navbar -->