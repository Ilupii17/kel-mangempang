<x-admin-layout headerTitle="Pesan & Pengaduan Masuk">
    <div class="bg-white border border-gray-200 rounded-3xl overflow-hidden shadow-xs">
        <div class="p-6 border-b border-gray-200 flex items-center justify-between">
            <div>
                <h3 class="font-display font-bold text-lg text-gray-900">Daftar Pesan Masuk</h3>
                <p class="text-xs text-gray-500">Pesan, pertanyaan, dan aspirasi yang dikirimkan warga via formulir kontak website.</p>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm">
                <thead class="bg-gray-50 text-gray-700 font-bold border-b border-gray-200">
                    <tr>
                        <th class="py-4 px-6">Status</th>
                        <th class="py-4 px-6">Nama Pengirim</th>
                        <th class="py-4 px-6">Email</th>
                        <th class="py-4 px-6">Subjek</th>
                        <th class="py-4 px-6">Waktu</th>
                        <th class="py-4 px-6 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse($pesans as $p)
                        <tr class="hover:bg-gray-50/80 transition-colors {{ !$p->is_read ? 'bg-blue-50/40 font-semibold' : '' }}">
                            <td class="py-4 px-6">
                                @if(!$p->is_read)
                                    <span class="bg-blue-100 text-blue-800 border border-blue-200 text-xs font-bold px-2.5 py-0.5 rounded-full inline-flex items-center gap-1">
                                        <i class="fa-solid fa-circle text-[8px]"></i> Baru
                                    </span>
                                @else
                                    <span class="bg-gray-100 text-gray-600 text-xs font-medium px-2.5 py-0.5 rounded-full">Sudah dibaca</span>
                                @endif
                            </td>
                            <td class="py-4 px-6 text-gray-900 font-bold">
                                {{ $p->nama }}
                            </td>
                            <td class="py-4 px-6 text-gray-600 text-xs">
                                {{ $p->email }}
                            </td>
                            <td class="py-4 px-6 text-gray-800 font-medium">
                                {{ $p->subjek }}
                            </td>
                            <td class="py-4 px-6 text-gray-500 text-xs">
                                {{ $p->created_at->diffForHumans() }}
                            </td>
                            <td class="py-4 px-6 text-right">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="{{ route('admin.kontak.show', $p->id) }}" class="w-8 h-8 rounded-lg bg-blue-50 text-blue-600 hover:bg-blue-600 hover:text-white flex items-center justify-center transition-all" title="Baca Pesan">
                                        <i class="fa-solid fa-eye text-xs"></i>
                                    </a>
                                    <form action="{{ route('admin.kontak.destroy', $p->id) }}" method="POST" data-confirm="Hapus pesan dari '{{ $p->nama }}'? Tindakan ini tidak dapat dibatalkan.">
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
                            <td colspan="6" class="text-center text-gray-400 py-10">Belum ada pesan masuk.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="p-4 border-t border-gray-200">
            {{ $pesans->links() }}
        </div>
    </div>
</x-admin-layout>
