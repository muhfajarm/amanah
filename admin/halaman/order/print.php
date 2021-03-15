<?php ob_start(); ?>

<html>

<head>

  <title>Cetak PDF</title>

  <style>

  	body {

	    margin: 0;

	    font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,"Noto Sans",sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";

	    font-size: 1rem;

	    font-weight: 400;

	    line-height: 1.5;

	    color: #212529;

	    text-align: left;

	    background-color: #fff;

	}



	.container {

		width: 100%;

	    padding-right: 15px;

	    padding-left: 15px;

	    margin-right: auto;

	    margin-left: auto;

	}



	@media (min-width: 1200px){

		.container, .container-lg, .container-md, .container-sm, .container-xl {

		    max-width: 1140px;

		}

	}

	@media (min-width: 992px){

		.container, .container-lg, .container-md, .container-sm {

		    max-width: 960px;

		}

	}

	@media (min-width: 768px){

		.container, .container-md, .container-sm {

		    max-width: 720px;

		}

	}

	@media (min-width: 576px){

		.container, .container-sm {

		    max-width: 540px;

		}

	}

	@media (min-width: 1200px){

		.container {

		    max-width: 1140px;

		}

	}

	@media (min-width: 992px){

		.container {

		    max-width: 960px;

		}

	}

	@media (min-width: 768px){

		.container {

		    max-width: 720px;

		}

	}

	@media (min-width: 576px){

		.container {

		    max-width: 540px;

		}

	}

	.container {

	  min-width: 992px !important;

	}



	table {

	    border-collapse: collapse;

	}

	.table {

	    width: 100%;

	    margin-bottom: 1rem;

	    color: #212529;

	}

	.table-bordered {

	    border: 1px solid #dee2e6;

	}

	.table-bordered thead td, .table-bordered thead th {

	    border-bottom-width: 2px;

	}

	.table thead th {

	    vertical-align: bottom;

	    border-bottom: 2px solid #dee2e6;

	}

	.table-bordered td, .table-bordered th {

	    border: 1px solid #dee2e6;

	}

	.table td, .table th {

	    padding: .75rem;

	    vertical-align: top;

	    border-top: 1px solid #dee2e6;

	}

	th {

	    text-align: inherit;

	}

	.table-bordered td, .table-bordered th {

	    border: 1px solid #dee2e6;

	}

	.table td, .table th {

	    padding: .75rem;

	    vertical-align: top;

	    border-top: 1px solid #dee2e6;

	}

	.text-center {

	    text-align: center!important;

	}
	.text-right {
	    text-align: right;
	}
  </style>

</head>

<body>

	<?php

		// Load file koneksi.php

		include "../../../config/koneksi.php";

		$semuadata=array();

		if (isset($_POST['print'])) {

			$tgl_mulai = $_POST['tglm'];

			$tgl_selesai = $_POST['tgls'];

			$sql = "SELECT * FROM orders o LEFT JOIN users u ON o.user_id=u.id_user WHERE tgl_orders BETWEEN '$tgl_mulai' AND '$tgl_selesai' AND status_order = 'Proses' OR status_order = 'Dikirim' OR status_order = 'Diterima' OR status_order = 'Refund Diterima'";
			$q = mysqli_query($koneksi, $sql) or die("select data menu error :".mysql_error());
			while ($data = $q->fetch_assoc()) {
				$semuadata[]=$data;
			}

			$sql_sukses = "SELECT * FROM orders o LEFT JOIN users u ON o.user_id=u.id_user WHERE tgl_orders BETWEEN '$tgl_mulai' AND '$tgl_selesai' AND status_order = 'Proses' OR status_order = 'Dikirim' OR status_order = 'Diterima'";
			$qsukses = mysqli_query($koneksi, $sql_sukses) or die("select data menu error :".mysqli_error());
			while ($row=$qsukses->fetch_assoc()) {
				$datalaba[]=$row;
			}

			$sql_refund = "SELECT * FROM orders o LEFT JOIN users u ON o.user_id=u.id_user WHERE tgl_orders BETWEEN '$tgl_mulai' AND '$tgl_selesai' AND status_order = 'Refund Diterima'";
			$qrefund = mysqli_query($koneksi, $sql_refund) or die("select data menu error :".mysqli_error());
			while ($row=$qrefund->fetch_assoc()) {
				$datarugi[]=$row;
			}
		}

	?>

	<div class="container">

		<h3 class="text-center">Laporan Pembelian dari <?= date('d F Y', strtotime($tgl_mulai)) ?> hingga <?= date('d F Y', strtotime($tgl_selesai)) ?></h3>

		<hr>

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
				<?php
					$sumlaba = 0;
					foreach ($datalaba as $item){
						$sumlaba += $item['total'];
					}
				?>
				<tr>
					<th colspan="4" class="text-right">Laba</th>
					<th>Rp <?= number_format($sumlaba,0,",",".") ?></th>
				</tr>
				<?php
					$sumrugi = 0;
					foreach ($datarugi as $item){
						$sumrugi += $item['total'];
					}
				?>
				<tr>
					<th colspan="4" class="text-right">Rugi</th>
					<th>Rp <?= number_format($sumrugi,0,",",".") ?></th>
				</tr>
				<tr>
					<?php if ($sumlaba>$sumrugi): ?>
						<th colspan="4" class="text-right">Laporan Bulan ini Laba</th>
						<th>Rp <?= number_format(($sumlaba-$sumrugi),0,",",".") ?></th>
					<?php else: ?>
						<th colspan="4" class="text-right">Laporan Bulan ini Rugi</th>
						<th>Rp <?= number_format(($sumrugi-$sumlaba),0,",",".") ?></th>
					<?php endif ?>
				</tr>
			</tfoot>

		</table>

	</div>

</body>

</html>

