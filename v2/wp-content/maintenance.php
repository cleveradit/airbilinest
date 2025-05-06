<?php

//  ATTENTION!
//
//  DO NOT MODIFY THIS FILE BECAUSE IT WAS GENERATED AUTOMATICALLY,
//  SO ALL YOUR CHANGES WILL BE LOST THE NEXT TIME THE FILE IS GENERATED.
//  IF YOU REQUIRE TO APPLY CUSTOM MODIFICATIONS, PERFORM THEM IN THE FOLLOWING FILE:
//  /home/airj1347/public_html/v2/wp-content/maintenance/template.phtml


$protocol = $_SERVER['SERVER_PROTOCOL'];
if ('HTTP/1.1' != $protocol && 'HTTP/1.0' != $protocol) {
    $protocol = 'HTTP/1.0';
}

header("{$protocol} 503 Service Unavailable", true, 503);
header('Content-Type: text/html; charset=utf-8');
header('Retry-After: 600');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <link rel="icon" href="https://airbilinest.com/v2/wp-content/uploads/2025/02/airbilinest_logo-150x150.png">
    <link rel="stylesheet" href="https://airbilinest.com/v2/wp-content/maintenance/assets/styles.css?1744832062">
    <script src="https://airbilinest.com/v2/wp-content/maintenance/assets/timer.js?1744832062"></script>
    <title>Pemeliharaan Terjadwal</title>
    <style>body {background-image: url("https://airbilinest.com/v2/wp-content/maintenance/assets/images/bg.jpg?1744832062");}</style>
</head>

<body>

    <div class="container">

    <header class="header">
        <h1>Situs web ini sedang menjalani pemeliharaan terjadwal.</h1>
        <h2>Mohon maaf atas gangguan yang terjadi. Kembalilah beberapa saat lagi, kami akan segera siap!</h2>
    </header>

    <!--START_TIMER_BLOCK-->
        <!--END_TIMER_BLOCK-->

    <!--START_SOCIAL_LINKS_BLOCK-->
    <section class="social-links">
                    <a class="social-links__link" href="https://www.facebook.com/cPanel" target="_blank" title="Facebook">
                <span class="icon"><img src="https://airbilinest.com/v2/wp-content/maintenance/assets/images/facebook.svg?1744832062" alt="Facebook"></span>
            </a>
                    <a class="social-links__link" href="https://twitter.com/cPanel" target="_blank" title="Twitter">
                <span class="icon"><img src="https://airbilinest.com/v2/wp-content/maintenance/assets/images/twitter.svg?1744832062" alt="Twitter"></span>
            </a>
                    <a class="social-links__link" href="https://instagram.com/cPanel" target="_blank" title="Instagram">
                <span class="icon"><img src="https://airbilinest.com/v2/wp-content/maintenance/assets/images/instagram.svg?1744832062" alt="Instagram"></span>
            </a>
            </section>
    <!--END_SOCIAL_LINKS_BLOCK-->

</div>

<footer class="footer">
    <div class="footer__content">
        Didukung oleh WP Toolkit    </div>
</footer>

</body>
</html>
