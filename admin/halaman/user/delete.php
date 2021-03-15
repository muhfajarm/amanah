<?php
	include "../../../config/koneksi.php";

	$id_users = $_GET['id'];
	$sql = "DELETE FROM users WHERE id='$id_users'";
	$result = mysqli_query($koneksi, $sql);

	if ($result){
		header ("location:../../index.php?page=user");
	} else {
		echo "Terjadi kesalahan";
	}
?>