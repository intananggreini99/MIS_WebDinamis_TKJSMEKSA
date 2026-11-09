<?php

require_once '../config.php';

$id = (int) $_GET["id"];

mysqli_query($coneksi,"DELETE FROM agendatahunan WHERE id='$id'") or die(mysqli_error($coneksi));

header("location:agenda.php");

?>
