<?php
$title = "Form Ubah Mahasiswa";

include "layout/header.php";

$id_mahasiswa = (int) $_GET['id_mahasiswa'];

$mahasiswa = select("SELECT * FROM mahasiswa WHERE id_mahasiswa = $id_mahasiswa")[0];

if(create_mahasiswa($_POST) > 0 ){

}

?>

<div class="container mt-5">
    <h1>Ubah Mahasiswa</h1>
    <hr>

    <form action="" method="post" enctype="multipart/form-data">
        <input type="text" name="id_mahasiswa" value="<?php echo $mahasiswa['id_mahasiswa']; ?>">

        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input required type="text" class="form-control" id="nama" name="nama" value="<?= $mahasiswa['nama'] ?>">
        </div>

        <div class="row">
            <div class="mb-3 col-6">
                <label for="prodi" class="form-label">Program Studi</label>
                <select required class="form-control" id="prodi" name="prodi">
                    <?php $prodi = $mahasiswa['prodi']; ?>
                    <option value="Teknik Informatika" <?php echo $prodi == 'Teknik Informatika' ? 'selected' : null ?>>Teknik Informatika</option>
                    <option value="Teknik Industri" <?php echo $prodi == 'Teknik Industri' ? 'selected' : null ?>>Teknik Industri</option>
                    <option value="Teknik Mesin" <?php echo $prodi == 'Teknik Mesin' ? 'selected' : null ?>>Teknik Mesin</option>
                    <option value="Teknik Elektro" <?php echo $prodi == 'Teknik Elektro' ? 'selected' : null ?>>Teknik Elektro</option>
                    <option value="Teknik Bangunan" <?php echo $prodi == 'Teknik Bangunan' ? 'selected' : null ?>>Teknik Bangunan</option>
                </select>
            </div>

            <div class="mb-3 col-6">
                <label for="jenis_kelamin">Jenis Kelamin</label>
                <select required class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                    <?php $jenis_kelamin = $mahasiswa['jenis_kelamin']; ?>
                    <option value="laki-laki" <?= $jenis_kelamin == 'laki-laki' ? 'selected' : null ?>>Laki-Laki</option>
                    <option value="perempuan" <?= $jenis_kelamin == 'perempuan' ? 'selected' : null ?>>Perempuan</option>
                </select>
            </div>
        </div>

        <div class="mb-3">
            <label for="telepon" class="form-label">Telepon</label>
            <input required type="number" class="form-control" id="telepon" name="telepon" value="<?= $mahasiswa['telepon']; ?>">
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input required type="email" class="form-control" id="email" name="email" value="<?= $mahasiswa['email']; ?>">
        </div>

        <div class="mb-3">
            <label for="foto" class="form-label">Foto</label>
            <input required type="file" class="form-control" id="foto" placeholder="foto">
            <p>
                <small>Gambar Sebelumnya</small>
            </p>
            <img src="assets/img/<?= $mahasiswa['foto'] ?>" alt="foto" width="100px">
        </div>

        <button ></button>
    </form>


</div>


<?php
include "layout/footer.php";
?>