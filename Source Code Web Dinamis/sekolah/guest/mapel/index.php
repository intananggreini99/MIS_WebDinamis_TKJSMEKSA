<?php

$mysqli = new mysqli("localhost","root","","sekolah");

require_once "../../config.php";

$title = "MATA PELAJARAN";
require_once "../template/header.php";
require_once "../template/navbar3.php";

?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <div class="d-flex flex-row justify-content-between align-items-center">
                <div>
                    <h1 class="mt-4 text-warning">MATA PELAJARAN</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item fs-5"><a href="../index.php">Home</a></li>
                        <li class="breadcrumb-item active fs-5 text-warning">Mata Pelajaran</li>
                    </ol>
                </div>
                <div>
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
                            <script>
                                var jamkbm = CKEDITOR.replace('jamkbm');  
                                jamkbm.on('key', function(ev) {
                                if (ev.data.keyCode==13)
                                {
                                    ev.cancel();
                                    console.log('enter');
                                }       
                                }); 
                            </script>
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