<?php

    require_once "../config.php";

    $id       = (int) $_GET['id'];
    $mapel    = esc($_POST['mapel'] ?? '');
    $pengajar = esc($_POST['pengajar'] ?? '');
    $jamkbm   = esc($_POST['jamkbm'] ?? '');

    mysqli_query($coneksi, "UPDATE mapel SET nama='$mapel', pengampu='$pengajar', jamkbm='$jamkbm' WHERE id='$id'")
        or die(mysqli_error($coneksi));

    header('location:datamapel.php');

?>
