<?php

$mysqli = new mysqli("localhost","root","","sekolah");

require_once "../config.php";

$title = "Tambah User - TKJ SMEKSA";
require_once "../template/header.php";
require_once "../template/navbar.php";
require_once "../template/sidebar.php";


?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">List User</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
                <li class="breadcrumb-item active">List User</li>
            </ol>
            <table id="example" class="table table-striped" style="width:50%">
                <thead >
                    <tr class="table-dark">
                        <th class="text-center col-1 border-end border-white border-1" style="width:5%">ID</th>
                        <th class="text-center col-2 border-end border-white border-1">USERNAME</th>
                        <th class="text-center col-2 border-end border-white border-1">AKSI</th>
                    </tr>
                </thead>
                <?php

                    $tampil = mysqli_query($mysqli, "select * from user" );
                    $no = 1;
                    while($hasil = mysqli_fetch_array($tampil)){
                ?>
                <tbody >
                    <tr>
                        <td class="text-center text-bg-secondary"><?php echo $hasil['id']; ?></td>
                        <td class="border border-1 border-end"><?php echo $hasil['username']; ?></td>
                        <td class="d-flex justify-content-around">
                            <a href="edit-user.php?id=<?php echo $hasil['id']; ?>"><button class="ms-7 text-bg-success border-0 rounded">Ubah Password</button></a>
                            <a href="deluser.php?id=<?php echo $hasil['id']; ?>"><button class="ms-3 text-bg-danger border-0 rounded">Hapus</button></a>
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