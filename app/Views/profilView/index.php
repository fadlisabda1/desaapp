<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<!-- Jumbotron -->
<section class="jumbotron mt-5 text-center">
    <img src="gambar/fotokades.jpeg" alt="kades" width="200" class="rounded-circle img-thumbnail" />
    <h1 class="display-4" style="color: white;">Selamat Datang</h1>
    <p class="lead" style="color: white;">Di Website Desa Tanah Merah</p>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#fff" fill-opacity="1" d="M0,64L30,101.3C60,139,120,213,180,240C240,267,300,245,360,208C420,171,480,117,540,128C600,139,660,213,720,229.3C780,245,840,203,900,154.7C960,107,1020,53,1080,37.3C1140,21,1200,43,1260,64C1320,85,1380,107,1410,117.3L1440,128L1440,320L1410,320C1380,320,1320,320,1260,320C1200,320,1140,320,1080,320C1020,320,960,320,900,320C840,320,780,320,720,320C660,320,600,320,540,320C480,320,420,320,360,320C300,320,240,320,180,320C120,320,60,320,30,320L0,320Z"></path>
    </svg>
</section>
<!-- Akhir Jumbotron -->
<!-- Profil Desa -->
<section id="profil">
    <div class="container">
        <div class="row text-center mb-3">
            <div class="col">
                <h2 style="color: green;">Profil Desa</h2>
            </div>
        </div>
        <div class="row row-cols-1 row-cols-md-2 g-4 text-left justify-content-center">
            <div class="col">
                <div class="card text-bg-success">
                    <img src="gambar/desadepan.jpeg" class="card-img-top" alt="desadepan">
                    <div class="card-body">
                        <h5 class="card-title">Sejarah Desa Tanah Merah</h5>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Visi Misi Desa -->
    <div id="visimisi">
        <div class="container">
            <div class="row mt-5">
                <div class="col-md-6 mb-3">
                    <div class="card text-bg-success">
                        <div class="card-body">
                            <h2>Visi</h2>
                            <p class="card-text">Terwujudnya pelayanan public yang transparan, akuntabilitas menuju Masyarakat Desa Tanah Merah yang maju, aman, dan sejahterah.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card text-bg-success">
                        <div class="card-body">
                            <h2>Misi</h2>
                            <ol class="list-group list-group-numbered">
                                <li class="list-group-item">
                                    <p class="card-text">Melanjutkan program-program Pemerintah Desa Tanah Merah periode lalu, sebagai mana tercantum dalam Dokumen RPJMDes Desa Tanah Merah.</p>
                                </li>
                                <li class="list-group-item">
                                    <p class="card-text">Pemberdayaan semua potensi yang ada dimasyarakat meliputi :</p>
                                    <ol class="list-group list-group-numbered">
                                        <li class="list-group-item list-group-item-success">
                                            <p class="card-text">Pemberdayaan SDM</p>
                                        </li>
                                        <li class="list-group-item list-group-item-success">
                                            <p class="card-text">Pemberdayaan Ekonomi Kerakyatan</p>
                                        </li>
                                    </ol>
                                </li>
                                <li class="list-group-item">
                                    <p class="card-text">Menciptakan kondisi masyarakat Desa Tnaah Merah yang aman, tertib dan rukun dalam kehidupan bermasyarakat dengan berpegang pada prinsip-prinsip yaitu :</p>
                                    <ol class="list-group list-group-numbered">
                                        <li class="list-group-item list-group-item-success">
                                            <p class="card-text">Duduk sama rendah berdiri sama tinggi</p>
                                        </li>
                                        <li class="list-group-item list-group-item-success">
                                            <p class="card-text">Ringan sama dijinjing berat sama dipikul</p>
                                        </li>
                                    </ol>
                                </li>
                                <li class="list-group-item">
                                    <p class="card-text">Optimalisasi penyelenggaraan pemerintahan Desa Tanah Merah yang meliputi :</p>
                                    <ol class="list-group list-group-numbered">
                                        <li class="list-group-item list-group-item-success">
                                            <p class="card-text">Penyelenggaraan pemerintahan yang transparan dan akuntabel</p>
                                        </li>
                                        <li class="list-group-item list-group-item list-group-item-success">
                                            <p class="card-text">Pelayanan kepada masyrakat yang Prima yaitu cepat, tepat dan benar.</p>
                                        </li>
                                        <li class="list-group-item list-group-item list-group-item-success">
                                            <p class="card-text">Pelaksanaan pembangunan yang berkesinambungan dan mengedepankan partisipasi dan gotong royong masyarakat.</p>
                                        </li>
                                    </ol>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Akhir Visi Misi Desa -->
    <!-- Peta Wilayah Desa -->
    <div id="petaWilayahDesa">
        <div class="container">
            <div class="row text-center">
                <div class="col">
                    <h2 class="text" style="color: green;">Peta Wilayah Desa</h2>
                </div>
            </div>
            <div class="row text-center">
                <div class="col">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1994.851475493056!2d101.45914275863554!3d0.4357198573712268!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x292cb83986560007!2sKantor%20Kades%20Tanah%20Merah!5e0!3m2!1sid!2sid!4v1665065294819!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="ratio ratio-16x9"></iframe>
                </div>
            </div>
        </div>
    </div>
    <!-- Akhir Peta Wilayah Desa -->
