<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login</title>

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
  <!-- <link rel="stylesheet" href="node_modules/admin-lte/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css"> -->
  <link rel = "icon" href = "../../node_modules/admin-lte/dist/img/AdminLTELogo.png" type = "image/x-icon">

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

		.form-label-group>input,
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
		.form-label-group input::-ms-input-placeholder {
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
		.form-label-group input:-ms-input-placeholder {
			color: #777;
		}
		}

  </style>
</head>
<body>
	<div class="container-fluid">
		<div class="row no-gutter">
			<div class="d-none d-md-flex col-md-4 col-lg-6 bg-image"></div>
			<div class="col-md-8 col-lg-6">
			<div class="login d-flex align-items-center py-5">
				<div class="container">
				<div class="row">
					<div class="col-md-9 col-lg-8 mx-auto">
					<h3 class="login-heading mb-4">Welcome back!</h3>
					<form action="cek_login.php" method="post">
						<div class="container">
							<?php 
								if(isset($_GET['notif'])){
									if($_GET['notif']=="fail"){
										echo" <div class='alert alert-danger alert-dismissible'><i class='fas fa-exclamation-circle'></i>
												<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
												<strong>Failed!</strong> Username atau password salah.
											 </div>";
									}else if ($_GET['notif']=="success"){
										echo" <div class='alert alert-success alert-dismissible'><i class='fas fa-exclamation-circle'></i>
										<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
										<strong>Success!</strong> Registrasi Berhasil, Silahkan Log in.
									 </div>";
									}else{
										echo" <div class='alert alert-danger alert-dismissible'><i class='fas fa-exclamation-circle'></i>
										<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
										<strong>Failed!</strong> Registrasi Gagal.
									 </div>";
									}
								}
							?>
						</div>
						<div class="form-label-group">
						<!-- <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus> -->
						<input type="text"  id="inputUsername" name="username" class="form-control" placeholder="Enter your username" required="required">
						<label for="inputUsername">Username</label>
						</div>

						<div class="form-label-group">
						<!-- <input type="password" id="inputPassword" class="form-control" placeholder="Password" required> -->
						<input type="password"  id="inputPassword" name="password" class="form-control" placeholder="Enter your password" required="required">
						<label for="inputPassword">Password</label>
						</div>

						<!-- <div class="custom-control custom-checkbox mb-3">
						<input type="checkbox" class="custom-control-input" id="customCheck1">
						<label class="custom-control-label" for="customCheck1">Remember password</label>
						</div> -->
						<button class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2" type="submit">Log in</button>
						<a href="registration.php"class="btn btn-lg btn-outline-primary btn-block btn-login text-uppercase font-weight-bold mb-2" >Sign Up</a>
						<div class="text-center">
						<!-- <a class="small" href="#">Forgot password?</a></div> -->
					</form>
					</div>
				</div>
				</div>
			</div>
			</div>
		</div>
	</div>
	<script src="node_modules/admin-lte/plugins/jquery/jquery.min.js"></script>
	<script src="node_modules/admin-lte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- <script src="/node_modules/admin-lte/plugins/sweetalert2/sweetalert2.min.js"></script>
	<script>

	$(function() {
		var Toast = Swal.mixin({
		toast: true,
		position: 'top-end',
		showConfirmButton: false,
		timer: 3000
		});

		$('.swalDefaultError').click(function() {
		Toast.fire({
			icon: 'error',
			title: ' Username atau password salah.'
		})
		});
	});
	</script> -->
</body>
</html>

