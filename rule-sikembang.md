# 🌸 RULE SIKEMBANG
## Sistem Konsultasi & Edukasi Ibu Hamil Berkelanjutan

---

## 📌 OVERVIEW APLIKASI

| Item | Detail |
|------|--------|
| **Nama Aplikasi** | SIKEMBANG |
| **Kepanjangan** | Sistem Konsultasi & Edukasi Ibu Hamil Berkelanjutan |
| **Role Pengguna** | Ibu Hamil & Bidan |
| **Tech Stack** | PHP Native / Laravel, MySQL, Bootstrap 5, Font Awesome, SweetAlert2 |
| **Warna Utama** | `#EC1E88` (Pink Magenta) |

---

## 🎨 STYLING & UI GUIDELINES

### CDN yang Digunakan

```html
<!-- Bootstrap 5 -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- Font Awesome 6 -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Chart.js (untuk grafik) -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
```

### Tema Warna

```css
:root {
    --primary: #EC1E88;
    --primary-dark: #c4166e;
    --primary-light: #f9a8d4;
    --primary-soft: #fce4f3;
    --secondary: #6c757d;
    --white: #ffffff;
    --bg-light: #fdf2f8;
    --text-dark: #2d2d2d;
    --success: #28a745;
    --warning: #ffc107;
    --danger: #dc3545;
    --info: #17a2b8;
}

/* ===== GLOBAL ===== */
body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-color: #fdf2f8;
    color: var(--text-dark);
}

/* ===== NAVBAR ===== */
.navbar-sikembang {
    background-color: var(--primary);
    box-shadow: 0 2px 10px rgba(236, 30, 136, 0.3);
}
.navbar-sikembang .navbar-brand,
.navbar-sikembang .nav-link,
.navbar-sikembang .navbar-text {
    color: #ffffff !important;
}
.navbar-sikembang .nav-link:hover {
    color: rgba(255,255,255,0.75) !important;
}

/* ===== SIDEBAR ===== */
.sidebar {
    background: linear-gradient(180deg, var(--primary) 0%, var(--primary-dark) 100%);
    min-height: 100vh;
    color: #ffffff;
}
.sidebar .nav-link {
    color: rgba(255,255,255,0.85);
    padding: 12px 20px;
    border-radius: 8px;
    margin: 2px 8px;
    transition: all 0.3s;
}
.sidebar .nav-link:hover,
.sidebar .nav-link.active {
    background-color: rgba(255,255,255,0.2);
    color: #ffffff;
}
.sidebar .nav-link i {
    width: 20px;
    margin-right: 8px;
}

/* ===== BUTTON ===== */
.btn-primary-sikembang {
    background-color: var(--primary);
    border-color: var(--primary);
    color: #ffffff;
}
.btn-primary-sikembang:hover {
    background-color: var(--primary-dark);
    border-color: var(--primary-dark);
    color: #ffffff;
}
.btn-outline-sikembang {
    border-color: var(--primary);
    color: var(--primary);
}
.btn-outline-sikembang:hover {
    background-color: var(--primary);
    color: #ffffff;
}

/* ===== CARD ===== */
.card-sikembang {
    border: none;
    border-radius: 12px;
    box-shadow: 0 4px 15px rgba(236, 30, 136, 0.1);
    transition: transform 0.3s, box-shadow 0.3s;
}
.card-sikembang:hover {
    transform: translateY(-4px);
    box-shadow: 0 8px 25px rgba(236, 30, 136, 0.2);
}
.card-header-primary {
    background-color: var(--primary);
    color: #ffffff;
    border-radius: 12px 12px 0 0 !important;
}

/* ===== BADGE ===== */
.badge-primary-sikembang {
    background-color: var(--primary);
    color: #ffffff;
}

/* ===== TABLE ===== */
.table-sikembang thead {
    background-color: var(--primary);
    color: #ffffff;
}

/* ===== FORM ===== */
.form-control:focus,
.form-select:focus {
    border-color: var(--primary);
    box-shadow: 0 0 0 0.25rem rgba(236, 30, 136, 0.25);
}

/* ===== PROGRESS BAR TRIMESTER ===== */
.progress-trimester .progress-bar {
    background-color: var(--primary);
}

/* ===== STAT CARD ===== */
.stat-card {
    background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
    color: #ffffff;
    border-radius: 12px;
    padding: 20px;
}
.stat-card .stat-number {
    font-size: 2rem;
    font-weight: 700;
}

/* ===== ALERT CUSTOM ===== */
.alert-primary-sikembang {
    background-color: var(--primary-soft);
    border-color: var(--primary-light);
    color: var(--primary-dark);
}

/* ===== CHAT BUBBLE ===== */
.chat-bubble-ibu {
    background-color: var(--primary);
    color: #ffffff;
    border-radius: 18px 18px 4px 18px;
    padding: 10px 14px;
    max-width: 70%;
    align-self: flex-end;
}
.chat-bubble-bidan {
    background-color: #f1f1f1;
    color: var(--text-dark);
    border-radius: 18px 18px 18px 4px;
    padding: 10px 14px;
    max-width: 70%;
}

/* ===== TIMELINE ===== */
.timeline-item {
    border-left: 3px solid var(--primary);
    padding-left: 20px;
    margin-bottom: 20px;
    position: relative;
}
.timeline-item::before {
    content: '';
    width: 12px;
    height: 12px;
    background: var(--primary);
    border-radius: 50%;
    position: absolute;
    left: -7.5px;
    top: 4px;
}

/* ===== RISK BADGE ===== */
.badge-risiko-rendah { background-color: #28a745; color: white; }
.badge-risiko-sedang { background-color: #ffc107; color: #212529; }
.badge-risiko-tinggi { background-color: #dc3545; color: white; }
```

