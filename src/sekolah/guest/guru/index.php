<?php 

require_once "../../config.php";

$title = "PENDIDIK | TENDIK";
require_once "../template/header.php";
require_once "../template/navbar1.php";

?>

<div id="layoutSidenav_content">
    <p class="text-center fs-2 fw-bold text-warning" style="margin-top:20px;">PENDIDIK & TENDIK TKJ SMKN 1 KEDIRI</p>
    <main style="height: 90vh;padding-bottom:75px;" class="d-flex justify-content-around align-content-around flex-wrap">
        <?php
            $tampil = mysqli_query($mysqli, "select * from guru");
            $no = 1;
            while($hasil = mysqli_fetch_array($tampil)){
        ?>
        <div class="card d-flex align-content-around" style="width: 14rem;margin-top:50px;margin-bottom:50px;margin-left:50px;margin-right:50px;">
            <img src="../../guru/foto/<?php echo $hasil['foto']; ?>" class="card-img-top img-fluid rounded" >
            <div class="card-body">
                <p class="fs-6">NAMA : <span><?php echo $hasil['nama']; ?></span></p>
            </div>
        </div>
        <?php
            }
        ?>
    </main>

<?php

require_once "../template/footer.php";

?>