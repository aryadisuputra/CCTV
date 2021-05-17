<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard Staff</title>
</head>
<body class="hold-transition dark-mode sidebar-mini">
	
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="../../node_modules/admin-lte/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>

  <?php include '../template/navbar.php';
    include_once("../../koneksi.php");
    $user_info=mysqli_query($mysqli,"SELECT * FROM user WHERE username='".$_SESSION["username"]."'");
    $user_data=mysqli_fetch_assoc($user_info);
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
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <?php
                  if($user_data['level']=="Staff"){
                    $result=mysqli_query($mysqli,"SELECT count(*) tl_room FROM list_room_tl WHERE owner='".$user_data["team_leader"]."'");
                    // $result=mysqli_query($mysqli,"SELECT count(*) tl_room FROM list_room_tl WHERE owner='".$_SESSION["team_leader"]."'");
                    $data=mysqli_fetch_assoc($result);
                  }else{
                    $result=mysqli_query($mysqli,"SELECT count(*) tl_room FROM list_room_tl WHERE owner='".$user_data["username"]."'");
                    $data=mysqli_fetch_assoc($result);
                  }
                ?>
                <h3><?php echo $data['tl_room'];?></h3>

                <p>Meeting</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div> 
              <a href="../table-room/table-ch-kra.php" class="small-box-footer">View <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->

        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
  <!-- /.content-wrapper -->
  <?php include '../template/footer_control.php';?>
</div>
<!-- ./wrapper -->
</body>
</html>