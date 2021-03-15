<?php
   include "../../../config/koneksi.php";
   $id_perusahaan = $_GET['id'];
   $sql = "SELECT * FROM jasa_pengiriman WHERE id_perusahaan='$id_perusahaan'";
   $result = mysqli_query($koneksi, $sql);
   $dt = mysqli_fetch_array($result);
?>
<html>
  <head>
    <title>Dashboard | Edit</title>
    <link rel="stylesheet" href="../../../asset/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../../asset/css/form.css">
  </head>
  <body class="bg-light">
    <div class="container">
      <div class="py-5 text-center">
        <h1 class="lead"> Edit Data </h1>
      </div>
      <div class="row">
        <div class="col-md-12 order-md-1">
          <form action="editaksi.php" method="post" class="needs-validation">
            <input type="hidden" value="<?php echo $dt['id_perusahaan'];?>" name="id_perusahaan">
            <div class="row">
              <div class="col-md-8 mb-3">
                <label>Nama Perusahaan : </label>
                <input type="text" class="form-control" name="nama_perusahaan" value="<?php echo $dt['nama_perusahaan'];?>">
              </div>
              <div class="col-md-4 mb-3">
                <label>Gambar : </label>
                <input type="text" class="form-control" name="gambar" value="<?php echo $dt['gambar'];?>">
              </div>
            </div>
            <button class="btn btn-primary btn-lg btn-block" type="submit">Edit</button>
            <br>
            <a href="../../index.php?page=jasa_pengiriman">< Kembali</a>
          </form>
        </div>
      </div>
    </div>

    <script src="./asset/js/jquery-3.4.1.min.js"></script>
    <script src="./asset/js/bootstrap.bundle.js"></script>
    <script src="./asset/js/bootstrap.min.js"></script>
  </body>
</html>