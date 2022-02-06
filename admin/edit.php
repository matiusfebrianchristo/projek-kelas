<!-- ============================================================================================ -->
<!-- Untuk PHP -->
<?php
  //Import function.php
  // 
  require '../_config/function.php';
  // Untuk mengecek apakah user sudah login atau belum 
  include '../cek_login.php';

  // Jika tidak ada params nisn 
  // Arahkan ke index.php
  if ( $_GET['nisn'] == NULL || $_GET['nisn'] == "" ) {
	  header("Location: index.php");
  }

  // Untuk mengambil data nisn yang telah disisipkan pada link url atau bisa sering disebut dengan params
  $nisn = $_GET['nisn'];

  // Untuk mengambil Data siswa Sesuai NISN
  $data_siswa = query("SELECT * FROM siswa WHERE nisn = '$nisn'");

  // Untuk mengecek apakah NISN ada atau tidak
  if (count($data_siswa) == 0) {
	  echo "<script> alert('nisn tidak terdaftar'); document.location.href = 'index.php' </script>";
  }

  // list class
  $list_class = query("SELECT * FROM kelas");


  // Ketika Klik Edit
  // Jalankan fungsi berikut 
  if (isset($_POST["edit_siswa"])) {
      // menjalankan fungsi updateSiswa serta mengecek apakah terjadi kesalahan atau tidak
      // ketika TRUE
	  var_dump($_POST, $data_siswa);
	  if ( updateSiswa($_POST, $nisn, $data_siswa) > 0 ) {
      // arahkan kembali ke index.php dengan javascript
      // bisa menggunakan header('location: lokasi/file') untuk php
		  echo "<script> document.location.href = 'index.php' </script>";
	  } 
      // ketika False
	  else {
        // Menampilkan pesan Error
        // echo "<script> document.location.href = 'index.php' </script>"
		  echo "Connection Error: " . mysqli_errno($conn);
	  }
  };

?>

<!-- ====================================================================================================== -->
<!-- Untuk HTML -->
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

	<title>Edit</title>
</head>
<body class="admin">
	<!-- Halaman Utama-->
	<!-- Navbar -->
	  <nav class="navbar navbar-expand-lg navbar-light bg-light mb-0 me-3">
	    <div class="container-fluid">
	      <a class="navbar-brand" href="#">Project</a>
	      <!-- Link Logout.php -->
	      <a href="../logout.php" class="btn ms-auto me-2 btn-danger">Logout <i class="fas fa-sign-out-alt ms-1"></i></a>
	    </div>
	  </nav>
	
	<div class="add-class container mt-3">   	
		<h1 class="text-center">Data Siswa</h1>
		<div class="back">
			<a href="index.php"><h5><i class="fas fa-arrow-left"></i> Home</h5></a>
		</div>

		<!-- Form Input -->
		<form method="post">
			<!-- Inputan untuk Nama  -->
			<div class="mb-3">
				<label for="nama" class="form-label">Nama</label>
				<input type="text" class="form-control" name="nama" id="nama" value="<?= $data_siswa[0]['nama']; ?>" aria-describedby="emailHelp" required>
			</div>
			<!-- Inputan untuk NISN  -->
			<div class="mb-3">
				<label for="nisn" class="form-label">NISN</label>
				<input type="number" class="form-control" name="nisn" id="nisn" value="<?= $data_siswa[0]['nisn']; ?>" required>
			</div>
			<!-- Inputan untuk Absen  -->
			<div class="mb-3">
				<label for="absen" class="form-label">Absen</label>
				<input type="number" class="form-control" name="absen" id="absen" value="<?= $data_siswa[0]['nomor_absen']; ?>" required>
			</div>
			<!-- Inputan untuk Kelas  -->
			<!-- berupa Input select dimana option nya akan diisi dengan data yang diambil dari database -->
			<div class="mb-3">
				<label for="kelas" class="form-label">Kelas</label>
				<select class="form-select" id="kelas" name="kelas" aria-label="Default select example">
					<!-- Option Untuk Select -->
					<!-- Memasukan data sekaligus mengecek apakah kelas tersebut milik NISN yang tertera di link atau url -->
					<?php foreach( $list_class as $data ) : if($data["id_kelas"] == $data_siswa[0]["kelas"]) { ?>
						<option value="<?= $data['id_kelas']; ?>" selected><?= $data['nama_kelas'] ?></option>
					<?php } else { ?>
						<option value="<?= $data['id_kelas']; ?>"><?= $data['nama_kelas'] ?></option>
					<?php } endforeach; ?>
				</select>
			</div>
			<!-- Tombol Submit / untuk mengirim -->
			<input type="hidden" name="id" value="<?= $_GET['nisn']; ?>">
			<button type="submit" name="edit_siswa" class="btn btn-primary rounded-12">Update  <i class="fas fa-save ms-1"></i></button>
		</form>
	</div>		



	<!-- Optional JavaScript; choose one of the two! -->
	<script src="https://kit.fontawesome.com/42150c805c.js" crossorigin="anonymous"></script>


	<!-- Option 1: Bootstrap Bundle with Popper -->
	<script src="../assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>