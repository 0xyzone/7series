import './bootstrap';

// Smooth scrolling for navigation links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            target.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }
    });
});

// Add animation on scroll for elements
const observerOptions = {
    threshold: 0.1,
    rootMargin: '0px 0px -50px 0px'
};

const observer = new IntersectionObserver(function(entries) {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('animate-fade-in');
            observer.unobserve(entry.target);
        }
    });
}, observerOptions);

// Observe all sections
document.querySelectorAll('section').forEach(section => {
    observer.observe(section);
});

// Button click animations and smooth feedback
document.querySelectorAll('button').forEach(button => {
    button.addEventListener('click', function() {
        // Add ripple effect
        const ripple = document.createElement('span');
        ripple.style.position = 'absolute';
        ripple.style.pointerEvents = 'none';
        ripple.style.width = '20px';
        ripple.style.height = '20px';
        ripple.style.background = 'rgba(255, 255, 255, 0.6)';
        ripple.style.borderRadius = '50%';
        ripple.style.transform = 'scale(0)';
        ripple.style.animation = 'scale-ripple 0.6s ease-out';
        
        const rect = this.getBoundingClientRect();
        const size = Math.max(rect.width, rect.height);
        const x = event.clientX - rect.left - size / 2;
        const y = event.clientY - rect.top - size / 2;
        
        ripple.style.left = x + 'px';
        ripple.style.top = y + 'px';
        ripple.style.width = size + 'px';
        ripple.style.height = size + 'px';
        
        this.appendChild(ripple);
        
        setTimeout(() => ripple.remove(), 600);
    });
});

// Add hover effects to product cards
document.querySelectorAll('.product-card').forEach(card => {
    card.addEventListener('mouseenter', function() {
        this.style.transform = 'translateY(-10px)';
    });
    card.addEventListener('mouseleave', function() {
        this.style.transform = 'translateY(0)';
    });
});

// Parallax effect for hero section
window.addEventListener('scroll', function() {
    const hero = document.querySelector('section:first-of-type');
    if (hero) {
        hero.style.backgroundPosition = '0 ' + (window.scrollY * 0.5) + 'px';
    }
});

// Add keyboard shortcuts
document.addEventListener('keydown', function(e) {
    // Press 's' to scroll to shop
    if (e.key === 's' || e.key === 'S') {
        const shopBtn = document.querySelector('button:nth-of-type(1)');
        if (shopBtn) {
            shopBtn.click();
        }
    }
});

// Initialize tooltips on hover for feature cards
document.querySelectorAll('[data-tooltip]').forEach(elem => {
    elem.addEventListener('mouseenter', function() {
        const tooltip = this.getAttribute('data-tooltip');
        console.log('Tooltip:', tooltip);
    });
});

// Dynamically add purchase tracking
window.addEventListener('load', function() {
    console.log('7 Series Denim store loaded successfully');
    console.log('Ready to serve fashion-forward customers!');
});
