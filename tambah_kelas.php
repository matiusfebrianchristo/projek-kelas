<?php

	require "_config/function.php";

	if (isset($_POST["tambah_kelas"])) {
    // cek koneksi
    if ( addClass($_POST) > 0 ) {
      echo "<script> 
      			alert('Kelas berhasil ditambahkan') ;
  				document.location.href = 'index.php';
  			</script>";
    } else {
      echo "<script> document.location.href = 'index.php' </script>";
      echo mysqli_error($conn);
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
   		<form method="post" class="mt-2">
		  <div class="mb-3">
		    <label for="nama" class="form-label">kelas</label>
		    <input type="text" name="kelas" class="form-control" id="nama" aria-describedby="emailHelp">
		    <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
		  </div>
		  <button type="submit" name="tambah_kelas" class="btn btn-primary rounded-12">Tambah  <i class="fas fa-plus-circle"></i></button>
		</form>

   	</div>		



    <!-- Optional JavaScript; choose one of the two! -->
    <script src="https://kit.fontawesome.com/42150c805c.js" crossorigin="anonymous"></script>


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>