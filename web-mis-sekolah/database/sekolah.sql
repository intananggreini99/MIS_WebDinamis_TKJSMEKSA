-- =====================================================================
--  Database  : sekolah
--  Aplikasi  : Web MIS (Sistem Informasi Manajemen) TKJ SMKN 1 Kediri
--  DBMS      : MySQL 8.0 (kompatibel dengan MariaDB 10.4+ / XAMPP)
--
--  File ini berisi:
--    1. CREATE DATABASE
--    2. CREATE TABLE untuk semua tabel yang dipakai fitur CRUD
--    3. Data awal (seed) yang diambil dari Laporan Praktikum
--
--  Di Docker, file ini otomatis dijalankan oleh container MySQL saat
--  pertama kali dibuat (folder /docker-entrypoint-initdb.d).
--  Di XAMPP, import lewat phpMyAdmin > Impor, atau:
--      mysql -u root < database/sekolah.sql
-- =====================================================================

SET NAMES utf8mb4;
SET time_zone = '+07:00';

CREATE DATABASE IF NOT EXISTS sekolah
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_general_ci;

USE sekolah;

DROP TABLE IF EXISTS allin;
DROP TABLE IF EXISTS user;
DROP TABLE IF EXISTS siswa;
DROP TABLE IF EXISTS guru;
DROP TABLE IF EXISTS mapel;
DROP TABLE IF EXISTS agendatahunan;


-- ---------------------------------------------------------------------
-- Tabel allin
-- Akun login di halaman utama (index.php -> login.php).
-- level menentukan tujuan setelah login:
--   admin       -> /sekolah/index.php        (Halaman SIM / CRUD)
--   guru, siswa -> /sekolah/guest/index.php  (Halaman Guest)
-- ---------------------------------------------------------------------
CREATE TABLE allin (
  id        INT          NOT NULL AUTO_INCREMENT,
  email     VARCHAR(100) NOT NULL,
  password  VARCHAR(128) NOT NULL,
  level     ENUM('admin','guru','siswa') NOT NULL DEFAULT 'siswa',
  PRIMARY KEY (id),
  UNIQUE KEY uk_allin_email (email)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- ---------------------------------------------------------------------
-- Tabel user
-- Akun admin yang dikelola dari menu "User Admin" (List User / Add).
-- Username + password di tabel ini juga bisa dipakai login sebagai admin.
-- ---------------------------------------------------------------------
CREATE TABLE user (
  id        INT          NOT NULL AUTO_INCREMENT,
  username  VARCHAR(128) NOT NULL,
  password  VARCHAR(128) NOT NULL,
  PRIMARY KEY (id),
  UNIQUE KEY uk_user_username (username)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- ---------------------------------------------------------------------
-- Tabel siswa  (menu Data > Siswa)
-- ---------------------------------------------------------------------
CREATE TABLE siswa (
  nis           INT          NOT NULL AUTO_INCREMENT,
  nama          VARCHAR(50)  NOT NULL,
  kelas         VARCHAR(10)  NOT NULL DEFAULT '',
  alamat        VARCHAR(150) NOT NULL DEFAULT '',
  jeniskelamin  ENUM('Perempuan','Laki-laki') NOT NULL,
  email         VARCHAR(50)  NOT NULL DEFAULT '',
  password      VARCHAR(5)   NULL DEFAULT NULL,
  PRIMARY KEY (nis)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- ---------------------------------------------------------------------
-- Tabel guru  (menu Data > Pendidik & Tendik)
-- Kolom foto menyimpan NAMA FILE foto di folder sekolah/guru/foto/
-- ---------------------------------------------------------------------
CREATE TABLE guru (
  id            INT          NOT NULL AUTO_INCREMENT,
  nama          VARCHAR(120) NOT NULL,
  jabatan       VARCHAR(25)  NOT NULL DEFAULT '',
  jeniskelamin  ENUM('Perempuan','Laki-laki') NOT NULL,
  email         VARCHAR(50)  NOT NULL DEFAULT '',
  alamat        VARCHAR(250) NOT NULL DEFAULT '',
  foto          VARCHAR(255) NOT NULL DEFAULT '',
  password      VARCHAR(7)   NULL DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- ---------------------------------------------------------------------
-- Tabel mapel  (menu Data > Mata Pelajaran)
-- ---------------------------------------------------------------------
CREATE TABLE mapel (
  id        INT          NOT NULL AUTO_INCREMENT,
  nama      VARCHAR(100) NOT NULL,
  pengampu  VARCHAR(255) NOT NULL DEFAULT '',
  jamkbm    LONGTEXT     NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- ---------------------------------------------------------------------
-- Tabel agendatahunan  (menu Data > Agenda Tahunan)
-- Kolom gambar menyimpan NAMA FILE dokumentasi di folder sekolah/agenda/gambar/
-- ---------------------------------------------------------------------
CREATE TABLE agendatahunan (
  id       INT          NOT NULL AUTO_INCREMENT,
  gambar   VARCHAR(255) NOT NULL DEFAULT '',
  agenda   VARCHAR(99)  NOT NULL,
  deskrip  LONGTEXT     NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- =====================================================================
--  DATA AWAL (SEED)
-- =====================================================================

-- Akun admin default (ganti password setelah login pertama!)
INSERT INTO user (id, username, password) VALUES
(1, 'admin', 'admin123');

-- Akun login halaman utama:
--   admin -> 1 akun admin
--   guru  -> email guru, password default 'guru123'
--   siswa -> email + password dari tabel siswa
INSERT INTO allin (email, password, level) VALUES
('admin@tkjsmeksa.com', 'admin123', 'admin');

INSERT INTO allin (email, password, level)
SELECT email, 'guru123', 'guru' FROM guru;

INSERT INTO allin (email, password, level)
SELECT email, password, 'siswa' FROM siswa WHERE password IS NOT NULL;
