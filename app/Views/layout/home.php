 <?= $this->extend('layout/header'); ?>
<?= $this->section('content'); ?>



                <section class="bg-light py-5" id="beranda">
                        <div class="container">
                            <div class="row align-items-center">
                                <div class="col-lg-6">
                                    <h1 class="display-4 fw-bold lh-sm">
                    <span >
                        Bantuan Sosial
                    </span><br>

                    <span>
                        Untuk
                    </span><br>

                    <span class="fw-bold fs-20"
                        style="background: linear-gradient(90deg,#6f8cff,#1aa64b);
                                -webkit-background-clip: text;
                                -webkit-text-fill-color: transparent;">
                        Kesejahteraan <br> Bersama
                    </span>
                </h1>

                <div class="d-flex gap-3 mt-4">
                    <a href="#" class="btn btn-primary btn-lg rounded-pill px-4"  style="background: linear-gradient(90deg,#6f8cff,#1aa64b)">
                        Baca Selengkapnya
                    </a>
                    <a href="#" class="btn btn-primary btn-lg rounded-pill px-4" style="background: linear-gradient(90deg,#6f8cff,#1aa64b)">
                        Pelajari Cara Kerja
                    </a>
                </div>

                                </div>
                <div class="col-lg-6 text-center mt-4 mt-lg-0">
                    <img src="<?= base_url('assets/img/1.jpg') ?>" alt="Ilustrasi" width="500px">
                </div>
            </div>
        </div>
    </section>

    <!-- Alur Pengajuan Section -->
    <section class="py-5" id="alur">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold mb-3">
                     Alur Pengajuan
                    <span class="brand-gradient" style="
                    background: linear-gradient(90deg,#6f8cff,#1aa64b);
                    -webkit-background-clip: text;
                    -webkit-text-fill-color: transparent;
                ">Bantuan Sosial</span>
                </h2>

                <p class="text-secondary">Ikuti langkah-langkah sederhana untuk melakukan pendaftaran secara online</p>
            </div>
            <div class="row g-4">
                <div class="col-lg-3 col-md-6">
                    <div class="card h-100 text-center border-1 shadow-lg">
                        <div class="card-body p-4" >
                            <div class="bg-primary bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center mx-auto mb-3" style="width: 80px; height: 80px; background: linear-gradient(90deg,#6f8cff,#1aa64b)" >
                                <img src="<?= base_url('assets/img/profil.png') ?>" alt="" width="50px">
                            </div>
                            <h5 class="fw-bold mb-3">Buat Akun</h5>
                            <p class="text-secondary small mb-2">Daftarkan dengan data diri yang valid dan lengkap</p>
                            <p class="small mb-0" style="color: blue;">Siapkan KK, KTP dan dokumen lainnya</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card h-100 text-center border-1 shadow-lg">
                        <div class="card-body p-4">
                            <div class="bg-primary bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center mx-auto mb-3" style="width: 80px; height: 80px; background: linear-gradient(90deg,#6f8cff,#1aa64b)" >
                                <img src="<?= base_url('assets/img/berkas.png') ?>" alt="" width="50px">
                            </div>
                            <h5 class="fw-bold mb-3">Lengkapi Berkas</h5>
                            <p class="text-secondary small mb-2">Daftar dengan data diri yang valid dan lengkap</p>
                            <p class="small mb-0" style="color: blue;">Pastikan foto dokumen jelas dan terbaca</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card h-100 text-center border-1 shadow-lg">
                        <div class="card-body p-4">
                            <div class="bg-primary bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center mx-auto mb-3" style="width: 80px; height: 80px; background: linear-gradient(90deg,#6f8cff,#1aa64b)" >
                                <img src="<?= base_url('assets/img/verifikasi.png') ?>" alt="" width="50px">
                            </div>
                            <h5 class="fw-bold mb-3">Verifikasi Data</h5>
                            <p class="text-secondary small mb-2">Daftar dengan data diri yang valid dan lengkap</p>
                            <p class="small mb-0" style="color: blue;">Verifikasi data memakan waktu 2-3 hari kerja</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card h-100 text-center border-1 shadow-lg">
                        <div class="card-body p-4">
                            <div class="bg-primary bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center mx-auto mb-3" style="width: 80px; height: 80px; background: linear-gradient(90deg,#6f8cff,#1aa64b)" >
                                <img src="<?= base_url('assets/img/setuju.png') ?>" alt="" width="50px">
                            </div>
                            <h5 class="fw-bold mb-3">Penerimaan Bantuan</h5>
                            <p class="text-secondary small mb-2">Daftar dengan data diri yang valid dan lengkap</p>
                            <p class="small mb-0" style="color: blue;">Anda akan menerima notifikasi melalui sms atau email</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Akses Akun Section -->
    <section class="bg-light py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h2 class="fw-bold mb-3">Akses Akun Anda</h2>
                    <p class="text-secondary mb-4">Masuk ke dashboard personal untuk memantau status pengajuan, mengupdate data dan melihat riwayat yang diterima</p>
                    <button onclick="window.location.href='<?= base_url('register') ?>'" class="btn btn-outline-primary me-2" type="button" style="background: linear-gradient(90deg,#6f8cff,#1aa64b);color:white">Masuk Ke Akun Anda</button>
                </div>
                <div class="col-lg-6 text-center mt-4 mt-lg-0">
                    <img src="<?= base_url('assets/img/image.png') ?>" alt="Dashboard" width="500px">
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold mb-3">Pertanyaan yang Sering Diajukan</h2>
            </div>
            <div class="accordion" id="faqAccordion">
                    <div class="accordion-item border-0 shadow-lg mb-3">
                        <h2 class="accordion-header shadow-lg mb-3 ">
                        <button class="accordion-button fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                            Bagaimana cara mendaftar sebagai penerima bantuan sosial?
                        </button>
                    </h2>
                    <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                        <div class="accordion-body text-secondary">
                            Anda dapat mendaftar melalui website ini dengan mengklik tombol "Buat Akun" dan mengisi formulir pendaftaran dengan lengkap.
                        </div>
                    </div>
                </div>
                <div class="accordion-item border-0 shadow-sm mb-3">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                            Dokumen apa saja yang diperlukan untuk pendaftaran?
                        </button>
                    </h2>
                    <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                        <div class="accordion-body text-secondary">
                            Anda memerlukan KTP, Kartu Keluarga, dan dokumen pendukung lainnya sesuai program bantuan yang diajukan.
                        </div>
                    </div>
                </div>
                <div class="accordion-item border-0 shadow-sm mb-3">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                            Berapa lama proses verifikasi data?
                        </button>
                    </h2>
                    <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                        <div class="accordion-body text-secondary">
                            Proses verifikasi data memakan waktu 2-3 hari kerja setelah dokumen diunggah.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Jadwal Penyaluran Section -->
    <section class="py-5 bg-light" id="jadwal">
        <div class="container">
            <div class="text-center mb-5">
                 <h2 class="fw-bold mb-3">
                     Jadwal Penyaluran
                    <span class="brand-gradient" style="
                    background: linear-gradient(90deg,#6f8cff,#1aa64b);
                    -webkit-background-clip: text;
                    -webkit-text-fill-color: transparent;
                ">Bantuan </span>
                </h2>

                <p class="text-muted">Lihat jadwal terbaru penyaluran berbagai program bantuan sosial pemerintah</p>
            </div>

            <!-- Card 1: Sedang Berlangsung -->
            <div class="card border-0 shadow-sm rounded-4 mb-3" id="bpnt">
                <div class="card-body p-4">
                    <div class="row align-items-center g-3">
                        <div class="col-lg-3 col-md-12">
                            <h5 class="fw-semibold mb-1">Penyaluran Bantuan Pangan Non Tunai (BPNT)</h5>
                            <p class="text-muted small mb-0">Penyaluran bantuan pangan melalui sembako</p>
                        </div>
                        <div class="col-lg-2 col-md-3">
                            <span class="badge bg-success bg-opacity-25 text-success px-3 py-2 rounded-3 fw-semibold">Sedang Berlangsung</span>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="bg-light rounded-3 p-3">
                                <div class="d-flex align-items-start gap-2 mb-2">
                                    <div class="bg-primary bg-opacity-10 rounded-3 p-2">
                                        <i class="bi bi-calendar-event text-primary"></i>
                                    </div>
                                    <div>
                                        <p class="mb-0 fw-medium small">15 Januari 2024</p>
                                        <p class="mb-0 fw-medium small">08:00 - 16:00 WIB</p>
                                    </div>
                                </div>
                                <div class="d-flex align-items-start gap-2">
                                    <div class="bg-primary bg-opacity-10 rounded-3 p-2">
                                        <i class="bi bi-geo-alt-fill text-primary"></i>
                                    </div>
                                    <div>
                                        <p class="text-uppercase small text-muted mb-0" style="font-size: 10px;">Lokasi</p>
                                        <p class="mb-0 fw-medium small">Balai RT</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3">
                            <div class="bg-success bg-opacity-25 rounded-4 p-3 text-center">
                                <h4 class="fw-bold mb-0">2.5M Keluarga</h4>
                                <p class="small mb-0 fw-medium">Penerima</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 2: PKH -->
            <div class="card border-0 shadow-sm rounded-4 mb-3" id="pkh">
                <div class="card-body p-4">
                    <div class="row align-items-center g-3">
                        <div class="col-lg-3 col-md-12">
                            <h5 class="fw-semibold mb-1">Program Keluarga Harapan (PKH)</h5>
                            <p class="text-muted small mb-0">Bantuan tunai bersyarat untuk keluarga kurang mampu</p>
                        </div>
                        <div class="col-lg-2 col-md-3">
                            <span class="badge bg-danger bg-opacity-25 text-danger px-3 py-2 rounded-3 fw-semibold">Akan Datang</span>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="bg-light rounded-3 p-3">
                                <div class="d-flex align-items-start gap-2 mb-2">
                                    <div class="bg-primary bg-opacity-10 rounded-3 p-2">
                                        <i class="bi bi-calendar-event text-primary"></i>
                                    </div>
                                    <div>
                                        <p class="mb-0 fw-medium small">20 Januari 2024</p>
                                        <p class="mb-0 fw-medium small">09:00 - 15:00 WIB</p>
                                    </div>
                                </div>
                                <div class="d-flex align-items-start gap-2">
                                    <div class="bg-primary bg-opacity-10 rounded-3 p-2">
                                        <i class="bi bi-geo-alt-fill text-primary"></i>
                                    </div>
                                    <div>
                                        <p class="text-uppercase small text-muted mb-0" style="font-size: 10px;">Lokasi</p>
                                        <p class="mb-0 fw-medium small">Kantor Pos Terdekat</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3">
                            <div class="bg-danger bg-opacity-25 rounded-4 p-3 text-center">
                                <h4 class="fw-bold mb-0">3.2M Keluarga</h4>
                                <p class="small mb-0 fw-medium">Penerima</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 3: KIP -->
            <div class="card border-0 shadow-sm rounded-4 mb-3" id="kip">
                <div class="card-body p-4">
                    <div class="row align-items-center g-3">
                        <div class="col-lg-3 col-md-12">
                            <h5 class="fw-semibold mb-1">Kartu Indonesia Pintar (KIP)</h5>
                            <p class="text-muted small mb-0">Bantuan pendidikan untuk siswa</p>
                        </div>
                        <div class="col-lg-2 col-md-3">
                            <span class="badge bg-danger bg-opacity-25 text-danger px-3 py-2 rounded-3 fw-semibold">Akan Datang</span>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="bg-light rounded-3 p-3">
                                <div class="d-flex align-items-start gap-2 mb-2">
                                    <div class="bg-primary bg-opacity-10 rounded-3 p-2">
                                        <i class="bi bi-calendar-event text-primary"></i>
                                    </div>
                                    <div>
                                        <p class="mb-0 fw-medium small">25 Januari 2024</p>
                                        <p class="mb-0 fw-medium small">08:00 - 14:00 WIB</p>
                                    </div>
                                </div>
                                <div class="d-flex align-items-start gap-2">
                                    <div class="bg-primary bg-opacity-10 rounded-3 p-2">
                                        <i class="bi bi-geo-alt-fill text-primary"></i>
                                    </div>
                                    <div>
                                        <p class="text-uppercase small text-muted mb-0" style="font-size: 10px;">Lokasi</p>
                                        <p class="mb-0 fw-medium small">Sekolah Terdaftar</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3">
                            <div class="bg-danger bg-opacity-25 rounded-4 p-3 text-center">
                                <h4 class="fw-bold mb-0">3.2M Siswa</h4>
                                <p class="small mb-0 fw-medium">Penerima</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card border-0 shadow-sm rounded-4 mb-3" id="upah">
                <div class="card-body p-4">
                    <div class="row align-items-center g-3">
                        <div class="col-lg-3 col-md-12">
                            <h5 class="fw-semibold mb-1">Bantuan Subsidi Upah</h5>
                            <p class="text-muted small mb-0">Bantuan subsidi dengan upah</p>
                        </div>
                        <div class="col-lg-2 col-md-3">
                            <span class="badge bg-danger bg-opacity-25 text-danger px-3 py-2 rounded-3 fw-semibold">Akan Datang</span>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="bg-light rounded-3 p-3">
                                <div class="d-flex align-items-start gap-2 mb-2">
                                    <div class="bg-primary bg-opacity-10 rounded-3 p-2">
                                        <i class="bi bi-calendar-event text-primary"></i>
                                    </div>
                                    <div>
                                        <p class="mb-0 fw-medium small">25 Januari 2024</p>
                                        <p class="mb-0 fw-medium small">08:00 - 14:00 WIB</p>
                                    </div>
                                </div>
                                <div class="d-flex align-items-start gap-2">
                                    <div class="bg-primary bg-opacity-10 rounded-3 p-2">
                                        <i class="bi bi-geo-alt-fill text-primary"></i>
                                    </div>
                                    <div>
                                        <p class="text-uppercase small text-muted mb-0" style="font-size: 10px;">Lokasi</p>
                                        <p class="mb-0 fw-medium small">Warga Terdaftar</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3">
                            <div class="bg-danger bg-opacity-25 rounded-4 p-3 text-center">
                                <h4 class="fw-bold mb-0">3.2M Siswa</h4>
                                <p class="small mb-0 fw-medium">Penerima</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

  

<div class="container py-5" id='berita'>
    <h2 class="fw-bold text-center mb-3">
        Berita & <span class="brand-gradient" style="
                    background: linear-gradient(90deg,#6f8cff,#1aa64b);
                    -webkit-background-clip: text;
                    -webkit-text-fill-color: transparent;
                ">Informasi Terkini </span>
    </h2>
    <p class="text-center text-secondary mb-5">
        Lihat berita terbaru penyaluran berbagai program bantuan sosial pemerintah
    </p>

    <?php if (isset($berita) && count($berita) > 0): ?>
        <?php $featured = $berita[0]; ?>

        <div class="card border-0 shadow-sm mb-4 rounded-4 overflow-hidden">
            <div class="row g-0 align-items-center">
                <div class="col-md-6 p-4">
                    <span class="badge bg-primary mb-3">Pengumuman</span>

                    <h3 class="fw-bold mb-3"><?= esc($featured['judul']); ?></h3>
                    <p class="text-secondary mb-4">
                        <?= esc(mb_substr(strip_tags($featured['deskripsi']), 0, 200)); ?>...
                    </p>
                </div>

                <div class="col-md-6">
                        <a href="<?= base_url('/berita/detail/'.$featured['id_berita']); ?>">
                        <img src="<?= base_url('img/'.$featured['gambar']); ?>" 
                        class="img-fluid h-100 object-fit-cover" alt="">
                    </a>
                </div>
            </div>
        </div>

        <!-- Grid Berita Lainnya -->
        <div class="row g-4 mb-4">
            <?php foreach (array_slice($berita, 1, 6) as $item): ?>
                <div class="col-lg-4 col-md-6">
                    <div class="card h-100 border-0 shadow-sm rounded-4">
                        <div class="position-relative">
                            <img src="<?= base_url('img/'.$item['gambar']); ?>" 
                                 class="card-img-top rounded-top" style="height:200px; object-fit:cover;">
                            <span class="badge bg-info position-absolute top-0 start-0 m-2">Informasi</span>
                        </div>
                        <div class="card-body">
                            <h5 class="fw-bold"><?= esc($item['judul']); ?></h5>
                            <p class="text-secondary small">
                                <?= esc(mb_substr(strip_tags($item['deskripsi']), 0, 120)); ?>...
                            </p>

                           <a href="<?= base_url('/berita/detail/'.$item['id_berita']); ?>" 
                                class="text-primary fw-semibold small">
                                Baca Selengkapnya <i class="fas fa-arrow-right ms-1"></i>
                            </a>

                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Lihat Berita Lainnya Button -->
        <div class="text-center">
            <a href="<?= base_url('/berita'); ?>" class="btn btn-primary btn-lg px-5" style="background: linear-gradient(90deg,#6f8cff,#1aa64b);
                                -webkit-background-clip: text;
                                -webkit-text-fill-color: transparent;" >Lihat Berita Lainnya</a>
        </div>

    <?php else: ?>
        <!-- fallback -->
        <div class="alert alert-warning text-center">
            Belum ada berita untuk ditampilkan.
        </div>
    <?php endif; ?>
</div>

<?= $this->endSection(); ?>
