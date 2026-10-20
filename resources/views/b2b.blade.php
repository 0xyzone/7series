<x-layout>
    <x-slot:title>B2B Wholesale & Retail Partnerships | Seven Series Garment Industry</x-slot>

    <x-nav />

    <main class="pt-28 sm:pt-32 pb-24 max-w-7xl mx-auto px-4 sm:px-6" x-data="{
        selectedCategory: 'all',
        inquiryModalOpen: false,
        activeProduct: '',
        openInquiry(name) {
            this.activeProduct = name;
            this.inquiryModalOpen = true;
        }
    }">
        <!-- Page Header -->
        <div class="mb-12 sm:mb-16 border-b border-zinc-200 pb-8 sm:pb-12">
            <div class="inline-flex items-center gap-2.5 px-3.5 py-1.5 rounded-full bg-red-100 border border-red-200 text-red-600 text-xs font-black tracking-widest uppercase mb-4">
                <img src="{{ asset('images/brand/logo-symbol.png') }}" alt="7" class="w-3.5 h-3.5 object-contain">
                <span>EXCLUSIVE B2B & WHOLESALE PORTAL</span>
            </div>
            <div class="flex flex-col lg:flex-row lg:items-end justify-between gap-6">
                <div>
                    <h1 class="text-3xl sm:text-5xl md:text-6xl font-black tracking-tight text-zinc-950 uppercase leading-tight">
                        WHOLESALE & <span class="text-red-600">RETAIL SUPPLY.</span>
                    </h1>
                    <p class="text-zinc-600 font-medium max-w-2xl text-sm sm:text-base mt-3 leading-relaxed">
                        Direct-from-factory garment manufacturing for volume wholesalers, retail chains, and private label fashion houses. Managed dynamically by our industrial production team.
                    </p>
                </div>
                <div class="flex items-center gap-4">
                    <a href="#rfq" class="w-full sm:w-auto text-center px-6 sm:px-8 py-3.5 sm:py-4 bg-red-600 hover:bg-red-700 text-white font-black text-xs uppercase tracking-widest rounded-xl shadow-lg shadow-red-600/25 transition-all">
                        Request Line Sheet & Swatches
                    </a>
                </div>
            </div>
        </div>

        <!-- Dynamic Offerings Section (Managed via Filament Mukhiya Panel) -->
        <div class="mb-20">
            <div class="flex flex-wrap items-center justify-between gap-4 mb-10 pb-6 border-b border-zinc-200">
                <div class="flex items-center gap-2 overflow-x-auto no-scrollbar w-full pb-2">
                    <button type="button" 
                            @click="selectedCategory = 'all'"
                            :class="selectedCategory === 'all' ? 'bg-zinc-950 text-white' : 'bg-zinc-100 text-zinc-700 hover:bg-zinc-200'"
                            class="px-5 py-2.5 rounded-xl text-xs font-black uppercase tracking-wider transition-colors">
                        All Offerings
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
                    Direct Tier-1 FOB Allocation • Managed in Filament
                </div>
            </div>

            <!-- Offerings Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
                @forelse($offerings as $offering)
                    <div class="group rounded-3xl bg-white border-2 border-zinc-200 overflow-hidden hover:border-red-600 hover:shadow-2xl transition-all duration-300 flex flex-col justify-between"
                         x-show="selectedCategory === 'all' || selectedCategory === '{{ strtolower($offering->category) }}'">
                        <div>
                            <div class="relative aspect-[4/3] overflow-hidden bg-zinc-100">
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
                                    <h3 class="text-xl font-black uppercase tracking-tight text-zinc-950">{{ $offering->title }}</h3>
                                    @if($offering->fob_price_range)
                                        <span class="text-sm font-black text-red-600">{{ $offering->fob_price_range }}</span>
                                    @endif
                                </div>

                                <p class="text-zinc-600 text-sm font-medium leading-relaxed">
                                    {{ $offering->description }}
                                </p>

                                <div class="space-y-1.5 pt-3 border-t border-zinc-200 text-xs font-bold text-zinc-600">
                                    @if($offering->fabric_spec)
                                        <div class="flex justify-between"><span>Fabric Spec:</span> <span class="text-zinc-950">{{ $offering->fabric_spec }}</span></div>
                                    @endif
                                    <div class="flex justify-between"><span>Turnaround:</span> <span class="text-zinc-950">{{ $offering->turnaround_time }}</span></div>
                                </div>
                            </div>
                        </div>

                        <div class="p-8 pt-0 flex gap-3">
                            <button type="button" @click="openInquiry('{{ $offering->title }}')" 
                                    class="flex-1 py-3.5 bg-red-600 hover:bg-red-700 text-white font-black text-xs uppercase tracking-widest rounded-xl transition-all text-center">
                                Request Swatch & Specs
                            </button>
                            <a href="#rfq" class="py-3.5 px-4 bg-zinc-100 hover:bg-zinc-200 text-zinc-950 font-black text-xs uppercase tracking-widest rounded-xl transition-colors">
                                RFQ
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="col-span-3 py-16 text-center border-2 border-dashed border-zinc-200 rounded-3xl">
                        <p class="text-zinc-500 font-bold uppercase tracking-widest">No B2B Offerings logged yet.</p>
                        <p class="text-xs text-zinc-400 mt-2">Manage offerings from the Filament Mukhiya Panel at /mukhiya/b2b-offerings</p>
                    </div>
                @endforelse
            </div>
        </div>

        <!-- Partnership Tiers -->
        <div class="mb-24">
            <div class="text-center space-y-4 mb-16">
                <div class="inline-block px-3 py-1 bg-red-100 border border-red-200 rounded-full text-red-600 text-xs font-black tracking-widest uppercase">
                    OPERATIONAL AGREEMENTS
                </div>
                <h2 class="text-4xl font-black text-zinc-950 uppercase tracking-tight">
                    WHOLESALE PARTNERSHIP <span class="text-red-600">TIERS.</span>
                </h2>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <!-- Tier 1 -->
                <div class="p-8 rounded-3xl bg-white border-2 border-zinc-200 space-y-4 shadow-sm">
                    <span class="text-xs font-black text-zinc-400 uppercase tracking-widest">Tier 01</span>
                    <h3 class="text-2xl font-black text-zinc-950">Boutique Stockist</h3>
                    <div class="text-2xl font-black text-red-600">250 – 999 units</div>
                    <p class="text-zinc-600 text-sm">For multi-brand boutiques and independent stockists requiring small test batches.</p>
                    <ul class="space-y-2 pt-4 border-t border-zinc-100 text-xs font-bold text-zinc-700">
                        <li>• Standard 7Series branded apparel</li>
                        <li>• 14-day prototype turnaround</li>
                        <li>• Air-freight sample delivery</li>
                    </ul>
                </div>

                <!-- Tier 2 -->
                <div class="p-8 rounded-3xl bg-zinc-950 text-white border-2 border-red-600 space-y-4 shadow-2xl relative">
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
                <div class="p-8 rounded-3xl bg-white border-2 border-zinc-200 space-y-4 shadow-sm">
                    <span class="text-xs font-black text-zinc-400 uppercase tracking-widest">Tier 03</span>
                    <h3 class="text-2xl font-black text-zinc-950">Enterprise Private Label</h3>
                    <div class="text-2xl font-black text-red-600">5,000+ units</div>
                    <p class="text-zinc-600 text-sm">For national retail conglomerates and global private label brands.</p>
                    <ul class="space-y-2 pt-4 border-t border-zinc-100 text-xs font-bold text-zinc-700">
                        <li>• Full bespoke tech packs & exclusive dyeing</li>
                        <li>• Direct container shipping (FOB/CIF)</li>
                        <li>• Dedicated factory production liaison</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- RFQ Section -->
        <div id="rfq" class="max-w-4xl mx-auto rounded-3xl bg-white border-2 border-zinc-200 p-8 sm:p-12 shadow-2xl"
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
                whatsappLink: '',
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
                            this.whatsappLink = data.sms_status?.whatsapp_link || '';
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
                <h2 class="text-3xl sm:text-4xl font-black text-zinc-950 uppercase">Submit Wholesale Quotation Request</h2>
                <p class="text-zinc-500 text-sm max-w-lg mx-auto">Logged directly into the industrial production queue for prompt response.</p>
            </div>

            <!-- Success State -->
            <div x-show="submitted" x-cloak class="text-center py-12 space-y-4 max-w-lg mx-auto">
                <div class="w-16 h-16 rounded-full bg-emerald-500/10 text-emerald-600 flex items-center justify-center mx-auto">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                </div>
                <h3 class="text-2xl font-black text-zinc-950">Wholesale Inquiry Logged</h3>
                <p class="text-zinc-600 text-sm">Your reference ID is <span class="font-mono font-bold text-red-600" x-text="referenceId"></span>. A confirmation email has been dispatched and our factory account manager will contact you within 24 hours.</p>
                
                <div x-show="whatsappLink" class="pt-2">
                    <a :href="whatsappLink" target="_blank" rel="noopener noreferrer" 
                       class="inline-flex items-center gap-2 px-5 py-2.5 rounded-full bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-black uppercase tracking-wider shadow-md shadow-emerald-600/25 transition-all">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
                        <span>Send WhatsApp Confirmation Copy &rarr;</span>
                    </a>
                </div>

                <div class="pt-2">
                    <button type="button" @click="submitted = false; whatsappLink = ''" class="px-6 py-2.5 bg-zinc-900 hover:bg-zinc-800 text-white text-xs font-bold uppercase rounded-xl transition-colors">Submit Another</button>
                </div>
            </div>

            <form x-show="!submitted" @submit.prevent="submitRFQ()" class="space-y-6">
                <div class="grid sm:grid-cols-2 gap-6">
                    <div class="space-y-1">
                        <label class="text-xs font-black text-zinc-800 uppercase">Company Name *</label>
                        <input type="text" x-model="companyName" required placeholder="e.g. Apex Retail Inc."
                               class="w-full px-4 py-3.5 rounded-xl bg-zinc-50 border border-zinc-200 text-sm">
                    </div>
                    <div class="space-y-1">
                        <label class="text-xs font-black text-zinc-800 uppercase">Contact Name *</label>
                        <input type="text" x-model="contactName" required placeholder="e.g. Sarah Jenkins"
                               class="w-full px-4 py-3.5 rounded-xl bg-zinc-50 border border-zinc-200 text-sm">
                    </div>
                </div>

                <div class="grid sm:grid-cols-2 gap-6">
                    <div class="space-y-1">
                        <label class="text-xs font-black text-zinc-800 uppercase">Business Email *</label>
                        <input type="email" x-model="email" required placeholder="sarah@apexretail.com"
                               class="w-full px-4 py-3.5 rounded-xl bg-zinc-50 border border-zinc-200 text-sm">
                    </div>
                    <div class="space-y-1">
                        <label class="text-xs font-black text-zinc-800 uppercase">Phone / WhatsApp</label>
                        <input type="text" x-model="phone" placeholder="+1 (555) 019-2831"
                               class="w-full px-4 py-3.5 rounded-xl bg-zinc-50 border border-zinc-200 text-sm">
                    </div>
                </div>

                <div class="grid sm:grid-cols-3 gap-6">
                    <div class="space-y-1">
                        <label class="text-xs font-black text-zinc-800 uppercase">Business Type</label>
                        <select x-model="businessType" class="w-full px-3 py-3.5 rounded-xl bg-zinc-50 border border-zinc-200 text-sm">
                            <option value="Wholesaler">Wholesaler / Distributor</option>
                            <option value="Retailer">Retail Store / Chain</option>
                            <option value="Boutique">Independent Boutique</option>
                            <option value="Brand">Private Label Brand</option>
                        </select>
                    </div>

                    <div class="space-y-1">
                        <label class="text-xs font-black text-zinc-800 uppercase">Target Volume</label>
                        <select x-model="targetVolume" class="w-full px-3 py-3.5 rounded-xl bg-zinc-50 border border-zinc-200 text-sm">
                            <option value="250 - 999 units">250 – 999 units</option>
                            <option value="1,000 - 4,999 units">1,000 – 4,999 units</option>
                            <option value="5,000+ units">5,000+ units</option>
                        </select>
                    </div>

                    <div class="space-y-1">
                        <label class="text-xs font-black text-zinc-800 uppercase">Series Focus</label>
                        <select x-model="productSeries" class="w-full px-3 py-3.5 rounded-xl bg-zinc-50 border border-zinc-200 text-sm">
                            <option value="Raw Architectural Denim">Selvedge Denim</option>
                            <option value="Technical Trousers">Technical Trousers</option>
                            <option value="Industrial Outerwear">Outerwear & Parkas</option>
                            <option value="Custom Private Label">Custom Private Label</option>
                        </select>
                    </div>
                </div>

                <div class="p-4 rounded-xl bg-zinc-50 border border-zinc-200 flex items-center gap-3">
                    <input type="checkbox" id="sampleReq" x-model="sampleRequested" class="w-4 h-4 accent-red-600 rounded">
                    <label for="sampleReq" class="text-xs font-bold text-zinc-800">Request Physical Denim Swatch & Trim Box to be dispatched to your office.</label>
                </div>

                <div class="space-y-1">
                    <label class="text-xs font-black text-zinc-800 uppercase">Specifications / Notes</label>
                    <textarea x-model="notes" rows="3" placeholder="Provide any additional sizing, wash, or delivery timeline requests..."
                              class="w-full px-4 py-3.5 rounded-xl bg-zinc-50 border border-zinc-200 text-sm"></textarea>
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
            <div class="w-full max-w-md rounded-3xl bg-white border border-zinc-200 p-8 shadow-2xl space-y-5"
                 @click.outside="inquiryModalOpen = false">
                <div class="flex justify-between items-start">
                    <div>
                        <span class="text-[10px] font-black uppercase tracking-widest text-red-600 block">Sample Request</span>
                        <h3 class="text-xl font-black text-zinc-950" x-text="activeProduct"></h3>
                    </div>
                    <button type="button" @click="inquiryModalOpen = false" class="text-zinc-400 hover:text-zinc-600">&times;</button>
                </div>
                <p class="text-xs text-zinc-600">We dispatch physical sample swatches directly to buying offices. Fill out the quick RFQ form below to confirm address and delivery specifications.</p>
                <a href="#rfq" @click="inquiryModalOpen = false" class="w-full py-3.5 bg-red-600 text-white font-black text-xs uppercase tracking-widest rounded-xl text-center block">
                    Proceed to Request Swatch
                </a>
            </div>
        </div>
    </main>

    <x-footer />
</x-layout>
