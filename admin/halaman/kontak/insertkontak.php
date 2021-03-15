<?php
	//koneksi data base
	include '../../../config/koneksi.php';

	//menyimpan data
	
	
	$nama = $_POST['nama'];
	$email = $_POST['email'];
	$subjek = $_POST['subjek'];
	$pesan = $_POST['pesan'];
	$tanggal = $_POST['tanggal'];

	//membuat query untuk menyimpan
	$sql= "INSERT INTO  kontak
	 VALUES ('','$nama', '$email', '$subjek', '$pesan', '$tanggal' )";

	//menyimpan data ke database
	$result = mysqli_query($koneksi, $sql);

	if ($result){
		header ("location:../../index.php?page=kontak");
	} else {
		echo "Terjadi kesalahan";
	}

?>