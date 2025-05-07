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



if (!isset($_SESSION['user_id'])) {

    header("Location: ../login.php"); // Redirect jika belum login

    exit();

}



include '../includes/db.php';



$user_id = $_SESSION['user_id'];

$sql = "SELECT * FROM users WHERE id='$user_id'";

$result = $conn->query($sql);

$user = $result->fetch_assoc();





?>



<!DOCTYPE html>

<html lang="<?php echo $language; ?>">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Profile</title>

    <link rel="stylesheet" href="profile.css?v=<?= filemtime('profile.css') ?>">
    
    <script src="https://kit.fontawesome.com/4374ec9f4f.js" crossorigin="anonymous"></script>

</head>

<body>

    <header>

        <div class="logo">

            <a href="https://airbilinest.com/hcp/hcp.php">

                <img src="../../assets/airbilinest_logo.png" alt="Logo">

            </a>

        </div>

        <nav id="navbar" class="navbar">

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

                echo '<a href="../patient/patient.php">'. $lang['patient'].'</a>';

                echo '<a href="profile.php"><i class="fa fa-user"></i> ' , $_SESSION['username'] , '</a>';

            }
            ?>

        </nav>

        <button class="menu-toggle" onclick="toggleMenu()">☰</button>

        <script src="script.js"></script>

    </header>



    <!-- Tombol Toggle -->

    <button class="toggle-button" id="toggleButton">☰</button>



    <div class="container">

        <!-- Sidebar -->

        <div class="user_profile" id="userprofile">

            <h1 class="username"><?php echo $user['username']; ?></h1>

            <p>Email: <?php echo $user['email']; ?></p>

            <p>Profession: <?php echo htmlspecialchars($user['profession']); ?></p>

            <p>Akses Aplikasi: <?php echo htmlspecialchars($user['app_access']? 'Aktif' : 'Nonaktif'); ?></p>

            <br><br>

            <!-- Tombol Edit Password -->

            <button class="user_btn" onclick="window.location.href='../edit_password.php'">Edit Password</button>

            <br>  

            <button class="user_btn" onclick="requestVerification()">Verifikasi Akses Aplikasi</button>

            <br>

            <button class="logout-button" onclick="showModal()">Logout</button>

            <br>

            <button class="delete-account-button" onclick="confirmDelete()">Hapus Akun</button>

        </div>



        <div id="confirmationModal" class="confirm-logout">

            <p>Apakah Anda yakin ingin Logout?</p>

            <div class="button-div">

                <div class="confirm-div">

                    <button class="confirm-button" onclick="submitForm()">Ya</button>

                </div>

                <div class="confirm-div">

                    <button class="confirm-button" onclick="closeModal()">Tidak</button>

                </div>

            </div>

            

        </div>



        <!-- Bagian Kanan -->

        <div class="right-container">

            <h1>Selamat Datang di Dashboard</h1>

            <br>

            <p>

                Download Aplikasi AirBiliNest dan gunakan AirBiliNest mu!

            </p>

            <button class="download_btn" onclick="window.location.href='../download/download.php'">Download Aplikasi</button>

        </div>

    </div>

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