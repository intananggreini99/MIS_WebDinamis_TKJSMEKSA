<?php

require_once "../config.php";

$nis          = (int) ($_POST['nis'] ?? 0);
$nama         = esc($_POST['nama'] ?? '');
$email        = esc($_POST['email'] ?? '');
$jeniskelamin = esc($_POST['jeniskelamin'] ?? '');
$kelas        = esc($_POST['kelas'] ?? '');
$alamat       = esc($_POST['alamat'] ?? '');

$simpan = mysqli_query($coneksi, "INSERT INTO siswa SET nis='$nis', nama='$nama', email='$email', kelas='$kelas', jeniskelamin='$jeniskelamin', alamat='$alamat'");

if (!$simpan) {
    $error = addslashes(mysqli_error($coneksi));
    echo "<script>alert('Data gagal disimpan: $error'); history.back();</script>";
    exit;
}

header('location:datasiswa.php');

?>
