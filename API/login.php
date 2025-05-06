<?php
header('Content-Type: application/json');

$host = 'localhost:3306'; // Host database
$db   = 'airj1347_airbilinest_HCP'; // Nama database
$user = 'airj1347_airbilinest_HCP'; // Username database
$pass = 'airbilinest_hcp'; // Password database

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die(json_encode(['status' => 'error', 'message' => 'Database connection failed']));
}

$email = $_POST['email'];
$password = $_POST['password'];

// Query untuk mengambil id, password, dan app_access
$stmt = $conn->prepare("SELECT id, password, app_access FROM users WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($id, $hashed_password, $app_access); // Tambahkan app_access
$stmt->fetch();

if ($stmt->num_rows > 0 && password_verify($password, $hashed_password)) {
    // Kirim respons JSON dengan status, user_id, dan app_access
    echo json_encode([
        'status' => 'success',
        'user_id' => $id,
        'app_access' => $app_access // Tambahkan app_access ke respons
    ]);
} else {
    // Kirim respons JSON jika kredensial tidak valid
    echo json_encode([
        'status' => 'error',
        'message' => 'Invalid credentials'
    ]);
}

$stmt->close();
$conn->close();
?>