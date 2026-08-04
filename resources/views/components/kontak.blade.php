@props(['settings' => []])

<section class="py-20 bg-gray-50 border-t border-gray-200/60" id="kontak">
    <div class="max-w-7xl mx-auto px-6">
        <span class="inline-flex items-center gap-2 text-xs font-bold tracking-widest uppercase text-blue-600 bg-blue-50 px-4 py-1.5 rounded-full border border-blue-100 reveal">
            Hubungi Kami
        </span>
        <h2 class="text-3xl lg:text-4xl font-display font-bold text-gray-900 mt-4 mb-3 reveal">
            Kontak Kelurahan
        </h2>
        <p class="text-gray-500 max-w-2xl mb-12 text-base leading-relaxed reveal">
            Sampaikan pertanyaan, aduan, atau masukan Anda kepada kami.
        </p>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-start">
            <!-- Contact Info -->
            <div class="lg:col-span-5 space-y-6 reveal">
                <div class="flex items-start gap-4 p-5 bg-white border border-gray-200 rounded-2xl shadow-soft">
                    <div class="w-12 h-12 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center text-xl flex-shrink-0">
                        <i class="fa-solid fa-location-dot"></i>
                    </div>
                    <div>
                        <h4 class="font-display font-bold text-gray-900 text-base mb-1">Alamat Kantor</h4>
                        <p class="text-gray-600 text-sm leading-relaxed">
                            {{ $settings['alamat'] ?? 'Jl. Poros Barru–Mangempang No. 12, Kelurahan Mangempang, Kecamatan Barru, Kabupaten Barru, Sulawesi Selatan 90711' }}
                        </p>
                    </div>
                </div>

                <div class="flex items-start gap-4 p-5 bg-white border border-gray-200 rounded-2xl shadow-soft">
                    <div class="w-12 h-12 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center text-xl flex-shrink-0">
                        <i class="fa-solid fa-phone"></i>
                    </div>
                    <div>
                        <h4 class="font-display font-bold text-gray-900 text-base mb-1">Telepon</h4>
                        <p class="text-gray-600 text-sm">
                            {{ $settings['telepon'] ?? '(0427) 21345' }}
                        </p>
                    </div>
                </div>

                <div class="flex items-start gap-4 p-5 bg-white border border-gray-200 rounded-2xl shadow-soft">
                    <div class="w-12 h-12 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center text-xl flex-shrink-0">
                        <i class="fa-solid fa-envelope"></i>
                    </div>
                    <div>
                        <h4 class="font-display font-bold text-gray-900 text-base mb-1">Email</h4>
                        <p class="text-gray-600 text-sm">
                            {{ $settings['email'] ?? 'kelurahan.mangempang@barrukab.go.id' }}
                        </p>
                    </div>
                </div>

                <div class="flex items-start gap-4 p-5 bg-white border border-gray-200 rounded-2xl shadow-soft">
                    <div class="w-12 h-12 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center text-xl flex-shrink-0">
                        <i class="fa-solid fa-clock"></i>
                    </div>
                    <div>
                        <h4 class="font-display font-bold text-gray-900 text-base mb-1">Jam Pelayanan</h4>
                        <p class="text-gray-600 text-sm">
                            {{ $settings['jam_pelayanan'] ?? 'Senin – Jumat, 08.00 – 16.00 WITA' }}
                        </p>
                    </div>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="lg:col-span-7 reveal">
                <form class="bg-white border border-gray-200 rounded-3xl p-8 lg:p-10 shadow-soft space-y-5" id="contactForm" action="{{ route('kontak.store') }}" method="POST">
                    @csrf
                    <div id="contactFormAlert" class="hidden p-4 rounded-xl text-sm font-semibold"></div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <div>
                            <label for="nama" class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Nama Lengkap</label>
                            <input type="text" id="nama" name="nama" placeholder="Nama Anda" required class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:outline-none focus:border-blue-600 focus:ring-2 focus:ring-blue-100 text-sm transition-all">
                        </div>
                        <div>
                            <label for="email" class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Email</label>
                            <input type="email" id="email" name="email" placeholder="nama@email.com" required class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:outline-none focus:border-blue-600 focus:ring-2 focus:ring-blue-100 text-sm transition-all">
                        </div>
                    </div>

                    <div>
                        <label for="subjek" class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Subjek</label>
                        <input type="text" id="subjek" name="subjek" placeholder="Perihal pesan atau aduan" required class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:outline-none focus:border-blue-600 focus:ring-2 focus:ring-blue-100 text-sm transition-all">
                    </div>

                    <div>
                        <label for="pesan" class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Pesan / Aduan</label>
                        <textarea id="pesan" name="pesan" rows="4" placeholder="Tuliskan pesan, pertanyaan, atau aduan Anda di sini..." required class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:outline-none focus:border-blue-600 focus:ring-2 focus:ring-blue-100 text-sm transition-all resize-y min-h-[120px]"></textarea>
                    </div>

                    <button type="submit" id="submitBtn" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3.5 px-6 rounded-xl shadow-md hover:shadow-lg transition-all duration-300 flex items-center justify-center gap-2 text-sm">
                        <i class="fa-solid fa-paper-plane"></i> <span id="submitBtnText">Kirim Pesan</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>

<script>
    (function () {
        function initContactForm() {
            const form = document.getElementById('contactForm');
            const alertBox = document.getElementById('contactFormAlert');
            const submitBtn = document.getElementById('submitBtn');
            const submitBtnText = document.getElementById('submitBtnText');

            if (!form) return;

            form.addEventListener('submit', function (e) {
                e.preventDefault();

                submitBtn.disabled = true;
                submitBtnText.textContent = 'Mengirim...';

                const formData = new FormData(form);
                const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                fetch(form.action, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken,
                        'Accept': 'application/json'
                    },
                    body: formData
                })
                .then(res => res.json())
                .then(data => {
                    alertBox.className = 'p-4 rounded-xl text-sm font-semibold bg-emerald-50 text-emerald-800 border border-emerald-200 flex items-center gap-2';
                    alertBox.innerHTML = '<i class="fa-solid fa-circle-check text-emerald-600"></i> ' + (data.message || 'Pesan Anda berhasil terkirim!');
                    alertBox.classList.remove('hidden');
                    form.reset();
                })
                .catch(err => {
                    alertBox.className = 'p-4 rounded-xl text-sm font-semibold bg-red-50 text-red-800 border border-red-200 flex items-center gap-2';
                    alertBox.innerHTML = '<i class="fa-solid fa-circle-xmark text-red-600"></i> Gagal mengirim pesan. Silakan coba lagi.';
                    alertBox.classList.remove('hidden');
                })
                .finally(() => {
                    submitBtn.disabled = false;
                    submitBtnText.textContent = 'Kirim Pesan';
                    setTimeout(() => {
                        alertBox.classList.add('hidden');
                    }, 5000);
                });
            });
        }

        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', initContactForm);
        } else {
            initContactForm();
        }
    })();
</script>
