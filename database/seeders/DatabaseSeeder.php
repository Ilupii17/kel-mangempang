<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Berita;
use App\Models\Galeri;
use App\Models\Statistik;
use App\Models\Setting;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Admin User
        User::updateOrCreate(
            ['email' => 'admin@mangempang.go.id'],
            [
                'name' => 'Administrator Kelurahan',
                'password' => Hash::make('password'),
            ]
        );

        // 2. Settings
        $settings = [
            'nama_kelurahan' => 'Kelurahan Mangempang',
            'kecamatan' => 'Kecamatan Barru',
            'kabupaten' => 'Kabupaten Barru',
            'provinsi' => 'Sulawesi Selatan',
            'sejarah' => 'Kelurahan Mangempang merupakan salah satu kelurahan di Kecamatan Barru yang terbentuk seiring pemekaran wilayah administratif Kabupaten Barru. Berada di kawasan pesisir, wilayah ini sejak lama dikenal sebagai sentra nelayan dan pertanian lahan kering yang menopang perekonomian warga secara turun-temurun. Seiring waktu, Mangempang berkembang menjadi kelurahan yang lebih tertata dengan infrastruktur dan pelayanan publik yang terus ditingkatkan.',
            'visi' => 'Terwujudnya Kelurahan Mangempang yang mandiri, sejahtera, dan berbudaya melalui pelayanan publik yang transparan dan partisipatif.',
            'misi' => json_encode([
                'Meningkatkan kualitas pelayanan administrasi yang cepat, transparan, dan akuntabel.',
                'Mendorong pertumbuhan UMKM dan ekonomi kerakyatan berbasis potensi lokal.',
                'Memperkuat partisipasi masyarakat dalam pembangunan dan musyawarah kelurahan.',
                'Menjaga kebersihan, ketertiban, dan kelestarian lingkungan pesisir.',
            ]),
            'nama_lurah' => 'Andi Hasanuddin, S.STP',
            'sambutan_lurah' => 'Kami berkomitmen menghadirkan pelayanan yang semakin dekat, cepat, dan ramah bagi seluruh warga Mangempang. Website ini adalah salah satu wujud keterbukaan informasi yang terus kami dorong demi kelurahan yang lebih maju.',
            'alamat' => 'Jl. Poros Barru–Mangempang No. 12, Kelurahan Mangempang, Kecamatan Barru, Kabupaten Barru, Sulawesi Selatan 90711',
            'telepon' => '(0427) 21345',
            'email' => 'kelurahan.mangempang@barrukab.go.id',
            'jam_pelayanan' => 'Senin – Jumat, 08.00 – 16.00 WITA',
        ];

        foreach ($settings as $key => $val) {
            Setting::set($key, $val);
        }

        // 3. Ringkasan Statistik
        $ringkasan = [
            ['kategori' => 'ringkasan', 'label' => '4.812', 'sub_label' => 'Jumlah Penduduk', 'nilai' => '4.812', 'icon' => 'fa-people-group', 'urutan' => 1],
            ['kategori' => 'ringkasan', 'label' => '1.246', 'sub_label' => 'Kepala Keluarga', 'nilai' => '1.246', 'icon' => 'fa-house-chimney', 'urutan' => 2],
            ['kategori' => 'ringkasan', 'label' => '6 RW / 18 RT', 'sub_label' => 'Wilayah Administratif', 'nilai' => '6 RW / 18 RT', 'icon' => 'fa-map-location-dot', 'urutan' => 3],
            ['kategori' => 'ringkasan', 'label' => '187', 'sub_label' => 'Pelaku UMKM', 'nilai' => '187', 'icon' => 'fa-shop', 'urutan' => 4],
        ];
        foreach ($ringkasan as $s) {
            Statistik::updateOrCreate(['kategori' => $s['kategori'], 'sub_label' => $s['sub_label']], $s);
        }

        // 4. Data Penduduk, Pendidikan, Pekerjaan, UMKM
        $dataDetails = [
            // Penduduk
            ['kategori' => 'penduduk', 'label' => 'Laki-laki', 'nilai' => '2.401 jiwa', 'sub_label' => 'Jiwa', 'persentase' => 50, 'urutan' => 1],
            ['kategori' => 'penduduk', 'label' => 'Perempuan', 'nilai' => '2.411 jiwa', 'sub_label' => 'Jiwa', 'persentase' => 50, 'urutan' => 2],
            ['kategori' => 'penduduk', 'label' => 'Usia Produktif (15–64 th)', 'nilai' => '68%', 'sub_label' => 'Demografi', 'persentase' => 68, 'urutan' => 3],
            ['kategori' => 'penduduk', 'label' => 'Usia Anak & Lansia', 'nilai' => '32%', 'sub_label' => 'Demografi', 'persentase' => 32, 'urutan' => 4],

            // Pendidikan
            ['kategori' => 'pendidikan', 'label' => 'SD / Sederajat', 'nilai' => '1.347', 'sub_label' => 'Jiwa', 'persentase' => 28, 'urutan' => 1],
            ['kategori' => 'pendidikan', 'label' => 'SMP / Sederajat', 'nilai' => '1.155', 'sub_label' => 'Jiwa', 'persentase' => 24, 'urutan' => 2],
            ['kategori' => 'pendidikan', 'label' => 'SMA / Sederajat', 'nilai' => '1.636', 'sub_label' => 'Jiwa', 'persentase' => 34, 'urutan' => 3],
            ['kategori' => 'pendidikan', 'label' => 'Diploma / Sarjana', 'nilai' => '674', 'sub_label' => 'Jiwa', 'persentase' => 14, 'urutan' => 4],

            // Pekerjaan
            ['kategori' => 'pekerjaan', 'label' => 'Nelayan', 'nilai' => '1.108', 'sub_label' => 'Jiwa', 'persentase' => 31, 'urutan' => 1],
            ['kategori' => 'pekerjaan', 'label' => 'Petani / Buruh Tani', 'nilai' => '930', 'sub_label' => 'Jiwa', 'persentase' => 26, 'urutan' => 2],
            ['kategori' => 'pekerjaan', 'label' => 'Pedagang / UMKM', 'nilai' => '787', 'sub_label' => 'Jiwa', 'persentase' => 22, 'urutan' => 3],
            ['kategori' => 'pekerjaan', 'label' => 'PNS / Pegawai Swasta', 'nilai' => '465', 'sub_label' => 'Jiwa', 'persentase' => 13, 'urutan' => 4],
            ['kategori' => 'pekerjaan', 'label' => 'Lainnya', 'nilai' => '286', 'sub_label' => 'Jiwa', 'persentase' => 8, 'urutan' => 5],

            // UMKM
            ['kategori' => 'umkm', 'label' => 'Kuliner', 'nilai' => '79', 'sub_label' => 'Usaha', 'persentase' => 42, 'urutan' => 1],
            ['kategori' => 'umkm', 'label' => 'Kerajinan & Olahan Ikan', 'nilai' => '50', 'sub_label' => 'Usaha', 'persentase' => 27, 'urutan' => 2],
            ['kategori' => 'umkm', 'label' => 'Perdagangan Umum', 'nilai' => '39', 'sub_label' => 'Usaha', 'persentase' => 21, 'urutan' => 3],
            ['kategori' => 'umkm', 'label' => 'Jasa', 'nilai' => '19', 'sub_label' => 'Usaha', 'persentase' => 10, 'urutan' => 4],
        ];

        foreach ($dataDetails as $d) {
            Statistik::updateOrCreate(['kategori' => $d['kategori'], 'label' => $d['label']], $d);
        }

        // 5. Berita
        $beritaSample = [
            [
                'judul' => 'Gotong Royong Bersihkan Saluran Air Jelang Musim Hujan',
                'slug' => 'gotong-royong-bersihkan-saluran-air-jelang-musim-hujan',
                'ringkasan' => 'Warga bersama aparat kelurahan bergotong royong membersihkan saluran drainase di RW 03 untuk mencegah genangan.',
                'konten' => 'Warga Kelurahan Mangempang bersama perangkat kelurahan dan unsur pemuda menggelar kegiatan gotong royong massal pada Minggu pagi. Fokus utama aksi ini adalah membersihkan saluran air dan drainase utama sepanjang lingkungan RW 03 yang sempat tersumbat oleh sampah organik dan endapan lumpur.<br><br>Lurah Mangempang menyampaikan apresiasi setinggi-tingginya atas antusiasme warga. "Kegiatan gotong royong ini tidak hanya menjaga kebersihan lingkungan dari risiko genangan air, namun juga mempererat tali silaturahmi antarwarga," ujarnya.',
                'gambar' => 'https://images.unsplash.com/photo-1591189863430-ab87e120f312?q=80&w=800&auto=format&fit=crop',
                'penulis' => 'Admin Kelurahan',
                'tanggal' => '2026-07-28',
                'is_published' => true,
            ],
            [
                'judul' => 'Pelatihan Digital Marketing untuk Pelaku UMKM Mangempang',
                'slug' => 'pelatihan-digital-marketing-untuk-pelaku-umkm-mangempang',
                'ringkasan' => 'Sebanyak 40 pelaku UMKM mengikuti pelatihan pemasaran digital yang diselenggarakan bekerja sama dengan Dinas Koperasi.',
                'konten' => 'Dalam upaya meningkatkan daya saing usaha mikro, kecil, dan menengah, Kelurahan Mangempang berkolaborasi dengan Dinas Koperasi dan UMKM menyelenggarakan workshop pemasaran digital. Pelatihan ini diikuti oleh 40 pelaku usaha lokal mulai dari pengusaha olahan hasil laut hingga kerajinan tangan.<br><br>Materi yang disampaikan meliputi pembuatan foto produk menarik menggunakan ponsel pintar, pengelolaan toko online di marketplace, serta pemanfaatan media sosial untuk memperluas jangkauan pasar hingga ke luar daerah.',
                'gambar' => 'https://images.unsplash.com/photo-1607346256330-dee7af15f7c5?q=80&w=800&auto=format&fit=crop',
                'penulis' => 'Admin Kelurahan',
                'tanggal' => '2026-07-22',
                'is_published' => true,
            ],
            [
                'judul' => 'Posyandu Rutin: Pemantauan Tumbuh Kembang Balita',
                'slug' => 'posyandu-rutin-pemantauan-tumbuh-kembang-balita',
                'ringkasan' => 'Kegiatan posyandu bulanan berlangsung lancar dengan partisipasi aktif kader kesehatan dan orang tua balita.',
                'konten' => 'Pelayanan kesehatan balita dan ibu hamil melalui Posyandu Rutin kembali digelar di aula Kelurahan Mangempang. Kegiatan meliputi penimbangan berat badan, pengukuran tinggi badan, pemberian imunisasi dasar, serta penyuluhan gizi seimbang untuk mencegah stunting.<br><br>Ketua Kader Kesehatan mengungkapkan gembira atas meningkatnya kesadaran ibu-ibu di Kelurahan Mangempang untuk rutin memeriksakan kesehatan tumbuh kembang anak secara berkala.',
                'gambar' => 'https://images.unsplash.com/photo-1615461066841-6116e61058f4?q=80&w=800&auto=format&fit=crop',
                'penulis' => 'Admin Kelurahan',
                'tanggal' => '2026-07-15',
                'is_published' => true,
            ],
        ];

        foreach ($beritaSample as $b) {
            Berita::updateOrCreate(['slug' => $b['slug']], $b);
        }

        // 6. Galeri
        $galeriSample = [
            ['judul' => 'Musyawarah Rencana Pembangunan', 'gambar' => 'https://images.unsplash.com/photo-1541971297127-46a5c414f224?q=80&w=600&auto=format&fit=crop', 'kategori' => 'Musrenbang', 'keterangan' => 'Kegiatan Musrenbang Kelurahan Mangempang'],
            ['judul' => 'Peringatan HUT Kemerdekaan RI', 'gambar' => 'https://images.unsplash.com/photo-1509099836639-18ba1795216d?q=80&w=600&auto=format&fit=crop', 'kategori' => 'Kemerdekaan', 'keterangan' => 'Upacara bendera HUT RI'],
            ['judul' => 'Kegiatan Posyandu Balita', 'gambar' => 'https://images.unsplash.com/photo-1524069290683-0457abfe42c3?q=80&w=600&auto=format&fit=crop', 'kategori' => 'Kesehatan', 'keterangan' => 'Pelayanan kesehatan di Posyandu'],
            ['judul' => 'Gotong Royong Lingkungan', 'gambar' => 'https://images.unsplash.com/photo-1591189863430-ab87e120f312?q=80&w=600&auto=format&fit=crop', 'kategori' => 'Gotong Royong', 'keterangan' => 'Pembersihan saluran air dan lingkungan'],
            ['judul' => 'Bazar Produk UMKM', 'gambar' => 'https://images.unsplash.com/photo-1573164713988-8665fc963095?q=80&w=600&auto=format&fit=crop', 'kategori' => 'UMKM', 'keterangan' => 'Pameran produk unggulan warga'],
            ['judul' => 'Kawasan Pesisir Mangempang', 'gambar' => 'https://images.unsplash.com/photo-1524492412937-b28074a5d7da?q=80&w=600&auto=format&fit=crop', 'kategori' => 'Potensi Wilayah', 'keterangan' => 'Pemandangan pesisir pantai kelurahan'],
            ['judul' => 'Pelatihan Keterampilan Warga', 'gambar' => 'https://images.unsplash.com/photo-1509062522246-3755977927d7?q=80&w=600&auto=format&fit=crop', 'kategori' => 'Pelatihan', 'keterangan' => 'Workshop peningkatan SDM warga'],
            ['judul' => 'Pelayanan Administrasi Warga', 'gambar' => 'https://images.unsplash.com/photo-1591017403360-1091a5cd5220?q=80&w=600&auto=format&fit=crop', 'kategori' => 'Pelayanan', 'keterangan' => 'Aktivitas pelayanan di kantor kelurahan'],
        ];

        foreach ($galeriSample as $g) {
            Galeri::updateOrCreate(['judul' => $g['judul']], $g);
        }
    }
}
