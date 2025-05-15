<?php 
// Start session dan validasi auth
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: /hcp/login.php");
    exit();
}

// Include header
include $_SERVER['DOCUMENT_ROOT'] . '/hcp/template/header.php';
// Koneksi database
include '../../includes/db.php';

// Data Jenis Kelamin (Menggunakan Prepared Statement)
$genderData = [];
$stmt = $conn->prepare("SELECT jenis_kelamin, COUNT(*) as total FROM worklist GROUP BY jenis_kelamin");
$stmt->execute();
$result = $stmt->get_result();

while ($row = $result->fetch_assoc()) {
    $genderData['labels'][] = htmlspecialchars($row['jenis_kelamin']);
    $genderData['values'][] = (int)$row['total'];
}

// Data Kunjungan 14 Hari (Menggunakan Prepared Statement)
$visitData = [];
$stmt = $conn->prepare("
    SELECT DATE(tanggal_ambil_data) as tanggal, COUNT(*) as jumlah 
    FROM worklist 
    WHERE tanggal_ambil_data >= DATE_SUB(CURDATE(), INTERVAL 14 DAY)
    GROUP BY DATE(tanggal_ambil_data)
    ORDER BY tanggal ASC
");
$stmt->execute();
$result = $stmt->get_result();

while ($row = $result->fetch_assoc()) {
    $visitData['labels'][] = htmlspecialchars($row['tanggal']);
    $visitData['values'][] = (int)$row['jumlah'];
}
?>

<div class="container-scroller">
    <!-- Sidebar -->
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/hcp/template/navbar.php'; ?>

    <div class="container-fluid page-body-wrapper">
        <!-- Navbar -->
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/hcp/template/sidebar.php'; ?>

        <!-- Main Content -->
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="page-header">
                    <h3 class="page-title">Dashboard</h3>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </nav>
                </div>
                
                <div class="row">
                    <!-- Kunjungan Pasien Chart -->
                    <div class="col-lg-6 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Jumlah Kunjungan (14 Hari Terakhir)</h4>
                                <canvas id="visitChart" height="100"></canvas>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Jenis Kelamin Chart -->
                    <div class="col-lg-6 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Distribusi Jenis Kelamin</h4>
                                <div class="doughnutjs-wrapper d-flex justify-content-center">
                                    <canvas id="genderChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <footer class="footer">
                <div class="d-sm-flex justify-content-center justify-content-sm-between">
                    <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">
                        Copyright © <?= date('Y') ?> Sistem Kesehatan. All rights reserved.
                    </span>
                    <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">
                        Hand-crafted & made with <i class="mdi mdi-heart text-danger"></i>
                    </span>
                </div>
            </footer>
        </div>
    </div>
</div>

<!-- Chart JS -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
// Data untuk chart
const chartData = {
    gender: {
        labels: <?= json_encode($genderData['labels'] ?? []) ?>,
        values: <?= json_encode($genderData['values'] ?? []) ?>
    },
    visits: {
        labels: <?= json_encode($visitData['labels'] ?? []) ?>,
        values: <?= json_encode($visitData['values'] ?? []) ?>
    }
};

// Inisialisasi Chart Jenis Kelamin
const genderCtx = document.getElementById('genderChart').getContext('2d');
new Chart(genderCtx, {
    type: 'doughnut',
    data: {
        labels: chartData.gender.labels,
        datasets: [{
            data: chartData.gender.values,
            backgroundColor: [
                'rgba(54, 162, 235, 0.7)',
                'rgba(255, 99, 132, 0.7)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false
    }
});

// Inisialisasi Chart Kunjungan
const visitCtx = document.getElementById('visitChart').getContext('2d');
new Chart(visitCtx, {
    type: 'line',
    data: {
        labels: chartData.visits.labels,
        datasets: [{
            label: 'Jumlah Kunjungan',
            data: chartData.visits.values,
            backgroundColor: 'rgba(75, 192, 192, 0.2)',
            borderColor: 'rgba(75, 192, 192, 1)',
            borderWidth: 2,
            tension: 0.4,
            fill: true
        }]
    },
    options: {
        responsive: true,
        scales: {
            y: {
                beginAtZero: true,
                ticks: {
                    stepSize: 1
                }
            }
        }
    }
});
</script>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/hcp/template/footer.php'; ?>