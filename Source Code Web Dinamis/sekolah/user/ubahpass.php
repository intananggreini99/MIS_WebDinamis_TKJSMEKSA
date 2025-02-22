<?php

require_once "../config.php";

$id = $_GET['id'];
$oldpass = $_POST['old_password'];
$newpass = $_POST['new_password'];
$confirmpass = $_POST['confirm_password'];

$updatepass = mysqli_query($coneksi,"UPDATE user SET password='$newpass' WHERE id='$id'");

if ($newpass && $confirmpass) {

    mysqli_affected_rows($coneksi);
    return header("location: list-user.php");

}else{
    echo"gagal menambahkan";
}

?>