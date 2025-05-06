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
    <title><?php echo $lang['products']; ?></title>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-TPWWLRDNQ4"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-TPWWLRDNQ4');
    </script>
    <link rel="shortcut icon" type="image/x-icon" href="../assets/ICONMKA.ico" />
    <link rel="stylesheet" href="product.css?v=<?= filemtime('product.css') ?>">
    <script src="https://kit.fontawesome.com/4374ec9f4f.js" crossorigin="anonymous"></script>
</head>
<body>
    <!-- Header Section -->
    <header>
        <div class="logo">
            <a href="https://airbilinest.com">
                <img src="../assets/airbilinest_logo.png" alt="Logo">
            </a>
        </div>
        <nav id="navbar" class="navbar">
            <a href="https://airbilinest.com"><?php echo $lang['home']; ?></a>
            <a href="../about/about.php"><?php echo $lang['about_us']; ?></a>
            <a href="../bili/bili.php"><?php echo $lang['hyperbilirubinemia']; ?></a> 
            <a href="product/product.php"><?php echo $lang['products']; ?></a>
            <a href="../testimonials/testimonial.php"><?php echo $lang['testimonial']; ?></a>
            <a href="../order/order.php"><?php echo $lang['order_here']; ?></a>
            <a href="../contact/contact.php"><?php echo $lang['contact']; ?></a>
            <a href="../faq/faq.php"><?php echo $lang['faq']; ?></a>
        </nav>
        <button class="menu-toggle" onclick="toggleMenu()">☰</button>

        <script src="script.js"></script>
        </header>

    <div class="product">
        <h1><?php echo $lang['products']; ?></h1>

        <div class="airbilinest">
            <h2><?php echo $lang['airbilinest_series']; ?></h2>
            <p><?php echo $lang['airbilinest_description']; ?></p>
            <div class="mka-series">
                <div class="mka1">
                    <img src="../assets/placholder1.png">
                    <h3>AirBiliNest MKA-01</h3>
                </div>
                <div class="mka2">
                    <img src="../assets/mka02.png">
                    <h3>AirBiliNest MKA-02</h3>
                </div>
                <div class="mka3">
                    <img src="../assets/mka03_1.png">
                    <h3>AirBiliNest MKA-03</h3>
                </div>
            </div>
        </div>
        <div class="airbilisun">
            <h2><?php echo $lang['other_products']; ?></h2>
            <div class="airbilisun-img">
                <img src="../assets/Airbilisun.png">
                <h3>AirBiliSun</h3>
                <p><?php echo $lang['airbilisun_description']; ?></p>
            </div>
        </div>
    </div>

    <footer>
        <div class="footer-ending">
            <p>© 2025 AirBiliNest | All Rights Reserved</p>
        </div>
    </footer>
</body>
</html>