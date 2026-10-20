<x-layout>
    <x-slot:title>Seven Series | Authentic Denim Clothing Brand & Garment Industry</x-slot>

    <x-nav transparent="true" />

    <!-- ========================================================================= -->
    <!-- SECTION 1: HERO ATELIER (Asymmetrical Dynamic Layout + Interactive 3D Monolith) -->
    <!-- ========================================================================= -->
    <section id="hero-section" class="min-h-screen relative flex items-center pt-28 pb-20 bg-white dark:bg-[#09090b] text-zinc-950 dark:text-zinc-50 overflow-hidden transition-colors duration-500">
        
        <!-- Organic Parallax Background Layers -->
        <div class="absolute inset-0 pointer-events-none z-0 overflow-hidden select-none">
            <div class="absolute -right-24 -top-24 w-[650px] h-[650px] bg-red-600/10 dark:bg-red-600/15 blur-[160px] rounded-full" data-parallax="0.15"></div>
            <div class="absolute left-1/4 bottom-10 w-[500px] h-[500px] bg-red-600/5 dark:bg-red-600/10 blur-[130px] rounded-full" data-parallax="-0.1"></div>
            <div class="absolute inset-0 tech-grid opacity-50"></div>

            <!-- Parallax Floating 7 Symbols & Geometric Watermarks -->
            <img src="{{ asset('images/brand/logo-symbol.png') }}" alt="" class="absolute -right-16 top-1/6 w-[560px] h-[680px] opacity-[0.03] dark:opacity-[0.045] rotate-12 pointer-events-none" data-parallax="0.25">
            <img src="{{ asset('images/brand/logo-symbol.png') }}" alt="" class="absolute -left-20 bottom-10 w-[420px] h-[520px] opacity-[0.02] dark:opacity-[0.035] -rotate-6 pointer-events-none" data-parallax="-0.2">

            <!-- Asymmetrical Industrial Atelier Stamp -->
            <div class="floating-stamp absolute top-36 right-1/4 z-10 hidden xl:flex items-center gap-2 px-3 py-1.5 rounded-md bg-white/80 dark:bg-zinc-900/80 border border-zinc-300 dark:border-zinc-800 backdrop-blur-md shadow-sm text-[10px] font-mono text-zinc-600 dark:text-zinc-400">
                <span class="w-1.5 h-1.5 rounded-full bg-red-600"></span>
                <span>LOT: 007 // 14.5 OZ WEAVE // PASSED</span>
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-6 relative z-10 w-full pt-4">
            
            <div class="grid lg:grid-cols-12 gap-12 lg:gap-8 items-center">
                
                <!-- Left Narrative Column (Editorial & Grounded) -->
                <div class="lg:col-span-7 space-y-8 relative">
                    
                    <!-- Authentic Brand Badge -->
                    <div class="hero-badge inline-flex items-center gap-3 px-4 py-2 rounded-full bg-red-50 dark:bg-red-950/40 border border-red-200 dark:border-red-900/60 text-red-600 text-xs font-black tracking-widest uppercase shadow-sm">
                        <span class="w-2 h-2 rounded-full bg-red-600 animate-ping"></span>
                        <span>SEVEN SERIES GARMENT INDUSTRY</span>
                        <span class="text-zinc-400 dark:text-zinc-600 font-mono text-[10px]">| AUTHENTIC DENIM</span>
                    </div>

                    <!-- Kinetic Typography Title -->
                    <div class="space-y-2">
                        <h1 class="text-5xl sm:text-7xl xl:text-8xl font-black tracking-tighter leading-[0.92] uppercase">
                            <span class="hero-title-line block text-zinc-950 dark:text-white">PURE HEAVY</span>
                            <span class="hero-title-line block text-zinc-900 dark:text-zinc-100">SELVEDGE <span class="text-red-600 text-glow">DENIM.</span></span>
                            <span class="hero-title-line block text-zinc-400 dark:text-zinc-500 text-3xl sm:text-5xl xl:text-6xl font-extrabold tracking-tight mt-1">BUILT TO OUTLIVE FAST FASHION.</span>
                        </h1>
                    </div>

                    <!-- Human, Authentic Brand Positioning -->
                    <p class="hero-narrative text-zinc-600 dark:text-zinc-300 text-lg sm:text-xl font-medium max-w-2xl leading-relaxed">
                        <strong class="text-zinc-950 dark:text-white font-black">Seven Series</strong> is an authentic jeanswear and denim apparel brand. We manufacture heavy raw ring-spun jeans, jackets, and industrial apparel — supplying wholesale inventory to retailers and welcoming denim enthusiasts to our official retail outlets.
                    </p>

                    <!-- Interactive Action Buttons -->
                    <div class="hero-cta-group flex flex-wrap items-center gap-4 pt-2">
                        <a href="/b2b" class="btn-magnetic px-8 py-4 bg-red-600 hover:bg-red-700 text-white font-black text-xs sm:text-sm tracking-widest uppercase rounded-xl transition-all shadow-xl shadow-red-600/30 flex items-center gap-3 group">
                            <span>Wholesale & Bulk Supply</span>
                            <svg class="w-4 h-4 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                        </a>
                        
                        <a href="#stores" class="btn-magnetic px-7 py-4 bg-white dark:bg-zinc-900 text-zinc-950 dark:text-white border-2 border-zinc-950 dark:border-zinc-700 font-black text-xs sm:text-sm tracking-widest uppercase rounded-xl transition-all hover:border-red-600 hover:text-red-600 flex items-center gap-2">
                            <span>Find Official Retail Stores</span>
                            <span class="w-1.5 h-1.5 rounded-full bg-red-600"></span>
                        </a>

                        <a href="#exhibition" class="px-4 py-4 text-xs font-black uppercase tracking-widest text-zinc-500 dark:text-zinc-400 hover:text-red-600 transition-colors flex items-center gap-1.5">
                            <span>Browse Cuts</span>
                            <span>&darr;</span>
                        </a>
                    </div>

                    <!-- Live Factory Telemetry Numbers -->
                    <div class="grid grid-cols-2 sm:grid-cols-4 gap-6 pt-8 border-t border-zinc-200 dark:border-zinc-800">
                        <div class="hero-telemetry-item">
                            <div class="text-3xl sm:text-4xl font-black text-zinc-950 dark:text-white">
                                <span class="stat-counter" data-target="14.5" data-decimals="1" data-suffix="oz">14.5oz</span>
                            </div>
                            <div class="text-[10px] font-black text-zinc-500 uppercase tracking-widest mt-1">Japanese Shuttle Loom</div>
                        </div>

                        <div class="hero-telemetry-item">
                            <div class="text-3xl sm:text-4xl font-black text-red-600">
                                <span class="stat-counter" data-target="480000" data-decimals="0" data-suffix="+">480,000+</span>
                            </div>
                            <div class="text-[10px] font-black text-zinc-500 uppercase tracking-widest mt-1">Monthly Factory Output</div>
                        </div>

                        <div class="hero-telemetry-item">
                            <div class="text-3xl sm:text-4xl font-black text-zinc-950 dark:text-white">
                                <span class="stat-counter" data-target="100" data-decimals="0" data-suffix="%">100%</span>
                            </div>
                            <div class="text-[10px] font-black text-zinc-500 uppercase tracking-widest mt-1">Ring-Spun Cotton</div>
                        </div>

                        <div class="hero-telemetry-item">
                            <div class="text-3xl sm:text-4xl font-black text-red-600">
                                <span class="stat-counter" data-target="0" data-decimals="0" data-suffix="%">0%</span>
                            </div>
                            <div class="text-[10px] font-black text-zinc-500 uppercase tracking-widest mt-1">Synthetic Blends</div>
                        </div>
                    </div>

                </div>

                <!-- Right Column: Asymmetrical 3D Monolith & Floating Specimen Card -->
                <div class="lg:col-span-5 relative">
                    
                    <!-- Asymmetrical Angled Atelier Stamp Tag (Behind 3D Card) -->
                    <div class="floating-stamp absolute -top-6 -left-6 z-20 px-3 py-1.5 rounded-lg bg-red-600 text-white font-mono text-[9px] font-black uppercase tracking-widest shadow-xl -rotate-3 hidden sm:block">
                        ★ AUTHENTIC FACTORY APPAREL
                    </div>

                    <div class="relative group">
                        <!-- Red Backlight Ambient Aura -->
                        <div class="absolute -inset-4 bg-gradient-to-tr from-red-600/30 via-red-600/10 to-transparent blur-3xl rounded-3xl opacity-60 group-hover:opacity-100 transition-opacity duration-700"></div>

                        <!-- 3D Card Enclosure -->
                        <div class="relative z-10 rounded-3xl overflow-hidden border-2 border-zinc-950 dark:border-zinc-800 bg-zinc-100 dark:bg-zinc-900/90 shadow-2xl backdrop-blur-xl">
                            
                            <!-- Top Telemetry Header Strip -->
                            <div class="px-5 py-3.5 bg-zinc-200/70 dark:bg-zinc-950/80 border-b border-zinc-300 dark:border-zinc-800 flex items-center justify-between text-[11px] font-mono">
                                <div class="flex items-center gap-2">
                                    <span class="w-2 h-2 rounded-full bg-red-600 animate-pulse"></span>
                                    <span class="font-bold text-zinc-900 dark:text-zinc-200">INTERACTIVE 3D EMBLEM</span>
                                </div>
                                <span class="text-zinc-500 dark:text-zinc-400 uppercase tracking-wider text-[10px]">TUMBLING HARDWARE ENGINE</span>
                            </div>

                            <!-- Three.js Interactive 3D Canvas -->
                            <div id="hero-3d-container" class="relative w-full h-[460px] sm:h-[500px] cursor-3d-grab bg-gradient-to-b from-zinc-100/50 to-zinc-200/50 dark:from-[#09090b] dark:to-[#121216] select-none">
                                <canvas id="hero-3d-canvas" class="w-full h-full block"></canvas>

                                <!-- Interactive Instruction Badge -->
                                <div class="absolute bottom-4 left-4 pointer-events-none bg-white/90 dark:bg-zinc-950/90 border border-zinc-300 dark:border-zinc-800 rounded-lg px-3 py-1.5 text-[10px] font-mono text-zinc-600 dark:text-zinc-400 flex items-center gap-2 shadow-sm backdrop-blur-md">
                                    <svg class="w-3.5 h-3.5 text-red-600 animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 11.5V14m0-2.5v-6a1.5 1.5 0 113 0m-3 6a1.5 1.5 0 00-3 0v2a7.5 7.5 0 0015 0v-5a1.5 1.5 0 00-3 0m-6-3V11m0-5.5v-1a1.5 1.5 0 013 0v1m0 0V11"/></svg>
                                    <span>DRAG 360° // SCROLL TO TUMBLE HARDWARE</span>
                                </div>

                                <!-- Top Right Model Badge -->
                                <div class="absolute top-4 right-4 pointer-events-none">
                                    <span class="px-2.5 py-1 rounded bg-red-600 text-white font-mono text-[9px] font-black uppercase tracking-widest shadow-md">
                                        SEVEN SERIES MONOLITH
                                    </span>
                                </div>
                            </div>

                            <!-- 3D Viewport Controls Strip -->
                            <div class="px-5 py-3 bg-white dark:bg-zinc-950 border-t border-zinc-300 dark:border-zinc-800 flex items-center justify-between">
                                <div class="flex items-center gap-2">
                                    <button id="btn-3d-wireframe" type="button" class="px-3 py-1.5 rounded-lg border border-zinc-300 dark:border-zinc-700 hover:border-red-600 text-[10px] font-mono font-bold uppercase tracking-wider text-zinc-700 dark:text-zinc-300 transition-all">
                                        Wireframe CAD
                                    </button>
                                    <button id="btn-3d-reset" type="button" class="px-3 py-1.5 rounded-lg border border-zinc-300 dark:border-zinc-700 hover:border-red-600 text-[10px] font-mono font-bold uppercase tracking-wider text-zinc-700 dark:text-zinc-300 transition-all">
                                        Reset View
                                    </button>
                                </div>
                                <span class="text-[10px] font-mono text-zinc-400">TOUCH & MOUSE ENABLED</span>
                            </div>

                        </div>
                    </div>

                    <!-- Offset Floating Fabric Tag (Asymmetrical Overlap) -->
                    <div class="floating-stamp absolute -bottom-6 -right-4 z-20 p-4 bg-white dark:bg-zinc-900 border-2 border-zinc-950 dark:border-zinc-700 rounded-2xl shadow-2xl rotate-2 hidden sm:block max-w-[210px]">
                        <div class="flex items-center gap-2 mb-1">
                            <span class="w-2 h-2 rounded-full bg-red-600"></span>
                            <span class="text-[9px] font-mono uppercase font-bold text-zinc-400">RAW SPEC // 01</span>
                        </div>
                        <p class="text-xs font-black uppercase text-zinc-950 dark:text-white leading-tight">Authentic Red-Line Japanese Selvedge</p>
                    </div>

                </div>

            </div>

        </div>
    </section>

    <!-- ========================================================================= -->
    <!-- SECTION 2: CONTINUOUS MARQUEE TICKER -->
    <!-- ========================================================================= -->
    <div class="bg-red-600 py-3.5 overflow-hidden text-white select-none border-y-2 border-zinc-950 dark:border-zinc-800">
        <div class="flex whitespace-nowrap animate-marquee">
            @for ($i = 0; $i < 6; $i++)
                <span class="text-xs sm:text-sm font-black uppercase tracking-[0.25em] inline-flex items-center gap-6 px-6">
                    <span>SEVEN SERIES GARMENT INDUSTRY</span>
                    <span class="w-2 h-2 rounded-full bg-white"></span>
                    <span>14.5 OZ JAPANESE SHUTTLE LOOM</span>
                    <span class="w-2 h-2 rounded-full bg-white"></span>
                    <span>WHOLESALE DISTRIBUTION & RETAIL STORES</span>
                    <span class="w-2 h-2 rounded-full bg-white"></span>
                    <span>OFFICIAL BRAND OUTLETS</span>
                    <span class="w-2 h-2 rounded-full bg-white"></span>
                    <span>PURE INDIGO 12-DIP ROPE WEAVE</span>
                    <span class="w-2 h-2 rounded-full bg-white"></span>
                </span>
            @endfor
        </div>
    </div>

    <!-- ========================================================================= -->
    <!-- SECTION 3: WHERE TO FIND US (Official Retail Stores & Authorized Stockists) -->
    <!-- ========================================================================= -->
    <section id="stores" class="py-28 bg-zinc-50 dark:bg-[#0c0c0e] border-b border-zinc-200 dark:border-zinc-900 transition-colors duration-500 relative">
        
        <!-- Subtle Parallax Background Watermark -->
        <div class="absolute right-0 top-1/3 opacity-[0.03] dark:opacity-[0.04] pointer-events-none text-9xl font-black font-mono select-none" data-parallax="0.2">
            STORES
        </div>

        <div class="max-w-7xl mx-auto px-6 relative z-10">
            
            <div class="flex flex-col md:flex-row justify-between items-start md:items-end gap-6 mb-12">
                <div class="space-y-3">
                    <div class="inline-block px-3 py-1 bg-red-100 dark:bg-red-950/40 border border-red-200 dark:border-red-900/60 rounded-full text-red-600 text-xs font-black tracking-widest uppercase">
                        PHYSICAL LOCATIONS & OUTLETS
                    </div>
                    <h2 class="text-4xl sm:text-5xl font-black tracking-tight text-zinc-950 dark:text-white uppercase leading-tight">
                        WHERE TO BUY <span class="text-red-600">SEVEN SERIES.</span>
                    </h2>
                    <p class="text-zinc-600 dark:text-zinc-400 font-medium max-w-xl text-base">
                        Visit our official flagship outlets and authorized stockists to experience our authentic raw denim in person.
                    </p>
                </div>

                <div class="flex items-center gap-3">
                    <a href="/b2b" class="px-6 py-3.5 bg-zinc-950 hover:bg-red-600 text-white font-black text-xs uppercase tracking-widest rounded-xl transition-all shadow-md">
                        Become an Authorized Stockist &rarr;
                    </a>
                </div>
            </div>

            <!-- City Filter Tabs -->
            <div class="flex flex-wrap items-center gap-2 mb-10 pb-4 border-b border-zinc-200 dark:border-zinc-800">
                <span class="text-xs font-mono font-bold text-zinc-400 mr-2 uppercase">Filter By City:</span>
                <button type="button" class="store-city-filter px-4 py-2 rounded-xl text-xs font-black uppercase tracking-wider bg-red-600 text-white transition-all shadow-sm" data-city="all">
                    All Locations
                </button>
                <button type="button" class="store-city-filter px-4 py-2 rounded-xl text-xs font-black uppercase tracking-wider bg-white dark:bg-zinc-900 text-zinc-700 dark:text-zinc-300 border border-zinc-200 dark:border-zinc-800 hover:border-red-600 transition-all" data-city="Kathmandu">
                    Kathmandu
                </button>
                <button type="button" class="store-city-filter px-4 py-2 rounded-xl text-xs font-black uppercase tracking-wider bg-white dark:bg-zinc-900 text-zinc-700 dark:text-zinc-300 border border-zinc-200 dark:border-zinc-800 hover:border-red-600 transition-all" data-city="Lalitpur">
                    Lalitpur
                </button>
                <button type="button" class="store-city-filter px-4 py-2 rounded-xl text-xs font-black uppercase tracking-wider bg-white dark:bg-zinc-900 text-zinc-700 dark:text-zinc-300 border border-zinc-200 dark:border-zinc-800 hover:border-red-600 transition-all" data-city="Pokhara">
                    Pokhara
                </button>
                <button type="button" class="store-city-filter px-4 py-2 rounded-xl text-xs font-black uppercase tracking-wider bg-white dark:bg-zinc-900 text-zinc-700 dark:text-zinc-300 border border-zinc-200 dark:border-zinc-800 hover:border-red-600 transition-all" data-city="Butwal">
                    Butwal
                </button>
                <button type="button" class="store-city-filter px-4 py-2 rounded-xl text-xs font-black uppercase tracking-wider bg-white dark:bg-zinc-900 text-zinc-700 dark:text-zinc-300 border border-zinc-200 dark:border-zinc-800 hover:border-red-600 transition-all" data-city="Biratnagar">
                    Biratnagar
                </button>
            </div>

            <!-- Asymmetrical Dynamic Grid of Retail Stores -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                
                @if(isset($retailStores) && $retailStores->count() > 0)
                    @foreach($retailStores as $store)
                        <div class="store-card p-8 rounded-3xl bg-white dark:bg-zinc-900 border-2 border-zinc-200 dark:border-zinc-800 hover:border-red-600 transition-all duration-300 shadow-lg flex flex-col justify-between group" data-city="{{ $store->city }}">
                            <div class="space-y-4">
                                <div class="flex items-center justify-between">
                                    <span class="px-3 py-1 rounded-full text-[10px] font-black uppercase tracking-wider {{ $store->store_type === 'flagship' ? 'bg-red-600 text-white' : 'bg-zinc-100 dark:bg-zinc-800 text-zinc-900 dark:text-zinc-200 border border-zinc-300 dark:border-zinc-700' }}">
                                        {{ str_replace('_', ' ', strtoupper($store->store_type)) }}
                                    </span>
                                    <span class="text-xs font-mono font-bold text-red-600">{{ $store->city }}</span>
                                </div>

                                <div>
                                    <h3 class="text-2xl font-black uppercase text-zinc-950 dark:text-white group-hover:text-red-600 transition-colors">
                                        {{ $store->name }}
                                    </h3>
                                    <p class="text-zinc-600 dark:text-zinc-400 text-xs sm:text-sm mt-1 leading-relaxed">
                                        {{ $store->address }}
                                        @if($store->landmark)
                                            <span class="block text-[11px] text-zinc-400 font-mono mt-0.5">({{ $store->landmark }})</span>
                                        @endif
                                    </p>
                                </div>

                                <div class="space-y-1.5 pt-2 text-xs font-mono text-zinc-500 border-t border-zinc-100 dark:border-zinc-800">
                                    @if($store->operating_hours)
                                        <div class="flex items-center gap-2">
                                            <svg class="w-3.5 h-3.5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                            <span>{{ $store->operating_hours }}</span>
                                        </div>
                                    @endif
                                    @if($store->phone)
                                        <div class="flex items-center gap-2">
                                            <svg class="w-3.5 h-3.5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                                            <span>{{ $store->phone }}</span>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="pt-6">
                                @if($store->google_maps_url)
                                    <a href="{{ $store->google_maps_url }}" target="_blank" rel="noopener noreferrer" class="w-full py-3 bg-zinc-100 hover:bg-red-600 hover:text-white dark:bg-zinc-800 dark:hover:bg-red-600 text-zinc-950 dark:text-white font-black text-xs uppercase tracking-widest rounded-xl text-center block transition-colors">
                                        Open in Google Maps &rarr;
                                    </a>
                                @else
                                    <a href="tel:{{ $store->phone }}" class="w-full py-3 bg-zinc-100 hover:bg-red-600 hover:text-white dark:bg-zinc-800 dark:hover:bg-red-600 text-zinc-950 dark:text-white font-black text-xs uppercase tracking-widest rounded-xl text-center block transition-colors">
                                        Call Store Direct
                                    </a>
                                @endif
                            </div>
                        </div>
                    @endforeach
                @endif

                <!-- Asymmetrical B2B Partner Invitation Card -->
                <div class="store-card p-8 rounded-3xl bg-zinc-950 text-white border-2 border-red-600 shadow-2xl flex flex-col justify-between relative overflow-hidden group rotate-1" data-city="all">
                    <div class="absolute -right-8 -bottom-8 w-36 h-36 bg-red-600/20 blur-2xl rounded-full"></div>
                    
                    <div class="space-y-4 relative z-10">
                        <div class="flex items-center justify-between">
                            <span class="px-3 py-1 rounded-full text-[10px] font-black uppercase tracking-wider bg-red-600 text-white">
                                EXPAND YOUR STORE
                            </span>
                            <span class="w-2 h-2 rounded-full bg-red-500 animate-pulse"></span>
                        </div>

                        <div>
                            <h3 class="text-2xl font-black uppercase text-white">
                                Open a Seven Series Stockist
                            </h3>
                            <p class="text-zinc-400 text-xs sm:text-sm mt-2 leading-relaxed">
                                Do you run a clothing boutique or multi-brand apparel showroom? Partner with us for exclusive territorial distribution, verified wholesale pricing, and direct marketing collateral.
                            </p>
                        </div>
                    </div>

                    <div class="pt-6 relative z-10">
                        <a href="/b2b" class="btn-magnetic w-full py-3.5 bg-red-600 hover:bg-red-700 text-white font-black text-xs uppercase tracking-widest rounded-xl text-center block transition-all shadow-lg shadow-red-600/30">
                            Apply for Retail Dealership &rarr;
                        </a>
                    </div>
                </div>

            </div>

        </div>
    </section>

    <!-- ========================================================================= -->
    <!-- SECTION 4: GENJUTSU INTERACTIVE MICROSCOPIC SPECIMEN LOUPE -->
    <!-- ========================================================================= -->
    <section id="specimen-lab" class="py-28 bg-white dark:bg-[#09090b] border-b border-zinc-200 dark:border-zinc-900 transition-colors duration-500">
        <div class="max-w-7xl mx-auto px-6">
            
            <div class="grid lg:grid-cols-12 gap-12 items-center">
                
                <!-- Left: Laboratory Narrative -->
                <div class="lg:col-span-5 space-y-6">
                    <div class="inline-block px-3 py-1 bg-red-100 dark:bg-red-950/40 border border-red-200 dark:border-red-900/60 rounded-full text-red-600 text-xs font-black tracking-widest uppercase">
                        FABRIC TELEMETRY
                    </div>
                    
                    <h2 class="text-3xl sm:text-4xl xl:text-5xl font-black tracking-tight text-zinc-950 dark:text-white uppercase leading-tight">
                        MICROSCOPIC <br>
                        <span class="text-red-600">WEAVE INTEGRITY.</span>
                    </h2>

                    <p class="text-zinc-600 dark:text-zinc-400 text-base leading-relaxed font-medium">
                        Ordinary department store jeans disintegrate because mills blend cheap polyester stretch fibers that decay under sweat and friction. Seven Series weaves dense ring-spun cotton on low-tension shuttle looms, producing an interlocking 3x3 twill weave that molds to the body and tightens with age.
                    </p>

                    <!-- Laboratory Telemetry Readouts -->
                    <div class="space-y-3 pt-2">
                        <div class="p-4 rounded-xl bg-zinc-50 dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-800 flex items-center justify-between">
                            <div>
                                <div class="text-[10px] font-mono font-bold text-zinc-400 uppercase">Warp / Weft Tensile Rating</div>
                                <div class="text-sm font-black text-zinc-950 dark:text-white uppercase">1,420 N Breaking Force (ASTM D5034)</div>
                            </div>
                            <span class="px-2.5 py-1 rounded bg-green-500/10 text-green-600 dark:text-green-400 text-[10px] font-mono font-bold">VERIFIED</span>
                        </div>

                        <div class="p-4 rounded-xl bg-zinc-50 dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-800 flex items-center justify-between">
                            <div>
                                <div class="text-[10px] font-mono font-bold text-zinc-400 uppercase">Indigo Saturation Depth</div>
                                <div class="text-sm font-black text-zinc-950 dark:text-white uppercase">12-Dip Rope Dyeing / White Cotton Core</div>
                            </div>
                            <span class="px-2.5 py-1 rounded bg-green-500/10 text-green-600 dark:text-green-400 text-[10px] font-mono font-bold">OPTIMIZED</span>
                        </div>

                        <div class="p-4 rounded-xl bg-zinc-50 dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-800 flex items-center justify-between">
                            <div>
                                <div class="text-[10px] font-mono font-bold text-zinc-400 uppercase">Abrasion Wear Resistance</div>
                                <div class="text-sm font-black text-zinc-950 dark:text-white uppercase">85,000 Martindale Rub Cycles</div>
                            </div>
                            <span class="px-2.5 py-1 rounded bg-green-500/10 text-green-600 dark:text-green-400 text-[10px] font-mono font-bold">GRADE A</span>
                        </div>
                    </div>
                </div>

                <!-- Right: Interactive Tactile Specimen Card with Dynamic Magnifying Loupe -->
                <div class="lg:col-span-7">
                    <div class="relative group">
                        <div class="absolute -inset-3 bg-red-600/20 blur-2xl rounded-3xl opacity-50 group-hover:opacity-100 transition-opacity duration-700"></div>
                        
                        <div id="specimen-loupe-card" class="relative rounded-3xl overflow-hidden border-2 border-zinc-950 dark:border-zinc-800 bg-zinc-950 shadow-2xl cursor-crosshair">
                            
                            <!-- Base Specimen Photo -->
                            <div class="relative aspect-[16/10] overflow-hidden">
                                <img src="{{ asset('images/craft.png') }}" alt="Seven Series Raw Selvedge Specimen" class="w-full h-full object-cover">
                                <div class="absolute inset-0 bg-gradient-to-t from-zinc-950 via-transparent to-transparent"></div>
                                
                                <div class="absolute inset-0 tech-grid opacity-30 pointer-events-none"></div>

                                <div class="absolute top-4 left-4 px-3 py-1.5 rounded-lg bg-black/80 backdrop-blur-md border border-white/20 text-white font-mono text-[10px] flex items-center gap-2">
                                    <span class="w-2 h-2 rounded-full bg-red-600 animate-ping"></span>
                                    <span>HOVER TO MAGNIFY FIBER STRUCTURE</span>
                                </div>

                                <div class="absolute top-4 right-4 px-3 py-1.5 rounded-lg bg-red-600 text-white font-mono text-[10px] font-black uppercase">
                                    RED-LINE SELVEDGE ID
                                </div>
                            </div>

                            <!-- Genjutsu Floating Magnifying Loupe Lens -->
                            <div id="specimen-loupe-lens" class="pointer-events-none absolute top-0 left-0 w-44 h-44 rounded-full border-2 border-red-600 shadow-[0_0_35px_rgba(220,38,38,0.7)] overflow-hidden opacity-0 z-30 bg-zinc-950">
                                <div id="specimen-loupe-zoom" class="w-full h-full bg-twill-matrix scale-150"></div>
                                <div class="absolute inset-0 flex items-center justify-center pointer-events-none">
                                    <div class="w-full h-[1px] bg-red-600/40"></div>
                                    <div class="h-full w-[1px] bg-red-600/40 absolute"></div>
                                </div>
                                <div class="absolute bottom-2 left-0 right-0 text-center text-[9px] font-mono text-red-500 font-bold bg-black/60">
                                    3x3 TWILL ZOOM
                                </div>
                            </div>

                            <!-- Card Bottom Spec Strip -->
                            <div class="p-6 bg-zinc-950 text-white border-t border-zinc-800 flex flex-wrap items-center justify-between gap-4">
                                <div class="flex items-center gap-3">
                                    <img src="{{ asset('images/brand/logo-symbol.png') }}" alt="7" class="w-6 h-6 object-contain">
                                    <div>
                                        <span class="text-xs font-black uppercase tracking-wider block">Specimen 07-RAW-SELVEDGE</span>
                                        <span class="text-[10px] font-mono text-zinc-400">14.5 OZ • JAPANESE TOYODA LOOM WEAVE</span>
                                    </div>
                                </div>
                                <a href="/b2b" class="text-xs font-black uppercase tracking-widest text-red-500 hover:text-red-400 flex items-center gap-1">
                                    <span>Request Physical Swatch Book</span>
                                    <span>&rarr;</span>
                                </a>
                            </div>

                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section>

    <!-- ========================================================================= -->
    <!-- SECTION 5: ANATOMY OF DENIM (Interactive Layer Scrubber) -->
    <!-- ========================================================================= -->
    <section id="anatomy" class="py-28 bg-zinc-50 dark:bg-[#0c0c0e] border-b border-zinc-200 dark:border-zinc-900 transition-colors duration-500">
        <div class="max-w-7xl mx-auto px-6">
            
            <div class="text-center space-y-4 mb-16">
                <div class="inline-block px-3 py-1 bg-red-100 dark:bg-red-950/40 border border-red-200 dark:border-red-900/60 rounded-full text-red-600 text-xs font-black tracking-widest uppercase">
                    ATELIER BLUEPRINT
                </div>
                <h2 class="text-4xl sm:text-5xl font-black tracking-tight text-zinc-950 dark:text-white uppercase">
                    ANATOMY OF A <span class="text-red-600">SEVEN SERIES JEAN.</span>
                </h2>
                <p class="text-zinc-600 dark:text-zinc-400 font-medium max-w-xl mx-auto text-base">
                    Every garment is built layer-by-layer from honest materials. Select a tier to inspect its construction details.
                </p>
            </div>

            <!-- Layer Navigation Tabs -->
            <div class="grid grid-cols-2 sm:grid-cols-5 gap-3 mb-10">
                <button type="button" class="anatomy-layer-tab p-4 rounded-xl border-2 border-red-600 bg-red-600/10 dark:bg-red-950/40 text-left transition-all" data-index="0">
                    <span class="text-[10px] font-mono font-bold text-red-600 block">TIER 01</span>
                    <span class="text-xs font-black uppercase text-zinc-950 dark:text-white">Cotton Core</span>
                </button>
                <button type="button" class="anatomy-layer-tab p-4 rounded-xl border-2 border-zinc-200 dark:border-zinc-800 text-left hover:border-red-600 transition-all" data-index="1">
                    <span class="text-[10px] font-mono font-bold text-zinc-400 block">TIER 02</span>
                    <span class="text-xs font-black uppercase text-zinc-950 dark:text-white">Rope Dyeing</span>
                </button>
                <button type="button" class="anatomy-layer-tab p-4 rounded-xl border-2 border-zinc-200 dark:border-zinc-800 text-left hover:border-red-600 transition-all" data-index="2">
                    <span class="text-[10px] font-mono font-bold text-zinc-400 block">TIER 03</span>
                    <span class="text-xs font-black uppercase text-zinc-950 dark:text-white">Shuttle Selvedge</span>
                </button>
                <button type="button" class="anatomy-layer-tab p-4 rounded-xl border-2 border-zinc-200 dark:border-zinc-800 text-left hover:border-red-600 transition-all" data-index="3">
                    <span class="text-[10px] font-mono font-bold text-zinc-400 block">TIER 04</span>
                    <span class="text-xs font-black uppercase text-zinc-950 dark:text-white">Triple Felling</span>
                </button>
                <button type="button" class="anatomy-layer-tab p-4 rounded-xl border-2 border-zinc-200 dark:border-zinc-800 text-left hover:border-red-600 transition-all" data-index="4">
                    <span class="text-[10px] font-mono font-bold text-zinc-400 block">TIER 05</span>
                    <span class="text-xs font-black uppercase text-zinc-950 dark:text-white">Alloy Hardware</span>
                </button>
            </div>

            <!-- Layer Content Panels -->
            <div class="relative">
                
                <!-- Layer 0: Cotton Core -->
                <div class="anatomy-layer-card p-8 sm:p-12 rounded-3xl bg-white dark:bg-zinc-900 border-2 border-zinc-200 dark:border-zinc-800 shadow-xl grid md:grid-cols-12 gap-8 items-center" data-index="0">
                    <div class="md:col-span-7 space-y-4">
                        <span class="text-xs font-mono font-bold uppercase tracking-widest text-red-600">SPECIFICATION // LAYER 01</span>
                        <h3 class="text-3xl font-black uppercase text-zinc-950 dark:text-white">Long-Staple Ring-Spun Cotton</h3>
                        <p class="text-zinc-600 dark:text-zinc-300 text-sm sm:text-base leading-relaxed">
                            We select exclusively combed extra-long staple (ELS) cotton fibers. Ring spinning twists the yarn with thousands of turns per meter, ensuring maximum tensile resilience and a soft, durable hand-feel that won't pill or thin out.
                        </p>
                        <div class="grid grid-cols-2 gap-4 pt-4 border-t border-zinc-200 dark:border-zinc-800 text-xs">
                            <div><span class="text-zinc-400 block uppercase font-mono text-[10px]">Staple Length</span><strong class="text-zinc-950 dark:text-white font-black text-sm">35mm Extra-Long</strong></div>
                            <div><span class="text-zinc-400 block uppercase font-mono text-[10px]">Twist Coefficient</span><strong class="text-zinc-950 dark:text-white font-black text-sm">4.2 Alpha (Max Tensile)</strong></div>
                        </div>
                    </div>
                    <div class="md:col-span-5 aspect-[4/3] rounded-2xl overflow-hidden border border-zinc-300 dark:border-zinc-700 bg-zinc-950">
                        <img src="{{ asset('images/craft.png') }}" alt="Raw Cotton Yarn" class="w-full h-full object-cover">
                    </div>
                </div>

                <!-- Layer 1: Rope Dyeing -->
                <div class="anatomy-layer-card hidden p-8 sm:p-12 rounded-3xl bg-white dark:bg-zinc-900 border-2 border-zinc-200 dark:border-zinc-800 shadow-xl grid md:grid-cols-12 gap-8 items-center" data-index="1">
                    <div class="md:col-span-7 space-y-4">
                        <span class="text-xs font-mono font-bold uppercase tracking-widest text-red-600">SPECIFICATION // LAYER 02</span>
                        <h3 class="text-3xl font-black uppercase text-zinc-950 dark:text-white">12-Dip Pure Indigo Rope Saturation</h3>
                        <p class="text-zinc-600 dark:text-zinc-300 text-sm sm:text-base leading-relaxed">
                            Rather than synthetic chemical coatings, rope dyeing passes yarn through reduced indigo vats 12 times. This leaves the core of the cotton yarn white, ensuring crisp, high-contrast fades and whisker patterns as you break your jeans in.
                        </p>
                        <div class="grid grid-cols-2 gap-4 pt-4 border-t border-zinc-200 dark:border-zinc-800 text-xs">
                            <div><span class="text-zinc-400 block uppercase font-mono text-[10px]">Dye Baths</span><strong class="text-zinc-950 dark:text-white font-black text-sm">12 Continuous Cycles</strong></div>
                            <div><span class="text-zinc-400 block uppercase font-mono text-[10px]">Fade Contrast</span><strong class="text-zinc-950 dark:text-white font-black text-sm">High-Definition Whiskers</strong></div>
                        </div>
                    </div>
                    <div class="md:col-span-5 aspect-[4/3] rounded-2xl overflow-hidden border border-zinc-300 dark:border-zinc-700 bg-zinc-950">
                        <img src="{{ asset('images/collection-1.png') }}" alt="Indigo Dyeing Process" class="w-full h-full object-cover">
                    </div>
                </div>

                <!-- Layer 2: Shuttle Selvedge -->
                <div class="anatomy-layer-card hidden p-8 sm:p-12 rounded-3xl bg-white dark:bg-zinc-900 border-2 border-zinc-200 dark:border-zinc-800 shadow-xl grid md:grid-cols-12 gap-8 items-center" data-index="2">
                    <div class="md:col-span-7 space-y-4">
                        <span class="text-xs font-mono font-bold uppercase tracking-widest text-red-600">SPECIFICATION // LAYER 03</span>
                        <h3 class="text-3xl font-black uppercase text-zinc-950 dark:text-white">Vintage Toyoda Shuttle Loom Weaving</h3>
                        <p class="text-zinc-600 dark:text-zinc-300 text-sm sm:text-base leading-relaxed">
                            We weave at low tension on heritage shuttle looms. The wooden shuttle carries the weft yarn continuously back and forth, self-binding the edges with our signature red-line selvedge border so the seams never unravel.
                        </p>
                        <div class="grid grid-cols-2 gap-4 pt-4 border-t border-zinc-200 dark:border-zinc-800 text-xs">
                            <div><span class="text-zinc-400 block uppercase font-mono text-[10px]">Loom Speed</span><strong class="text-zinc-950 dark:text-white font-black text-sm">130 Picks/Min (Slow-Weave)</strong></div>
                            <div><span class="text-zinc-400 block uppercase font-mono text-[10px]">Fabric Weight</span><strong class="text-zinc-950 dark:text-white font-black text-sm">14.5 oz Raw Architectural</strong></div>
                        </div>
                    </div>
                    <div class="md:col-span-5 aspect-[4/3] rounded-2xl overflow-hidden border border-zinc-300 dark:border-zinc-700 bg-zinc-950">
                        <img src="{{ asset('images/facility.jpg') }}" alt="Vintage Shuttle Loom Floor" class="w-full h-full object-cover">
                    </div>
                </div>

                <!-- Layer 3: Triple Felling -->
                <div class="anatomy-layer-card hidden p-8 sm:p-12 rounded-3xl bg-white dark:bg-zinc-900 border-2 border-zinc-200 dark:border-zinc-800 shadow-xl grid md:grid-cols-12 gap-8 items-center" data-index="3">
                    <div class="md:col-span-7 space-y-4">
                        <span class="text-xs font-mono font-bold uppercase tracking-widest text-red-600">SPECIFICATION // LAYER 04</span>
                        <h3 class="text-3xl font-black uppercase text-zinc-950 dark:text-white">Triple-Needle Felling & Heavy Bar-Tacks</h3>
                        <p class="text-zinc-600 dark:text-zinc-300 text-sm sm:text-base leading-relaxed">
                            High-wear friction areas — crotch seam, rear yoke, and back pocket anchors — are secured with triple-needle felled chainstitching. 42-stitch bar-tack anchors lock down belt loops and pocket openings.
                        </p>
                        <div class="grid grid-cols-2 gap-4 pt-4 border-t border-zinc-200 dark:border-zinc-800 text-xs">
                            <div><span class="text-zinc-400 block uppercase font-mono text-[10px]">Thread Tensile</span><strong class="text-zinc-950 dark:text-white font-black text-sm">Tex 105 Core-Spun</strong></div>
                            <div><span class="text-zinc-400 block uppercase font-mono text-[10px]">Structural Seams</span><strong class="text-zinc-950 dark:text-white font-black text-sm">Triple-Needle Felled</strong></div>
                        </div>
                    </div>
                    <div class="md:col-span-5 aspect-[4/3] rounded-2xl overflow-hidden border border-zinc-300 dark:border-zinc-700 bg-zinc-950">
                        <img src="{{ asset('images/collection-2.png') }}" alt="Triple Needle Felled Seam" class="w-full h-full object-cover">
                    </div>
                </div>

                <!-- Layer 4: Alloy Hardware -->
                <div class="anatomy-layer-card hidden p-8 sm:p-12 rounded-3xl bg-white dark:bg-zinc-900 border-2 border-zinc-200 dark:border-zinc-800 shadow-xl grid md:grid-cols-12 gap-8 items-center" data-index="4">
                    <div class="md:col-span-7 space-y-4">
                        <span class="text-xs font-mono font-bold uppercase tracking-widest text-red-600">SPECIFICATION // LAYER 05</span>
                        <h3 class="text-3xl font-black uppercase text-zinc-950 dark:text-white">Custom Cast Solid Brass & Copper Hardware</h3>
                        <p class="text-zinc-600 dark:text-zinc-300 text-sm sm:text-base leading-relaxed">
                            Every shank button and hidden rivet is cast from solid zero-nickel alloy and pure copper. They are physically incapable of bending or snapping under heavy tension and develop their own natural patina over the years.
                        </p>
                        <div class="grid grid-cols-2 gap-4 pt-4 border-t border-zinc-200 dark:border-zinc-800 text-xs">
                            <div><span class="text-zinc-400 block uppercase font-mono text-[10px]">Hardware Composition</span><strong class="text-zinc-950 dark:text-white font-black text-sm">Titanium Alloy / Pure Copper</strong></div>
                            <div><span class="text-zinc-400 block uppercase font-mono text-[10px]">Torsion Threshold</span><strong class="text-zinc-950 dark:text-white font-black text-sm">> 350 N/m Pull-Off Resistance</strong></div>
                        </div>
                    </div>
                    <div class="md:col-span-5 aspect-[4/3] rounded-2xl overflow-hidden border border-zinc-300 dark:border-zinc-700 bg-zinc-950">
                        <img src="{{ asset('images/collection-3.png') }}" alt="Cast Alloy Hardware" class="w-full h-full object-cover">
                    </div>
                </div>

            </div>

        </div>
    </section>

    <!-- ========================================================================= -->
    <!-- SECTION 6: CORE JEANS SILHOUETTES (Wholesale Models) -->
    <!-- ========================================================================= -->
    <section id="exhibition" class="py-28 bg-white dark:bg-[#09090b] transition-colors duration-500">
        <div class="max-w-7xl mx-auto px-6">
            
            <div class="flex flex-col md:flex-row justify-between items-start md:items-end gap-6 mb-16">
                <div class="space-y-4">
                    <div class="inline-block px-3 py-1 bg-red-100 dark:bg-red-950/40 border border-red-200 dark:border-red-900/60 rounded-full text-red-600 text-xs font-black tracking-widest uppercase">
                        CORE FACTORY SILHOUETTES
                    </div>
                    <h2 class="text-4xl sm:text-5xl font-black tracking-tight text-zinc-950 dark:text-white uppercase">
                        JEANS <span class="text-red-600">CUT ARCHIVE.</span>
                    </h2>
                    <p class="text-zinc-600 dark:text-zinc-400 font-medium max-w-xl text-base">
                        Supplied wholesale to retail shops and available directly at our official brand storefronts.
                    </p>
                </div>

                <div class="flex items-center gap-3">
                    <a href="/b2b" class="px-6 py-3.5 bg-zinc-950 hover:bg-red-600 text-white font-black text-xs uppercase tracking-widest rounded-xl transition-all shadow-md">
                        Wholesale Portal & Bulk Pricing &rarr;
                    </a>
                </div>
            </div>

            <!-- Silhouettes Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                
                <!-- Silhouette 01 -->
                <div class="group rounded-3xl bg-zinc-50 dark:bg-zinc-900 border-2 border-zinc-200 dark:border-zinc-800 overflow-hidden hover:border-red-600 hover:shadow-2xl transition-all duration-300 flex flex-col justify-between">
                    <div>
                        <div class="relative aspect-[4/5] overflow-hidden bg-zinc-950">
                            <img src="{{ asset('images/collection-1.png') }}" alt="Model X-7 Raw Cobalt" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                            <div class="absolute top-4 left-4">
                                <span class="px-3 py-1 bg-white text-zinc-950 text-[10px] font-black uppercase tracking-widest rounded-full shadow-md">
                                    14.5 OZ RAW SELVEDGE
                                </span>
                            </div>
                            <div class="absolute bottom-4 right-4">
                                <span class="px-3 py-1 bg-red-600 text-white text-[10px] font-black uppercase tracking-widest rounded-full shadow-md">
                                    MODEL X-7 COBALT
                                </span>
                            </div>
                        </div>

                        <div class="p-8 space-y-4">
                            <div class="space-y-1">
                                <span class="text-[10px] font-mono font-bold uppercase tracking-widest text-red-600">SERIES SPEC 01</span>
                                <h3 class="text-2xl font-black uppercase text-zinc-950 dark:text-white">Architectural Straight</h3>
                            </div>
                            <p class="text-zinc-600 dark:text-zinc-400 text-sm font-medium leading-relaxed">
                                Unwashed, untreated, rigid indigo denim designed to conform to the wearer's anatomy over hundreds of wears. Tailored for premium retail storefronts.
                            </p>

                            <div class="pt-4 border-t border-zinc-200 dark:border-zinc-800 grid grid-cols-2 gap-3 text-xs">
                                <div>
                                    <span class="text-zinc-400 font-bold block text-[10px] uppercase font-mono">Carton MOQ</span>
                                    <span class="font-black text-zinc-950 dark:text-white">100 Pcs (Wholesale)</span>
                                </div>
                                <div>
                                    <span class="text-zinc-400 font-bold block text-[10px] uppercase font-mono">Lead Time</span>
                                    <span class="font-black text-zinc-950 dark:text-white">14 Days Dispatch</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="p-8 pt-0">
                        <a href="/b2b" class="w-full py-3.5 bg-zinc-200/80 hover:bg-red-600 hover:text-white dark:bg-zinc-800 dark:hover:bg-red-600 text-zinc-950 dark:text-white font-black text-xs uppercase tracking-widest rounded-xl text-center block transition-colors">
                            Request Wholesale Spec Sheet
                        </a>
                    </div>
                </div>

                <!-- Silhouette 02 -->
                <div class="group rounded-3xl bg-zinc-50 dark:bg-zinc-900 border-2 border-zinc-200 dark:border-zinc-800 overflow-hidden hover:border-red-600 hover:shadow-2xl transition-all duration-300 flex flex-col justify-between">
                    <div>
                        <div class="relative aspect-[4/5] overflow-hidden bg-zinc-950">
                            <img src="{{ asset('images/collection-2.png') }}" alt="Model X-7 Obsidian Black" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                            <div class="absolute top-4 left-4">
                                <span class="px-3 py-1 bg-white text-zinc-950 text-[10px] font-black uppercase tracking-widest rounded-full shadow-md">
                                    13.8 OZ SULFUR OBSIDIAN
                                </span>
                            </div>
                            <div class="absolute bottom-4 right-4">
                                <span class="px-3 py-1 bg-red-600 text-white text-[10px] font-black uppercase tracking-widest rounded-full shadow-md">
                                    MODEL X-7 BLACK
                                </span>
                            </div>
                        </div>

                        <div class="p-8 space-y-4">
                            <div class="space-y-1">
                                <span class="text-[10px] font-mono font-bold uppercase tracking-widest text-red-600">SERIES SPEC 02</span>
                                <h3 class="text-2xl font-black uppercase text-zinc-950 dark:text-white">Modern Tapered Fit</h3>
                            </div>
                            <p class="text-zinc-600 dark:text-zinc-400 text-sm font-medium leading-relaxed">
                                Deep sulfur double-black dye that retains its midnight obsidian colorway through rigorous industrial wash protocols. Fitted knee with relaxed thigh.
                            </p>

                            <div class="pt-4 border-t border-zinc-200 dark:border-zinc-800 grid grid-cols-2 gap-3 text-xs">
                                <div>
                                    <span class="text-zinc-400 font-bold block text-[10px] uppercase font-mono">Carton MOQ</span>
                                    <span class="font-black text-zinc-950 dark:text-white">100 Pcs (Wholesale)</span>
                                </div>
                                <div>
                                    <span class="text-zinc-400 font-bold block text-[10px] uppercase font-mono">Lead Time</span>
                                    <span class="font-black text-zinc-950 dark:text-white">14 Days Dispatch</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="p-8 pt-0">
                        <a href="/b2b" class="w-full py-3.5 bg-zinc-200/80 hover:bg-red-600 hover:text-white dark:bg-zinc-800 dark:hover:bg-red-600 text-zinc-950 dark:text-white font-black text-xs uppercase tracking-widest rounded-xl text-center block transition-colors">
                            Request Wholesale Spec Sheet
                        </a>
                    </div>
                </div>

                <!-- Silhouette 03 -->
                <div class="group rounded-3xl bg-zinc-50 dark:bg-zinc-900 border-2 border-zinc-200 dark:border-zinc-800 overflow-hidden hover:border-red-600 hover:shadow-2xl transition-all duration-300 flex flex-col justify-between">
                    <div>
                        <div class="relative aspect-[4/5] overflow-hidden bg-zinc-950">
                            <img src="{{ asset('images/collection-3.png') }}" alt="Model X-7 Heavy Duty Twill" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                            <div class="absolute top-4 left-4">
                                <span class="px-3 py-1 bg-white text-zinc-950 text-[10px] font-black uppercase tracking-widest rounded-full shadow-md">
                                    15.2 OZ INDUSTRIAL HEAVY
                                </span>
                            </div>
                            <div class="absolute bottom-4 right-4">
                                <span class="px-3 py-1 bg-red-600 text-white text-[10px] font-black uppercase tracking-widest rounded-full shadow-md">
                                    MODEL X-7 WORKWEAR
                                </span>
                            </div>
                        </div>

                        <div class="p-8 space-y-4">
                            <div class="space-y-1">
                                <span class="text-[10px] font-mono font-bold uppercase tracking-widest text-red-600">SERIES SPEC 03</span>
                                <h3 class="text-2xl font-black uppercase text-zinc-950 dark:text-white">Workwear Cut</h3>
                            </div>
                            <p class="text-zinc-600 dark:text-zinc-400 text-sm font-medium leading-relaxed">
                                Heavy armor-grade denim constructed for heavy utility, motorcycle culture, and demanding environments. Reinforced knees and triple-needle rear yoke.
                            </p>

                            <div class="pt-4 border-t border-zinc-200 dark:border-zinc-800 grid grid-cols-2 gap-3 text-xs">
                                <div>
                                    <span class="text-zinc-400 font-bold block text-[10px] uppercase font-mono">Carton MOQ</span>
                                    <span class="font-black text-zinc-950 dark:text-white">100 Pcs (Wholesale)</span>
                                </div>
                                <div>
                                    <span class="text-zinc-400 font-bold block text-[10px] uppercase font-mono">Lead Time</span>
                                    <span class="font-black text-zinc-950 dark:text-white">14 Days Dispatch</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="p-8 pt-0">
                        <a href="/b2b" class="w-full py-3.5 bg-zinc-200/80 hover:bg-red-600 hover:text-white dark:bg-zinc-800 dark:hover:bg-red-600 text-zinc-950 dark:text-white font-black text-xs uppercase tracking-widest rounded-xl text-center block transition-colors">
                            Request Wholesale Spec Sheet
                        </a>
                    </div>
                </div>

            </div>

        </div>
    </section>

    <!-- ========================================================================= -->
    <!-- SECTION 7: FACTORY INFRASTRUCTURE & WHOLESALE CONTRACTS -->
    <!-- ========================================================================= -->
    <section id="facility" class="py-28 bg-zinc-50 dark:bg-[#0c0c0e] border-t border-zinc-200 dark:border-zinc-900 transition-colors duration-500">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid lg:grid-cols-12 gap-16 items-center">
                
                <div class="lg:col-span-6 space-y-6">
                    <div class="inline-block px-3 py-1 bg-red-100 dark:bg-red-950/40 border border-red-200 dark:border-red-900/60 rounded-full text-red-600 text-xs font-black tracking-widest uppercase">
                        FACTORY INFRASTRUCTURE
                    </div>
                    
                    <h2 class="text-4xl sm:text-5xl font-black tracking-tight text-zinc-950 dark:text-white uppercase leading-tight">
                        DEDICATED JEANSWEAR <br>
                        <span class="text-red-600">MANUFACTURING FLOOR.</span>
                    </h2>

                    <p class="text-zinc-600 dark:text-zinc-300 text-base sm:text-lg leading-relaxed font-medium">
                        Unlike trading houses that simply broker imported clearance stock, <strong class="text-zinc-950 dark:text-white font-black">Seven Series Garment Industry</strong> is a real, operational manufacturing plant with dedicated cutting lines, sewing teams, and finishing baths.
                    </p>

                    <!-- 4 Operational Pillars -->
                    <div class="grid sm:grid-cols-2 gap-4 pt-2">
                        <div class="p-4 rounded-2xl bg-white dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-800 space-y-1">
                            <span class="text-red-600 font-mono font-bold text-xs">01 // AUTOMATED CNC</span>
                            <h4 class="font-black text-sm uppercase text-zinc-950 dark:text-white">Computerized Laser Cutting</h4>
                            <p class="text-[11px] text-zinc-500">Pattern nesting algorithms minimize fabric scrap to < 2.1%.</p>
                        </div>

                        <div class="p-4 rounded-2xl bg-white dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-800 space-y-1">
                            <span class="text-red-600 font-mono font-bold text-xs">02 // OEM / ODM</span>
                            <h4 class="font-black text-sm uppercase text-zinc-950 dark:text-white">Private Label Packaging</h4>
                            <p class="text-[11px] text-zinc-500">Custom embossed leather back-patches, buttons, and woven tags.</p>
                        </div>

                        <div class="p-4 rounded-2xl bg-white dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-800 space-y-1">
                            <span class="text-red-600 font-mono font-bold text-xs">03 // QUALITY METRICS</span>
                            <h4 class="font-black text-sm uppercase text-zinc-950 dark:text-white">In-House Tensile Stress Lab</h4>
                            <p class="text-[11px] text-zinc-500">Every fabric roll tested for dimensional stability and wash shrinkage.</p>
                        </div>

                        <div class="p-4 rounded-2xl bg-white dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-800 space-y-1">
                            <span class="text-red-600 font-mono font-bold text-xs">04 // CONTAINER SPEED</span>
                            <h4 class="font-black text-sm uppercase text-zinc-950 dark:text-white">Direct FOB Export Logistics</h4>
                            <p class="text-[11px] text-zinc-500">Streamlined customs clearance and freight logistics for wholesalers.</p>
                        </div>
                    </div>

                    <!-- Commercial Wholesaler CTA Box -->
                    <div class="pt-4">
                        <div class="p-8 rounded-3xl bg-zinc-950 text-white border-2 border-red-600 space-y-4 shadow-2xl relative overflow-hidden">
                            <div class="absolute -right-10 -bottom-10 w-40 h-40 bg-red-600/20 blur-3xl rounded-full"></div>
                            
                            <div class="flex items-center justify-between relative z-10">
                                <span class="text-xs font-mono font-black uppercase tracking-widest text-red-500">DIRECT COMMERCIAL INQUIRIES</span>
                                <span class="w-2.5 h-2.5 rounded-full bg-red-500 animate-pulse"></span>
                            </div>
                            
                            <h3 class="text-2xl font-black uppercase relative z-10">Wholesalers & Multi-Store Retailers</h3>
                            <p class="text-zinc-400 text-sm leading-relaxed relative z-10">
                                Request a confidential factory allocation meeting, custom sample box, and tier-based wholesale pricing matrices directly from our manufacturing headquarters.
                            </p>
                            
                            <div class="pt-2 relative z-10">
                                <a href="/b2b" class="btn-magnetic inline-flex items-center gap-3 px-7 py-4 bg-red-600 hover:bg-red-700 text-white text-xs font-black uppercase tracking-widest rounded-xl transition-all shadow-lg shadow-red-600/30">
                                    <span>Access Dedicated B2B Portal</span>
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right: Facility Image -->
                <div class="lg:col-span-6">
                    <div class="relative group">
                        <div class="absolute -inset-4 bg-gradient-to-r from-red-600/20 to-transparent blur-2xl rounded-3xl opacity-50 group-hover:opacity-100 transition-opacity duration-700"></div>
                        <div class="relative rounded-3xl overflow-hidden border-2 border-zinc-950 dark:border-zinc-800 shadow-2xl bg-black">
                            <img src="{{ asset('images/facility.jpg') }}" alt="Seven Series Industrial Facility" class="w-full h-[580px] object-cover transition-transform duration-700 group-hover:scale-105">
                            <div class="absolute inset-0 bg-gradient-to-t from-zinc-950 via-zinc-950/20 to-transparent"></div>
                            
                            <div class="absolute bottom-6 left-6 right-6 text-white">
                                <span class="px-3 py-1 rounded-full bg-white text-zinc-950 text-[10px] font-black uppercase tracking-widest shadow-md">
                                    SEVEN SERIES INDUSTRIAL HEADQUARTERS
                                </span>
                                <h4 class="text-xl font-black uppercase mt-2">Authentic Denim Craft at Scale</h4>
                                <p class="text-xs text-zinc-300 font-mono mt-1">CAPACITY: 480,000+ UNITS / MONTH</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Footer Component -->
    <x-footer />
</x-layout>