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
include("lang/$language.php");
?>

<!DOCTYPE html>
<html lang="<?php echo $language; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $lang['hcp_title']; ?></title>
    <meta name="description" content="Airbilinest">
    <meta name="keywords" content="airbilinest, medika karya airlangga, airlangga bilirubin nesting">
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-TPWWLRDNQ4"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-TPWWLRDNQ4');
    </script>
    <link rel="shortcut icon" type="image/x-icon" href="../assets/ICONMKA.ico" />
    <link rel="stylesheet" href="main.css?v=<?= filemtime('main.css') ?>">
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
            <a href="about/about.php"><?php echo $lang['about_us']; ?></a>
            <a href="bili/bili.php"><?php echo $lang['hyperbilirubinemia']; ?></a> 
            <a href="product/product.php"><?php echo $lang['products']; ?></a>
            <a href="clinical/evidence.php"><?php echo $lang['clinical_evidence']; ?></a>
            <a href="../contact/contact.php"><?php echo $lang['contact']; ?></a>
            <a href="faq/faq.php"><?php echo $lang['faq']; ?></a>
            <a href="news/news.php"><?php echo $lang['updates']; ?></a>
            <?php
            if (isset($_SESSION['user_id'])) {
                // Jika pengguna sudah login, tampilkan tombol Profil
                echo '<a href="profile/profile.php"><i class="fa fa-user"></i> ' , $_SESSION['username'] , '</a>';
            } else {
                // Jika pengguna belum login, tampilkan tombol Login
                echo '<a href="login.php"><i class="fa fa-user"></i> ' , $lang['login'] , '</a>';
            }
            ?>
        </nav>
        <button class="menu-toggle" onclick="toggleMenu()">☰</button>

        <script src="script.js"></script>
    </header>

    <!-- Language Switcher -->
    <section class="language-switcher-sec">
        <div class="language-switcher">
            <a href="?lang=en">English</a> | 
            <a href="?lang=id">Bahasa Indonesia</a>
        </div>
    </section>

    <!-- Hero Section --> 
    <section class="HCP-section">
        
        <div class="HCP-public">
            <h1>
                <a href="https://airbilinest.com"><i class="fa fa-chevron-left"></i> <?php echo $lang['back_to_public']; ?></a>
            </h1>
        </div>
        <div class="HCP-public">
            <h1>
                <?php echo $lang['hcp_main_title']; ?>
            </h1>
        </div>
    </section>

    <section class="hero">
        <div class="hero-text">
            <h1><?php echo $lang['hero_title']; ?></h1>
            <p><?php echo $lang['hero_description']; ?></p>
        </div>
    </section>

    <section class="foto_cont">
        <div class="foto_sec">
            <img src="assets/Background_3.jpg" alt="Airbilinest" class="Foto_image">
        </div>
    </section>

    <!-- VIDEO TESTI -->
    <section class="video-testi">
        <video class="videoPlayer active" muted autoplay controls>
            <source src="../assets/Testi_drMahe.mp4" type="video/mp4">
            Browser Anda tidak mendukung tag video.
        </video>
        <!-- <video class="videoPlayer" controls muted>
            <source src="../assets/Testi_drFaizi.mp4" type="video/mp4">
            Browser Anda tidak mendukung tag video.
        </video>
        <video class="videoPlayer" controls muted>
            <source src="../assets/Testi_Zaidan.mp4" type="video/mp4">
            Browser Anda tidak mendukung tag video.
        </video>
        <video class="videoPlayer" controls muted>
            <source src="../assets/Testi_drSulistawati.mp4" type="video/mp4">
            Browser Anda tidak mendukung tag video.
        </video>
        <video class="videoPlayer" controls muted>
            <source src="../assets/Testi_drAri.mp4" type="video/mp4">
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

    <section class="bili">
        <p><?php echo $lang['caption_video']; ?></p>
        <br>
        <h1><?php echo $lang['hyperbilirubinemia_title']; ?></h1>
        <p><?php echo $lang['hyperbilirubinemia_description']; ?></p>
        <a href="../bili/bili.php"><?php echo $lang['learn_more_bili']; ?></a>
    </section>

    <section class="about">
        <div class="about_image">
            <img src="../assets/App_logo.png" alt="Airbilinset logo">
        </div>
        <div class="about_text">
            <h1><?php echo $lang['about_title']; ?></h1>
            <p><?php echo $lang['about_description']; ?></p>
        </div>
    </section>

    <section class="features-section">
        <div class="feature">
            <h2><?php echo $lang['feature_title_1']; ?></h2>
            <p><?php echo $lang['feature_text_1']; ?></p>
        </div>
        <div class="feature">
            <img src="../assets/placholder1.png" alt="Airbilinest" class="feature_image">
        </div>
        <div class="feature">
            <h2><?php echo $lang['feature_title_2']; ?></h2>
            <p><?php echo $lang['feature_text_2']; ?></p>
        </div>
        <div class="feature">
            <img src="../assets/mka02.png" alt="Airbilinest" class="feature_image">
        </div>
        <div class="feature">
            <h2><?php echo $lang['feature_title_3']; ?></h2>
            <p><?php echo $lang['feature_text_3']; ?></p>
        </div>
        <div class="feature">
            <img src="../assets/mka03_1.png" alt="Airbilinest" class="feature_image">
        </div>
    </section>

    <section class="card">
        <div class="info-section">
            <div class="info-card">
                <h2><?php echo $lang['clinical_evidence']; ?></h2>
                <p><?php echo $lang['clinical_evidence_description']; ?></p>
                <a href="clinical/evidence.php"><?php echo $lang['learn_more']; ?></a>
            </div>
            <div class="info-card">
                <h2><?php echo $lang['products']; ?></h2>
                <p><?php echo $lang['products_description']; ?></p>
                <a href="product/product.php"><?php echo $lang['learn_more']; ?></a>
            </div>
            <div class="info-card">
                <h2><?php echo $lang['hyperbilirubinemia']; ?></h2>
                <p><?php echo $lang['hyperbilirubinemia_description_card']; ?></p>
                <a href="../bili/bili.php"><?php echo $lang['learn_more']; ?></a>
            </div>
            <div class="info-card">
                <h2><?php echo $lang['about_us']; ?></h2>
                <p><?php echo $lang['about_us_description']; ?></p>
                <a href="about/about.php"><?php echo $lang['learn_more']; ?></a>
            </div>
            <div class="info-card">
                <h2><?php echo $lang['order_now']; ?></h2>
                <p><?php echo $lang['order_now_description']; ?></p>
                <a href="../order/order.php"><?php echo $lang['learn_more']; ?></a>
            </div>
            <div class="info-card">
                <h2><?php echo $lang['faq']; ?></h2>
                <p><?php echo $lang['faq_description']; ?></p>
                <a href="faq/faq.php"><?php echo $lang['learn_more']; ?></a>
            </div>
        </div>
    </section>

    <section class="bilinorm">
        <div class="bilinorm-profile">
            <div claas="bilinorm-feature">
                <img src="assets/bilinorm.png" alt="Bilinorm" class="bilinorm-image">
            </div>
            <div class="bilinorm-feature">
                <h1><?php echo $lang['bilinorm_title']; ?></h1>
                <p><?php echo $lang['bilinorm_description']; ?></p>
                <a href="https://www.bilinorm.babyhealthsby.org/#/intro" target="_blank">
                    <button><?php echo $lang['bilinorm_button_1']; ?></button>
                </a> 
                <br>
                <a href="https://doi.org/10.21203/rs.3.rs-78142/v1">
                    <button><?php echo $lang['bilinorm_button_2']; ?></button>
                </a>
            </div>       
        </div>
    </section>

    <section class="airbilinest_apk">
        <div class="apk-profile">
            <div claas="apk-feature">
                <img src="assets/airbilinest_apk2.jpg" alt="AirBiliNest APK" class="airbilinest-apk-image">
                <img src="assets/airbilinest_apk1.jpg" alt="AirBiliNest APK" class="airbilinest-apk-image">
            </div>
            <div class="apk-feature">
                <h1><?php echo $lang['apk_title']; ?></h1>
                <p><?php echo $lang['apk_description']; ?></p>
                <a href="download/download.php">
                    <button><?php echo $lang['apk_button']; ?></button>
                </a> 
                <br>
            </div>       
        </div>
    </section>

    <footer>
        <div class="footer-container">
            <div class="footer-section logo-info">
                <img src="../assets/airbilinest_logo.png" alt="Logo" class="footer-logo">
                <img src="../assets/medika_logo.png" alt="Logo" class="footer-logo">
                <!-- <img src="../assets/idsmed_logo.png" alt="Logo" class="footer-logo">
                <img src="../assets/aski_logo2.png" alt="Logo" class="footer-logo"> -->
                <!-- <img src="../assets/unair_biru_logo.png" alt="Logo" class="footer-logo"> -->
                
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
                    <li><a href="clinical/evidence.php"><?php echo $lang['clinical_evidence']; ?></a></li>
                    <li><a href="../contact/contact.php"><?php echo $lang['contact']; ?></a></li>
                    <li><a href="faq/faq.php"><?php echo $lang['faq']; ?></a></li>
                </ul>
            </div>
    
            <div class="footer-section helpful-links">
                <h3><?php echo $lang['helpful_links']; ?></h3>
                <ul>
                    <li><a href="download/download.php"><i class="fa fa-download"></i> <?php echo $lang['download']; ?></a></li>
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