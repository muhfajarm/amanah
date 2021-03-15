<?php 

require "layouts/header.php";



if(!isset($_SESSION['users']) OR empty($_SESSION['users'])){

  header("location:./auth/login.php?pesan=belum_login");

}

?>



<div class="container">

  <h1>Keranjang Belanja</h1>

  <hr>

  <table class="table table-bordered">

    <thead>

      <tr>

        <th>Nama</th>

        <th>Harga</th>

        <th>Jumlah</th>

        <th>Subharga</th>

      </tr>

    </thead>

    <tbody>

      <?php $totalbelanja = 0; ?>

          <?php

            $sql = "SELECT * FROM  produk WHERE id_produk IN (";

            foreach($_SESSION['keranjang'] as $id => $value) { 

                $sql.=$id.","; 

            }

            $sql = substr($sql, 0, -1).") ORDER BY nama_produk ASC";

            $query = mysqli_query($koneksi, $sql) or die("select data menu error :".mysqli_error());

            $sum = 0;

            foreach ($_SESSION['keranjang'] as $item){

                $sum += $item['berat']*$item['jumlah'];
            }

            while($row = mysqli_fetch_array($query)){

          ?>

          <tr>

            <td><?=$row["nama_produk"];?></td>

            <td>Rp <?=number_format($_SESSION['keranjang'][$row['id_produk']]['harga'],0,",",".");?></td>

            <td><?=$_SESSION['keranjang'][$row['id_produk']]['jumlah']?></td>

            <td>Rp <?=number_format($_SESSION['keranjang'][$row['id_produk']]['harga']*$_SESSION['keranjang'][$row['id_produk']]['jumlah'],0,",",".");?></td>

          </tr>

      <?php $totalbelanja+=($_SESSION['keranjang'][$row['id_produk']]['harga']*$_SESSION['keranjang'][$row['id_produk']]['jumlah']); ?>

      <?php } ?>

    </tbody>

    <tfoot>

      <tr>

        <th colspan="3">Subtotal</th>

        <th>Rp <?= number_format($totalbelanja,0,",",".") ?></th>

      </tr>

      <tr id="tr_ongkir">

        <th colspan="3">Ongkos Kirim</th>

        <th id="th_ongkir">Rp 0</th>

      </tr>

      <tr id="tr_total">

        <th colspan="3">Total Belanja</th>

        <th id="th_total">Rp <?= number_format($totalbelanja,0,",",".")  ?></th>

      </tr>

    </tfoot>

  </table>

  <input type="hidden" id="berat" value="<?= $sum; ?>">

  <form action="bayar.php" method="post">

    <div class="row">

      <?php

        $email = $_SESSION['email'];

        $sql = "SELECT * FROM  users WHERE email = '$email'";

        $ambil = mysqli_query($koneksi, $sql) or die("select data menu error :".mysql_error());

        $data = $ambil->fetch_assoc();

      ?>

      <div class="col-md-4">

        <div class="form-group">

          <label for="inputNama">Nama Lengkap</label>

          <input type="text" class="form-control" name="nama" id="inputNama" placeholder="Nama Lengkap" value="<?= $_SESSION['users']['nama'] ?>" required>

        </div>

      </div>

      <div class="col-md-4">

        <div class="form-group">

          <label for="inputEmail">Email</label>

          <input type="text" class="form-control" name="email" id="inputEmail" placeholder="Email" value="<?= $_SESSION['users']['email'] ?>" required>

        </div>

      </div>

      <div class="col-md-4">

        <div class="form-group">

          <label for="inputTelpon">No HP</label>

          <input type="text" class="form-control" name="telpon" id="inputTelpon" placeholder="No HP" value="<?= $data['no_hp'] ?>" required>

        </div>

      </div>

      <div class="col-md-3">

        <div class="form-group">

          <label>Pilih Provinsi<span>*</span></label>

          <select class="form-control" id="provinsi" name="provinsi" required="" disabled>

                </select>

        </div>

      </div>

      <div class="col-md-3">

        <div class="form-group" id="divkota">

          <label>Pilih Kota/Kabupaten<span>*</span></label><br>

          <select class="form-control" id="kota" name="kota" required="" disabled></select>

          <input type="hidden" id="id_kota" name="id_kota">

        </div>

      </div>

      <div class="col-md-3">

        <div class="form-group">

          <label>Pilih Kurir<span>*</span></label>

          <select class="form-control" id="kurir" name="kurir" required="" disabled>

            <option>Pilih Kurir</option>

            <?php

              $sqlkurir = "SELECT * FROM jasa_pengiriman";

              $hasil = mysqli_query($koneksi, $sqlkurir);

              while($kurir = mysqli_fetch_array($hasil)){

            ?>

              <option value="<?=$kurir['kode'];?>"><?=$kurir['nama'];?></option>

            <?php } ?>

          </select>

          <input type="hidden" id="kodekurir" name="kodekurir">

        </div>

      </div>

      <div class="col-md-3">

        <div id="hargalayanan" class="form-group">

          <label>Pilih Layanan<span>*</span></label><br>

                <select class="form-control" id="layanan" name="layanan" required="" disabled>

                </select></label>

        </div>

      </div>

      <div class="col" style="width: 100%">

        <div class="form-group">

          <label for="inputAlamat">Alamat Lengkap</label>

          <textarea class="form-control" name="alamat" id="inputAlamat" placeholder="Alamat Lengkap" required><?= $data['alamat'] ?></textarea>

        </div>

      </div>

    </div>

    <div class="form-group">

      <center id="formbayar">

        <input class="btn btn-success" type="submit" name="bayar" value="Bayar Sekarang">

        <input type="hidden" name="subtotal" value="<?= $totalbelanja  ?>">

      </center>

    </div>

  </form>

</div>



<?php require "layouts/checkout/footer.php"; ?>