<?php 
	
	require 'db.php';

	// for host, username and password MySQL
	$conn = mysqli_connect("localhost", "root", "");

	if (!$conn) {
		echo "Yah gagal";
	} 

	// For database
	$db = mysqli_select_db($conn, constant("DB_NAME"));

	if (!$db) {
		echo "yahh";
	}

?>