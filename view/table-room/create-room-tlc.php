<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Add New Room</title>
  <link rel = "icon" href = "../../node_modules/admin-lte/dist/img/AdminLTELogo.png" type = "image/x-icon">
</head>
 
<body class="hold-transition dark-mode sidebar-mini">
	<?php ob_start(); ?>
	<?php include_once("../../koneksi.php");?>

	
	<div class="wrapper">

		<?php include '../template/navbar.php';	?>

		<?php 
			if($_SESSION['level']=="Admin"){
			include '../template/side-bar-admin.php';
			}else{
				include '../template/side-bar.php';
			}

		?>
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<section class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
				<div class="col-sm-6">
					<h1>CH KRA</h1>
					<p><?php $_SESSION['id_origin']?></p>
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
						<h3 class="card-title">Add New Room</h3>
						<div class="col">
                    		<a href="table-ch-kra.php"class="btn btn-warning float-right mx-2"><i class="fas fa-arrow-left"></i>  Back</a>
						</div>
					</div>
					<!-- /.card-header -->
					<!-- form start -->
					<form action="create-room-tlc.php" method="post" name="form1">
						<div class="card-body">
							<div class="form-group">
								<label for="name">Room Name</label>
								<input type="text" name="name" class="form-control" id="name" placeholder="Enter Room Name" required>								
							</div>
							<div class="form-group">
								<label>Team Leader</label>
								<select required class="form-control" name="tl_name" id="team_leader">
									<option value="" disabled selected >Pilih Team Leader</option>
									<?php 
										$tl = mysqli_query($mysqli, "SELECT * FROM user WHERE Level ='tlc' ORDER BY id DESC");
										while($data = mysqli_fetch_array($tl)) {
									?>
											<option value="<?=$data['username']?>"><?=$data['nama']?></option> 
											<?php
										}
								
									?>
								</select>
							</div>
							<div style="display:none" class="form-group">
								<label for="team_leader">Owner</label>
								<input type="text" name="owner" class="form-control" id="owner" value="<?php echo $_SESSION['username']; ?>">
							</div>
							<div style="display:none" class="form-group">
								<label for="team_leader">Create_at</label>
								<input type="date" name="create_at" class="form-control" id="create_at" value="<?php echo date('Y-m-d'); ?>">
							</div>
							<div style="display:none"class="form-group">
								<label for="team_leader">Update_at</label>
								<input type="date" name="update_at" class="form-control" id="update_at" value="<?php echo date('Y-m-d'); ?>">
							</div>
						</div>
						<!-- /.card-body -->

						<div class="card-footer">
							<button type="submit" class="btn btn-primary" name="Submit" value="Add">Submit</button>
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

	<?php
		// Check If form submitted, insert form data into users table.
		if(isset($_POST['Submit'])) {
			$name = $_POST['name'];
			$tl_name = $_POST['tl_name'];
			$owner = $_POST['owner'];
			$create_at = $_POST['create_at'];
			$update_at = $_POST['update_at'];
				
			$result = mysqli_query($mysqli, "INSERT INTO list_room_tlc(name,tl_name,owner,create_at,update_at) VALUES('$name','$tl_name','$owner','$create_at','$update_at')");
			if($result){
				header("Location: table-ch-kra.php?id=".$_SESSION['id_origin']."&notif=1");
			}else{
				header("Location: table-ch-kra.php?id=".$_SESSION['id_origin']."&notif=");
			}

		}

	?>
</body>
</html>

