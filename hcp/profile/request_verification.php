<?php
// request_verification.php

session_start();
if (!isset($_SESSION['user_id'])) {
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

// Ambil user_id dari session
$user_id = $_SESSION['user_id'];

// Update kolom verification_request
$sql = "UPDATE users SET verification_request = 1 WHERE id = :user_id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);

if ($stmt->execute()) {
    echo "<script>alert('Permintaan verifikasi berhasil diajukan!'); window.location.href='profile.php';</script>";
} else {
    echo "<script>alert('Gagal mengajukan verifikasi!'); window.location.href='profile.php';</script>";
}

$conn = null;
?>