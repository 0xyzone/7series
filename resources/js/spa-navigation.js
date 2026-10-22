/**
 * Seven Series - Native Mobile App Style SPA Navigator
 * 
 * Provides:
 * 1. Fluid, hardware-accelerated slide transitions between views (no full-page redirection)
 * 2. Gliding dock indicator pill that slides smoothly along the bottom navigation bar
 * 3. Bidirectional sliding choreography based on tab indices (0: Home, 1: Stores, 2: Brand Kit, 3: Contact, 4: B2B)
 * 4. Full browser history synchronization (pushState / popstate)
 * 5. Instant DOM tree rehydration for Alpine.js, Three.js 3D Engine, and GSAP ScrollTriggers
 */

import { initHero3D } from './hero-3d';
import { initMotionExperience } from './motion-experience';

// Route Index Mapping for Bidirectional Slide Detection
const ROUTE_INDEX_MAP = [
    { pattern: /^\/?$/, index: 0, route: 'home' },
    { pattern: /^\/stores(\/.*)?$/, index: 1, route: 'stores' },
    { pattern: /^\/store-locator(\/.*)?$/, index: 1, route: 'stores' },
    { pattern: /^\/brandkit(\/.*)?$/, index: 2, route: 'brandkit' },
    { pattern: /^\/brand-kit(\/.*)?$/, index: 2, route: 'brandkit' },
    { pattern: /^\/brand-guidelines(\/.*)?$/, index: 2, route: 'brandkit' },
    { pattern: /^\/contact(\/.*)?$/, index: 3, route: 'contact' },
    { pattern: /^\/b2b(\/.*)?$/, index: 4, route: 'b2b' },
    { pattern: /^\/wholesale(\/.*)?$/, index: 4, route: 'b2b' },
    { pattern: /^\/catalog(\/.*)?$/, index: 4, route: 'b2b' },
    { pattern: /^\/shop(\/.*)?$/, index: 4, route: 'b2b' }
];

let currentNavIndex = 0;
let isNavigating = false;
let progressBarEl = null;

export function getRouteIndex(pathname) {
    const cleanPath = pathname.replace(/\/+$/, '') || '/';
    for (const rule of ROUTE_INDEX_MAP) {
        if (rule.pattern.test(cleanPath)) {
            return rule.index;
        }
    }
    return -1;
}

/**
 * Synchronize the sliding highlighter pill in the navigation dock
 */
export function syncNavPill(immediate = false) {
    const dock = document.getElementById('mobile-app-dock');
    const pill = document.getElementById('nav-active-pill');
    if (!dock || !pill) return;

    const activeItem = dock.querySelector(`.nav-dock-item[data-nav-index="${currentNavIndex}"]`) 
                    || dock.querySelector('.nav-dock-item.active')
                    || dock.querySelector('.nav-dock-item');
    if (!activeItem) {
        pill.style.opacity = '0';
        return;
    }

    const dockRect = dock.getBoundingClientRect();
    const itemRect = activeItem.getBoundingClientRect();
    const x = itemRect.left - dockRect.left;
    const width = itemRect.width;

    if (immediate) {
        pill.style.transition = 'none';
        pill.style.transform = `translate3d(${x}px, 0, 0)`;
        pill.style.width = `${width}px`;
        pill.style.opacity = '1';
        pill.offsetHeight; // force reflow
        pill.style.transition = '';
    } else {
        pill.style.transition = 'transform 0.38s cubic-bezier(0.22, 1, 0.36, 1), width 0.38s cubic-bezier(0.22, 1, 0.36, 1), opacity 0.2s ease';
        pill.style.transform = `translate3d(${x}px, 0, 0)`;
        pill.style.width = `${width}px`;
        pill.style.opacity = '1';
    }
}

/**
 * Update active state styles across navigation items
 */
function updateNavItemsState(targetIndex) {
    const dock = document.getElementById('mobile-app-dock');
    if (!dock) return;

    const items = dock.querySelectorAll('.nav-dock-item');
    items.forEach((item) => {
        const itemIdx = parseInt(item.getAttribute('data-nav-index'), 10);
        if (itemIdx === targetIndex) {
            item.classList.add('active');
        } else {
            item.classList.remove('active');
        }
    });
}

/**
 * Subtle top progress bar during network fetch
 */
