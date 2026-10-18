<?php

require_once "../config.php";

$title = "AGENDA";
require_once "../template/header.php";
require_once "../template/navbar.php";
require_once "../template/sidebar.php";


?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <div class="d-flex flex-row justify-content-between align-items-center">
                <div>
                    <h1 class="mt-4">Daftar Agenda Tahunan</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item fs-5"><a href="../index.php">Home</a></li>
                        <li class="breadcrumb-item active fs-5">Daftar Agenda Tahunan</li>
                    </ol>
                </div>
                <div>
                    <a href="addagenda.php"><button class="mt-4 fs-5 text-bg-success border-0 rounded p-2 shadow"><i class="fa-solid fa-file-circle-plus me-2"></i>Tambah Data</button></a>
                </div>
            </div>
            <table id="example" class="table table-striped table-hover" style="width:100%">
                <thead >
                    <tr class="table-dark">
                        <th class="text-center border-end border-white border-1" style="width:30%">DOKUMENTASI</th>
                        <th class="text-center border-end border-white border-1" style="width:15%">AGENDA</th>
                        <th class="text-center border-end border-white border-1" style="width:40%">KETERANGAN</th>
                        <th class="text-center border-end border-white border-1" style="width:15%">Ubah</th>
                    </tr>
                </thead>
                <?php

                    $tampil = mysqli_query($mysqli, "select * from agendatahunan");
                    $no = 1;
                    while($hasil = mysqli_fetch_array($tampil)){
                ?>
                <tbody >
                    <tr class="">
                        <td class="border border-1 border-end"><div class="d-flex justify-content-center"><img src="gambar/<?php echo $hasil['gambar']; ?>" class="flex-shrink-0 img-fluid rounded" style="width: 90%;"></div></td>
                        <td class="border border-1 border-end"><div class=""><?php echo $hasil['agenda']; ?></div></td>
                        <td class="border border-1 border-end"><div class=""><?php echo $hasil['deskrip']; ?></div></td>
                        <td class="border border-1 border-end">
                            <div class="d-flex justify-content-evenly">
                                <a href="ubahagenda.php?id=<?php echo $hasil['id']; ?>"><button class="shadow-sm text-bg-success border-0 rounded" style="font-size:'large';">Ubah Data</button></a>
                                <a href="delagenda.php?id=<?php echo $hasil['id']; ?>"><button class="shadow-sm  text-bg-danger border-0 rounded" style="font-size:'large';">Hapus</button>
                            </div>
                        </td>
                    </tr>
                </tbody>
                <?php
                    }
                ?>
            </table>
        </div>

    </main>

<?php

    require_once "../template/footer.php";

?>