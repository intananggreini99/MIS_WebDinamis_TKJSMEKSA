<?php

require_once "../config.php";

$title = "PENDIDIK|TENDIK";
require_once "../template/header.php";
require_once "../template/navbar.php";
require_once "../template/sidebar.php";


$id = $_GET['id'];
$tampil = mysqli_query($coneksi, "select * from guru where id='$id'");
$hasil = mysqli_fetch_array($tampil);


?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Ubah Data Pendidik & Tendik</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
                <li class="breadcrumb-item active">Ubah Data Pendidik & Tendik</li>
            </ol>
            <form method="post" action="ubahaction.php?id=<?PHP echo $_GET['id']; ?>" enctype="multipart/form-data">
                <div class="card col-5">
                    <div class="card-header">
                        <span class="h5 my-2"><i class="fa-solid fa-square-plus me-3"></i>Ubah Data Pendidik & Tendik</span>
                        <button type="submit" name="Simpan" value="Simpan" class="btn btn-primary float-end shadow"><i class="fa-solid fa-floppy-disk me-1"></i>Simpan</button>
                    </div>
                    <div class="card-body me-1">
                        <div class="d-flex flex-row justify-content-between mb-3 row g-2">
                            <div class="mb-3 col-7">
                                <label class="form-label"><strong>Photo</strong></label><br>
                                <input type="file" class="form-control w-75" id="foto" name="foto">
                            </div>
                            <div class="mb-3 col-3">
                                <img src="foto/<?php echo $hasil['foto']; ?>" class="img-fluid rounded" style="width: 20vh;">
                            </div>
                        </div>
                        <div class="d-flex flex-row justify-content-between mb-3">
                            <label class="form-label"><strong>Name</strong></label>
                            <input type="text" class="form-control w-75" id="nama" name="nama" value="<?php echo $hasil['nama']; ?>"> 
                        </div>
                        <div class="d-flex flex-row justify-content-between mb-3">
                            <label class="form-label"><strong>Email</strong></label>
                            <input type="text" class="form-control w-75" id="email" name="email" value="<?php echo $hasil['email']; ?>"> 
                        </div>
                        <div class="d-flex flex-row justify-content-between mb-3 row g-2">
                            <div class="mb-3 col-5">
                                <label class="form-label"><strong>Gender</strong></label>
                                <div class="form-control d-flex justify-content-between">
                                    <div class=""><input type="radio" <?php if($hasil['jeniskelamin']=="Laki-laki"){ echo "checked"; } ?> id="jeniskelamin" name="jeniskelamin" value="laki-laki" required="required">Laki-laki</div>
                                    <div><input class="" type="radio" <?php if($hasil['jeniskelamin']=="Perempuan"){ echo "checked"; } ?> id="jeniskelamin" name="jeniskelamin" value="perempuan" required="required">Perempuan </div>
                                </div>
                            </div>
                            <div class="mb-3 col-5">
                                <label class="form-label"><strong>Position</strong></label>
                                <input type="text" class="form-control" id="jabatan" name="jabatan" value="<?php echo $hasil['jabatan']; ?>"> 
                            </div>
                        </div>
                        <div class="d-flex flex-row justify-content-between mb-3">
                            <label class="form-label"><strong>Address</strong></label>
                            <input type="text" class="form-control w-75" id="alamat" name="alamat" value="<?php echo $hasil['alamat']; ?>"> 
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </main>

<?php

    require_once "../template/footer.php";

?>