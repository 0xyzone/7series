<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" x-data="{ 
    darkMode: localStorage.getItem('theme') === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches),
    toggleTheme() {
        this.darkMode = !this.darkMode;
        localStorage.setItem('theme', this.darkMode ? 'dark' : 'light');
    }
}" :class="{ 'dark': darkMode }">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>7 Series Denim - Premium Fashion</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=outfit:300,400,600,700,800|playfair-display:700,900"
        rel="stylesheet" />
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        [x-cloak] {
            display: none !important;
        }

        .text-glow {
            text-shadow: 0 0 10px rgba(220, 38, 38, 0.5);
        }

        .bg-glass {
            @apply backdrop-blur-lg bg-white/70 dark:bg-black/70;
        }

        .hero-pattern {
            background-image: radial-gradient(circle at 2px 2px, rgba(220, 38, 38, 0.1) 1px, transparent 0);
            background-size: 40px 40px;
        }
    </style>
</head>

<body
    class="bg-slate-50 dark:bg-zinc-950 text-zinc-900 dark:text-zinc-100 font-sans transition-colors duration-500 overflow-x-hidden">

    <!-- Navigation -->
    <nav class="fixed top-0 w-full z-[100] border-b border-zinc-200 dark:border-zinc-800 transition-all duration-300"
        :class="scrollY > 50 ? 'bg-white/80 dark:bg-black/80 backdrop-blur-xl py-3' : 'bg-transparent py-6'"
        x-data="{ scrollY: 0 }" @scroll.window="scrollY = window.scrollY">
        <div class="max-w-7xl mx-auto px-6 flex items-center justify-between">
            <a href="/" class="group flex items-center gap-2">
                <span
                    class="text-3xl font-black tracking-tighter text-red-600 group-hover:text-red-500 transition-colors">7SERIES</span>
                <span class="w-1.5 h-1.5 rounded-full bg-red-600 animate-pulse"></span>
            </a>

            <div class="hidden md:flex gap-10 items-center font-semibold text-sm tracking-wide">
                <a href="#collections"
                    class="hover:text-red-600 dark:hover:text-red-500 transition-colors">COLLECTIONS</a>
                <a href="/shop" class="hover:text-red-600 dark:hover:text-red-500 transition-colors">SHOP</a>
                <a href="#about" class="hover:text-red-600 dark:hover:text-red-500 transition-colors">JOURNEY</a>
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
                    <svg x-show="darkMode" x-cloak class="w-5 h-5" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z">
                        </path>
                    </svg>
                </button>
                <a href="/shop"
                    class="group relative px-6 py-2.5 bg-zinc-900 dark:bg-white text-white dark:text-zinc-900 text-sm font-bold overflow-hidden rounded-full transition-all hover:scale-105 active:scale-95">
                    <span class="relative z-10">SHOP NOW</span>
                    <div
                        class="absolute inset-0 bg-red-600 translate-y-full group-hover:translate-y-0 transition-transform duration-300">
                    </div>
                </a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="min-h-screen relative flex items-center pt-20 overflow-hidden">
        <!-- Visual Background -->
        <div class="absolute inset-0 z-0">
            <div
                class="absolute right-0 top-0 w-2/3 h-full bg-zinc-100 dark:bg-zinc-900/50 transition-colors duration-700">
            </div>
            <div
                class="absolute left-[-10%] top-[-10%] w-[40%] h-[40%] bg-red-600/10 blur-[120px] rounded-full animate-pulse">
            </div>
            <div class="absolute right-[-5%] bottom-[-5%] w-[30%] h-[30%] bg-red-600/5 blur-[100px] rounded-full"></div>
            <div class="absolute inset-0 hero-pattern opacity-50 dark:opacity-20"></div>
        </div>

        <div class="max-w-7xl mx-auto px-6 relative z-10 w-full">
            <div class="grid lg:grid-cols-2 gap-16 items-center">
                <div class="space-y-10" x-data="{ show: false }" x-init="setTimeout(() => show = true, 100)">
                    <div class="space-y-4" x-show="show" x-transition:enter="transition ease-out duration-1000"
                        x-transition:enter-start="opacity-0 -translate-x-12">
                        <div
                            class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-red-100 dark:bg-red-900/30 text-red-600 dark:text-red-400 text-xs font-bold tracking-widest uppercase">
                            <span class="w-2 h-2 rounded-full bg-red-600 animate-ping"></span>
                            New Arrival {{ now()->year }}
                        </div>
                        <h1
                            class="text-7xl md:text-8xl font-black tracking-tight leading-[0.9] text-zinc-900 dark:text-white">
                            DEFY <br>
                            <span class="text-red-600 text-glow">ORDINARY</span>
                        </h1>
                        <p class="text-lg text-zinc-600 dark:text-zinc-400 max-w-lg leading-relaxed font-medium">
                            Premium denim engineered for those who move. Experience the perfect fusion of avant-garde
                            aesthetic and unmatched comfort.
                        </p>
                    </div>

                    <div class="flex flex-wrap gap-5" x-show="show"
                        x-transition:enter="transition ease-out duration-1000 delay-300"
                        x-transition:enter-start="opacity-0 translate-y-8">
                        <button
                            class="px-10 py-5 bg-red-600 text-white font-black rounded-lg hover:bg-red-700 hover:shadow-[0_0_30px_rgba(220,38,38,0.4)] transition-all transform hover:-translate-y-1 active:scale-95">
                            EXPLORE COLLECTION
                        </button>
                        <button
                            class="px-10 py-5 border-2 border-zinc-900 dark:border-white text-zinc-900 dark:text-white font-black rounded-lg hover:bg-zinc-900 hover:text-white dark:hover:bg-white dark:hover:text-zinc-900 transition-all">
                            OUR STORY
                        </button>
                    </div>

                    <!-- Stats -->
                    <div class="flex gap-12 pt-8 border-t border-zinc-200 dark:border-zinc-800" x-show="show"
                        x-transition:enter="transition ease-out duration-1000 delay-500"
                        x-transition:enter-start="opacity-0">
                        <div>
                            <div class="text-3xl font-black text-zinc-900 dark:text-white">48k+</div>
                            <div class="text-xs font-bold text-zinc-500 uppercase tracking-widest">Happy Clients</div>
                        </div>
                        <div>
                            <div class="text-3xl font-black text-zinc-900 dark:text-white">12</div>
                            <div class="text-xs font-bold text-zinc-500 uppercase tracking-widest">Global Studios</div>
                        </div>
                    </div>
                </div>

                <div class="relative group" x-data="{ show: false }" x-init="setTimeout(() => show = true, 400)">
                    <div x-show="show" x-transition:enter="transition ease-out duration-1000"
                        x-transition:enter-start="opacity-0 scale-95 translate-x-12">
                        <!-- Decorative elements -->
                        <div
                            class="absolute -top-10 -right-10 w-64 h-64 bg-red-600/10 rounded-full blur-3xl group-hover:bg-red-600/20 transition-all duration-700">
                        </div>
                        <div
                            class="absolute -bottom-10 -left-10 w-64 h-64 bg-red-600/10 rounded-full blur-3xl group-hover:bg-red-600/20 transition-all duration-700">
                        </div>

                        <div
                            class="relative z-10 aspect-[4/5] overflow-hidden rounded-2xl shadow-2xl border border-white/20">
                            <img src="{{ asset('images/hero.png') }}" 
                                 alt="Denim Subject" 
                                 class="w-full h-full object-cover transition-transform duration-1000 group-hover:scale-110">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent">
                            </div>
                            <div class="absolute bottom-8 left-8 right-8">
                                <div class="p-6 rounded-xl bg-white/10 backdrop-blur-md border border-white/20">
                                    <p class="text-red-500 font-black text-sm tracking-widest uppercase mb-1">Featured
                                        Item</p>
                                    <h3 class="text-white text-2xl font-black uppercase">Obsidian Skinny Fit</h3>
                                    <div class="flex items-center justify-between mt-4">
                                        <span class="text-white font-bold">$189.00</span>
                                        <button
                                            class="text-white text-sm font-bold border-b border-white hover:text-red-500 hover:border-red-500 transition-colors">VIEW
                                            PIECE</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Collections -->
    <section id="collections"
        class="py-32 relative overflow-hidden bg-white dark:bg-zinc-900 transition-colors duration-500">
        <div class="max-w-7xl mx-auto px-6">
            <div class="flex flex-col md:flex-row md:items-end justify-between mb-20 gap-8">
                <div class="space-y-4">
                    <p class="text-red-600 font-black tracking-widest text-sm uppercase">Curation</p>
                    <h2 class="text-5xl md:text-6xl font-black tracking-tighter text-zinc-900 dark:text-white">SELECTIVE
                        <br><span class="text-zinc-400 dark:text-zinc-600">ARCHITECTURE</span>
                    </h2>
                </div>
                <div class="max-w-sm text-zinc-500 dark:text-zinc-400 font-medium leading-relaxed">
                    Our collections are designed with architectural precision, balancing raw industrial aesthetics with
                    wearable luxury.
                </div>
            </div>

            <div class="grid md:grid-cols-3 gap-10">
                <!-- Card 1 -->
                <div
                    class="group relative overflow-hidden rounded-2xl bg-zinc-100 dark:bg-zinc-800 transition-all duration-500 hover:shadow-2xl">
                    <div class="absolute inset-x-0 bottom-0 h-1/2 bg-gradient-to-t from-black/60 to-transparent z-10">
                    </div>
                    <img src="{{ asset('images/collection-1.png') }}" 
                         class="w-full h-[500px] object-cover transition-transform duration-700 group-hover:scale-110" alt="Denim 1">
                    <div class="absolute inset-0 p-8 flex flex-col justify-end z-20">
                        <p class="text-red-500 font-black text-xs tracking-widest uppercase mb-2">Heritage</p>
                        <h3 class="text-3xl font-black text-white mb-4">RAW CORE</h3>
                        <a href="/shop" class="inline-flex items-center text-white font-bold group/link">
                            SHOP COLLECTION
                            <svg class="w-5 h-5 ml-2 transition-transform group-hover/link:translate-x-2" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Card 2 -->
                <div
                    class="group relative overflow-hidden rounded-2xl bg-zinc-100 dark:bg-zinc-800 transition-all duration-500 hover:shadow-2xl md:-translate-y-8">
                    <div class="absolute inset-x-0 bottom-0 h-1/2 bg-gradient-to-t from-black/60 to-transparent z-10">
                    </div>
                    <img src="{{ asset('images/collection-2.png') }}" 
                         class="w-full h-[500px] object-cover transition-transform duration-700 group-hover:scale-110" alt="Denim 2">
                    <div class="absolute inset-0 p-8 flex flex-col justify-end z-20">
                        <p class="text-red-500 font-black text-xs tracking-widest uppercase mb-2">Modernism</p>
                        <h3 class="text-3xl font-black text-white mb-4">URBAN FLOW</h3>
                        <a href="/shop" class="inline-flex items-center text-white font-bold group/link">
                            SHOP COLLECTION
                            <svg class="w-5 h-5 ml-2 transition-transform group-hover/link:translate-x-2" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Card 3 -->
                <div
                    class="group relative overflow-hidden rounded-2xl bg-zinc-100 dark:bg-zinc-800 transition-all duration-500 hover:shadow-2xl">
                    <div class="absolute inset-x-0 bottom-0 h-1/2 bg-gradient-to-t from-black/60 to-transparent z-10">
                    </div>
                    <img src="{{ asset('images/collection-3.png') }}" 
                         class="w-full h-[500px] object-cover transition-transform duration-700 group-hover:scale-110" alt="Denim 3">
                    <div class="absolute inset-0 p-8 flex flex-col justify-end z-20">
                        <p class="text-red-500 font-black text-xs tracking-widest uppercase mb-2">Limited</p>
                        <h3 class="text-3xl font-black text-white mb-4">DARK TECH</h3>
                        <a href="/shop" class="inline-flex items-center text-white font-bold group/link">
                            SHOP COLLECTION
                            <svg class="w-5 h-5 ml-2 transition-transform group-hover/link:translate-x-2" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Marquee -->
    <div class="py-12 bg-red-600 overflow-hidden select-none whitespace-nowrap">
        <div class="inline-block animate-marquee">
            <span class="text-5xl font-black text-white px-4">PREMIUM DENIM</span>
            <span class="text-5xl font-black text-transparent stroke-white stroke-2 px-4"
                style="-webkit-text-stroke: 2px white;">7 SERIES</span>
            <span class="text-5xl font-black text-white px-4">HANDCRAFTED</span>
            <span class="text-5xl font-black text-transparent stroke-white stroke-2 px-4"
                style="-webkit-text-stroke: 2px white;">LIMITLESS STYLE</span>
            <span class="text-5xl font-black text-white px-4">PREMIUM DENIM</span>
            <span class="text-5xl font-black text-transparent stroke-white stroke-2 px-4"
                style="-webkit-text-stroke: 2px white;">7 SERIES</span>
        </div>
        <div class="inline-block animate-marquee">
            <span class="text-5xl font-black text-white px-4">PREMIUM DENIM</span>
            <span class="text-5xl font-black text-transparent stroke-white stroke-2 px-4"
                style="-webkit-text-stroke: 2px white;">7 SERIES</span>
            <span class="text-5xl font-black text-white px-4">HANDCRAFTED</span>
            <span class="text-5xl font-black text-transparent stroke-white stroke-2 px-4"
                style="-webkit-text-stroke: 2px white;">LIMITLESS STYLE</span>
            <span class="text-5xl font-black text-white px-4">PREMIUM DENIM</span>
            <span class="text-5xl font-black text-transparent stroke-white stroke-2 px-4"
                style="-webkit-text-stroke: 2px white;">7 SERIES</span>
        </div>
    </div>

    <!-- Features -->
    <section class="py-32 bg-zinc-950 text-white overflow-hidden relative">
        <div class="absolute inset-0 opacity-20">
            <div class="absolute top-0 right-0 w-1/2 h-full bg-red-600/30 blur-[150px]"></div>
        </div>

        <div class="max-w-7xl mx-auto px-6 relative z-10">
            <div class="grid lg:grid-cols-2 gap-24 items-center">
                <div class="space-y-16">
                    <div class="space-y-4">
                        <h2 class="text-5xl md:text-7xl font-black tracking-tighter leading-none">ENGINEERED <br>FOR THE
                            <span class="text-red-600">UNRESTRICTED</span>
                        </h2>
                    </div>

                    <div class="grid gap-12">
                        <div class="flex gap-6 group">
                            <div
                                class="flex-shrink-0 w-16 h-16 rounded-2xl bg-red-600/10 border border-red-600/20 flex items-center justify-center transition-all duration-300 group-hover:bg-red-600 group-hover:scale-110">
                                <svg class="w-8 h-8 text-red-500 group-hover:text-white" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a2 2 0 00-1.96 1.414l-.727 2.903a2 2 0 01-3.566 1.103l-1.014-2.028a2 2 0 00-1.189-1.091l-3.583-1.194a2 2 0 01-1.22-2.31l.666-2.664a2 2 0 00-1.554-2.454l-2.34-.468a2 2 0 01-1.01-3.565l2.02-2.019a2 2 0 00.551-1.022L4.665 2.18a2 2 0 013.566-1.104l1.014 2.029a2 2 0 001.189 1.091l3.583 1.194a2 2 0 011.22 2.31l-.666 2.664a2 2 0 001.554 2.454l2.34.468a2 2 0 011.01 3.565l-2.02 2.019a2 2 0 00-.551 1.022l-.477 2.387a2 2 0 01-3.566 1.104l-1.014-2.029a2 2 0 00-1.189-1.091l-3.583-1.194a2 2 0 01-1.22-2.31l.666-2.664a2 2 0 00-1.554-2.454l-2.34-.468a2 2 0 01-1.01-3.565l2.02-2.019z">
                                    </path>
                                </svg>
                            </div>
                            <div class="space-y-2">
                                <h3 class="text-2xl font-black italic">ULTRA-STRETCH TECHNOLOGY</h3>
                                <p class="text-zinc-400 font-medium">Japanese-woven denim with 4-way elastic recovery.
                                    Designed for extreme mobility without losing shape.</p>
                            </div>
                        </div>

                        <div class="flex gap-6 group">
                            <div
                                class="flex-shrink-0 w-16 h-16 rounded-2xl bg-red-600/10 border border-red-600/20 flex items-center justify-center transition-all duration-300 group-hover:bg-red-600 group-hover:scale-110">
                                <svg class="w-8 h-8 text-red-500 group-hover:text-white" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                </svg>
                            </div>
                            <div class="space-y-2">
                                <h3 class="text-2xl font-black italic">CARBON NEUTRAL PROCESS</h3>
                                <p class="text-zinc-400 font-medium">Ethically manufactured using laser-finishing
                                    technology, reducing water waste by 95%.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="relative">
                    <div class="absolute inset-0 bg-red-600 rounded-2xl rotate-3 opacity-20"></div>
                    <img src="{{ asset('images/hero.png') }}" 
                         class="relative z-10 rounded-2xl grayscale hover:grayscale-0 transition-all duration-700 w-full object-cover h-[700px]" alt="Detail">
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer
        class="bg-zinc-100 dark:bg-zinc-950 pt-32 pb-12 border-t border-zinc-200 dark:border-zinc-900 transition-colors duration-500">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid md:grid-cols-4 gap-16 mb-24">
                <div class="col-span-2 space-y-8">
                    <div class="text-5xl font-black text-zinc-900 dark:text-white tracking-tighter">7SERIES</div>
                    <p class="text-xl text-zinc-500 max-w-sm">Join our inner circle for exclusive drops and limited
                        release access.</p>
                    <form class="flex max-w-md">
                        <input type="email" placeholder="ENTER EMAIL"
                            class="flex-1 bg-white dark:bg-zinc-900 border border-zinc-300 dark:border-zinc-800 px-6 py-4 focus:border-red-600 focus:outline-none dark:text-white transition-colors">
                        <button
                            class="bg-red-600 text-white px-8 py-4 font-black hover:bg-red-700 transition-colors uppercase">JOIN</button>
                    </form>
                </div>
                <div class="space-y-6">
                    <h4 class="text-xs font-black text-red-600 uppercase tracking-widest">Navigation</h4>
                    <ul class="space-y-4 font-bold text-zinc-600 dark:text-zinc-400">
                        <li><a href="/shop" class="hover:text-zinc-900 dark:hover:text-white transition-colors">SHOP
                                ALL</a></li>
                        <li><a href="#" class="hover:text-zinc-900 dark:hover:text-white transition-colors">ARCHIVE</a>
                        </li>
                        <li><a href="#"
                                class="hover:text-zinc-900 dark:hover:text-white transition-colors">LOCATIONS</a></li>
                        <li><a href="#" class="hover:text-zinc-900 dark:hover:text-white transition-colors">STUDIO</a>
                        </li>
                    </ul>
                </div>
                <div class="space-y-6">
                    <h4 class="text-xs font-black text-red-600 uppercase tracking-widest">Legal</h4>
                    <ul class="space-y-4 font-bold text-zinc-600 dark:text-zinc-400">
                        <li><a href="#" class="hover:text-zinc-900 dark:hover:text-white transition-colors">PRIVACY
                                POLICY</a></li>
                        <li><a href="#" class="hover:text-zinc-900 dark:hover:text-white transition-colors">TERMS OF
                                USE</a></li>
                        <li><a href="#" class="hover:text-zinc-900 dark:hover:text-white transition-colors">SHIPPING</a>
                        </li>
                        <li><a href="#" class="hover:text-zinc-900 dark:hover:text-white transition-colors">REFUNDS</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div
                class="pt-12 border-t border-zinc-200 dark:border-zinc-900 flex flex-col md:flex-row justify-between items-center gap-6">
                <p class="text-xs font-bold text-zinc-500 uppercase tracking-widest">&copy; {{ now()->year }} SEVEN SERIES APPAREL.
                    ALL RIGHTS RESERVED.</p>
                <div class="flex gap-8">
                    <a href="#"
                        class="text-xs font-black text-zinc-900 dark:text-white uppercase tracking-widest hover:text-red-600 transition-colors">Instagram</a>
                    <a href="#"
                        class="text-xs font-black text-zinc-900 dark:text-white uppercase tracking-widest hover:text-red-600 transition-colors">Twitter</a>
                    <a href="#"
                        class="text-xs font-black text-zinc-900 dark:text-white uppercase tracking-widest hover:text-red-600 transition-colors">Behance</a>
                </div>
            </div>
        </div>
    </footer>

    <style>
        @keyframes marquee {
            0% {
                transform: translateX(0);
            }

            100% {
                transform: translateX(-100%);
            }
        }

        .animate-marquee {
            animation: marquee 30s linear infinite;
        }
    </style>
</body>

</html>