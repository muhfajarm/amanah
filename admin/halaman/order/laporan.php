<?php 

	include "../config/koneksi.php";



	$semuadata=array();
	$datalaba=array();
	$datarugi=array();
	$tgl_mulai='-';

	$tgl_selesai='-';

	if (isset($_POST['kirim'])) {

		$tgl_mulai = $_POST['tglm'];

		$tgl_selesai = $_POST['tgls'];

		// $sql = "SELECT * FROM orders o LEFT JOIN users u ON o.user_id=u.id_user WHERE tgl_orders BETWEEN '$tgl_mulai' AND '$tgl_selesai' AND status_order = 'Proses' OR status_order = 'Dikirim' OR status_order = 'Diterima' OR status_order = 'Refund Diterima'";
		// $q = mysqli_query($koneksi, $sql) or die("select data menu error :".mysqli_error());
		// while ($data = $q->fetch_assoc()) {
		// 	$semuadata[]=$data;
		// }

		$sql = "SELECT * FROM order_detail od LEFT JOIN orders o ON od.orders_id=o.id_orders LEFT JOIN produk p ON od.produk_id=p.id_produk WHERE tgl_orders BETWEEN '$tgl_mulai' AND '$tgl_selesai' AND status_order = 'Proses' OR status_order = 'Dikirim' OR status_order = 'Diterima' OR status_order = 'Refund Diterima'";

		$q = mysqli_query($koneksi, $sql) or die("select data menu error :".mysqli_error());
		while ($data=$q->fetch_assoc()) {
			$semuadata[]=$data;
		}

		// $sql_sukses = "SELECT * FROM orders o LEFT JOIN users u ON o.user_id=u.id_user WHERE tgl_orders BETWEEN '$tgl_mulai' AND '$tgl_selesai' AND status_order = 'Proses' OR status_order = 'Dikirim' OR status_order = 'Diterima'";
		// $qsukses = mysqli_query($koneksi, $sql_sukses) or die("select data menu error :".mysqli_error());
		// while ($row=$qsukses->fetch_assoc()) {
		// 	$datalaba[]=$row;
		// }

		$sql_sukses = "SELECT * FROM order_detail od LEFT JOIN orders o ON od.orders_id=o.id_orders LEFT JOIN produk p ON od.produk_id=p.id_produk WHERE tgl_orders BETWEEN '$tgl_mulai' AND '$tgl_selesai' AND status_order = 'Proses' OR status_order = 'Dikirim' OR status_order = 'Diterima'";
		$qsukses = mysqli_query($koneksi, $sql_sukses) or die("select data menu error :".mysqli_error());
		while ($row=$qsukses->fetch_assoc()) {
			$datalaba[]=$row;
		}

		// $sql_refund = "SELECT * FROM orders o LEFT JOIN users u ON o.user_id=u.id_user WHERE tgl_orders BETWEEN '$tgl_mulai' AND '$tgl_selesai' AND status_order = 'Refund Diterima'";
		// $qrefund = mysqli_query($koneksi, $sql_refund) or die("select data menu error :".mysqli_error());
		// while ($row=$qrefund->fetch_assoc()) {
		// 	$datarugi[]=$row;
		// }
		$sql_refund = "SELECT * FROM order_detail od LEFT JOIN orders o ON od.orders_id=o.id_orders LEFT JOIN produk p ON od.produk_id=p.id_produk WHERE tgl_orders BETWEEN '$tgl_mulai' AND '$tgl_selesai' AND status_order = 'Refund Diterima'";
		$qrefund = mysqli_query($koneksi, $sql_refund) or die("select data menu error :".mysqli_error());
		while ($row=$qrefund->fetch_assoc()) {
			$datarugi[]=$row;
		}

	}

?>

<h2>Laporan Pembelian dari <?= $tgl_mulai//date('d F Y', strtotime($tgl_mulai)) ?> hingga <?= $tgl_selesai//date('d F Y', strtotime($tgl_selesai)) ?></h2>

<hr>



<div class="row">

	<div class="col-lg-11" style="padding-right: 0px!important;margin-right: -50px;">

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

	</div>

	<div class="col-lg-1" style="padding-left: 0px!important;margin-top: 20px;">

		<form action="./halaman/order/print.php" method="post">

			<input type="hidden" class="form-control" name="tglm" value="<?= $tgl_mulai ?>">

			<input type="hidden" class="form-control" name="tgls" value="<?= $tgl_selesai ?>">

			<?php 

				if (isset($_POST['kirim'])) {

					echo "<button class='btn btn-sm btn-success' name='print'>Cetak PDF</button>";

				} else {}

			?>

		</form>

	</div>

</div>



<table class="table table-bordered">

	<thead>

		<tr>

			<th>No</th>

			<th>Pelanggan</th>

			<th>Tanggal</th>

			<th>Status</th>
			<th>Harga Beli</th>

			<th>Harga Jual</th>

			<th>Jumlah</th>

		</tr>

	</thead>

	<tbody>

		<?php $total=0; ?>

		<?php foreach ($semuadata as $key => $value): ?>

		<?php $total = $value['harga']-$value['harga_beli']; ?>

		<tr>

			<td><?= $key+1 ?></td>

			<td><?= $value['nama_kustomer'] ?></td>

			<td><?= date('d F Y', strtotime($value['tgl_orders'])) ?></td>

			<td><?= $value['status_order'] ?></td>
			<td>Rp <?= number_format($value['harga_beli'],0,",",".") ?></td>
			<td>Rp <?= number_format($value['harga'],0,",",".") ?></td>
			<td>Rp <?= number_format($total,0,",",".") ?></td>

		</tr>

		<?php endforeach ?>

	</tbody>

	<tfoot>
		<?php
			$sumlaba = 0;
			foreach ($datalaba as $item){
				$sumlaba += $item['harga']-$item['harga_beli'];
			}
		?>
		<tr>
			<th colspan="6" class="text-right">Laba</th>
			<th>Rp <?= number_format($sumlaba,0,",",".") ?></th>
		</tr>
		<?php
			$sumrugi = 0;
			foreach ($datarugi as $item){
				$sumrugi += $item['harga']-$item['harga_beli'];
			}
		?>
		<tr>
			<th colspan="6" class="text-right">Rugi</th>
			<th>Rp <?= number_format($sumrugi,0,",",".") ?></th>
		</tr>
		<tr>
			<?php if ($sumlaba>$sumrugi): ?>
				<th colspan="6" class="text-right">Laporan Bulan ini Laba</th>
				<th>Rp <?= number_format(($sumlaba-$sumrugi),0,",",".") ?></th>
			<?php else: ?>
				<th colspan="6" class="text-right">Laporan Bulan ini Rugi</th>
				<th>Rp <?= number_format(($sumrugi-$sumlaba),0,",",".") ?></th>
			<?php endif ?>
		</tr>
	</tfoot>
</table>