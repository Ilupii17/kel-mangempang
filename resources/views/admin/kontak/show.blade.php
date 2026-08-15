<x-admin-layout headerTitle="Detail Pesan Masuk">
    <div class="max-w-3xl mx-auto bg-white border border-gray-200 rounded-3xl p-8 shadow-xs">
        <div class="flex items-center justify-between border-b pb-4 mb-6">
            <h2 class="text-lg font-bold text-gray-900">Detail Pesan dari {{ $kontak->nama }}</h2>
            <a href="{{ route('admin.kontak.index') }}" class="text-xs font-bold text-gray-500 hover:text-gray-800">
                <i class="fa-solid fa-arrow-left"></i> Kembali ke Pesan
            </a>
        </div>

        <div class="space-y-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 bg-gray-50 p-5 rounded-2xl border border-gray-200 text-sm">
                <div>
                    <span class="text-xs font-bold text-gray-500 uppercase tracking-wider block mb-1">Nama Pengirim</span>
                    <span class="font-bold text-gray-900">{{ $kontak->nama }}</span>
                </div>
                <div>
                    <span class="text-xs font-bold text-gray-500 uppercase tracking-wider block mb-1">Email</span>
                    <a href="mailto:{{ $kontak->email }}" class="font-bold text-blue-600 hover:underline">{{ $kontak->email }}</a>
                </div>
                <div>
                    <span class="text-xs font-bold text-gray-500 uppercase tracking-wider block mb-1">Subjek</span>
                    <span class="font-bold text-gray-900">{{ $kontak->subjek }}</span>
                </div>
                <div>
                    <span class="text-xs font-bold text-gray-500 uppercase tracking-wider block mb-1">Waktu Masuk</span>
                    <span class="text-gray-700 font-medium">{{ $kontak->created_at->isoFormat('D MMMM Y, HH:mm') }} WITA</span>
                </div>
            </div>

            <div>
                <h4 class="text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Isi Pesan / Pengaduan:</h4>
                <div class="p-6 bg-white border border-gray-200 rounded-2xl text-gray-800 leading-relaxed text-sm whitespace-pre-line shadow-xs">
                    {{ $kontak->pesan }}
                </div>
            </div>

            <div class="flex items-center justify-between pt-4 border-t border-gray-200">
                <a href="mailto:{{ $kontak->email }}?subject=Re: {{ $kontak->subjek }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold px-6 py-3 rounded-xl text-sm transition-all shadow-sm flex items-center gap-2">
                    <i class="fa-solid fa-reply"></i> Balas Via Email
                </a>

                <form action="{{ route('admin.kontak.destroy', $kontak->id) }}" method="POST" data-confirm="Hapus pesan dari '{{ $kontak->nama }}'? Tindakan ini tidak dapat dibatalkan.">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-50 text-red-600 hover:bg-red-600 hover:text-white font-bold px-5 py-3 rounded-xl text-sm transition-all flex items-center gap-2">
                        <i class="fa-solid fa-trash-can"></i> Hapus Pesan
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-admin-layout>
