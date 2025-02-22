<?php

    require_once "../config.php";
    $nis = $_GET['nis'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $jeniskelamin = $_POST['jeniskelamin'];
    $kelas = $_POST['kelas'];
    $alamat = $_POST['alamat'];

    mysqli_query($coneksi, "update siswa set nama='$nama',email='$email',kelas='$kelas', jeniskelamin='$jeniskelamin', alamat='$alamat' where nis='$nis' ");
    header('location:datasiswa.php');
?>