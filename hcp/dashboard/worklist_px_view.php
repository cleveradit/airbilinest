<?php include include $_SERVER['DOCUMENT_ROOT'] . '/hcp/template/header.php'; ?>
<?php

$sql = "SELECT * FROM users";
$user_result = $conn->query($sql);
$users = [];

if ($user_result->num_rows > 0) {
    while ($row = $user_result->fetch_assoc()) {
        $users[] = $row;
    }
}


$worklist_id = $_GET['id'];
$sql = "SELECT worklist.*, users.username
        FROM worklist 
        JOIN users ON users.id = worklist.user_id
        WHERE worklist.id = '$worklist_id'";
$result_worklist = $conn->query($sql);
$worklist = $result_worklist->fetch_assoc();

// echo "<pre>";
// print_r($worklist);
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
        
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="page-header">
                    <h3 class="page-title"> Pasien : <?php echo $worklist['nama_pasien'] ?> </h3>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="worklist_px.php">Worklist Pasien</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Data Pasien</li>
                        </ol>
                    </nav>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-2">
                            <div class="wrapper d-flex align-items-center">
                                <h4 class="card-title">Data Pasien</h4>
                            </div>
                            <!-- button print -->
                            <div class="wrapper ms-auto action-bar">
                                <button class="btn btn-sm btn-gradient-primary" onclick="window.location.href='rekam_medis/patient_pdf.php?id=<?= $worklist['id'] ?>'"><i class="fa fa-book me-1"></i> PDF</button>
                            </div>
                        </div>
                        <!-- konten -->
                         <div class="row">
                            <div class="col-12">
                                <form method="POST" action="">
                                    <input value="<?php echo $worklist['id'] ?>" type="hidden" name="id" class="form-control" id="id">
                                    <div class="row">
                                        <p class="text-light bg-dark ps-1 text-center">IDENTITAS, WAKTU, DAN TEMPAT STUDI</h3>

                                        <!-- Dokter -->
                                        <div class="form-group col-lg-3 col-md-4 col-sm-6 col-12">
                                            <label for="user_id"><b>Dokter :</b></label>
                                            <p class="form-control-plaintext" id="user_id" readonly>
                                                <?php echo htmlspecialchars($worklist['username']); ?>
                                            </p>
                                        </div>

                                        <!-- Tempat -->
                                        <div class="form-group col-lg-3 col-md-4 col-sm-6 col-12">
                                            <label for="tempat_rawat"><b>Tempat :</b></label>
                                            <p class="form-control-plaintext" id="tempat_rawat">
                                                <?php echo htmlspecialchars($worklist['tempat_rawat']); ?>
                                            </p>
                                        </div>

                                        <!-- Tanggal -->
                                        <div class="form-group col-lg-3 col-md-4 col-sm-6 col-12">
                                            <label for="tanggal_ambil_data"><b>Tanggal :</b></label>
                                            <p class="form-control-plaintext" id="tanggal_ambil_data">
                                                <?php echo htmlspecialchars($worklist['tanggal_ambil_data']); ?>
                                            </p>
                                        </div>
                                        <!-- Waktu -->
                                        <div class="form-group col-lg-3 col-md-4 col-sm-6 col-12">
                                            <label for="waktu_ambil_data"><b>Waktu :</b></label>
                                            <p class="form-control-plaintext" id="waktu_ambil_data">
                                                <?php echo htmlspecialchars($worklist['waktu_ambil_data']); ?>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <p class="text-light bg-dark ps-1 text-center">DATA BAYI</p>
                                        <!-- Nama Pasien -->
                                        <div class="form-group col-lg-3 col-md-4 col-sm-6 col-12">
                                            <label for="nama_pasien"><b>Nama Pasien :</b></label>
                                            <p class="form-control-plaintext" id="nama_pasien">
                                                <?php echo htmlspecialchars($worklist['nama_pasien']); ?>
                                            </p>
                                        </div>

                                        <!-- Jenis Kelamin -->
                                        <div class="form-group col-lg-3 col-md-4 col-sm-6 col-12">
                                            <label for="jenis_kelamin"><b>Jenis Kelamin :</b></label>
                                            <p class="form-control-plaintext" id="jenis_kelamin">
                                                <?php echo htmlspecialchars($worklist['jenis_kelamin']); ?>
                                            </p>
                                        </div>

                                        <!-- Berat Lahir -->
                                        <div class="form-group col-lg-3 col-md-4 col-sm-6 col-12">
                                            <label for="berat_lahir"><b>Berat Lahir :</b></label>
                                            <p class="form-control-plaintext" id="berat_lahir">
                                                <?php echo htmlspecialchars($worklist['berat_lahir']); ?>
                                            </p>
                                        </div>

                                        <!-- Tanggal Lahir -->
                                        <div class="form-group col-lg-3 col-md-4 col-sm-6 col-12">
                                            <label for="tanggal_lahir"><b>Tanggal Lahir :</b></label>
                                            <p class="form-control-plaintext" id="tanggal_lahir">
                                                <?php echo htmlspecialchars($worklist['tanggal_lahir']); ?>
                                            </p>
                                        </div>

                                        <!-- Alamat -->
                                        <div class="form-group col-lg-3 col-md-4 col-sm-6 col-12">
                                            <label for="alamat"><b>Alamat :</b></label>
                                            <p class="form-control-plaintext" id="alamat">
                                                <?php echo htmlspecialchars($worklist['alamat']); ?>
                                            </p>
                                        </div>

                                        <!-- Umur Kehamilan -->
                                        <div class="form-group col-lg-3 col-md-4 col-sm-6 col-12">
                                            <label for="umur_kehamilan"><b>Umur Kehamilan :</b></label>
                                            <p class="form-control-plaintext" id="umur_kehamilan">
                                                <?php echo htmlspecialchars($worklist['umur_kehamilan']); ?>
                                            </p>
                                        </div>

                                        <!-- Skor Apgar -->
                                        <div class="form-group col-lg-3 col-md-4 col-sm-6 col-12">
                                            <label for="skor_apgar"><b>Skor Apgar :</b></label>
                                            <p class="form-control-plaintext" id="skor_apgar">
                                                <?php echo htmlspecialchars($worklist['skor_apgar']); ?>
                                            </p>
                                        </div>

                                        <!-- Cara Lahir -->
                                        <div class="form-group col-lg-3 col-md-4 col-sm-6 col-12">
                                            <label for="cara_lahir"><b>Cara Lahir :</b></label>
                                            <p class="form-control-plaintext" id="cara_lahir">
                                                <?php echo htmlspecialchars($worklist['cara_lahir']); ?>
                                            </p>
                                        </div>

                                        <!-- Golongan Darah -->
                                        <div class="form-group col-lg-3 col-md-4 col-sm-6 col-12">
                                            <label for="golongan_darah"><b>Golongan Darah :</b></label>
                                            <p class="form-control-plaintext" id="golongan_darah">
                                                <?php echo htmlspecialchars($worklist['golongan_darah']); ?>
                                            </p>
                                        </div>

                                        <!-- Rhesus -->
                                        <div class="form-group col-lg-3 col-md-4 col-sm-6 col-12">
                                            <label for="rhesus"><b>Rhesus :</b></label>
                                            <p class="form-control-plaintext" id="rhesus">
                                                <?php echo htmlspecialchars($worklist['rhesus']); ?>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <p class="text-light bg-dark ps-1 text-center">DATA ORANG TUA</p>
                                        <!-- Etnis Ayah -->
                                        <div class="form-group col-lg-3 col-md-4 col-sm-6 col-12">
                                            <label for="etnis_ayah"><b>Etnis Ayah :</b></label>
                                            <p class="form-control-plaintext" id="etnis_ayah">
                                                <?php echo htmlspecialchars($worklist['etnis_ayah']); ?>
                                            </p>
                                        </div>

                                        <!-- Etnis Ibu -->
                                        <div class="form-group col-lg-3 col-md-4 col-sm-6 col-12">
                                            <label for="etnis_ibu"><b>Etnis Ibu :</b></label>
                                            <p class="form-control-plaintext" id="etnis_ibu">
                                                <?php echo htmlspecialchars($worklist['etnis_ibu']); ?>
                                            </p>
                                        </div>

                                        <!-- Rhesus Ibu -->
                                        <div class="form-group col-lg-3 col-md-4 col-sm-6 col-12">
                                            <label for="rhesus_ibu"><b>Rhesus Ibu :</b></label>
                                            <p class="form-control-plaintext" id="rhesus_ibu">
                                                <?php echo htmlspecialchars($worklist['rhesus_ibu']); ?>
                                            </p>
                                        </div>

                                        <!-- Golongan Darah Ibu -->
                                        <div class="form-group col-lg-3 col-md-4 col-sm-6 col-12">
                                            <label for="golongan_darah_ibu"><b>Golongan Darah Ibu :</b></label>
                                            <p class="form-control-plaintext" id="golongan_darah_ibu">
                                                <?php echo htmlspecialchars($worklist['golongan_darah_ibu']); ?>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <p class="text-light bg-dark ps-1 text-center">PENGUKURAN AWAL</p>

                                        <!-- Berat Aktual -->
                                        <div class="form-group col-md-3">
                                            <label for="berat_aktual"><b>Berat Aktual (gram) :</b></label>
                                            <p class="form-control-plaintext" id="berat_aktual">
                                                <?php echo htmlspecialchars($worklist['berat_aktual']); ?>
                                            </p>
                                        </div>

                                        <!-- HR -->
                                        <div class="form-group col-md-3">
                                            <label for="hr"><b>HR (bpm) :</b></label>
                                            <p class="form-control-plaintext" id="hr">
                                                <?php echo htmlspecialchars($worklist['hr']); ?>
                                            </p>
                                        </div>

                                        <!-- RR -->
                                        <div class="form-group col-md-3">
                                            <label for="rr"><b>RR (bpm) :</b></label>
                                            <p class="form-control-plaintext" id="rr">
                                                <?php echo htmlspecialchars($worklist['rr']); ?>
                                            </p>
                                        </div>

                                        <!-- Eritema -->
                                        <div class="form-group col-md-3">
                                            <label for="eritema"><b>Eritema :</b></label>
                                            <p class="form-control-plaintext" id="eritema">
                                                <?php echo htmlspecialchars($worklist['eritema']); ?>
                                            </p>
                                        </div>

                                        <!-- Suhu Aksila -->
                                        <div class="form-group col-md-3">
                                            <label for="suhu_aksila"><b>Suhu Aksila :</b></label>
                                            <p class="form-control-plaintext" id="tempasuhu_aksilat_rawat">
                                                <?php echo htmlspecialchars($worklist['suhu_aksila']); ?>
                                            </p>
                                        </div>

                                        <!-- Status Hidrasi -->
                                        <div class="form-group col-md-3">
                                            <label for="status_hidrasi"><b>Status Hidrasi :</b></label>
                                            <p class="form-control-plaintext" id="status_hidrasi">
                                                <?php echo htmlspecialchars($worklist['status_hidrasi']); ?>
                                            </p>
                                        </div>

                                        <!-- Kewaspadaan -->
                                        <div class="form-group col-md-3">
                                            <label for="kewaspadaan"><b>Kewaspadaan / GCS Skor :</b></label>
                                            <p class="form-control-plaintext" id="kewaspadaan">
                                                <?php echo htmlspecialchars($worklist['kewaspadaan']); ?>
                                            </p>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <p class="text-light bg-dark ps-1 text-center">DARAH</p>

                                        <div class="form-group col-md-3">
                                            <label for="hemoglobin"><b>Hemoglobin (HB) :</b></label>
                                            <p class="form-control-plaintext" id="hemoglobin">
                                                <?php echo htmlspecialchars($worklist['hemoglobin']); ?>
                                            </p>
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label for="hematokrit"><b>Hematokrit (Hct) :</b></label>
                                            <p class="form-control-plaintext" id="hematokrit">
                                                <?php echo htmlspecialchars($worklist['hematokrit']); ?>
                                            </p>
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label for="jumlah_sel_darah_merah"><b>Jumlah Sel Darah Merah (RBC) :</b></label>
                                            <p class="form-control-plaintext" id="jumlah_sel_darah_merah">
                                                <?php echo htmlspecialchars($worklist['jumlah_sel_darah_merah']); ?>
                                            </p>
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label for="jumlah_sel_darah_putih"><b>Jumlah Sel Darah Putih (WBC) :</b></label>
                                            <p class="form-control-plaintext" id="tejumlah_sel_darah_putihmpat_rawat">
                                                <?php echo htmlspecialchars($worklist['jumlah_sel_darah_putih']); ?>
                                            </p>
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label for="jumlah_trombosit"><b>Jumlah Trombosit (10³/μL) :</b></label>
                                            <p class="form-control-plaintext" id="jumlah_trombosit">
                                                <?php echo htmlspecialchars($worklist['jumlah_trombosit']); ?>
                                            </p>
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label for="hasil_darah"><b>Hasil Darah :</b></label>
                                            <p class="form-control-plaintext" id="hasil_darah">
                                                <?php echo htmlspecialchars($worklist['hasil_darah']); ?>
                                            </p>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <p class="text-light bg-dark ps-1 text-center">FUNGSI HATI</p>

                                        <div class="form-group col-md-3">
                                            <label for="sgot"><b>SGOT (U/L) :</b></label>
                                            <p class="form-control-plaintext" id="sgot">
                                                <?php echo htmlspecialchars($worklist['sgot']); ?>
                                            </p>
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label for="sgpt"><b>SGPT (U/L) :</b></label>
                                            <p class="form-control-plaintext" id="sgpt">
                                                <?php echo htmlspecialchars($worklist['sgpt']); ?>
                                            </p>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="hasil_fungsi_hati"><b>Hasil Fungsi Hati :</b></label>
                                            <p class="form-control-plaintext" id="hasil_fungsi_hati">
                                                <?php echo htmlspecialchars($worklist['hasil_fungsi_hati']); ?>
                                            </p>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="hasil_bilinorm"><b>Hasil Bilinorm :</b></label>
                                            <p class="form-control-plaintext" id="hasil_bilinorm">
                                                <?php echo htmlspecialchars($worklist['hasil_bilinorm']); ?>
                                            </p>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <p class="text-light bg-dark ps-1 text-center">DETAIL FOTOTERAPI</p>

                                        <div class="form-group col-md-3">
                                            <label for="alat_fototerapi"><b>Alat :</b></label>
                                            <p class="form-control-plaintext" id="alat_fototerapi">
                                                <?php echo htmlspecialchars($worklist['alat_fototerapi']); ?>
                                            </p>
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label for="lama_fototerapi"><b>Lama (jam) :</b></label>
                                            <p class="form-control-plaintext" id="lama_fototerapi">
                                                <?php echo htmlspecialchars($worklist['lama_fototerapi']); ?>
                                            </p>
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label for="waktu_mulai_fototerapi"><b>Waktu mulai :</b></label>
                                            <p class="form-control-plaintext" id="waktu_mulai_fototerapi">
                                                <?php echo htmlspecialchars($worklist['waktu_mulai_fototerapi']); ?>
                                            </p>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="waktu_lepas_fototerapi"><b>Waktu Lepas :</b></label>
                                            <p class="form-control-plaintext" id="waktu_lepas_fototerapi">
                                                <?php echo htmlspecialchars($worklist['waktu_lepas_fototerapi']); ?>
                                            </p>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="intensitas_fototerapi"><b>Intensitas :</b></label>
                                            <p class="form-control-plaintext" id="intensitas_fototerapi">
                                                <?php echo htmlspecialchars($worklist['intensitas_fototerapi']); ?>
                                            </p>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <p class="text-light bg-dark ps-1 text-center">OBSERVASI FOTOTERAPI</p>

                                        <div class="form-group col-md-3">
                                            <label for="tcb_sebelum_fototerapi"><b>TCB Sebelum Fototerapi (mg/dL) :</b></label>
                                            <p class="form-control-plaintext" id="tcb_sebelum_fototerapi">
                                                <?php echo htmlspecialchars($worklist['tcb_sebelum_fototerapi']); ?>
                                            </p>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="tsb_sebelum_fototerapi"><b>TSB Sebelum Fototerapi (mg/dL) :</b></label>
                                            <p class="form-control-plaintext" id="tsb_sebelum_fototerapi">
                                                <?php echo htmlspecialchars($worklist['tsb_sebelum_fototerapi']); ?>
                                            </p>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="tcb_sesudah_fototerapi"><b>TCB Sesudah Fototerapi (mg/dL) :</b></label>
                                            <p class="form-control-plaintext" id="tcb_sesudah_fototerapi">
                                                <?php echo htmlspecialchars($worklist['tcb_sesudah_fototerapi']); ?>
                                            </p>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="tsb_sesudah_fototerapi"><b>TSB Sesudah Fototerapi (mg/dL) :</b></label>
                                            <p class="form-control-plaintext" id="tsb_sesudah_fototerapi">
                                                <?php echo htmlspecialchars($worklist['tsb_sesudah_fototerapi']); ?>
                                            </p>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <p class="text-light bg-dark ps-1 text-center">KOMPLIKASI & CATATAN</p>

                                        <div class="form-group col-md-6">
                                            <label for="observasi"><b>Observasi :</b></label>
                                            <p class="form-control-plaintext" id="observasi">
                                                <?php echo htmlspecialchars($worklist['observasi']); ?>
                                            </p>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="catatan"><b>Catatan :</b></label>
                                            <p class="form-control-plaintext" id="catatan">
                                                <?php echo htmlspecialchars($worklist['catatan']); ?>
                                            </p>
                                        </div>
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

        $worklist_id = $_POST['id'];
        $user_id = $_POST['user_id'];
        $tempat_rawat = $_POST['tempat_rawat'];
        $tanggal_ambil_data = $_POST['tanggal_ambil_data'];
        $waktu_ambil_data = $_POST['waktu_ambil_data'];
        $nama_pasien = $_POST['nama_pasien'];
        $jenis_kelamin = $_POST['jenis_kelamin'];
        $berat_lahir = $_POST['berat_lahir'];
        $tanggal_lahir = $_POST['tanggal_lahir'];
        $alamat = $_POST['alamat'];
        $umur_kehamilan = $_POST['umur_kehamilan'];
        $skor_apgar = $_POST['skor_apgar'];
        $cara_lahir = $_POST['cara_lahir'];
        $golongan_darah = $_POST['golongan_darah'];
        $rhesus = $_POST['rhesus'];
        $etnis_ayah = $_POST['etnis_ayah'];
        $etnis_ibu = $_POST['etnis_ibu'];
        $rhesus_ibu = $_POST['rhesus_ibu'];
        $golongan_darah_ibu = $_POST['golongan_darah_ibu'];
        $berat_aktual = $_POST['berat_aktual'];
        $hr = $_POST['hr'];
        $rr = $_POST['rr'];
        $eritema = $_POST['eritema'];
        $suhu_aksila = $_POST['suhu_aksila'];
        $status_hidrasi = $_POST['status_hidrasi'];
        $kewaspadaan = $_POST['kewaspadaan'];
        $hemoglobin = $_POST['hemoglobin'];
        $hematokrit = $_POST['hematokrit'];
        $jumlah_sel_darah_merah = $_POST['jumlah_sel_darah_merah'];
        $jumlah_sel_darah_putih = $_POST['jumlah_sel_darah_putih'];
        $jumlah_trombosit = $_POST['jumlah_trombosit'];
        $hasil_darah = $_POST['hasil_darah'];
        $sgot = $_POST['sgot'];
        $sgpt = $_POST['sgpt'];
        $hasil_fungsi_hati = $_POST['hasil_fungsi_hati'];
        $hasil_bilinorm = $_POST['hasil_bilinorm'];
        $alat_fototerapi = $_POST['alat_fototerapi'];
        $lama_fototerapi = $_POST['lama_fototerapi'];
        $waktu_mulai_fototerapi = $_POST['waktu_mulai_fototerapi'];
        $waktu_lepas_fototerapi = $_POST['waktu_lepas_fototerapi'];
        $intensitas_fototerapi = $_POST['intensitas_fototerapi'];
        $tcb_sebelum_fototerapi = $_POST['tcb_sebelum_fototerapi'];
        $tsb_sebelum_fototerapi = $_POST['tsb_sebelum_fototerapi'];
        $tcb_sesudah_fototerapi = $_POST['tcb_sesudah_fototerapi'];
        $tsb_sesudah_fototerapi = $_POST['tsb_sesudah_fototerapi'];
        $observasi = $_POST['observasi'];
        $catatan = $_POST['catatan'];

        $sql_worklist = "UPDATE worklist SET
                user_id = '$user_id',
                nama_pasien = '$nama_pasien',
                jenis_kelamin = '$jenis_kelamin',
                berat_lahir = '$berat_lahir',
                tanggal_lahir = '$tanggal_lahir',
                alamat = '$alamat',
                umur_kehamilan = '$umur_kehamilan',
                skor_apgar = '$skor_apgar',
                cara_lahir = '$cara_lahir',
                golongan_darah = '$golongan_darah',
                rhesus = '$rhesus',
                etnis_ayah = '$etnis_ayah',
                etnis_ibu = '$etnis_ibu',
                rhesus_ibu = '$rhesus_ibu',
                golongan_darah_ibu = '$golongan_darah_ibu',
                tempat_rawat = '$tempat_rawat',
                tanggal_ambil_data = '$tanggal_ambil_data',
                waktu_ambil_data = '$waktu_ambil_data',
                berat_aktual = '$berat_aktual',
                hr = '$hr',
                rr = '$rr',
                eritema = '$eritema',
                suhu_aksila = '$suhu_aksila',
                status_hidrasi = '$status_hidrasi',
                kewaspadaan = '$kewaspadaan',
                hemoglobin = '$hemoglobin',
                hematokrit = '$hematokrit',
                jumlah_sel_darah_merah = '$jumlah_sel_darah_merah',
                jumlah_sel_darah_putih = '$jumlah_sel_darah_putih',
                jumlah_trombosit = '$jumlah_trombosit',
                hasil_darah = '$hasil_darah',
                sgot = '$sgot',
                sgpt = '$sgpt',
                hasil_fungsi_hati = '$hasil_fungsi_hati',
                hasil_bilinorm = '$hasil_bilinorm',
                alat_fototerapi = '$alat_fototerapi',
                lama_fototerapi = '$lama_fototerapi',
                waktu_mulai_fototerapi = '$waktu_mulai_fototerapi',
                waktu_lepas_fototerapi = '$waktu_lepas_fototerapi',
                intensitas_fototerapi = '$intensitas_fototerapi',
                tcb_sebelum_fototerapi = '$tcb_sebelum_fototerapi',
                tsb_sebelum_fototerapi = '$tsb_sebelum_fototerapi',
                tcb_sesudah_fototerapi = '$tcb_sesudah_fototerapi',
                tsb_sesudah_fototerapi = '$tsb_sesudah_fototerapi',
                observasi = '$observasi',
                catatan = '$catatan'
            WHERE id = '$worklist_id'";


        if ($conn->query($sql_worklist) === TRUE) {
            echo "<script>
                showSuccessToast('Edit success!');
                setTimeout(function() {
                    window.location.href = '" . base_url() . "hcp/dashboard/worklist_px.php';
                }, 2600);
            </script>";
        } else {
            echo "<script>
                        showDangerToast('Edit failed! " . $conn->error . "');
                    </script>;";
        }
        $conn->close();
    }
    ?>