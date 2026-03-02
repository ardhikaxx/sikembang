<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\PenilaianRisiko;

class PenilaianRisikoSeeder extends Seeder
{
    public function run(): void
    {
        $bidanAdmin = User::where('email', 'bidan@sikembang.com')->first();
        $ibuHamils = User::where('role', 'ibu_hamil')->get();

        if (!$bidanAdmin) {
            $this->command->info('Bidan not found. Skipping PenilaianRisiko seeding.');
            return;
        }

        $riskData = [
            ['kategori' => 'rendah', 'skor' => rand(1, 5), 'faktor' => ['Tidak ada riwayat penyakit', 'Usia ideal (20-35 tahun)', 'Kehamilan sehat']],
            ['kategori' => 'sedang', 'skor' => rand(6, 10), 'faktor' => ['Anemia', 'Usia kurang dari 20 tahun', 'Usia lebih dari 35 tahun']],
            ['kategori' => 'tinggi', 'skor' => rand(11, 15), 'faktor' => ['Hipertensi Kronis', 'Diabetes', 'Riwayat Keguguran', 'Rhesus Negatif']],
        ];

        foreach ($ibuHamils as $index => $ibu) {
            $profil = $ibu->profilIbuHamil;
            if (!$profil) continue;

            $riwayatPenyakit = strtolower($profil->riwayat_penyakit ?? '');
            $usia = $profil->usia ?? 0;
            $kehamilanKe = $profil->kehamilan_ke ?? 1;
            $rhesus = $profil->rhesus ?? '+';

            if (strpos($riwayatPenyakit, 'diabetes') !== false || strpos($riwayatPenyakit, 'jantung') !== false || strpos($riwayatPenyakit, 'hipertensi kronis') !== false) {
                $kategori = 'tinggi';
                $skor = rand(12, 18);
            } elseif (strpos($riwayatPenyakit, 'anemia') !== false || strpos($riwayatPenyakit, 'asma') !== false || strpos($riwayatPenyakit, 'thyroid') !== false || $usia < 20 || $usia > 35 || $rhesus === '-') {
                $kategori = 'sedang';
                $skor = rand(6, 11);
            } else {
                $kategori = 'rendah';
                $skor = rand(1, 5);
            }

            $tanggalPenilaian = now()->subDays(rand(1, 60))->format('Y-m-d');

            PenilaianRisiko::create([
                'ibu_id' => $ibu->id,
                'bidan_id' => $bidanAdmin->id,
                'kategori_risiko' => $kategori,
                'skor_risiko' => $skor,
                'faktor_risiko' => json_encode($riskData[array_search($kategori, array_column($riskData, 'kategori'))]['faktor']),
                'rekomendasi' => $this->getRekomendasi($kategori),
                'tanggal_penilaian' => $tanggalPenilaian,
            ]);

            if ($index % 3 === 0) {
                PenilaianRisiko::create([
                    'ibu_id' => $ibu->id,
                    'bidan_id' => $bidanAdmin->id,
                    'kategori_risiko' => $kategori,
                    'skor_risiko' => $skor - 1,
                    'faktor_risiko' => json_encode(['Pemantauan rutin']),
                    'rekomendasi' => 'Lanjutkan pemantauan rutin',
                    'tanggal_penilaian' => now()->subDays(rand(61, 90))->format('Y-m-d'),
                ]);
            }
        }
    }

    private function getRekomendasi($kategori)
    {
        $rekomendasis = [
            'rendah' => [
                'Edukasi nutrisi dan gaya hidup sehat',
                'Kontrol rutin sesuai jadwal ANC',
                'Konsumsi asam folat dan vitamin prenatal',
                'Istirahat yang cukup dan hindari stres',
            ],
            'sedang' => [
                'Kontrol lebih sering (2-4 minggu sekali)',
                'Pemeriksaan laboratorium rutin',
                'Konsultasi dengan dokter spesialis jika diperlukan',
                'Pantau tanda-tanda bahaya kehamilan',
            ],
            'tinggi' => [
                'Rujukan ke dokter spesialis Kandungan',
                'Pemantauan ketat oleh tim medis',
                'Manajemen penyakit penyerta yang ketat',
                'Persiapan kelahiran di fasilitas kesehatan lengkap',
            ],
        ];

        $list = $rekomendasis[$kategori] ?? $rekomendasis['rendah'];
        return implode(', ', $list);
    }
}
