@props(['galeris' => []])

<section class="py-20 bg-white" id="galeri">
    <div class="max-w-7xl mx-auto px-6">
        <span class="inline-flex items-center gap-2 text-xs font-bold tracking-widest uppercase text-blue-600 bg-blue-50 px-4 py-1.5 rounded-full border border-blue-100 reveal">
            Dokumentasi
        </span>
        <h2 class="text-3xl lg:text-4xl font-display font-bold text-gray-900 mt-4 mb-3 reveal">
            Galeri Kegiatan
        </h2>
        <p class="text-gray-500 max-w-2xl mb-12 text-base leading-relaxed reveal">
            Momen kegiatan dan pelayanan masyarakat di Kelurahan Mangempang.
        </p>

        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-5">
            @forelse($galeris as $g)
                <div class="group relative rounded-2xl overflow-hidden aspect-square shadow-soft hover:shadow-float transition-all duration-300 reveal cursor-pointer">
                    <img src="{{ $g->gambar }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" alt="{{ $g->judul }}">
                    
                    <div class="absolute inset-0 bg-gradient-to-t from-blue-900/90 via-blue-900/30 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 p-5 flex flex-col justify-end">
                        <span class="text-xs font-bold uppercase tracking-wider text-accent mb-1">{{ $g->kategori }}</span>
                        <h4 class="text-white font-display font-bold text-sm lg:text-base leading-snug line-clamp-2">{{ $g->judul }}</h4>
                    </div>
                </div>
            @empty
                <div class="col-span-4 text-center text-gray-400 py-8">Belum ada foto galeri.</div>
            @endforelse
        </div>
    </div>
</section>
