<?php
   include "../../../config/koneksi.php";
   $id_kontak = $_GET['id'];
   $sql = "SELECT * FROM kontak WHERE id_kontak='$id_kontak'";
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
            <input type="hidden" value="<?php echo $dt['id_kontak'];?>" name="id_kontak">
            <div class="row">
              <div class="col-md-8 mb-3">
                <label>Nama : </label>
                <input type="text" class="form-control" name="nama" value="<?php echo $dt['nama'];?>">
              </div>
              <div class="col-md-4 mb-3">
                <label>Email : </label>
                <input type="text" class="form-control" name="email" value="<?php echo $dt['email'];?>">
              </div>
              <div class="col-md-4 mb-3">
                <label>Subjek : </label>
                <input type="text" class="form-control" name="subjek" value="<?php echo $dt['subjek'];?>">
              </div>
              <div class="col-md-4 mb-3">
                <label>Pesan : </label>
                <input type="text" class="form-control" name="pesan" value="<?php echo $dt['pesan'];?>">
              </div>
              <div class="col-md-4 mb-3">
                <label>Tanggal : </label>
                <input type="text" class="form-control" name="tanggal" value="<?php echo $dt['tanggal'];?>">
              </div>
            </div>
            <button class="btn btn-primary btn-lg btn-block" type="submit">Edit</button>
            <br>
            <a href="../../index.php?page=kontak">< Kembali</a>
          </form>
        </div>
      </div>
    </div>

    <script src="../../../asset/js/jquery-3.4.1.min.js"></script>
    <script src="../../../asset/js/bootstrap.bundle.js"></script>
    <script src="../../../asset/js/bootstrap.min.js"></script>
  </body>
</html>