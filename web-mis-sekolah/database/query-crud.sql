-- =====================================================================
--  QUERY CRUD - Web MIS Sekolah (database: sekolah)
--
--  Kumpulan query SQL yang dipakai oleh setiap fitur CRUD di aplikasi,
--  lengkap dengan file PHP yang menjalankannya.
--
--  Di dalam PHP, nilai contoh di bawah diganti dengan variabel dari
--  form, misalnya '$nama', '$email', '$id'.
--
--  File ini AMAN dijalankan berurutan dari atas ke bawah sebagai latihan:
--  data contoh yang ditambahkan akan dihapus lagi di bagian D (DELETE).
--      mysql -u root -p sekolah < database/query-crud.sql
-- =====================================================================

USE sekolah;


-- =====================================================================
--  0. LOGIN
-- =====================================================================

-- login.php : cek akun di halaman login utama (email + password)
SELECT * FROM allin WHERE email = 'admin@tkjsmeksa.com' AND password = 'admin123';

-- login.php & auth/aksilogin.php : login admin memakai akun dari menu User Admin
SELECT * FROM user WHERE username = 'admin' AND password = 'admin123';


-- =====================================================================
--  A. CREATE  (INSERT INTO) - menambah data baru
-- =====================================================================

-- user/action-adduser.php  (menu User Admin > Add)
INSERT INTO user SET username = 'operator', password = 'rahasia1';

-- siswa/aksiadd.php  (menu Data > Siswa > Tambah Data)
INSERT INTO siswa SET
    nis          = 202499,
    nama         = 'Siswa Contoh',
    email        = 'contoh@tkjsmeksa.com',
    kelas        = 'XI TKJ 2',
    jeniskelamin = 'Perempuan',
    alamat       = 'Mojoroto, Kota Kediri';

-- guru/aksiadd.php  (menu Data > Pendidik & Tendik > Tambah Data)
-- kolom foto berisi nama file hasil upload: <angka acak>_<nama file asli>
INSERT INTO guru (nama, email, jeniskelamin, jabatan, alamat, foto)
VALUES ('Guru Contoh, S. Kom.', 'gurucontoh@email.com', 'Laki-laki', 'Pengajar',
        'Pesantren, Kota Kediri', '123456789_contoh.jpg');

-- mapel/aksinambah.php  (menu Data > Mata Pelajaran > Tambah Data)
INSERT INTO mapel SET
    nama     = 'Mapel Contoh',
    pengampu = 'Guru Contoh, S. Kom.',
    jamkbm   = 'Senin : 07.00 - 10.00';

-- agenda/aksiadd.php  (menu Data > Agenda Tahunan > Tambah Data)
INSERT INTO agendatahunan (gambar, agenda, deskrip)
VALUES ('123456789_contoh.jpg', 'AGENDA CONTOH', 'Keterangan agenda contoh.');

-- Menambah akun login untuk siswa/guru baru (tabel allin)
INSERT INTO allin (email, password, level) VALUES ('contoh@tkjsmeksa.com', 'cth99', 'siswa');


-- =====================================================================
--  B. READ  (SELECT) - menampilkan data
-- =====================================================================

-- user/list-user.php
SELECT * FROM user;

-- siswa/datasiswa.php  &  guest/siswa/index.php
SELECT * FROM siswa;

-- guru/dataguru.php  &  guest/guru/index.php
SELECT * FROM guru;

-- mapel/datamapel.php  &  guest/mapel/index.php
SELECT * FROM mapel;

-- agenda/agenda.php  &  guest/agenda/index.php
SELECT * FROM agendatahunan;

-- Mengambil 1 baris untuk ditampilkan di form ubah data
SELECT * FROM user          WHERE id  = 1;        -- user/edit-user.php
SELECT * FROM siswa         WHERE nis = 202499;   -- siswa/ubahdata.php
SELECT * FROM guru          WHERE id  = 5;        -- guru/ubahdata.php
SELECT * FROM mapel         WHERE id  = 1;        -- mapel/ubahmapel.php
SELECT * FROM agendatahunan WHERE id  = 4;        -- agenda/ubahagenda.php

-- Contoh SELECT tambahan (rekap / pencarian)
SELECT COUNT(*) AS jumlah_siswa FROM siswa;
SELECT jeniskelamin, COUNT(*) AS jumlah FROM siswa GROUP BY jeniskelamin;
SELECT jabatan, COUNT(*) AS jumlah FROM guru GROUP BY jabatan;
SELECT nis, nama, kelas FROM siswa WHERE nama LIKE '%Dwi%' ORDER BY nama;
SELECT level, COUNT(*) AS jumlah_akun FROM allin GROUP BY level;


-- =====================================================================
--  C. UPDATE - mengubah data (wajib memakai WHERE!)
-- =====================================================================

-- user/ubahpass.php  (List User > Ubah Password)
UPDATE user SET password = 'passbaru' WHERE username = 'operator';

-- siswa/aksiubah.php  (Daftar Siswa > Ubah Data)
UPDATE siswa SET
    nama         = 'Siswa Contoh (diubah)',
    email        = 'contoh@tkjsmeksa.com',
    kelas        = 'XII TKJ 2',
    jeniskelamin = 'Perempuan',
    alamat       = 'Pesantren, Kota Kediri'
WHERE nis = 202499;

-- guru/ubahaction.php  (Daftar Guru > Ubah Data)
-- a) tanpa mengganti foto
UPDATE guru SET
    nama = 'Guru Contoh, S. Kom., M. Kom.', email = 'gurucontoh@email.com',
    jabatan = 'Pengajar', jeniskelamin = 'Laki-laki', alamat = 'Pesantren, Kota Kediri'
WHERE email = 'gurucontoh@email.com';
-- b) sekaligus mengganti foto
UPDATE guru SET foto = '987654321_baru.jpg' WHERE email = 'gurucontoh@email.com';

-- mapel/aksiubah.php  (Mata Pelajaran > Ubah Data)
UPDATE mapel SET
    nama = 'Mapel Contoh', pengampu = 'Guru Contoh, S. Kom.', jamkbm = 'Selasa : 07.00 - 10.00'
WHERE nama = 'Mapel Contoh';

-- agenda/aksiubah.php  (Agenda Tahunan > Ubah Data)
-- a) tanpa mengganti gambar
UPDATE agendatahunan SET agenda = 'AGENDA CONTOH (diubah)', deskrip = 'Keterangan baru.'
WHERE agenda = 'AGENDA CONTOH';
-- b) sekaligus mengganti gambar
UPDATE agendatahunan SET gambar = '987654321_baru.jpg' WHERE agenda = 'AGENDA CONTOH (diubah)';

-- Mengganti password akun login
UPDATE allin SET password = 'cth00' WHERE email = 'contoh@tkjsmeksa.com';


-- =====================================================================
--  D. DELETE - menghapus data (wajib memakai WHERE!)
--  (di aplikasi, data dihapus berdasarkan id / nis dari tombol Hapus)
-- =====================================================================

-- user/deluser.php
DELETE FROM user WHERE username = 'operator';

-- siswa/hapusdata.php
DELETE FROM siswa WHERE nis = 202499;

-- guru/deldata.php
DELETE FROM guru WHERE email = 'gurucontoh@email.com';

-- mapel/delmapel.php
DELETE FROM mapel WHERE nama = 'Mapel Contoh';

-- agenda/delagenda.php
DELETE FROM agendatahunan WHERE agenda = 'AGENDA CONTOH (diubah)';

-- akun login contoh
DELETE FROM allin WHERE email = 'contoh@tkjsmeksa.com';
