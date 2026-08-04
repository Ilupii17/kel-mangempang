@props([
    'dataPenduduk' => [],
    'dataPendidikan' => [],
    'dataPekerjaan' => [],
    'dataUmkm' => []
])

<section class="py-20 bg-gray-50 border-y border-gray-200/60" id="data">
    <div class="max-w-7xl mx-auto px-6">
        <span class="inline-flex items-center gap-2 text-xs font-bold tracking-widest uppercase text-blue-600 bg-blue-50 px-4 py-1.5 rounded-full border border-blue-100 reveal">
            Keterbukaan Informasi
        </span>
        <h2 class="text-3xl lg:text-4xl font-display font-bold text-gray-900 mt-4 mb-3 reveal">
            Data Kelurahan
        </h2>
        <p class="text-gray-500 max-w-2xl mb-10 text-base leading-relaxed reveal">
            Data kependudukan, pendidikan, pekerjaan, dan UMKM Kelurahan Mangempang.
        </p>

        <!-- Data Tabs Header -->
        <div class="flex items-center gap-3 mb-10 overflow-x-auto pb-2 scrollbar-none reveal" id="dataTabs">
            <button class="tab-btn px-6 py-2.5 rounded-full font-bold text-sm border transition-all duration-300 active-tab bg-blue-600 text-white border-blue-600 shadow-sm cursor-pointer" data-tab="penduduk">
                <i class="fa-solid fa-users mr-1.5"></i> Penduduk
            </button>
            <button class="tab-btn px-6 py-2.5 rounded-full font-bold text-sm border transition-all duration-300 bg-white text-gray-700 border-gray-300 hover:bg-gray-100 cursor-pointer" data-tab="pendidikan">
                <i class="fa-solid fa-graduation-cap mr-1.5"></i> Pendidikan
            </button>
            <button class="tab-btn px-6 py-2.5 rounded-full font-bold text-sm border transition-all duration-300 bg-white text-gray-700 border-gray-300 hover:bg-gray-100 cursor-pointer" data-tab="pekerjaan">
                <i class="fa-solid fa-briefcase mr-1.5"></i> Pekerjaan
            </button>
            <button class="tab-btn px-6 py-2.5 rounded-full font-bold text-sm border transition-all duration-300 bg-white text-gray-700 border-gray-300 hover:bg-gray-100 cursor-pointer" data-tab="umkm">
                <i class="fa-solid fa-store mr-1.5"></i> UMKM
            </button>
        </div>

        <!-- TAB PANELS -->

        <!-- 1. Penduduk Panel -->
        <div class="tab-panel active-panel reveal bg-white border border-gray-200 rounded-3xl p-8 shadow-soft" id="panel-penduduk">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 items-start">
                <div class="space-y-6">
                    <h3 class="font-display font-bold text-xl text-gray-900 border-b pb-3">Grafik Demografi</h3>
                    @foreach($dataPenduduk as $item)
                        <div>
                            <div class="flex justify-between text-sm font-semibold text-gray-700 mb-2">
                                <span>{{ $item->label }}</span>
                                <span class="text-blue-600 font-bold">{{ $item->nilai }}</span>
                            </div>
                            <div class="h-3 bg-gray-100 rounded-full overflow-hidden">
                                <div class="h-full bg-gradient-to-r from-blue-500 to-blue-700 rounded-full transition-all duration-1000 bar-fill" style="width: {{ $item->persentase }}%;"></div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div>
                    <h3 class="font-display font-bold text-xl text-gray-900 border-b pb-3 mb-4">Rincian Data</h3>
                    <div class="overflow-hidden rounded-2xl border border-gray-200">
                        <table class="w-full text-left text-sm">
                            <thead class="bg-blue-50 text-blue-700 font-display font-bold">
                                <tr>
                                    <th class="py-3.5 px-5">Kelompok</th>
                                    <th class="py-3.5 px-5">Jumlah</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 bg-white">
                                @foreach($dataPenduduk as $item)
                                    <tr class="hover:bg-gray-50 transition-colors">
                                        <td class="py-3.5 px-5 font-medium text-gray-800">{{ $item->label }}</td>
                                        <td class="py-3.5 px-5 text-gray-600 font-semibold">{{ $item->nilai }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- 2. Pendidikan Panel -->
        <div class="tab-panel hidden reveal bg-white border border-gray-200 rounded-3xl p-8 shadow-soft" id="panel-pendidikan">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 items-start">
                <div class="space-y-6">
                    <h3 class="font-display font-bold text-xl text-gray-900 border-b pb-3">Tingkat Pendidikan</h3>
                    @foreach($dataPendidikan as $item)
                        <div>
                            <div class="flex justify-between text-sm font-semibold text-gray-700 mb-2">
                                <span>{{ $item->label }}</span>
                                <span class="text-blue-600 font-bold">{{ $item->persentase }}% ({{ $item->nilai }})</span>
                            </div>
                            <div class="h-3 bg-gray-100 rounded-full overflow-hidden">
                                <div class="h-full bg-gradient-to-r from-blue-500 to-blue-700 rounded-full transition-all duration-1000 bar-fill" style="width: {{ $item->persentase }}%;"></div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div>
                    <h3 class="font-display font-bold text-xl text-gray-900 border-b pb-3 mb-4">Tabel Pendidikan</h3>
                    <div class="overflow-hidden rounded-2xl border border-gray-200">
                        <table class="w-full text-left text-sm">
                            <thead class="bg-blue-50 text-blue-700 font-display font-bold">
                                <tr>
                                    <th class="py-3.5 px-5">Jenjang</th>
                                    <th class="py-3.5 px-5">Jumlah Jiwa</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 bg-white">
                                @foreach($dataPendidikan as $item)
                                    <tr class="hover:bg-gray-50 transition-colors">
                                        <td class="py-3.5 px-5 font-medium text-gray-800">{{ $item->label }}</td>
                                        <td class="py-3.5 px-5 text-gray-600 font-semibold">{{ $item->nilai }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- 3. Pekerjaan Panel -->
        <div class="tab-panel hidden reveal bg-white border border-gray-200 rounded-3xl p-8 shadow-soft" id="panel-pekerjaan">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 items-start">
                <div class="space-y-6">
                    <h3 class="font-display font-bold text-xl text-gray-900 border-b pb-3">Mata Pencaharian</h3>
                    @foreach($dataPekerjaan as $item)
                        <div>
                            <div class="flex justify-between text-sm font-semibold text-gray-700 mb-2">
                                <span>{{ $item->label }}</span>
                                <span class="text-blue-600 font-bold">{{ $item->persentase }}% ({{ $item->nilai }})</span>
                            </div>
                            <div class="h-3 bg-gray-100 rounded-full overflow-hidden">
                                <div class="h-full bg-gradient-to-r from-blue-500 to-blue-700 rounded-full transition-all duration-1000 bar-fill" style="width: {{ $item->persentase }}%;"></div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div>
                    <h3 class="font-display font-bold text-xl text-gray-900 border-b pb-3 mb-4">Tabel Pekerjaan</h3>
                    <div class="overflow-hidden rounded-2xl border border-gray-200">
                        <table class="w-full text-left text-sm">
                            <thead class="bg-blue-50 text-blue-700 font-display font-bold">
                                <tr>
                                    <th class="py-3.5 px-5">Sektor Pekerjaan</th>
                                    <th class="py-3.5 px-5">Jumlah Jiwa</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 bg-white">
                                @foreach($dataPekerjaan as $item)
                                    <tr class="hover:bg-gray-50 transition-colors">
                                        <td class="py-3.5 px-5 font-medium text-gray-800">{{ $item->label }}</td>
                                        <td class="py-3.5 px-5 text-gray-600 font-semibold">{{ $item->nilai }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- 4. UMKM Panel -->
        <div class="tab-panel hidden reveal bg-white border border-gray-200 rounded-3xl p-8 shadow-soft" id="panel-umkm">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 items-start">
                <div class="space-y-6">
                    <h3 class="font-display font-bold text-xl text-gray-900 border-b pb-3">Kategori UMKM</h3>
                    @foreach($dataUmkm as $item)
                        <div>
                            <div class="flex justify-between text-sm font-semibold text-gray-700 mb-2">
                                <span>{{ $item->label }}</span>
                                <span class="text-blue-600 font-bold">{{ $item->nilai }} Usaha ({{ $item->persentase }}%)</span>
                            </div>
                            <div class="h-3 bg-gray-100 rounded-full overflow-hidden">
                                <div class="h-full bg-gradient-to-r from-blue-500 to-blue-700 rounded-full transition-all duration-1000 bar-fill" style="width: {{ $item->persentase }}%;"></div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div>
                    <h3 class="font-display font-bold text-xl text-gray-900 border-b pb-3 mb-4">Tabel Sektor Usaha</h3>
                    <div class="overflow-hidden rounded-2xl border border-gray-200">
                        <table class="w-full text-left text-sm">
                            <thead class="bg-blue-50 text-blue-700 font-display font-bold">
                                <tr>
                                    <th class="py-3.5 px-5">Jenis Usaha</th>
                                    <th class="py-3.5 px-5">Jumlah Usaha</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 bg-white">
                                @foreach($dataUmkm as $item)
                                    <tr class="hover:bg-gray-50 transition-colors">
                                        <td class="py-3.5 px-5 font-medium text-gray-800">{{ $item->label }}</td>
                                        <td class="py-3.5 px-5 text-gray-600 font-semibold">{{ $item->nilai }} Unit</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

<script>
    (function () {
        function initDataTabs() {
            const tabBtns = document.querySelectorAll('.tab-btn');
            const tabPanels = document.querySelectorAll('.tab-panel');

            if (!tabBtns.length) return;

            tabBtns.forEach(btn => {
                btn.addEventListener('click', function (e) {
                    e.preventDefault();
                    const target = this.getAttribute('data-tab');

                    // Update tab styles
                    tabBtns.forEach(b => {
                        b.classList.remove('bg-blue-600', 'text-white', 'border-blue-600', 'shadow-sm', 'active-tab');
                        b.classList.add('bg-white', 'text-gray-700', 'border-gray-300', 'hover:bg-gray-100');
                    });
                    this.classList.remove('bg-white', 'text-gray-700', 'border-gray-300', 'hover:bg-gray-100');
                    this.classList.add('bg-blue-600', 'text-white', 'border-blue-600', 'shadow-sm', 'active-tab');

                    // Switch panel visibility
                    tabPanels.forEach(panel => {
                        if (panel.id === 'panel-' + target) {
                            panel.classList.remove('hidden');
                            // Animate progress bars
                            panel.querySelectorAll('.bar-fill').forEach(bar => {
                                const w = bar.style.width;
                                bar.style.width = '0%';
                                setTimeout(() => { bar.style.width = w; }, 50);
                            });
                        } else {
                            panel.classList.add('hidden');
                        }
                    });
                });
            });
        }

        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', initDataTabs);
        } else {
            initDataTabs();
        }
    })();
</script>
