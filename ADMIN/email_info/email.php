<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../includes/db.php';
require '../includes/auth.php';

// Pastikan hanya admin yang bisa mengakses halaman ini
requireLogin();

require '../../PHPMailer/src/Exception.php';
require '../../PHPMailer/src/PHPMailer.php';
require '../../PHPMailer/src/SMTP.php';

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data dari form
    $senderEmail = $_POST['sender_email'];
    $senderPassword = $_POST['sender_password'];
    $recipientEmails = explode(',', $_POST['recipient_emails']); // Pisahkan email penerima
    $subject = $_POST['subject'];
    $message = nl2br($_POST['message']);
    $attachments = $_FILES['attachment']; // File yang diunggah (array)

    // Validasi input
    if (empty($senderEmail) || empty($senderPassword) || empty($recipientEmails) || empty($subject) || empty($message)) {
        $error = 'Semua field wajib diisi!';
    } else {
        try {
            // Inisialisasi PHPMailer
            $mail = new PHPMailer(true);

            // Konfigurasi SMTP
            $mail->isSMTP();
            $mail->Host = 'mail.airbilinest.com'; // Ganti dengan SMTP server Anda
            $mail->SMTPAuth = true;
            $mail->Username = $senderEmail; // Ganti dengan email Anda
            $mail->Password = $senderPassword; // Ganti dengan password email Anda
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            // Pengirim
            $mail->setFrom($senderEmail, 'AirBiliNest');

            // Penerima
            foreach ($recipientEmails as $recipient) {
                $mail->addAddress(trim($recipient)); // Tambahkan setiap penerima
            }

            // Lampiran (jika ada)
            if (!empty($attachments['name'][0])) { // Periksa apakah ada file yang diunggah
                for ($i = 0; $i < count($attachments['name']); $i++) {
                    if ($attachments['error'][$i] == UPLOAD_ERR_OK) { // Pastikan tidak ada error saat upload
                        $file_tmp = $attachments['tmp_name'][$i];
                        $file_name = $attachments['name'][$i];
                        $mail->addAttachment($file_tmp, $file_name); // Tambahkan setiap lampiran
                    }
                }
            }

            // Konten email
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
                            .pesan {
                                text-align:left;
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
                            <p>©2022-2032 AirBiliNest</p>
                        </div>
                    </body>
                </html>
            ";

            // Kirim email
            $mail->send();
            $success = 'Email berhasil dikirim!';
        } catch (Exception $e) {
            $error = "Email gagal dikirim. Error: {$mail->ErrorInfo}";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kirim Email</title>
    <link rel="stylesheet" href="email_info.css?v=<?= filemtime('email_info.css') ?>">
    <script src="https://kit.fontawesome.com/4374ec9f4f.js" crossorigin="anonymous"></script>
</head>
<body>
    <nav class="navbar">
        <button class="menu-toggle" onclick="toggleSidebar()">☰</button>
        <a href="#" class="navbar-brand">Admin Panel</a>
        <div class="logout">
            <a href="logout.php" style="color: white;">Logout</a>
        </div>
    </nav>

    <div class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <h3>Menu Admin</h3>
        </div>
        <ul class="sidebar-menu">
            <li><a href="../admin-dashboard.php"><i class="fas fa-home"></i> Dashboard</a></li>
            <li><a href="../member/member.php"><i class="fas fa-users"></i> Kelola User</a></li>
            <li><a href="../verifikasi/verifikasi.php"><i class="fas fa-users"></i> Verifikasi User</a></li>
            <li><a href="../email/email.php"><i class="fas fa-envelope"></i> Kirim Email (member)</a></li>
            <li><a href="email.php"><i class="fas fa-envelope"></i> Kirim Email (umum)</a></li>
            <li><a href="../monitor/monitor.php"><i class="fas fa-chart-bar"></i> Monitoring</a></li>
        </ul>
    </div>
    <script src="email_info.js"></script>

    <div class="main-container">
        <div class="formarea">
            <div class="container">
                <h1 class="judul-kirim">Kirim Email</h1>

                <!-- Tampilkan pesan error/success -->
                <?php if ($error): ?>
                    <div class="error"><?= $error ?></div>
                <?php endif; ?>
                <?php if ($success): ?>
                    <div class="success"><?= $success ?></div>
                <?php endif; ?>

                <!-- Form Kirim Email -->
                <form action="" method="post" enctype="multipart/form-data">
                    <label for="sender_email">Email Pengirim: (email airbilinest)</label>
                    <input type="email" id="sender_email" name="sender_email" required>

                    <label for="sender_password">Password Email: (email airbilinest)</label>
                    <input type="text" id="sender_password" name="sender_password" required>

                    <label for="recipient_emails">Email Penerima (pisahkan dengan koma):</label>
                    <input type="text" id="recipient_emails" name="recipient_emails" required>

                    <label for="subject">Subjek:</label>
                    <input type="text" id="subject" name="subject" required>

                    <label for="message">Pesan (HTML):</label>
                    <textarea id="message" name="message" rows="5" required></textarea>

                    <label for="attachment">Lampiran:</label>
                    <input type="file" id="attachment" name="attachment[]" multiple>

                    <button class="submit_btn" type="submit">Kirim Email</button>
                </form>
            </div>
        </div>

        <!-- Area Pratinjau -->
        <div class="preview-area">
            <h2>Pratinjau Email</h2>
            <div id="preview" class="preview-box">
                <!-- Konten pratinjau akan ditampilkan di sini -->
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const messageInput = document.getElementById('message');
            const previewOutput = document.getElementById('preview');

            messageInput.addEventListener('input', function () {
                // Ambil nilai dari textarea
                const message = messageInput.value;

                // Format pesan sesuai template email
                const formattedMessage = `
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
                            .pesan {
                                text-align:left;
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
                                <p>${message.replace(/\n/g, '<br>')}</p>
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
                                <a href='https://airbilinest.com' text-decoration: underline;'>
                                    <b>AirBiliNest.com</b>
                                </a>
                                <br>
                                Part of Medika Karya Airlangga<br>
                                phone: +62895339353678
                            </p>
                            <p>©2022-2032 AirBiliNest</p>
                        </div>
                    </body>
                </html>
                `;

                // Tampilkan hasil pratinjau
                previewOutput.innerHTML = formattedMessage;
            });
        });
    </script>

    
    <div class="note"> 
        <h2 class="note-judul">NOTE:</h2>
        <p>
            Direkomendasikan untuk mengetes ke email sendiri untuk melihat hasil apakah sudah sesuai atau tidak :D
        </p>
        <p>
            Email: Info@airbilinest.com <br>
            Password: AirBiliNest01
        </p>
        <p>
            <b>Cara penulisan:</b> <br>
            <li>
                Align Text -> &ltp align='letak'&gt &lt/p&gt
                <dl>
                    <b>Contoh:</b>
                    <li>
                        Text ditengah: &ltp align='center'&gt Isi pesan &lt/p&gt
                    </li>
                    <li>
                        Text dikanan: &ltp align='right'&gt Isi pesan &lt/p&gt
                    </li>
                    <li>
                        Text dikiri (default): &ltp align='left'&gt Isi pesan &lt/p&gt
                    </li>
                </dl>
            </li>
            <br>
            <li>
                BOLD -> &ltb&gt &lt/b&gt
                <dl>
                    <b>Contoh:</b> Paragraph &ltb&gtsatu&lt/b&gt paragraph dua <br>
                    <b>Hasil:</b> Paragraph <b>satu</b> paragraph dua
                </dl>
            </li>
            <li>
                Itatlic -> &lti&gt &lt/i&gt
                <dl>
                    <b>Contoh:</b> Paragraph &lti&gtsatu&lt/i&gt paragraph dua <br>
                    <b>Hasil:</b> Paragraph <i>satu</i> paragraph dua
                </dl>
            </li>
            <li>
                Garis Bawah -> &ltu&gt &lt/u&gt
                <dl>
                    <b>Contoh:</b> Paragraph &ltu&gtsatu&lt/u&gt paragraph dua <br>
                    <b>Hasil:</b> Paragraph <u>satu</u> paragraph dua
                </dl>
            </li>
        </p>
        <p><b>Mengirim banyak Lampiran</b>: ketika membuka window memilih file, tahan shift/ctrl + file2 yang mau dikirim</p>
        <p><b>Mengirim untuk banyak email sekaligus</b>: email1, email2, email3</p>
        <br>
        <h2>List Email Penting:</h2>
        <h3>TIM AirBiliNest</h3>
        <li>
            muhammadnafik@feb.unair.ac.id
        </li>
        <li>
            zaidan@fst.unair.ac.id
        </li>
        <li>
            mahendra.tri@fk.unair.ac.id
        </li>
        <li>
            ahmad.fadlur.r.b@feb.unair.ac.id
        </li>
        <li>
            syah.reza.budi.azhari.01@gmail.com
        </li>
        <li>
            reza.azhari@airbilinest.com
        </li>
        <li>
            valentinus.aaron@airbilinest.com
        </li>

        <h3>TIM ASKI</h3>
        <li>
            hendro.witjaksono@aski.co.id
        </li>
        <li>
            sugiri.wijoyo@aski.co.id
        </li>
        <li>
            prasetyo.utomo@aski.co.id
        </li>
        <li>
            Rafi.Febriana@aski.co.id
        </li>

        <h3>
            TIM IDS MED
        </h3>
        <li>
            NadhiraAnindita@idsmed.com
        </li>
        <li>
            LionelValdarant@idsmed.com
        </li>
        <li>
            santonyid@idsmed.com
        </li>
        <br>
        <br>
        <p>
            Contoh Lengkap coba aja copy-paste teks ini: <br>

            Ini adalah contoh pesan:<br>

            &lt;b&gt;Tebal&lt;/b&gt; &lt;i&gt;miring&lt;/i&gt; &lt;u&gt;Garis Bawah&lt;/u&gt; &lt;del&gt;Strike&lt;/del&gt;<br>
            This is &lt;sub&gt;subscripted&lt;/sub&gt; text.<br>
            This is &lt;sup&gt;superscripted&lt;/sup&gt; text.<br>
            &lt;b&gt;&lt;u&gt;&lt;i&gt;Ini Gabungan Semuanya&lt;/i&gt;&lt;/u&gt;&lt;/b&gt;<br>
            &lt;p align='center'&gt;&lt;b&gt;Ini Contoh Tengah dan Tebal&lt;/b&gt;&lt;/p&gt;<br>
            <br>
            Hyperlink:<br>
            Ini link ke &lt;a href='airbilinest.com'&gt;web airbilinest.com&lt;/a&gt;<br>
            <br>
            Ini Contoh menambahkan gambar:<br>
            &lt;p align='center'&gt; &lt;img src='https://airbilinest.com/assets/Airbilisun.png' width='30%'&gt;  &lt;/p&gt;<br>
            tinggal copy paste link gambarnya<br>
            <br>
            &lt;li&gt;Ini Contoh Bullet Poin 1&lt;/li&gt;<br>
            &lt;li&gt;Ini Contoh Bullet Poin 2&lt;/li&gt;<br>
            <br>
            &lt;h1&gt;Ini Contoh Header 1&lt;/h1&gt;<br>
            &lt;h2&gt;Ini Contoh Header 2&lt;/h2&gt;<br>
            &lt;h3&gt;Ini Contoh Header 3, dst&lt;/h3&gt;<br>

        </p>
    </div>
</body>
</html>