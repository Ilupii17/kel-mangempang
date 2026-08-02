document.addEventListener('DOMContentLoaded', () => {
    // 1. Navbar Scroll Effect
    const navbar = document.getElementById('navbar');
    window.addEventListener('scroll', () => {
        if (window.scrollY > 10) {
            navbar.classList.add('shadow-soft', 'border-gray-200');
            navbar.classList.remove('border-transparent');
        } else {
            navbar.classList.remove('shadow-soft', 'border-gray-200');
            navbar.classList.add('border-transparent');
        }
    });

    // 2. Mobile Menu (Hamburger)
    // Silakan tambahkan logika toggle class 'hidden' ke #navMenu di sini

    // 3. Scroll Reveal Animation
    const revealEls = document.querySelectorAll('.reveal');
    const revealObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('is-visible');
                revealObserver.unobserve(entry.target);
            }
        });
    }, { threshold: 0.15 });
    
    revealEls.forEach(el => revealObserver.observe(el));
});