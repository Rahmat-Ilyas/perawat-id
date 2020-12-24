<?php 
require('config.php');
if (isset($_COOKIE['login'])) {
	$pass_c = $_COOKIE['login'];
	$pass = str_replace('.', '_', $pass_c);
	if (isset($_COOKIE[$pass])){
		$_SESSION['login'] = $pass_c;
		$_SESSION[$pass_c] = $pass_c;
	}
}

if (isset($_SESSION['login'])) {
	$pass_s = $_SESSION['login'];
	if (isset($_SESSION[$pass_s])) {
		header("location: index.php");
		exit();
	}
}

$error = false;
if (isset($_POST['login'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	if (isset($_POST['remember'])) $remember = $_POST['remember'];
	else $remember = false;
	
	$cek = mysqli_query($conn, "SELECT * FROM tb_admin WHERE username = '$username'");
	$get = mysqli_fetch_assoc($cek);
	$get_pass = $get['password'];

	if (password_verify($password, $get['password'])) {
		$_SESSION['login'] = $get_pass;
		$_SESSION[$get_pass] = $get_pass;
		$_SESSION['this'] = $get['id'];

		if ($remember == true) {
			setcookie('login', $get_pass, time()+172800);
			setcookie($get_pass, $get_pass, time()+172800);
			setcookie('this', $get['id'], time()+172800);
		}

		header("location: index.php");
		exit();
	}
	$error = true;
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Sign In - Admin Perawat.ID</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
	<meta content="Coderthemes" name="author" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />

	<!-- App favicon -->
	<link rel="shortcut icon" href="assets/images/favicon.png">

	<!-- App css -->
	<link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/metismenu.min.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/style.css" rel="stylesheet" type="text/css" />

	<script src="assets/js/modernizr.min.js"></script>

</head>


<body class="bg-accpunt-pages">
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-12">

					<div class="wrapper-page">

						<div class="account-pages">
							<div class="account-box">
								<div class="account-logo-box">
									<h2 class="text-uppercase text-center">
										<a href="index.html" class="text-success">
											<img src="assets/images/logo_prid.png" alt="" height="60">
										</a>
									</h2>
									<h4 class="text-center mt-3">Sign In to Admin</h4>
								</div>
								<div class="account-content">
									<form class="form-horizontal" action="" method="POST">

										<div class="form-group m-b-20 row">
											<div class="col-12">
												<label for="emailaddress">Username</label>
												<input class="form-control" type="text" id="emailaddress" required="" name="username" placeholder="Enter your email">
											</div>
										</div>

										<div class="form-group row m-b-20">
											<div class="col-12">
												<label for="password">Password</label>
												<input class="form-control" type="password" required="" id="password" name="password" placeholder="Enter your password">
											</div>
										</div>

										<div class="form-group">
											<div class="col-xs-12">
												<?php if ($error == true): ?>
													<label class="text-danger">Uername atau password salah</label>
												<?php endif ?>
											</div>
										</div>

										<div class="form-group row m-b-20">
											<div class="col-12">

												<div class="checkbox checkbox-success">
													<input id="remember" type="checkbox" name="remember">
													<label for="remember">
														Remember me
													</label>
												</div>

											</div>
										</div>

										<div class="form-group row text-center m-t-10">
											<div class="col-12">
												<button class="btn btn-block btn-gradient waves-effect waves-light" type="submit" name="login">Sign In</button>
											</div>
										</div> 
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- jQuery  -->
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/metisMenu.min.js"></script>
	<script src="assets/js/waves.js"></script>
	<script src="assets/js/jquery.slimscroll.js"></script>

	<!-- App js -->
	<script src="assets/js/jquery.core.js"></script>
	<script src="assets/js/jquery.app.js"></script>

</body>
</html>