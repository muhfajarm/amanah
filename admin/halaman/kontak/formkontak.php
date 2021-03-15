<html>
  <head>
    <title>Dashboard | Tambah</title>
    <link rel="stylesheet" href="../../../asset/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../../asset/css/form.css">
  </head>
  <body class="bg-light">
    <div class="container">
      <div class="py-5 text-center">
        <h1 class="lead"> Tambah Data </h1>
      </div>
      <div class="row">
        <div class="col-md-12 order-md-1">
          <form action="insertkontak.php" method="post" class="needs-validation">
		        <div class="row">
              <div class="col-md-8 mb-3">
                <label>Nama : </label>
                <input type="text" class="form-control" name="nama" >
              </div>
              <div class="col-md-4 mb-3">
                <label>Email : </label>
                <input type="text" class="form-control" name="email" >
              </div>
              <div class="col-md-4 mb-3">
                <label>Subjek : </label>
                <input type="text" class="form-control" name="subjek" >
              </div>
              <div class="col-md-4 mb-3">
                <label>Pesan : </label>
                <input type="text" class="form-control" name="pesan" >
              </div>
              <div class="col-md-4 mb-3">
                <label>Tanggal : </label>
                <input type="date" class="form-control" name="tanggal" >
              </div>
            </div>
            <button class="btn btn-primary btn-lg btn-block" type="submit">Tambah</button>
            <br>
            <a href="./index.php?page=kontak">< Kembali</a>
          </form>
        </div>
      </div>
    </div>

    <script src="./asset/js/jquery-3.4.1.min.js"></script>
    <script src="./asset/js/bootstrap.bundle.js"></script>
    <script src="./asset/js/bootstrap.min.js"></script>
  </body>
</html>