</section>
<!-- Akhir Profil Desa -->
<!-- Profil Pemerintahan Desa -->
<section id="profilPemerintahan">
    <div class="container">
        <div class="row text-center mb-3">
            <div class="col">
                <h2 style="color: green;">Profil Pemerintahan</h2>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="table-responsive">
                    <table class="table table-hover table-bordered">
                        <thead class="table-success">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Jabatan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($dataPemerintah as $d) : ?>
                                <tr>
                                    <?php if ($d['nama'] !== 'Dina Suci Noviola') : ?>
                                        <th scope="row"><?= $i++; ?></th>
                                        <td><?= $d['nama'] ?></td>
                                        <td><?= $d['jabatan'] ?></td>
                                    <?php endif; ?>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Akhir Profil Pemerintahan Desa -->
<!-- Statistik -->
<section id="statistik">
    <div class="container">
        <div class="row text-center mb-3">
            <div class="col">
                <h2 style="color: green;">Statistik</h2>
            </div>
        </div>
        <div class="row text-center mb-3">
            <div class="col">
                <table class="table table-responsive table-borderless table-hover">
                    <thead class="table-success">
                        <th scope="col">Jenis Kelamin</th>
                        <th scope="col">Nilai</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Laki Laki</td>
                            <td>8496 orang</td>
                        </tr>
                        <tr>
                            <td>Perempuan</td>
                            <td>8119 orang</td>
                        </tr>
                        <tr>
                            <td>Kepala Keluarga</td>
                            <td>4002 orang</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="row text-center mb-3">
                <div class="col">
                    <table class="table table-responsive table-borderless table-hover">
                        <thead class="table-success">
                            <th scope="col">Pendidikan</th>
                            <th scope="col">Nilai</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td>SD/MI</td>
                                <td>392 orang</td>
                            </tr>
                            <tr>
                                <td>SLTP/MTs</td>
                                <td>944 orang</td>
                            </tr>
                            <tr>
                                <td>SLTA/MA</td>
                                <td>1172 orang</td>
                            </tr>
                            <tr>
                                <td>S1/Diploma</td>
                                <td>1772 orang</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row text-center mb-3">
                <div class="col">
                    <table class="table table-responsive table-borderless table-hover">
                        <thead class="table-success">
                            <th scope="col">Agama</th>
                            <th scope="col">Nilai</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Islam</td>
                                <td>11630 orang</td>
                            </tr>
                            <tr>
                                <td>Katolik</td>
                                <td>1161 orang</td>
                            </tr>
                            <tr>
                                <td>Kristen</td>
                                <td>2492 orang</td>
                            </tr>
                            <tr>
                                <td>Hindu</td>
                                <td>832 orang</td>
                            </tr>
                            <tr>
                                <td>Budha</td>
                                <td>- orang</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row text-center mb-3">
                <div class="col">
                    <table class="table table-responsive table-borderless table-hover">
                        <thead class="table-success">
                            <th scope="col">Pekerjaan</th>
                            <th scope="col">Nilai</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Petani</td>
                                <td>12 orang</td>
                            </tr>
                            <tr>
                                <td>Pedagang</td>
                                <td>5121 orang</td>
                            </tr>
                            <tr>
                                <td>PNS</td>
                                <td>815 orang</td>
                            </tr>
                            <tr>
                                <td>Tukang</td>
                                <td>578 orang</td>
                            </tr>
                            <tr>
                                <td>Guru</td>
                                <td>150 orang</td>
                            </tr>
                            <tr>
                                <td>Bidan/ Perawat</td>
                                <td>40 orang</td>
                            </tr>
                            <tr>
                                <td>TNI/ Polri</td>
                                <td>65 orang</td>
                            </tr>
                            <tr>
                                <td>Pensiunan</td>
                                <td>1252 orang</td>
                            </tr>
                            <tr>
                                <td>Sopir/ Angkutan</td>
                                <td>36 orang</td>
                            </tr>
                            <tr>
                                <td>Buruh</td>
                                <td>1262 orang</td>
                            </tr>
                            <tr>
                                <td>Jasa Persewaan</td>
                                <td>15 orang</td>
                            </tr>
                            <tr>
                                <td>Swasta</td>
                                <td>789 orang</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
</section>
<!-- Akhir Statistik -->
<!-- Publikasi Umum -->
<section id="publikasiumum">
    <div class="container">
        <div class="row text-center mb-3">
            <div class="col">
                <h2 style="color: green;">Publikasi Umum</h2>
            </div>
        </div>

        <div class="row row-cols-1 row-cols-md-3 g-4">
            <?php foreach ($dataBerita as $db) : ?>
                <?php $str = explode('|', $db['gambar']); ?>
                <div class="col">
                    <div class="card h-100">
                        <img src="gambar/<?= $str[0] ?>" class="card-img-top" alt="fotoberita">
                        <div class="card-body">
                            <h5 class="card-title"><?= $db['judul'] ?></h5>
                            <p class="card-text"><?= character_limiter($db['keterangan'], 50); ?></p>
                            <a href="/beritaController/detail/<?= $db['id_berita'] ?>" class="btn btn-success">Detail</a>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted"><?= $db['created_at'] ?></small>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    </div>
</section>
<!-- Akhir Publikasi Umum -->
<?= $this->endSection(); ?>