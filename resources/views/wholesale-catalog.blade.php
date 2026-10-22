<x-layout>
    <x-slot:title>Wholesale Line Sheet & Catalog | Seven Series Garment Industry</x-slot>

    <main class="pt-6 sm:pt-10 pb-24 max-w-7xl mx-auto px-3.5 sm:px-6 w-full max-w-full overflow-hidden" x-data="{
        selectedCategory: 'all',
        inquiryModalOpen: false,
        activeProduct: null,
        openInquiry(productName) {
            this.activeProduct = productName;
            this.inquiryModalOpen = true;
        }
    }">
        <!-- Page Header -->
        <div class="mb-12 sm:mb-16 border-b border-zinc-200 pb-8 sm:pb-12">
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-red-100 border border-red-200 text-red-600 text-xs font-black tracking-widest uppercase mb-4">
                <span>B2B WHOLESALE & BULK PRODUCTION</span>
            </div>
            <div class="flex flex-col md:flex-row md:items-end justify-between gap-6">
                <div>
                    <h1 class="text-3xl sm:text-5xl md:text-6xl font-black tracking-tight text-zinc-950 uppercase leading-tight break-words">
                        2026 INDUSTRIAL <span class="text-red-600">LINE SHEET.</span>
                    </h1>
                    <p class="text-zinc-600 font-medium max-w-2xl text-base mt-2">
                        Precision-engineered architectural garments available for volume wholesale allocation, private label OEM, and retail chain distribution.
                    </p>
                </div>
                <div class="flex items-center gap-3">
                    <a href="/b2b#rfq" class="px-6 py-3.5 bg-red-600 hover:bg-red-700 text-white font-black text-xs uppercase tracking-widest rounded-xl shadow-lg shadow-red-600/25 transition-all">
                        Request Complete PDF Line Sheet
                    </a>
                </div>
            </div>
        </div>

        <!-- Filter & Meta Bar -->
        <div class="flex flex-wrap items-center justify-between gap-4 mb-10 pb-6 border-b border-zinc-200">
            <div class="flex flex-wrap gap-2">
                <button type="button" 
                        @click="selectedCategory = 'all'"
                        :class="selectedCategory === 'all' ? 'bg-zinc-950 text-white' : 'bg-zinc-100 text-zinc-700 hover:bg-zinc-200'"
                        class="px-5 py-2.5 rounded-xl text-xs font-black uppercase tracking-wider transition-colors">
                    All Series
                </button>
                <button type="button" 
                        @click="selectedCategory = 'denim'"
                        :class="selectedCategory === 'denim' ? 'bg-zinc-950 text-white' : 'bg-zinc-100 text-zinc-700 hover:bg-zinc-200'"
                        class="px-5 py-2.5 rounded-xl text-xs font-black uppercase tracking-wider transition-colors">
                    Selvedge Denim
                </button>
                <button type="button" 
                        @click="selectedCategory = 'trousers'"
                        :class="selectedCategory === 'trousers' ? 'bg-zinc-950 text-white' : 'bg-zinc-100 text-zinc-700 hover:bg-zinc-200'"
                        class="px-5 py-2.5 rounded-xl text-xs font-black uppercase tracking-wider transition-colors">
                    Technical Trousers
                </button>
                <button type="button" 
                        @click="selectedCategory = 'outerwear'"
                        :class="selectedCategory === 'outerwear' ? 'bg-zinc-950 text-white' : 'bg-zinc-100 text-zinc-700 hover:bg-zinc-200'"
                        class="px-5 py-2.5 rounded-xl text-xs font-black uppercase tracking-wider transition-colors">
                    Outerwear & Jackets
                </button>
            </div>

            <div class="text-xs font-bold text-zinc-500 uppercase tracking-widest">
                Tier-1 Direct FOB Pricing • Minimum Order: 250 pcs / style
            </div>
        </div>

        <!-- Catalog Product Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
            
            <!-- Item 1: Raw Selvedge Denim -->
            <div class="group rounded-3xl bg-white border-2 border-zinc-200 overflow-hidden hover:border-red-600 hover:shadow-2xl transition-all duration-300 flex flex-col justify-between"
                 x-show="selectedCategory === 'all' || selectedCategory === 'denim'">
                <div>
                    <div class="relative aspect-[4/3] overflow-hidden bg-zinc-100">
                        <img src="{{ asset('images/denim-hero-fold.jpg') }}" alt="Series 01 Architectural Selvedge Denim" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                        <div class="absolute top-4 left-4">
                            <span class="px-3 py-1 bg-black/80 backdrop-blur rounded-full text-[10px] font-black uppercase tracking-widest text-white border border-white/20">
                                SERIES 01 • DENIM
                            </span>
                        </div>
                        <div class="absolute top-4 right-4">
                            <span class="px-3 py-1 bg-red-600 rounded-full text-[10px] font-black uppercase tracking-widest text-white">
                                MOQ: 250 PCS
                            </span>
                        </div>
                    </div>

                    <div class="p-8 space-y-4">
                        <div class="flex justify-between items-baseline">
                            <h3 class="text-xl font-black uppercase tracking-tight text-zinc-950">RAW ARCHITECTURAL SELVEDGE</h3>
                            <span class="text-base font-black text-red-600">$22.50 – $26.00</span>
                        </div>

                        <p class="text-zinc-600 text-sm font-medium leading-relaxed">
                            14.5oz Japanese shuttle-loom denim. Chain-stitched hem, copper bar-tacks, zero-water ozone rinsed.
                        </p>

                        <div class="space-y-1.5 pt-3 border-t border-zinc-200 text-xs font-bold text-zinc-600">
                            <div class="flex justify-between"><span>Fabric Weight:</span> <span class="text-zinc-950">14.5 oz Kurabo</span></div>
                            <div class="flex justify-between"><span>Sample Turnaround:</span> <span class="text-zinc-950">14 Business Days</span></div>
                            <div class="flex justify-between"><span>Target Retail MSRP:</span> <span class="text-zinc-950">$89 – $119</span></div>
                        </div>
                    </div>
                </div>

                <div class="p-8 pt-0 flex gap-3">
                    <button type="button" @click="openInquiry('Raw Architectural Selvedge')" 
                            class="flex-1 py-3.5 bg-red-600 hover:bg-red-700 text-white font-black text-xs uppercase tracking-widest rounded-xl transition-all text-center">
                        Request Sample Swatch
                    </button>
                    <a href="/b2b#rfq" class="py-3.5 px-4 bg-zinc-100 hover:bg-zinc-200 text-zinc-950 font-black text-xs uppercase tracking-widest rounded-xl transition-colors">
                        Quote
                    </a>
                </div>
            </div>

            <!-- Item 2: Technical Trousers -->
            <div class="group rounded-3xl bg-white border-2 border-zinc-200 overflow-hidden hover:border-red-600 hover:shadow-2xl transition-all duration-300 flex flex-col justify-between"
                 x-show="selectedCategory === 'all' || selectedCategory === 'trousers'">
                <div>
                    <div class="relative aspect-[4/3] overflow-hidden bg-zinc-100">
                        <img src="{{ asset('images/denim-black-fold.jpg') }}" alt="Series 02 Sulfur Black Denim" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                        <div class="absolute top-4 left-4">
                            <span class="px-3 py-1 bg-black/80 backdrop-blur rounded-full text-[10px] font-black uppercase tracking-widest text-white border border-white/20">
                                SERIES 02 • BLACK DENIM
                            </span>
                        </div>
                        <div class="absolute top-4 right-4">
                            <span class="px-3 py-1 bg-red-600 rounded-full text-[10px] font-black uppercase tracking-widest text-white">
                                MOQ: 300 PCS
                            </span>
                        </div>
                    </div>

                    <div class="p-8 space-y-4">
                        <div class="flex justify-between items-baseline">
                            <h3 class="text-xl font-black uppercase tracking-tight text-zinc-950">SULFUR DOUBLE BLACK DENIM</h3>
                            <span class="text-base font-black text-red-600">$19.80 – $24.50</span>
                        </div>

                        <p class="text-zinc-600 text-sm font-medium leading-relaxed">
                            13.8 oz sulfur black twill with matte gunmetal rivets, chain-stitched yokes, and sanforized shrinkage control.
                        </p>

                        <div class="space-y-1.5 pt-3 border-t border-zinc-200 text-xs font-bold text-zinc-600">
                            <div class="flex justify-between"><span>Composition:</span> <span class="text-zinc-950">100% Cotton Twill</span></div>
                            <div class="flex justify-between"><span>Shrinkage Control:</span> <span class="text-zinc-950">&lt; 1.5% Sanforized</span></div>
                            <div class="flex justify-between"><span>Target Retail MSRP:</span> <span class="text-zinc-950">$75 – $95</span></div>
                        </div>
                    </div>
                </div>

                <div class="p-8 pt-0 flex gap-3">
                    <button type="button" @click="openInquiry('4-Way Articulated Trouser')" 
                            class="flex-1 py-3.5 bg-red-600 hover:bg-red-700 text-white font-black text-xs uppercase tracking-widest rounded-xl transition-all text-center">
                        Request Sample Swatch
                    </button>
                    <a href="/b2b#rfq" class="py-3.5 px-4 bg-zinc-100 hover:bg-zinc-200 text-zinc-950 font-black text-xs uppercase tracking-widest rounded-xl transition-colors">
                        Quote
                    </a>
                </div>
            </div>

            <!-- Item 3: Industrial Outerwear -->
            <div class="group rounded-3xl bg-white border-2 border-zinc-200 overflow-hidden hover:border-red-600 hover:shadow-2xl transition-all duration-300 flex flex-col justify-between"
                 x-show="selectedCategory === 'all' || selectedCategory === 'outerwear'">
                <div>
                    <div class="relative aspect-[4/3] overflow-hidden bg-zinc-100">
                        <img src="{{ asset('images/hero.png') }}" alt="Series 03 Industrial Denim Trucker Jacket" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                        <div class="absolute top-4 left-4">
                            <span class="px-3 py-1 bg-black/80 backdrop-blur rounded-full text-[10px] font-black uppercase tracking-widest text-white border border-white/20">
                                SERIES 03 • DENIM JACKET
                            </span>
                        </div>
                        <div class="absolute top-4 right-4">
                            <span class="px-3 py-1 bg-red-600 rounded-full text-[10px] font-black uppercase tracking-widest text-white">
                                MOQ: 200 PCS
                            </span>
                        </div>
                    </div>

                    <div class="p-8 space-y-4">
                        <div class="flex justify-between items-baseline">
                            <h3 class="text-xl font-black uppercase tracking-tight text-zinc-950">BONDED TECHNICAL PARKA</h3>
                            <span class="text-base font-black text-red-600">$34.00 – $42.00</span>
                        </div>

                        <p class="text-zinc-600 text-sm font-medium leading-relaxed">
                            3-layer stormproof bonded cotton shell. Taped seams, anodized titanium alloy hardware, and modular interior harness.
                        </p>

                        <div class="space-y-1.5 pt-3 border-t border-zinc-200 text-xs font-bold text-zinc-600">
                            <div class="flex justify-between"><span>Waterproof Rating:</span> <span class="text-zinc-950">10,000mm Hydrostatic</span></div>
                            <div class="flex justify-between"><span>Hardware Finish:</span> <span class="text-zinc-950">Anodized Gunmetal</span></div>
                            <div class="flex justify-between"><span>Target Retail MSRP:</span> <span class="text-zinc-950">$145 – $195</span></div>
                        </div>
                    </div>
                </div>

                <div class="p-8 pt-0 flex gap-3">
                    <button type="button" @click="openInquiry('Bonded Technical Parka')" 
                            class="flex-1 py-3.5 bg-red-600 hover:bg-red-700 text-white font-black text-xs uppercase tracking-widest rounded-xl transition-all text-center">
                        Request Sample Swatch
                    </button>
                    <a href="/b2b#rfq" class="py-3.5 px-4 bg-zinc-100 hover:bg-zinc-200 text-zinc-950 font-black text-xs uppercase tracking-widest rounded-xl transition-colors">
                        Quote
                    </a>
                </div>
            </div>

            <!-- Dynamic products from Database if any -->
            @foreach($products as $product)
                @if($product->name !== 'Pant')
                    <div class="group rounded-3xl bg-white border-2 border-zinc-200 overflow-hidden hover:border-red-600 hover:shadow-2xl transition-all duration-300 flex flex-col justify-between">
                        <div>
                            <div class="relative aspect-[4/3] overflow-hidden bg-zinc-100">
                                @if($product->image)
                                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                                @else
                                    <div class="w-full h-full flex items-center justify-center text-zinc-400">
                                        <span class="text-xs font-bold uppercase tracking-widest">Garment Spec</span>
                                    </div>
                                @endif
                                <div class="absolute top-4 left-4">
                                    <span class="px-3 py-1 bg-black/80 backdrop-blur rounded-full text-[10px] font-black uppercase tracking-widest text-white border border-white/20">
                                        {{ $product->category->name ?? 'CUSTOM SERIES' }}
                                    </span>
                                </div>
                                <div class="absolute top-4 right-4">
                                    <span class="px-3 py-1 bg-red-600 rounded-full text-[10px] font-black uppercase tracking-widest text-white">
                                        MOQ: 250 PCS
                                    </span>
                                </div>
                            </div>

                            <div class="p-8 space-y-4">
                                <div class="flex justify-between items-baseline">
                                    <h3 class="text-xl font-black uppercase tracking-tight text-zinc-950">{{ $product->name }}</h3>
                                    <span class="text-base font-black text-red-600">${{ $product->price }} FOB</span>
                                </div>

                                <p class="text-zinc-600 text-sm font-medium line-clamp-2 leading-relaxed">
                                    {{ $product->description }}
                                </p>
                            </div>
                        </div>

                        <div class="p-8 pt-0 flex gap-3">
                            <button type="button" @click="openInquiry('{{ $product->name }}')" 
                                    class="flex-1 py-3.5 bg-red-600 hover:bg-red-700 text-white font-black text-xs uppercase tracking-widest rounded-xl transition-all text-center">
                                Request Sample
                            </button>
                            <a href="/b2b#rfq" class="py-3.5 px-4 bg-zinc-100 text-zinc-950 font-black text-xs uppercase tracking-widest rounded-xl transition-colors">
                                Quote
                            </a>
                        </div>
                    </div>
                @endif
            @endforeach

        </div>

        <!-- B2B Sample Request Modal -->
        <div x-show="inquiryModalOpen" x-cloak 
             class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/70 backdrop-blur-sm"
             @keydown.escape.window="inquiryModalOpen = false">
            <div class="relative w-full max-w-lg rounded-3xl bg-white border border-zinc-200 p-8 shadow-2xl space-y-6"
                 @click.outside="inquiryModalOpen = false">
                <div class="flex justify-between items-start">
                    <div>
                        <span class="text-[10px] font-black uppercase tracking-widest text-red-600 block">Sample Dispatch Request</span>
                        <h3 class="text-2xl font-black text-zinc-950" x-text="activeProduct"></h3>
                    </div>
                    <button type="button" @click="inquiryModalOpen = false" class="p-2 text-zinc-400 hover:text-zinc-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                    </button>
                </div>

                <p class="text-zinc-600 text-sm">
                    We dispatch physical pre-production sample swatches directly to corporate buying offices. Please confirm your procurement credentials:
                </p>

                <div class="space-y-4">
                    <a href="/b2b#rfq" @click="inquiryModalOpen = false" class="w-full py-4 bg-red-600 hover:bg-red-700 text-white font-black text-xs uppercase tracking-widest rounded-xl text-center block shadow-lg shadow-red-600/30">
                        Continue to Wholesale RFQ Desk
                    </a>
                </div>
            </div>
        </div>
    </main>

    <x-footer />
</x-layout>
