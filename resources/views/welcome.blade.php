<x-layout>
    <x-slot:title>7 Series Denim - Premium Fashion</x-slot>

    <x-nav transparent="true" />

    <!-- Hero Section -->
    <section class="min-h-screen relative flex items-center pt-20 overflow-hidden">
        <!-- Visual Background -->
        <div class="absolute inset-0 z-0">
            <div class="absolute right-0 top-0 w-2/3 h-full bg-zinc-100 dark:bg-zinc-900/50 transition-colors duration-700"></div>
            <div class="absolute left-[-10%] top-[-10%] w-[40%] h-[40%] bg-red-600/10 blur-[120px] rounded-full animate-pulse"></div>
            <div class="absolute right-[-5%] bottom-[-5%] w-[30%] h-[30%] bg-red-600/5 blur-[100px] rounded-full"></div>
            <div class="absolute inset-0 hero-pattern opacity-50 dark:opacity-20"></div>
        </div>

        <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-2 gap-12 items-center relative z-10 w-full" x-data="{ loaded: false }" x-init="setTimeout(() => loaded = true, 100)">
            <div class="space-y-10">
                <div class="space-y-6" x-show="loaded" x-transition:enter="transition ease-out duration-1000" x-transition:enter-start="opacity-0 translate-x-[-50px]" x-transition:enter-end="opacity-100 translate-x-0">
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-red-100 dark:bg-red-900/30 text-red-600 dark:text-red-400 text-xs font-bold tracking-widest uppercase">
                        <span class="w-2 h-2 rounded-full bg-red-600 animate-ping"></span>
                        New Arrival {{ now()->year }}
                    </div>
                    <h1 class="text-7xl md:text-8xl font-black tracking-tight leading-[0.9] text-zinc-900 dark:text-white">
                        THE ART OF <br>
                        <span class="text-red-600 text-glow italic">DENIM.</span>
                    </h1>
                    <p class="text-zinc-500 dark:text-zinc-400 text-xl font-medium max-w-lg leading-relaxed">
                        Architectural silhouettes meets Japanese heritage. Redefining fashion through structural integrity.
                    </p>
                </div>

                <div class="flex flex-wrap gap-6" x-show="loaded" x-transition:enter="transition ease-out duration-1000 delay-300" x-transition:enter-start="opacity-0 translate-y-10" x-transition:enter-end="opacity-100 translate-y-0">
                    <a href="/shop" class="px-10 py-5 bg-zinc-900 dark:bg-white text-white dark:text-zinc-900 font-black rounded-xl transition-all hover:bg-red-600 hover:text-white hover:scale-105 active:scale-95 uppercase tracking-widest shadow-2xl">
                        Shop Collection
                    </a>
                    <a href="#collections" class="px-10 py-5 bg-white dark:bg-zinc-800 border border-zinc-200 dark:border-zinc-700 font-black rounded-xl transition-all hover:border-red-600 hover:text-red-600 hover:scale-105 active:scale-95 uppercase tracking-widest">
                        View Lookbook
                    </a>
                </div>
            </div>

            <div class="relative group" x-show="loaded" x-transition:enter="transition ease-out duration-1000 delay-500" x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100">
                <div class="absolute -inset-4 bg-red-600/20 blur-2xl rounded-full opacity-0 group-hover:opacity-100 transition-opacity duration-1000"></div>
                <div class="relative z-10 aspect-[4/5] overflow-hidden rounded-2xl shadow-2xl border border-white/20">
                    <img src="{{ asset('images/hero.png') }}" alt="Denim Subject" class="w-full h-full object-cover transition-transform duration-1000 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent"></div>
                    <div class="absolute bottom-8 left-8 right-8">
                        <p class="text-red-500 font-black text-sm tracking-widest uppercase mb-1">Featured Piece</p>
                        <h3 class="text-2xl font-black text-white italic tracking-tighter uppercase">X-7 Raw Cobalt</h3>
                    </div>
                </div>
                <!-- Floating Card -->
                <div class="absolute -right-8 top-1/2 -translate-y-1/2 bg-white/90 dark:bg-black/90 backdrop-blur-xl p-6 rounded-2xl shadow-2xl border border-zinc-200 dark:border-zinc-800 hidden lg:block animate-bounce-slow">
                    <div class="text-red-600 font-black text-2xl mb-1">98%</div>
                    <div class="text-zinc-900 dark:text-white text-xs font-black uppercase tracking-widest">Durability Rating</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Marquee -->
    <div class="bg-red-600 py-6 overflow-hidden border-y-4 border-black dark:border-white">
        <div class="flex whitespace-nowrap animate-marquee">
            @for ($i = 0; $i < 10; $i++)
                <span class="text-6xl font-black text-white inline-block px-8 tracking-tighter">7SERIES COUTURÉ • NO LIMITS • RAW HERITAGE • </span>
            @endfor
        </div>
    </div>

    <!-- Collections -->
    <section id="collections" class="py-32 bg-white dark:bg-zinc-950 transition-colors duration-500">
        <div class="max-w-7xl mx-auto px-6">
            <div class="flex flex-col md:flex-row justify-between items-end gap-8 mb-20">
                <div class="space-y-4">
                    <div class="inline-block px-3 py-1 bg-zinc-100 dark:bg-zinc-900 rounded-lg text-red-600 text-xs font-black tracking-widest uppercase">The Archive</div>
                    <h2 class="text-6xl font-black tracking-tighter uppercase">Season <span class="italic text-red-600">Alpha</span></h2>
                </div>
                <a href="/shop" class="group flex items-center gap-4 text-sm font-black tracking-widest uppercase">
                    View All Drop <span class="w-12 h-[1px] bg-red-600 transition-all group-hover:w-20"></span>
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Card 1 -->
                <div class="group relative overflow-hidden rounded-2xl bg-zinc-100 dark:bg-zinc-800 transition-all duration-500 hover:shadow-2xl">
                    <div class="absolute inset-x-0 bottom-0 h-1/2 bg-gradient-to-t from-black/60 to-transparent z-10"></div>
                    <img src="{{ asset('images/collection-1.png') }}" class="w-full h-[500px] object-cover transition-transform duration-700 group-hover:scale-110" alt="Denim 1">
                    <div class="absolute inset-0 p-8 flex flex-col justify-end z-20">
                        <p class="text-red-500 font-black text-xs tracking-widest uppercase mb-2">Heritage</p>
                        <h3 class="text-3xl font-black text-white mb-4">RAW CORE</h3>
                        <a href="/shop" class="w-12 h-12 bg-white rounded-full flex items-center justify-center -translate-x-12 opacity-0 group-hover:translate-x-0 group-hover:opacity-100 transition-all duration-500">
                            <svg class="w-6 h-6 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                        </a>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="group relative overflow-hidden rounded-2xl bg-zinc-100 dark:bg-zinc-800 transition-all duration-500 hover:shadow-2xl md:-translate-y-8">
                    <div class="absolute inset-x-0 bottom-0 h-1/2 bg-gradient-to-t from-black/60 to-transparent z-10"></div>
                    <img src="{{ asset('images/collection-2.png') }}" class="w-full h-[500px] object-cover transition-transform duration-700 group-hover:scale-110" alt="Denim 2">
                    <div class="absolute inset-0 p-8 flex flex-col justify-end z-20">
                        <p class="text-red-500 font-black text-xs tracking-widest uppercase mb-2">Modernism</p>
                        <h3 class="text-3xl font-black text-white mb-4">URBAN FLOW</h3>
                        <a href="/shop" class="w-12 h-12 bg-white rounded-full flex items-center justify-center -translate-x-12 opacity-0 group-hover:translate-x-0 group-hover:opacity-100 transition-all duration-500">
                            <svg class="w-6 h-6 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                        </a>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="group relative overflow-hidden rounded-2xl bg-zinc-100 dark:bg-zinc-800 transition-all duration-500 hover:shadow-2xl">
                    <div class="absolute inset-x-0 bottom-0 h-1/2 bg-gradient-to-t from-black/60 to-transparent z-10"></div>
                    <img src="{{ asset('images/collection-3.png') }}" class="w-full h-[500px] object-cover transition-transform duration-700 group-hover:scale-110" alt="Denim 3">
                    <div class="absolute inset-0 p-8 flex flex-col justify-end z-20">
                        <p class="text-red-500 font-black text-xs tracking-widest uppercase mb-2">Limited</p>
                        <h3 class="text-3xl font-black text-white mb-4">DARK TECH</h3>
                        <a href="/shop" class="w-12 h-12 bg-white rounded-full flex items-center justify-center -translate-x-12 opacity-0 group-hover:translate-x-0 group-hover:opacity-100 transition-all duration-500">
                            <svg class="w-6 h-6 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About/Process -->
    <section id="about" class="py-32 bg-zinc-100 dark:bg-zinc-900 transition-colors duration-500">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid md:grid-cols-2 gap-24 items-center">
                <div class="space-y-12">
                    <div class="space-y-6">
                        <h2 class="text-6xl font-black tracking-tighter italic">ENGINEERED FOR <span class="text-red-600">ETERNITY.</span></h2>
                        <p class="text-xl text-zinc-500 font-medium leading-relaxed">
                            We don't manufacture clothes; we engineer armor for the modern nomad. Every stitch is a commitment to quality.
                        </p>
                    </div>

                    <div class="space-y-10">
                        <div class="flex gap-6 group">
                            <div class="flex-shrink-0 w-16 h-16 rounded-2xl bg-red-600/10 border border-red-600/20 flex items-center justify-center transition-all duration-300 group-hover:bg-red-600 group-hover:scale-110">
                                <svg class="w-8 h-8 text-red-500 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                            </div>
                            <div class="space-y-2">
                                <h3 class="text-2xl font-black italic">ULTRA-STRETCH TECHNOLOGY</h3>
                                <p class="text-zinc-400 font-medium">Japanese-woven denim with 4-way elastic recovery. Designed for extreme mobility without losing shape.</p>
                            </div>
                        </div>

                        <div class="flex gap-6 group">
                            <div class="flex-shrink-0 w-16 h-16 rounded-2xl bg-red-600/10 border border-red-600/20 flex items-center justify-center transition-all duration-300 group-hover:bg-red-600 group-hover:scale-110">
                                <svg class="w-8 h-8 text-red-500 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                            </div>
                            <div class="space-y-2">
                                <h3 class="text-2xl font-black italic">CARBON NEUTRAL PROCESS</h3>
                                <p class="text-zinc-400 font-medium">Ethically manufactured using laser-finishing technology, reducing water waste by 95%.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="relative">
                    <div class="absolute inset-0 bg-red-600 rounded-2xl rotate-3 opacity-20"></div>
                    <img src="{{ asset('images/hero.png') }}" class="relative z-10 rounded-2xl grayscale hover:grayscale-0 transition-all duration-700 w-full object-cover h-[700px]" alt="Detail">
                </div>
            </div>
        </div>
    </section>

    <x-footer />
</x-layout>