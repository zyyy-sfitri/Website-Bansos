<?= $this->extend('layout/header'); ?>
<?= $this->section('content'); ?>

<section class="py-5 bg-light">
    <div class="container">
        <?php if(isset($berita) && !empty($berita)): ?>
            <div class="row">
                <div class="col-12">
                    <div class="card border-0 shadow-sm mb-4">
                        <img src="<?= base_url('img/' . ($berita['gambar'] ?? 'placeholder.jpg')) ?>" 
                             class="card-img-top" 
                             alt="<?= esc($berita['judul']) ?>" 
                             style="height:350px; object-fit:cover; border-radius:8px 8px 0 0;">
                        <div class="card-body">
                            <h1 class="fw-bold mb-3"><?= esc($berita['judul']) ?></h1>
                            <div class="text-secondary mb-3">
                                <i class="fas fa-calendar me-2"></i>
                                <?= isset($berita['tanggal']) ? esc($berita['tanggal']) : 'Tanggal tidak tersedia'; ?>
                                <span class="ms-3"><strong>Wilayah:</strong> <?= esc($berita['wilayah'] ?? '-') ?></span>
                            </div>
                            <p style="line-height:1.8; font-size:16px;">
                                <?= nl2br(esc($berita['deskripsi'])) ?>
                            </p>
                        </div>
                    </div>
                    <a href="<?= previous_url() ?>" class="btn btn-outline-secondary mt-3">
                        ← Kembali
                    </a>

                </div>
            </div>
        <?php else: ?>
            <div class="alert alert-warning text-center">
                Berita tidak ditemukan.
            </div>
        <?php endif; ?>
    </div>
</section>

<?= $this->endSection(); ?>
