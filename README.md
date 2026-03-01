# SIKEMBANG - Sistem Informasi Kesehatan Ibu dan Anak Berbasis Web

Selamat datang di repositori SIKEMBANG! 👋

SIKEMBANG adalah **Sistem Informasi Kesehatan Ibu dan Anak Berbasis Web** yang dirancang untuk membantu dalam pengelolaan data, pelayanan, dan edukasi terkait kesehatan ibu hamil dan anak. Sistem ini mendukung dua peran utama: **Ibu Hamil** dan **Bidan**, memungkinkan interaksi yang efisien dan akses informasi yang relevan.

## ✨ Fitur Utama

*   **Autentikasi Pengguna:** Sistem login dan registrasi dengan peran `ibu_hamil` dan `bidan`.
*   **Manajemen Profil:** Pengelolaan profil lengkap untuk Ibu Hamil (data kehamilan, riwayat medis) dan Bidan (data praktik, spesialisasi).
*   **Sistem Konsultasi:** Fitur pesan antara Ibu Hamil dan Bidan untuk konsultasi secara online.
*   **Sistem Booking:** Penjadwalan janji temu (online/offline) dengan Bidan.
*   **Edukasi Kesehatan:** Konten edukasi interaktif yang disesuaikan berdasarkan trimester kehamilan dan kategori.
*   **Catatan Kehamilan:** Ibu hamil dapat mencatat riwayat pemeriksaan dan perkembangan kehamilan mereka.
*   **Penilaian Risiko:** Fitur untuk Bidan melakukan penilaian risiko kehamilan berdasarkan faktor-faktor tertentu.
*   **Reminder:** Pengingat otomatis untuk jadwal kontrol, minum vitamin, atau aktivitas penting lainnya bagi Ibu Hamil.
*   **Laporan:** Bidan dapat melihat laporan dan statistik terkait pelayanan.

## 🚀 Teknologi yang Digunakan

*   **Backend:** Laravel (PHP Framework)
*   **Database:** MySQL
*   **Frontend:** HTML, CSS, JavaScript (dengan Blade Templating Engine Laravel)
*   **Asset Bundling:** Vite

## 🛠️ Instalasi

Untuk menjalankan proyek ini secara lokal, ikuti langkah-langkah berikut:

1.  **Clone Repositori:**
    ```bash
    git clone https://github.com/ardhikaxx/sikembang.git
    cd sikembang
    ```

2.  **Instal Dependensi Composer:**
    ```bash
    composer install
    ```

3.  **Konfigurasi Environment:**
    Salin file `.env.example` ke `.env` dan sesuaikan pengaturan database Anda.
    ```bash
    cp .env.example .env
    ```
    Buka file `.env` dan atur koneksi database (misalnya untuk MySQL):
    ```
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=sikembang  # Ganti dengan nama database Anda
    DB_USERNAME=root      # Ganti dengan username database Anda
    DB_PASSWORD=          # Ganti dengan password database Anda
    ```

4.  **Generate Application Key:**
    ```bash
    php artisan key:generate
    ```

5.  **Migrasi Database dan Seeder:**
    Jalankan migrasi database dan seed data awal. Ini akan membuat tabel-tabel yang diperlukan dan mengisi beberapa data contoh (termasuk user Bidan Admin dan Ibu Hamil).
    ```bash
    php artisan migrate:fresh --seed
    ```
    > **Catatan:** Password untuk `bidan@sikembang.com` dan `ibuhamil@sikembang.com` adalah `password`.

6.  **Instal Dependensi NPM & Build Frontend Assets:**
    ```bash
    npm install
    npm run dev # Untuk pengembangan dengan hot-reloading
    # atau
    npm run build # Untuk build produksi
    ```

7.  **Jalankan Aplikasi:**
    ```bash
    php artisan serve
    ```
    Aplikasi akan berjalan di `http://127.0.0.1:8000`.

## 👨‍💻 Penggunaan

Setelah instalasi, Anda bisa login menggunakan akun berikut:

*   **Bidan Admin:**
    *   **Email:** `bidan@sikembang.com`
    *   **Password:** `password`
*   **Ibu Hamil:**
    *   **Email:** `ibuhamil@sikembang.com`
    *   **Password:** `password`

Jelajahi fitur-fitur yang tersedia sesuai dengan peran masing-masing!

## 📄 Lisensi

Proyek ini dilisensikan di bawah [MIT License](LICENSE.md).

---

Terima kasih telah menggunakan SIKEMBANG! ❤️
