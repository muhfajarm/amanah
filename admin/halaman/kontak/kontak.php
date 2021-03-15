<?php 
	include "../config/koneksi.php";
	$sql = "SELECT * FROM  kontak ORDER BY id_kontak DESC";
	$query = mysqli_query($koneksi, $sql) or die("select data menu error :".mysql_error());
?>
<div class="table-responsive">
    <table class="table table-hover">
        <tr>
            <th scope="col">No</th>
            <th scope="col">Nama</th>
            <th scope="col">Email</th>
            <th scope="col">Subjek</th>
            <th scope="col">Pesan</th>
            <th scope="col">Tanggal</th>
            <th scope="col">Action</th>
        </tr>
        <?php if(mysqli_num_rows($query)>0){ ?>
        <?php
            $no = 1;
            while($data = mysqli_fetch_array($query)){
        ?>
        <tr>
            <td scope="row"><?php echo $no ?></td>
            <td><?php echo $data["nama"];?></td>
            <td><?php echo $data["email"];?></td>
            <td><?php echo $data["subjek"];?></td>
            <td><?php echo $data["pesan"];?></td>
            <td><?php echo $data["tanggal"];?></td>
            <td>
                <a href="halaman/kontak/delete.php?id=<?php echo $data['id_kontak'];?>">Delete</a> |
                <a href="halaman/kontak/edit.php?id=<?php echo $data['id_kontak']; ?>">Edit</a>
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
    <a class="btn btn-primary pull-right" href="halaman/kontak/formkontak.php" role="button">+ Tambah Kontak</a>
</div>