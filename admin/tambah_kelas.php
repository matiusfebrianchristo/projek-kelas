<?php
// Import function.php / config php
require "../_config/function.php";
// Untuk mengecek apakah user sudah login atau belum
include '../cek_login.php';

// Ketika button submit bernama tambah_kelas di klik atau bernilai true
if (isset($_POST["tambah_kelas"])) {
	// Ketika function addClass bernilai 1 atau berhasil tanpa error
	if ( addClass($_POST) > 0 ) {
		// tampilkan script berikut
		echo "<script> 
		alert('Kelas berhasil ditambahkan') ;
		document.location.href = 'index.php';
		</script>";
	} else {
		// Tampilkan pesan error
		echo "Connection Error: " . mysqli_error($conn);
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
	<link rel="stylesheet" type="text/css" href="../assets/css/main.css">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" type="text/css" href="../assets/bootstrap/css/bootstrap.min.css">

	<!-- Fontawesome -->
	<link rel="stylesheet" type="text/css" href="../assets/fontawesome/css/all.css">

	<title>Tambah Kelas</title>
</head>
<body class="admin">
	<!-- Main Page -->

	 <!-- Navbar -->
	  <nav class="navbar navbar-expand-lg navbar-light bg-light mb-0 me-3">
	    <div class="container-fluid">
	      <a class="navbar-brand" href="#">Project</a>
	      <!-- Link Logout.php -->
	      <a href="../logout.php" class="btn ms-auto me-2 btn-danger">Logout <i class="fas fa-sign-out-alt ms-1"></i></a>
	    </div>
	  </nav>
	
	<div class="add-class container mt-3">   	
		<h1 class="text-center">Tambah Kelas</h1>
		<div class="back">
			<!-- Untuk kembali ke index.php -->
			<a href="index.php"><h5><i class="fas fa-arrow-left"></i> Home</h5></a>
		</div>

		<!-- Form Input -->
		<form method="post" class="mt-2">
			<!-- Untuk Nama Kelas -->
			<div class="mb-3">
				<label for="nama" class="form-label">kelas</label>
				<input type="text" name="kelas" class="form-control" id="nama" placeholder="contoh : 12 TKJ 2" aria-describedby="emailHelp">
			</div>
			<!-- Button submit -->
			<button type="submit" name="tambah_kelas" class="btn btn-primary rounded-12">Tambah  <i class="fas fa-plus-circle ms-1"></i></button>
		</form>

	</div>		



	<!-- Optional JavaScript; choose one of the two! -->
	<!-- <script src="https://kit.fontawesome.com/42150c805c.js" crossorigin="anonymous"></script> -->


	<!-- Option 1: Bootstrap Bundle with Popper -->
	<script src="../assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>