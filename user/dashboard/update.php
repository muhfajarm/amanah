<?php
	include "../layouts/header.php";

	$email = $_SESSION['email'];

	if ($_POST['edatadiri']) {
		$nama	= $_POST['nama'];
		$no_hp	= $_POST['no_hp'];
		$alamat	= $_POST['alamat'];

		$sql	= "UPDATE users SET nama='$nama', no_hp='$no_hp', alamat='$alamat' WHERE email='$email'";
	 	$result = mysqli_query($koneksi, $sql) or die("select data menu error :".mysql_error());
	 	header("location:./index.php?email=".$_SESSION['email']);
	}
?>