<?php
session_start();
session_destroy(); // Hapus semua session
header("Location: hcp.php"); // Redirect ke halaman login
exit();
?>