<?php

    require_once "../config.php";

    $mapel = addslashes($_POST['mapel']);
    $pengajar = addslashes($_POST['pengajar']);
    $jamkbm = addslashes($_POST['jamkbm']);

    $insert = mysqli_query($coneksi, "INSERT INTO mapel set nama='$mapel',pengampu='$pengajar',jamkbm='$jamkbm'");

    header("location:datamapel.php");

?>