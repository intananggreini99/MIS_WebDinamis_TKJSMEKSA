<?php

    require_once "../config.php";

    $nis          = (int) $_GET['nis'];
    $nama         = esc($_POST['nama'] ?? '');
    $email        = esc($_POST['email'] ?? '');
    $jeniskelamin = esc($_POST['jeniskelamin'] ?? '');
    $kelas        = esc($_POST['kelas'] ?? '');
    $alamat       = esc($_POST['alamat'] ?? '');

    $ubah = mysqli_query($coneksi, "UPDATE siswa SET nama='$nama', email='$email', kelas='$kelas', jeniskelamin='$jeniskelamin', alamat='$alamat' WHERE nis='$nis'");

    if (!$ubah) {
        $error = addslashes(mysqli_error($coneksi));
        echo "<script>alert('Data gagal diubah: $error'); history.back();</script>";
        exit;
    }

    header('location:datasiswa.php');
?>
