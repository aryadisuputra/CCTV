<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Add New Room</title>
  <link rel = "icon" href = "../../node_modules/admin-lte/dist/img/AdminLTELogo.png" type = "image/x-icon">
</head>
 
<body class="hold-transition dark-mode sidebar-mini">
	<?php ob_start(); ?>
	<?php include '../template/navbar.php';?>
	<?php 
		if($_SESSION['level']=="Admin"){
		include '../template/side-bar-admin.php';
		}else{
			include '../template/side-bar.php';
		}

	?>
	<div class="wrapper">


		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<section class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
				<div class="col-sm-6">
					<h1>TLC</h1>
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
				<div class="card card-primary">
					<div class="card-header">
						<h3 class="card-title">Add New Room</h3>
						<div class="col">
                    		<a href="table-tlc.php"class="btn btn-warning float-right mx-2"><i class="fas fa-arrow-left"></i>  Back</a>
							<a href="create-room-tlc.php"class="btn btn-success float-right"><i class="fas fa-plus-circle"></i>  Add New Room</a>
						</div>
					</div>
					<!-- /.card-header -->
					<!-- form start -->
					<form action="create-room-tl.php" method="post" name="form1">
						<div class="card-body">
							<div class="form-group">
								<label for="name">Name</label>
								<input type="text" name="name" class="form-control" id="name" placeholder="Enter Room Name" required>								
							</div>
							<div class="form-group">
								<label for="team_leader">Team Leader</label>
								<input type="text" name="tl_name" class="form-control" id="team_leader" placeholder="Enter Team Leader Name" required >
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
            
            // include database connection file
            include_once("../../koneksi.php");
                    
            // Insert user data into table
            $result = mysqli_query($mysqli, "INSERT INTO list_room_tl(name,tl_name) VALUES('$name','$tl_name')");
            
            // Show message when user added
            // echo "User added successfully. <a href='index.php'>View Users</a>";
            header("Location:table-tlc.php");
        }
    ?>
		
</body>
</html>