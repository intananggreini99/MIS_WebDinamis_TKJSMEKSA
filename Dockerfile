# Web MIS Sekolah - PHP 8.2 + Apache
FROM php:8.2-apache

# Ekstensi mysqli dipakai oleh seluruh halaman CRUD
RUN docker-php-ext-install mysqli

# Pengaturan PHP (batas upload foto, zona waktu, log error)
COPY docker/php.ini /usr/local/etc/php/conf.d/zz-mis-sekolah.ini

# Source code aplikasi (src/ = isi folder htdocs di XAMPP)
COPY src/ /var/www/html/

# Folder upload harus bisa ditulis oleh web server
RUN chown -R www-data:www-data \
        /var/www/html/sekolah/guru/foto \
        /var/www/html/sekolah/agenda/gambar

EXPOSE 80
