<?php

require_once "../config.php";

$id          = (int) $_GET['id'];
$newpass    = $_POST['new_password'] ?? '';
$confirmpass = $_POST['confirm_password'] ?? '';

// password baru wajib diisi dan harus sama dengan konfirmasinya
if ($newpass === '' || $newpass !== $confirmpass) {
    echo "<script>alert('Password baru dan konfirmasi harus diisi dan sama!'); history.back();</script>";
    exit;
}

$newpass = esc($newpass);
mysqli_query($coneksi, "UPDATE user SET password='$newpass' WHERE id='$id'");

header("location: list-user.php");

?>
