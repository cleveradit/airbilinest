<?php include include $_SERVER['DOCUMENT_ROOT'] . '/hcp/template/header.php'; ?>

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
                                <form method="POST" action="">
                                    <div class="row">
                                        <!-- Nama Pasien -->
                                        <div class="form-group col-lg-3 col-md-4 col-sm-6 col-12">
                                            <label for="nama_pasien">Nama Pasien</label>
                                            <input type="text" name="nama_pasien" class="form-control" id="nama_pasien" required>
                                        </div>

                                        <!-- Jenis Kelamin -->
                                        <div class="form-group col-lg-3 col-md-4 col-sm-6 col-12">
                                            <label for="jenis_kelamin">Jenis Kelamin</label>
                                            <select class="form-control" name="jenis_kelamin" id="jenis_kelamin">
                                                <option value="Perempuan">Perempuan</option>
                                                <option value="Laki-laki">Laki-laki</option>
                                            </select>
                                        </div>

                                        <!-- Berat Lahir -->
                                        <div class="form-group col-lg-3 col-md-4 col-sm-6 col-12">
                                            <label for="berat_lahir">Berat Lahir</label>
                                            <input type="text" name="berat_lahir" class="form-control" id="berat_lahir" required>
                                        </div>

                                        <!-- Tanggal Lahir -->
                                        <div class="form-group col-lg-3 col-md-4 col-sm-6 col-12">
                                            <label for="tanggal_lahir">Tanggal Lahir</label>
                                            <input type="date" name="tanggal_lahir" class="form-control" id="tanggal_lahir" required>
                                        </div>

                                        <!-- Umur Kehamilan -->
                                        <div class="form-group col-lg-3 col-md-4 col-sm-6 col-12">
                                            <label for="umur_kehamilan">Umur Kehamilan</label>
                                            <input type="number" name="umur_kehamilan" class="form-control" id="umur_kehamilan" required>
                                        </div>

                                        <!-- Skor Apgar -->
                                        <div class="form-group col-lg-3 col-md-4 col-sm-6 col-12">
                                            <label for="skor_apgar">Skor Apgar</label>
                                            <input type="text" name="skor_apgar" class="form-control" id="skor_apgar" required>
                                        </div>

                                        <!-- Tempat Rawat -->
                                        <div class="form-group col-lg-3 col-md-4 col-sm-6 col-12">
                                            <label for="tempat_rawat">Tempat Rawat</label>
                                            <input type="text" name="tempat_rawat" class="form-control" id="tempat_rawat" required>
                                        </div>

                                        <!-- Cara Lahir -->
                                        <div class="form-group col-lg-3 col-md-4 col-sm-6 col-12">
                                            <label for="cara_lahir">Cara Lahir</label>
                                            <input type="text" name="cara_lahir" class="form-control" id="cara_lahir" required>
                                        </div>

                                        <!-- Golongan Darah -->
                                        <div class="form-group col-lg-3 col-md-4 col-sm-6 col-12">
                                            <label for="golongan_darah">Golongan Darah</label>
                                            <select class="form-control" name="golongan_darah" id="golongan_darah">
                                                <option value="A">A</option>
                                                <option value="B">B</option>
                                                <option value="AB">AB</option>
                                                <option value="O">O</option>
                                            </select>
                                        </div>

                                        <!-- Rhesus -->
                                        <div class="form-group col-lg-3 col-md-4 col-sm-6 col-12">
                                            <label for="rhesus">Rhesus</label>
                                            <select class="form-control" name="rhesus" id="rhesus">
                                                <option value="+">+</option>
                                                <option value="-">-</option>
                                            </select>
                                        </div>

                                        <!-- Etnis Ayah -->
                                        <div class="form-group col-lg-3 col-md-4 col-sm-6 col-12">
                                            <label for="etnis_ayah">Etnis Ayah</label>
                                            <input type="text" name="etnis_ayah" class="form-control" id="etnis_ayah" required>
                                        </div>

                                        <!-- Etnis Ibu -->
                                        <div class="form-group col-lg-3 col-md-4 col-sm-6 col-12">
                                            <label for="etnis_ibu">Etnis Ibu</label>
                                            <input type="text" name="etnis_ibu" class="form-control" id="etnis_ibu" required>
                                        </div>

                                        <!-- Rhesus Ibu -->
                                        <div class="form-group col-lg-3 col-md-4 col-sm-6 col-12">
                                            <label for="rhesus_ibu">Rhesus Ibu</label>
                                            <select class="form-control" name="rhesus_ibu" id="rhesus_ibu">
                                                <option value="+">+</option>
                                                <option value="-">-</option>
                                            </select>
                                        </div>

                                        <!-- Golongan Darah Ibu -->
                                        <div class="form-group col-lg-3 col-md-4 col-sm-6 col-12">
                                            <label for="golongan_darah_ibu">Golongan Darah Ibu</label>
                                            <select class="form-control" name="golongan_darah_ibu" id="golongan_darah_ibu">
                                                <option value="A">A</option>
                                                <option value="B">B</option>
                                                <option value="AB">AB</option>
                                                <option value="O">O</option>
                                            </select>
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

    $nama_pasien = $_POST['nama_pasien'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $berat_lahir = $_POST['berat_lahir'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $umur_kehamilan = $_POST['umur_kehamilan'];
    $skor_apgar = $_POST['skor_apgar'];
    $cara_lahir = $_POST['cara_lahir'];
    $golongan_darah = $_POST['golongan_darah'];
    $rhesus = $_POST['rhesus'];
    $etnis_ayah = $_POST['etnis_ayah'];
    $etnis_ibu = $_POST['etnis_ibu'];
    $rhesus_ibu = $_POST['rhesus_ibu'];
    $golongan_darah_ibu = $_POST['golongan_darah_ibu'];
    $tempat_rawat = $_POST['tempat_rawat'];

    $sql = "INSERT INTO patients (
        nama_pasien, jenis_kelamin, berat_lahir, tanggal_lahir, umur_kehamilan,
        skor_apgar, cara_lahir, golongan_darah, rhesus,
        etnis_ayah, etnis_ibu, rhesus_ibu, golongan_darah_ibu
    ) VALUES (
        '$nama_pasien', '$jenis_kelamin', '$berat_lahir', '$tanggal_lahir', '$umur_kehamilan',
        '$skor_apgar', '$cara_lahir', '$golongan_darah', '$rhesus',
        '$etnis_ayah', '$etnis_ibu', '$rhesus_ibu', '$golongan_darah_ibu')";
    
if ($conn->query($sql) === TRUE) {
    echo "<script>
                        showSuccessToast('Add success!');
                        setTimeout(function() {
                            window.location.href = '".base_url()."hcp/dashboard/patient/patient.php';
                        }, 2600); // 2.6 detik = 2600 ms
                    </script>;";
} else {
    echo "<script>
                        showDangerToast('Add failed! " . $conn->error . "');
                    </script>;";
}
    $conn->close();
}
    ?>