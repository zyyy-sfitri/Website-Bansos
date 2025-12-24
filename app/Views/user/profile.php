<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Penerima Bantuan</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Poppins', sans-serif;
            background: #f0f0f0; 
            color: #333;
            height: 100vh;
            overflow: hidden; 
            display: flex;
            flex-direction: column;
        }

        .top-header {
            width: 100%;
            height: 70px;
            background: white;
            display: flex;
            align-items: center;
            padding: 0 30px;
            border-bottom: 4px solid #166534;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            z-index: 100;
            flex-shrink: 0;
        }

        .top-header img {
            height: 45px;
            object-fit: contain;
        }

        .page-wrapper {
            display: flex;
            height: calc(100vh - 70px);
            width: 100%;
        }

        .sidebar {
            width: 250px;
            background: white;
            height: 100%;
            border-right: 1px solid #ccc;
            display: flex;
            flex-direction: column;
            flex-shrink: 0;
            padding-top: 20px;
        }

        .profile-sidebar {
            text-align: center;
            margin-top: 20px;
        }
        .profile-sidebar img {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            object-fit: cover;
        }

        .menu {
            margin-top: 40px;
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 100%;
        }

        .menu a {
            width: 80%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 20px;
            text-decoration: none;
            font-family: 'Poppins', sans-serif;
            font-weight: 500;
            font-size: 14px;
            display: block;
            cursor: pointer;
            transition: background 0.3s;
        }

        .menu a.inactive {
            background: #dfe3e1ff;
            color: black;
        }
        .menu a.inactive:hover {
            background: #144d2b;
            color: white
        }

        .menu a.active {
            background: #144d2b;
            color: white;
            box-shadow: 0 2px 5px rgba(0,0,0,0.2);
        }


        .logout {
            margin-top: auto; 
            margin-bottom: 40px;
            text-align: center;
            width: 100%;
        }
        .logout a {
            width: 80%;
            padding: 10px;
            border-radius: 20px;
            background: #ddd;
            color: black;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            font-weight: 500;
        }

        .main-content-area {
            flex: 1;
            background: #f9f9f9;
            overflow-y: auto; 
            position: relative;
        }

        .page-title-bar {
            width: 100%; 
            height: 60px;
            background: linear-gradient(135deg, #166534 0%, #15803d 100%); 
            display: flex;
            align-items: center;
            padding: 0 40px;
            color: white;
            position: sticky;
            top: 0;
            z-index: 10;
        }

        .page-title-bar h3 { 
            font-size: 18px; 
            font-weight: 600; 
            margin: 0;
        }

        .content-body {
            padding: 40px;
            max-width: 1100px; 
            margin: 0 auto;
        }

        .content-section {
            display: flex;
            gap: 40px;
            margin-bottom: 50px;
            align-items: flex-start;
        }

        .profile-photo {
            flex: 0 0 350px;
        }

        .photo-placeholder {
            width: 100%;
            height: 516px;
            background-color: white;
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
        }
        
        .photo-placeholder img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .data-pribadi {
            flex: 1;
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 12px; 
            padding: 30px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.02);
        }

        .data-pribadi-header {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 30px;
            padding-bottom: 15px;
            border-bottom: 1px solid #eee;
        }

        .icon-user {
            font-size: 24px;
            color: #555;
        }

        .data-pribadi h2 {
            font-size: 18px;
            font-weight: 700;
            margin: 0;
        }

        .subtitle {
            color: #888;
            font-size: 12px;
            margin-top: 2px;
        }

        .data-field {
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 1px solid #f9f9f9;
        }
        .data-field:last-child {
            border-bottom: none;
            margin-bottom: 0;
        }

        .data-field h3 {
            font-size: 13px;
            color: #888;
            margin-bottom: 4px;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .data-field .value p {
            font-size: 15px;
            color: #333;
            margin: 0;
            font-weight: 600;
        }

        /* Buttons & Status */
        .buttons-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-top: 10px;
            padding-bottom: 50px;
        }

        .buttons-right {
            display: flex;
            gap: 15px;
        }

        .btn {
            padding: 12px 28px;
            border-radius: 50px;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            transition: all 0.3s ease;
            font-family: 'Poppins', sans-serif;
            border: none;
        }

        .btn-white {
            background-color: white;
            border: 1px solid #ccc;
            color: #333;
        }
        .btn-white:hover {
            background-color: #f0f0f0;
        }

        .btn-green {
            background-color: #2E8B57;
            color: white;
            box-shadow: 0 4px 10px rgba(46, 139, 87, 0.2);
        }
        .btn-green:hover {
            background-color: #246b43;
            transform: translateY(-2px);
        }

      .document-status {
    margin-top: 20px;
    margin-bottom: 30px;
    background: white;
    padding: 20px;
    border-radius: 12px;
    border: 1px solid #e5e7eb;
    box-shadow: 0 2px 5px rgba(0,0,0,0.02);
}

