<?php
	include "../layouts/header.php";

	if(!isset($_SESSION['users']) OR empty($_SESSION['users'])){
		header("location:../../auth/login.php?pesan=belum_login");
	}
?>

<div class="container">
    <div class="mt-1 row card">
        <div class="row">
            <div class="col-md-12">
                <h2>Detail Pembelian</h2>
                <?php
            		$sql_detail = "SELECT * FROM orders WHERE id_orders ='$_GET[id]'";
            		$Qdetail = mysqli_query($koneksi, $sql_detail) or die("select data menu error :".mysql_error());
            		$detail = $Qdetail->fetch_assoc();
        		?>
                <form method="post" action="./print.php" target="_blank">
                    <input type="hidden" name="id_orders" value="<?= $detail['id_orders']; ?>">
                    <button type="submit" name="print" class="btn btn-sm btn-info float-right">Cetak</button>
                </form>
                <?php

                $id_user = $detail['user_id'];

                $id_session = $_SESSION['users']['id_user'];

                if ($id_user!==$id_session) {
                     echo "<script>alert('Tidak diperbolehkan melihat nota orang lain!');</script>";
                     echo "<script>location='riwayat.php'</script>";
                     exit();
                }
                ?>
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
                        <?php $sql = "SELECT * FROM order_detail JOIN produk ON order_detail.produk_id=produk.id_produk WHERE order_detail.orders_id='$_GET[id]'"; ?>
                        <?php $ambil = mysqli_query($koneksi, $sql) or die("select data menu error :".mysqlI_error()); ?>
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
                <div class="alert alert-info">
                    <h5>Total Yang Harus Dibayar : Rp <?= number_format($detail['total'],0,",",".")  ?> Silahkan melakukan pembayaran ke <strong>BANK BRI 026 2 076 38 A.N Amanah Colection</strong> </h5>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require "../layouts/footer.php"; ?>