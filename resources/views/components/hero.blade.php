@props(['settings' => [], 'ringkasanStats' => []])

@php
    $pendudukStat = $ringkasanStats->firstWhere('sub_label', 'Jumlah Penduduk');
    $jumlahPenduduk = $pendudukStat ? $pendudukStat->nilai : '4.812';
@endphp

<section class="relative overflow-hidden bg-hero-pattern pt-24 pb-32 text-white" id="beranda">
    <div class="absolute bottom-0 left-0 right-0 h-28 bg-white clip-hero z-10"></div>
    
    <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 lg:grid-cols-2 gap-14 items-center relative z-20">
        <div class="reveal">
            <span class="inline-flex items-center gap-2 bg-white/10 border border-white/25 px-4 py-1.5 rounded-full text-xs font-semibold mb-6">
                <i class="fa-solid fa-map-pin text-accent"></i> {{ $settings['kecamatan'] ?? 'Kecamatan Barru' }}, {{ $settings['kabupaten'] ?? 'Kabupaten Barru' }}
            </span>
            <h1 class="text-4xl lg:text-5xl font-display font-extrabold leading-tight mb-5">
                Selamat Datang di <span class="text-accent">{{ $settings['nama_kelurahan'] ?? 'Kelurahan Mangempang' }}</span>
            </h1>
            <p class="text-white/85 text-base lg:text-lg mb-8 max-w-xl leading-relaxed">
                Melayani dengan sepenuh hati, membangun kelurahan yang maju, transparan, dan berdaya saing untuk kesejahteraan seluruh warga Mangempang.
            </p>
            
            <div class="flex flex-wrap gap-4">
                <a href="#profil" class="bg-white text-blue-700 shadow-float hover:-translate-y-1 hover:shadow-glow transition-all duration-300 flex items-center gap-2 px-7 py-3.5 rounded-xl font-bold text-sm">
                    <i class="fa-solid fa-building-columns"></i> Lihat Profil
                </a>
                <a href="#berita" class="border-2 border-white/50 text-white hover:bg-white/15 hover:-translate-y-1 transition-all duration-300 flex items-center gap-2 px-7 py-3.5 rounded-xl font-bold text-sm">
                    <i class="fa-solid fa-newspaper"></i> Berita Terbaru
                </a>
            </div>
        </div>
        
        <div class="reveal relative">
            <div class="aspect-square rounded-3xl overflow-hidden border-8 border-white/15 shadow-2xl relative z-10">
                <img src="https://images.unsplash.com/photo-1590930419160-2f7c78bf1cb0?q=80&w=1000&auto=format&fit=crop" class="w-full h-full object-cover transform hover:scale-105 transition-transform duration-700" alt="Suasana Kelurahan Mangempang">
            </div>
            
            <!-- Floating Badge -->
            <div class="absolute -bottom-6 -left-6 bg-white text-gray-900 p-5 rounded-2xl shadow-glow flex items-center gap-4 z-30 border border-gray-100">
                <div class="w-12 h-12 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center text-2xl">
                    <i class="fa-solid fa-users"></i>
                </div>
                <div>
                    <div class="font-display font-extrabold text-2xl text-gray-900 leading-tight">{{ $jumlahPenduduk }}</div>
                    <div class="text-xs text-gray-500 font-medium">Jiwa Terlayani</div>
                </div>
            </div>
        </div>
    </div>
</section>
