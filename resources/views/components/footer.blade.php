<footer
    class="bg-zinc-100 dark:bg-zinc-950 pt-28 pb-12 border-t border-zinc-200 dark:border-zinc-900 transition-colors duration-500">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid lg:grid-cols-12 gap-16 mb-20">
            <!-- Brand & B2B Briefing Column -->
            <div class="lg:col-span-5 space-y-6" x-data="{ 
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
                            this.message = 'Subscription confirmed. Quarterly textile & capacity briefing will be dispatched to your inbox.';
                            this.email = '';
                        } else {
                            this.status = 'error';
                            this.message = data.message || (data.errors && data.errors.email ? data.errors.email[0] : 'Validation failed.');
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
                    <img src="{{ asset('images/brand/logo-light.png') }}" alt="Seven Series Authentic Denim" class="h-10 sm:h-12 w-auto block dark:hidden">
                    <img src="{{ asset('images/brand/logo-dark.png') }}" alt="Seven Series Authentic Denim" class="h-10 sm:h-12 w-auto hidden dark:block">
                </div>
                <p class="text-base text-zinc-600 dark:text-zinc-400 font-medium max-w-md leading-relaxed">
                    The Apple and Xiaomi of garment manufacturing. Supplying precision architectural denim, technical fabrics, and private-label apparel directly to global wholesalers and retail networks.
                </p>
                
                <div class="space-y-3">
                    <span class="text-xs font-black uppercase tracking-wider text-zinc-900 dark:text-white block">
                        B2B CAPACITY & TEXTILE BRIEFING
                    </span>
                    <form class="flex max-w-md" @submit.prevent="subscribe()">
                        <input type="email" placeholder="ENTER CORPORATE EMAIL" required x-model="email"
                            class="flex-1 bg-white dark:bg-zinc-900 border border-zinc-300 dark:border-zinc-800 px-5 py-3.5 focus:border-red-600 focus:outline-none text-xs font-bold text-zinc-900 dark:text-white transition-colors">
                        <button
                            class="bg-red-600 text-white px-6 py-3.5 text-xs font-black hover:bg-red-700 transition-colors uppercase disabled:opacity-50"
                            :disabled="loading">
                            <span x-show="!loading">SUBSCRIBE</span>
                            <span x-show="loading" x-cloak>...</span>
                        </button>
                    </form>
                    <template x-if="message">
                        <p class="text-xs font-bold uppercase tracking-wider mt-2"
                            :class="status === 'success' ? 'text-green-600' : 'text-red-600'" x-text="message"></p>
                    </template>
                </div>
            </div>

            <!-- B2B Manufacturing Links -->
            <div class="lg:col-span-3 space-y-4">
                <h4 class="text-xs font-black text-red-600 uppercase tracking-widest">Industrial Solutions</h4>
                <ul class="space-y-3 text-xs font-bold text-zinc-600 dark:text-zinc-400">
                    <li><a href="/catalog" class="hover:text-red-600 transition-colors uppercase">Wholesale Line Sheet</a></li>
                    <li><a href="/#capabilities" class="hover:text-red-600 transition-colors uppercase">Robotic CNC Cutting</a></li>
                    <li><a href="/#capabilities" class="hover:text-red-600 transition-colors uppercase">Ozone Waterless Wash Lab</a></li>
                    <li><a href="/#oem-odm" class="hover:text-red-600 transition-colors uppercase">Private Label & OEM Services</a></li>
                    <li><a href="/#calculator" class="hover:text-red-600 transition-colors uppercase">Retailer Margin Calculator</a></li>
                </ul>
            </div>

            <!-- Compliance & Procurement Desk -->
            <div class="lg:col-span-2 space-y-4">
                <h4 class="text-xs font-black text-red-600 uppercase tracking-widest">Procurement Desk</h4>
                <ul class="space-y-3 text-xs font-bold text-zinc-600 dark:text-zinc-400">
                    <li><a href="/#rfq" class="hover:text-red-600 transition-colors uppercase">Submit RFQ</a></li>
                    <li><a href="/#rfq" class="hover:text-red-600 transition-colors uppercase">Request Swatch Kit</a></li>
                    <li><a href="/#specs" class="hover:text-red-600 transition-colors uppercase">ISO 9001:2015 Audit</a></li>
                    <li><a href="/#specs" class="hover:text-red-600 transition-colors uppercase">OEKO-TEX 100 Cert</a></li>
                    <li><a href="/#specs" class="hover:text-red-600 transition-colors uppercase">FOB Export Guidelines</a></li>
                </ul>
            </div>

            <!-- Contact & Facility -->
            <div class="lg:col-span-2 space-y-4">
                <h4 class="text-xs font-black text-red-600 uppercase tracking-widest">Direct Desk</h4>
                <div class="space-y-2 text-xs font-medium text-zinc-600 dark:text-zinc-400">
                    <p class="font-bold text-zinc-900 dark:text-white">Seven Series Garment Industry</p>
                    <p>Industrial Manufacturing Zone</p>
                    <p class="text-zinc-500">Hours: Mon – Sat (08:00 – 19:00 UTC)</p>
                    <p class="pt-2">
                        <span class="font-bold text-zinc-900 dark:text-white block">Procurement Inquiries:</span>
                        <span class="text-red-600 font-bold">b2b@sevenseries.com</span>
                    </p>
                </div>
            </div>
        </div>

        <div
            class="pt-8 border-t border-zinc-200 dark:border-zinc-900 flex flex-col md:flex-row justify-between items-center gap-6">
            <p class="text-[11px] font-bold text-zinc-500 uppercase tracking-widest">&copy; {{ now()->year }} SEVEN SERIES GARMENT INDUSTRY. ALL RIGHTS RESERVED.</p>
            <div class="flex gap-6 text-[11px] font-bold uppercase tracking-wider text-zinc-500">
                <span>Direct-To-Wholesaler Model</span>
                <span>•</span>
                <span>ISO 9001:2015</span>
                <span>•</span>
                <span>OEKO-TEX STANDARD 100</span>
            </div>
        </div>
    </div>
</footer>