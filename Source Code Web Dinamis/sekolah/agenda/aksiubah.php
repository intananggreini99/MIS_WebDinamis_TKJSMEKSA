<?php

    require_once "../config.php";
    $id = $_GET['id'];
    $agenda = $_POST['agenda'];
    $deskrip = $_POST['deskrip'];

    $rand = rand();
    $ekstensi = array('png','jpg','jpeg');
    $filename = $_FILES['gambar']['name'];
    $ukuran = $_FILES['gambar']['size'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);


    if (!in_array($ext,$ekstensi)){
        mysqli_query($coneksi, "update agendatahunan set gambar='$xx',agenda='$agenda',deskrip='$deskrip' where id='$id' ");
        return header("location: agenda.php");
    }else{
        if ($ukuran < 3044070){
            $xx = $rand.'_'.$filename;
            move_uploaded_file($_FILES['gambar']['tmp_name'], 'gambar/'.$rand.'_'.$filename);
            mysqli_query($coneksi,"UPDATE agendatahunan SET gambar='$xx',agenda='$agenda',deskrip='$deskrip' where id='$id'");
            return header("location: agenda.php");
        }else{
            header("location:../index.php?alert=gagak_ukuran");
        }
    }

?>

<?php

require_once "../config.php";

$agenda = $_POST['agenda'];
$deskrip = $_POST['deskrip'];

$rand = rand();
$ekstensi = array('png','jpg','jpeg');
$filename = $_FILES['gambar']['name'];
$ukuran = $_FILES['gambar']['size'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);

if (!in_array($ext,$ekstensi)){
	header("location:../index.php?alert=gagal_ekstensi");
}else{
	if ($ukuran < 3044070){
		$xx = $rand.'_'.$filename;
		move_uploaded_file($_FILES['gambar']['tmp_name'], 'gambar/'.$rand.'_'.$filename);
		mysqli_query($coneksi,"UPDATE agendatahunan SET gambar='$xx',agenda='$agenda',deskrip='$deskrip'");
		header("location:agenda.php?alert=berhasil");
	}else{
		header("location:../index.php?alert=gagak_ukuran");
	}
}


?>