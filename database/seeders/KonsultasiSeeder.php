<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Konsultasi;
use App\Models\PesanKonsultasi;

class KonsultasiSeeder extends Seeder
{
    public function run(): void
    {
        $bidanAdmin = User::where('email', 'bidan@sikembang.com')->first();
        $ibuHamils = User::where('role', 'ibu_hamil')->take(40)->get();

        if (!$bidanAdmin) {
            $this->command->info('Bidan not found. Skipping Konsultasi seeding.');
            return;
        }

        $judulKonsultasi = [
            'Perkembangan Janin',
            'Nutrisi Kehamilan',
            'Keluhan Mual dan Muntah',
            'Nyeri Punggung',
            'Pusing dan Lemah',
            'Hasil Pemeriksaan USG',
            'Pergerakan Janin',
            'Persiapan Menyusui',
            'Tanda Bahaya Kehamilan',
            'Tips Tidur Nyaman',
            'Aktivitas Fisik Saat Hamil',
            'Kebutuhan Vitamin',
            'Mood Swing',
            'Keputihan Saat Hamil',
            'Pembengkakan Kaki',
        ];

        $pesanIbu = [
            'Halo Bidan, saya ingin berkonsultasi tentang kondisi kehamilan saya.',
            'Bidan, apakah normal merasa mual terus-terusan di usia kehamilan ini?',
            'Saya sering merasa pusing dan lemas, apakah perlu khawatir?',
            'Hasil USG saya sudah keluar, mohon direview Bidan.',
            'Bidan, apakah boleh melakukan olahraga saat hamil?',
            'Saya mengalami kram kaki di malam hari, bagaimana mengatasinya?',
            'Apakah normal jika belum merasakan gerakan janinn saya?',
            'Bidan, makanan apa saja yang harus dihindari saat hamil?',
            'Saya sering susah tidur akhir-akhir ini, ada tips tidur yang baik?',
            'Apakah vitamin tambahan diperlukan selain dari makanan?',
        ];

        $pesanBidan = [
            'Halo Ibu, terima kasih sudah berkonsultasi. Kondisi yang Ibu alami masih dalam batas normal. Tetap menjaga pola makan dan istirahat yang cukup ya.',
            'Ibu, mual dan muntah di trimester pertama memang umum terjadi. Pastikan makan sedikit tapi sering, dan hindari makanan berbau menyengat.',
            'Ibu, pusing dan lemas bisa disebabkan oleh anemia atau tekanan darah rendah. Sebaiknya periksa hemoglobin dan tekanan darah ya.',
            'Saya sudah review hasil USG Ibu, alhamdullilah everything looks normal. Janin berkembang dengan baik.',
            'Ibu boleh olahraga ringan seperti jalan kaki atau yoga hamil. Hindari olahraga yang berisiko jatuh atau terlalu berat.',
            'Kram kaki biasa terjadi karena kekurangan magnesium/kalsium. Perbanyak minum susu dan makan makanan bergizi.',
            'Gerakan janin umumnya mulai terasa di usia kehamilan 18-20 minggu. Jangan khawatir ya Ibu, setiap orang berbeda.',
            'Ibu sebaiknya hindari makanan mentah, seafood tinggi merkuri, makanan pedas berlebihan, dan beverages berkafein.',
            'Coba gunakan bantal hamil untuk menyangga tubuh, hindari tidur telentang, dan jaga kamar tetap sejuk.',
            'Vitamin prenatal sangat penting ya Ibu, konsumsi sesuai anjuran ditambah makanan bergizi seimbang.',
        ];

        $statuses = ['aktif', 'selesai', 'ditutup'];
        
        foreach ($ibuHamils as $index => $ibu) {
            $status = $statuses[array_rand($statuses)];
            $judul = $judulKonsultasi[array_rand($judulKonsultasi)];
            
            $createdAt = now()->subDays(rand(1, 45));

            $konsultasi = Konsultasi::create([
                'ibu_id' => $ibu->id,
                'bidan_id' => $bidanAdmin->id,
                'judul' => $judul,
                'status' => $status,
                'is_read_bidan' => $status === 'selesai' || $status === 'ditutup',
                'is_read_ibu' => true,
                'created_at' => $createdAt,
            ]);

            $pesanIdx = array_rand($pesanIbu);
            
            PesanKonsultasi::create([
                'konsultasi_id' => $konsultasi->id,
                'pengirim_id' => $ibu->id,
                'pesan' => $pesanIbu[$pesanIdx],
                'is_read' => true,
                'created_at' => $createdAt,
            ]);

            if ($status !== 'ditutup') {
                PesanKonsultasi::create([
                    'konsultasi_id' => $konsultasi->id,
                    'pengirim_id' => $bidanAdmin->id,
                    'pesan' => $pesanBidan[$pesanIdx],
                    'is_read' => $status === 'selesai',
                    'created_at' => $createdAt->addHours(rand(1, 24)),
                ]);
            }

            if ($status === 'aktif' && $index % 2 === 0) {
                PesanKonsultasi::create([
                    'konsultasi_id' => $konsultasi->id,
                    'pengirim_id' => $ibu->id,
                    'pesan' => 'Terima kasih Bidan atas informasinya. Apakah ada pantangan lain yang harus saya hindari?',
                    'is_read' => false,
                    'created_at' => now()->subHours(rand(1, 12)),
                ]);
            }

            if ($index < 15) {
                $status2 = rand(0, 1) ? 'selesai' : 'ditutup';
                $konsultasi2 = Konsultasi::create([
                    'ibu_id' => $ibu->id,
                    'bidan_id' => $bidanAdmin->id,
                    'judul' => $judulKonsultasi[array_rand($judulKonsultasi)],
                    'status' => $status2,
                    'is_read_bidan' => true,
                    'is_read_ibu' => true,
                    'created_at' => now()->subDays(rand(46, 90)),
                ]);

                PesanKonsultasi::create([
                    'konsultasi_id' => $konsultasi2->id,
                    'pengirim_id' => $ibu->id,
                    'pesan' => 'Bidan, saya ingin konsultasi tentang...',
                    'is_read' => true,
                    'created_at' => now()->subDays(rand(46, 90)),
                ]);

                PesanKonsultasi::create([
                    'konsultasi_id' => $konsultasi2->id,
                    'pengirim_id' => $bidanAdmin->id,
                    'pesan' => 'Baik Ibu, terima kasih sudah berkonsultasi. Condition normal ya, tetap jaga kesehatan.',
                    'is_read' => true,
                    'created_at' => now()->subDays(rand(40, 85)),
                ]);
            }
        }
    }
}
