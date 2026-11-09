<?php

require_once "../config.php";

$title = "PENDIDIK|TENDIK";
require_once "../template/header.php";
require_once "../template/navbar.php";
require_once "../template/sidebar.php";


?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Tambah Data Pendidik & Tendik</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
                <li class="breadcrumb-item active">Tambah Data Pendidik & Tendik</li>
            </ol>
            <form method="post" action="aksiadd.php" enctype="multipart/form-data">
                <div class="card col-5">
                    <div class="card-header">
                        <span class="h5 my-2"><i class="fa-solid fa-square-plus me-3"></i>Tambah Data Pendidik & Tendik</span>
                        <button type="submit" name="Simpan" value="Simpan" class="btn btn-primary float-end shadow"><i class="fa-solid fa-floppy-disk me-1"></i>Simpan</button>
                    </div>
                    <div class="card-body me-1">
                        <div class="d-flex flex-row justify-content-between mb-3">
                            <label class="form-label">Photo</label>
                            <input type="file" class="form-control w-75" id="foto" name="foto" accept=".png,.jpg,.jpeg" required="required">
                        </div>
                        <div class="d-flex flex-row justify-content-between mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control w-75" id="nama" name="nama" required="required"> 
                        </div>
                        <div class="d-flex flex-row justify-content-between mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control w-75" id="email" name="email" required="required"> 
                        </div>
                        <div class="d-flex flex-row justify-content-between mb-3 row g-2">
                            <div class="mb-3 col-5">
                                <label class="form-label">Gender</label>
                                <div class="form-control d-flex justify-content-between">
                                    <div class=""><input type="radio" id="jeniskelamin" name="jeniskelamin" value="laki-laki" required="required">Laki-laki</div>
                                    <div><input class="" type="radio" id="jeniskelamin" name="jeniskelamin" value="perempuan" required="required">Perempuan </div>
                                </div>
                            </div>
                            <div class="mb-3 col-5">
                                <label class="form-label">Position</label>
                                <input type="text" class="form-control" id="jabatan" name="jabatan" required="required"> 
                            </div>
                        </div>
                        <div class="d-flex flex-row justify-content-between mb-3">
                            <label class="form-label">Address</label>
                            <input type="text" class="form-control w-75" id="alamat" name="alamat" required="required"> 
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </main>

<?php

    require_once "../template/footer.php";

?>