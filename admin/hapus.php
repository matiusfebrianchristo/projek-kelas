<?php 
	// Import function php
	require '../_config/function.php';
	// Untuk mengecek apakah user sudah login atau belum
	include '../cek_login.php';
	
	// Untuk mengambil nilai NISN dari url atau params
	$nisn_siswa = $_GET['nisn'];

	// Jika delete berhasil
	if (deleteStudent($nisn_siswa) > 0) {
		echo "<script> document.location.href = 'index.php' </script>";
    } else {
      echo "<script> document.location.href = 'index.php' </script>";
      echo mysqli_error($conn);
    }

?>