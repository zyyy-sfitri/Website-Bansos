<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Notifikasi Admin</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<style>
body {
    margin: 0;
    font-family: 'Segoe UI', sans-serif;
    background: #f4f6f9;
    color: #111827;
}

.wrapper {
    padding: 24px 40px;
}

.page-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 24px;
}

.page-header h1 {
    font-size: 22px;
    font-weight: 700;
    margin: 0;
}

.badge {
    background: #16a34a;
    color: white;
    padding: 6px 14px;
    border-radius: 999px;
    font-size: 12px;
    font-weight: 600;
}

.grid {
    display: grid;
    grid-template-columns: 2.5fr 1fr;
    gap: 24px;
}

.card {
    background: white;
    border-radius: 14px;
    box-shadow: 0 8px 24px rgba(0,0,0,.08);
    overflow: hidden;
}

.card-header {
    padding: 14px 20px;
    font-weight: 600;
    background: #f9fafb;
    border-bottom: 1px solid #e5e7eb;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.notif-list {
    list-style: none;
    margin: 0;
    padding: 0;
}

.notif-item {
    display: flex;
    gap: 14px;
    padding: 16px 20px;
    border-bottom: 1px solid #e5e7eb;
    align-items: center;
}

.notif-item:last-child {
    border-bottom: none;
}

.notif-baru {
    background: #f0fdf4;
}

.dot {
    width: 10px;
    height: 10px;
    border-radius: 50%;
    background: #22c55e;
}

.notif-content {
    flex: 1;
}

.notif-content p {
    margin: 0;
    font-size: 14px;
    font-weight: 500;
}

.notif-date {
    font-size: 11px;
    color: #6b7280;
    margin-top: 4px;
    display: block;
}

.btn-delete {
    color: #dc2626;
    font-size: 12px;
    text-decoration: none;
    font-weight: 600;
}

.btn-delete:hover {
    text-decoration: underline;
}

.sidebar {
    display: flex;
    flex-direction: column;
    gap: 16px;
}

.stat {
    padding: 18px;
}

.stat h3 {
    margin: 0;
    font-size: 13px;
    color: #6b7280;
}

.stat p {
    margin: 6px 0 0;
    font-size: 22px;
    font-weight: 700;
}

.info {
    font-size: 13px;
    color: #374151;
    line-height: 1.5;
}

.empty {
    padding: 40px;
    text-align: center;
    color: #6b7280;
}

.btn-back {
    text-decoration: none;
    background: #e5e7eb;
    color: #111827;
    padding: 6px 14px;
    border-radius: 999px;
    font-size: 13px;
    font-weight: 600;
    transition: 0.2s;
}

.btn-back:hover {
    background: #d1d5db;
}

.btn-danger {
    background: #dc2626;
    color: white;
}

.btn-danger:hover {
    background: #b91c1c;
}
</style>
</head>

<body>



<div class="wrapper">

    <!-- HEADER -->
    <div class="page-header">
        <a href="<?= base_url('adminuser/pengajuan') ?>" class="btn-back"
           style="background:linear-gradient(90deg,#6f8cff,#1aa64b);color:white">
           ← Kembali
        </a>

        <h1>Notifikasi Admin</h1>

        <?php if (!empty($unread_count)): ?>
            <span class="badge"><?= $unread_count ?> Baru</span>
        <?php endif; ?>
    </div>


    <!-- GRID -->
    <div class="grid">

        <!-- LEFT -->
        <div class="card">
            <div class="card-header">
                <span>Daftar Notifikasi</span>

                <?php if (!empty($notifikasi)): ?>
                    <a href="<?= base_url('admin/notifikasi/hapusSemua') ?>"
                       onclick="return confirm('Hapus semua notifikasi?')"
                       class="btn-back btn-danger">
                        Hapus Semua
                    </a>
                <?php endif; ?>
            </div>

            <?php if (!empty($notifikasi)): ?>
                <ul class="notif-list">
                    <?php foreach ($notifikasi as $n): ?>
                        <li class="notif-item <?= $n['status']==='baru'?'notif-baru':'' ?>">
                            <span class="dot"></span>

                            <div class="notif-content">
                                <p><?= esc($n['pesan']) ?></p>
                                <span class="notif-date">
                                    <?= \CodeIgniter\I18n\Time::parse($n['created_at'], 'UTC')
                                        ->setTimezone('Asia/Jakarta')
                                        ->format('d M Y H:i') ?>
                                </span>
                            </div>

                            <!-- ✅ HAPUS SATU (URL BENAR) -->
                            <a href="<?= base_url('admin/notifikasi/hapus/'.$n['id']) ?>"
                               onclick="return confirm('Hapus notifikasi ini?')"
                               class="btn-delete">
                               Hapus
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php else: ?>
                <div class="empty">Tidak ada notifikasi</div>
            <?php endif; ?>
        </div>

        <!-- RIGHT -->
        <div class="sidebar">
            <div class="card stat">
                <h3>Notifikasi Baru</h3>
                <p><?= $unread_count ?? 0 ?></p>
            </div>

            <div class="card stat">
                <h3>Total Notifikasi</h3>
                <p><?= count($notifikasi ?? []) ?></p>
            </div>

            <div class="card stat info">
                <strong>Info</strong><br>
                Notifikasi muncul setiap ada pendaftaran bansos baru.
            </div>
        </div>

    </div>

</div>

</body>
</html>
