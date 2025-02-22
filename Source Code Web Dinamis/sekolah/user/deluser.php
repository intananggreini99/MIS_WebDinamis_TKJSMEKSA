<?php

require_once '../config.php';

$id = $_GET["id"];

mysqli_query($coneksi,"DELETE FROM user WHERE id='$id'") or die(mysqli_error($coneksi));

header("location:list-user.php");

?>