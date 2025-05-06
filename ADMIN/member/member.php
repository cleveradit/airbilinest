<?php
session_start();
require '../includes/db.php';
require '../includes/auth.php';

// Pastikan hanya admin yang bisa mengakses halaman ini
requireLogin();

// Ambil data user dari database
$stmt = $pdo->query('SELECT id, username, email, profession, institution, app_access FROM users');
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar User</title>
    <link rel="stylesheet" href="member.css?v=<?= filemtime('member.css') ?>">
    <script src="https://kit.fontawesome.com/4374ec9f4f.js" crossorigin="anonymous"></script>
</head>
<body>
    <nav class="navbar">
        <button class="menu-toggle" onclick="toggleSidebar()">☰</button>
        <a href="#" class="navbar-brand">Admin Panel - List Akun HCP</a>
        <div class="logout">
            <a href="logout.php" style="color: white;">Logout</a>
        </div>
    </nav>

    <div class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <h3>Menu Admin</h3>
        </div>
        <ul class="sidebar-menu">
            <li><a href="../admin-dashboard.php"><i class="fas fa-home"></i> Dashboard</a></li>
            <li><a href="member.php"><i class="fas fa-users"></i> Kelola User</a></li>
            <li><a href="../verifikasi/verifikasi.php"><i class="fas fa-users"></i> Verifikasi User</a></li>
            <li><a href="../email/email.php"><i class="fas fa-envelope"></i> Kirim Email (member)</a></li>
            <li><a href="../email_info/email.php"><i class="fas fa-envelope"></i> Kirim Email (umum)</a></li>
            <li><a href="../monitor/monitor.php"><i class="fas fa-chart-bar"></i> Monitoring</a></li>
        </ul>
    </div>

    <div class="container">
        <h1>Daftar User (Total: <?= count($users) ?>)</h1> <!-- Tampilkan total pengguna -->
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Profesi</th>
                    <th>Institusi</th>
                    <th>Akses APP</th>
                    <!-- <th>Aksi</th> Kolom baru untuk tombol on/off -->
                </tr>
            </thead>
            <tbody>
                <?php 
                $no = 1;
                foreach ($users as $user): ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= htmlspecialchars($user['username']) ?></td>
                        <td><?= htmlspecialchars($user['email']) ?></td>
                        <td><?= htmlspecialchars($user['profession']) ?></td>
                        <td><?= htmlspecialchars($user['institution']) ?></td>
                        <!-- <td>
                            <?= $user['app_access'] ? 'Aktif' : 'Nonaktif' ?>
                        </td> -->
                        <td>
                            <!-- Tombol on/off -->
                            <button class="toggle-access <?= $user['app_access'] ? 'active' : 'inactive' ?>" 
                                data-user-id="<?= $user['id'] ?>" 
                                data-access="<?= $user['app_access'] ?>">
                                <?= $user['app_access'] ? 'Akitf' : 'Nonaktif' ?>
                            </button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Panggil file JavaScript di sini -->
    <script src="member.js"></script>
</body>
</html>