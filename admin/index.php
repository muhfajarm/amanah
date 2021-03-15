<!DOCTYPE html>
<html>
	<head>
	  <meta charset="utf-8">
	  <meta http-equiv="X-UA-Compatible" content="IE=edge">
	  <title>
		Dashboard
	  </title>
	  <!-- Tell the browser to be responsive to screen width -->
	  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	  <link rel="stylesheet" href="../asset1/bower_components/bootstrap/dist/css/bootstrap.min.css">
	  <!-- Font Awesome -->
	  <link rel="stylesheet" href="../asset1/bower_components/font-awesome/css/font-awesome.min.css">
	  <!-- Ionicons -->
	  <link rel="stylesheet" href="../asset1/bower_components/Ionicons/css/ionicons.min.css">
	  <!-- Theme style -->
	  <link rel="stylesheet" href="../asset1/dist/css/AdminLTE.min.css">
	  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
	        page. However, you can choose any other skin. Make sure you
	        apply the skin class to the body tag so the changes take effect. -->
	  <link rel="stylesheet" href="../asset1/dist/css/skins/skin-blue.min.css">
	  <!-- Google Font -->
	  <link rel="stylesheet"
	        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
	</head>
	<body class="hold-transition skin-blue sidebar-mini">
		<?php 
		session_start();
		if(!isset($_SESSION['users'])){
  			header("location:../auth/login.php?pesan=belum_login");
  		}
		?>

		<div class="wrapper">
		  <!-- Main Header -->
		  <?php include "header.php" ?>

			<!-- Sidebar -->
			<?php include "sidebar.php" ?>
			
			<!-- Content Wrapper. Contains page content -->
			<div class="content-wrapper">
				<!-- Content Header (Page header) -->
				<section class="content-header">
					<h1>
						Amanah Colection
					</h1>
					<small>Selamat Datang di halaman Admin</small>
					<ol class="breadcrumb">
						<li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
						<li class="active">Here</li>
					</ol>
			    </section>

			    <!-- Main content -->
			    <section class="content container-fluid">
					<?php include "content.php"; ?>
			    </section>
			    <!-- /.content -->
			</div>
			<!-- /.content-wrapper -->

			<!-- Main Footer -->
			<?php include "footer.php"; ?>

		</div>
		<!-- ./wrapper -->

		<!-- REQUIRED JS SCRIPTS -->

		<!-- jQuery 3 -->
		<script src="../asset1/bower_components/jquery/dist/jquery.min.js"></script>
		<!-- Bootstrap 3.3.7 -->
		<script src="../asset1/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
		<!-- AdminLTE App -->
		<script src="../asset1/dist/js/adminlte.min.js"></script>
	</body>
</html>