<?php
  include "../layouts/header.php";

  if(!isset($_SESSION['users']) OR empty($_SESSION['users'])){
  	header("location:../../auth/login.php?pesan=belum_login");
  }

  $id_order = $_GET['id'];

  $sql_pembayaran = "SELECT * FROM pembayaran
  	LEFT JOIN orders ON pembayaran.orders_id=orders.id_orders
  	WHERE orders.id_orders = $id_order";
  $Qpembayaran = mysqli_query($koneksi, $sql_pembayaran) or die("select data menu error :".mysqli_error());
  $data = $Qpembayaran->fetch_assoc();

  if (empty($data)) {
  	echo "<script>alert('Belum ada data pembayaran')</script>";
  	echo "<script>location='riwayat.php'</script>";
  }

  if ($_SESSION['users']['id_user']!==$data['user_id']) {
  	echo "<script>alert('Anda tidak berhak melihat pembayaran orang lain')</script>";
  	echo "<script>location='riwayat.php'</script>";
  }
?>

<div class="container">
	<h3>Lihat Pembayaran</h3>
	<div class="row">
		<div class="col-md-6">
			<table class="table">
				<tr>
					<th>Nama</th>
					<td><?= $data['nama'] ?></td>
				</tr>
				<tr>
					<th>Bank</th>
					<td><?= $data['bank'] ?></td>
				</tr>
				<tr>
					<th>Tanggal</th>
					<td><?= $data['tanggal'] ?></td>
				</tr>
				<tr>
					<th>Jumlah</th>
					<td>Rp <?= number_format($data['jumlah'],0,",",".") ?></td>
				</tr>
			</table>
		</div>
		<div class="col-md-6">
			<a href="../../asset/img/bukti/<?= $data['bukti'] ?>">
				<img src="../../asset/img/bukti/<?= $data['bukti'] ?>" alt="" class="img-thumbnail h-25">
			</a>
		</div>
	</div>
</div>

<?php require "../layouts/footer.php"; ?>