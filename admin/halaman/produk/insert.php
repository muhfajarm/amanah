<?php
	//koneksi data base
	include '../../../config/koneksi.php';

	//menyimpan dSSata
	$kategori_id = $_POST['kategori_id'];
	$nama_produk = $_POST['nama_produk'];
	$slug = preg_replace('/[^a-z0-9]+/i', '-', trim(strtolower($_POST['nama_produk'])));
	$deskripsi = $_POST['deskripsi'];
	$hargabeli = $_POST['harga_beli'];
	$harga = $_POST['harga'];
	$stok = $_POST['stok'];
	$berat = $_POST['berat'];
	$tgl_masuk = $_POST['tgl_masuk'];
	$diskon = $_POST['diskon'];

	$nama_file = $_FILES["gambar"]["name"];
	$direktori = $_FILES["gambar"]["tmp_name"];
	$file = date('YdHis').$nama_file;
	$t = move_uploaded_file($direktori, "../../../asset/img/produk/$file");

	//membuat query untuk menyimpan
	$sql= "INSERT INTO  produk
	 VALUES (NULL,'$kategori_id','$nama_produk','$slug','$deskripsi','$hargabeli','$harga','$stok','$berat','$tgl_masuk','$file','0','$diskon')";

	//menyimpan data ke database
	$result = mysqli_query($koneksi, $sql);


	if ($result){
		header ("location:../../index.php?page=produk");
	} else {
		echo "Terjadi kesalahan";
	}
?>