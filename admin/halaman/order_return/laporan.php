<?php 
	include "../config/koneksi.php";

	$semuadata=array();
	$tgl_mulai='-';
	$tgl_selesai='-';
	if (isset($_POST['kirim'])) {
		$tgl_mulai = $_POST['tglm'];
		$tgl_selesai = $_POST['tgls'];

		$sql = "SELECT * FROM orders o LEFT JOIN users u ON o.user_id=u.id_user WHERE tgl_orders BETWEEN '$tgl_mulai' AND '$tgl_selesai'";
		$q = mysqli_query($koneksi, $sql) or die("select data menu error :".mysql_error());
		while ($data = $q->fetch_assoc()) {
			$semuadata[]=$data;
		}

		// echo "<pre>";
		// print_r($semuadata);
		// echo "</pre>";
	}
?>
<h2>Laporan Pembelian dari <?= $tgl_mulai//date('d F Y', strtotime($tgl_mulai)) ?> hingga <?= $tgl_selesai//date('d F Y', strtotime($tgl_selesai)) ?></h2>
<hr>

<form method="post">
	<div class="row">
		<div class="col-md-5">
			<label>Tanggal Mulai</label>
			<input type="date" class="form-control" name="tglm" value="<?= $tgl_mulai ?>">
		</div>
		<div class="col-md-5">
			<label>Tanggal Selesai</label>
			<input type="date" class="form-control" name="tgls" value="<?= $tgl_selesai ?>">
		</div>
		<div class="col-md-2"><br>
			<button class="btn btn-sm btn-primary" name="kirim">Lihat</button>
		</div>
	</div>
</form>

<table class="table table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>Pelanggan</th>
			<th>Tanggal</th>
			<th>Status</th>
			<th>Jumlah</th>
		</tr>
	</thead>
	<tbody>
		<?php $total=0; ?>
		<?php foreach ($semuadata as $key => $value): ?>
		<?php $total+=$value['total'] ?>
		<tr>
			<td><?= $key+1 ?></td>
			<td><?= $value['nama_kustomer'] ?></td>
			<td><?= date('d F Y', strtotime($value['tgl_orders'])) ?></td>
			<td><?= $value['status_order'] ?></td>
			<td>Rp <?= number_format($value['total']) ?></td>
		</tr>
		<?php endforeach ?>
	</tbody>
	<tfoot>
		<tr>
			<th colspan="4">Total</th>
			<th>Rp <?= number_format($total) ?></th>
		</tr>
	</tfoot>
</table>