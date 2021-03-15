<?php
	include "../layouts/header.php";

	$id_orders = $_GET['id'];

	if ($_POST['refund']) {
		$alasan	= $_POST['alasan'];
		$bank	= $_POST['bank'];
		$tanggal = date('Y-m-d');

		// $image = $_FILES['photos']['name'];
		$image = date('YmdHis')."refund-".$id_orders.".jpg";
		$target_dir = "../../asset/img/refund/";
		$target = $target_dir.basename($image);

		// $target_file = $target_dir . basename($_FILES["photos"]["name"]);
		// $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));die($target);

		$sql_refund = "INSERT INTO order_refund VALUES ('', '$id_orders', '$image', '$alasan', '$bank', 'Pending')";
	    $insert = mysqli_query($koneksi, $sql_refund) or die("select data menu error :".mysqli_error());

	    move_uploaded_file($_FILES['photos']['tmp_name'], $target);
	    if ($insert) {
	    	$sql_update = "UPDATE orders SET status_order='Refund' WHERE id_orders='$id_orders'";
	    	$update = mysqli_query($koneksi, $sql_update) or die("select data menu error :".mysqli_error());
			echo "<script>alert('Berhasil mengirim form refund');</script>";
			$url = "riwayat.php";
        	echo "<script>location.href='$url'</script>";
	    }else{
			echo "<script>alert('Gagal mengirim form refund');</script>";
			$url = "riwayat.php";
        	echo "<script>location.href='$url'</script>";
	    }
	}
?>