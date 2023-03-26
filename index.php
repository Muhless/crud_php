<?php

include "database.php";

function select($query)
{
  global $db;

  $result = mysqli_query($db, $query);
  $rows = [];


  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }
  return $rows;
}

$data_barang = select("SELECT * FROM barang");
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CRUD PHP</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
</head>

<body>

  <div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container">
        <a class="navbar-brand" href="#">CRUD PHP</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" href="index.php">Barang</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Mahasiswa</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link" href="#">Modal</a>
            </li>
        </div>
      </div>
    </nav>
  </div>

  <div class="container mt-3">
    <h1>Data Barang</h1>
    <hr>
    <a href="form-tambah.php" class="btn btn-primary">Tambah Data</a>
  </div>

  <div class="container mt-4">
    <table class="table table-bordered table-striped table-hover">
      <thead>
        <th>No</th>
        <th>Nama</th>
        <th>Jumlah</th>
        <th>Harga</th>
        <th>Tanggal</th>
        <th>Aksi</th>
      </thead>

      <tbody>
        <?php $no = 1 ?>
        <?php foreach ($data_barang as $barang) : ?>
          <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $barang['nama'];?></td>
            <td><?php echo $barang['jumlah'];?></td>
            <td>Rp. <?php echo number_format($barang['harga'], 0,',',',') ;?></td>
            <td><?php echo date ("Y-m-d | H:i:s", strtotime($barang['tanggal'])); ?></td>
            <td style="width:15%" class="text-center">
              <a href="" class="btn btn-success">Ubah</a>
              <a href="" class="btn btn-danger">Hapus</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
</body>

</html>