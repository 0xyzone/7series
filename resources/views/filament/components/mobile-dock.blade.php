@php
    $currentUrl = request()->url();
    $navItems = [
        [
            'label' => 'Homepage',
            'url' => url('/'),
            'icon' => '<svg width="20" height="20" style="width: 20px; height: 20px;" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>',
            'active' => false,
        ],
        [
            'label' => 'Dashboard',
            'url' => url('/mukhiya'),
            'icon' => '<svg width="20" height="20" style="width: 20px; height: 20px;" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>',
            'active' => request()->is('mukhiya') || request()->is('mukhiya/'),
        ],
        [
            'label' => 'Inquiries',
            'url' => url('/mukhiya/wholesale-inquiries'),
            'icon' => '<svg width="20" height="20" style="width: 20px; height: 20px;" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/></svg>',
            'active' => request()->is('mukhiya/wholesale-inquiries*'),
        ],
        [
            'label' => 'B2B',
            'url' => url('/mukhiya/b2b-offerings'),
            'icon' => '<svg width="20" height="20" style="width: 20px; height: 20px;" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>',
            'active' => request()->is('mukhiya/b2b-offerings*'),
        ],
        [
            'label' => 'Catalog',
            'url' => url('/mukhiya/products'),
            'icon' => '<svg width="20" height="20" style="width: 20px; height: 20px;" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/></svg>',
            'active' => request()->is('mukhiya/products*'),
        ],
        [
            'label' => 'Stores',
            'url' => url('/mukhiya/retail-stores'),
            'icon' => '<svg width="20" height="20" style="width: 20px; height: 20px;" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>',
            'active' => request()->is('mukhiya/retail-stores*'),
        ],
    ];
@endphp

<div class="mobile-dock-wrapper"
     x-data="{}"
     x-show="!$store.sidebar?.isOpen"
     x-transition:enter="transition ease-out duration-200"
     x-transition:enter-start="opacity-0 translate-y-8"
     x-transition:enter-end="opacity-100 translate-y-0"
     x-transition:leave="transition ease-in duration-150"
     x-transition:leave-start="opacity-100 translate-y-0"
     x-transition:leave-end="opacity-0 translate-y-8">
    <div class="mobile-dock-inner">
        <!-- Smooth Sliding Active Highlighter Pill -->
        <div id="filament-dock-active-pill"
             class="mobile-dock-active-pill"
             aria-hidden="true"></div>

        @foreach($navItems as $item)
            <a href="{{ $item['url'] }}"
               @if($item['url'] !== url('/')) wire:navigate @endif
               data-dock-url="{{ $item['url'] }}"
               class="mobile-dock-item {{ $item['active'] ? 'active' : '' }}">
                <div class="mobile-dock-icon">
                    {!! $item['icon'] !!}
                </div>
                <span class="mobile-dock-label">{{ $item['label'] }}</span>
            </a>
        @endforeach
    </div>
</div>

<script>
(function() {
    function getDockPill() {
        return document.getElementById('filament-dock-active-pill');
    }

    function syncFilamentPill(immediate = false) {
        const dock = document.querySelector('.mobile-dock-inner');
        const pill = getDockPill();
        if (!dock || !pill) return;

        const currentPath = window.location.pathname.replace(/\/+$/, '') || '/';
        const items = Array.from(dock.querySelectorAll('.mobile-dock-item'));
        
        // Find matching active item based on current URL path
        let activeItem = null;
        for (const item of items) {
            const itemUrl = item.getAttribute('href') || item.getAttribute('data-dock-url');
            if (!itemUrl) continue;
            try {
                const itemPath = new URL(itemUrl, window.location.origin).pathname.replace(/\/+$/, '') || '/';
                if (itemPath === currentPath) {
                    activeItem = item;
                    break;
                }
                if (itemPath !== '/mukhiya' && itemPath !== '/' && currentPath.startsWith(itemPath)) {
                    activeItem = item;
                }
            } catch (_) {}
        }

        if (!activeItem) {
            activeItem = dock.querySelector('.mobile-dock-item.active');
        }

        if (!activeItem) {
            pill.style.opacity = '0';
            return;
        }

        items.forEach(i => i.classList.toggle('active', i === activeItem));

        const dockRect = dock.getBoundingClientRect();
        const itemRect = activeItem.getBoundingClientRect();
        const x = itemRect.left - dockRect.left;
        const width = itemRect.width;

        if (width <= 0) return;

        if (immediate) {
            pill.style.transition = 'none';
            pill.style.transform = `translate3d(${x}px, 0, 0)`;
            pill.style.width = `${width}px`;
            pill.style.opacity = '1';
            pill.offsetHeight;
            pill.style.transition = '';
        } else {
            pill.style.transform = `translate3d(${x}px, 0, 0)`;
            pill.style.width = `${width}px`;
            pill.style.opacity = '1';
        }
    }

    // Interactive immediate slide on click/tap
    document.addEventListener('click', function(e) {
        const item = e.target.closest('.mobile-dock-item');
        if (!item) return;
        const dock = document.querySelector('.mobile-dock-inner');
        if (!dock || !dock.contains(item)) return;

        dock.querySelectorAll('.mobile-dock-item').forEach(i => i.classList.remove('active'));
        item.classList.add('active');
        syncFilamentPill(false);
    });

    // Global Modal & Slide-Over Detection
    function checkOpenModals() {
        const dock = document.querySelector('.mobile-dock-wrapper');
        if (!dock) return;

        const openModal = document.querySelector('.fi-modal.fi-modal-open') ||
                          document.querySelector('.fi-modal-slide-over.fi-modal-open') ||
                          document.querySelector('.fi-modal:not([style*="display: none"]) .fi-modal-window-ctn') ||
                          document.querySelector('.fi-modal-window-ctn:not([style*="display: none"])') ||
                          document.querySelector('.fi-modal[x-show="isOpen"]:not([style*="display: none"])');

        const hasModal = !!openModal;
        document.body.classList.toggle('has-fi-modal-open', hasModal);
        dock.classList.toggle('dock-hidden-by-modal', hasModal);
    }

    // Modal lifecycle listeners
    window.addEventListener('x-modal-opened', () => {
        checkOpenModals();
        setTimeout(checkOpenModals, 30);
        setTimeout(checkOpenModals, 100);
    });

    window.addEventListener('modal-closed', () => {
        setTimeout(checkOpenModals, 50);
        setTimeout(checkOpenModals, 200);
    });

    window.addEventListener('open-modal', () => {
        setTimeout(checkOpenModals, 20);
        setTimeout(checkOpenModals, 80);
    });

    window.addEventListener('close-modal', () => {
        setTimeout(checkOpenModals, 50);
        setTimeout(checkOpenModals, 200);
    });

    // Observer for instantaneous modal DOM insertions and visibility changes
    try {
        const modalObserver = new MutationObserver(() => {
            checkOpenModals();
        });
        modalObserver.observe(document.body, {
            childList: true,
            subtree: true,
            attributes: true,
            attributeFilter: ['class', 'style']
        });
    } catch (_) {}

    window.addEventListener('resize', () => syncFilamentPill(true));
    document.addEventListener('livewire:navigated', () => {
        syncFilamentPill(false);
        checkOpenModals();
    });
    document.addEventListener('DOMContentLoaded', () => {
        setTimeout(() => syncFilamentPill(true), 50);
        checkOpenModals();
    });
    setTimeout(() => syncFilamentPill(true), 80);
    setTimeout(() => syncFilamentPill(false), 280);
})();
</script>
