<?php
session_start();

include "koneksi.php";

// menangkap data yang dikirim dari form login
$email    = mysqli_real_escape_string($mysqli, trim($_POST['email'] ?? ''));
$password = mysqli_real_escape_string($mysqli, $_POST['password'] ?? '');

// menyeleksi data akun dengan email dan password yang sesuai (tabel allin)
$login = mysqli_query($mysqli, "SELECT * FROM allin WHERE email='$email' AND password='$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);

// cek apakah email dan password ditemukan pada database
if ($cek > 0) {

	$data = mysqli_fetch_assoc($login);

	// cek jika user login sebagai admin
	if ($data['level'] == "admin") {

		// buat session login dan level
		$_SESSION['email'] = $data['email'];
		$_SESSION['level'] = "admin";
		// alihkan ke halaman dashboard admin
		header("location:sekolah/index.php");

	// cek jika user login sebagai guru
	} else if ($data['level'] == "guru") {
		$_SESSION['email'] = $data['email'];
		$_SESSION['level'] = "guru";
		// alihkan ke halaman guest
		header("location:sekolah/guest/index.php");

	// cek jika user login sebagai siswa
	} else if ($data['level'] == "siswa") {
		$_SESSION['email'] = $data['email'];
		$_SESSION['level'] = "siswa";
		// alihkan ke halaman guest
		header("location:sekolah/guest/index.php");

	} else {
		// alihkan ke halaman login kembali
		header("location:index.php?pesan=gagal");
	}

} else {

	// Akun dari menu "User Admin" (tabel user) juga bisa login sebagai admin
	// dengan mengisi username pada kolom Email.
	$admin = mysqli_query($mysqli, "SELECT * FROM user WHERE username='$email' AND password='$password'");

	if (mysqli_num_rows($admin) > 0) {
		$_SESSION['email'] = $email;
		$_SESSION['level'] = "admin";
		header("location:sekolah/index.php");
	} else {
		header("location:index.php?pesan=gagal");
	}
}
exit;
?>
