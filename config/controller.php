<?php

// fungsi mengambil data
function select($query)
{
    global $db;

    $result = mysqli_query($db, $query);
    $rows   = [];


    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}


// fungsi menambahkan data
function create_barang($post)
{
    global $db;

    $nama   = htmlspecialchars($post['nama']);
    $jumlah = htmlspecialchars($post['jumlah']);
    $harga  = htmlspecialchars($post['harga']);

    // query tambah data
    $query = "INSERT INTO barang VALUES (null, '$nama', '$jumlah', '$harga', CURRENT_TIMESTAMP())";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}


// fungsi update data
function update_barang($post)
{
    global $db;

    $id_barang  = strip_tags($post['id_barang']);
    $nama       = strip_tags($post['nama']);
    $jumlah     = strip_tags($post['jumlah']);
    $harga      = strip_tags($post['harga']);

    // query ubah data
    $query = "UPDATE barang SET nama='$nama', jumlah='$jumlah', harga='$harga' WHERE id_barang = $id_barang";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}



// fungsi delete data
function delete_barang($id_barang)
{
    global $db;

    // query delete data
    $query = "DELETE FROM barang WHERE id_barang = '$id_barang';";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

// fungsi menambahkan data mahasiswa
function create_mahasiswa($post)
{
    global $db;

    $id_mahasiswa       = $post['id_barang'];
    $nama               = $post['nama'];
    $prodi              = $post['prodi'];
    $jenis_kelamin      = $post['jenis_kelamin'];
    $telepon            = $post['nama'];
    $email              = $post['email'];
    $foto               = upload_file();

    // check upload foto
    if (!$foto) {
        return false;
    }

    // query tambah data
    $query = "INSERT INTO mahasiswa VALUES (null, '$nama', '$prodi', '$jenis_kelamin', '$telepon', '$email', '$foto');";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}


// fungsi delete data mahasiswa
function delete_mahasiswa($id_mahasiswa){
    global $db;

    $query = "DELETE FROM mahasiswa WHERE id_mahasiswa = $id_mahasiswa";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);

}


// fungsi upload file
function upload_file()
{
    global $db;

    $namaFile           = $_FILES['foto']['name'];
    $ukuranFile         = $_FILES['foto']['size'];
    $error              = $_FILES['foto']['error'];
    $tmpname            = $_FILES['foto']['tmp_name'];

    // check file yang diupload
    $extensifileValid   = ['jpg', 'jpeg', 'png'];
    $extensifile        = explode('.', $namaFile);
    $extensifile        = strtolower(end($extensifile));

    // check format ekstensi file
    if (!in_array($extensifile, $extensifileValid)) {
        echo    "<script>
                alert('Format File Tidak Valid');
                document.location.href = 'tambah-mahasiswa.php';
                </script>";
        die();
    }

    // check ukuran file < 2 MB 
    if ($ukuranFile > 2048000) {
        echo    "<script>
                alert('File Melebihi Batas Maximum 2MB');
                document.location.href = 'tambah-mahasiswa.php';
                </script>";
        die();
    }

    // generate nama file baru
    $namafileBaru = uniqid();
    $namafileBaru .= '.';
    $namafileBaru .= $extensifile;

    // pindahkan foto hasil upload ke folder asset/img/
    move_uploaded_file($tmpname, 'assets/img/' . $namafileBaru);
    return $namafileBaru;
}
