<body class="sb-nav-fixed" style="background-color:#000000; min-height: 200vh;background-repeat: no-repeat;background-size: cover;background-position: center;">
    <nav class=" navbar navbar-expand navbar-dark accordion bg-warning">
        <div class="container-fluid justify-content-between">
            <div class="logo">
                <a class="navbar-brand fw-bolder" href="../index.php" style="color:#010101">
                    <img src="<?= $main_url ?>asset/img/logoSmk.png" alt="" width="50" class="me-3">TKJ SMKN 1 KEDIRI
                </a>
            </div>
            <div class="navbar">
                <ul class="nav justify-content-center" >
                    <li class="nav-item me-3">
                        <a class="nav-link active" aria-current="page" href="../guru/index.php">
                            <i class="fa-solid fa-person-chalkboard fa-xl" style="color:#010101;"></i>
                        </a>
                    </li>
                    <li class="nav-item me-3">
                        <a class="nav-link" href="../siswa/index.php">
                            <i class="fa-solid fa-users fa-xl" style="color:#010101;"></i>
                        </a>
                    </li>
                    <li class="nav-item me-3">
                        <a class="nav-link" href="../mapel/index.php"><i class="fa-solid fa-book fa-xl" style="color:#010101;"></i></a>
                    </li>
                    <li class="nav-item me-3">
                        <a class="nav-link" href="#"><i class="fa-solid fa-calendar fa-xl" style="color:#010101;"></i></a>
                    </li>
                    <li class="nav-item me-3">
                        <a class="nav-link" href="/logout.php"><i class="fa-solid fa-door-open fa-xl" style="color:#010101;"></i></i></a>
                    </li>
                </ul>
            </div>
            <button type="button" class="btn btn-dark">
                <a class="navbar-brand ms-2 text-warning" href="<?= $profile_url ?>" target="_blank" rel="noopener" style="color:#010101">About Developer
                    <img src="<?= $main_url ?>asset/img/intan.jpg" alt="" width="40" class="rounded ms-3">
                </a>
            </button>
        </div>
    </nav>
