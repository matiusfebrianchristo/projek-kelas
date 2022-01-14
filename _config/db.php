<?php

	// Masukan nama database kamu
	define("DB_NAME", "data_siswa");



	// =================================================================
	// Untuk mengambil query siswa dan menggabungkan dengan  query kelas
	define("QUERY_SISWA", "SELECT * FROM siswa JOIN kelas ON siswa.kelas = kelas.id_kelas");


	// untuk mengambil query kelas
	define("QUERY_KELAS", "SELECT * FROM kelas");

	// INSERT INTO `siswa` (`nisn`, `nama`, `kelas`, `nomor_absen`) VALUES ('6665753', 'Gita', '3', '21')

?>