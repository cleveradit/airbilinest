<?php
session_start();
require 'includes/auth.php';
require 'includes/db.php';
requireLogin();

// Ambil total jumlah member
$stmt = $pdo->query('SELECT COUNT(*) as total_members FROM users');
$totalMembers = $stmt->fetch(PDO::FETCH_ASSOC)['total_members'];

// Hitung total permintaan verifikasi
$sql_count = "SELECT COUNT(*) AS total_requests FROM users WHERE verification_request = 1";
$stmt_count = $pdo->query($sql_count);
$total_requests = $stmt_count->fetch(PDO::FETCH_ASSOC)['total_requests'];

// Total Visitor bulan ini:
// Path ke folder Awstats
$folderPathSSL = '../../tmp/awstats/ssl';
$folderPathNonSSL = '../../tmp/awstats';

// Ambil semua file Awstats untuk domain tertentu
$domain = 'airbilinest.com'; // Ganti dengan domain Anda
$filesSSL = glob($folderPathSSL . "/awstats*.$domain.txt");
$filesNonSSL = glob($folderPathNonSSL . "/awstats*.$domain.txt");

// Ambil bulan dan tahun saat ini
$currentMonth = date('m'); // Bulan saat ini (MM)
$currentYear = date('Y'); // Tahun saat ini (YYYY)

$totalVisitorsThisMonthSSL = 0; // Total pengunjung bulan ini (SSL)
$totalVisitorsThisMonthNonSSL = 0; // Total pengunjung bulan ini (Non-SSL)

// Proses file SSL
foreach ($filesSSL as $file) {
    // Ekstrak bulan dan tahun dari nama file
    preg_match('/awstats(\d{2})(\d{4})\./', basename($file), $matches);
    $month = $matches[1]; // Bulan (MM)
    $year = $matches[2]; // Tahun (YYYY)

    // Jika bulan dan tahun sesuai dengan bulan ini
    if ($month == $currentMonth && $year == $currentYear) {
        $fileContent = file_get_contents($file);

        // Ekstrak total pengunjung bulanan
        preg_match('/TotalVisits\s+(\d+)/', $fileContent, $monthlyMatches);
        if (isset($monthlyMatches[1])) {
            $totalVisitorsThisMonthSSL += (int)$monthlyMatches[1];
        }
    }
}

// Proses file Non-SSL
foreach ($filesNonSSL as $file) {
    // Ekstrak bulan dan tahun dari nama file
    preg_match('/awstats(\d{2})(\d{4})\./', basename($file), $matches);
    $month = $matches[1]; // Bulan (MM)
    $year = $matches[2]; // Tahun (YYYY)

    // Jika bulan dan tahun sesuai dengan bulan ini
    if ($month == $currentMonth && $year == $currentYear) {
        $fileContent = file_get_contents($file);

        // Ekstrak total pengunjung bulanan
        preg_match('/TotalVisits\s+(\d+)/', $fileContent, $monthlyMatches);
        if (isset($monthlyMatches[1])) {
            $totalVisitorsThisMonthNonSSL += (int)$monthlyMatches[1];
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="admin.css?v=<?= filemtime('admin.css') ?>">
    <script src="https://kit.fontawesome.com/4374ec9f4f.js" crossorigin="anonymous"></script>
</head>
<body>
    <nav class="navbar">
        <button class="menu-toggle" onclick="toggleSidebar()">☰</button>
        <a href="#" class="navbar-brand">Admin Panel</a>
        <div class="logout">
            <a href="logout.php" style="color: white;">Logout</a>
        </div>
    </nav>

    <div class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <h3>Menu Admin</h3>
        </div>
        <ul class="sidebar-menu">
            <li><a href="admin-dashboard.php"><i class="fas fa-home"></i> Dashboard</a></li>
            <li><a href="member/member.php"><i class="fas fa-users"></i> Kelola User</a></li>
            <li><a href="verifikasi/verifikasi.php"><i class="fas fa-users"></i> Verifikasi User</a></li>
            <li><a href="email/email.php"><i class="fas fa-envelope"></i> Kirim Email (Member)</a></li>
            <li><a href="email_info/email.php"><i class="fas fa-envelope"></i> Kirim Email (Umum)</a></li>
            <li><a href="monitor/monitor.php"><i class="fas fa-chart-bar"></i> Monitoring</a></li>
        </ul>
    </div>
    <script src="admin.js"></script>


    

    <div class="main-content" id="mainContent">
        <div class="dashboard-cards">
            <div class="card">
                <div class="card-header"><strong>Akun HCP</strong></div>
                <div class="card-content"><?= $totalMembers ?></div>
                <br>
                <a href="member/member.php" class="card-button">Lihat List Akun HCP</a>
            </div>
            <div class="card">
                <div class="card-header"><strong>Total Pengunjung Website Bulan Ini</strong></div>
                <div class="card-content">airbilinest.com (ssl): <?= $totalVisitorsThisMonthSSL ?></div>
                <div class="card-content">airbilinest.com (non-ssl): <?= $totalVisitorsThisMonthNonSSL ?></div>
            </div>
            <div class="card">
                <div class="card-header"><strong>Permintaan Verifikasi Akun</strong></div>
                <div class="card-content"><?= $total_requests ?></div>
                <br>
                <a href="verifikasi/verifikasi.php" class="card-button">Lihat List Permintaan Verifikasi</a>
            </div>
        </div>
    </div>

</body>
</html>