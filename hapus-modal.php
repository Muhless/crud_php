<?php
$title = "Hapus Akun";

include "config/app.php";

$id_akun = (int)$_GET['id_akun'];

if (delete_akun($id_akun) > 0) {
        echo "<script>
                alert('Akun Berhasil Dihapus');
                document.location.href = 'data-modal.php';
            </script>";
    } else {
        echo "<script>
                alert('Akun Gagal Dihapus');        
                document.location.href = 'data-modal.php';
            </script>";
    }
