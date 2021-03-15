<?php
	//koneksi data base
	include '../../../config.php';

	//menyimpan dSSata
	$user_id = $_POST['user_id'];
	$nama_kustomer = $_POST['nama_kustomer'];
	$alamat = $_POST['alamat'];
	$telpon = $_POST['telpon'];
	$email = $_POST['email'];
	$status_order = $_POST['status_order'];
	$tgl_orders = $_POST['tgl_orders'];
	$total = $_POST['total'];
	

	//membuat query untuk menyimpan
	$sql= "INSERT INTO  orders
	 VALUES ('','user_id','$nama_kustomer','$alamat','$telpon','$email','$status_order','$tgl_orders','$total')";

	//menyimpan data ke database
	$result = mysqli_query($koneksi, $sql);


	if ($result){
		header ("location:../../index.php?page=order");
	} else {
		echo "Terjadi kesalahan";
	}
?>