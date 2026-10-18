# Web MIS Sekolah — SIM TKJ SMKN 1 Kediri

Sistem Informasi Manajemen (SIM) berbasis web untuk program keahlian **Teknik Jaringan Komputer (TKJ) SMK Negeri 1 Kediri**.
Aplikasi ini dibuat dengan **PHP native + MySQL + Bootstrap** dan menerapkan operasi **CRUD** (Create, Read, Update, Delete) untuk data siswa, guru, mata pelajaran, agenda tahunan, dan akun admin.

---

## Fitur

### Halaman Admin (Halaman SIM)

| Menu | Create | Read | Update | Delete |
|---|:-:|:-:|:-:|:-:|
| **User Admin** (List User / Add) | ✅ | ✅ | ✅ ubah password | ✅ |
| **Siswa** | ✅ | ✅ | ✅ | ✅ |
| **Pendidik & Tendik** (dengan upload foto) | ✅ | ✅ | ✅ | ✅ |
| **Mata Pelajaran** (jadwal jam KBM) | ✅ | ✅ | ✅ | ✅ |
| **Agenda Tahunan** (dengan upload dokumentasi) | ✅ | ✅ | ✅ | ✅ |

### Halaman Guest (Siswa & Guru)

Hanya-baca (Read): Daftar Pendidik & Tendik, Daftar Siswa, Jadwal Mata Pelajaran, Agenda Tahunan, dan tombol **About Developer** yang menautkan ke situs profil developer (proyek terpisah).

---

## Teknologi

| Bagian | Teknologi |
|---|---|
| Backend | PHP 8.2 (ekstensi `mysqli`) |
| Database | MySQL 8.0 (kompatibel MariaDB / XAMPP) |
| Frontend | Bootstrap 5, template SB Admin, Font Awesome |
| Web server | Apache (image resmi `php:8.2-apache`) |
| Container | Docker + Docker Compose |
| Manajemen DB | phpMyAdmin 5.2 |

---

## Struktur Folder

```
web-mis-sekolah/
├── Dockerfile               # image PHP 8.2 + Apache + mysqli
├── docker-compose.yml       # service: web, db (MySQL), phpmyadmin
├── .env.example             # contoh pengaturan port & password
├── docker/
│   └── php.ini              # batas upload, zona waktu, log error
├── database/
│   ├── sekolah.sql          # CREATE DATABASE + CREATE TABLE + data awal
│   └── query-crud.sql       # kumpulan query INSERT/SELECT/UPDATE/DELETE
└── src/                     # = isi folder htdocs (document root)
    ├── index.php            # halaman login utama
    ├── login.php            # proses login (tabel allin / user)
    ├── logout.php           # hapus session
    ├── koneksi.php
    ├── home.png
    └── sekolah/
        ├── config.php       # koneksi DB, $main_url, proteksi login
        ├── index.php        # dashboard admin
        ├── auth/            # login khusus admin (tabel user)
        ├── user/            # CRUD user admin
        ├── siswa/           # CRUD siswa
        ├── guru/            # CRUD guru  (+ foto/  hasil upload)
        ├── mapel/           # CRUD mata pelajaran
        ├── agenda/          # CRUD agenda (+ gambar/ hasil upload)
        ├── guest/           # halaman guest (siswa & guru)
        ├── template/        # header, navbar, sidebar, footer admin
        └── asset/           # CSS/JS SB Admin & gambar
```

---

## Menjalankan dengan Docker

### Prasyarat

