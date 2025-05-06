<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kirim Email</title>
    <link rel="stylesheet" href="email.css?v=<?= filemtime('email.css') ?>"> 
    <script src="https://kit.fontawesome.com/4374ec9f4f.js" crossorigin="anonymous"></script>
</head>
<body>
    <nav class="navbar">
        <button class="menu-toggle" onclick="toggleSidebar()">☰</button>
        <a href="#" class="navbar-brand">Admin Panel - Kirim Email</a>
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
            <li><a href="email.php"><i class="fas fa-envelope"></i> Kirim Email (member)</a></li>
            <li><a href="../email_info/email.php"><i class="fas fa-envelope"></i> Kirim Email (umum)</a></li>
            <li><a href="../monitor/monitor.php"><i class="fas fa-chart-bar"></i> Monitoring</a></li>
        </ul>
    </div>
    <script src="email.js"></script>

    <div class="email_main">
        <h1>Kirim Email</h1>
        <h2>Email: noreply@airbilinest.com</h2>
        <br>
        <form action="send_email.php" method="POST">
            <label for="subject">Subjek Email:</label><br>
            <input type="text" id="subject" name="subject" required><br><br>

            <label for="message">Isi Pesan:</label><br>
            <textarea id="message" name="message" rows="10" cols="50" required></textarea><br><br>

            <label>Pilih Penerima:</label><br>
            <input type="radio" id="send_all" name="recipient_type" value="all" checked>
            <label for="send_all">Kirim ke Semua Email di Database</label><br>

            <input type="radio" id="select_recipients" name="recipient_type" value="select">
            <label for="select_recipients">Pilih Email Secara Manual</label><br><br>

            <div id="recipient_list" style="display:none;">
                <label>Pilih Email:</label><br>
                <?php
                // Koneksi ke database dan ambil daftar email
                $host = 'localhost:3306';
                $dbname = 'airj1347_airbilinest_HCP';
                $username = 'airj1347_airbilinest_HCP';
                $password = 'airbilinest_hcp';

                try {
                    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                    $stmt = $conn->query('SELECT email FROM users');
                    $emails = $stmt->fetchAll(PDO::FETCH_COLUMN);

                    foreach ($emails as $email) {
                        echo "<input type='checkbox' name='selected_emails[]' value='$email'> $email<br>";
                    }
                } catch (PDOException $e) {
                    echo "Error: " . $e->getMessage();
                }
                ?>
            </div>

            <br>
            <button type="submit">Kirim Email</button>
        </form>

        <script>
            // Tampilkan/menyembunyikan daftar email saat opsi dipilih
            document.getElementById('send_all').addEventListener('change', function() {
                document.getElementById('recipient_list').style.display = 'none';
            });

            document.getElementById('select_recipients').addEventListener('change', function() {
                document.getElementById('recipient_list').style.display = 'block';
            });
        </script>
    </div>
    <div class="note"> 
        <h2>NOTE:</h2>
        <p>
            <b>Cara penulisan:</b> <br>
            <li>
                ENTER -> &ltbr&gt
                <dl>
                    <b>Contoh:</b> Paragraph satu  &ltbr&gt Paragraph dua <br>
                    <b>Hasil:</b> Paragraph satu <br> paragraph dua
                </dl>
            </li>
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
            <li>
                Mengirim Gambar: &lta href="www.link.com/link_foto.jpg"&gt &lt/a&gt
            </li>
        </p>
        <p><b>Mengirim banyak Lampiran</b>: ketika membuka window memilih file, tahan shift/ctrl + file2 yang mau dikirim</p>
        <p><b>Mengirim untuk banyak email sekaligus</b>: email1, email2, email3</p>
    </div>
    
</body>
</html>