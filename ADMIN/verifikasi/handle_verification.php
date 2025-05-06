<?php
// handle_verification.php

session_start();
if (!isset($_SESSION['admin_id'])) {
    die("Anda tidak memiliki akses!");
}

// Koneksi ke database
include '../includes/db.php'; // Hubungkan ke database

try {
    $conn = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Koneksi gagal: " . $e->getMessage());
}

// Ambil action dan user_id dari URL
$action = $_GET['action']; // 'approve' atau 'reject'
$user_id = $_GET['id'];

if ($action === 'approve') {
    // Setujui verifikasi
    $sql = "UPDATE users SET app_access = 1, verification_request = 0 WHERE id = :user_id";
} elseif ($action === 'reject') {
    // Tolak verifikasi
    $sql = "UPDATE users SET verification_request = 0 WHERE id = :user_id";
} else {
    die("Aksi tidak valid!");
}

$stmt = $conn->prepare($sql);
$stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);

if ($stmt->execute()) {
    header('Location: verifikasi.php'); // Kembali ke dashboard admin
} else {
    die("Gagal memproses verifikasi!");
}

$conn = null;
?>