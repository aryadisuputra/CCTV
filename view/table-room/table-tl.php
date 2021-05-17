<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Table TL</title>
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
  include_once("../../koneksi.php");
  $id = $_GET['id'];
  if($id==""){
    header("Location: ../template/error_404.php");
    exit();
  }
  if (!empty($_SESSION['id_origin'])){
    if($_SESSION['id_origin']!==$_GET['id']){

      $_SESSION['id_origin']=$id;
    }else{
      // $id = $_GET['id'];
      // $_SESSION['id_origin']=$id;
    }
  }else{
    $id = $_GET['id'];
    $_SESSION['id_origin']=$id;
  }
  $room_info = mysqli_query($mysqli, "SELECT * FROM list_room_tl WHERE id='".$_SESSION["id_origin"]."'");
        
  while($user_data = mysqli_fetch_array($room_info))
  {
    $room_id = $user_data['id'];
    $room_name = $user_data['name'];
    $owner_username = $user_data['owner'];
  }
  if($_SESSION['level']=="Admin"){
    // Fetch all users data from database
    // $owner = mysqli_query($mysqli, "SELECT * FROM user WHERE username='".$_SESSION["username"]."'");
    // $owner_data=mysqli_fetch_assoc($owner);

    $result = mysqli_query($mysqli, "SELECT * FROM list_room_tl WHERE id_origin='".$_SESSION["id_origin"]."' ORDER BY id DESC");
}else{
  $result = mysqli_query($mysqli, "SELECT * FROM list_room_tl WHERE owner='".$_SESSION["username"]."'ORDER BY id DESC");
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
              <?php
              	if($_SESSION['level']=="Admin"){
                  echo  "<li class='breadcrumb-item'><a href='../dashboard/halaman_admin.php'>Dashboard</a></li>";
                }else if($_SESSION['level']=="Pimpinan"){
                  echo  "<li class='breadcrumb-item'><a href='../dashboard/halaman_pimpinan.php'>Dashboard</a></li>";
                }else if($_SESSION['level']=="TLC"){
                  echo  "<li class='breadcrumb-item'><a href='../dashboard/halaman_tlc.php'>Dashboard</a></li>";
                }else if($_SESSION['level']=="TL"){
                  echo  "<li class='breadcrumb-item'><a href='../dashboard/halaman_tl.php'>Dashboard</a></li>";
                }else{
                  echo  "<li class='breadcrumb-item'><a href='../dashboard/halaman_pegawai.php'>Dashboard</a></li>";
                }
              ?>
              <li class="breadcrumb-item active">List Entry</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <div class="row">
                  <div class="col">          
                    <h3 class="card-title">List Entry</h3></div>
                  <div class="col">
                    <?php
                      if($_SESSION['level']=="Admin"){
                        echo  "  <a href='table-tlc.php'class='btn btn-warning float-right mx-2'><i class='fas fa-arrow-left'></i>  Back</a>";
                      }else if($_SESSION['level']=="Pimpinan"){
                        echo  "  <a href='table-tlc.php'class='btn btn-warning float-right mx-2'><i class='fas fa-arrow-left'></i>  Back</a>";
                      }else if($_SESSION['level']=="TLC"){
                        echo  "  <a href='table-tlc.php'class='btn btn-warning float-right mx-2'><i class='fas fa-arrow-left'></i>  Back</a>";
                      }else if($_SESSION['level']=="TL"){
                        // echo  "  <a href='../dashboard/halaman_tl.php'class='btn btn-warning float-right mx-2'><i class='fas fa-arrow-left'></i>  Back</a>";
                      }else{
                        // echo  "  <a href='../dashboard/halaman_pegawai.php'class='btn btn-warning float-right mx-2'><i class='fas fa-arrow-left'></i>  Back</a>";
                      }
                    ?>
                    <?php
                      if($_SESSION['level']=="Admin"){
                        echo  "   <a href='create-room-tl.php?id=$room_id'class='btn btn-success float-right'><i class='fas fa-plus-circle'></i>  Add New Entry</a>";
                      }else{
                      }
                    ?>
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
                    <th>Create On</th>
                    <!-- <th>Status</th> -->
                    <th class="d-flex">Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php  
                    $counter=1;
                        while($user_data = mysqli_fetch_array($result)) {         
                          echo "<th>$counter</th>";
                          $counter++;
                          // echo "<th>".$user_data['id']."</th>";
                          echo "<th>".$user_data['name']."</th>";
                          echo "<th>".$user_data['create_at']."</th>";
                          // echo "<th>".$user_data['count']."</th>";
                      
                          echo "<th style='width: 15%' class='text-centered'>
                          <a href='room-meeting.php?id=$user_data[id]'class='btn btn-success' ><i class='far fa-eye'></i></a>
                          ";
                          
                          if($_SESSION['level']=="Admin"||"tl"){ 
                          echo"<a href='edit-room-tl.php?id=$user_data[id]' class='btn btn-warning'><i class='fas fa-edit'></i></a> 
                          <a data-toggle='modal' data-target='#modal-delete' class='btn btn-danger'><i class='fas fa-trash-alt'></i></a></th>
                          
              
                            <div class='modal fade' id='modal-delete' tabindex='-1' role='dialog' aria-labelledby='modal-deleteLabel' aria-hidden='true'>
                              <div class='modal-dialog'>
                                <div class='modal-content'>
                                  <div class='modal-header'>
                                    <h4 class='modal-title text-center'>Attention</h4>
                                  </div>
                                  <div class='modal-body'>
                                    <p class='text-center'>Do you wish to delete this entry ?</p>
                                  </div>
                                  <div class='modal-footer justify-content-between'>
                                    <button type='button' class='btn btn-warning' data-dismiss='modal'>Cancel</button>
                                    <a type='button' class='btn btn-danger' href='delete-room-tlc.php?id=$user_data[id]'>Delete</a>
                                  </div>
                                </div>
                  
                              </div>
              
                            </div>
          
                          </tr>";
                          }else{

                          }     

                        }
                      ?>
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
  <?php include '../template/footer_control.php';?>
</div>
<!-- ./wrapper -->
</body>
</html>
