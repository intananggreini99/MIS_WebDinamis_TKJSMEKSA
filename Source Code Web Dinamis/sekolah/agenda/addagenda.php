<?php

require_once "../config.php";

$title = "AGENDA TAHUNAN";
require_once "../template/header.php";
require_once "../template/navbar.php";
require_once "../template/sidebar.php";


?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Tambah Agenda Tahunan</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
                <li class="breadcrumb-item active">Tambah Agenda Tahunan</li>
            </ol>
            <form method="post" action="aksiadd.php" enctype="multipart/form-data">
                <div class="card col-5">
                    <div class="card-header">
                        <span class="h5 my-2"><i class="fa-solid fa-square-plus me-3"></i>Tambah Agenda</span>
                        <button type="submit" name="Simpan" value="Simpan" class="btn btn-primary float-end shadow"><i class="fa-solid fa-floppy-disk me-1"></i>Simpan</button>
                    </div>
                    <div class="card-body me-1">
                        <div class="d-flex flex-row justify-content-between mb-3">
                            <label class="form-label">Dokumentasi</label>
                            <input type="file" class="form-control w-75" id="gambar" name="gambar" required="required">
                        </div>
                        <div class="d-flex flex-row justify-content-between mb-3">
                            <label class="form-label">Judul Agenda</label>
                            <input type="text" class="form-control w-75" id="agenda" name="agenda" required="required"> 
                        </div>
                        <div class="d-flex flex-row justify-content-between mb-3">
                            <label class="form-label">Keterangan</label>
                            <textarea class="form-control w-75" aria-label="With textarea" type="text" id="deskrip" name="deskrip" required="required"></textarea>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </main>

<?php

    require_once "../template/footer.php";

?>