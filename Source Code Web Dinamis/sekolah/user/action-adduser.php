<?php

    $mysqli = new mysqli("localhost","root","","sekolah");

    $username = $_POST['username'];
    $password = $_POST['password'];

    $insert = mysqli_query($mysqli, "INSERT INTO user SET username='$username', password='$password'");

    header("location: list-user.php");

?>