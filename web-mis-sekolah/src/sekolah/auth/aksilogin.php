<?php

require_once "../config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = esc($_POST['username'] ?? '');
    $password = esc($_POST['password'] ?? '');

    $sql    = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($coneksi, $sql);

    if ($result && mysqli_num_rows($result) == 1) {
        $_SESSION["username"] = $username;
        $_SESSION["email"]    = $username;
        $_SESSION["level"]    = "admin";
        header("location: ../index.php");
        exit;
    }

    header("location: login.php?pesan=gagal");
    exit;
}

header("location: login.php");

?>
