<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\KategoriEdukasi;
use App\Models\KontenEdukasi;
use Illuminate\Support\Str; // Keep Str for slug generation
// No Faker needed for hardcoded data
// use Faker\Factory as Faker;

class KontenEdukasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // No Faker needed for hardcoded data
        // $faker = Faker::create('id_ID');

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
        $defaultBidanId = $bidanIds[array_rand($bidanIds)]; // Pick one bidan to assign most content to

        // Nutrisi Kehamilan
        if ($kategoris->has('nutrisi-kehamilan')) {
            $kategori = $kategoris['nutrisi-kehamilan'];
            $contentsToCreate[] = [
                'kategori_id' => $kategori->id,
                'judul' => 'Nutrisi Penting di Trimester Pertama Kehamilan',
                'konten' => 'Asupan gizi yang tepat sangat krusial di awal kehamilan. Fokus pada asam folat, zat besi, dan protein. Pastikan Anda mengonsumsi cukup sayuran hijau, buah-buahan, dan sumber protein tanpa lemak. Hindari makanan mentah dan batasi kafein.',
                'trimester' => '1', 'minggu_ke' => 8 // Example week
            ];
            $contentsToCreate[] = [
                'kategori_id' => $kategori->id,
                'judul' => 'Ide Camilan Sehat untuk Ibu Hamil',
                'konten' => 'Hindari camilan tinggi gula dan lemak. Pilih buah-buahan segar, yoghurt rendah lemak, kacang-kacangan, atau roti gandum sebagai alternatif sehat. Camilan sehat membantu menjaga energi dan memenuhi kebutuhan nutrisi tambahan.',
                'trimester' => 'semua', 'minggu_ke' => null
            ];
            $contentsToCreate[] = [
                'kategori_id' => $kategori->id,
                'judul' => 'Peran Penting Zat Besi Selama Kehamilan',
                'konten' => 'Zat besi membantu mencegah anemia pada ibu hamil dan mendukung pertumbuhan janin. Sumber zat besi meliputi daging merah, hati, bayam, dan sereal yang difortifikasi. Konsultasikan dengan bidan tentang suplemen zat besi jika diperlukan.',
                'trimester' => 'semua', 'minggu_ke' => null
            ];
        }

        // Tanda Bahaya
        if ($kategoris->has('tanda-bahaya')) {
            $kategori = $kategoris['tanda-bahaya'];
            $contentsToCreate[] = [
                'kategori_id' => $kategori->id,
                'judul' => 'Mengenali Tanda Bahaya Kehamilan Trimester Ketiga',
                'konten' => 'Waspada terhadap pendarahan dari vagina, sakit kepala hebat yang tak kunjung hilang, pandangan kabur, bengkak mendadak, atau gerakan janin berkurang. Ini adalah tanda-tanda yang memerlukan perhatian medis segera.',
                'trimester' => '3', 'minggu_ke' => 35
            ];
            $contentsToCreate[] = [
                'kategori_id' => $kategori->id,
                'judul' => 'Demam Tinggi Saat Hamil: Kapan Harus Khawatir?',
                'konten' => 'Demam bisa menjadi tanda infeksi. Jika suhu tubuh di atas 38 derajat Celcius, disertai menggigil, sakit kepala, atau ruam, segera cari pertolongan medis untuk diagnosis dan penanganan yang tepat.',
                'trimester' => 'semua', 'minggu_ke' => null
            ];
        }

        // Persiapan Menyusui
        if ($kategoris->has('persiapan-menyusui')) {
            $kategori = $kategoris['persiapan-menyusui'];
            $contentsToCreate[] = [
                'kategori_id' => $kategori->id,
                'judul' => 'Pentingnya ASI Eksklusif untuk Bayi',
                'konten' => 'ASI adalah makanan terbaik untuk bayi hingga usia 6 bulan, menyediakan semua nutrisi yang dibutuhkan. Manfaatnya meliputi peningkatan kekebalan tubuh bayi, bonding dengan ibu, dan perlindungan terhadap berbagai penyakit.',
                'trimester' => 'semua', 'minggu_ke' => null
            ];
            $contentsToCreate[] = [
                'kategori_id' => $kategori->id,
                'judul' => 'Teknik Menyusui yang Benar: Panduan Praktis',
                'konten' => 'Posisi dan pelekatan yang tepat adalah kunci keberhasilan menyusui tanpa rasa sakit dan memastikan bayi mendapatkan cukup ASI. Pelajari cara memegang bayi, pelekatan pada payudara, dan tanda-tanda bayi cukup ASI.',
                'trimester' => 'semua', 'minggu_ke' => null
            ];
        }
        
        // Persiapan Persalinan
        if ($kategoris->has('persiapan-persalinan')) {
            $kategori = $kategoris['persiapan-persalinan'];
            $contentsToCreate[] = [
                'kategori_id' => $kategori->id,
                'judul' => 'Tanda-tanda Persalinan Sudah Dekat',
                'konten' => 'Kenali kontraksi asli yang teratur dan semakin kuat, pecah ketuban, serta keluarnya lendir bercampur darah sebagai persiapan menuju persalinan. Segera hubungi bidan atau rumah sakit jika tanda-tanda ini muncul.',
                'trimester' => '3', 'minggu_ke' => 38
            ];
            $contentsToCreate[] = [
                'kategori_id' => $kategori->id,
                'judul' => 'Membuat Birth Plan: Apa Saja yang Perlu Disiapkan?',
                'konten' => 'Diskusikan preferensi persalinan Anda dengan bidan atau dokter, termasuk posisi melahirkan, pereda nyeri, dan kehadiran pendamping. Siapkan tas persalinan dari jauh hari.',
                'trimester' => '3', 'minggu_ke' => 32
            ];
        }

        // Tips Sehat Trimester 1, 2, 3
        $mingguKeTrimester = [1 => 10, 2 => 20, 3 => 30]; // Example fixed week for each trimester tip
        for ($t = 1; $t <= 3; $t++) {
            $slug = 'tips-sehat-t' . $t;
            if ($kategoris->has($slug)) {
                $kategori = $kategoris[$slug];
                $contentsToCreate[] = [
                    'kategori_id' => $kategori->id,
                    'judul' => 'Tips Menjaga Kesehatan di Trimester ' . $t . ' Kehamilan',
                    'konten' => "Fokus pada istirahat cukup, hindari stres, dan jaga asupan cairan. Konsultasi rutin sangat penting di trimester {$t} untuk memantau kesehatan ibu dan perkembangan janin.",
                    'trimester' => (string)$t, 'minggu_ke' => $mingguKeTrimester[$t]
                ];
            }
        }

        // Aktivitas Fisik
        if ($kategoris->has('aktivitas-fisik')) {
            $kategori = $kategoris['aktivitas-fisik'];
            $contentsToCreate[] = [
                'kategori_id' => $kategori->id,
                'judul' => 'Manfaat Olahraga Ringan Selama Kehamilan',
                'konten' => 'Jalan kaki, yoga, atau berenang dapat membantu menjaga kebugaran, mengurangi keluhan kehamilan seperti nyeri punggung, dan mempersiapkan tubuh untuk persalinan. Pastikan intensitasnya ringan hingga sedang.',
                'trimester' => 'semua', 'minggu_ke' => null
            ];
            $contentsToCreate[] = [
                'kategori_id' => $kategori->id,
                'judul' => 'Daftar Gerakan Yoga Aman untuk Ibu Hamil',
                'konten' => 'Beberapa pose yoga dirancang khusus untuk ibu hamil, membantu meningkatkan fleksibilitas dan kekuatan otot panggul. Lakukan di bawah pengawasan instruktur yoga prenatal bersertifikat.',
                'trimester' => 'semua', 'minggu_ke' => null
            ];
        }

        // Create the educational contents
        foreach ($contentsToCreate as $contentData) {
            $judul = $contentData['judul'];
            // Generate a unique slug based on title and a timestamp, not random number
            $slug = Str::slug($judul . '-' . now()->timestamp); 
            // Ensure bidan_id is set. If multiple bidan, can randomly assign.
            // For now, assign to the default bidan ID
            KontenEdukasi::create(array_merge($contentData, [
                'bidan_id' => $defaultBidanId,
                'slug' => $slug,
                'gambar' => 'https://picsum.photos/seed/' . Str::random(10) . '/640/480', // Use Lorem Picsum with random seed for variety
                'is_published' => true, // All hardcoded content is published
                'views' => rand(100, 5000), // Keep views somewhat random for variety
            ]));
        }
    }
}
