<?php 
	if(isset($_GET['page'])){
		$page = $_GET['page'];
 
		switch ($page) {
			case 'kategori':
				include "halaman/kategori/kategori.php";
				break;
			case 'produk':
				include "halaman/produk/produk.php";
				break;
			case 'order':
				include "halaman/order/order.php";
				break;
			case 'refund':
				include "halaman/order/refund.php";
				break;
			case 'laporan':
				include "halaman/order/laporan.php";
				break;
			case 'konfirmasi':
				include "halaman/order/konfirmasi.php";
				break;
			case 'detail':
				include "halaman/order/detail.php";
				break;
			default:
				echo "<center><h3>Maaf. Halaman tidak di temukan!</h3></center>";
				break;
		}
	}
?>