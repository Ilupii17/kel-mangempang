<x-admin-layout headerTitle="Pengaturan Profil & Informasi Kelurahan">
    <div class="max-w-4xl mx-auto bg-white border border-gray-200 rounded-3xl p-8 shadow-xs">
        <div class="border-b pb-4 mb-6">
            <h2 class="text-lg font-bold text-gray-900">Kelola Informasi Utama Website</h2>
            <p class="text-xs text-gray-500">Perbarui data lurah, visi, misi, dan identitas Kelurahan Mangempang.</p>
        </div>

        <form action="{{ route('admin.setting.update') }}" method="POST" class="space-y-6">
            @csrf

            <!-- Identitas Kelurahan -->
            <div class="bg-gray-50 p-6 rounded-2xl border border-gray-200 space-y-4">
                <h3 class="font-display font-bold text-sm text-gray-900 uppercase tracking-wider text-blue-700">Identitas Wilayah</h3>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="nama_kelurahan" class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Nama Kelurahan</label>
                        <input type="text" id="nama_kelurahan" name="nama_kelurahan" value="{{ old('nama_kelurahan', $settings['nama_kelurahan'] ?? 'Kelurahan Mangempang') }}" required class="w-full px-4 py-2.5 rounded-xl border border-gray-300 focus:outline-none focus:border-blue-600 text-sm">
                    </div>
                    <div>
                        <label for="kecamatan" class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Kecamatan</label>
                        <input type="text" id="kecamatan" name="kecamatan" value="{{ old('kecamatan', $settings['kecamatan'] ?? 'Kecamatan Barru') }}" required class="w-full px-4 py-2.5 rounded-xl border border-gray-300 focus:outline-none focus:border-blue-600 text-sm">
                    </div>
                    <div>
                        <label for="kabupaten" class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Kabupaten</label>
                        <input type="text" id="kabupaten" name="kabupaten" value="{{ old('kabupaten', $settings['kabupaten'] ?? 'Kabupaten Barru') }}" required class="w-full px-4 py-2.5 rounded-xl border border-gray-300 focus:outline-none focus:border-blue-600 text-sm">
                    </div>
                    <div>
                        <label for="provinsi" class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Provinsi</label>
                        <input type="text" id="provinsi" name="provinsi" value="{{ old('provinsi', $settings['provinsi'] ?? 'Sulawesi Selatan') }}" required class="w-full px-4 py-2.5 rounded-xl border border-gray-300 focus:outline-none focus:border-blue-600 text-sm">
                    </div>
                </div>
            </div>

            <!-- Sambutan Lurah -->
            <div class="bg-gray-50 p-6 rounded-2xl border border-gray-200 space-y-4">
                <h3 class="font-display font-bold text-sm text-gray-900 uppercase tracking-wider text-blue-700">Profil Kepala Kelurahan (Lurah)</h3>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="nama_lurah" class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Nama Lurah</label>
                        <input type="text" id="nama_lurah" name="nama_lurah" value="{{ old('nama_lurah', $settings['nama_lurah'] ?? 'Andi Hasanuddin, S.STP') }}" required class="w-full px-4 py-2.5 rounded-xl border border-gray-300 focus:outline-none focus:border-blue-600 text-sm">
                    </div>
                </div>

                <div>
                    <label for="sambutan_lurah" class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Kutipan / Sambutan Lurah</label>
                    <textarea id="sambutan_lurah" name="sambutan_lurah" rows="3" required class="w-full px-4 py-2.5 rounded-xl border border-gray-300 focus:outline-none focus:border-blue-600 text-sm resize-y">{{ old('sambutan_lurah', $settings['sambutan_lurah'] ?? '') }}</textarea>
                </div>
            </div>

            <!-- Visi & Misi -->
            <div class="bg-gray-50 p-6 rounded-2xl border border-gray-200 space-y-4">
                <h3 class="font-display font-bold text-sm text-gray-900 uppercase tracking-wider text-blue-700">Visi, Misi & Sejarah</h3>

                <div>
                    <label for="sejarah" class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Sejarah Singkat</label>
                    <textarea id="sejarah" name="sejarah" rows="3" required class="w-full px-4 py-2.5 rounded-xl border border-gray-300 focus:outline-none focus:border-blue-600 text-sm resize-y">{{ old('sejarah', $settings['sejarah'] ?? '') }}</textarea>
                </div>

                <div>
                    <label for="visi" class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Visi Kelurahan</label>
                    <textarea id="visi" name="visi" rows="2" required class="w-full px-4 py-2.5 rounded-xl border border-gray-300 focus:outline-none focus:border-blue-600 text-sm resize-y">{{ old('visi', $settings['visi'] ?? '') }}</textarea>
                </div>

                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Poin Misi (Satu Misi Per Baris)</label>
                    <div class="space-y-2" id="misiContainer">
                        @forelse($misiList as $misi)
                            <input type="text" name="misi_items[]" value="{{ $misi }}" class="w-full px-4 py-2 rounded-xl border border-gray-300 text-sm focus:outline-none focus:border-blue-600">
                        @empty
                            <input type="text" name="misi_items[]" placeholder="Misi 1..." class="w-full px-4 py-2 rounded-xl border border-gray-300 text-sm">
                            <input type="text" name="misi_items[]" placeholder="Misi 2..." class="w-full px-4 py-2 rounded-xl border border-gray-300 text-sm">
                        @endforelse
                    </div>
                </div>
            </div>

            <!-- Kontak Kantor -->
            <div class="bg-gray-50 p-6 rounded-2xl border border-gray-200 space-y-4">
                <h3 class="font-display font-bold text-sm text-gray-900 uppercase tracking-wider text-blue-700">Kontak Kantor & Layanan</h3>

                <div>
                    <label for="alamat" class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Alamat Lengkap Kantor</label>
                    <input type="text" id="alamat" name="alamat" value="{{ old('alamat', $settings['alamat'] ?? '') }}" required class="w-full px-4 py-2.5 rounded-xl border border-gray-300 focus:outline-none focus:border-blue-600 text-sm">
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <label for="telepon" class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Telepon</label>
                        <input type="text" id="telepon" name="telepon" value="{{ old('telepon', $settings['telepon'] ?? '') }}" required class="w-full px-4 py-2.5 rounded-xl border border-gray-300 focus:outline-none focus:border-blue-600 text-sm">
                    </div>
                    <div>
                        <label for="email" class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Email Official</label>
                        <input type="email" id="email" name="email" value="{{ old('email', $settings['email'] ?? '') }}" required class="w-full px-4 py-2.5 rounded-xl border border-gray-300 focus:outline-none focus:border-blue-600 text-sm">
                    </div>
                    <div>
                        <label for="jam_pelayanan" class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Jam Pelayanan</label>
                        <input type="text" id="jam_pelayanan" name="jam_pelayanan" value="{{ old('jam_pelayanan', $settings['jam_pelayanan'] ?? '') }}" required class="w-full px-4 py-2.5 rounded-xl border border-gray-300 focus:outline-none focus:border-blue-600 text-sm">
                    </div>
                </div>
            </div>

            <div class="flex justify-end gap-3 pt-4 border-t border-gray-200">
                <button type="submit" class="px-7 py-3 rounded-xl font-bold text-sm bg-blue-600 hover:bg-blue-700 text-white shadow-sm transition-all flex items-center gap-2">
                    <i class="fa-solid fa-floppy-disk"></i> Simpan Pengaturan
                </button>
            </div>
        </form>
    </div>
</x-admin-layout>
