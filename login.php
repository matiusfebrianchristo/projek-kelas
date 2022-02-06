<?php
// Import config php
require "_config/function.php";

// Ketika button login di klik
if (isset($_POST["login"])) {

	// Mendefinisikan username dan password 
	$username = strtolower($_POST["username"]);
	$password = $_POST["password"];

	// Mencari data dalam database sesuai username dan password yang telah di inputkan
	$query = mysqli_query($conn, "SELECT * FROM user WHERE username='$username' AND password='$password' ");
	// Mengecek apakah data yang dicari ada atau tidak jika ada hasil dari variabel cek akal berupa angka 1 
	// angka 1 untuk true dan 0 untuk false brarti tidak ada
	$cek = mysqli_num_rows($query);

	// Jika data yang dicari ada atau variabel cek menghasilkan angka 1
	if ($cek > 0) {
		// Memulai session
		// Cache
		session_start();
		// membuat sesi dengan nama login yang berisi boolean true
		$_SESSION["login"] = true;
		// lempar ke index.php
		header("location: admin/index.php");
	} else {
		echo "<script>alert('Username atau Password salah')</script>";
	}
};

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- main CSS -->
	<link rel="stylesheet" type="text/css" href="assets/css/main.css">

	<style type="text/css" >
		input::-ms-reveal, input::-ms-clear {
        display: none!important;
    	}
	</style>

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.min.css">

	<!-- Fontawesome -->
	<link rel="stylesheet" type="text/css" href="assets/fontawesome/css/all.css">

	<title>Login</title>
</head>
<body>
	<!-- Main Page -->
	<div class="login-register container mt-3">   	
		<h1 class="text-center">Login</h1>

		<!-- ===================================================================== -->
		<!-- Form Input -->
		<form method="post" class="mt-5 m-auto form">
			<!-- Username -->
			<div class="mb-3">
				<label for="username" class="form-label">Username</label>
				<input type="text" name="username" class="form-control" id="username">
			</div>
			<!-- Password -->
			<div class="mb-3">
				<label for="password" class="form-label">Password</label>
				<div class="d-flex password">
					<input type="password" name="password" class="form-control d-flex" id="pasword">
					<i class="far fa-eye icon text-center align-self-center hide" onclick="hideShowPass()"></i>
					<i class="far fa-eye-slash  icon text-center align-self-center show d-none" onclick="hideShowPass()"></i>
				</div>
			</div>
			<!-- Button -->
			<div class="d-flex w-100">
				<!-- Button submit -->
				<button type="submit" name="login" class="btn btn-primary fw-bold rounded-12 me-auto">Login  <i class="fas fa-lock ml-1"></i></button>
				<!-- link menuju daftar.php -->
				<a href="daftar.php" class="btn btn-success fw-bold rounded-12 ms-auto">Daftar <i class="fas fa-user-plus ml-1"></i></a>
			</div>
		</form>

	</div>		



	<!-- Optional JavaScript; choose one of the two! -->
	<script src="assets/js/main.js" crossorigin="anonymous"></script>


	<!-- Option 1: Bootstrap Bundle with Popper -->
	<script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>