<?php
	include "../layouts/header.php";

	$id = $_GET['id'];
	// $sql_konfirmasi = "UPDATE orders SET status_order='Refund' WHERE id_orders='$id_order'";
 // 	$Qkonfirmasi = mysqli_query($koneksi, $sql_konfirmasi) or die("select data menu error :".mysql_error());
 // 	header("location:./riwayat.php");
?>

<div class="container">
  <h1 class="text-center">Form Refund</h1>
  <div class="card">
    <div class="card-body">
      <form method="post" action="./refundaksi.php?id=<?= $id ?>" enctype="multipart/form-data">
        <div class="form-group">
          <label class="card-title">Alasan Refund : </label>
          <textarea name="alasan" class="form-control"></textarea>
        </div>
        <div class="form-group">
          <label class="card-title">Bank : </label>
          <input type="text" name="bank" class="form-control">
        </div>
        <div class="form-group">
          <label class="card-title">Bukti : </label>
          <input type="file" name="photos" class="form-control">
        </div>
        <center><input type="submit" name="refund" value="Kirim"></center>
      </form>
    </div>
  </div>
  <h1>Aturan Return</h1>
  <label>1. Return akan dikembalikan dalam bentuk uang </label><br>
  <label>2. Pengembalian uang akan ditransfer ke rekening pembeli sesuai dengan rekening pembayaran</label> <br>
  <label>3. Uang akan dikembalikan sejumlah  harga beli dan ongkos kirim barang ditanggung pembeli</label><br>
  <label>4. Uang akan ditransfer setelah barang return sampai</label><br>
  
</div>

<?php require "../layouts/footer.php"; ?>