<x-layouts.app title="Beranda | Kelurahan Mangempang">
    
    <!-- HERO SECTION -->
    <section class="relative overflow-hidden bg-hero-pattern pt-24 pb-32 text-white" id="beranda">
        <!-- Bentuk miring di bawah hero -->
        <div class="absolute bottom-0 left-0 right-0 h-32 bg-white clip-hero z-10"></div>
        
        <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 lg:grid-cols-2 gap-14 items-center relative z-20">
            <div class="reveal">
                <span class="inline-flex items-center gap-2 bg-white/10 border border-white/25 px-4 py-1.5 rounded-full text-sm font-semibold mb-6">
                    <i class="fa-solid fa-map-pin"></i> Kab. Barru
                </span>
                <h1 class="text-4xl lg:text-5xl font-display font-extrabold leading-tight mb-5">
                    Selamat Datang di <span class="text-accent">Kelurahan Mangempang</span>
                </h1>
                <p class="text-white/85 text-lg mb-8 max-w-lg">Melayani dengan sepenuh hati, membangun kelurahan yang maju, transparan, dan berdaya saing.</p>
                
                <div class="flex flex-wrap gap-4">
                    <a href="#profil" class="bg-white text-brand-700 shadow-float hover:-translate-y-1 hover:shadow-glow transition-all flex items-center gap-2 px-7 py-3.5 rounded-xl font-bold">
                        <i class="fa-solid fa-building-columns"></i> Lihat Profil
                    </a>
                </div>
            </div>
            
            <div class="reveal relative">
                <div class="aspect-square rounded-3xl overflow-hidden border-8 border-white/15 shadow-2xl relative z-10">
                    <img src="https://images.unsplash.com/photo-1590930419160-2f7c78bf1cb0?q=80&w=1000&auto=format&fit=crop" class="w-full h-full object-cover" alt="Suasana Kelurahan">
                </div>
                <!-- Floating Badge -->
                <div class="absolute -bottom-6 -left-6 bg-white text-gray-900 p-5 rounded-2xl shadow-glow flex items-center gap-3 z-30">
                    <i class="fa-solid fa-users text-brand-600 text-2xl"></i>
                    <div>
                        <div class="font-display font-extrabold text-xl">4.812</div>
                        <div class="text-xs text-gray-500">Jiwa Terlayani</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- STATISTIK SECTION (Contoh Integrasi Model nantinya) -->
    <section class="py-24" id="statistik">
        <div class="max-w-7xl mx-auto px-6">
            <span class="inline-flex items-center gap-2 text-xs font-bold tracking-widest uppercase text-brand-600 bg-brand-50 px-4 py-1.5 rounded-full border border-brand-100 reveal">Sekilas Data</span>
            <h2 class="text-3xl lg:text-4xl font-display font-bold text-gray-900 mt-4 mb-3 reveal">Statistik Kelurahan</h2>
            <p class="text-gray-500 max-w-2xl mb-12 reveal">Data ringkas kependudukan dan potensi ekonomi.</p>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                <!-- Nantinya angka ini bisa diambil dari $statistik->penduduk -->
                <div class="bg-white border border-gray-200 rounded-2xl p-8 shadow-soft hover:-translate-y-1.5 hover:shadow-float hover:border-brand-100 transition-all reveal">
                    <div class="w-12 h-12 rounded-xl bg-brand-50 text-brand-600 flex items-center justify-center text-xl mb-5">
                        <i class="fa-solid fa-people-group"></i>
                    </div>
                    <div class="font-display text-3xl font-extrabold text-gray-900">4.812</div>
                    <div class="text-gray-500 text-sm mt-1">Jumlah Penduduk</div>
                </div>
                <!-- Duplikasi div di atas untuk KK, Wilayah, UMKM seperti di HTML lamamu -->
            </div>
        </div>
    </section>

    <!-- PROFIL, BERITA, DATA, GALERI (Gunakan format class Tailwind yang sama dengan section Statistik di atas) -->

</x-layouts.app>