@props(['beritaTerbaru' => []])

<section class="py-20 bg-white" id="berita">
    <div class="max-w-7xl mx-auto px-6">
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 gap-4">
            <div>
                <span class="inline-flex items-center gap-2 text-xs font-bold tracking-widest uppercase text-blue-600 bg-blue-50 px-4 py-1.5 rounded-full border border-blue-100 reveal">
                    Informasi Terkini
                </span>
                <h2 class="text-3xl lg:text-4xl font-display font-bold text-gray-900 mt-4 reveal">
                    Berita Terbaru
                </h2>
                <p class="text-gray-500 max-w-xl mt-2 text-base reveal">
                    Kabar dan kegiatan terbaru seputar Kelurahan Mangempang.
                </p>
            </div>
            <div class="reveal">
                <a href="{{ route('berita.index') }}" class="inline-flex items-center gap-2 text-blue-600 hover:text-blue-800 font-bold text-sm bg-blue-50 hover:bg-blue-100 px-5 py-2.5 rounded-xl transition-all border border-blue-100 shadow-sm">
                    Lihat Semua Berita <i class="fa-solid fa-arrow-right text-xs"></i>
                </a>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @forelse($beritaTerbaru as $b)
                <article class="bg-white border border-gray-200 rounded-2xl overflow-hidden shadow-soft hover:-translate-y-2 hover:shadow-float transition-all duration-300 flex flex-col group reveal">
                    <div class="h-48 overflow-hidden relative">
                        <img src="{{ $b->gambar ?? 'https://images.unsplash.com/photo-1591189863430-ab87e120f312?q=80&w=800&auto=format&fit=crop' }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" alt="{{ $b->judul }}">
                        <span class="absolute top-3 left-3 bg-white/90 backdrop-blur-md text-blue-700 text-xs font-bold px-3 py-1 rounded-lg shadow-sm border border-white/50">
                            {{ $b->penulis }}
                        </span>
                    </div>
                    <div class="p-6 flex flex-col flex-1 justify-between">
                        <div>
                            <div class="flex items-center gap-2 text-xs font-semibold text-blue-600 mb-3">
                                <i class="fa-regular fa-calendar"></i>
                                <span>{{ \Carbon\Carbon::parse($b->tanggal)->isoFormat('D MMMM Y') }}</span>
                            </div>
                            <h3 class="font-display font-bold text-lg text-gray-900 group-hover:text-blue-600 transition-colors line-clamp-2 mb-3">
                                <a href="{{ route('berita.show', $b->slug) }}">{{ $b->judul }}</a>
                            </h3>
                            <p class="text-gray-500 text-sm line-clamp-3 leading-relaxed mb-4">
                                {{ $b->ringkasan }}
                            </p>
                        </div>
                        <a href="{{ route('berita.show', $b->slug) }}" class="inline-flex items-center gap-2 text-sm font-bold text-blue-600 group-hover:text-blue-800 transition-colors">
                            Baca selengkapnya <i class="fa-solid fa-arrow-right text-xs transform group-hover:translate-x-1 transition-transform"></i>
                        </a>
                    </div>
                </article>
            @empty
                <div class="col-span-3 text-center text-gray-400 py-8">Belum ada berita dipublikasikan.</div>
            @endforelse
        </div>
    </div>
</section>
