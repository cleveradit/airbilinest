<?php

// Mulai session

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

?>



<!DOCTYPE html>

<html lang="<?php echo $language; ?>">

    <head>

        <meta charset="UTF-8">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title><?php echo $lang['products_title']; ?></title>

        <!-- Google tag (gtag.js) -->

        <script async src="https://www.googletagmanager.com/gtag/js?id=G-TPWWLRDNQ4"></script>

        <script>

            window.dataLayer = window.dataLayer || [];

            function gtag(){dataLayer.push(arguments);}

            gtag('js', new Date());



            gtag('config', 'G-TPWWLRDNQ4');

        </script>

        <link rel="shortcut icon" type="image/x-icon" href="../../assets/ICONMKA.ico" />

        <link rel="stylesheet" href="product.css?v=<?= filemtime('product.css') ?>">

        <script src="https://kit.fontawesome.com/4374ec9f4f.js" crossorigin="anonymous"></script>

    </head>



    <body>

        <!-- Header Section -->

        <header>

            <div class="logo">

                <a href="https://airbilinest.com/hcp/hcp.php">

                    <img src="../../assets/airbilinest_logo.png" alt="Logo">

                </a>

            </div>

            <nav id="navbar" class="navbar">

                <a href="https://airbilinest.com/hcp/hcp.php"><?php echo $lang['home']; ?></a>

                <a href="../about/about.php"><?php echo $lang['about_us']; ?></a>

                <a href="https://airbilinest.com/bili/bili.php"><?php echo $lang['hyperbilirubinemia']; ?></a> 

                <a href="product.php"><?php echo $lang['products']; ?></a>

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



        <div class="product">

            <h1><?php echo $lang['products_main_title']; ?></h1>



            <p class="info-hyperbilirubinemia">

                <?php echo $lang['products_description_hcp']; ?>

            </p>



            <div class="airbilinest">

                <h2><?php echo $lang['airbilinest_series_title']; ?></h2>

                <p><?php echo $lang['airbilinest_series_description']; ?></p>

                <div class="mka-series">

                    <div class="mka1">

                        <img src="../../assets/placholder1.png">

                        <h3><?php echo $lang['mka1_title']; ?></h3>

                        <p><?php echo $lang['mka1_description']; ?></p>

                        <br>

                    </div>

                    <div class="mka2">

                        <img src="../../assets/mka02.png">

                        <h3><?php echo $lang['mka2_title']; ?></h3>

                        <p><?php echo $lang['mka2_description']; ?></p>

                        <br>

                    </div>

                    <div class="mka3">

                        <img src="../../assets/mka03_1.png">

                        <h3><?php echo $lang['mka3_title']; ?></h3>

                        <p><?php echo $lang['mka3_description']; ?></p>

                        <br>

                    </div>

                </div>

            </div>



            <div class="airbilisun">

                <h2><?php echo $lang['other_products_title']; ?></h2>

                <div class="airbilisun-img">

                    <img src="../../assets/Airbilisun.png">

                    <h3><?php echo $lang['airbilisun_title']; ?></h3>

                    <p><?php echo $lang['airbilisun_description']; ?></p>

                </div>

            </div>

        </div>



        <footer>

            <div class="footer-ending">

                <p><?php echo $lang['footer_copyright']; ?></p>

            </div>

        </footer>

    </body>

</html>