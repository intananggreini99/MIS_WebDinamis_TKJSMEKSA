<?php

require_once '../config.php';

$nis = (int) $_GET["nis"];

mysqli_query($coneksi,"DELETE FROM siswa WHERE nis='$nis'") or die(mysqli_error($coneksi));

header("location:datasiswa.php");

?>
