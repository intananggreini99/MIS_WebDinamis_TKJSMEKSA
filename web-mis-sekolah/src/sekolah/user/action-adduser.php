<?php

    require_once "../config.php";

    $username = esc($_POST['username'] ?? '');
    $password = esc($_POST['password'] ?? '');

    if ($username === '' || $password === '') {
        echo "<script>alert('Username dan password wajib diisi!'); history.back();</script>";
        exit;
    }

    $insert = mysqli_query($coneksi, "INSERT INTO user SET username='$username', password='$password'");

    if (!$insert) {
        echo "<script>alert('User gagal ditambahkan. Username mungkin sudah dipakai.'); history.back();</script>";
        exit;
    }

    header("location: list-user.php");

?>
