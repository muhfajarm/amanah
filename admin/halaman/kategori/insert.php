<?php
	//koneksi data base
	include '../../../config/koneksi.php';

	//menyimpan dSSata
	$nama_kategori = $_POST['nama_kategori'];
	$slug = preg_replace('/[^a-z0-9]+/i', '-', trim(strtolower($_POST['nama_kategori'])));

	//membuat query untuk menyimpan
	$sql= "INSERT INTO  kategori
	 VALUES (NULL,'$nama_kategori','$slug')";

	//menyimpan data ke database
	$result = mysqli_query($koneksi, $sql);

	if ($result){
		header ("location:../../index.php?page=kategori");
	} else {
		echo "Terjadi kesalahan";
	}
?>