<?php

	require "layouts/header.php";



	if (isset($_GET['filter'])) {

		$sql = "SELECT * FROM  produk WHERE kategori_id = '".$_GET['filter']."'";

		$query = mysqli_query($koneksi, $sql) or die("select data menu error :".mysql_error());

	}else if (isset($_GET['s'])) {

		$key = "%".$_GET['s']."%";

		$sql = "SELECT * FROM  produk WHERE nama_produk like '$key'";

		$query = mysqli_query($koneksi, $sql) or die("select data menu error :".mysql_error());

	}else{

		$sql = "SELECT * FROM  produk ORDER BY id_produk DESC";

		$query = mysqli_query($koneksi, $sql) or die("select data menu error :".mysql_error());

	}

?>

<div class="container-fluid">

<h1 class="text-center">Selamat Datang di Amanah Colection</h1>

<div class="row">

	<div class="col-lg-3">

		<h1 class="my-4 text-white">Kategori</h1>

		<div class="list-group">

			<a href="./" class="list-group-item">Semua Kategori</a>

			<?php

				$sql = "SELECT * FROM  kategori ORDER BY nama_kategori ASC";

				$QKategori = mysqli_query($koneksi, $sql) or die("select data menu error :".mysql_error());

				while($kategori = mysqli_fetch_array($QKategori)){

			?>

			<a href="?filter=<?=$kategori['id_kategori'];?>" class="list-group-item">

				<?=$kategori['nama_kategori'];?>

			</a>

			<?php } ?>

		</div>

	</div>

	<div class="col-lg-9">

		<div class="row">

			<div class="col-lg-12 mt-3">

				<form action="">

					<div class="form-group">

						<input type="search" value="<?php if(isset($_GET['s'])){echo $_GET['s'];}?>" name="s" class="form-control" placeholder="Masukkan nama produk...">

					</div>

					<div class="form-group">

						<input type="submit" class="btn btn-info btn-sm" value="Cari Produk">

					</div>

				</form>

			</div>

			<?php if(mysqli_num_rows($query)>0){ ?>

			<?php

				while($data = mysqli_fetch_array($query)){

			?>

			<div class="col-lg-4 col-md-6 mb-4" id="produk-<?=$data["id_produk"];?>" onload="loadstok(<?=$data["id_produk"];?>)">
				<input type="hidden" id="stok" value="<?=$data["stok"];?>">
				<div class="card">

					<a href="tampil.php?id=<?=$data["id_produk"];?>">

						<img <?php "alt='$data[gambar]'" ;?> class="card-img-top" <?="<img src='./asset/img/produk/$data[gambar]' width='50' height='300'" ;?>>

					</a>

					<div class="card-body">

						<h4>

							<a class="card-title" href="tampil.php?id=<?=$data["id_produk"];?>"><?=$data["nama_produk"];?></a>

						</h4>

						<p class="card-text"><?=$data["deskripsi"];?></p>

						<?php if ($data["diskon"]>0) {

						    $diskon=(($data["harga_produk"]*$data["diskon"])/100);

						    $dis=($data["harga_produk"]-$diskon);

						?>

    						<p class="card-text">Rp <?=number_format($dis,0,",",".")?></p>

    						<del>Rp <?=number_format($data["harga_produk"],0,",",".");?></del>

						<?php }else{ ?>

    						<p class="card-text">Rp <?=number_format($data["harga_produk"],0,",",".");?></p>

						<?php } ?>

						<input type="hidden" id="stok" value="<?=$data["stok"];?>">

						<?php if ($data["stok"]<=0) { ?>

							<button class="btn btn-danger">Habis!</button>

						<?php }else{ ?>

							<?php if ($data["diskon"]>0) { ?>

								<a href="./beli.php?id=<?=$data["id_produk"];?>&harga=<?=$dis;?>&berat=<?=$data["berat"];?>" class="btn btn-primary">Beli</a>

							<?php }else{ ?>

								<a href="./beli.php?id=<?=$data["id_produk"];?>&harga=<?=$data["harga_produk"];?>&berat=<?=$data["berat"];?>" class="btn btn-primary">Beli</a>

							<?php } ?>

						<?php } ?>

					</div>

				</div>

			</div>

			<?php } ?>

			<?php 

			}else{

				echo "Tidak ada data...";

			} ?>

		</div>

	</div>

</div>



<?php require "layouts/footer.php"; ?>