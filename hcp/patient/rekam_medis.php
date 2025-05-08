<?php
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

if (!isset($_SESSION['user_id'])) {

    header("Location: ../login.php"); // Redirect jika belum login

    exit();
}



include '../includes/db.php';



$user_id = $_SESSION['user_id'];

$sql = "SELECT * FROM users WHERE id='$user_id'";

$result = $conn->query($sql);

$user = $result->fetch_assoc();

$patient_id = $_GET['id'];

$sql = "SELECT * FROM patients WHERE id='$patient_id'";

$result_patient = $conn->query($sql);

$patient = $result_patient->fetch_assoc();

$sql = "SELECT m.*, p.nama_pasien, u.username as nama_dokter FROM medical_records AS m JOIN patients AS p ON p.id = m.patient_id JOIN users AS u ON u.id = m.user_id WHERE m.patient_id='$patient_id'";
$result_medical_record = $conn->query($sql);
$medical_records = [];

if ($result_medical_record->num_rows > 0) {
    while ($row = $result_medical_record->fetch_assoc()) {
        $medical_records[] = $row;
    }
}

include '../includes/url.php';



?>



<!DOCTYPE html>

<html lang="<?php echo $language; ?>">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php echo $lang['patient']; ?> - AirBiliNest</title>

    <link rel="shortcut icon" type="image/x-icon" href="../../assets/ICONMKA.ico" />

    <link rel="stylesheet" href="patient.css?v=<?= filemtime('patient.css') ?>">

    <script src="https://kit.fontawesome.com/4374ec9f4f.js" crossorigin="anonymous"></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/2.3.0/css/dataTables.bootstrap4.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/3.2.3/css/buttons.dataTables.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/responsive/3.0.4/css/responsive.dataTables.css" rel="stylesheet">

    <script src="https://kit.fontawesome.com/4374ec9f4f.js" crossorigin="anonymous"></script>

</head>

<body>

    <header class="header_cust">

        <div class="logo">

            <a href="https://airbilinest.com/hcp/hcp.php">

                <img src="../../assets/airbilinest_logo.png" alt="Logo">

            </a>

        </div>

        <nav id="navbar_cust" class="navbar_cust">

            <a href="../hcp.php">Home</a>

            <a href="../about/about.php">About Us</a>

            <a href="../bili/bili.php">Hiperbilirubinemia</a>

            <a href="../product/product.php">Products</a>

            <a href="../clinical/evidence.php">Clinical Evidence</a>

            <a href="../../contact/contact.php">Contact</a>

            <a href="../faq/faq.php">FAQ</a>

            <a href="../news/news.php"><?php echo $lang['updates']; ?></a>


            <?php
            if (isset($_SESSION['user_id'])) {

                // Jika pengguna sudah login, tampilkan tombol Profil dan Pasien

                echo '<a href="patient.php">' . $lang['patient'] . '</a>';

                echo '<a href="../profile/profile.php"><i class="fa fa-user"></i> ', $_SESSION['username'], '</a>';
            }
            ?>

        </nav>

        <button class="menu-toggle-cust" onclick="toggleMenu()">☰</button>

    </header>

    <div class="info">

        <h1><?php echo $lang['history_patient']; ?> : <?php echo $patient['nama_pasien'] ?></h1>

        <div class="card p-3 shadow bg-white rounded">
            <div class="d-flex justify-content-between align-items-center">
            <button class="btn btn-sm btn-outline btn-outline-secondary" onclick="window.location.href='patient.php'"><?php echo $lang['back'] ?></button>
                <button class="btn btn-sm btn-primary" onclick="window.location.href='add_rekam_medis.php?id=<?php echo $patient['id'] ?>'">
                    + <?php echo $lang['add_medical_record'] ?>
                </button>
            </div>
            <hr>

            <table id="example_medical_records" class="table table-striped table-bordered display responsive nowrap" style="font-size:small">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Aksi</th>
                        <th>Tanggal</th>
                        <th>Pasien</th>
                        <th>Dokter</th>
                        <th>Bilinorm</th>
                        <th>Lama Fototerapi</th>
                        <th>Intensitas</th>
                        <th>Sebelum Fototerapi</th>
                        <th>Sesudah Fototerapi</th>
                        <th>Observasi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($medical_records as $index => $medical_record) { ?>
                        <tr>
                            <td><?php echo $index + 1 ?></td>
                            <td>
                                <a href="detail_rekam_medis.php?id=<?php echo $medical_record['id'] ?>" class="text-success" title="View Rekam Medis">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="#" class="text-danger" title="Delete" data-toggle="modal" data-target="#deleteMedicalRecordModal" data-id="<?= $medical_record['id'] ?>">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                            </td>
                            <td><?php echo $medical_record['tanggal_ambil_data'] ?></td>
                            <td><?php echo $medical_record['nama_pasien'] ?></td>
                            <td><?php echo $medical_record['nama_dokter'] ?></td>
                            <td><?php echo $medical_record['hasil_bilinorm'] ?></td>
                            <td><?php echo $medical_record['lama_fototerapi'] ?></td>
                            <td><?php echo $medical_record['intensitas_fototerapi'] ?></td>
                            <td>
                                TCB <?php echo $medical_record['tcb_sebelum_fototerapi'] ?>;
                                TSB<?php echo $medical_record['tsb_sebelum_fototerapi'] ?>
                            </td>
                            <td>
                                TCB<?php echo $medical_record['tcb_sesudah_fototerapi'] ?>;
                                TSB<?php echo $medical_record['tsb_sesudah_fototerapi'] ?>
                            </td>
                            <td><?php echo $medical_record['observasi'] ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

    </div>

    <div class="modal fade" id="deleteMedicalRecordModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <form action="delete_rekam_medis.php" method="POST">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Confirm Delete</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to delete this medical record?
                        <input type="hidden" name="medical_record_id" id="modal_medical_record_id">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger">Delete</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </form>
        </div>
    </div>




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





    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/2.3.0/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.3.0/js/dataTables.bootstrap4.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.2.3/js/dataTables.buttons.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.2.3/js/buttons.bootstrap4.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.2.3/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.2.3/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.2.3/js/buttons.colVis.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.4/js/dataTables.responsive.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.4/js/responsive.dataTables.js"></script>

    <script src="script.js"></script>

</body>

</html>