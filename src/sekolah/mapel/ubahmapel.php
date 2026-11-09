<?php

require_once "../config.php";

$title = "MATA PELAJARAN";
require_once "../template/header.php";
require_once "../template/navbar.php";
require_once "../template/sidebar.php";

$id = (int) $_GET['id'];
$tampil = mysqli_query($coneksi, "select * from mapel where id='$id'");
$hasil = mysqli_fetch_array($tampil);

?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Ubah Data Mata Pelajaran</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
                <li class="breadcrumb-item active">Ubah Data Mata Pelajaran</li>
            </ol>
            <form method="post" action="aksiubah.php?id=<?= $id ?>">
                <div class="card col-5">
                    <div class="card-header">
                        <span class="h5 my-2"><i class="fa-solid fa-square-plus me-3"></i>Mata Pelajaran</span>
                        <button type="submit" name="Simpan" value="Simpan" class="btn btn-primary float-end shadow"><i class="fa-solid fa-floppy-disk me-1"></i>Simpan</button>
                    </div>
                    <div class="card-body me-1">
                        <div class="d-flex flex-row justify-content-between mb-3">
                            <label class="form-label col-2">Mata Pelajaran</label>
                            <input type="text" class="form-control w-75" id="mapel" name="mapel" value="<?php echo $hasil['nama']; ?>"> 
                        </div>
                        <div class="d-flex flex-row justify-content-between mb-3">
                            <label class="form-label">Pengajar</label>
                            <input type="text" class="form-control w-75" id="pengajar" name="pengajar" value="<?php echo $hasil['pengampu']; ?>"> 
                        </div>
                        <div class="d-flex flex-row justify-content-between mb-3">
                            <label class="form-label">Jam Aktif KBM</label>
                            <textarea class="form-control w-75" aria-label="With textarea" type="text" id="jamkbm" name="jamkbm"><?php echo $hasil['jamkbm']; ?></textarea>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </main>

<?php

    require_once "../template/footer.php";

?>