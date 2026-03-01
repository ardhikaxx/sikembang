<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Reminder;
// No Faker needed for hardcoded data
// use Faker\Factory as Faker;

class ReminderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // No Faker needed
        // $faker = Faker::create('id_ID');

        // Get specific Ibu Hamil users
        $ibuFatimah = User::where('email', 'fatimah.azzahra@sikembang.com')->first();
        $ibuSiti = User::where('email', 'siti.aminah@sikembang.com')->first();
        $ibuDian = User::where('email', 'dian.pertiwi@sikembang.com')->first();

        // Ensure users exist
        if (!$ibuFatimah || !$ibuSiti || !$ibuDian) {
            $this->command->info('Required Ibu Hamil users not found. Skipping Reminder seeding.');
            return;
        }

        // --- Reminders for Fatimah Azzahra ---
        Reminder::create([
            'ibu_id' => $ibuFatimah->id,
            'judul' => 'Jadwal Kontrol Bidan',
            'deskripsi' => 'Kontrol rutin kehamilan di Puskesmas Sehat.',
            'jenis' => 'kontrol',
            'tanggal' => '2025-03-10', // Consistent with booking
            'jam' => '10:00:00',
            'is_berulang' => false,
            'frekuensi' => null,
            'is_aktif' => true,
            'is_selesai' => false,
        ]);
        Reminder::create([
            'ibu_id' => $ibuFatimah->id,
            'judul' => 'Minum Suplemen Zat Besi',
            'deskripsi' => 'Ingat untuk minum suplemen zat besi setiap hari.',
            'jenis' => 'vitamin',
            'tanggal' => '2025-03-01', // Today
            'jam' => '08:00:00',
            'is_berulang' => true,
            'frekuensi' => 'harian',
            'is_aktif' => true,
            'is_selesai' => false,
        ]);

        // --- Reminders for Siti Aminah ---
        Reminder::create([
            'ibu_id' => $ibuSiti->id,
            'judul' => 'Ambil Hasil Lab',
            'deskripsi' => 'Hasil lab terakhir sudah bisa diambil di klinik.',
            'jenis' => 'lab',
            'tanggal' => '2025-03-05',
            'jam' => '13:00:00',
            'is_berulang' => false,
            'frekuensi' => null,
            'is_aktif' => true,
            'is_selesai' => false,
        ]);

        // --- Reminders for Dian Pertiwi ---
        Reminder::create([
            'ibu_id' => $ibuDian->id,
            'judul' => 'Senam Hamil',
            'deskripsi' => 'Ikut kelas senam hamil online untuk menjaga kebugaran.',
            'jenis' => 'lainnya',
            'tanggal' => '2025-03-03',
            'jam' => '15:00:00',
            'is_berulang' => true,
            'frekuensi' => 'mingguan',
            'is_aktif' => true,
            'is_selesai' => false,
        ]);
    }
}
