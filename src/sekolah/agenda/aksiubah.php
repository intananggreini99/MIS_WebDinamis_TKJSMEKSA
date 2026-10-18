<?php

    require_once "../config.php";

    $id      = (int) $_GET['id'];
    $agenda  = esc($_POST['agenda'] ?? '');
    $deskrip = esc($_POST['deskrip'] ?? '');

    $rand     = rand();
    $ekstensi = array('png','jpg','jpeg');
    $filename = basename($_FILES['gambar']['name'] ?? '');
    $ukuran   = $_FILES['gambar']['size'] ?? 0;
    $ext      = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

    if ($filename === '') {
        // tidak memilih gambar baru -> gambar lama tetap dipakai
        mysqli_query($coneksi, "UPDATE agendatahunan SET agenda='$agenda', deskrip='$deskrip' WHERE id='$id'")
            or die(mysqli_error($coneksi));
        header("location: agenda.php");
        exit;
    }

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

    mysqli_query($coneksi, "UPDATE agendatahunan SET gambar='$gambar', agenda='$agenda', deskrip='$deskrip' WHERE id='$id'")
        or die(mysqli_error($coneksi));

    header("location: agenda.php");

?>
