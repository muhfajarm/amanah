<?php
	include "../../../config/koneksi.php";

	$id_order_detail = $_POST['id_order_detail'];
	$orders_id = $_POST['orders_id'];
	$produk_id = $_POST['produk_id'];
	$jumlah = $_POST['jumlah'];
	

	$sql = "UPDATE order_detail SET orders_id='$orders_id', produk_id='$produk_id', jumlah='$jumlah'  WHERE id_order_detail='$id_order_detail'";

	$result = mysqli_query($koneksi, $sql);

	if ($result){
		header ("location:../../index.php?page=order_detail");
	} else {
		echo "Terjadi kesalahan";
	}
?>