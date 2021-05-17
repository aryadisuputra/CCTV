<?php 
// mengaktifkan session pada php
// session_start();


session_start();
// Example
	include 'koneksi.php';
	$username = $_POST['username'];
	$password = $_POST['password'];
	$login = mysqli_query($mysqli,"SELECT * FROM user WHERE username='$username' and password='$password'");
	$cek = mysqli_num_rows($login);

	if($cek > 0){

		$data = mysqli_fetch_assoc($login);
		if($data['level']=="Admin" || $data['level']=="Pimpinan"){

			$_SESSION['username'] = $username;
			$_SESSION['level'] =$data['level'];
			$_SESSION['id'] =$data['id'];
			$_SESSION['supervisor'] =$data['supervisor'];
			$_SESSION['team_leader'] =$data['team_leader'];
			$_SESSION['uid_zoom'] =$data['uid_zoom'];
			$_SESSION['status'] =$data['status'];
			header("location:view/dashboard/halaman_admin.php");
			exit();

		}else if($data['level']=="TLC" || $data['level']=="TL" || $data['level']=="Staff"){
			$_SESSION['username'] = $username;
			$_SESSION['level'] =$data['level'];
			$_SESSION['id'] =$data['id'];
			$_SESSION['supervisor'] =$data['supervisor'];
			$_SESSION['team_leader'] =$data['team_leader'];
			$_SESSION['uid_zoom'] =$data['uid_zoom'];
			$_SESSION['status'] =$data['status'];
			header("location:view/dashboard/halaman_pegawai.php");
			exit();
		}else{
			header("location:index.php?notif=fail");
			exit();
		}

		
	}else{
		header("location:index.php?notif=fail");
		exit();
	}



?>