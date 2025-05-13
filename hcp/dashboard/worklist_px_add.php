<?php include include $_SERVER['DOCUMENT_ROOT'] . '/hcp/template/header.php'; ?>
<?php


$institution = $_SESSION['institution'];
$user_id = $_SESSION['user_id'];
$where = '';
if($_SESSION['role']=='Admin Institusi'){
    $where = "WHERE (role != 'Super Admin' OR role IS NULL) AND institution = '$institution'";
}
if($_SESSION['role']=='Dokter'){
    $where = "WHERE id = '$user_id'";
}

// echo "<pre>";
// print_r($_SESSION['user_id']);
// echo "</pre>";
// die();

$sql = "SELECT * FROM users $where";
$user_result = $conn->query($sql);
$users = [];

if ($user_result->num_rows > 0) {
    while ($row = $user_result->fetch_assoc()) {
        $users[] = $row;
    }
}

?>
<div class="container-scroller">
    <!-- Sidebar -->
    <?php include include $_SERVER['DOCUMENT_ROOT'] . '/hcp/template/navbar.php'; ?>

    <div class="container-fluid page-body-wrapper">
        <!-- Navbar -->
        <?php include include $_SERVER['DOCUMENT_ROOT'] . '/hcp/template/sidebar.php'; ?>

        <!-- Main Content Start -->
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="page-header">
                    <h3 class="page-title"> Pasien </h3>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="patient.php">Pasien</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Tambah Pasien</li>
                        </ol>
                    </nav>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-2">
                            <div class="wrapper d-flex align-items-center">
                                <h4 class="card-title">Tambah Pasien</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <form id="Formdata" method="POST" action="">
                                    <div class="row">

                                        <!-- Dokter -->
                                        <div class="form-group d-none">
                                            <label for="user_id">Dokter</label>
                                            <input type="hidden" name="user_id" class="form-control" id="user_id" value="<?php echo $_SESSION['user_id'] ?>" required>
                                        </div>

                                        <p class="text-light bg-dark ps-1 text-center">IDENTITAS, WAKTU, DAN TEMPAT STUDI</h3>

                                        <!-- Nama Pasien -->
                                        <div class="form-group col-lg-3 col-md-4 col-sm-6 col-12">
                                            <label for="nama_pasien">Nama Pasien</label>
                                            <input type="text" name="nama_pasien" class="form-control" id="nama_pasien" required>
                                        </div>

                                        <!-- Alamat -->
                                        <div class="form-group col-lg-3 col-md-4 col-sm-6 col-12">
                                            <label for="alamat">Alamat</label>
                                            <input type="text" name="alamat" class="form-control" id="alamat" required>
                                        </div>

                                        <!-- Tempat Rawat -->
                                        <div class="form-group col-lg-3 col-md-4 col-sm-6 col-12">
                                            <label for="tempat_rawat">Tempat Rawat</label>
                                            <input type="text" name="tempat_rawat" class="form-control" id="tempat_rawat" required>
                                        </div>

                                        <!-- Tanggal fototerapi -->
                                        <div class="form-group col-lg-3 col-md-4 col-sm-6 col-12">
                                            <label for="tanggal_ambil_data">Tanggal Fototerapi</label>
                                            <input type="date" name="tanggal_ambil_data" class="form-control" id="tanggal_ambil_data" required>
                                        </div>

                                        <!-- Waktu -->
                                        <div class="form-group col-lg-3 col-md-4 col-sm-6 col-12">
                                            <label for="waktu_ambil_data">Waktu Fototerapi</label>
                                            <input type="time" name="waktu_ambil_data" class="form-control" id="waktu_ambil_data" required>
                                        </div>

                                        <!-- Jenis Kelamin -->
                                        <div class="form-group col-lg-3 col-md-4 col-sm-6 col-12">
                                            <label for="jenis_kelamin">Jenis Kelamin</label>
                                            <select class="form-control" name="jenis_kelamin" id="jenis_kelamin">
                                                <option value="Perempuan">Perempuan</option>
                                                <option value="Laki-laki">Laki-laki</option>
                                            </select>
                                        </div>

                                        <!-- Tanggal Lahir -->
                                        <div class="form-group col-lg-3 col-md-4 col-sm-6 col-12">
                                            <label for="tanggal_lahir">Tanggal Lahir</label>
                                            <input type="date" name="tanggal_lahir" class="form-control" id="tanggal_lahir" required>
                                        </div>

                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <button class="btn btn-md btn-gradient-success" type="submit">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
            <!-- partial:../../partials/_footer.html -->
            <footer class="footer">
                <div class="d-sm-flex justify-content-center justify-content-sm-between">
                    <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2025 <a href="#">GP</a>. All rights reserved.</span>
                    <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted &amp; made with <i class="mdi mdi-heart text-danger"></i></span>
                </div>
            </footer>
            <!-- partial -->
        </div>
        <!-- main-panel ends -->
    </div>

    <?php include include $_SERVER['DOCUMENT_ROOT'] . '/hcp/template/footer.php'; ?>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $user_id = $_POST['user_id'];
        $nama_pasien = $_POST['nama_pasien'];
        $alamat = $_POST['alamat'];
        $tempat_rawat = $_POST['tempat_rawat'];
        $tanggal_ambil_data = $_POST['tanggal_ambil_data'];
        $waktu_ambil_data = $_POST['waktu_ambil_data'];
        $jenis_kelamin = $_POST['jenis_kelamin'];
        $tanggal_lahir = $_POST['tanggal_lahir'];

        $sql_worklist = "INSERT INTO worklist (
            user_id,
            nama_pasien,
            alamat,
            tempat_rawat,
            tanggal_ambil_data,
            waktu_ambil_data,
            jenis_kelamin,
            tanggal_lahir
        ) VALUES (
            '$user_id',
            '$nama_pasien',
            '$alamat',
            '$tempat_rawat',
            '$tanggal_ambil_data',
            '$waktu_ambil_data',
            '$jenis_kelamin',
            '$tanggal_lahir'
        )";

        if ($conn->query($sql_worklist) === TRUE) {
            echo "<script>
                showSuccessToast('Add success!');
                setTimeout(function() {
                    window.location.href = '" . base_url() . "hcp/dashboard/worklist_px.php';
                }, 2600);
            </script>";
        } else {
            echo "<script>
                        showDangerToast('Add failed! " . $conn->error . "');
                    </script>;";
        }
        $conn->close();
    }
    ?>