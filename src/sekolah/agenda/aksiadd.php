<?php

require_once "../config.php";

$agenda  = esc($_POST['agenda'] ?? '');
$deskrip = esc($_POST['deskrip'] ?? '');

$rand     = rand();
$ekstensi = array('png','jpg','jpeg');
$filename = basename($_FILES['gambar']['name'] ?? '');
$ukuran   = $_FILES['gambar']['size'] ?? 0;
$ext      = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

if (!in_array($ext, $ekstensi)) {
	echo "<script>alert('Dokumentasi harus berformat png, jpg, atau jpeg!'); history.back();</script>";
	exit;
}

if ($ukuran >= 3044070) {
	echo "<script>alert('Ukuran gambar terlalu besar (maksimal 3 MB)!'); history.back();</script>";
	exit;
}

$xx = $rand.'_'.$filename;
move_uploaded_file($_FILES['gambar']['tmp_name'], 'gambar/'.$xx);
$gambar = esc($xx);

mysqli_query($coneksi, "INSERT INTO agendatahunan (gambar, agenda, deskrip) VALUES ('$gambar', '$agenda', '$deskrip')")
	or die(mysqli_error($coneksi));

header("location:agenda.php?alert=berhasil");

?>
