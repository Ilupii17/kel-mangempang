<x-layouts.app :settings="$settings" :title="$berita->judul . ' — Kelurahan Mangempang'">
    <div class="bg-gray-50 border-b border-gray-200 py-8">
        <div class="max-w-4xl mx-auto px-6">
            <a href="{{ route('berita.index') }}" class="inline-flex items-center gap-2 text-xs font-bold text-blue-600 hover:text-blue-800 bg-blue-50 px-3.5 py-1.5 rounded-lg border border-blue-100 mb-4 transition-colors">
                <i class="fa-solid fa-arrow-left"></i> Kembali ke Berita
            </a>
            <h1 class="text-3xl lg:text-4xl font-display font-extrabold text-gray-900 leading-tight">
                {{ $berita->judul }}
            </h1>
            <div class="flex flex-wrap items-center gap-4 text-xs font-medium text-gray-500 mt-4 border-t border-gray-200 pt-4">
                <span class="flex items-center gap-1.5 text-blue-600 font-semibold"><i class="fa-solid fa-user-pen"></i> {{ $berita->penulis }}</span>
                <span>•</span>
                <span class="flex items-center gap-1.5"><i class="fa-regular fa-calendar"></i> {{ \Carbon\Carbon::parse($berita->tanggal)->isoFormat('D MMMM Y') }}</span>
            </div>
        </div>
    </div>

    <div class="py-12 bg-white min-h-[600px]">
        <div class="max-w-4xl mx-auto px-6">
            @if($berita->gambar)
                <div class="rounded-3xl overflow-hidden shadow-lg border border-gray-200 mb-10 max-h-[480px]">
                    <img src="{{ $berita->gambar }}" alt="{{ $berita->judul }}" class="w-full h-full object-cover">
                </div>
            @endif

            <div class="prose prose-lg max-w-none text-gray-700 leading-relaxed space-y-6">
                {!! $berita->konten !!}
            </div>

            <!-- Related News Section -->
            @if($beritaTerkait->count() > 0)
                <div class="mt-16 pt-10 border-t border-gray-200">
                    <h3 class="font-display font-bold text-2xl text-gray-900 mb-6">Berita Lainnya</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                        @foreach($beritaTerkait as $bt)
                            <a href="{{ route('berita.show', $bt->slug) }}" class="bg-gray-50 border border-gray-200 rounded-2xl p-4 shadow-soft hover:shadow-float hover:-translate-y-1 transition-all">
                                <div class="h-32 rounded-xl overflow-hidden mb-3">
                                    <img src="{{ $bt->gambar }}" class="w-full h-full object-cover" alt="{{ $bt->judul }}">
                                </div>
                                <div class="text-xs text-blue-600 font-semibold mb-1">{{ \Carbon\Carbon::parse($bt->tanggal)->isoFormat('D MMM Y') }}</div>
                                <h4 class="font-display font-bold text-sm text-gray-900 line-clamp-2">{{ $bt->judul }}</h4>
                            </a>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-layouts.app>
