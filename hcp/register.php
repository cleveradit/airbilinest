<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';

include 'includes/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    //$password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Hash password
    // Ambil profesi dari dropdown atau input teks
    $profession = ($_POST['profession'] === 'Other') ? $_POST['other_profession'] : $_POST['profession'];
    //$profession = $_POST['profession']; // Ambil data profesi dari form
    $institution = $_POST['institution'];

    // Validasi password dan konfirmasi password
    if ($password !== $confirm_password) {
        echo '<div class="error-message">Password dan Konfirmasi Password tidak cocok.</div>';
    } else {
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);

        // Cek apakah email sudah terdaftar
        $check_email_sql = "SELECT * FROM users WHERE email='$email'";
        $check_email_result = $conn->query($check_email_sql);

        if ($check_email_result->num_rows > 0) {
            // Jika email sudah terdaftar, tampilkan pesan error
            echo '<div class="error-message">Email sudah terdaftar. Silakan gunakan email lain.</div>';
        } else {
            // Jika email belum terdaftar, simpan data pengguna baru
            $sql = "INSERT INTO users (username, email, password, profession, institution) VALUES ('$username', '$email', '$hashed_password', '$profession', '$institution')";
                
            if ($conn->query($sql)) {
                
                // Kirim email sambutan
                $mail = new PHPMailer(true);
                    
                try {
                    // Server settings
                    $mail->isSMTP();
                    $mail->Host       = 'mail.airbilinest.com'; // SMTP server (gunakan 'localhost' untuk cPanel)
                    $mail->SMTPAuth   = true;
                    $mail->Username   = 'noreply@airbilinest.com'; // Email pengirim
                    $mail->Password   = 'noreply_123'; // Password email
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; // SSL/TLS
                    $mail->Port       = 465; // Port SSL: 465, TLS: 587

                    // Penerima & konten email
                    $mail->setFrom('noreply@airbilinest.com', 'AirBiliNest');
                    $mail->addAddress($email, $username); // Email penerima
                    $mail->isHTML(true);
                    $mail->Subject = 'Welcome to AirBiliNest!';
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
                                        width: 100px; /* Fixed width */
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
                                        <h1>Halo, $username!</h1>
                                        <p><b>Terima kasih telah mendaftar di AirBiliNest.</b></p>
                                        <p>Dapatkan informasi terbaru mengenai perkembangan AirBiliNest, Promo, dll melalui website AirBiliNest atau sosial media kami.</p>
                                        <p>Silakan login menggunakan email dan password yang telah didaftarkan.</p>
                                        <br>
                                        <p>Salam,<br>Tim AirBiliNest</p>
                                        <p class='small-text'>Ada pertanyaan atau saran, hubungi: 
                                            <a href='mailto:admin.airbilinest@airbilinest.com' style='color: #003060; text-decoration: underline;'>
                                                admin.airbilinest@airbilinest.com
                                            </a>
                                        </p>
                                        <p class='small-text'>Mohon untuk tidak membalas email ini</p>
                                        <br>
                                        <hr style='border: 1px solid #ddd;'>
                                        <br>
                                        <h1>Hello, $username!</h1>
                                        <p><b>Thank you for registering to AirBiliNest</b></p>
                                        <p>Get the latest information about AirBiliNest developments, Promos, etc. through the AirBiliNest website or our social media.</p>
                                        <p>Please login with the email and password that have been registered</p>
                                        <br>
                                        <p>Regards,<br>AirBiliNest Team</p>
                                        <p class='small-text'>Have any question or suggestion, contact: 
                                            <a href='mailto:admin.airbilinest@airbilinest.com' style='color: #003060; text-decoration: underline;'>
                                                admin.airbilinest@airbilinest.com
                                            </a>
                                        </p>
                                        <p class='small-text'>Please don't reply to this email</p>
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
                                    </p>
                                    <p>Contact: 
                                        <a href='mailto:admin.airbilinest@airbilinest.com' style='color: white; text-decoration: underline;'>
                                            admin.airbilinest@airbilinest.com
                                        </a>
                                    </p>
                                    <p>©2025 AirBiliNest</p>
                                </div>
                            </body>
                        </html>
                    ";

                    $mail->send();
                    echo'<div class="success-message">Register berhasil, silahkan login</div>';

                }catch (Exception $e) {
                    echo'<div class="error-message">Email gagal dikirim. Error: ' . $mail->ErrorInfo . '</div>';
                }

            } else {
                echo'<div class="error-message">Error: ' . $conn->error . '</div>';
            }
        }
    }


    // Query untuk menambahkan user baru
    // $sql = "INSERT INTO users (username, email, password, profession) VALUES ('$username', '$email', '$password', '$profession')";

    // if ($conn->query($sql) === TRUE) {
    //     echo '<div class="success-message">Registrasi berhasil! Silakan login.</div>';
    // } else {
    //     $message = '<div class="error-message">Error: ' . $conn->error . '</div>';
    // }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        /* General Reset */
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        /* Login Container */
        .login-container {
            background-color: #fff;
            padding: 20px 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }

        .cancel{
            color: #333;
            font-size: 1em;
            margin-top: 5px;
            margin-left: 5px;
            text-align: left;
            text-decoration: none;
        }
        .cancel a:hover {
            color:rgb(255, 0, 106);
        }

        /* Login Header */
        .login-header h1 {
            margin: 0 0 20px;
            color: #333;
            font-size: 2em;
        }

        /* Input Fields */
        .input-group {
            margin-bottom: 15px;
            text-align: left;
        }

        .input-group label {
            display: block;
            margin-bottom: 5px;
            color: #555;
            font-size: 0.9em;
        }

        .input-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1em;
        }

        /* Login Button */
        .login-button {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 1em;
            cursor: pointer;
            width: 100%;
            transition: background-color 0.3s ease;
        }

        .login-button:hover {
            background-color: #0056b3;
        }

        /* Additional Links */
        .additional-links {
            margin-top: 20px;
            font-size: 0.9em;
        }

        .additional-links a {
            color: #007bff;
            text-decoration: none;
        }

        .additional-links a:hover {
            text-decoration: underline;
        }

        .success-message {
            background-color: #d4edda;
            color: #155724;
            padding: 15px;
            border-radius: 5px;
            border: 1px solid #c3e6cb;
            margin-bottom: 20px;
            margin-right: 20px;
            font-family: Arial, sans-serif;
            font-size: 16px;
            text-align: center;
        }
        .error-message {
            background-color: #f8d7da;
            color: #721c24;
            padding: 15px;
            border-radius: 5px;
            border: 1px solid #f5c6cb;
            margin-bottom: 20px;
            margin-right: 20px;
            font-family: Arial, sans-serif;
            font-size: 16px;
            text-align: center;
        }
        
        #Other-profession {
            display: none; /* Sembunyikan input teks secara default */
        }
    </style>
