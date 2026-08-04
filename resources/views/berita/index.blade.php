<x-layouts.app :settings="$settings" title="Semua Berita & Informasi | Kelurahan Mangempang">
    <div class="bg-blue-900 py-16 text-white relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-6 relative z-10">
            <span class="text-xs font-bold uppercase tracking-widest text-accent bg-white/10 px-3 py-1 rounded-full border border-white/20">Arsip Informasi</span>
            <h1 class="text-3xl lg:text-4xl font-display font-extrabold mt-3">Berita & Kegiatan Kelurahan</h1>
            <p class="text-white/80 mt-2 max-w-xl text-sm lg:text-base">Informasi resmi, pengumuman, dan berita terbaru seputar {{ $settings['nama_kelurahan'] ?? 'Kelurahan Mangempang' }}.</p>
        </div>
    </div>

    <div class="py-16 bg-gray-50 min-h-[600px]">
        <div class="max-w-7xl mx-auto px-6">
            <!-- Search Bar -->
            <div class="bg-white border border-gray-200 rounded-2xl p-4 shadow-soft mb-10">
                <form action="{{ route('berita.index') }}" method="GET" class="flex flex-col sm:flex-row gap-3">
                    <div class="relative flex-1">
                        <i class="fa-solid fa-magnifying-glass absolute left-4 top-3.5 text-gray-400"></i>
                        <input type="text" name="q" value="{{ request('q') }}" placeholder="Cari berita atau kata kunci..." class="w-full pl-11 pr-4 py-3 rounded-xl border border-gray-300 focus:outline-none focus:border-blue-600 focus:ring-2 focus:ring-blue-100 text-sm">
                    </div>
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold px-6 py-3 rounded-xl text-sm transition-all shadow-sm flex items-center justify-center gap-2">
                        <i class="fa-solid fa-filter text-xs"></i> Cari Berita
                    </button>
                    @if(request('q'))
                        <a href="{{ route('berita.index') }}" class="bg-gray-100 hover:bg-gray-200 text-gray-700 font-bold px-5 py-3 rounded-xl text-sm transition-all flex items-center justify-center">
                            Reset
                        </a>
                    @endif
                </form>
            </div>

            <!-- News Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @forelse($beritas as $b)
                    <article class="bg-white border border-gray-200 rounded-2xl overflow-hidden shadow-soft hover:-translate-y-2 hover:shadow-float transition-all duration-300 flex flex-col group">
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
                    <div class="col-span-3 text-center py-16 bg-white rounded-2xl border border-gray-200 shadow-soft">
                        <i class="fa-regular fa-newspaper text-4xl text-gray-300 mb-3"></i>
                        <p class="text-gray-500 font-medium">Tidak ada berita yang ditemukan.</p>
                    </div>
                @endforelse
            </div>

            <!-- Pagination -->
            <div class="mt-12">
                {{ $beritas->links() }}
            </div>
        </div>
    </div>
</x-layouts.app>
