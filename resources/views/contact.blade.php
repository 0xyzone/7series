@php
    $company = $company ?? \App\Models\CompanySetting::getSettings();
    $primaryEmail = $company->primary_email ?? 'samparka@7series.com.np';
    $primaryPhone = $company->primary_phone ?? '+977 9801234567';
    $waPhone = preg_replace('/[^0-9]/', '', $company->whatsapp_number ?: $primaryPhone);
    $primaryPin = (!empty($company->map_pins) && is_array($company->map_pins)) ? ($company->map_pins[0] ?? null) : null;
    $factoryLat = $primaryPin['latitude'] ?? 27.7125;
    $factoryLng = $primaryPin['longitude'] ?? 85.2850;
    $mapsUrl = !empty($company->google_maps_url) && str_contains($company->google_maps_url, 'destination=')
        ? $company->google_maps_url
        : "https://www.google.com/maps/dir/?api=1&destination={$factoryLat},{$factoryLng}";
    $linktreeUrl = $company->linktree_url ?: 'https://linktr.ee/sevenseries';
    $linktreeQrPath = $company->linktree_qr_path ?: 'images/sevenseries linktree.svg';
    $googleReviewUrl = $company->google_review_url ?: 'https://g.page/r/CWwuPiVj3QleEBM/review';
    $socialLinks = is_array($company->social_links) ? $company->social_links : [];
