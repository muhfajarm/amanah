<?php
	include "../../../config/koneksi.php";

	$id_produk = $_GET['id'];
	$sql = "DELETE FROM produk WHERE id_produk='$id_produk'";
	$result = mysqli_query($koneksi, $sql);

	if ($result){
		header ("location:../../index.php?page=produk");
	} else {
		echo "Terjadi kesalahan";
	}
?>