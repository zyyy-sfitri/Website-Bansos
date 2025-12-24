<?= $this->extend('layout/header'); ?>
<?= $this->section('content'); ?>


<section class="py-5 bg-light">
    <div class="container">
        
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

        <?php if (isset($berita) && is_array($berita) && count($berita) > 0): ?>
            <div class="row g-4">
                <?php foreach ($berita as $item): ?>
            <div class="col-lg-4 col-md-6">

            <div class="card border-0 shadow-sm h-100 position-relative">
                <a href="<?= base_url('/berita/' . $item['id_berita']) ?>" style="text-decoration: none; color: inherit;">

                <img src="<?= base_url('img/'. (isset($item['gambar']) ? $item['gambar'] : 'placeholder.jpg')) ?>" 
                     class="card-img-top" 
                     alt="<?= esc($item['judul'] ?? 'Berita'); ?>"
                     style="height:200px;object-fit:cover;">

                <div class="card-body">
                    <span class="badge bg-info text-dark position-absolute top-0 start-0 m-2">Informasi</span>
                    <h5 class="fw-bold mb-3"><?= esc($item['judul'] ?? ''); ?></h5>

                    <p class="text-secondary small mb-3">
                        <?= esc(mb_substr(strip_tags($item['deskripsi'] ?? ''), 0, 120)) . (strlen(strip_tags($item['deskripsi'] ?? '')) > 120 ? '...' : ''); ?>
                    </p>

                    <div class="d-flex align-items-center text-secondary small mb-3">
                        <i class="fas fa-calendar me-2"></i>
                        <span><?= isset($item['tanggal']) ? esc($item['tanggal']) : 'Tidak ada tanggal'; ?></span>
                    </div>

                    <h5 class="fw-bold mb-3"><?= esc($item['judul'] ?? ''); ?></h5>


                    <div class="text-secondary small mb-3">
                        <strong>Wilayah:</strong> <?= esc($item['wilayah'] ?? '-'); ?>
                    </div>
                </div>
                
            </a>
        </div>
        
    </div>
    


                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <div class="alert alert-info text-center" role="alert">
                <p class="mb-0">Belum ada berita untuk ditampilkan. Silakan tambahkan berita melalui panel admin.</p>
            </div>
        <?php endif; ?>
    </div>
    
</section>


<?= $this->endSection(); ?>
