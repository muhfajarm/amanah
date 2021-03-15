<?php
	include "../../../config.php";

	
	$id_orders = $_POST['id_orders'];
	$user_id = $_POST['user_id'];
	$nama_kustomer = $_POST['nama_kustomer'];
	$alamat = $_POST['alamat'];
	$telpon = $_POST['telpon'];
	$email = $_POST['email'];
	$status_order = $_POST['status_order'];
	$tgl_orders = $_POST['tgl_orders'];
	$total = $_POST['total'];
	
	

	$sql = "UPDATE orders SET user_id='$user_id',nama_kustomer='$nama_kustomer',alamat='$alamat',telpon='$telpon',email='$email',status_order='$status_order',tgl_orders='$tgl_orders',total='$total' WHERE id_orders='$id_orders'";

	$result = mysqli_query($koneksi, $sql);

	if ($result){
		header ("location:../../index.php?page=order");
	} else {
		echo "Terjadi kesalahan";
	}
?>