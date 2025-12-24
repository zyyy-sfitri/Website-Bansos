<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Ubah Data Penerima</title>
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

    /* --- 4. SIDEBAR --- */
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
        overflow-y: auto;
        position: relative;
        background: #f9f9f9;
    }

    .page-title-bar {
        width: 100%; 
        height: 60px;
        background: linear-gradient(135deg, #166534 0%, #15803d 100%); 
        display: flex;
        align-items: center;
        padding: 0 40px;
        color: white;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        position: sticky;
        top: 0;
        z-index: 10;
        justify-content: space-between;
    }

    .page-title-bar h3 { 
        font-size: 18px; 
        font-weight: 600; 
        margin: 0;
    }

    .btn-close {
        text-decoration: none;
        color: white;
        font-weight: bold;
        font-size: 14px;
        background: rgba(255,255,255,0.2);
        padding: 5px 15px;
        border-radius: 20px;
    }
    .btn-close:hover {
        background: rgba(255,255,255,0.4);
    }

    .content-body {
        padding: 40px;
        max-width: 900px;
        margin: 0 auto;
    }

    .card {
        background: white;
        padding: 40px;
        border-radius: 12px;
        border: 1px solid #e5e7eb;
        box-shadow: 0 2px 10px rgba(0,0,0,0.03);
    }

    .form-header {
        display: flex;
        align-items: center;
        gap: 20px;
        margin-bottom: 30px;
        padding-bottom: 20px;
        border-bottom: 1px solid #eee;
    }

    .preview-box {
        width: 80px;
        height: 80px;
        background: #f0f0f0;
        border-radius: 50%;
        overflow: hidden;
        display: flex;
        align-items: center;
        justify-content: center;
        border: 2px solid #ddd;
    }
    .preview-box img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;
        margin-bottom: 8px;
        font-size: 14px;
        font-weight: 600;
        color: #555;
    }

    .form-control {
        width: 100%;
        padding: 12px 15px;
        border-radius: 8px;
        border: 1px solid #ccc;
        font-family: 'Poppins', sans-serif;
        font-size: 14px;
        transition: border 0.3s;
    }
    .form-control:focus {
        border-color: #166534;
        outline: none;
        box-shadow: 0 0 0 3px rgba(22, 101, 52, 0.1);
    }

    .upload-btn-wrapper {
        position: relative;
        overflow: hidden;
        display: inline-block;
        margin-top: 10px;
    }

    .btn-upload {
        border: 1px solid #ccc;
        color: #333;
        background-color: white;
        padding: 8px 20px;
        border-radius: 8px;
        font-size: 13px;
        font-weight: 500;
        cursor: pointer;
    }
    .btn-upload:hover {
        background: #f9f9f9;
    }
    
    .btn-submit {
        background: #166534;
        color: white;
        padding: 12px 30px;
        border: none;
        border-radius: 50px;
        font-size: 15px;
        font-weight: 600;
        cursor: pointer;
        width: 100%;
        margin-top: 20px;
        transition: background 0.3s;
    }
    .btn-submit:hover {
        background: #14532d;
    }

    /* Responsive */
    @media (max-width: 900px) {
        .page-wrapper { flex-direction: column; height: auto; overflow: visible; }
        .sidebar { width: 100%; border-right: none; border-bottom: 1px solid #ccc; }
        .main-content-area { overflow: visible; }
        .page-title-bar { position: relative; }
        .content-body { padding: 20px; }
    }
</style>
</head>
<body>

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
         <a href="<?= base_url('/user/profil') ?>" class="btn-close">✕ Batal</a>
    </div>
</div>

<div class="page-wrapper">

    <div class="sidebar">
           <div class="profile-sidebar">
            <img id="previewsidebarFoto"
            src="<?= !empty($user['profil']) 
                ? base_url('uploads/profiles/' . $user['profil']) 
                : base_url('assets/img/profil2.png'); ?>">                         <div>
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

    <div class="main-content-area">

        <div class="content-body">
            
            <form id="form-ganti" class="card" method="post" action="<?= site_url('user/update') ?>" enctype="multipart/form-data">
                <?= csrf_field() ?>
                
                <div class="form-header">
                    <div class="preview-box" id="previewWrapper">
                        <?php if (!empty($user['profil'])): ?>
                            <img id="previewFoto" src="<?= base_url('uploads/profiles/' . $user['profil']) ?>">
                        <?php else: ?>
                            <img id="previewFoto" src="https://cdn-icons-png.flaticon.com/512/149/149071.png" style="opacity:0.3">
                        <?php endif ?>
                    </div>
                    <div>
                        <h2 style="font-size: 18px; font-weight: 700;">Foto Profil</h2>
                        <p style="font-size: 13px; color: #888; margin-bottom: 5px;">Format JPG/PNG, Maks. 2MB</p>
                        
                        <div class="upload-btn-wrapper">
                            <input id="fotoInput" type="file" name="foto" accept="image/*" style="display:none">
                            
                            <button type="button" class="btn-upload" onclick="document.getElementById('fotoInput').click()">
                                Pilih Foto Baru
                            </button>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input type="text" name="nama" class="form-control" value="<?= esc($user['nama'] ?? '') ?>" required>
                </div>

                <div class="form-group">
                    <label>NIK</label>
                    <input type="text" name="nik" class="form-control" value="<?= esc($user['nik'] ?? '') ?>">
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" value="<?= esc($user['email'] ?? '') ?>">
                </div>

                <div class="form-group">
                    <label>No. Telepon</label>
                    <input type="text" name="no_hp" class="form-control" value="<?= esc($user['no_hp'] ?? '') ?>">
                </div>

                <div class="form-group">
                    <label>Alamat Lengkap</label>
                    <textarea name="alamat" class="form-control" rows="3"><?= esc($user['alamat'] ?? '') ?></textarea>
                </div>

                <button type="submit" class="btn-submit">Simpan Perubahan</button>
            
            </form>

        </div>
    </div>
</div>

<script>
    document.getElementById('fotoInput').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (!file) return;

        const reader = new FileReader();
        reader.onload = function(evt) {
            const img = document.getElementById('previewFoto');
            img.src = evt.target.result;
        };
        reader.readAsDataURL(file);
    });


let formChanged = false;

document.querySelectorAll('#form-ganti input, #form-ganti textarea').forEach(el => {
    el.addEventListener('change', () => {
        formChanged = true;
    });
});

document.getElementById('fotoInput').addEventListener('change', () => {
    formChanged = true;
});

window.addEventListener('beforeunload', function (e) {
    if (formChanged) {
        e.preventDefault();
        e.returnValue = '';
    }
});

// cegah pindah halaman lewat link
document.querySelectorAll('a').forEach(link => {
    link.addEventListener('click', function (e) {
        if (formChanged) {
            const yakin = confirm(
                'Perubahan belum disimpan.\nJika kamu keluar, data yang sudah diubah akan hilang.\n\nLanjutkan?'
            );
            if (!yakin) {
                e.preventDefault();
            }
        }
    });
});

// reset flag kalau form disubmit
document.getElementById('form-ganti').addEventListener('submit', () => {
    formChanged = false;
});
</script>

</script>

</body>
</html>