function getProgressBar() {
    if (!progressBarEl) {
        progressBarEl = document.createElement('div');
        progressBarEl.id = 'app-nav-progress';
        progressBarEl.style.cssText = 'position: fixed; top: 0; left: 0; height: 3px; background: linear-gradient(90deg, #e51e2b, #f43f5e); z-index: 99999; width: 0%; opacity: 0; transition: width 0.3s ease, opacity 0.15s ease; pointer-events: none;';
        document.body.appendChild(progressBarEl);
    }
    return progressBarEl;
}

function startProgress() {
    const bar = getProgressBar();
    bar.style.opacity = '1';
    bar.style.width = '35%';
    setTimeout(() => {
        if (bar.style.opacity === '1') {
            bar.style.width = '75%';
        }
    }, 150);
}

function finishProgress() {
    const bar = getProgressBar();
    bar.style.width = '100%';
    setTimeout(() => {
        bar.style.opacity = '0';
        setTimeout(() => {
            bar.style.width = '0%';
        }, 200);
    }, 120);
}

/**
 * Run page-specific initializers after view insertion
 */
function runPageLifecycle(url) {
    // 1. Re-initialize Alpine.js on the new DOM tree
    const newPageView = document.getElementById('app-page-view');
    if (newPageView && window.Alpine) {
        try {
            window.Alpine.initTree(newPageView);
        } catch (e) {
            console.warn('Alpine tree re-init warning:', e);
        }
    }

    // 2. Three.js Hero 3D Canvas
    try {
        initHero3D();
    } catch (e) {
        console.warn('Three.js re-init:', e);
    }

    // 3. GSAP Motion Design & Kinetic typography
    try {
        initMotionExperience();
    } catch (e) {
        console.warn('Motion experience re-init:', e);
    }
}

/**
 * Main SPA Navigation Execution
 */
export async function navigateSpa(targetUrl, options = {}) {
    const { isPopState = false } = options;

    const urlObj = new URL(targetUrl, window.location.origin);
    const targetPath = urlObj.pathname;
    const targetIndex = getRouteIndex(targetPath);

    // If target is external or an admin panel page, perform standard full redirect
    if (targetIndex === -1 || targetPath.startsWith('/mukhiya')) {
        window.location.href = targetUrl;
        return;
    }

    // If clicking the current tab, smoothly scroll to top
    if (targetIndex === currentNavIndex && targetPath === window.location.pathname && !isPopState) {
        window.scrollTo({ top: 0, behavior: 'smooth' });
        return;
    }

    if (isNavigating) return;
    isNavigating = true;

    const previousIndex = currentNavIndex;
    const direction = targetIndex >= previousIndex ? 'forward' : 'backward';

    // 1. Slide the bottom dock indicator pill IMMEDIATELY for responsive tactile feel
    currentNavIndex = targetIndex;
    updateNavItemsState(targetIndex);
    syncNavPill(false);
    startProgress();

    try {
        // 2. Fetch the target page in the background
        const response = await fetch(targetUrl, {
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'X-App-Spa': 'true'
            }
        });

        if (!response.ok) {
            window.location.href = targetUrl;
            return;
        }

        const html = await response.text();
        const parser = new DOMParser();
        const doc = parser.parseFromString(html, 'text/html');

        const newPageView = doc.getElementById('app-page-view');
        if (!newPageView) {
            window.location.href = targetUrl;
            return;
        }

        // 3. Update Title & Meta
        if (doc.title) {
            document.title = doc.title;
        }

        const viewport = document.getElementById('app-viewport');
        const currentView = document.getElementById('app-page-view');

        if (!viewport || !currentView) {
            window.location.href = targetUrl;
            return;
        }

        // 4. Set up incoming view for slide choreography
        const incomingView = newPageView.cloneNode(true);
        incomingView.id = 'app-incoming-view';
        incomingView.style.position = 'absolute';
        incomingView.style.top = '0';
        incomingView.style.left = '0';
        incomingView.style.width = '100%';
        incomingView.style.minHeight = '100vh';
        incomingView.style.zIndex = '20';
        incomingView.style.willChange = 'transform, opacity';
        incomingView.style.pointerEvents = 'none';

        // Slide start coordinates
        const slideOffset = '100%';
        if (direction === 'forward') {
            incomingView.style.transform = `translate3d(${slideOffset}, 0, 0)`;
            incomingView.style.opacity = '0.9';
        } else {
            incomingView.style.transform = `translate3d(-${slideOffset}, 0, 0)`;
            incomingView.style.opacity = '0.9';
        }

        viewport.style.position = 'relative';
        viewport.style.overflow = 'hidden';
        viewport.appendChild(incomingView);

        // Pre-init Alpine tree on incoming nodes before animation completes
        if (window.Alpine) {
            try {
                window.Alpine.initTree(incomingView);
            } catch (_) {}
        }

        // Force browser layout reflow
        incomingView.offsetHeight;

        const animDuration = 340;
        const animEase = 'cubic-bezier(0.16, 1, 0.3, 1)';

        currentView.style.transition = `transform ${animDuration}ms ${animEase}, opacity ${animDuration}ms ease-out`;
        currentView.style.willChange = 'transform, opacity';

        incomingView.style.transition = `transform ${animDuration}ms ${animEase}, opacity ${animDuration}ms ease-out`;

        requestAnimationFrame(() => {
            if (direction === 'forward') {
                currentView.style.transform = 'translate3d(-25%, 0, 0)';
                currentView.style.opacity = '0';
            } else {
                currentView.style.transform = 'translate3d(25%, 0, 0)';
                currentView.style.opacity = '0';
            }
            incomingView.style.transform = 'translate3d(0, 0, 0)';
            incomingView.style.opacity = '1';
        });

        // 5. Cleanup and finalize after slide finishes
        setTimeout(() => {
            currentView.remove();

            incomingView.id = 'app-page-view';
            incomingView.style.position = '';
            incomingView.style.top = '';
            incomingView.style.left = '';
            incomingView.style.width = '';
            incomingView.style.minHeight = '';
            incomingView.style.zIndex = '';
            incomingView.style.transform = '';
            incomingView.style.opacity = '';
            incomingView.style.transition = '';
            incomingView.style.willChange = '';
            incomingView.style.pointerEvents = '';

            viewport.style.overflow = '';

            // Reset scroll to top
            window.scrollTo(0, 0);

            // Synchronize browser history
            if (!isPopState && window.history.pushState) {
                window.history.pushState({ url: targetUrl, index: targetIndex }, doc.title, targetUrl);
            }

            finishProgress();
            runPageLifecycle(targetUrl);
            isNavigating = false;
        }, animDuration + 20);

    } catch (err) {
        console.error('SPA Navigation Exception:', err);
        finishProgress();
        window.location.href = targetUrl;
        isNavigating = false;
    }
}

