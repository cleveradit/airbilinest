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
        <title><?php echo $lang['about_us']; ?> - AirBiliNest</title>
        <link rel="shortcut icon" type="image/x-icon" href="../../assets/ICONMKA.ico" />
        <link rel="stylesheet" href="about.css?v=<?= filemtime('about.css') ?>">
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
                <a href="about.php"><?php echo $lang['about_us']; ?></a>
                <a href="https://airbilinest.com/bili/bili.php"><?php echo $lang['hyperbilirubinemia']; ?></a> 
                <a href="https://airbilinest.com/product/product.php"><?php echo $lang['products']; ?></a>
                <a href="../clincial/evidence.php"><?php echo $lang['clinical_evidence']; ?></a>
                <a href="https://airbilinest.com/contact/contact.php"><?php echo $lang['contact']; ?></a>
                <a href="../faq/faq.php"><?php echo $lang['faq']; ?></a>
                <a href="../news/news.php"><?php echo $lang['updates']; ?></a>
            </nav>
            
            <button class="menu-toggle" onclick="toggleMenu()">☰</button>
            <script src="script.js"></script>
        </header>

        <section class="info">
            <div class="info_div">
                <img src="../../assets/airbilinest_logo.png" alt="Logo" class="info_image">
            </div>
            <div class="info_div">
                <p><?php echo $lang['about_description']; ?></p>
            </div>
        </section>  

        

        <section class="roadmap">
            <h1 class="roadmap_title"><?php echo $lang['roadmap_title']; ?></h1>

            <div class="timeline-container"> 

                <div class="timeline-toggle">
                        <button onclick="toggleRoadmap()"><?php echo $lang['show_roadmap']; ?></button>
                    </div>

                <div class="timeline-content" id="roadmapContent">
                    
                    <?php
                    // Loop through roadmap items
                    foreach ($lang['roadmap_items'] as $item) {
                        echo '
                        <div class="timeline-item">
                            <div class="date">' . $item['date'] . '</div>
                            <h2 class="RM-title">' . $item['title'] . '</h2>
                            <p class="RM_info">' . $item['description'] . '</p>
                            <p class="RM_dana">' . $item['dana'] . '</p>
                        </div>
                        ';
                    }
                    ?>
                </div>
            </div>

            <!-- <div class="timeline-container">             
                <div class="timeline-content" id="roadmapContent">

                    <div class="timeline-item">
                        <div class="date">2017</div>
                        <h2 class="RM-title">RnD Preliminary Study of AirBiliNest: Analysis of the Effectiveness of Phototherapy Management in Neonates in a Resource-Limited Area</h2>
                        <p class="RM_info">"Analysis of the Effectiveness of Phototherapy Management in Neonates in a Resource-Limited Area"</p>
                    </div>

                    <div class="timeline-item">
                        <div class="date">2017</div>
                        <h2 class="RM-title">RnD Preliminary Study of AirBiliNest: Variation in Management of Neonatal Hyperbilirubinemia in Indonesia</h2>
                        <p class="RM_info">"Variations in Management of Neonatal Hyperbilirubinemia in Indonesia"</p>
                    </div>

                    <div class="timeline-item">
                        <div class="date">2018</div>
                        <h2 class="RM-title">RnD Preliminary Study AirBiliNest : Adherence to hyperbilirubinemia guidelines by midwives, general practitioners, and pediatricians in Indonesia</h2>
                        <p class="RM_info">"Adherence to hyperbilirubinemia guidelines by midwives, general practitioners, and pediatricians in Indonesia"</p>
                    </div>

                    <div class="timeline-item">
                        <div class="date">2018</div>
                        <h2 class="RM-title">RnD Preliminary Study of AirBiliNest: Early detection of hyperbilirubinemia with transcutaneous bilirubinometer by pediatricians in primary health care</h2>
                        <p class="RM_info">"Early detection of hyperbilirubinemia with transcutaneous bilirubinometer by pediatricians in primary health care"</p>
                    </div>

                    <div class="timeline-item">
                        <div class="date">2018</div>
                        <h2 class="RM-title">RnD Preliminary Study of AirBiliNest: Evaluation of Smartphone-Based Screening Tool for Jaundice in Infants in Java, Indonesia (Analytical Study of Effectiveness & Efficiency of Collaborative Multicenter Study) Indonesia, Netherlands, Norway</h2>
                        <p class="RM_info">"Evaluation of Smartphone-Based Screening Tool for Jaundice in Infants in Java, Indonesia (Analytical Study of Effectiveness & Efficiency Collaborative Multicenter Study) Indonesia, Netherlands, Norway"</p>
                    </div>

                    <div class="timeline-item">
                        <div class="date">2018</div>
                        <h2 class="RM-title">RnD Preliminary Study of AirBiliNest: Analysis of Radiation Intensity Reduction Level of Various Phototherapy Devices</h2>
                        <p class="RM_info">"Analysis of the Level of Reduction in Radiation Intensity of Various Phototherapy Devices"</p>
                    </div>

                    <div class="timeline-item">
                        <div class="date">2019</div>
                        <h2 class="RM-title">RnD Preliminary Study of AirBiliNest: Current phototherapy practice on Java, Indonesia</h2>
                        <p class="RM_info">"Current phototherapy practice on Java, Indonesia".</p>
                    </div>

                    <div class="timeline-item">
                        <div class="date">2019</div>
                        <h2 class="RM-title">RnD Preliminary Study of AirBiliNest: Implementation of Mobile App Guideline for Hyperbilirubinemia in Indonesia - First Year</h2>
                        <p class="RM_info">"Implementation of Mobile App Guideline (BiliNorm) Hyperbilirubinemia in Indonesia-First Year"</p>
                    </div>

                    <div class="timeline-item">
                        <div class="date">2019</div>
                        <h2 class="RM-title">RnD Preliminary Study of AirBiliNest: National Guidelines for Hyperbilirubinemia</h2>
                        <p class="RM_info">"Implementation of Smartphone-Based Decision Support Tool for Hyperbilirubinemia Management in East Java"</p>
                    </div>

                    <div class="timeline-item">
                        <div class="date">2020</div>
                        <h2 class="RM-title">RnD Preliminary Study of AirBiliNest: Implementation of Mobile App Guideline (BiliNorm) Hyperbilirubinemia in Indonesia-Second Year</h2>
                        <p class="RM_info">"Implementation of Mobile App Guideline (BiliNorm) Hyperbilirubinemia in Indonesia-Second Year".</p>
                    </div>

                    <div class="timeline-item">
                        <div class="date">2020</div>
                        <h2 class="RM-title">RnD Studi Pendahuluan AirBiliNest : Transcutaneous bilirubin level to predict hyperbilirubinemia in preterm neonates</h2>
                        <p class="RM_info">"Transcutaneous bilirubin level to predict hyperbilirubinemia in preterm neonates"</p>
                    </div>

                    <div class="timeline-item">
                        <div class="date">2021</div>
                        <h2 class="RM-title">RnD Preliminary Study AirBiliNest: Diagnostic Properties of a Portable Point-of-Care Method to Measure Bilirubin and a Transcutaneous Bilirubinometer in Jaundiced Indonesian Newborn Infants</h2>
                        <p class="RM_info">"Diagnostic Properties of a Portable Point-of-Care Method to Measure Bilirubin and a Transcutaneous Bilirubinometer in Jaundiced Indonesian Newborn Infants"</p>
                    </div>

                    <div class="timeline-item">
                        <div class="date">2021</div>
                        <h2 class="RM-title">RnD AirBiliNest Preliminary Study: The knowledge of Indonesian pediatric residents on hyperbilirubinemia management</h2>
                        <p class="RM_info">"The knowledge of Indonesian pediatric residents on hyperbilirubinemia management"</p>
                    </div>

                    <div class="timeline-item">
                        <div class="date">2022</div>
                        <h2 class="RM-title">RnD AirBiliNest Pre-Star-Up BRIN</h2>
                        <p class="RM_info"></p>
                    </div>

                    <div class="timeline-item">
                        <div class="date">2023</div>
                        <h2 class="RM-title">RnD Community Service Neonatal Management Update Samboja AirBiliNest RKAT Faculty of Medicine Community Service LPPM UNAIR</h2>
                        <p class="RM_info">"Efforts to Improve Service Quality and Treatment Outcomes in Neonatal Jaundice Cases through Socialization and Training Activities"</p>
                    </div>

                    <div class="timeline-item">
                        <div class="date">2023</div>
                        <h2 class="RM-title">RnD AirBiliNest Matching Fund Kedaireka (AirBiliNest MKA-01) 2023</h2>
                        <p class="RM_info">"Smart Phototherapy System Airlangga Bilirubin Nesting (AirBiliNest) as a Portable Phototherapy Device for the Management of Jaundice in Babies in Indonesia"</p>
                    </div>

                    <div class="timeline-item">
                        <div class="date">2023</div>
                        <h2 class="RM-title">RnD AirBiliNest International Research Collaboration Top *100 (IRC) 2023 (AirBiliNest MKA-01)</h2>
                        <p class="RM_info">"Evaluation of New Portable Phototherapy Device for Neonatal Hyperbilirubinemia"</p>
                    </div>

                    <div class="timeline-item">
                        <div class="date">2024</div>
                        <h2 class="RM-title">About Innovation Development: Commercialization of AirBiliNest as a Portable Stasioner Phototherapy Solution for Handling Yellow Babies in Indonesia</h2>
                        <p class="RM_info">BPBRIN Airlangga University AirBiliNest Downstream Fund Assistance 2024-First Years</p>
                    </div>

                    <div class="timeline-item">
                        <div class="date">2025</div>
                        <h2 class="RM-title">About Innovation Development: Commercialization of AirBiliNest as a  Portable Phototherapy Solution for Handling Yellow Babies in Indonesia</h2>
                        <p class="RM_info">BPBRIN Airlangga University AirBiliNest Downstream Fund Assistance 2024-Second Years</p>
                    </div>

                    <div class="timeline-item">
                        <div class="date">2025</div>
                        <h2 class="RM-title">IoT-Based Innovations in Phototherapy: A Study of AirBiliNest's Comprehensive Monitoring System</h2>
                        <p class="RM_info">BPBRIN PKS Output Plan (cooperation agreement) with PT.MKA</p>
                    </div>
                </div>
            </div> -->
        </section>

        <section class="member">
            <h2 class="member_maintitle">
                <?php echo $lang['meet_the_team']; ?>
            </h2>
            <div class="member_info">
            <div class="members">
                <img src="assets/reza2.png" class="member_photo">
                <h3 class="member_title">
                    <?php echo $lang['ceo_title']; ?> <br>
                    <?php echo $lang['ceo_name']; ?>
                </h3>
                <p class="member_text">
                    <?php echo $lang['ceo_role']; ?>
                </p>
            </div>
            <div class="members">
                <img src="assets/aaron.png" class="member_photo">
                <h3 class="member_title">
                    <?php echo $lang['cto_title']; ?> <br>
                    <?php echo $lang['cto_name']; ?>
                </h3>
                <p class="member_text">
                    <?php echo $lang['cto_role']; ?>
                </p>
            </div>
        </div>
        <div class="member_advisory">
            <div class="members">
                <img src="assets/mahendra.png" class="member_photo">
                <h3 class="member_title">
                    <?php echo $lang['cmo_title']; ?> <br>
                    <?php echo $lang['cmo_name']; ?>
                </h3>
                <p class="member_text">
                    <?php echo $lang['cmo_role']; ?>
                </p>
            </div>
            <div class="members">
                <img src="assets/zaidan2.png" class="member_photo">
                <h3 class="member_title">
                    <?php echo $lang['cino_title']; ?> <br>
                    <?php echo $lang['cino_name']; ?>
                </h3>
                <p class="member_text">
                    <?php echo $lang['cino_role']; ?>
                </p>
            </div>
            <div class="members">
                <img src="assets/nafik.png" class="member_photo">
                <h3 class="member_title">
                    <?php echo $lang['cfo_title']; ?> <br>
                    <?php echo $lang['cfo_name']; ?>
                </h3>
                <p class="member_text">
                    <?php echo $lang['cfo_role']; ?>
                </p>
            </div>
        </div>
        </section>

        <footer>
            <div class="footer-container">
                <div class="footer-section logo-info">
                    <img src="../../assets/airbilinest_logo.png" alt="Logo" class="footer-logo">
                    <img src="../../assets/medika_logo.png" alt="Logo" class="footer-logo">
                    <!-- <img src="../../assets/idsmed_logo.png" alt="Logo" class="footer-logo">
                    <img src="../../assets/aski_logo2.png" alt="Logo" class="footer-logo"> -->
                    <!-- <img src="../../assets/unair_biru_logo.png" alt="Logo" class="footer-logo"> -->
                    
                    <div class="social-icons">
                        <a href="https://www.instagram.com/medika.karya.airlangga" target="_blank" class="fa-brands fa-instagram fa-4x"></a>
                        <a href="https://www.linkedin.com/company/pt-medika-karya-airlangga" target="_blank" class="fa-brands fa-linkedin fa-4x"></a>
                        <a href="https://www.youtube.com/@airbilinestofficial8761" target="_blank" class="fa-brands fa-youtube fa-4x"></a>
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