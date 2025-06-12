<?php
require 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = 'SELECT id_pengguna, nama, password, role FROM pengguna WHERE username = ?';
    $row = $koneksi->execute_query($sql, [$username])->fetch_assoc();

    if ($row && password_verify($password, $row['password'])) {
        session_start();
        $_SESSION['id_pengguna'] = $row['id_pengguna'];
        $_SESSION['nama'] = $row['nama'];
        $_SESSION['username'] = $username;
        $_SESSION['role'] = $row['role'];

        header("Location: index.php");
        exit;
    } else {
        $error = "Invalid username or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Login</title>
    <style>
        /* Reset some default styles */
        body {
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(135deg, rgba(255, 76, 76, 1), rgba(255, 141, 0, 1));
            font-family: 'Arial', sans-serif;
            overflow: hidden;
        }

        /* Style the login container */
        .login-container {
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
            padding: 32px;
            text-align: center;
            width: 320px;
            max-width: 90vw;
        }

        /* Style the heading */
        h1 {
            color: #ff4c4c;
            font-weight: bold;
            font-size: 2rem;
            margin-bottom: 20px;
        }

        /* Style form items */
        .form-item {
            margin-bottom: 20px;
        }

        /* Style labels */
        label {
            display: block;
            margin-bottom: 8px;
            color: #555;
            font-weight: 600;
        }

        /* Style input fields */
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            font-size: 1rem;
            transition: box-shadow 0.3s;
        }

        /* Change border color on focus */
        input[type="text"]:focus,
        input[type="password"]:focus {
            box-shadow: 0 0 8px rgba(255, 76, 76, 0.4);
            outline: none;
        }

        /* Style the submit button */
        button {
            width: 100%;
            padding: 12px 0;
            background-color: #ff4c4c;
            color: white;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            font-size: 1.1rem;
            font-weight: bold;
            transition: background 0.3s;
        }

        /* Change button style on hover */
        button:hover {
            background-color: #ff3b3b;
        }

        /* Optional error message styling */
        .error-message {
            margin-bottom: 18px;
            padding: 12px;
            background-color: rgba(255, 99, 71, 0.8);
            color: white;
            border-radius: 8px;
            font-size: 0.95rem;
            text-align: center;
        }

        /* Optional: Add a footer or additional links */
        .footer {
            margin-top: 24px;
            font-size: 0.9rem;
        }
        .footer a {
            color: #ff4c4c;
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h1>Sistem Posyandu</h1>

        <?php if (isset($error)): ?>
            <div class="error-message" role="alert" aria-live="assertive"><?=htmlspecialchars($error)?></div>
        <?php endif; ?>

        <form action="" method="post" novalidate>
            <div class="form-item">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" required autocomplete="username" />
            </div>
            <div class="form-item">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" required autocomplete="current-password" />
            </div>
            <button type="submit">Login</button>
        </form>

        <div class="footer">
            <p>Forgot your password? <a href="#">Reset it</a></p>
        </div>
    </div>
</body>
</html>
