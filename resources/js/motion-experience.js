import gsap from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

gsap.registerPlugin(ScrollTrigger);

/**
 * Seven Series - Motion Design & Genjutsu Micro-Interactions
 * Powered by GSAP, ScrollTrigger, and Genjutsu tactile physical feedback.
 */
export function initMotionExperience() {
    initHeroKineticText();
    initTelemetryCounters();
    initMagneticButtons();
    initSpecimenLoupe();
    initAnatomyScrubber();
    initScrollReveals();
}

/**
 * 1. Hero Kinetic Typography & Entrance Stagger
 */
function initHeroKineticText() {
    const heroSection = document.querySelector('#hero-section');
    if (!heroSection) return;

    const tl = gsap.timeline({ defaults: { ease: 'power3.out' } });

    tl.from('.hero-badge', {
        y: -20,
        opacity: 0,
        duration: 0.8,
        delay: 0.1
    })
    .from('.hero-title-line', {
        y: 40,
        opacity: 0,
        duration: 1,
        stagger: 0.15,
        ease: 'power4.out'
    }, '-=0.5')
    .from('.hero-narrative', {
        y: 25,
        opacity: 0,
        duration: 0.8
    }, '-=0.6')
    .from('.hero-cta-group', {
        y: 20,
        opacity: 0,
        duration: 0.7
    }, '-=0.5')
    .from('.hero-telemetry-item', {
        y: 30,
        opacity: 0,
        duration: 0.8,
        stagger: 0.1
    }, '-=0.4')
    .from('#hero-3d-container', {
        scale: 0.92,
        opacity: 0,
        duration: 1.2,
        ease: 'power2.out'
    }, '-=1.0');
}

/**
 * 2. High-Precision Numerical Factory Telemetry Counters
 */
function initTelemetryCounters() {
    const statCards = document.querySelectorAll('.stat-counter');
    if (statCards.length === 0) return;

    statCards.forEach((card) => {
        const targetValue = parseFloat(card.getAttribute('data-target') || '0');
        const decimals = parseInt(card.getAttribute('data-decimals') || '0');
        const suffix = card.getAttribute('data-suffix') || '';
        const prefix = card.getAttribute('data-prefix') || '';

        const counterObj = { value: 0 };

        ScrollTrigger.create({
            trigger: card,
            start: 'top 88%',
            once: true,
            onEnter: () => {
                gsap.to(counterObj, {
                    value: targetValue,
                    duration: 1.8,
                    ease: 'power2.out',
                    onUpdate: () => {
                        const formatted = decimals > 0 
                            ? counterObj.value.toFixed(decimals) 
                            : Math.round(counterObj.value).toLocaleString();
                        card.textContent = prefix + formatted + suffix;
                    }
                });
            }
        });
    });
}

/**
 * 3. Genjutsu Magnetic Interactive Buttons
 */
function initMagneticButtons() {
    const magneticBtns = document.querySelectorAll('.btn-magnetic');
    if (magneticBtns.length === 0) return;

    magneticBtns.forEach((btn) => {
        const strength = 28;

        btn.addEventListener('mousemove', (e) => {
            const rect = btn.getBoundingClientRect();
            const relX = e.clientX - rect.left - rect.width / 2;
            const relY = e.clientY - rect.top - rect.height / 2;

            gsap.to(btn, {
                x: relX / (rect.width / strength),
                y: relY / (rect.height / strength),
                duration: 0.3,
                ease: 'power2.out'
            });
        });

        btn.addEventListener('mouseleave', () => {
            gsap.to(btn, {
                x: 0,
                y: 0,
                duration: 0.7,
                ease: 'elastic.out(1.1, 0.35)'
            });
        });
    });
}

/**
 * 4. Genjutsu Interactive Specimen Loupe (Microscopic Fabric Weave)
 */
function initSpecimenLoupe() {
    const loupeContainer = document.getElementById('specimen-loupe-card');
    const loupe = document.getElementById('specimen-loupe-lens');
    const loupeZoom = document.getElementById('specimen-loupe-zoom');
    if (!loupeContainer || !loupe || !loupeZoom) return;

    loupeContainer.addEventListener('mouseenter', () => {
        gsap.to(loupe, { opacity: 1, scale: 1, duration: 0.25, ease: 'power2.out' });
    });

    loupeContainer.addEventListener('mouseleave', () => {
        gsap.to(loupe, { opacity: 0, scale: 0.8, duration: 0.25, ease: 'power2.in' });
    });

    loupeContainer.addEventListener('mousemove', (e) => {
        const rect = loupeContainer.getBoundingClientRect();
        const x = e.clientX - rect.left;
        const y = e.clientY - rect.top;

        // Position the physical magnifying circle lens
        gsap.to(loupe, {
            x: x - loupe.offsetWidth / 2,
            y: y - loupe.offsetHeight / 2,
            duration: 0.1,
            ease: 'none'
        });

        // Translate the high-res zoom canvas inversely
        const percentX = (x / rect.width) * 100;
        const percentY = (y / rect.height) * 100;

        loupeZoom.style.backgroundPosition = `${percentX}% ${percentY}%`;
    });
}

/**
 * 5. Interactive Architectural Denim Anatomy Scrubber
 */
function initAnatomyScrubber() {
    const tabs = document.querySelectorAll('.anatomy-layer-tab');
    const cards = document.querySelectorAll('.anatomy-layer-card');
    if (tabs.length === 0 || cards.length === 0) return;

    tabs.forEach((tab) => {
        tab.addEventListener('click', () => {
            const index = tab.getAttribute('data-index');

            tabs.forEach(t => {
                const isSelected = t.getAttribute('data-index') === index;
                t.classList.toggle('border-red-600', isSelected);
                t.classList.toggle('bg-red-600/10', isSelected);
                t.classList.toggle('dark:bg-red-950/40', isSelected);
                t.classList.toggle('border-zinc-200', !isSelected);
                t.classList.toggle('dark:border-zinc-800', !isSelected);
            });

            cards.forEach(c => {
                const isMatch = c.getAttribute('data-index') === index;
                if (isMatch) {
                    c.classList.remove('hidden');
                    gsap.fromTo(c, 
                        { opacity: 0, y: 15 }, 
                        { opacity: 1, y: 0, duration: 0.45, ease: 'power2.out' }
                    );
                } else {
                    c.classList.add('hidden');
                }
            });
        });
    });
}

/**
 * 6. Smooth ScrollTrigger Section Reveals
 */
function initScrollReveals() {
    const sections = document.querySelectorAll('.scroll-reveal');
    if (sections.length === 0) return;

    sections.forEach((section) => {
        gsap.from(section, {
            scrollTrigger: {
                trigger: section,
                start: 'top 85%',
                toggleActions: 'play none none none'
            },
            y: 35,
            opacity: 0,
            duration: 0.9,
            ease: 'power3.out'
        });
    });
}
