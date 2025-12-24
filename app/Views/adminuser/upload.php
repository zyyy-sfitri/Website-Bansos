<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Bansosku Dashboard</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?= base_url('assets/css/adminuser.css') ?>">
</head>
<body>

  <?= $this->extend('layout/header'); ?>
  <?php $this->section('content'); ?>

  

  <?php if (session()->getFlashdata('pesan')) : ?>
      <div class="alert alert-success" role="alert">
          <?= session()->getFlashdata('pesan');?>
      </div>
  <?php endif; ?>

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

  <div class="main">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <div class="toggle" id="toggle"><ion-icon name="menu-outline"></ion-icon></div>
      <h2 class="fw-semibold">Dashboard</h2>
  </div>

    <div class="table-responsive">
      <table class="table align-middle">
        <thead>
         <tr>
            <th>ID</th>
            <th>Profil</th>
            <th>Nama Permohonan</th>
            <th>Status</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
         <?php
$i = 1;
foreach($adminuser as $b) :
    if ($b['role'] == 'admin') continue;  
?>
<tr>
    <th scope="row"><?= $i++ ?></th>
    <td>
        <img 
            src="<?= !empty($b['profil']) 
                ? base_url('uploads/profiles/' . $b['profil']) 
                : base_url('assets/img/profil2.png'); ?>"
            width="100"
            height="80"
           >
    </td>
    <td><?= esc($b['nama']) ?></td>



    <td>
        <?php
            $status = $b['status_proses'];
            $badgeClass = 'bg-warning'; 

            if ($status == 'selesai') {
                $badgeClass = 'bg-success';
            } elseif ($status == 'pencairan') {
                $badgeClass = 'bg-info'; 
            } elseif ($status == 'pengajuan_masuk') {
                $badgeClass = 'bg-warning'; 
            }


        ?>
        <span class="badge <?= $badgeClass ?>"><?= ucfirst($status) ?></span>
    </td>

    <td class="aksi">
        <a href="<?= base_url('/adminuser/detail/'. $b['id_user']) ?>" class="btn btn-sm btn-primary me-1">Detail</a>
    </td>

            </tr></tr>
          <?php endforeach; ?>    
        </tbody>
      </table>
    </div>
    </div>

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