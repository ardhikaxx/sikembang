<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Notifikasi;
use App\Models\Konsultasi;
use App\Models\Booking;
use App\Models\Reminder;
use App\Models\PenilaianRisiko;
// No Faker needed for hardcoded data
// use Faker\Factory as Faker;

class NotifikasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // No Faker needed
        // $faker = Faker::create('id_ID');

        // Get specific Bidan and Ibu Hamil users
        $bidanAdmin = User::where('email', 'bidan@sikembang.com')->first();
        $ibuFatimah = User::where('email', 'fatimah.azzahra@sikembang.com')->first();
        $ibuSiti = User::where('email', 'siti.aminah@sikembang.com')->first();
        $ibuDian = User::where('email', 'dian.pertiwi@sikembang.com')->first();

        // Ensure users exist
        if (!$bidanAdmin || !$ibuFatimah || !$ibuSiti || !$ibuDian) {
            $this->command->info('Required Bidan or Ibu Hamil users not found. Skipping Notifikasi seeding.');
            return;
        }

        // Get IDs of hardcoded related entities
        $konsultasiFatimah = Konsultasi::where('ibu_id', $ibuFatimah->id)->first();
        $konsultasiSiti = Konsultasi::where('ibu_id', $ibuSiti->id)->first();

        $bookingFatimah = Booking::where('ibu_id', $ibuFatimah->id)->first();
        $bookingSiti = Booking::where('ibu_id', $ibuSiti->id)->first();

        $reminderFatimah = Reminder::where('ibu_id', $ibuFatimah->id)->first();

        $penilaianRisikoFatimah = PenilaianRisiko::where('ibu_id', $ibuFatimah->id)->first();
        $penilaianRisikoDian = PenilaianRisiko::where('ibu_id', $ibuDian->id)->first();


        // --- Notifications for Bidan Admin ---
        if ($konsultasiFatimah) {
            Notifikasi::create([
                'user_id' => $bidanAdmin->id,
                'judul' => 'Konsultasi Baru dari Ibu Fatimah',
                'pesan' => 'Anda memiliki pesan baru dari Ibu Fatimah Azzahra mengenai perkembangan janin.',
                'tipe' => 'konsultasi',
                'referensi_id' => $konsultasiFatimah->id,
                'referensi_tipe' => Konsultasi::class,
                'is_read' => false,
            ]);
        }
        if ($bookingFatimah) {
            Notifikasi::create([
                'user_id' => $bidanAdmin->id,
                'judul' => 'Booking Baru dari Ibu Fatimah',
                'pesan' => 'Ibu Fatimah Azzahra membuat janji offline pada 10 Maret 2025.',
                'tipe' => 'booking',
                'referensi_id' => $bookingFatimah->id,
                'referensi_tipe' => Booking::class,
                'is_read' => false,
            ]);
        }
        if ($penilaianRisikoFatimah) {
            Notifikasi::create([
                'user_id' => $bidanAdmin->id,
                'judul' => 'Penilaian Risiko Ibu Fatimah Diperbarui',
                'pesan' => 'Skor risiko Ibu Fatimah Azzahra telah diperbarui menjadi Sedang.',
                'tipe' => 'risiko',
                'referensi_id' => $penilaianRisikoFatimah->id,
                'referensi_tipe' => PenilaianRisiko::class,
                'is_read' => true,
            ]);
        }

        // --- Notifications for Ibu Fatimah ---
        if ($konsultasiFatimah) {
            Notifikasi::create([
                'user_id' => $ibuFatimah->id,
                'judul' => 'Balasan Konsultasi Anda',
                'pesan' => 'Bidan Admin telah membalas pesan konsultasi Anda.',
                'tipe' => 'konsultasi',
                'referensi_id' => $konsultasiFatimah->id,
                'referensi_tipe' => Konsultasi::class,
                'is_read' => false,
            ]);
        }
        if ($reminderFatimah) {
            Notifikasi::create([
                'user_id' => $ibuFatimah->id,
                'judul' => 'Pengingat: Jadwal Kontrol Bidan',
                'pesan' => 'Jangan lupa jadwal kontrol Anda pada 10 Maret 2025 pukul 10:00.',
                'tipe' => 'reminder',
                'referensi_id' => $reminderFatimah->id,
                'referensi_tipe' => Reminder::class,
                'is_read' => false,
            ]);
        }
        Notifikasi::create([
            'user_id' => $ibuFatimah->id,
            'judul' => 'Selamat Datang di SIKEMBANG!',
            'pesan' => 'Terima kasih telah bergabung dengan SIKEMBANG. Jelajahi fitur-fitur kami.',
            'tipe' => 'sistem',
            'referensi_id' => null,
            'referensi_tipe' => null,
            'is_read' => true,
        ]);

        // --- Notifications for Ibu Siti ---
        if ($bookingSiti) {
            Notifikasi::create([
                'user_id' => $ibuSiti->id,
                'judul' => 'Booking Diterima',
                'pesan' => 'Janji temu Anda dengan Bidan Admin pada 15 Maret 2025 telah diterima.',
                'tipe' => 'booking',
                'referensi_id' => $bookingSiti->id,
                'referensi_tipe' => Booking::class,
                'is_read' => false,
            ]);
        }
        if ($konsultasiSiti) {
             Notifikasi::create([
                'user_id' => $ibuSiti->id,
                'judul' => 'Balasan Konsultasi',
                'pesan' => 'Bidan Admin telah membalas konsultasi Anda mengenai hasil USG.',
                'tipe' => 'konsultasi',
                'referensi_id' => $konsultasiSiti->id,
                'referensi_tipe' => Konsultasi::class,
                'is_read' => true,
            ]);
        }

        // --- Notifications for Ibu Dian ---
        if ($penilaianRisikoDian) {
            Notifikasi::create([
                'user_id' => $ibuDian->id,
                'judul' => 'Peringatan Risiko Tinggi',
                'pesan' => 'Hasil penilaian risiko Anda menunjukkan kategori TINGGI. Mohon segera konsultasi dengan bidan.',
                'tipe' => 'risiko',
                'referensi_id' => $penilaianRisikoDian->id,
                'referensi_tipe' => PenilaianRisiko::class,
                'is_read' => false,
            ]);
        }
    }
}
