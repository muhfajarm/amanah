<?php
	include "../../../config/koneksi.php";

	$id_order_detail = $_GET['id'];
	$sql = "DELETE FROM order_detail WHERE id_order='$id_order_detail'";
	$result = mysqli_query($koneksi, $sql);

	if ($result){
		header ("location:../../index.php?page=order_detail");
	} else {
		echo "Terjadi kesalahan";
	}
?>