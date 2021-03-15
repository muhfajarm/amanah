<?php
	//koneksi data base
	include '../../../config/koneksi.php';

	//menyimpan data
	
	
	$nama_perusahaan = $_POST['nama_perusahaan'];
	$gambar = $_POST['gambar'];

	//membuat query untuk menyimpan
	$sql= "INSERT INTO  jasa_pengiriman
	 VALUES ('','$nama_perusahaan', '$gambar')";

	//menyimpan data ke database
	$result = mysqli_query($koneksi, $sql);

	if ($result){
		header ("location:../../index.php?page=jasa_pengiriman");
	} else {
		echo "Terjadi kesalahan";
	}

?>