### Pola SweetAlert2

```javascript
// Sukses
Swal.fire({ icon: 'success', title: 'Berhasil!', text: 'Data berhasil disimpan.', confirmButtonColor: '#EC1E88' });

// Error
Swal.fire({ icon: 'error', title: 'Gagal!', text: 'Terjadi kesalahan.', confirmButtonColor: '#EC1E88' });

// Konfirmasi Hapus
Swal.fire({
    title: 'Yakin ingin menghapus?',
    text: 'Data tidak dapat dikembalikan!',
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#EC1E88',
    cancelButtonColor: '#6c757d',
    confirmButtonText: 'Ya, Hapus!',
    cancelButtonText: 'Batal'
}).then((result) => { if (result.isConfirmed) { /* proses hapus */ } });

// Konfirmasi Umum
Swal.fire({
    title: 'Konfirmasi',
    text: 'Apakah data sudah benar?',
    icon: 'question',
    showCancelButton: true,
    confirmButtonColor: '#EC1E88',
    cancelButtonColor: '#6c757d',
    confirmButtonText: 'Ya, Lanjutkan',
    cancelButtonText: 'Batal'
});

// Info / Warning kehamilan
Swal.fire({ icon: 'info', title: 'Perhatian!', text: 'Segera hubungi bidan jika muncul tanda bahaya.', confirmButtonColor: '#EC1E88' });
```

---

## 🗄️ STRUKTUR DATABASE (ERD & Relasi)

### Tabel dan Relasi

```
users (1) ──────────< (N) profil_ibu_hamil
users (1) ──────────< (N) profil_bidan
users (1) ──────────< (N) konsultasi (sebagai pengirim)
users (1) ──────────< (N) pesan_konsultasi (sebagai pengirim)
users (1) ──────────< (N) booking
users (1) ──────────< (N) catatan_kehamilan
users (1) ──────────< (N) reminder

profil_ibu_hamil (1) ──────────< (N) catatan_kehamilan
profil_ibu_hamil (1) ──────────< (N) penilaian_risiko

konsultasi (1) ──────────< (N) pesan_konsultasi
konsultasi (1) ──────────< (N) lampiran_konsultasi

konten_edukasi (1) ──────────< (N) kategori_edukasi (melalui FK)
kategori_edukasi (1) ──────────< (N) konten_edukasi

booking (1) ──────────1 jadwal_booking

users (bidan)(1) ──────────< (N) penilaian_risiko
users (bidan)(1) ──────────< (N) konten_edukasi (sebagai pembuat)
```

---

### DDL Lengkap

