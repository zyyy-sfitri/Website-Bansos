<?php
if (!isset($StatusUser) || empty($StatusUser)) {
    $StatusUser = ['status_proses' => 'pengajuan_masuk', 'id_user' => 1];
    $progressMap = [
    'pengajuan_masuk' => 20,
    'verifikasi'      => 40,
    'survei'          => 60,
    'validasi'        => 75,
    'persetujuan'     => 80,
    'pencairan'       => 90,
    'selesai'         => 100,
    'ditolak'         => 100
];

$progress = $progressMap[$status] ?? 20;

}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Status Bantuan</title>
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
        max-width: 1200px;
        margin: 0 auto;
    }

    .row {
        display: flex;
        gap: 25px;
        align-items: flex-start;
        flex-wrap: wrap;
    }
    
    .col-left { 
        flex: 1; 
        min-width: 300px; 
    }
    
    .col-right { 
        width: 350px; 
        flex-shrink: 0; 
    }

    .card {
        background: white;
        padding: 30px;
        border-radius: 12px;
        border: 1px solid #e5e7eb;
        margin-bottom: 25px;
        box-shadow: 0 2px 5px rgba(0,0,0,0.02);
    }
    .card h3 { 
        font-size: 18px; 
        font-weight: 700; 
        margin-bottom: 20px; 
        color: #1f2937; }

   /* Progress Bar */
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
    width: 75%;
    height: 100%;
    background: linear-gradient(90deg, #3b82f6 0%, #10b981 100%);
    border-radius: 20px;
}

.progress-section > p:last-of-type {
    font-size: 13px;
    color: #9ca3af;
    margin-top: 10px;
}

/* Timeline */
.timeline-item {
    display: flex;
    gap: 15px;
    margin: 25px 0;
    align-items: flex-start;
}

.timeline-item:last-child {
    margin-bottom: 0;
}

.circle {
    width: 24px;
    height: 24px;
    background: #d1d5db;
    border: 4px solid white;
    border-radius: 50%;
    flex-shrink: 0;
    margin-top: 2px;
    box-shadow: 0 0 0 2px #e5e7eb;
}

.circle.active {
    background: #10b981;
    box-shadow: 0 0 0 2px #10b981;
}

.circle.pending {
    background: #60a5fa;
    box-shadow: 0 0 0 2px #60a5fa;
}

.timeline-content strong {
    display: block;
    font-size: 15px;
    color: #1f2937;
    margin-bottom: 5px;
    font-weight: 700;
}

.timeline-content .status {
    display: inline-block;
    font-size: 12px;
    font-weight: 700;
    padding: 4px 12px;
    border-radius: 50px;
    margin-right: 5px;
    margin-top: 5px;
}

.status.selesai {
    background: #dcfce7;
    color: #15803d;
}

.status.proses {
    background: #dbeafe;
    color: #1e40af;
}

.status.ditolak {
    background: #fee2e2;
    color: #dc2626;
}

.timeline-content small {
    font-size: 13px;
    color: #9ca3af;
    display: block;
    margin-top: 5px;
}

/* Info Box */
.info-item {
    display: flex;
    justify-content: space-between;
    margin-bottom: 15px;
    padding-bottom: 15px;
    border-bottom: 1px solid #f3f4f6;
}

.info-item:last-child {
    border-bottom: none;
    margin-bottom: 0;
    padding-bottom: 0;
}

.info-label {
    font-size: 14px;
    color: #6b7280;
    font-weight: 500;
}

.info-value {
    font-size: 14px;
    font-weight: 700;
    color: #1f2937;
    text-align: right;
}

/* Button */
.btn-primary {
    width: 100%;
    padding: 12px;
    background: #166534;
    color: white;
    border: none;
    border-radius: 50px;
    cursor: pointer;
    font-size: 14px;
    font-weight: 600;
    transition: background 0.3s;
    display: block;
    text-align: center;
    text-decoration: none;
    margin-top: 10px;
}

.btn-primary:hover {
    background: #15803d;
}

.btn-disabled {
    background: #9ca3af;
    cursor: not-allowed;
}

.btn-disabled:hover {
    background: #9ca3af;
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
        <h3>Status Bantuan</h3>
    </div>
</div>

<div class="page-wrapper">

    <div class="sidebar">
        
    
        <div class="profile-sidebar">
        <img id="previewFoto"
            src="<?= !empty($StatusUser['profil']) 
                ? base_url('uploads/profiles/' . $StatusUser['profil']) 
                : base_url('assets/img/profil2.png'); ?>"> 
                <div>
                    <a href="#" style="text-decoration: none; color: #333; font-weight: 600; font-size: 14px;">
                        <div class="value"><p><?= $StatusUser['nama'] ?? '-' ?></p></div>
                    </a>
                </div>
                <div class="value" style="font-size: 15px;"><p><?= $StatusUser['nik'] ?? '-' ?></p></div>
            </div>

      
                <div class="menu">
                    <a href="<?= base_url('/adminstatus/status/' . ($StatusUser['id_user'] ?? 0)) ?>" class="active">Status</a>
                    <a href="<?= base_url('/user/upload') ?>" class="inactive">Dashboard</a>
                    <a href="<?= base_url('/user/profil') ?>" class="inactive">Profile Saya</a>
                </div>
     

        <div class="logout">
            <a href="<?= base_url('home') ?>">Log Out</a>
        </div>
    </div>

    <div class="main-content-area">

        <div class="content-body">
            <?php
            $status = $StatusUser['status_proses'] ?? 'pengajuan_masuk';
            ?>

                    <div class="card">
                <h3>Progres Permohonan</h3>
                <div class="progress-section">
                <p>Status:
                    <strong>
                        <?= ucwords(str_replace('_', ' ', $status)) ?>
                    </strong>
                </p>

                <div class="progress-bar">
                    <div class="progress-fill" id="progressFill" data-progress="<?= $progress ?>"></div>
                </div>

                <p><?= $progress ?>% proses pengajuan</p>
            </div>

</div>

            <div class="row">
                
                <div class="col-left">
                    <div class="card">
                        <h3>Riwayat Status</h3>
                        <?php if (isset($timeline) && is_array($timeline)): ?>
                            <?php foreach ($timeline as $item): ?>
                                <div class="timeline-item">
                                    <div class="circle <?= esc($item['circle']) ?>"></div>
                                    <div class="timeline-content">
                                        <strong><?= esc($item['label']) ?></strong>
                                        <span class="status <?= esc($item['badge']) ?>"><?= esc($item['statusText']) ?></span>
                                        <small><?= esc($item['date']) ?></small>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <?php

                            $steps = [
                                'pengajuan_masuk' => 'Pendaftaran',
                                'verifikasi'      => 'Verifikasi Dokumen',
                                'survei'          => 'Survei Lapangan',
                                'validasi'        => 'Validasi Data',
                                'persetujuan'     => 'Persetujuan',
                                'pencairan'       => 'Pencairan Bantuan'
                            ];
                            $current = $StatusUser['status_proses'] ?? 'pengajuan_masuk';
                            $stepKeys = array_keys($steps);
                            $currentIndex = array_search($current, $stepKeys);

                            if ($current === 'selesai') {
                                $currentIndex = count($stepKeys);
                            }
                            $found = false;
                            ?>
                            <?php foreach ($steps as $key => $label): ?>
                                <?php
                          
                                    $index = array_search($key, $stepKeys);

                                    if ($index < $currentIndex) {
                                        $circle = "active";
                                        $statusText = "SELESAI";
                                        $badge = "selesai";
                                        $showDate = true;
                                    } elseif ($index === $currentIndex) {
                                        $circle = "pending";
                                        $statusText = "PROSES";
                                        $badge = "proses";
                                        $showDate = false;
                                    } else {
                                        $circle = "";
                                        $statusText = "MENUNGGU";
                                        $badge = "proses";
                                        $showDate = false;
                                    }
                                    ?>

                        
                                <div class="timeline-item">
                                    <div class="circle <?= $circle ?>"></div>
                                    <div class="timeline-content">
                                        <strong><?= $label ?></strong>
                                        <span class="status <?= $badge ?>"><?= $statusText ?></span>
                                    <?php if ($showDate): ?>
                                        <small><?= date("d F Y") ?></small>
                                    <?php endif; ?>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="col-right">
                    <div class="card">
                        <h3>Info Bantuan</h3>
                        <div class="info-item">
                            <div class="info-label">Program</div>
                            <div class="info-value">Bantuan Sembako</div>
                        </div>
                        <div class="info-item">
                            <div class="info-label">Jumlah</div>
                            <div class="info-value">Sembako Lengkap</div>
                        </div>
                        <div class="info-item">
                            <div class="info-label">Periode</div>
                            <div class="info-value">3 Bulan</div>
                        </div>
                        <div class="info-item">
                            <div class="info-label">Lokasi</div>
                            <div class="info-value">Ktr. Cabang Kesugihan</div>
                        </div>
                        <div class="info-item">
                            <div class="info-label">Pencairan</div>
                        <div>
                            <?php if (in_array($StatusUser['status_proses'], ['selesai'])): ?>
                                <?= date("d F Y") ?>
                            <?php else: ?>
                                -
                            <?php endif; ?>
                        </div>
                        </div>
                    </div>

                    <div class="card">
                        <h3>Cetak Status</h3>
                        <?php if ($StatusUser['status_proses'] === 'selesai'): ?>
                            <a href="<?= base_url('/adminuser/unduh/' . $StatusUser['id_user']) ?>" class="btn-primary">
                                Unduh Surat Keterangan
                            </a>
                        <?php else: ?>
                            <div style="background: #fef3c7; border: 1px solid #f59e0b; color: #92400e; padding: 12px; border-radius: 8px; margin-bottom: 15px; font-size: 13px; line-height: 1.5;">
                                Surat keterangan hanya dapat diunduh setelah proses pencairan selesai.
                            </div>
                            <button class="btn-primary btn-disabled" disabled>
                                Unduh Surat Keterangan
                            </button>
                        <?php endif; ?>
                    </div>
                </div>

            </div> </div> </div> </div> 
        <script>
    const progressFill = document.getElementById('progressFill');

    if (progressFill) {
        const target = progressFill.getAttribute('data-progress');
        setTimeout(() => {
            progressFill.style.width = target + '%';
        }, 300);
    }
    
function toggleMenu() {
    document.querySelector('.sidebar').classList.toggle('menu-open');
}


</script>

        </body>
</html>