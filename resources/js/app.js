import './bootstrap';
import { initHero3D } from './hero-3d';
import { initMotionExperience } from './motion-experience';

// Initialize Three.js 3D Engine & Motion Design when DOM is ready
document.addEventListener('DOMContentLoaded', () => {
    try {
        initHero3D();
    } catch (e) {
        console.warn('Three.js 3D initialization:', e);
    }

    try {
        initMotionExperience();
    } catch (e) {
        console.warn('Motion design initialization:', e);
    }
});

// Smooth anchor scrolling
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        const href = this.getAttribute('href');
        if (href === '#' || href === '') return;
        
        const target = document.querySelector(href);
        if (target) {
            e.preventDefault();
            target.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }
    });
});
