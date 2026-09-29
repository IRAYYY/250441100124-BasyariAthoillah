<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>
<h1>PENJELASAN</h1>
# 🎓 SIM Mahasiswa (Sistem Informasi Mahasiswa)

Aplikasi web sederhana berbasis **Laravel** untuk mengelola dan menampilkan data mahasiswa. Proyek ini dirancang sebagai sarana latihan bagi pemula untuk memahami konsep dasar arsitektur **MVC (Model-View-Controller)**, sistem **Routing**, serta templating menggunakan **Blade**.

---

## 📌 Apa Saja yang Dipelajari di Sini?

Di dalam proyek ini, kita berkenalan dengan 4 pilar penting dalam Laravel:
* **Routing**: Ibarat penunjuk jalan, bagian ini bertugas mengarahkan alamat website (URL) yang diakses pengguna langsung ke tampilan atau ke *Controller*.
* **Controller**: Otak atau pengurus di balik layar. Tugasnya menyiapkan data, menyaring data mahasiswa berdasarkan NIM, atau menghitung statistik.
* **Blade Templating**: Alat perakit tampilan agar kita tidak perlu menulis kode HTML yang sama berulang-ulang. Tampilan web dibagi menjadi potongan-potongan kecil yang rapi (`layouts`, `partials`, dan `components`).
* **Data Collection**: Cara mengolah data latihan (*dummy*) mahasiswa dengan memanfaatkan fitur koleksi bawaan Laravel (`collect`).

---

## 🔄 Bagaimana Sih Cara Kerjanya? (Alur MVC)

Bayangkan proses saat kamu membuka sebuah halaman web:


[ Browser / Pengguna ]
        │
        │ 1. Pengguna membuka URL (misal: /mahasiswa)
        ▼
[ routes/web.php ]
        │ 2. Laravel mencocokkan URL dengan rute yang tersedia
        ▼
[ MahasiswaController ]
        │ 3. Controller menyiapkan data mahasiswa
        ▼
[ resources/views/mahasiswa/index.blade.php ]
        │ 4. Blade merakit data dan tampilan HTML, dibungkus layout utama
        ▼
[ Tampilan Website di Layar ]


---

## 🛣 Daftar Halaman pada Aplikasi

Semua jalur URL diatur di dalam file `routes/web.php`. Berikut adalah rincian halaman yang tersedia:

1. **Halaman Beranda (`/`)**
   - Rute: `beranda`
   - Berisi sambutan awal saat pertama kali web dibuka.

2. **Halaman Tentang (`/tentang`) & Kontak (`/kontak`)**
   - Rute: `tentang` & `kontak`
   - Halaman informasi statis yang langsung memanggil view masing-masing tanpa lewat *controller*.

3. **Daftar Mahasiswa (`/mahasiswa`)**
   - Rute: `mahasiswa.index` | Controller: `MahasiswaController@index`
   - Menampilkan tabel lengkap berisi daftar seluruh mahasiswa, nomor urut otomatis, badge status (aktif/cuti/lulus), dan tombol detail.

4. **Detail Mahasiswa (`/mahasiswa/{nim}`)**
   - Rute: `mahasiswa.show` | Controller: `MahasiswaController@show`
   - Menampilkan informasi mendalam dari satu mahasiswa tertentu berdasarkan NIM-nya. Jika NIM tidak ditemukan, sistem otomatis memunculkan halaman error 404.

5. **Profil Mahasiswa (`/profil`)**
   - Rute: `mahasiswa.profil` | Controller: `MahasiswaController@profil`
   - Contoh halaman profil akun tertentu.

6. **Dashboard Ringkasan (`/dashboard`)**
   - Rute: `dashboard` | Controller: `DashboardController@index`
   - Menampilkan kartu statistik (*card*) berisi ringkasan data seperti total mahasiswa, jumlah yang aktif, dan yang sedang cuti.

---

## 📁 Struktur Folder Penting

Supaya mudah dipelajari, file-file utama dalam proyek ini disusun dengan struktur berikut:

sim-mahasiswa/

├── app/Http/Controllers/

│   ├── DashboardController.php      # Mengatur data untuk halaman statistik dashboard

│   └── MahasiswaController.php      # Mengatur daftar mahasiswa, profil, dan detail per NIM

│

├── resources/views/

│   ├── layouts/

│   │   └── app.blade.php            # Kerangka dasar HTML & CSS utama

│   ├── partials/

│   │   ├── navbar.blade.php         # Menu navigasi atas (otomatis mendeteksi halaman aktif)

│   │   └── footer.blade.php         # Bagian catatan kaki di bawah

│   ├── components/

│   │   └── kartu.blade.php          # Komponen kartu reusable

│   ├── mahasiswa/

│   │   ├── index.blade.php          # Halaman tabel semua mahasiswa

│   │   ├── profil.blade.php         # Halaman profil

│   │   └── show.blade.php           # Halaman rincian mahasiswa berdasarkan NIM

│   ├── beranda.blade.php            # Tampilan beranda

│   ├── dashboard.blade.php          # Tampilan dashboard

│   ├── kontak.blade.php             # Tampilan kontak

│   └── tentang.blade.php            # Tampilan tentang kami

│

└── routes/

    └── web.php                      # Daftar seluruh rute/URL aplikasi


## 💡 Fitur Tampilan Menarik

- **Menu Aktif Otomatis**: Pada navigasi (`navbar.blade.php`), digunakan fungsi `request()->routeIs(...)` agar menu yang sedang aktif otomatis mendeteksi tanda khusus (seperti garis bawah atau teks tebal).
- **Layout Terpusat**: Semua halaman mewarisi struktur dari `@extends('layouts.app')`, sehingga perubahan tata letak global cukup dilakukan di satu file saja.
