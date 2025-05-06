<?php
session_start(); // Mulai session
include 'includes/db.php'; // Hubungkan ke database

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Query untuk mencari user berdasarkan email
    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc(); // Ambil data user
        // Verifikasi password
        if (password_verify($password, $user['password'])) {
            // Jika password cocok, simpan user ID dan username di session
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            header("Location: hcp.php"); // Redirect ke halaman utama
            exit();
        } else {
            echo '<div class="wrong-login">The Password is Incorrect!</div>';
        }
    } else {
        echo '<div class="wrong-login">Email Could not be Found</div>';
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        /* General Reset */
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        /* Login Container */
        .login-container {
            background-color: #fff;
            padding: 20px 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }

        /* Login Header */
        .cancel{
            color: #333;
            font-size: 1em;
            margin-top: 5px;
            margin-left: 5px;
            text-align: left;
            text-decoration: none;
        }
        .cancel a:hover {
            color:rgb(255, 0, 106);
        }
        
        .login-header h1 {
            margin: 0 0 20px;
            color: #333;
            font-size: 2em;
        }

        /* Input Fields */
        .input-group {
            margin-bottom: 15px;
            text-align: left;
        }

        .input-group label {
            display: block;
            margin-bottom: 5px;
            color: #555;
            font-size: 0.9em;
        }

        .input-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1em;
        }

        /* Login Button */
        .login-button {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 1em;
            cursor: pointer;
            width: 100%;
            transition: background-color 0.3s ease;
        }

        .login-button:hover {
            background-color: #0056b3;
        }

        /* Additional Links */
        .additional-links {
            margin-top: 20px;
            font-size: 0.9em;
        }

        .additional-links a {
            color: #007bff;
            text-decoration: none;
        }

        .additional-links a:hover {
            text-decoration: underline;
        }

        .wrong-login{
            background-color: #f8d7da;
            color: #721c24;
            padding: 15px;
            border-radius: 5px;
            border: 1px solid #f5c6cb;
            margin-bottom: 20px;
            margin-right: 20px;
            font-family: Arial, sans-serif;
            font-size: 16px;
            text-align: center;
        }
    </style>
</head>
<body>

    <!-- Login Container -->
    <div class="login-container">
        <!-- Login Header -->
        <div class="cancel">
            <a href="https://airbilinest.com/hcp/hcp.php">Back</a>
        </div>
        <div class="login-header">
            <h1>Login</h1>
        </div>

        <!-- Login Form -->
        <form method="POST" action="">
            <!-- Email/Username Field -->
            <div class="input-group">
                <label for="email">Email</label>
                <input type="email" name="email" placeholder="Enter your email or username" required>
            </div>

            <!-- Password Field -->
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" name="password" placeholder="Enter your password" required>
            </div>

            <!-- Login Button -->
            <button type="submit" class="login-button">Login</button>
        </form>

        <!-- Additional Links -->
        <div class="additional-links">
            <a href="#">Forgot Password?</a> | <a href="register.php">Create an Account</a>
        </div>
    </div>

</body>
</html>