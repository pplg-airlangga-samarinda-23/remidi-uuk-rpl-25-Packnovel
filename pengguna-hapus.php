<?php

require 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $id_pengguna = $_GET['id'];
    $sql = "DELETE FROM pengguna WHERE id_pengguna=?";
    $row = $koneksi->execute_query($sql, [$id_pengguna]);
    if ($row) {
        header("location:pengguna.php");
}
}