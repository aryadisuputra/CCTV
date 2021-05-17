<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Table List Room TLC</title>
  <link rel = "icon" href = "../../node_modules/admin-lte/dist/img/AdminLTELogo.png" type = "image/x-icon">
</head>
<body class="hold-transition dark-mode sidebar-mini">
<?php ob_start();?>
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
    include_once("../../koneksi.php");
    $id = $_GET['id'];
    if($id==""){
      header("Location: ../template/error_404.php");
    }
    if (!empty($_SESSION['id_origin'])){
      if($_SESSION['id_origin']!==$id){
        $_SESSION['id_origin']=$id;
      }else{
        // $id = $_GET['id'];
        // $_SESSION['id_origin']=$id;
      }
    }else{
      $_SESSION['id_origin']=$id;
    }
    $room_info = mysqli_query($mysqli, "SELECT * FROM list_room_tlc WHERE id='".$_SESSION["id_origin"]."'");
        
    while($user_data = mysqli_fetch_array($room_info))
    {
      $room_id = $user_data['id'];
      $room_name = $user_data['name'];
      $owner_username = $user_data['owner'];
    }
    if($_SESSION['level']=="Admin"){
    // Fetch all users data from database
    // $owner = mysqli_query($mysqli, "SELECT * FROM user WHERE username='".$_SESSION["username"]."'");
      $result = mysqli_query($mysqli, "SELECT * FROM list_room_tl WHERE id_origin='".$_SESSION["id_origin"]."' ORDER BY id ASC");
    }else if($_SESSION['level']=="Staff"){
      // $staff_data = mysqli_query($mysqli, "SELECT * FROM user WHERE username='".$_SESSION["username"]."'");
      // $staff_status = mysqli_fetch_assoc($staff_data);
      // if($staff_status['status']=="Approved"){
      //   $result = mysqli_query($mysqli, "SELECT * FROM list_room_tl WHERE id_origin='".$_SESSION["id_origin"]."' AND owner='".$_SESSION["team_leader"]."' ORDER BY id ASC");
      // }else{

      // }
      $result = mysqli_query($mysqli, "SELECT * FROM list_room_tl WHERE id_origin='".$_SESSION["id_origin"]."' AND owner='".$_SESSION["team_leader"]."' ORDER BY id ASC");
    }else{
      $result = mysqli_query($mysqli, "SELECT * FROM list_room_tl WHERE id_origin='".$_SESSION["id_origin"]."' AND owner='".$_SESSION["username"]."' ORDER BY id ASC");
    }
  ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>List Entry Room <?php echo $room_name?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <?php	if($_SESSION['level']=="Admin"||$_SESSION['level']=="Pimpinan"): ?>
                  <li class="breadcrumb-item"><a href="../dashboard/halaman_admin.php">Dashboard</a></li>
              <?php	else: ?>
                <li class="breadcrumb-item"><a href="../dashboard/halaman_pegawai.php">Dashboard</a></li>
              <?php endif;?>
              <li class="breadcrumb-item active">List Entry</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

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
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <div class="row">
                  <div class="col">          
                    <h3 class="card-title">List Entry Room <?php echo $owner_username?></h3></div>
                    <div class="col">
                      <a href="table-ch-kra.php"class="btn btn-warning float-right mx-2"><i class="fas fa-arrow-left"></i>  Back</a>
                      <?php if($_SESSION['level']=="Admin"):?>
                          <a href="create-room-tl.php?id=$room_id"class="btn btn-success float-right"><i class="fas fa-plus-circle"></i>  Add New Entry</a>
                      <?php endif?>
                    </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>No</th>
                    <!-- <th>ID</th> -->
                    <th>Name</th>
                    <th>Team Leader</th>
                    <th class="d-flex">Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php $counter = 1;?>   
                  <?php while($user_data = mysqli_fetch_array($result)) : ?>    

                       <th> <?php echo $counter ?></th>
                       <?php $counter++;?>   
                       <th><?php echo $user_data['name']; ?></th>
                       <th><?php echo $user_data['tl_name']; ?></th>
                     
                        <th style='width: 15%' class='text-centered'>
                         <a href="room-meeting.php?id=<?php echo $user_data['id'] ?>"class="btn btn-success" ><i class="far fa-eye"></i></a>
                        <?php if($_SESSION['level']=="Admin") :?>
                          <a href="edit-room-tl.php?id=<?php echo $user_data['id'] ?>" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                          <a type="button" class="btn btn-danger" href="delete-room-tl.php?id=<?php echo $user_data['id'] ?>"><i class="fas fa-trash-alt"></i></a>
                                       
                        </th>      
                        <?php endif ?>     
                        </tr>
                  <?php endwhile?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include '../template/footer_control.php';?>
</div>
<!-- ./wrapper -->
</body>
</html>
