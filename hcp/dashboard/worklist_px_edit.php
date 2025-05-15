<?php include $_SERVER['DOCUMENT_ROOT'] . '/hcp/template/header.php'; ?>
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
$sql = "SELECT worklist.*
        FROM worklist 
        WHERE worklist.id = '$worklist_id'";
$result_worklist = $conn->query($sql);
$worklist = $result_worklist->fetch_assoc();

?>
<div class="container-scroller">
    <!-- Sidebar -->
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/hcp/template/navbar.php'; ?>

    <div class="container-fluid page-body-wrapper">
        <!-- Navbar -->
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/hcp/template/sidebar.php'; ?>

        <!-- Main Content Start -->
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="page-header">
                    <h3 class="page-title"> Pasien : <?php echo $worklist['nama_pasien'] ?></h3>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo base_url() ?>hcp/dashboard/worklist_px.php">Worklist</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Pasien</li>
                        </ol>
                    </nav>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-2">
                            <div class="wrapper d-flex align-items-center">
                                <h4 class="card-title">Edit Pasien</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <form method="POST" action="">
                                    <input value="<?php echo $worklist['id'] ?>" type="hidden" name="id" class="form-control" id="id">
                                    <div class="row">
                                        <p class="text-light bg-dark ps-1 text-center">IDENTITAS, WAKTU, DAN TEMPAT STUDI</h3>
                                            <!-- Dokter -->
                                        <div class="form-group col-lg-3 col-md-4 col-sm-6 col-12">
                                            <label for="user_id">Dokter</label>
                                            <select class="form-control" name="user_id" id="user_id" required>
                                                <option value=""></option>
                                                <?php foreach ($users as $users) { ?>
                                                    <option <?php echo $worklist['user_id'] == $users['id'] ? 'selected' : '' ?> value="<?php echo $users['id'] ?>"><?php echo $users['username'] ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <!-- Tempat -->
                                        <div class="form-group col-lg-3 col-md-4 col-sm-6 col-12">
                                            <label for="tempat_rawat">Tempat</label>
                                            <input type="text" name="tempat_rawat" class="form-control" id="tempat_rawat" value="<?php echo $worklist['tempat_rawat'] ?>" required>
                                        </div>
                                        <!-- Tanggal -->
                                        <div class="form-group col-lg-3 col-md-4 col-sm-6 col-12">
                                            <label for="tanggal_ambil_data">Tanggal</label>
                                            <input type="date" name="tanggal_ambil_data" class="form-control" id="tanggal_ambil_data" value="<?php echo $worklist['tanggal_ambil_data'] ?>" required>
                                        </div>
                                        <!-- Waktu -->
                                        <div class="form-group col-lg-3 col-md-4 col-sm-6 col-12">
                                            <label for="waktu_ambil_data">Waktu</label>
                                            <input type="time" name="waktu_ambil_data" class="form-control" id="waktu_ambil_data" value="<?php echo $worklist['waktu_ambil_data'] ?>" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <p class="text-light bg-dark ps-1 text-center">DATA BAYI</p>
                                        <!-- Nama Pasien -->
                                        <div class="form-group col-lg-3 col-md-4 col-sm-6 col-12">
                                            <label for="nama_pasien">Nama Pasien</label>
                                            <input value="<?php echo $worklist['nama_pasien'] ?>" type="text" name="nama_pasien" class="form-control" id="nama_pasien" value="<?php echo $worklist['nama_pasien'] ?>" required>
                                        </div>

                                        <!-- Jenis Kelamin -->
                                        <div class="form-group col-lg-3 col-md-4 col-sm-6 col-12">
                                            <label for="jenis_kelamin">Jenis Kelamin</label>
                                            <select class="form-control" name="jenis_kelamin" id="jenis_kelamin">
                                                <option <?php echo $worklist['jenis_kelamin'] == 'Perempuan' ? 'selected' : '' ?> value="Perempuan">Perempuan</option>
                                                <option <?php echo $worklist['jenis_kelamin'] == 'Laki-laki' ? 'selected' : '' ?> value="Laki-laki">Laki-laki</option>
                                            </select>
                                        </div>

                                        <!-- Berat Lahir -->
                                        <div class="form-group col-lg-3 col-md-4 col-sm-6 col-12">
                                            <label for="berat_lahir">Berat Lahir</label>
                                            <input value="<?php echo $worklist['berat_lahir'] ?>" type="text" name="berat_lahir" class="form-control" id="berat_lahir" value="<?php echo $worklist['berat_lahir'] ?>" required>
                                        </div>

                                        <!-- Status Berat Lahir (ditambahkan) -->
                                        <div class="form-group col-lg-3 col-md-4 col-sm-6 col-12">
                                            <label for="status_berat_lahir">Status Berat Lahir</label>
                                            <select class="form-control" name="status_berat_lahir" id="status_berat_lahir">
                                                <option value="Berat Badan Normal" <?= isset($worklist['status_berat_lahir']) && $worklist['status_berat_lahir'] == 'Berat Badan Normal' ? 'selected' : '' ?>>Berat Badan Normal</option>
                                                <option value="Berat Badan Lahir Rendah" <?= isset($worklist['status_berat_lahir']) && $worklist['status_berat_lahir'] == 'Berat Badan Lahir Rendah' ? 'selected' : '' ?>>Berat Badan Lahir Rendah</option>
                                                <option value="Makrosomia" <?= isset($worklist['status_berat_lahir']) && $worklist['status_berat_lahir'] == 'Makrosomia' ? 'selected' : '' ?>>Makrosomia</option>
                                            </select>
                                        </div>

                                        <!-- Tanggal Lahir -->
                                        <div class="form-group col-lg-3 col-md-4 col-sm-6 col-12">
                                            <label for="tanggal_lahir">Tanggal Lahir</label>
                                            <input value="<?php echo $worklist['tanggal_lahir'] ?>" type="date" name="tanggal_lahir" class="form-control" id="tanggal_lahir" value="<?php echo $worklist['tanggal_lahir'] ?>" required>
                                        </div>

                                        <!-- Alamat -->
                                        <div class="form-group col-lg-3 col-md-4 col-sm-6 col-12">
                                            <label for="alamat">Alamat</label>
                                            <input value="<?php echo $worklist['alamat'] ?>" type="text" name="alamat" class="form-control" id="tanggal_lahir" value="<?php echo $worklist['tanggal_lahir'] ?>" required>
                                        </div>

                                        <!-- Umur Kehamilan -->
                                        <div class="form-group col-lg-3 col-md-4 col-sm-6 col-12">
                                            <label for="umur_kehamilan">Umur Kehamilan</label>
                                            <input value="<?php echo $worklist['umur_kehamilan'] ?>" type="number" name="umur_kehamilan" class="form-control" id="umur_kehamilan" value="<?php echo $worklist['umur_kehamilan'] ?>" required>
                                        </div>

                                        <!-- Skor Apgar -->
                                        <div class="form-group col-lg-3 col-md-4 col-sm-6 col-12">
                                            <label for="skor_apgar">Skor Apgar</label>
                                            <input value="<?php echo $worklist['skor_apgar'] ?>" type="text" name="skor_apgar" class="form-control" id="skor_apgar" value="<?php echo $worklist['skor_apgar'] ?>" required>
                                        </div>

                                        <!-- Cara Lahir -->
                                        <div class="form-group col-lg-3 col-md-4 col-sm-6 col-12">
                                            <label for="cara_lahir">Cara Lahir</label>
                                            <input value="<?php echo $worklist['cara_lahir'] ?>" type="text" name="cara_lahir" class="form-control" id="cara_lahir" value="<?php echo $worklist['cara_lahir'] ?>" required>
                                        </div>

                                        <!-- Golongan Darah -->
                                        <div class="form-group col-lg-3 col-md-4 col-sm-6 col-12">
                                            <label for="golongan_darah">Golongan Darah</label>
                                            <select class="form-control" name="golongan_darah" id="golongan_darah" required>
                                                <option <?php echo $worklist['golongan_darah'] == 'A' ? 'selected' : '' ?> value="A">A</option>
                                                <option <?php echo $worklist['golongan_darah'] == 'B' ? 'selected' : '' ?> value="B">B</option>
                                                <option <?php echo $worklist['golongan_darah'] == 'AB' ? 'selected' : '' ?> value="AB">AB</option>
                                                <option <?php echo $worklist['golongan_darah'] == 'O' ? 'selected' : '' ?> value="O">O</option>
                                                <option <?php echo $worklist['golongan_darah'] == 'Tidak Terisi' ? 'selected' : '' ?> value="Tidak Terisi">Tidak Terisi</option>
                                            </select>
                                        </div>

                                        <!-- Rhesus -->
                                        <div class="form-group col-lg-3 col-md-4 col-sm-6 col-12">
                                            <label for="rhesus">Rhesus</label>
                                            <select class="form-control" name="rhesus" id="rhesus" required>
                                                <option <?php echo $worklist['rhesus'] == '+' ? 'selected' : '' ?> value="+">+</option>
                                                <option <?php echo $worklist['rhesus'] == '-' ? 'selected' : '' ?> value="-">-</option>
                                                <option <?php echo $worklist['rhesus'] == 'Tidak Terisi' ? 'selected' : '' ?> value="Tidak Terisi">Tidak Terisi</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <p class="text-light bg-dark ps-1 text-center">DATA ORANG TUA</p>
                                        <!-- Etnis Ayah -->
                                        <div class="form-group col-lg-3 col-md-4 col-sm-6 col-12">
                                            <label for="etnis_ayah">Etnis Ayah</label>
                                            <input value="<?php echo $worklist['etnis_ayah'] ?>" type="text" name="etnis_ayah" class="form-control" id="etnis_ayah" value="<?php echo $worklist['etnis_ayah'] ?>" required>
                                        </div>

                                        <!-- Etnis Ibu -->
                                        <div class="form-group col-lg-3 col-md-4 col-sm-6 col-12">
                                            <label for="etnis_ibu">Etnis Ibu</label>
                                            <input value="<?php echo $worklist['etnis_ibu'] ?>" type="text" name="etnis_ibu" class="form-control" id="etnis_ibu" value="<?php echo $worklist['etnis_ibu'] ?>" required>
                                        </div>

                                        <!-- Rhesus Ibu -->
                                        <div class="form-group col-lg-3 col-md-4 col-sm-6 col-12">
                                            <label for="rhesus_ibu">Rhesus Ibu</label>
                                            <select class="form-control" name="rhesus_ibu" id="rhesus_ibu" required>
                                                <option <?php echo $worklist['rhesus_ibu'] == '+' ? 'selected' : '' ?> value="+">+</option>
                                                <option <?php echo $worklist['rhesus_ibu'] == '-' ? 'selected' : '' ?> value="-">-</option>
                                                <option <?php echo $worklist['rhesus_ibu'] == 'Tidak Terisi' ? 'selected' : '' ?> value="Tidak Terisi">Tidak Terisi</option>
                                            </select>
                                        </div>

                                        <!-- Golongan Darah Ibu -->
                                        <div class="form-group col-lg-3 col-md-4 col-sm-6 col-12">
                                            <label for="golongan_darah_ibu">Golongan Darah Ibu</label>
                                            <select class="form-control" name="golongan_darah_ibu" id="golongan_darah_ibu" required>
                                                <option <?php echo $worklist['golongan_darah_ibu'] == 'A' ? 'selected' : '' ?> value="A">A</option>
                                                <option <?php echo $worklist['golongan_darah_ibu'] == 'B' ? 'selected' : '' ?> value="B">B</option>
                                                <option <?php echo $worklist['golongan_darah_ibu'] == 'AB' ? 'selected' : '' ?> value="AB">AB</option>
                                                <option <?php echo $worklist['golongan_darah_ibu'] == 'O' ? 'selected' : '' ?> value="O">O</option>
                                                <option <?php echo $worklist['golongan_darah_ibu'] == 'Tidak Terisi' ? 'selected' : '' ?> value="Tidak Terisi">Tidak Terisi</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <p class="text-light bg-dark ps-1 text-center">PENGUKURAN AWAL</p>

                                        <!-- Berat Aktual -->
                                        <div class="form-group col-md-3">
                                            <label for="berat_aktual">Berat Aktual (gram)</label>
                                            <input type="number" name="berat_aktual" class="form-control" id="berat_aktual" value="<?php echo $worklist['berat_aktual'] ?>" required>
                                        </div>

                                        <!-- HR -->
                                        <div class="form-group col-md-3">
                                            <label for="hr">HR (bpm)</label>
                                            <input type="number" name="hr" class="form-control" id="hr" value="<?php echo $worklist['hr'] ?>" required>
                                        </div>

                                        <!-- RR -->
                                        <div class="form-group col-md-3">
                                            <label for="rr">RR (bpm)</label>
                                            <input type="number" name="rr" class="form-control" id="rr" value="<?php echo $worklist['rr'] ?>" required>
                                        </div>

                                        <!-- Eritema -->
                                        <div class="form-group col-md-3">
                                            <label for="eritema">Eritema</label>
                                            <select class="form-control" name="eritema" id="eritema" required>
                                                <option value=""></option>
                                                <option <?php echo $worklist['eritema'] == 'Iya' ? 'selected' : '' ?> value="Iya">Iya</option>
                                                <option <?php echo $worklist['eritema'] == 'Tidak' ? 'selected' : '' ?> value="Tidak">Tidak</option>
                                                <option <?php echo $worklist['eritema'] == 'Tidak Terisi' ? 'selected' : '' ?> value="Tidak">Tidak Terisi</option>
                                            </select>
                                        </div>

                                        <!-- Suhu Aksila -->
                                        <div class="form-group col-md-3">
                                            <label for="suhu_aksila">Suhu Aksila</label>
                                            <input type="text" name="suhu_aksila" class="form-control" id="suhu_aksila" value="<?php echo $worklist['suhu_aksila'] ?>" required>
                                        </div>

                                        <!-- Status Hidrasi -->
                                        <div class="form-group col-md-3">
                                            <label for="status_hidrasi">Status Hidrasi</label>
                                            <select class="form-control" name="status_hidrasi" id="status_hidrasi" required>
                                                <option value=""></option>
                                                <option <?php echo $worklist['status_hidrasi'] == 'Iya' ? 'selected' : '' ?> value="Iya">Iya</option>
                                                <option <?php echo $worklist['status_hidrasi'] == 'Tidak' ? 'selected' : '' ?> value="Tidak">Tidak</option>
                                                <option <?php echo $worklist['status_hidrasi'] == 'Tidak Terisi' ? 'selected' : '' ?> value="Tidak">Tidak Terisi</option>
                                            </select>
                                        </div>

                                        <!-- Kewaspadaan -->
                                        <div class="form-group col-md-3">
                                            <label for="kewaspadaan">Kewaspadaan / GCS Skor</label>
                                            <input type="text" name="kewaspadaan" class="form-control" id="kewaspadaan" value="<?php echo $worklist['kewaspadaan'] ?>" required>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <p class="text-light bg-dark ps-1 text-center">DARAH</p>

                                        <div class="form-group col-md-3">
                                            <label for="hemoglobin">Hemoglobin (HB)</label>
                                            <input type="text" name="hemoglobin" class="form-control" id="hemoglobin" value="<?php echo $worklist['hemoglobin'] ?>" required>
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label for="hematokrit">Hematokrit (Hct)</label>
                                            <input type="text" name="hematokrit" class="form-control" id="hematokrit" value="<?php echo $worklist['hematokrit'] ?>" required>
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label for="jumlah_sel_darah_merah">Jumlah Sel Darah Merah (RBC)</label>
                                            <input type="text" name="jumlah_sel_darah_merah" class="form-control" id="jumlah_sel_darah_merah" value="<?php echo $worklist['jumlah_sel_darah_merah'] ?>" required>
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label for="jumlah_sel_darah_putih">Jumlah Sel Darah Putih (WBC)</label>
                                            <input type="text" name="jumlah_sel_darah_putih" class="form-control" id="jumlah_sel_darah_putih" value="<?php echo $worklist['jumlah_sel_darah_putih'] ?>" required>
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label for="jumlah_trombosit">Jumlah Trombosit (10³/μL)</label>
                                            <input type="text" name="jumlah_trombosit" class="form-control" id="jumlah_trombosit" value="<?php echo $worklist['jumlah_trombosit'] ?>" required>
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label for="hasil_darah">Hasil Darah</label>
                                            <input type="text" name="hasil_darah" class="form-control" id="hasil_darah" value="<?php echo $worklist['hasil_darah'] ?>" required>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <p class="text-light bg-dark ps-1 text-center">FUNGSI HATI</p>

                                        <div class="form-group col-md-3">
                                            <label for="sgot">SGOT (U/L)</label>
                                            <input type="number" name="sgot" class="form-control" id="sgot" value="<?php echo $worklist['sgot'] ?>" required>
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label for="sgpt">SGPT (U/L)</label>
                                            <input type="number" name="sgpt" class="form-control" id="sgpt" value="<?php echo $worklist['sgpt'] ?>" required>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="hasil_fungsi_hati">Hasil Fungsi Hati</label>
                                            <input type="text" name="hasil_fungsi_hati" class="form-control" id="hasil_fungsi_hati" value="<?php echo $worklist['hasil_fungsi_hati'] ?>" required>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="hasil_bilinorm">Hasil Bilinorm</label>
                                            <input type="text" name="hasil_bilinorm" class="form-control" id="hasil_bilinorm" value="<?php echo $worklist['hasil_bilinorm'] ?>" required>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <p class="text-light bg-dark ps-1 text-center">DETAIL FOTOTERAPI</p>

                                        <div class="form-group col-md-3">
                                            <label for="alat_fototerapi">Alat</label>
                                            <input type="text" name="alat_fototerapi" class="form-control" id="alat_fototerapi" value="<?php echo $worklist['alat_fototerapi'] ?>" required>
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label for="lama_fototerapi">Lama (jam)</label>
                                            <input type="number" name="lama_fototerapi" class="form-control" id="lama_fototerapi" value="<?php echo $worklist['lama_fototerapi'] ?>" required>
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label for="waktu_mulai_fototerapi">Waktu mulai</label>
                                            <input type="time" name="waktu_mulai_fototerapi" class="form-control" id="waktu_mulai_fototerapi" value="<?php echo $worklist['waktu_mulai_fototerapi'] ?>" required>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="waktu_lepas_fototerapi">Waktu Lepas</label>
                                            <input type="time" name="waktu_lepas_fototerapi" class="form-control" id="waktu_lepas_fototerapi" value="<?php echo $worklist['waktu_lepas_fototerapi'] ?>" required>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="intensitas_fototerapi">Intensitas</label>
                                            <input type="number" name="intensitas_fototerapi" class="form-control" id="intensitas_fototerapi" value="<?php echo $worklist['intensitas_fototerapi'] ?>" required>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <p class="text-light bg-dark ps-1 text-center">OBSERVASI FOTOTERAPI</p>

                                        <div class="form-group col-md-3">
                                            <label for="tcb_sebelum_fototerapi">TCB Sebelum Fototerapi (mg/dL)</label>
                                            <input type="text" name="tcb_sebelum_fototerapi" class="form-control" id="tcb_sebelum_fototerapi" value="<?php echo $worklist['tcb_sebelum_fototerapi'] ?>" required>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="tsb_sebelum_fototerapi">TSB Sebelum Fototerapi (mg/dL)</label>
                                            <input type="text" name="tsb_sebelum_fototerapi" class="form-control" id="tsb_sebelum_fototerapi" value="<?php echo $worklist['tsb_sebelum_fototerapi'] ?>" required>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="tcb_sesudah_fototerapi">TCB Sesudah Fototerapi (mg/dL)</label>
                                            <input type="text" name="tcb_sesudah_fototerapi" class="form-control" id="tcb_sesudah_fototerapi" value="<?php echo $worklist['tcb_sesudah_fototerapi'] ?>" required>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="tsb_sesudah_fototerapi">TSB Sesudah Fototerapi (mg/dL)</label>
                                            <input type="text" name="tsb_sesudah_fototerapi" class="form-control" id="tsb_sesudah_fototerapi" value="<?php echo $worklist['tsb_sesudah_fototerapi'] ?>" required>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <p class="text-light bg-dark ps-1 text-center">KOMPLIKASI & CATATAN</p>

                                        <div class="form-group col-md-6">
                                            <label for="observasi">Observasi</label>
                                            <textarea name="observasi" class="form-control" id="observasi" rows="3" required><?php echo $worklist['observasi'] ?></textarea>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="catatan">Catatan</label>
                                            <textarea name="catatan" class="form-control" id="catatan" rows="3" required><?php echo $worklist['catatan'] ?></textarea>
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-end mt-3">
                                        <button class="btn btn-md btn-gradient-success" type="submit">Simpan Rekam Medis</button>
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

    <?php include $_SERVER['DOCUMENT_ROOT'] . '/hcp/template/footer.php'; ?>

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
        $status_berat_lahir = $_POST['status_berat_lahir'];
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
                status_berat_lahir = '$status_berat_lahir',
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