<?php
// Path ke folder Awstats
$folderPath = '../../../tmp/awstats/ssl';

// Ambil semua file Awstats untuk domain tertentu
$domain = 'airbilinest.com'; // Ganti dengan domain Anda
$files = glob($folderPath . "/awstats*.$domain.txt");

$dailyData = []; // Data harian
$monthlyData = []; // Data bulanan

foreach ($files as $file) {
    // Ekstrak bulan dan tahun dari nama file
    preg_match('/awstats(\d{2})(\d{4})\./', basename($file), $matches);
    $month = $matches[1]; // Bulan (MM)
    $year = $matches[2]; // Tahun (YYYY)

    $fileContent = file_get_contents($file);

    // Ekstrak data harian
    preg_match_all('/\d{4}-\d{2}-\d{2}\s+(\d+)/', $fileContent, $dailyMatches);
    foreach ($dailyMatches[0] as $index => $date) {
        $dailyData[$date] = ($dailyData[$date] ?? 0) + $dailyMatches[1][$index];
    }

    // Ekstrak data bulanan
    $monthlyKey = "$year-$month"; // Format: YYYY-MM
    preg_match('/TotalVisits\s+(\d+)/', $fileContent, $monthlyMatches);
    if (isset($monthlyMatches[1])) {
        $monthlyData[$monthlyKey] = ($monthlyData[$monthlyKey] ?? 0) + $monthlyMatches[1];
    }
}

// Urutkan data berdasarkan tanggal/bulan
ksort($dailyData);
ksort($monthlyData);

// Format data untuk Chart.js
$dailyLabels = array_keys($dailyData);
$dailyVisits = array_values($dailyData);

$monthlyLabels = array_keys($monthlyData);
$monthlyVisits = array_values($monthlyData);


//non SSL
// Path ke folder Awstats
$folderPath_2 = '../../../tmp/awstats';

// Ambil semua file Awstats untuk domain tertentu
$domain = 'airbilinest.com'; // Ganti dengan domain Anda
$files_2 = glob($folderPath_2 . "/awstats*.$domain.txt");

$dailyData_2 = []; // Data harian
$monthlyData_2 = []; // Data bulanan

foreach ($files_2 as $file_2) {
    // Ekstrak bulan dan tahun dari nama file
    preg_match('/awstats(\d{2})(\d{4})\./', basename($file_2), $matches_2);
    $month_2 = $matches_2[1]; // Bulan (MM)
    $year_2 = $matches_2[2]; // Tahun (YYYY)

    $fileContent_2 = file_get_contents($file_2);

    // Ekstrak data harian
    preg_match_all('/\d{4}-\d{2}-\d{2}\s+(\d+)/', $fileContent_2, $dailyMatches_2);
    foreach ($dailyMatches_2[0] as $index_2 => $date_2) {
        $dailyData_2[$date_2] = ($dailyData_2[$date_2] ?? 0) + $dailyMatches_2[1][$index_2];
    }

    // Ekstrak data bulanan
    $monthlyKey_2 = "$year_2-$month_2"; // Format: YYYY-MM
    preg_match('/TotalVisits\s+(\d+)/', $fileContent_2, $monthlyMatches_2);
    if (isset($monthlyMatches_2[1])) {
        $monthlyData_2[$monthlyKey_2] = ($monthlyData_2[$monthlyKey_2] ?? 0) + $monthlyMatches_2[1];
    }
}

// Urutkan data berdasarkan tanggal/bulan
ksort($dailyData_2);
ksort($monthlyData_2);

// Format data untuk Chart.js
$dailyLabels_2 = array_keys($dailyData_2);
$dailyVisits_2 = array_values($dailyData_2);

$monthlyLabels_2 = array_keys($monthlyData_2);
$monthlyVisits_2 = array_values($monthlyData_2);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statistik Pengunjung</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="monitor.css?v=<?= filemtime('monitor.css') ?>"> 
    <script src="https://kit.fontawesome.com/4374ec9f4f.js" crossorigin="anonymous"></script>
