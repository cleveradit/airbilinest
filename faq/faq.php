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
        <title><?php echo $lang['faq_title']; ?></title>
        <link rel="shortcut icon" type="image/x-icon" href="../assets/ICONMKA.ico" />
        <link rel="stylesheet" href="faq.css?v=<?= filemtime('faq.css') ?>">
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
                <a href="../testimonials/testimonial.php"><?php echo $lang['testimonial']; ?></a>
                <a href="../order/order.php"><?php echo $lang['order_here']; ?></a>
                <a href="../contact/contact.php"><?php echo $lang['contact']; ?></a>
                <a href="faq.html"><?php echo $lang['faq']; ?></a>
            </nav>
            <button class="menu-toggle" onclick="toggleMenu()">☰</button>


            <script src="faq.js"></script>
        </header>

        <!-- FaQ Sections -->
        <div class="faq_header">
            <div class="faq_info">
                <p class="faq_title">
                    <?php echo $lang['faq_main_title']; ?>
                </p>
                <br>
                <p class="faq_text">
                    <?php echo $lang['faq_subtitle']; ?>
                </p>
            </div>
            <div class="faq_info">
                <img src="../assets/placholder1.png" alt="Airbilinest" class="feature_image">
            </div>
        </div>

        <div class="faq-container">
            <div class="faq-tabs">
                <button class="tab active" data-category="faq"><?php echo $lang['faq_tab']; ?></button>
                <button class="tab" data-category="neonatal"><?php echo $lang['neonatal_tab']; ?></button>
                <button class="tab" data-category="airbilinest"><?php echo $lang['airbilinest_tab']; ?></button>
                <button class="tab" data-category="medikakaryaairlangga"><?php echo $lang['medika_tab']; ?></button>
            </div>
        
            <div class="faq-section">
                <div class="faq-item" data-category="neonatal">
                    <button class="faq-question">1. <?php echo $lang['faq_question1']; ?></button>
                    <div class="faq-answer">
                        <p><?php echo $lang['faq_answer1']; ?></p>
                    </div>
                </div>
        
                <div class="faq-item" data-category="neonatal">
                    <button class="faq-question">2. <?php echo $lang['faq_question2']; ?></button>
                    <div class="faq-answer">
                        <p><?php echo $lang['faq_answer2']; ?></p>
                    </div>
                </div>
        
                <div class="faq-item" data-category="airbilinest">
                    <button class="faq-question">3. <?php echo $lang['faq_question3']; ?></button>
                    <div class="faq-answer">
                        <p><?php echo $lang['faq_answer3']; ?></p>
                    </div>
                </div>
        
                <div class="faq-item" data-category="medikakaryaairlangga">
                    <button class="faq-question">4. <?php echo $lang['faq_question4']; ?></button>
                    <div class="faq-answer">
                        <p><?php echo $lang['faq_answer4']; ?></p>
                    </div>
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