<?php
	include "../../../config/koneksi.php";

	$id_kontak = $_POST['id_kontak'];
	$nama = $_POST['nama'];
	$email = $_POST['email'];
	$subjek = $_POST['subjek'];
	$pesan = $_POST['pesan'];
	$tanggal = $_POST['tanggal'];
	

	$sql = "UPDATE kontak SET nama='$nama', email='$email', subjek='$subjek', pesan='$pesan', tanggal='$tanggal'  WHERE id_kontak='$id_kontak'";

	$result = mysqli_query($koneksi, $sql);

	if ($result){
		header ("location:../../index.php?page=kontak");
	} else {
		echo "Terjadi kesalahan";
	}
?>