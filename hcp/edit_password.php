<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

include 'includes/db.php';

$user_id = $_SESSION['user_id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $current_password = $_POST['current_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    // Ambil password saat ini dari database
    $sql = "SELECT password FROM users WHERE id='$user_id'";
    $result = $conn->query($sql);
    $user = $result->fetch_assoc();

    // Verifikasi password saat ini
    if (password_verify($current_password, $user['password'])) {
        if ($new_password === $confirm_password) {
            // Hash password baru
            $hashed_password = password_hash($new_password, PASSWORD_BCRYPT);

            // Update password di database
            $update_sql = "UPDATE users SET password='$hashed_password' WHERE id='$user_id'";
            if ($conn->query($update_sql)) {
                $message = '<div class="success-message">Password berhasil diubah.</div>';
            } else {
                $message = '<div class="error-message">Error: ' . $conn->error . '</div>';
            }
        } else {
            $message = '<div class="error-message">Password baru dan konfirmasi password tidak cocok.</div>';
        }
    } else {
        $message = '<div class="error-message">Password saat ini salah.</div>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Password</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .edit-password-container {
            background: white;
            padding: 10px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 400px;
        }
        .edit-password-container h2 {
            margin-bottom: 20px;
            margin-right: 10px;
            margin-left: 10px;
            font-size: 24px;
            color: #333;
        }
        .edit-password-container input {
            width: 90%;
            padding: 10px;
            margin-bottom: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .edit-password-container button {
            width: 100%;
            padding: 10px;
            margin-top: 20px;
            margin-right: 10px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .edit-password-container button:hover {
            background-color: #218838;
        }
        .success-message {
            background-color: #d4edda;
            color: #155724;
            padding: 15px;
            border-radius: 5px;
            border: 1px solid #c3e6cb;
            margin-bottom: 20px;
            font-family: Arial, sans-serif;
            font-size: 16px;
            text-align: center;
        }
        .error-message {
            background-color: #f8d7da;
            color: #721c24;
            padding: 15px;
            border-radius: 5px;
            border: 1px solid #f5c6cb;
            margin-bottom: 20px;
            font-family: Arial, sans-serif;
            font-size: 16px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="edit-password-container">
        <h2>Edit Password</h2>
        <?php if (!empty($message)) echo $message; ?>
        <form method="POST" action="">
            <input type="password" name="current_password" placeholder="Password Saat Ini" required>
            <input type="password" name="new_password" placeholder="Password Baru" required>
            <input type="password" name="confirm_password" placeholder="Konfirmasi Password Baru" required>
            <button type="submit">Save Changes</button>
        </form>
        <p><a href="profile/profile.php">Back to Profile Page</a></p>
    </div>
</body>
</html>