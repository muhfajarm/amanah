<?php 
	include "../config.php";
	$sql = "SELECT * FROM  users ORDER BY id DESC";
	$query = mysqli_query($koneksi, $sql) or die("select data menu error :".mysql_error());
?>
<div class="table-responsive">
    <table class="table table-hover">
        <tr>
            <th scope="col">No</th>
            <th scope="col">Kategori</th>
            <th scope="col">Slug</th>
            <th scope="col">Action</th>
        </tr>
        <?php if(mysqli_num_rows($query)>0){ ?>
        <?php
            $no = 1;
            while($data = mysqli_fetch_array($query)){
        ?>
        <tr>
            <td scope="row"><?php echo $no ?></td>
            <td><?php echo $data["nama_kategori"];?></td>
            <td><?php echo $data["slug"];?></td>
            <td>
                <a href="delete.php?id=<?php echo $data['id_kategori'];?>">Delete</a> |
                <a href="edit.php?id=<?php echo $data['id_kategori']; ?>">Edit</a>
            </td>
        </tr>
        <?php $no++; } ?>
        <?php } ?>
    </table>
</div>
<div>
    <a class="btn btn-primary pull-right" href="form.php" role="button">+ Tambah Kategori</a>
</div>