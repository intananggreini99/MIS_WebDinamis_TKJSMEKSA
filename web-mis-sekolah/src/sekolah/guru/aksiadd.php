<?php

require_once "../config.php";

$nama    = esc($_POST['nama'] ?? '');
$email   = esc($_POST['email'] ?? '');
$gender  = esc($_POST['jeniskelamin'] ?? '');
$jabatan = esc($_POST['jabatan'] ?? '');
$alamat  = esc($_POST['alamat'] ?? '');

$rand     = rand();
$ekstensi = array('png','jpg','jpeg');
$filename = basename($_FILES['foto']['name'] ?? '');
$ukuran   = $_FILES['foto']['size'] ?? 0;
$ext      = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

if (!in_array($ext, $ekstensi)) {
	echo "<script>alert('Foto harus berformat png, jpg, atau jpeg!'); history.back();</script>";
	exit;
}

if ($ukuran >= 3044070) {
	echo "<script>alert('Ukuran foto terlalu besar (maksimal 3 MB)!'); history.back();</script>";
	exit;
}

$xx = $rand.'_'.$filename;
move_uploaded_file($_FILES['foto']['tmp_name'], 'foto/'.$xx);
$foto = esc($xx);

mysqli_query($coneksi, "INSERT INTO guru (nama, email, jeniskelamin, jabatan, alamat, foto)
                        VALUES ('$nama', '$email', '$gender', '$jabatan', '$alamat', '$foto')")
	or die(mysqli_error($coneksi));

header("location:dataguru.php?alert=berhasil");

?>
