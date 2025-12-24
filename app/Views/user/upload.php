<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Upload Dokumen</title>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<style>
    
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

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
    color: white;
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
    padding: 0 50px;
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
    max-width: 1000px;
    margin: 0 auto;
}

.card {
    background: white;
    padding: 30px;
    border-radius: 12px;
    border: 1px solid #e5e7eb;
    margin-bottom: 25px;
    box-shadow: 0 2px 5px rgba(0,0,0,0.02);
    width: 100%;
}

.card h3 {
    font-size: 18px;
    font-weight: 700;
    margin-bottom: 20px;
    color: #1f2937;
}

.progress-section p:first-of-type {
    font-size: 15px;
    color: #6b7280;
    margin-bottom: 10px;
    font-weight: 500;
}

.progress-bar {
    width: 100%;
    height: 20px;
    background: #e5e7eb;
    border-radius: 20px;
    overflow: hidden;
    margin: 10px 0;
}

.progress-fill {
    height: 100%;
    background: linear-gradient(90deg, #3b82f6 0%, #10b981 100%);
    border-radius: 20px;
    transition: width 0.5s ease;
}

.progress-section > p:last-of-type {
    font-size: 13px;
    color: #9ca3af;
    margin-top: 10px;
}

.upload-row {
    display: flex;
    justify-content: space-between;
    align-items: center;
    font-size: 15px;
    font-weight: 500;
}

.upload-btn {
    background-color: #1b6b3c;
    color: white;
    padding: 10px 25px;
    border-radius: 50px;
    cursor: pointer;
    text-align: center;
    min-width: 120px;
    display: inline-block;
    transition: all 0.3s;
    font-size: 14px;
}

.upload-btn:hover {
    background-color: #155d32;
    transform: translateY(-1px);
}

.upload-btn.file-selected {
    background-color: #166534 !important; 
    border: 2px solid #166534 !important;
    font-weight: 600;
}
input[type="file"] {
    display: none;
}

.send-btn {
    padding: 12px 40px;
    border: none;
    background: #166534;
    color: white;
    border-radius: 50px;
    cursor: pointer;
    float: right;
    font-size: 15px;
    font-weight: 600;
    margin-top: 10px;
    transition: background 0.3s;
    box-shadow: 0 4px 10px rgba(22, 101, 52, 0.2);
}

.send-btn:hover {
    background-color: #124d27;
}

.required-star {
    color: red;
    font-weight: bold;
    margin-left: 5px;
}

.success-message {
    text-align: center;
    padding: 40px 20px;
}

.success-icon {
    font-size: 60px;
    color: #166534;
    margin-bottom: 20px;
    display: block;
}

.btn-status-check {
    background: #166534;
    color: white;
    padding: 12px 30px;
    border-radius: 50px;
    text-decoration: none;
    font-weight: 600;
    display: inline-block;
    margin-top: 20px;
    transition: 0.3s;
}

.btn-status-check:hover {
    background: #124d27;
    box-shadow: 0 4px 12px rgba(22, 101, 52, 0.3);
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
</style>
</head>

<body>
<div class="hamburger" onclick="toggleMenu()">
    <span></span>
    <span></span>
    <span></span>
</div>
<div style="display: flex; align-items: center; gap: 12px; background: #166534">
    <div style="width: 42px; height: 42px; background: #166534; border-radius: 10px; display: flex; align-items: center; justify-content: center; color: white; font-weight: 800; font-size: 24px; box-shadow: 0 2px 4px rgba(0,0,0,0.2); padding: 30px;">
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
        <h3>Upload Dokumen</h3>
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
                        <div class="value"><p><?= $user['nama'] ?? 'User' ?></p></div>
                    </a>
                </div>
                <div class="value" style="font-size: 15px;"><p><?= $user['nik'] ?? '-' ?></p></div>
            </div>

        <div class="menu">
            <a href="<?= base_url('/adminstatus/status/' . $user['id_user']) ?>" class="inactive">Status</a>
            <a href="<?= base_url('/user/upload') ?>" class="active">Dashboard</a>
            <a href="<?= base_url('/user/profil') ?>" class="inactive">Profile Saya</a>
        </div>

        <div class="logout">
            <a href="<?= base_url('home') ?>">Log Out</a>
        </div>
    </div>

    <div class="main-content-area">
        <div class="content-body">
            
            <div class="card">
                <h3>Progres Permohonan</h3>
                <div class="progress-section">
                    <?php if (!empty($sudah_upload)) : ?>
                        <p>Status: <strong style="color: #166534;">Dokumen Terkirim</strong></p>
                        <div class="progress-bar"><div class="progress-fill" style="width: 100%;"></div></div>
                        <p>Dokumen Anda telah kami terima dan sedang diverifikasi.</p>
                    <?php else : ?>
                        <p id="progressText">0 dari 5 dokumen diunggah</p>
<div class="progress-bar">
    <div class="progress-fill" id="progressFill" style="width:0%"></div>
</div>
<p id="progressInfo">Lengkapi dokumen di bawah ini untuk melanjutkan.</p>

                    <?php endif; ?>
                </div>
            </div>

            <?php if (!empty($sudah_upload)) : ?>
                
                <div class="card success-message">
                    <div class="success-icon">✓</div>
                    <h3 style="text-align: center; color: #166534;">Terima Kasih!</h3>
                    <p style="color: #555; font-size: 15px; line-height: 1.6;">
                        Anda telah berhasil mengunggah semua dokumen persyaratan.<br>
                        Saat ini data Anda sedang dalam proses peninjauan oleh tim kami.
                    </p>
                    <a href="<?= base_url('/adminstatus/status/' . $user['id_user']) ?>" class="btn-status-check">
                        CEK STATUS PENGAJUAN
                    </a>
                </div>

            <?php else : ?>

                <form id="uploadForm" method="post" enctype="multipart/form-data" action="<?= base_url('/user/uploadSubmit') ?>">

                    <div class="card">
                        <div class="upload-row">
                            <label>KTP (Kartu Tanda Penduduk) <span class="required-star">*</span></label>
                            <label for="ktp" class="upload-btn">UPLOAD</label>
                            <input type="file" id="ktp" name="ktp" class="wajib" data-name="KTP">
                        </div>
                    </div>

                    <div class="card">
                        <div class="upload-row">
                            <label>KK (Kartu Keluarga) <span class="required-star">*</span></label>
                            <label for="kk" class="upload-btn">UPLOAD</label>
                            <input type="file" id="kk" name="kk" class="wajib" data-name="Kartu Keluarga">
                        </div>
                    </div>

                    <div class="card">
                        <div class="upload-row">
                            <label>SKTM <span class="required-star">*</span></label>
                            <label for="sktm" class="upload-btn">UPLOAD</label>
                            <input type="file" id="sktm" name="sktm" class="wajib" data-name="SKTM">
                        </div>
                    </div>

                    <div class="card">
                        <div class="upload-row">
                            <label>Bukti Penghasilan <span class="required-star">*</span></label>
                            <label for="bukti_penghasilan" class="upload-btn">UPLOAD</label>
                            <input type="file" id="bukti_penghasilan" name="bukti_penghasilan" class="wajib" data-name="Bukti Penghasilan">
                        </div>
                    </div>

                    <div class="card">
                        <div class="upload-row">
                            <label>Foto Rumah Tampak Depan <span class="required-star">*</span></label>
                            <label for="foto_rumah_depan" class="upload-btn">UPLOAD</label>
                            <input type="file" id="foto_rumah_depan" name="foto_rumah_depan" class="wajib" data-name="Foto Rumah Depan">
                        </div>
                    </div>
                        
                    <button type="submit" class="send-btn">KIRIM DOKUMEN</button>
                </form>

            <?php endif; ?>
            </div>
    </div> 
</div>

<script>
    const inputs = document.querySelectorAll('input[type="file"]');
    inputs.forEach(input => {
        input.addEventListener('change', function() {
            const label = this.previousElementSibling; 
            
            if (this.files && this.files.length > 0) {
                // Ambil nama file
                let fileName = this.files[0].name;
                
                if(fileName.length > 15) {
                    fileName = fileName.substring(0, 15) + '...';
                }

                label.innerHTML = "✓ " + fileName; 
                label.classList.add('file-selected');

                label.style.backgroundColor = ""; 
                label.style.border = "";
                label.style.color = ""; 
            }
        });
    });

    const form = document.getElementById('uploadForm');

    if (form) {
        form.addEventListener('submit', function(e) {
            let isValid = true;
            let pesanError = [];
            const wajibInputs = document.querySelectorAll('.wajib');

            wajibInputs.forEach(input => {
                const labelTombol = input.previousElementSibling;
                
                if (input.files.length === 0) {
                    isValid = false;
                    const docName = input.getAttribute('data-name');
                    pesanError.push(docName);

                    labelTombol.style.backgroundColor = "#ffe6e6";
                    labelTombol.style.border = "2px solid red";
                    labelTombol.style.color = "red";
                    labelTombol.innerText = "WAJIB DIISI!";
                    
                    labelTombol.classList.remove('file-selected');
                }
            });

            if (!isValid) {
                e.preventDefault(); 
                alert("Mohon lengkapi dokumen berikut :\n- " + pesanError.join("\n- "));
            }
        });
    }
 
    const wajibInputs = document.querySelectorAll('.wajib');
    const progressFill = document.getElementById('progressFill');
    const progressText = document.getElementById('progressText');
    const progressInfo = document.getElementById('progressInfo');

    const totalDokumen = wajibInputs.length;

    function updateProgressBar() {
        let uploaded = 0;

        wajibInputs.forEach(input => {
            if (input.files.length > 0) {
                uploaded++;
            }
        });

        const persen = Math.round((uploaded / totalDokumen) * 100);

        progressFill.style.width = persen + '%';

        progressText.innerText = `${uploaded} dari ${totalDokumen} dokumen diunggah`;

        if (uploaded === totalDokumen) {
            progressInfo.innerText = "Semua dokumen siap dikirim.";
        } else {
            progressInfo.innerText = `${totalDokumen - uploaded} dokumen lagi untuk melanjutkan.`;
        }
    }

    wajibInputs.forEach(input => {
        input.addEventListener('change', updateProgressBar);
    });

function toggleMenu() {
    document.querySelector('.sidebar').classList.toggle('menu-open');
}

</script>

</body>
</html>