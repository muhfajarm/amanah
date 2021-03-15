<?php
	include "../../../config/koneksi.php";

	$id_perusahaan = $_GET['id'];
	$sql = "DELETE FROM jasa_pengiriman WHERE id_perusahaan='$id_perusahaan'";
	$result = mysqli_query($koneksi, $sql);

	if ($result){
		header ("location:../../index.php?page=jasa_pengiriman");
	} else {
		echo "Terjadi kesalahan";
	}
?>