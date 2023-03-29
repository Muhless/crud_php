<?php
$title = "Detail Mahasiswa";

include "layout/header.php";

// mengambil data melalui url
$id_mahasiswa = (int)$_GET['id_mahasiswa'];

$mahasiswa = select("SELECT * FROM mahasiswa WHERE id_mahasiswa = $id_mahasiswa")[0];

?>


<div class="container mt-5">
    <h1>Data <?php echo $mahasiswa['nama']; ?></h1>
    <hr>
</div>

<div class="container">
    <table class="table table-bordered table-striped">
        <tr>
            <td>Nama</td>
            <td><?php echo $mahasiswa['nama']; ?></td>
        </tr>
        <tr>
            <td>Program Studi</td>
            <td><?php echo $mahasiswa['prodi']; ?></td>
        </tr>
        <tr>
            <td>Jenis Kelamin</td>
            <td><?php echo $mahasiswa['jenis_kelamin']; ?></td>
        </tr>
        <tr>
            <td>Telepon</td>
            <td><?php echo $mahasiswa['telepon']; ?></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><?php echo $mahasiswa['email']; ?></td>
        </tr>
        <tr>
            <td width="50%">Foto</td>
            <td>
                <a href="assets/img/<?php echo $mahasiswa['foto'];?>">
                <img src="assets/img/<?php echo $mahasiswa['foto'];?>" alt="foto" width="50%">
                </a>
            <td>
        </tr>
    </table>

    <a href="data-mahasiswa.php" class="btn btn-secondary mb-5" style="float:right">Kembali</a>

</div>

<?php
include "layout/footer.php";
?>