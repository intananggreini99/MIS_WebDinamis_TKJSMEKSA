<?php

require_once "../config.php";

$title = "MATA PELAJARAN";
require_once "../template/header.php";
require_once "../template/navbar.php";
require_once "../template/sidebar.php";


?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <div class="d-flex flex-row justify-content-between align-items-center">
                <div>
                    <h1 class="mt-4">MATA PELAJARAN</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item fs-5"><a href="../index.php">Home</a></li>
                        <li class="breadcrumb-item active fs-5">Mata Pelajaran</li>
                    </ol>
                </div>
                <div>
                    <a href="addmapel.php"><button class="mt-4 fs-5 text-bg-success border-0 rounded p-2 shadow"><i class="fa-solid fa-square-plus me-2"></i>Tambah Data</button></a>
                </div>
            </div>
            <div class="overflow-auto ">
                <table id="example" class="table table-striped table-hover" style="width:100%">
                    <thead >
                        <tr class="table-dark">
                            <th class="text-center border-end border-white border-1" style="width:10%">Nomor</th>
                            <th class="text-center border-end border-white border-1" style="width:15%">Mata Pelajaran</th>
                            <th class="text-center border-end border-white border-1" style="width:20%">Pengampu</th>
                            <th class="text-center border-end border-white border-1" style="width:35%">Jam Aktif KBM</th>
                            <th class="text-center border-end border-white border-1" style="width:20%">Aksi</th>
                        </tr>
                    </thead>
                    <?php

                        $tampil = mysqli_query($mysqli, "select * from mapel");
                        $no = 1;
                        while($hasil = mysqli_fetch_array($tampil)){
                    ?>
                    <tbody >
                        <tr>
                            <td class="text-center text-bg-primary text-light shadow fw-bolder"><?php echo $hasil['id']; ?></td>
                            <td class="border border-1 border-end"><?php echo $hasil['nama']; ?></td>
                            <td class="border border-1 border-end"><?php echo $hasil['pengampu']; ?></td>
                            <td  name="jamkbm" id="jamkbm" class="border border-1 border-end"><?php echo $hasil['jamkbm']; ?></td>
                            <td class="border border-1 border-end">
                                <div class="d-flex justify-content-evenly">
                                    <a href="ubahmapel.php?id=<?php echo $hasil['id']; ?>"><button class="shadow-sm text-bg-success border-0 rounded" style="font-size:'large';">Ubah Data</button></a>
                                    <a href="delmapel.php?id=<?php echo $hasil['id']; ?>"><button class="shadow-sm  text-bg-danger border-0 rounded" style="font-size:'large';">Hapus</button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                    <?php
                        }
                    ?>
                </table>
            </div>
        </div>

    </main>

<?php

    require_once "../template/footer.php";

?>