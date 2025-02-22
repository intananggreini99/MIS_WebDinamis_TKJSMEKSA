<?php

    require_once "../config.php";
    $id = $_GET['id'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $jeniskelamin = $_POST['jeniskelamin'];
    $jabatan = $_POST['jabatan'];
    $alamat = $_POST['alamat'];

    $rand = rand();
    $ekstensi = array('png','jpg','jpeg');
    $filename = $_FILES['foto']['name'];
    $ukuran = $_FILES['foto']['size'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);

    if (!in_array($ext,$ekstensi)){
        mysqli_query($coneksi, "update guru set nama='$nama',email='$email',jabatan='$jabatan', jeniskelamin='$jeniskelamin', alamat='$alamat' where id='$id' ");
        return header("location: dataguru.php");
    }else{
        if ($ukuran < 3044070){
            $xx = $rand.'_'.$filename;
            move_uploaded_file($_FILES['foto']['tmp_name'], 'foto/'.$rand.'_'.$filename);
            mysqli_query($coneksi,"UPDATE guru SET foto='$xx',nama='$nama',email='$email',jabatan='$jabatan', jeniskelamin='$jeniskelamin', alamat='$alamat' where id='$id'");
            return header("location: dataguru.php");
        }else{
            header("location:../index.php?alert=gagak_ukuran");
        }
    }

?>