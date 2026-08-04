<x-admin-layout headerTitle="Kelola Data & Statistik">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Form Tambah Statistik -->
        <div class="bg-white border border-gray-200 rounded-3xl p-6 shadow-xs h-fit">
            <h3 class="font-display font-bold text-lg text-gray-900 border-b pb-3 mb-5">Tambah Point Data</h3>
            
            <form action="{{ route('admin.statistik.store') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label for="kategori" class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Kategori Data</label>
                    <select id="kategori" name="kategori" required class="w-full px-4 py-2.5 rounded-xl border border-gray-300 focus:outline-none focus:border-blue-600 text-sm bg-white">
                        <option value="ringkasan">Ringkasan Hero / Stat Card</option>
                        <option value="penduduk">Data Demografi Penduduk</option>
                        <option value="pendidikan">Data Pendidikan Warga</option>
                        <option value="pekerjaan">Data Pekerjaan & Profesi</option>
                        <option value="umkm">Data Sektor UMKM</option>
                    </select>
                </div>

                <div>
                    <label for="label" class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Nama Data / Label</label>
                    <input type="text" id="label" name="label" required placeholder="Contoh: SD / Sederajat atau Laki-laki" class="w-full px-4 py-2.5 rounded-xl border border-gray-300 focus:outline-none focus:border-blue-600 text-sm">
                </div>

                <div>
                    <label for="nilai" class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Nilai Teks</label>
                    <input type="text" id="nilai" name="nilai" required placeholder="Contoh: 1.347 jiwa atau 42%" class="w-full px-4 py-2.5 rounded-xl border border-gray-300 focus:outline-none focus:border-blue-600 text-sm">
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label for="persentase" class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Persentase (0-100)</label>
                        <input type="number" id="persentase" name="persentase" min="0" max="100" value="50" class="w-full px-4 py-2.5 rounded-xl border border-gray-300 focus:outline-none focus:border-blue-600 text-sm">
                    </div>
                    <div>
                        <label for="urutan" class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Urutan Tampil</label>
                        <input type="number" id="urutan" name="urutan" value="1" class="w-full px-4 py-2.5 rounded-xl border border-gray-300 focus:outline-none focus:border-blue-600 text-sm">
                    </div>
                </div>

                <div>
                    <label for="sub_label" class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Sub Label (Opsional)</label>
                    <input type="text" id="sub_label" name="sub_label" placeholder="Contoh: Jumlah Penduduk" class="w-full px-4 py-2.5 rounded-xl border border-gray-300 focus:outline-none focus:border-blue-600 text-sm">
                </div>

                <div>
                    <label for="icon" class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Icon FontAwesome (Opsional)</label>
                    <input type="text" id="icon" name="icon" placeholder="fa-people-group" class="w-full px-4 py-2.5 rounded-xl border border-gray-300 focus:outline-none focus:border-blue-600 text-sm">
                </div>

                <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 rounded-xl shadow-sm text-sm transition-all flex items-center justify-center gap-2">
                    <i class="fa-solid fa-floppy-disk"></i> Simpan Data Statistik
                </button>
            </form>
        </div>

        <!-- Lists of Statistics per Category -->
        <div class="lg:col-span-2 space-y-6">
            @php
                $sections = [
                    'Ringkasan Stats (Top Cards)' => $ringkasan,
                    'Penduduk' => $penduduk,
                    'Pendidikan' => $pendidikan,
                    'Pekerjaan' => $pekerjaan,
                    'UMKM' => $umkm,
                ];
            @endphp

            @foreach($sections as $title => $items)
                <div class="bg-white border border-gray-200 rounded-3xl p-6 shadow-xs">
                    <h4 class="font-display font-bold text-base text-gray-900 border-b pb-3 mb-4 flex items-center justify-between">
                        <span>{{ $title }}</span>
                        <span class="text-xs font-semibold text-blue-600 bg-blue-50 px-2.5 py-1 rounded-full border border-blue-100">{{ $items->count() }} item</span>
                    </h4>

                    <div class="divide-y divide-gray-100">
                        @forelse($items as $stat)
                            <div class="py-3 flex items-center justify-between gap-4">
                                <div class="flex items-center gap-3">
                                    @if($stat->icon)
                                        <div class="w-8 h-8 rounded-lg bg-blue-50 text-blue-600 flex items-center justify-center text-sm flex-shrink-0">
                                            <i class="fa-solid {{ $stat->icon }}"></i>
                                        </div>
                                    @endif
                                    <div>
                                        <div class="font-bold text-sm text-gray-900">{{ $stat->label }}</div>
                                        <div class="text-xs text-gray-500 font-medium">{{ $stat->sub_label ?? '-' }}</div>
                                    </div>
                                </div>

                                <div class="flex items-center gap-4">
                                    <div class="text-right">
                                        <div class="font-bold text-sm text-blue-700">{{ $stat->nilai }}</div>
                                        <div class="text-[11px] text-gray-400 font-medium">Bar: {{ $stat->persentase }}%</div>
                                    </div>

                                    <form action="{{ route('admin.statistik.destroy', ['statistik' => $stat->id]) }}" method="POST" onsubmit="return confirm('Hapus item data statistik ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="w-8 h-8 rounded-lg bg-red-50 text-red-600 hover:bg-red-600 hover:text-white flex items-center justify-center transition-all" title="Hapus">
                                            <i class="fa-solid fa-trash-can text-xs"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @empty
                            <div class="text-center text-gray-400 py-3 text-xs">Tidak ada data untuk kategori ini.</div>
                        @endforelse
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-admin-layout>
