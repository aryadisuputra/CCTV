<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Room Meeting</title>
    <style>
        #zmmtg-root {
            display: none;
        }
    </style>
      <link rel = "icon" href = "../../node_modules/admin-lte/dist/img/AdminLTELogo.png" type = "image/x-icon">
</head>

<body class="hold-transition dark-mode sidebar-mini">
    <div class="wrapper">
        <?php include '../template/navbar.php'; ?>
        <?php
        if ($_SESSION['level'] == "Admin") {
            include '../template/side-bar-admin.php';
        } else {
            include '../template/side-bar.php';
        }

        ?>
        <?php
        // Create database connection using config file
        include_once("../../koneksi.php");
        $id = $_GET['id'];
        if($id==""){
            header("Location: ../template/error_404.php");
          }
        $room_info = mysqli_query($mysqli, "SELECT * FROM list_room_tl WHERE id=$id");

        while ($user_data = mysqli_fetch_array($room_info)) {
            $room_name = $user_data['name'];
            $owner_username = $user_data['owner'];
            $meeting_id = $user_data['meeting_id'];
            $meeting_password = $user_data['meeting_password'];
            $id_origin_room = $user_data['id_origin'];
        }
        $result = mysqli_query($mysqli, "SELECT * FROM user WHERE team_leader='$owner_username' ORDER BY id ASC");
        ?>

        <?php
        // Display selected user data based on id
        // Getting id from url


        // Fetech user data based on id

        ?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="card card-warning " hidden>
                        <div class="card-header">
                            <h3 class="card-title">Input Room Info</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form id="meeting_form" method="post">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="display_name">username</label>
                                    <input type="text" name="display_name" id="display_name" class="form-control"
                                        value=<?php echo $_SESSION['username']; ?>>
                                </div>
                                <div class="form-group">
                                    <label for="meeting_number">meeting_id</label>
                                    <input type="text" name="meeting_number" id="meeting_number" class="form-control"
                                        value=<?php echo $meeting_id; ?>>
                                </div>
                                <div class="form-group">
                                    <label for="team_leader">meeting_password</label>
                                    <input type="text" name="meeting_email" id="meeting_email" class="form-control"
                                        value=<?php echo $meeting_password; ?>>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <!-- <div class="card-footer">
								<button type="submit" class="btn btn-primary" name="update" value="Update">Submit</button>
							</div> -->
                        </form>
                    </div>
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>List Entry Room <?php echo $room_name ?></h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <?php	if($_SESSION['level']=="Admin"||$_SESSION['level']=="Pimpinan"): ?>
                                <li class="breadcrumb-item"><a href="../dashboard/halaman_admin.php">Dashboard</a></li>
                                <?php	else: ?>
                                <li class="breadcrumb-item"><a href="../dashboard/halaman_pegawai.php">Dashboard</a>
                                </li>
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
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col">
                                            <h3 class="card-title">List Entry</h3>
                                        </div>
                                        <div class="col">
                                            <a href="table-tlc.php?id=<?php echo "$id_origin_room"; ?>"
                                                class="btn btn-warning float-right mx-2"><i
                                                    class="fas fa-arrow-left"></i> Back</a>
                                            <a href='javascript:void(0)' class='btn btn-primary float-right mr-2'
                                                id="join_meeting" data-meeting-id="<?php echo $meeting_id ?>"
                                                data-meeting-password="<?php echo $meeting_password ?>"
                                                data-email="<?php echo 'any@gmail.com' ?>"
                                                data-name="<?php echo $_SESSION['username'] ?>"><i
                                                    class='fas fa-plus-circle'></i> Join Meeting</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example2" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Name</th>
                                                <th>Position</th>
                                                <!-- <th>Status</th> -->
                                                <?php if ($_SESSION['level'] == "Admin" ||$_SESSION['level'] == "tl") : ?>
                                                <th class="d-flex">Action</th>
                                                <?php endif; ?>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $counter = 1;?>
                                            <?php while ($user_data = mysqli_fetch_array($result)) : ?>
                                            <tr>

                                                <th> <?php echo $counter ?></th>
                                                <?php $counter++?>
                                                <th><?php echo $user_data['nama'] ?></th>
                                                <th><?php echo $user_data['level'] ?></th>
                                                <?php if ($_SESSION['level'] == "Admin" ||$_SESSION['level'] == "tl") : ?>
                                                <th style='width: 15%' class='text-centered'>
                                                    <!-- <a href='table-tlc.php' class='btn btn-success'><i class='far fa-eye'></i></a> -->

                                                    <a href='edit-room-tlc.php?id=<?php echo $user_data['id'] ?>'
                                                        class='btn btn-warning'><i class='fas fa-edit'></i></a>
                                                    <a data-toggle='modal' data-target='#modal-delete'
                                                        class='btn btn-danger'><i class='fas fa-trash-alt'></i></a>
                                                    <?php endif; ?>
                                                </th>
                                                <div class='modal fade' id='modal-delete' tabindex='-1' role='dialog'
                                                    aria-labelledby='modal-deleteLabel' aria-hidden='true'>
                                                    <div class='modal-dialog'>
                                                        <div class='modal-content'>
                                                            <div class='modal-header'>
                                                                <h4 class='modal-title text-center'>Attention</h4>
                                                            </div>
                                                            <div class='modal-body'>
                                                                <p class='text-center'>Do you wish to delete this entry
                                                                    ?</p>
                                                            </div>
                                                            <div class='modal-footer justify-content-between'>
                                                                <button type='button' class='btn btn-warning'
                                                                    data-dismiss='modal'>Cancel</button>
                                                                <a type='button' class='btn btn-danger'
                                                                    href='delete-room-tlc.php?id=$user_data[id]'>Delete</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </tr>
                                            <?php endwhile; ?>
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
        <?php include '../template/footer_control.php'; ?>

        <script src="/static/room-meeting.min.js"></script>
    </div>
    <!-- ./wrapper -->
</body>

</html>