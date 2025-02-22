<?php

require_once "../config.php";

$nama = $_POST['nama'];
$email = $_POST['email'];
$gender = $_POST['jeniskelamin'];
$jabatan = $_POST['jabatan'];
$alamat = $_POST['alamat'];

$rand = rand();
$ekstensi = array('png','jpg','jpeg');
$filename = $_FILES['foto']['name'];
$ukuran = $_FILES['foto']['size'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);

if (!in_array($ext,$ekstensi)){
	header("location:../index.php?alert=gagal_ekstensi");
}else{
	if ($ukuran < 3044070){
		$xx = $rand.'_'.$filename;
		move_uploaded_file($_FILES['foto']['tmp_name'], 'foto/'.$rand.'_'.$filename);
		mysqli_query($coneksi,"INSERT INTO guru VALUES(NULL,'$nama','$email','$gender','$jabatan','$alamat','$xx')");
		header("location:dataguru.php?alert=berhasil");
	}else{
		header("location:../index.php?alert=gagak_ukuran");
	}
}


?>