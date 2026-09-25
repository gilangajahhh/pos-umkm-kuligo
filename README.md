# UMKM Kuliner — Web Menu via Scan QR

Sistem pemesanan digital untuk UMKM kuliner, terinspirasi dari Mie Gacoan.
Pelanggan memesan lewat web menu dengan scan QR di meja, dilengkapi transaksi
pembayaran online, serta dashboard gabungan Admin & Kasir.

## Stack
- **Backend:** Laravel (PHP)
- **Frontend:** Blade + Vue.js
- **Database:** PostgreSQL

## Struktur Peran
| Peran | Akses |
|---|---|
| Pelanggan | Tanpa login, akses via scan QR per meja |
| Kasir | Login, verifikasi pembayaran, cetak struk, update status pesanan |
| Admin | Login, semua akses Kasir + kelola menu, laporan, kelola akun kasir |

## Instalasi
1. `composer install`
2. `cp .env.example .env` lalu sesuaikan kredensial PostgreSQL
3. `php artisan key:generate`
4. `php artisan migrate`
5. `npm install && npm run dev`
6. `php artisan serve`

## Struktur Database (ERD)
Lihat 10 tabel utama: `meja`, `kategori_menu`, `menu`, `varian_menu`,
`pesanan`, `detail_pesanan`, `pembayaran`, `staff`, `log_status_pesanan`, `struk`.

## Dokumen Pendukung
Proyek ini sudah dilengkapi dengan:
- Flowchart alur sistem (proses pelanggan, admin, kasir)
- Userflow per peran
- Activity diagram UML (gabungan & terpisah per aktivitas)
- ERD lengkap dengan primary key & foreign key
