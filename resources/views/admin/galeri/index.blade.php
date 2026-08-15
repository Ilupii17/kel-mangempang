<x-admin-layout headerTitle="Kelola Galeri Foto">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Form Tambah Galeri -->
        <div class="bg-white border border-gray-200 rounded-3xl p-6 shadow-xs h-fit">
            <h3 class="font-display font-bold text-lg text-gray-900 border-b pb-3 mb-5">Tambah Foto Galeri</h3>
            
            <form action="{{ route('admin.galeri.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf
                <div>
                    <label for="judul" class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Judul Foto / Kegiatan</label>
                    <input type="text" id="judul" name="judul" value="{{ old('judul') }}" required placeholder="Contoh: Musrenbang Kelurahan" class="w-full px-4 py-2.5 rounded-xl border border-gray-300 focus:outline-none focus:border-blue-600 text-sm">
                </div>

                <div>
                    <label for="kategori" class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Kategori</label>
                    <input type="text" id="kategori" name="kategori" value="{{ old('kategori', 'Kegiatan') }}" required placeholder="Contoh: Gotong Royong, Posyandu" class="w-full px-4 py-2.5 rounded-xl border border-gray-300 focus:outline-none focus:border-blue-600 text-sm">
                </div>

                <div>
                    <label for="gambar_file" class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Upload File Gambar</label>
                    <input type="file" id="gambar_file" name="gambar_file" accept="image/*" class="w-full text-xs text-gray-500 file:mr-3 file:py-2 file:px-3 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-blue-50 file:text-blue-700">
                </div>

                <div>
                    <label for="gambar_url" class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Atau Direct URL Gambar</label>
                    <input type="url" id="gambar_url" name="gambar_url" value="{{ old('gambar_url') }}" placeholder="https://images.unsplash.com/..." class="w-full px-4 py-2.5 rounded-xl border border-gray-300 focus:outline-none focus:border-blue-600 text-sm">
                </div>

                <div>
                    <label for="keterangan" class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Keterangan Singkat</label>
                    <textarea id="keterangan" name="keterangan" rows="2" placeholder="Penjelasan singkat foto..." class="w-full px-4 py-2.5 rounded-xl border border-gray-300 focus:outline-none focus:border-blue-600 text-sm resize-y">{{ old('keterangan') }}</textarea>
                </div>

                <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 rounded-xl shadow-sm text-sm transition-all flex items-center justify-center gap-2">
                    <i class="fa-solid fa-cloud-arrow-up"></i> Upload Foto
                </button>
            </form>
        </div>

        <!-- Grid Galeri -->
        <div class="lg:col-span-2 space-y-6">
            <div class="grid grid-cols-2 sm:grid-cols-3 gap-4">
                @forelse($galeris as $g)
                    <div class="bg-white border border-gray-200 rounded-2xl overflow-hidden shadow-xs relative group flex flex-col justify-between">
                        <div class="aspect-square overflow-hidden relative">
                            <img src="{{ $g->gambar }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" alt="{{ $g->judul }}">
                            <span class="absolute top-2 left-2 bg-black/60 backdrop-blur-md text-white text-[10px] font-bold px-2.5 py-0.5 rounded-full">
                                {{ $g->kategori }}
                            </span>
                        </div>
                        <div class="p-3 bg-white flex items-center justify-between gap-2 border-t border-gray-100">
                            <div class="font-bold text-xs text-gray-900 line-clamp-1" title="{{ $g->judul }}">
                                {{ $g->judul }}
                            </div>
                            <form action="{{ route('admin.galeri.destroy', ['galeri' => $g->id]) }}" method="POST" data-confirm="Hapus foto '{{ $g->judul }}' dari galeri? Tindakan ini tidak dapat dibatalkan.">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700 p-1 transition-colors" title="Hapus">
                                    <i class="fa-solid fa-trash-can text-xs"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                @empty
                    <div class="col-span-3 text-center text-gray-400 py-12 bg-white rounded-3xl border border-gray-200">
                        Belum ada galeri foto.
                    </div>
                @endforelse
            </div>

            <div>
                {{ $galeris->links() }}
            </div>
        </div>
    </div>
</x-admin-layout>
