@props(['transparent' => false])

<!-- ========================================================================= -->
<!-- MODERN MOBILE-APP FLOATING TOPBAR (Desktop & Mobile) -->
<!-- ========================================================================= -->
<header class="fixed top-0 inset-x-0 z-[90] px-4 sm:px-6 pt-3 sm:pt-4 pointer-events-none"
        x-data="{ scrollY: 0, mobileMenuOpen: false }" 
        @scroll.window="scrollY = window.scrollY">
    <div class="max-w-5xl mx-auto pointer-events-auto">
        <div class="app-glass rounded-full px-4 sm:px-6 py-2.5 sm:py-3 shadow-lg shadow-black/5 border border-zinc-200/90 flex items-center justify-between transition-all duration-300"
             :class="scrollY > 40 ? 'bg-white/95 shadow-xl scale-[0.99]' : 'bg-white/90'">
            
            <!-- Left: Brand Logo -->
            <a href="/" class="flex items-center gap-2.5 group">
                <img src="{{ asset('images/brand/logo-light.png') }}" alt="Seven Series Denim" class="h-8 sm:h-9 w-auto object-contain transition-transform group-hover:scale-105">
                <span class="hidden md:inline-flex items-center px-2 py-0.5 rounded-full bg-red-50 text-red-600 text-[10px] font-black tracking-wider uppercase border border-red-200/70">
                    AUTHENTIC DENIM
                </span>
            </a>

            <!-- Center: App Segmented Pill Tabs (Desktop) -->
            <nav class="hidden md:flex items-center gap-1 p-1 bg-zinc-100 rounded-full text-xs font-bold text-zinc-700">
                <a href="/#hero" class="px-4 py-1.5 rounded-full hover:bg-white hover:text-red-600 transition-all">
                    Home
                </a>
                <a href="/#stores" class="px-4 py-1.5 rounded-full hover:bg-white text-red-600 hover:text-red-700 transition-all flex items-center gap-1.5">
                    <span class="w-1.5 h-1.5 rounded-full bg-red-600 animate-pulse"></span>
                    <span>Retail Stores</span>
                </a>
                <a href="/#cuts" class="px-4 py-1.5 rounded-full hover:bg-white hover:text-red-600 transition-all">
                    Jeans Cuts
                </a>
                <a href="/#fabric" class="px-4 py-1.5 rounded-full hover:bg-white hover:text-red-600 transition-all">
                    Fabric Lab
                </a>
                <a href="/#factory" class="px-4 py-1.5 rounded-full hover:bg-white hover:text-red-600 transition-all">
                    Factory
                </a>
            </nav>

            <!-- Right Actions -->
            <div class="flex items-center gap-2 sm:gap-3">
                <a href="/#stores" class="hidden sm:inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-full text-xs font-bold text-zinc-800 bg-zinc-100 hover:bg-zinc-200 transition-colors">
                    <svg class="w-3.5 h-3.5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    <span>Store Locator</span>
                </a>

                <a href="/b2b" class="inline-flex items-center gap-1.5 px-4 sm:px-5 py-2 rounded-full text-xs font-black uppercase tracking-wider text-white bg-red-600 hover:bg-red-700 shadow-md shadow-red-600/30 transition-all hover:scale-105 active:scale-95">
                    <span>Wholesale</span>
                    <span class="text-[10px]">&rarr;</span>
                </a>

                <!-- Mobile Menu Button -->
                <button @click="mobileMenuOpen = !mobileMenuOpen" aria-label="Toggle menu" class="md:hidden p-2 text-zinc-800 hover:text-red-600">
                    <svg x-show="!mobileMenuOpen" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                    <svg x-show="mobileMenuOpen" x-cloak class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>
        </div>

        <!-- Mobile Quick Dropdown Card -->
        <div x-show="mobileMenuOpen" x-cloak 
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 -translate-y-2 scale-95"
             x-transition:enter-end="opacity-100 translate-y-0 scale-100"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100 translate-y-0 scale-100"
             x-transition:leave-end="opacity-0 -translate-y-2 scale-95"
             class="md:hidden mt-3 p-4 rounded-3xl bg-white shadow-2xl border border-zinc-200 space-y-2">
            <a href="/#hero" @click="mobileMenuOpen = false" class="block px-4 py-2.5 rounded-2xl text-sm font-bold text-zinc-900 hover:bg-red-50 hover:text-red-600">Home Overview</a>
            <a href="/#stores" @click="mobileMenuOpen = false" class="block px-4 py-2.5 rounded-2xl text-sm font-bold text-red-600 hover:bg-red-50">Where to Buy (Retail Stores)</a>
            <a href="/#cuts" @click="mobileMenuOpen = false" class="block px-4 py-2.5 rounded-2xl text-sm font-bold text-zinc-900 hover:bg-red-50 hover:text-red-600">Jeans Cut Archive</a>
            <a href="/#fabric" @click="mobileMenuOpen = false" class="block px-4 py-2.5 rounded-2xl text-sm font-bold text-zinc-900 hover:bg-red-50 hover:text-red-600">Fabric & Weave Lab</a>
            <a href="/#factory" @click="mobileMenuOpen = false" class="block px-4 py-2.5 rounded-2xl text-sm font-bold text-zinc-900 hover:bg-red-50 hover:text-red-600">Factory Infrastructure</a>
            <div class="pt-2 border-t border-zinc-100">
                <a href="/b2b" @click="mobileMenuOpen = false" class="block w-full text-center py-3 bg-red-600 text-white rounded-2xl text-xs font-black uppercase tracking-wider">
                    Wholesale B2B Portal &rarr;
                </a>
            </div>
        </div>
    </div>
