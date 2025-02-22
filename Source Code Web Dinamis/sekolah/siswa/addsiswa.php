<?php

require_once "../config.php";

$title = "SISWA";
require_once "../template/header.php";
require_once "../template/navbar.php";
require_once "../template/sidebar.php";

?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Tambah Data Siswa</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
                <li class="breadcrumb-item active">Tambah Data Siswa</li>
            </ol>
            <form method="post" action="aksiadd.php">
                <div class="card col-5">
                    <div class="card-header">
                        <span class="h5 my-2"><i class="fa-solid fa-square-plus me-3"></i>Tambah Data Siswa</span>
                        <button type="submit" name="Simpan" value="Simpan" class="btn btn-primary float-end shadow"><i class="fa-solid fa-floppy-disk me-1"></i>Simpan</button>
                    </div>
                    <div class="card-body me-1">
                        <div class="d-flex flex-row justify-content-between mb-3">
                            <label class="form-label">NIS</label>
                            <input type="text" class="form-control w-75" id="nis" name="nis"> 
                        </div>
                        <div class="d-flex flex-row justify-content-between mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control w-75" id="nama" name="nama" value=""> 
                        </div>
                        <div class="d-flex flex-row justify-content-between mb-3">
                            <label class="form-label">Email</label>
                            <input type="text" class="form-control w-75" id="email" name="email" value=""> 
                        </div>
                        <div class="d-flex flex-row justify-content-between mb-3 row g-2">
                            <div class="mb-3 col-5">
                                <label class="form-label">Gender</label>
                                <div class="form-control d-flex justify-content-between">
                                    <div class=""><input type="radio" id="jeniskelamin" name="jeniskelamin" value="laki-laki">Laki-laki</div>
                                    <div><input class="" type="radio" id="jeniskelamin" name="jeniskelamin" value="perempuan">Perempuan </div>
                                </div>
                            </div>
                            <div class="mb-3 col-5">
                                <label class="form-label">Class</label>
                                <input type="text" class="form-control" id="kelas" name="kelas"> 
                            </div>
                        </div>
                        <div class="d-flex flex-row justify-content-between mb-3">
                            <label class="form-label">Address</label>
                            <input type="text" class="form-control w-75" id="alamat" name="alamat"> 
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </main>

<?php

    require_once "../template/footer.php";

?>