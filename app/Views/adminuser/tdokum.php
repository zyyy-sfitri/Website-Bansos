<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Bansosku Dashboard</title>

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?= base_url('assets/css/adminuser.css') ?>">
</head>
<body>

  <!-- Header -->
  <div class="bg-dark">
    <header class="d-flex justify-content-between align-items-center px-3 py-2" style="background-color:#1f6243;">
      <div class="d-flex align-items-center">
        <img src="<?= base_url('assets/img/logobansos.png') ?>" width="40" height="40" class="me-2">
        <div>
          <h1 class="h6 m-0 text-white fw-bold">Admin Dashboard</h1>
          <p class="m-0 text-light small">Kelola sistem bantuan sosial</p>
        </div>
      </div>
      <a href="<?= base_url('admin/notifikasi') ?>" class="btn btn-light rounded-pill fw-bold px-3 py-1">
        Notifikasi
        <?php if (isset($unread_count) && $unread_count > 0): ?>
            <span class="badge bg-danger ms-1"><?= $unread_count ?></span>
        <?php endif; ?>
        </a>
    </header>
  </div>

  <!-- Main -->
  <main class="container" style="margin-left: 200px; margin-top: 100px; margin-bottom: 100px; max-width: 950px;">
    <div class="card shadow-sm" style="border-radius: 20px;">
      <div class="card-body p-5">
        <h2 class="text-center fw-bold mb-5" style="font-size: 2rem;">Data Dokumentasi</h2>

        <form action="<?= base_url('/dokum/simpan'); ?>" method="post" enctype="multipart/form-data">

        <h5 class="fw-bold mb-3">Judul Gambar</h5>
        <input type="text" name="judul" class="form-control form-control-custom" required>
        <hr class="my-4">

        <h5 class="fw-bold mb-3">Gambar</h5>
        <input type="file" name="gambar" class="form-control form-control-custom" required>
        <hr class="my-4">

        <h5 class="fw-bold mb-3">Wilayah</h5>
        <input type="text" name="wilayah" class="form-control form-control-custom" required>
        <hr class="my-4">

        <h5 class="fw-bold mb-3">Deskripsi</h5>
        <input type="text" name="deskripsi" class="form-control form-control-custom" required>
        <hr class="my-4">

        <div class="text-end">
            <button type="submit" class="btn btn-primary rounded-pill px-5 py-2 fw-bold">
                Simpan Data
            </button>
        </div>

    </form>

        </div>
      </div>
    </div>
  </main>

</body>
</html> 