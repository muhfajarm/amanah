<?php 
	include "../config/koneksi.php";
    $sql = "SELECT * FROM order_refund JOIN order_detail ON order_refund.orders_id=order_detail.orders_id JOIN produk ON order_detail.produk_id=produk.id_produk WHERE id_produk=order_detail.produk_id";
	$query = mysqli_query($koneksi, $sql) or die("select data menu error :".mysqli_error());
?>
<div class="table-responsive">
    <table class="table table-hover">
        <tr>
            <th scope="col">No</th>
            <th scope="col">Produk</th>
            <th scope="col">Foto</th>
            <th scope="col">Alasan</th>
            <th scope="col">Refund Transfer</th>
            <th scope="col">Status</th>
            
        </tr>
        <?php if(mysqli_num_rows($query)>0){ ?>
        <?php
            $no = 1;
            while($data = mysqli_fetch_array($query)){
        ?>
        <?php if ($data): ?>
            
        <?php endif ?>
        <tr>
            <td scope="row"><?= $no ?></td>
            <td><?= $data["nama_produk"];?></td>
            <td><?= "<img src='./../asset/img/refund/$data[foto]' width='70' height='90'/>";?></td>
            <td><?= $data["alasan"];?></td>
            <td><?= $data["refund_transfer"];?></td>
            <td><?= $data["status"];?></td>
            <td>
                <a href="./index.php?page=detail&id=<?= $data['id']; ?>" class="btn btn-info btn-sm">Detail</a> | 
                    <?php if ($data["status"]=="Pending"): ?>
                        <a href="./index.php?page=konfirmasi&id=<?= $data['id']; ?>" class="btn btn-success btn-sm">Terima</a>
                        <a href="./index.php?page=konfirmasi&id=<?= $data['id']; ?>" class="btn btn-danger btn-sm">Tolak</a>
                    <?php endif ?>
            </td>
        </tr>
        <?php $no++; } ?>
        <?php } ?>
    </table>
</div>
