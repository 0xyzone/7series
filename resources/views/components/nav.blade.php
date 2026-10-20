@props(['transparent' => false])

<nav class="fixed top-0 w-full z-[100] border-b border-zinc-200/90 transition-all duration-300"
    :class="scrollY > 50 ? 'bg-white/95 backdrop-blur-xl py-3.5 shadow-sm' : ({{ $transparent ? 'true' : 'false' }} ? 'bg-white/80 backdrop-blur-md py-5' : 'bg-white/95 backdrop-blur-xl py-3.5 shadow-sm')"
    x-data="{ scrollY: 0, mobileMenuOpen: false }" @scroll.window="scrollY = window.scrollY">
    <div class="max-w-7xl mx-auto px-6 flex items-center justify-between">
        <a href="/" class="group flex items-center gap-3 py-1">
            <!-- Official Brand Logo (Black Text with Red Symbol) -->
            <img src="{{ asset('images/brand/logo-light.png') }}" alt="Seven Series Authentic Denim" class="h-10 sm:h-12 w-auto block transition-transform duration-300 group-hover:scale-105">
        </a>

        <!-- Desktop Navigation: Seven Series Brand -->
        <div class="hidden lg:flex gap-8 items-center font-black text-xs tracking-widest uppercase text-zinc-900">
            <a href="/#stores" class="hover:text-red-600 transition-colors flex items-center gap-2 text-red-600">
                <span class="w-2 h-2 rounded-full bg-red-600 animate-pulse"></span>
                <span>Official Stores</span>
            </a>
            <a href="/#specimen-lab" class="hover:text-red-600 transition-colors">Weave Lab</a>
            <a href="/#anatomy" class="hover:text-red-600 transition-colors">Jeans Anatomy</a>
            <a href="/#exhibition" class="hover:text-red-600 transition-colors">Cuts Archive</a>
            <a href="/#facility" class="hover:text-red-600 transition-colors">Factory</a>
            <a href="/b2b" class="text-zinc-950 font-extrabold hover:text-red-600 transition-all">Wholesale &rarr;</a>
        </div>

        <div class="flex items-center gap-4">
            <!-- Dedicated B2B Page Button -->
            <a href="/b2b"
                class="hidden sm:inline-flex items-center gap-2 px-5 py-2.5 bg-zinc-950 hover:bg-red-600 text-white text-xs font-black tracking-widest uppercase rounded-xl shadow-md transition-all hover:scale-105 active:scale-95 border border-zinc-900">
                <span>B2B & WHOLESALE</span>
                <span class="w-1.5 h-1.5 rounded-full bg-red-500"></span>
            </a>

            <!-- Mobile Hamburger Button -->
            <button @click="mobileMenuOpen = !mobileMenuOpen" aria-label="Open mobile menu" class="lg:hidden p-2.5 text-zinc-900 hover:text-red-600 transition-colors">
                <svg x-show="!mobileMenuOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7">
                    </path>
                </svg>
                <svg x-show="mobileMenuOpen" x-cloak class="w-6 h-6" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                    </path>
                </svg>
            </button>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div x-show="mobileMenuOpen" x-cloak x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 -translate-y-4" x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 -translate-y-4"
        class="lg:hidden absolute top-full left-0 w-full bg-white/98 backdrop-blur-2xl border-b border-zinc-200 py-6 px-6 space-y-4 shadow-2xl">
        <div class="flex items-center justify-between pb-3 border-b border-zinc-200">
            <img src="{{ asset('images/brand/logo-light.png') }}" alt="Seven Series" class="h-8 w-auto block">
            <span class="text-[10px] font-black tracking-widest text-red-600 uppercase border border-red-600/30 px-2 py-0.5 rounded">AUTHENTIC DENIM</span>
        </div>
        <a href="/#stores" @click="mobileMenuOpen = false"
            class="block text-base font-black tracking-tight text-red-600 hover:text-red-700 transition-colors">OFFICIAL RETAIL STORES</a>
        <a href="/#specimen-lab" @click="mobileMenuOpen = false"
            class="block text-base font-black tracking-tight text-zinc-900 hover:text-red-600 transition-colors">WEAVE LABORATORY</a>
        <a href="/#anatomy" @click="mobileMenuOpen = false"
            class="block text-base font-black tracking-tight text-zinc-900 hover:text-red-600 transition-colors">JEANS ANATOMY</a>
        <a href="/#exhibition" @click="mobileMenuOpen = false"
            class="block text-base font-black tracking-tight text-zinc-900 hover:text-red-600 transition-colors">CUTS ARCHIVE</a>
        <a href="/#facility" @click="mobileMenuOpen = false"
            class="block text-base font-black tracking-tight text-zinc-900 hover:text-red-600 transition-colors">FACTORY INFRASTRUCTURE</a>
        <div class="pt-4 border-t border-zinc-200">
            <a href="/b2b" @click="mobileMenuOpen = false"
                class="flex items-center justify-center w-full py-3.5 bg-red-600 hover:bg-red-700 text-white font-black rounded-xl uppercase tracking-widest text-xs shadow-lg shadow-red-600/30">
                Go to Dedicated B2B Portal &rarr;
            </a>
        </div>
    </div>
</nav>