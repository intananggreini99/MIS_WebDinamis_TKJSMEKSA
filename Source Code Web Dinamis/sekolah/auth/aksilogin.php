<?php
session_start();
$db = new mysqli('localhost','root','','sekolah');

if ($db -> connect_error) {
    die("Konekski database gagal" . $db -> connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM user WHERE username = '$username' AND  password = '$password'" ;
    $result = $db -> query($sql);

    if ($result->num_rows == 1) {
        $_SESSION["username"] = $username;
        header("location: ../index.php");
    } else {
        echo "username dan password salah";
    }
}

$db ->close();

?>