<?php
$title = "Form Tambah Mahasiswa";

include "layout/header.php";

if (isset($_POST['tambah'])) {
    if (create_mahasiswa($_POST) > 0) {
        echo "<script>
                alert('Data Mahasiswa Berhasil Ditambahkan');
                document.location.href = 'data-mahasiswa.php';
            </script>";
    } else {
        echo "<script>
                alert('Data Mahasiswa Gagal Ditambahkan');
                document.location.href = 'data-mahasiswa.php';
            </script>";
    }
}

?>

<div class="container mt-5">
    <h1>Tambah Mahasiswa</h1>
    <hr>

    <form action="" method="post" enctype="multipart/form-data">

        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input required type="text" class="form-control" id="nama" name="nama" placeholder="Nama Mahasiswa...">
        </div>

        <div class="row">
            <div class="mb-3 col-6">
                <label for="prodi" class="form-label">Program Studi</label>
                <select required class="form-select" aria-label="Default select example" id="prodi" name="prodi">
                    <option selected>-- pilih program studi --</option>
                    <option value="Teknik Informatika">Teknik Informatika</option>
                    <option value="Teknik Industri">Teknik Industri</option>
                    <option value="Teknik Mesin">Teknik Mesin</option>
                    <option value="Teknik Elektro">Teknik Elektro</option>
                    <option value="Teknik Bangunan">Teknik Bangunan</option>
                </select>
            </div>

            <div class="mb-3 col-6">
                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                <select required class="form-select" aria-label="Default select example" name="jenis_kelamin" id="jenis_kelamin">
                    <option selected>-- pilih jenis kelamin --</option>
                    <option value="laki-laki">Laki-Laki</option>
                    <option value="perempuan">Perempuan</option>
                </select>
            </div>
        </div>

        <div class="mb-3">
            <label for="telepon" class="form-label">Telepon</label>
            <input required type="number" class="form-control" id="telepon" name="telepon" placeholder="nomor telepon mahasiswa...">
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input required type="email" class="form-control" id="email" name="email" placeholder="email mahasiswa...">
        </div>

        <div class="mb-3">
            <label for="foto" class="form-label">Foto</label>
            <input type="file" class="form-control" id="foto" name="foto">
        </div>

        <button type="submit" name="tambah" class="btn btn-primary mt-3 mb-5" style="float:right">Tambah Data</button>


    </form>


</div>

<?php
include "layout/footer.php";
?>