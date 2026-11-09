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
            <h1 class="mt-4">Penambahan User</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
                <li class="breadcrumb-item active">Penambahan User</li>
            </ol>
            <form method="post" action="action-adduser.php">
                <div class="card col-7">
                    <div class="card-header">
                        <span class="h5 my-2"><i class="fa-solid fa-square-plus me-3"></i>Tambah Data User</span>
                        <button type="submit" name="Simpan" value="Simpan" class="btn btn-primary float-end shadow"><i class="fa-solid fa-floppy-disk me-1"></i>Simpan</button>
                    </div>
                    <div class="card-body me-1">
                        <div class="row">
                            <div class="mb-3 row">
                                    <label for="username" class="col-sm-2 col-form-label" style="margin-right: -15px;">Username</label>
                                    <label for="" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-5" >
                                        <input type="text" class="form-control border-0 border-bottom" id="username" name="username" maxlength="50">
                                    </div>
                            </div>
                            <div class="mb-3 row">
                                    <label for="password" class="col-sm-2 col-form-label" style="margin-right: -15px;">Password</label>
                                    <label for="" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-5" >
                                        <input type="password" class="form-control border-0 border-bottom" id="password" name="password" maxlength="50">
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </main>

<?php

    require_once "../template/footer.php";

?>