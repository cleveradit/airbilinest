<?php
$host = 'localhost:3306'; // Host database
$db   = 'airj1347_airbilinest_HCP'; // Nama database
$user = 'airj1347_airbilinest_HCP'; // Username database (default untuk localhost)
$pass = 'airbilinest_hcp'; // Password database (default kosong untuk localhost)

// Membuat koneksi ke database
$conn = new mysqli($host, $user, $pass, $db);

// Cek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>