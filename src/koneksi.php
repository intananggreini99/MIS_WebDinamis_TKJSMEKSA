<?php
/*
 * Koneksi database untuk halaman login (root web).
 * Nilai dibaca dari environment variable (Docker) dengan default XAMPP.
 */
$db_host = getenv('DB_HOST') ?: 'localhost';
$db_user = getenv('DB_USER') ?: 'root';
$db_pass = getenv('DB_PASS') !== false ? getenv('DB_PASS') : '';
$db_name = getenv('DB_NAME') ?: 'sekolah';
$db_port = (int) (getenv('DB_PORT') ?: 3306);

mysqli_report(MYSQLI_REPORT_OFF);
$mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name, $db_port);

if ($mysqli->connect_error) {
    die("Gagal koneksi ke database: " . $mysqli->connect_error);
}
$mysqli->set_charset('utf8mb4');
?>
