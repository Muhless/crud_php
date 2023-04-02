<?php
$title = "Data Modal";

include "layout/header.php";

// $id_akun = (int)$_GET['id_akun'];

$data_akun = select("SELECT * FROM akun ORDER BY id_akun DESC");


// // 
?>

<div class="container mt-5">
    <h1>Data Modal</h1>
    <hr>

    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#modalTambah">Tambah Akun</button>

    <table class="table table-bordered table-striped table-hover" id="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Username</th>
                <th>Email</th>
                <th>Password</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            <?php $no = 1; ?>
            <?php foreach ($data_akun as $akun) : ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $akun['nama']; ?></td>
                    <td><?= $akun['username']; ?></td>
                    <td><?= $akun['email']; ?></td>
                    <td><?= $akun['password']; ?></td>
                    <td>
                        <center>
                            <button class="btn btn-success">Ubah</button>
                            <button class="btn btn-danger">Hapus</button>
                        </center>
                    </td>


                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>


</div>

<?php
include "layout/footer.php";
?>