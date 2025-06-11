<?php

require 'koneksi.php';

$sql = "SELECT * FROM pengguna";
$rows = $koneksi->execute_query($sql)->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Pengguna</title>
</head>
<body>
    <h1>Data Pengguna</h1>

    <a href="index.php">Kembali</a>
    <a href="pengguna-tambah.php">Tambah Pengguna</a>

    <table border="1" cellpadding="5" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Pengguna</th>
                <th>Username</th>
                <th>Role</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 0; foreach ($rows as $row) : ?>
            <tr>
                <td><?= ++$no ?></td>
                <td><?= $row['nama'] ?></td>
                <td><?= $row['username'] ?></td>
                <td><?= $row['role'] ?></td>
                <td>
                    <a href="pengguna-hapus.php?id=<?= $row['id_pengguna'] ?>">Hapus</a>
                </td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</body>
</html>
