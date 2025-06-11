<?php
require 'koneksi.php';

$id_bayi = $_GET['id'];

$sql = "SELECT c.id, p.nama AS kader, c.id_bayi, c.tinggi, c.berat, c.tanggal
        FROM catatan c 
        INNER JOIN pengguna p ON c.id_kader = p.id_pengguna
        WHERE id_bayi=?
        ORDER BY id DESC";

$details = $koneksi->execute_query($sql, [$id_bayi])->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Detil Bayi</title>
</head>
<body>
    <h1>Detil Bayi</h1>
    <h2>Catatan Pertumbuhan Bayi</h2>
    <a href="bayi.php">Kembali</a>

    <table border="1">
        <thead>
            <tr>
                <th>No.</th>
                <th>Tanggal</th>
                <th>Tinggi</th>
                <th>Berat</th>
                <th>Kader</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 0; foreach ($details as $detail) : ?>
                <tr>
                    <td><?= ++$no ?></td>
                    <td><?= $detail['tanggal'] ?></td>
                    <td><?= $detail['tinggi'] ?></td>
                    <td><?= $detail['berat'] ?></td>
                    <td><?= $detail['kader'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
