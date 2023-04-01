<?php
$title = "Form Ubah Mahasiswa";

include "layout/header.php";

$id_mahasiswa = (int) $_GET['id_mahasiswa'];

$mahasiswa = select("SELECT * FROM mahasiswa WHERE id_mahasiswa = $id_mahasiswa")[0];

if (isset($_POST['ubah'])) {
    if (update_mahasiswa($_POST) > 0) {
        echo "<script>
                alert('Data Berhasil Diubah');        
                document.location.href = 'data-mahasiswa.php';
            </script>";
    } else {
        echo "<script>
                alert('Data Gagal Diubah';
                document.location.href = 'data-mahasiswa.php';
            </script>";
    }
}
?>

<div class="container mt-5">
    <h1>Ubah Mahasiswa</h1>
    <hr>

    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id_mahasiswa" value="<?php echo $mahasiswa['id_mahasiswa']; ?>">

        <input type="hidden" name="fotoLama" value="<?php echo $mahasiswa['foto']; ?>">


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
            <input required type="file" class="form-control" id="foto" name="foto" placeholder="foto" onchange="previewImg()">
            
            <img src="assets/img/<?php echo $mahasiswa['foto']; ?>" alt="" class="img-thumbnail img-preview mt-3" width="100px">
        </div>

        <button class="btn btn-primary mb-5" name="ubah" style="float:right;">Ubah</button>
    </form>
</div>

<script>
    function previewImg() {
        const foto = document.querySelector('#foto');
        const imgPreview = document.querySelector('.img-preview');

        const fileFoto = new FileReader();
        fileFoto.readAsDataURL(foto.files[0]);

        fileFoto.onload = function(e){
            imgPreview.src = e.target.result;
        }
    }
</script>


<?php
include "layout/footer.php";
?>