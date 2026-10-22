<x-layout 
    :image="asset('images/og-brandkit.png')" 
    imageAlt="Seven Series Brand Kit - Big Logo on Red Background"
>
    <x-slot:title>Brand Kit & Visual Guidelines | Seven Series Denim</x-slot>

    <x-nav transparent="true" />

    <main class="min-h-screen pt-6 sm:pt-10 pb-32 sm:pb-36 px-3.5 sm:px-6 lg:px-10 xl:px-12 w-full max-w-full overflow-hidden space-y-10 sm:space-y-16"
          x-data="{ activeCategory: 'all', copiedText: '' }">

        <!-- ========================================================================= -->
        <!-- BRANDKIT HERO HEADER -->
        <!-- ========================================================================= -->
        <section class="relative">
            <div class="app-card p-4 sm:p-8 lg:p-12 relative overflow-hidden bg-gradient-to-br from-white via-slate-50 to-red-50/20 border border-slate-200 shadow-xl">
                <div class="absolute -right-20 -top-20 w-96 h-96 bg-red-600/10 rounded-full blur-3xl pointer-events-none"></div>

                <div class="max-w-4xl space-y-4 sm:space-y-6 relative z-10">
                    <div class="inline-flex items-center gap-2.5 px-3.5 py-1.5 rounded-full bg-slate-900 text-white text-xs font-black tracking-wider uppercase shadow-sm">
                        <span class="w-2 h-2 rounded-full bg-red-500 animate-pulse"></span>
                        <span>OFFICIAL BRAND IDENTITY & MEDIA ASSETS</span>
                    </div>

                    <div class="space-y-3">
                        <h1 class="text-3xl sm:text-5xl lg:text-6xl font-extrabold tracking-tight text-zinc-950 uppercase leading-none break-words">
                            SEVEN SERIES <br>
                            <span class="text-red-600">BRAND KIT & GUIDELINES.</span>
                        </h1>
                        <p class="text-zinc-600 text-sm sm:text-lg leading-relaxed font-normal max-w-2xl">
                            Download official high-resolution vector logos, color specifications, typography rules, and brand guidelines for retail partners, press, and co-branded publications.
                        </p>
                    </div>

                    <!-- Direct ZIP Bundle Download Action -->
                    <div class="pt-2 flex flex-wrap items-center gap-4">
                        <a href="{{ route('brandkit.download') }}" 
                           class="inline-flex items-center gap-2.5 px-6 sm:px-8 py-3.5 rounded-full bg-red-600 hover:bg-red-700 text-white text-xs font-black uppercase tracking-wider transition-all shadow-lg shadow-red-600/30 hover:scale-105 active:scale-95">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                            <span>Download Complete Brand Package (.ZIP)</span>
                        </a>
                        <span class="text-xs font-medium text-zinc-500">
                            Includes SVGs, PNGs, Social Banners & Guidelines text file.
                        </span>
                    </div>
                </div>
            </div>
        </section>

        <!-- ========================================================================= -->
        <!-- SECTION 1: DOWNLOADABLE BRAND ASSETS GALLERY -->
        <!-- ========================================================================= -->
        <section class="space-y-6">
            
            <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-4 px-1">
                <div>
                    <span class="text-xs font-black uppercase tracking-wider text-red-600">MEDIA ASSETS</span>
                    <h2 class="text-2xl sm:text-3xl font-extrabold text-zinc-950 uppercase tracking-tight">Official Logos & Vectors</h2>
                    <p class="text-sm text-zinc-500 pt-1">Select any asset to download directly or copy the production CDN link.</p>
                </div>

                <!-- Asset Category Filter Tabs -->
                <div class="flex items-center gap-1.5 p-1 bg-zinc-100 rounded-full overflow-x-auto no-scrollbar text-xs font-bold text-zinc-600">
                    <button @click="activeCategory = 'all'" :class="activeCategory === 'all' ? 'bg-white text-zinc-950 shadow-xs' : 'hover:text-zinc-950'" class="px-3.5 py-1.5 rounded-full transition-all">All Assets</button>
                    <button @click="activeCategory = 'Logos'" :class="activeCategory === 'Logos' ? 'bg-white text-zinc-950 shadow-xs' : 'hover:text-zinc-950'" class="px-3.5 py-1.5 rounded-full transition-all">Logos</button>
                    <button @click="activeCategory = 'Vectors & Emblems'" :class="activeCategory === 'Vectors & Emblems' ? 'bg-white text-zinc-950 shadow-xs' : 'hover:text-zinc-950'" class="px-3.5 py-1.5 rounded-full transition-all">Vectors & Emblems</button>
                    <button @click="activeCategory = 'Digital Icons'" :class="activeCategory === 'Digital Icons' ? 'bg-white text-zinc-950 shadow-xs' : 'hover:text-zinc-950'" class="px-3.5 py-1.5 rounded-full transition-all">Icons</button>
                    <button @click="activeCategory = 'Banners & Media'" :class="activeCategory === 'Banners & Media' ? 'bg-white text-zinc-950 shadow-xs' : 'hover:text-zinc-950'" class="px-3.5 py-1.5 rounded-full transition-all">Banners</button>
                </div>
            </div>

            <!-- Assets Grid -->
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($assets as $asset)
                <div x-show="activeCategory === 'all' || activeCategory === '{{ $asset['category'] }}'"
                     x-transition:enter="transition ease-out duration-200"
                     x-transition:enter-start="opacity-0 scale-95"
                     x-transition:enter-end="opacity-100 scale-100"
                     class="app-card p-5 bg-white border border-slate-200 shadow-sm hover:shadow-md transition-all flex flex-col justify-between space-y-4 group">
                    
                    <div>
                        <!-- Preview Container -->
                        <div class="h-44 sm:h-48 rounded-2xl {{ $asset['background_class'] }} flex items-center justify-center pt-9 pb-3 px-4 relative overflow-hidden group-hover:scale-[1.01] transition-transform">
                            <img src="{{ asset($asset['preview_path'] ?? $asset['path']) }}" alt="{{ $asset['name'] }}" class="max-h-24 sm:max-h-28 max-w-[85%] object-contain filter drop-shadow-sm">
                            
                            <!-- Badges -->
                            <div class="absolute top-2.5 left-2.5 px-2.5 py-0.5 rounded-full bg-black/60 backdrop-blur-md text-white text-[9px] sm:text-[10px] font-mono font-bold uppercase tracking-wider">
                                {{ $asset['format'] }}
                            </div>
                            <div class="absolute top-2.5 right-2.5 px-2 py-0.5 rounded-md bg-white/80 backdrop-blur-md text-zinc-800 text-[9px] sm:text-[10px] font-bold">
                                {{ $asset['resolution'] }}
                            </div>
                        </div>

                        <!-- Asset Details -->
                        <div class="pt-4 space-y-1.5">
                            <span class="text-[10px] font-black uppercase tracking-wider text-red-600">{{ $asset['category'] }}</span>
                            <h3 class="text-base font-extrabold text-zinc-950 group-hover:text-red-600 transition-colors">{{ $asset['name'] }}</h3>
                            <p class="text-xs text-zinc-500 leading-relaxed">{{ $asset['description'] }}</p>
                        </div>
                    </div>

                    <!-- Actions -->
                    <div class="pt-3 border-t border-zinc-100 flex items-center gap-2">
                        <a href="{{ asset($asset['path']) }}" download="{{ $asset['filename'] }}" 
                           class="flex-1 inline-flex items-center justify-center gap-1.5 py-2.5 px-3 rounded-xl bg-zinc-900 hover:bg-red-600 text-white text-xs font-bold transition-all shadow-xs">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                            <span>Download {{ explode(' ', $asset['format'])[0] }}</span>
                        </a>

                        <button type="button" 
                                @click="navigator.clipboard.writeText('{{ url($asset['path']) }}'); copiedText = '{{ $asset['id'] }}'; setTimeout(() => copiedText = '', 2000)"
                                class="p-2.5 rounded-xl border border-zinc-200 hover:bg-zinc-100 text-zinc-700 transition-colors shrink-0" 
                                title="Copy asset URL">
                            <svg x-show="copiedText !== '{{ $asset['id'] }}'" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3"/></svg>
                            <svg x-show="copiedText === '{{ $asset['id'] }}'" x-cloak class="w-4 h-4 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        </button>
                    </div>

                </div>
                @endforeach
            </div>

        </section>

        <!-- ========================================================================= -->
        <!-- SECTION 2: OFFICIAL COLOR PALETTE -->
        <!-- ========================================================================= -->
        <section class="space-y-6">
            
            <div class="px-1">
                <span class="text-xs font-black uppercase tracking-wider text-red-600">COLOR IDENTITY</span>
                <h2 class="text-2xl sm:text-3xl font-extrabold text-zinc-950 uppercase tracking-tight">Official Brand Color Palette</h2>
                <p class="text-sm text-zinc-500 pt-1">Click any color code below to copy HEX or RGB values to your clipboard.</p>
            </div>

            <div class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4">
                @foreach($colors as $color)
                <div class="app-card overflow-hidden bg-white border border-slate-200 shadow-sm flex flex-col justify-between"
                     x-data="{ copiedColor: false }">
                    
                    <!-- Color Block -->
                    <div class="h-32 {{ $color['bg_class'] }} p-4 flex flex-col justify-between relative group">
                        <span class="text-[10px] font-black uppercase tracking-wider px-2 py-0.5 rounded bg-black/40 text-white backdrop-blur-md w-fit">
                            {{ $color['role'] }}
                        </span>

                        <button type="button" 
                                @click="navigator.clipboard.writeText('{{ $color['hex'] }}'); copiedColor = true; setTimeout(() => copiedColor = false, 2000)"
                                class="self-end px-2.5 py-1 rounded-full bg-white/90 hover:bg-white text-zinc-900 text-xs font-extrabold uppercase shadow-sm opacity-90 group-hover:opacity-100 transition-opacity flex items-center gap-1">
                            <span x-text="copiedColor ? 'Copied!' : 'Copy'"></span>
                            <span class="font-mono text-[10px] text-zinc-600">{{ $color['hex'] }}</span>
                        </button>
                    </div>

                    <!-- Color Info -->
                    <div class="p-4 space-y-2">
                        <div>
                            <h3 class="text-sm font-extrabold text-zinc-950">{{ $color['name'] }}</h3>
                            <p class="text-[11px] text-zinc-500 leading-snug pt-0.5">{{ $color['description'] }}</p>
                        </div>

                        <div class="pt-2 border-t border-zinc-100 font-mono text-[11px] space-y-1 text-zinc-700">
                            <div class="flex items-center justify-between">
                                <span class="text-zinc-400">HEX:</span>
                                <span class="font-bold">{{ $color['hex'] }}</span>
                            </div>
                            <div class="flex items-center justify-between">
                                <span class="text-zinc-400">RGB:</span>
                                <span>{{ $color['rgb'] }}</span>
                            </div>
                        </div>
                    </div>

                </div>
                @endforeach
            </div>

        </section>

        <!-- ========================================================================= -->
        <!-- SECTION 3: TYPOGRAPHY SYSTEM -->
        <!-- ========================================================================= -->
        <section class="space-y-6">
            
            <div class="px-1">
                <span class="text-xs font-black uppercase tracking-wider text-red-600">TYPOGRAPHY</span>
                <h2 class="text-2xl sm:text-3xl font-extrabold text-zinc-950 uppercase tracking-tight">Primary Font Family: Outfit</h2>
                <p class="text-sm text-zinc-500 pt-1">Modern, geometric, and sturdy sans-serif chosen to reflect industrial durability and precision crafting.</p>
            </div>

            <div class="app-card p-4 sm:p-8 lg:p-10 bg-white border border-slate-200 shadow-md space-y-6 sm:space-y-8">
                
                <!-- Specimen Row -->
                <div class="grid lg:grid-cols-12 gap-6 sm:gap-8 items-center border-b border-zinc-100 pb-6 sm:pb-8">
                    <div class="lg:col-span-5 space-y-2">
                        <span class="text-xs font-black text-red-600 uppercase tracking-wider">HEADINGS & TITLES</span>
                        <h3 class="text-lg sm:text-xl font-bold text-zinc-950">Outfit 800 (ExtraBold) & 900 (Black)</h3>
                        <p class="text-xs text-zinc-500 leading-relaxed">
                            Always set in uppercase with tight letter spacing (<code class="font-mono text-zinc-800">tracking-tight</code>) and leading between 1.0 and 1.1 for confident brand statements.
                        </p>
                    </div>

                    <div class="lg:col-span-7 bg-zinc-50 p-4 sm:p-6 rounded-2xl border border-zinc-200">
                        <p class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-zinc-950 uppercase tracking-tight leading-none break-words">
                            AUTHENTIC HEAVYWEIGHT DENIM CLOTHING.
                        </p>
                    </div>
                </div>

                <!-- Specimen Row 2 -->
                <div class="grid lg:grid-cols-12 gap-8 items-center">
                    <div class="lg:col-span-5 space-y-2">
                        <span class="text-xs font-black text-zinc-400 uppercase tracking-wider">BODY & DESCRIPTIONS</span>
                        <h3 class="text-xl font-bold text-zinc-950">Outfit 400 (Regular) & 500 (Medium)</h3>
                        <p class="text-xs text-zinc-500 leading-relaxed">
                            Used for readable product specs, fabric lab notes, retailer instructions, and contact details with generous line height (<code class="font-mono text-zinc-800">leading-relaxed</code>).
                        </p>
                    </div>

                    <div class="lg:col-span-7 bg-zinc-50 p-6 rounded-2xl border border-zinc-200 space-y-2">
                        <p class="text-sm sm:text-base font-normal text-zinc-700 leading-relaxed">
                            Seven Series jeans are woven on traditional shuttle looms in limited runs. Every garment features reinforced triple chain-stitching and cast brass hardware built to mold to your body with wear.
                        </p>
                        <div class="pt-2 flex items-center justify-between text-xs text-zinc-500 border-t border-zinc-200">
                            <span>Available on Google Fonts</span>
                            <a href="https://fonts.google.com/specimen/Outfit" target="_blank" rel="noopener noreferrer" class="text-red-600 font-bold hover:underline inline-flex items-center gap-1">
                                <span>Get Outfit on Google Fonts</span>
                                <span>&rarr;</span>
                            </a>
                        </div>
                    </div>
                </div>

            </div>

        </section>

        <!-- ========================================================================= -->
        <!-- SECTION 4: LOGO CLEAR SPACE & USAGE DO'S AND DON'TS -->
        <!-- ========================================================================= -->
        <section class="space-y-6">
            
            <div class="px-1">
                <span class="text-xs font-black uppercase tracking-wider text-red-600">BRAND INTEGRITY</span>
                <h2 class="text-2xl sm:text-3xl font-extrabold text-zinc-950 uppercase tracking-tight">Logo Usage Rules & Clear Space</h2>
                <p class="text-sm text-zinc-500 pt-1">Follow these core rules to maintain brand recognition and visual consistency.</p>
            </div>

            <div class="grid md:grid-cols-2 gap-6">
                
                <!-- DO'S -->
                <div class="app-card p-4 sm:p-6 bg-emerald-50/50 border border-emerald-200 shadow-sm space-y-4">
                    <div class="flex items-center gap-2 text-emerald-800 font-extrabold text-sm uppercase tracking-wider">
                        <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        <span>Recommended Logo Practices (Do's)</span>
                    </div>

                    <ul class="space-y-3 text-xs text-zinc-700 font-medium">
                        <li class="flex items-start gap-2.5">
                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-600 shrink-0 mt-1.5"></span>
                            <span><strong>Maintain Clear Space:</strong> Ensure minimum breathing margin equal to the height of the emblem on all four sides.</span>
                        </li>
                        <li class="flex items-start gap-2.5">
                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-600 shrink-0 mt-1.5"></span>
                            <span><strong>Contrast Integrity:</strong> Use the Light logo on white/light paper and the Dark logo on dark/indigo backgrounds.</span>
                        </li>
                        <li class="flex items-start gap-2.5">
                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-600 shrink-0 mt-1.5"></span>
                            <span><strong>Scale Proportionally:</strong> Always constrain proportions when resizing the logo so the emblem geometry remains intact.</span>
                        </li>
                        <li class="flex items-start gap-2.5">
                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-600 shrink-0 mt-1.5"></span>
                            <span><strong>Vector Formats:</strong> Prioritize the SVG emblem for billboard prints, store signage, and garment embroidery.</span>
                        </li>
                    </ul>
                </div>

                <!-- DON'TS -->
                <div class="app-card p-4 sm:p-6 bg-red-50/50 border border-red-200 shadow-sm space-y-4">
                    <div class="flex items-center gap-2 text-red-800 font-extrabold text-sm uppercase tracking-wider">
                        <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        <span>Unacceptable Modifications (Don'ts)</span>
                    </div>

                    <ul class="space-y-3 text-xs text-zinc-700 font-medium">
                        <li class="flex items-start gap-2.5">
                            <span class="w-1.5 h-1.5 rounded-full bg-red-600 shrink-0 mt-1.5"></span>
                            <span><strong>Do not stretch or distort:</strong> Never horizontally squeeze or vertically stretch the logo.</span>
                        </li>
                        <li class="flex items-start gap-2.5">
                            <span class="w-1.5 h-1.5 rounded-full bg-red-600 shrink-0 mt-1.5"></span>
                            <span><strong>Do not recolor arbitrarily:</strong> Do not change the signature Crimson Red (#DC2626) to orange, neon green, or purple.</span>
                        </li>
                        <li class="flex items-start gap-2.5">
                            <span class="w-1.5 h-1.5 rounded-full bg-red-600 shrink-0 mt-1.5"></span>
                            <span><strong>Do not add heavy effects:</strong> Avoid drop shadows, gradient fills, chrome bevels, or comic outlines.</span>
                        </li>
                        <li class="flex items-start gap-2.5">
                            <span class="w-1.5 h-1.5 rounded-full bg-red-600 shrink-0 mt-1.5"></span>
                            <span><strong>Do not overcrowd:</strong> Never place text or distracting background photos directly behind the wordmark.</span>
                        </li>
                    </ul>
                </div>

            </div>

        </section>

        <!-- ========================================================================= -->
        <!-- SECTION 5: PARTNER & MEDIA INQUIRIES -->
        <!-- ========================================================================= -->
        <section class="app-card p-5 sm:p-8 lg:p-10 bg-zinc-950 text-white relative overflow-hidden">
            <div class="absolute -right-20 -bottom-20 w-80 h-80 bg-red-600/20 rounded-full blur-3xl"></div>

            <div class="max-w-3xl space-y-4 relative z-10">
                <span class="text-xs font-black uppercase tracking-wider text-red-500">PRESS & PARTNER PERMISSIONS</span>
                <h2 class="text-2xl sm:text-4xl font-extrabold text-white uppercase tracking-tight">
                    Need Custom Formats or Co-Branding Approval?
                </h2>
                <p class="text-zinc-400 text-sm sm:text-base leading-relaxed">
                    Official retail stockists, fashion editors, and media production agencies requiring CMYK print-ready EPS/AI files or custom co-branding lockups can reach out directly to our brand team.
                </p>

                <div class="pt-2 flex flex-wrap items-center gap-4">
                    <a href="mailto:samparka@7series.com.np?subject=Brand%20Assets%20%26%20Co-Branding%20Inquiry" 
                       class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-5 sm:px-6 py-3 bg-red-600 hover:bg-red-700 text-white text-xs font-black uppercase tracking-wider rounded-full shadow-lg shadow-red-600/30 transition-all text-center break-all sm:break-normal">
                        <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        <span>Contact Brand Desk: samparka@7series.com.np</span>
                    </a>
                    <a href="/contact" class="inline-flex items-center gap-1.5 text-xs font-bold text-zinc-300 hover:text-white underline">
                        <span>Visit Factory Location & Contact Page</span>
                        <span>&rarr;</span>
                    </a>
                </div>
            </div>
        </section>

    </main>

    <x-footer />
</x-layout>
