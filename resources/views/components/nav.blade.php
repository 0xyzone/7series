@props(['transparent' => false])

<!-- ========================================================================= -->
<!-- BRAND NAVIGATION: CLEAN TOP BRAND BAR + FLOATING MOBILE-APP BOTTOM DOCK -->
<!-- ========================================================================= -->
<div x-data="{
    scrollY: 0,
    activeSection: 'hero',
    init() {
        const sections = ['factory', 'fabric', 'cuts', 'stores', 'hero'];

        const updateActive = () => {
            this.scrollY = window.pageYOffset;

            // If at the very top of the page
            if (window.pageYOffset < 120) {
                this.activeSection = 'hero';
                return;
            }

            // If near bottom of the page, activate the last section (factory)
            if ((window.innerHeight + window.pageYOffset) >= (document.documentElement.scrollHeight - 80)) {
                this.activeSection = 'factory';
                return;
            }

            // Calculation considering fixed header height (approx 72px) + breathing margin
            const header = document.querySelector('header');
            const offset = (header ? header.offsetHeight : 72) + 60;
            const scrollPos = window.pageYOffset + offset;

            for (const id of sections) {
                const el = document.getElementById(id);
                if (el) {
                    const top = el.getBoundingClientRect().top + window.pageYOffset;
                    if (scrollPos >= top) {
                        this.activeSection = id;
                        return;
                    }
                }
            }
        };

        window.addEventListener('scroll', updateActive, { passive: true });
        window.addEventListener('resize', updateActive, { passive: true });

        // Run immediately and after layout settles
        this.$nextTick(() => updateActive());
        setTimeout(() => updateActive(), 350);

        // Sync on direct hash change
        window.addEventListener('hashchange', () => {
            const hash = window.location.hash.replace('#', '');
            if (hash && sections.includes(hash)) {
                this.activeSection = hash;
            }
        });
    },
    scrollTo(id) {
        this.activeSection = id;
        const target = document.getElementById(id);
        if (target) {
            const header = document.querySelector('header');
            const headerOffset = (header ? header.offsetHeight : 72) + 24;
            const elementPosition = target.getBoundingClientRect().top;
            const offsetPosition = elementPosition + window.pageYOffset - headerOffset;

            window.scrollTo({
                top: offsetPosition,
                behavior: 'smooth'
            });

            if (history.pushState) {
                history.pushState(null, null, '#' + id);
            }
        } else {
            window.location.href = '/#' + id;
        }
    }
}">

    <!-- ========================================================================= -->
    <!-- TOP BRAND BAR (Minimal, No Repeated Navigation Options) -->
    <!-- ========================================================================= -->
    <header class="fixed top-0 inset-x-0 z-[90] border-b border-zinc-200/80 transition-all duration-300"
            :class="scrollY > 20 ? 'shadow-sm py-2.5 sm:py-3 bg-white/95 backdrop-blur-xl' : 'py-3 sm:py-4 bg-white/90 backdrop-blur-xl'">
        <div class="w-full px-4 sm:px-6 lg:px-10 xl:px-12 flex items-center justify-between">
            
            <!-- Left: Brand Logo -->
            <a href="/" class="flex items-center gap-3 group shrink-0">
                <img src="{{ asset('images/brand/logo-light.png') }}" alt="Seven Series Denim" class="h-8 sm:h-9 w-auto object-contain transition-transform group-hover:scale-105">
            </a>

            <!-- Right: Quick Direct Actions -->
            <div class="flex items-center gap-2 sm:gap-4 shrink-0">
                <a href="/#stores" @click.prevent="scrollTo('stores')" class="inline-flex items-center gap-1.5 text-xs font-bold text-zinc-700 hover:text-red-600 transition-colors py-2 px-3 rounded-full hover:bg-zinc-100">
                    <svg class="w-4 h-4 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    <span class="hidden sm:inline">Store Locator</span>
                    <span class="sm:hidden">Stores</span>
                </a>

                <a href="/b2b" class="inline-flex items-center gap-1.5 px-4 sm:px-5 py-2 sm:py-2.5 rounded-full text-xs font-black uppercase tracking-wider text-white bg-red-600 hover:bg-red-700 shadow-md shadow-red-600/25 transition-all hover:scale-105 active:scale-95">
                    <span>Wholesale B2B</span>
                    <span class="text-xs">&rarr;</span>
                </a>
            </div>

        </div>
    </header>

    <!-- ========================================================================= -->
    <!-- FLOATING MOBILE-APP STYLE BOTTOM DOCK (Primary Navigation for All Devices) -->
    <!-- ========================================================================= -->
    <aside class="fixed bottom-3 sm:bottom-4 inset-x-0 z-[95] pointer-events-none flex justify-center px-2 sm:px-4">
        <nav class="pointer-events-auto rounded-full p-1.5 sm:p-2 shadow-2xl shadow-black/20 border border-zinc-200/90 flex items-center justify-between w-full max-w-sm sm:max-w-md md:max-w-xl lg:max-w-2xl bg-white/95 backdrop-blur-xl">
            
            <!-- Tab 1: Home -->
            <a href="/#hero" 
               @click.prevent="scrollTo('hero')"
               :class="activeSection === 'hero' ? 'bg-red-50 text-red-600 font-black scale-105 shadow-xs' : 'text-zinc-600 hover:text-zinc-950 font-bold hover:bg-zinc-50'"
               class="flex-1 flex flex-col items-center justify-center py-1.5 sm:py-2 px-1 sm:px-2 rounded-full transition-all duration-200 group">
                <svg class="w-4 h-4 sm:w-5 sm:h-5 transition-transform group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                <span class="text-[9px] sm:text-[11px] mt-0.5 tracking-tight">Home</span>
            </a>

            <!-- Tab 2: Retail Stores -->
            <a href="/#stores" 
               @click.prevent="scrollTo('stores')"
               :class="activeSection === 'stores' ? 'bg-red-50 text-red-600 font-black scale-105 shadow-xs' : 'text-zinc-600 hover:text-zinc-950 font-bold hover:bg-zinc-50'"
               class="flex-1 flex flex-col items-center justify-center py-1.5 sm:py-2 px-1 sm:px-2 rounded-full transition-all duration-200 group relative">
                <span x-show="activeSection === 'stores'" class="absolute top-1.5 right-2 w-1.5 h-1.5 rounded-full bg-red-600 animate-ping"></span>
                <svg class="w-4 h-4 sm:w-5 sm:h-5 transition-transform group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                <span class="text-[9px] sm:text-[11px] mt-0.5 tracking-tight">Stores</span>
            </a>

            <!-- Tab 3: Cuts & Fits -->
            <a href="/#cuts" 
               @click.prevent="scrollTo('cuts')"
               :class="activeSection === 'cuts' ? 'bg-red-50 text-red-600 font-black scale-105 shadow-xs' : 'text-zinc-600 hover:text-zinc-950 font-bold hover:bg-zinc-50'"
               class="flex-1 flex flex-col items-center justify-center py-1.5 sm:py-2 px-1 sm:px-2 rounded-full transition-all duration-200 group">
                <svg class="w-4 h-4 sm:w-5 sm:h-5 transition-transform group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
                <span class="text-[9px] sm:text-[11px] mt-0.5 tracking-tight">Fits</span>
            </a>

            <!-- Tab 4: Fabric Specs -->
            <a href="/#fabric" 
               @click.prevent="scrollTo('fabric')"
               :class="activeSection === 'fabric' ? 'bg-red-50 text-red-600 font-black scale-105 shadow-xs' : 'text-zinc-600 hover:text-zinc-950 font-bold hover:bg-zinc-50'"
               class="flex-1 flex flex-col items-center justify-center py-1.5 sm:py-2 px-1 sm:px-2 rounded-full transition-all duration-200 group">
                <svg class="w-4 h-4 sm:w-5 sm:h-5 transition-transform group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/></svg>
                <span class="text-[9px] sm:text-[11px] mt-0.5 tracking-tight">Fabric</span>
            </a>

            <!-- Tab 5: Factory Plant -->
            <a href="/#factory" 
               @click.prevent="scrollTo('factory')"
               :class="activeSection === 'factory' ? 'bg-red-50 text-red-600 font-black scale-105 shadow-xs' : 'text-zinc-600 hover:text-zinc-950 font-bold hover:bg-zinc-50'"
               class="flex-1 flex flex-col items-center justify-center py-1.5 sm:py-2 px-1 sm:px-2 rounded-full transition-all duration-200 group">
                <svg class="w-4 h-4 sm:w-5 sm:h-5 transition-transform group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                <span class="text-[9px] sm:text-[11px] mt-0.5 tracking-tight">Factory</span>
            </a>

            <!-- Tab 6: B2B Wholesale -->
            <a href="/b2b" 
               class="{{ request()->is('b2b*') ? 'bg-red-50 text-red-600 font-black scale-105 shadow-xs' : 'text-zinc-600 hover:text-zinc-950 font-bold hover:bg-zinc-50' }} flex-1 flex flex-col items-center justify-center py-1.5 sm:py-2 px-1 sm:px-2 rounded-full transition-all duration-200 group">
                <svg class="w-4 h-4 sm:w-5 sm:h-5 transition-transform group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                <span class="text-[9px] sm:text-[11px] mt-0.5 tracking-tight">B2B</span>
            </a>

        </nav>
    </aside>

</div>