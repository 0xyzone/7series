@php
    $company = $company ?? \App\Models\CompanySetting::getSettings();
    $primaryEmail = $company->primary_email ?? 'samparka@7series.com.np';
    $primaryPhone = $company->primary_phone ?? '+977 9801234567';
    $waPhone = preg_replace('/[^0-9]/', '', $company->whatsapp_number ?: $primaryPhone);
    $mapsUrl = !empty($company->google_maps_url) ? $company->google_maps_url : 'https://maps.google.com/?q=' . urlencode(($company->primary_address ?? 'Sitapaila') . ' ' . ($company->city ?? 'Kathmandu'));
@endphp
<x-layout>
    <x-slot:title>Contact Us & Factory Location | {{ $company->company_name ?? 'Seven Series Garment Industry' }}</x-slot>

    <x-nav transparent="true" />

    <!-- Leaflet CSS & JS for Custom Interactive Map -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

    <main class="min-h-screen pt-4 sm:pt-8 pb-28 sm:pb-36 px-3 sm:px-6 lg:px-10 xl:px-12 w-full max-w-full overflow-x-hidden space-y-6 sm:space-y-10"
          x-data="{ mobileTab: 'info' }">

        <!-- ========================================================================= -->
        <!-- CONTACT HERO HEADER -->
        <!-- ========================================================================= -->
        <section class="relative">
            <div class="app-card p-4 sm:p-8 lg:p-10 relative overflow-hidden bg-gradient-to-br from-white via-slate-50 to-red-50/20 border border-slate-200 shadow-lg">
                <div class="absolute -right-20 -top-20 w-80 h-80 bg-red-600/10 rounded-full blur-3xl pointer-events-none"></div>

                <div class="max-w-3xl space-y-3 relative z-10">
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-slate-900 text-white text-[11px] font-black tracking-wider uppercase shadow-xs">
                        <span class="w-2 h-2 rounded-full bg-red-500 animate-pulse"></span>
                        <span>FACTORY LOCATION & CONTACT</span>
                    </div>

                    <h1 class="text-2xl sm:text-4xl lg:text-5xl font-extrabold tracking-tight text-zinc-950 uppercase leading-tight break-words">
                        GET IN TOUCH WITH OUR <br>
                        <span class="text-red-600">GARMENT FACTORY.</span>
                    </h1>

                    <p class="text-zinc-600 text-xs sm:text-base leading-relaxed font-normal">
                        Visit our manufacturing plant in {{ $company->city ?? 'Kathmandu' }} or reach out for wholesale supply, dealership appointments, and direct support.
                    </p>
                </div>
            </div>
        </section>

        <!-- ========================================================================= -->
        <!-- MOBILE QUICK CONNECT ACTION BAR (1-Tap Call, WhatsApp, Email, Maps) -->
        <!-- ========================================================================= -->
        <section class="grid grid-cols-2 sm:grid-cols-4 gap-2.5 sm:gap-3.5">
            
            <!-- Quick Call -->
            <a href="tel:{{ $primaryPhone }}" 
               class="flex items-center gap-2.5 p-3 sm:p-3.5 rounded-2xl bg-white border border-slate-200 shadow-xs hover:border-red-600 transition-all group">
                <div class="w-9 h-9 rounded-xl bg-red-50 text-red-600 flex items-center justify-center shrink-0 group-hover:scale-105 transition-transform">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                </div>
                <div class="min-w-0">
                    <span class="text-[9px] font-black uppercase text-zinc-400 tracking-wider block">Call Direct</span>
                    <span class="text-xs font-extrabold text-zinc-900 truncate block">Phone Call</span>
                </div>
            </a>

            <!-- Quick WhatsApp -->
            <a href="https://wa.me/{{ $waPhone }}?text=Hello%20Seven%20Series%20Factory%2C%20I%20have%20an%20inquiry." target="_blank" rel="noopener noreferrer" 
               class="flex items-center gap-2.5 p-3 sm:p-3.5 rounded-2xl bg-emerald-50/60 border border-emerald-200/80 shadow-xs hover:border-emerald-500 transition-all group">
                <div class="w-9 h-9 rounded-xl bg-emerald-500 text-white flex items-center justify-center shrink-0 group-hover:scale-105 transition-transform">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.77-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.312.045-.698.077-1.116-.057-.27-.087-.62-.218-1.077-.417-1.928-.84-3.18-2.775-3.277-2.905-.098-.13-.787-1.046-.787-1.996 0-.95.498-1.417.676-1.611.178-.194.388-.243.518-.243.13 0 .26.002.373.007.12.006.279-.045.437.333.163.39.557 1.356.606 1.454.049.098.082.213.016.344-.065.13-.098.212-.196.326-.098.115-.207.257-.295.345-.098.098-.201.205-.087.401.114.196.508.838 1.09 1.357.75.67 1.383.878 1.579.976.196.098.311.082.425-.049.115-.13.491-.572.622-.768.13-.196.261-.164.441-.098.18.065 1.144.54 1.341.638.196.098.327.147.376.229.049.082.049.474-.095.879z"/></svg>
                </div>
                <div class="min-w-0">
                    <span class="text-[9px] font-black uppercase text-emerald-700 tracking-wider block">Chat Direct</span>
                    <span class="text-xs font-extrabold text-emerald-950 truncate block">WhatsApp</span>
                </div>
            </a>

            <!-- Quick Email -->
            <a href="mailto:{{ $primaryEmail }}" 
               class="flex items-center gap-2.5 p-3 sm:p-3.5 rounded-2xl bg-white border border-slate-200 shadow-xs hover:border-red-600 transition-all group">
                <div class="w-9 h-9 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 group-hover:scale-105 transition-transform">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                </div>
                <div class="min-w-0">
                    <span class="text-[9px] font-black uppercase text-zinc-400 tracking-wider block">Official Mail</span>
                    <span class="text-xs font-extrabold text-zinc-900 truncate block">Email Team</span>
                </div>
            </a>

            <!-- Quick Map -->
            <a href="{{ $mapsUrl }}" target="_blank" rel="noopener noreferrer" 
               class="flex items-center gap-2.5 p-3 sm:p-3.5 rounded-2xl bg-white border border-slate-200 shadow-xs hover:border-red-600 transition-all group">
                <div class="w-9 h-9 rounded-xl bg-amber-50 text-amber-600 flex items-center justify-center shrink-0 group-hover:scale-105 transition-transform">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                </div>
                <div class="min-w-0">
                    <span class="text-[9px] font-black uppercase text-zinc-400 tracking-wider block">Navigation</span>
                    <span class="text-xs font-extrabold text-zinc-900 truncate block">Directions</span>
                </div>
            </a>

        </section>

        <!-- ========================================================================= -->
        <!-- MOBILE VIEW MODE SELECTOR (Only Visible on Mobile Screens < lg) -->
        <!-- ========================================================================= -->
        <div class="lg:hidden p-1.5 bg-zinc-100 rounded-2xl flex items-center gap-1.5 shadow-inner">
            <button type="button" @click="mobileTab = 'info'"
                    :class="mobileTab === 'info' ? 'bg-white text-zinc-950 font-black shadow-sm' : 'text-zinc-600 font-bold hover:text-zinc-950'"
                    class="flex-1 py-2.5 px-3 rounded-xl text-xs uppercase tracking-wider flex items-center justify-center gap-1.5 transition-all">
                <svg class="w-3.5 h-3.5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                <span>Factory & Map</span>
            </button>
            <button type="button" @click="mobileTab = 'form'"
                    :class="mobileTab === 'form' ? 'bg-red-600 text-white font-black shadow-sm' : 'text-zinc-600 font-bold hover:text-zinc-950'"
                    class="flex-1 py-2.5 px-3 rounded-xl text-xs uppercase tracking-wider flex items-center justify-center gap-1.5 transition-all">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                <span>Send Message</span>
            </button>
        </div>

        <!-- ========================================================================= -->
        <!-- CONTACT INFORMATION & MESSAGE FORM GRID -->
        <!-- ========================================================================= -->
        <section class="grid lg:grid-cols-12 gap-6 sm:gap-8 items-start">
            
            <!-- Left: Factory & Contact Details (7 cols) -->
            <div class="lg:col-span-7 space-y-6"
                 :class="mobileTab === 'info' ? 'block' : 'hidden lg:block'">

                <!-- 1. Factory Location Card (Dynamic) -->
                <div class="app-card p-4 sm:p-7 bg-white border border-slate-200 shadow-md space-y-4">
                    <div class="flex items-start gap-3.5 sm:gap-4">
                        <div class="w-10 h-10 sm:w-12 sm:h-12 rounded-2xl bg-red-50 text-red-600 flex items-center justify-center shrink-0 border border-red-100 shadow-xs">
                            <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        </div>
                        <div class="space-y-1 min-w-0 flex-1">
                            <span class="text-[9px] sm:text-[10px] font-black uppercase tracking-wider text-red-600">MAIN MANUFACTURING PLANT</span>
                            <h2 class="text-lg sm:text-2xl font-extrabold text-zinc-950 leading-snug break-words">{{ $company->company_name ?? 'Seven Series Garment Factory' }}</h2>
                            <p class="text-sm sm:text-base text-zinc-700 font-semibold pt-0.5 break-words">
                                {{ $company->primary_address ?? 'Near Padma Colony Main Entrance, Sitapaila' }}
                            </p>
                            <p class="text-xs sm:text-sm text-zinc-500">
                                {{ $company->city ?? 'Kathmandu' }}, {{ $company->state ?? 'Bagmati Province, Nepal' }}
                            </p>
                            @if(!empty($company->directions_note))
                                <p class="text-xs text-zinc-500 pt-1.5 flex items-start gap-1.5">
                                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 shrink-0 mt-1"></span>
                                    <span class="leading-relaxed">{{ $company->directions_note }}</span>
                                </p>
                            @endif
                        </div>
                    </div>

                    <div class="pt-2 flex flex-col sm:flex-row gap-2.5 sm:gap-3">
                        <a href="{{ $mapsUrl }}" target="_blank" rel="noopener noreferrer" 
                           class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-4 py-2.5 rounded-full bg-zinc-900 hover:bg-zinc-800 text-white text-xs font-bold transition-all shadow-sm">
                            <svg class="w-4 h-4 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                            <span>Open in Google Maps & Directions</span>
                        </a>

                        @if(!empty($company->primary_phone))
                            <a href="tel:{{ $company->primary_phone }}" 
                               class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-4 py-2.5 rounded-full bg-red-50 hover:bg-red-100 text-red-700 border border-red-200 text-xs font-bold transition-all">
                                <svg class="w-4 h-4 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                                <span>{{ $company->primary_phone }}</span>
                            </a>
                        @endif
                    </div>
                </div>

                <!-- 2. Official Email & Operating Hours Grid (Dynamic) -->
                <div class="grid sm:grid-cols-2 gap-4">
                    
                    <!-- Official Email Card -->
                    <div class="app-card p-4 sm:p-6 bg-white border border-slate-200 shadow-xs space-y-3" x-data="{ copied: false }">
                        <div class="w-10 h-10 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center border border-blue-100">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        </div>
                        <div>
                            <span class="text-[10px] font-black uppercase tracking-wider text-zinc-400">OFFICIAL EMAIL</span>
                            <h3 class="text-base font-bold text-zinc-950 pt-0.5">Direct Correspondence</h3>
                            <a href="mailto:{{ $primaryEmail }}" class="text-sm font-extrabold text-red-600 hover:underline block pt-1 break-all">
                                {{ $primaryEmail }}
                            </a>
                            <p class="text-xs text-zinc-500 pt-1 leading-relaxed">
                                {{ $company->email_note ?? 'For Line sheets, volume pricing, and customer inquiries.' }}
                            </p>
                        </div>
                        <button type="button" @click="navigator.clipboard.writeText('{{ $primaryEmail }}'); copied = true; setTimeout(() => copied = false, 2000)" 
                                class="inline-flex items-center gap-1.5 text-[11px] font-bold text-zinc-600 hover:text-zinc-950 pt-1">
                            <svg class="w-3.5 h-3.5 text-zinc-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3"/></svg>
                            <span x-text="copied ? 'Copied to clipboard!' : 'Copy Email Address'"></span>
                        </button>
                    </div>

                    <!-- Factory Hours Card -->
                    <div class="app-card p-4 sm:p-6 bg-white border border-slate-200 shadow-xs space-y-3">
                        <div class="w-10 h-10 rounded-xl bg-amber-50 text-amber-600 flex items-center justify-center border border-amber-100">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        </div>
                        <div>
                            <span class="text-[10px] font-black uppercase tracking-wider text-zinc-400">FACTORY TIMINGS</span>
                            <h3 class="text-base font-bold text-zinc-950 pt-0.5">Operating Hours</h3>
                            <p class="text-sm font-bold text-zinc-800 pt-1">
                                {{ $company->operating_hours ?? 'Sunday – Friday: 09:00 – 18:00' }}
                            </p>
                            <p class="text-xs text-zinc-500 pt-1 leading-relaxed">
                                {{ $company->operating_hours_note ?? 'Saturday: Factory Closed (Machinery Maintenance & Dispatch Prep)' }}
                            </p>
                        </div>
                    </div>

                </div>

                <!-- 3. BRANDED INTERACTIVE LEAFLET MAP WITH DYNAMIC FILAMENT PINS -->
                <div class="app-card p-4 sm:p-7 bg-white border border-slate-200 shadow-md space-y-4"
                     x-data="{
                         pins: {{ Js::from($company->map_pins ?? []) }},
                         activePinIndex: 0,
                         map: null,
                         markers: [],
                         init() {
                             this.$nextTick(() => {
                                 if (!document.getElementById('brand-contact-map')) return;

                                 const defaultCenter = (this.pins.length > 0 && this.pins[0].latitude) 
                                     ? [parseFloat(this.pins[0].latitude), parseFloat(this.pins[0].longitude)] 
                                     : [27.7125, 85.2850];

                                 this.map = L.map('brand-contact-map', {
                                     zoomControl: true,
                                     scrollWheelZoom: false,
                                     tap: false
                                 }).setView(defaultCenter, 14);

                                 // CartoDB Voyager Tiles (clean, non-clustered, light aesthetic)
                                 L.tileLayer('https://{s}.basemaps.cartocdn.com/rastertiles/voyager/{z}/{x}/{y}{r}.png', {
                                     attribution: '&copy; <a href=\'https://www.openstreetmap.org/copyright\'>OSM</a> &copy; <a href=\'https://carto.com/\'>CARTO</a>',
                                     subdomains: 'abcd',
                                     maxZoom: 19
                                 }).addTo(this.map);

                                 const bounds = [];

                                 this.pins.forEach((pin, index) => {
                                     if (pin.latitude && pin.longitude) {
                                         const latLng = [parseFloat(pin.latitude), parseFloat(pin.longitude)];
                                         bounds.push(latLng);

                                         const customIcon = L.divIcon({
                                             className: 'brand-map-pin',
                                             html: `<div class='relative flex items-center justify-center'>
                                                     <span class='absolute w-8 h-8 rounded-full bg-red-400 opacity-40 animate-ping'></span>
                                                     <div class='relative w-9 h-9 rounded-full bg-red-600 shadow-xl flex items-center justify-center border-2 border-white text-white'>
                                                         <svg class='w-4 h-4' fill='currentColor' viewBox='0 0 24 24'>
                                                             <path d='M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z'/>
                                                         </svg>
                                                     </div>
                                                 </div>`,
                                             iconSize: [36, 36],
                                             iconAnchor: [18, 36],
                                             popupAnchor: [0, -36]
                                         });

                                         const marker = L.marker(latLng, { icon: customIcon }).addTo(this.map);
                                         marker.bindPopup(`
                                             <div class='p-2.5 max-w-[240px] sm:max-w-xs space-y-1.5 font-sans'>
                                                 <div class='flex items-center gap-1.5'>
                                                     <span class='px-2 py-0.5 rounded-full bg-red-600 text-white text-[9px] font-black uppercase'>${pin.type || 'FACILITY'}</span>
                                                     ${pin.is_primary ? '<span class=\'px-2 py-0.5 rounded-full bg-zinc-900 text-white text-[9px] font-bold\'>PRIMARY</span>' : ''}
                                                 </div>
                                                 <h4 class='text-sm font-extrabold text-zinc-950 leading-tight'>${pin.title}</h4>
                                                 <p class='text-xs text-zinc-600 leading-snug'>${pin.address || ''}</p>
                                                 ${pin.phone ? `<a href='tel:${pin.phone}' class='text-xs text-red-600 font-bold block pt-0.5'>${pin.phone}</a>` : ''}
                                                 ${pin.google_maps_url ? `<a href='${pin.google_maps_url}' target='_blank' class='inline-block mt-1.5 px-3 py-1 bg-zinc-900 text-white text-[10px] font-bold rounded-full'>Open in Google Maps &rarr;</a>` : ''}
                                             </div>
                                         `);

                                         this.markers.push(marker);
                                     }
                                 });

                                 if (bounds.length > 1) {
                                     this.map.fitBounds(bounds, { padding: [40, 40], maxZoom: 15 });
                                 } else if (bounds.length === 1) {
                                     this.map.setView(bounds[0], 14);
                                 }

                                 // Open primary marker popup
                                 if (this.markers.length > 0) {
                                     setTimeout(() => this.markers[0].openPopup(), 400);
                                 }
                             });
                         },
                         selectPin(index) {
                             this.activePinIndex = index;
                             if (this.pins[index] && this.map) {
                                 const lat = parseFloat(this.pins[index].latitude);
                                 const lng = parseFloat(this.pins[index].longitude);
                                 this.map.flyTo([lat, lng], 15, { duration: 1.2 });
                                 if (this.markers[index]) {
                                     this.markers[index].openPopup();
                                 }
                             }
                         }
                     }">
                    
                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2">
                        <div>
                            <span class="text-[10px] font-black uppercase tracking-wider text-red-600">INTERACTIVE LOCATION MAP</span>
                            <h3 class="text-base sm:text-lg font-bold text-zinc-950">Official Facility & Office Pins</h3>
                        </div>
                        <span class="self-start sm:self-auto px-2.5 py-0.5 rounded-full bg-red-50 text-[10px] font-mono font-bold text-red-700 border border-red-200">
                            {{ count($company->map_pins ?? []) }} Verified Location{{ count($company->map_pins ?? []) > 1 ? 's' : '' }}
                        </span>
                    </div>

                    <!-- Dynamic Pin Switcher Tabs -->
                    @if(!empty($company->map_pins) && count($company->map_pins) > 1)
                        <div class="flex items-center gap-2 overflow-x-auto no-scrollbar pb-1 -mx-1 px-1">
                            @foreach($company->map_pins as $idx => $pin)
                                <button type="button" @click="selectPin({{ $idx }})"
                                        :class="activePinIndex === {{ $idx }} ? 'bg-red-600 text-white shadow-sm' : 'bg-zinc-100 text-zinc-700 hover:bg-zinc-200'"
                                        class="shrink-0 whitespace-nowrap px-3 py-1.5 rounded-full text-xs font-bold transition-all flex items-center gap-1.5">
                                    <span class="w-1.5 h-1.5 rounded-full" :class="activePinIndex === {{ $idx }} ? 'bg-white' : 'bg-red-600'"></span>
                                    <span>{{ $pin['title'] ?? 'Pin ' . ($idx + 1) }}</span>
                                    @if(!empty($pin['type']))
                                        <span class="opacity-75 text-[10px]">({{ $pin['type'] }})</span>
                                    @endif
                                </button>
                            @endforeach
                        </div>
                    @endif

                    <!-- Leaflet Map Container (Responsive Height for Mobile) -->
                    <div class="h-64 sm:h-80 md:h-[380px] w-full rounded-2xl overflow-hidden border border-zinc-200 relative bg-zinc-100 shadow-inner">
                        <div id="brand-contact-map" class="w-full h-full z-10"></div>
                        <div class="absolute bottom-2.5 left-2.5 right-2.5 sm:right-auto z-20 bg-white/95 backdrop-blur-md px-3 py-1.5 rounded-full border border-zinc-200 shadow-sm text-[10px] sm:text-[11px] font-bold text-zinc-800 flex items-center gap-1.5 pointer-events-none truncate">
                            <span class="w-2 h-2 rounded-full bg-red-600 animate-pulse shrink-0"></span>
                            <span class="truncate">{{ $company->primary_address ?? 'Sitapaila Factory Floor' }}</span>
                        </div>
                    </div>

                    <div class="pt-1 flex flex-col sm:flex-row sm:items-center justify-between gap-1 text-[11px] sm:text-xs text-zinc-500">
                        <span>Brand-styled map &bull; Drag to pan &bull; Pinch to zoom</span>
                        <a href="{{ route('stores') }}" class="font-bold text-red-600 hover:underline">
                            View all retail stores &rarr;
                        </a>
                    </div>
                </div>

            </div>

            <!-- Right: Direct Message Form (5 cols) -->
            <div class="lg:col-span-5"
                 :class="mobileTab === 'form' ? 'block' : 'hidden lg:block'"
                 x-data="{
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
                <div class="app-card p-4 sm:p-7 lg:p-8 bg-white border border-slate-200 shadow-xl space-y-5 sm:space-y-6 lg:sticky lg:top-8">
                    
                    <div class="space-y-1">
                        <span class="text-[10px] font-black uppercase tracking-wider text-red-600">DIRECT INQUIRY</span>
                        <h2 class="text-xl sm:text-2xl font-extrabold text-zinc-950 uppercase tracking-tight">Send Us a Message</h2>
                        <p class="text-xs text-zinc-500">
                            Sent directly to our team at <strong class="text-zinc-900">{{ $primaryEmail }}</strong>
                        </p>
                    </div>

                    <!-- Success Alert -->
                    <template x-if="success">
                        <div class="p-4 rounded-2xl bg-emerald-50 border border-emerald-200 text-emerald-900 space-y-2">
                            <div class="flex items-center gap-2 font-bold text-sm">
                                <svg class="w-5 h-5 text-emerald-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                <span>Inquiry Logged & Dispatched!</span>
                            </div>
                            <p class="text-xs text-emerald-800 leading-relaxed" x-text="successMessage"></p>
                            <div class="text-[11px] text-emerald-700 bg-white/70 p-2.5 rounded-xl border border-emerald-100 space-y-1">
                                <div class="flex items-center gap-1.5 font-semibold">
                                    <svg class="w-3.5 h-3.5 text-emerald-600 shrink-0" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 15l-5-5 1.41-1.41L11 14.17l7.59-7.59L20 8l-9 9z"/></svg>
                                    <span>Confirmation email sent to your inbox.</span>
                                </div>
                                <div class="flex items-center gap-1.5 font-semibold">
                                    <svg class="w-3.5 h-3.5 text-emerald-600 shrink-0" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 15l-5-5 1.41-1.41L11 14.17l7.59-7.59L20 8l-9 9z"/></svg>
                                    <span>Automated WhatsApp confirmation dispatched from our server.</span>
                                </div>
                            </div>
                        </div>
                    </template>

                    <!-- Error / Rate Limited Alert -->
                    <template x-if="error">
                        <div class="p-4 rounded-2xl space-y-1"
                             :class="isRateLimited ? 'bg-amber-50 border border-amber-300 text-amber-950' : 'bg-red-50 border border-red-200 text-red-900'">
                            <div class="flex items-center gap-2 font-bold text-sm">
                                <svg x-show="!isRateLimited" class="w-5 h-5 text-red-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                <svg x-show="isRateLimited" class="w-5 h-5 text-amber-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                <span x-text="isRateLimited ? 'Submission Limit (15 Min Threshold)' : 'Submission Notice'"></span>
                            </div>
                            <p class="text-xs leading-relaxed" :class="isRateLimited ? 'text-amber-900' : 'text-red-800'" x-text="error"></p>
                        </div>
                    </template>

                    <form @submit.prevent="submitForm()" class="space-y-4">
                        
                        <!-- Full Name -->
                        <div class="space-y-1">
                            <label class="block text-xs font-bold text-zinc-800 uppercase tracking-wider">Your Full Name <span class="text-red-600">*</span></label>
                            <input type="text" x-model="form.name" required placeholder="e.g. Ramesh Shrestha"
                                   class="w-full px-4 py-3 sm:py-2.5 rounded-xl border border-zinc-200 bg-zinc-50 text-base sm:text-sm font-medium text-zinc-900 focus:bg-white focus:border-red-600 focus:outline-none transition-colors">
                        </div>

                        <!-- Email Address -->
                        <div class="space-y-1">
                            <label class="block text-xs font-bold text-zinc-800 uppercase tracking-wider">Email Address <span class="text-red-600">*</span></label>
                            <input type="email" x-model="form.email" required placeholder="e.g. ramesh@store.com"
                                   class="w-full px-4 py-3 sm:py-2.5 rounded-xl border border-zinc-200 bg-zinc-50 text-base sm:text-sm font-medium text-zinc-900 focus:bg-white focus:border-red-600 focus:outline-none transition-colors">
                        </div>

                        <!-- Phone / WhatsApp Number -->
                        <div class="space-y-1">
                            <label class="block text-xs font-bold text-zinc-800 uppercase tracking-wider">Phone / WhatsApp Number</label>
                            <input type="tel" x-model="form.phone" placeholder="e.g. +977-9800000000"
                                   class="w-full px-4 py-3 sm:py-2.5 rounded-xl border border-zinc-200 bg-zinc-50 text-base sm:text-sm font-medium text-zinc-900 focus:bg-white focus:border-red-600 focus:outline-none transition-colors">
                        </div>

                        <!-- Inquiry Category -->
                        <div class="space-y-1">
                            <label class="block text-xs font-bold text-zinc-800 uppercase tracking-wider">Inquiry Topic</label>
                            <select x-model="form.subject" class="w-full px-4 py-3 sm:py-2.5 rounded-xl border border-zinc-200 bg-zinc-50 text-base sm:text-sm font-medium text-zinc-900 focus:bg-white focus:border-red-600 focus:outline-none transition-colors">
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
                                      class="w-full px-4 py-3 sm:py-2.5 rounded-xl border border-zinc-200 bg-zinc-50 text-base sm:text-sm font-medium text-zinc-900 focus:bg-white focus:border-red-600 focus:outline-none transition-colors resize-none"></textarea>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" :disabled="loading" 
                                class="w-full py-3.5 bg-red-600 hover:bg-red-700 text-white font-extrabold text-xs uppercase tracking-widest rounded-full transition-all shadow-lg shadow-red-600/30 flex items-center justify-center gap-2 active:scale-95 disabled:opacity-50">
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
