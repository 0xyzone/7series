<x-layout>
    <x-slot:title>Seven Series | Raw Denim & Industrial Garments</x-slot>

    <x-nav transparent="true" />

    <!-- Hero Section: Raw & Rebellious Identity -->
    <section class="min-h-screen relative flex items-center pt-28 pb-20 bg-white dark:bg-zinc-950 text-zinc-950 dark:text-zinc-50 overflow-hidden transition-colors duration-500">
        <!-- Visual Red & White Background Accents -->
        <div class="absolute inset-0 pointer-events-none z-0">
            <div class="absolute -right-20 -top-20 w-[600px] h-[600px] bg-red-600/10 blur-[150px] rounded-full"></div>
            <div class="absolute left-1/4 bottom-10 w-[450px] h-[450px] bg-red-600/5 blur-[120px] rounded-full"></div>
            <div class="absolute inset-0 hero-grid opacity-40"></div>
        </div>

        <div class="max-w-7xl mx-auto px-6 grid lg:grid-cols-12 gap-12 items-center relative z-10 w-full"
             x-data="{ loaded: false }" 
             x-init="setTimeout(() => loaded = true, 100)">
            
            <!-- Left Headline & Narrative -->
            <div class="lg:col-span-7 space-y-8">
                <div class="space-y-6" x-show="loaded" x-transition:enter="transition ease-out duration-700" x-transition:enter-start="opacity-0 translate-y-6" x-transition:enter-end="opacity-100 translate-y-0">
                    
                    <!-- Brand Identity Pill -->
                    <div class="inline-flex items-center gap-2.5 px-4 py-2 rounded-full bg-red-50 dark:bg-red-950/40 border border-red-200 dark:border-red-900/60 text-red-600 text-xs font-black tracking-widest uppercase">
                        <span class="w-2 h-2 rounded-full bg-red-600 animate-ping"></span>
                        <span>SEVEN SERIES GARMENT INDUSTRY</span>
                    </div>

                    <h1 class="text-6xl sm:text-7xl xl:text-8xl font-black tracking-tighter leading-[0.92] uppercase">
                        RAW. RUGGED. <br>
                        <span class="text-red-600 text-glow">REBELLIOUS.</span>
                    </h1>

                    <p class="text-zinc-600 dark:text-zinc-400 text-lg sm:text-xl font-medium max-w-2xl leading-relaxed">
                        We reject flimsy fast fashion. <span class="font-bold text-zinc-950 dark:text-white">Seven Series</span> builds heavyweight denim armor engineered for the streets, sculpted with architectural precision, and forged with unapologetic attitude.
                    </p>
                </div>

                <!-- Call to Action Buttons -->
                <div class="flex flex-wrap items-center gap-4 pt-2" x-show="loaded" x-transition:enter="transition ease-out duration-700 delay-200" x-transition:enter-start="opacity-0 translate-y-6" x-transition:enter-end="opacity-100 translate-y-0">
                    <a href="#exhibition" class="px-8 py-4 bg-red-600 hover:bg-red-700 text-white font-black text-xs sm:text-sm tracking-widest uppercase rounded-xl transition-all hover:scale-105 active:scale-95 shadow-xl shadow-red-600/30 flex items-center gap-3">
                        <span>Explore Exhibition</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"/></svg>
                    </a>
                    <a href="#manifesto" class="px-8 py-4 bg-white dark:bg-zinc-900 text-zinc-950 dark:text-white border-2 border-zinc-950 dark:border-zinc-700 font-black text-xs sm:text-sm tracking-widest uppercase rounded-xl transition-all hover:border-red-600 hover:text-red-600 hover:scale-105 active:scale-95">
                        Brand Manifesto
                    </a>
                    <a href="/b2b" class="px-6 py-4 text-xs font-black uppercase tracking-widest text-zinc-500 hover:text-red-600 transition-colors flex items-center gap-1.5">
                        <span>Wholesaler & Retail Portal</span>
                        <span>&rarr;</span>
                    </a>
                </div>

                <!-- Street Specs Strip -->
                <div class="grid grid-cols-3 gap-6 pt-6 border-t border-zinc-200 dark:border-zinc-800" x-show="loaded" x-transition:enter="transition ease-out duration-700 delay-300">
                    <div>
                        <div class="text-3xl font-black text-zinc-950 dark:text-white">14.5<span class="text-red-600 text-lg">oz</span></div>
                        <div class="text-[11px] font-black text-zinc-500 uppercase tracking-widest mt-1">Raw Shuttle Loom</div>
                    </div>
                    <div>
                        <div class="text-3xl font-black text-red-600">100%</div>
                        <div class="text-[11px] font-black text-zinc-500 uppercase tracking-widest mt-1">Ring-Spun Cotton</div>
                    </div>
                    <div>
                        <div class="text-3xl font-black text-zinc-950 dark:text-white">0%</div>
                        <div class="text-[11px] font-black text-zinc-500 uppercase tracking-widest mt-1">Synthetic Blends</div>
                    </div>
                </div>
            </div>

            <!-- Right Visual Exhibition Card -->
            <div class="lg:col-span-5 relative" x-show="loaded" x-transition:enter="transition ease-out duration-1000 delay-300" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100">
                <div class="relative group">
                    <!-- Red Aura -->
                    <div class="absolute -inset-4 bg-gradient-to-r from-red-600/30 via-red-600/10 to-transparent blur-3xl rounded-3xl opacity-70 group-hover:opacity-100 transition-opacity duration-700"></div>

                    <!-- Hero Visual Card -->
                    <div class="relative z-10 rounded-3xl overflow-hidden border-2 border-zinc-950 dark:border-zinc-800 bg-white dark:bg-zinc-900 shadow-2xl">
                        <div class="relative aspect-[4/5] overflow-hidden bg-zinc-950">
                            <img src="{{ asset('images/hero.png') }}" alt="Seven Series Signature Denim Piece" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                            <div class="absolute inset-0 bg-gradient-to-t from-zinc-950 via-zinc-950/20 to-transparent"></div>

                            <!-- Industrial Stamp Badge -->
                            <div class="absolute top-5 left-5">
                                <span class="px-3.5 py-1.5 rounded-full bg-white text-zinc-950 text-[10px] font-black uppercase tracking-widest border border-zinc-950 shadow-md">
                                    SIGNATURE SPECIMEN 01
                                </span>
                            </div>

                            <!-- Bottom Floating Details -->
                            <div class="absolute bottom-6 left-6 right-6 text-white space-y-1">
                                <p class="text-red-500 font-black text-xs uppercase tracking-widest">Iconic Cut</p>
                                <h3 class="text-2xl font-black uppercase tracking-tight">X-7 Raw Architectural Denim</h3>
                                <p class="text-zinc-300 text-xs font-medium">Japanese red-line selvedge ID • Blood-red interior chainstitch • Triple-needle felled seams.</p>
                            </div>
                        </div>

                        <!-- Card Footer Strip -->
                        <div class="p-5 bg-white dark:bg-zinc-900 flex items-center justify-between border-t border-zinc-200 dark:border-zinc-800">
                            <div class="flex items-center gap-2">
                                <span class="w-2.5 h-2.5 rounded-full bg-red-600"></span>
                                <span class="text-xs font-black uppercase tracking-wider text-zinc-950 dark:text-white">Seven Series Industry Original</span>
                            </div>
                            <a href="#craft" class="text-xs font-black uppercase tracking-widest text-red-600 hover:underline">
                                View Specs &rarr;
                            </a>
                        </div>
                    </div>

                    <!-- Floating Quality Token -->
                    <div class="absolute -right-6 top-1/3 bg-white dark:bg-zinc-900 p-4 rounded-2xl shadow-2xl border-2 border-zinc-950 dark:border-zinc-700 hidden sm:block z-20">
                        <div class="text-2xl font-black text-red-600 tracking-tight">85,000</div>
                        <div class="text-[10px] font-black uppercase tracking-wider text-zinc-600 dark:text-zinc-400">Abrasion Rub Cycles</div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- Industrial Contrast Ticker -->
    <div class="bg-red-600 py-3.5 overflow-hidden text-white select-none border-y-2 border-zinc-950">
        <div class="flex whitespace-nowrap animate-marquee">
            @for ($i = 0; $i < 6; $i++)
                <span class="text-sm font-black uppercase tracking-[0.25em] inline-flex items-center gap-6 px-6">
                    <span>SEVEN SERIES</span>
                    <span class="text-zinc-950 font-black">•</span>
                    <span>RAW DENIM ARMOR</span>
                    <span class="text-zinc-950 font-black">•</span>
                    <span>UNCOMPROMISED JAPANESE WEAVE</span>
                    <span class="text-zinc-950 font-black">•</span>
                    <span>TRIPLE FELLED SEAM INTEGRITY</span>
                    <span class="text-zinc-950 font-black">•</span>
                    <span>BUILT FOR ETERNITY</span>
                    <span class="text-zinc-950 font-black">•</span>
                </span>
            @endfor
        </div>
    </div>

    <!-- Section 1: The Brand Manifesto & Origin Story -->
    <section id="manifesto" class="py-28 bg-white dark:bg-zinc-950 border-b border-zinc-200 dark:border-zinc-900 transition-colors duration-500">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid lg:grid-cols-12 gap-16 items-center">
                
                <div class="lg:col-span-5 space-y-6">
                    <div class="inline-block px-3 py-1 bg-red-100 dark:bg-red-950/40 border border-red-200 dark:border-red-900/60 rounded-full text-red-600 text-xs font-black tracking-widest uppercase">
                        ORIGIN & MANIFESTO
                    </div>
                    <h2 class="text-4xl sm:text-5xl font-black tracking-tight text-zinc-950 dark:text-white uppercase leading-tight">
                        WHY SEVEN SERIES <br>
                        <span class="text-red-600">EXISTS.</span>
                    </h2>
                    <div class="w-16 h-1 bg-red-600"></div>
                    <p class="text-zinc-600 dark:text-zinc-400 text-base sm:text-lg leading-relaxed font-medium">
                        The modern apparel market is flooded with synthetic compromises — cheap stretch blends that tear at the seams, fake pre-distressed jeans made to decay in months, and brands that charge absurd premiums for empty logos.
                    </p>
                    <p class="text-zinc-600 dark:text-zinc-400 text-base sm:text-lg leading-relaxed font-medium">
                        <strong class="text-zinc-950 dark:text-white font-black">Seven Series Garment Industry</strong> was founded to shatter that cycle. We engineer heavyweight, raw shuttle-loomed denim that starts stiff, molds to your anatomy through wear and tear, and becomes an immortal record of your life.
                    </p>
                </div>

                <div class="lg:col-span-7 grid sm:grid-cols-2 gap-8">
                    <!-- Manifesto Point 1 -->
                    <div class="p-8 rounded-3xl bg-zinc-50 dark:bg-zinc-900 border-2 border-zinc-200 dark:border-zinc-800 space-y-4 hover:border-red-600 transition-colors">
                        <div class="w-12 h-12 rounded-2xl bg-red-600 text-white flex items-center justify-center font-black text-lg shadow-lg shadow-red-600/30">
                            01
                        </div>
                        <h3 class="text-xl font-black uppercase text-zinc-950 dark:text-white">Uncompromising Cotton</h3>
                        <p class="text-zinc-600 dark:text-zinc-400 text-sm font-medium leading-relaxed">
                            No microplastics. No cheap polyester stretch cores that sag after five washes. Only 100% heavy ring-spun cotton that breathes and endures.
                        </p>
                    </div>

                    <!-- Manifesto Point 2 -->
                    <div class="p-8 rounded-3xl bg-zinc-50 dark:bg-zinc-900 border-2 border-zinc-200 dark:border-zinc-800 space-y-4 hover:border-red-600 transition-colors">
                        <div class="w-12 h-12 rounded-2xl bg-zinc-950 text-white flex items-center justify-center font-black text-lg shadow-lg">
                            02
                        </div>
                        <h3 class="text-xl font-black uppercase text-zinc-950 dark:text-white">Architectural Cuts</h3>
                        <p class="text-zinc-600 dark:text-zinc-400 text-sm font-medium leading-relaxed">
                            Our patterns are engineered with mathematical ergonomics. Room where you move, structured where you stand, sharp from every angle.
                        </p>
                    </div>

                    <!-- Manifesto Point 3 -->
                    <div class="p-8 rounded-3xl bg-zinc-50 dark:bg-zinc-900 border-2 border-zinc-200 dark:border-zinc-800 space-y-4 hover:border-red-600 transition-colors">
                        <div class="w-12 h-12 rounded-2xl bg-zinc-950 text-white flex items-center justify-center font-black text-lg shadow-lg">
                            03
                        </div>
                        <h3 class="text-xl font-black uppercase text-zinc-950 dark:text-white">Street-Tested Armor</h3>
                        <p class="text-zinc-600 dark:text-zinc-400 text-sm font-medium leading-relaxed">
                            Tested by skaters, motorcycle riders, and urban explorers. Made to take pavement scrapes, heavy rain, and relentless grit without backing down.
                        </p>
                    </div>

                    <!-- Manifesto Point 4 -->
                    <div class="p-8 rounded-3xl bg-red-600 text-white space-y-4 shadow-xl">
                        <div class="w-12 h-12 rounded-2xl bg-white text-red-600 flex items-center justify-center font-black text-lg">
                            04
                        </div>
                        <h3 class="text-xl font-black uppercase text-white">The Living Indigo</h3>
                        <p class="text-red-100 text-sm font-medium leading-relaxed">
                            Rope-dyed indigo fades naturally to reveal high-contrast honeycombs and whiskers that tell the genuine story of how you live.
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Section 2: Visual Jeans Exhibition -->
    <section id="exhibition" class="py-28 bg-zinc-50 dark:bg-zinc-900/50 transition-colors duration-500">
        <div class="max-w-7xl mx-auto px-6">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-end gap-6 mb-16">
                <div class="space-y-4">
                    <div class="inline-block px-3 py-1 bg-red-100 dark:bg-red-950/40 border border-red-200 dark:border-red-900/60 rounded-full text-red-600 text-xs font-black tracking-widest uppercase">
                        EXHIBITION ARCHIVE
                    </div>
                    <h2 class="text-4xl sm:text-5xl font-black tracking-tight text-zinc-950 dark:text-white uppercase">
                        SIGNATURE <span class="text-red-600">SILHOUETTES.</span>
                    </h2>
                    <p class="text-zinc-600 dark:text-zinc-400 font-medium max-w-xl text-base">
                        Explore our iconic denim cuts, raw weaves, and specialized washes developed in the Seven Series laboratory.
                    </p>
                </div>

                <div class="flex items-center gap-3">
                    <a href="#lookbook" class="px-6 py-3 bg-zinc-950 hover:bg-red-600 text-white font-black text-xs uppercase tracking-widest rounded-xl transition-all shadow-md">
                        View Editorial Lookbook &rarr;
                    </a>
                </div>
            </div>

            <!-- Exhibition Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                
                <!-- Silhouette 1 -->
                <div class="group rounded-3xl bg-white dark:bg-zinc-900 border-2 border-zinc-200 dark:border-zinc-800 overflow-hidden hover:border-red-600 hover:shadow-2xl transition-all duration-300 flex flex-col justify-between">
                    <div>
                        <div class="relative aspect-[4/5] overflow-hidden bg-zinc-950">
                            <img src="{{ asset('images/collection-1.png') }}" alt="Seven Series X-7 Raw Cobalt Jeans" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                            <div class="absolute top-4 left-4">
                                <span class="px-3 py-1 bg-white text-zinc-950 text-[10px] font-black uppercase tracking-widest rounded-full shadow-md">
                                    14.5 OZ KURABO RAW
                                </span>
                            </div>
                            <div class="absolute bottom-4 right-4">
                                <span class="px-3 py-1 bg-red-600 text-white text-[10px] font-black uppercase tracking-widest rounded-full shadow-md">
                                    RED-LINE SELVEDGE
                                </span>
                            </div>
                        </div>

                        <div class="p-8 space-y-4">
                            <div class="space-y-1">
                                <span class="text-[10px] font-black uppercase tracking-widest text-red-600">Model Series 01</span>
                                <h3 class="text-2xl font-black uppercase text-zinc-950 dark:text-white">X-7 Raw Cobalt</h3>
                            </div>
                            <p class="text-zinc-600 dark:text-zinc-400 text-sm font-medium leading-relaxed">
                                Unwashed, untreated, unapologetic. Traditional straight cut with a mid-rise waist, designed to mold to your body over hundreds of days of wear.
                            </p>

                            <div class="pt-4 border-t border-zinc-200 dark:border-zinc-800 grid grid-cols-2 gap-3 text-xs">
                                <div>
                                    <span class="text-zinc-400 font-bold block text-[10px] uppercase">Silhouette</span>
                                    <span class="font-black text-zinc-950 dark:text-white">Architectural Straight</span>
                                </div>
                                <div>
                                    <span class="text-zinc-400 font-bold block text-[10px] uppercase">Hardware</span>
                                    <span class="font-black text-zinc-950 dark:text-white">Titanium-Finish Alloy</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="p-8 pt-0">
                        <a href="#craft" class="w-full py-3.5 bg-zinc-100 hover:bg-red-600 hover:text-white dark:bg-zinc-800 dark:hover:bg-red-600 text-zinc-950 dark:text-white font-black text-xs uppercase tracking-widest rounded-xl text-center block transition-colors">
                            Inspect Craft Details
                        </a>
                    </div>
                </div>

                <!-- Silhouette 2 -->
                <div class="group rounded-3xl bg-white dark:bg-zinc-900 border-2 border-zinc-200 dark:border-zinc-800 overflow-hidden hover:border-red-600 hover:shadow-2xl transition-all duration-300 flex flex-col justify-between">
                    <div>
                        <div class="relative aspect-[4/5] overflow-hidden bg-zinc-950">
                            <img src="{{ asset('images/collection-2.png') }}" alt="Seven Series 07 Rebel Tapered Jeans" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                            <div class="absolute top-4 left-4">
                                <span class="px-3 py-1 bg-white text-zinc-950 text-[10px] font-black uppercase tracking-widest rounded-full shadow-md">
                                    13.8 OZ OZONE WASH
                                </span>
                            </div>
                            <div class="absolute bottom-4 right-4">
                                <span class="px-3 py-1 bg-zinc-950 text-white text-[10px] font-black uppercase tracking-widest rounded-full shadow-md">
                                    VINTAGE RESIN WASH
                                </span>
                            </div>
                        </div>

                        <div class="p-8 space-y-4">
                            <div class="space-y-1">
                                <span class="text-[10px] font-black uppercase tracking-widest text-red-600">Model Series 02</span>
                                <h3 class="text-2xl font-black uppercase text-zinc-950 dark:text-white">07 Rebel Taper</h3>
                            </div>
                            <p class="text-zinc-600 dark:text-zinc-400 text-sm font-medium leading-relaxed">
                                Relaxed thigh tapering cleanly to a narrow leg opening. Finished with waterless ozone washing for an authentic vintage worn-in aesthetic.
                            </p>

                            <div class="pt-4 border-t border-zinc-200 dark:border-zinc-800 grid grid-cols-2 gap-3 text-xs">
                                <div>
                                    <span class="text-zinc-400 font-bold block text-[10px] uppercase">Silhouette</span>
                                    <span class="font-black text-zinc-950 dark:text-white">Modern Street Taper</span>
                                </div>
                                <div>
                                    <span class="text-zinc-400 font-bold block text-[10px] uppercase">Wash Process</span>
                                    <span class="font-black text-zinc-950 dark:text-white">95% Waterless Ozone</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="p-8 pt-0">
                        <a href="#craft" class="w-full py-3.5 bg-zinc-100 hover:bg-red-600 hover:text-white dark:bg-zinc-800 dark:hover:bg-red-600 text-zinc-950 dark:text-white font-black text-xs uppercase tracking-widest rounded-xl text-center block transition-colors">
                            Inspect Craft Details
                        </a>
                    </div>
                </div>

                <!-- Silhouette 3 -->
                <div class="group rounded-3xl bg-white dark:bg-zinc-900 border-2 border-zinc-200 dark:border-zinc-800 overflow-hidden hover:border-red-600 hover:shadow-2xl transition-all duration-300 flex flex-col justify-between">
                    <div>
                        <div class="relative aspect-[4/5] overflow-hidden bg-zinc-950">
                            <img src="{{ asset('images/collection-3.png') }}" alt="Seven Series Dark Obsidian Heavy Utility Jeans" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                            <div class="absolute top-4 left-4">
                                <span class="px-3 py-1 bg-white text-zinc-950 text-[10px] font-black uppercase tracking-widest rounded-full shadow-md">
                                    15.0 OZ BLACK SELVEDGE
                                </span>
                            </div>
                            <div class="absolute bottom-4 right-4">
                                <span class="px-3 py-1 bg-red-600 text-white text-[10px] font-black uppercase tracking-widest rounded-full shadow-md">
                                    SULFUR OVERDYED
                                </span>
                            </div>
                        </div>

                        <div class="p-8 space-y-4">
                            <div class="space-y-1">
                                <span class="text-[10px] font-black uppercase tracking-widest text-red-600">Model Series 03</span>
                                <h3 class="text-2xl font-black uppercase text-zinc-950 dark:text-white">Dark Obsidian Utility</h3>
                            </div>
                            <p class="text-zinc-600 dark:text-zinc-400 text-sm font-medium leading-relaxed">
                                Deep sulfur double-black selvedge denim that fades to dark graphite. Features reinforced pocket bags, gusseted seat, and matte black alloy rivets.
                            </p>

                            <div class="pt-4 border-t border-zinc-200 dark:border-zinc-800 grid grid-cols-2 gap-3 text-xs">
                                <div>
                                    <span class="text-zinc-400 font-bold block text-[10px] uppercase">Silhouette</span>
                                    <span class="font-black text-zinc-950 dark:text-white">Heavy Industrial Wide</span>
                                </div>
                                <div>
                                    <span class="text-zinc-400 font-bold block text-[10px] uppercase">Stitch Details</span>
                                    <span class="font-black text-zinc-950 dark:text-white">Triple Blood-Red Core</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="p-8 pt-0">
                        <a href="#craft" class="w-full py-3.5 bg-zinc-100 hover:bg-red-600 hover:text-white dark:bg-zinc-800 dark:hover:bg-red-600 text-zinc-950 dark:text-white font-black text-xs uppercase tracking-widest rounded-xl text-center block transition-colors">
                            Inspect Craft Details
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Section 3: Material & Craft Breakdown -->
    <section id="craft" class="py-28 bg-white dark:bg-zinc-950 border-y border-zinc-200 dark:border-zinc-900 transition-colors duration-500">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid lg:grid-cols-12 gap-16 items-center">
                
                <!-- Macro Detail Photo -->
                <div class="lg:col-span-6">
                    <div class="relative group">
                        <div class="absolute -inset-4 bg-red-600/20 blur-2xl rounded-3xl opacity-50 group-hover:opacity-100 transition-opacity duration-700"></div>
                        <div class="relative z-10 rounded-3xl overflow-hidden border-2 border-zinc-950 dark:border-zinc-800 shadow-2xl bg-black">
                            <img src="{{ asset('images/craft.jpg') }}" alt="Macro view of Seven Series titanium hardware, selvedge edge, and red contrast stitching" class="w-full h-[580px] object-cover transition-transform duration-700 group-hover:scale-105">
                            <div class="absolute inset-0 bg-gradient-to-t from-zinc-950 via-zinc-950/20 to-transparent"></div>
                            
                            <div class="absolute bottom-6 left-6 right-6 text-white space-y-2">
                                <span class="px-3 py-1 bg-red-600 text-[10px] font-black uppercase tracking-widest rounded-full">
                                    ANATOMY OF A SEVEN SERIES SEAM
                                </span>
                                <h3 class="text-2xl font-black uppercase">Macro-Precision Engineering</h3>
                                <p class="text-zinc-300 text-xs font-medium">Japanese red-line selvedge edge, 3-ply high-tensile core thread, and CNC-machined titanium-tone hardware.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Technical Craft Pillars -->
                <div class="lg:col-span-6 space-y-8">
                    <div class="space-y-4">
                        <div class="inline-block px-3 py-1 bg-red-100 dark:bg-red-950/40 border border-red-200 dark:border-red-900/60 rounded-full text-red-600 text-xs font-black tracking-widest uppercase">
                            MICRO-ENGINEERING
                        </div>
                        <h2 class="text-4xl sm:text-5xl font-black tracking-tight text-zinc-950 dark:text-white uppercase leading-tight">
                            ANATOMY OF <br>
                            <span class="text-red-600">INDOMITABLE DENIM.</span>
                        </h2>
                        <p class="text-zinc-600 dark:text-zinc-400 font-medium leading-relaxed">
                            Every single joint, rivet, pocket edge, and thread choice in Seven Series jeans is calculated for maximum tensile endurance. We don't take shortcuts on thread count or hardware alloys.
                        </p>
                    </div>

                    <div class="space-y-5">
                        <!-- Craft Item 1 -->
                        <div class="p-5 rounded-2xl bg-zinc-50 dark:bg-zinc-900 border-2 border-zinc-200 dark:border-zinc-800 flex gap-4 items-start group hover:border-red-600 transition-colors">
                            <div class="w-12 h-12 rounded-xl bg-red-600 text-white flex items-center justify-center font-black text-sm flex-shrink-0">
                                01
                            </div>
                            <div class="space-y-1">
                                <h4 class="text-lg font-black uppercase text-zinc-950 dark:text-white">Triple-Lock Felled Seams</h4>
                                <p class="text-zinc-600 dark:text-zinc-400 text-xs leading-relaxed font-medium">Sewn on restored vintage Union Special chainstitch machines with high-tensile poly-core thread that never snaps under structural stress.</p>
                            </div>
                        </div>

                        <!-- Craft Item 2 -->
                        <div class="p-5 rounded-2xl bg-zinc-50 dark:bg-zinc-900 border-2 border-zinc-200 dark:border-zinc-800 flex gap-4 items-start group hover:border-red-600 transition-colors">
                            <div class="w-12 h-12 rounded-xl bg-zinc-950 text-white flex items-center justify-center font-black text-sm flex-shrink-0">
                                02
                            </div>
                            <div class="space-y-1">
                                <h4 class="text-lg font-black uppercase text-zinc-950 dark:text-white">Custom Cast Titanium & Alloy Hardware</h4>
                                <p class="text-zinc-600 dark:text-zinc-400 text-xs leading-relaxed font-medium">Heavyweight shank buttons and hidden pocket-reinforcing copper rivets that withstand thousands of pounds of pressure without bending.</p>
                            </div>
                        </div>

                        <!-- Craft Item 3 -->
                        <div class="p-5 rounded-2xl bg-zinc-50 dark:bg-zinc-900 border-2 border-zinc-200 dark:border-zinc-800 flex gap-4 items-start group hover:border-red-600 transition-colors">
                            <div class="w-12 h-12 rounded-xl bg-red-600 text-white flex items-center justify-center font-black text-sm flex-shrink-0">
                                03
                            </div>
                            <div class="space-y-1">
                                <h4 class="text-lg font-black uppercase text-zinc-950 dark:text-white">Signature Blood-Red Interior Chainstitch</h4>
                                <p class="text-zinc-600 dark:text-zinc-400 text-xs leading-relaxed font-medium">When you cuff your Seven Series hem, our unmistakable red chainstitch marks you as part of the raw denim elite.</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Section 4: Brand Lookbook / Visual Gallery -->
    <section id="lookbook" class="py-28 bg-zinc-50 dark:bg-zinc-900/60 transition-colors duration-500">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center space-y-4 mb-16">
                <div class="inline-block px-3 py-1 bg-red-100 dark:bg-red-950/40 border border-red-200 dark:border-red-900/60 rounded-full text-red-600 text-xs font-black tracking-widest uppercase">
                    VISUAL GALLERY
                </div>
                <h2 class="text-4xl sm:text-5xl font-black tracking-tight text-zinc-950 dark:text-white uppercase">
                    THE EDITORIAL <span class="text-red-600">LOOKBOOK.</span>
                </h2>
                <p class="text-zinc-600 dark:text-zinc-400 font-medium max-w-xl mx-auto">
                    Street culture, architectural denim, and raw attitude in motion.
                </p>
            </div>

            <!-- Mosaic Gallery Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="relative aspect-[3/4] rounded-2xl overflow-hidden group shadow-lg border-2 border-zinc-950">
                    <img src="{{ asset('images/hero.png') }}" class="w-full h-full object-cover grayscale group-hover:grayscale-0 transition-all duration-700 group-hover:scale-105" alt="Seven Series Street Look 01">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent"></div>
                    <div class="absolute bottom-4 left-4 text-white">
                        <span class="text-[10px] font-black uppercase tracking-widest text-red-500">Look 01</span>
                        <h4 class="text-sm font-black uppercase">Urban Raw Indigo</h4>
                    </div>
                </div>

                <div class="relative aspect-[3/4] rounded-2xl overflow-hidden group shadow-lg border-2 border-zinc-950">
                    <img src="{{ asset('images/collection-1.png') }}" class="w-full h-full object-cover grayscale group-hover:grayscale-0 transition-all duration-700 group-hover:scale-105" alt="Seven Series Street Look 02">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent"></div>
                    <div class="absolute bottom-4 left-4 text-white">
                        <span class="text-[10px] font-black uppercase tracking-widest text-red-500">Look 02</span>
                        <h4 class="text-sm font-black uppercase">Architectural Fit</h4>
                    </div>
                </div>

                <div class="relative aspect-[3/4] rounded-2xl overflow-hidden group shadow-lg border-2 border-zinc-950">
                    <img src="{{ asset('images/collection-2.png') }}" class="w-full h-full object-cover grayscale group-hover:grayscale-0 transition-all duration-700 group-hover:scale-105" alt="Seven Series Street Look 03">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent"></div>
                    <div class="absolute bottom-4 left-4 text-white">
                        <span class="text-[10px] font-black uppercase tracking-widest text-red-500">Look 03</span>
                        <h4 class="text-sm font-black uppercase">Street Mobility</h4>
                    </div>
                </div>

                <div class="relative aspect-[3/4] rounded-2xl overflow-hidden group shadow-lg border-2 border-zinc-950">
                    <img src="{{ asset('images/collection-3.png') }}" class="w-full h-full object-cover grayscale group-hover:grayscale-0 transition-all duration-700 group-hover:scale-105" alt="Seven Series Street Look 04">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent"></div>
                    <div class="absolute bottom-4 left-4 text-white">
                        <span class="text-[10px] font-black uppercase tracking-widest text-red-500">Look 04</span>
                        <h4 class="text-sm font-black uppercase">Obsidian Stormwear</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section 5: Factory & Industry Roots (Subtle production roots + B2B gateway) -->
    <section id="roots" class="py-28 bg-white dark:bg-zinc-950 border-t border-zinc-200 dark:border-zinc-900 transition-colors duration-500">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid lg:grid-cols-12 gap-16 items-center">
                
                <div class="lg:col-span-6 space-y-6">
                    <div class="inline-block px-3 py-1 bg-red-100 dark:bg-red-950/40 border border-red-200 dark:border-red-900/60 rounded-full text-red-600 text-xs font-black tracking-widest uppercase">
                        INDUSTRY HERITAGE
                    </div>
                    <h2 class="text-4xl sm:text-5xl font-black tracking-tight text-zinc-950 dark:text-white uppercase leading-tight">
                        FACTORY ROOTS. <br>
                        <span class="text-red-600">STREET SOUL.</span>
                    </h2>
                    <p class="text-zinc-600 dark:text-zinc-400 text-base sm:text-lg leading-relaxed font-medium">
                        Unlike fashion labels that merely slap tags on third-party white-label blanks, <strong class="text-zinc-950 dark:text-white font-black">Seven Series Garment Industry</strong> operates its own industrial floor.
                    </p>
                    <p class="text-zinc-600 dark:text-zinc-400 text-base leading-relaxed font-medium">
                        From computerized pattern nesting and automated laser fabric cutting to in-house tensile stress testing, our industry background is what guarantees that every pair of jeans leaving our facility is physically indestructible.
                    </p>

                    <!-- Elegant B2B Wholesale Portal Box -->
                    <div class="pt-6">
                        <div class="p-8 rounded-3xl bg-zinc-950 text-white border-2 border-red-600 space-y-4 shadow-2xl">
                            <div class="flex items-center justify-between">
                                <span class="text-xs font-black uppercase tracking-widest text-red-500">B2B & WHOLESALE SECTOR</span>
                                <span class="w-2 h-2 rounded-full bg-red-500 animate-pulse"></span>
                            </div>
                            <h3 class="text-2xl font-black uppercase">Are you a Retailer, Distributor, or Wholesaler?</h3>
                            <p class="text-zinc-400 text-sm leading-relaxed">
                                We maintain dedicated volume manufacturing lines, MOQ allocations, private label OEM prototyping, and FOB export channels for commercial partners.
                            </p>
                            <div class="pt-2">
                                <a href="/b2b" class="inline-flex items-center gap-2 px-6 py-3.5 bg-red-600 hover:bg-red-700 text-white text-xs font-black uppercase tracking-widest rounded-xl transition-all shadow-lg shadow-red-600/30">
                                    <span>Enter Dedicated B2B Portal</span>
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-6">
                    <div class="relative group">
                        <div class="absolute -inset-4 bg-gradient-to-r from-red-600/20 to-transparent blur-2xl rounded-3xl opacity-50 group-hover:opacity-100 transition-opacity duration-700"></div>
                        <div class="relative rounded-3xl overflow-hidden border-2 border-zinc-950 dark:border-zinc-800 shadow-2xl bg-black">
                            <img src="{{ asset('images/facility.jpg') }}" alt="Seven Series Garment Industrial Floor" class="w-full h-[540px] object-cover transition-transform duration-700 group-hover:scale-105">
                            <div class="absolute inset-0 bg-gradient-to-t from-zinc-950 via-zinc-950/20 to-transparent"></div>
                            <div class="absolute bottom-6 left-6 right-6 text-white">
                                <span class="px-3 py-1 rounded-full bg-white text-zinc-950 text-[10px] font-black uppercase tracking-widest">
                                    SEVEN SERIES INDUSTRIAL FACILITY
                                </span>
                                <h4 class="text-xl font-black uppercase mt-2">Precision Craft at Industrial Scale</h4>
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