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
      --green: #14532d;
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
      background: var(--green);
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
      color: var(--green);
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
      color: var(--green);
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
      background: var(--green);
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
      background-color: var(--green);
      color: white;
    }

    header {
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      z-index: 1000;
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
        <span id="notification-container">
            <?php if (isset($unread_count) && $unread_count > 0): ?>
                <span class="badge bg-danger ms-1"><?= $unread_count ?></span>
            <?php endif; ?>
        </span>
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

    <div class="row g-3 mb-4">
      <div class="col-md-3 col-sm-6">
        <div class="card-custom p-3 text-center">
          <h3 class="fs-6 text-dark">Total Penerima</h3>
          <p class="fs-4 fw-bold text-success"><?= number_format($approved_count ?? 0) ?></p>
        </div>
      </div>
      <div class="col-md-3 col-sm-6">
        <div class="card-custom p-3 text-center">
          <h3 class="fs-6 text-dark">Status Pending</h3>
          <p class="fs-4 fw-bold text-success"><?= number_format($pending_count ?? 0) ?></p>
        </div>
      </div>
      <div class="col-md-3 col-sm-6">
        <div class="card-custom p-3 text-center">
          <h3 class="fs-6 text-dark">Ditolak</h3>
          <p class="fs-4 fw-bold text-success"><?= number_format($rejected_count ?? 0) ?></p>
        </div>
      </div>
      <div class="col-md-3 col-sm-6">
        <div class="card-custom p-3 text-center">
          <h3 class="fs-6 text-dark">Total Permohonan</h3>
          <p class="fs-4 fw-bold text-success"><?= number_format($total_apps ?? 0) ?></p>
        </div>
      </div>
    </div>

    
    <div class="switch-container mb-4">
      <a href ="<?= base_url('/adminuser/pengajuan') ?>" class="switch-btn active" style="border-radius:25px 0 0 25px; backround-color:#14532d;color:white;">Pengajuan</a>
      <a href ="<?= base_url('/adminuser/penerima') ?>"
      class="switch-btn" style="border-radius:0 25px 25px 0;">Penerima</a>
    </div>

   <div class="card-custom p-4 mb-4" style="border-radius:15px;">

<div class="table-responsive" style="margin: 0 px; box-shadow: 0 4px 12px rgba(147,146,146,0.15); border-radius: 10px;">

    <div class="d-flex justify-content-between align-items-center" style="margin: 0 20px;">
    </div><br>



    <!-- HEADER DALAM CARD -->
    <div class="d-flex justify-content-between align-items-center mb-3" style="margin: 0 10px;">
        <div>
            <h4 class="fw-bold m-0">Data Pengajuan Bantuan Sosial</h4>
            <small class="text-muted">Kelola data Pengajuan bantuan.</small>
        </div>

       <form action="<?= base_url('adminuser') ?>" method="post" class="d-flex">
    <input type="text" name="cari" class="form-control me-2"
           placeholder="Cari data..." style="width: 180px;">
    <button class="btn btn-outline-secondary me-2" type="submit">Cari</button>

    <?php if (!empty($cari)): ?>
        <a href="<?= base_url('adminuser') ?>" class="btn btn-outline-secondary" style="background:#ccc;">
            Reset
        </a>
    <?php endif; ?>
</form>

</div>


    <div class="table-responsive">
        
      <table class="table align-middle">
        <thead>
          <tr>
            <th>ID</th>
            <th>Nama Permohonan</th>
            <th>NIK</th>
            <th>Status</th>
            <th>Tanggal</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <tr>
               <?php
            $i = 1;
            foreach($adminuser as $b) :  
          ?>
            <tr> 
              <th scope="row"><?= $i++ ?></th>
                  <td><?= $b['nama'];?></td>
                  <td><?= $b['nik'];?></td>
                  <td><?= $b['status'] ?? 'pending' ?></td>
                  <td><?= $b['tanggal'] ?? '-' ?></td>

                  <td class="aksi">
                   <?php $status = $b['status'] ?? '' ?>
                    <?php if ($status === 'ditolak') : ?>
                      <span class="badge bg-danger me-2">Ditolak</span>

                      <a href="<?= base_url('/adminuser/hapus/'. $b['id_user']) ?>" class= "btn btn-sm btn-outline-secondary" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?');">Hapus</a>

                    <?php else : ?>

                      <a href="<?= base_url('/adminuser/edit/'. $b['id_user']) ?>" class="btn btn-sm btn-primary me-1">Edit</a>

                      <a href="<?= base_url('/adminuser/hapus/'.$b['id_user']) ?>" class="btn btn-sm btn-outline-secondary" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?');">Hapus</a>
                    <?php endif; ?>
                  </td>
            </tr>
            <?php endforeach; ?>    
        </tbody>
      </table>
    </div>
  </div> </div>
    

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

<script>
  function fetchNotificationCount() {
    fetch('<?= base_url('admin/notifikasi/getunreadcount') ?>')
      .then(response => {
        if (!response.ok) {
          throw new Error('Network response was not ok');
        }
        return response.json();
      })
      .then(data => {
        const container = document.getElementById('notification-container');
        if (container) {
          if (data.unread_count > 0) {
            container.innerHTML = `<span class="badge bg-danger ms-1">${data.unread_count}</span>`;
          } else {
            container.innerHTML = '';
          }
        }
      })
      .catch(error => console.error('Error fetching notification count:', error));
  }

  // Fetch count immediately on page load
  fetchNotificationCount();

  // Then fetch every 10 seconds
  setInterval(fetchNotificationCount, 10000);
</script>
</body>
</html>