/**
 * Initialize SPA Navigation System
 */
export function initSpaNavigation() {
    // Determine initial route index
    currentNavIndex = getRouteIndex(window.location.pathname);
    if (currentNavIndex === -1) currentNavIndex = 0;

    // Initial highlighter synchronization
    requestAnimationFrame(() => {
        updateNavItemsState(currentNavIndex);
        syncNavPill(true);
    });

    window.addEventListener('resize', () => {
        syncNavPill(true);
    });

    // Intercept clicks on links
    document.addEventListener('click', (e) => {
        if (e.defaultPrevented || e.button !== 0 || e.metaKey || e.ctrlKey || e.shiftKey || e.altKey) {
            return;
        }

        const anchor = e.target.closest('a[href]');
        if (!anchor) return;

        // Skip non-navigational links
        if (anchor.target === '_blank' || anchor.hasAttribute('download')) return;
        const href = anchor.getAttribute('href');
        if (!href || href === '#' || href.startsWith('javascript:') || href.startsWith('tel:') || href.startsWith('mailto:')) {
            return;
        }

        try {
            const url = new URL(anchor.href, window.location.origin);
            if (url.origin !== window.location.origin) return;

            // Handle same-page hash scrolling
            if (url.pathname === window.location.pathname && url.hash) {
                return;
            }

            const targetIndex = getRouteIndex(url.pathname);
            if (targetIndex !== -1) {
                e.preventDefault();
                navigateSpa(anchor.href);
            }
        } catch (_) {}
    });

    // Handle browser back and forward button gestures
    window.addEventListener('popstate', (e) => {
        const targetUrl = window.location.href;
        const targetIndex = getRouteIndex(window.location.pathname);
        if (targetIndex !== -1) {
            navigateSpa(targetUrl, { isPopState: true });
        }
    });
}
