<?php 
	include "../config/koneksi.php";
	$sql = "SELECT * FROM  order_detail ORDER BY id_order_detail DESC";
	$query = mysqli_query($koneksi, $sql) or die("select data menu error :".mysql_error());
?>
<div class="table-responsive">
    <table class="table table-hover">
        <tr>
            <th scope="col">No</th>
            <th scope="col">Orders Detail</th>
            <th scope="col">Produk Id</th>
            <th scope="col">Jumlah</th>
            <th scope="col">Action</th>
        </tr>
        <?php if(mysqli_num_rows($query)>0){ ?>
        <?php
            $no = 1;
            while($data = mysqli_fetch_array($query)){
        ?>
        <tr>
            <td scope="row"><?php echo $no ?></td>
            <td><?php echo $data["orders_id"];?></td>
            <td><?php echo $data["produk_id"];?></td>
            <td><?php echo $data["jumlah"];?></td>
            <td>
                <a href="halaman/order_detail/delete.php?id=<?php echo $data['id_order_detail'];?>">Delete</a> |
                <a href="halaman/order_detail/edit.php?id=<?php echo $data['id_order_detail']; ?>">Edit</a>
            </td>
        </tr>
        <?php $no++; } ?>
        <?php
        }else{
                echo "Tidak ada data...";
        } ?>
    </table>
</div>
<div>
    <a class="btn btn-primary pull-right" href="halaman/order_detail/formorder_detail.php" role="button">+ Tambah Order Detail</a>
</div>