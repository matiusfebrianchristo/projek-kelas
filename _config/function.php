<?php
	
	require 'db_config.php';
	
	// For GET data from Database 
	// For GET Query
	function query($query)
	{
		global $conn;

		$result = mysqli_query($conn, $query);
		$list = [];
		while ($data = mysqli_fetch_assoc($result)) {
			$list[] = $data;
		}
		return $list;
	}

	// ========================================
	// Add Students
	function addStudent($data) {
		global $conn;

		$name = htmlspecialchars($data["nama"]);
		$class = htmlspecialchars($data["kelas"]);
		$absen = htmlspecialchars($data["absen"]);
		$nisn = htmlspecialchars($data["nisn"]);

		$query = "INSERT INTO siswa (nisn, nama, kelas, nomor_absen) VALUES ('$nisn', '$name', '$class', '$absen')";

		mysqli_query($conn, $query);
		return mysqli_affected_rows($conn);

	}

	// ==========================================
	// Add Class
	function addClass($data) {
		global $conn;

		$kelas = htmlspecialchars($data["kelas"]);

		$query = "INSERT INTO kelas (id_kelas, nama_kelas) VALUES ('', '$kelas')";

		mysqli_query($conn, $query);
		return mysqli_affected_rows($conn);
	}


	// ===========================================
	// Detele Student
	function deleteStudent($nisn) {
		global $conn;

		$query = "DELETE FROM siswa WHERE nisn = $nisn";

		mysqli_query($conn, $query);
		return mysqli_affected_rows($conn);
	}

?>