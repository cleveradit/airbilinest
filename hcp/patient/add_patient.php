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

        <h1><?php echo $lang['add_patient']; ?></h1>

        <button class="btn btn-sm btn-outline btn-outline-secondary m-2" onclick="window.location.href='patient.php'"><?php echo $lang['back'] ?></button>

        <form method="POST" action="save_patient.php">
            <div class="card p-3 shadow bg-white rounded">
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
            </div>
            <div class="text-center mt-4">
                <button class="btn btn-md btn-success" type="submit">Simpan</button>
            </div>
        </form>

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