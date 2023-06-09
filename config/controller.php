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


// fungsi update data barang
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

    $nama               = $post['nama'];
    $prodi              = $post['prodi'];
    $jenis_kelamin      = $post['jenis_kelamin'];
    $telepon            = $post['telepon'];
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


// fungsi update data mahasiswa
function update_mahasiswa($post)
{
    global $db;

    $id_mahasiswa   = strip_tags($post['id_mahasiswa']);
    $nama           = strip_tags($post['nama']);
    $prodi          = strip_tags($post['prodi']);
    $jenis_kelamin  = strip_tags($post['jenis_kelamin']);
    $telepon        = strip_tags($post['telepon']);
    $email          = strip_tags($post['email']);
    $fotoLama       = strip_tags($post['fotoLama']);

    // check upload foto/tidak
    if ($_FILES['foto']['error'] == 4) {
        $foto = $fotoLama;
    } else {
        $foto = upload_file();
    }

    // query ubah data mahasiswa
    $query = "UPDATE mahasiswa SET nama='$nama', prodi='$prodi', jenis_kelamin='$jenis_kelamin', telepon='$telepon', email='$email', foto='$foto' WHERE id_mahasiswa = $id_mahasiswa";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}



// fungsi delete data mahasiswa
function delete_mahasiswa($id_mahasiswa)
{
    global $db;

    // query unlink foto
    $foto = select("SELECT * FROM mahasiswa WHERE id_mahasiswa = $id_mahasiswa")[0];
    unlink("assets/img/". $foto['foto']);

    // query delete foto
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


// fungsi tambah akun
function create_akun($post){
    global $db;

    $nama       = strip_tags($post['nama']);
    $username   = strip_tags($post['username']);
    $email      = strip_tags($post['email']);
    $password   = strip_tags($post['password']);
    $level      = strip_tags($post['level']);

    $password   = password_hash($password, PASSWORD_DEFAULT);

    // query tambah data
    $query      = "INSERT INTO akun VALUES (null, '$nama', '$username', '$email', '$password', '$level');";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);

}

// fungsi update data akun
function update_akun($post){
    global $db;

    $id_akun        = strip_tags($post['id_akun']);
    $nama           = strip_tags($post['nama']);
    $username       = strip_tags($post['username']);
    $email          = strip_tags($post['email']);
    $password       = strip_tags($post['password']);
    $level          = strip_tags($post['nama']);

    $password       = password_hash($password, PASSWORD_DEFAULT);

    $query          = "UPDATE akun SET nama = '$nama', username = '$username', email = '$email', password = '$password', level = '$level' WHERE id_akun = $id_akun";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}


// fungsi delete data akun
function delete_akun($id_akun){
    global $db;

    $query = "DELETE FROM akun WHERE id_akun = $id_akun";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}