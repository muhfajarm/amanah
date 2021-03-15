<?php 
// mengaktifkan session php
session_start();

// menghubungkan dengan koneksi
include '../config/koneksi.php';

// menangkap data yang dikirim dari form
$email = $_POST['email'];
$password = md5($_POST['password']);

// menyeleksi data admin dengan username dan password yang sesuai
// $sql = "select * from users where username='$username' and password='$password'";
// $data = mysqli_query($koneksi,$sql);
$login = mysqli_query($koneksi, "SELECT * FROM users WHERE email='$email' AND password='$password'");

// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);

if($cek > 0){
	$data = mysqli_fetch_assoc($login);

	if ($data['level']=="admin"){
		$_SESSION['email']=$email;
		$_SESSION['level']="admin";
		$_SESSION['users']=$data;

		header("location:../admin/index.php");

		}else if ($data['level']=="user"){
			$_SESSION['email']=$email;
			$_SESSION['level']="user";
			$_SESSION['users']=$data;
			if (isset($_SESSION['keranjang']) OR !empty($_SESSION['keranjang'])){
				header("location:../checkout.php");
			}else{
				header("location:../index.php");
			}
		}else{
			header("location:./login.php?pesan=a");
		}

	}else{
	header("location:./login.php?pesan=gagal");
}
?>