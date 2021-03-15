<?php
   include "../../../config.php";
   $id_orders = $_GET['id'];
   $sql = "SELECT * FROM orders WHERE id_orders='$id_orders'";
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
            <input type="hidden" value="<?php echo $dt['id_orders'];?>" name="id_orders">
            <div class="row">
              <input type="hidden" name="user_id" value="<?= $dt['user_id'];?>">
              <div class="col-md-8 mb-3">
                <label>Nama Kustomer : </label>
                <input type="text" class="form-control" name="nama_kustomer" value="<?php echo $dt['nama_kustomer'];?>">
              </div>
              <div class="col-md-4 mb-3">
                <label>Alamat : </label>
                <input type="text" class="form-control" name="alamat" value="<?php echo $dt['alamat'];?>">
              </div>
              <div class="col-md-8 mb-3">
                <label>Telpon : </label>
                <input type="text" class="form-control" name="telpon" value="<?php echo $dt['telpon'];?>">
              </div>
              <div class="col-md-8 mb-3">
                <label>Email : </label>
                <input type="text" class="form-control" name="email" value="<?php echo $dt['email'];?>">
              </div>
              <div class="col-md-8 mb-3">
                <label>Status Order : </label>
                <input type="text" class="form-control" name="status_order" value="<?php echo $dt['status_order'];?>">
              </div>
              <div class="col-md-8 mb-3">
                <label>Tanggal Order : </label>
                <input type="date" class="form-control" name="tgl_orders" value="<?php echo $dt['tgl_orders'];?>">
              </div>
              <div class="col-md-8 mb-3">
                <label>Id Kota : </label>
                <input type="text" class="form-control" name="total" value="<?php echo $dt['total'];?>">
              </div>
              </div>
            <button class="btn btn-primary btn-lg btn-block" type="submit">Edit</button>
            <br>
            <a href="./index.php?page=order">< Kembali</a>
          </form>
        </div>
      </div>
    </div>

    <script src="./asset1/js/jquery-3.4.1.min.js"></script>
    <script src="./asset1/js/bootstrap.bundle.js"></script>
    <script src="./asset1/js/bootstrap.min.js"></script>
  </body>
</html>