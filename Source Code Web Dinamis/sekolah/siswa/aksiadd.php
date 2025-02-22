<?php

require_once "../config.php";
$nis = $_POST['nis'];
$nama = $_POST['nama'];
$email = $_POST['email'];
$jeniskelamin = $_POST['jeniskelamin'];
$kelas = $_POST['kelas'];
$alamat = $_POST['alamat'];

mysqli_query($coneksi, "insert into siswa set nis='$nis',nama='$nama',email='$email',kelas='$kelas', jeniskelamin='$jeniskelamin', alamat='$alamat'");
header('location:datasiswa.php');

?>