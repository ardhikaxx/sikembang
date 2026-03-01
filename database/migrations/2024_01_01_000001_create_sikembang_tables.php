<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap');
            $table->string('email')->unique();
            $table->string('password');
            $table->enum('role', ['ibu_hamil', 'bidan']);
            $table->string('foto_profil')->nullable();
            $table->string('no_hp', 20)->nullable();
            $table->boolean('is_aktif')->default(true);
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });

        Schema::create('profil_ibu_hamil', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->date('tanggal_lahir')->nullable();
            $table->tinyInteger('usia')->nullable();
            $table->date('hpht')->nullable();
            $table->date('hpl')->nullable();
            $table->enum('golongan_darah', ['A', 'B', 'AB', 'O'])->nullable();
            $table->enum('rhesus', ['+', '-'])->nullable();
            $table->decimal('berat_sebelum', 5, 2)->nullable();
            $table->decimal('tinggi_badan', 5, 2)->nullable();
            $table->text('alamat')->nullable();
            $table->text('riwayat_penyakit')->nullable();
            $table->text('riwayat_alergi')->nullable();
            $table->tinyInteger('kehamilan_ke')->default(1);
            $table->tinyInteger('anak_hidup')->default(0);
            $table->tinyInteger('keguguran')->default(0);
            $table->timestamps();
        });

        Schema::create('profil_bidan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('no_str', 50)->nullable();
            $table->string('instansi', 200)->nullable();
            $table->string('spesialisasi', 150)->nullable();
            $table->tinyInteger('pengalaman_tahun')->default(0);
            $table->json('jadwal_praktek')->nullable();
            $table->text('bio')->nullable();
            $table->timestamps();
        });

        Schema::create('kategori_edukasi', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 100);
            $table->string('slug', 120)->unique();
            $table->text('deskripsi')->nullable();
            $table->string('icon', 100)->nullable();
            $table->tinyInteger('urutan')->default(0);
            $table->timestamps();
        });

        Schema::create('konten_edukasi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kategori_id')->constrained('kategori_edukasi')->onDelete('restrict');
            $table->foreignId('bidan_id')->constrained('users')->onDelete('restrict');
            $table->string('judul', 255);
            $table->string('slug', 270)->unique();
            $table->longText('konten');
            $table->string('gambar')->nullable();
            $table->enum('trimester', ['1', '2', '3', 'semua'])->default('semua');
            $table->tinyInteger('minggu_ke')->nullable();
            $table->boolean('is_published')->default(false);
            $table->integer('views')->default(0);
            $table->timestamps();
        });

        Schema::create('konsultasi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ibu_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('bidan_id')->constrained('users')->onDelete('restrict');
            $table->string('judul', 255);
            $table->enum('status', ['aktif', 'selesai', 'ditutup'])->default('aktif');
            $table->boolean('is_read_bidan')->default(false);
            $table->boolean('is_read_ibu')->default(false);
            $table->timestamps();
        });

        Schema::create('pesan_konsultasi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('konsultasi_id')->constrained('konsultasi')->onDelete('cascade');
            $table->foreignId('pengirim_id')->constrained('users')->onDelete('cascade');
            $table->text('pesan');
            $table->boolean('is_read')->default(false);
            $table->timestamps();
        });

        Schema::create('lampiran_konsultasi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pesan_id')->constrained('pesan_konsultasi')->onDelete('cascade');
            $table->string('nama_file');
            $table->string('path_file');
            $table->string('tipe_file', 100)->nullable();
            $table->integer('ukuran_file')->nullable();
            $table->timestamps();
        });

        Schema::create('booking', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ibu_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('bidan_id')->constrained('users')->onDelete('restrict');
            $table->date('tanggal_booking');
            $table->time('jam_booking');
            $table->enum('jenis', ['online', 'offline'])->default('offline');
            $table->text('keluhan')->nullable();
            $table->enum('status', ['menunggu', 'diterima', 'ditolak', 'selesai', 'dijadwalkan_ulang'])->default('menunggu');
            $table->text('catatan_bidan')->nullable();
            $table->text('alasan_tolak')->nullable();
            $table->timestamps();
        });

        Schema::create('jadwal_ulang_booking', function (Blueprint $table) {
            $table->id();
            $table->foreignId('booking_id')->constrained('booking')->onDelete('cascade')->unique();
            $table->date('tanggal_baru');
            $table->time('jam_baru');
            $table->text('alasan')->nullable();
            $table->timestamps();
        });

        Schema::create('catatan_kehamilan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ibu_id')->constrained('users')->onDelete('cascade');
            $table->date('tanggal_periksa');
            $table->tinyInteger('usia_kehamilan')->nullable();
            $table->decimal('berat_badan', 5, 2)->nullable();
            $table->string('tekanan_darah', 20)->nullable();
            $table->unsignedTinyInteger('denyut_janin')->nullable();
            $table->decimal('tinggi_fundus', 5, 2)->nullable();
            $table->decimal('kadar_hb', 4, 2)->nullable();
            $table->text('keluhan')->nullable();
            $table->text('hasil_lab')->nullable();
            $table->text('catatan_tambahan')->nullable();
            $table->timestamps();
        });

        Schema::create('penilaian_risiko', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ibu_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('bidan_id')->constrained('users')->onDelete('restrict');
            $table->enum('kategori_risiko', ['rendah', 'sedang', 'tinggi']);
            $table->tinyInteger('skor_risiko')->default(0);
            $table->json('faktor_risiko')->nullable();
            $table->text('rekomendasi')->nullable();
            $table->date('tanggal_penilaian');
            $table->timestamps();
        });

        Schema::create('reminder', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ibu_id')->constrained('users')->onDelete('cascade');
            $table->string('judul', 150);
            $table->text('deskripsi')->nullable();
            $table->enum('jenis', ['kontrol', 'vitamin', 'lab', 'lainnya'])->default('lainnya');
            $table->date('tanggal');
            $table->time('jam')->nullable();
            $table->boolean('is_berulang')->default(false);
            $table->enum('frekuensi', ['harian', 'mingguan', 'bulanan'])->nullable();
            $table->boolean('is_aktif')->default(true);
            $table->boolean('is_selesai')->default(false);
            $table->timestamps();
        });

        Schema::create('notifikasi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('judul', 200);
            $table->text('pesan');
            $table->enum('tipe', ['konsultasi', 'booking', 'reminder', 'risiko', 'sistem'])->default('sistem');
            $table->unsignedBigInteger('referensi_id')->nullable();
            $table->string('referensi_tipe', 50)->nullable();
            $table->boolean('is_read')->default(false);
            $table->timestamps();
        });

        Schema::create('personal_access_tokens', function (Blueprint $table) {
            $table->id();
            $table->morphs('tokenable');
            $table->string('name');
            $table->string('token', 64)->unique();
            $table->text('abilities')->nullable();
            $table->timestamp('last_used_at')->nullable();
            $table->timestamp('expires_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('personal_access_tokens');
        Schema::dropIfExists('notifikasi');
        Schema::dropIfExists('reminder');
        Schema::dropIfExists('penilaian_risiko');
        Schema::dropIfExists('catatan_kehamilan');
        Schema::dropIfExists('jadwal_ulang_booking');
        Schema::dropIfExists('booking');
        Schema::dropIfExists('lampiran_konsultasi');
        Schema::dropIfExists('pesan_konsultasi');
        Schema::dropIfExists('konsultasi');
        Schema::dropIfExists('konten_edukasi');
        Schema::dropIfExists('kategori_edukasi');
        Schema::dropIfExists('profil_bidan');
        Schema::dropIfExists('profil_ibu_hamil');
        Schema::dropIfExists('sessions');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('users');
    }
};
