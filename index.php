<?php

session_start();



$available_languages = ['en', 'id'];

$default_lang = 'en';



// Deteksi bahasa dari URL

$current_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$segments = explode('/', trim($current_path, '/'));

$lang_from_url = isset($segments[0]) && in_array($segments[0], $available_languages) 

    ? $segments[0] 

    : null;



// Deteksi bahasa dari parameter GET

if(isset($_GET['lang']) && in_array($_GET['lang'], $available_languages)) {

    $lang_from_get = $_GET['lang'];

}



// Prioritas: URL > GET > Session > Default

$current_lang = $lang_from_url ?? $lang_from_get ?? $_SESSION['lang'] ?? $default_lang;



// Simpan ke session

if(!isset($_SESSION['lang']) || $_SESSION['lang'] !== $current_lang) {

    $_SESSION['lang'] = $current_lang;

}



// Load file bahasa

require_once "lang/$current_lang.php";



// Fungsi URL yang lebih robust

function url($path = '', $lang = null) {

    global $current_lang;

    $lang = $lang ?? $current_lang;

    

    // Bersihkan path dari karakter tidak perlu

    $clean_path = ltrim($path, '/');

    

    // Hilangkan ekstensi .php jika ada

    $clean_path = preg_replace('/\.php$/', '', $clean_path);

    

    // Khusus file index

    if (basename($clean_path) == 'index') {

        $clean_path = dirname($clean_path);

    }

    

    return "/$lang/" . $clean_path;

}

?>



<!DOCTYPE html>

<html lang="<?php echo $_SESSION['lang']; ?>">

<head>

    <base href="/">

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php echo $lang['title']; ?></title>

    <meta name="description" content="Airlangga Bilirubin Nesting (Airbilinest) – Solusi fototerapi pintar untuk atasi bayi kuning. Produk dari PT Medika Karya Airlangga UNAIR, telah melalui berbagai tahap penelitian dan pengembangan">

    <meta name="keywords" content="airbilinest, medika karya airlangga, airlangga bilirubin nesting, Smart Phototherapy System Airlangga Bilirubin Nesting, airbilinest application, airbilinest unair, PT Medika Karya Airlangga, mka, medika karya airlangga, UNAIR">

    <meta name="robots" content="index, follow">

    <link rel="alternate" hreflang="id" href="https://airbilinest.com/id/" />

    <link rel="alternate" hreflang="en" href="https://airbilinest.com/en/" />

    <link rel="canonical" href="https://airbilinest.com/" />

    <!-- Open Graph & Schema Markup -->

    <meta property="og:url" content="https://airbilinest.com/">

    <script type="application/ld+json">

    {

        "@context": "https://schema.org",

        "@type": "WebSite",

        "url": "https://airbilinest.com/",

        "name": "Airbilinest",

        "description": "Smart phototherapy solution for neonatal jaundice - Airlangga Bilirubin Nesting",

        "publisher": {

            "@type": "Organization",

            "name": "PT Medika Karya Airlangga",

            "logo": {

                "@type": "ImageObject",

                "url": "https://airbilinest.com/assets/airbilinest_logo.png"

            }

        }

    }

    </script>

    

    <!-- Google tag (gtag.js) -->

    <script async src="https://www.googletagmanager.com/gtag/js?id=G-TPWWLRDNQ4"></script>

    <script>

        window.dataLayer = window.dataLayer || [];

        function gtag(){dataLayer.push(arguments);}

        gtag('js', new Date());



        gtag('config', 'G-TPWWLRDNQ4');

    </script>

    <link rel="shortcut icon" type="image/x-icon" href="assets/ICONMKA.ico" />

    <link rel="stylesheet" href="main.css?v=<?= filemtime('main.css') ?>">

    <script src="https://kit.fontawesome.com/4374ec9f4f.js" crossorigin="anonymous"></script>

</head>

