<?php
	include "../../../config.php";

	$id_orders = $_GET['id'];
	$sql = "DELETE FROM orders WHERE id_orders='$id_orders'";
	$result = mysqli_query($koneksi, $sql);

	if ($result){
		header ("location:../../index.php?page=order");
	} else {
		echo "Terjadi kesalahan";
	}
?>