.document-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 15px 0;
    border-bottom: 1px solid #eee;
}

.document-item:last-child {
    border-bottom: none;
}

.document-name {
    font-size: 14px;
    font-weight: 500;
}

.status {
    font-size: 12px;
    padding: 5px 12px;
    border-radius: 15px;
    font-weight: 600;
}

.verified {
    background-color: #d1fae5;
    color: #065f46;
}

.waiting {
    background-color: #fef3c7;
    color: #92400e;
}


      @media (max-width: 768px) {

    .sidebar {
        position: fixed;
        top: 70px;
        left: 0;
        width: 80%;
        max-width: 320px;
        height: calc(100vh - 70px);
        background: white;
        z-index: 998;
        transform: translateX(-110%);
        transition: transform 0.35s ease;
        overflow-y: auto;
        box-shadow: 6px 0 20px rgba(0,0,0,0.15);
    }

    .sidebar.menu-open {
        transform: translateX(0);
    }

    .hamburger {
        position: fixed;
        top: 15px;
        left: 580px;
        width: 34px;
        height: 26px;
        cursor: pointer;
        z-index: 1001;
    }

    .hamburger span {
        display: block;
        height: 4px;
        background: white;
        border-radius: 4px;
        margin: 5px 0;
        transition: 0.3s;
    }
    .sidebar.menu-open ~ .hamburger span:nth-child(1) {
        transform: rotate(45deg) translate(6px, 6px);
    }
    .sidebar.menu-open ~ .hamburger span:nth-child(2) {
        opacity: 0;
    }
    .sidebar.menu-open ~ .hamburger span:nth-child(3) {
        transform: rotate(-45deg) translate(6px, -6px);
    }
}

@media (max-width: 1200px) {

    .content-body {
        padding: 25px;
    }

    .content-section {
        flex-direction: column;
        align-items: center;
    }

    .profile-photo {
        width: 100%;
        max-width: 420px;
    }

    .photo-placeholder {
        height: 420px;
    }

    .data-pribadi {
        width: 100%;
    }

    h2[style*="margin-left"] {
        margin-left: 0 !important;
        text-align: center !important;
    }

    p[style*="margin-left"] {
        margin-left: 0 !important;
        text-align: center !important;
    }

    div[style*="margin-left: 200px"] {
        margin-left: 0 !important;
        width: 100% !important;
    }
}

@media (max-width: 768px) {

    .main-content-area {
        padding: 0;
    }

    .content-body {
        padding: 20px;
    }

    .buttons-container {
        flex-direction: column;
        gap: 15px;
    }

    .buttons-right {
        width: 100%;
        justify-content: space-between;
    }

    .btn {
        width: 100%;
        text-align: center;
    }

    .profile-photo {
        max-width: 320px;
    }

    .photo-placeholder {
        height: 320px;
    }

    .document-status {
        margin-top: 30px;
    }
}

@media (max-width: 480px) {

    .page-title-bar h3 {
        font-size: 14px;
    }

    .content-body {
        padding: 15px;
    }

    .photo-placeholder {
        height: 260px;
    }

    .data-pribadi {
        padding: 20px;
    }

    .document-item {
        flex-direction: column;
        align-items: flex-start;
        gap: 6px;
    }

    .buttons-right {
        flex-direction: column;
        gap: 10px;
    }
}

    </style>
</head>
<body>

