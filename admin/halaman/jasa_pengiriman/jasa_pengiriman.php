<?php 
	include "../config/koneksi.php";
	$sql = "SELECT * FROM  jasa_pengiriman ORDER BY id_perusahaan DESC";
	$query = mysqli_query($koneksi, $sql) or die("select data menu error :".mysql_error());
?>
<div class="table-responsive">
    <table class="table table-hover">
        <tr>
            <th scope="col">No</th>
            <th scope="col">Nama Perusahaan</th>
            <th scope="col">gambar</th>
            <th scope="col">Action</th>
        </tr>
        <?php if(mysqli_num_rows($query)>0){ ?>
        <?php
            $no = 1;
            while($data = mysqli_fetch_array($query)){
        ?>
        <tr>
            <td scope="row"><?php echo $no ?></td>
            <td><?php echo $data["nama_perusahaan"];?></td>
            <td><?php echo $data["gambar"];?></td>
            <td>
                <a href="halaman/jasa_pengiriman/delete.php?id=<?php echo $data['id_perusahaan'];?>">Delete</a> |
                <a href="halaman/jasa_pengiriman/edit.php?id=<?php echo $data['id_perusahaan']; ?>">Edit</a>
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
    <a class="btn btn-primary pull-right" href="halaman/jasa_pengiriman/formjasa_pengiriman.php" role="button">+ Tambah Jasa</a>
</div>