- [Docker Desktop](https://www.docker.com/products/docker-desktop/) (Windows/macOS) atau Docker Engine + Docker Compose v2 (Linux)
- Port **8080** dan **8081** belum dipakai aplikasi lain (bisa diganti lewat `.env`)

### Langkah

```bash
# 1. Masuk ke folder proyek
cd web-mis-sekolah

# 2. (Opsional) salin pengaturan lalu sesuaikan port/password
cp .env.example .env

# 3. Build image & jalankan semua container
docker compose up -d --build

# 4. Cek status — tunggu sampai mis-db berstatus "healthy"
docker compose ps
```

| Layanan | Alamat |
|---|---|
| Web MIS | http://localhost:8080 |
| phpMyAdmin | http://localhost:8081 (server `db`, user `mis` / `mis123` atau `root` / `root123`) |

---

## Akun Default

Login di http://localhost:8080 :

| Peran | Email / Username | Password | Diarahkan ke |
|---|---|---|---|
| Admin | `admin@tkjsmeksa.com` | `admin123` | Halaman SIM (CRUD) |
| Admin (tabel `user`) | `admin` | `admin123` | Halaman SIM (CRUD) |
| Guru | email guru, mis. `dodysetiono@email.com` | `guru123` | Halaman Guest |
| Siswa | email siswa, mis. `intan@tkjsmeksa.com` | `ida15` | Halaman Guest |

---

## Database

Nama database: **`sekolah`** (charset `utf8mb4`).

| Tabel | Dipakai oleh | Kolom |
|---|---|---|
| `allin` | Login utama | `id` (PK), `email` (unik), `password`, `level` ENUM('admin','guru','siswa') |
| `user` | Menu User Admin | `id` (PK), `username` (unik), `password` |
| `siswa` | Menu Siswa | `nis` (PK), `nama`, `kelas`, `alamat`, `jeniskelamin` ENUM('Perempuan','Laki-laki'), `email`, `password` |
| `guru` | Menu Pendidik & Tendik | `id` (PK), `nama`, `jabatan`, `jeniskelamin`, `email`, `alamat`, `foto` (nama file), `password` |
| `mapel` | Menu Mata Pelajaran | `id` (PK), `nama`, `pengampu`, `jamkbm` |
| `agendatahunan` | Menu Agenda Tahunan | `id` (PK), `gambar` (nama file), `agenda`, `deskrip` |

---

## Command Docker yang Sering Dipakai

| Keperluan | Perintah |
|---|---|
| Menjalankan | `docker compose up -d` |
| Melihat log aplikasi / error PHP | `docker compose logs -f web` |
| Menghentikan (data tetap tersimpan) | `docker compose down` |
| Menerapkan perubahan kode di `src/` | `docker compose up -d --build` |
| Reset total database ke data awal | `docker compose down -v` lalu `docker compose up -d --build` |
| Backup database | `docker compose exec db mysqldump -umis -pmis123 sekolah > backup.sql` |
| Restore database | `docker compose exec -T db mysql -umis -pmis123 sekolah < backup.sql` |
| Masuk ke konsol MySQL | `docker compose exec db mysql -umis -pmis123 sekolah` |

---

## Menjalankan Tanpa Docker (XAMPP)

1. Salin **isi** folder `src/` ke `C:\xampp\htdocs\` sehingga strukturnya menjadi:
   ```
   htdocs/
   ├── index.php
   ├── login.php
   ├── logout.php
   ├── koneksi.php
   ├── home.png
   └── sekolah/
   ```
   Aplikasi memakai path `/index.php` dan `/sekolah/...`, jadi folder `sekolah` harus berada langsung di `htdocs`.
2. Jalankan **Apache** dan **MySQL** dari XAMPP Control Panel.
3. Buka http://localhost/phpmyadmin → tab **Impor** → pilih `database/sekolah.sql` → **Kirim**.
4. Buka http://localhost/ lalu login dengan [akun default](#akun-default).

Tanpa environment variable, aplikasi otomatis memakai koneksi default XAMPP: host `localhost`, user `root`, tanpa password, database `sekolah`.

---

## Alur Aplikasi

```mermaid
flowchart LR
    L[Halaman Login] -->|level admin| A[Halaman SIM]
    L -->|level siswa / guru| G[Halaman Guest]

    A --> U[User Admin<br/>List User · Add]
    A --> D[Data]
    U --> U1[Ubah Password · Hapus User]
    D --> D1[Siswa]
    D --> D2[Pendidik & Tendik]
    D --> D3[Mata Pelajaran]
    D --> D4[Agenda Tahunan]
    D1 & D2 & D3 & D4 --> CRUD[Tambah · Ubah · Hapus Data]

    G --> G1[Daftar Pendidik & Tendik]
    G --> G2[Daftar Siswa]
    G --> G3[Jadwal Mata Pelajaran]
    G --> G4[Agenda Tahunan]
    G --> G5[About Developer<br/>→ situs profil]
```

Hak akses halaman :

| Halaman | Siapa yang boleh |
|---|---|
| `/index.php`, `/sekolah/auth/*` | Semua orang |
| `/sekolah/guest/*` | Sudah login (admin, guru, siswa) |
| Halaman `/sekolah/*` lainnya | Hanya admin |

---

© 2024 **Intan Dwi Anggreini**  
Teknik Jaringan Komputer dan Telekomunikasi — SMK Negeri 1 Kediri  
**All Rights Reserved.**
