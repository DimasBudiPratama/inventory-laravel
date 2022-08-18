# inventory-laravel
Aplikasi Inventory  Barang Laravel 8

# Setup
- buka direktori project di terminal anda.
- ketikan command : cp .env.example .env (copy paste file .env.example)
- buat database

Lalu ketik command dibawah ini
- composer install
- php artisan optimize:clear
- php artisan key:generate (generate app key)
- php artisan migrate (migrasi database)
- php artisan db:seed

# Login
Admin
- email   : dimasbudipratama@gmail.com
- password : 12345

Inventaris (Barang Masuk)
- email : inventaris@gmail.com
- password : 12345

Teknisi (Barang Keluar)
- email : teknisi@gmail.com
- password : 12345


# Fitur
Admin
- Halaman Dashboard
- Manage Barang (CRUD)
- Manage User (CRUD)
- Barang Masuk
- Barang Keluar
- Laporan Barang
- Laporan Barang Masuk
- Laporan Barang Keluar

# Author
- Dimas Budi Pratama
