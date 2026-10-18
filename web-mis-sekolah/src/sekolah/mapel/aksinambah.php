<?php

    require_once "../config.php";

    $mapel    = esc($_POST['mapel'] ?? '');
    $pengajar = esc($_POST['pengajar'] ?? '');
    $jamkbm   = esc($_POST['jamkbm'] ?? '');

    $insert = mysqli_query($coneksi, "INSERT INTO mapel SET nama='$mapel', pengampu='$pengajar', jamkbm='$jamkbm'")
        or die(mysqli_error($coneksi));

    header("location:datamapel.php");

?>
