<?php
session_start();
require '../includes/db.php';
require '../includes/auth.php';

// Debugging: Log data yang diterima
error_log("Data yang diterima: " . file_get_contents('php://input'));

// Pastikan hanya admin yang bisa mengakses
// if (!isset($_SESSION['user_id'])) {
//     echo json_encode(['success' => false, 'message' => 'Unauthorized access']);
//     exit;
// }

// Ambil data dari permintaan AJAX
$data = json_decode(file_get_contents('php://input'), true);
error_log("Data JSON: " . print_r($data, true)); // Debugging

$userId = $data['user_id'];
$appAccess = $data['app_access'];

// Update nilai app_access di database
$stmt = $pdo->prepare('UPDATE users SET app_access = ? WHERE id = ?');
if ($stmt->execute([$appAccess, $userId])) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'message' => 'Failed to update access']);
}