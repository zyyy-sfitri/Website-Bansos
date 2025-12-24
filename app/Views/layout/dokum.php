<?= $this->extend('layout/header'); ?>
<?= $this->section('content'); ?>

<style>
    .dokum-card {
        position: relative;
        overflow: hidden;
        transition: all 0.3s ease;
    }

    .dokum-card:hover {
        transform: translateY(-5px);
    }

    .dokum-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(135deg, rgba(49, 146, 231, 0.95), rgba(20, 83, 45, 0.85));
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        padding: 20px;
        opacity: 0;
        transition: opacity 0.3s ease;
        color: white;
        text-align: center;
        z-index: 10;
        border-radius: 16px;
    }

    .dokum-card:hover .dokum-overlay {
        opacity: 1;
    }

    .dokum-overlay h3 {
        font-size: 1.25rem;
        font-weight: 600;
        margin-bottom: 10px;
        line-height: 1.3;
    }

    .dokum-overlay p {
        font-size: 0.9rem;
        margin-bottom: 8px;
        line-height: 1.4;
    }

    .dokum-overlay .info-label {
        font-weight: 600;
        color: #a3d5a3;
    }
</style>
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

<section class="bg-light py-5">
    <div class="container">
        <div class="row align-items-center">
            <h1>Apa yang Kami Lakukan?</h1>
            <p>
                Tidak hanya menyalurkan bantuan, Bansosku hadir untuk
                menciptakan perubahan nyata melalui berbagai kegiatan
                sosial yang berkelanjutan.
            </p>
            <div class="card border-0 p-4 rounded-4 mb-4"
                style="box-shadow: 0 30px 60px rgba(0,0,0,0.15); background:#fff;">
                <h1 class="fw-bold">Penyaluran Bantuan Sosial</h1>
                <p class="mt-2">
                    Kami menyalurkan berbagai jenis bantuan kepada masyarakat
                    yang membutuhkan - mulai dari bantuan pangan, pendidikan,
                    kesehatan, hingga perbaikan tempat tinggal. Semua dilakukan
                    dengan semangat gotong royong dan kejujuran.
                </p>
            </div>
            <div class="card border-0 p-4 rounded-4 mb-4"
                style="box-shadow: 0 30px 60px rgba(0,0,0,0.15); background:#fff;">
                <h1 class="fw-bold">Aksi Lapangan</h1>
                <p class="mt-2">
                    Tim kami turun langsung ke lapangan untuk memasikan setiap bantuan
                    diterima oleh penerima manfaat yang benar. Kami percaya bahwa kehadiran
                    nyata lebih berharga dari sekadar janji.
                </p>
            </div>
            <div class="card border-0 p-4 rounded-4 mb-4"
                style="box-shadow: 0 30px 60px rgba(0,0,0,0.15); background:#fff;">
                <h1 class="fw-bold">Kolaborasi Bersama</h1>
                <p class="mt-2">
                    Bansosku menjalin kerja sama dengan berbagai pihak - mulai dari pemerintah,
                    lembaga sosial hingga komunitas lokal - untuk memperluas jangkauan bantuan 
                    dan menciptakan Indonesia yang lebih sejahtera.
                </p>
            </div>
        </div>
    </div>
</section>

<section class="bg-light py-5">
    <div class="container">
         <h2 class="fw-bold text-center mb-3">
        Dokumentasi <span class="brand-gradient" style="
                    background: linear-gradient(90deg,#6f8cff,#1aa64b);
                    -webkit-background-clip: text;
                    -webkit-text-fill-color: transparent;
                ">Kegiatan</span>
    </h2>

        <div class="d-flex flex-wrap justify-content-center gap-4 text-center">

            <?php if (!empty($dokumc)) : ?>
                <?php foreach ($dokumc as $d) : ?>
                    <?php
                        $filename = $d['gambar'] ?? '';
                        if (!empty($filename) && file_exists(FCPATH . 'img/' . $filename)) {
                            $imgPath = base_url('img/' . $filename);
                        } else {
                            $imgPath = base_url('assets/img/1.jpg');
                        }
                    ?>
                    <div class="card border-0 shadow-sm dokum-card" style="width: 350px; position: relative;">
                        <img src="<?= $imgPath ?>"
                            class="card-img-top rounded-top-4"
                            alt="<?= esc($d['judul'] ?? 'dokum') ?>"
                            style="height: 250px; object-fit: cover;">
                        
                        <div class="dokum-overlay rounded-top-4">
                            <h3><?= esc($d['judul'] ?? 'Dokumentasi') ?></h3>
                            
                            
                            <?php if (!empty($d['deskripsi'])) : ?>
                                <p style="font-size: 0.85rem; max-height: 60px; overflow-y: auto;">
                                    <?= esc(substr($d['deskripsi'], 0, 100)) ?>
                                    <?php if (strlen($d['deskripsi']) > 100) : ?>
                                        ...
                                    <?php endif; ?>
                                </p>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else : ?>
                <p class="text-muted">Belum ada dokumentasi.</p>
            <?php endif; ?>

        </div>
    </div>
</section>


<?= $this->endSection(); ?>