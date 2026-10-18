<?php

    require_once "../config.php";

    $id           = (int) $_GET['id'];
    $nama         = esc($_POST['nama'] ?? '');
    $email        = esc($_POST['email'] ?? '');
    $jeniskelamin = esc($_POST['jeniskelamin'] ?? '');
    $jabatan      = esc($_POST['jabatan'] ?? '');
    $alamat       = esc($_POST['alamat'] ?? '');

    $rand     = rand();
    $ekstensi = array('png','jpg','jpeg');
    $filename = basename($_FILES['foto']['name'] ?? '');
    $ukuran   = $_FILES['foto']['size'] ?? 0;
    $ext      = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

    if ($filename === '') {
        // tidak memilih foto baru -> foto lama tetap dipakai
        mysqli_query($coneksi, "UPDATE guru SET nama='$nama', email='$email', jabatan='$jabatan', jeniskelamin='$jeniskelamin', alamat='$alamat' WHERE id='$id'")
            or die(mysqli_error($coneksi));
        header("location: dataguru.php");
        exit;
    }

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

    mysqli_query($coneksi, "UPDATE guru SET foto='$foto', nama='$nama', email='$email', jabatan='$jabatan', jeniskelamin='$jeniskelamin', alamat='$alamat' WHERE id='$id'")
        or die(mysqli_error($coneksi));

    header("location: dataguru.php");

?>
