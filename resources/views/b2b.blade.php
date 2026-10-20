<x-layout>
    <x-slot:title>B2B Wholesale & Retail Partnerships | Seven Series Garment Industry</x-slot>

    <x-nav />

    <main class="pt-32 pb-24 max-w-7xl mx-auto px-6" x-data="{
        selectedCategory: 'all',
        inquiryModalOpen: false,
        activeProduct: '',
        openInquiry(name) {
            this.activeProduct = name;
            this.inquiryModalOpen = true;
        }
    }">
        <!-- Page Header -->
        <div class="mb-16 border-b border-zinc-200 dark:border-zinc-800 pb-12">
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-red-100 dark:bg-red-950/40 border border-red-200 dark:border-red-900/60 text-red-600 text-xs font-black tracking-widest uppercase mb-4">
                <span>EXCLUSIVE B2B PORTAL</span>
            </div>
            <div class="flex flex-col lg:flex-row lg:items-end justify-between gap-6">
                <div>
                    <h1 class="text-5xl md:text-6xl font-black tracking-tight text-zinc-900 dark:text-white uppercase">
                        WHOLESALE & <span class="text-red-600">RETAIL SUPPLY.</span>
                    </h1>
                    <p class="text-zinc-500 dark:text-zinc-400 font-medium max-w-2xl text-base mt-3 leading-relaxed">
                        Direct-from-factory garment manufacturing for volume wholesalers, retail chains, and private label fashion houses. Managed dynamically by our industrial production team.
                    </p>
                </div>
                <div class="flex items-center gap-4">
                    <a href="#rfq" class="px-8 py-4 bg-red-600 hover:bg-red-700 text-white font-black text-xs uppercase tracking-widest rounded-xl shadow-lg shadow-red-600/25 transition-all">
                        Request Line Sheet & Swatches
                    </a>
                </div>
            </div>
        </div>

        <!-- Dynamic Offerings Section (Managed via Filament Mukhiya Panel) -->
        <div class="mb-20">
            <div class="flex flex-wrap items-center justify-between gap-4 mb-10 pb-6 border-b border-zinc-200 dark:border-zinc-800">
                <div class="flex flex-wrap gap-2">
                    <button type="button" 
                            @click="selectedCategory = 'all'"
                            :class="selectedCategory === 'all' ? 'bg-zinc-900 dark:bg-white text-white dark:text-zinc-900' : 'bg-zinc-100 dark:bg-zinc-900 text-zinc-600 dark:text-zinc-400 hover:bg-zinc-200 dark:hover:bg-zinc-800'"
                            class="px-5 py-2.5 rounded-xl text-xs font-black uppercase tracking-wider transition-colors">
                        All Offerings
                    </button>
                    <button type="button" 
                            @click="selectedCategory = 'denim'"
                            :class="selectedCategory === 'denim' ? 'bg-zinc-900 dark:bg-white text-white dark:text-zinc-900' : 'bg-zinc-100 dark:bg-zinc-900 text-zinc-600 dark:text-zinc-400 hover:bg-zinc-200 dark:hover:bg-zinc-800'"
                            class="px-5 py-2.5 rounded-xl text-xs font-black uppercase tracking-wider transition-colors">
                        Selvedge Denim
                    </button>
                    <button type="button" 
                            @click="selectedCategory = 'trousers'"
                            :class="selectedCategory === 'trousers' ? 'bg-zinc-900 dark:bg-white text-white dark:text-zinc-900' : 'bg-zinc-100 dark:bg-zinc-900 text-zinc-600 dark:text-zinc-400 hover:bg-zinc-200 dark:hover:bg-zinc-800'"
                            class="px-5 py-2.5 rounded-xl text-xs font-black uppercase tracking-wider transition-colors">
                        Technical Trousers
                    </button>
                    <button type="button" 
                            @click="selectedCategory = 'outerwear'"
                            :class="selectedCategory === 'outerwear' ? 'bg-zinc-900 dark:bg-white text-white dark:text-zinc-900' : 'bg-zinc-100 dark:bg-zinc-900 text-zinc-600 dark:text-zinc-400 hover:bg-zinc-200 dark:hover:bg-zinc-800'"
                            class="px-5 py-2.5 rounded-xl text-xs font-black uppercase tracking-wider transition-colors">
                        Outerwear & Jackets
                    </button>
                </div>

                <div class="text-xs font-bold text-zinc-500 uppercase tracking-widest">
                    Direct Tier-1 FOB Allocation • Managed in Filament
                </div>
            </div>

            <!-- Offerings Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
                @forelse($offerings as $offering)
                    <div class="group rounded-3xl bg-white dark:bg-zinc-900/60 border border-zinc-200 dark:border-zinc-800 overflow-hidden hover:shadow-2xl transition-all duration-300 flex flex-col justify-between"
                         x-show="selectedCategory === 'all' || selectedCategory === '{{ strtolower($offering->category) }}'">
                        <div>
                            <div class="relative aspect-[4/3] overflow-hidden bg-zinc-100 dark:bg-zinc-800">
                                @if($offering->image && file_exists(public_path($offering->image)))
                                    <img src="{{ asset($offering->image) }}" alt="{{ $offering->title }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                                @elseif($offering->image && file_exists(public_path('storage/' . $offering->image)))
                                    <img src="{{ asset('storage/' . $offering->image) }}" alt="{{ $offering->title }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                                @else
                                    <img src="{{ asset('images/collection-1.png') }}" alt="{{ $offering->title }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                                @endif

                                <div class="absolute top-4 left-4">
                                    <span class="px-3 py-1 bg-black/80 backdrop-blur rounded-full text-[10px] font-black uppercase tracking-widest text-white border border-white/20">
                                        {{ $offering->category }}
                                    </span>
                                </div>
                                <div class="absolute top-4 right-4">
                                    <span class="px-3 py-1 bg-red-600 rounded-full text-[10px] font-black uppercase tracking-widest text-white shadow-md">
                                        MOQ: {{ $offering->moq }}
                                    </span>
                                </div>
                            </div>

                            <div class="p-8 space-y-4">
                                <div class="flex justify-between items-baseline">
                                    <h3 class="text-xl font-black uppercase tracking-tight text-zinc-900 dark:text-white">{{ $offering->title }}</h3>
                                    @if($offering->fob_price_range)
                                        <span class="text-sm font-black text-red-600">{{ $offering->fob_price_range }}</span>
                                    @endif
                                </div>

                                <p class="text-zinc-500 dark:text-zinc-400 text-sm font-medium leading-relaxed">
                                    {{ $offering->description }}
                                </p>

                                <div class="space-y-1.5 pt-3 border-t border-zinc-200 dark:border-zinc-800 text-xs font-bold text-zinc-600 dark:text-zinc-400">
                                    @if($offering->fabric_spec)
                                        <div class="flex justify-between"><span>Fabric Spec:</span> <span class="text-zinc-900 dark:text-white">{{ $offering->fabric_spec }}</span></div>
                                    @endif
                                    <div class="flex justify-between"><span>Turnaround:</span> <span class="text-zinc-900 dark:text-white">{{ $offering->turnaround_time }}</span></div>
                                </div>
                            </div>
                        </div>

                        <div class="p-8 pt-0 flex gap-3">
                            <button type="button" @click="openInquiry('{{ $offering->title }}')" 
                                    class="flex-1 py-3.5 bg-red-600 hover:bg-red-700 text-white font-black text-xs uppercase tracking-widest rounded-xl transition-all text-center">
                                Request Swatch & Specs
                            </button>
                            <a href="#rfq" class="py-3.5 px-4 bg-zinc-200 dark:bg-zinc-800 hover:bg-zinc-300 dark:hover:bg-zinc-700 text-zinc-900 dark:text-white font-black text-xs uppercase tracking-widest rounded-xl transition-colors">
                                RFQ
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="col-span-3 py-16 text-center border-2 border-dashed border-zinc-200 dark:border-zinc-800 rounded-3xl">
                        <p class="text-zinc-500 font-bold uppercase tracking-widest">No B2B Offerings logged yet.</p>
                        <p class="text-xs text-zinc-400 mt-2">Manage offerings from the Filament Mukhiya Panel at /mukhiya/b2b-offerings</p>
                    </div>
                @endforelse
            </div>
        </div>

        <!-- Partnership Tiers -->
        <div class="mb-24">
            <div class="text-center space-y-4 mb-16">
                <div class="inline-block px-3 py-1 bg-red-100 dark:bg-red-950/40 border border-red-200 dark:border-red-900/60 rounded-full text-red-600 text-xs font-black tracking-widest uppercase">
                    OPERATIONAL AGREEMENTS
                </div>
                <h2 class="text-4xl font-black text-zinc-900 dark:text-white uppercase tracking-tight">
                    WHOLESALE PARTNERSHIP <span class="text-red-600">TIERS.</span>
                </h2>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <!-- Tier 1 -->
                <div class="p-8 rounded-3xl bg-white dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-800 space-y-4">
                    <span class="text-xs font-black text-zinc-400 uppercase tracking-widest">Tier 01</span>
                    <h3 class="text-2xl font-black text-zinc-900 dark:text-white">Boutique Stockist</h3>
                    <div class="text-2xl font-black text-red-600">250 – 999 units</div>
                    <p class="text-zinc-500 text-sm">For multi-brand boutiques and independent stockists requiring small test batches.</p>
                    <ul class="space-y-2 pt-4 border-t border-zinc-100 dark:border-zinc-800 text-xs font-bold text-zinc-700 dark:text-zinc-300">
                        <li>• Standard 7Series branded apparel</li>
                        <li>• 14-day prototype turnaround</li>
                        <li>• Air-freight sample delivery</li>
                    </ul>
                </div>

                <!-- Tier 2 -->
                <div class="p-8 rounded-3xl bg-zinc-900 text-white border-2 border-red-600 space-y-4 shadow-2xl relative">
                    <div class="absolute -top-3 left-6 px-3 py-0.5 bg-red-600 text-[9px] font-black uppercase tracking-widest text-white rounded-full">
                        RECOMMENDED
                    </div>
                    <span class="text-xs font-black text-red-400 uppercase tracking-widest">Tier 02</span>
                    <h3 class="text-2xl font-black text-white">Regional Retail Chain</h3>
                    <div class="text-2xl font-black text-red-500">1,000 – 4,999 units</div>
                    <p class="text-zinc-400 text-sm">For regional store chains and high-volume apparel distributors.</p>
                    <ul class="space-y-2 pt-4 border-t border-zinc-800 text-xs font-bold text-zinc-200">
                        <li>• Custom trims, woven tags & leather patches</li>
                        <li>• 5% to 10% volume discount on FOB rate</li>
                        <li>• Priority line allocation in cutting hall</li>
                    </ul>
                </div>

                <!-- Tier 3 -->
                <div class="p-8 rounded-3xl bg-white dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-800 space-y-4">
                    <span class="text-xs font-black text-zinc-400 uppercase tracking-widest">Tier 03</span>
                    <h3 class="text-2xl font-black text-zinc-900 dark:text-white">Enterprise Private Label</h3>
                    <div class="text-2xl font-black text-red-600">5,000+ units</div>
                    <p class="text-zinc-500 text-sm">For national retail conglomerates and global private label brands.</p>
                    <ul class="space-y-2 pt-4 border-t border-zinc-100 dark:border-zinc-800 text-xs font-bold text-zinc-700 dark:text-zinc-300">
                        <li>• Full bespoke tech packs & exclusive dyeing</li>
                        <li>• Direct container shipping (FOB/CIF)</li>
                        <li>• Dedicated factory production liaison</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- RFQ Section -->
        <div id="rfq" class="max-w-4xl mx-auto rounded-3xl bg-white dark:bg-zinc-900/90 border border-zinc-200 dark:border-zinc-800 p-8 sm:p-12 shadow-2xl"
             x-data="{
                companyName: '',
                contactName: '',
                email: '',
                phone: '',
                businessType: 'Retailer',
                targetVolume: '1,000 - 4,999 units (Tier 2)',
                productSeries: 'Raw Architectural Denim',
                sampleRequested: true,
                notes: '',
                loading: false,
                submitted: false,
                error: '',
                referenceId: '',
                async submitRFQ() {
                    this.loading = true;
                    this.error = '';
                    try {
                        const res = await fetch('{{ route('wholesale.inquire') }}', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                'Accept': 'application/json'
                            },
                            body: JSON.stringify({
                                company_name: this.companyName,
                                contact_name: this.contactName,
                                email: this.email,
                                phone: this.phone,
                                business_type: this.businessType,
                                target_volume: this.targetVolume,
                                product_series: this.productSeries,
                                sample_requested: this.sampleRequested,
                                notes: this.notes
                            })
                        });
                        const data = await res.json();
                        if (res.ok) {
                            this.submitted = true;
                            this.referenceId = data.reference_id || '7S-RFQ-CONFIRMED';
                        } else {
                            this.error = data.message || 'Please check your inputs and try again.';
                        }
                    } catch (err) {
                        this.error = 'Communication failure. Please try again.';
                    } finally {
                        this.loading = false;
                    }
                }
             }">

            <div class="text-center space-y-3 mb-10">
                <span class="text-xs font-black uppercase tracking-widest text-red-600">DIRECT B2B RFQ</span>
                <h2 class="text-3xl sm:text-4xl font-black text-zinc-900 dark:text-white uppercase">Submit Wholesale Quotation Request</h2>
                <p class="text-zinc-500 text-sm max-w-lg mx-auto">Logged directly into the industrial production queue for prompt response.</p>
            </div>

            <!-- Success State -->
            <div x-show="submitted" x-cloak class="text-center py-12 space-y-4">
                <div class="w-16 h-16 rounded-full bg-green-500/10 text-green-500 flex items-center justify-center mx-auto">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                </div>
                <h3 class="text-2xl font-black text-zinc-900 dark:text-white">Wholesale Inquiry Logged</h3>
                <p class="text-zinc-500 text-sm">Your reference ID is <span class="font-mono font-bold text-red-600" x-text="referenceId"></span>. Our team will contact you within 24 hours.</p>
                <button type="button" @click="submitted = false" class="px-6 py-2.5 bg-red-600 text-white text-xs font-bold uppercase rounded-lg">Submit Another</button>
            </div>

            <form x-show="!submitted" @submit.prevent="submitRFQ()" class="space-y-6">
                <div class="grid sm:grid-cols-2 gap-6">
                    <div class="space-y-1">
                        <label class="text-xs font-black text-zinc-700 dark:text-zinc-300 uppercase">Company Name *</label>
                        <input type="text" x-model="companyName" required placeholder="e.g. Apex Retail Inc."
                               class="w-full px-4 py-3.5 rounded-xl bg-zinc-50 dark:bg-zinc-800 border border-zinc-200 dark:border-zinc-700 text-sm">
                    </div>
                    <div class="space-y-1">
                        <label class="text-xs font-black text-zinc-700 dark:text-zinc-300 uppercase">Contact Name *</label>
                        <input type="text" x-model="contactName" required placeholder="e.g. Sarah Jenkins"
                               class="w-full px-4 py-3.5 rounded-xl bg-zinc-50 dark:bg-zinc-800 border border-zinc-200 dark:border-zinc-700 text-sm">
                    </div>
                </div>

                <div class="grid sm:grid-cols-2 gap-6">
                    <div class="space-y-1">
                        <label class="text-xs font-black text-zinc-700 dark:text-zinc-300 uppercase">Business Email *</label>
                        <input type="email" x-model="email" required placeholder="sarah@apexretail.com"
                               class="w-full px-4 py-3.5 rounded-xl bg-zinc-50 dark:bg-zinc-800 border border-zinc-200 dark:border-zinc-700 text-sm">
                    </div>
                    <div class="space-y-1">
                        <label class="text-xs font-black text-zinc-700 dark:text-zinc-300 uppercase">Phone / WhatsApp</label>
                        <input type="text" x-model="phone" placeholder="+1 (555) 019-2831"
                               class="w-full px-4 py-3.5 rounded-xl bg-zinc-50 dark:bg-zinc-800 border border-zinc-200 dark:border-zinc-700 text-sm">
                    </div>
                </div>

                <div class="grid sm:grid-cols-3 gap-6">
                    <div class="space-y-1">
                        <label class="text-xs font-black text-zinc-700 dark:text-zinc-300 uppercase">Business Type</label>
                        <select x-model="businessType" class="w-full px-3 py-3.5 rounded-xl bg-zinc-50 dark:bg-zinc-800 border border-zinc-200 dark:border-zinc-700 text-sm">
                            <option value="Wholesaler">Wholesaler / Distributor</option>
                            <option value="Retailer">Retail Store / Chain</option>
                            <option value="Boutique">Independent Boutique</option>
                            <option value="Brand">Private Label Brand</option>
                        </select>
                    </div>

                    <div class="space-y-1">
                        <label class="text-xs font-black text-zinc-700 dark:text-zinc-300 uppercase">Target Volume</label>
                        <select x-model="targetVolume" class="w-full px-3 py-3.5 rounded-xl bg-zinc-50 dark:bg-zinc-800 border border-zinc-200 dark:border-zinc-700 text-sm">
                            <option value="250 - 999 units">250 – 999 units</option>
                            <option value="1,000 - 4,999 units">1,000 – 4,999 units</option>
                            <option value="5,000+ units">5,000+ units</option>
                        </select>
                    </div>

                    <div class="space-y-1">
                        <label class="text-xs font-black text-zinc-700 dark:text-zinc-300 uppercase">Series Focus</label>
                        <select x-model="productSeries" class="w-full px-3 py-3.5 rounded-xl bg-zinc-50 dark:bg-zinc-800 border border-zinc-200 dark:border-zinc-700 text-sm">
                            <option value="Raw Architectural Denim">Selvedge Denim</option>
                            <option value="Technical Trousers">Technical Trousers</option>
                            <option value="Industrial Outerwear">Outerwear & Parkas</option>
                            <option value="Custom Private Label">Custom Private Label</option>
                        </select>
                    </div>
                </div>

                <div class="p-4 rounded-xl bg-zinc-50 dark:bg-zinc-800/60 border border-zinc-200 dark:border-zinc-700 flex items-center gap-3">
                    <input type="checkbox" id="sampleReq" x-model="sampleRequested" class="w-4 h-4 accent-red-600 rounded">
                    <label for="sampleReq" class="text-xs font-bold text-zinc-700 dark:text-zinc-300">Request Physical Denim Swatch & Trim Box to be dispatched to your office.</label>
                </div>

                <div class="space-y-1">
                    <label class="text-xs font-black text-zinc-700 dark:text-zinc-300 uppercase">Specifications / Notes</label>
                    <textarea x-model="notes" rows="3" placeholder="Provide any additional sizing, wash, or delivery timeline requests..."
                              class="w-full px-4 py-3.5 rounded-xl bg-zinc-50 dark:bg-zinc-800 border border-zinc-200 dark:border-zinc-700 text-sm"></textarea>
                </div>

                <div x-show="error" x-cloak class="p-4 rounded-xl bg-red-100 text-red-600 text-xs font-bold" x-text="error"></div>

                <button type="submit" :disabled="loading"
                        class="w-full py-4 bg-red-600 hover:bg-red-700 text-white font-black text-xs uppercase tracking-widest rounded-xl transition-all shadow-lg shadow-red-600/30">
                    <span x-show="!loading">Submit Wholesale Quotation Request</span>
                    <span x-show="loading" x-cloak>Logging with Factory Queue...</span>
                </button>
            </form>
        </div>

        <!-- Sample Swatch Modal -->
        <div x-show="inquiryModalOpen" x-cloak 
             class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/70 backdrop-blur-sm"
             @keydown.escape.window="inquiryModalOpen = false">
            <div class="w-full max-w-md rounded-3xl bg-white dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-800 p-8 shadow-2xl space-y-5"
                 @click.outside="inquiryModalOpen = false">
                <div class="flex justify-between items-start">
                    <div>
                        <span class="text-[10px] font-black uppercase tracking-widest text-red-600 block">Sample Request</span>
                        <h3 class="text-xl font-black text-zinc-900 dark:text-white" x-text="activeProduct"></h3>
                    </div>
                    <button type="button" @click="inquiryModalOpen = false" class="text-zinc-400 hover:text-zinc-600">&times;</button>
                </div>
                <p class="text-xs text-zinc-500">We dispatch physical sample swatches directly to buying offices. Fill out the quick RFQ form below to confirm address and delivery specifications.</p>
                <a href="#rfq" @click="inquiryModalOpen = false" class="w-full py-3.5 bg-red-600 text-white font-black text-xs uppercase tracking-widest rounded-xl text-center block">
                    Proceed to Request Swatch
                </a>
            </div>
        </div>
    </main>

    <x-footer />
</x-layout>
