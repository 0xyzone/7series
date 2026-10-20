@props(['transparent' => false])

<nav class="fixed top-0 w-full z-[100] border-b border-zinc-200 dark:border-zinc-800 transition-all duration-300"
    :class="scrollY > 50 ? 'bg-white/80 dark:bg-black/80 backdrop-blur-xl py-3' : ({{ $transparent ? 'true' : 'false' }} ? 'bg-transparent py-6' : 'bg-white/80 dark:bg-black/80 backdrop-blur-xl py-3')"
    x-data="{ scrollY: 0, mobileMenuOpen: false }" @scroll.window="scrollY = window.scrollY">
    <div class="max-w-7xl mx-auto px-6 flex items-center justify-between">
        <a href="/" class="group flex items-center gap-3 py-1">
            <!-- Light Mode Logo (Black Text) -->
            <img src="{{ asset('images/brand/logo-light.png') }}" alt="Seven Series Authentic Denim" class="h-10 sm:h-12 w-auto block dark:hidden transition-transform duration-300 group-hover:scale-105">
            <!-- Dark Mode Logo (White Text) -->
            <img src="{{ asset('images/brand/logo-dark.png') }}" alt="Seven Series Authentic Denim" class="h-10 sm:h-12 w-auto hidden dark:block transition-transform duration-300 group-hover:scale-105">
        </a>

        <!-- Desktop Navigation: Industrial Telemetry -->
        <div class="hidden lg:flex gap-7 items-center font-black text-xs tracking-widest uppercase text-zinc-900 dark:text-zinc-200">
            <a href="/#hero-section" class="hover:text-red-600 transition-colors">3D CAD Specimen</a>
            <a href="/#specimen-lab" class="hover:text-red-600 transition-colors">Weave Lab</a>
            <a href="/#anatomy" class="hover:text-red-600 transition-colors">Anatomy Blueprint</a>
            <a href="/#exhibition" class="hover:text-red-600 transition-colors">Factory Specimens</a>
            <a href="/#facility" class="hover:text-red-600 transition-colors">Infrastructure</a>
            <a href="/b2b" class="text-red-600 font-extrabold hover:underline transition-all">Wholesale B2B &rarr;</a>
        </div>

        <div class="flex items-center gap-4">
            <!-- Theme Toggle -->
            <button @click="toggleTheme()"
                aria-label="Toggle visual theme"
                class="p-2.5 rounded-full bg-zinc-100 dark:bg-zinc-800 hover:bg-red-50 dark:hover:bg-red-950/40 transition-all text-zinc-800 dark:text-zinc-200 hover:text-red-600 border border-zinc-200 dark:border-zinc-700">
                <svg x-show="!darkMode" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z">
                    </path>
                </svg>
                <svg x-show="darkMode" x-cloak class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z">
                    </path>
                </svg>
            </button>

            <!-- Dedicated B2B Page Button -->
            <a href="/b2b"
                class="hidden sm:inline-flex items-center gap-2 px-5 py-2.5 bg-zinc-950 hover:bg-red-600 text-white text-xs font-black tracking-widest uppercase rounded-full shadow-md transition-all hover:scale-105 active:scale-95 border border-zinc-800">
                <span>B2B & WHOLESALE</span>
                <span class="w-1.5 h-1.5 rounded-full bg-red-500"></span>
            </a>

            <!-- Mobile Hamburger Button -->
            <button @click="mobileMenuOpen = !mobileMenuOpen" aria-label="Open mobile menu" class="lg:hidden p-2.5 text-zinc-900 dark:text-zinc-100">
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
        class="lg:hidden absolute top-full left-0 w-full bg-white/95 dark:bg-zinc-950/95 backdrop-blur-2xl border-b border-zinc-200 dark:border-zinc-800 py-6 px-6 space-y-4 shadow-2xl">
        <div class="flex items-center justify-between pb-3 border-b border-zinc-200 dark:border-zinc-800">
            <img src="{{ asset('images/brand/logo-light.png') }}" alt="Seven Series" class="h-8 w-auto block dark:hidden">
            <img src="{{ asset('images/brand/logo-dark.png') }}" alt="Seven Series" class="h-8 w-auto hidden dark:block">
            <span class="text-[10px] font-black tracking-widest text-red-600 uppercase border border-red-600/30 px-2 py-0.5 rounded">AUTHENTIC DENIM</span>
        </div>
        <a href="/#hero-section" @click="mobileMenuOpen = false"
            class="block text-base font-black tracking-tight hover:text-red-600 transition-colors">3D CAD SPECIMEN</a>
        <a href="/#specimen-lab" @click="mobileMenuOpen = false"
            class="block text-base font-black tracking-tight hover:text-red-600 transition-colors">WEAVE LABORATORY</a>
        <a href="/#anatomy" @click="mobileMenuOpen = false"
            class="block text-base font-black tracking-tight hover:text-red-600 transition-colors">ANATOMY BLUEPRINT</a>
        <a href="/#exhibition" @click="mobileMenuOpen = false"
            class="block text-base font-black tracking-tight hover:text-red-600 transition-colors">FACTORY SPECIMENS</a>
        <a href="/#facility" @click="mobileMenuOpen = false"
            class="block text-base font-black tracking-tight hover:text-red-600 transition-colors">INFRASTRUCTURE</a>
        <div class="pt-4 border-t border-zinc-200 dark:border-zinc-800">
            <a href="/b2b" @click="mobileMenuOpen = false"
                class="flex items-center justify-center w-full py-3.5 bg-red-600 text-white font-black rounded-xl uppercase tracking-widest text-xs shadow-lg shadow-red-600/30">
                Go to Dedicated B2B Portal &rarr;
            </a>
        </div>
    </div>
</nav>