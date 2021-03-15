<?php
	include "../layouts/header.php";

	$email = $_SESSION['email'];

	if ($_POST['epass']) {
		$password_lama			= $_POST['password_lama'];
		$password_baru			= $_POST['password_baru'];
		$konfirmasi_password	= $_POST['konfirmasi_password'];

		$password_lama	= md5($password_lama);
		$sql			= "SELECT password FROM users WHERE password='$password_lama'";
		$cek 			= mysqli_query($koneksi, $sql);

		if ($cek->num_rows) {
			if ($password_baru >= 5) {
				if ($password_baru	== $konfirmasi_password) {
					$password_baru	= md5($password_baru);
					$sqlUpdate		= "UPDATE users SET password='$password_baru' WHERE email='$email'";
					$update			= $koneksi->query($sqlUpdate);

					if($update){
						echo "<script>alert('Berhasil merubah password');</script>";
						$url = "index.php?email=".$_SESSION['email'];
			        	echo "<script>location.href='$url'</script>";
					}else{
						echo "<script>alert('Gagal merubah password');</script>";
						$url = "index.php?email=".$_SESSION['email'];
			        	echo "<script>location.href='$url'</script>";
			        }	
				}else{
					echo "<script>alert('Konfirmasi password tidak cocok');</script>";
					$url = "index.php?email=".$_SESSION['email'];
		        	echo "<script>location.href='$url'</script>";
				}
			}else{
				echo "<script>alert('Minimal password baru adalah 5 karakter');</script>";
				$url = "index.php?email=".$_SESSION['email'];
	        	echo "<script>location.href='$url'</script>";
	        }
		}else{
			echo "<script>alert('Password lama tidak cocok');</script>";
			$url = "index.php?email=".$_SESSION['email'];
        	echo "<script>location.href='$url'</script>";
        }
	}
?>