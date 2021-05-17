<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Add User</title>
</head>

<body class="hold-transition dark-mode sidebar-mini">

	<div class="wrapper">
		<?php 
			include '../template/navbar.php';
			include_once("../../koneksi.php");
  		?>
		<?php 
			if($_SESSION['level']=="Admin"){
				include '../template/side-bar-admin.php';
			}else{
				include '../template/side-bar.php';
			}

		?>

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<div class="content-header">
				<div class="container-fluid">
					<div class="row mb-2">
						<div class="col-sm-6">
							<h1>Add User</h1>
						</div>
						<div class="col-sm-6">
							<ol class="breadcrumb float-sm-right">
								<li class="breadcrumb-item"><a href="#">Dashboard</a></li>
								<li class="breadcrumb-item active">List Room</li>
							</ol>
						</div>
					</div>
				</div><!-- /.container-fluid -->
			</div>
			<!-- /.content-header -->

			<!-- Main content -->
			<section class="content">
				<div class="container-fluid">
					<?php 
						if(isset($_GET['notif'])){
							if($_GET['notif']=="1"){
							echo" <div class='alert alert-success alert-dismissible'><i class='fas fa-exclamation-circle'></i>
								<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
								<strong>Success!</strong> Data berhasil ditambahkan.
								</div>";
							}else if($_GET['notif']=="3"){
							echo" <div class='alert alert-success alert-dismissible'><i class='fas fa-exclamation-circle'></i>
										<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
										<strong>Success!</strong> Data berhasil di update.
									</div>";
							}else if($_GET['notif']=="2"){
							echo" <div class='alert alert-danger alert-dismissible'><i class='fas fa-exclamation-circle'></i>
										<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
										<strong>Failed!</strong> Data Gagal ditambahkan.
									</div>";
							}else if($_GET['notif']=="4"){
							echo" <div class='alert alert-danger alert-dismissible'><i class='fas fa-exclamation-circle'></i>
										<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
										<strong>Failed!</strong> Data Gagal di update.
									</div>";
							}else if($_GET['notif']=="5"){
							echo" <div class='alert alert-success alert-dismissible'><i class='fas fa-exclamation-circle'></i>
										<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
										<strong>Success!</strong> Data berhasil di Hapus.
									</div>";
							}else if($_GET['notif']=="6"){
							echo" <div class='alert alert-danger alert-dismissible'><i class='fas fa-exclamation-circle'></i>
										<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
										<strong>Failed!</strong> Data Gagal di Hapus.
									</div>";
							}
						}
				   ?>
					<div class="card card">
						<div class="card-header">
							<h3 class="card-title">Add New User</h3>
							<div class="col">
								<a href="table-ch-kra.php" class="btn btn-warning float-right mx-2"><i
										class="fas fa-arrow-left"></i> Back</a>
							</div>
						</div>
						<!-- /.card-header -->
						<!-- form start -->
						<form action="create_user.php" method="post" name="form1">
							<div class="card-body">
								<div class="form-group">
									<label for="name">Name</label>
									<input type="text" name="name" class="form-control" id="name"
										placeholder="Enter Name">
								</div>
								<div class="form-group">
									<label for="name">Username</label>
									<input type="text" name="username" class="form-control" id="username"
										placeholder="Enter Username">
								</div>
								<div class="form-group">
									<label for="name">Password</label>
									<input type="text" name="password" class="form-control" id="password"
										placeholder="Enter Password">
								</div>

								<div class="form-group">
									<label>Level</label>
									<select class="form-control" name="level" id="level">
										<option disabled selected>Pilih Level</option>
										<option value="Admin">Admin</option>
										<option value="Pimpinan">Pimpinan</option>
										<option value="TLC">TLC</option>
										<option value="TL">TL</option>
										<option value="Staff">Staff</option>
									</select>
								</div>
								<div class="form-group">
									<label>Supervisor</label>
									<select class="form-control" name="supervisor" id="supervisor">
										<option disabled selected>Pilih Supervisor</option>
										<?php 
											$tl = mysqli_query($mysqli, "SELECT * FROM user ORDER BY id DESC");
											while($data = mysqli_fetch_array($tl)) {
										?>
										<option value="<?=$data['username']?>"><?=$data['nama']?></option>
										<?php
											}
									
										?>
									</select>
								</div>
								<div class="form-group">
									<label>Team Leader</label>
									<select class="form-control" name="tl_name" id="team_leader">
										<option disabled selected>Pilih Team Leader</option>
										<?php 
											$tl = mysqli_query($mysqli, "SELECT * FROM user ORDER BY id DESC");
											while($data = mysqli_fetch_array($tl)) {
										?>
										<option value="<?=$data['username']?>"><?=$data['nama']?></option>
										<?php
											}
									
										?>
									</select>
								</div>
								<div class="form-group">
									<label>Account Status</label>
									<select class="form-control" name="status" id="status">
										<option disabled selected>Account Status</option>
										<option value="Rejected">Rejected</option>
										<option value="Pending">Pending</option>
										<option value="Approved">Approved</option>
									</select>
								</div>
								<div class="form-group">
									<label for="name">UID Zoom</label>
									<input type="text" name="uid" class="form-control" id="uid" placeholder="Enter UID">
								</div>
								<!-- <div class="form-group">
									<label for="exampleInputFile" class="col-sm-2 col-form-label">File input</label>
									<div class="">
										<div class="input-group">
											<div class="custom-file">
												<input type="file" class="form-control" id="exampleInputFile">
												<label class="custom-file-label" for="exampleInputFile">Choose
													file</label>
											</div>
											<div class="input-group-append">
												<span class="input-group-text">Upload</span>
											</div>
										</div>
									</div>

								</div> -->
							</div>
							<!-- /.card-body -->

							<div class="card-footer">
								<button type="submit" class="btn btn-success" name="Submit" value="Add">Create</button>
							</div>
						</form>
					</div>

					<!-- /.row (main row) -->
				</div><!-- /.container-fluid -->
			</section>
			<!-- /.content -->
		</div>
		<!-- /.content-wrapper -->
		<?php include '../template/footer_control.php';?>
		<?php
			// Check If form submitted, insert form data into users table.
			if(isset($_POST['Submit'])) {
				$name = $_POST['name'];
				$username = $_POST['username'];
				$password = $_POST['password'];
				$level = $_POST['level'];
				$supervisor = $_POST['supervisor'];
				$tl_name = $_POST['tl_name'];
				$status = $_POST['status'];
				$uid = $_POST['uid'];

				$result = mysqli_query($mysqli, "INSERT INTO user(nama,username,password,level,supervisor,team_leader,status,uid_zoom) VALUES('$name','$username','$password','$level','$supervisor','$tl_name','$status','$uid')");
				if($result){
					header("Location: create_user.php?notif=1");
				}else{
					header("Location: create_user.php?notif=2");
				}

			}

		?>
	</div>
	<!-- ./wrapper -->
</body>

</html>