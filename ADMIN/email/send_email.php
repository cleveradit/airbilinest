<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../PHPMailer/src/Exception.php';
require '../../PHPMailer/src/PHPMailer.php';
require '../../PHPMailer/src/SMTP.php';

// Ambil data dari form
$subject = $_POST['subject'];
$message = $_POST['message'];
$recipient_type = $_POST['recipient_type'];
$selected_emails = $_POST['selected_emails'] ?? [];

// Koneksi ke database
$host = 'localhost:3306';
$dbname = 'airj1347_airbilinest_HCP';
$username = 'airj1347_airbilinest_HCP';
$password = 'airbilinest_hcp';

// EMAIL
$email_pengirim = 'noreply@airbilinest.com';
$password_pengirim = 'noreply_123';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Ambil semua email dari database jika opsi "Kirim ke Semua" dipilih
    if ($recipient_type === 'all') {
        $stmt = $conn->query('SELECT email FROM users');
        $emails = $stmt->fetchAll(PDO::FETCH_COLUMN);
    } else {
        // Gunakan email yang dipilih manual
        $emails = $selected_emails;
    }

    // Konfigurasi PHPMailer
    $mail = new PHPMailer(true);

    // Server settings
    $mail->isSMTP();
    $mail->Host = 'mail.airbilinest.com'; // Ganti dengan SMTP host Anda
    $mail->SMTPAuth = true;
    $mail->Username = $email_pengirim; // Ganti dengan email Anda
    $mail->Password = $password_pengirim; // Ganti dengan password email Anda
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    // Pengirim
    $mail->setFrom($email_pengirim, 'AirBiliNest');

    // Isi email
    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body = "
                    <html>
                        <head>
                            <style>
                                /* CSS Inline untuk email */
                                .welcome {
                                    text-align: center;
                                    color: black;
                                    margin: 0;
                                }
                                .airbilinest-image {
                                    margin-top: 5px;
                                    width: 180px; /* Fixed width */
                                    max-width: 50%; /* Responsif */
                                    height: auto; /* Menjaga rasio aspek */
                                    margin-left: auto;
                                    margin-right: auto;
                                }
                                .small-text {
                                    font-size: 1em;
                                }
                                .footer {
                                    text-align: center;
                                    padding: 20px;
                                    background-color: #003060;
                                    color: white;
                                }
                                .icon-footer a {
                                    padding: 10px;
                                    text-decoration: none;
                                }
                                .footer a {
                                    color: white;
                                }
                            </style>
                        </head>
                        <body>
                            <div class='welcome'>
                                <div class='airbilinest-image'>
                                    <img src='https://airbilinest.com/assets/airbilinest_logo.png' alt='AirBiliNest Logo' style='width: 180px; height: auto;'>
                                </div>
                                <div class='pesan'>
                                    <p>
                                        $message
                                    </p>
                                </div>
                                <br>
                                <br>
                            </div>

                            <div class='footer'>
                                <div class='icon-footer'>
                                    <a href='https://airbilinest.com' target='_blank'>
                                        <img src='https://airbilinest.com/assets/browser_white.png' alt='Website' width='32' style='width: 32px; height: auto; display: inline-block;'>
                                    </a>
                                    <a href='https://www.instagram.com/medika.karya.airlangga' target='_blank'>
                                        <img src='https://airbilinest.com/assets/instagram_white.png' alt='Instagram' width='32' style='width: 32px; height: auto; display: inline-block;'>
                                    </a>
                                    <a href='https://www.linkedin.com/company/pt-medika-karya-airlangga' target='_blank'>
                                        <img src='https://airbilinest.com/assets/linkedin_white.png' alt='LinkedIn' width='32' style='width: 32px; height: auto; display: inline-block;'>
                                    </a>
                                    <a href='https://www.youtube.com/@airbilinestofficial8761' target='_blank'>
                                        <img src='https://airbilinest.com/assets/youtube_white.png' alt='YouTube' width='32' style='width: 32px; height: auto; display: inline-block;'>
                                    </a>
                                </div>
                                <p>
                                    This is an operational email from
                                    <a href='https://airbilinest.com' style='color: white; text-decoration: underline;'>
                                        <b>AirBiliNest.com</b>
                                    </a>
                                    <br>
                                    Part of Medika Karya Airlangga<br>
                                    phone: +62895339353678
                                </p>
                                <p>Contact: 
                                    <a href='mailto:admin.airbilinest@airbilinest.com' style='color: white; text-decoration: underline;'>
                                        admin.airbilinest@airbilinest.com
                                    </a>
                                </p>
                                <p>©2022-2032 AirBiliNest</p>
                            </div>
                        </body>
                    </html>
                ";
    $mail->AltBody = strip_tags($message);

    // Kirim email ke setiap alamat
    foreach ($emails as $email) {
        $mail->addAddress($email);
        $mail->send();
        $mail->clearAddresses(); // Bersihkan alamat sebelumnya
    }

    // Tampilkan pesan sukses dan tombol kembali
    echo "
        <div style='text-align: center; margin-top: 20px;'>
            <p>Email berhasil dikirim ke semua penerima.</p>
            <button onclick='window.location.href=\"email.php\"' style='padding: 10px 20px; background-color: #003060; color: white; border: none; cursor: pointer;'>
                Kembali ke Halaman email.php
            </button>
        </div>
    ";
} catch (Exception $e) {
    echo "
        <div style='text-align: center; margin-top: 20px;'>
            <p>Email tidak dapat dikirim. Error: {$mail->ErrorInfo}</p>
            <button onclick='window.location.href=\"email.php\"' style='padding: 10px 20px; background-color: #003060; color: white; border: none; cursor: pointer;'>
                Kembali ke Halaman email.php
            </button>
        </div>
    ";
}