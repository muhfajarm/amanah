<?php
	include "../../../config/koneksi.php";

	$id_kontak = $_GET['id'];
	$sql = "DELETE FROM kontak WHERE id_kontak='$id_kontak'";
	$result = mysqli_query($koneksi, $sql);

	if ($result){
		header ("location:../../index.php?page=kontak");
	} else {
		echo "Terjadi kesalahan";
	}
?>