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
            <div class="d-flex flex-row justify-content-between align-items-center">
                <div>
                    <h1 class="mt-4">Daftar Siswa</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item fs-5"><a href="../index.php">Home</a></li>
                        <li class="breadcrumb-item active fs-5">Daftar Siswa</li>
                    </ol>
                </div>
                <div>
                    <a href="addsiswa.php"><button class="mt-4 fs-5 text-bg-success border-0 rounded p-2 shadow"><i class="fa-solid fa-user-plus me-2"></i>Tambah Data</button></a>
                </div>
            </div>
            <table id="example" class="table table-striped table-hover" style="width:100%">
                <thead >
                    <tr class="table-dark">
                        <th class="text-center border-end border-white border-1" style="width:5%">NIS</th>
                        <th class="text-center border-end border-white border-1" style="width:20%">NAMA</th>
                        <th class="text-center border-end border-white border-1" style="width:8%">GENDER</th>
                        <th class="text-center border-end border-white border-1" style="width:8%">KELAS</th>
                        <th class="text-center border-end border-white border-1" style="width:15%">EMAIL</th>
                        <th class="text-center border-end border-white border-1" style="width:25%">ALAMAT</th>
                        <th class="text-center border-end border-white border-1" style="width:19%">AKSI</th>
                    </tr>
                </thead>
                <?php

                    $tampil = mysqli_query($mysqli, "select * from siswa");
                    $no = 1;
                    while($hasil = mysqli_fetch_array($tampil)){
                ?>
                <tbody >
                    <tr>
                        <td class="text-center text-bg-primary text-light shadow fw-bolder"><?php echo $hasil['nis']; ?></td>
                        <td class="border border-1 border-end"><?php echo $hasil['nama']; ?></td>
                        <td class="border border-1 border-end"><?php echo $hasil['jeniskelamin']; ?></td>
                        <td class="border border-1 border-end"><?php echo $hasil['kelas']; ?></td>
                        <td class="border border-1 border-end text-bg-warning text-dark"><?php echo $hasil['email']; ?></td>
                        <td class="border border-1 border-end"><?php echo $hasil['alamat']; ?></td>
                        <td class="border border-1 border-end">
                            <div class="d-flex justify-content-evenly">
                                <a href="ubahdata.php?nis=<?php echo $hasil['nis']; ?>"><button class="shadow-sm text-bg-success border-0 rounded" style="font-size:'large';">Ubah Data</button></a>
                                <a href="hapusdata.php?nis=<?php echo $hasil['nis']; ?>"><button class="shadow-sm  text-bg-danger border-0 rounded" style="font-size:'large';">Hapus</button>
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