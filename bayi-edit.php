<?php
require 'koneksi.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['name'];
    $nama_ibu = $_POST['nama_ibu'];
    $nama_ayah = $_POST['nama_ayah'];
    $tanggal_Lahir = $_POST['tanggal_lahir'];
    $id_bayi = $_GET['id'];

    // Update query with prepared statement
    $sql = "UPDATE bayi SET nama=?, nama_ibu=?, nama_ayah=?, tanggal_lahir=? WHERE id_bayi=?";
    $row = $koneski->execute_query($sql, [$nama, $nama_ibu, $nama_ayah, $tanggal_Lahir, $id_bayi]);

    if ($row) {
        header('Location: bayi.php');
        exit();
    }
} 

else if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $id_bayi = $_GET['id'];
    
    // Prepare and execute query to fetch data
    $sql = "SELECT * FROM bayi WHERE id_bayi=?";
    $bayi = $koneski->execute_query($sql, [$id_bayi])->fetch_assoc();
    
   
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Bayi</title>
</head>
<body>
    <h1>Edit Bayi</h1>
    <a href="bayi.php">Kembali</a>

    <form action="" method="post">
        <div class="form-item">
            <label for="nama">Nama Bayi</label>
            <input type="text" name="nama" id="nama" value="<?php echo $baby['name']; ?>">
        </div>
        <div class="form-item">
            <label for="nama_ibu">Nama Ibu</label>
            <input type="text" name="nama_ibu" id="nama_ibu" value="<?php echo $baby['nama_ibu']; ?>">
        </div>
        <div class="form-item">
            <label for="nama_ayah">Nama Ayah</label>
            <input type="text" name="nama_ayah" id="nama_ayah" value="<?php echo $baby['nama_ayah']; ?>">
        </div>
        <div class="form-item">
            <label for="tanggal_lahir">Tanggal</label>
            <input type="date" name="tanggal_lahir" id="tanggal_lahir" value="<?php echo $baby['tanggal_lahir']; ?>">
        </div>
        <button type="submit">Edit</button>
    </form>
</body>
</html>
