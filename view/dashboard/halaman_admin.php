<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard Admin</title>
  <link rel = "icon" href = "../../node_modules/admin-lte/dist/img/AdminLTELogo.png" type = "image/x-icon">
</head>
<body class="hold-transition dark-mode sidebar-mini">
	
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="../../node_modules/admin-lte/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>

  <?php include '../template/navbar.php';
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
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <?php
                if($_SESSION['level']=="Admin"){
                  echo "<li class='breadcrumb-item'><a href='halaman_admin.php'>Home</a></li>";
                }else{
                  echo "<li class='breadcrumb-item'><a href='halaman_pegawai.php'>Home</a></li>";
                }

              ?>
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
                  $result=mysqli_query($mysqli,"SELECT count(*) total_tlc_room FROM list_room_tlc");
                  $data=mysqli_fetch_assoc($result);
                ?>
                <h3><?php echo $data['total_tlc_room'];?></h3>


                <p>CH KRA</p>
              </div>
              <div class="icon">
                <i class="ion-ios-videocam"></i>
              </div>
              <a href="../table-room/table-ch-kra.php" class="small-box-footer">View <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <div class="row">
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-info"><i class="far fa-user"></i></span>

              <div class="info-box-content">
              <?php
                  $result=mysqli_query($mysqli,"SELECT count(*) AS total_admin FROM user WHERE level ='Admin'");
                  $data=mysqli_fetch_assoc($result);
                ?>
                <span class="info-box-text">Total Admin</span>
                <span class="info-box-number"><?php echo $data['total_admin'];?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-info"><i class="far fa-user"></i></span>

              <div class="info-box-content">
              <?php
                  $result=mysqli_query($mysqli,"SELECT count(*) AS total_pimpinan FROM user WHERE level ='Pimpinan'");
                  $data=mysqli_fetch_assoc($result);
                ?>
                <span class="info-box-text">Total User Pimpinan</span>
                <span class="info-box-number"><?php echo $data['total_pimpinan'];?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-info"><i class="far fa-user"></i></span>

              <div class="info-box-content">
              <?php
                  $result=mysqli_query($mysqli,"SELECT count(*) AS total_tlc FROM user WHERE level ='TLC'");
                  $data=mysqli_fetch_assoc($result);
                ?>
                <span class="info-box-text">Total User TLC</span>
                <span class="info-box-number"><?php echo $data['total_tlc'];?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-info"><i class="far fa-user"></i></span>

              <div class="info-box-content">
              <?php
                  $result=mysqli_query($mysqli,"SELECT count(*) AS total_tl FROM user WHERE level ='TL'");
                  $data=mysqli_fetch_assoc($result);
                ?>
                <span class="info-box-text">Total User TL</span>
                <span class="info-box-number"><?php echo $data['total_tl'];?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-info"><i class="far fa-user"></i></span>

              <div class="info-box-content">
              <?php
                  $result=mysqli_query($mysqli,"SELECT count(*) AS total_staff FROM user WHERE level ='Staff'");
                  $data=mysqli_fetch_assoc($result);
                ?>
                <span class="info-box-text">Total User Staff</span>
                <span class="info-box-number"><?php echo $data['total_staff'];?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
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