<?php

  require "layouts/header.php";

  $id_produk = $_GET['id'];



  if (isset($_GET['id'])) {

    $sql = "SELECT * FROM produk WHERE id_produk = '$id_produk'";

    $result = mysqli_query($koneksi, $sql);

    $data = mysqli_fetch_array($result);

  }

?>

<div class="container">

  <div class="mt-1 row card">

    <div class="row">

      <div class="col-md-4">

        <img <?php "alt='$data[gambar]'" ;?> class="card-img-top" <?="<img src='./asset/img/produk/$data[gambar]'" ;?> style=" width: 250px; height: 250px;">

      </div>

      <div class="col-md-8">

        <div class="card-body">

          <h2 class="card-title"><?=$data["nama_produk"];?></h2>

          <?php if ($data["diskon"]>0) {

		    $diskon=(($data["harga_produk"]*$data["diskon"])/100);

		    $dis=($data["harga_produk"]-$diskon);

		?>

            <h4 class="card-text">Rp <?=number_format($dis,0,",",".")?></h4>

			<!--<p class="card-text">Rp<?=$dis?></p>-->

			<del><h5 class="card-text">Rp<?=number_format($data["harga_produk"],0,",",".");?></h5></del>

		<?php }else{ ?>

            <h4 class="card-text">Rp<?=number_format($data["harga_produk"],0,",",".");?></h4>

			<!--<p class="card-text">Rp<?=$data["harga_produk"];?></p>-->

		<?php } ?>

          <form method="post">

            <div class="form-group">

              <label>Stok <?=$data["stok"];?></label>
              <input type="hidden" id="stok" value="<?=$data["stok"];?>">
              <label>Berat <?=$data["berat"];?></label>

              <input type="hidden" name="berat" value="<?=$data["berat"];?>">

              <div class="input-group">

                <label>Qty</label>

                <div class="btn" onClick="decrement_quantity(<?=$data['id_produk'];?>)">-</div>

                <div id="divqty">

                    <input id="input-quantity-<?=$data['id_produk'];?>" min="1" name="qty" max="<?=$data['stok'];?>" value="1" required>

                </div>

                <div class="btn" onClick="increment_quantity(<?=$data['id_produk'];?>)">+</div>

                <!--<input type="number" min="1" max='<?=$data["stok"];?>' value="1" name="qty" class="col-lg-2" required>-->

                <?php if ($data["diskon"]>0) { ?>

                    <input type="hidden" name="harga" value="<?=$dis?>">

    				<!--<a href="./beli.php?id=<?=$data["id_produk"];?>&harga=<?=$dis;?>" class="btn btn-primary">Beli</a>-->

    			<?php }else{ ?>

                    <input type="hidden" name="harga" value="<?=$data["harga_produk"];?>">

    				<!--<a href="./beli.php?id=<?=$data["id_produk"];?>&harga=<?=$data["harga_produk"];?>" class="btn btn-primary">Beli</a>-->

    			<?php } ?>

                <div class="input-group-btn">

                    <?php if ($data["stok"]<=0) { ?>

						<button class="btn btn-danger">Habis!</button>

					<?php }else{ ?>

                      <button class="btn btn-success btn-sm" name="beli">Beli</button>

                  <?php } ?>

                </div>

              </div>

            </div>

          </form>

          <?php 

          if (isset($_POST['beli'])) {

                $harga = $_POST['harga'];

                $qty = $_POST['qty'];

                $berat = $_POST['berat'];

                if (isset($_SESSION['keranjang'][$id_produk])) {

                    $_SESSION['keranjang'][$id_produk]['jumlah'] = $qty;

                }else{

                    $sql_s="SELECT * FROM produk WHERE id_produk='$id_produk'"; 

                    $query_s=mysqli_query($koneksi, $sql_s) or die("select data menu error :".mysqli_error());

                    if(mysqli_num_rows($query_s)!=0){ 

                        $row_s=mysqli_fetch_array($query_s); 

                          

                        $_SESSION['keranjang'][$row_s['id_produk']]=array( 

                                "id_produk" => $id_produk,

                                "jumlah" => $qty, 

                                "harga" => $harga,

                                "berat" => $berat

                            ); 

                    }

                }

                

                echo "<script>alert('produk telah dimasukkan ke keranjang belanja');</script>";

                echo "<script>location='./cart.php'</script>";

           } ?>

          <p class="card-text"><?=$data["deskripsi"];?></p>

          <!-- <input type="submit" class="btn btn-success btn-sm" name="beli" value="Beli"> -->

          <h5>Cek Ongkir</h5>

          <form class="form-horizontal" id="ongkir" method="POST">

            <div class="form-group">

              <div class="col-sm-12">

                <label>Pilih Provinsi<span>*</span></label>

                <select class="form-control" id="provinsi" name="provinsi" required="">

                </select>

              </div>

            </div>

            <div class="form-group">

              <div class="col-sm-12">

                <label>Pilih Kota/Kabupaten<span>*</span></label><br>

                <select class="form-control" id="kota" name="kota" required="">

                </select>

              </div>

            </div>

            <div class="form-group">

              <div class="col-sm-12">

                <label>Pilih Kurir<span>*</span></label><br>

                <select class="form-control" id="kurir" name="kurir" required="">

                  <option>Pilih Kurir</option>

                  <?php

                    $sqlkurir = "SELECT * FROM jasa_pengiriman";

                    $hasil = mysqli_query($koneksi, $sqlkurir);

                    while($kurir = mysqli_fetch_array($hasil)){

                  ?>

                    <option value="<?=$kurir['kode'];?>"><?=$kurir['nama'];?></option>

                  <?php } ?>

                </select>

              </div>

            </div>

            <input type="hidden" name="berat" value="<?=$data["berat"];?>">

            <div id="qtyongkir">

                <input type="hidden" id="qty-ongkir" name="qty-ongkir" value="1">

            </div>

            <div class="form-group">        

              <div class="col-sm-offset-3 col-sm-8">

                <button type="submit" class="btn btn-success">Cek</button>

              </div>

            </div>

          </form>

          <div id="response_ongkir">

            <div class="col-sm-12">

            </div>

        </div>

      </div>

    </div>

  </div>



<?php require "layouts/footer.php"; ?>