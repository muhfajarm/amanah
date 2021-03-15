<?php 
	include "../config/koneksi.php";
	$id_order = $_GET['id'];
	$sql = "SELECT * FROM order_refund JOIN orders ON order_refund.orders_id=orders.id_orders WHERE id_orders='$id_order'";
	$query = mysqli_query($koneksi, $sql) or die("select data menu error :".mysqli_error());
	$data = $query->fetch_assoc();
	$options = array("Diterima", "Ditolak");
?>

<h3>Data Refund</h3>
<div class="row">
	<div class="col-md-6">
		<table class="table">
			<tr>
				<th>Nama</th>
				<td><?= $data['nama_kustomer'] ?></td>
			</tr>
			<tr>
				<th>Bank</th>
				<td><?= $data['refund_transfer'] ?></td>
			</tr>
		</table>
		<textarea class="form-control"><?= $data['alasan'] ?></textarea>
		<form method="post">
			<div class="form-group">
				<label>Konfirmasi</label>
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
		<img src="../asset/img/refund/<?= $data['foto'] ?>" alt="<?= $data['foto'] ?>" class="img-thumbnail">
	</div>
</div>

<?php 
if (isset($_POST['konfirmasi'])) {
	$status = $_POST['status'];
 	$sql_konfirmasi = "UPDATE order_refund SET status='$status' WHERE orders_id='$id_order'";
 	$Qkonfirmasi = mysqli_query($koneksi, $sql_konfirmasi) or die("select data menu error :".mysqli_error());
 	if ($_POST['status']=='Diterima') {
 		$sql_diterima = "UPDATE orders SET status_order='Refund Diterima' WHERE id_orders='$id_order'";
	 	$Qditerima = mysqli_query($koneksi, $sql_diterima) or die("select data menu error :".mysqli_error());
 	} else {
 		$sql_ditolak = "UPDATE orders SET status_order='Refund Ditolak' WHERE id_orders='$id_order'";
	 	$Qditolak = mysqli_query($koneksi, $sql_ditolak) or die("select data menu error :".mysqli_error());
 	}
 	echo "<script>alert('Data terupdate');</script>";
 	echo "<script>location='index.php?page=order';</script>";
 } ?>