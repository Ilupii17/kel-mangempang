<x-admin-layout headerTitle="Dashboard Ringkasan">
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <!-- Card 1: Total Berita -->
        <div class="bg-white border border-gray-200 rounded-2xl p-6 shadow-xs flex items-center gap-4">
            <div class="w-14 h-14 rounded-2xl bg-blue-50 text-blue-600 flex items-center justify-center text-2xl flex-shrink-0">
                <i class="fa-solid fa-newspaper"></i>
            </div>
            <div>
                <div class="text-xs font-bold text-gray-500 uppercase tracking-wider">Total Berita</div>
                <div class="font-display font-extrabold text-3xl text-gray-900 mt-1">{{ $totalBerita }}</div>
            </div>
        </div>

        <!-- Card 2: Total Galeri -->
        <div class="bg-white border border-gray-200 rounded-2xl p-6 shadow-xs flex items-center gap-4">
            <div class="w-14 h-14 rounded-2xl bg-indigo-50 text-indigo-600 flex items-center justify-center text-2xl flex-shrink-0">
                <i class="fa-solid fa-images"></i>
            </div>
            <div>
                <div class="text-xs font-bold text-gray-500 uppercase tracking-wider">Total Galeri</div>
                <div class="font-display font-extrabold text-3xl text-gray-900 mt-1">{{ $totalGaleri }}</div>
            </div>
        </div>

        <!-- Card 3: Total Pesan -->
        <div class="bg-white border border-gray-200 rounded-2xl p-6 shadow-xs flex items-center gap-4">
            <div class="w-14 h-14 rounded-2xl bg-emerald-50 text-emerald-600 flex items-center justify-center text-2xl flex-shrink-0">
                <i class="fa-solid fa-envelope-open-text"></i>
            </div>
            <div>
                <div class="text-xs font-bold text-gray-500 uppercase tracking-wider">Total Pesan</div>
                <div class="font-display font-extrabold text-3xl text-gray-900 mt-1">{{ $totalPesan }}</div>
            </div>
        </div>

        <!-- Card 4: Belum Dibaca -->
        <div class="bg-white border border-gray-200 rounded-2xl p-6 shadow-xs flex items-center gap-4">
            <div class="w-14 h-14 rounded-2xl bg-amber-50 text-amber-600 flex items-center justify-center text-2xl flex-shrink-0">
                <i class="fa-solid fa-bell"></i>
            </div>
            <div>
                <div class="text-xs font-bold text-gray-500 uppercase tracking-wider">Pesan Baru</div>
                <div class="font-display font-extrabold text-3xl text-gray-900 mt-1">{{ $pesanBelumDibaca }}</div>
            </div>
        </div>
    </div>

    <!-- Overview Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <!-- Recent Messages -->
        <div class="bg-white border border-gray-200 rounded-3xl p-6 shadow-xs">
            <div class="flex items-center justify-between border-b pb-4 mb-4">
                <h3 class="font-display font-bold text-lg text-gray-900 flex items-center gap-2">
                    <i class="fa-solid fa-envelope text-blue-600"></i> Pesan Masuk Terbaru
                </h3>
                <a href="{{ route('admin.kontak.index') }}" class="text-xs font-bold text-blue-600 hover:text-blue-800">
                    Lihat Semua <i class="fa-solid fa-arrow-right text-[10px]"></i>
                </a>
            </div>

            <div class="divide-y divide-gray-100">
                @forelse($recentPesan as $p)
                    <div class="py-3 flex items-start justify-between gap-3">
                        <div>
                            <div class="font-bold text-sm text-gray-900 flex items-center gap-2">
                                {{ $p->nama }}
                                @if(!$p->is_read)
                                    <span class="w-2 h-2 rounded-full bg-blue-600 inline-block" title="Belum dibaca"></span>
                                @endif
                            </div>
                            <div class="text-xs font-medium text-gray-600 mt-0.5">{{ $p->subjek }}</div>
                            <div class="text-xs text-gray-400 mt-1 line-clamp-1">{{ $p->pesan }}</div>
                        </div>
                        <div class="text-[11px] text-gray-400 flex-shrink-0">
                            {{ $p->created_at->diffForHumans() }}
                        </div>
                    </div>
                @empty
                    <div class="text-center text-gray-400 py-6 text-sm">Belum ada pesan masuk.</div>
                @endforelse
            </div>
        </div>

        <!-- Recent News -->
        <div class="bg-white border border-gray-200 rounded-3xl p-6 shadow-xs">
            <div class="flex items-center justify-between border-b pb-4 mb-4">
                <h3 class="font-display font-bold text-lg text-gray-900 flex items-center gap-2">
                    <i class="fa-solid fa-newspaper text-blue-600"></i> Berita Terakhir
                </h3>
                <a href="{{ route('admin.berita.index') }}" class="text-xs font-bold text-blue-600 hover:text-blue-800">
                    Kelola Berita <i class="fa-solid fa-arrow-right text-[10px]"></i>
                </a>
            </div>

            <div class="divide-y divide-gray-100">
                @forelse($recentBerita as $b)
                    <div class="py-3 flex items-center justify-between gap-3">
                        <div class="flex items-center gap-3">
                            <img src="{{ $b->gambar }}" class="w-12 h-12 rounded-xl object-cover border border-gray-200 flex-shrink-0" alt="{{ $b->judul }}">
                            <div>
                                <div class="font-bold text-sm text-gray-900 line-clamp-1">{{ $b->judul }}</div>
                                <div class="text-xs text-gray-400 mt-0.5">{{ \Carbon\Carbon::parse($b->tanggal)->isoFormat('D MMM Y') }} • {{ $b->penulis }}</div>
                            </div>
                        </div>
                        <div>
                            @if($b->is_published)
                                <span class="bg-emerald-50 text-emerald-700 border border-emerald-200 text-[10px] font-bold px-2.5 py-1 rounded-full">Tayang</span>
                            @else
                                <span class="bg-gray-100 text-gray-600 text-[10px] font-bold px-2.5 py-1 rounded-full">Draft</span>
                            @endif
                        </div>
                    </div>
                @empty
                    <div class="text-center text-gray-400 py-6 text-sm">Belum ada berita.</div>
                @endforelse
            </div>
        </div>
    </div>
</x-admin-layout>
