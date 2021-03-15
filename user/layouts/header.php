<?php include "../../config/koneksi.php"; ?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../../asset/css/bootstrap.min.css">
    <link href="../../asset1/css/custom.css" rel="stylesheet">

      <title>Amanah Colection</title>
    </head>
    <body class="body">
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="../../">Amanah Colection</a>

      <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
          
        </ul>
        <form class="form-inline my-2 my-lg-0 ">
          <a href="../../cart.php">cart</a>
          <?php session_start() ?>
          <?php if (isset($_SESSION["users"])): ?>
            <ul class="nav-item dropdown mr-5">
              <a class="btn btn-info dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?= $_SESSION['email']; ?>
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="../dashboard/index.php?email=<?= $_SESSION['email']; ?>">Dashboard</a>
                <a class="dropdown-item" href="../riwayat/riwayat.php">Riwayat</a>
                <a class="dropdown-item" href="../../auth/logout.php">Logout</a>
              </div>
            </ul>
            <?php else: ?>
              <a class="nav-link" href="../auth/login.php">Login</a>
              <a class="nav-link" href="../auth/register.php">Register</a>
            <?php endif ?>
        </form>
      </div>
    </nav>