<div class="hamburger" onclick="toggleMenu()">
    <span></span>
    <span></span>
    <span></span>
</div>

<div style="display: flex; align-items: center; gap: 12px; background: #166534">
    
    <div style="width: 42px; height: 42px; background: #166534;  border-radius: 10px; display: flex; align-items: center; justify-content: center; 
    color: white; font-weight: 800; font-size: 24px; box-shadow: 0 2px 4px rgba(0,0,0,0.2); padding: 30px;">
        B
    </div>

    <div style="font-family: 'Poppins', sans-serif; display: flex; flex-direction: column; justify-content: center;">
        <h1 style="font-size: 22px; font-weight: 800; color: #ffffffff; margin: 0; line-height: 1;">
            BANSOS<span style="color: #f59e0b;">KU</span>
        </h1>
        <p style="font-size: 11px; font-weight: 600; color: #888; margin: 2px 0 0 0; letter-spacing: 1px; text-transform: uppercase;">
            Layanan Terpadu
        </p>
        
    </div>
    <div class="page-title-bar">
        <h3>Profile Penerima Bantuan</h3>
    </div>
</div>

    <div class="page-wrapper">
        
        
        <div class="sidebar">
             <div class="profile-sidebar">
        <img id="previewFoto"
            src="<?= !empty($user['profil']) 
                ? base_url('uploads/profiles/' . $user['profil']) 
                : base_url('assets/img/profil2.png'); ?>">        
                 <div>
                    <a href="#" style="text-decoration: none; color: #333; font-weight: 600; font-size: 14px;">
                        <div class="value"><p><?= $user['nama'] ?? '-' ?></p></div>
                    </a>
                </div>
                <div class="value" style="font-size: 15px;"><p><?= $user['nik'] ?? '-' ?></p></div>
            </div>

            <div class="menu">
                 <a href="<?= base_url('/adminstatus/status/' . $user['id_user']) ?>" class="inactive">Status</a>
                <a href="<?= base_url('/user/upload') ?>" class="inactive">Dashboard</a>
                <a href="<?= base_url('/user/profil') ?>" class="active">Profile Saya</a>
            </div>

            <div class="logout">
            <a href="<?= base_url('home') ?>">Log Out</a>
            </div>
        </div>

        <div class="main-content-area"><br><br>
            <div style="font-family: Poppins, sans-serif; width: 100%; max-width: 1000px;">

    <!-- Judul -->
    <h2 style="
        margin-left: 480px;
        font-size: 32px;
        font-weight: 700;
        color: #000;
        text-align: center;
    ">
        Profile Penerima Bantuan
    </h2>

   <p style="
    display: block;
    width: 100%;
    text-align: center;
    font-size: 16px;
    color: #555;
    margin: 6px 0 22px 0;
    margin-left: 240px;
">
    Data dan status permohonan bantuan sosial Anda
</p><br>

    <!-- Card Status -->
    <div style="
        width: 102%;
        hight: 100px;
        margin-left: 200px;
        padding: 22px 26px;
        border-radius: 14px;
        background: #ffffff;
        box-shadow: 6px 6px 12px rgba(0,0,0,0.15);
        border: 1px solid #e7e7e7;
        display: flex;
        justify-content: space-between;
        align-items: center;
    ">
        <div style="display: flex; flex-direction: column;">
            <span style="font-size: 20px; font-weight: 700; color: #000;">
                Status Permohonan
            </span>
           <span style="font-size: 15px; color: #333; margin-top: 4px;">
    Tanggal Submit:
    <strong>
        <?= $user['tanggal']
            ? date('d F Y', strtotime($user['tanggal']))
            : '-' ?>
    </strong>
</span>

        </div>

        <?= badgeStatus($user['status']); ?>

      <?php
