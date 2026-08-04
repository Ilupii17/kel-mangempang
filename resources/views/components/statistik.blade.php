@props(['ringkasanStats' => [], 'settings' => []])

<section class="py-20 bg-white" id="statistik">
    <div class="max-w-7xl mx-auto px-6">
        <span class="inline-flex items-center gap-2 text-xs font-bold tracking-widest uppercase text-blue-600 bg-blue-50 px-4 py-1.5 rounded-full border border-blue-100 reveal">
            Sekilas Data
        </span>
        <h2 class="text-3xl lg:text-4xl font-display font-bold text-gray-900 mt-4 mb-3 reveal">
            Statistik {{ $settings['nama_kelurahan'] ?? 'Kelurahan Mangempang' }}
        </h2>
        <p class="text-gray-500 max-w-2xl mb-12 text-base leading-relaxed reveal">
            Data ringkas kependudukan dan potensi ekonomi Kelurahan Mangempang, diperbarui berkala oleh petugas administrasi kelurahan.
        </p>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @forelse($ringkasanStats as $stat)
                <div class="bg-white border border-gray-200 rounded-2xl p-7 shadow-soft hover:-translate-y-1.5 hover:shadow-float hover:border-blue-200 transition-all duration-300 reveal group">
                    <div class="w-14 h-14 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center text-2xl mb-5 group-hover:scale-110 group-hover:bg-blue-600 group-hover:text-white transition-all duration-300">
                        <i class="fa-solid {{ $stat->icon ?? 'fa-chart-pie' }}"></i>
                    </div>
                    <div class="font-display text-3xl font-extrabold text-gray-900 tracking-tight">{{ $stat->nilai }}</div>
                    <div class="text-gray-500 text-sm mt-1 font-medium">{{ $stat->sub_label }}</div>
                </div>
            @empty
                <div class="col-span-4 text-center text-gray-400 py-6">Belum ada data statistik ringkasan.</div>
            @endforelse
        </div>
    </div>
</section>
