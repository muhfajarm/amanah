<?php
	include "../../../config/koneksi.php";

	$id_kategori = $_GET['id'];
	$sql = "DELETE FROM kategori WHERE id_kategori='$id_kategori'";
	$result = mysqli_query($koneksi, $sql);

	if ($result){
		header ("location:../../index.php?page=kategori");
	} else {
		echo "Terjadi kesalahan";
	}
?>