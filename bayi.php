<?php
require 'koneksi.php';
$sql = "SELECT * FROM bayi";
$babies = $koneksi->execute_query($sql)->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Bayi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #ff6b6b, #f06595);
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 60px auto;
            padding: 20px;
            background: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #333;
        }
        a {
            text-decoration: none;
            margin: 10px 0;
            display: inline-block;
            padding: 10px 20px;
            color: #fff;
            background-color: #ff6b6b;
            border-radius: 5px;
            transition: background 0.3s;
        }
        a:hover {
            background-color: #f06595;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #ff6b6b;
            color: white;
        }
        tr:hover {
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Data Bayi</h1>

        <a href="index.php">Kembali</a>
        <a href="bayi-tambah.php">Tambah Bayi</a>

        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Nama Ibu</th>
                    <th>Nama Ayah</th>
                    <th>Tanggal Lahir</th>
                    <th>Aksi</th>
                </tr>
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
    </div>
</body>
</html>
