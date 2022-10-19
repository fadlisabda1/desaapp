<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<!-- Jumbotron -->
<section class="jumbotron mt-5 text-center">
    <img src="gambar/fotokades.jpeg" alt="kades" width="200" class="rounded-circle img-thumbnail" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Foto Kepala Desa Tanah Merah" />
    <h1 class="display-4" style="color: yellow;">Selamat Datang</h1>
    <p class="lead" style="color: yellow;"></p>
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
                    <div class="card-body" style="color: pink;">
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
    <section id="visimisi">
        <div class="container">
            <div class="row mt-5">
                <div class="col-md-6 mb-3">
                    <div class="card text-bg-success">
                        <div class="card-body" style="color: pink;">
                            <h2>Visi</h2>
                            <p class="card-text" data-aos="fade-right">Terwujudnya pelayanan public yang transparan, akuntabilitas menuju Masyarakat Desa Tanah Merah yang maju, aman, dan sejahterah.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card text-bg-success">
                        <div class="card-body">
                            <h2 style="color: pink;">Misi</h2>
                            <ol class="list-group list-group-numbered" data-aos="fade-left" data-aos-delay="200">
                                <li class="list-group-item">
                                    <p class="card-text">Melanjutkan program-program Pemerintah Desa Tanah Merah periode lalu, sebagai mana tercantum dalam Dokumen RPJMDes Desa Tanah Merah.</p>
                                </li>
                                <li class="list-group-item">
                                    <p class="card-text">Pemberdayaan semua potensi yang ada dimasyarakat meliputi :</p>
                                    <ol class="list-group list-group-numbered">
                                        <li class="list-group-item">
                                            <p class="card-text">Pemberdayaan SDM</p>
                                        </li>
                                        <li class="list-group-item">
                                            <p class="card-text">Pemberdayaan Ekonomi Kerakyatan</p>
                                        </li>
                                    </ol>
                                </li>
                                <li class="list-group-item">
                                    <p class="card-text">Menciptakan kondisi masyarakat Desa Tnaah Merah yang aman, tertib dan rukun dalam kehidupan bermasyarakat dengan berpegang pada prinsip-prinsip yaitu :</p>
                                    <ol class="list-group list-group-numbered">
                                        <li class="list-group-item">
                                            <p class="card-text">Duduk sama rendah berdiri sama tinggi</p>
                                        </li>
                                        <li class="list-group-item">
                                            <p class="card-text">Ringan sama dijinjing berat sama dipikul</p>
                                        </li>
                                    </ol>
                                </li>
                                <li class="list-group-item">
                                    <p class="card-text">Optimalisasi penyelenggaraan pemerintahan Desa Tanah Merah yang meliputi :</p>
                                    <ol class="list-group list-group-numbered">
                                        <li class="list-group-item">
                                            <p class="card-text">Penyelenggaraan pemerintahan yang transparan dan akuntabel</p>
                                        </li>
                                        <li class="list-group-item list-group-item">
                                            <p class="card-text">Pelayanan kepada masyrakat yang Prima yaitu cepat, tepat dan benar.</p>
                                        </li>
                                        <li class="list-group-item list-group-item">
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
    </section>
    <!-- Akhir Visi Misi Desa -->
    <!-- Peta Wilayah Desa -->
    <section id="petaWilayahDesa">
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
        </se>
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
            <div class="row row-cols-1 row-cols-md-2 g-4 text-center mb-3" data-aos="flip-left" data-aos-duration="1000">
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
                <div class="row text-center mb-3" data-aos="flip-left" data-aos-delay="100">
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
                <div class="row text-center mb-3" data-aos="flip-left" data-aos-delay="200">
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
                <div class="row text-center mb-3" data-aos="flip-left" data-aos-delay="200">
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
                    <h2 style="color: green;">Arahkan Mouse Ke Gambar</h2>
                </div>
            </div>

            <div class="row row-cols-1 row-cols-md-3 g-4">
                <?php foreach ($dataBerita as $db) : ?>
                    <?php $str = explode('|', $db['gambar']); ?>
                    <div class="col">
                        <div class="berita-box">
                            <h4 class="berita-name">Publikasi Umum</h4>
                            <img src="gambar/<?= $str[0] ?>" alt="fotoberita" class="berita-img" />
                            <a href="/beritaController/detail/<?= $db['id_berita'] ?>" class="btn btn-light berita-detail-button">Show Details</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        </div>
    </section>
    <!-- Akhir Publikasi Umum -->
    <!-- Bank Data Desa -->
    <section id="bankdatadesa">
        <div class="container">
            <div class="row text-center mb-3">
                <div class="col">
                    <h2 style="color: green;">Persyaratan Pengurusan Dikantor Desa Tanah Merah</h2>
                </div>
            </div>
            <div class="row mb-3 row-cols-1 row-cols-md-3 g-4">
                <div class="col syaratsurat">
                    <ul class="list-group">
                        <li class="list-group-item list-group-item-success" aria-current="true">Surat Keterangan Domisili</li>
                        <li class="list-group-item">fotocopy kk dan ktp</li>
                        <li class="list-group-item">surat pengantar rt setempat</li>
                        <li class="list-group-item">fotocopy kartu vaksin dan kartu sampah</li>
                        <li class="list-group-item">fotocopy pelunasan pbb(pajak bumi & bangunan)rumah tahun berjalan</li>
                    </ul>
                </div>
                <div class="col syaratsurat">
                    <ul class="list-group">
                        <li class="list-group-item list-group-item-success" aria-current="true">Surat Keterangan Campuran</li>
                        <li class="list-group-item">fotocopy kk(wajib kk desa tanah merah) dan ktp</li>
                        <li class="list-group-item">surat pengantar rt setempat</li>
                        <li class="list-group-item">fotocopy kartu vaksin dan kartu sampah</li>
                        <li class="list-group-item">fotocopy pelunasan PBB(pajak bumi&bangunan)rumah tahun berjalan</li>
                        <li class="list-group-item">berkas lain yang dirasa perlu</li>
                    </ul>
                </div>
                <div class="col syaratsurat">
                    <ul class="list-group">
                        <li class="list-group-item list-group-item-success" aria-current="true">Surat Keterangan Usaha</li>
                        <li class="list-group-item">fotocopy kk dan ktp</li>
                        <li class="list-group-item">surat pengantar rt tempat usaha</li>
                        <li class="list-group-item">pas photo 3x4(2lembar)</li>
                        <li class="list-group-item">foto usaha</li>
                        <li class="list-group-item">fotocopy kartu vaksin dan kartu sampah</li>
                        <li class="list-group-item">fotocopy pelunasan PBB(pajak bumi&bangunan)rumah tahun berjalan</li>
                    </ul>
                </div>
                <div class="col syaratsurat">
                    <ul class="list-group">
                        <li class="list-group-item list-group-item-success" aria-current="true">Surat Pengantar KK</li>
                        <li class="list-group-item">formulir f1.01</li>
                        <li class="list-group-item">surat pindah dari disdukcapil(bagi diluar kabupaten kampar)</li>
                        <li class="list-group-item">fotocopy kk dan ktp</li>
                        <li class="list-group-item">fotocopy surat nikah (apabila sudah nikah)</li>
                        <li class="list-group-item">fotocopy surat keterangan lahir anak (apabila sudah punya anak)</li>
                        <li class="list-group-item">fotocopy kartu vaksin dan kartu sampah</li>
                        <li class="list-group-item">fotocopy pelunasan PBB(pajak bumi&bangunan)rumah tahun berjalan</li>
                    </ul>
                </div>
                <div class="col syaratsurat">
                    <ul class="list-group">
                        <li class="list-group-item list-group-item-success" aria-current="true">Surat Keterangan Nikah</li>
                        <li class="list-group-item">formulir N1-N4</li>
                        <li class="list-group-item">fotocopy kk(wajib kk desa tanah merah)dan ktp (yang bersangkutan,orang tua)</li>
                        <li class="list-group-item">pas photo 2X3(2lembar)laki-laki pakai peci</li>
                        <li class="list-group-item">fotocopy kartu vaksin dan kartu sampah</li>
                        <li class="list-group-item">fotocopy pelunasan PBB(pajak bumi&bangunan)rumah tahun berjalan</li>
                    </ul>
                </div>
                <div class="col syaratsurat">
                    <ul class="list-group">
                        <li class="list-group-item list-group-item-success" aria-current="true">Surat Pengantar Pindah</li>
                        <li class="list-group-item">formulir pindah</li>
                        <li class="list-group-item">fotocopy kk dan ktp</li>
                        <li class="list-group-item">pas photo 3X4(2lembar)</li>
                        <li class="list-group-item">fotocopy kartu vaksin dan kartu sampah</li>
                        <li class="list-group-item">fotocopy pelunasan PBB(pajak bumi&bangunan)rumah tahun berjalan</li>
                    </ul>
                </div>
                <div class="col syaratsurat">
                    <ul class="list-group">
                        <li class="list-group-item list-group-item-success" aria-current="true">Surat Keterangan Lahir & Masukkan Anak Dalam KK</li>
                        <li class="list-group-item">fotocopy(wajib kk desa tanah merah) kk dan ktp</li>
                        <li class="list-group-item">surat pengantar rt setempat</li>
                        <li class="list-group-item">fotocopy surat nikah</li>
                        <li class="list-group-item">fotocopy surat keterangan lahir dari bidan/rumah sakit</li>
                        <li class="list-group-item">fotocopy kartu vaksin dan kartu sampah</li>
                        <li class="list-group-item">fotocopy pelunasan PBB(pajak bumi&bangunan)rumah tahun berjalan</li>
                    </ul>
                </div>
                <div class="col syaratsurat">
                    <ul class="list-group">
                        <li class="list-group-item list-group-item-success" aria-current="true">Surat Keterangan Belum Memiliki Rumah</li>
                        <li class="list-group-item">fotocopy(wajib kk desa tanah merah) kk dan ktp</li>
                        <li class="list-group-item">surat pengantar rt setempat</li>
                        <li class="list-group-item">surat pernyataan dari developer</li>
                        <li class="list-group-item">fotocopy kartu vaksin dan kartu sampah</li>
                        <li class="list-group-item">fotocopy pelunasan PBB(pajak bumi&bangunan)rumah tahun berjalan</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- Akhir Bank Data Desa -->
    <!-- Potensi Dan Fasilitas Desa -->
    <section id="wisata">
        <div class="container">
            <div class="row text-center mb-3">
                <div class="col">
                    <h2 style="color: green;">Wisata Desa</h2>
                </div>
            </div>
            <div class="row row-cols-1 row-cols-md-2 g-4">
                <div class="col">
                    <div class="card text-bg-success">
                        <img src="gambar/labersa.jpg" class="card-img-top" alt="labersa">
                        <div class="card-body">
                            <h5 class="card-title">Labersa Waterpark Riau Fantasi</h5>
                            <p class="card-text">Taman rekreasi keluarga dengan seluncuran air yang memacu adrenalin ke kolam percik & tubing di kolam arus.</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card text-bg-success">
                        <img src="gambar/borneowaterpark.jpg" class="card-img-top" alt="borneowaterpark">
                        <div class="card-body">
                            <h5 class="card-title">Borneo Waterpark</h5>
                            <p class="card-text">Kabana piknik & tempat foto di kompleks rekreasi dengan kolam renang, kolam arus & seluncuran air.</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card text-bg-success">
                        <img src="gambar/kawahbiru.jpg" class="card-img-top" alt="kawahbiru">
                        <div class="card-body">
                            <h5 class="card-title">Kawah Biru</h5>
                            <p class="card-text">pasir putih pada bekas galian yang akhirnya digenangi air hujan dan tampaklah airnya menjadi biru sehingga disebut Kawah Biru</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card text-bg-success">
                        <img src="gambar/paradutaswimmingpool.jpg" class="card-img-top" alt="paradutaswimmingpool">
                        <div class="card-body">
                            <h5 class="card-title">Paraduta Swimming Pool</h5>
                            <p class="card-text">kolam renang atau lokasi berenang yang berlokasi di Tanah Merah, Siak Hulu, Kabupaten Kampar, Riau.</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card text-bg-success">
                        <img src="gambar/bukikbulek.jpg" class="card-img-top" alt="bukikbulek">
                        <div class="card-body">
                            <h5 class="card-title">Objek Wisata Bukik Bulek Padang Asam</h5>
                            <p class="card-text">jalan utama bagi masyarakat yang memiliki usaha tani.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="rgb(25,135,84)" fill-opacity="1" d="M0,128L34.3,112C68.6,96,137,64,206,96C274.3,128,343,224,411,218.7C480,213,549,107,617,101.3C685.7,96,754,192,823,208C891.4,224,960,160,1029,154.7C1097.1,149,1166,203,1234,208C1302.9,213,1371,171,1406,149.3L1440,128L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z"></path>
        </svg>
    </section>
    <!-- Akhir Potensi Dan Fasilitas Desa -->
    <!-- Footer -->
    <footer class="bg-success text-center pb-5" style="color: yellow;">
        <p>
            <i class="bi bi-c-circle-fill"></i>
            Copyright 2022|Built With <i class="bi bi-heart-fill"></i> By <a href="https://github.com/fadlisabda?tab=repositories" target="_blank" class="fw-bold text-decoration-none" style="color: yellow;">Fhadly Sabda Dinov</a>
            <br>
            <b>Kasi Pelayanan : 082285847330</b>
        </p>
    </footer>
    <!-- Akhir Footer -->
    <?= $this->endSection(); ?>