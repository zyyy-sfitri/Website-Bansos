<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Detail Dokumen - Bansosku</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="<?= base_url('assets/css/adminuser.css') ?>">

</head>
<body>

<div id="avatarModal" style="
    display:none;
    position:fixed;
    inset:0;
    background:rgba(0,0,0,0.6);
    z-index:9999;
    align-items:center;
    justify-content:center;
" onclick="closeAvatar()">

    <img id="avatarPreview"
         src="<?= !empty($user['profil']) 
            ? base_url('uploads/profiles/' . $user['profil']) 
            : base_url('assets/img/profil2.png'); ?>"
         style="
            width:300px;
            height:300px;
            object-fit:cover;
            border-radius:20px;
            box-shadow:0 10px 40px rgba(0,0,0,0.5);
         ">
</div>


  <div class="bg-dark">
    <header class="d-flex justify-content-between align-items-center px-3 py-2" style="background-color:#1B673B;">
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
        <li><a href="<?= base_url('adminuser/upload') ?>"><ion-icon name="arrow-back-outline" class="me-2"></ion-icon><span>Kembali</span></a></li>
        <!-- <li><a href="#"><ion-icon name="document-text-outline" class="me-2"></ion-icon><span>Data Penerima</span></a></li>
        <li><a href="#"><ion-icon name="people-outline" class="me-2"></ion-icon><span>Dokumentasi</span></a></li> -->
      </div>
      <li class="logout"><a href="<?= base_url() ?>"><ion-icon name="log-out-outline" class="me-2"></ion-icon><span>Sign Out</span></a></li>
    </ul>
  </div>

  <div class="main">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <div class="d-flex align-items-center gap-3">
        <div class="toggle" id="toggle"><ion-icon name="menu-outline"></ion-icon></div>
        <h2 class="fw-semibold m-0">Detail Dokumen</h2>
      </div>
    </div>

    <div class="card-custom p-4 mb-4 d-flex align-items-center">
    <div onclick="openAvatar()"
     class="bg-success text-white rounded-circle d-flex align-items-center justify-content-center me-3"
     style="width:50px; height:50px; overflow:hidden; cursor:pointer;">

    <img 
        src="<?= !empty($user['profil']) 
            ? base_url('uploads/profiles/' . $user['profil']) 
            : base_url('assets/img/profil2.png'); ?>"
        style="width:100%; height:100%; object-fit:cover;">
</div>


        <div>
            <h4 class="h5 fw-bold mb-1"><?= $user['nama'] ?></h4>
            <p class="text-muted small mb-0">NIK: <?= $user['nik'] ?? '-' ?> &bull; ID: #<?= $user['id_user'] ?></p>
        </div>
    </div>

    <h5 class="fw-bold mb-3 text-dark">Berkas Upload</h5>
    <div class="row g-4">
        <?php 
        $dokumenList = [
            'ktp' => 'KTP (Kartu Tanda Penduduk)',
            'kk' => 'Kartu Keluarga',
            'sktm' => 'Surat Keterangan Tidak Mampu',
            'bukti_penghasilan' => 'Bukti Penghasilan',
            'foto_rumah_depan' => 'Foto Rumah Depan',
        ];
        

        foreach ($dokumenList as $dbField => $label) : 
            $fileName = $files[$dbField] ?? null;
            $filePath = 'uploads/user_docs/' . $fileName; 
        ?>
            <div class="col-md-4 col-sm-6">
                <div class="card-custom h-100">
                    <div class="card-header bg-white fw-bold text-center py-3 border-bottom">
                        <?= $label ?>
                    </div>
                    
                    <div class="card-body p-0 text-center bg-light d-flex align-items-center justify-content-center" style="height: 200px;">
                        <?php if ($fileName && file_exists(FCPATH . $filePath)) : ?>
                            <div class="group-hover">
                                <img src="<?= base_url($filePath) ?>" class="doc-img">
                                <a href="<?= base_url($filePath) ?>" target="_blank" class="btn btn-sm btn-light position-absolute top-50 start-50 translate-middle shadow-sm fw-bold">Lihat Full</a>
                            </div>
                        <?php else : ?>
                            <div class="text-muted small">
                                <ion-icon name="close-circle-outline" style="font-size: 2rem; opacity: 0.3;"></ion-icon>
                                <p class="m-0">Belum upload</p>
                            </div>
                        <?php endif; ?>
                    </div>

                    <?php if ($fileName) : ?>
                    <div class="card-footer bg-white border-top-0 text-center p-3">
                         <a href="<?= base_url($filePath) ?>" download class="btn btn-success btn-sm w-100 rounded-pill">Download</a>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; ?>
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

    function openAvatar(){
        document.getElementById('avatarModal').style.display = "flex";
    }
    function closeAvatar(){
        document.getElementById('avatarModal').style.display = "none";
    }


  </script>
</body>
</html>