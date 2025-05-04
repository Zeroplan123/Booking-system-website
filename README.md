# Sistem Pemesanan Tempat - PHP & MySQL

Proyek ini adalah aplikasi web sederhana berbasis PHP dan MySQL yang digunakan untuk mengelola pemesanan tempat. Terdapat dua peran utama dalam aplikasi ini: **user** yang dapat melakukan pemesanan, dan **admin** yang dapat melihat dan menyelesaikan pesanan.

## ✨ Fitur Utama

- 🔐 Login user dan admin
- 📋 Form pemesanan tempat oleh user
- 📊 Dashboard admin untuk melihat daftar pesanan dalam bentuk tabel
- ✅ Aksi “Selesaikan” untuk menyelesaikan pesanan oleh admin
- 🔓 Logout untuk mengakhiri sesi pengguna

## 🛠️ Teknologi yang Digunakan

- PHP (native, procedural)
- MySQL / MariaDB
- HTML + CSS (basic styling)
- XAMPP sebagai server lokal

## 📁 Struktur Folder

/project/
│
├── dashboard_admin.php # Halaman admin
├── Login.php # Halaman login
├── login_process.php # Proses login
├── process/
│ ├── pesan_tempat.php # Proses pemesanan tempat oleh user
│ ├── selesaikan_pesanan.php # Proses penyelesaian pesanan oleh admin
│ └── logout.php # Proses logout
├── koneksi.php # Koneksi ke database
└── README.md


## 🧑‍💻 Cara Menjalankan

1. Clone atau download repository ini.
2. Letakkan di folder `htdocs` pada XAMPP.
3. Import file SQL ke database (pastikan struktur tabel: `users`, `tempat`, `pemesanan`).
4. Atur koneksi database di `koneksi.php`.
5. Jalankan `http://localhost/project/Login.php` di browser.
6. Login sebagai user atau admin untuk mulai menggunakan aplikasi.

## ⚠️ Catatan

- Pastikan semua file `*.php` sudah berada pada struktur folder yang sesuai.
- Pastikan server dan database berjalan (XAMPP: Apache dan MySQL).
- Jangan lupa mengamankan login dan validasi input pada proyek produksi.

## 📄 Lisensi

Proyek ini dibuat untuk keperluan pembelajaran dan dapat dikembangkan lebih lanjut secara bebas.
