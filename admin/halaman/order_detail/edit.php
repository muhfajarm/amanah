<?php
   include "../../../config/koneksi.php";
   $id_order = $_GET['id'];
   $sql = "SELECT * FROM order_detail WHERE id_order_detail='$id_order_detail'";
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
            <input type="hidden" value="<?php echo $dt['id_order_detail'];?>" name="id_order_detail">
            <div class="row">
              <label>Orders Id : </label>
                <input type="text" class="form-control" name="orders_id" value="<?php echo $dt['orders_id'];?>">
              </div>
              <div class="col-md-4 mb-3">
                <label>Produk Id : </label>
                <input type="text" class="form-control" name="produk_id" value="<?php echo $dt['produk_id'];?>">
              </div>
              <div class="col-md-4 mb-3">
                <label>Jumlah : </label> <input type="text" class="form-control" name="jumlah" value="<?php echo $dt['jumlah'];?>">
            </div>
            <button class="btn btn-primary btn-lg btn-block" type="submit">Edit</button>
            <br>
            <a href="../../index.php?page=order_detail">< Kembali</a>
          </form>
        </div>
      </div>
    </div>

    <script src="../../../asset/js/jquery-3.4.1.min.js"></script>
    <script src="../../../asset/js/bootstrap.bundle.js"></script>
    <script src="../../../asset/js/bootstrap.min.js"></script>
  </body>
</html>