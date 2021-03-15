<?php
	include "../../../config/koneksi.php";

	$id_kategori = $_POST['id_kategori'];
	$nama_kategori = $_POST['nama_kategori'];
	$slug = preg_replace('/[^a-z0-9]+/i', '-', trim(strtolower($_POST['nama_kategori'])));

	$sql = "UPDATE kategori SET nama_kategori='$nama_kategori', slug='$slug' WHERE id_kategori='$id_kategori'";

	$result = mysqli_query($koneksi, $sql);

	if ($result){
		header ("location:../../index.php?page=kategori");
	} else {
		echo "Terjadi kesalahan";
	}
?>