<?php

require_once "../../config.php";

$title = "SISWA";
require_once "../template/header.php";
require_once "../template/navbar2.php";


?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <div class="d-flex flex-row justify-content-between align-items-center">
                <div>
                    <h1 class="mt-4 text-warning">Daftar Siswa</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item fs-5"><a href="../index.php">Home</a></li>
                        <li class="breadcrumb-item active fs-5 text-warning">Daftar Siswa</li>
                    </ol>
                </div>
                <div>
                    
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