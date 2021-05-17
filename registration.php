<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Registration</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="node_modules/admin-lte/plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="node_modules/admin-lte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="node_modules/admin-lte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="node_modules/admin-lte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="node_modules/admin-lte/dist/css/adminlte.min.css">
  <link rel = "icon" href = "../../node_modules/admin-lte/dist/img/AdminLTELogo.png" type = "image/x-icon">

  <script src="jquery.js"></script>
	<script>
	$(document).ready(function(){
		$('#inputUsername').blur(function(){
			$('#pesan').html('<img style="margin-left:10px; width:10px" src="loading.gif">');
			var username = $(this).val();

			$.ajax({
				type	: 'POST',
				url 	: 'proses.php',
				data 	: 'username='+username,
				success	: function(data){
					$('#pesan').html(data);
				}
			})

		});
	});
	</script>

  <style>
		:root {
		--input-padding-x: 1.5rem;
		--input-padding-y: 0.75rem;
		}

		.login,
		.image {
		min-height: 100vh;
		}
		.bg-image {
		background-image: url('https://source.unsplash.com/WEQbe2jBg40/600x1200');
		background-size: cover;
		background-position: center;
		}

		.login-heading {
		font-weight: 300;
		}

		.btn-login {
		font-size: 0.9rem;
		letter-spacing: 0.05rem;
		padding: 0.75rem 1rem;
		border-radius: 2rem;
		}

		.form-label-group {
		position: relative;
		margin-bottom: 1rem;
		}

		.form-label-group>input,.form-label-group>select,
		.form-label-group>label {
		padding: var(--input-padding-y) var(--input-padding-x);
		height: auto;
		border-radius: 2rem;
		}

		.form-label-group>label {
		position: absolute;
		top: 0;
		left: 0;
		display: block;
		width: 100%;
		margin-bottom: 0;
		/* Override default `<label>` margin */
		line-height: 1.5;
		color: #495057;
		cursor: text;
		/* Match the input under the label */
		border: 1px solid transparent;
		border-radius: .25rem;
		transition: all .1s ease-in-out;
		}

		.form-label-group input::-webkit-input-placeholder {
		color: transparent;
		}

		.form-label-group input:-ms-input-placeholder {
		color: transparent;
		}

		.form-label-group input::-ms-input-placeholder {
		color: transparent;
		}

		.form-label-group input::-moz-placeholder {
		color: transparent;
		}

		.form-label-group input::placeholder {
		color: transparent;
		}


		.form-label-group input:not(:placeholder-shown) {
		padding-top: calc(var(--input-padding-y) + var(--input-padding-y) * (2 / 3));
		padding-bottom: calc(var(--input-padding-y) / 3);
		}

		.form-label-group input:not(:placeholder-shown)~label {
		padding-top: calc(var(--input-padding-y) / 3);
		padding-bottom: calc(var(--input-padding-y) / 3);
		font-size: 12px;
		color: #777;
		}
		


		/* Fallback for Edge
		-------------------------------------------------- */

		@supports (-ms-ime-align: auto) {
		.form-label-group>label {
			display: none;
		}
		.form-label-group input::-ms-input-placeholder, .form-label-group select::-ms-select-placeholder {
			color: #777;
		}
		}

		/* Fallback for IE
		-------------------------------------------------- */

		@media all and (-ms-high-contrast: none),
		(-ms-high-contrast: active) {
		.form-label-group>label {
			display: none;
		}
		.form-label-group input:-ms-input-placeholder, 	.form-label-group select:-ms-input-placeholder {
			color: #777;
		}
		}

  </style>
</head>
<body>
<?php ob_start(); ?>
<?php 	include_once("koneksi.php"); ?>
	<div class="container-fluid">
		<div class="row no-gutter">
			<div class="d-none d-md-flex col-md-4 col-lg-6 bg-image"></div>
			<div class="col-md-8 col-lg-6">
			<div class="login d-flex align-items-center py-5">
				<div class="container">
				<div class="row">
					<div class="col-md-9 col-lg-8 mx-auto">
					<h3 class="login-heading mb-4">Registration</h3>
					<form action="registration.php" method="post" name="form2">
						<div class="form-label-group">
							<input type="text"  id="inputName" name="name" class="form-control" placeholder="Enter your Name" required="required">
							<label for="inputName">Name</label>
						</div>
						<div class="form-label-group">
							<input type="text"  id="inputUsername" name="username" class="form-control" placeholder="Enter your username" required="required">
							<label for="inputUsername">Username</label>
							<span id="pesan"></span>
						</div>
						<div class="form-label-group" hidden>
							<input type="text"  id="inputRole" name="role" class="form-control" placeholder="Enter your username" required="required" value="Staff">
							<label for="inputRole">role</label>
						</div>
						<div class="form-label-group">
							<input type="password"  id="inputPassword" name="password" class="form-control" placeholder="Enter your password" required="required">
							<label for="inputPassword">Password</label>
						</div>
						<!-- <div class="form-label-group">
							<select class="form-control" id="inputRole" name="role" placeholder="Choose your role" required="required">
								<option style="font-weight: bold;"disabled selected hidden>Choose your Role</option>
								<option value="Admin">Admin Super</option>
								<option value="Pimpinan">Pimpinan</option>
								<option value="TLC">TLC</option>
								<option value="TL">TL</option>
								<option value="Staff">Staff</option>
							</select>
						</div> -->
						<!-- <div class="form-label-group">
							<input type="text"  id="inputUidzoom" name="uid" class="form-control" placeholder="Enter your UID">
							<label for="inputUidzoom">UID</label>
						</div> -->
						<button class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2" type="submit" name="Submit" value="Add">Sign Up</button>

					</form>
					</div>
				</div>
				</div>
			</div>
			</div>
		</div>
	</div>

	<?php
		// Check If form submitted, insert form data into users table.
		if(isset($_POST['Submit'])) {
			$name = $_POST['name'];
			$username = $_POST['username'];
			$password = $_POST['password'];
			$role = $_POST['role'];
			$uid = $_POST['uid'];
		
			// include database connection file
				
			$result = mysqli_query($mysqli, "INSERT INTO user(nama,username,password,level,uid_zoom) VALUES('$name','$username','$password','$role','$uid')");
			if($result){
				header("Location: index.php?notif=success");
			}else{
				header("Location: index.php?notif=gagal");
			}

			exit();
		}
	?>

</body>
</html>

