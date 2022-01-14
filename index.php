<?php
 include '_config/function.php';

 $list_student = query(constant("QUERY_SISWA"));
 
 $number = 1;
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
   	<div class="container mt-3">   	
   		<h1 class="text-center">Data Siswa</h1>

   		<!-- =========================================================================== -->
   		<!-- Modal For Add Student -->
   		<!-- Button trigger modal -->
   		<div class="d-flex w-100 m-2">
			<a href="tambah_kelas.php" class="btn btn-secondary rounded-12 me-auto">
			  Tambah Kelas <i class="fas fa-plus-circle"></i>
			</a>
			<a href="tambah_siswa.php" class="btn btn-primary rounded-12 ms-auto" style="margin-right: 1.2rem;">
			  Tambah Siswa <i class="fas fa-plus-circle"></i>
			</a>
   		</div>


		<!-- ======================================================================= -->
   		<!-- List Students -->
	  	<div class="table-responsive mt-3">
		  <table class="table table-bordered table-striped text-center">
		    <thead>
		    	<tr>
		    		<th>No.</th>
		    		<th class="mw-10 coloums">Nama <i class="fas fa-sort"></i>
		    		<th class="mw-absen coloums">No. Absen <i class="fas fa-sort"></i>
		    		<th class="mw-class">Kelas</th>
		    		<th>NISN</th>
		    		<th class="mw-8">Aksi</th>
		    	</tr>
		    </thead>
		    <tbody>
		    	<?php  foreach ( $list_student as $data ) : ?>
		    	<tr>
		    		<td><?= $number++; ?></td>
		    		<td class="text-start pl-1 "><?= $data['nama']; ?></td>
		    		<td><?= $data['nomor_absen']; ?></td>
		    		<td><?= $data['nama_kelas']; ?></td>
		    		<td><?= $data['nisn']; ?></td>
		    		<td>
		    			<i class="fas fa-edit icon edit"></i>
		    			<i class="fas fa-trash mx-md-2 icon delete"></i>
		    			<i class="fas fa-info-circle icon detail"></i>
		    		</td>
		    	</tr>
		    	<?php endforeach ?>
		    </tbody>
		  </table>
		</div>

   	</div>		



    <!-- Optional JavaScript; choose one of the two! -->
    <script src="https://kit.fontawesome.com/42150c805c.js" crossorigin="anonymous"></script>
    <script  src="assets/js/main.js"></script>


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>