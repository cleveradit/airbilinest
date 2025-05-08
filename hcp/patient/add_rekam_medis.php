<?php
session_start();

// Set default language to English

$language = 'en';



// Jika bahasa dipilih melalui URL, simpan ke session

if (isset($_GET['lang'])) {

    $language = $_GET['lang'];

    $_SESSION['lang'] = $language;
}

// Jika session bahasa sudah ada, gunakan itu

elseif (isset($_SESSION['lang'])) {

    $language = $_SESSION['lang'];
}



// Load the appropriate language file

include("../lang/$language.php");

if (!isset($_SESSION['user_id'])) {

    header("Location: ../login.php"); // Redirect jika belum login

    exit();
}



include '../includes/db.php';



$user_id = $_SESSION['user_id'];

$sql = "SELECT * FROM users WHERE id='$user_id'";

$result = $conn->query($sql);

$user = $result->fetch_assoc();

$patient_id = $_GET['id'];

$sql = "SELECT * FROM patients WHERE id='$patient_id'";

$result_patient = $conn->query($sql);

$patient = $result_patient->fetch_assoc();

$sql = "SELECT * FROM users";
$user_result = $conn->query($sql);
$users = [];

if ($user_result->num_rows > 0) {
    while ($row = $user_result->fetch_assoc()) {
        $users[] = $row;
    }
}

include '../includes/url.php';



?>



<!DOCTYPE html>

<html lang="<?php echo $language; ?>">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php echo $lang['patient']; ?> - AirBiliNest</title>

    <link rel="shortcut icon" type="image/x-icon" href="../../assets/ICONMKA.ico" />

    <link rel="stylesheet" href="patient.css?v=<?= filemtime('patient.css') ?>">

    <script src="https://kit.fontawesome.com/4374ec9f4f.js" crossorigin="anonymous"></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" rel="stylesheet">

    <link href="https://cdn.datatables.net/2.3.0/css/dataTables.bootstrap4.css" rel="stylesheet">

    <script src="https://kit.fontawesome.com/4374ec9f4f.js" crossorigin="anonymous"></script>

</head>

