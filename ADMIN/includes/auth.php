<?php
session_start();

function requireLogin() {
    if (!isset($_SESSION['admin_id'])) {
        header('Location: index.php');
        exit();
    }
}

function login($username, $password) {
    global $pdo;

    // Bersihkan input dari whitespace
    $username = trim($username);
    $password = trim($password);

    // Query ke database
    $stmt = $pdo->prepare('SELECT id, password FROM admins WHERE username = ?');
    $stmt->execute([$username]);
    $admin = $stmt->fetch();

    // Debug: Tampilkan hash dari database
    // echo "Hash dari database: " . $admin['password'] . "<br>";

    if ($admin && password_verify($password, $admin['password'])) {
        $_SESSION['admin_id'] = $admin['id'];
        return true;
    } else {
        // Debug: Tampilkan alasan gagal
        echo "Alasan gagal: Password tidak cocok dengan hash!";
        return false;
    }
}



function logout() {
    session_destroy();
    header('Location: index.php');
    exit();
}
?>