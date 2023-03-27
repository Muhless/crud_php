<?php
include "config/app.php";

$id_barang = (int)$_GET['id_barang'];

if (delete_barang($id_barang) > 0 ) {
    echo "<script>
        alert('Data Berhasil Dihapus');
        document.location.href = 'index.php';</script>";
} else {
    echo "<script>
        alert('Data Gagal Dihapus');
        document.location.href = 'index.php';</script>";
}
