// Mobile Menu Variables
const mobileMenuOpenBtn = document.querySelectorAll('[data-mobile-menu-open-btn]');
const mobileMenu = document.querySelector('[data-mobile-menu]');
const mobileMenuCloseBtn = document.querySelector('[data-mobile-menu-close-btn]');
const overlay = document.querySelector('[data-overlay]');

// Open Mobile Menu
mobileMenuOpenBtn.forEach(btn => {
    btn.addEventListener('click', () => {
        mobileMenu.classList.add('active');
        overlay.classList.add('active');
    });
});

// Close Mobile Menu
mobileMenuCloseBtn.addEventListener('click', () => {
    mobileMenu.classList.remove('active');
    overlay.classList.remove('active');
});

// Close Mobile Menu when clicking outside (on overlay)
overlay.addEventListener('click', () => {
    mobileMenu.classList.remove('active');
    overlay.classList.remove('active');
});

// Accordion Functionality
const accordionBtns = document.querySelectorAll('[data-accordion-btn]');

accordionBtns.forEach(btn => {
    btn.addEventListener('click', () => {
        const accordionContent = btn.nextElementSibling;
        accordionContent.classList.toggle('active');
        btn.classList.toggle('active');
    });
});



