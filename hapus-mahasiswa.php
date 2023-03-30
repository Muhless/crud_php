<?php
include "config/app.php";

$id_mahasiswa = (int) $_GET['id_mahasiswa'];

if (delete_mahasiswa($id_mahasiswa) > 0 ) {
    echo "<script>
            alert('Data Berhasil Dihapus');
            document.location.href = 'data-mahasiswa.php';
        </script>";
} else { 
    echo "<script>
            alert('Data Gagal Dihapus');
            document.location.href = 'data-mahasiswa.php';
        </script>";
}

?>