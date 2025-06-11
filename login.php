<?php
require 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = 'SELECT id_pengguna, nama, password, role FROM pengguna WHERE username = ?';
    $row = $koneksi->execute_query($sql, [$username])->fetch_assoc();

    if (password_verify($password, $row['password'])) {
        session_start();
        $_SESSION['id_pengguna'] = $row['id_pengguna'];
        $_SESSION['nama'] = $row['nama'];
        $_SESSION['username'] = $username;
        $_SESSION['role'] = $row['role'];

        header("Location: index.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <h1>Login Posyandu</h1>

    <form action="" method="post">
        <div class="form-item">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" required>
        </div>
        <div class="form-item">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" required>
        </div>
        <button type="submit">Login</button>
    </form>
</body>
</html>
