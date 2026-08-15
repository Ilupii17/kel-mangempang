<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Admin Panel — Kelurahan Mangempang' }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Google Fonts & FontAwesome -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Vite Assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-body bg-gray-100 text-gray-800 antialiased min-h-screen flex flex-col md:flex-row">

    <!-- SIDEBAR -->
    <aside class="w-full md:w-64 bg-slate-900 text-white flex-shrink-0 flex flex-col justify-between min-h-screen">
        <div>
            <!-- Sidebar Header -->
            <div class="p-6 border-b border-slate-800 flex items-center gap-3">
                <img src="{{ asset('images/barru-logo.png') }}"
                     alt="Logo Kabupaten Barru"
                     class="w-10 h-10 object-contain flex-shrink-0">
                <div>
                    <h2 class="font-display font-extrabold text-base leading-tight text-white">Admin Panel</h2>
                    <p class="text-xs text-slate-400">Kelurahan Mangempang</p>
                </div>
            </div>

            <!-- Navigation Links -->
            <nav class="p-4 space-y-1.5 text-sm">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl font-bold transition-all {{ request()->routeIs('admin.dashboard') ? 'bg-blue-600 text-white shadow' : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}">
                    <i class="fa-solid fa-chart-line text-base w-5"></i> Dashboard
                </a>

                <a href="{{ route('admin.berita.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl font-bold transition-all {{ request()->routeIs('admin.berita.*') ? 'bg-blue-600 text-white shadow' : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}">
                    <i class="fa-solid fa-newspaper text-base w-5"></i> Berita & Artikel
                </a>

                <a href="{{ route('admin.galeri.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl font-bold transition-all {{ request()->routeIs('admin.galeri.*') ? 'bg-blue-600 text-white shadow' : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}">
                    <i class="fa-solid fa-images text-base w-5"></i> Galeri Foto
                </a>

                <a href="{{ route('admin.statistik.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl font-bold transition-all {{ request()->routeIs('admin.statistik.*') ? 'bg-blue-600 text-white shadow' : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}">
                    <i class="fa-solid fa-chart-pie text-base w-5"></i> Data & Statistik
                </a>

                <a href="{{ route('admin.kontak.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl font-bold transition-all {{ request()->routeIs('admin.kontak.*') ? 'bg-blue-600 text-white shadow' : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}">
                    <i class="fa-solid fa-envelope text-base w-5"></i> Pesan Masuk
                </a>

                <a href="{{ route('admin.setting.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl font-bold transition-all {{ request()->routeIs('admin.setting.*') ? 'bg-blue-600 text-white shadow' : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}">
                    <i class="fa-solid fa-gears text-base w-5"></i> Pengaturan Profil
                </a>
            </nav>
        </div>

        <!-- Sidebar Footer -->
        <div class="p-4 border-t border-slate-800">
            <a href="{{ route('home') }}" target="_blank" class="flex items-center justify-center gap-2 w-full bg-slate-800 hover:bg-slate-700 text-slate-200 text-xs font-bold py-2.5 rounded-xl transition-all mb-3 border border-slate-700">
                <i class="fa-solid fa-arrow-up-right-from-square"></i> Lihat Website
            </a>

            <form action="{{ route('admin.logout') }}" method="POST">
                @csrf
                <button type="submit" class="flex items-center justify-center gap-2 w-full bg-red-600/20 hover:bg-red-600 text-red-400 hover:text-white text-xs font-bold py-2.5 rounded-xl transition-all border border-red-500/30">
                    <i class="fa-solid fa-right-from-bracket"></i> Keluar (Logout)
                </button>
            </form>
        </div>
    </aside>

    <!-- MAIN CONTENT -->
    <div class="flex-1 flex flex-col min-w-0">
        <!-- Top Navbar -->
        <header class="bg-white border-b border-gray-200 px-8 py-4 flex items-center justify-between shadow-xs">
            <h1 class="font-display font-bold text-xl text-gray-900">{{ $headerTitle ?? 'Dashboard' }}</h1>
            <div class="flex items-center gap-3">
                <div class="text-right">
                    <div class="font-bold text-sm text-gray-900">{{ Auth::user()->name ?? 'Administrator' }}</div>
                    <div class="text-xs text-gray-500">{{ Auth::user()->email ?? 'admin@mangempang.go.id' }}</div>
                </div>
                <div class="w-10 h-10 rounded-full bg-blue-100 text-blue-700 font-bold flex items-center justify-center border border-blue-200 shadow-xs">
                    {{ substr(Auth::user()->name ?? 'A', 0, 1) }}
                </div>
            </div>
        </header>

        <!-- Main Body -->
        <main class="p-8 flex-1">
            @if(session('success'))
                <div class="mb-6 bg-emerald-50 border border-emerald-200 text-emerald-800 px-5 py-4 rounded-2xl text-sm font-semibold flex items-center gap-3 shadow-xs">
                    <i class="fa-solid fa-circle-check text-emerald-600 text-lg"></i>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            @if(session('error'))
                <div class="mb-6 bg-red-50 border border-red-200 text-red-800 px-5 py-4 rounded-2xl text-sm font-semibold flex items-center gap-3 shadow-xs">
                    <i class="fa-solid fa-circle-xmark text-red-600 text-lg"></i>
                    <span>{{ session('error') }}</span>
                </div>
            @endif

            {{ $slot }}
        </main>
    </div>

    @stack('scripts')

    {{-- Custom Confirm Modal (pure inline CSS, no Tailwind dependency) --}}
    <style>
        #confirmModal {
            position: fixed; inset: 0; z-index: 9999;
            display: flex; align-items: center; justify-content: center; padding: 1rem;
            opacity: 0; pointer-events: none;
            transition: opacity 0.2s ease;
        }
        #confirmModal.is-open { opacity: 1; pointer-events: all; }
        #confirmBackdrop {
            position: absolute; inset: 0;
            background: rgba(15, 23, 42, 0.65);
            backdrop-filter: blur(4px);
        }
        #confirmCard {
            position: relative; background: #fff;
            border-radius: 1.5rem; box-shadow: 0 25px 60px rgba(0,0,0,.18);
            width: 100%; max-width: 380px; padding: 2.25rem 2rem;
            transform: scale(.94); transition: transform 0.22s cubic-bezier(.34,1.56,.64,1);
        }
        #confirmModal.is-open #confirmCard { transform: scale(1); }
        #confirmIconWrap {
            width: 64px; height: 64px; border-radius: 1rem;
            background: #fef2f2; display: flex; align-items: center; justify-content: center;
            margin: 0 auto 1.25rem;
        }
        #confirmIconWrap i { font-size: 1.6rem; color: #ef4444; }
        #confirmTitle {
            text-align: center; font-weight: 800; font-size: 1.1rem;
            color: #111827; margin: 0 0 .5rem;
        }
        #confirmMessage {
            text-align: center; font-size: .85rem; color: #6b7280;
            line-height: 1.6; margin: 0 0 1.75rem;
        }
        #confirmActions { display: flex; gap: .75rem; }
        #confirmCancel, #confirmOk {
            flex: 1; padding: .8rem 1rem; border-radius: .85rem;
            font-size: .85rem; font-weight: 700; cursor: pointer;
            border: none; transition: background .15s, transform .1s;
        }
        #confirmCancel { background: #f3f4f6; color: #374151; }
        #confirmCancel:hover { background: #e5e7eb; }
        #confirmOk {
            background: #dc2626; color: #fff;
            display: flex; align-items: center; justify-content: center; gap: .4rem;
        }
        #confirmOk:hover { background: #b91c1c; }
        #confirmOk:active, #confirmCancel:active { transform: scale(.97); }
    </style>

    <div id="confirmModal">
        <div id="confirmBackdrop"></div>
        <div id="confirmCard">
            <div id="confirmIconWrap">
                <i class="fa-solid fa-trash-can"></i>
            </div>
            <h3 id="confirmTitle">Konfirmasi Hapus</h3>
            <p id="confirmMessage">Apakah Anda yakin ingin menghapus item ini? Tindakan ini tidak dapat dibatalkan.</p>
            <div id="confirmActions">
                <button id="confirmCancel" type="button">Batal</button>
                <button id="confirmOk" type="button">
                    <i class="fa-solid fa-trash-can"></i> Hapus
                </button>
            </div>
        </div>
    </div>

    <script>
    (function () {
        const modal    = document.getElementById('confirmModal');
        const msgEl    = document.getElementById('confirmMessage');
        const btnOk    = document.getElementById('confirmOk');
        const btnCancel= document.getElementById('confirmCancel');
        const backdrop = document.getElementById('confirmBackdrop');
        let pendingForm = null;

        function openModal(msg) {
            if (msg) msgEl.textContent = msg;
            modal.classList.add('is-open');
            document.body.style.overflow = 'hidden';
        }

        function closeModal() {
            modal.classList.remove('is-open');
            document.body.style.overflow = '';
            pendingForm = null;
            btnOk.innerHTML = '<i class="fa-solid fa-trash-can"></i> Hapus';
            btnOk.disabled = false;
        }

        document.addEventListener('submit', function (e) {
            const form = e.target;
            if (!form.dataset.confirm) return;
            e.preventDefault();
            pendingForm = form;
            openModal(form.dataset.confirm);
        });

        btnOk.addEventListener('click', function () {
            if (!pendingForm) return;
            btnOk.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i> Menghapus...';
            btnOk.disabled = true;
            const f = pendingForm;
            closeModal();
            f.submit();
        });

        btnCancel.addEventListener('click', closeModal);
        backdrop.addEventListener('click', closeModal);
        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape') closeModal();
        });
    })();
    </script>
</body>
</html>

