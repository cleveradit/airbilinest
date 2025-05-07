<?php

// Mulai session

session_start();



// Set default language to English

$language = 'en';



// Jika bahasa dipilih melalui URL, simpan ke session

if (isset($_GET['lang'])) {

    $language = $_GET['lang'];

    $_SESSION['lang'] = $language; // Simpan ke session

}

// Jika session bahasa sudah ada, gunakan itu

elseif (isset($_SESSION['lang'])) {

    $language = $_SESSION['lang'];

}



// Load the appropriate language file

include("../lang/$language.php");

?>



<!DOCTYPE html>

<html lang="<?php echo $language; ?>">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php echo $lang['bili_title']; ?></title>

    <link rel="shortcut icon" type="image/x-icon" href="../assets/ICONMKA.ico" />

    <link rel="stylesheet" href="bili.css?v=<?= filemtime('bili.css') ?>">

    <script src="https://kit.fontawesome.com/4374ec9f4f.js" crossorigin="anonymous"></script>

</head>



<body>

    <!-- Header Section -->

    <header>

        <div class="logo">

            <a href="https://airbilinest.com">

                <img src="../../assets/airbilinest_logo.png" alt="Logo">

            </a>

        </div>

        <nav id="navbar" class="navbar">

            <a href="https://airbilinest.com/hcp/hcp.php"><?php echo $lang['home']; ?></a>

            <a href="../about/about.php"><?php echo $lang['about_us']; ?></a>

            <a href="bili.php"><?php echo $lang['hyperbilirubinemia']; ?></a> 

            <a href="../product/product.php"><?php echo $lang['products']; ?></a>

            <a href="../clinical/evidence.php"><?php echo $lang['clinical_evidence']; ?></a>

            <a href="https://airbilinest.com/contact/contact.php"><?php echo $lang['contact']; ?></a>

            <a href="../faq/faq.php"><?php echo $lang['faq']; ?></a>

            <a href="../news/news.php"><?php echo $lang['updates']; ?></a>

            <?php 
                if (isset($_SESSION['user_id'])) {

                    // Jika pengguna sudah login, tampilkan tombol Profil dan Pasien

                    echo '<a href="../patient/patient.php">'. $lang['patient'].'</a>';

                    echo '<a href="../profile/profile.php"><i class="fa fa-user"></i> ' , $_SESSION['username'] , '</a>';

                }
            ?>

        </nav>

        <button class="menu-toggle" onclick="toggleMenu()">☰</button>



        <script src="script.js"></script>

    </header>



    <div class="info">

        <h1><?php echo $lang['bili_main_title']; ?></h1>

        <p><?php echo $lang['bili_description']; ?></p>

        <br>

        <h2><?php echo $lang['causes_title']; ?></h2>

        <ul>

            <li><strong><?php echo $lang['cause_1_title']; ?></strong>:

                <ul>

                    <li><?php echo $lang['cause_1_detail_1']; ?></li>

                    <li><?php echo $lang['cause_1_detail_2']; ?></li>

                </ul>

            </li>

            <li><strong><?php echo $lang['cause_2_title']; ?></strong>:

                <ul>

                    <li><?php echo $lang['cause_2_detail_1']; ?></li>

                    <li><?php echo $lang['cause_2_detail_2']; ?></li>

                </ul>

            </li>

            <li><strong><?php echo $lang['cause_3_title']; ?></strong>:

                <ul>

                    <li><?php echo $lang['cause_3_detail']; ?></li>

                </ul>

            </li>

        </ul>

        <br>

        <h2><?php echo $lang['symptoms_title']; ?></h2>

        <ul>

            <li><?php echo $lang['symptom_1']; ?></li>

            <li><?php echo $lang['symptom_2']; ?></li>

            <li><?php echo $lang['symptom_3']; ?></li>

            <li><?php echo $lang['symptom_4']; ?></li>

        </ul>

        <br>

        <h2><?php echo $lang['treatment_title']; ?></h2>

        <p><?php echo $lang['treatment_description']; ?></p>

        <ul>

            <li><strong><?php echo $lang['treatment_1_title']; ?></strong>: <?php echo $lang['treatment_1_detail']; ?></li>

            <li><strong><?php echo $lang['treatment_2_title']; ?></strong>: <?php echo $lang['treatment_2_detail']; ?></li>

            <li><?php echo $lang['treatment_3']; ?></li>

        </ul>

        <br>

        <h2><?php echo $lang['when_to_see_doctor_title']; ?></h2>

        <p><?php echo $lang['when_to_see_doctor_description']; ?></p>

    </div>



    <footer>

        <div class="footer-container">

            <div class="footer-section logo-info">

                <img src="../../assets/airbilinest_logo.png" alt="Logo" class="footer-logo">

                <p><?php echo $lang['footer_tagline']; ?></p>

                <div class="social-icons">

                    <a href="https://www.instagram.com/medika.karya.airlangga" target="_blank" class="fa-brands fa-instagram fa-3x" ></a>

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

</body>

</html>