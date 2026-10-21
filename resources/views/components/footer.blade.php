<footer class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-24">
    <div class="app-card p-5 sm:p-10 lg:p-12 overflow-hidden bg-white border border-zinc-200/90 shadow-xl space-y-10 sm:space-y-12">
        <div class="grid lg:grid-cols-12 gap-10 lg:gap-16">
            
            <!-- Brand Column -->
            <div class="lg:col-span-5 space-y-5" x-data="{ 
                email: '', 
                message: '',
                status: '', 
                loading: false,
                async subscribe() {
                    this.loading = true;
                    this.status = '';
                    this.message = '';
                    try {
                        const response = await fetch('{{ route('newsletter.subscribe') }}', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                'Accept': 'application/json'
                            },
                            body: JSON.stringify({ email: this.email })
                        });
                        const data = await response.json();
                        if (response.ok) {
                            this.status = 'success';
                            this.message = 'Thank you! You are subscribed to factory updates.';
                            this.email = '';
                        } else {
                            this.status = 'error';
                            this.message = data.message || 'Validation failed. Please enter a valid email.';
                        }
                    } catch (e) {
                        this.status = 'error';
                        this.message = 'Something went wrong. Please try again.';
                    } finally {
                        this.loading = false;
                    }
                }
            }">
                <div class="flex items-center gap-3">
                    <img src="{{ asset('images/brand/logo-light.png') }}" alt="Seven Series Denim" class="h-9 sm:h-10 w-auto">
                </div>
                <p class="text-sm text-zinc-600 font-medium leading-relaxed max-w-sm">
                    Seven Series Garment Industry crafts heavyweight denim jeans and casual clothing. Supplying bulk wholesale orders to retailers and welcoming shoppers to our official retail outlets.
                </p>
                
                <div class="space-y-2 pt-2">
                    <span class="text-xs font-bold uppercase tracking-wider text-zinc-900 block">
                        Get Wholesale & Production Updates
                    </span>
                    <form class="relative flex items-center w-full max-w-sm" @submit.prevent="subscribe()">
                        <input type="email" placeholder="Your email address" required x-model="email"
                            class="w-full bg-zinc-50 border border-zinc-200 rounded-full pl-4 pr-20 py-2.5 focus:border-red-600 focus:outline-none text-xs font-medium text-zinc-900 transition-colors">
                        <button
                            class="absolute right-1 top-1 bottom-1 bg-red-600 text-white px-4 text-xs font-bold rounded-full hover:bg-red-700 transition-colors uppercase disabled:opacity-50 flex items-center justify-center shadow-sm"
                            :disabled="loading">
                            <span x-show="!loading">Join</span>
                            <span x-show="loading" x-cloak>...</span>
                        </button>
                    </form>
                    <template x-if="message">
                        <p class="text-xs font-bold mt-1.5"
                            :class="status === 'success' ? 'text-green-600' : 'text-red-600'" x-text="message"></p>
                    </template>
                </div>
            </div>

            <!-- Quick Links -->
            <div class="lg:col-span-3 space-y-3">
                <h4 class="text-xs font-black text-red-600 uppercase tracking-wider">Quick Navigation</h4>
                <ul class="space-y-2.5 text-xs font-bold text-zinc-700">
                    <li><a href="{{ route('stores') }}" class="hover:text-red-600 transition-colors">Official Retail Stores</a></li>
                    <li><a href="/#cuts" class="hover:text-red-600 transition-colors">Jeans Cut Archive</a></li>
                    <li><a href="/#fabric" class="hover:text-red-600 transition-colors">Fabric & Weave Quality</a></li>
                    <li><a href="/#factory" class="hover:text-red-600 transition-colors">Garment Factory Overview</a></li>
                    <li><a href="/b2b" class="hover:text-red-600 transition-colors">Wholesale Portal</a></li>
                    <li><a href="/brandkit" class="hover:text-red-600 transition-colors">Brand Kit & Guidelines</a></li>
                    <li><a href="/contact" class="hover:text-red-600 transition-colors text-red-600 font-extrabold flex items-center gap-1"><span>Contact Us & Map</span><span>&rarr;</span></a></li>
                </ul>
            </div>

            <!-- Factory & Head Office (Dynamic) -->
            @php
                $footerCompany = \App\Models\CompanySetting::getSettings();
            @endphp
            <div class="lg:col-span-4 space-y-3">
                <h4 class="text-xs font-black text-red-600 uppercase tracking-wider">Factory & Head Office</h4>
                <div class="space-y-1.5 text-xs font-medium text-zinc-600">
                    <p class="font-bold text-zinc-950">{{ $footerCompany->company_name ?? 'Seven Series Garment Factory & Production Unit' }}</p>
                    <p>{{ $footerCompany->primary_address ?? 'Near Padma Colony Main Entrance, Sitapaila' }}</p>
                    <p>{{ $footerCompany->city ?? 'Kathmandu' }}, {{ $footerCompany->state ?? 'Nepal' }}</p>
                    <p class="text-zinc-500">Working Hours: {{ $footerCompany->operating_hours ?? 'Sunday – Friday (09:00 – 18:00)' }}</p>
                    <p class="pt-2">
                        <span class="font-bold text-zinc-950 block">Official Inquiries & Direct Support:</span>
                        <a href="mailto:{{ $footerCompany->primary_email ?? 'samparka@7series.com.np' }}" class="text-red-600 font-bold hover:underline">
                            {{ $footerCompany->primary_email ?? 'samparka@7series.com.np' }}
                        </a>
                    </p>
                    <div class="pt-1">
                        <a href="/contact" class="inline-flex items-center gap-1 text-[11px] font-bold text-zinc-800 hover:text-red-600 underline">
                            View Factory Location & Send Message &rarr;
                        </a>
                    </div>
                </div>
            </div>

        </div>

        <div class="pt-6 border-t border-zinc-100 flex flex-col sm:flex-row justify-between items-center gap-4 text-xs font-medium text-zinc-500">
            <p>&copy; {{ now()->year }} Seven Series Garment Industry. All rights reserved.</p>
            <div class="flex gap-4">
                <span>100% Genuine Denim</span>
                <span>•</span>
                <span>Wholesale & Retail</span>
            </div>
        </div>
    </div>
</footer>