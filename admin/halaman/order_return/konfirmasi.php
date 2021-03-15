<?php 
	include "../config/koneksi.php";

	$id_order = $_GET['id'];

	// $sql = "SELECT * FROM  pembayaran WHERE order_id='$id_order'";
	$sql = "SELECT * FROM pembayaran JOIN orders ON pembayaran.order_id=orders.id_orders WHERE id_orders='$id_order'";
	$query = mysqli_query($koneksi, $sql) or die("select data menu error :".mysql_error());
	$data = $query->fetch_assoc();

	$options = array("Pending", "Proses", "Dikirim", "Diterima", "Batal");
?>
<h3>Data Pembayaran</h3>
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
				<th>Jumlah</th>
				<td>Rp <?= number_format($data['jumlah']) ?></td>
			</tr>
			<tr>
				<th>Tanggal</th>
				<td><?= $data['tanggal'] ?></td>
			</tr>
		</table>
		<form method="post">
			<div class="form-group">
				<label>No Resi</label>
				<input type="text" class="form-control" name="resi" value="<?= $data['resi'] ?>">
			</div>
			<div class="form-group">
				<label>Status</label>
				<select class="form-control" name="status">
					<?php foreach ($options as $option): ?>
						<option value="<?php echo $option; ?>"<?php if ($data['status_order'] == $option): ?> selected="selected"<?php endif; ?>>
							<?php echo $option; ?>
						</option>
					<?php endforeach; ?>
				</select>
			</div>
			<button class="btn btn-sm btn-primary" name="konfirmasi">Konfirmasi</button>
		</form>
	</div>
	<div class="col-md-6">
		<img src="../asset/img/bukti/<?= $data['bukti'] ?>" alt="<?= $data['bukti'] ?>" class="img-thumbnail">
	</div>
</div>

<?php 
if (isset($_POST['konfirmasi'])) {
	$resi = $_POST['resi'];
	$status = $_POST['status'];

 	$sql_konfirmasi = "UPDATE orders SET resi='$resi', status_order='$status' WHERE id_orders='$id_order'";
 	$Qkonfirmasi = mysqli_query($koneksi, $sql_konfirmasi) or die("select data menu error :".mysql_error());

 	echo "<script>alert('Data terupdate');</script>";
 	echo "<script>location='index.php?page=order';</script>";
 } ?>