function badgeStatus($status)
{
    if ($status == 'pending') {
        return '<span style="
            padding: 10px 22px;
            border-radius: 20px;
            background: #fff3e6;
            color: #ff7a29;
            font-size: 15px;
            font-weight: 700;
            border: 1px solid #ffd7bf;
        ">Pending</span>';
    }

    if ($status == 'disetujui') {
        return '<span style="
            padding: 10px 22px;
            border-radius: 20px;
            background: #e6ffe6;
            color: #1f9b45;
            font-size: 15px;
            font-weight: 700;
            border: 1px solid #b7ffc1;
        ">Disetujui</span>';
    }

    if ($status == 'ditolak') {
        return '<span style="
            padding: 10px 22px;
            border-radius: 20px;
            background: #ffe6e6;
            color: #e63946;
            font-size: 15px;
            font-weight: 700;
            border: 1px solid #ffb3b3;
        ">Ditolak</span>';
    }

    return '<span style="
        padding: 10px 22px;
        border-radius: 20px;
        background: #e6f0ff;
        color: #3366ff;
        font-size: 15px;
        font-weight: 700;
        border: 1px solid #b3ccff;
    ">Proses</span>';
}
?>

    </div>

</div>


            <div class="content-body">
                
                <div class="content-section">
                    
                    <div class="profile-photo">
                        <div class="photo-placeholder">
                            <?php if (!empty($user['profil'])): ?>
                                <img src="<?= base_url('uploads/profiles/' . $user['profil']) ?>" alt="Profil">
                            <?php else: ?>
                                <div style="font-size:64px; opacity:0.3;">👤</div>
                            <?php endif ?>
                        </div>
                    </div>

                    <div class="data-pribadi">
                        <div class="data-pribadi-header">
                            <div class="icon-user">👤</div>
                            <div>
                                <h2>Data Pribadi</h2>
                                <div class="subtitle">Informasi Personal yang telah di submit</div>
                            </div>
                        </div>

                        <div class="data-field">
                            <h3>Nama Lengkap</h3>
                            <div class="value"><p><?= $user['nama'] ?? '-' ?></p></div>
                        </div>

                        <div class="data-field">
                            <h3>NIK</h3>
                            <div class="value"><p><?= $user['nik'] ?? '-' ?></p></div>
                        </div>

                        <div class="data-field">
                            <h3>Email</h3>
                            <div class="value"><p><?= $user['email'] ?? '-' ?></p></div>
                        </div>

                        <div class="data-field">
                            <h3>No. Telp</h3>
                            <div class="value"><p><?= $user['no_hp'] ?? '-' ?></p></div>
                        </div>

                        <div class="data-field">
                            <h3>Alamat</h3>
                            <div class="value"><p><?= $user['alamat'] ?? '-' ?></p></div>
                        </div>
                    </div>
                </div>

                <div class="document-status">
                    <h2 style="font-size:18px; font-weight:700; margin-bottom:5px;">Persyaratan Dokumen</h2>
                    <p style="color:#666; font-size:14px; margin-bottom:20px;">Dokumen yang Dibutuhkan</p>

                    <div class="document-item">
                        <span class="document-name">KTP (Kartu Tanda Penduduk)</span>
                        <span class="status waiting">Wajib</span>
                    </div>
                    <div class="document-item">
                        <span class="document-name">KK (Kartu Keluarga)</span>
                        <span class="status waiting">Wajib</span>
                    </div>
                    <div class="document-item">
                        <span class="document-name">SKTM (Surat Keterangan Tidak Mampu)</span>
                        <span class="status waiting">Wajib</span>
                    </div>
                    <div class="document-item">
                        <span class="document-name">Bukti Penghasilan</span>
                        <span class="status waiting">Wajib</span>
                    </div>
                    <div class="document-item">
                        <span class="document-name">Foto Rumah Tampak Depan</span>
                        <span class="status waiting">Wajib</span>
                    </div>
                </div>

                <div class="buttons-container">
                    <a href="<?= site_url('user/upload') ?>" class="btn btn-white">
                        Cek Dokumen
                    </a>

                    <div class="buttons-right">
                        <a href="<?= site_url('user/ganti') ?>" class="btn btn-white">
                            Edit Profile
                        </a>
                        
                        <a href="<?= base_url('/adminstatus/status/' . $user['id_user']) ?>" class="btn btn-green"> Lihat Status Bantuan</a>

                    </div>
                </div>

            </div> 
        </div> 
    </div> 

<script>
    function toggleMenu() {
    document.querySelector('.sidebar').classList.toggle('menu-open');
}
</script>

</body>
</html>