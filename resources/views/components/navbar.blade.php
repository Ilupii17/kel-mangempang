@props(['settings' => []])

<header class="sticky top-0 z-50 bg-white/90 backdrop-blur-md border-b border-transparent transition-all duration-300 shadow-sm" id="navbar">
    <div class="max-w-7xl mx-auto px-6 h-20 flex items-center justify-between">
        <a href="{{ route('home') }}" class="flex items-center gap-3 group">
            <img src="{{ asset('images/barru-logo.png') }}"
                 alt="Logo Kabupaten Barru"
                 class="h-12 w-12 object-contain group-hover:scale-105 transition-transform duration-300">
            <div class="flex flex-col leading-tight">
                <span class="text-xs text-gray-500 font-medium">Pemerintah {{ $settings['kabupaten'] ?? 'Kabupaten Barru' }}</span>
                <span class="font-display font-extrabold text-lg text-gray-900 group-hover:text-blue-600 transition-colors">
                    {{ $settings['nama_kelurahan'] ?? 'Kelurahan Mangempang' }}
                </span>
            </div>
        </a>

        <!-- Desktop Navigation -->
        <nav class="hidden md:flex items-center gap-1" id="navMenu">
            <a href="{{ route('home') }}#beranda" class="nav-link font-semibold text-sm text-gray-700 px-4 py-2.5 rounded-lg transition-all hover:text-blue-600 hover:bg-blue-50">Beranda</a>
            <a href="{{ route('home') }}#profil" class="nav-link font-semibold text-sm text-gray-700 px-4 py-2.5 rounded-lg transition-all hover:text-blue-600 hover:bg-blue-50">Profil</a>
            <a href="{{ route('home') }}#berita" class="nav-link font-semibold text-sm text-gray-700 px-4 py-2.5 rounded-lg transition-all hover:text-blue-600 hover:bg-blue-50">Berita</a>
            <a href="{{ route('home') }}#data" class="nav-link font-semibold text-sm text-gray-700 px-4 py-2.5 rounded-lg transition-all hover:text-blue-600 hover:bg-blue-50">Data Kelurahan</a>
            <a href="{{ route('home') }}#galeri" class="nav-link font-semibold text-sm text-gray-700 px-4 py-2.5 rounded-lg transition-all hover:text-blue-600 hover:bg-blue-50">Galeri</a>
            <a href="{{ route('home') }}#kontak" class="nav-link font-semibold text-sm text-gray-700 px-4 py-2.5 rounded-lg transition-all hover:text-blue-600 hover:bg-blue-50">Kontak</a>
        </nav>

        <!-- Mobile Hamburger Toggle -->
        <button class="md:hidden p-2 rounded-lg text-gray-700 hover:bg-gray-100 transition-colors" id="hamburgerBtn" aria-label="Menu Mobile">
            <i class="fa-solid fa-bars text-2xl" id="hamburgerIcon"></i>
        </button>
    </div>

    <!-- Mobile Navigation Drawer -->
    <div class="hidden md:hidden bg-white border-b border-gray-200 px-6 py-4 space-y-2 shadow-lg" id="mobileMenu">
        <a href="{{ route('home') }}#beranda" class="block font-semibold text-gray-700 hover:text-blue-600 py-2">Beranda</a>
        <a href="{{ route('home') }}#profil" class="block font-semibold text-gray-700 hover:text-blue-600 py-2">Profil</a>
        <a href="{{ route('home') }}#berita" class="block font-semibold text-gray-700 hover:text-blue-600 py-2">Berita</a>
        <a href="{{ route('home') }}#data" class="block font-semibold text-gray-700 hover:text-blue-600 py-2">Data Kelurahan</a>
        <a href="{{ route('home') }}#galeri" class="block font-semibold text-gray-700 hover:text-blue-600 py-2">Galeri</a>
        <a href="{{ route('home') }}#kontak" class="block font-semibold text-gray-700 hover:text-blue-600 py-2">Kontak</a>
    </div>
</header>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const btn = document.getElementById('hamburgerBtn');
        const menu = document.getElementById('mobileMenu');
        const icon = document.getElementById('hamburgerIcon');

        if (btn && menu) {
            btn.addEventListener('click', function () {
                menu.classList.toggle('hidden');
                if (menu.classList.contains('hidden')) {
                    icon.className = 'fa-solid fa-bars text-2xl';
                } else {
                    icon.className = 'fa-solid fa-xmark text-2xl';
                }
            });
        }
    });
</script>