@endphp
<x-layout>
    <x-slot:title>Contact Us & Factory Location |
        {{ $company->company_name ?? 'Seven Series Garment Industry' }}</x-slot>

    <main
        class="min-h-screen pt-4 sm:pt-8 lg:pt-10 pb-32 sm:pb-40 px-3 sm:px-6 lg:px-10 xl:px-12 w-full max-w-full overflow-x-hidden space-y-6 sm:space-y-10 lg:space-y-12"
        x-data="{ mobileTab: 'info' }">

        <!-- ========================================================================= -->
        <!-- CONTACT HERO HEADER -->
        <!-- ========================================================================= -->
        <section class="relative w-full max-w-full min-w-0">
            <div
                class="app-card p-4 sm:p-7 lg:p-10 relative overflow-hidden bg-gradient-to-br from-white via-slate-50 to-red-50/20 border border-slate-200 shadow-lg w-full max-w-full min-w-0">
                <div
                    class="absolute -right-20 -top-20 w-72 h-72 sm:w-80 sm:h-80 bg-red-600/10 rounded-full blur-3xl pointer-events-none">
                </div>

                <div class="max-w-3xl space-y-2.5 sm:space-y-3 relative z-10 min-w-0">
                    <div class="flex flex-wrap items-center gap-2">
                        <div
                            class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-slate-900 text-white text-[10px] sm:text-[11px] font-black tracking-wider uppercase shadow-xs">
                            <span class="w-2 h-2 rounded-full bg-red-500 animate-pulse"></span>
                            <span>FACTORY LOCATION & CONTACT</span>
                        </div>
                        <a href="{{ $googleReviewUrl }}" target="_blank" rel="noopener noreferrer"
                            class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-amber-500/10 border border-amber-500/30 hover:border-amber-500 text-zinc-900 hover:bg-amber-500/20 transition-all text-[10px] sm:text-[11px] font-bold group shadow-xs">
                            <span class="text-amber-500">★★★★★</span>
                            <span class="font-extrabold text-zinc-800">5.0 on Google Maps</span>
                            <span class="text-amber-700 font-extrabold group-hover:underline">Review Us &rarr;</span>
                        </a>
                    </div>

                    <h1
                        class="text-xl sm:text-3xl lg:text-5xl font-extrabold tracking-tight text-zinc-950 uppercase leading-tight break-words">
                        GET IN TOUCH WITH OUR <br>
                        <span class="text-red-600">GARMENT FACTORY.</span>
                    </h1>

                    <p class="text-zinc-600 text-xs sm:text-base leading-relaxed font-normal">
                        Visit our manufacturing plant in {{ $company->city ?? 'Kathmandu' }} or reach out for wholesale
                        supply, dealership appointments, and direct support.
                    </p>
                </div>
            </div>
        </section>

        <!-- ========================================================================= -->
        <!-- MOBILE QUICK CONNECT ACTION BAR (1-Tap Call, WhatsApp, Email, Maps) -->
        <!-- ========================================================================= -->
        <section class="grid grid-cols-2 sm:grid-cols-4 gap-2 sm:gap-3.5 w-full max-w-full min-w-0">

            <!-- Quick Call -->
            <a href="tel:{{ $primaryPhone }}"
                class="flex items-center gap-2 p-2.5 sm:p-3.5 rounded-2xl bg-white border border-slate-200 shadow-xs hover:border-red-600 transition-all group min-w-0 w-full overflow-hidden">
                <div
                    class="w-8 h-8 sm:w-9 sm:h-9 rounded-xl bg-red-50 text-red-600 flex items-center justify-center shrink-0 group-hover:scale-105 transition-transform">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                    </svg>
                </div>
                <div class="min-w-0 flex-1 overflow-hidden">
                    <span class="text-[9px] font-black uppercase text-zinc-400 tracking-wider block truncate">Call
                        Direct</span>
                    <span class="text-xs font-extrabold text-zinc-900 truncate block">Phone Call</span>
                </div>
            </a>

            <!-- Quick WhatsApp -->
            <a href="https://wa.me/{{ $waPhone }}?text=Hello%20Seven%20Series%20Factory%2C%20I%20have%20an%20inquiry."
                target="_blank" rel="noopener noreferrer"
                class="flex items-center gap-2 p-2.5 sm:p-3.5 rounded-2xl bg-emerald-50/60 border border-emerald-200/80 shadow-xs hover:border-emerald-500 transition-all group min-w-0 w-full overflow-hidden">
                <div
                    class="w-8 h-8 sm:w-9 sm:h-9 rounded-xl bg-emerald-500 text-white flex items-center justify-center shrink-0 group-hover:scale-105 transition-transform">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.77-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.312.045-.698.077-1.116-.057-.27-.087-.62-.218-1.077-.417-1.928-.84-3.18-2.775-3.277-2.905-.098-.13-.787-1.046-.787-1.996 0-.95.498-1.417.676-1.611.178-.194.388-.243.518-.243.13 0 .26.002.373.007.12.006.279-.045.437.333.163.39.557 1.356.606 1.454.049.098.082.213.016.344-.065.13-.098.212-.196.326-.098.115-.207.257-.295.345-.098.098-.201.205-.087.401.114.196.508.838 1.09 1.357.75.67 1.383.878 1.579.976.196.098.311.082.425-.049.115-.13.491-.572.622-.768.13-.196.261-.164.441-.098.18.065 1.144.54 1.341.638.196.098.327.147.376.229.049.082.049.474-.095.879z" />
                    </svg>
                </div>
                <div class="min-w-0 flex-1 overflow-hidden">
                    <span class="text-[9px] font-black uppercase text-emerald-700 tracking-wider block truncate">Chat
                        Direct</span>
                    <span class="text-xs font-extrabold text-emerald-950 truncate block">WhatsApp</span>
                </div>
            </a>

            <!-- Quick Email -->
            <a href="mailto:{{ $primaryEmail }}"
                class="flex items-center gap-2 p-2.5 sm:p-3.5 rounded-2xl bg-white border border-slate-200 shadow-xs hover:border-red-600 transition-all group min-w-0 w-full overflow-hidden">
                <div
                    class="w-8 h-8 sm:w-9 sm:h-9 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 group-hover:scale-105 transition-transform">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                </div>
                <div class="min-w-0 flex-1 overflow-hidden">
                    <span class="text-[9px] font-black uppercase text-zinc-400 tracking-wider block truncate">Official
                        Mail</span>
                    <span class="text-xs font-extrabold text-zinc-900 truncate block">Email Team</span>
                </div>
            </a>

            <!-- Quick Map -->
            <a href="{{ $mapsUrl }}" target="_blank" rel="noopener noreferrer"
                class="flex items-center gap-2 p-2.5 sm:p-3.5 rounded-2xl bg-white border border-slate-200 shadow-xs hover:border-red-600 transition-all group min-w-0 w-full overflow-hidden">
                <div
                    class="w-8 h-8 sm:w-9 sm:h-9 rounded-xl bg-amber-50 text-amber-600 flex items-center justify-center shrink-0 group-hover:scale-105 transition-transform">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                </div>
                <div class="min-w-0 flex-1 overflow-hidden">
                    <span
                        class="text-[9px] font-black uppercase text-zinc-400 tracking-wider block truncate">Navigation</span>
                    <span class="text-xs font-extrabold text-zinc-900 truncate block">Directions</span>
                </div>
            </a>

        </section>

        <!-- ========================================================================= -->
        <!-- MOBILE VIEW MODE SELECTOR (Only Visible on Mobile Screens < lg) -->
        <!-- ========================================================================= -->
        <div
            class="lg:hidden p-1.5 bg-zinc-100 rounded-2xl flex items-center gap-1.5 shadow-inner w-full max-w-full min-w-0">
            <button type="button" @click="mobileTab = 'info'"
                :class="mobileTab === 'info' ? 'bg-white text-zinc-950 font-black shadow-sm' :
                    'text-zinc-600 font-bold hover:text-zinc-950'"
                class="flex-1 py-2.5 px-3 rounded-xl text-xs uppercase tracking-wider flex items-center justify-center gap-1.5 transition-all truncate">
                <svg class="w-3.5 h-3.5 text-red-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
                <span class="truncate">Factory & Map</span>
            </button>
            <button type="button" @click="mobileTab = 'form'"
                :class="mobileTab === 'form' ? 'bg-red-600 text-white font-black shadow-sm' :
                    'text-zinc-600 font-bold hover:text-zinc-950'"
                class="flex-1 py-2.5 px-3 rounded-xl text-xs uppercase tracking-wider flex items-center justify-center gap-1.5 transition-all truncate">
                <svg class="w-3.5 h-3.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
                <span class="truncate">Send Message</span>
            </button>
        </div>

        <!-- ========================================================================= -->
        <!-- CONTACT INFORMATION & MESSAGE FORM GRID -->
        <!-- ========================================================================= -->
        <section class="grid lg:grid-cols-12 gap-6 sm:gap-8 lg:gap-10 w-full max-w-full min-w-0">

            <!-- Left: Factory & Contact Details (7 cols) -->
            <div class="lg:col-span-7 space-y-6 sm:space-y-8 w-full max-w-full min-w-0"
                :class="mobileTab === 'info' ? 'block' : 'hidden lg:block'">

                <!-- 1. Factory Location Card (Dynamic) -->
                <div
                    class="app-card p-4 sm:p-7 lg:p-8 bg-white border border-slate-200 shadow-md space-y-5 sm:space-y-6 w-full max-w-full min-w-0">
                    <div class="flex items-start gap-3 sm:gap-4 min-w-0">
                        <div
                            class="w-10 h-10 sm:w-12 sm:h-12 rounded-2xl bg-red-50 text-red-600 flex items-center justify-center shrink-0 border border-red-100 shadow-xs">
                            <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </div>
                        <div class="space-y-1 min-w-0 flex-1 overflow-hidden">
                            <span
                                class="text-[9px] sm:text-[10px] font-black uppercase tracking-wider text-red-600 block">MAIN
                                MANUFACTURING PLANT</span>
                            <h2 class="text-base sm:text-2xl font-extrabold text-zinc-950 leading-snug break-words">
                                {{ $company->company_name ?? 'Seven Series Garment Factory' }}</h2>
                            <p class="text-xs sm:text-base text-zinc-700 font-semibold pt-0.5 break-words">
                                {{ $company->primary_address ?? 'Near Padma Colony Main Entrance, Sitapaila' }}
                            </p>
                            <p class="text-xs sm:text-sm text-zinc-500 break-words">
                                {{ $company->city ?? 'Kathmandu' }}, {{ $company->state ?? 'Bagmati Province, Nepal' }}
                            </p>
                            @if (!empty($company->directions_note))
                                <p class="text-xs text-zinc-500 pt-1.5 flex items-start gap-1.5">
                                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 shrink-0 mt-1"></span>
                                    <span class="leading-relaxed break-words">{{ $company->directions_note }}</span>
                                </p>
                            @endif
                        </div>
                    </div>

                    <div class="pt-2 flex flex-col sm:flex-row gap-2.5 sm:gap-3 w-full">
                        <a href="{{ $mapsUrl }}" target="_blank" rel="noopener noreferrer"
                            class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-4 py-2.5 rounded-full bg-zinc-900 hover:bg-zinc-800 text-white text-xs font-bold transition-all shadow-sm text-center">
                            <svg class="w-4 h-4 text-red-500 shrink-0" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                            </svg>
                            <span class="truncate">Google Maps & Directions</span>
                        </a>

                        @if (!empty($company->primary_phone))
                            <a href="tel:{{ $company->primary_phone }}"
                                class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-4 py-2.5 rounded-full bg-red-50 hover:bg-red-100 text-red-700 border border-red-200 text-xs font-bold transition-all text-center">
                                <svg class="w-4 h-4 text-red-600 shrink-0" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                                <span class="truncate">{{ $company->primary_phone }}</span>
                            </a>
                        @endif
                    </div>
                </div>

                <!-- 2. Official Email & Operating Hours Grid (Dynamic) -->
                <div class="grid sm:grid-cols-2 gap-3.5 sm:gap-4 w-full max-w-full min-w-0">

                    <!-- Official Email Card -->
                    <div class="app-card p-4 sm:p-6 bg-white border border-slate-200 shadow-xs space-y-3 w-full min-w-0 overflow-hidden"
                        x-data="{ copied: false }">
                        <div
                            class="w-9 h-9 sm:w-10 sm:h-10 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center border border-blue-100 shrink-0">
                            <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <div class="min-w-0">
                            <span class="text-[10px] font-black uppercase tracking-wider text-zinc-400 block">OFFICIAL
                                EMAIL</span>
                            <h3 class="text-sm sm:text-base font-bold text-zinc-950 pt-0.5 truncate">Direct
                                Correspondence</h3>
                            <a href="mailto:{{ $primaryEmail }}"
                                class="text-xs sm:text-sm font-extrabold text-red-600 hover:underline block pt-1 break-all">
                                {{ $primaryEmail }}
                            </a>
                            <p class="text-xs text-zinc-500 pt-1 leading-relaxed">
                                {{ $company->email_note ?? 'For line sheets, volume pricing, and customer inquiries.' }}
                            </p>
                        </div>
                        <button type="button"
                            @click="navigator.clipboard.writeText('{{ $primaryEmail }}'); copied = true; setTimeout(() => copied = false, 2000)"
                            class="inline-flex items-center gap-1.5 text-[11px] font-bold text-zinc-600 hover:text-zinc-950 pt-1">
                            <svg class="w-3.5 h-3.5 text-zinc-400 shrink-0" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3" />
                            </svg>
                            <span x-text="copied ? 'Copied to clipboard!' : 'Copy Email Address'"></span>
                        </button>
                    </div>

                    <!-- Factory Hours Card -->
                    <div
                        class="app-card p-4 sm:p-6 bg-white border border-slate-200 shadow-xs space-y-3 w-full min-w-0 overflow-hidden">
                        <div
                            class="w-9 h-9 sm:w-10 sm:h-10 rounded-xl bg-amber-50 text-amber-600 flex items-center justify-center border border-amber-100 shrink-0">
                            <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div class="min-w-0">
                            <span class="text-[10px] font-black uppercase tracking-wider text-zinc-400 block">FACTORY
                                TIMINGS</span>
                            <h3 class="text-sm sm:text-base font-bold text-zinc-950 pt-0.5 truncate">Operating Hours
                            </h3>
                            <p class="text-xs sm:text-sm font-bold text-zinc-800 pt-1">
                                {{ $company->operating_hours ?? 'Sunday – Friday: 09:00 – 18:00' }}
                            </p>
                            <p class="text-xs text-zinc-500 pt-1 leading-relaxed">
                                {{ $company->operating_hours_note ?? 'Saturday: Factory Closed (Maintenance & Dispatch Prep)' }}
                            </p>
                        </div>
                    </div>

                </div>

                <!-- 3. CLEAN INTERACTIVE FACTORY MAP (NO API KEY, NO IFRAME, SLEEK UI) -->
                <script>
                    if (!window.contactMap) {
                        window.contactMap = function(pins) {
                            return {
                                pins: pins || [],
                                activePinIndex: 0,
                                map: null,
                                markers: [],
                                init() {
                                    const wait = setInterval(() => {
                                        if (window.createContactMapEngine) {
                                            clearInterval(wait);
                                            const real = window.createContactMapEngine(this.pins);
                                            Object.assign(this, real);
                                            this.mountMap();
                                        }
                                    }, 40);
                                },
                                initMap() {
                                    this.init();
                                },
                                selectPin(idx) {
                                    this.activePinIndex = idx;
                                    if (this.map && this.pins && this.pins[idx]) {
                                        this.map.flyTo([parseFloat(this.pins[idx].latitude), parseFloat(this.pins[idx].longitude)],
                                            15);
                                    }
                                }
                            };
                        };
                    }
                </script>
                <div class="app-card p-4 sm:p-7 lg:p-8 bg-white border border-slate-200 shadow-md space-y-4 sm:space-y-5 w-full max-w-full min-w-0"
                    x-data="contactMap({{ Js::from($company->map_pins ?? []) }})" x-init="initMap()">

                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2.5 w-full min-w-0">
                        <div class="min-w-0">
                            <div
                                class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full bg-emerald-50 text-[10px] font-mono font-bold text-emerald-700 border border-emerald-200 mb-1">
                                <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                                <span>LIVE MAP &bull; NO API KEY REQUIRED</span>
                            </div>
                            <h3 class="text-base sm:text-xl font-bold text-zinc-950 truncate">Factory Premises & Live
                                Navigation</h3>
                        </div>
                        <span
                            class="self-start sm:self-auto px-2.5 py-1 rounded-full bg-zinc-100 text-[10px] sm:text-[11px] font-mono font-bold text-zinc-800 border border-zinc-200 shrink-0">
                            {{ count($company->map_pins ?? []) }} Verified
                            Location{{ count($company->map_pins ?? []) > 1 ? 's' : '' }}
                        </span>
                    </div>

                    <!-- Dynamic Pin Switcher Tabs -->
                    @if (!empty($company->map_pins) && count($company->map_pins) > 1)
                        <div
                            class="flex items-center gap-2 overflow-x-auto no-scrollbar pb-1 -mx-1 px-1 w-full max-w-full min-w-0">
                            @foreach ($company->map_pins as $idx => $pin)
                                <button type="button" @click="selectPin({{ $idx }})"
                                    :class="activePinIndex === {{ $idx }} ? 'bg-red-600 text-white shadow-sm' :
                                        'bg-zinc-100 text-zinc-700 hover:bg-zinc-200'"
                                    class="shrink-0 whitespace-nowrap px-3 py-1.5 rounded-full text-xs font-bold transition-all flex items-center gap-1.5">
                                    <span class="w-2 h-2 rounded-full shrink-0"
                                        :class="activePinIndex === {{ $idx }} ? 'bg-white' : 'bg-red-600'"></span>
                                    <span>{{ $pin['title'] ?? 'Pin ' . ($idx + 1) }}</span>
                                    @if (!empty($pin['type']))
                                        <span class="opacity-75 text-[10px]">({{ $pin['type'] }})</span>
                                    @endif
                                </button>
                            @endforeach
                        </div>
                    @endif

                    <!-- Clean Interactive Leaflet Map Container (Zero Iframes, Zero API Keys) -->
                    <div
                        class="h-64 sm:h-96 md:h-[420px] w-full max-w-full rounded-2xl overflow-hidden border border-zinc-200 relative bg-zinc-100 shadow-inner brand-2d-map">
                        <div id="contact-map"
                            class="w-full h-full min-h-[250px] sm:min-h-[384px] md:min-h-[420px] z-10 relative"></div>

                        <div
                            class="absolute bottom-2.5 left-2.5 right-2.5 sm:right-auto max-w-[calc(100%-1.25rem)] z-[400] bg-white/95 backdrop-blur-md px-3 py-1.5 rounded-full border border-zinc-200 shadow-md text-xs font-bold text-zinc-900 flex items-center gap-2 pointer-events-none min-w-0 overflow-hidden">
                            <span class="w-2 h-2 rounded-full bg-red-600 animate-pulse shrink-0"></span>
                            <span class="truncate min-w-0 flex-1 text-[11px]"
                                x-text="pins[activePinIndex]?.address || '{{ $company->primary_address ?? 'Sitapaila Factory Floor' }}'"></span>
                        </div>
                    </div>

                    <div
                        class="pt-1 flex flex-col sm:flex-row sm:items-center justify-between gap-2 text-xs text-zinc-500 w-full min-w-0">
                        <span class="flex items-center gap-1.5 min-w-0 truncate">
                            <span class="w-2 h-2 rounded-full bg-emerald-500 shrink-0"></span>
                            <span class="truncate">Clean 2D Map &bull; Live Navigation</span>
                        </span>
                        <div class="flex items-center gap-3 shrink-0">
                            <a href="{{ $googleReviewUrl }}" target="_blank" rel="noopener noreferrer"
                                class="font-bold text-amber-600 hover:text-amber-700 hover:underline inline-flex items-center gap-1 transition-colors">
                                <span class="text-amber-500">★</span>
                                <span>Rate on Google</span>
                            </a>
                            <span class="text-zinc-300">•</span>
                            <a :href="pins && pins[activePinIndex] && pins[activePinIndex].latitude && pins[activePinIndex].longitude ? ('https://www.google.com/maps/dir/?api=1&destination=' + pins[activePinIndex].latitude + ',' + pins[activePinIndex].longitude) : '{{ $mapsUrl }}'"
                                target="_blank" rel="noopener noreferrer"
                                class="font-bold text-blue-600 hover:text-blue-700 hover:underline inline-flex items-center gap-1 transition-colors">
                                <span>Open in Google Maps</span>
                                <span>&rarr;</span>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- 4. FACTORY LINKTREE & DIGITAL QR CODE DIGITAL HUB CARD -->
                <div class="app-card p-4 sm:p-6 lg:p-8 bg-gradient-to-br from-white via-zinc-50/70 to-emerald-50/30 border border-slate-200 shadow-md space-y-5 sm:space-y-6 relative overflow-hidden w-full max-w-full min-w-0"
                    x-data="{ copiedLink: false }">
                    <div
                        class="absolute -right-16 -top-16 w-56 h-56 bg-emerald-500/10 rounded-full blur-3xl pointer-events-none">
                    </div>

                    <div
                        class="flex flex-col sm:flex-row sm:items-center justify-between gap-2.5 relative z-10 w-full min-w-0">
                        <div class="min-w-0">
                            <div
                                class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full bg-emerald-100 text-[10px] font-black uppercase tracking-wider text-emerald-800 border border-emerald-200 mb-1">
                                <span class="w-2 h-2 rounded-full bg-emerald-600 animate-pulse"></span>
                                <span>ALL-IN-ONE FACTORY ECOSYSTEM</span>
                            </div>
                            <h3 class="text-base sm:text-2xl font-extrabold text-zinc-950 break-words">Factory Linktree
                                & Digital QR Code</h3>
                        </div>
                        <span
                            class="self-start sm:self-auto px-3 py-1 rounded-full bg-zinc-900 text-white text-[10px] sm:text-[11px] font-mono font-bold tracking-wider truncate max-w-full">
                            linktr.ee/sevenseries
                        </span>
                    </div>

                    <div class="grid sm:grid-cols-12 gap-5 sm:gap-6 items-center relative z-10 w-full min-w-0">
                        <!-- QR Code Frame -->
                        <div class="sm:col-span-5 flex flex-col items-center w-full">
                            <div
                                class="relative p-3 bg-white rounded-2xl border-2 border-slate-200 shadow-xl group hover:border-emerald-500 transition-all hover:scale-105 duration-300 max-w-[200px] w-full">
                                <img src="{{ asset($linktreeQrPath) }}" alt="Seven Series Factory Linktree QR Code"
                                    class="w-full aspect-square object-contain mx-auto">
                                <div
                                    class="absolute bottom-2 inset-x-2 text-center bg-zinc-950/80 backdrop-blur-md rounded-lg py-1 px-2 text-[9px] font-mono font-bold text-white tracking-wider">
                                    SCAN TO CONNECT
                                </div>
                            </div>
                            <span class="text-[10px] sm:text-[11px] text-zinc-500 font-semibold mt-2 text-center">
                                Compatible with any phone camera
                            </span>
                        </div>

                        <!-- Info & Actions -->
                        <div class="sm:col-span-7 space-y-3.5 sm:space-y-4 w-full min-w-0">
                            <p class="text-xs sm:text-sm text-zinc-600 leading-relaxed font-normal">
                                Access our digital wholesale line-sheets, verified partner shop directory, Instagram
                                reels, WhatsApp hotline, and corporate profiles in one tap.
                            </p>

                            <!-- Direct Link Pill Box -->
                            <div
                                class="p-2.5 sm:p-3 rounded-xl bg-white border border-slate-200 flex items-center justify-between gap-2 shadow-xs w-full min-w-0">
                                <div class="flex items-center gap-2 min-w-0 flex-1 overflow-hidden">
                                    <svg class="w-4 h-4 text-emerald-600 shrink-0" fill="currentColor"
                                        viewBox="0 0 24 24">
                                        <path
                                            d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 14.5v-9l6 4.5-6 4.5z" />
                                    </svg>
                                    <span
                                        class="text-xs font-mono font-bold text-zinc-900 truncate block">{{ $linktreeUrl }}</span>
                                </div>
                                <button type="button"
                                    @click="navigator.clipboard.writeText('{{ $linktreeUrl }}'); copiedLink = true; setTimeout(() => copiedLink = false, 2500)"
                                    class="shrink-0 px-2.5 py-1 rounded-lg bg-zinc-100 hover:bg-zinc-200 text-zinc-800 text-[11px] font-bold transition-all active:scale-95">
                                    <span x-text="copiedLink ? 'Copied!' : 'Copy'"></span>
                                </button>
                            </div>

                            <div class="flex flex-col sm:flex-row gap-2.5 pt-1 w-full">
                                <a href="{{ $linktreeUrl }}" target="_blank" rel="noopener noreferrer"
                                    class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-5 py-2.5 rounded-full bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-black uppercase tracking-wider transition-all shadow-md shadow-emerald-600/30 active:scale-95 text-center">
                                    <span>Open Linktree Page</span>
                                    <span>&rarr;</span>
                                </a>
                                <a href="{{ asset($linktreeQrPath) }}" download="sevenseries-linktree-qr.svg"
                                    class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-4 py-2.5 rounded-full bg-white hover:bg-zinc-100 text-zinc-900 text-xs font-bold border border-zinc-200 transition-all shadow-xs text-center">
                                    <svg class="w-3.5 h-3.5 text-zinc-600 shrink-0" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                    </svg>
                                    <span>Download QR Code</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 4.5 GOOGLE MAPS REVIEWS & RATING CARD -->
                <div class="app-card p-4 sm:p-6 lg:p-8 bg-gradient-to-br from-white via-amber-50/20 to-orange-50/30 border border-amber-200/80 shadow-md space-y-5 sm:space-y-6 relative overflow-hidden w-full max-w-full min-w-0">
                    <div class="absolute -right-16 -top-16 w-56 h-56 bg-amber-500/10 rounded-full blur-3xl pointer-events-none"></div>

                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 relative z-10 w-full min-w-0">
                        <div class="min-w-0">
                            <div class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full bg-amber-100/80 text-[10px] font-black uppercase tracking-wider text-amber-900 border border-amber-200 mb-1">
                                <span class="text-amber-500 text-xs">★★★★★</span>
                                <span>GOOGLE MAPS VERIFIED RATING</span>
                            </div>
                            <h3 class="text-base sm:text-2xl font-extrabold text-zinc-950 break-words">
                                Rate Our Denim Craftsmanship on Google Maps
                            </h3>
                        </div>

                        <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-2xl bg-white border border-amber-200 shadow-xs shrink-0 self-start sm:self-auto">
                            <div class="flex text-amber-400 text-sm tracking-tighter">★★★★★</div>
                            <div class="text-left border-l border-zinc-200 pl-2">
                                <span class="block text-xs font-black text-zinc-950 leading-tight">5.0 / 5.0</span>
                                <span class="block text-[9px] font-bold text-zinc-400 uppercase tracking-wider">Garment Factory</span>
                            </div>
                        </div>
                    </div>

                    <div class="grid sm:grid-cols-12 gap-5 sm:gap-6 items-center relative z-10 w-full min-w-0">
                        <!-- Rating Graphic / Google Badge -->
                        <div class="sm:col-span-4 flex flex-col items-center justify-center p-5 rounded-2xl bg-white border border-amber-100 shadow-sm text-center">
                            <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-amber-400 to-amber-600 text-white flex items-center justify-center text-xl font-black shadow-md shadow-amber-500/20 mb-3">
                                <svg class="w-7 h-7" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 14.5v-9l6 4.5-6 4.5z"/>
                                </svg>
                            </div>
                            <div class="text-xs font-black text-zinc-900">Seven Series Garment Plant</div>
                            <div class="text-[11px] text-zinc-500 font-medium">Sitapaila, Kathmandu</div>
                            <div class="flex items-center gap-1 text-amber-500 text-xs mt-1.5">
                                ★★★★★
                                <span class="text-[10px] text-zinc-400 font-bold ml-1">(Google Reviews)</span>
                            </div>
                        </div>

                        <!-- Info & Actions -->
                        <div class="sm:col-span-8 space-y-3.5 w-full min-w-0">
                            <p class="text-xs sm:text-sm text-zinc-600 leading-relaxed font-normal">
                                Have you visited our Sitapaila factory, tried on our denim cuts, or partnered with Seven Series for wholesale retail? Your honest Google review helps retailers and denim lovers discover authentic Nepali garment manufacturing.
                            </p>

                            <div class="flex flex-col sm:flex-row gap-2.5 pt-1 w-full">
                                <a href="{{ $googleReviewUrl }}" target="_blank" rel="noopener noreferrer"
                                    class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-6 py-3 rounded-full bg-amber-500 hover:bg-amber-600 text-zinc-950 text-xs font-black uppercase tracking-wider transition-all shadow-md shadow-amber-500/30 active:scale-95 text-center">
                                    <span class="text-zinc-950">★</span>
                                    <span>Write a Google Review</span>
                                    <span>&rarr;</span>
                                </a>
                                <a href="{{ $mapsUrl }}" target="_blank" rel="noopener noreferrer"
                                    class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-4 py-3 rounded-full bg-white hover:bg-zinc-100 text-zinc-800 text-xs font-bold border border-zinc-200 transition-all shadow-xs text-center">
                                    <svg class="w-3.5 h-3.5 text-zinc-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                    <span>View Location on Maps</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 5. OFFICIAL SOCIAL MEDIA CHANNELS & COMMUNITY CARD -->
                <div
                    class="app-card p-4 sm:p-6 lg:p-8 bg-white border border-slate-200 shadow-md space-y-5 sm:space-y-6 w-full max-w-full min-w-0">
                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2.5 w-full min-w-0">
                        <div class="min-w-0">
                            <div
                                class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-red-100 text-[10px] font-black uppercase tracking-wider text-red-600 border border-red-200 mb-1">
                                <span class="w-2 h-2 rounded-full bg-red-600 animate-pulse"></span>
                                <span>OFFICIAL BRAND SOCIALS</span>
                            </div>
                            <h3 class="text-base sm:text-2xl font-extrabold text-zinc-950 break-words">Follow Seven
                                Series Across Social Media</h3>
                        </div>
                        <p class="text-xs text-zinc-500 max-w-xs">
                            Real factory clips, selvedge denim wear tests, retail launch alerts, and community fits.
                        </p>
                    </div>

                    @if (!empty($socialLinks) && count($socialLinks) > 0)
                        <div class="grid sm:grid-cols-2 gap-3 w-full min-w-0">
                            @foreach ($socialLinks as $social)
                                @php
                                    $platform = strtolower($social['platform'] ?? 'social');
                                    $url = $social['url'] ?? '#';
                                    $handle = $social['handle'] ?? '@sevenseries';
                                    $label = $social['label'] ?? $social['platform'] . ' Channel';
                                @endphp
                                <a href="{{ $url }}" target="_blank" rel="noopener noreferrer"
                                    class="group p-3 sm:p-4 rounded-2xl border border-slate-200 bg-slate-50/50 hover:bg-white hover:border-red-600 hover:shadow-md transition-all flex items-center justify-between gap-2.5 w-full min-w-0 overflow-hidden">
                                    <div class="flex items-center gap-2.5 sm:gap-3.5 min-w-0 flex-1 overflow-hidden">
                                        <!-- Platform Icon Badge -->
                                        <div
                                            class="w-9 h-9 sm:w-10 sm:h-10 rounded-xl flex items-center justify-center shrink-0 transition-transform group-hover:scale-110
                                            @if ($platform === 'instagram') bg-gradient-to-tr from-amber-500 via-rose-500 to-purple-600 text-white
                                            @elseif($platform === 'facebook') bg-blue-600 text-white
                                            @elseif($platform === 'tiktok') bg-zinc-950 text-white
                                            @elseif($platform === 'youtube') bg-red-600 text-white
                                            @elseif($platform === 'whatsapp') bg-emerald-500 text-white
                                            @elseif($platform === 'linkedin') bg-blue-700 text-white
                                            @elseif($platform === 'x' || $platform === 'twitter') bg-black text-white
                                            @else bg-zinc-900 text-white @endif">
                                            @if ($platform === 'instagram')
                                                <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path
                                                        d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                                                </svg>
                                            @elseif($platform === 'facebook')
                                                <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path
                                                        d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                                                </svg>
                                            @elseif($platform === 'tiktok')
                                                <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path
                                                        d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.08 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-1.43.08-2.86-.31-4.08-1.03-2.02-1.19-3.44-3.37-3.65-5.71-.02-.5-.03-1-.01-1.49.18-1.9 1.12-3.72 2.58-4.96 1.66-1.44 3.98-2.13 6.15-1.72.02 1.48-.04 2.96-.04 4.44-.99-.32-2.15-.23-3.02.37-.63.41-1.11 1.04-1.36 1.75-.21.51-.24 1.07-.14 1.61.24 1.64 1.82 3.02 3.5 2.87 1.12-.01 2.19-.66 2.77-1.61.19-.33.4-.67.41-1.06.1-1.79.06-3.57.07-5.36.01-4.03-.01-8.05.02-12.07z" />
                                                </svg>
                                            @elseif($platform === 'youtube')
                                                <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path
                                                        d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z" />
                                                </svg>
                                            @elseif($platform === 'whatsapp')
                                                <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path
                                                        d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.77-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.312.045-.698.077-1.116-.057-.27-.087-.62-.218-1.077-.417-1.928-.84-3.18-2.775-3.277-2.905-.098-.13-.787-1.046-.787-1.996 0-.95.498-1.417.676-1.611.178-.194.388-.243.518-.243.13 0 .26.002.373.007.12.006.279-.045.437.333.163.39.557 1.356.606 1.454.049.098.082.213.016.344-.065.13-.098.212-.196.326-.098.115-.207.257-.295.345-.098.098-.201.205-.087.401.114.196.508.838 1.09 1.357.75.67 1.383.878 1.579.976.196.098.311.082.425-.049.115-.13.491-.572.622-.768.13-.196.261-.164.441-.098.18.065 1.144.54 1.341.638.196.098.327.147.376.229.049.082.049.474-.095.879z" />
                                                </svg>
                                            @elseif($platform === 'x' || $platform === 'twitter')
                                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                                    <path
                                                        d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z" />
                                                </svg>
                                            @elseif($platform === 'linkedin')
                                                <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path
                                                        d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z" />
                                                </svg>
                                            @else
                                                <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none"
                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1" />
                                                </svg>
                                            @endif
                                        </div>

                                        <div class="min-w-0 flex-1 overflow-hidden">
                                            <div class="flex items-center gap-1.5 min-w-0">
                                                <span
                                                    class="text-xs font-black uppercase text-zinc-950 shrink-0">{{ $social['platform'] }}</span>
                                                <span
                                                    class="text-[10px] font-mono text-zinc-400 font-bold truncate flex-1 min-w-0">{{ $handle }}</span>
                                            </div>
                                            <p class="text-[11px] text-zinc-500 font-medium truncate pt-0.5 block">
                                                {{ $label }}</p>
                                        </div>
                                    </div>

                                    <div
                                        class="w-7 h-7 sm:w-8 sm:h-8 rounded-full bg-zinc-100 group-hover:bg-red-600 group-hover:text-white flex items-center justify-center shrink-0 transition-colors">
                                        <svg class="w-3.5 h-3.5 transform group-hover:translate-x-0.5 group-hover:-translate-y-0.5 transition-transform"
                                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                        </svg>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    @else
                        <div
                            class="p-5 sm:p-6 text-center rounded-2xl bg-zinc-50 border border-zinc-200 text-xs text-zinc-500">
                            Social media channels will appear here once configured in the admin panel.
                        </div>
                    @endif
                </div>

            </div>

            <!-- Right: Direct Message Form (5 cols) -->
            <div class="lg:col-span-5 relative w-full max-w-full min-w-0"
                :class="mobileTab === 'form' ? 'block' : 'hidden lg:block'" x-data="{
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
                    isRateLimited: false,
                    async submitForm() {
                        this.loading = true;
                        this.error = '';
                        this.success = false;
                        this.isRateLimited = false;
                
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
                                this.isRateLimited = res.status === 429 || data.rate_limited;
                                this.error = data.message || 'Something went wrong. Please check your fields and try again.';
                            }
                        } catch (e) {
                            this.error = 'Unable to send message. Please email us directly at {{ $primaryEmail }}';
                        } finally {
                            this.loading = false;
                        }
                    }
                }">
                <div
                    class="app-card p-4 sm:p-7 lg:p-10 bg-white border border-slate-200 shadow-xl space-y-5 sm:space-y-7 lg:sticky lg:top-8 w-full max-w-full min-w-0">

                    <div class="space-y-1">
                        <span class="text-[10px] font-black uppercase tracking-wider text-red-600 block">DIRECT
                            INQUIRY</span>
                        <h2 class="text-lg sm:text-2xl font-extrabold text-zinc-950 uppercase tracking-tight">Send Us a
                            Message</h2>
                        <p class="text-xs text-zinc-500 break-words">
                            Sent directly to our team at <strong class="text-zinc-900">{{ $primaryEmail }}</strong>
                        </p>
                    </div>

                    <!-- Success Alert -->
                    <template x-if="success">
                        <div
                            class="p-3.5 sm:p-4 rounded-2xl bg-emerald-50 border border-emerald-200 text-emerald-900 space-y-2">
                            <div class="flex items-center gap-2 font-bold text-xs sm:text-sm">
                                <svg class="w-4 h-4 sm:w-5 sm:h-5 text-emerald-600 shrink-0" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                                <span>Inquiry Logged & Dispatched!</span>
                            </div>
                            <p class="text-xs text-emerald-800 leading-relaxed" x-text="successMessage"></p>
                            <div
                                class="text-[10px] sm:text-[11px] text-emerald-700 bg-white/70 p-2.5 rounded-xl border border-emerald-100 space-y-1">
                                <div class="flex items-center gap-1.5 font-semibold">
                                    <svg class="w-3.5 h-3.5 text-emerald-600 shrink-0" fill="currentColor"
                                        viewBox="0 0 24 24">
                                        <path
                                            d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 15l-5-5 1.41-1.41L11 14.17l7.59-7.59L20 8l-9 9z" />
                                    </svg>
                                    <span>Confirmation email sent to your inbox.</span>
                                </div>
                                <div class="flex items-center gap-1.5 font-semibold">
                                    <svg class="w-3.5 h-3.5 text-emerald-600 shrink-0" fill="currentColor"
                                        viewBox="0 0 24 24">
                                        <path
                                            d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 15l-5-5 1.41-1.41L11 14.17l7.59-7.59L20 8l-9 9z" />
                                    </svg>
                                    <span>Automated WhatsApp confirmation dispatched from our server.</span>
                                </div>
                            </div>
                        </div>
                    </template>

                    <!-- Error / Rate Limited Alert -->
                    <template x-if="error">
                        <div class="p-3.5 sm:p-4 rounded-2xl space-y-1"
                            :class="isRateLimited ? 'bg-amber-50 border border-amber-300 text-amber-950' :
                                'bg-red-50 border border-red-200 text-red-900'">
                            <div class="flex items-center gap-2 font-bold text-xs sm:text-sm">
                                <svg x-show="!isRateLimited" class="w-4 h-4 sm:w-5 sm:h-5 text-red-600 shrink-0"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <svg x-show="isRateLimited" class="w-4 h-4 sm:w-5 sm:h-5 text-amber-600 shrink-0"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span
                                    x-text="isRateLimited ? 'Submission Limit (15 Min Threshold)' : 'Submission Notice'"></span>
                            </div>
                            <p class="text-xs leading-relaxed"
                                :class="isRateLimited ? 'text-amber-900' : 'text-red-800'" x-text="error"></p>
                        </div>
                    </template>

                    <form @submit.prevent="submitForm()" class="space-y-4 sm:space-y-5">

                        <!-- Full Name -->
                        <div class="space-y-1.5">
                            <label
                                class="block text-[11px] sm:text-xs font-bold text-zinc-800 uppercase tracking-wider">Your
                                Full Name <span class="text-red-600">*</span></label>
                            <input type="text" x-model="form.name" required placeholder="e.g. Ramesh Shrestha"
                                class="w-full px-3.5 py-2.5 rounded-xl border border-zinc-200 bg-zinc-50 text-sm font-medium text-zinc-900 focus:bg-white focus:border-red-600 focus:outline-none transition-colors">
                        </div>

                        <!-- Email Address -->
                        <div class="space-y-1.5">
                            <label
                                class="block text-[11px] sm:text-xs font-bold text-zinc-800 uppercase tracking-wider">Email
                                Address <span class="text-red-600">*</span></label>
                            <input type="email" x-model="form.email" required placeholder="e.g. ramesh@store.com"
                                class="w-full px-3.5 py-2.5 rounded-xl border border-zinc-200 bg-zinc-50 text-sm font-medium text-zinc-900 focus:bg-white focus:border-red-600 focus:outline-none transition-colors">
                        </div>

                        <!-- Phone / WhatsApp Number -->
                        <div class="space-y-1.5">
                            <label
                                class="block text-[11px] sm:text-xs font-bold text-zinc-800 uppercase tracking-wider">Phone
                                / WhatsApp Number</label>
                            <input type="tel" x-model="form.phone" placeholder="e.g. +977-9800000000"
                                class="w-full px-3.5 py-2.5 rounded-xl border border-zinc-200 bg-zinc-50 text-sm font-medium text-zinc-900 focus:bg-white focus:border-red-600 focus:outline-none transition-colors">
                        </div>

                        <!-- Inquiry Category -->
                        <div class="space-y-1.5">
                            <label
                                class="block text-[11px] sm:text-xs font-bold text-zinc-800 uppercase tracking-wider">Inquiry
                                Topic</label>
                            <select x-model="form.subject"
                                class="w-full px-3.5 py-2.5 rounded-xl border border-zinc-200 bg-zinc-50 text-sm font-medium text-zinc-900 focus:bg-white focus:border-red-600 focus:outline-none transition-colors">
                                <option value="Factory & Wholesale Supply">Factory & Wholesale Supply</option>
                                <option value="Dealership / Retail Partnership">Dealership / Retail Partnership
                                </option>
                                <option value="Factory Visit Appointment">Factory Visit Appointment</option>
                                <option value="Customer Inquiries / Fitting Questions">Customer Inquiries / Fitting
                                    Questions</option>
                                <option value="Other">Other Inquiry</option>
                            </select>
                        </div>

                        <!-- Message -->
                        <div class="space-y-1.5">
                            <label
                                class="block text-[11px] sm:text-xs font-bold text-zinc-800 uppercase tracking-wider">Message
                                Details <span class="text-red-600">*</span></label>
                            <textarea x-model="form.message" required rows="4"
                                placeholder="Tell us your quantity requirements, questions, or visit schedule..."
                                class="w-full px-3.5 py-2.5 rounded-xl border border-zinc-200 bg-zinc-50 text-sm font-medium text-zinc-900 focus:bg-white focus:border-red-600 focus:outline-none transition-colors resize-none"></textarea>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" :disabled="loading"
                            class="w-full py-3.5 px-4 bg-red-600 hover:bg-red-700 text-white font-extrabold text-xs uppercase tracking-widest rounded-full transition-all shadow-lg shadow-red-600/30 flex items-center justify-center gap-2 active:scale-95 disabled:opacity-50 text-center">
                            <span x-show="!loading" class="truncate">Send Message to Factory Team &rarr;</span>
                            <span x-show="loading" x-cloak class="flex items-center gap-2">
                                <svg class="animate-spin h-4 w-4 text-white" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10"
                                        stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor"
                                        d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                    </path>
                                </svg>
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