```sql
-- ============================================================
-- DATABASE: sikembang
-- ============================================================

CREATE DATABASE IF NOT EXISTS sikembang
    CHARACTER SET utf8mb4
    COLLATE utf8mb4_unicode_ci;

USE sikembang;

-- ============================================================
-- 1. TABEL USERS (Master autentikasi semua role)
-- ============================================================
CREATE TABLE users (
    id              BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nama_lengkap    VARCHAR(150) NOT NULL,
    email           VARCHAR(150) NOT NULL UNIQUE,
    password        VARCHAR(255) NOT NULL,
    role            ENUM('ibu_hamil', 'bidan') NOT NULL,
    foto_profil     VARCHAR(255) DEFAULT NULL,
    no_hp           VARCHAR(20) DEFAULT NULL,
    is_aktif        TINYINT(1) DEFAULT 1,
    remember_token  VARCHAR(100) DEFAULT NULL,
    created_at      TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at      TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- ============================================================
-- 2. TABEL PROFIL IBU HAMIL
-- ============================================================
CREATE TABLE profil_ibu_hamil (
    id              BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id         BIGINT UNSIGNED NOT NULL,
    tanggal_lahir   DATE DEFAULT NULL,
    usia            TINYINT UNSIGNED DEFAULT NULL,          -- usia ibu dalam tahun
    hpht            DATE DEFAULT NULL,                     -- Hari Pertama Haid Terakhir
    hpl             DATE DEFAULT NULL,                     -- Hari Perkiraan Lahir (auto hitung HPHT+280)
    golongan_darah  ENUM('A','B','AB','O') DEFAULT NULL,
    rhesus          ENUM('+','-') DEFAULT NULL,
    berat_sebelum   DECIMAL(5,2) DEFAULT NULL,             -- berat sebelum hamil (kg)
    tinggi_badan    DECIMAL(5,2) DEFAULT NULL,             -- cm
    alamat          TEXT DEFAULT NULL,
    riwayat_penyakit TEXT DEFAULT NULL,                    -- diabetes, hipertensi, dll
    riwayat_alergi  TEXT DEFAULT NULL,
    kehamilan_ke    TINYINT UNSIGNED DEFAULT 1,            -- kehamilan ke berapa
    anak_hidup      TINYINT UNSIGNED DEFAULT 0,
    keguguran       TINYINT UNSIGNED DEFAULT 0,
    created_at      TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at      TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,

    CONSTRAINT fk_profil_ibu_user
        FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
) ENGINE=InnoDB;

-- ============================================================
-- 3. TABEL PROFIL BIDAN
-- ============================================================
CREATE TABLE profil_bidan (
    id              BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id         BIGINT UNSIGNED NOT NULL,
    no_str          VARCHAR(50) DEFAULT NULL,              -- Nomor STR Bidan
    instansi        VARCHAR(200) DEFAULT NULL,             -- Puskesmas / RS / Klinik
    spesialisasi    VARCHAR(150) DEFAULT NULL,
    pengalaman_tahun TINYINT UNSIGNED DEFAULT 0,
    jadwal_praktek  JSON DEFAULT NULL,                     -- {"senin": "08:00-12:00", ...}
    bio             TEXT DEFAULT NULL,
    created_at      TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at      TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,

    CONSTRAINT fk_profil_bidan_user
        FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
) ENGINE=InnoDB;

-- ============================================================
-- 4. TABEL KATEGORI EDUKASI
-- ============================================================
CREATE TABLE kategori_edukasi (
    id          BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nama        VARCHAR(100) NOT NULL,                     -- "Trimester 1", "Nutrisi", dll
    slug        VARCHAR(120) NOT NULL UNIQUE,
    deskripsi   TEXT DEFAULT NULL,
    icon        VARCHAR(100) DEFAULT NULL,                 -- font awesome class
    urutan      TINYINT UNSIGNED DEFAULT 0,
    created_at  TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at  TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- ============================================================
-- 5. TABEL KONTEN EDUKASI
-- ============================================================
CREATE TABLE konten_edukasi (
    id              BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    kategori_id     BIGINT UNSIGNED NOT NULL,
    bidan_id        BIGINT UNSIGNED NOT NULL,              -- FK ke users (role bidan)
    judul           VARCHAR(255) NOT NULL,
    slug            VARCHAR(270) NOT NULL UNIQUE,
    konten          LONGTEXT NOT NULL,
    gambar          VARCHAR(255) DEFAULT NULL,
    trimester       ENUM('1','2','3','semua') DEFAULT 'semua',
    minggu_ke       TINYINT UNSIGNED DEFAULT NULL,         -- NULL = semua minggu
    is_published    TINYINT(1) DEFAULT 0,
    views           INT UNSIGNED DEFAULT 0,
    created_at      TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at      TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,

    CONSTRAINT fk_edukasi_kategori
        FOREIGN KEY (kategori_id) REFERENCES kategori_edukasi(id) ON DELETE RESTRICT,
    CONSTRAINT fk_edukasi_bidan
        FOREIGN KEY (bidan_id) REFERENCES users(id) ON DELETE RESTRICT
) ENGINE=InnoDB;

-- ============================================================
-- 6. TABEL KONSULTASI (Header / Thread)
-- ============================================================
CREATE TABLE konsultasi (
    id              BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    ibu_id          BIGINT UNSIGNED NOT NULL,              -- FK ke users (role ibu_hamil)
    bidan_id        BIGINT UNSIGNED NOT NULL,              -- FK ke users (role bidan)
    judul           VARCHAR(255) NOT NULL,
    status          ENUM('aktif','selesai','ditutup') DEFAULT 'aktif',
    is_read_bidan   TINYINT(1) DEFAULT 0,
    is_read_ibu     TINYINT(1) DEFAULT 0,
    created_at      TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at      TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,

    CONSTRAINT fk_konsultasi_ibu
        FOREIGN KEY (ibu_id) REFERENCES users(id) ON DELETE CASCADE,
    CONSTRAINT fk_konsultasi_bidan
        FOREIGN KEY (bidan_id) REFERENCES users(id) ON DELETE RESTRICT
) ENGINE=InnoDB;

-- ============================================================
-- 7. TABEL PESAN KONSULTASI (Detail Chat)
-- ============================================================
CREATE TABLE pesan_konsultasi (
    id              BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    konsultasi_id   BIGINT UNSIGNED NOT NULL,
    pengirim_id     BIGINT UNSIGNED NOT NULL,              -- FK ke users (siapapun yang kirim)
    pesan           TEXT NOT NULL,
    is_read         TINYINT(1) DEFAULT 0,
    created_at      TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at      TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,

    CONSTRAINT fk_pesan_konsultasi
        FOREIGN KEY (konsultasi_id) REFERENCES konsultasi(id) ON DELETE CASCADE,
    CONSTRAINT fk_pesan_pengirim
        FOREIGN KEY (pengirim_id) REFERENCES users(id) ON DELETE CASCADE
) ENGINE=InnoDB;

-- ============================================================
-- 8. TABEL LAMPIRAN KONSULTASI
-- ============================================================
CREATE TABLE lampiran_konsultasi (
    id              BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    pesan_id        BIGINT UNSIGNED NOT NULL,
    nama_file       VARCHAR(255) NOT NULL,
    path_file       VARCHAR(255) NOT NULL,
    tipe_file       VARCHAR(100) DEFAULT NULL,             -- image/jpeg, application/pdf, dll
    ukuran_file     INT UNSIGNED DEFAULT NULL,             -- bytes
    created_at      TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    CONSTRAINT fk_lampiran_pesan
        FOREIGN KEY (pesan_id) REFERENCES pesan_konsultasi(id) ON DELETE CASCADE
) ENGINE=InnoDB;

-- ============================================================
-- 9. TABEL BOOKING / JADWAL KONTROL
-- ============================================================
CREATE TABLE booking (
    id              BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    ibu_id          BIGINT UNSIGNED NOT NULL,
    bidan_id        BIGINT UNSIGNED NOT NULL,
    tanggal_booking DATE NOT NULL,
    jam_booking     TIME NOT NULL,
    jenis           ENUM('online','offline') DEFAULT 'offline',
    keluhan         TEXT DEFAULT NULL,
    status          ENUM('menunggu','diterima','ditolak','selesai','dijadwalkan_ulang') DEFAULT 'menunggu',
    catatan_bidan   TEXT DEFAULT NULL,
    alasan_tolak    TEXT DEFAULT NULL,
    created_at      TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at      TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,

    CONSTRAINT fk_booking_ibu
        FOREIGN KEY (ibu_id) REFERENCES users(id) ON DELETE CASCADE,
    CONSTRAINT fk_booking_bidan
        FOREIGN KEY (bidan_id) REFERENCES users(id) ON DELETE RESTRICT
) ENGINE=InnoDB;

-- ============================================================
-- 10. TABEL JADWAL ULANG BOOKING
-- ============================================================
CREATE TABLE jadwal_ulang_booking (
    id              BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    booking_id      BIGINT UNSIGNED NOT NULL UNIQUE,
    tanggal_baru    DATE NOT NULL,
    jam_baru        TIME NOT NULL,
    alasan          TEXT DEFAULT NULL,
    created_at      TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    CONSTRAINT fk_jadwal_ulang_booking
        FOREIGN KEY (booking_id) REFERENCES booking(id) ON DELETE CASCADE
) ENGINE=InnoDB;

-- ============================================================
-- 11. TABEL CATATAN KEHAMILAN (Monitoring)
-- ============================================================
CREATE TABLE catatan_kehamilan (
    id              BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    ibu_id          BIGINT UNSIGNED NOT NULL,
    tanggal_periksa DATE NOT NULL,
    usia_kehamilan  TINYINT UNSIGNED DEFAULT NULL,         -- dalam minggu
    berat_badan     DECIMAL(5,2) DEFAULT NULL,             -- kg
    tekanan_darah   VARCHAR(20) DEFAULT NULL,              -- "120/80"
    denyut_janin    TINYINT UNSIGNED DEFAULT NULL,         -- bpm
    tinggi_fundus   DECIMAL(5,2) DEFAULT NULL,             -- cm
    kadar_hb        DECIMAL(4,2) DEFAULT NULL,             -- g/dL
    keluhan         TEXT DEFAULT NULL,
    hasil_lab       TEXT DEFAULT NULL,
    catatan_tambahan TEXT DEFAULT NULL,
    created_at      TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at      TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,

    CONSTRAINT fk_catatan_ibu
        FOREIGN KEY (ibu_id) REFERENCES users(id) ON DELETE CASCADE
) ENGINE=InnoDB;

-- ============================================================
-- 12. TABEL PENILAIAN RISIKO KEHAMILAN
-- ============================================================
CREATE TABLE penilaian_risiko (
    id              BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    ibu_id          BIGINT UNSIGNED NOT NULL,
    bidan_id        BIGINT UNSIGNED NOT NULL,
    kategori_risiko ENUM('rendah','sedang','tinggi') NOT NULL,
    skor_risiko     TINYINT UNSIGNED DEFAULT 0,
    faktor_risiko   JSON DEFAULT NULL,                     -- ["usia >35", "hipertensi", ...]
    rekomendasi     TEXT DEFAULT NULL,
    tanggal_penilaian DATE NOT NULL,
    created_at      TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at      TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,

    CONSTRAINT fk_risiko_ibu
        FOREIGN KEY (ibu_id) REFERENCES users(id) ON DELETE CASCADE,
    CONSTRAINT fk_risiko_bidan
        FOREIGN KEY (bidan_id) REFERENCES users(id) ON DELETE RESTRICT
) ENGINE=InnoDB;

-- ============================================================
-- 13. TABEL REMINDER
-- ============================================================
CREATE TABLE reminder (
    id              BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    ibu_id          BIGINT UNSIGNED NOT NULL,
    judul           VARCHAR(150) NOT NULL,
    deskripsi       TEXT DEFAULT NULL,
    jenis           ENUM('kontrol','vitamin','lab','lainnya') DEFAULT 'lainnya',
    tanggal         DATE NOT NULL,
    jam             TIME DEFAULT NULL,
    is_berulang     TINYINT(1) DEFAULT 0,
    frekuensi       ENUM('harian','mingguan','bulanan') DEFAULT NULL,
    is_aktif        TINYINT(1) DEFAULT 1,
    is_selesai      TINYINT(1) DEFAULT 0,
    created_at      TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at      TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,

    CONSTRAINT fk_reminder_ibu
        FOREIGN KEY (ibu_id) REFERENCES users(id) ON DELETE CASCADE
) ENGINE=InnoDB;

-- ============================================================
-- 14. TABEL NOTIFIKASI
-- ============================================================
CREATE TABLE notifikasi (
    id              BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id         BIGINT UNSIGNED NOT NULL,
    judul           VARCHAR(200) NOT NULL,
    pesan           TEXT NOT NULL,
    tipe            ENUM('konsultasi','booking','reminder','risiko','sistem') DEFAULT 'sistem',
    referensi_id    BIGINT UNSIGNED DEFAULT NULL,          -- ID dari tabel referensi
    referensi_tipe  VARCHAR(50) DEFAULT NULL,              -- nama tabel referensi
    is_read         TINYINT(1) DEFAULT 0,
    created_at      TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    CONSTRAINT fk_notif_user
        FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
) ENGINE=InnoDB;

-- ============================================================
-- INDEXES TAMBAHAN
-- ============================================================
CREATE INDEX idx_profil_ibu_user ON profil_ibu_hamil(user_id);
CREATE INDEX idx_profil_bidan_user ON profil_bidan(user_id);
CREATE INDEX idx_konsultasi_ibu ON konsultasi(ibu_id);
CREATE INDEX idx_konsultasi_bidan ON konsultasi(bidan_id);
CREATE INDEX idx_konsultasi_status ON konsultasi(status);
CREATE INDEX idx_pesan_konsultasi ON pesan_konsultasi(konsultasi_id);
CREATE INDEX idx_booking_ibu ON booking(ibu_id);
CREATE INDEX idx_booking_bidan ON booking(bidan_id);
CREATE INDEX idx_booking_status ON booking(status);
CREATE INDEX idx_catatan_ibu ON catatan_kehamilan(ibu_id);
CREATE INDEX idx_catatan_tanggal ON catatan_kehamilan(tanggal_periksa);
CREATE INDEX idx_edukasi_trimester ON konten_edukasi(trimester);
CREATE INDEX idx_edukasi_minggu ON konten_edukasi(minggu_ke);
CREATE INDEX idx_risiko_ibu ON penilaian_risiko(ibu_id);
CREATE INDEX idx_notif_user ON notifikasi(user_id);
CREATE INDEX idx_notif_read ON notifikasi(is_read);
```

