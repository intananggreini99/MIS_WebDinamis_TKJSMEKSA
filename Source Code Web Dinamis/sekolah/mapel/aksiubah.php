<?php

    require_once "../config.php";
    $id = $_GET['id'];
    $mapel = addslashes($_POST['mapel']);
    $pengajar = addslashes($_POST['pengajar']);
    $jamkbm = addslashes($_POST['jamkbm']);

    mysqli_query($coneksi, "update mapel set nama='$mapel',pengampu='$pengajar',jamkbm='$jamkbm' where id='$id' ");
    header('location:datamapel.php');

?>