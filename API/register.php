<?php
header('Content-Type: application/json');
$host = 'localhost:3306'; // Host database
$db   = 'airj1347_airbilinest_HCP'; // Nama database
$user = 'airj1347_airbilinest_HCP'; // Username database (default untuk localhost)
$pass = 'airbilinest_hcp'; // Password database (default kosong untuk localhost)

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die(json_encode(['status' => 'error', 'message' => 'Database connection failed']));
}

$username = $_POST['username'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_BCRYPT);
$profession = $_POST['profession'];

$stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    echo json_encode(['status' => 'error', 'message' => 'Email already exists']);
} else {
    $stmt = $conn->prepare("INSERT INTO users (username, email, password, profession) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $username, $email, $password, $profession);
    if ($stmt->execute()) {
        echo json_encode(['status' => 'success', 'message' => 'User created successfully']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to create user']);
    }
}
$stmt->close();
$conn->close();
?>