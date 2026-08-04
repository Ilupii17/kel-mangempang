<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? ($settings['nama_kelurahan'] ?? 'Kelurahan Mangempang') . ' — ' . ($settings['kabupaten'] ?? 'Kabupaten Barru') }}</title>
    <meta name="description" content="Website resmi {{ $settings['nama_kelurahan'] ?? 'Kelurahan Mangempang' }}, {{ $settings['kecamatan'] ?? 'Kecamatan Barru' }}, {{ $settings['kabupaten'] ?? 'Kabupaten Barru' }}. Information profil, berita, data, dan pelayanan kelurahan.">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Google Fonts & FontAwesome -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Vite Assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-body text-gray-700 bg-white antialiased overflow-x-hidden w-full flex flex-col min-h-screen">

    <x-navbar :settings="$settings" />

    <main class="flex-grow">
        {{ $slot }}
    </main>

    <x-footer :settings="$settings" />

    <!-- Shared Frontend JavaScript -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Scroll Reveal Animation
            const revealEls = document.querySelectorAll('.reveal');
            const revealObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('is-visible');
                        revealObserver.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.1 });
            revealEls.forEach(el => revealObserver.observe(el));

            // Scrollspy for navigation
            const spySections = document.querySelectorAll('section[id]');
            const navLinks = document.querySelectorAll('.nav-link');
            
            function setActiveNav(sectionId) {
                navLinks.forEach(a => {
                    const href = a.getAttribute('href');
                    if (href && href.includes('#' + sectionId)) {
                        a.classList.add('text-blue-600', 'bg-blue-50');
                        a.classList.remove('text-gray-700');
                    } else if (href && href.includes('#')) {
                        a.classList.remove('text-blue-600', 'bg-blue-50');
                        a.classList.add('text-gray-700');
                    }
                });
            }

            const spyObserver = new IntersectionObserver((entries) => {
                const visible = entries.filter(e => e.isIntersecting);
                if (visible.length === 0) return;
                visible.sort((a, b) => a.boundingClientRect.top - b.boundingClientRect.top);
                setActiveNav(visible[0].target.id);
            }, { rootMargin: '-90px 0px -50% 0px', threshold: 0 });

            spySections.forEach(sec => spyObserver.observe(sec));
        });
    </script>
    @stack('scripts')
</body>
</html>
