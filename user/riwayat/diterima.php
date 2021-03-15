<?php
	include "../layouts/header.php";

	$id_order = $_GET['id'];
	$sql_konfirmasi = "UPDATE orders SET status_order='Diterima' WHERE id_orders='$id_order'";
 	$Qkonfirmasi = mysqli_query($koneksi, $sql_konfirmasi) or die("select data menu error :".mysql_error());
 	header("location:./riwayat.php");
?>