<body>



    <!-- Header Section -->

    <header>
        tes

        <div class="logo">

            <a href="https://airbilinest.com">

                <img src="assets/airbilinest_logo.png" alt="Logo">

            </a>

        </div>

        <nav id="navbar" class="navbar">

            <a href="about/about.php"><?php echo $lang['about_us']; ?></a>

            <a href="bili/bili.php"><?php echo $lang['hyperbilirubinemia']; ?></a> 

            <a href="product/product.php"><?php echo $lang['products']; ?></a>

            <a href="testimonials/testimonial.php"><?php echo $lang['testimonial']; ?></a>

            <a href="order/order.php"><?php echo $lang['order_here']; ?></a>

            <a href="contact/contact.php"><?php echo $lang['contact']; ?></a>

            <a href="faq/faq.php"><?php echo $lang['faq']; ?></a>

            <a href="#" id="showPopup"><?php echo $lang['healthcare_professionals']; ?></a>

        </nav>

        <button class="menu-toggle" onclick="toggleMenu()">☰</button>



        <!-- Popup -->

        <div id="popup" class="popup">

            <div class="popup-content">

                <p class="popup-title"><?php echo $lang['popup_title']; ?></p>

                <br>

                <p><?php echo $lang['popup_description']; ?></p>

                

                <button class="popup-button" id="notProfessional"><?php echo $lang['not_professional']; ?></button>

                <button class="popup-button" id="professional"><?php echo $lang['professional']; ?></button>

            </div>

        </div>



        <script src="script.js"></script>

    </header>



    <!-- Language Switcher -->

    <section class="language-switcher-sec">

        <div class="language-switcher">

            <a href="<?= url('', 'en') ?>" class="<?= $current_lang === 'en' ? 'active' : '' ?>">English</a>

            <span>|</span>

            <a href="<?= url('', 'id') ?>" class="<?= $current_lang === 'id' ? 'active' : '' ?>">Bahasa</a>

        </div>

        <!-- <div class="language-switcher">

            <a href="?lang=en">English</a> | 

            <a href="?lang=id">Bahasa Indonesia</a>

        </div> -->

    </section>



        



    <!-- Hero Section --> 

    <section class="hero">

        <div class="hero-text">

            <h1><?php echo $lang['hero_title']; ?></h1>

            <p><?php echo $lang['hero_description']; ?></p>

        </div>

    </section>



    <!-- VIDEO TESTI -->

    <section class="video-testi">

        <video class="videoPlayer active" muted autoplay controls>

            <source src="assets/Testi_drMahe.mp4" type="video/mp4">

            Browser Anda tidak mendukung tag video.

        </video>

        <!-- <video class="videoPlayer" controls muted>

            <source src="assets/Testi_drFaizi.mp4" type="video/mp4">

            Browser Anda tidak mendukung tag video.

        </video>

        <video class="videoPlayer" controls muted>

            <source src="assets/Testi_Zaidan.mp4" type="video/mp4">

            Browser Anda tidak mendukung tag video.

        </video>

        <video class="videoPlayer" controls muted>

            <source src="assets/Testi_drSulistawati.mp4" type="video/mp4">

            Browser Anda tidak mendukung tag video.

        </video>

        <video class="videoPlayer" controls muted>

            <source src="assets/Testi_drAri.mp4" type="video/mp4">

            Browser Anda tidak mendukung tag video.

        </video> -->

    </section>



    <script>

        const videos = document.querySelectorAll('.videoPlayer');

        let index = 0;



        function playNextVideo() {

            if (index < videos.length) {

                // Sembunyikan semua video

                videos.forEach(video => {

                    video.classList.remove('active');

                    video.pause(); // Hentikan video yang sedang diputar

                });



                // Tampilkan dan putar video saat ini

                const currentVideo = videos[index];

                currentVideo.classList.add('active');

                currentVideo.play();



                // Lanjut ke video berikutnya setelah video selesai

                currentVideo.addEventListener('ended', () => {

                    index++;

                    playNextVideo();

                });

            }

        }



        // Mulai pemutaran video pertama

        playNextVideo();

    </script>

    

    <!-- BILIRUBIN -->

    <section class="bili">

        <p><?php echo $lang['caption_video']; ?></p>

        <br>

        <h1><?php echo $lang['hyperbilirubinemia_title']; ?></h1>

        <p><?php echo $lang['hyperbilirubinemia_description']; ?></p>

        <a href="/bili/bili.html"><?php echo $lang['learn_more']; ?></a>

    </section>



    <!-- <section class="about">

        <div class="about_image">

            <img src="assets/App_logo.png" alt="Airbilinset logo">

        </div>

        <div class="about_text">

            <h1><?php echo $lang['about_title']; ?></h1>

            <p><?php echo $lang['about_description']; ?></p>

        </div>

    </section> -->



    <section class="features-section">

        <div class="feature">

            <h2><?php echo $lang['feature_title_1']; ?></h2>

            <p><?php echo $lang['feature_text_1']; ?></p>

        </div>

        <div class="feature">

            <img src="assets/placholder1.png" alt="Airbilinest" class="feature_image">

        </div>

        <div class="feature">

            <h2><?php echo $lang['feature_title_2']; ?></h2>

            <p><?php echo $lang['feature_text_2']; ?></p>

        </div>

        <div class="feature">

            <img src="assets/mka02.png" alt="Airbilinest" class="feature_image">

        </div>

        <div class="feature">

            <h2><?php echo $lang['feature_title_3']; ?></h2>

            <p><?php echo $lang['feature_text_3']; ?></p>

        </div>

        <div class="feature">

            <img src="assets//mka03_1.png" alt="Airbilinest" class="feature_image">

        </div>

    </section>



    <section class="dr-mahe">

        <div class="doctor-profile">

            <div claas="dr-feature">

                <img src="assets/mahendra2.png" alt="dr. Mahendra" class="dr-mahe-image">

            </div>

            <div class="dr-feature">

                <h1><?php echo $lang['dr_mahe_title']; ?></h1>

                <h2><?php echo $lang['dr_mahe_title_2']; ?></h2>

                <p><?php echo $lang['dr_mahe_text']; ?></p>

                <a href="https://dr-mahe.com/" target="_blank">

                    <button><?php echo $lang['dr_mahe_button']; ?></button>

                </a> 

            </div>       

        </div>

    </section>



    <footer>

        <div class="footer-container">

            <div class="footer-section logo-info">

                <img src="assets/airbilinest_logo.png" alt="Logo" class="footer-logo">

                <img src="assets/medika_logo.png" alt="Logo" class="footer-logo">

                <!-- <img src="assets/idsmed_logo.png" alt="Logo" class="footer-logo">

                <img src="assets/aski_logo2.png" alt="Logo" class="footer-logo"> -->

                <!-- <img src="assets/unair_biru_logo.png" alt="Logo" class="footer-logo"> -->

                

                <div class="social-icons">

                    <a href="https://www.instagram.com/medika.karya.airlangga" target="_blank" class="fa-brands fa-instagram fa-4x" ></a>

                    <a href="https://www.linkedin.com/company/pt-medika-karya-airlangga" target="_blank" class="fa-brands fa-linkedin fa-4x"></a>

                    <a href="https://www.youtube.com/@airbilinestofficial8761" target="_blank" class="fa-brands fa-youtube fa-4x"></a>

                </div>

            </div>

    

            <div class="footer-section menu">

                <h3><?php echo $lang['menu']; ?></h3>

                <ul>

                    <li><a href="about/about.php"><?php echo $lang['about_us']; ?></a></li>

                    <li><a href="bili/bili.php"><?php echo $lang['hyperbilirubinemia']; ?></a></li>

                    <li><a href="product/product.php"><?php echo $lang['products']; ?></a></li>

                    <li><a href="order/order.php"><?php echo $lang['order_here']; ?></a></li>

                    <li><a href="contact/contact.php"><?php echo $lang['contact']; ?></a></li>

                    <li><a href="faq/faq.php"><?php echo $lang['faq']; ?></a></li>

                </ul>

            </div>

    

            <div class="footer-section helpful-links">

                <h3><?php echo $lang['helpful_links']; ?></h3>

                <ul>

                    <li><a href="#"><i class="fa fa-book"></i> <?php echo $lang['instructions']; ?></a></li>

                    <li><a href="#"><i class="fa fa-lock"></i> <?php echo $lang['privacy_policy']; ?></a></li>

                    <li><a href="#"><i class="fa fa-file-alt"></i> <?php echo $lang['terms_conditions']; ?></a></li>

                </ul>

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



<!-- Made by RonAaron61 (Valentinus M Aaron Q) -->