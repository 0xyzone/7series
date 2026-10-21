<x-layout 
    :image="asset('images/og-home.jpg')" 
    imageAlt="Seven Series Big Logo with Screenshot of the Homepage Denim Jeans Showcase"
>
    <x-slot:title>Seven Series | Authentic Denim Clothing Brand & Garment Factory</x-slot>

    <x-nav transparent="true" />

    <main class="min-h-screen pt-20 sm:pt-28 pb-32 sm:pb-36 px-3.5 sm:px-6 lg:px-10 xl:px-12 w-full max-w-full overflow-hidden space-y-10 sm:space-y-16">

        <!-- ========================================================================= -->
        <!-- SECTION 1: HERO AUTHENTIC DENIM JEANS SHOWCASE -->
        <!-- ========================================================================= -->
        <section id="hero" class="scroll-mt-28 relative">
            
            <!-- Main Hero Board -->
            <div class="app-card p-4 sm:p-8 lg:p-12 relative overflow-hidden bg-gradient-to-br from-white via-slate-50/50 to-blue-50/30 border border-slate-200 shadow-xl">
                
                <!-- Ambient Denim Aura -->
                <div class="absolute -right-20 -top-20 w-96 h-96 bg-blue-900/10 rounded-full blur-3xl pointer-events-none" data-parallax="0.15"></div>
                <div class="absolute -left-16 bottom-0 w-80 h-80 bg-red-600/5 rounded-full blur-2xl pointer-events-none" data-parallax="-0.1"></div>

                <div class="grid lg:grid-cols-12 gap-8 lg:gap-12 items-center relative z-10">
                    
                    <!-- Left: Simple, Clear Denim Introduction -->
                    <div class="lg:col-span-7 space-y-6">
                        
                        <!-- Top Status Pill -->
                        <div class="inline-flex items-center gap-2.5 px-3.5 py-1.5 rounded-full bg-slate-900 text-white text-xs font-black tracking-wider uppercase shadow-sm">
                            <span class="w-2 h-2 rounded-full bg-red-500 animate-pulse"></span>
                            <span>AUTHENTIC DENIM CLOTHING BRAND</span>
                            <span class="text-zinc-400 font-mono text-[10px]">| GARMENT FACTORY</span>
                        </div>

                        <!-- Big Clear Headline -->
                        <div class="space-y-2">
                            <h1 class="text-3xl sm:text-5xl lg:text-6xl xl:text-7xl font-extrabold tracking-tight text-zinc-950 uppercase leading-[1.05] break-words">
                                AUTHENTIC HEAVY <br>
                                <span class="text-blue-950">DENIM JEANS.</span>
                            </h1>
                            <p class="text-sm sm:text-xl font-bold text-zinc-600 tracking-tight flex flex-wrap items-center gap-2">
                                <span class="inline-block w-2.5 h-2.5 rounded-full bg-red-600 shrink-0"></span>
                                <span>14.5 oz Raw Shuttle-Loom Cotton &bull; Built Tough to Last for Years</span>
                            </p>
                        </div>

                        <!-- Friendly Simple Human Copy -->
                        <p class="text-zinc-600 text-base sm:text-lg leading-relaxed max-w-xl font-normal">
                            <strong class="text-zinc-950 font-bold">Seven Series</strong> is an authentic Nepalese clothing brand and denim manufacturing factory. We weave, cut, and craft heavy cotton jeans, denim jackets, and casual clothing. Every pair features reinforced triple chain stitching and solid copper rivets. Visit our official retail stores to try your fit, or order bulk wholesale supplies directly from our factory floor.
                        </p>

                        <!-- Action Buttons (App Pill Style) -->
                        <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-3 pt-2">
                            <a href="#stores" class="px-7 py-3.5 bg-red-600 hover:bg-red-700 text-white font-bold text-sm tracking-wide rounded-full shadow-lg shadow-red-600/25 transition-all flex items-center justify-center gap-2 hover:scale-105 active:scale-95 text-center">
                                <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                <span>Find a Store Near You</span>
                            </a>

                            <a href="/b2b" class="px-7 py-3.5 bg-slate-900 hover:bg-blue-950 text-white font-bold text-sm tracking-wide rounded-full transition-all border border-slate-800 hover:scale-105 active:scale-95 flex items-center justify-center gap-2 text-center shadow-md">
                                <span>Wholesale for Store Owners</span>
                                <span>&rarr;</span>
                            </a>
                        </div>

                        <!-- Quick Badges Row -->
                        <div class="flex flex-wrap items-center gap-4 pt-4 border-t border-slate-200 text-xs text-zinc-600 font-semibold">
                            <span class="inline-flex items-center gap-1.5">
                                <span class="w-2 h-2 rounded-full bg-blue-700"></span>
                                14.5 oz Pure Ring-Spun Cotton
                            </span>
                            <span class="inline-flex items-center gap-1.5">
                                <span class="w-2 h-2 rounded-full bg-red-600"></span>
                                Red Selvedge Seams
                            </span>
                            <span class="inline-flex items-center gap-1.5">
                                <span class="w-2 h-2 rounded-full bg-green-600"></span>
                                Physical Stores Across Nepal
                            </span>
                        </div>

                    </div>

                    <!-- Right: Tactile Denim Jeans Interactive Showcase (Real Denim Product Photography) -->
                    <div class="lg:col-span-5 relative" x-data="{ activeCut: 'raw' }">
                        
                        <div class="app-card rounded-3xl overflow-hidden border border-slate-200 bg-white shadow-2xl">
                            
                            <!-- Denim Selector Pills Header -->
                            <div class="px-2.5 sm:px-4 py-2 sm:py-2.5 bg-slate-900 text-white flex items-center justify-between text-xs overflow-x-auto no-scrollbar gap-1.5 sm:gap-2">
                                <div class="flex items-center gap-1.5 shrink-0">
                                    <span class="w-2 h-2 rounded-full bg-red-500 animate-pulse"></span>
                                    <span class="text-[10px] sm:text-[11px] font-black uppercase tracking-wider text-zinc-200"><span class="hidden xs:inline">SEVEN SERIES </span>DENIM</span>
                                </div>
                                <div class="flex items-center gap-0.5 sm:gap-1 shrink-0 bg-slate-800 p-0.5 rounded-full text-[9px] sm:text-[10px] font-bold">
                                    <button type="button" @click="activeCut = 'raw'" 
                                        :class="activeCut === 'raw' ? 'bg-red-600 text-white' : 'text-zinc-300 hover:text-white'" 
                                        class="px-2 sm:px-2.5 py-1 rounded-full transition-all">
                                        Raw Indigo
                                    </button>
                                    <button type="button" @click="activeCut = 'black'" 
                                        :class="activeCut === 'black' ? 'bg-red-600 text-white' : 'text-zinc-300 hover:text-white'" 
                                        class="px-2 sm:px-2.5 py-1 rounded-full transition-all">
                                        Black
                                    </button>
                                    <button type="button" @click="activeCut = 'wash'" 
                                        :class="activeCut === 'wash' ? 'bg-red-600 text-white' : 'text-zinc-300 hover:text-white'" 
                                        class="px-2 sm:px-2.5 py-1 rounded-full transition-all">
                                        Factory Wash
                                    </button>
                                    <button type="button" @click="activeCut = 'lookbook'" 
                                        :class="activeCut === 'lookbook' ? 'bg-red-600 text-white' : 'text-zinc-300 hover:text-white'" 
                                        class="px-2 sm:px-2.5 py-1 rounded-full transition-all">
                                        Fit Look
                                    </button>
                                </div>
                            </div>

                            <!-- Photography Viewport -->
                            <div class="relative w-full h-[360px] sm:h-[420px] bg-slate-950 overflow-hidden group select-none">
                                
                                <!-- Cut 1: Raw Indigo Fold -->
                                <div x-show="activeCut === 'raw'" 
                                     x-transition:enter="transition ease-out duration-300"
                                     x-transition:enter-start="opacity-0 scale-95"
                                     x-transition:enter-end="opacity-100 scale-100"
                                     class="w-full h-full relative">
                                    <img src="{{ asset('images/denim-hero-fold.jpg') }}" alt="Seven Series Raw Indigo Selvedge Denim" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                                    <div class="absolute top-4 left-4">
                                        <span class="px-3 py-1 rounded-full bg-slate-900/90 text-white text-[10px] font-black uppercase tracking-wider backdrop-blur-md border border-slate-700 shadow-md">
                                            14.5 OZ SHUTTLE RAW
                                        </span>
                                    </div>
                                    <div class="absolute bottom-4 right-4">
                                        <span class="px-3 py-1 rounded-full bg-red-600 text-white text-[10px] font-black uppercase tracking-wider shadow-md flex items-center gap-1.5">
                                            <span class="w-1.5 h-1.5 rounded-full bg-white animate-ping"></span>
                                            RED SELVEDGE ID
                                        </span>
                                    </div>
                                </div>

                                <!-- Cut 2: Sulfur Black Fold -->
                                <div x-show="activeCut === 'black'" x-cloak
                                     x-transition:enter="transition ease-out duration-300"
                                     x-transition:enter-start="opacity-0 scale-95"
                                     x-transition:enter-end="opacity-100 scale-100"
                                     class="w-full h-full relative">
                                    <img src="{{ asset('images/denim-black-fold.jpg') }}" alt="Seven Series Sulfur Double Black Denim" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                                    <div class="absolute top-4 left-4">
                                        <span class="px-3 py-1 rounded-full bg-slate-900/90 text-white text-[10px] font-black uppercase tracking-wider backdrop-blur-md border border-slate-700 shadow-md">
                                            13.8 OZ SULFUR BLACK
                                        </span>
                                    </div>
                                    <div class="absolute bottom-4 right-4">
                                        <span class="px-3 py-1 rounded-full bg-zinc-900 text-white text-[10px] font-black uppercase tracking-wider border border-zinc-700 shadow-md">
                                            GUNMETAL HARDWARE
                                        </span>
                                    </div>
                                </div>

                                <!-- Cut 3: Factory Wash Jeans -->
                                <div x-show="activeCut === 'wash'" x-cloak
                                     x-transition:enter="transition ease-out duration-300"
                                     x-transition:enter-start="opacity-0 scale-95"
                                     x-transition:enter-end="opacity-100 scale-100"
                                     class="w-full h-full relative">
                                    <img src="{{ asset('images/jeans-product.jpg') }}" alt="Seven Series Factory Washed Denim Jeans" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                                    <div class="absolute top-4 left-4">
                                        <span class="px-3 py-1 rounded-full bg-slate-900/90 text-white text-[10px] font-black uppercase tracking-wider backdrop-blur-md border border-slate-700 shadow-md">
                                            FACTORY VINTAGE WASH
                                        </span>
                                    </div>
                                    <div class="absolute bottom-4 right-4">
                                        <span class="px-3 py-1 rounded-full bg-red-600 text-white text-[10px] font-black uppercase tracking-wider shadow-md">
                                            BACK POCKET EMBOSSED
                                        </span>
                                    </div>
                                </div>

                                <!-- Cut 4: Model Fit Lookbook -->
                                <div x-show="activeCut === 'lookbook'" x-cloak
                                     x-transition:enter="transition ease-out duration-300"
                                     x-transition:enter-start="opacity-0 scale-95"
                                     x-transition:enter-end="opacity-100 scale-100"
                                     class="w-full h-full relative">
                                    <img src="{{ asset('images/hero.png') }}" alt="Seven Series Denim Jacket and Jeans Fit" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                                    <div class="absolute top-4 left-4">
                                        <span class="px-3 py-1 rounded-full bg-slate-900/90 text-white text-[10px] font-black uppercase tracking-wider backdrop-blur-md border border-slate-700 shadow-md">
                                            FULL DENIM SUIT FIT
                                        </span>
                                    </div>
                                    <div class="absolute bottom-4 right-4">
                                        <span class="px-3 py-1 rounded-full bg-red-600 text-white text-[10px] font-black uppercase tracking-wider shadow-md">
                                            FACTORY DIRECT
                                        </span>
                                    </div>
                                </div>

                            </div>

                            <!-- Craft Spec Bar Footer -->
                            <div class="px-4 py-3 bg-slate-50 border-t border-slate-200 flex flex-wrap items-center justify-between gap-2 text-xs">
                                <div class="flex items-center gap-3 text-zinc-600 font-bold">
                                    <span class="flex items-center gap-1.5">
                                        <span class="w-2 h-2 rounded-full bg-blue-900"></span>
                                        <span>Pure Cotton</span>
                                    </span>
                                    <span class="flex items-center gap-1.5">
                                        <span class="w-2 h-2 rounded-full bg-amber-600"></span>
                                        <span>Brass Hardware</span>
                                    </span>
                                    <span class="flex items-center gap-1.5">
                                        <span class="w-2 h-2 rounded-full bg-red-600"></span>
                                        <span>Selvedge Hem</span>
                                    </span>
                                </div>
                                <span class="text-[10px] text-zinc-400 font-mono font-bold">GENUINE SEVEN SERIES</span>
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </section>

        <!-- ========================================================================= -->
        <!-- SECTION 2: LIVE FABRIC & CAPACITY METRICS (Aeris Weather Cards Style) -->
        <!-- ========================================================================= -->
        <section id="fabric-metrics" class="scroll-mt-28 space-y-4">
            
            <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-4 px-2">
                <div>
                    <span class="text-xs font-black uppercase tracking-wider text-red-600">PRODUCTION SPECS</span>
                    <h2 class="text-2xl sm:text-3xl font-extrabold text-zinc-950 uppercase tracking-tight">Factory Numbers & Craft</h2>
                </div>
                <p class="text-xs sm:text-sm text-zinc-500 max-w-sm">Every pair of jeans is crafted with high-density cotton yarn and reinforced stitching.</p>
            </div>

            <!-- 4 Rounded App Metric Widgets -->
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-2.5 sm:gap-6">
                
                <!-- Metric 1 -->
                <div class="app-card p-3 sm:p-5 lg:p-6 bg-white space-y-2 sm:space-y-3">
                    <div class="flex items-center justify-between text-xs text-zinc-500 font-medium">
                        <span class="truncate">Loom Weight</span>
                        <span class="w-2 h-2 rounded-full bg-red-600 shrink-0"></span>
                    </div>
                    <div>
                        <div class="text-xl sm:text-2xl lg:text-4xl font-extrabold text-zinc-950">
                            <span class="stat-counter" data-target="14.5" data-decimals="1" data-suffix=" oz">14.5 oz</span>
                        </div>
                        <p class="text-[10px] sm:text-xs text-zinc-500 mt-1 line-clamp-2 leading-tight">Heavy raw shuttle denim</p>
                    </div>
                    <div class="w-full bg-zinc-100 h-1.5 rounded-full overflow-hidden">
                        <div class="bg-red-600 h-full rounded-full w-[85%]"></div>
                    </div>
                </div>

                <!-- Metric 2 -->
                <div class="app-card p-3 sm:p-5 lg:p-6 bg-white space-y-2 sm:space-y-3">
                    <div class="flex items-center justify-between text-xs text-zinc-500 font-medium">
                        <span class="truncate">Factory Output</span>
                        <span class="w-2 h-2 rounded-full bg-red-600 shrink-0"></span>
                    </div>
                    <div>
                        <div class="text-xl sm:text-2xl lg:text-4xl font-extrabold text-red-600">
                            <span class="stat-counter" data-target="480000" data-decimals="0" data-suffix="+">480,000+</span>
                        </div>
                        <p class="text-[10px] sm:text-xs text-zinc-500 mt-1 line-clamp-2 leading-tight">Monthly denim production</p>
                    </div>
                    <div class="w-full bg-zinc-100 h-1.5 rounded-full overflow-hidden">
                        <div class="bg-red-600 h-full rounded-full w-[95%]"></div>
                    </div>
                </div>

                <!-- Metric 3 -->
                <div class="app-card p-3 sm:p-5 lg:p-6 bg-white space-y-2 sm:space-y-3">
                    <div class="flex items-center justify-between text-xs text-zinc-500 font-medium">
                        <span class="truncate">Cotton Purity</span>
                        <span class="w-2 h-2 rounded-full bg-green-600 shrink-0"></span>
                    </div>
                    <div>
                        <div class="text-xl sm:text-2xl lg:text-4xl font-extrabold text-zinc-950">
                            <span class="stat-counter" data-target="100" data-decimals="0" data-suffix="%">100%</span>
                        </div>
                        <p class="text-[10px] sm:text-xs text-zinc-500 mt-1 line-clamp-2 leading-tight">Pure ring-spun staple</p>
                    </div>
                    <div class="w-full bg-zinc-100 h-1.5 rounded-full overflow-hidden">
                        <div class="bg-green-600 h-full rounded-full w-full"></div>
                    </div>
                </div>

                <!-- Metric 4 -->
                <div class="app-card p-3 sm:p-5 lg:p-6 bg-white space-y-2 sm:space-y-3">
                    <div class="flex items-center justify-between text-xs text-zinc-500 font-medium">
                        <span class="truncate">Indigo Baths</span>
                        <span class="w-2 h-2 rounded-full bg-red-600 shrink-0"></span>
                    </div>
                    <div>
                        <div class="text-xl sm:text-2xl lg:text-4xl font-extrabold text-zinc-950">
                            <span class="stat-counter" data-target="12" data-decimals="0" data-suffix=" Dips">12 Dips</span>
                        </div>
                        <p class="text-[10px] sm:text-xs text-zinc-500 mt-1 line-clamp-2 leading-tight">Rope dye saturation</p>
                    </div>
                    <div class="w-full bg-zinc-100 h-1.5 rounded-full overflow-hidden">
                        <div class="bg-red-600 h-full rounded-full w-[80%]"></div>
                    </div>
                </div>

            </div>

        </section>

        <!-- ========================================================================= -->
        <!-- SECTION 3: PHYSICAL RETAIL STORES DIRECTORY (Portrait Stories Style) -->
        <!-- ========================================================================= -->
        <section id="stores" class="scroll-mt-28 space-y-6 pt-6">
            
            <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 px-2">
                <div class="space-y-2">
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-red-100 text-red-600 text-xs font-black uppercase">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                        <span>OFFICIAL RETAIL OUTLETS</span>
                    </div>
                    <h2 class="text-3xl sm:text-4xl font-extrabold text-zinc-950 uppercase tracking-tight">
                        Where to Buy Seven Series
                    </h2>
                    <p class="text-zinc-600 text-base max-w-xl">
                        You can visit our official retail stores and authorized partner shops to try on our jeans, find your exact size, and buy in person.
                    </p>
                </div>

                <div>
                    <a href="/b2b" class="inline-flex items-center justify-center gap-2 px-6 py-3 rounded-full bg-zinc-950 hover:bg-red-600 text-white text-xs font-bold uppercase tracking-wider transition-all shadow-md w-full sm:w-auto text-center">
                        <span>Want to Sell Seven Series in Your Store?</span>
                        <span>&rarr;</span>
                    </a>
                </div>
            </div>

            <!-- City Filter Pill Buttons (Horizontally Scrollable on Mobile) -->
            <div class="flex items-center gap-2 p-1.5 bg-zinc-100 rounded-2xl overflow-x-auto no-scrollbar w-full sm:w-auto sm:max-w-fit">
                <button type="button" class="store-city-filter shrink-0 whitespace-nowrap px-4 py-2 rounded-xl text-xs font-bold transition-all bg-red-600 text-white shadow-sm" data-city="all">
                    All Stores
                </button>
                <button type="button" class="store-city-filter shrink-0 whitespace-nowrap px-4 py-2 rounded-xl text-xs font-bold text-zinc-700 hover:text-red-600 transition-all" data-city="Kathmandu">
                    Kathmandu
                </button>
                <button type="button" class="store-city-filter shrink-0 whitespace-nowrap px-4 py-2 rounded-xl text-xs font-bold text-zinc-700 hover:text-red-600 transition-all" data-city="Lalitpur">
                    Lalitpur
                </button>
                <button type="button" class="store-city-filter shrink-0 whitespace-nowrap px-4 py-2 rounded-xl text-xs font-bold text-zinc-700 hover:text-red-600 transition-all" data-city="Pokhara">
                    Pokhara
                </button>
                <button type="button" class="store-city-filter shrink-0 whitespace-nowrap px-4 py-2 rounded-xl text-xs font-bold text-zinc-700 hover:text-red-600 transition-all" data-city="Butwal">
                    Butwal
                </button>
                <button type="button" class="store-city-filter shrink-0 whitespace-nowrap px-4 py-2 rounded-xl text-xs font-bold text-zinc-700 hover:text-red-600 transition-all" data-city="Biratnagar">
                    Biratnagar
                </button>
            </div>

            <!-- Stores Cards Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                
                @if(isset($retailStores) && $retailStores->count() > 0)
                    @foreach($retailStores as $store)
                        <div class="store-card app-card p-5 sm:p-7 flex flex-col justify-between group" data-city="{{ $store->city }}">
                            
                            <div class="space-y-4">
                                <div class="flex items-center justify-between">
                                    <span class="px-3 py-1 rounded-full text-[10px] font-black uppercase tracking-wider {{ $store->store_type === 'flagship' ? 'bg-red-600 text-white' : 'bg-red-50 text-red-600 border border-red-200' }}">
                                        {{ str_replace('_', ' ', strtoupper($store->store_type)) }}
                                    </span>
                                    <span class="text-xs font-bold text-zinc-500">{{ $store->city }}</span>
                                </div>

                                <div>
                                    <h3 class="text-xl font-bold text-zinc-950 group-hover:text-red-600 transition-colors">
                                        {{ $store->name }}
                                    </h3>
                                    <p class="text-zinc-600 text-sm mt-1 leading-relaxed">
                                        {{ $store->address }}
                                        @if($store->landmark)
                                            <span class="block text-xs text-zinc-400 mt-0.5 font-medium">Near: {{ $store->landmark }}</span>
                                        @endif
                                    </p>
                                </div>

                                <div class="space-y-2 pt-3 border-t border-zinc-100 text-xs text-zinc-600 font-medium">
                                    @if($store->operating_hours)
                                        <div class="flex items-center gap-2">
                                            <svg class="w-4 h-4 text-red-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                            <span>{{ $store->operating_hours }}</span>
                                        </div>
                                    @endif
                                    @if($store->phone)
                                        <div class="flex items-center gap-2">
                                            <svg class="w-4 h-4 text-red-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                                            <a href="tel:{{ $store->phone }}" class="hover:text-red-600 font-bold underline">{{ $store->phone }}</a>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="pt-6">
                                @if($store->google_maps_url)
                                    <a href="{{ $store->google_maps_url }}" target="_blank" rel="noopener noreferrer" class="w-full py-3 bg-zinc-100 hover:bg-red-600 hover:text-white text-zinc-900 font-bold text-xs uppercase tracking-wider rounded-full text-center block transition-all shadow-sm">
                                        Open in Google Maps &rarr;
                                    </a>
                                @else
                                    <a href="tel:{{ $store->phone }}" class="w-full py-3 bg-zinc-100 hover:bg-red-600 hover:text-white text-zinc-900 font-bold text-xs uppercase tracking-wider rounded-full text-center block transition-all shadow-sm">
                                        Call Shop Directly
                                    </a>
                                @endif
                            </div>

                        </div>
                    @endforeach
                @endif

                <!-- Store Partnership Invitation Card -->
                <div class="store-card app-card p-7 bg-zinc-950 text-white border-2 border-red-600 flex flex-col justify-between relative overflow-hidden" data-city="all">
                    <div class="absolute -right-10 -bottom-10 w-40 h-40 bg-red-600/25 rounded-full blur-2xl"></div>
                    
                    <div class="space-y-4 relative z-10">
                        <span class="inline-block px-3 py-1 rounded-full text-[10px] font-black uppercase tracking-wider bg-red-600 text-white">
                            BECOME AN AUTHORIZED STOCKIST
                        </span>

                        <div>
                            <h3 class="text-xl font-bold text-white">
                                Sell Seven Series in Your Store
                            </h3>
                            <p class="text-zinc-400 text-sm mt-2 leading-relaxed">
                                Do you have a clothing shop or multi-brand boutique? Partner with us to stock Seven Series authentic denim with verified wholesale prices and promotional materials.
                            </p>
                        </div>
                    </div>

                    <div class="pt-6 relative z-10">
                        <a href="/b2b" class="w-full py-3.5 bg-red-600 hover:bg-red-700 text-white font-bold text-xs uppercase tracking-wider rounded-full text-center block transition-all shadow-lg shadow-red-600/30">
                            Apply for Store Dealership &rarr;
                        </a>
                    </div>
                </div>

            </div>

        </section>

        <!-- ========================================================================= -->
        <!-- SECTION 4: POPULAR JEANS CUTS (Nomadra Cards Style) -->
        <!-- ========================================================================= -->
        <section id="cuts" class="scroll-mt-28 space-y-6 pt-6">
            
            <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-4 px-2">
                <div class="space-y-2">
                    <span class="text-xs font-black uppercase tracking-wider text-red-600">JEANS ARCHIVE</span>
                    <h2 class="text-3xl sm:text-4xl font-extrabold text-zinc-950 uppercase tracking-tight">Popular Denim Fits</h2>
                    <p class="text-zinc-600 text-base max-w-xl">
                        Designed with comfortable fits and sturdy stitching that molds naturally to your body over time.
                    </p>
                </div>

                <a href="/b2b" class="text-sm font-bold text-red-600 hover:text-red-700 flex items-center gap-1">
                    <span>View Wholesale Carton Specs</span>
                    <span>&rarr;</span>
                </a>
            </div>

            <!-- 3 Core Cut Cards with Real Denim Photography -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                
                <!-- Cut 1: Raw Selvedge Straight Fit -->
                <div class="app-card overflow-hidden flex flex-col justify-between group border border-slate-200 hover:border-blue-900 transition-all">
                    <div>
                        <div class="relative aspect-[4/3] bg-slate-950 overflow-hidden">
                            <img src="{{ asset('images/denim-hero-fold.jpg') }}" alt="Seven Series Straight Cut Jeans" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                            <div class="absolute top-4 left-4">
                                <span class="px-3 py-1 rounded-full bg-slate-900/90 text-white text-[10px] font-black uppercase tracking-wider shadow-sm backdrop-blur-md border border-slate-700">
                                    14.5 OZ RAW SELVEDGE
                                </span>
                            </div>
                            <div class="absolute bottom-4 right-4">
                                <span class="px-2.5 py-0.5 rounded-full bg-red-600 text-white text-[9px] font-black uppercase tracking-wider">
                                    RED ID CUFF
                                </span>
                            </div>
                        </div>

                        <div class="p-6 space-y-3">
                            <div class="flex justify-between items-baseline">
                                <h3 class="text-xl font-bold text-zinc-950 group-hover:text-blue-950 transition-colors">Architectural Straight</h3>
                                <span class="text-xs font-bold text-red-600">Classic Fit</span>
                            </div>
                            <p class="text-zinc-600 text-sm leading-relaxed">
                                Pure deep indigo ring-spun cotton. Classic straight leg from hip to ankle. Hand-riveted copper hardware, golden chain stitching, and authentic red selvedge edge inside the cuff.
                            </p>
                        </div>
                    </div>

                    <div class="p-6 pt-0">
                        <a href="#stores" class="w-full py-3 bg-slate-900 hover:bg-red-600 text-white font-bold text-xs uppercase tracking-wider rounded-full text-center block transition-colors">
                            Find in Nearest Store
                        </a>
                    </div>
                </div>

                <!-- Cut 2: Sulfur Double Black Tapered Fit -->
                <div class="app-card overflow-hidden flex flex-col justify-between group border border-slate-200 hover:border-zinc-950 transition-all">
                    <div>
                        <div class="relative aspect-[4/3] bg-slate-950 overflow-hidden">
                            <img src="{{ asset('images/denim-black-fold.jpg') }}" alt="Seven Series Modern Tapered Jeans" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                            <div class="absolute top-4 left-4">
                                <span class="px-3 py-1 rounded-full bg-slate-900/90 text-white text-[10px] font-black uppercase tracking-wider shadow-sm backdrop-blur-md border border-slate-700">
                                    13.8 OZ DOUBLE BLACK
                                </span>
                            </div>
                            <div class="absolute bottom-4 right-4">
                                <span class="px-2.5 py-0.5 rounded-full bg-zinc-800 text-white text-[9px] font-black uppercase tracking-wider">
                                    SULFUR DYED
                                </span>
                            </div>
                        </div>

                        <div class="p-6 space-y-3">
                            <div class="flex justify-between items-baseline">
                                <h3 class="text-xl font-bold text-zinc-950 group-hover:text-red-600 transition-colors">Modern Tapered</h3>
                                <span class="text-xs font-bold text-red-600">Slim Leg</span>
                            </div>
                            <p class="text-zinc-600 text-sm leading-relaxed">
                                Yarn-dyed in deep sulfur black that never washes out to gray. Roomy in the thigh with a clean narrow taper down to the shoe. Matte gunmetal hardware and triple back yoke seams.
                            </p>
                        </div>
                    </div>

                    <div class="p-6 pt-0">
                        <a href="#stores" class="w-full py-3 bg-slate-900 hover:bg-red-600 text-white font-bold text-xs uppercase tracking-wider rounded-full text-center block transition-colors">
                            Find in Nearest Store
                        </a>
                    </div>
                </div>

                <!-- Cut 3: Factory Wash Heavy Utility Fit -->
                <div class="app-card overflow-hidden flex flex-col justify-between group border border-slate-200 hover:border-blue-900 transition-all">
                    <div>
                        <div class="relative aspect-[4/3] bg-slate-950 overflow-hidden">
                            <img src="{{ asset('images/jeans-product.jpg') }}" alt="Seven Series Heavy Utility Jeans" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                            <div class="absolute top-4 left-4">
                                <span class="px-3 py-1 rounded-full bg-slate-900/90 text-white text-[10px] font-black uppercase tracking-wider shadow-sm backdrop-blur-md border border-slate-700">
                                    14.0 OZ VINTAGE WASH
                                </span>
                            </div>
                            <div class="absolute bottom-4 right-4">
                                <span class="px-2.5 py-0.5 rounded-full bg-blue-700 text-white text-[9px] font-black uppercase tracking-wider">
                                    FACTORY PRODUCED
                                </span>
                            </div>
                        </div>

                        <div class="p-6 space-y-3">
                            <div class="flex justify-between items-baseline">
                                <h3 class="text-xl font-bold text-zinc-950 group-hover:text-blue-950 transition-colors">Factory Vintage Wash</h3>
                                <span class="text-xs font-bold text-red-600">Extra Durable</span>
                            </div>
                            <p class="text-zinc-600 text-sm leading-relaxed">
                                Real factory-washed heavy cotton denim with authentic hand-abraded whiskers, reinforced pocket bags, and triple-needle chain stitching. Built tough for daily riding and workwear.
                            </p>
                        </div>
                    </div>

                    <div class="p-6 pt-0">
                        <a href="#stores" class="w-full py-3 bg-slate-900 hover:bg-red-600 text-white font-bold text-xs uppercase tracking-wider rounded-full text-center block transition-colors">
                            Find in Nearest Store
                        </a>
                    </div>
                </div>

            </div>

        </section>

        <!-- ========================================================================= -->
        <!-- SECTION 5: INTERACTIVE WEAVE INSPECTOR (Tactile Loupe Widget) -->
        <!-- ========================================================================= -->
        <section id="fabric" class="scroll-mt-28 space-y-6 pt-6">
            
            <div class="app-card p-6 sm:p-10 bg-white border border-slate-200">
                
                <div class="grid lg:grid-cols-12 gap-8 items-center">
                    
                    <div class="lg:col-span-6 space-y-4">
                        <span class="text-xs font-black uppercase tracking-wider text-red-600">MICROSCOPIC WEAVE</span>
                        <h2 class="text-3xl sm:text-4xl font-extrabold text-zinc-950 uppercase tracking-tight">
                            Why Our Fabric Outlasts Normal Jeans
                        </h2>
                        <p class="text-zinc-600 text-base leading-relaxed">
                            Many commercial jeans use thin cotton mixed with cheap plastic stretch threads that tear after a few months. Seven Series uses thick ring-spun cotton woven tightly on authentic shuttle looms.
                        </p>
                        
                        <div class="space-y-2 pt-2 text-sm text-zinc-700 font-medium">
                            <div class="p-3.5 rounded-2xl bg-slate-50 border border-slate-200 flex items-center justify-between">
                                <span>No Synthetic Stretch Blends</span>
                                <span class="font-bold text-blue-950">100% Pure Cotton</span>
                            </div>
                            <div class="p-3.5 rounded-2xl bg-slate-50 border border-slate-200 flex items-center justify-between">
                                <span>Triple-Needle Chain Stitching</span>
                                <span class="font-bold text-zinc-950">Seams Never Rip</span>
                            </div>
                            <div class="p-3.5 rounded-2xl bg-slate-50 border border-slate-200 flex items-center justify-between">
                                <span>Solid Brass & Copper Rivets</span>
                                <span class="font-bold text-amber-800">Cast Alloy</span>
                            </div>
                        </div>
                    </div>

                    <div class="lg:col-span-6">
                        <div class="rounded-3xl overflow-hidden border border-slate-200 relative group cursor-crosshair shadow-lg" id="specimen-loupe-card">
                            <div class="aspect-[16/10] bg-zinc-950 relative">
                                <img src="{{ asset('images/craft.jpg') }}" alt="Raw Fabric Structure" class="w-full h-full object-cover">
                                <div class="absolute bottom-4 left-4 px-3 py-1.5 rounded-full bg-slate-900/90 text-white text-[10px] font-bold backdrop-blur-md border border-slate-700">
                                    Hover or touch to magnify selvedge weave
                                </div>
                            </div>

                            <!-- Loupe Lens -->
                            <div id="specimen-loupe-lens" class="pointer-events-none absolute top-0 left-0 w-40 h-40 rounded-full border-2 border-red-600 shadow-2xl overflow-hidden opacity-0 z-30 bg-zinc-950">
                                <div id="specimen-loupe-zoom" class="w-full h-full scale-125" style="background-image: url('{{ asset('images/craft.jpg') }}'); background-size: 350%; background-repeat: no-repeat;"></div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </section>

        <!-- ========================================================================= -->
        <!-- SECTION 6: FACTORY PRODUCTION & WHOLESALE CONTRACTS -->
        <!-- ========================================================================= -->
        <section id="factory" class="scroll-mt-28 space-y-6 pt-6">
            
            <div class="app-card p-5 sm:p-10 bg-zinc-950 text-white relative overflow-hidden">
                <div class="absolute -right-20 -bottom-20 w-80 h-80 bg-red-600/20 rounded-full blur-3xl"></div>

                <div class="grid lg:grid-cols-12 gap-8 items-center relative z-10">
                    
                    <div class="lg:col-span-7 space-y-4">
                        <span class="text-xs font-black uppercase tracking-wider text-red-500">INDUSTRIAL APPAREL PLANT</span>
                        <h2 class="text-3xl sm:text-4xl font-extrabold text-white uppercase tracking-tight">
                            Direct Factory Supply for Wholesalers
                        </h2>
                        <p class="text-zinc-400 text-base leading-relaxed">
                            We are not a middleman trading agency. Seven Series owns and operates an active garment plant with automated cutting machines, skilled stitching masters, and direct freight shipping for volume buyers.
                        </p>

                        <div class="grid sm:grid-cols-2 gap-3 pt-2 text-xs">
                            <div class="p-3.5 rounded-2xl bg-zinc-900 border border-zinc-800">
                                <strong class="block text-white font-bold text-sm">Computer Laser Cutting</strong>
                                <span class="text-zinc-400">Guarantees precise measurements across every size.</span>
                            </div>
                            <div class="p-3.5 rounded-2xl bg-zinc-900 border border-zinc-800">
                                <strong class="block text-white font-bold text-sm">Custom Private Label</strong>
                                <span class="text-zinc-400">Custom leather back patches, buttons, and store tags.</span>
                            </div>
                        </div>

                        <div class="pt-2 flex flex-col sm:flex-row items-stretch sm:items-center gap-3">
                            <a href="/b2b" class="inline-flex items-center justify-center gap-2 px-6 sm:px-7 py-3.5 bg-red-600 hover:bg-red-700 text-white text-xs font-bold uppercase tracking-wider rounded-full shadow-lg shadow-red-600/30 transition-all text-center">
                                <span>Go to Wholesale Portal & Request Pricing</span>
                                <span>&rarr;</span>
                            </a>
                            <a href="/contact" class="inline-flex items-center justify-center gap-2 px-5 py-3.5 bg-zinc-900 hover:bg-zinc-800 border border-zinc-700 text-white text-xs font-bold uppercase tracking-wider rounded-full transition-all text-center">
                                <svg class="w-4 h-4 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                <span>Factory Location & Contact Us</span>
                            </a>
                        </div>
                    </div>

                    <div class="lg:col-span-5">
                        <div class="rounded-2xl overflow-hidden border border-zinc-800 shadow-2xl">
                            <img src="{{ asset('images/facility.jpg') }}" alt="Seven Series Industrial Facility" class="w-full h-72 object-cover">
                        </div>
                    </div>

                </div>

            </div>

        </section>

    </main>

    <x-footer />
</x-layout>