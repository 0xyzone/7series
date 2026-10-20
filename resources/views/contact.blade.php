<x-layout>
    <x-slot:title>Contact Us & Factory Location | Seven Series Garment Industry</x-slot>

    <x-nav transparent="true" />

    <main class="min-h-screen pt-24 sm:pt-28 pb-36 px-4 sm:px-6 lg:px-10 xl:px-12 w-full space-y-10 sm:space-y-14">

        <!-- ========================================================================= -->
        <!-- CONTACT HERO HEADER -->
        <!-- ========================================================================= -->
        <section class="relative">
            <div class="app-card p-6 sm:p-10 lg:p-12 relative overflow-hidden bg-gradient-to-br from-white via-slate-50 to-red-50/20 border border-slate-200 shadow-xl">
                <div class="absolute -right-20 -top-20 w-96 h-96 bg-red-600/10 rounded-full blur-3xl pointer-events-none"></div>

                <div class="max-w-3xl space-y-4 relative z-10">
                    <div class="inline-flex items-center gap-2.5 px-3.5 py-1.5 rounded-full bg-slate-900 text-white text-xs font-black tracking-wider uppercase shadow-sm">
                        <span class="w-2 h-2 rounded-full bg-red-500 animate-pulse"></span>
                        <span>FACTORY LOCATION & CONTACT</span>
                        <span class="text-zinc-400 font-mono text-[10px]">| SEVEN SERIES</span>
                    </div>

                    <h1 class="text-3xl sm:text-5xl lg:text-6xl font-extrabold tracking-tight text-zinc-950 uppercase leading-none">
                        GET IN TOUCH WITH OUR <br>
                        <span class="text-red-600">GARMENT FACTORY.</span>
                    </h1>

                    <p class="text-zinc-600 text-base sm:text-lg leading-relaxed font-normal">
                        Visit our manufacturing facility in Sitapaila, Kathmandu or reach out directly for wholesale supply, dealership inquiries, and customer assistance.
                    </p>
                </div>
            </div>
        </section>

        <!-- ========================================================================= -->
        <!-- CONTACT INFORMATION & MESSAGE FORM GRID -->
        <!-- ========================================================================= -->
        <section class="grid lg:grid-cols-12 gap-8 items-start">
            
            <!-- Left: Factory & Contact Details (7 cols) -->
            <div class="lg:col-span-7 space-y-6">

                <!-- 1. Factory Location Card -->
                <div class="app-card p-6 sm:p-8 bg-white border border-slate-200 shadow-md space-y-4">
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 rounded-2xl bg-red-50 text-red-600 flex items-center justify-center shrink-0 border border-red-100 shadow-xs">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        </div>
                        <div class="space-y-1">
                            <span class="text-[10px] font-black uppercase tracking-wider text-red-600">MAIN MANUFACTURING PLANT</span>
                            <h2 class="text-xl sm:text-2xl font-extrabold text-zinc-950">Seven Series Garment Factory</h2>
                            <p class="text-base text-zinc-700 font-semibold pt-1">
                                Near Padma Colony Main Entrance, Sitapaila
                            </p>
                            <p class="text-sm text-zinc-500">
                                Kathmandu, Bagmati Province, Nepal
                            </p>
                            <p class="text-xs text-zinc-500 pt-2 flex items-center gap-1.5">
                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                                <span>Easily accessible from Sitapaila Chowk, Ring Road. Direct freight and loading bay available.</span>
                            </p>
                        </div>
                    </div>

                    <div class="pt-2 flex flex-wrap gap-3">
                        <a href="https://maps.google.com/?q=Padma+Colony+Sitapaila+Kathmandu" target="_blank" rel="noopener noreferrer" 
                           class="inline-flex items-center gap-2 px-4 py-2.5 rounded-full bg-zinc-900 hover:bg-zinc-800 text-white text-xs font-bold transition-all shadow-sm">
                            <svg class="w-4 h-4 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                            <span>Open in Google Maps & Directions</span>
                        </a>
                    </div>
                </div>

                <!-- 2. Official Email & Operating Hours Grid -->
                <div class="grid sm:grid-cols-2 gap-4">
                    
                    <!-- Official Email Card -->
                    <div class="app-card p-6 bg-white border border-slate-200 shadow-xs space-y-3" x-data="{ copied: false }">
                        <div class="w-10 h-10 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center border border-blue-100">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        </div>
                        <div>
                            <span class="text-[10px] font-black uppercase tracking-wider text-zinc-400">OFFICIAL EMAIL</span>
                            <h3 class="text-base font-bold text-zinc-950 pt-0.5">Direct Correspondence</h3>
                            <a href="mailto:samparka@7series.com.np" class="text-sm font-extrabold text-red-600 hover:underline block pt-1 break-all">
                                samparka@7series.com.np
                            </a>
                            <p class="text-xs text-zinc-500 pt-1">
                                For Line sheets, volume pricing, and customer inquiries.
                            </p>
                        </div>
                        <button type="button" @click="navigator.clipboard.writeText('samparka@7series.com.np'); copied = true; setTimeout(() => copied = false, 2000)" 
                                class="inline-flex items-center gap-1.5 text-[11px] font-bold text-zinc-600 hover:text-zinc-950 pt-1">
                            <svg class="w-3.5 h-3.5 text-zinc-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3"/></svg>
                            <span x-text="copied ? 'Copied to clipboard!' : 'Copy Email Address'"></span>
                        </button>
                    </div>

                    <!-- Factory Hours Card -->
                    <div class="app-card p-6 bg-white border border-slate-200 shadow-xs space-y-3">
                        <div class="w-10 h-10 rounded-xl bg-amber-50 text-amber-600 flex items-center justify-center border border-amber-100">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        </div>
                        <div>
                            <span class="text-[10px] font-black uppercase tracking-wider text-zinc-400">FACTORY TIMINGS</span>
                            <h3 class="text-base font-bold text-zinc-950 pt-0.5">Operating Hours</h3>
                            <p class="text-sm font-bold text-zinc-800 pt-1">
                                Sunday – Friday: 09:00 – 18:00
                            </p>
                            <p class="text-xs text-zinc-500 pt-1">
                                Saturday: Factory Closed (Machinery Maintenance & Dispatch Prep)
                            </p>
                        </div>
                    </div>

                </div>

                <!-- 3. Interactive Map Preview Card -->
                <div class="app-card p-6 bg-white border border-slate-200 shadow-md space-y-4">
                    <div class="flex items-center justify-between">
                        <div>
                            <span class="text-[10px] font-black uppercase tracking-wider text-red-600">MAP LOCATION</span>
                            <h3 class="text-lg font-bold text-zinc-950">Sitapaila Manufacturing Facility</h3>
                        </div>
                        <span class="px-2.5 py-1 rounded-full bg-zinc-100 text-[10px] font-mono font-bold text-zinc-700">Kathmandu, Nepal</span>
                    </div>

                    <!-- OpenStreetMap Embed -->
                    <div class="aspect-[16/9] w-full rounded-2xl overflow-hidden border border-zinc-200 relative bg-zinc-100">
                        <iframe 
                            class="w-full h-full border-0" 
                            src="https://www.openstreetmap.org/export/embed.html?bbox=85.2750%2C27.7050%2C85.2950%2C27.7200&amp;layer=mapnik&amp;marker=27.7125%2C85.2850" 
                            loading="lazy">
                        </iframe>
                        <div class="absolute bottom-3 left-3 bg-white/95 backdrop-blur-md px-3 py-1.5 rounded-full border border-zinc-200 shadow-sm text-[11px] font-bold text-zinc-800 flex items-center gap-1.5 pointer-events-none">
                            <span class="w-2 h-2 rounded-full bg-red-600 animate-pulse"></span>
                            <span>Sitapaila, Near Padma Colony Gate</span>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Right: Direct Message Form (5 cols) -->
            <div class="lg:col-span-5" x-data="{
                form: {
                    name: '',
                    email: '',
                    phone: '',
                    subject: 'Factory & Wholesale Inquiry',
                    message: ''
                },
                loading: false,
                success: false,
                successMessage: '',
                error: '',
                async submitForm() {
                    this.loading = true;
                    this.error = '';
                    this.success = false;

                    try {
                        const res = await fetch('{{ route('contact.submit') }}', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                'Accept': 'application/json'
                            },
                            body: JSON.stringify(this.form)
                        });

                        const data = await res.json();
                        if (res.ok && data.status === 'success') {
                            this.success = true;
                            this.successMessage = data.message;
                            this.form = { name: '', email: '', phone: '', subject: 'Factory & Wholesale Inquiry', message: '' };
                        } else {
                            this.error = data.message || 'Something went wrong. Please check your fields and try again.';
                        }
                    } catch (e) {
                        this.error = 'Unable to send message. Please email us directly at samparka@7series.com.np';
                    } finally {
                        this.loading = false;
                    }
                }
            }">
                <div class="app-card p-6 sm:p-8 bg-white border border-slate-200 shadow-xl space-y-6 sticky top-28">
                    
                    <div class="space-y-1">
                        <span class="text-[10px] font-black uppercase tracking-wider text-red-600">DIRECT INQUIRY</span>
                        <h2 class="text-2xl font-extrabold text-zinc-950 uppercase tracking-tight">Send Us a Message</h2>
                        <p class="text-xs text-zinc-500">
                            Sent directly to our team at <strong class="text-zinc-900">samparka@7series.com.np</strong>
                        </p>
                    </div>

                    <!-- Success Alert -->
                    <template x-if="success">
                        <div class="p-4 rounded-2xl bg-emerald-50 border border-emerald-200 text-emerald-900 space-y-1">
                            <div class="flex items-center gap-2 font-bold text-sm">
                                <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                <span>Message Received!</span>
                            </div>
                            <p class="text-xs text-emerald-800" x-text="successMessage"></p>
                        </div>
                    </template>

                    <!-- Error Alert -->
                    <template x-if="error">
                        <div class="p-4 rounded-2xl bg-red-50 border border-red-200 text-red-900 space-y-1">
                            <div class="flex items-center gap-2 font-bold text-sm">
                                <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                <span>Submission Issue</span>
                            </div>
                            <p class="text-xs text-red-800" x-text="error"></p>
                        </div>
                    </template>

                    <form @submit.prevent="submitForm()" class="space-y-4">
                        
                        <!-- Full Name -->
                        <div class="space-y-1">
                            <label class="block text-xs font-bold text-zinc-800 uppercase tracking-wider">Your Full Name <span class="text-red-600">*</span></label>
                            <input type="text" x-model="form.name" required placeholder="e.g. Ramesh Shrestha"
                                   class="w-full px-4 py-2.5 rounded-xl border border-zinc-200 bg-zinc-50 text-sm font-medium text-zinc-900 focus:bg-white focus:border-red-600 focus:outline-none transition-colors">
                        </div>

                        <!-- Email Address -->
                        <div class="space-y-1">
                            <label class="block text-xs font-bold text-zinc-800 uppercase tracking-wider">Email Address <span class="text-red-600">*</span></label>
                            <input type="email" x-model="form.email" required placeholder="e.g. ramesh@store.com"
                                   class="w-full px-4 py-2.5 rounded-xl border border-zinc-200 bg-zinc-50 text-sm font-medium text-zinc-900 focus:bg-white focus:border-red-600 focus:outline-none transition-colors">
                        </div>

                        <!-- Phone / WhatsApp Number -->
                        <div class="space-y-1">
                            <label class="block text-xs font-bold text-zinc-800 uppercase tracking-wider">Phone / WhatsApp Number</label>
                            <input type="text" x-model="form.phone" placeholder="e.g. +977-9800000000"
                                   class="w-full px-4 py-2.5 rounded-xl border border-zinc-200 bg-zinc-50 text-sm font-medium text-zinc-900 focus:bg-white focus:border-red-600 focus:outline-none transition-colors">
                        </div>

                        <!-- Inquiry Category -->
                        <div class="space-y-1">
                            <label class="block text-xs font-bold text-zinc-800 uppercase tracking-wider">Inquiry Topic</label>
                            <select x-model="form.subject" class="w-full px-4 py-2.5 rounded-xl border border-zinc-200 bg-zinc-50 text-sm font-medium text-zinc-900 focus:bg-white focus:border-red-600 focus:outline-none transition-colors">
                                <option value="Factory & Wholesale Supply">Factory & Wholesale Supply</option>
                                <option value="Dealership / Retail Partnership">Dealership / Retail Partnership</option>
                                <option value="Factory Visit Appointment">Factory Visit Appointment</option>
                                <option value="Customer Inquiries / Fitting Questions">Customer Inquiries / Fitting Questions</option>
                                <option value="Other">Other Inquiry</option>
                            </select>
                        </div>

                        <!-- Message -->
                        <div class="space-y-1">
                            <label class="block text-xs font-bold text-zinc-800 uppercase tracking-wider">Message Details <span class="text-red-600">*</span></label>
                            <textarea x-model="form.message" required rows="4" placeholder="Tell us your quantity requirements, questions, or visit schedule..."
                                      class="w-full px-4 py-2.5 rounded-xl border border-zinc-200 bg-zinc-50 text-sm font-medium text-zinc-900 focus:bg-white focus:border-red-600 focus:outline-none transition-colors resize-none"></textarea>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" :disabled="loading" 
                                class="w-full py-3.5 bg-red-600 hover:bg-red-700 text-white font-extrabold text-xs uppercase tracking-widest rounded-full transition-all shadow-lg shadow-red-600/30 flex items-center justify-center gap-2 disabled:opacity-50">
                            <span x-show="!loading">Send Message to Factory Team &rarr;</span>
                            <span x-show="loading" x-cloak class="flex items-center gap-2">
                                <svg class="animate-spin h-4 w-4 text-white" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>
                                <span>Transmitting...</span>
                            </span>
                        </button>

                    </form>

                </div>
            </div>

        </section>

    </main>

    <x-footer />
</x-layout>
