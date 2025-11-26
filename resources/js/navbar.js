// File: resources/js/navbar.js

document.addEventListener('DOMContentLoaded', () => {
    const nav = document.getElementById('main-nav');

    window.addEventListener('scroll', function() {
        if (window.scrollY > 50) {
            nav.classList.add('bg-brand-navy', 'shadow-lg', 'border-brand-blue/20');
            nav.classList.remove('border-transparent', 'py-4');
            nav.classList.add('py-2');
        } else {
            nav.classList.remove('bg-brand-navy', 'shadow-lg', 'border-brand-blue/20');
            nav.classList.add('border-transparent', 'py-4');
            nav.classList.remove('py-4');
        }
    });
});