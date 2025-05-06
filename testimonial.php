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
    <title><?php echo $lang['contact_title']; ?></title>
    <link rel="shortcut icon" type="image/x-icon" href="../assets/ICONMKA.ico" />
    <link rel="stylesheet" href="testimonial.css?v=<?= filemtime('testimonial.css') ?>">
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
            <a href="../product/product.php"><?php echo $lang['products']; ?></a>
            <a href="testimonial.php"><?php echo $lang['testimonial']; ?></a>
            <a href="../order/order.php"><?php echo $lang['order_here']; ?></a>
            <a href="../contact/contact.php"><?php echo $lang['contact']; ?></a>
            <a href="../faq/faq.php"><?php echo $lang['faq']; ?></a>
        </nav>
        <button class="menu-toggle" onclick="toggleMenu()">☰</button>


        <script src="script.js"></script>
    </header>

    <div class="testi">
        <div class="pakar1">
            <img src="../assets/mahendra.png" class="mahendra">
            <p>
                <?php echo $lang['testi_mahe']; ?>
            </p>
        </div>
        <hr>
        <div class="pakar2">
            <img src="../assets/zaidan.png" class="zaidan">
            <p>
            <?php echo $lang['testi_zaidan']; ?>
            </p>
        </div>
    </div>

    <p class="tes_video_title">
        <b>
            Testimonial Videos
        </b>
    </p>
    <div class="video-gallery">
        <!-- Video 1 -->
        <div class="video-thumbnail">
            <a href="https://www.youtube.com/watch?v=NZiVv37Fjtg" target="_blank">
                <img src="https://img.youtube.com/vi/NZiVv37Fjtg/0.jpg" alt="YouTube Video Thumbnail">
                <div class="video-title">
                    Testimonials AirBiliNest by dr. Mahendra Tri Arif Sampurna, Sp.A(K)., Ph.D
                </div>
            </a>
        </div>
    
        <!-- Video 2 -->
        <div class="video-thumbnail">
            <a href="https://www.youtube.com/watch?v=mW5viVYwcsw" target="_blank">
                <img src="https://img.youtube.com/vi/mW5viVYwcsw/0.jpg" alt="YouTube Video Thumbnail">
                <div class="video-title">
                    Testimonials AirBiliNest Andi Hamim Zaidan, M.Si., Ph.D Ahli Nanoteknologi LIHTR UNAIR
                </div>
            </a>
        </div>
    
        <!-- Video 3 -->
        <div class="video-thumbnail">
            <a href="https://www.youtube.com/watch?v=aiLm71iFCfo" target="_blank">
                <img src="https://img.youtube.com/vi/aiLm71iFCfo/0.jpg" alt="YouTube Video Thumbnail">
                <div class="video-title">
                    Testimonials AirBiliNest Dr.Sulistawati, dr.,M.Kes_Wadek III FK UNAIR (Riset Comunity Development)
                </div>
            </a>
        </div>
        
        <!-- Video 4 -->
        <div class="video-thumbnail">
            <a href="https://www.youtube.com/watch?v=pF9zK5UNkbI" target="_blank">
                <img src="https://img.youtube.com/vi/pF9zK5UNkbI/0.jpg" alt="YouTube Video Thumbnail">
                <div class="video-title">
                    Testimonials AirBiliNest Dr. Muhammad Faizi, Sp.A(K) Kadepkes Anak RSUD Dr Soetomo Surabaya
                </div>
            </a>
        </div>
        
        <!-- Video 5 -->
        <div class="video-thumbnail">
            <a href="https://www.youtube.com/watch?v=4sQI2ble2pU" target="_blank">
                <img src="https://img.youtube.com/vi/4sQI2ble2pU/0.jpg" alt="YouTube Video Thumbnail">
                <div class="video-title">
                    Testimonial AirBiliNest Dr. Ari Prasetyo, S.E., M.Si Sekretaris BPBRIN UNAIR
                </div>
            </a>
        </div>
    </div>

    <footer>
        <div class="footer-container">
            <div class="footer-section logo-info">
                <img src="../assets/airbilinest_logo.png" alt="Logo" class="footer-logo">
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