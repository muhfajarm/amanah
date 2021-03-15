<?php
   include "../../../config/koneksi.php";
   $id_kategori = $_GET['id'];
   $sql = "SELECT * FROM kategori WHERE id_kategori='$id_kategori'";
   $result = mysqli_query($koneksi, $sql);
   $dt = mysqli_fetch_array($result);
?>
<html>
  <head>
    <title>Dashboard | Edit</title>
    <link rel="stylesheet" href="../../../asset1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../../asset1/css/form.css">
  </head>
  <body class="bg-light">
    <div class="container">
      <div class="py-5 text-center">
        <h1 class="lead"> Edit Data </h1>
      </div>
      <div class="row">
        <div class="col-md-12 order-md-1">
          <form action="editaksi.php" method="post" class="needs-validation">
            <input type="hidden" value="<?php echo $dt['id_kategori'];?>" name="id_kategori">
            <div class="row">
              <div class="col-md-8 mb-3">
                <label>Nama Kategori : </label>
                <input type="text" class="form-control" name="nama_kategori" value="<?php echo $dt['nama_kategori'];?>">
              </div>
            </div>
            <button class="btn btn-primary btn-lg btn-block" type="submit">Edit</button>
            <br>
            <a href="./index.php?page=kategori">< Kembali</a>
          </form>
        </div>
      </div>
    </div>

    <script src="../../../asset1/js/jquery-3.4.1.min.js"></script>
    <script src="../../../asset1/js/bootstrap.bundle.js"></script>
    <script src="../../../asset1/js/bootstrap.min.js"></script>
  </body>
</html>