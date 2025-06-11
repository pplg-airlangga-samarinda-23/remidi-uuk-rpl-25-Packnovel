<?php

require 'koneksi.php';
$sql = "SELECT * FROM bayi";
$babies = $koneksi->execute_query($sql)->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Data Bayi</title>
</head>
<body>
    <h1>Data Bayi</h1>

    <a href="index.php">Kembali</a>
    <a href="bayi-tambah.php">Tambah Bayi</a>

    <table>
        <thead>
            <th>No</th>
            <th>Nama</th>
            <th>Nama Ibu</th>
            <th>Nama Ayah</th>
            <th>Tanggal Lahir</th>
            <th>Aksi</th>
        </thead>
        <tbody>
            <?php $no=0; foreach ($babies as $baby) : ?>
            <tr>
                <td><?php ++$no; ?></td>
                <td><?php echo $baby['nama']; ?></td>
                <td><?php echo $baby['nama_ibu']; ?></td>
                <td><?php echo $baby['nama_ayah']; ?></td>
                <td><?php echo $baby['tanggal_lahir']; ?></td>
                <td>
                    <a href="bayi-detail.php?id=<?php echo $baby['id_bayi']; ?>">Detil</a>
                    <a href="bayi-edit.php?id=<?php echo $baby['id_bayi']; ?>">Edit</a>
                    <a href="bayi-hapus.php?id=<?php echo $baby['id_bayi']; ?>">Hapus</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
