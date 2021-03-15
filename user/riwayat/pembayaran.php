<?php
  include "../layouts/header.php";

  if(!isset($_SESSION['users']) OR empty($_SESSION['users'])){
  	header("location:../../auth/login.php?pesan=belum_login");
  }

  $id_orders = $_GET['id'];
  $sql_order = "SELECT * FROM orders WHERE id_orders='$id_orders'";
  $Qorder = mysqli_query($koneksi, $sql_order) or die("select data menu error :".mysqli_error());
  $data_order = $Qorder->fetch_assoc();

  $id_user = $data_order['user_id'];

  $id_session = $_SESSION['users']['id_user'];

  if ($id_user!==$id_session) {
  	echo "<script>alert('Tidak diperbolehkan menginput pembayaran orang lain!');</script>";
  	echo "<script>location='riwayat.php'</script>";
         exit();
  }
?>

<div class="container">
	<h2>Konfirmasi Pembayaran</h2>
	<p>Kirim Bukti Pembayaran Anda Disini</p>

	<form method="post" enctype="multipart/form-data">
		<div class="form-group">
			<label>Nama</label>
			<input type="text" class="form-control" name="nama">
		</div>
		<div class="form-group">
			<label>BANK</label>
			<input type="text" class="form-control" name="bank">
		</div>
		<div class="form-group">
			<label>Jumlah</label>
			<input type="number" class="form-control" name="jumlah" min="1">
			<div class="alert alert-info">Total tagihan <strong>Rp <?= number_format($data_order['total'],0,",",".") ?></strong></div>
		</div>
		<div class="form-group">
			<label>Foto Bukti</label>
			<input type="file" class="form-control" name="bukti">
			<p class="text-danger">Bukti harus JPG, JPEG, PNG dan maksimal 2MB</p>
		</div>
		<button class="btn btn-success" name="kirim">Kirim</button>
	</form>
</div>

<?php 
if (isset($_POST['kirim'])) {
	$nama = $_POST['nama'];
	$bank = $_POST['bank'];
	$jumlah = $_POST['jumlah'];
	$tanggal = date('Y-m-d');

 	// $nama_file = $_FILES["bukti"]["name"];
 	$nama_file = "bukti-".$id_orders.".jpg";
 	$direktori = $_FILES["bukti"]["tmp_name"];
 	$file = date('YmdHis').$nama_file;
 	$t = move_uploaded_file($direktori, "../../asset/img/bukti/$file");

 	$sql_pembayaran = "INSERT INTO  pembayaran VALUES ('', '$id_orders', '$nama', '$bank', '$jumlah', '$tanggal', '$file')";
 	$insert = mysqli_query($koneksi, $sql_pembayaran) or die("select data menu error :".mysqli_error());

 	$sql_order = "UPDATE orders SET status_order='Menunggu Konfirmasi' WHERE id_orders='$id_orders'";
 	$update = mysqli_query($koneksi, $sql_order) or die("select data menu error :".mysqli_error());
 	
 	header("location:./riwayat.php");
 } ?>

<?php require "../layouts/footer.php"; ?>