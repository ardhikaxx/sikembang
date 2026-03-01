<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\KategoriEdukasi;
use App\Models\KontenEdukasi;
use Faker\Factory as Faker;
use Illuminate\Support\Str;

class KontenEdukasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        // Get all Bidan users
        $bidanIds = User::where('role', 'bidan')->pluck('id')->toArray();

        // Get KategoriEdukasi by slug for easier referencing
        $kategoris = KategoriEdukasi::all()->keyBy('slug');

        // Ensure there are bidan and categories
        if (empty($bidanIds) || $kategoris->isEmpty()) {
            $this->command->info('No Bidan users or Edukasi categories found. Skipping KontenEdukasi seeding.');
            return;
        }

        $contentsToCreate = [];

        // Nutrisi Kehamilan
        if ($kategoris->has('nutrisi-kehamilan')) {
            $kategori = $kategoris['nutrisi-kehamilan'];
            $contentsToCreate[] = [
                'kategori_id' => $kategori->id,
                'judul' => 'Nutrisi Penting di Trimester Pertama Kehamilan',
                'konten' => 'Asupan gizi yang tepat sangat krusial di awal kehamilan. Fokus pada asam folat, zat besi, dan protein.',
                'trimester' => '1', 'minggu_ke' => $faker->numberBetween(1, 12)
            ];
            $contentsToCreate[] = [
                'kategori_id' => $kategori->id,
                'judul' => 'Ide Camilan Sehat untuk Ibu Hamil',
                'konten' => 'Hindari camilan tinggi gula dan lemak. Pilih buah-buahan, yoghurt, atau kacang-kacangan sebagai alternatif sehat.',
                'trimester' => 'semua', 'minggu_ke' => null
            ];
        }

        // Tanda Bahaya
        if ($kategoris->has('tanda-bahaya')) {
            $kategori = $kategoris['tanda-bahaya'];
            $contentsToCreate[] = [
                'kategori_id' => $kategori->id,
                'judul' => 'Mengenali Tanda Bahaya Kehamilan Trimester Ketiga',
                'konten' => 'Waspada terhadap pendarahan, sakit kepala hebat, atau gerakan janin berkurang. Segera konsultasi dengan bidan.',
                'trimester' => '3', 'minggu_ke' => $faker->numberBetween(28, 40)
            ];
            $contentsToCreate[] = [
                'kategori_id' => $kategori->id,
                'judul' => 'Demam Tinggi Saat Hamil: Kapan Harus Khawatir?',
                'konten' => 'Demam bisa menjadi tanda infeksi. Jika suhu tubuh di atas 38 derajat Celcius, segera cari pertolongan medis.',
                'trimester' => 'semua', 'minggu_ke' => null
            ];
        }

        // Persiapan Menyusui
        if ($kategoris->has('persiapan-menyusui')) {
            $kategori = $kategoris['persiapan-menyusui'];
            $contentsToCreate[] = [
                'kategori_id' => $kategori->id,
                'judul' => 'Pentingnya ASI Eksklusif untuk Bayi',
                'konten' => 'ASI adalah makanan terbaik untuk bayi hingga usia 6 bulan. Pelajari manfaat dan cara menyusui yang benar.',
                'trimester' => 'semua', 'minggu_ke' => null
            ];
            $contentsToCreate[] = [
                'kategori_id' => $kategori->id,
                'judul' => 'Teknik Menyusui yang Benar: Panduan Praktis',
                'konten' => 'Posisi dan pelekatan yang tepat adalah kunci keberhasilan menyusui. Hindari puting lecet.',
                'trimester' => 'semua', 'minggu_ke' => null
            ];
        }
        
        // Persiapan Persalinan
        if ($kategoris->has('persiapan-persalinan')) {
            $kategori = $kategoris['persiapan-persalinan'];
            $contentsToCreate[] = [
                'kategori_id' => $kategori->id,
                'judul' => 'Tanda-tanda Persalinan Sudah Dekat',
                'konten' => 'Kenali kontraksi asli, pecah ketuban, dan flek darah sebagai persiapan menuju persalinan.',
                'trimester' => '3', 'minggu_ke' => $faker->numberBetween(37, 40)
            ];
            $contentsToCreate[] = [
                'kategori_id' => $kategori->id,
                'judul' => 'Membuat Birth Plan: Apa Saja yang Perlu Disiapkan?',
                'konten' => 'Diskusikan preferensi persalinan Anda dengan bidan atau dokter. Siapkan tas persalinan dari jauh hari.',
                'trimester' => '3', 'minggu_ke' => $faker->numberBetween(30, 36)
            ];
        }

        // Tips Sehat Trimester 1, 2, 3
        for ($t = 1; $t <= 3; $t++) {
            $slug = 'tips-sehat-t' . $t;
            if ($kategoris->has($slug)) {
                $kategori = $kategoris[$slug];
                $contentsToCreate[] = [
                    'kategori_id' => $kategori->id,
                    'judul' => 'Tips Menjaga Kesehatan di Trimester ' . $t,
                    'konten' => "Fokus pada istirahat cukup, hindari stres, dan jaga asupan cairan. Konsultasi rutin sangat penting di trimester {$t}.",
                    'trimester' => (string)$t, 'minggu_ke' => $faker->numberBetween(($t-1)*13+1, $t*13)
                ];
            }
        }

        // Aktivitas Fisik
        if ($kategoris->has('aktivitas-fisik')) {
            $kategori = $kategoris['aktivitas-fisik'];
            $contentsToCreate[] = [
                'kategori_id' => $kategori->id,
                'judul' => 'Manfaat Olahraga Ringan Selama Kehamilan',
                'konten' => 'Jalan kaki, yoga, atau berenang dapat membantu menjaga kebugaran dan mengurangi keluhan kehamilan.',
                'trimester' => 'semua', 'minggu_ke' => null
            ];
            $contentsToCreate[] = [
                'kategori_id' => $kategori->id,
                'judul' => 'Daftar Gerakan Yoga Aman untuk Ibu Hamil',
                'konten' => 'Beberapa pose yoga dirancang khusus untuk ibu hamil. Lakukan di bawah pengawasan ahli.',
                'trimester' => 'semua', 'minggu_ke' => null
            ];
        }

        // Create the educational contents
        foreach ($contentsToCreate as $contentData) {
            $judul = $contentData['judul'];
            $slug = Str::slug($judul . '-' . $faker->unique()->randomNumber(5)); // Ensure unique slug
            
            KontenEdukasi::create(array_merge($contentData, [
                'bidan_id' => $faker->randomElement($bidanIds), // Assign random bidan
                'slug' => $slug,
                'gambar' => $faker->imageUrl(640, 480, 'health', true), // Placeholder image
                'is_published' => true, // All hardcoded content is published
                'views' => $faker->numberBetween(100, 5000),
            ]));
        }

        // Optionally, add a few more random ones if total is less than target (e.g., 30)
        $currentCount = count($contentsToCreate);
        if ($currentCount < 30) {
            for ($i = 0; $i < (30 - $currentCount); $i++) {
                $kategori = $faker->randomElement($kategoris->all()); // Pick a random existing category
                $judul = $faker->sentence(rand(5, 10));
                $slug = Str::slug($judul . '-' . $faker->unique()->randomNumber(5));
                $trimester = $faker->randomElement(['1', '2', '3', 'semua']);
                $minggu_ke = ($trimester === 'semua') ? null : $faker->numberBetween(1, 40);

                KontenEdukasi::create([
                    'kategori_id' => $kategori->id,
                    'bidan_id' => $faker->randomElement($bidanIds),
                    'judul' => $judul,
                    'slug' => $slug,
                    'konten' => $faker->paragraphs(rand(5, 10), true),
                    'gambar' => $faker->imageUrl(640, 480, 'health', true),
                    'trimester' => $trimester,
                    'minggu_ke' => $minggu_ke,
                    'is_published' => $faker->boolean(80),
                    'views' => $faker->numberBetween(0, 1000),
                ]);
            }
        }
    }
}
