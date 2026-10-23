import './bootstrap';
import './stores-locator';
import { initHero3D } from './hero-3d';
import { initAmbient3D } from './ambient-3d';
import { initMotionExperience } from './motion-experience';
import { initSpaNavigation } from './spa-navigation';

// Initialize Three.js 3D Engine, Ambient 3D Aesthetic Scene, Motion Design, and SPA Navigation when DOM is ready
document.addEventListener('DOMContentLoaded', () => {
    try {
        initHero3D();
    } catch (e) {
        console.warn('Three.js Hero 3D initialization:', e);
    }

    try {
        initAmbient3D();
    } catch (e) {
        console.warn('Ambient 3D scene initialization:', e);
    }

    try {
        initMotionExperience();
    } catch (e) {
        console.warn('Motion design initialization:', e);
    }

    try {
        initSpaNavigation();
    } catch (e) {
        console.warn('SPA navigation initialization:', e);
    }
});

// Smooth anchor scrolling with top bar offset
document.addEventListener('click', (e) => {
    if (e.defaultPrevented) return;
    const anchor = e.target.closest('a[href*="#"]');
    if (!anchor) return;

    const href = anchor.getAttribute('href');
    if (!href || href === '#' || href === '/#') return;

    try {
        const url = new URL(anchor.href, window.location.href);
        if (url.pathname === window.location.pathname && url.hash) {
            const targetId = url.hash.substring(1);
            const target = document.getElementById(targetId);
            if (target) {
                e.preventDefault();
                const header = document.querySelector('header');
                const headerOffset = (header ? header.offsetHeight : 72) + 24;
                const elementPosition = target.getBoundingClientRect().top;
                const offsetPosition = elementPosition + window.pageYOffset - headerOffset;

                window.scrollTo({
                    top: offsetPosition,
                    behavior: 'smooth'
                });

                if (history.pushState) {
                    history.pushState(null, null, url.hash);
                }
            }
        }
    } catch (_) {}
});
