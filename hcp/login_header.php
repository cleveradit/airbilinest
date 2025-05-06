<?php
session_start(); // Mulai session
if (isset($_SESSION['user_id'])) {
    // Jika pengguna sudah login, tampilkan tombol Profil
    echo '<a href="profile.php"><i class="fa fa-user"></i> ' . $_SESSION['username'] . '</a>';
} else {
    // Jika pengguna belum login, tampilkan tombol Login
    echo '<a href="login.php"><i class="fa fa-user"></i> Login</a>';
}
?>