<div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion bg-light" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">User Admin</div>
                            <a class="nav-link" href="<?= $main_url ?>user/list-user.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-users"></i></div>
                                List User
                            </a>
                            <a class="nav-link" href="<?= $main_url ?>user/add-user.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-user-plus"></i></div>
                                Add
                            </a>
                            <hr class="mb-0">
                            <div class="sb-sidenav-menu-heading">Data</div>
                            <a class="nav-link" href="<?= $main_url ?>siswa/datasiswa.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-users"></i></div>
                                Siswa
                            </a>
                            <a class="nav-link" href="<?= $main_url ?>guru/dataguru.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-chalkboard-user"></i></div>
                                Pendidik & Tendik
                            </a>
                            <a class="nav-link" href="<?= $main_url ?>mapel/datamapel.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-book"></i></div>
                                Mata Pelajaran
                            </a>
                            <a class="nav-link" href="<?= $main_url ?>agenda/agenda.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-calendar-days"></i></div>
                                Agenda Tahunan
                            </a>
                            <hr class="mb-0">
                        </div>
                    </div>
                    <div class="sb-sidenav-footer border">
                        <div class="small">Logged in as:</div>
                        <?= htmlspecialchars($_SESSION['email'] ?? 'Admin') ?>
                    </div>
                </nav>
            </div>
