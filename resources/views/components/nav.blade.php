@props(['transparent' => false])

<nav class="fixed top-0 w-full z-[100] border-b border-zinc-200 dark:border-zinc-800 transition-all duration-300"
    :class="scrollY > 50 ? 'bg-white/80 dark:bg-black/80 backdrop-blur-xl py-3' : ({{ $transparent ? 'true' : 'false' }} ? 'bg-transparent py-6' : 'bg-white/80 dark:bg-black/80 backdrop-blur-xl py-3')"
    x-data="{ scrollY: 0, mobileMenuOpen: false }" @scroll.window="scrollY = window.scrollY">
    <div class="max-w-7xl mx-auto px-6 flex items-center justify-between">
        <a href="/" class="group flex items-center gap-2">
            <span
                class="text-3xl font-black tracking-tighter text-red-600 group-hover:text-red-500 transition-colors">7SERIES</span>
            <span class="w-1.5 h-1.5 rounded-full bg-red-600 animate-pulse"></span>
        </a>

        <!-- Desktop Navigation -->
        <div class="hidden md:flex gap-10 items-center font-semibold text-sm tracking-wide">
            <a href="/#collections" class="hover:text-red-600 dark:hover:text-red-500 transition-colors">COLLECTIONS</a>
            <a href="/shop" class="hover:text-red-600 dark:hover:text-red-500 transition-colors">SHOP</a>
            <a href="/#about" class="hover:text-red-600 dark:hover:text-red-500 transition-colors">JOURNEY</a>
        </div>

        <div class="flex items-center gap-4">
            <!-- Theme Toggle -->
            <button @click="toggleTheme()"
                class="p-2.5 rounded-full bg-zinc-200/50 dark:bg-zinc-800/50 hover:bg-red-100 dark:hover:bg-red-900/30 transition-all duration-300 text-zinc-600 dark:text-zinc-400 hover:text-red-600">
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

            <!-- Hamburger Button -->
            <button @click="mobileMenuOpen = !mobileMenuOpen" class="md:hidden p-2.5 text-zinc-600 dark:text-zinc-400">
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

            <a href="/shop"
                class="hidden sm:flex group relative px-6 py-2.5 bg-zinc-900 dark:bg-white text-white dark:text-zinc-900 text-sm font-bold overflow-hidden rounded-full transition-all hover:scale-105 active:scale-95">
                <span class="relative z-10">SHOP NOW</span>
                <div
                    class="absolute inset-0 bg-red-600 translate-y-full group-hover:translate-y-0 transition-transform duration-300">
                </div>
            </a>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div x-show="mobileMenuOpen" x-cloak x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 -translate-y-4" x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 -translate-y-4"
        class="md:hidden absolute top-full left-0 w-full bg-white dark:bg-black border-b border-zinc-200 dark:border-zinc-800 py-6 px-6 space-y-4 shadow-xl">
        <a href="/#collections" @click="mobileMenuOpen = false"
            class="block text-lg font-black tracking-tight hover:text-red-600 transition-colors">COLLECTIONS</a>
        <a href="/shop" @click="mobileMenuOpen = false"
            class="block text-lg font-black tracking-tight hover:text-red-600 transition-colors">SHOP ALL</a>
        <a href="/#about" @click="mobileMenuOpen = false"
            class="block text-lg font-black tracking-tight hover:text-red-600 transition-colors">JOURNEY</a>
        <div class="pt-4 border-t border-zinc-100 dark:border-zinc-900">
            <a href="/shop"
                class="flex items-center justify-center w-full py-4 bg-red-600 text-white font-black rounded-xl uppercase tracking-widest text-sm">
                Enter Shop
            </a>
        </div>
    </div>
</nav>