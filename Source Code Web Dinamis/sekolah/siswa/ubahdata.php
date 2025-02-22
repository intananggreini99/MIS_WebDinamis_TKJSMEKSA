<?php

require_once "../config.php";

$title = "Tambah User - TKJ SMEKSA";
require_once "../template/header.php";
require_once "../template/navbar.php";
require_once "../template/sidebar.php";


$nis = $_GET['nis'];
$tampil = mysqli_query($coneksi, "select * from siswa where nis='$nis'");
$hasil = mysqli_fetch_array($tampil);

?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Ubah Data Siswa</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
                <li class="breadcrumb-item active">Ubah Data Siswa</li>
            </ol>
            <form method="post" action="aksiubah.php?nis=<?PHP echo $_GET['nis']; ?>">
                <div class="card col-5">
                    <div class="card-header">
                        <span class="h5 my-2"><i class="fa-solid fa-pen-to-square"></i> Ubah Data Siswa</span>
                        <button type="submit" name="Ubah" value="Ubah" class="btn btn-primary float-end"><i class="fa-solid fa-floppy-disk me-1"></i>Ubah</button>
                    </div>
                    <div class="card-body me-1">
                        <div class="d-flex flex-row justify-content-between mb-3">
                            <label class="form-label">NIS</label>
                            <input type="text" class="form-control w-75" id="nis" name="nis" value="<?php echo $hasil['nis']; ?>"> 
                        </div>
                        <div class="d-flex flex-row justify-content-between mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control w-75" id="nama" name="nama" value="<?php echo $hasil['nama']; ?>"> 
                        </div>
                        <div class="d-flex flex-row justify-content-between mb-3">
                            <label class="form-label">Email</label>
                            <input type="text" class="form-control w-75" id="email" name="email" value="<?php echo $hasil['email']; ?>"> 
                        </div>
                        <div class="d-flex flex-row justify-content-between mb-3 row g-2">
                            <div class="mb-3 col-5">
                                <label class="form-label">Gender</label>
                                <div class="form-control d-flex justify-content-between">
                                    <div class=""><input type="radio" <?php if($hasil['jeniskelamin']=="Laki-laki"){ echo "checked"; } ?> id="jeniskelamin" name="jeniskelamin" value="laki-laki">Laki-laki</div>
                                    <div><input class="" type="radio" <?php if( $hasil['jeniskelamin']=="Perempuan"){ echo "checked"; } ?> id="jeniskelamin" name="jeniskelamin" value="perempuan">Perempuan </div>
                                </div>
                            </div>
                            <div class="mb-3 col-5">
                                <label class="form-label">Class</label>
                                <input type="text" class="form-control" id="kelas" name="kelas" value="<?php echo $hasil['kelas']; ?>"> 
                            </div>
                        </div>
                        <div class="d-flex flex-row justify-content-between mb-3">
                            <label class="form-label">Address</label>
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