@props(['settings' => []])

<footer class="bg-blue-900 text-white/75 pt-16 pb-8 border-t border-blue-800">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-10 pb-12 border-b border-white/10">
            <div class="lg:col-span-2 space-y-4">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-white/10 flex items-center justify-center text-white text-lg border border-white/20">
                        <i class="fa-solid fa-landmark"></i>
                    </div>
                    <span class="font-display font-extrabold text-xl text-white">
                        {{ $settings['nama_kelurahan'] ?? 'Kelurahan Mangempang' }}
                    </span>
                </div>
                <p class="text-sm leading-relaxed max-w-sm text-white/70">
                    {{ $settings['nama_kelurahan'] ?? 'Kelurahan Mangempang' }}, {{ $settings['kecamatan'] ?? 'Kecamatan Barru' }}, {{ $settings['kabupaten'] ?? 'Kabupaten Barru' }} — melayani masyarakat dengan transparan, profesional, dan berorientasi pada kesejahteraan warga.
                </p>
                <div class="flex items-center gap-3 pt-2">
                    <a href="#" class="w-9 h-9 rounded-lg bg-white/10 hover:bg-blue-600 flex items-center justify-center text-white text-sm transition-all hover:-translate-y-1"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#" class="w-9 h-9 rounded-lg bg-white/10 hover:bg-blue-600 flex items-center justify-center text-white text-sm transition-all hover:-translate-y-1"><i class="fa-brands fa-instagram"></i></a>
                    <a href="#" class="w-9 h-9 rounded-lg bg-white/10 hover:bg-blue-600 flex items-center justify-center text-white text-sm transition-all hover:-translate-y-1"><i class="fa-brands fa-youtube"></i></a>
                    <a href="#" class="w-9 h-9 rounded-lg bg-white/10 hover:bg-blue-600 flex items-center justify-center text-white text-sm transition-all hover:-translate-y-1"><i class="fa-brands fa-whatsapp"></i></a>
                </div>
            </div>

            <div>
                <h4 class="font-display font-bold text-white text-sm mb-4 uppercase tracking-wider">Tautan Cepat</h4>
                <ul class="space-y-2.5 text-sm">
                    <li><a href="{{ route('home') }}#beranda" class="hover:text-white transition-colors">Beranda</a></li>
                    <li><a href="{{ route('home') }}#profil" class="hover:text-white transition-colors">Profil</a></li>
                    <li><a href="{{ route('home') }}#berita" class="hover:text-white transition-colors">Berita</a></li>
                    <li><a href="{{ route('home') }}#data" class="hover:text-white transition-colors">Data Kelurahan</a></li>
                </ul>
            </div>

            <div>
                <h4 class="font-display font-bold text-white text-sm mb-4 uppercase tracking-wider">Layanan Warga</h4>
                <ul class="space-y-2.5 text-sm">
                    <li><a href="{{ route('home') }}#kontak" class="hover:text-white transition-colors">Surat Menyurat</a></li>
                    <li><a href="{{ route('home') }}#kontak" class="hover:text-white transition-colors">Layanan KTP & KK</a></li>
                    <li><a href="{{ route('home') }}#kontak" class="hover:text-white transition-colors">Pengaduan Warga</a></li>
                    <li><a href="{{ route('home') }}#galeri" class="hover:text-white transition-colors">Galeri Kegiatan</a></li>
                </ul>
            </div>

            <div>
                <h4 class="font-display font-bold text-white text-sm mb-4 uppercase tracking-wider">Kontak Resmi</h4>
                <ul class="space-y-2.5 text-sm">
                    <li class="flex items-center gap-2"><i class="fa-solid fa-phone text-xs text-blue-400"></i> {{ $settings['telepon'] ?? '(0427) 21345' }}</li>
                    <li class="flex items-center gap-2"><i class="fa-solid fa-envelope text-xs text-blue-400"></i> {{ $settings['email'] ?? 'kelurahan.mangempang@barrukab.go.id' }}</li>
                    <li class="flex items-start gap-2"><i class="fa-solid fa-location-dot text-xs text-blue-400 mt-1"></i> {{ $settings['kecamatan'] ?? 'Kecamatan Barru' }}, {{ $settings['kabupaten'] ?? 'Kabupaten Barru' }}</li>
                </ul>
            </div>
        </div>

        <div class="flex flex-col sm:flex-row justify-between items-center gap-4 pt-6 text-xs text-white/60">
            <div>
                &copy; {{ date('Y') }} Pemerintah {{ $settings['nama_kelurahan'] ?? 'Kelurahan Mangempang' }}, {{ $settings['kabupaten'] ?? 'Kabupaten Barru' }}. Seluruh Hak Cipta Dilindungi.
            </div>
            <div>
                Sistem Informasi & Administrative Web Portal
            </div>
        </div>
    </div>
</footer>