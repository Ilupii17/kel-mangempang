<x-admin-layout headerTitle="Tambah Berita Baru">
    <div class="max-w-4xl mx-auto bg-white border border-gray-200 rounded-3xl p-8 shadow-xs">
        <div class="flex items-center justify-between border-b pb-4 mb-6">
            <h2 class="text-lg font-bold text-gray-900">Form Tambah Berita</h2>
            <a href="{{ route('admin.berita.index') }}" class="text-xs font-bold text-gray-500 hover:text-gray-800">
                <i class="fa-solid fa-arrow-left"></i> Kembali
            </a>
        </div>

        <form action="{{ route('admin.berita.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            <div>
                <label for="judul" class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Judul Berita</label>
                <input type="text" id="judul" name="judul" value="{{ old('judul') }}" required placeholder="Masukkan judul berita..." class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:outline-none focus:border-blue-600 focus:ring-2 focus:ring-blue-100 text-sm">
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="penulis" class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Penulis / Sumber</label>
                    <input type="text" id="penulis" name="penulis" value="{{ old('penulis', 'Admin Kelurahan') }}" required class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:outline-none focus:border-blue-600 focus:ring-2 focus:ring-blue-100 text-sm">
                </div>
                <div>
                    <label for="tanggal" class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Tanggal Berita</label>
                    <input type="date" id="tanggal" name="tanggal" value="{{ old('tanggal', date('Y-m-d')) }}" required class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:outline-none focus:border-blue-600 focus:ring-2 focus:ring-blue-100 text-sm">
                </div>
            </div>

            <div>
                <label for="ringkasan" class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Ringkasan Singkat</label>
                <textarea id="ringkasan" name="ringkasan" rows="2" required placeholder="Ringkasan 1-2 kalimat untuk tampilan depan..." class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:outline-none focus:border-blue-600 focus:ring-2 focus:ring-blue-100 text-sm resize-y">{{ old('ringkasan') }}</textarea>
            </div>

            <div>
                <label for="konten" class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Isi Konten Lengkap</label>
                <textarea id="konten" name="konten" rows="8" required placeholder="Tuliskan isi berita selengkapnya (bisa gunakan format HTML tag seperti <p>, <b>)..." class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:outline-none focus:border-blue-600 focus:ring-2 focus:ring-blue-100 text-sm resize-y">{{ old('konten') }}</textarea>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 bg-gray-50 p-5 rounded-2xl border border-gray-200">
                <div>
                    <label for="gambar_file" class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Upload Gambar (File)</label>
                    <input type="file" id="gambar_file" name="gambar_file" accept="image/*" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                </div>
                <div>
                    <label for="gambar_url" class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Atau URL Gambar Direct</label>
                    <input type="url" id="gambar_url" name="gambar_url" value="{{ old('gambar_url') }}" placeholder="https://images.unsplash.com/..." class="w-full px-4 py-2.5 rounded-xl border border-gray-300 focus:outline-none focus:border-blue-600 focus:ring-2 focus:ring-blue-100 text-sm">
                </div>
            </div>

            <div class="flex items-center gap-3 pt-2">
                <input type="checkbox" id="is_published" name="is_published" value="1" checked class="w-4 h-4 rounded text-blue-600 focus:ring-blue-500 border-gray-300">
                <label for="is_published" class="text-sm font-bold text-gray-800 cursor-pointer">Langsung publikasikan (Tayang di website)</label>
            </div>

            <div class="flex justify-end gap-3 pt-4 border-t border-gray-200">
                <a href="{{ route('admin.berita.index') }}" class="px-5 py-3 rounded-xl font-bold text-sm bg-gray-100 hover:bg-gray-200 text-gray-700 transition-all">Batal</a>
                <button type="submit" class="px-6 py-3 rounded-xl font-bold text-sm bg-blue-600 hover:bg-blue-700 text-white shadow-sm transition-all flex items-center gap-2">
                    <i class="fa-solid fa-floppy-disk"></i> Simpan Berita
                </button>
            </div>
        </form>
    </div>
</x-admin-layout>
