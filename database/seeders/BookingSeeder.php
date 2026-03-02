<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Booking;
use App\Models\JadwalUlangBooking;

class BookingSeeder extends Seeder
{
    public function run(): void
    {
        $bidanAdmin = User::where('email', 'bidan@sikembang.com')->first();
        $ibuHamils = User::where('role', 'ibu_hamil')->get();

        if (!$bidanAdmin) {
            $this->command->info('Bidan not found. Skipping Booking seeding.');
            return;
        }

        $statuses = ['menunggu', 'diterima', 'ditolak', 'selesai', 'dijadwalkan_ulang'];
        $jenises = ['offline', 'online'];
        $keluhans = [
            'Konsultasi rutin pemeriksaan kehamilan',
            'Pemeriksaan USG lanjutan',
            'Konsultasi hasil laboratorium',
            'Keluhan mual dan pusing',
            'Pemantauan perkembangan janin',
            'Kontrol setelah pemeriksaan sebelumnya',
            'Konsultasi nutrisi kehamilan',
            'Pemeriksaan tekanan darah',
            'Konsultasi persiapan persalinan',
            'Pemeriksaan denyut jantung bayi',
        ];

        $tanggalBookingBase = now()->addDays(-10);

        foreach ($ibuHamils as $index => $ibu) {
            $tanggal = $tanggalBookingBase->copy()->addDays(rand(1, 60))->format('Y-m-d');
            $status = $statuses[array_rand($statuses)];
            $jenis = $jenises[array_rand($jenises)];
            $keluhan = $keluhans[array_rand($keluhans)];
            
            $booking = Booking::create([
                'ibu_id' => $ibu->id,
                'bidan_id' => $bidanAdmin->id,
                'tanggal_booking' => $tanggal,
                'jam_booking' => sprintf('%02d:00:00', rand(8, 16)),
                'jenis' => $jenis,
                'keluhan' => $keluhan,
                'status' => $status,
                'catatan_bidan' => $status === 'diterima' ? 'Booking diterima, siapkan pertanyaan untuk diskusi.' : null,
                'alasan_tolak' => $status === 'ditolak' ? 'Jadwal bidan penuh pada tanggal tersebut.' : null,
                'created_at' => now()->subDays(rand(1, 30)),
            ]);

            if ($status === 'dijadwalkan_ulang') {
                JadwalUlangBooking::create([
                    'booking_id' => $booking->id,
                    'tanggal_baru' => date('Y-m-d', strtotime($tanggal . ' +3 days')),
                    'jam_baru' => sprintf('%02d:00:00', rand(9, 15)),
                    'alasan' => 'Jadwal bidan bersamaan dengan kegiatan lain, diganti hari berikutnya.',
                ]);
            }

            if ($index % 4 === 0) {
                $status2 = rand(0, 1) ? 'selesai' : 'ditolak';
                $tanggal2 = $tanggalBookingBase->copy()->subDays(rand(1, 30))->format('Y-m-d');
                
                Booking::create([
                    'ibu_id' => $ibu->id,
                    'bidan_id' => $bidanAdmin->id,
                    'tanggal_booking' => $tanggal2,
                    'jam_booking' => sprintf('%02d:00:00', rand(8, 16)),
                    'jenis' => $jenises[array_rand($jenises)],
                    'keluhan' => $keluhans[array_rand($keluhans)],
                    'status' => $status2,
                    'catatan_bidan' => $status2 === 'selesai' ? 'Pemeriksaan selesai, kondisi ibu dan bayi sehat.' : null,
                    'alasan_tolak' => $status2 === 'ditolak' ? 'Ibu tidak hadir tanpa konfirmasi.' : null,
                    'created_at' => now()->subDays(rand(31, 60)),
                ]);
            }

            if ($index % 3 === 0) {
                Booking::create([
                    'ibu_id' => $ibu->id,
                    'bidan_id' => $bidanAdmin->id,
                    'tanggal_booking' => now()->addDays(rand(3, 14))->format('Y-m-d'),
                    'jam_booking' => sprintf('%02d:00:00', rand(8, 16)),
                    'jenis' => $jenises[array_rand($jenises)],
                    'keluhan' => $keluhans[array_rand($keluhans)],
                    'status' => 'menunggu',
                    'catatan_bidan' => null,
                    'alasan_tolak' => null,
                    'created_at' => now()->subHours(rand(1, 72)),
                ]);
            }
        }
    }
}
