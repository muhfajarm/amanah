<?php
	//koneksi data base
	include '../config.php';

	//menyimpan dSSata
	$nama_kategori = $_POST['nama_kategori'];
	$slug = $_POST['slug'];

	//membuat query untuk menyimpan
	$sql= "INSERT INTO  kategori
	 VALUES ('','$nama_kategori','$slug')";

	//menyimpan data ke database
	$result = mysqli_query($koneksi, $sql);

	if ($result){
		header ("location:index.php?page=kategori");
	} else {
		echo "Terjadi kesalahan";
	}
?>