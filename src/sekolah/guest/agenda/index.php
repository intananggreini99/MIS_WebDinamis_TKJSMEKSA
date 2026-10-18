<?php

require_once "../../config.php";

$title = "AGENDA";
require_once "../template/header.php";
require_once "../template/navbar4.php";


?>

<div id="layoutSidenav_content">
<p class="text-center fs-2 fw-bold text-warning" style="margin-top:20px;">AGENDA TAHUNAN TKJ SMKN 1 KEDIRI</p>
    <main class="d-flex justify-content-around align-content-around flex-wrap">
        <?php
            $tampil = mysqli_query($mysqli, "select * from agendatahunan");
            $no = 1;
            while($hasil = mysqli_fetch_array($tampil)){
        ?>
        <div class="card text-bg-dark" style="width: 75%;margin-bottom:50px;">
            <img src="../../agenda/gambar/<?php echo $hasil['gambar']; ?>" class="card-img">
            <div class="card-img-overlay" >
                <h3 class="card-title text-warning fw-bolder" style="background-color: transparent;backdrop-filter: blur(3px);box-shadow: 0 0 10px rgba(0, 0, 0, .2);color: #010101;"><?php echo $hasil['agenda']; ?></h3>
                <p class="card-text text-warning fw-bold" style="background-color: transparent;backdrop-filter: blur(3px);box-shadow: 0 0 10px rgba(0, 0, 0, .2);color: #010101;"><?php echo $hasil['deskrip']; ?></p>
            </div>
        </div>
        <?php
            }
        ?>
    </main>

<?php

    require_once "../template/footer.php";

?>