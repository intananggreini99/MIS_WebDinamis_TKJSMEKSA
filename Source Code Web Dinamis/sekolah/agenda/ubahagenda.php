<?php

require_once "../config.php";

$title = "AGENDA TAHUNAN";
require_once "../template/header.php";
require_once "../template/navbar.php";
require_once "../template/sidebar.php";


$id = $_GET['id'];
$tampil = mysqli_query($coneksi, "select * from agendatahunan where id='$id'");
$hasil = mysqli_fetch_array($tampil);


?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Ubah Data Agenda Tahunan</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
                <li class="breadcrumb-item active">Ubah Data Agenda Tahunan</li>
            </ol>
            <form method="post" action="aksiubah.php?id=<?PHP echo $_GET['id']; ?>" enctype="multipart/form-data">
                <div class="card col-5">
                    <div class="card-header">
                        <span class="h5 my-2"><i class="fa-solid fa-square-plus me-3"></i>Ubah Data Agenda Tahunan</span>
                        <button type="submit" name="Simpan" value="Simpan" class="btn btn-primary float-end shadow"><i class="fa-solid fa-floppy-disk me-1"></i>Simpan</button>
                    </div>
                    <div class="card-body me-1">
                        <div class="d-flex flex-row justify-content-between mb-3 row g-2">
                            <div class="mb-3 col-7">
                                <label class="form-label"><strong>Dokumentasi</strong></label><br>
                                <input type="file" class="form-control w-75" id="gambar" name="gambar">
                            </div>
                            <div class="mb-3 col-3">
                                <img src="gambar/<?php echo $hasil['gambar']; ?>" class="img-fluid rounded" style="width: 20vh;">
                            </div>
                        </div>
                        <div class="d-flex flex-row justify-content-between mb-3">
                            <label class="form-label"><strong>Judul Agenda</strong></label>
                            <input type="text" class="form-control w-75" id="agenda" name="agenda" value="<?php echo $hasil['agenda']; ?>"> 
                        </div>
            
                        <div class="d-flex flex-row justify-content-between mb-3">
                            <label class="form-label"><strong>Keterangan</strong></label>
                            <textarea class="form-control w-75" aria-label="With textarea" type="text" id="deskrip" name="deskrip"><?php echo $hasil['deskrip']; ?></textarea> 
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </main>

<?php

    require_once "../template/footer.php";

?>