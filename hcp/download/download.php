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
<html lang="<?php echo $_SESSION['lang']; ?>">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo $lang['download']; ?> - AirBiliNest</title>
        <!-- Google tag (gtag.js) -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-TPWWLRDNQ4"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'G-TPWWLRDNQ4');
        </script>
        <link rel="shortcut icon" type="image/x-icon" href="../assets/ICONMKA.ico" />
        <link rel="stylesheet" href="download.css?v=<?= filemtime('download.css') ?>">
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
                <a href="https://airbilinest.com/hcp/bili/bili.php"><?php echo $lang['hyperbilirubinemia']; ?></a> 
                <a href="https://airbilinest.com/product/product.php"><?php echo $lang['products']; ?></a>
                <a href="../clinical/evidence.php"><?php echo $lang['clinical_evidence']; ?></a>
                <a href="https://airbilinest.com/contact/contact.php"><?php echo $lang['contact']; ?></a>
                <a href="../faq/faq.php"><?php echo $lang['faq']; ?></a>
                <a href="download.php"><?php echo $lang['download']; ?></a>
            </nav>

            <button class="menu-toggle" onclick="toggleMenu()">☰</button>
            <script src="script.js"></script>
        </header>

        <section class="airbilinest_apk">
            <div class="apk-profile">
                <div claas="apk-feature">
                    <img src="../assets/airbilinest_apk2.jpg" alt="AirBiliNest APK" class="airbilinest-apk-image">
                    <img src="../assets/airbilinest_apk1.jpg" alt="AirBiliNest APK" class="airbilinest-apk-image">
                </div>
                <div class="apk-feature">
                    <h1><?php echo $lang['apk_title']; ?></h1>
                    <p><?php echo $lang['apk_description']; ?></p>

                    <?php
                    if (isset($_SESSION['user_id'])) {
                        // Jika pengguna sudah login, tampilkan tombol Download
                        //LINK download APK: airbilinest.com/hcp/assets/airbilinest.apk
                        echo '<a href="#" target="_blank">
                            <button>' . $lang['download_button'] . '</button>
                         </a> ';
                    } else {
                        // Jika pengguna belum login, tampilkan tombol Login
                        echo '<a href="../login.php" target="_blank">
                            <button>' . $lang['login_to_download'] . '</button>
                         </a> ';
                    }
                    ?>

                    <br>
                </div>       
            </div>
            <div class="apk-info">
                <h1><?php echo $lang['recommended_specs']; ?></h1>
                <table>
                    <tr>
                        <th><?php echo $lang['os']; ?></th>
                        <th>:</th>
                        <th><?php echo $lang['os_value']; ?></th>
                    </tr>
                    <tr>
                        <th><?php echo $lang['android_version']; ?></th>
                        <th>:</th>
                        <th><?php echo $lang['android_value']; ?></th>
                    </tr>
                    <tr>
                        <th><?php echo $lang['memory']; ?></th>
                        <th>:</th>
                        <th><?php echo $lang['memory_value']; ?></th>
                    </tr>
                </table>
            </div>
        </section>

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
    </body>
</html>