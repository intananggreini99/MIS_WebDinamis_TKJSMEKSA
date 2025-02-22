<?php

require_once "../config.php";

$title = "Tambah User - TKJ SMEKSA";
require_once "../template/header.php";
require_once "../template/navbar.php";
require_once "../template/sidebar.php";


$id = $_GET['id'];
$tampil = mysqli_query($coneksi, "select * from user where id='$id'");
$hasil = mysqli_fetch_array($tampil);


?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Ubah Password User</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
                <li class="breadcrumb-item active">Ubah Password User</li>
            </ol>
            <form method="post" action="ubahpass.php?id=<?PHP echo $_GET['id']; ?>">
                <div class="card col-5">
                    <div class="card-header">
                        <span class="h5 my-2"><i class="fa-solid fa-pen-to-square"></i> Ganti Password</span>
                        <button type="submit" name="Ubah" value="Ubah" class="btn btn-primary float-end"><i class="fa-solid fa-floppy-disk me-1"></i>Ubah</button>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="curPass" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username" value="<?php echo $hasil['username']; ?>">
                            
                        </div>
                        <div class="mb-3">
                            <label for="curPass" class="form-label">Password Lama</label>
                            <input type="text" class="form-control" id="old_password" name="old_password" value="<?php echo $hasil['password']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="newPass" class="form-label">Password Baru</label>
                            <input type="password" class="form-control" id="new_password" name="new_password" placeholder="Masukkan password baru kamu saat ini">
                        </div>
                        <div class="mb-3">
                            <label for="confPass" class="form-label">Konfirmasi Password Baru</label>
                            <input type="password" minlength="5" maxlength="10" class="form-control" id="confirm_password" name="confirm_password" placeholder="Ulangi password baru kamu" required>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </main>

<?php

    require_once "../template/footer.php";

?>