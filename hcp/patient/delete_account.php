<?php
// delete_account.php

// Koneksi ke database
include '../includes/db.php'; // Hubungkan ke database

try {
    $conn = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Koneksi gagal: " . $e->getMessage());
}

// Ambil ID user dari session atau parameter
session_start();
if (!isset($_SESSION['user_id'])) {
    die("Anda tidak memiliki akses!");
}

$user_id = $_SESSION['user_id']; // Pastikan Anda menyimpan user_id di session saat login

// Query untuk menghapus akun
$sql = "DELETE FROM users WHERE id = :user_id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);

// Eksekusi query
if ($stmt->execute()) {
    echo "<script>alert('Akun berhasil dihapus!'); window.location.href='../logout.php';</script>";
} else {
    echo "<script>alert('Gagal menghapus akun!'); window.location.href='profile.php';</script>";
}

// Tutup koneksi
$conn = null;
?>