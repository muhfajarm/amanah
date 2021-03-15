<?php 
	include "../config/koneksi.php";

	$id_order = $_GET['id'];
	$sql = "SELECT * FROM  orders JOIN users ON orders.user_id=users.id_user WHERE orders.id_orders='$id_order'";
	$query = mysqli_query($koneksi, $sql) or die("select data menu error :".mysql_error());
	$data = $query->fetch_assoc();
?>

<div class="row">
	<div class="col-md-4">
		<h3>Pembelian</h3>
		<p>
			Tanggal: <?= $data['tgl_orders']; ?><br>
			Total: Rp <?= number_format($data['total']); ?><br>
			Status: <?= $data['status_order']; ?>
		</p>
	</div>
	<div class="col-md-4">
		<h3>Pelanggan</h3>
		<strong><?= $data['nama_kustomer']; ?></strong><br>
		<p>
			<?= $data['telpon']; ?><br>
			<?= $data['email']; ?>
		</p>
	</div>
	<div class="col-md-4">
		<h3>Penggiriman</h3>
		<p>Alamat: <?= $data['alamat']; ?></p>
	</div>
</div>

<table class="table simple-table">
	<thead>
		<tr>
			<th>Nama</th>
			<th>Harga</th>
			<th>Jumlah</th>
			<th>Subtotal</th>
		</tr>
	</thead>
	<tbody>
		<?php 
		$id_order = $_GET['id'];
		$sql_detail = "SELECT * FROM order_detail JOIN produk ON order_detail.produk_id=produk.id_produk WHERE order_detail.orders_id='$id_order'";
		$Qdetail = mysqli_query($koneksi, $sql_detail) or die("select data menu error :".mysql_error());
		?>
		<?php while ($data = $Qdetail->fetch_assoc()) { ?>
		<tr>
			<td><?= $data['nama_produk']; ?></td>
			<td>Rp <?= number_format($data['harga_produk']); ?></td>
			<td><?= $data['jumlah']; ?></td>
			<td>Rp <?= number_format($data['harga_produk']* $data['jumlah']); ?></td>
		</tr>
		<?php } ?>
	</tbody>
</table>