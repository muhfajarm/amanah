<?php
	include "../../../config/koneksi.php";

	$id_produk = $_POST['id_produk'];
	$kategori_id = $_POST['kategori_id'];
	$nama_produk = $_POST['nama_produk'];
	$slug = preg_replace('/[^a-z0-9]+/i', '-', trim(strtolower($_POST['nama_produk'])));
	$deskripsi = $_POST['deskripsi'];
	$hargabeli = $_POST['harga_beli'];
	$harga = $_POST['harga_produk'];
	$stok = $_POST['stok'];
	$berat = $_POST['berat'];
	$tgl_masuk = $_POST['tgl_masuk'];
	$gambar = $_POST['gambar'];
	$dibeli = $_POST['dibeli'];
	$diskon = $_POST['diskon'];
	

	$sql = "UPDATE produk SET kategori_id='$kategori_id',nama_produk='$nama_produk', slug_produk='$slug',deskripsi='$deskripsi', harga_beli='$hargabeli', harga_produk='$harga',stok='$stok',berat='$berat',tgl_masuk='$tgl_masuk',gambar='$gambar',dibeli='$dibeli',diskon='$diskon'WHERE id_produk='$id_produk'";

	$result = mysqli_query($koneksi, $sql);

	if ($result){
		header ("location:../../index.php?page=produk");
	} else {
		echo "Terjadi kesalahan";
	}
?>