            <?php 

            require_once "config.php";

            $title = "Dashboard - TKJ SMEKSA";
            require_once "template/header.php";
            require_once "template/navbar1.php";
            require_once "template/sidebar.php";

            ?>
            
    <div id="layoutSidenav_content">
    <main style="height: 90vh;" class="d-flex justify-content-center align-items-center">
        <div class="border border-2 border-warning" style="width: 40rem;background-color: transparent;backdrop-filter: blur(3px);box-shadow: 0 0 10px rgba(0, 0, 0, .2);color: #010101;border-radius: 7px">
            <div class="card-body" style="margin-top: 10px;margin-bottom: 10px;" >
                <h2 class="card-title text-center fw-bolder text-warning" style="text-shadow: 0 0 3px #000000, 0 0 5px #000000;">WELCOME TO</h2>
                <p class="card-text text-center fs-3 fw-bold text-warning" style="text-shadow: 0 0 3px #000000, 0 0 5px #000000;">SIM (Sistem Informasi Manajemen) TKJ</p>
                <p class="text-center fs-6 bg-warning"><a href="https://smkn1kediri.sch.id/kompetensi-keahlian/teknik-jaringan-komputer-dan-telekomunikasi/" class="card-link">SMK Negeri 1 KEDIRI</a></p>
            </div>
        </div>
    </main>

    <footer class="py-4 bg-light border">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; TKJ SMKN 1 Kediri <?= date('Y') ?></div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="<?= $main_url ?>asset/admin/js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="<?= $main_url ?>asset/admin/assets/demo/chart-area-demo.js"></script>
        <script src="<?= $main_url ?>asset/admin/assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="<?= $main_url ?>asset/admin/js/datatables-simple-demo.js"></script>

        <!-- Data Tables -->
        <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.datatables.net/2.0.2/js/dataTables.js"></script>
        <script src="https://cdn.datatables.net/2.0.2/js/dataTables.bootstrap5.js"></script>

    </body>
</html>
