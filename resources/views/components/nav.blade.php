@props(['transparent' => false])

<!-- ========================================================================= -->
<!-- BRAND NAVIGATION DOCK (Floating Bottom Bar with Sliding Active Highlighter) -->
<!-- ========================================================================= -->
@php
    $currentPath = trim(request()->path(), '/');
    if ($currentPath === '' || request()->is('/') || request()->routeIs('home')) {
        $activeIndex = 0;
    } elseif (str_starts_with($currentPath, 'stores') || str_starts_with($currentPath, 'store-locator')) {
        $activeIndex = 1;
    } elseif (str_starts_with($currentPath, 'brandkit') || str_starts_with($currentPath, 'brand-kit') || str_starts_with($currentPath, 'brand-guidelines')) {
        $activeIndex = 2;
    } elseif (str_starts_with($currentPath, 'contact')) {
        $activeIndex = 3;
    } elseif (str_starts_with($currentPath, 'b2b') || str_starts_with($currentPath, 'wholesale') || str_starts_with($currentPath, 'catalog') || str_starts_with($currentPath, 'shop')) {
        $activeIndex = 4;
    } else {
        $activeIndex = 0;
    }
@endphp

<aside id="main-nav-dock-container" class="fixed bottom-3 sm:bottom-5 inset-x-0 z-[95] pointer-events-none flex justify-center px-2.5 sm:px-4">
    <nav id="mobile-app-dock" 
         class="relative pointer-events-auto rounded-full p-1.5 sm:p-2 shadow-2xl shadow-black/25 border border-zinc-200/90 flex items-center justify-between w-full max-w-md sm:max-w-lg md:max-w-xl bg-white/95 backdrop-blur-xl">
        
        <!-- Smooth Sliding Active Highlighter Pill (Hardware Accelerated) -->
        <div id="nav-active-pill"
             class="absolute top-1.5 bottom-1.5 sm:top-2 sm:bottom-2 rounded-full bg-red-600 shadow-md shadow-red-600/35 pointer-events-none z-0"
             style="left: 0; width: 0; transform: translate3d(0, 0, 0); opacity: 0; will-change: transform, width;">
        </div>

        <!-- Button 1: Company Logo (Home) -->
        <a href="{{ route('home') }}" 
           data-nav-index="0"
           data-nav-route="home"
           class="nav-dock-item relative z-10 flex-1 flex flex-col items-center justify-center py-1.5 sm:py-2 px-1.5 sm:px-3 rounded-full select-none group {{ $activeIndex === 0 ? 'active' : '' }}"
           title="Seven Series Home">
            <div class="h-5 sm:h-6 flex items-center justify-center">
                <svg class="h-4 sm:h-5 w-auto transition-transform group-hover:scale-110 nav-dock-logo" viewBox="0 0 795 1024">
                    <polygon points="794,1 794,9 794,17 794,25 794,33 794,41 794,49 794,57 794,65 794,73 794,81 794,89 794,97 794,105 794,113 794,121 794,129 794,137 794,145 794,153 794,161 794,169 794,177 794,185 794,193 794,201 794,209 794,217 794,225 794,233 794,241 794,249 794,257 794,265 794,273 794,281 794,289 794,297 794,305 794,313 794,321 794,329 794,337 794,345 794,353 794,361 794,369 794,377 794,385 794,393 794,401 794,409 794,417 794,425 794,433 794,441 794,449 794,457 794,465 794,473 794,481 794,489 794,497 794,505 794,513 794,521 794,529 794,537 794,545 794,553 794,561 794,569 794,577 794,585 794,593 794,601 794,609 794,617 794,625 737,633 697,641 670,649 648,657 630,665 613,673 599,681 585,689 573,697 562,705 551,713 541,721 532,729 523,737 515,745 507,753 500,761 493,769 487,777 480,785 474,793 469,801 463,809 459,817 454,825 449,833 445,841 441,849 437,857 433,865 430,873 427,881 424,889 421,897 418,905 416,913 414,921 412,929 410,937 408,945 407,953 405,961 404,969 403,977 402,985 401,993 401,1001 401,1009 400,1017 400,1023 77,1023 77,1015 77,1007 77,999 78,991 78,983 79,975 79,967 80,959 81,951 81,943 82,935 83,927 84,919 86,911 87,903 88,895 90,887 91,879 93,871 95,863 97,855 99,847 101,839 103,831 105,823 108,815 110,807 113,799 115,791 118,783 121,775 124,767 127,759 130,751 134,743 137,735 141,727 144,719 148,711 152,703 156,695 160,687 165,679 169,671 174,663 178,655 183,647 188,639 193,631 199,623 204,615 210,607 215,599 221,591 228,583 234,575 240,567 247,559 254,551 261,543 268,535 276,527 283,519 292,511 300,503 308,495 317,487 326,479 336,471 346,463 356,455 366,447 377,439 388,431 400,423 413,415 426,407 439,399 454,391 469,383 485,375 502,367 521,359 541,351 563,343 588,335 617,327 652,319 0,311 0,303 0,295 0,287 0,279 0,271 0,263 0,255 0,247 0,239 0,231 0,223 0,215 0,207 0,199 0,191 0,183 0,175 0,167 0,159 0,151 0,143 0,135 0,127 0,119 0,111 0,103 0,95 0,87 0,79 0,71 0,63 0,55 0,47 0,39 0,31 0,23 0,15 0,7 0,1" fill="currentColor" />
                </svg>
            </div>
            <span class="nav-dock-label text-[9px] sm:text-[11px] mt-0.5 tracking-tight font-extrabold uppercase">Home</span>
        </a>

        <!-- Button 2: Store Locator Page -->
        <a href="{{ route('stores') }}" 
           data-nav-index="1"
           data-nav-route="stores"
           class="nav-dock-item relative z-10 flex-1 flex flex-col items-center justify-center py-1.5 sm:py-2 px-1.5 sm:px-3 rounded-full select-none group {{ $activeIndex === 1 ? 'active' : '' }}"
           title="Official Retail Stores">
            <svg class="w-4 h-4 sm:w-5 sm:h-5 transition-transform group-hover:scale-110 nav-dock-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
            </svg>
            <span class="nav-dock-label text-[9px] sm:text-[11px] mt-0.5 tracking-tight font-extrabold uppercase">Stores</span>
        </a>

        <!-- Button 3: Brand Kit Page -->
        <a href="{{ route('brandkit') }}" 
           data-nav-index="2"
           data-nav-route="brandkit"
           class="nav-dock-item relative z-10 flex-1 flex flex-col items-center justify-center py-1.5 sm:py-2 px-1.5 sm:px-3 rounded-full select-none group {{ $activeIndex === 2 ? 'active' : '' }}"
           title="Brand Kit & Guidelines">
            <svg class="w-4 h-4 sm:w-5 sm:h-5 transition-transform group-hover:scale-110 nav-dock-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
            </svg>
            <span class="nav-dock-label text-[9px] sm:text-[11px] mt-0.5 tracking-tight font-extrabold uppercase">Brand Kit</span>
        </a>

        <!-- Button 4: Contact Us & Factory Location Page -->
        <a href="{{ route('contact') }}" 
           data-nav-index="3"
           data-nav-route="contact"
           class="nav-dock-item relative z-10 flex-1 flex flex-col items-center justify-center py-1.5 sm:py-2 px-1.5 sm:px-3 rounded-full select-none group {{ $activeIndex === 3 ? 'active' : '' }}"
           title="Contact Factory & Office">
            <svg class="w-4 h-4 sm:w-5 sm:h-5 transition-transform group-hover:scale-110 nav-dock-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
            </svg>
            <span class="nav-dock-label text-[9px] sm:text-[11px] mt-0.5 tracking-tight font-extrabold uppercase">Contact</span>
        </a>

        <!-- Button 5: B2B Wholesale Portal -->
        <a href="{{ route('b2b') }}" 
           data-nav-index="4"
           data-nav-route="b2b"
           class="nav-dock-item relative z-10 flex-1 flex flex-col items-center justify-center py-1.5 sm:py-2 px-1.5 sm:px-3 rounded-full select-none group {{ $activeIndex === 4 ? 'active' : '' }}"
           title="B2B Wholesale Portal">
            <svg class="w-4 h-4 sm:w-5 sm:h-5 transition-transform group-hover:scale-110 nav-dock-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
            </svg>
            <span class="nav-dock-label text-[9px] sm:text-[11px] mt-0.5 tracking-tight font-extrabold uppercase">B2B</span>
        </a>

    </nav>
</aside>

<script>
    // Immediate alignment on initial render to prevent jump
    (function() {
        function alignPill() {
            var dock = document.getElementById('mobile-app-dock');
            var pill = document.getElementById('nav-active-pill');
            if (!dock || !pill) return;
            var active = dock.querySelector('.nav-dock-item.active');
            if (active) {
                var dRect = dock.getBoundingClientRect();
                var aRect = active.getBoundingClientRect();
                pill.style.transform = 'translate3d(' + (aRect.left - dRect.left) + 'px, 0, 0)';
                pill.style.width = aRect.width + 'px';
                pill.style.opacity = '1';
            }
        }
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', alignPill);
        } else {
            alignPill();
        }
    })();
</script>