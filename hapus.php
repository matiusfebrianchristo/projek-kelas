<?php 
	require '_config/function.php';
	$nisn_siswa = $_GET['nisn'];

	if (deleteStudent($nisn_siswa) > 0) {
		echo "<script> document.location.href = 'index.php' </script>";
    } else {
      echo "<script> document.location.href = 'index.php' </script>";
      echo mysqli_error($conn);
    }

?>