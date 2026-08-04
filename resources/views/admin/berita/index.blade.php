<x-admin-layout headerTitle="Kelola Berita & Artikel">
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
        <div>
            <h2 class="text-lg font-bold text-gray-800">Daftar Berita</h2>
            <p class="text-xs text-gray-500">Kelola postingan berita dan artikel kelurahan.</p>
        </div>
        <a href="{{ route('admin.berita.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold px-5 py-2.5 rounded-xl text-sm transition-all shadow-sm flex items-center justify-center gap-2">
            <i class="fa-solid fa-plus text-xs"></i> Tambah Berita Baru
        </a>
    </div>

    <div class="bg-white border border-gray-200 rounded-3xl overflow-hidden shadow-xs">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm">
                <thead class="bg-gray-50 text-gray-700 font-bold border-b border-gray-200">
                    <tr>
                        <th class="py-4 px-6">Gambar</th>
                        <th class="py-4 px-6">Judul</th>
                        <th class="py-4 px-6">Penulis</th>
                        <th class="py-4 px-6">Tanggal</th>
                        <th class="py-4 px-6">Status</th>
                        <th class="py-4 px-6 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse($beritas as $b)
                        <tr class="hover:bg-gray-50/80 transition-colors">
                            <td class="py-4 px-6">
                                <img src="{{ $b->gambar }}" class="w-14 h-12 rounded-xl object-cover border border-gray-200 shadow-xs" alt="{{ $b->judul }}">
                            </td>
                            <td class="py-4 px-6 font-semibold text-gray-900 max-w-xs">
                                <div class="line-clamp-2">{{ $b->judul }}</div>
                            </td>
                            <td class="py-4 px-6 text-gray-600 text-xs font-medium">
                                {{ $b->penulis }}
                            </td>
                            <td class="py-4 px-6 text-gray-600 text-xs font-medium">
                                {{ \Carbon\Carbon::parse($b->tanggal)->isoFormat('D MMM Y') }}
                            </td>
                            <td class="py-4 px-6">
                                @if($b->is_published)
                                    <span class="bg-emerald-50 text-emerald-700 border border-emerald-200 text-xs font-bold px-3 py-1 rounded-full">Tayang</span>
                                @else
                                    <span class="bg-gray-100 text-gray-600 text-xs font-bold px-3 py-1 rounded-full">Draft</span>
                                @endif
                            </td>
                            <td class="py-4 px-6 text-right">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="{{ route('admin.berita.edit', ['berita' => $b->id]) }}" class="w-8 h-8 rounded-lg bg-blue-50 text-blue-600 hover:bg-blue-600 hover:text-white flex items-center justify-center transition-all" title="Edit">
                                        <i class="fa-solid fa-pen-to-square text-xs"></i>
                                    </a>
                                    <form action="{{ route('admin.berita.destroy', ['berita' => $b->id]) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus berita ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="w-8 h-8 rounded-lg bg-red-50 text-red-600 hover:bg-red-600 hover:text-white flex items-center justify-center transition-all" title="Hapus">
                                            <i class="fa-solid fa-trash-can text-xs"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-gray-400 py-10">Belum ada data berita.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="p-4 border-t border-gray-200">
            {{ $beritas->links() }}
        </div>
    </div>
</x-admin-layout>