---

## 🗂️ STRUKTUR FOLDER PROYEK

```
sikembang/
├── assets/
│   ├── css/
│   │   └── style.css           ← Custom CSS (sesuai rule di atas)
│   ├── js/
│   │   ├── main.js             ← Logika umum + SweetAlert helpers
│   │   └── chart-config.js     ← Konfigurasi Chart.js
│   ├── img/
│   │   ├── logo.png
│   │   └── default-avatar.png
│   └── uploads/
│       ├── konsultasi/         ← Lampiran chat
│       └── edukasi/            ← Gambar artikel
├── config/
│   └── database.php
├── includes/
│   ├── header.php
│   ├── footer.php
│   ├── sidebar-ibu.php
│   └── sidebar-bidan.php
├── auth/
│   ├── login.php
│   ├── register.php
│   ├── logout.php
│   └── edit-profil.php
├── ibu/
│   ├── dashboard.php
│   ├── konsultasi/
│   │   ├── index.php
│   │   ├── buat.php
│   │   └── detail.php          ← Chat room
│   ├── booking/
│   │   ├── index.php
│   │   └── buat.php
│   ├── edukasi/
│   │   ├── index.php
│   │   └── detail.php
│   ├── catatan/
│   │   ├── index.php
│   │   └── tambah.php
│   ├── reminder/
│   │   ├── index.php
│   │   └── tambah.php
│   └── profil.php
├── bidan/
│   ├── dashboard.php
│   ├── data-ibu/
│   │   ├── index.php
│   │   └── detail.php
│   ├── konsultasi/
│   │   ├── index.php
│   │   └── detail.php          ← Chat + balas
│   ├── booking/
│   │   └── index.php
│   ├── edukasi/
│   │   ├── index.php
│   │   ├── tambah.php
│   │   └── edit.php
│   ├── risiko/
│   │   └── penilaian.php
│   └── laporan/
│       └── index.php
└── api/
    ├── get-notifikasi.php
    ├── kirim-pesan.php
    └── get-usia-kehamilan.php
```

