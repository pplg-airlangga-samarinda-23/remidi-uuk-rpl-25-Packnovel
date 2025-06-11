<?php
require 'koneksi.php';

$sql1 = "SELECT * FROM bayi";
$babies = $koneksi->execute_query($sql1)->fetch_all(MYSQLI_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    session_start();
    $id_kader = $_SESSION['id_pengguna'];
    $id_bayi = $_POST['bayi'];
    $tinggi = $_POST['tinggi'];
    $berat = $_POST['berat'];

    $sql = "INSERT INTO catatan (id_kader, id_bayi, tinggi, berat, tanggal) VALUES (?,?,?,?,CURRENT_DATE)";
    $row = $koneksi->execute_query($sql, [$id_kader, $id_bayi, $tinggi, $berat]);

    if ($row) {
        header("Location: catat.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Catat Pertumbuhan</title>
</head>
<body>
    <h1>Catat Pertumbuhan Bayi</h1>
    <a href="index.php">Kembali</a>

    <form action="" method="post">
        <div class="form-item">
            <label for="bayi">Bayi</label>
            <select name="bayi" id="bayi">
                <?php foreach ($babies as $baby) : ?>
                    <option value="<?= $baby['id_bayi'] ?>"><?= $baby['nama'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-item">
            <label for="tinggi">Tinggi</label>
            <input type="number" name="tinggi" id="tinggi" step="any">
        </div>

        <div class="form-item">
            <label for="berat">Berat</label>
            <input type="number" name="berat" id="berat" step="any">
        </div>

        <button type="submit">Catat</button>
    </form>
</body>
</html>
