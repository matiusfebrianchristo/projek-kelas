<?php

require "_config/function.php";

if (isset($_POST["daftar"])) {
	if ($_POST['password'] != $_POST['confirmation']) {
		echo "<script>alert('Komfirmasi password salah')</script>";
	} else {
		// var_dump(strlen($_POST["password"])); 
		if ( addUser($_POST) > 0 ) {
			echo "<script> 
				alert('User berhasil ditambahkan') ;
				document.location.href = 'login.php';
			</script>";

		} else {
			echo mysqli_connection_error($conn);
		}
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
	<style type="text/css" scoped>
		input::-ms-reveal, input::-ms-clear {
        display: none!important;
    	}
	</style>

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.min.css">

	<!-- Fontawesome -->
	<link rel="stylesheet" type="text/css" href="assets/fontawesome/css/all.css">

	<title>Daftar</title>
</head>
<body>
	<!-- Main Page -->
	<div class="login-register container mt-3">   	
		<h1 class="text-center">Daftar</h1>
		<form method="post" class="mt-5 m-auto form">
			<div class="mb-3">
				<label for="nama" class="form-label">Nama</label>
				<input type="text" name="nama" class="form-control" id="nama" required>
			</div>
			<div class="mb-3">
				<label for="username" class="form-label">Username</label>
				<input type="text" name="username" class="form-control" id="username" required>
			</div>
			<div class="mb-3">
				<label for="email" class="form-label">Email</label>
				<input type="email" name="email" class="form-control" id="email" required>
			</div>
			<div class="mb-3">
				<label for="password" class="form-label">Password</label>
				<div class="d-flex password">
					<input type="password" name="password" class="form-control d-flex" id="pasword" required>
					<i class="far fa-eye icon text-center align-self-center hide" onclick="hideShowPass()"></i>
					<i class="far fa-eye-slash  icon text-center align-self-center show d-none" onclick="hideShowPass()"></i>
				</div>
			</div>
			<div class="mb-3">
				<label for="confirmation" class="form-label">Konfirmasi Password</label>
				<div class="d-flex confirmation">
					<input type="password" name="confirmation" class="form-control d-flex" id="confirmation" required>
					<i class="far fa-eye icon text-center align-self-center hide" onclick="hideShowPass2()"></i>
					<i class="far fa-eye-slash  icon text-center align-self-center show d-none" onclick="hideShowPass2()"></i>
				</div>
			</div>
			<div class="d-flex w-100">
				<button type="submit" name="daftar" class="btn btn-success fw-bold rounded-12 me-auto">Daftar  <i class="fas fa-user-plus ml-1"></i></button>
				<a href="login.php" class="btn btn-primary fw-bold rounded-12 ms-auto">Login <i class="fas fa-arrow-right ml-1"></i></a>
			</div>
		</form>

	</div>		



	<!-- Optional JavaScript; choose one of the two! -->
	<script src="assets/js/main.js" crossorigin="anonymous"></script>


	<!-- Option 1: Bootstrap Bundle with Popper -->
	<script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>