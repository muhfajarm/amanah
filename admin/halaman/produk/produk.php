<?php 

	include "../config/koneksi.php";

	// $sql = "SELECT * FROM produk LEFT JOIN kategori ON produk.kategori_id=kategori.id_kategori";



    $sql = "SELECT * FROM produk";

	$query = mysqli_query($koneksi, $sql) or die("select data menu error :".mysql_error());

?>

<div class="table-responsive">

    <table class="table table-hover">

        <tr>

            <th scope="col">No</th>

            <!-- <th scope="col">Kategori</th> -->

            <th scope="col">Produk</th>

            <th scope="col">Slug</th>

            <th scope="col">Deskripsi</th>

            <th scope="col">Harga Beli</th>

            <th scope="col">Harga</th>

            <th scope="col">Stok</th>

            <th scope="col">Berat</th>

            <th scope="col">Tanggal Masuk</th>

            <th scope="col">Gambar</th>

            <th scope="col">Dibeli</th>

            <th scope="col">Diskon</th>

            <th scope="col">Action</th>

        </tr>

        <?php if(mysqli_num_rows($query)>0){ ?>

        <?php

            $no = 1;

            while($data = mysqli_fetch_array($query)){

        ?>

        <tr>

            <td scope="row"><?= $no ?></td>

            <!-- <td><?= $data["nama_kategori"];?></td> -->

            <td><?= $data["nama_produk"];?></td>

            <td><?= $data["slug_produk"];?></td>

            <td><?= substr($data["deskripsi"],0,40);?>...</td>

            <td>Rp <?= number_format($data["harga_beli"],0,",",".");?></td>
            <?php if ($data["diskon"]>0) {
                $diskon=(($data["harga_produk"]*$data["diskon"])/100);
                $dis=($data["harga_produk"]-$diskon);
            ?>
                <td>
                    Rp <?= number_format($dis,0,",",".");?><br>
                    <del>Rp <?=number_format($data["harga_produk"],0,",",".");?></del>
                </td>
            <?php }else{ ?>
                <td>Rp <?= number_format($data["harga_produk"],0,",",".");?></td>
            <?php } ?>
            <td><?= $data["stok"];?></td>

            <td><?= $data["berat"];?></td>

            <td><?= $data["tgl_masuk"];?></td>

            <td><?= "<img src='../asset/img/produk/$data[gambar]' width='70' height='150'" ;?><?= $data["gambar"];?></td>

            <td><?= $data["dibeli"];?></td>

            <td><?= $data["diskon"];?></td>



            <td>

                <a href="halaman/produk/delete.php?id=<?= $data['id_produk'];?>">Delete</a> |

                <a href="halaman/produk/edit.php?id=<?= $data['id_produk']; ?>">Edit</a>

            </td>

        </tr>

        <?php $no++; } ?>

        <?php } ?>

    </table>

</div>

<div>

    <a class="btn btn-primary pull-right" href="halaman/produk/form.php" role="button">+ Tambah Produk</a>

</div>