</head>
<body>

    <!-- Login Container -->
    <div class="login-container">
        <div class="cancel">
            <a href="https://airbilinest.com/hcp/hcp.php">Back</a>
        </div>
        <!-- Login Header -->
        <div class="login-header">
            <h1>Register</h1>
        </div>

        <!-- Login Form -->
        <form method="POST" action="">
            <!-- Username -->
            <div class="input-group">
                <label for="username">Name:</label>
                <input type="text" name="username" placeholder="Enter your Name" required>
            </div>

            <!-- EmailField -->
            <div class="input-group">
                <label for="email">Email</label>
                <input type="email" name="email" placeholder="Enter your email" required>
            </div>

            <!-- Password Field -->
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" name="password" placeholder="Enter your account password" required>
            </div>

            <!-- Confirm Password Field -->
            <div class="input-group">
                <label for="confirm_password">Confirm Password</label>
                <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm your password" required>
            </div>

            <div class="input-group">
                <select name="profession" id="profession" required onchange="toggleProfesiLainnya()">
                    <option value="" disabled selected>Sellect your profession</option>
                    <option value="Fresh Parent">Fresh Parent</option>
                    <option value="Parent">Parent</option>
                    <option value="Doctor">Doctor</option>
                    <option value="Nurse">Nurse</option>
                    <option value="Lecture">Lecture</option>
                    <option value="pharmacist">Pharmacist</option>
                    <option value="Investor">Investor</option>
                    <option value="Medical Student">Medical Student</option>
                    <option value="Graduate Student">Other Graduate Student</option>
                    <option value="undergraduate students">Other Undergraduate Students</option>
                    <option> Other</option>
                </select>
                <input type="text" name="other_profession" id="other-profession" placeholder="Tulis profesi Anda">
            </div>

            <div class="input-group">
                <label for="institution">institution:</label>
                <input type="text" name="institution" placeholder="Enter your Institution" required>
            </div>
            
            <!-- Login Button -->
            <button type="submit" class="login-button">Register</button>
        </form>

        <!-- Additional Links -->
        <div class="additional-links">
            <p>Sudah punya akun? <a href="login.php">Login di sini</a></p>
        </div>

    </div>

    <script>
        function toggleProfesiLainnya() {
            const profesiDropdown = document.getElementById('profession');
            const profesiLainnyaInput = document.getElementById('other-profession');

            // Tampilkan input teks jika opsi "Lainnya" dipilih
            if (profesiDropdown.value === 'Other') {
                profesiLainnyaInput.style.display = 'block';
                profesiLainnyaInput.setAttribute('required', true); // Wajib diisi
            } else {
                profesiLainnyaInput.style.display = 'none';
                profesiLainnyaInput.removeAttribute('required'); // Tidak wajib diisi
            }
        }
    </script>
    </body>
</html>