---

## 👩‍🍼 FITUR IBU HAMIL

### A. Autentikasi

#### Register
- Input: Nama, Email, Password, No HP, Tanggal Lahir, HPHT, Golongan Darah, Riwayat Penyakit
- Setelah register → auto hitung HPL (HPHT + 280 hari) → simpan ke `profil_ibu_hamil`
- Validasi email unik, password minimal 8 karakter
- Redirect ke login + SweetAlert sukses

#### Login
- Email + Password
- Cek `role = 'ibu_hamil'` di tabel `users`
- Jika gagal → SweetAlert error

#### Edit Profil
- Update `users` (nama, foto, no HP) + `profil_ibu_hamil` (HPHT, berat, riwayat, dll)
- HPHT diubah → recalculate HPL otomatis

---

### B. Dashboard Kehamilan

**Komponen:**
1. **Kartu Usia Kehamilan** → hitung dari `profil_ibu_hamil.hpht` ke hari ini
   - Formula: `(today - hpht) / 7` = minggu ke-X
   - Tampilkan: "Minggu ke-24 (Trimester 2)"
2. **HPL Countdown** → hari tersisa menuju `profil_ibu_hamil.hpl`
3. **Progress Bar Trimester**
   - T1: 0-13 minggu | T2: 14-27 minggu | T3: 28-40 minggu
