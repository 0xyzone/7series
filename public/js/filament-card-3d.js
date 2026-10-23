/**
 * Seven Series Mukhiya Panel — 3D Perspective Card Tilt & Micro-Motion
 * High-performance 60fps interaction with absolute stability on action buttons
 */
(function() {
    'use strict';

    if (window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
        return;
    }

    const maxRotation = 3.5; // gentle degrees
    const perspective = 1200;

    function initCard(card) {
        if (card.dataset.tilt3dInitialized) return;
        card.dataset.tilt3dInitialized = 'true';

        let rafId = null;
        let targetRotateX = 0;
        let targetRotateY = 0;
        let currentRotateX = 0;
        let currentRotateY = 0;
        let isHovered = false;

        function updateSpring() {
            if (!isHovered) {
                targetRotateX = 0;
                targetRotateY = 0;
            }

            // Smooth spring interpolation
            currentRotateX += (targetRotateX - currentRotateX) * 0.15;
            currentRotateY += (targetRotateY - currentRotateY) * 0.15;

            const isResting = Math.abs(targetRotateX - currentRotateX) < 0.05 && Math.abs(targetRotateY - currentRotateY) < 0.05;

            if (isHovered && !isResting) {
                // Subtle rotation ONLY — NEVER use translateY or translateZ which moves buttons away from the cursor
                card.style.transform = `perspective(${perspective}px) rotateX(${currentRotateX.toFixed(2)}deg) rotateY(${currentRotateY.toFixed(2)}deg)`;
                rafId = requestAnimationFrame(updateSpring);
            } else {
                card.style.transform = '';
                rafId = null;
            }
        }

        card.addEventListener('mouseenter', (e) => {
            if (e.target && e.target.closest && e.target.closest('.fi-ta-actions, button, a, input, select, label, .fi-dropdown, .fi-ta-record-checkbox')) {
                isHovered = false;
                card.style.transform = '';
                return;
            }
            isHovered = true;
            if (!rafId) rafId = requestAnimationFrame(updateSpring);
        }, { passive: true });

        card.addEventListener('mousemove', (e) => {
            // Freeze card transform when hovering action buttons or interactive controls to prevent cursor jitter
            if (e.target && e.target.closest && e.target.closest('.fi-ta-actions, button, a, input, select, label, .fi-dropdown, .fi-ta-record-checkbox')) {
                isHovered = false;
                targetRotateX = 0;
                targetRotateY = 0;
                card.style.transform = '';
                return;
            }

            isHovered = true;
            const rect = card.getBoundingClientRect();
            if (rect.width === 0 || rect.height === 0) return;

            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;

            const centerX = rect.width / 2;
            const centerY = rect.height / 2;

            // Invert Y for standard natural 3D tilt
            targetRotateX = ((centerY - y) / centerY) * maxRotation;
            targetRotateY = ((x - centerX) / centerX) * maxRotation;

            if (!rafId) rafId = requestAnimationFrame(updateSpring);
        }, { passive: true });

        card.addEventListener('mouseleave', () => {
            isHovered = false;
            targetRotateX = 0;
            targetRotateY = 0;
            card.style.transform = '';
        }, { passive: true });

        // Ensure actions area completely silences 3D transforms
        const actionsArea = card.querySelector('.fi-ta-actions');
        if (actionsArea) {
            actionsArea.addEventListener('mouseenter', () => {
                isHovered = false;
                targetRotateX = 0;
                targetRotateY = 0;
                card.style.transform = '';
            }, { passive: true });
        }
    }

    function scanCards() {
        const cards = document.querySelectorAll('.fi-ta-content-grid .fi-ta-record');
        cards.forEach(initCard);
    }

    // Initial run
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', scanCards);
    } else {
        scanCards();
    }

    // Observe Livewire DOM updates & pagination changes
    const observer = new MutationObserver(() => {
        scanCards();
    });

    observer.observe(document.body, {
        childList: true,
        subtree: true,
    });
})();
