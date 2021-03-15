<?php
  include "./layouts/header.php";

  if (isset($_POST['bayar'])) {
    $user_id = $_SESSION['users']['id_user'];
    $nama_kustomer = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $telpon = $_POST['telpon'];
    $email = $_POST['email'];
    $kota = $_POST['namakota'];
    $subtotal = $_POST['subtotal'];
    $ongkir = $_POST['cost'];
    $kurir = $_POST['kodekurir'];
    $total = $_POST['amount'];
    $tgl=date("Y-m-d");

    $sql = "INSERT INTO  orders VALUES (NULL, '$user_id', '$nama_kustomer', '$alamat', '$telpon', '$email', 'Pending', '$kota', '$subtotal', '$ongkir', '$kurir', '$total', NULL, '$tgl')";
    $insert = mysqli_query($koneksi, $sql) or die("select data menu error :".mysqli_error());
    if ($insert) {
      $sql_order_id = "SELECT id_orders FROM orders ORDER BY id_orders DESC";

      $order_id = mysqli_query($koneksi, $sql_order_id) or die("select data menu error :".mysqli_error());
      $dt = mysqli_fetch_array($order_id);

      $orders_id = $dt['id_orders'];

    //   foreach ($_SESSION['keranjang'] as $id_produk => $jumlah) {
        $sql_produk = "SELECT * FROM  produk WHERE id_produk IN (";
        foreach($_SESSION['keranjang'] as $id => $value) { 
            $sql_produk.=$id.","; 
        }
        $sql_produk = substr($sql_produk, 0, -1).") ORDER BY nama_produk ASC";
        $query = mysqli_query($koneksi, $sql_produk) or die("select data menu error :".mysqli_error());
        while($row = mysqli_fetch_array($query)){
        // $Qproduk = mysqli_query($koneksi, $sql_produk) or die("select data menu error :".mysqli_error());
        // $produk = $Qproduk->fetch_assoc();

            $id_produk = $_SESSION['keranjang'][$row['id_produk']]['id_produk'];
            $harga = $_SESSION['keranjang'][$row['id_produk']]['harga'];
            $berat = $row['berat'];
            $jumlah = $_SESSION['keranjang'][$row['id_produk']]['jumlah'];
            $subharga = $_SESSION['keranjang'][$row['id_produk']]['harga']*$jumlah;
            $subberat = $row['berat']*$jumlah;
        
            $sql_order_detail = "INSERT INTO  order_detail VALUES (NULL, '$orders_id', '$id_produk', '$harga', '$berat', '$jumlah', '$subberat', '$subharga')";
            $Qorder = mysqli_query($koneksi, $sql_order_detail) or die("select data menu error :".mysqli_error());
        
            $sql_produk = "UPDATE produk SET stok = stok -$jumlah WHERE id_produk='$id_produk'";
            $Qproduk = mysqli_query($koneksi, $sql_produk) or die("select data menu error :".mysql_error());
            
            $sql_produk = "UPDATE produk SET dibeli= dibeli+$jumlah WHERE id_produk='$id_produk'";
            $update = mysqli_query($koneksi, $sql_produk) or die("select data menu error :".mysqli_error());
        }

    //   unset($_SESSION['keranjang']);

      header("location:./user/riwayat/nota.php?id=$orders_id");
    }
  }
?>

<?php require "layouts/footer.php"; ?>