<body>

    <header class="header_cust">

        <div class="logo">

            <a href="https://airbilinest.com/hcp/hcp.php">

                <img src="../../assets/airbilinest_logo.png" alt="Logo">

            </a>

        </div>

        <nav id="navbar_cust" class="navbar_cust">

            <a href="../hcp.php">Home</a>

            <a href="../about/about.php">About Us</a>

            <a href="../bili/bili.php">Hiperbilirubinemia</a>

            <a href="../product/product.php">Products</a>

            <a href="../clinical/evidence.php">Clinical Evidence</a>

            <a href="../../contact/contact.php">Contact</a>

            <a href="../faq/faq.php">FAQ</a>

            <a href="../news/news.php"><?php echo $lang['updates']; ?></a>


            <?php
            if (isset($_SESSION['user_id'])) {

                // Jika pengguna sudah login, tampilkan tombol Profil dan Pasien

                echo '<a href="patient.php">' . $lang['patient'] . '</a>';

                echo '<a href="../profile/profile.php"><i class="fa fa-user"></i> ', $_SESSION['username'], '</a>';
            }
            ?>

        </nav>

        <button class="menu-toggle-cust" onclick="toggleMenu()">☰</button>

    </header>

    <div class="info">

        <h1><?php echo $lang['add_medical_record']; ?> : <?php echo $patient['nama_pasien'] ?></h1>

        <div class="card p-3 shadow bg-white rounded">
            <div class="d-flex justify-content-between align-items-center">
                <button class="btn btn-sm btn-outline btn-outline-secondary" onclick="window.location.href='rekam_medis.php?id=<?php echo $patient['id'] ?>'"><?php echo $lang['back'] ?></button>
            </div>
            <br>
            <form method="POST" action="save_rekam_medis.php">
                <input value="<?php echo $patient['id'] ?>" type="hidden" name="patient_id" class="form-control" id="patient_id">
                <div class="row">
                    <div class="col-12 bg-info text-light">
                        <h5 class="text-center">IDENTITAS, WAKTU, DAN TEMPAT STUDI</h5>
                    </div>
                    <!-- Dokter -->
                    <div class="form-group col-lg-3 col-md-4 col-sm-6 col-12">
                        <label for="user_id">Dokter</label>
                        <select class="form-control" name="user_id" id="user_id" required>
                            <option value=""></option>
                            <?php foreach ($users as $users) { ?>
                                <option value="<?php echo $users['id'] ?>"><?php echo $users['username'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <!-- Tempat -->
                    <div class="form-group col-lg-3 col-md-4 col-sm-6 col-12">
                        <label for="tempat_rawat">Tempat</label>
                        <input type="text" name="tempat_rawat" class="form-control" id="tempat_rawat" required>
                    </div>
                    <!-- Tanggal -->
                    <div class="form-group col-lg-3 col-md-4 col-sm-6 col-12">
                        <label for="tanggal_ambil_data">Tanggal</label>
                        <input type="date" name="tanggal_ambil_data" class="form-control" id="tanggal_ambil_data" required>
                    </div>
                    <!-- Waktu -->
                    <div class="form-group col-lg-3 col-md-4 col-sm-6 col-12">
                        <label for="waktu_ambil_data">Waktu</label>
                        <input type="time" name="waktu_ambil_data" class="form-control" id="waktu_ambil_data" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 bg-info text-light">
                        <h5 class="text-center">DATA BAYI</h5>
                    </div>
                    <!-- Nama Pasien -->
                    <div class="form-group col-lg-3 col-md-4 col-sm-6 col-12">
                        <label for="nama_pasien">Nama Pasien</label>
                        <input value="<?php echo $patient['nama_pasien'] ?>" type="text" name="nama_pasien" class="form-control" id="nama_pasien" required>
                    </div>

                    <!-- Jenis Kelamin -->
                    <div class="form-group col-lg-3 col-md-4 col-sm-6 col-12">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <select class="form-control" name="jenis_kelamin" id="jenis_kelamin">
                            <option <?php echo $patient['jenis_kelamin'] == 'Perempuan' ? 'selected' : '' ?> value="Perempuan">Perempuan</option>
                            <option <?php echo $patient['jenis_kelamin'] == 'Laki-laki' ? 'selected' : '' ?> value="Laki-laki">Laki-laki</option>
                        </select>
                    </div>

                    <!-- Berat Lahir -->
                    <div class="form-group col-lg-3 col-md-4 col-sm-6 col-12">
                        <label for="berat_lahir">Berat Lahir</label>
                        <input value="<?php echo $patient['berat_lahir'] ?>" type="text" name="berat_lahir" class="form-control" id="berat_lahir" required>
                    </div>

                    <!-- Tanggal Lahir -->
                    <div class="form-group col-lg-3 col-md-4 col-sm-6 col-12">
                        <label for="tanggal_lahir">Tanggal Lahir</label>
                        <input value="<?php echo $patient['tanggal_lahir'] ?>" type="date" name="tanggal_lahir" class="form-control" id="tanggal_lahir" required>
                    </div>

                    <!-- Umur Kehamilan -->
                    <div class="form-group col-lg-3 col-md-4 col-sm-6 col-12">
                        <label for="umur_kehamilan">Umur Kehamilan</label>
                        <input value="<?php echo $patient['umur_kehamilan'] ?>" type="number" name="umur_kehamilan" class="form-control" id="umur_kehamilan" required>
                    </div>

                    <!-- Skor Apgar -->
                    <div class="form-group col-lg-3 col-md-4 col-sm-6 col-12">
                        <label for="skor_apgar">Skor Apgar</label>
                        <input value="<?php echo $patient['skor_apgar'] ?>" type="text" name="skor_apgar" class="form-control" id="skor_apgar" required>
                    </div>

                    <!-- Cara Lahir -->
                    <div class="form-group col-lg-3 col-md-4 col-sm-6 col-12">
                        <label for="cara_lahir">Cara Lahir</label>
                        <input value="<?php echo $patient['cara_lahir'] ?>" type="text" name="cara_lahir" class="form-control" id="cara_lahir" required>
                    </div>

                    <!-- Golongan Darah -->
                    <div class="form-group col-lg-3 col-md-4 col-sm-6 col-12">
                        <label for="golongan_darah">Golongan Darah</label>
                        <select class="form-control" name="golongan_darah" id="golongan_darah" required>
                            <option <?php echo $patient['golongan_darah'] == 'A' ? 'selected' : '' ?> value="A">A</option>
                            <option <?php echo $patient['golongan_darah'] == 'B' ? 'selected' : '' ?> value="B">B</option>
                            <option <?php echo $patient['golongan_darah'] == 'AB' ? 'selected' : '' ?> value="AB">AB</option>
                            <option <?php echo $patient['golongan_darah'] == 'O' ? 'selected' : '' ?> value="O">O</option>
                        </select>
                    </div>

                    <!-- Rhesus -->
                    <div class="form-group col-lg-3 col-md-4 col-sm-6 col-12">
                        <label for="rhesus">Rhesus</label>
                        <select class="form-control" name="rhesus" id="rhesus" required>
                            <option <?php echo $patient['rhesus'] == '+' ? 'selected' : '' ?> value="+">+</option>
                            <option <?php echo $patient['rhesus'] == '-' ? 'selected' : '' ?> value="-">-</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 bg-info text-light">
                        <h5 class="text-center">DATA ORANG TUA</h5>
                    </div>
                    <!-- Etnis Ayah -->
                    <div class="form-group col-lg-3 col-md-4 col-sm-6 col-12">
                        <label for="etnis_ayah">Etnis Ayah</label>
                        <input value="<?php echo $patient['etnis_ayah'] ?>" type="text" name="etnis_ayah" class="form-control" id="etnis_ayah" required>
                    </div>

                    <!-- Etnis Ibu -->
                    <div class="form-group col-lg-3 col-md-4 col-sm-6 col-12">
                        <label for="etnis_ibu">Etnis Ibu</label>
                        <input value="<?php echo $patient['etnis_ibu'] ?>" type="text" name="etnis_ibu" class="form-control" id="etnis_ibu" required>
                    </div>

                    <!-- Rhesus Ibu -->
                    <div class="form-group col-lg-3 col-md-4 col-sm-6 col-12">
                        <label for="rhesus_ibu">Rhesus Ibu</label>
                        <select class="form-control" name="rhesus_ibu" id="rhesus_ibu" required>
                            <option <?php echo $patient['rhesus_ibu'] == '+' ? 'selected' : '' ?> value="+">+</option>
                            <option <?php echo $patient['rhesus_ibu'] == '-' ? 'selected' : '' ?> value="-">-</option>
                        </select>
                    </div>

                    <!-- Golongan Darah Ibu -->
                    <div class="form-group col-lg-3 col-md-4 col-sm-6 col-12">
                        <label for="golongan_darah_ibu">Golongan Darah Ibu</label>
                        <select class="form-control" name="golongan_darah_ibu" id="golongan_darah_ibu" required>
                            <option <?php echo $patient['golongan_darah_ibu'] == 'A' ? 'selected' : '' ?> value="A">A</option>
                            <option <?php echo $patient['golongan_darah_ibu'] == 'B' ? 'selected' : '' ?> value="B">B</option>
                            <option <?php echo $patient['golongan_darah_ibu'] == 'AB' ? 'selected' : '' ?> value="AB">AB</option>
                            <option <?php echo $patient['golongan_darah_ibu'] == 'O' ? 'selected' : '' ?> value="O">O</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 bg-info text-light">
                        <h5 class="text-center">PENGUKURAN AWAL</h5>
                    </div>

                    <!-- Berat Aktual -->
                    <div class="form-group col-md-3">
                        <label for="berat_aktual">Berat Aktual (gram)</label>
                        <input type="number" name="berat_aktual" class="form-control" id="berat_aktual" required>
                    </div>

                    <!-- HR -->
                    <div class="form-group col-md-3">
                        <label for="hr">HR (bpm)</label>
                        <input type="number" name="hr" class="form-control" id="hr" required>
                    </div>

                    <!-- RR -->
                    <div class="form-group col-md-3">
                        <label for="rr">RR (bpm)</label>
                        <input type="number" name="rr" class="form-control" id="rr" required>
                    </div>

                    <!-- Eritema -->
                    <div class="form-group col-md-3">
                        <label for="eritema">Eritema</label>
                        <select class="form-control" name="eritema" id="eritema" required>
                            <option value=""></option>
                            <option value="Iya">Iya</option>
                            <option value="Tidak">Tidak</option>
                        </select>
                    </div>

                    <!-- Suhu Aksila -->
                    <div class="form-group col-md-3">
                        <label for="suhu_aksila">Suhu Aksila</label>
                        <input type="text" name="suhu_aksila" class="form-control" id="suhu_aksila" required>
                    </div>

                    <!-- Status Hidrasi -->
                    <div class="form-group col-md-3">
                        <label for="status_hidrasi">Status Hidrasi</label>
                        <select class="form-control" name="status_hidrasi" id="status_hidrasi" required>
                            <option value=""></option>
                            <option value="Iya">Iya</option>
                            <option value="Tidak">Tidak</option>
                        </select>
                    </div>

                    <!-- Kewaspadaan -->
                    <div class="form-group col-md-3">
                        <label for="kewaspadaan">Kewaspadaan / GCS Skor</label>
                        <input type="text" name="kewaspadaan" class="form-control" id="kewaspadaan" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 bg-info text-light">
                        <h5 class="text-center">DARAH</h5>
                    </div>

                    
                    <div class="form-group col-md-3">
                        <label for="hemoglobin">Hemoglobin (HB)</label>
                        <input type="text" name="hemoglobin" class="form-control" id="hemoglobin" required>
                    </div>

                    <div class="form-group col-md-3">
                        <label for="hematokrit">Hematokrit (Hct)</label>
                        <input type="text" name="hematokrit" class="form-control" id="hematokrit" required>
                    </div>

                    <div class="form-group col-md-3">
                        <label for="jumlah_sel_darah_merah">Jumlah Sel Darah Merah (RBC)</label>
                        <input type="text" name="jumlah_sel_darah_merah" class="form-control" id="jumlah_sel_darah_merah" required>
                    </div>

                    <div class="form-group col-md-3">
                        <label for="jumlah_sel_darah_putih">Jumlah Sel Darah Putih (WBC)</label>
                        <input type="text" name="jumlah_sel_darah_putih" class="form-control" id="jumlah_sel_darah_putih" required>
                    </div>

                    <div class="form-group col-md-3">
                        <label for="jumlah_trombosit">Jumlah Trombosit (10³/μL)</label>
                        <input type="text" name="jumlah_trombosit" class="form-control" id="jumlah_trombosit" required>
                    </div>

                    <div class="form-group col-md-3">
                        <label for="hasil_darah">Hasil Darah</label>
                        <input type="text" name="hasil_darah" class="form-control" id="hasil_darah" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 bg-info text-light">
                        <h5 class="text-center">FUNGSI HATI</h5>
                    </div>

                    <div class="form-group col-md-3">
                        <label for="sgot">SGOT (U/L)</label>
                        <input type="number" name="sgot" class="form-control" id="sgot" required>
                    </div>

                    <div class="form-group col-md-3">
                        <label for="sgpt">SGPT (U/L)</label>
                        <input type="number" name="sgpt" class="form-control" id="sgpt" required>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="hasil_fungsi_hati">Hasil Fungsi Hati</label>
                        <input type="text" name="hasil_fungsi_hati" class="form-control" id="hasil_fungsi_hati" required>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="hasil_bilinorm">Hasil Bilinorm</label>
                        <input type="text" name="hasil_bilinorm" class="form-control" id="hasil_bilinorm" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 bg-info text-light">
                        <h5 class="text-center">DETAIL FOTOTERAPI</h5>
                    </div>

                    <div class="form-group col-md-3">
                        <label for="alat_fototerapi">Alat</label>
                        <input type="text" name="alat_fototerapi" class="form-control" id="alat_fototerapi" required>
                    </div>

                    <div class="form-group col-md-3">
                        <label for="lama_fototerapi">Lama (jam)</label>
                        <input type="number" name="lama_fototerapi" class="form-control" id="lama_fototerapi" required>
                    </div>

                    <div class="form-group col-md-3">
                        <label for="waktu_mulai_fototerapi">Waktu mulai</label>
                        <input type="time" name="waktu_mulai_fototerapi" class="form-control" id="waktu_mulai_fototerapi" required>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="waktu_lepas_fototerapi">Waktu Lepas</label>
                        <input type="time" name="waktu_lepas_fototerapi" class="form-control" id="waktu_lepas_fototerapi" required>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="intensitas_fototerapi">Intensitas</label>
                        <input type="number" name="intensitas_fototerapi" class="form-control" id="intensitas_fototerapi" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 bg-info text-light">
                        <h5 class="text-center">OBSERVASI FOTOTERAPI</h5>
                    </div>

                    <div class="form-group col-md-3">
                        <label for="tcb_sebelum_fototerapi">TCB Sebelum Fototerapi (mg/dL)</label>
                        <input type="number" name="tcb_sebelum_fototerapi" class="form-control" id="tcb_sebelum_fototerapi" required>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="tsb_sebelum_fototerapi">TSB Sebelum Fototerapi (mg/dL)</label>
                        <input type="number" name="tsb_sebelum_fototerapi" class="form-control" id="tsb_sebelum_fototerapi" required>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="tcb_sesudah_fototerapi">TCB Sesudah Fototerapi (mg/dL)</label>
                        <input type="number" name="tcb_sesudah_fototerapi" class="form-control" id="tcb_sesudah_fototerapi" required>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="tsb_sesudah_fototerapi">TSB Sesudah Fototerapi (mg/dL)</label>
                        <input type="number" name="tsb_sesudah_fototerapi" class="form-control" id="tsb_sesudah_fototerapi" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 bg-info text-light">
                        <h5 class="text-center">KOMPLIKASI & CATATAN</h5>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="observasi">Observasi</label>
                        <textarea name="observasi" class="form-control" id="observasi" rows="3" required></textarea>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="catatan">Catatan</label>
                        <textarea name="catatan" class="form-control" id="catatan" rows="3" required></textarea>
                    </div>
                </div>

                <div class="d-flex justify-content-end mt-3">
                    <button class="btn btn-md btn-success" type="submit">Simpan Rekam Medis</button>
                </div>
            </form>
        </div>

    </div>




    <footer>

        <div class="footer-container">

            <div class="footer-section logo-info">

                <img src="../../assets/airbilinest_logo.png" alt="Logo" class="footer-logo">

                <p><?php echo $lang['footer_tagline']; ?></p>

                <div class="social-icons">

                    <a href="https://www.instagram.com/medika.karya.airlangga" target="_blank" class="fa-brands fa-instagram fa-3x"></a>

                    <a href="https://www.linkedin.com/company/pt-medika-karya-airlangga" target="_blank" class="fa-brands fa-linkedin fa-3x"></a>

                    <a href="https://www.youtube.com/@airbilinestofficial8761" target="_blank" class="fa-brands fa-youtube fa-3x"></a>

                </div>

            </div>



            <div class="footer-section map">

                <h3><?php echo $lang['location']; ?></h3>

                <div class="map-container">

                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.530592141325!2d112.8093733745464!3d-7.294123771697154!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7f1d8a8b76b2f%3A0x31b6896ab51b7f68!2sPT%20Medika%20Karya%20Airlangga!5e0!3m2!1sid!2sid!4v1731075785294!5m2!1sid!2sid"

                        width="auto" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

                </div>

            </div>

        </div>



        <div class="footer-ending">

            <p><?php echo $lang['footer_copyright']; ?></p>

        </div>

    </footer>





    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/2.3.0/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.3.0/js/dataTables.bootstrap4.js"></script>

    <script src="script.js"></script>

    <script>
        const toggleButton = document.getElementById('toggleButton');

        const userprofile = document.getElementById('userprofile');



        toggleButton.addEventListener('click', () => {

            userprofile.classList.toggle('active');

        });



        function confirmDelete() {

            if (confirm("Apakah Anda yakin ingin menghapus akun ini? \nMenghapus akun juga akan menghapus semua data anda. \nTindakan ini tidak dapat dibatalkan!")) {

                window.location.href = 'delete_account.php'; // Arahkan ke file PHP untuk menghapus akun

            }

        }



        function requestVerification() {

            if (confirm("Apakah Anda yakin ingin mengajukan verifikasi akses aplikasi?")) {

                window.location.href = 'request_verification.php'; // Arahkan ke file PHP untuk mengajukan verifikasi

            }

        }
    </script>

</body>

</html>