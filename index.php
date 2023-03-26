<?php

include "layout/header.php";

$data_barang = select("SELECT * FROM barang");

?>

<div class="container mt-5">
  <h1>Data Barang</h1>
  <hr>
  <a href="form-tambah.php" class="btn btn-primary mb-3">Tambah Data</a>

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
          <td><?php echo $barang['nama']; ?></td>
          <td><?php echo $barang['jumlah']; ?></td>
          <td>Rp. <?php echo number_format($barang['harga'], 0, ',', ','); ?></td>
          <td><?php echo date("Y-m-d | H:i:s", strtotime($barang['tanggal'])); ?></td>
          <td style="width:15%" class="text-center">
            <a href="" class="btn btn-success">Ubah</a>
            <a href="" class="btn btn-danger">Hapus</a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>

</div>

<div class="container mt-4">
  
</div>


<?php

include "layout/footer.php"

?>