<?php
include "layout/header.php"

?>

<div class="container mt-5">
    <h1>Tambah Barang</h1>
    <hr>

    <form action="">

        <div class="mb-3">
            <label for="nama" class="form-label">Nama Barang</label>
            <input required type="text" class="form-control" id="nama" name=" nama" placeholder="Nama Barang...">
        </div>

        <div class="mb-3">
            <label for="jumlah" class="form-label">Jumlah</label>
            <input required type="number" class="form-control" id="jumlah" name=" jumlah" placeholder="Jumlah Barang...">
        </div>

        <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input required type="number" class="form-control" id="harga" name=" harga" placeholder="Harga Barang...">
        </div>

        <button type="button" name="tambah" class="btn btn-primary">Tambah</button>

    </form>

</div>

<?php
include "layout/footer.php";
?>

</div>