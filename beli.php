<?php

require "config/koneksi.php";

session_start();

$id_produk = $_GET['id'];

$harga = $_GET['harga'];

$berat = $_GET['berat'];



if (isset($_SESSION['keranjang'][$id_produk])) {

    $_SESSION['keranjang'][$id_produk]['jumlah']++;

}else{

    $sql_s="SELECT * FROM produk WHERE id_produk='$id_produk'"; 

    $query_s=mysqli_query($koneksi, $sql_s) or die("select data menu error :".mysqli_error());

    if(mysqli_num_rows($query_s)!=0){ 

        $row_s=mysqli_fetch_array($query_s); 

          

        $_SESSION['keranjang'][$row_s['id_produk']]=array(

                "id_produk" => $id_produk,

                "jumlah" => 1, 

                "harga" => $harga,

                "berat" => $berat

            ); 

          

          

    }else{ 

          

        $message="ID produk invalid!"; 

          

    }

}



echo "<script>alert('produk telah dimasukkan ke keranjang belanja');</script>";

echo "<script>location='./';</script>";

?>