4. **Jadwal Booking Berikutnya** → query `booking WHERE ibu_id = ? AND status = 'diterima' AND tanggal_booking >= CURDATE() LIMIT 1`
5. **Notifikasi Badge** → count `notifikasi WHERE user_id = ? AND is_read = 0`
6. **Reminder Hari Ini** → query `reminder WHERE ibu_id = ? AND tanggal = CURDATE() AND is_selesai = 0`

---

### C. Konsultasi Online

**Alur:**
1. Ibu buat thread baru → pilih bidan, isi judul & pesan pertama
2. Insert ke `konsultasi` + `pesan_konsultasi`
3. Notifikasi otomatis ke bidan di `notifikasi`
4. Chat real-time (polling/AJAX) atau refresh
5. Upload lampiran → simpan ke `lampiran_konsultasi`
6. Bidan tandai selesai → update `konsultasi.status = 'selesai'`

**Aturan:**
- Ibu bisa memulai konsultasi baru kapan saja
- Riwayat tersimpan permanen
- File upload: jpg, jpeg, png, pdf, max 5MB

---

### D. Edukasi Kehamilan

**Filter Otomatis Berdasarkan Usia Kehamilan:**
```sql
SELECT * FROM konten_edukasi
WHERE is_published = 1
  AND (trimester = :trimester_saat_ini OR trimester = 'semua')
  AND (minggu_ke = :minggu_saat_ini OR minggu_ke IS NULL)
ORDER BY created_at DESC
```

**Kategori:**
- 🥦 Nutrisi Kehamilan
- ⚠️ Tanda Bahaya
- 🤱 Persiapan Menyusui
- 🏥 Persiapan Persalinan
- 💊 Tips Sehat Trimester 1/2/3
- 🧘 Aktivitas Fisik Ibu Hamil

---

### E. Booking Konsultasi

**Form:**
- Pilih Bidan (dropdown dari `users WHERE role = 'bidan'`)
- Tanggal (date picker, minimal H+1)
- Jam (time picker, sesuai jadwal bidan)
- Jenis: Online / Offline
- Keluhan singkat

**Status Flow:**
```
menunggu → diterima / ditolak → selesai
menunggu → dijadwalkan_ulang
```

**Notifikasi:**
- Bidan dapat notifikasi booking baru
- Ibu dapat notifikasi saat status berubah

---

### F. Catatan Kehamilan Digital

**Input per kunjungan:**
- Tanggal periksa, usia kehamilan (minggu), berat badan, tekanan darah, denyut janin, tinggi fundus, kadar Hb, keluhan, hasil lab, catatan

**Tampilan:**
- Tabel riwayat semua catatan
- Grafik berat badan (Chart.js Line Chart)
- Grafik tekanan darah (Chart.js Line Chart)

---

