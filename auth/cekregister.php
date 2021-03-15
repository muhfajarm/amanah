<?php

// menghubungkan php dengan koneksi database
include '../config/koneksi.php';

//mengambil data dari form login
$email = $_POST['email'];
$password = md5($_POST['password']);

//membuat query untuk menyimpan
$sql= "INSERT INTO  users (email, password) VALUES ('$email', '$password')";//die($sql);

//menyimpan data ke database
	$result = mysqli_query($koneksi, $sql);

	if ($result){
		header ("location:../index.php");
	} else {
		echo "Terjadi kesalahan";
	}

// // menyeleksi data user dengan username dan password yang sesuai
// $register = mysqli_query($koneksi, "select * from users where username='$username' and password='$password'");
// // menghitung jumlah data yang ditemukan
// $cek = mysqli_num_rows($login);

// cek apakah username dan password di temukan pada database
// if($cek > 0){
 
// 	$data = mysqli_fetch_assoc($login);
 
// 	// cek jika user login sebagai admin
// 	if($data['level']=="admin"){
 
// 		// buat session login dan username
// 		$_SESSION['username'] = $username;
// 		$_SESSION['level'] = "admin";
// 		$_SESSION['status'] = "login";
// 		// alihkan ke halaman dashboard admin
// 		header("location:../admin/index.php");
 
// 	// cek jika user login sebagai user
// 	}else if($data['level']=="user"){
// 		// buat session login dan username
// 		$_SESSION['username'] = $username;
// 		$_SESSION['level'] = "user";
// 		$_SESSION['status'] = "login";
// 		header("location:../user/index.php");
// 	}else{
// 		// alihkan ke halaman login kembali
// 		header("location:./login.php?pesan=gagal");
// 	}	
// }else{
// 	header("location:./login.php?pesan=gagal");
// }

?>