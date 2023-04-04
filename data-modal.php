<?php
$title = "Data Modal";

include "layout/header.php";

// $id_akun = (int)$_GET['id_akun'];

$data_akun = select("SELECT * FROM akun");


// tambah akun
if (isset($_POST['tambah'])) {
  if (create_akun($_POST) > 0) {
    echo "<script>
          alert('Akun Berhasil Ditambahkan');
          document.location.href = 'data-modal.php';
        </script>";
  } else {
    echo "<script>
          alert('Akun Gagal Ditambahkan');
          document.location.herf = 'data-modal.php';
        </script>";
  }
}

// ubah akun
if (isset($_POST['ubah'])) {
  if (update_akun($_POST) > 0) {
    echo "<script>
          alert('Akun Berhasil Diubah');
          document.location.href = 'data-modal.php';
        </script>";
  } else {
    echo "<script>
          alert('Akun Gagal Ditambahkan');
          document.location.href = 'data-modal.php';
        </script>";
  }
}



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
          <td>Password Ter-Enkripsi</td>
          <td class="text-center">
            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalUbah<?= $akun['id_akun']; ?>">Ubah</button>
            <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalHapus<?= $akun['id_akun']; ?>">Hapus</button>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>

  <!-- modal tambah -->
  <div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-primary text-white">
          <h1 class="modal-title fs-5 " id="exampleModalLabel">Tambah Akun</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">
          <form action="" method="post">

            <div>
              <label for="nama" class="form-label">Nama</label>
              <input type="text" class="form-control" id="nama" name="nama" required>
            </div>

            <div>
              <label for="username" class="form-label">Username</label>
              <input type="text" class="form-control" id="username" name="username" required>
            </div>

            <div>
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" id="email" name="email" required>
            </div>

            <div>
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control" id="password" name="password" required minlength="6">
            </div>

            <div>
              <label for="level">Level</label>
              <select class="form-control" name="level" id="level" required>
                <option value="">-- pilih level --</option>
                <option value="1">Admin</option>
                <option value="2">Operator</option>
              </select>
            </div>

        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
          <button type="submit" name="tambah" class="btn btn-primary">Tambah</button>
        </div>
        </form>

      </div>
    </div>
  </div>


  <!-- modal edit -->
  <?php foreach ($data_akun as $akun) : ?>
    <div class="modal fade" id="modalUbah<?= $akun['id_akun']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header bg-success text-white">
            <h1 class="modal-title fs-5 " id="exampleModalLabel">Ubah Akun</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>

          <div class="modal-body">
            <form action="" method="post">
              <input type="hidden" name="id_akun" value="<?= $akun['id_akun']; ?>">

              <div>
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?= $akun['nama']; ?>" required>
              </div>

              <div>
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" value="<?= $akun['username']; ?>" required>
              </div>

              <div>
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?= $akun['email']; ?>" required>
              </div>

              <div>
                <label for="password" class="form-label"><small>Masukkan Password Baru/Lama</small></label>
                <input type="password" class="form-control" id="password" name="password" required minlength="6">
              </div>

              <div>
                <label for="level">Level</label>
                <select class="form-control" name="level" id="level" required>
                  <?php $level = $akun['level']; ?>
                  <option value="">-- pilih level --</option>
                  <option value="1" <?= $level == '1' ? 'selected' : null ?>>Admin</option>
                  <option value="2" <?= $level == '2' ? 'selected' : null ?>>Operator</option>
                </select>
              </div>

          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
            <button type="submit" name="ubah" class="btn btn-primary">Ubah</button>
          </div>
          </form>

        </div>
      </div>
    </div>
  <?php endforeach; ?>


  <!-- modal hapus -->
  <?php foreach ($data_akun as $akun) : ?>
    <div class="modal fade" id="modalHapus<?= $akun['id_akun']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header bg-danger text-white">
            <h1 class="modal-title fs-5 " id="exampleModalLabel">Hapus Akun</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>

          <div class="modal-body">
            <p>Yakin Ingin Menghapus Data Akun : <?php echo $akun['nama']; ?> ?</p>
              <input type="text" name="id_akun" value="<?= $akun['id_akun']; ?>">

              <div>
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?= $akun['nama']; ?>" required>
              </div>

              <div>
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" value="<?= $akun['username']; ?>" required>
              </div>

              <div>
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?= $akun['email']; ?>" required>
              </div>

              <div>
                <label for="password" class="form-label"><small>Masukkan Password Baru/Lama</small></label>
                <input type="password" class="form-control" id="password" name="password" required minlength="6">
              </div>

              <div>
                <label for="level">Level</label>
                <select class="form-control" name="level" id="level" required>
                  <?php $level = $akun['level']; ?>
                  <option value="">-- pilih level --</option>
                  <option value="1" <?= $level == '1' ? 'selected' : null ?>>Admin</option>
                  <option value="2" <?= $level == '2' ? 'selected' : null ?>>Operator</option>
                </select>
              </div>

          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
            <a href="hapus-modal.php?id_akun=<?= $akun['id_akun']; ?>"  class="btn btn-danger">Hapus</a>
          </div>

        </div>
      </div>
    </div>
  <?php endforeach; ?>

</div>

<?php
include "layout/footer.php";
?>