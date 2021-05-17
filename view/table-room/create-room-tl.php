<?php
	namespace App\Helpers;
	include_once("../../koneksi.php");
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Add New TL Room</title>
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
		$id = $_GET['id'];
		$room_info = mysqli_query($mysqli, "SELECT * FROM list_room_tlc WHERE id='".$_SESSION["id_origin"]."'");
			
		while($user_data = mysqli_fetch_array($room_info))
		{
		  $room_id = $user_data['id'];
		  $room_name = $user_data['name'];
		  $owner_username = $user_data['owner'];
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
								<?php echo "<a href='table-tlc.php?id=$room_id'class='btn btn-warning float-right mx-2'><i class='fas fa-arrow-left'></i>  Back</a>"?>
							</div>
						</div>
						<!-- /.card-header -->
						<!-- form start -->
						<form action="create-room-tl.php" method="post" name="form1">
							<div class="card-body">
								<div class="form-group">
									<label for="name">Room Name</label>
									<input type="text" name="name" class="form-control" id="name"
										placeholder="Enter Room Name" required>
								</div>
								<div class="form-group">
									<label>Team Leader</label>
									<select required class="form-control" name="tl_name" id="team_leader">
										<option value="" disabled selected>Pilih Team Leader</option>
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
								<div style="display:none" class="form-group">
									<label for="id_origin">id_origin</label>
									<input type="text" name="id_origin" class="form-control" id="id_origin"
										value="<?php echo $_SESSION['id_origin']; ?>">
								</div>
								<div style="display:none" class="form-group">
									<label for="owner">Owner</label>
									<input type="text" name="owner" class="form-control" id="owner"
										value="<?php echo $_SESSION['username']; ?>">
								</div>
								<div style="display:none" class="form-group">
									<label for="create_at">Create_at</label>
									<input type="date" name="create_at" class="form-control" id="create_at"
										value="<?php echo date('Y-m-d'); ?>">
								</div>
								<div style="display:none" class="form-group">
									<label for="update_at">Update_at</label>
									<input type="date" name="update_at" class="form-control" id="update_at"
										value="<?php echo date('Y-m-d'); ?>">
								</div>
							</div>
							<!-- /.card-body -->

							<div class="card-footer">
								<button type="submit" class="btn btn-primary" name="Submit" value="Add">Submit</button>
								<!-- <a href='buat-room.php'class='btn btn-success' >Create</a> -->
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

			class ZoomApiHelper{

				public static function createZoomMeeting($meetingConfig = []){
					$jwtToken = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhdWQiOm51bGwsImlzcyI6IldyUlpRVG1YUm4taDczSFlGaThxaHciLCJleHAiOjE2MjE4MzcwODQsImlhdCI6MTYyMTIzMjI4NX0.JSrkJqPEHcAoEQbK9YAjgLH5Fvyq5NVIiAARj-PX-Ds';
					
					$requestBody = [
						'topic'			=> $meetingConfig['topic'] 		?? 'Ruang Meeting',
						'type'			=> $meetingConfig['type'] 		?? 2,
						'start_time'	=> $meetingConfig['start_time']	?? date('Y-m-dTh:i:00').'Z',
						'duration'		=> $meetingConfig['duration'] 	?? 30,
						'password'		=> $meetingConfig['password'] 	?? mt_rand(),
						'timezone'		=> 'Africa/Cairo',
						'agenda'		=> 'PHP Session',
						'settings'		=> [
							'host_video'			=> false,
							'participant_video'		=> true,
							'cn_meeting'			=> false,
							'in_meeting'			=> false,
							'join_before_host'		=> true,
							'mute_upon_entry'		=> true,
							'watermark'				=> false,
							'use_pmi'				=> false,
							'approval_type'			=> 1,
							'registration_type'		=> 1,
							'audio'					=> 'voip',
							'auto_recording'		=> 'none',
							'waiting_room'			=> false
						]
					];

					// $zoom_id = mysqli_query($mysqli, "SELECT * FROM user WHERE username='".$_SESSION["username"]."'");
					// $data = mysqli_fetch_assoc($zoom_id);
					// $zoomUserId = 'pVUInY2KSs-rZz41D1zCTg' ;
					$zoomUserId=$_SESSION['uid_zoom'];
	
					$curl = curl_init();
					curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0); // Skip SSL Verification
					curl_setopt_array($curl, array(
					CURLOPT_URL => "https://api.zoom.us/v2/users/".$zoomUserId."/meetings",
					CURLOPT_RETURNTRANSFER => true,
					CURLOPT_ENCODING => "",
					CURLOPT_MAXREDIRS => 10,
					CURLOPT_SSL_VERIFYHOST => 0,
					CURLOPT_SSL_VERIFYPEER => 0,
					CURLOPT_TIMEOUT => 30,
					CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
					CURLOPT_CUSTOMREQUEST => "POST",
					CURLOPT_POSTFIELDS => json_encode($requestBody),
					CURLOPT_HTTPHEADER => array(
						"Authorization: Bearer ".$jwtToken,
						"Content-Type: application/json",
						"cache-control: no-cache"
					),
					));
					
					$response = curl_exec($curl);
					return $response;
					$err = curl_error($curl);
	
					curl_close($curl);
	
					if ($err) {
					return [
						'success' 	=> false, 
						'msg' 		=> 'cURL Error #:' . $err,
						'response' 	=> ''
					];
					} else {
					return [
						'success' 	=> true,
						'msg' 		=> 'success',
						'response' 	=> json_decode($response)
					];
					}
					
				}
				} 
				
	
			$zoom2 = strval(ZoomApiHelper::createZoomMeeting());
			// get zoom info
			$id_meeting = explode(",",$zoom2);
			$id_meeting2 = explode(":", $id_meeting[1]);
			$password = explode(",",$zoom2);
			$password2 = explode(":", $password[17]);
			$password3 = explode('"', $password2[1]);

			// input-normal
            $id_origin = $_POST['id_origin'];
            $name = $_POST['name'];
            $tl_name = $_POST['tl_name'];
            $meeting_id = $_POST['meeting_id'];
            $meeting_password = $_POST['meeting_password'];
			$owner = $_POST['owner'];
			$create_at = $_POST['create_at'];
			$update_at = $_POST['update_at'];

			$result = mysqli_query($mysqli, "SELECT * FROM list_room_tl WHERE owner='".$_SESSION["username"]."' AND id_origin='".$_SESSION["id_origin"]."'");
			$cek = mysqli_num_rows($result);
			if($cek > 0){        
				$result = mysqli_query($mysqli, "UPDATE list_room_tl SET id_origin='$id_origin',name='$name',tl_name='$tl_name',meeting_id='$id_meeting2[1]', meeting_password='$password3[1]' WHERE owner='".$_SESSION["username"]."' AND id_origin='".$_SESSION["id_origin"]."'");
				
				if ($result) {
					header("Location: table-tlc.php?id=".$_SESSION['id_origin']."&notif=3");
					// exit;
				}
				else {
					header("Location: table-tlc.php?id=".$_SESSION['id_origin']."&notif=4");
					// exit;
				}
			}else{
            	// Insert user data into table
            	$result = mysqli_query($mysqli, "INSERT INTO list_room_tl(id_origin,name,tl_name,meeting_id,meeting_password,owner,create_at,update_at) VALUES('$id_origin','$name','$tl_name','$id_meeting2[1]','$password3[1]','$owner','$create_at','$update_at')");
				if ($result) {
					header("Location: table-tlc.php?id=".$_SESSION['id_origin']."&notif=1");
					// exit;
				}
				else {
					header("Location: table-tlc.php?id=".$_SESSION['id_origin']."&notif=2");
					// exit;
				}
			}
        }
    ?>
</body>

</html>