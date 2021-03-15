<?php
   include "../../../config/koneksi.php";
   $id_produk = $_GET['id'];
   $sql = "SELECT * FROM produk WHERE id_produk='$id_produk'";
   $result = mysqli_query($koneksi, $sql);
   $dt = mysqli_fetch_array($result);
?>
<html>
  <head>
    <title>Dashboard | Edit</title>
    <link rel="stylesheet" href="../asset1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../asset1/css/form.css">
  </head>
  <body class="bg-light">
    <div class="container">
      <div class="py-5 text-center">
        <h1 class="lead"> Edit Data </h1>
      </div>
      <div class="row">
        <div class="col-md-12 order-md-1">
          <form action="editaksi.php" method="post" class="needs-validation">
            <input type="hidden" value="<?php echo $dt['id_produk'];?>" name="id_produk">
            <div class="row">
              <div class="col-md-8 mb-3">
                <label>Kategori : </label>
                <input type="text" class="form-control" name="kategori_id" value="<?php echo $dt['kategori_id'];?>">
              </div>
              <div class="col-md-8 mb-3">
                <label>Nama Produk : </label>
                <input type="text" class="form-control" name="nama_produk" value="<?php echo $dt['nama_produk'];?>">
              </div>
              <div class="col-md-8 mb-3">
                <label>Deskripsi : </label>
                <input type="text" class="form-control" name="deskripsi" value="<?php echo $dt['deskripsi'];?>">
              </div>
              <div class="col-md-8 mb-3">
                <label>Harga Beli : </label>
                <input type="integer" class="form-control" name="harga_beli" value="<?php echo $dt['harga_beli'];?>">
              </div>
              <div class="col-md-8 mb-3">
                <label>Harga : </label>
                <input type="integer" class="form-control" name="harga_produk" value="<?php echo $dt['harga_produk'];?>">
              </div>
              <div class="col-md-8 mb-3">
                <label>Stok : </label>
                <input type="integer" class="form-control" name="stok" value="<?php echo $dt['stok'];?>">
              </div>
              <div class="col-md-8 mb-3">
                <label>Berat: </label>
                <input type="double" class="form-control" name="berat" value="<?php echo $dt['berat'];?>">
              </div>
              <div class="col-md-8 mb-3">
                <label>Tanggal Masuk : </label>
                <input type="date" class="form-control" name="tgl_masuk" value="<?php echo $dt['tgl_masuk'];?>">
              </div>
              <div class="col-md-8 mb-3">
                <label>Gambar : </label>
                <input type="text" class="form-control" name="gambar" value="<?php echo $dt['gambar'];?>">
              </div>
              <div class="col-md-8 mb-3">
                <label>Beli : </label>
                <input type="integer" class="form-control" name="dibeli" value="<?php echo $dt['dibeli'];?>">
              </div>
              <div class="col-md-8 mb-3">
                <label>Diskon : </label>
                <input type="integer" class="form-control" name="diskon" value="<?php echo $dt['diskon'];?>">
              </div>
            </div>
            <button class="btn btn-primary btn-lg btn-block" type="submit">Edit</button>
            <br>
            <a href="../../index.php?page=produk">< Kembali</a>
          </form>
        </div>
      </div>
    </div>

    <script src="./asset1/js/jquery-3.4.1.min.js"></script>
    <script src="./asset1/js/bootstrap.bundle.js"></script>
    <script src="./asset1/js/bootstrap.min.js"></script>
  </body>
</html>