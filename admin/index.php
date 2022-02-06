<?php
// Import config php
include '../_config/function.php';
// Un
include '../cek_login.php';

 // Mengambil data dari tabel Siswa
$list_student = query("SELECT * FROM siswa");

 // Mengambil data dari tabel kelas
$list_kelas = query("SELECT * FROM kelas");

 // Untuk numbering
$number = 1;
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

	<title>Data Siswa</title>
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

	<div class="container mt-3">	
		<h1 class="text-center">Data Siswa</h1>

		<!-- =========================================================================== --> 
		<!-- Modal For Add Student -->
		<div class="d-flex w-100 m-2">
			<a href="tambah_kelas.php" class="btn btn-secondary rounded-12 me-auto">
				Tambah Kelas <i class="fas fa-plus-circle ms-1"></i>
			</a>
			<a href="tambah_siswa.php" class="btn btn-primary rounded-12 ms-auto" style="margin-right: 1.2rem;">
				Tambah Siswa <i class="fas fa-plus-circle ms-1"></i>
			</a>
		</div>


		<!-- ======================================================================= -->
		<!-- List Siswa -->
		<!-- Cek apakah ada siswa atau tidak -->
		<?php if(count($list_kelas) == 0 ) : ?>
			<!-- tampilkan tag berikut -->
			<p class="text-danger text-center">Kelas belum ada. Tambahkan kelas terlebih dahulu.</p>
		<?php endif; ?>

		<!-- Tabel List Siswa -->
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
							<!-- Jika ada siswa maka masukan data dari database kedalam tabel -->
							<?php if (count($list_student) !== 0) {
								// Lakukan perulangan untuk menampilkan data ke dalam tabel
								foreach ( $list_student as $data ) :   ?>
									<tr>
										<!-- Untuk nomer -->
										<td><?= $number++; ?></td>
										<!-- Nama siswa -->
										<td class="text-start pl-1 "><?= $data['nama']; ?></td>
										<!-- Nomer absen -->
										<td><?= $data['nomor_absen']; ?></td>
										<!-- Mengambil nama kelas dengan id_kelas yang telah ada pada tabel siswa -->
										<td><?= getNamaKelas($data['kelas']); ?></td>
										<!-- NISN -->
										<td><?= $data['nisn']; ?></td>
										<!-- Untuk aksi edit atau delete -->
										<td>
											<a href="edit.php?nisn=<?= $data['nisn'] ?>" class="mx-md-3 "><i class="fas fa-edit icon edit"></i></a>
											<a href="hapus.php?nisn=<?= $data['nisn'] ?>" class="mx-md-3 "><i class="fas fa-trash icon delete"></i></a>
										</td>
									</tr>
								<?php endforeach ?>
							<!-- Ketika data dalam database kosong -->
							<?php } else { ?>
								<tr>
									<td colspan="6" class="text-center">Data belum ada</td>
								</tr>
							<?php } ?>
							
						</tbody>
					</table>
				</div>

			</div>		



			<!-- Optional JavaScript; choose one of the two! -->
			<!-- <script src="https://kit.fontawesome.com/42150c805c.js" crossorigin="anonymous"></script> -->
			<script  src="../assets/js/main.js"></script>


			<!-- Option 1: Bootstrap Bundle with Popper -->
			<script src="../assets/bootstrap/js/bootstrap.min.js"></script>
		</body>
		</html>