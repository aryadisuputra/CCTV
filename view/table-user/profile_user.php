<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Profile</title>
  <link rel = "icon" href = "../../node_modules/admin-lte/dist/img/AdminLTELogo.png" type = "image/x-icon">
</head>
<body class="hold-transition dark-mode sidebar-mini">
<div class="wrapper">
<?php include '../template/navbar.php';?>
<?php 
		if($_SESSION['level']=="Admin"){
		include '../template/side-bar-admin.php';
		}else{
			include '../template/side-bar.php';
		}

	?>
  <?php
		// include database connection file
		include_once("../../koneksi.php");
		
		// Check if form is submitted for user update, then redirect to homepage after update
		if(isset($_POST['update']))
		{	
			// $id = $_POST['id'];
			
			$name=$_POST['name'];
			// $username=$_POST['username'];
			// $password=$_POST['password'];
			$uid=$_POST['uid'];
				
			// update user data
			$result = mysqli_query($mysqli, "UPDATE user SET nama='$name',uid_zoom='$uid' WHERE username='".$_SESSION["username"]."'");
			
			// Redirect to homepage to display updated user in list
			header("Location: profile_user.php");
		}
	?>

	<?php

		$result = mysqli_query($mysqli, "SELECT * FROM user WHERE username='".$_SESSION["username"]."'");
		
		while($user_data = mysqli_fetch_array($result))
		{
			$name = $user_data['nama'];
			$username = $user_data['username'];
			$password = $user_data['password'];
			$uid = $user_data['uid_zoom'];

		}
	?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">
              <?php if($_SESSION['level']=="Admin") :?>
                <a href="../dashboard/halaman_admin.php">Dashboard</a>
              <?php else:?>
                <a href="../dashboard/halaman_pegwai.php">Dashboard</a>
              <?php endif?>
              </li>
              <li class="breadcrumb-item active">Profile Setting</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                  src="../../node_modules/admin-lte/dist/img/user2-160x160.jpg"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center"><?php echo $_SESSION['username']; ?></h3>

                <p class="text-muted text-center"><?php echo $_SESSION['level']; ?></p>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                    <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Profile Settings</a></li>
                    <div class="col">
                    <?php if($_SESSION['level']=="Admin") :?>
                     <a href="../dashboard/halaman_admin.php"class="btn btn-warning float-right mx-2"><i class="fas fa-arrow-left"></i>  Back</a>
                    <?php else :?> 
                      <a href="../dashboard/halaman_pegawai.php"class="btn btn-warning float-right mx-2"><i class="fas fa-arrow-left"></i>  Back</a>
                    <?php endif?>
                   </div>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="settings">
                    <form class="form-horizontal" name="update_user" method="post" action="profile_user.php">
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                          <input type="text" name="name" class="form-control" id="name" value=<?php echo $name;?>>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Username</label>
                        <div class="col-sm-10">
                          <input type="text" name="username" class="form-control" id="username" value=<?php echo $username;?> disabled="disabled" >
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                          <input type="text" name="password" class="form-control" id="password" value=<?php echo $password;?> disabled="disabled" >
                        </div>
                      </div>
                      <?php if($_SESSION['level']=="Admin") :?>
                        <div class="form-group row">
                          <label for="inputName2" class="col-sm-2 col-form-label">UID</label>
                          <div class="col-sm-10">
                            <input type="text" name="uid" class="form-control" id="uid" value=<?php echo $uid;?>>
                          </div>
                        </div>
                      <?php endif?>
                      <!-- <div class="form-group row">
                      <label for="exampleInputFile" class="col-sm-2 col-form-label">File input</label>
                        <div class="col-sm-10">
                          <div class="input-group">
                            <div class="custom-file">
                              <input type="file" class="custom-file-input" id="exampleInputFile">
                              <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                            </div>
                            <div class="input-group-append">
                              <span class="input-group-text">Upload</span>
                            </div>
                          </div>
                        </div>

                      </div> -->

                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-danger" name="update" value="Update">Update</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
    <!-- /.content -->
    <?php include '../template/footer_control.php';?>
  </div>

</div>
<!-- ./wrapper -->

</body>
</html>
