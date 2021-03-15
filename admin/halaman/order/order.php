<?php 
	include "../config/koneksi.php";
	$sql = "SELECT * FROM  orders ORDER BY id_orders DESC";
	$query = mysqli_query($koneksi, $sql) or die("select data menu error :".mysqli_error());
?>
<div class="table-responsive">
    <table class="table table-hover">
        <tr>
            <th scope="col">No</th>
            <th scope="col">Nama Kustomer</th>
            <th scope="col">Alamat</th>
            <th scope="col">Telepon</th>
            <th scope="col">Email</th>
            <th scope="col">Status Order</th>
            <th scope="col">Tanggal Order</th>
            <th scope="col">Total</th>
        </tr>
        <?php if(mysqli_num_rows($query)>0){ ?>
        <?php
            $no = 1;
            while($data = mysqli_fetch_array($query)){
        ?>
        <tr>
            <td scope="row"><?php echo $no ?></td>
           
            <td><?php echo $data["nama_kustomer"];?></td>
            <td><?php echo $data["alamat"];?></td>
            <td><?php echo $data["telpon"];?></td>
            <td><?php echo $data["email"];?></td>
            <td><?php echo $data["status_order"];?></td>
            <td><?php echo $data["tgl_orders"];?></td>
            <td><?php echo $data["total"];?></td>
            <td>
                <a href="./index.php?page=detail&id=<?= $data['id_orders']; ?>" class="btn btn-info btn-sm">Detail</a>
            </td>
        </tr>
        <?php $no++; } ?>
        <?php } ?>
    </table>
</div>
<div>
    <a class="btn btn-primary pull-right" href="halaman/order/form.php" role="button">+ Tambah Order</a>
</div>