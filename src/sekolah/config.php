<?php
/*
 * Konfigurasi utama Web MIS Sekolah.
 *
 * Nilai koneksi database dibaca dari environment variable (diisi oleh
 * docker-compose). Jika dijalankan di XAMPP tanpa Docker, otomatis memakai
 * nilai default XAMPP: localhost / root / tanpa password / database "sekolah".
 */

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$db_host = getenv('DB_HOST') ?: 'localhost';
$db_user = getenv('DB_USER') ?: 'root';
$db_pass = getenv('DB_PASS') !== false ? getenv('DB_PASS') : '';
$db_name = getenv('DB_NAME') ?: 'sekolah';
$db_port = (int) (getenv('DB_PORT') ?: 3306);

mysqli_report(MYSQLI_REPORT_OFF);
$coneksi = mysqli_connect($db_host, $db_user, $db_pass, $db_name, $db_port);

if (!$coneksi) {
    die("Gagal koneksi ke database: " . mysqli_connect_error());
}
mysqli_set_charset($coneksi, 'utf8mb4');

// Alias agar kode lama yang memakai $mysqli tetap berjalan.
$mysqli = $coneksi;

// URL dasar aplikasi (relatif terhadap root web server, jadi aman di port berapa pun).
$main_url = "/sekolah/";

// Link tombol "About Developer" di halaman guest -> situs profil (proyek terpisah).
$profile_url = getenv('PROFILE_URL') ?: '#';

/*
 * Proteksi halaman berdasarkan session login.
 *  - /sekolah/auth/*  : bebas diakses (halaman login admin)
 *  - /sekolah/guest/* : harus login (admin, guru, atau siswa)
 *  - selain itu       : khusus admin
 */
$halaman = str_replace('\\', '/', $_SERVER['SCRIPT_NAME'] ?? '');
if (strpos($halaman, '/sekolah/auth/') === false) {
    $level = $_SESSION['level'] ?? null;
    if (strpos($halaman, '/sekolah/guest/') !== false) {
        if (!in_array($level, ['admin', 'guru', 'siswa'], true)) {
            header("location: /index.php?pesan=belum_login");
            exit;
        }
    } elseif ($level !== 'admin') {
        header("location: /index.php?pesan=belum_login");
        exit;
    }
}

// Helper kecil untuk meng-escape input sebelum dimasukkan ke query.
function esc($nilai)
{
    global $coneksi;
    return mysqli_real_escape_string($coneksi, trim((string) $nilai));
}
