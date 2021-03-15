<?php 
  include "../../../config/koneksi.php";
  $sql = "SELECT * FROM kategori k ORDER BY id_kategori ASC";
  $query = mysqli_query($koneksi, $sql) or die("select data menu error :".mysql_error());
?>
<html>
  <head>
    <title>Dashboard | Tambah</title>
    <link rel="stylesheet" href="../../../asset1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../../asset1/css/form.css">
  </head>
  <body class="bg-light">
    <div class="container">
      <div class="py-5 text-center">
        <h1 class="lead"> Tambah Data </h1>
      </div>
      <div class="row">
        <div class="col-md-12 order-md-1">
          <form action="insert.php" method="post" class="needs-validation" enctype="multipart/form-data">
		        <div class="row">
              <div class="col-md-8 mb-3">
                <label>Kategori : </label>
                  <select class="form-control" name="kategori_id">
                  <?php foreach ($query as $data): ?>
                   <option value="<?= $data["id_kategori"];?>"><?= $data["nama_kategori"];?></option>
                  <?php endforeach ?>
                </select>
              </div>
              <div class="col-md-8 mb-3">
                <label>Nama Produk : </label>
                <input type="text" class="form-control" name="nama_produk">
              </div>
              <div class="col-md-8 mb-3">
                <label>Deskripsi : </label>
                <input type="text" class="form-control" name="deskripsi">
              </div>
              <div class="col-md-8 mb-3">
                <label>Harga Beli: </label>
                <input type="integer" class="form-control" name="harga_beli">
              </div>
              <div class="col-md-8 mb-3">
                <label>Harga : </label>
                <input type="integer" class="form-control" name="harga">
              </div>
              <div class="col-md-8 mb-3">
                <label>Stok : </label>
                <input type="integer" class="form-control" name="stok">
              </div>
              <div class="col-md-8 mb-3">
                <label>Berat <span>(gram)</span> : </label>
                <input type="double" class="form-control" name="berat">
              </div>
              <div class="col-md-8 mb-3">
                <label>Tanggal Masuk : </label>
                <input type="date" class="form-control" name="tgl_masuk">
              </div>
              <div class="col-md-8 mb-3">
                <label>Gambar : </label>
                <input type="file" class="form-control" name="gambar">
              </div>
              <div class="col-md-8 mb-3">
                <label>Diskon : </label>
                <input type="integer" class="form-control" name="diskon">
              </div>
            </div>
            <button class="btn btn-primary btn-lg btn-block" type="submit">Tambah</button>
            <br>
            <a href="../../index.php?page=produk">< Kembali</a>
          </form>
        </div>
      </div>
    </div>

    <script src="../../../asset1/js/jquery-3.4.1.min.js"></script>
    <script src="../../../asset1/js/bootstrap.bundle.js"></script>
    <script src="../../../asset1/js/bootstrap.min.js"></script>
  </body>
</html>