### G. Reminder

**Jenis Reminder:**
- 📅 Jadwal Kontrol Rutin
- 💊 Minum Vitamin
- 🧪 Tes Lab Penting
- 📋 Lainnya

**Fitur:**
- Set tanggal & jam
- Opsi berulang (harian/mingguan/bulanan)
- List aktif & selesai

---

## 👩‍⚕️ FITUR BIDAN

### A. Dashboard Bidan

**Stat Cards:**
```sql
-- Total ibu terdaftar
SELECT COUNT(*) FROM users WHERE role = 'ibu_hamil' AND is_aktif = 1

-- Konsultasi aktif hari ini
SELECT COUNT(*) FROM konsultasi 
WHERE bidan_id = :id AND status = 'aktif'

-- Booking masuk (menunggu konfirmasi)
SELECT COUNT(*) FROM booking 
WHERE bidan_id = :id AND status = 'menunggu'

-- Notifikasi belum dibaca
SELECT COUNT(*) FROM notifikasi 
WHERE user_id = :id AND is_read = 0
```

**Widgets:**
- Tabel 5 booking terbaru
- Tabel 5 konsultasi terbaru (belum dibalas)
- Daftar ibu dengan risiko tinggi

---

### B. Manajemen Data Ibu

**List Ibu:**
- Tabel semua ibu hamil terdaftar
- Filter: risiko, trimester, bulan HPL
- Kolom: Nama, Usia Kehamilan, HPL, Risiko Terakhir, Aksi

**Detail Ibu:**
- Profil lengkap dari `profil_ibu_hamil`
- Tab: Riwayat Konsultasi | Riwayat Catatan | Penilaian Risiko
- Grafik berat badan ibu tersebut
- Tombol "Nilai Risiko" → form penilaian risiko

---

### C. Balas Konsultasi

- Sama seperti chat ibu (dua arah)
- Tombol "Kirim Artikel Edukasi" → pilih artikel dari `konten_edukasi` → kirim sebagai pesan
- Tombol "Tandai Selesai" → update `konsultasi.status = 'selesai'`

---

### D. Kelola Konten Edukasi

**CRUD Artikel:**
- Judul, Kategori (FK ke `kategori_edukasi`), Trimester, Minggu ke-, Konten (textarea/rich text), Gambar, Status Publish

**Validasi:**
- Judul tidak boleh duplikat
- Gambar: jpg/png/webp, max 3MB

---

### E. Konfirmasi Booking

**Tabel Booking Masuk:**
- Filter: status, tanggal
- Aksi per baris: Terima | Tolak | Jadwalkan Ulang
- Jika Tolak → SweetAlert minta alasan → simpan ke `booking.alasan_tolak`
- Jika Jadwalkan Ulang → form tanggal & jam baru → simpan ke `jadwal_ulang_booking`
- Jika Terima → update `booking.status = 'diterima'` → notif ke ibu

---

### F. Penilaian Risiko

**Form Penilaian:**

| Faktor | Bobot |
|--------|-------|
| Usia ibu < 20 tahun | +2 |
| Usia ibu > 35 tahun | +2 |
| Riwayat hipertensi | +3 |
| Riwayat diabetes | +3 |
| Riwayat keguguran ≥ 2 | +2 |
| Hb < 10 g/dL | +2 |
| Tekanan darah > 140/90 | +3 |
| Kehamilan pertama | +1 |
| Kehamilan ke-5 atau lebih | +2 |

**Kategori Skor:**
- **Rendah (0-3):** Kehamilan normal, kontrol rutin
- **Sedang (4-6):** Perlu pemantauan lebih ketat
- **Tinggi (7+):** Rujuk ke fasilitas lebih tinggi

---

### G. Laporan

**Laporan tersedia:**
1. Rekap konsultasi per bulan (tabel + export)
2. Data ibu per risiko (pie chart)
3. Booking per status (bar chart)
4. Grafik distribusi usia kehamilan ibu terdaftar

---

## 📌 STRUKTUR MENU FINAL

### Ibu Hamil (Sidebar)
```
🏠 Dashboard
💬 Konsultasi
📅 Booking
📚 Edukasi
📝 Catatan Kehamilan
🔔 Reminder
👤 Profil
```

Font Awesome icons:
- `fa-house`, `fa-comments`, `fa-calendar-check`, `fa-book-open-reader`, `fa-notebook`, `fa-bell`, `fa-circle-user`

### Bidan (Sidebar)
```
🏠 Dashboard
👩‍🍼 Data Ibu
💬 Konsultasi
📅 Booking
📚 Edukasi
📊 Laporan
👤 Profil
```

Font Awesome icons:
- `fa-house`, `fa-users`, `fa-comments`, `fa-calendar-check`, `fa-book-open-reader`, `fa-chart-bar`, `fa-circle-user`

---

## 🔥 FITUR UNGGULAN TAMBAHAN

