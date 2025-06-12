<?php
require 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $nama_ibu = $_POST['nama_ibu'];
    $nama_ayah = $_POST['nama_ayah'];
    $tanggal_lahir = $_POST['tanggal_lahir'];

    $sql = 'INSERT INTO bayi (nama, nama_ibu, nama_ayah, tanggal_lahir) VALUES (?, ?, ?, ?);';
    $row = $koneksi->execute_query($sql, [$nama, $nama_ibu, $nama_ayah, $tanggal_lahir]);

    if ($row) {
        header("location:bayi.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Tambah Bayi</title>
    <style>
        /* Moderately Loud Red Themed Styling */
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@700;900&display=swap');

        body {
            background: linear-gradient(135deg, #ffcccc, #ff6666);
            color: #800000;
            font-family: 'Inter', Arial, sans-serif;
            margin: 0;
            padding: 40px 20px;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-shadow: 1px 1px 2px rgba(153, 0, 0, 0.6);
            user-select: none;
        }

        h1 {
            color: #cc0000;
            font-size: 3rem;
            margin-bottom: 32px;
            font-weight: 900;
            letter-spacing: 2px;
            text-align: center;
            text-transform: uppercase;
            text-shadow: 0 0 6px #cc0000cc;
        }

        a {
            color: #cc0000;
            font-weight: 700;
            font-size: 1.4rem;
            text-decoration: none;
            margin-bottom: 40px;
            padding: 8px 20px;
            border: 3px solid #cc0000;
            border-radius: 14px;
            box-shadow: 0 0 12px #cc0000bb;
            transition: color 0.3s ease, box-shadow 0.3s ease, border-color 0.3s ease, transform 0.3s ease;
            user-select: none;
        }
        a:hover,
        a:focus {
            color: #fff;
            background: #cc0000;
            border-color: #ff4d4d;
            box-shadow: 0 0 20px #ff4d4dbb;
            outline: none;
            transform: scale(1.05);
        }

        form {
            background: #fff0f0dd;
            padding: 36px 48px;
            border-radius: 18px;
            box-shadow: 0 0 32px #cc000033, inset 0 0 16px #ff9999aa;
            width: 100%;
            max-width: 520px;
            display: flex;
            flex-direction: column;
            gap: 28px;
            border: 4px solid #cc0000aa;
        }

        .form-item {
            display: flex;
            flex-direction: column;
        }

        label {
            font-size: 1.4rem;
            font-weight: 700;
            margin-bottom: 10px;
            color: #a30000;
            text-shadow: 0 0 3px #cc000066;
            letter-spacing: 1px;
        }

        input[type="text"], input[type="date"] {
            padding: 16px 18px;
            font-size: 1.2rem;
            font-weight: 700;
            color: #8a0000;
            border: 3px solid #cc0000;
            border-radius: 14px;
            background: #ffd6d6;
            box-shadow: 0 0 14px #ff6666aa, inset 0 0 8px #ff9999cc;
            transition: border-color 0.3s ease, box-shadow 0.3s ease, background 0.3s ease;
            font-family: 'Inter', Arial, sans-serif;
        }

        input[type="text"]:focus,
        input[type="date"]:focus {
            outline: none;
            border-color: #ff6666;
            box-shadow: 0 0 24px #ff9999cc, inset 0 0 12px #ffc1c1cc;
            background: #fff5f5;
            color: #b30000;
        }

        button {
            padding: 18px 32px;
            font-size: 1.6rem;
            font-weight: 900;
            color: white;
            text-transform: uppercase;
            background: linear-gradient(135deg, #cc0000, #ff4d4d);
            border: none;
            border-radius: 24px;
            box-shadow: 0 0 36px #ff6666cc, inset 0 0 18px #cc0000cc;
            cursor: pointer;
            transition: background 0.4s ease, box-shadow 0.35s ease, transform 0.35s ease;
            user-select: none;
            align-self: center;
            width: 55%;
            min-width: 160px;
            letter-spacing: 1.8px;
            text-shadow: 1px 1px 3px #66000099;
        }

        button:hover,
        button:focus {
            background: linear-gradient(135deg, #ff4d4d, #cc0000);
            box-shadow: 0 0 48px #ff8080cc, 0 0 68px #ff999999, inset 0 0 22px #ff4d4dcc;
            outline: none;
            transform: scale(1.08);
        }

        @media (max-width: 480px) {
            body {
                padding: 24px 16px;
            }
            h1 {
                font-size: 2.6rem;
                margin-bottom: 24px;
            }
            form {
                padding: 24px 24px;
                width: 100%;
            }
            button {
                width: 100%;
            }
            label {
                font-size: 1.2rem;
            }
            input[type="text"], input[type="date"] {
                font-size: 1rem;
                padding: 12px 14px;
            }
        }
    </style>
</head>
<body>
    <h1>Tambah Bayi</h1>
    <a href="bayi.php">Kembali</a>
    <form action="" method="post">
        <div class="form-item">
            <label for="nama">Nama Bayi</label>
            <input type="text" name="nama" id="nama" required>
        </div>
        <div class="form-item">
            <label for="nama_ibu">Nama Ibu</label>
            <input type="text" name="nama_ibu" id="nama_ibu" required>
        </div>
        <div class="form-item">
            <label for="nama_ayah">Nama Ayah</label>
            <input type="text" name="nama_ayah" id="nama_ayah" required>
        </div>
        <div class="form-item">
            <label for="tanggal_lahir">Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" id="tanggal_lahir" required>
        </div>
        <button type="submit">Tambah</button>
    </form>
</body>
</html>
