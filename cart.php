<?php

require "layouts/header.php";

if (empty($_SESSION['keranjang']) OR !isset($_SESSION['keranjang'])) {
  echo "<script>alert('Keranjang belanja kosong');</script>";
  echo "<script>location='index.php';</script>";
}

?>

<div class="container">
  <h1>Keranjang Belanja</h1>
  <hr>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Nama</th>
        <th>Harga</th>
        <th>Jumlah</th>
        <th>Subharga</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
        <?php
            $sql = "SELECT * FROM  produk WHERE id_produk IN (";
            foreach($_SESSION['keranjang'] as $id => $value) { 
                $sql.=$id.","; 
            }
            $sql = substr($sql, 0, -1).") ORDER BY nama_produk ASC";
            $query = mysqli_query($koneksi, $sql) or die("select data menu error :".mysqli_error());
            while($row = mysqli_fetch_array($query)){
        // $id_produk = $_SESSION['keranjang']['id_produk'];
        // $sql = "SELECT * FROM  produk WHERE id_produk = '$id_produk'";
        // $ambil = mysqli_query($koneksi, $sql) or die("select data menu error :".mysql_error());
        // $pecah = $ambil->fetch_assoc();
        ?>
        <tr>
          <td><?=$row["nama_produk"];?></td>
          <td>Rp <?=number_format($_SESSION['keranjang'][$row['id_produk']]['harga'],0,",",".");?></td>
          <td><?=$_SESSION['keranjang'][$row['id_produk']]['jumlah']?></td>
          <td>Rp <?=number_format($_SESSION['keranjang'][$row['id_produk']]['harga']*$_SESSION['keranjang'][$row['id_produk']]['jumlah'],0,",",".");?></td>
          <td>
            <a href="hapuskeranjang.php?id=<?=$id ?>" class="btn btn-danger btn-sm">Hapus</a>
          </td>
        </tr>
        <?php } ?>
    </tbody>
  </table>
  <a href="index.php" class="btn btn-default">Lanjut belanja</a>
  <a href="checkout.php" class="btn btn-primary">Bayar</a>
</div>

<?php require "layouts/footer.php"; ?>