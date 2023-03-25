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
    <button class="btn btn-primary">Tambah Data</button>
  </div>

  <div class="container mt-3">
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
        <tr>
          <td>1</td>
          <td>Monitor</td>
          <td>1</td>
          <td>1000000</td>
          <td>17/7/2022</td>
          <td></td>
        </tr>
      </tbody>
    </table>

  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
</body>

</html>