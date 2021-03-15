<?php
	include "../../../config/koneksi.php";

	
	$nama_perusahaan = $_POST['nama_perusahaan'];
	$gambar = $_POST['gambar'];

	$sql = "UPDATE jasa_pengiriman SET nama_perusahaan='$nama_perusahaan', gambar='$gambar' WHERE id_perusahaan='$id_perusahaan'";

	$result = mysqli_query($koneksi, $sql);

	if ($result){
		header ("location:../../index.php?page=jasa_pengiriman");
	} else {
		echo "Terjadi kesalahan";
	}
?>