<?php
// Import function.php
require '../_config/function.php';
// Untuk mengecek apakah user sudah login atau belum
include '../cek_login.php';

// Ketika button submit bernama tambah_siswa diklik atau bernilai true
if (isset($_POST["tambah_siswa"])) {
  // Ketika Input Select Kelas kosong atau tidak di pilih
  if ($_POST["kelas"] == "0") {
    //  Tampilkan pesan berikut
   echo "<script> alert('Pilih salah satu kelas')</script>";
  } else {
    // Ketika user telah berhasil insert data atau menambah data dalam database
    // atau nilai dari function addStudent = 1 
    if ( addStudent($_POST) > 0 ) {
      // arahkan ke link berikut
      echo "<script> alert('Siswa berhasil ditambahkan');  document.location.href = 'index.php'; </script>";
    } else {
      // tampilkan pesan error
      echo "Connection Error: " . mysqli_error($conn);
    }
  }
};

// Untuk mengambil list kelas
$list_class = query("SELECT * FROM kelas");

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

  <title>Tambah Siswa</title>
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
   <h1 class="text-center">Tambah Siswa</h1>
   <div class="back">
    <!-- <i class="fas fa-arrow-left"></i> -->
    <a href="index.php"><h5><i class="fas fa-arrow-left"></i> Home</h5></a>
  </div>
  <!-- ============================================================ -->
  <!-- Form Input -->
  <form method="post">
    <!-- Untuk Nama -->
    <div class="mb-3">
      <label for="nama" class="form-label">Nama</label>
      <input type="text" class="form-control" name="nama" id="nama" aria-describedby="emailHelp" required>
    </div>
    <!-- Untuk NISN -->
    <div class="mb-3">
      <label for="nisn" class="form-label">NISN</label>
      <input type="number" class="form-control" name="nisn" id="nisn" required>
    </div>
    <!-- Untuk Absen -->
    <div class="mb-3">
      <label for="absen" class="form-label">Absen</label>
      <input type="number" class="form-control" name="absen" id="absen" required>
    </div>
    <!-- Untuk Kelas -->
    <!-- Terdapat data yang telah di ambil dari database -->
    <div class="mb-3">
      <label for="kelas" class="form-label">Kelas</label>
      <!-- Input Select -->
      <select class="form-select" id="kelas" name="kelas" aria-label="Default select example">
        <option selected value="0">----++----</option>
        <!-- Melakukan sebuah perulangan untuk data yang telah diambil dari database -->
        <!-- Untuk di masukan kedalam option select agar dapat dipilih -->
        <?php foreach( $list_class as $data ) :?>
          <option value="<?= $data['id_kelas'] ?>"><?= $data['nama_kelas'] ?></option>
        <?php endforeach?>
      </select>
    </div>
    <!-- Button Submit -->
    <button type="submit" name="tambah_siswa" class="btn btn-primary rounded-12">Tambah  <i class="fas fa-plus-circle ms-1"></i></button>
  </form>
</div>		



<!-- Optional JavaScript; choose one of the two! -->
<!-- <script src="https://kit.fontawesome.com/42150c805c.js" crossorigin="anonymous"></script> -->


<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="../assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>