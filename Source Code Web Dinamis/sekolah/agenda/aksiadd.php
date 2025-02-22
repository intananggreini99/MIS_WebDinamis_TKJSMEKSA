<?php

require_once "../config.php";

$agenda = $_POST['agenda'];
$deskrip = $_POST['deskrip'];

$rand = rand();
$ekstensi = array('png','jpg','jpeg');
$filename = $_FILES['gambar']['name'];
$ukuran = $_FILES['gambar']['size'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);

if (!in_array($ext,$ekstensi)){
	header("location:../index.php?alert=gagal_ekstensi");
}else{
	if ($ukuran < 3044070){
		$xx = $rand.'_'.$filename;
		move_uploaded_file($_FILES['gambar']['tmp_name'], 'gambar/'.$rand.'_'.$filename);
		mysqli_query($coneksi,"INSERT INTO agendatahunan VALUES(NULL,'$xx','$agenda','$deskrip')");
		header("location:agenda.php?alert=berhasil");
	}else{
		header("location:../index.php?alert=gagak_ukuran");
	}
}


?>