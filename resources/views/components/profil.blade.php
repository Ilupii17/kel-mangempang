@props(['settings' => [], 'misiList' => []])

<section class="py-20 bg-gray-50 border-y border-gray-200/60" id="profil">
    <div class="max-w-7xl mx-auto px-6">
        <span class="inline-flex items-center gap-2 text-xs font-bold tracking-widest uppercase text-blue-600 bg-blue-50 px-4 py-1.5 rounded-full border border-blue-100 reveal">
            Tentang Kami
        </span>
        <h2 class="text-3xl lg:text-4xl font-display font-bold text-gray-900 mt-4 mb-3 reveal">
            Profil Kelurahan
        </h2>
        <p class="text-gray-500 max-w-2xl mb-12 text-base leading-relaxed reveal">
            Mengenal lebih dekat sejarah, visi, dan misi {{ $settings['nama_kelurahan'] ?? 'Kelurahan Mangempang' }} dalam melayani masyarakat.
        </p>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-start">
            <div class="space-y-8">
                <div class="bg-white border border-gray-200 p-7 rounded-2xl shadow-soft reveal">
                    <h3 class="flex items-center gap-3 text-xl font-display font-bold text-gray-900 mb-3">
                        <i class="fa-solid fa-scroll text-blue-600"></i> Sejarah Singkat
                    </h3>
                    <p class="text-gray-600 leading-relaxed text-sm lg:text-base">
                        {{ $settings['sejarah'] ?? 'Kelurahan Mangempang merupakan salah satu kelurahan di Kecamatan Barru yang terbentuk seiring pemekaran wilayah administratif Kabupaten Barru.' }}
                    </p>
                </div>

                <div class="bg-white border border-gray-200 p-7 rounded-2xl shadow-soft reveal">
                    <h3 class="flex items-center gap-3 text-xl font-display font-bold text-gray-900 mb-3">
                        <i class="fa-solid fa-eye text-blue-600"></i> Visi
                    </h3>
                    <p class="text-gray-700 italic font-medium leading-relaxed bg-blue-50/60 border-l-4 border-blue-600 p-4 rounded-r-xl text-sm lg:text-base">
                        "{{ $settings['visi'] ?? 'Terwujudnya Kelurahan Mangempang yang mandiri, sejahtera, dan berbudaya melalui pelayanan publik yang transparan dan partisipatif.' }}"
                    </p>
                </div>

                <div class="bg-white border border-gray-200 p-7 rounded-2xl shadow-soft reveal">
                    <h3 class="flex items-center gap-3 text-xl font-display font-bold text-gray-900 mb-4">
                        <i class="fa-solid fa-bullseye text-blue-600"></i> Misi
                    </h3>
                    <ul class="space-y-3">
                        @forelse($misiList as $index => $misi)
                            <li class="flex items-start gap-3 pb-3 border-b border-dashed border-gray-200 last:border-0 last:pb-0">
                                <span class="flex-shrink-0 w-7 h-7 rounded-lg bg-blue-600 text-white font-bold text-xs flex items-center justify-center mt-0.5 shadow-sm">
                                    {{ $index + 1 }}
                                </span>
                                <span class="text-gray-600 text-sm lg:text-base leading-relaxed">{{ $misi }}</span>
                            </li>
                        @empty
                            <li class="text-gray-400 text-sm">Belum ada data misi.</li>
                        @endforelse
                    </ul>
                </div>
            </div>

            <!-- Sambutan Lurah Card -->
            <div class="reveal sticky top-28">
                <div class="bg-gradient-to-br from-blue-50 to-indigo-50/50 border border-blue-200/80 rounded-3xl p-8 lg:p-10 shadow-float relative overflow-hidden">
                    <div class="absolute -top-3 left-8 w-10 h-10 rounded-full bg-white text-blue-600 flex items-center justify-center shadow-md border border-blue-100">
                        <i class="fa-solid fa-quote-left text-base"></i>
                    </div>
                    
                    <p class="italic text-gray-700 text-base lg:text-lg leading-relaxed mb-8 pt-3">
                        "{{ $settings['sambutan_lurah'] ?? 'Kami berkomitmen menghadirkan pelayanan yang semakin dekat, cepat, dan ramah bagi seluruh warga Mangempang. Website ini adalah salah satu wujud keterbukaan informasi yang terus kami dorong demi kelurahan yang lebih maju.' }}"
                    </p>

                    <div class="flex items-center gap-4 border-t border-blue-200/60 pt-6">
                        <div class="w-14 h-14 rounded-full bg-gradient-to-tr from-blue-600 to-blue-900 text-white flex items-center justify-center font-bold text-lg shadow-md flex-shrink-0">
                            {{ substr($settings['nama_lurah'] ?? 'AH', 0, 2) }}
                        </div>
                        <div>
                            <div class="font-display font-bold text-gray-900 text-lg">
                                {{ $settings['nama_lurah'] ?? 'Andi Hasanuddin, S.STP' }}
                            </div>
                            <div class="text-xs font-semibold text-blue-600 tracking-wide uppercase mt-0.5">
                                Lurah {{ $settings['nama_kelurahan'] ?? 'Mangempang' }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
