<?php
include "layout/header.php";

$title = 'Data Mahasiswa';

$data_mahasiswa = select("SELECT * FROM mahasiswa ORDER BY id_mahasiswa DESC");

?>

<div class="container mt-5">
    <h1>Data Mahasiswa</h1>
    <hr>
    <a href="tambah-mahasiswa.php" class="btn btn-primary mb-3">Tambah Data</a>

    <table class="table table-bordered table-striped table-hover" id="table">
        <thead>
            <th>No</th>
            <th>Nama</th>
            <th>Program Studi</th>
            <th>Jenis Kelamin</th>
            <th>Telepon</th>
            <th>Aksi</th>
        </thead>

        <tbody>
            <?php $no = 1; ?>
            <?php foreach ($data_mahasiswa as $mahasiswa) : ?>
                <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $mahasiswa['nama']; ?></td>
                    <td><?php echo $mahasiswa['prodi']; ?></td>
                    <td><?php echo $mahasiswa['jenis_kelamin']; ?></td>
                    <td><?php echo $mahasiswa['telepon']; ?></td>
                    <td class="text-center" style="width: 20%;">
                        <a href="detail-mahasiswa.php?id_mahasiswa=<?= $mahasiswa['id_mahasiswa'];?>" class="btn btn-secondary btn-sm">Detail</a>
                        <a href="detail-mahasiswa.php" class="btn btn-success btn-sm">Edit</a>
                        <a href="detail-mahasiswa.php" class="btn btn-danger btn-sm">Hapus</a>

                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</div>

<?php
include "layout/footer.php";
?>