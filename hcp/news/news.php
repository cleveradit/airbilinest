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

<html lang="en">

    <head>

        <meta charset="UTF-8">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Products</title>

        <link rel="shortcut icon" type="image/x-icon" href="../assets/ICONMKA.ico" />

        <link rel="stylesheet" href="news.css?v=<?= filemtime('news.css') ?>">

         <!-- <link rel="stylesheet" href="news.css"> -->

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

                <a href="https://airbilinest.com/hcp/about/about.php"><?php echo $lang['about_us']; ?></a>

                <a href="https://airbilinest.com/bili/bili.php"><?php echo $lang['hyperbilirubinemia']; ?></a> 

                <a href="https://airbilinest.com/hcp/product/product.php"><?php echo $lang['products']; ?></a>

                <a href="https://airbilinest.com/hcp/clinical/evidence.php"><?php echo $lang['clinical_evidence']; ?></a>

                <a href="https://airbilinest.com/contact/contact.php"><?php echo $lang['contact']; ?></a>

                <a href="https://airbilinest.com/faq/faq.php"><?php echo $lang['faq']; ?></a>

                <a href="https://airbilinest.com/hcp/news/news.php"><?php echo $lang['updates']; ?></a>

                
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

            <!--<a href="#" class="cta-button">Healthcare professionals</a>-->

        </header>



        <section class="card">

            <p class="clinical_title">

                <b>Updates</b>

            </p>

            <div class="info-section">

                <h2>2024</h2>

                <!-- 2024 -->

                <div class="info-card">

                    <h2>Unair Luncurkan Produk Inovasi, Dorong Pemanfaatan Teknologi untuk Masyarakat"</h2>

                    <p>kominfo.jatimprov.go.id |  21 November 2024</p>

                    <a href="https://kominfo.jatimprov.go.id/berita/unair-luncurkan-produk-inovasi-dorong-pemanfaatan-teknologi-untuk-masyarakat" target="_blank">Learn more</a>

                </div>

                <div class="info-card">

                    <h2>UNAIR Luncurkan Produk Inovasi, Dorong Pemanfaatan Teknologi untuk Masyarakat"</h2>

                    <p>UNAIR News |  21 November 2024</p>

                    <a href="https://unair.ac.id/unair-luncurkan-produk-inovasi-dorong-pemanfaatan-teknologi-untuk-masyarakat/" target="_blank">Learn more</a>

                </div>



                <h2>2023</h2>

                <div class="info-card">

                    <h2>Luncurkan Lima Produk Inovasi, ASSIE Unair 2023 Diikuti 50 Peserta Start-Up"</h2>

                    <p>harian.disway.id | 2 December 2023</p>

                    <a href="https://harian.disway.id/read/746933/luncurkan-lima-produk-inovasi-assie-unair-2023-diikuti-50-peserta-start-up" target="_blank">Learn more</a>

                </div>

                <div class="info-card">

                    <h2>FK Unair Gelar Pelatihan Inovasi Tatalaksana Bayi Kuning</h2>

                    <p>Harian Bhirawa | 24 July 2023</p>

                    <a href="../assets/Harian_Bhirawa.jpg" target="_blank">Learn more</a>

                </div>

                <div class="info-card">

                    <h2>FK UNAIR Gelar Sosialisasi dan Pelatihan Inovasi Tatalaksana Bayi Kuning di Kalimantan Timur</h2>

                    <p>UNAIR News | 21 July 2023</p>

                    <a href="https://unair.ac.id/fk-unair-gelar-sosialisasi-dan-pelatihan-inovasi-tatalaksana-bayi-kuning-di-kalimantan-timur/" target="_blank">Learn more</a>

                </div>

                <div class="info-card">

                    <h2>FK UNAIR Hadirkan 4 Inovasi untuk Penanganan Bayi Kuning </h2>

                    <p>BASRA (Berita Anak Surabaya) / Kumparan.com  | 21 July 2023</p>

                    <a href="https://kumparan.com/beritaanaksurabaya/fk-unair-hadirkan-4-inovasi-untuk-penanganan-bayi-kuning-20psEWE0UtD" target="_blank">Learn more</a>

                </div>

                <div class="info-card">

                    <h2>Peduli Tingginya Kasus Bayi Kuning, FK Unair Gelar Pengmas Di Kalimantan Timur</h2>

                    <p>Cakrawarta.com | 21 July2023</p>

                    <a href=" https://www.cakrawarta.com/peduli-tingginya-kasus-bayi-kuning-fk-unair-gelar-pengmas-di-kalimantan-timur.html" target="_blank">Learn more</a>

                </div>

                <div class="info-card">

                    <h2>FK Unair Gelar Sosialisasi dan Pelatihan Inovasi Tatalaksana Bayi Kuning di Kalimantan Timur</h2>

                    <p>Beritalima.com | 21 July 2023</p>

                    <a href="https://beritalima.com/fk-unair-gelar-sosialisasi-dan-pelatihan-inovasi-tatalaksana-bayi-kuning-di-kalimantan-timur/ " target="_blank">Learn more</a>

                </div>

                <div class="info-card">

                    <h2>Pengabdian Mmasyarakat FK UNAIR</h2>

                    <p>Instagram Universitas Airlangga (Sub Tema: UNAIR Weekly) | 24 July 2023</p>

                    <a href="https://www.instagram.com/p/CvFOlfXJMEs/?utm_source=ig_web_copy_link&igshid=MzRlODBiNWFlZA== " target="_blank">Learn more</a>

                </div>



                <div class="info-card">

                    <h2>FK Uair Gelar Sosisalisasi dan Pelatihan Inovasi Tatalakasana Bayi Kuning di Kalimantan Timur</h2>

                    <p>HKS-News | 22 July 2023</p>

                    <a href="https://hks-news.com/2023/07/22/fk-unair-gelar-sosialisasi-dan-pelatihan-inovasi-tatalaksana-bayi-kuning-di-kalimantan-timur/ " target="_blank">Learn more</a>

                </div>

                <div class="info-card">

                    <h2>Pengabdian Masyarakat "Sosialisasi dan Pelatihan Inovvasi Tatalaksana Bayi Kuning di RSUD ABADI Samboja Kutai Kartanegara bekerjasama dengan Neonatal Research Group FK UNAIR"</h2>

                    <p>Instagram RSUD Aji Batara Agung Dewa Sakti | 27 July 2023</p>

                    <a href="https://www.instagram.com/p/CvLkNXMPHu4/?utm_source=ig_web_copy_link&igshid=MzRlODBiNWFlZA== " target="_blank">Learn more</a>

                </div>



                <h2>2022</h2>



                <!-- 2022 -->

                <div class="info-card">

                    <h2>Smart Phototerherapy System Atasi Hiperbilirubinemia atau Bayi Kuning pada Bayi Baru Lahir</h2>

                    <p>TVOneNews | 17 January 2022</p>

                    <a href="https://www.tvonenews.com/daerah/jatim/23128-smart-phototerherapy-system-atasi-hiperbilirubinemia-atau-bayi-kuning-pada-bayi-baru-lahir?page=1" target="_blank">Learn more</a>

                </div>

                <div class="info-card">

                    <h2>Unair Kembangkan AirBiliNest, Permudah Fototerapi Bayi Kuning di Rumah</h2>

                    <p>thephrase.id | 11 January 2022</p>

                    <a href="https://thephrase.id/unair-kembangkan-airbilinest-permudah-fototerapi-bayi-kuning-di-rumah" target="_blank">Learn more</a>

                </div>

                <div class="info-card">

                    <h2>Peneliti Unair Berhasil Ciptakan Alat Fototerapi Bayi 'Kuning' di Rumah</h2>

                    <p>optika.id | 05 January 2022</p>

                    <a href="https://optika.id/peneliti-unair-berhasil-ciptakan-alat-fototerapi-bayi-kuning-di-rumah" target="_blank">Learn more</a>

                </div>

                <div class="info-card">

                    <h2>AirBiliNest, Inovasi Sistem Fototerapi Rancangan Unair yang Bisa Digunakan di Rumah</h2>

                    <p>Akurat.co | 03 January 2022</p>

                    <a href="https://www.akurat.co/infotech/1302335015/topik-khusus.html" target="_blank">Learn more</a>

                </div>

                

            </div>

        </section>

    </body>



    <footer>

        <div class="footer-container">

            <div class="footer-section logo-info">

                <img src="../../assets/airbilinest_logo.png" alt="Logo" class="footer-logo">

                <p>Airlangga Bilirubin Nesting</p>

                <div class="social-icons">

                    <a href="https://www.instagram.com/medika.karya.airlangga" target="_blank" class="fa-brands fa-instagram fa-3x" ></a>

                    <a href="https://www.linkedin.com/company/pt-medika-karya-airlangga" target="_blank" class="fa-brands fa-linkedin fa-3x"></a>

                    <a href="https://www.youtube.com/@airbilinestofficial8761" target="_blank" class="fa-brands fa-youtube fa-3x"></a>

                </div>

            </div>

    

            <div class="footer-section map">

                <h3>Location</h3>

                <div class="map-container">

                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.530592141325!2d112.8093733745464!3d-7.294123771697154!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7f1d8a8b76b2f%3A0x31b6896ab51b7f68!2sPT%20Medika%20Karya%20Airlangga!5e0!3m2!1sid!2sid!4v1731075785294!5m2!1sid!2sid" 

                    width="auto" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>    

                </div>

            </div>

        </div>



        <div class="footer-ending">

            <p>© 2025 AirBiliNest | All Rights Reserved</p>

        </div>

        

    </footer>

    

</html>

