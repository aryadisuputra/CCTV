<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Edit Room</title>
	<link rel = "icon" href = "../../node_modules/admin-lte/dist/img/AdminLTELogo.png" type = "image/x-icon">
</head>

<body class="hold-transition dark-mode sidebar-mini">
	<?php include '../template/navbar.php';
	?>
	<?php 
		if($_SESSION['level']=="Admin"){
		include '../template/side-bar-admin.php';
		}else{
			include '../template/side-bar.php';
		}
		include_once("../../koneksi.php");?>
	<?php
		$id = $_GET['id'];
		$result = mysqli_query($mysqli, "SELECT * FROM list_room_tl WHERE id=$id");
		
		while($user_data = mysqli_fetch_array($result))
		{
			$name = $user_data['name'];
			$tl_name = $user_data['tl_name'];
			$room_name = $user_data['name'];
			$owner_username = $user_data['owner'];
			$id_origin_room = $user_data['id_origin'];

		}
		if(isset($_POST['update']))
		{	
			$id_origin_room=$_SESSION['id_origin'];
			$id = $_POST['id'];
			
			$name=$_POST['name'];
			$tl_name=$_POST['tl_name'];
				
			// update user data
			$result = mysqli_query($mysqli, "UPDATE list_room_tl SET name='$name',tl_name='$tl_name' WHERE id=$id");
			if($result){
				header("Location: table-tlc.php?id=$id_origin_room&notif=3");
				exit();
			}else{
				header("Location: table-tlc.php?id=$id_origin_room&notif=4");
			}
		}
	?>
	<?php

	?>
	<div class="wrapper">
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<section class="content-header">
				<div class="container-fluid">
					<div class="row mb-2">
						<div class="col-sm-6">
							<h1></h1>
						</div>
						<div class="col-sm-6">
							<ol class="breadcrumb float-sm-right">
								<li class="breadcrumb-item"><a href="#">Dashboard</a></li>
								<li class="breadcrumb-item active">List Room</li>
							</ol>
						</div>
					</div>
				</div><!-- /.container-fluid -->
			</section>

			<!-- Main content -->
			<section class="content">
				<div class="container-fluid">
					<div class="card card">
						<div class="card-header">
							<h3 class="card-title">Edit Room <?php echo $room_name;?></h3>
							<div class="col">
								<a href="table-ch-kra.php" class="btn btn-warning float-right mx-2"><i
										class="fas fa-arrow-left"></i> Back</a>
							</div>
						</div>
						<!-- /.card-header -->
						<!-- form start -->
						<form name="update_user" method="post" action="edit-room-tl.php">
							<div class="card-body">
								<div class="form-group">
									<label for="name">Name</label>
									<input type="text" name="name" class="form-control" id="name"
										value=<?php echo $name;?>>
								</div>
								<div class="form-group">
									<label>Team Leader</label>
									<select required class="form-control" name="tl_name" id="team_leader">
										<option value=<?php echo $tl_name;?>><?php echo $tl_name;?></option>
										<?php 
										$tl = mysqli_query($mysqli, "SELECT * FROM user WHERE Level ='tl' ORDER BY id DESC");
										while($data = mysqli_fetch_array($tl)) {
									?>
										<option value="<?=$data['username']?>"><?=$data['nama']?></option>
										<?php
										}
								
									?>
										<input hidden type="text" name="id" class="form-control" id="id"
											value=<?php echo $id;?>>
									</select>
								</div>
							</div>
							<!-- /.card-body -->

							<div class="card-footer">
								<button type="submit" class="btn btn-primary" name="update"
									value="Update">Submit</button>
							</div>
						</form>
					</div>
				</div>
				<!-- /.container-fluid -->
			</section>
			<!-- /.content -->
		</div>
		<?php include '../template/footer_control.php';?>
	</div>
</body>

</html>