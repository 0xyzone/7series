<x-layout>
    <x-slot:title>Seven Series | Authentic Denim Clothing Brand & Garment Factory</x-slot>

    <x-nav transparent="true" />

    <main class="min-h-screen pt-24 sm:pt-28 pb-32 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto space-y-12 sm:space-y-16">

        <!-- ========================================================================= -->
        <!-- SECTION 1: HERO APP ONBOARDING (Nomadra App Showcase Style + 3D Brand Symbol) -->
        <!-- ========================================================================= -->
        <section id="hero" class="relative">
            
            <!-- Main Hero App Board (28px Rounded Canvas) -->
            <div class="app-card p-6 sm:p-10 lg:p-12 relative overflow-hidden bg-gradient-to-br from-white via-white to-zinc-50">
                
                <!-- Ambient Red Aura -->
                <div class="absolute -right-20 -top-20 w-96 h-96 bg-red-600/10 rounded-full blur-3xl pointer-events-none" data-parallax="0.15"></div>
                <div class="absolute -left-16 bottom-0 w-80 h-80 bg-red-600/5 rounded-full blur-2xl pointer-events-none" data-parallax="-0.1"></div>

                <div class="grid lg:grid-cols-12 gap-8 lg:gap-12 items-center relative z-10">
                    
                    <!-- Left: Human, Simple Introduction -->
                    <div class="lg:col-span-7 space-y-6">
                        
                        <!-- Top Status Pill -->
                        <div class="inline-flex items-center gap-2.5 px-4 py-2 rounded-full bg-red-50 border border-red-200 text-red-600 text-xs font-black tracking-wider uppercase">
                            <span class="w-2 h-2 rounded-full bg-red-600 animate-pulse"></span>
                            <span>OFFICIAL CLOTHING BRAND</span>
                            <span class="text-zinc-400 font-mono text-[10px]">| GARMENT FACTORY</span>
                        </div>

                        <!-- Big Clear Headline -->
                        <div class="space-y-2">
                            <h1 class="text-4xl sm:text-6xl xl:text-7xl font-extrabold tracking-tight text-zinc-950 uppercase leading-[1.02]">
                                REAL HEAVY <br>
                                <span class="text-red-600">DENIM JEANS.</span>
                            </h1>
                            <p class="text-xl sm:text-2xl font-bold text-zinc-500 tracking-tight">
                                Built tough to last for years.
                            </p>
                        </div>

                        <!-- Friendly Simple Human Copy -->
                        <p class="text-zinc-600 text-base sm:text-lg leading-relaxed max-w-xl font-normal">
                            <strong class="text-zinc-950 font-bold">Seven Series</strong> is an authentic clothing brand and denim manufacturing factory. We make tough, heavy cotton jeans, jackets, and casual clothing. You can purchase our clothes at our official retail shops, or order bulk wholesale supplies directly for your clothing store.
                        </p>

                        <!-- Action Buttons (App Pill Style) -->
                        <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-3 pt-2">
                            <a href="#stores" class="px-6 py-3.5 bg-red-600 hover:bg-red-700 text-white font-bold text-sm tracking-wide rounded-full shadow-lg shadow-red-600/25 transition-all flex items-center justify-center gap-2 hover:scale-105 active:scale-95 text-center">
                                <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                <span>Find a Store Near You</span>
                            </a>

                            <a href="/b2b" class="px-6 py-3.5 bg-zinc-100 hover:bg-zinc-200 text-zinc-900 font-bold text-sm tracking-wide rounded-full transition-all border border-zinc-200 hover:scale-105 active:scale-95 flex items-center justify-center gap-2 text-center">
                                <span>Wholesale for Store Owners</span>
                                <span>&rarr;</span>
                            </a>
                        </div>

                        <!-- Quick Badges Row -->
                        <div class="flex flex-wrap items-center gap-4 pt-4 border-t border-zinc-100 text-xs text-zinc-500 font-medium">
                            <span class="inline-flex items-center gap-1.5">
                                <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                100% Pure Ring-Spun Cotton
                            </span>
                            <span class="inline-flex items-center gap-1.5">
                                <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                Physical Stores Nationwide
                            </span>
                            <span class="inline-flex items-center gap-1.5">
                                <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                Direct Factory Dispatch
                            </span>
                        </div>

                    </div>

                    <!-- Right: Exact Brand Symbol 3D Model Widget -->
                    <div class="lg:col-span-5 relative">
                        
                        <div class="app-card rounded-3xl overflow-hidden border border-zinc-200/90 bg-white shadow-xl">
                            
                            <!-- Widget Header -->
                            <div class="px-4 sm:px-5 py-3.5 bg-zinc-50 border-b border-zinc-100 flex items-center justify-between text-xs">
                                <div class="flex items-center gap-2 font-bold text-zinc-800">
                                    <span class="w-2 h-2 rounded-full bg-red-600 animate-pulse"></span>
                                    <span>3D Brand Emblem</span>
                                </div>
                                <span class="px-2 py-0.5 rounded-full bg-red-100 text-red-600 text-[10px] font-bold">
                                    TOUCH TO ROTATE
                                </span>
                            </div>

                            <!-- 3D Canvas Viewport -->
                            <div id="hero-3d-container" class="relative w-full h-[360px] sm:h-[440px] cursor-grab bg-gradient-to-b from-white to-zinc-50 select-none">
                                <canvas id="hero-3d-canvas" class="w-full h-full block"></canvas>

                                <!-- Drag Hint Pill -->
                                <div class="absolute bottom-4 inset-x-4 pointer-events-none flex justify-center">
                                    <div class="px-3.5 py-1.5 rounded-full bg-white/90 shadow-md border border-zinc-200 text-[11px] font-bold text-zinc-600 flex items-center gap-2 backdrop-blur-md">
                                        <svg class="w-3.5 h-3.5 text-red-600 animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 11.5V14m0-2.5v-6a1.5 1.5 0 113 0m-3 6a1.5 1.5 0 00-3 0v2a7.5 7.5 0 0015 0v-5a1.5 1.5 0 00-3 0m-6-3V11m0-5.5v-1a1.5 1.5 0 013 0v1m0 0V11"/></svg>
                                        <span>Drag in 360° to view emblem details</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Widget Controls -->
                            <div class="px-3.5 sm:px-5 py-3 bg-white border-t border-zinc-100 flex flex-wrap items-center justify-between gap-2">
                                <div class="flex items-center gap-2">
                                    <button id="btn-3d-wireframe" type="button" class="px-3 py-1.5 rounded-full bg-zinc-100 hover:bg-red-50 hover:text-red-600 text-[11px] font-bold text-zinc-700 transition-colors">
                                        Toggle Wireframe
                                    </button>
                                    <button id="btn-3d-reset" type="button" class="px-3 py-1.5 rounded-full bg-zinc-100 hover:bg-zinc-200 text-[11px] font-bold text-zinc-700 transition-colors">
                                        Reset Position
                                    </button>
                                </div>
                                <span class="hidden sm:inline text-[10px] text-zinc-400 font-mono">SEVEN SERIES EMBLEM</span>
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </section>

        <!-- ========================================================================= -->
        <!-- SECTION 2: LIVE FABRIC & CAPACITY METRICS (Aeris Weather Cards Style) -->
        <!-- ========================================================================= -->
        <section id="fabric-metrics" class="space-y-4">
            
            <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-4 px-2">
                <div>
                    <span class="text-xs font-black uppercase tracking-wider text-red-600">PRODUCTION SPECS</span>
                    <h2 class="text-2xl sm:text-3xl font-extrabold text-zinc-950 uppercase tracking-tight">Factory Numbers & Craft</h2>
                </div>
                <p class="text-xs sm:text-sm text-zinc-500 max-w-sm">Every pair of jeans is crafted with high-density cotton yarn and reinforced stitching.</p>
            </div>

            <!-- 4 Rounded App Metric Widgets -->
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-6">
                
                <!-- Metric 1 -->
                <div class="app-card p-4 sm:p-6 bg-white space-y-2.5 sm:space-y-3">
                    <div class="flex items-center justify-between text-xs text-zinc-500 font-medium">
                        <span class="truncate">Loom Weight</span>
                        <span class="w-2 h-2 rounded-full bg-red-600 shrink-0"></span>
                    </div>
                    <div>
                        <div class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-zinc-950">
                            <span class="stat-counter" data-target="14.5" data-decimals="1" data-suffix=" oz">14.5 oz</span>
                        </div>
                        <p class="text-[11px] sm:text-xs text-zinc-500 mt-1 truncate">Heavy raw shuttle denim</p>
                    </div>
                    <div class="w-full bg-zinc-100 h-1.5 rounded-full overflow-hidden">
                        <div class="bg-red-600 h-full rounded-full w-[85%]"></div>
                    </div>
                </div>

                <!-- Metric 2 -->
                <div class="app-card p-4 sm:p-6 bg-white space-y-2.5 sm:space-y-3">
                    <div class="flex items-center justify-between text-xs text-zinc-500 font-medium">
                        <span class="truncate">Factory Output</span>
                        <span class="w-2 h-2 rounded-full bg-red-600 shrink-0"></span>
                    </div>
                    <div>
                        <div class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-red-600">
                            <span class="stat-counter" data-target="480000" data-decimals="0" data-suffix="+">480,000+</span>
                        </div>
                        <p class="text-[11px] sm:text-xs text-zinc-500 mt-1 truncate">Monthly denim production</p>
                    </div>
                    <div class="w-full bg-zinc-100 h-1.5 rounded-full overflow-hidden">
                        <div class="bg-red-600 h-full rounded-full w-[95%]"></div>
                    </div>
                </div>

                <!-- Metric 3 -->
                <div class="app-card p-4 sm:p-6 bg-white space-y-2.5 sm:space-y-3">
                    <div class="flex items-center justify-between text-xs text-zinc-500 font-medium">
                        <span class="truncate">Cotton Purity</span>
                        <span class="w-2 h-2 rounded-full bg-green-600 shrink-0"></span>
                    </div>
                    <div>
                        <div class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-zinc-950">
                            <span class="stat-counter" data-target="100" data-decimals="0" data-suffix="%">100%</span>
                        </div>
                        <p class="text-[11px] sm:text-xs text-zinc-500 mt-1 truncate">Pure ring-spun staple</p>
                    </div>
                    <div class="w-full bg-zinc-100 h-1.5 rounded-full overflow-hidden">
                        <div class="bg-green-600 h-full rounded-full w-full"></div>
                    </div>
                </div>

                <!-- Metric 4 -->
                <div class="app-card p-4 sm:p-6 bg-white space-y-2.5 sm:space-y-3">
                    <div class="flex items-center justify-between text-xs text-zinc-500 font-medium">
                        <span class="truncate">Indigo Baths</span>
                        <span class="w-2 h-2 rounded-full bg-red-600 shrink-0"></span>
                    </div>
                    <div>
                        <div class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-zinc-950">
                            <span class="stat-counter" data-target="12" data-decimals="0" data-suffix=" Dips">12 Dips</span>
                        </div>
                        <p class="text-[11px] sm:text-xs text-zinc-500 mt-1 truncate">Rope dye saturation</p>
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
        <section id="stores" class="space-y-6 pt-6">
            
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
        <section id="cuts" class="space-y-6 pt-6">
            
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

            <!-- 3 Core Cut Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                
                <!-- Cut 1: Straight Fit -->
                <div class="app-card overflow-hidden flex flex-col justify-between group">
                    <div>
                        <div class="relative aspect-[4/3] bg-zinc-100 overflow-hidden">
                            <img src="{{ asset('images/collection-1.png') }}" alt="Straight Cut Jeans" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                            <div class="absolute top-4 left-4">
                                <span class="px-3 py-1 rounded-full bg-white/95 text-zinc-950 text-[10px] font-black uppercase tracking-wider shadow-sm">
                                    14.5 OZ RAW DENIM
                                </span>
                            </div>
                        </div>

                        <div class="p-6 space-y-3">
                            <div class="flex justify-between items-baseline">
                                <h3 class="text-xl font-bold text-zinc-950">Architectural Straight</h3>
                                <span class="text-xs font-bold text-red-600">Classic Fit</span>
                            </div>
                            <p class="text-zinc-600 text-sm leading-relaxed">
                                A classic straight leg from hip to ankle. Perfect for daily wear and sturdy enough for work. Genuine red selvedge edge inside the cuff.
                            </p>
                        </div>
                    </div>

                    <div class="p-6 pt-0">
                        <a href="#stores" class="w-full py-3 bg-zinc-100 hover:bg-red-600 hover:text-white text-zinc-900 font-bold text-xs uppercase tracking-wider rounded-full text-center block transition-colors">
                            Find in Nearest Store
                        </a>
                    </div>
                </div>

                <!-- Cut 2: Tapered Fit -->
                <div class="app-card overflow-hidden flex flex-col justify-between group">
                    <div>
                        <div class="relative aspect-[4/3] bg-zinc-100 overflow-hidden">
                            <img src="{{ asset('images/collection-2.png') }}" alt="Modern Tapered Jeans" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                            <div class="absolute top-4 left-4">
                                <span class="px-3 py-1 rounded-full bg-white/95 text-zinc-950 text-[10px] font-black uppercase tracking-wider shadow-sm">
                                    13.8 OZ DOUBLE BLACK
                                </span>
                            </div>
                        </div>

                        <div class="p-6 space-y-3">
                            <div class="flex justify-between items-baseline">
                                <h3 class="text-xl font-bold text-zinc-950">Modern Tapered</h3>
                                <span class="text-xs font-bold text-red-600">Slim Leg</span>
                            </div>
                            <p class="text-zinc-600 text-sm leading-relaxed">
                                Roomy through the thigh with a clean narrow taper down to the shoe. Dyed in deep solid black that keeps its dark color wash after wash.
                            </p>
                        </div>
                    </div>

                    <div class="p-6 pt-0">
                        <a href="#stores" class="w-full py-3 bg-zinc-100 hover:bg-red-600 hover:text-white text-zinc-900 font-bold text-xs uppercase tracking-wider rounded-full text-center block transition-colors">
                            Find in Nearest Store
                        </a>
                    </div>
                </div>

                <!-- Cut 3: Heavy Workwear Fit -->
                <div class="app-card overflow-hidden flex flex-col justify-between group">
                    <div>
                        <div class="relative aspect-[4/3] bg-zinc-100 overflow-hidden">
                            <img src="{{ asset('images/collection-3.png') }}" alt="Heavy Workwear Denim" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                            <div class="absolute top-4 left-4">
                                <span class="px-3 py-1 rounded-full bg-white/95 text-zinc-950 text-[10px] font-black uppercase tracking-wider shadow-sm">
                                    15.2 OZ ARMOR GRADE
                                </span>
                            </div>
                        </div>

                        <div class="p-6 space-y-3">
                            <div class="flex justify-between items-baseline">
                                <h3 class="text-xl font-bold text-zinc-950">Heavy Utility Cut</h3>
                                <span class="text-xs font-bold text-red-600">Extra Durable</span>
                            </div>
                            <p class="text-zinc-600 text-sm leading-relaxed">
                                Extra thick denim with reinforced knees, triple stitched back seams, and solid brass hardware. Made for riding and heavy outdoor use.
                            </p>
                        </div>
                    </div>

                    <div class="p-6 pt-0">
                        <a href="#stores" class="w-full py-3 bg-zinc-100 hover:bg-red-600 hover:text-white text-zinc-900 font-bold text-xs uppercase tracking-wider rounded-full text-center block transition-colors">
                            Find in Nearest Store
                        </a>
                    </div>
                </div>

            </div>

        </section>

        <!-- ========================================================================= -->
        <!-- SECTION 5: INTERACTIVE WEAVE INSPECTOR (Tactile Loupe Widget) -->
        <!-- ========================================================================= -->
        <section id="fabric" class="space-y-6 pt-6">
            
            <div class="app-card p-6 sm:p-10 bg-white">
                
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
                            <div class="p-3.5 rounded-2xl bg-zinc-50 border border-zinc-200 flex items-center justify-between">
                                <span>No Synthetic Stretch Blends</span>
                                <span class="font-bold text-red-600">100% Cotton</span>
                            </div>
                            <div class="p-3.5 rounded-2xl bg-zinc-50 border border-zinc-200 flex items-center justify-between">
                                <span>Triple-Needle Chain Stitching</span>
                                <span class="font-bold text-zinc-950">Seams Never Rip</span>
                            </div>
                            <div class="p-3.5 rounded-2xl bg-zinc-50 border border-zinc-200 flex items-center justify-between">
                                <span>Solid Brass & Copper Rivets</span>
                                <span class="font-bold text-zinc-950">Cast Alloy</span>
                            </div>
                        </div>
                    </div>

                    <div class="lg:col-span-6">
                        <div class="rounded-3xl overflow-hidden border border-zinc-200 relative group cursor-crosshair" id="specimen-loupe-card">
                            <div class="aspect-[16/10] bg-zinc-950 relative">
                                <img src="{{ asset('images/craft.png') }}" alt="Raw Fabric Structure" class="w-full h-full object-cover">
                                <div class="absolute bottom-4 left-4 px-3 py-1.5 rounded-full bg-black/80 text-white text-[10px] font-bold">
                                    Hover or touch to magnify weave
                                </div>
                            </div>

                            <!-- Loupe Lens -->
                            <div id="specimen-loupe-lens" class="pointer-events-none absolute top-0 left-0 w-36 h-36 rounded-full border-2 border-red-600 shadow-2xl overflow-hidden opacity-0 z-30 bg-zinc-950">
                                <div id="specimen-loupe-zoom" class="w-full h-full bg-twill-matrix scale-150"></div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </section>

        <!-- ========================================================================= -->
        <!-- SECTION 6: FACTORY PRODUCTION & WHOLESALE CONTRACTS -->
        <!-- ========================================================================= -->
        <section id="factory" class="space-y-6 pt-6">
            
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

                        <div class="pt-2">
                            <a href="/b2b" class="inline-flex items-center justify-center gap-2 px-6 sm:px-7 py-3.5 bg-red-600 hover:bg-red-700 text-white text-xs font-bold uppercase tracking-wider rounded-full shadow-lg shadow-red-600/30 transition-all w-full sm:w-auto text-center">
                                <span>Go to Wholesale Portal & Request Pricing</span>
                                <span>&rarr;</span>
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