</head>
<body>
    <nav class="navbar">
        <button class="menu-toggle" onclick="toggleSidebar()">☰</button>
        <a href="#" class="navbar-brand">Admin Panel - Monitoring</a>
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
            <li><a href="../verifikasi/verifikasi.php"><i class="fas fa-users"></i> Verifikasi User</a></li>
            <li><a href="../email/email.php"><i class="fas fa-envelope"></i> Kirim Email (member)</a></li>
            <li><a href="../email_info/email.php"><i class="fas fa-envelope"></i> Kirim Email (umum)</a></li>
            <li><a href="monitor.php"><i class="fas fa-chart-bar"></i> Monitoring</a></li>
        </ul>
    </div>
    <script src="monitor.js"></script>

    <h1 class="judul">Statistik Pengunjung</h1>
    <section class="ssl">
        <h2>Website: airbilinest.com (ssl)</h2>
        <!-- Grafik Pengunjung Harian -->
        <div style="width: 80%; margin: 20px auto;">
            <h2>Pengunjung Harian</h2>
            <canvas id="dailyChart"></canvas>
        </div>

        <!-- Grafik Pengunjung Bulanan -->
        <div style="width: 80%; margin: 20px auto;">
            <h2>Pengunjung Bulanan</h2>
            <canvas id="monthlyChart"></canvas>
        </div>

        <script>
            // Data untuk grafik harian
            const dailyLabels = <?= json_encode($dailyLabels) ?>;
            const dailyVisits = <?= json_encode($dailyVisits) ?>;

            // Data untuk grafik bulanan
            const monthlyLabels = <?= json_encode($monthlyLabels) ?>;
            const monthlyVisits = <?= json_encode($monthlyVisits) ?>;

            // Grafik Pengunjung Harian
            const dailyCtx = document.getElementById('dailyChart').getContext('2d');
            new Chart(dailyCtx, {
                type: 'line',
                data: {
                    labels: dailyLabels,
                    datasets: [{
                        label: 'Pengunjung Harian',
                        data: dailyVisits,
                        borderColor: 'rgba(75, 192, 192, 1)',
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        fill: true,
                        tension: 0.1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            // Grafik Pengunjung Bulanan
            const monthlyCtx = document.getElementById('monthlyChart').getContext('2d');
            new Chart(monthlyCtx, {
                type: 'bar',
                data: {
                    labels: monthlyLabels,
                    datasets: [{
                        label: 'Pengunjung Bulanan',
                        data: monthlyVisits,
                        backgroundColor: 'rgba(153, 102, 255, 0.2)',
                        borderColor: 'rgba(153, 102, 255, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        </script>
    </section>
    <section class="http">
        <h2>Website: airbilinest.com</h2>
        <!-- Grafik Pengunjung Harian -->
        <div style="width: 80%; margin: 20px auto;">
            <h2>Pengunjung Harian</h2>
            <canvas id="dailyChart_2"></canvas>
        </div>

        <!-- Grafik Pengunjung Bulanan -->
        <div style="width: 80%; margin: 20px auto;">
            <h2>Pengunjung Bulanan</h2>
            <canvas id="monthlyChart_2"></canvas>
        </div>

        <script>
            // Data untuk grafik harian
            const dailyLabels_2 = <?= json_encode($dailyLabels_2) ?>;
            const dailyVisits_2 = <?= json_encode($dailyVisits_2) ?>;

            // Data untuk grafik bulanan
            const monthlyLabels_2 = <?= json_encode($monthlyLabels_2) ?>;
            const monthlyVisits_2 = <?= json_encode($monthlyVisits_2) ?>;

            // Grafik Pengunjung Harian
            const dailyCtx_2 = document.getElementById('dailyChart_2').getContext('2d');
            new Chart(dailyCtx_2, {
                type: 'line',
                data: {
                    labels: dailyLabels_2,
                    datasets: [{
                        label: 'Pengunjung Harian',
                        data: dailyVisits_2,
                        borderColor: 'rgba(75, 192, 192, 1)',
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        fill: true,
                        tension: 0.1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            // Grafik Pengunjung Bulanan
            const monthlyCtx_2 = document.getElementById('monthlyChart_2').getContext('2d');
            new Chart(monthlyCtx_2, {
                type: 'bar',
                data: {
                    labels: monthlyLabels_2,
                    datasets: [{
                        label: 'Pengunjung Bulanan',
                        data: monthlyVisits_2,
                        backgroundColor: 'rgba(153, 102, 255, 0.2)',
                        borderColor: 'rgba(153, 102, 255, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        </script>


    </section>

    
</body>
</html>