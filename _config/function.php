<?php
	// ===========================================================================================
	// Koneksi ke Database MySQL
	
	// Mendefinisikan host, user, password, nama_database untuk login ke Database 
	$conn = mysqli_connect("localhost", "root", "", "data_siswa");

	// cek apakah berhasil atau tidak
	if (!$conn) {
		die("Connection Error: " . mysqli_connect_error());
	} 


	// ===================================================================================== 
	// Untuk Function 
	
	// Function untuk mengambil data dari Database
	function query($query)
	{
		// Untuk mengambil variable Koneksi yang berada dari luar
		global $conn;

		// untuk mengambil Data dari database
		$result = mysqli_query($conn, $query);
		// variabel untuk menyimpan data yang diambil dari Database 
		$list = [];

		// Untuk memasukan dengan cara perulangan
		// Semua program akan memasukan data satu per satu ke dalam variabel list atau variabel untuk menyimpan data dari database
		while ($data = mysqli_fetch_assoc($result)) {
			$list[] = $data;
		}

		// Mengembalikan nilai variabel list
		return $list;
	}

	// ========================================
	// Untuk Mendaftar
	function addUser($data) {

		// Untuk mengambil variabel koneksi yang berada di luar function
		global $conn;

		// Mendefiniskan untuk inputan Nama, username, email, dan password
		// $data adalah argument function dimana nantinya dapat digunakan untuk mengambil data saat function di panggil
		$name = $data["nama"];
		$username = strtolower($data["username"]);
		$email = strtolower($data["email"]);
		$password = $data["password"];

		// Mendefinisikan perintah database untuk menambahkan data ke tabel User
		// INSERT INTO nama_tabel (nama_kolom) VALUES (data_yang_akan_diisikan)
		$query = "INSERT INTO user (nama, username, email, password) VALUES ('$name', '$username', '$email', '$password')";

		// Untuk menjalankan atau mengeksekusi perintah mysql yang telah di definisikan tadi
		// mysqli_query(konek, perintah)
		mysqli_query($conn, $query);

		// Mengembalikan nilai berupa angka dimana jika berhasil maka nilai yg dikembalikan adalah 1 jika gagal -1
		return mysqli_affected_rows($conn);
		
	} 


	// ========================================
	// Function untuk Menambahkan Siswa
	function addStudent($data) {

		//Untuk mengambil Variabel Koneksi yang berada di luar function 
		global $conn;

		// Mendefinisikan varibel untuk input nama, nisn, kelas, absen
		// htmlspecialchars digunakan untuk mencegah terjadi nya sebuah error ketika user menginput kan tag html atau baris html
		// $data adalah argumen dimana nanti nya dapat diisi saat memanggil function tersebut
		$name = htmlspecialchars($data["nama"]);
		$class = htmlspecialchars($data["kelas"]);
		$absen = htmlspecialchars($data["absen"]);
		$nisn = htmlspecialchars($data["nisn"]);

		// Mendefinisikan perintah database untuk menambahkan data ke dalam Database
		// INSERT INTO siswa (nama_tabel) VALUES (data_yang_akan_diisikan)
		$query = "INSERT INTO siswa (nisn, nama, kelas, nomor_absen) VALUES ('$nisn', '$name', '$class', '$absen')";

		// Untuk menjalan atau mengeksekusi perintah mysql yang telah di definisikan tadi 
		// mysqli_query(koneksi, perintah)
		mysqli_query($conn, $query);

		// Mengembalikan nilai berupa angka dimana jika berhasil maka nilai yg dikembalikan adalah 1 jika gagal -1
		return mysqli_affected_rows($conn);

	}

	// ==========================================
	// Tambah Kelas
	function addClass($data) {
		//Untuk mengambil Variabel Koneksi yang berada di luar function 
		global $conn;

		// Mendefinisikan varibel untuk input nama, nisn, kelas, absen
		// htmlspecialchars digunakan untuk mencegah terjadi nya sebuah error atau kesalahan ketika user menginput kan tag html atau baris html
		// $data adalah argumen dimana nanti nya dapat diisi saat memanggil function tersebut
		$kelas = htmlspecialchars($data["kelas"]);

		// Mendefinisikan perintah database untuk menambahkan data ke dalam Database
		// INSERT INTO siswa (nama_tabel) VALUES (data_yang_akan_diisikan)
		$query = "INSERT INTO kelas (nama_kelas) VALUES ('$kelas')";

		// Untuk menjalan atau mengeksekusi perintah mysql yang telah di definisikan tadi 
		// mysqli_query(koneksi, perintah)
		mysqli_query($conn, $query);

		// Mengembalikan nilai berupa angka dimana jika berhasil maka nilai yg dikembalikan adalah 1 jika gagal -1
		return mysqli_affected_rows($conn);
	}


	// ===========================================
	// Menghapus Siswa
	function deleteStudent($nisn) {
		//Untuk mengambil Variabel Koneksi yang berada di luar function 
		global $conn;

		// Mendefinisikan perintah database untuk menghapus data ke dalam Database
		// DELETE FROM nama_tabel WHERE nama_attribut = data_yang_akan_diisi
		$query = "DELETE FROM siswa WHERE nisn = $nisn";

		// Untuk menjalan atau mengeksekusi perintah mysql yang telah di definisikan tadi 
		// mysqli_query(koneksi, perintah)
		mysqli_query($conn, $query);

		// Mengembalikan nilai berupa angka dimana jika berhasil maka nilai yg dikembalikan adalah 1 jika gagal -1
		return mysqli_affected_rows($conn);
	}

	// ==================================================
	// Untuk mengambil nama_kelas dengan id_kelas dari Database
	function getNamaKelas($id_kelas) {
		//Untuk mengambil Variabel Koneksi yang berada di luar function 
		global $conn;

		// Mendefinisikan perintah database untuk mengambil data dari Database
		// SELECT * FROM nama_tabel WHERE nama_attribut = data_yang_akan_diisi
		$query = "SELECT * FROM kelas WHERE id_kelas = '$id_kelas'";

		// Mendefinisikan variabel untuk menyimpan hasil pengambilan data dari Database 
		// mysqli_query(variabel_koneksi, perintah)		
		$data = mysqli_query($conn, $query);

		// Untuk menjalan atau mengeksekusi perintah mysql yang telah di definisikan tadi
		// $data = mysqli_fetch_assoc($nama_kelas);
		$kelas = mysqli_fetch_assoc($data);

		// Mengembalikan nilai dari variabel $kelas yang berisi data dari Database
		return $kelas['nama_kelas'];

	}

	//=======================================================
	// Untuk update atau edit data Siswa
	function updateSiswa($data, $get, $old) {
		// Untuk mengambil Variabel Koneksi yang berada di luar function 
		global $conn;

		// Mendefinisikan variable untuk data yg akan dimasukan
		$nisn = $data['nisn'];
		$nama = $data['nama'];
		$kelas = $data['kelas'];
		$nomor_absen = $data['absen'];

		// Mendefinisikan perintah database untuk update data dari Database
		// UPDATE nama_tabel SET nama_attribut = data_yang_akan_diisikan WHERE nama_attribut = data_yang_akan_diisikan
		$query = "UPDATE siswa SET nisn='$nisn', nama = '$nama', kelas = '$kelas', nomor_absen = '$nomor_absen' WHERE nisn = '$get'";

		// Untuk menjalan atau mengeksekusi perintah mysql yang telah di definisikan tadi
		// mysqli_query(variabel_koneksi, perintah)
		$data = mysqli_query($conn, $query);
		// var_dump($data);

		if (!$data) {
			return die("Error : " . mysqli_error($data));
		}

		// var_dump($conn);

		// Mengembalikan nilai dari variabel $kelas yang berisi data dari Database
		if ($old == $data) {
			return 1;
		} else {
			return mysqli_affected_rows($conn);
		}
	}

?>