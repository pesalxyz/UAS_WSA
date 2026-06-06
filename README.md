# UAS_WSA

Project Ujian Akhir Semester Web Service Application berupa REST API mini e-commerce menggunakan Laravel.

## Fitur

- Autentikasi user dengan Laravel Sanctum
- CRUD kategori
- CRUD produk
- Upload gambar produk
- Pagination dan search produk
- CRUD transaksi
- Dokumentasi API menggunakan Scribe di `/docs`

## Kebutuhan

- PHP 8.3+
- Composer

## Menjalankan Project

```bash
cp .env.example .env
composer install
php artisan key:generate
php artisan migrate:fresh --seed
php artisan serve --host=127.0.0.1 --port=8000
```

## Akun Seeder

- Email: `admin@example.com`
- Password: `password`

## Dokumentasi API

Setelah server berjalan, buka:

- `http://127.0.0.1:8000/docs`

## Pengujian

```bash
php artisan test
```
