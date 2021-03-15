<!DOCTYPE html>
<html>
  <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="../asset/css/bootstrap.min.css">

      <!-- Custom styles for this template -->
      <link href="../asset/css/signin.css" rel="stylesheet">
	  <link href="../asset1/css/custom.css" rel="stylesheet">
	  

      <title>Hello, world!</title>
  </head>
  <body class="body text-center">
    <form class="form-signin" action="cek_login.php" method="post">
      <h1 class="h3 mb-3 font-weight-normal">Silahkan Login</h1>
      <?php 
        if(isset($_GET['pesan'])){
          if($_GET['pesan'] == "gagal"){
            echo "Login gagal! username atau password salah!";
          }else if($_GET['pesan'] == "logout"){
            echo "Anda telah berhasil logout";
          }else if($_GET['pesan'] == "belum_login"){
            echo "Anda harus login untuk mengakses halaman ini";
          }
        }
      ?>
      <br>
      <br>
      <label for="inputEmail" class="sr-only">Email</label>
      <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email" required="required" autofocus="">
      <br>
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required="required">
      <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
      <br>
      <a href="../index.php">< Kembali</a>
    </form>
  </body>
</html>