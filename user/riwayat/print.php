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

	.card {
		position: relative;
		display: -ms-flexbox;
		display: flex;
		-ms-flex-direction: column;
		flex-direction: column;
		min-width: 0;
		word-wrap: break-word;
		background-color: #fff;
		background-clip: border-box;
		border: 1px solid rgba(0,0,0,.125);
		border-radius: .25rem;
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
		.col-md-12 {
		    -ms-flex: 0 0 100%;
		    flex: 0 0 100%;
		    max-width: 100%;
		}
		.col-md-4 {
		    -ms-flex: 0 0 33.333333%;
		    flex: 0 0 33.333333%;
		    max-width: 33.333333%;
		}
	}
	@media (min-width: 992px){
		.container {
		    max-width: 960px;
		}
		.col-md-12 {
		    -ms-flex: 0 0 100%;
		    flex: 0 0 100%;
		    max-width: 100%;
		}
		.col-md-4 {
		    -ms-flex: 0 0 33.333333%;
		    flex: 0 0 33.333333%;
		    max-width: 33.333333%;
		}
	}
	@media (min-width: 768px){
		.container {
		    max-width: 720px;
		}
		.col-md-12 {
		    -ms-flex: 0 0 100%;
		    flex: 0 0 100%;
		    max-width: 100%;
		}
		.col-md-4 {
		    -ms-flex: 0 0 33.333333%;
		    flex: 0 0 33.333333%;
		    max-width: 33.333333%;
		}
	}
	@media (min-width: 576px){
		.container {
		    max-width: 540px;
		}
		.col-md-12 {
		    -ms-flex: 0 0 100%;
		    flex: 0 0 100%;
		    max-width: 100%;
		}
		.col-md-4 {
		    -ms-flex: 0 0 33.333333%;
		    flex: 0 0 33.333333%;
		    max-width: 33.333333%;
		}
	}
	.container {
	  min-width: 992px !important;
	}

	.row {
	    display: -ms-flexbox;
	    display: flex;
	    -ms-flex-wrap: wrap;
	    flex-wrap: wrap;
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
  </style>
</head>
<body>
	<?php
		// Load file koneksi.php
		include "../../../config/koneksi.php";
		// $semuadata=array();
		if (isset($_POST['print'])) {
			$id_orders = $_POST['id_orders'];

			$sql_detail = "SELECT * FROM orders o WHERE id_orders='$id_orders'";die($sql_detail);
			$Qdetail = mysqli_query($koneksi, $sql_detail) or die("select data menu error :".mysql_error());
    		$detail = $Qdetail->fetch_assoc();
		}
	?>
	<div class="container">
		<div class="row card">
			<div class="row">
				<div class="col-md-12">
					<h2>Detail Pembelian</h2>
					<div class="row">
				        <div class="col-md-4">
				            <h3>Pembelian</h3>
				            <strong>No Pembelian: <?= $detail['id_orders']; ?></strong><br>
				            Tanggal: <?= $detail['tgl_orders']; ?>
				        </div>
				        <div class="col-md-4">
				            <h3>Pelanggan</h3>
				            <strong><?= $detail['nama_kustomer']; ?></strong><br>
				            <p>
				                <?= $detail['telpon']; ?><br>
				                <?= $detail['email']; ?>
				            </p>
				        </div>
				        <div class="col-md-4">
				            <h3>Pengiriman</h3>
				            <strong>Alamat: <?= $detail['alamat']; ?></strong>
				            <h3>Kurir : <strong><?= $detail['kurir']; ?></strong></h3>
				        </div>
				    </div>
				    <table class="table">
		                <thead>
		                    <tr>
		                        <th>Nama Barang</th>
		                        <th>Harga Satuan</th>
		                        <th>Berat</th>
		                        <th>Qty</th>
		                        <th>Subberat</th>
		                        <th>Subtotal</th>
		                    </tr>
		                </thead>
		                <tbody>
		                    <?php $totalbelanja = 0; ?>
		                    <?php $sql = "SELECT * FROM order_detail JOIN produk ON order_detail.produk_id=produk.id_produk WHERE order_detail.orders_id='$id_orders'"; ?>
		                    <?php $ambil = mysqli_query($koneksi, $sql) or die("select data menu error :".mysql_error()); ?>
		                    <?php while ($pecah=$ambil->fetch_assoc()) { ?>
		                        <tr>
		                            <td><?=$pecah['nama_produk'];?></td>
		                            <td>Rp <?=number_format($pecah['harga_produk'],0,",",".");?></td>
		                            <td><?=$pecah['berat'];?>Kg</td>
		                            <td><?=$pecah['jumlah'];?></td>
		                            <td><?=$pecah['subberat'];?>Kg</td>
		                            <td>Rp <?=number_format($pecah["harga_produk"]*$pecah['jumlah'],0,",",".");?></td>
		                            
		                        </tr>
		                        <?php $totalbelanja+=($pecah["harga_produk"]*$pecah['jumlah']); ?>
		                    <?php } ?>
		                </tbody>
		                <tfoot>
		                    <tr>
		                        <td colspan="5" align="right"><strong>Ongkir</strong></td>
		                        <td>Rp <?= number_format($detail['ongkir'],0,",","."); ?></td>
		                    </tr>
		                    <tr>
		                        <td colspan="5" align="right"><strong>Total</strong></td>
		                        <td>Rp <?= number_format($detail['total'],0,",","."); ?></td>
		                    </tr>
		                </tfoot>
		            </table>
			    </div>
		    </div>
	    </div>
	</div>
</body>
</html>
<?php
	// $html = ob_get_contents();
	// ob_end_clean();
	// require_once('../../asset1/plugins/html2pdf/html2pdf.class.php');
	// $pdf = new HTML2PDF('P','A4','en');
	// $pdf->WriteHTML($html);
	// $pdf->Output('Invoice-'. $id_orders .'.pdf', 'D');
?>