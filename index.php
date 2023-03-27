<?php

include "layout/header.php";

$data_barang = select("SELECT * FROM barang ORDER BY id_barang ASC");

?>

<div class="container mt-5">
  <h1>Data Barang</h1>
  <hr>
  <a href="form-tambah.php" class="btn btn-primary mb-3">Tambah Data</a>

  <table class="table table-bordered table-striped table-hover" id="table">
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
            <a href="ubah-barang.php?id_barang=<?php echo $barang['id_barang'];?>" class="btn btn-success">Ubah</a>
            <a href="hapus-barang.php?id_barang=<?php echo $barang['id_barang'];?>" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data ?')">Hapus</a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>

</div>


<?php

include "layout/footer.php"

?>