<?php
// admin_dashboard.php

session_start();
if (!isset($_SESSION['admin_id'])) {
    die("Anda tidak memiliki akses!");
}

// Koneksi ke database
include '../includes/db.php'; // Hubungkan ke database

try {
    $conn = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Koneksi gagal: " . $e->getMessage());
}


// Ambil daftar user yang mengajukan verifikasi
$sql = "SELECT id, username, email, profession, institution FROM users WHERE verification_request = 1";
$stmt = $conn->query($sql);
$requests = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="verifikasi.css?v=<?= filemtime('verifikasi.css') ?>">
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
            <li><a href="../member/member.php"><i class="fas fa-users"></i> Kelola User</a></li>
            <li><a href="verifikasi.php"><i class="fas fa-users"></i> Verifikasi User</a></li>
            <li><a href="../email/email.php"><i class="fas fa-envelope"></i> Kirim Email (Member)</a></li>
            <li><a href="../email_info/email.php"><i class="fas fa-envelope"></i> Kirim Email (Umum)</a></li>
            <li><a href="../monitor/monitor.php"><i class="fas fa-chart-bar"></i> Monitoring</a></li>
        </ul>
    </div>
    <script src="verifikasi.js"></script>
    <div class="container">
        <h1>Daftar Permintaan Verifikasi</h1>
        <table>
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Profession</th>
                    <th>Institution</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($requests as $request): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($request['username']); ?></td>
                        <td><?php echo htmlspecialchars($request['email']); ?></td>
                        <td><?php echo htmlspecialchars($request['profession']); ?></td>
                        <td><?php echo htmlspecialchars($request['institution']); ?></td>
                        <td>
                            <button class="toggle-access1" onclick="approveRequest(<?php echo $request['id']; ?>)">Setujui</button>
                            <button class="toggle-access2" onclick="rejectRequest(<?php echo $request['id']; ?>)">Tolak</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    

    <script>
        function approveRequest(userId) {
            if (confirm("Apakah Anda yakin ingin menyetujui permintaan ini?")) {
                window.location.href = 'handle_verification.php?action=approve&id=' + userId;
            }
        }

        function rejectRequest(userId) {
            if (confirm("Apakah Anda yakin ingin menolak permintaan ini?")) {
                window.location.href = 'handle_verification.php?action=reject&id=' + userId;
            }
        }
    </script>
</body>
</html>