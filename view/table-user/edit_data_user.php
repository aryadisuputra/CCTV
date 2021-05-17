<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Edit Data User</title>
    <!-- <style>
        .hidden{
            display: none;
        }
        .active{
            display:block;
        }
    </style> -->
	<link rel = "icon" href = "../../node_modules/admin-lte/dist/img/AdminLTELogo.png" type = "image/x-icon">
</head>

<body class="hold-transition dark-mode sidebar-mini">
	<?php
        include_once("../../koneksi.php");
		$id = $_GET['id'];
		$result = mysqli_query($mysqli, "SELECT * FROM user WHERE id=$id");
		$user = mysqli_query($mysqli, "SELECT * FROM user where id=$id");
		$user_level = mysqli_fetch_assoc($user);
		while($user_data = mysqli_fetch_array($result))
		{
			$name = $user_data['nama'];
			$username = $user_data['username'];
			$password = $user_data['password'];
			$supervisor = $user_data['supervisor'];
			$team_leader = $user_data['team_leader'];
			$status = $user_data['status'];
			$uid_zoom = $user_data['uid_zoom'];
			$level = $user_data['level'];

		}

		if(isset($_POST['update']))
		{
			$id = $_POST['id'];
			
			$name=$_POST['name'];
			$username=$_POST['username'];
			$password=$_POST['password'];
			$supervisor=$_POST['supervisor'];
			$team_leader=$_POST['team_leader'];
			$status=$_POST['status'];
			$uid_zoom=$_POST['uid_zoom'];
			
                $result = mysqli_query($mysqli, "UPDATE user SET name='$name',username='$username',password='$password',supervisor='$supervisor',team_leader='$team_leader',status='$status',uid_zoom='$uid_zoom' WHERE id=$id");
                if($result){
                    if($user_level['level']=="Admin"){
                        header("Location: list_admin.php?notif=3");
                        exit();
                    }else if($user_level['level']=="TL"){
                        header("Location: list_user_tl.php?notif=3");
                        exit();
                    }else if($user_level['level']=="TLC"){
                        header("Location: list_user_tlc.php?notif=3");
                        exit();
                    }else if($user_level['level']=="Pimpinan"){
                        header("Location: list_pimpinan.php?notif=3");
                        exit();
                    }else if($user_level['level']=="Staff"){
                        header("Location: list_user_staff.php?notif=3");
                        exit();
                    }
                }else{
                    if($user_level['level']=="Admin"){
                        header("Location: list_admin.php?notif=4");
                        exit();
                    }else if($user_level['level']=="TL"){
                        header("Location: list_user_tl.php?notif=4");
                        exit();                   
                    }else if($user_level['level']=="TLC"){
                        header("Location: list_user_tlc.php?notif=4");
                        exit();    
                    }else if($user_level['level']=="Pimpinan"){
                        header("Location: list_pimpinan.php?notif=4");
                        exit();    
                    }else{
                        header("Location: list_user_staff.php?notif=4");
                        exit();  
                    }
                }


		}
	?>
	<?php

	?>
	<div class="wrapper">
    <?php include '../template/navbar.php';
	?>
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
							<h1></h1>
						</div>
						<div class="col-sm-6">
							<ol class="breadcrumb float-sm-right">
								<li class="breadcrumb-item"><a href="../dashboard/halaman_admin.php">Dashboard</a></li>
								<li class="breadcrumb-item active">Edit Data User</li>
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
							<h3 class="card-title">Edit Data User <?php echo $name;?></h3>
							<div class="col">
							<a href="list_admin.php" class="btn btn-warning float-right mx-2"><i class="fas fa-arrow-left"></i> Back</a>
							</div>
						</div>
						<!-- /.card-header -->
						<!-- form start -->
						<form name="update_user" method="post" action="edit_data_user.php">
							<div class="card-body">
								<div class="form-group">
									<label for="name">Name</label>
                                    <input hidden type="text" name="id" class="form-control" id="id" value=<?php echo $id;?>>
									<input type="text" name="name" class="form-control" id="name" value=<?php echo $name;?>>
								</div>
								<div class="form-group">
									<label for="username">Username</label>
									<input type="text" name="username" class="form-control" id="username"value=<?php echo $username;?> disabled>
								</div>
								<div class="form-group">
									<label for="password">Password</label>
									<input type="text" name="password" class="form-control" id="password" value=<?php echo $password;?>>
								</div>
								<?php if($user_level['level'] !=="Admin"):?>
								<div class="form-group">
									<label>Supervisor</label>
									<select required class="form-control" name="supervisor" id="supervisor">
										<option value=<?php echo $supervisor;?>><?php echo $supervisor;?></option>
										<?php 
                                            $tl = mysqli_query($mysqli, "SELECT * FROM user WHERE Level ='tl' ORDER BY id DESC");
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
									<select required class="form-control" name="team_leader" id="team_leader">
										<option value=<?php echo $team_leader;?>><?php echo $team_leader;?></option>
										<?php 
                                            $tl = mysqli_query($mysqli, "SELECT * FROM user WHERE Level ='tl' ORDER BY id DESC");
                                            while($data = mysqli_fetch_array($tl)) {
									    ?>
										<option value="<?=$data['username']?>"><?=$data['nama']?></option>
										<?php
										    }
								
									    ?>
									</select>
								</div>
								<?php endif?>
                                <div class="form-group">
									<label for="password">Status</label>
									<select required class="form-control" name="team_leader" id="team_leader">
										<option value=<?php echo $status;?>><?php echo $status;?></option>
										<option value="Rejected">Rejected</option>
										<option value="Pending">Pending</option>
										<option value="Approved">Approved</option>
									</select>
								</div>
								<?php if($user_level['level']=="Admin"||$user_level['level']=="TL"):?>
								<div class="form-group">
									<label for="uid_zoom">UID Zoom</label>
									<input type="text" name="uid_zoom" class="form-control" id="uid_zoom" value=<?php echo $uid_zoom;?>>
								</div>
								<?php endif?>
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