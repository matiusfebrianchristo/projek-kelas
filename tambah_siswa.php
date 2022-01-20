<?php
require '_config/function.php';

  // on Submit
if (isset($_POST["tambah_siswa"])) {
    // cek koneksi
  if ( addStudent($_POST) > 0 ) {
    echo "<script> document.location.href = 'index.php' </script>";
  } else {
    echo "<script> document.location.href = 'index.php' </script>";
    echo mysqli_connection_error($conn);
  }
};

  // list class
$list_class = query("SELECT * FROM kelas");

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- main CSS -->
  <link rel="stylesheet" type="text/css" href="assets/css/main.css">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.min.css">

  <!-- Fontawesome -->
  <script defer src="assets/fontawesome/js/all.js"></script>

  <title>Hello, world!</title>
</head>
<body>
 <!-- Main Page -->
 <div class="add-class container mt-3">   	
   <h1 class="text-center">Data Siswa</h1>
   <div class="back">
    <!-- <i class="fas fa-arrow-left"></i> -->
    <a href="/projectkelas"><h5><i class="fas fa-arrow-left"></i> Home</h5></a>
  </div>
  <form method="post">
    <div class="mb-3">
      <label for="nama" class="form-label">Nama</label>
      <input type="text" class="form-control" name="nama" id="nama" aria-describedby="emailHelp" required>
      <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
    </div>
    <div class="mb-3">
      <label for="nisn" class="form-label">NISN</label>
      <input type="number" class="form-control" name="nisn" id="nisn" required>
    </div>
    <div class="mb-3">
      <label for="absen" class="form-label">Absen</label>
      <input type="number" class="form-control" name="absen" id="absen" required>
    </div>
    <div class="mb-3">
      <label for="kelas" class="form-label">Kelas</label>
      <select class="form-select" id="kelas" name="kelas" aria-label="Default select example">
        <option selected value="0">----++----</option>
        <?php foreach( $list_class as $data ) :?>
          <option value="<?= $data['id_kelas'] ?>"><?= $data['nama_kelas'] ?></option>
        <?php endforeach?>
      </select>
    </div>
    <button type="submit" name="tambah_siswa" class="btn btn-primary rounded-12">Tambah  <i class="fas fa-plus-circle"></i></button>
  </form>
</div>		



<!-- Optional JavaScript; choose one of the two! -->
<script src="https://kit.fontawesome.com/42150c805c.js" crossorigin="anonymous"></script>


<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>