### 1. Timeline Kehamilan Visual
Progress milestone per trimester yang muncul otomatis di dashboard ibu.
```
Minggu 1-4   → Sel telur dibuahi
Minggu 5-8   → Jantung mulai berdetak
Minggu 9-12  → Organ terbentuk (T1 selesai)
Minggu 13-16 → Gerakan pertama
Minggu 17-20 → USG anatomi
Minggu 28+   → Persiapan persalinan
Minggu 37+   → Bayi sudah siap lahir
```

### 2. Auto Notifikasi Peringatan
Cron job / pengecekan saat login:
```sql
-- Ibu tidak kontrol > 30 hari
SELECT * FROM catatan_kehamilan
WHERE ibu_id = :id
ORDER BY tanggal_periksa DESC LIMIT 1
-- jika tanggal_periksa < DATE_SUB(NOW(), INTERVAL 30 DAY)
-- → tampilkan SweetAlert peringatan
```

### 3. Grafik Perkembangan
- Line Chart berat badan (Chart.js)
- Line Chart tekanan darah sistolik/diastolik
- Color threshold: merah jika di luar batas normal

---

## ⚙️ LOGIKA BISNIS PENTING

### Hitung Usia Kehamilan
```php
function hitungUsiaKehamilan($hpht) {
    $hpht = new DateTime($hpht);
    $today = new DateTime();
    $diff = $hpht->diff($today);
    $totalHari = $diff->days;
    $minggu = floor($totalHari / 7);
    $hari = $totalHari % 7;
    return ['minggu' => $minggu, 'hari' => $hari];
}
```

### Hitung Trimester
```php
function hitungTrimester($minggu) {
    if ($minggu <= 13) return 1;
    if ($minggu <= 27) return 2;
    return 3;
}
```

### Hitung HPL
```php
function hitungHPL($hpht) {
    $hpht = new DateTime($hpht);
    $hpht->modify('+280 days');
    return $hpht->format('Y-m-d');
}
```

### Hitung Skor Risiko
```php
function hitungSkorRisiko($data) {
    $skor = 0;
    if ($data['usia'] < 20 || $data['usia'] > 35) $skor += 2;
    if ($data['hipertensi']) $skor += 3;
    if ($data['diabetes']) $skor += 3;
    if ($data['keguguran'] >= 2) $skor += 2;
    if ($data['hb'] < 10) $skor += 2;
    if ($data['sistolik'] > 140 || $data['diastolik'] > 90) $skor += 3;
    if ($data['kehamilan_ke'] == 1) $skor += 1;
    if ($data['kehamilan_ke'] >= 5) $skor += 2;
    
    if ($skor <= 3) return ['skor' => $skor, 'kategori' => 'rendah'];
    if ($skor <= 6) return ['skor' => $skor, 'kategori' => 'sedang'];
    return ['skor' => $skor, 'kategori' => 'tinggi'];
}
```

---

## 🔐 KEAMANAN

| Aspek | Implementasi |
|-------|--------------|
| Password | `password_hash()` + `password_verify()` |
| Session | `session_start()`, session timeout 2 jam |
| Role Guard | Cek `$_SESSION['role']` di setiap halaman |
| SQL Injection | PDO Prepared Statements |
| XSS | `htmlspecialchars()` di semua output |
| CSRF | Token di setiap form |
| Upload | Validasi ekstensi + MIME type + rename file |
| Direktori Upload | Di luar public root atau dengan `.htaccess` |

---

## 📊 ERD RINGKAS (Relasi Antar Tabel)

```
users
  ├──(1:N)── profil_ibu_hamil
  ├──(1:N)── profil_bidan
  ├──(1:N)── konsultasi [sebagai ibu_id]
  ├──(1:N)── konsultasi [sebagai bidan_id]
  ├──(1:N)── pesan_konsultasi [sebagai pengirim_id]
  ├──(1:N)── booking [sebagai ibu_id]
  ├──(1:N)── booking [sebagai bidan_id]
  ├──(1:N)── catatan_kehamilan
  ├──(1:N)── penilaian_risiko [sebagai ibu_id]
  ├──(1:N)── penilaian_risiko [sebagai bidan_id]
  ├──(1:N)── reminder
  ├──(1:N)── notifikasi
  └──(1:N)── konten_edukasi [sebagai bidan_id]

konsultasi
  └──(1:N)── pesan_konsultasi
              └──(1:N)── lampiran_konsultasi

booking
  └──(1:1)── jadwal_ulang_booking

kategori_edukasi
  └──(1:N)── konten_edukasi

profil_ibu_hamil
  └──(1:N)── catatan_kehamilan (logis, via ibu_id)
  └──(1:N)── penilaian_risiko (logis, via ibu_id)
```

---

*Rule SIKEMBANG v1.0 — Sistem Konsultasi & Edukasi Ibu Hamil Berkelanjutan*
*Warna Primer: #EC1E88 | Teks di atas primer: #FFFFFF*
