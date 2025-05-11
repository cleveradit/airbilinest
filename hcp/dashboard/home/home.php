<?php include include $_SERVER['DOCUMENT_ROOT'] . '/hcp/template/header.php'; ?>

<?php
// Koneksi ke database
include '../../includes/db.php';

// Ambil data jumlah pasien berdasarkan jenis kelamin
$query = "SELECT jenis_kelamin, COUNT(*) as total FROM patients GROUP BY jenis_kelamin";
$result = $conn->query($query);

$labels = [];
$values = [];

while ($row = $result->fetch_assoc()) {
    $labels[] = $row['jenis_kelamin'];
    $values[] = $row['total'];
}
// echo "<pre>";
// print_r($values);
// print_r($labels);
// echo "</pre>";
// die();

// Ambil data kunjungan 14 hari terakhir
$query2 = "
  SELECT DATE(tanggal_ambil_data) as tanggal, COUNT(*) as jumlah 
  FROM medical_records 
  WHERE tanggal_ambil_data >= DATE_SUB(CURDATE(), INTERVAL 14 DAY)
  GROUP BY DATE(tanggal_ambil_data)
  ORDER BY tanggal ASC
";

$result2 = mysqli_query($conn, $query2);

$tanggal = [];
$jumlah = [];

while ($row = mysqli_fetch_assoc($result2)) {
    $tanggal[] = $row['tanggal'];
    $jumlah[] = $row['jumlah'];
}

// echo "<pre>";
// print_r($tanggal);
// echo "</pre>";
// die();


?>


<div class="container-scroller">
    <!-- Sidebar -->
    <?php include include $_SERVER['DOCUMENT_ROOT'] . '/hcp/template/navbar.php'; ?>

    <div class="container-fluid page-body-wrapper">
        <!-- Navbar -->
        <?php include include $_SERVER['DOCUMENT_ROOT'] . '/hcp/template/sidebar.php'; ?>

        <!-- Main Content Start -->
        <!-- partial -->
         <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> Dashboard </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <!--<li class="breadcrumb-item"><a href="#">Charts</a></li>-->
                  <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                </ol>
              </nav>
            </div>
            <div class="row">
              <div class="col-lg-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Jumlah Kunjungan</h4>
                    <canvas id="lineChart" style="height:250px"></canvas>
                  </div>
                </div>
              </div><div class="col-lg-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Jenis Kelamin</h4>
                    <div class="doughnutjs-wrapper d-flex justify-content-center">
                      <canvas id="doughnutChart"></canvas>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:../../partials/_footer.html -->
          <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2023 <a href="https://www.bootstrapdash.com/" target="_blank">BootstrapDash</a>. All rights reserved.</span>
              <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="mdi mdi-heart text-danger"></i></span>
            </div>
          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!--script doughnut chart-->
    <script>
  const chartData = {
    labels: <?php echo json_encode($labels); ?>,
    values: <?php echo json_encode($values); ?>
  };
</script>

    <!--script line chart-->
    <script>
  const chartLineData = {
    lineLabels: <?php echo json_encode($tanggal); ?>,
    lineData: <?php echo json_encode($jumlah); ?>
  };
</script>

    <script src="chart.js"></script>

    <?php include include $_SERVER['DOCUMENT_ROOT'] . '/hcp/template/footer.php'; ?>