<?php
	//koneksi data base
	include '../../../config/koneksi.php';

	//menyimpan data
	
	
	$orders_id = $_POST['orders_id'];
	$produk_id = $_POST['produk_id'];
	$jumlah = $_POST['jumlah'];
	

	//membuat query untuk menyimpan
	$sql= "INSERT INTO  order_detail
	 VALUES ('','$orders_id', '$produk_id', '$jumlah' )";

	//menyimpan data ke database
	$result = mysqli_query($koneksi, $sql);

	if ($result){
		header ("location:../../index.php?page=order_detail");
	} else {
		echo "Terjadi kesalahan";
	}

?>