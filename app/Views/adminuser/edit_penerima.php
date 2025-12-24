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

  <style>
    * {
      font-family: 'Poppins', 'Roboto', sans-serif;
    }

    :root {
      --green: #1B673B;
      --white: #fff;
      --gray: #f4f4f4;
      --dark: #222;
    }

    body {
      background: var(--gray);
      min-height: 100vh;
      margin: 0;
      padding: 0;
    }

    .sidebar {
      position: fixed;
      top: 80px;
      left: 20px;
      width: 250px;
      height: calc(100vh - 100px);
      background: #1B673B;
      border-radius: 20px;
      box-shadow: 0 6px 25px rgba(0, 0, 0, 0.2);
      transition: 0.4s ease;
      z-index: 100;
      overflow: hidden;
    }

    .sidebar.hide {
      width: 70px;
    }

    .sidebar ul {
      height: 100%;
      margin: 0;
      padding: 0;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
    }

    .sidebar ul li {
      list-style: none;
    }

    .sidebar ul li a {
      display: flex;
      align-items: center;
      padding: 14px 20px;
      color: var(--white);
      text-decoration: none;
      font-weight: 500;
      transition: 0.3s;
      white-space: nowrap;
    }

    .sidebar ul li a ion-icon {
      font-size: 1.5rem;
      min-width: 24px;
    }

    .sidebar ul li a:hover {
      background: var(--white);
      color: #1B673B;
      border-radius: 10px;
      margin: 4px 10px;
    }

    .sidebar.hide ul li a span {
      display: none;
    }

    .sidebar ul li.logout {
      margin-bottom: 20px;
    }

    .user {
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      text-align: center;
      gap: 5px;
      margin: 20px 0;
      padding: 10px;
    }

    .user img {
      width: 40px;
      height: 40px;
      border-radius: 50%;
      object-fit: cover;
    }

    .sidebar.hide .user span {
      display: none;
    }

    .main {
      margin-left: 290px;
      padding: 30px;
      transition: 0.4s ease;
      margin-top: 80px;
      height: calc(100vh - 120px);
      overflow-y: auto;
    }

    .sidebar.hide ~ .main {
      margin-left: 110px;
    }

    .toggle {
      font-size: 2rem;
      color: #1B673B;
      cursor: pointer;
    }

    .card-custom {
      background: var(--white);
      border-radius: 15px;
      box-shadow: 0 3px 6px rgba(0, 0, 0, 0.3);
      transition: 0.3s;
    }

    .card-custom:hover {
      transform: translateY(-3px);
      box-shadow: 0 6px 15px rgba(0, 0, 0, 0.15);
    }

    table {
      border-radius: 15px;
      overflow: hidden;
      box-shadow: 0 3px 6px rgba(0, 0, 0, 0.3);
      background: white;
    }

    table th {
      background: #1B673B;
      color: var(--white);
    }

    table tbody tr:hover {
      background: #f1f1f1;
    }

    .switch-container {
      display: inline-flex;
      border: 1px solid #ccc;
      border-radius: 25px;
      overflow: hidden;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.5);
      margin-bottom: 20px;
    }

    .switch-btn {
      padding: 8px 20px;
      border: none;
      background-color: white;
      color: black;
      cursor: pointer;
      font-weight: bold;
      transition: 0.3s;
    }

    .switch-btn:first-child {
      border-right: 1px solid #ccc;
    }

    .switch-btn.active {
      background-color: #1B673B;
      color: white;
    }

    header {
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      z-index: 1000;
    }

    
    .card-custom {
      background: white;
      border-radius: 20px;
      padding: 40px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
      margin-bottom: 30px;
    }

    .box-wrapper {
      max-width: 9000px;
      margin: 30px auto;
      padding: 0 15px;
    }

    .form-label {
      font-weight: 600;
      margin-bottom: 8px;
      font-size: 14px;
    }

    .form-control-custom {
      border: none;
      border-bottom: 2px solid #ddd;
      border-radius: 0;
      padding: 12px 5px;
      font-size: 14px;
      transition: 0.3s;
    }

    .form-control-custom:focus {
      border-bottom-color: #1f6243;
      box-shadow: none;
    }

    .btn-simpan {
      background: linear-gradient(135deg, #1f6243 0%, #14532d 100%);
      color: white;
      border: none;
      padding: 10px 30px;
      border-radius: 25px;
      font-weight: 600;
      font-size: 14px;
      float: right;
      transition: 0.3s;
    }

    .btn-simpan:hover {
      transform: translateY(-2px);
      box-shadow: 0 6px 16px rgba(31, 98, 67, 0.3);
    }

        .kotak-status {
        width: 98%;
        max-width: 10000px;
        margin: 40px auto;
        background: #fff;
        padding: 40px;
        border-radius: 20px;
        box-shadow: 0 0 15px rgba(0,0,0,0.1);
        text-align: center;
        font-family: 'Poppins', sans-serif;
    }

    .judul-status {
        margin-bottom: 20px;
        font-size: 24px;
        font-weight: 700;
    }

    .langkah-container {
        display: flex;
        justify-content: space-between;
        margin: 30px 0;
        border-bottom: 3px solid #b5d6b0;
        padding-bottom: 20px;
    }

    .langkah-item {
        text-align: center;
    }

    .lingkaran-nomor {
        display: inline-block;
        width: 55px;
        height: 55px;
        line-height: 55px;
        border-radius: 50%;
        background: #d9d9d9;
        font-size: 22px;
        font-weight: 600;
        margin-bottom: 5px;
        transition: 0.3s;
    }

    .aktif .lingkaran-nomor {
        background: #1B673B;
        color: white;
    }

    .keterangan-langkah {
        font-size: 12px;
        margin-top: 5px;
    }

    .status-saat-ini {
        font-size: 18px;
        margin: 25px 0;
    }

    .status-saat-ini span {
        font-weight: 600;
        color: #1B673B;
    }

    .status-ditolak {
        font-size: 18px;
        font-weight: 600;
        color: #dc3545;
        background: #f8d7da;
        padding: 10px 20px;
        border-radius: 8px;
        border: 1px solid #f5c6cb;
    }

    .tombol-container {
        display: flex;
        justify-content: center;
        gap: 30px;
    }

    .tombol-setuju, .tombol-tolak {
        padding: 12px 40px;
        font-size: 18px;
        border: none;
        border-radius: 12px;
        cursor: pointer;
        color: white;
        font-weight: 600;
        background: linear-gradient(to right, #3a80e0, #168d2f);
        transition: 0.3s;
    }

    .tombol-setuju:hover, .tombol-tolak:hover {
        opacity: 0.85;
    }

    @media (max-width: 600px) {
        .langkah-container {
            flex-wrap: wrap;
            gap: 20px;
            border: none;
        }

        .langkah-item {
            width: 30%;
        }
    }

    @media (max-width: 992px) {
      .sidebar {
        left: -270px;
      }

      .sidebar.show {
        left: 20px;
      }

      .main {
        margin-left: 0;
        padding: 20px;
      }

      .sidebar.hide ~ .main {
        margin-left: 0;
      }
    }
  </style>
</head>
<body>

  <?= $this->extend('layout/header'); ?>
  <?php $this->section('content'); ?>


  <?php if (session()->getFlashdata('pesan')) : ?>
      <div class="alert alert-success" role="alert">
          <?= session()->getFlashdata('pesan');?>
      </div>
  <?php endif; ?>

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

  <!-- Sidebar -->
  <div class="sidebar" id="sidebar">
    <ul class="list-unstyled">
      <div>
        <div class="user">
        <img src="<?= base_url('assets/img/profil2.png') ?>" width="40" height="40" class="me-2">
          <span class="text-white fw-medium">Admin</span>
        </div>
          <li><a href="<?= base_url('adminuser/pengajuan') ?>">
              <ion-icon name="document-text-outline" class="me-2"></ion-icon><span>Data Penerima</span>
            </a></li>

            <li><a href="<?= base_url('admindokum/berita') ?>">
                <ion-icon name="people-outline" class="me-2"></ion-icon><span>Dokumentasi</span>
            </a></li>

            <li><a href="<?= base_url('adminuser/upload') ?>">
                <ion-icon name="cloud-upload-outline" class="me-2"></ion-icon><span>Upload</span>

      </div>
      <li class="logout"><a href="<?= base_url() ?>"><ion-icon name="log-out-outline" class="me-2"></ion-icon><span>Sign Out</span></a></li>
    </ul>
  </div>

  <!-- Main -->
  <div class="main">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <div class="toggle" id="toggle"><ion-icon name="menu-outline"></ion-icon></div>
      <h2 class="fw-semibold">Dashboard</h2>
    </div>
        

<form action="<?= base_url('/adminuser/update/'.$adminuser['id_user']) ?>" method="post">
      <?= csrf_field() ?>
      <input type="hidden" name="return" value="penerima">

      <div class="box-wrapper">
        <div class="card-custom">
          <h2>Data Penerima</h2>

          <div class="row g-4">

            <div class="col-12">
              <label class="form-label">Nama Lengkap</label>
              <input type="text" name="nama" class="form-control form-control-custom"
                     value="<?= esc($adminuser['nama'] ?? $adminuser['Nama'] ?? '') ?>">
            </div>

            <div class="col-12">
              <label class="form-label">NIK</label>
              <input type="text" name="nik" class="form-control form-control-custom"
                     value="<?= esc($adminuser['nik'] ?? $adminuser['NIK'] ?? '') ?>">
            </div>

            <div class="col-12">
              <label class="form-label">Tanggal</label>
              <input type="date" name="tanggal" class="form-control form-control-custom"
                     value="<?= esc($adminuser['tanggal'] ?? '') ?>">
            </div>

            <div class="col-12">
              <label class="form-label">Status</label>
              <select name="status" class="form-select">
                <?php $cur = $adminuser['status'] ?? '' ?>
                <option value="pending"   <?= $cur=='pending' ? 'selected' : '' ?>>Pending</option>
                <option value="disetujui" <?= $cur=='disetujui' ? 'selected' : '' ?>>Disetujui</option>
                <option value="ditolak"   <?= $cur=='ditolak' ? 'selected' : '' ?>>Ditolak</option>
              </select>
            </div>

          </div>

          <div class="mt-4 d-flex justify-content-between">
            <a href="<?= base_url('/adminuser/penerima') ?>" class="btn btn-outline-secondary">Kembali</a>
            <button type="submit" class="btn-simpan">Simpan Perubahan</button>
          </div>

        </div>
      </div>
  </form>

  <div class="kotak-status">
    <h2 class="judul-status">Status Penerima</h2>

    <div class="langkah-container">
       <div class="langkah-item <?= ($StatusUser['status_proses']=='pengajuan_masuk') ? 'aktif' : '' ?>">
    <span class="lingkaran-nomor">1</span>
    <p class="keterangan-langkah">Pengajuan Masuk</p>
</div>

<div class="langkah-item <?= ($StatusUser['status_proses']=='verifikasi') ? 'aktif' : '' ?>">
    <span class="lingkaran-nomor">2</span>
    <p class="keterangan-langkah">Verifikasi</p>
</div>

<div class="langkah-item <?= ($StatusUser['status_proses']=='survei') ? 'aktif' : '' ?>">
    <span class="lingkaran-nomor">3</span>
    <p class="keterangan-langkah">Survei</p>
</div>

<div class="langkah-item <?= ($StatusUser['status_proses']=='validasi') ? 'aktif' : '' ?>">
    <span class="lingkaran-nomor">4</span>
    <p class="keterangan-langkah">Validasi Data</p>
</div>

<div class="langkah-item <?= ($StatusUser['status_proses']=='persetujuan') ? 'aktif' : '' ?>">
    <span class="lingkaran-nomor">5</span>
    <p class="keterangan-langkah">Persetujuan</p>
</div>

<div class="langkah-item <?= ($StatusUser['status_proses']=='pencairan') ? 'aktif' : '' ?>">
    <span class="lingkaran-nomor">6</span>
    <p class="keterangan-langkah">Pencairan</p>
</div>

    </div>

    <div class="status-saat-ini">
        <span><?= ucfirst(str_replace('_', ' ', $StatusUser['status_proses'] ?? 'pengajuan_masuk')) ?></span>
    </div>

    <?php if(isset($StatusUser) && !empty($StatusUser)): ?>
    <div class="tombol-container">
        <?php
        $currentStatus = $StatusUser['status_proses'];
        $steps = [
            'pengajuan_masuk' => 'verifikasi',
            'verifikasi' => 'survei',
            'survei' => 'validasi',
            'validasi' => 'persetujuan',
            'persetujuan' => 'pencairan',
            'pencairan' => null
        ];
        $nextStatus = $steps[$currentStatus] ?? null;
        ?>

        <?php if ($currentStatus == 'ditolak'): ?>
            <span class="status-ditolak">Ditolak</span>
        <?php elseif ($nextStatus): ?>
            <a href="<?= base_url('user/next_step/' . $StatusUser['id_user']) ?>"
               class="tombol-setuju">Lanjut ke <?= ucfirst($nextStatus) ?></a>
        <?php elseif ($currentStatus == 'pencairan'): ?>
            <a href="<?= base_url('user/complete_process/' . $StatusUser['id_user']) ?>"
               class="tombol-setuju" onclick="return confirm('Apakah Anda yakin ingin menyelesaikan proses pencairan?')">Selesai</a>
        <?php elseif ($currentStatus == 'selesai'): ?>
            <span class="status-selesai">Proses Selesai</span>
        <?php endif; ?>


    </div>
<?php else: ?>
    <p>Data user tidak tersedia.</p>
<?php endif; ?>



    </div>
</div>

  <!-- Bootstrap JS + Ionicons -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

  <script>
    const sidebar = document.getElementById('sidebar');
    const toggle = document.getElementById('toggle');
    toggle.onclick = () => {
      if (window.innerWidth <= 992) {
        sidebar.classList.toggle('show');
      } else {
        sidebar.classList.toggle('hide');
      }
    };
  </script>
</body>
</html>