</header>

<!-- ========================================================================= -->
<!-- MODERN MOBILE-APP FLOATING BOTTOM DOCK -->
<!-- ========================================================================= -->
<aside class="fixed bottom-4 sm:bottom-6 inset-x-0 z-[95] pointer-events-none flex justify-center px-4">
    <nav class="pointer-events-auto app-glass rounded-full px-3 py-2 shadow-2xl shadow-black/15 border border-zinc-200/90 flex items-center gap-1 sm:gap-2 max-w-md w-full justify-around bg-white/95">
        
        <!-- Tab 1: Home -->
        <a href="/#hero" class="flex flex-col items-center justify-center py-1 px-3 rounded-full hover:bg-zinc-100 text-zinc-700 hover:text-red-600 transition-all group">
            <svg class="w-5 h-5 transition-transform group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
            <span class="text-[9px] font-bold mt-0.5 tracking-tight">Home</span>
        </a>

        <!-- Tab 2: Retail Stores -->
        <a href="/#stores" class="flex flex-col items-center justify-center py-1 px-3 rounded-full hover:bg-red-50 text-red-600 transition-all group">
            <svg class="w-5 h-5 transition-transform group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
            <span class="text-[9px] font-black mt-0.5 tracking-tight">Stores</span>
        </a>

        <!-- Tab 3: Cuts -->
        <a href="/#cuts" class="flex flex-col items-center justify-center py-1 px-3 rounded-full hover:bg-zinc-100 text-zinc-700 hover:text-red-600 transition-all group">
            <svg class="w-5 h-5 transition-transform group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
            <span class="text-[9px] font-bold mt-0.5 tracking-tight">Cuts</span>
        </a>

        <!-- Tab 4: Fabric Specs -->
        <a href="/#fabric" class="flex flex-col items-center justify-center py-1 px-3 rounded-full hover:bg-zinc-100 text-zinc-700 hover:text-red-600 transition-all group">
            <svg class="w-5 h-5 transition-transform group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/></svg>
            <span class="text-[9px] font-bold mt-0.5 tracking-tight">Fabric</span>
        </a>

        <!-- Tab 5: B2B Wholesale -->
        <a href="/b2b" class="flex flex-col items-center justify-center py-1 px-3 rounded-full hover:bg-zinc-100 text-zinc-700 hover:text-red-600 transition-all group">
            <svg class="w-5 h-5 transition-transform group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
            <span class="text-[9px] font-bold mt-0.5 tracking-tight">B2B</span>
        </a>

    </nav>
</aside>