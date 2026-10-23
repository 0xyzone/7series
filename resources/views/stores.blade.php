<x-layout>
    <x-slot:title>Official Retail Stores & Store Locator | Seven Series Garment Industry</x-slot>
    <style>
        .compact-store-popup .leaflet-popup-content-wrapper {
            border-radius: 14px !important;
            padding: 0 !important;
            box-shadow: 0 10px 25px -4px rgba(0, 0, 0, 0.25), 0 4px 6px -2px rgba(0, 0, 0, 0.1) !important;
            border: 1px solid rgba(0, 0, 0, 0.08) !important;
            overflow: hidden !important;
        }
        .compact-store-popup .leaflet-popup-content {
            margin: 8px 10px !important;
            line-height: 1.3 !important;
            max-width: 220px !important;
        }
        .compact-store-popup .leaflet-popup-tip-container {
            margin-top: -1px !important;
        }
        .compact-store-popup a.leaflet-popup-close-button {
            top: 5px !important;
            right: 5px !important;
            padding: 2px !important;
            color: #71717a !important;
            font-size: 15px !important;
            line-height: 12px !important;
            width: 16px !important;
            height: 16px !important;
            border-radius: 9999px !important;
            background: rgba(0, 0, 0, 0.06) !important;
        }
        .compact-store-popup a.leaflet-popup-close-button:hover {
            color: #e51e2b !important;
            background: rgba(229, 30, 43, 0.15) !important;
        }
        @media (max-width: 640px) {
            .compact-store-popup .leaflet-popup-content {
                margin: 7px 9px !important;
                max-width: 200px !important;
            }
        }
    </style>


    <script>
        if (!window.storesLocator) {
            window.storesLocator = function(stores, factoryPins) {
                return {
                    search: '',
                    selectedCity: 'all',
                    stores: stores || [],
                    factoryPins: factoryPins || [],
                    activeStoreId: null,
                    map: null,
                    markers: {},
                    isMapReady: false,
                    initMap() {
                        const wait = setInterval(() => {
                            if (window.createStoresLocatorEngine) {
                                clearInterval(wait);
                                const real = window.createStoresLocatorEngine(this.stores, this.factoryPins);
                                Object.assign(this, real);
                                this.mountMap();
                            }
                        }, 40);
                    },
                    resetMap() { if (this.map) this.map.setView([27.7125, 85.3100], 12); },
                    focusStore(id, lat, lng) {
                        this.activeStoreId = id;
                        if (this.map && lat && lng) this.map.flyTo([lat, lng], 16);
                    },
                    focusFactory(idx, lat, lng) {
                        if (this.map && lat && lng) this.map.flyTo([lat, lng], 16);
                    },
                    filteredStores() {
                        return (this.stores || []).filter(store => {
                            const matchCity = this.selectedCity === 'all' || (store.city && store.city.toLowerCase() === this.selectedCity.toLowerCase());
                            const query = (this.search || '').trim().toLowerCase();
                            const matchSearch = !query || 
                                (store.name && store.name.toLowerCase().includes(query)) || 
                                (store.address && store.address.toLowerCase().includes(query)) ||
                                (store.city && store.city.toLowerCase().includes(query));
                            return matchCity && matchSearch;
                        });
                    }
                };
            };
        }
    </script>

    <main
        class="min-h-screen pt-6 sm:pt-10 pb-32 sm:pb-36 px-3.5 sm:px-6 lg:px-10 xl:px-12 w-full max-w-full overflow-hidden space-y-8 sm:space-y-12"
        x-data="storesLocator({{ Js::from($retailStores) }}, {{ Js::from($company->map_pins ?? []) }})"
        x-init="initMap()">

        <!-- ========================================================================= -->
        <!-- HEADER HERO SECTION -->
        <!-- ========================================================================= -->
        <section class="relative">
            <div
                class="app-card p-5 sm:p-8 lg:p-12 relative overflow-hidden bg-gradient-to-br from-white via-slate-50 to-red-50/20 border border-slate-200 shadow-xl">
                <div
                    class="absolute -right-20 -top-20 w-96 h-96 bg-red-600/10 rounded-full blur-3xl pointer-events-none">
                </div>

                <div class="max-w-3xl space-y-4 relative z-10">
                    <div
                        class="inline-flex items-center gap-2.5 px-3.5 py-1.5 rounded-full bg-slate-900 text-white text-xs font-black tracking-wider uppercase shadow-sm">
                        <span class="w-2 h-2 rounded-full bg-red-500 animate-pulse"></span>
                        <span>STORE LOCATOR & AUTHORIZED PARTNERS</span>
                        <span class="text-zinc-400 font-mono text-[10px]">NEPAL</span>
                    </div>

                    <h1
                        class="text-2xl sm:text-4xl lg:text-5xl font-extrabold tracking-tight text-zinc-950 uppercase leading-tight break-words">
                        EXPERIENCE SEVEN SERIES <br>
                        <span class="text-red-600">IN PERSON NEAR YOU.</span>
                    </h1>

                    <p class="text-zinc-600 text-base sm:text-lg leading-relaxed font-normal">
                        Step into our official flagship outlets and verified partner retailers to feel the heavyweight
                        cotton fabric, find your custom fit, and buy authentic Nepalese denim.
                    </p>

                    <div class="pt-2 flex flex-wrap items-center gap-3">
                        <a href="#stores-map-section"
                            class="px-5 py-2.5 rounded-full bg-red-600 hover:bg-red-700 text-white text-xs font-black uppercase tracking-wider transition-all shadow-md shadow-red-600/25">
                            View Interactive Map &darr;
                        </a>
                        <a href="{{ route('b2b') }}"
                            class="px-5 py-2.5 rounded-full bg-zinc-900 hover:bg-zinc-800 text-white text-xs font-black uppercase tracking-wider transition-all shadow-sm">
                            Become a Retail Partner &rarr;
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- ========================================================================= -->
        <!-- SEARCH & CITY FILTER PILLS -->
        <!-- ========================================================================= -->
        <section class="space-y-4">
            <div class="flex flex-col md:flex-row items-stretch md:items-center justify-between gap-4">

                <!-- Search Box -->
                <div class="relative flex-1 max-w-md">
                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-zinc-400">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                    <input type="text" x-model="search" placeholder="Search by store name, address, or landmark..."
                        class="w-full pl-10 pr-4 py-2.5 rounded-2xl border border-zinc-200 bg-white text-sm font-medium text-zinc-900 placeholder-zinc-400 focus:outline-none focus:ring-2 focus:ring-red-600 focus:border-red-600 shadow-xs transition-all">
                </div>

                <!-- City Filters -->
                <div class="flex items-center gap-2 p-1.5 bg-zinc-100 rounded-2xl overflow-x-auto no-scrollbar">
                    <button type="button" @click="selectedCity = 'all'"
                        :class="selectedCity === 'all' ? 'bg-red-600 text-white shadow-sm' :
                            'text-zinc-700 hover:text-red-600'"
                        class="shrink-0 whitespace-nowrap px-4 py-2 rounded-xl text-xs font-bold transition-all">
                        All Outlets
                    </button>
                    @php
                        $cities = $retailStores->pluck('city')->unique()->filter()->values();
                    @endphp
                    @foreach ($cities as $city)
                        <button type="button" @click="selectedCity = '{{ strtolower($city) }}'"
                            :class="selectedCity === '{{ strtolower($city) }}' ? 'bg-red-600 text-white shadow-sm' :
                                'text-zinc-700 hover:text-red-600'"
                            class="shrink-0 whitespace-nowrap px-4 py-2 rounded-xl text-xs font-bold transition-all">
                            {{ $city }}
                        </button>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- ========================================================================= -->
        <!-- INTERACTIVE BRAND MAP SECTION -->
        <!-- ========================================================================= -->
        <section id="stores-map-section" class="space-y-3">
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2">
                <div>
                    <span class="text-[10px] font-black uppercase tracking-wider text-red-600">GEOGRAPHIC MAP</span>
                    <h2 class="text-xl sm:text-2xl font-extrabold text-zinc-950">Store & Factory Pin Locations</h2>
                </div>
                <div class="flex flex-wrap items-center gap-2.5 text-xs font-bold text-zinc-600">
                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-red-50 text-red-700 border border-red-200 text-[11px]">
                        <span class="w-2.5 h-2.5 rounded-full bg-red-600"></span>
                        <span>Flagship / Factory</span>
                        <span class="text-amber-500 font-bold">★</span>
                    </span>
                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-zinc-100 text-zinc-800 border border-zinc-200 text-[11px]">
                        <span class="w-2.5 h-2.5 rounded-full bg-zinc-900"></span>
                        <span>Authorized Stockist</span>
                    </span>
                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-blue-50 text-blue-700 border border-blue-200 text-[11px]">
                        <svg class="w-3 h-3 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                        <span>Live Route</span>
                    </span>
                </div>
            </div>

            <!-- Leaflet Container -->
            <div class="app-card overflow-hidden border border-zinc-200 shadow-md relative bg-zinc-100 rounded-2xl brand-2d-map">
                <div id="stores-map" class="w-full h-[400px] sm:h-96 md:h-[440px] z-10"></div>
                <div
                    class="p-3 bg-white border-t border-zinc-100 flex flex-wrap items-center justify-between gap-2 text-xs">
                    <span class="text-zinc-500 flex items-center gap-1.5">
                        <span class="w-2 h-2 rounded-full bg-emerald-500 shrink-0"></span>
                        <span>Clean 2D Map • Scroll to zoom • Click any pin to view store contact details & directions</span>
                    </span>
                    <button type="button" @click="resetMap()"
                        class="text-red-600 hover:text-red-700 font-bold hover:underline transition-colors">
                        Reset Map View
                    </button>
                </div>
            </div>
        </section>

        <!-- ========================================================================= -->
        <!-- STORES GRID -->
        <!-- ========================================================================= -->
        <section class="space-y-6">
            <div class="flex items-center justify-between">
                <div>
                    <span class="text-[10px] font-black uppercase tracking-wider text-red-600">RETAIL DIRECTORY</span>
                    <h3 class="text-2xl font-extrabold text-zinc-950">Available Store Locations</h3>
                </div>
                <span class="text-xs font-bold text-zinc-500"
                    x-text="filteredStores().length + ' Stores Found'"></span>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                <!-- Main Factory Plant Card (Always Featured from Company Settings) -->
                @if (!empty($company->primary_address))
                    <div
                        class="app-card p-5 sm:p-7 flex flex-col justify-between border-2 border-red-500/80 bg-red-50/20 relative overflow-hidden group">
                        <div class="space-y-4">
                            <div class="flex items-center justify-between">
                                <span
                                    class="px-3 py-1 rounded-full text-[10px] font-black uppercase tracking-wider bg-red-600 text-white shadow-xs">
                                    MANUFACTURING PLANT
                                </span>
                                <span class="text-xs font-bold text-zinc-600">{{ $company->city }}</span>
                            </div>

                            <div>
                                <h4
                                    class="text-xl font-black text-zinc-950 group-hover:text-red-600 transition-colors">
                                    {{ $company->company_name }}
                                </h4>
                                <p class="text-zinc-700 text-sm mt-1 leading-relaxed font-medium">
                                    {{ $company->primary_address }}
                                    <span class="block text-xs text-zinc-500 mt-0.5">{{ $company->state }}</span>
                                </p>
                            </div>

                            <div class="space-y-2 pt-3 border-t border-red-200/60 text-xs text-zinc-700 font-medium">
                                @if (!empty($company->operating_hours))
                                    <div class="flex items-center gap-2">
                                        <svg class="w-4 h-4 text-red-600 shrink-0" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        <span>{{ $company->operating_hours }}</span>
                                    </div>
                                @endif
                                @if (!empty($company->primary_phone))
                                    <div class="flex items-center gap-2">
                                        <svg class="w-4 h-4 text-red-600 shrink-0" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                        </svg>
                                        <a href="tel:{{ $company->primary_phone }}"
                                            class="hover:text-red-600 font-bold underline">{{ $company->primary_phone }}</a>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="pt-6 flex items-center gap-2">
                            @if (!empty($company->google_maps_url))
                                <a href="{{ $company->google_maps_url }}" target="_blank" rel="noopener noreferrer"
                                    class="flex-1 py-2.5 bg-red-600 hover:bg-red-700 text-white font-bold text-xs uppercase tracking-wider rounded-full text-center block transition-all shadow-sm">
                                    Google Maps &rarr;
                                </a>
                            @endif
                            <button type="button" @click="focusFactory(0, 27.7125, 85.2850)"
                                class="px-4 py-2.5 rounded-full border border-red-300 text-xs font-bold text-red-700 hover:bg-red-100/70 transition-colors">
                                Pin on Map
                            </button>
                        </div>
                    </div>
                @endif

                <!-- Dynamic Retail Stores Loop -->
                <template x-for="store in filteredStores()" :key="store.id">
                    <div class="app-card p-5 sm:p-7 flex flex-col justify-between group transition-all"
                        :class="activeStoreId === store.id ? 'ring-2 ring-red-600 bg-red-50/10' : ''">

                        <div class="space-y-4">
                            <template x-if="store.image_url || store.image">
                                <div class="relative h-44 -mx-5 -mt-5 sm:-mx-7 sm:-mt-7 mb-4 overflow-hidden rounded-t-2xl bg-zinc-100 border-b border-zinc-100">
                                    <img :src="store.image_url || (store.image.startsWith('http') || store.image.startsWith('images/') ? store.image : '/storage/' + store.image)"
                                        :alt="store.name"
                                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/25 via-transparent to-transparent"></div>
                                </div>
                            </template>

                            <div class="flex items-center justify-between">
                                <span class="px-3 py-1 rounded-full text-[10px] font-black uppercase tracking-wider"
                                    :class="store.store_type === 'flagship' ? 'bg-red-600 text-white' :
                                        'bg-red-50 text-red-600 border border-red-200'"
                                    x-text="(store.store_type || 'RETAIL').toUpperCase().replace('_', ' ')">
                                </span>
                                <span class="text-xs font-bold text-zinc-500" x-text="store.city"></span>
                            </div>

                            <div>
                                <h4 class="text-xl font-bold text-zinc-950 group-hover:text-red-600 transition-colors"
                                    x-text="store.name"></h4>
                                <p class="text-zinc-600 text-sm mt-1 leading-relaxed">
                                    <span x-text="store.address"></span>
                                    <template x-if="store.landmark">
                                        <span class="block text-xs text-zinc-400 mt-0.5 font-medium"
                                            x-text="'Near: ' + store.landmark"></span>
                                    </template>
                                </p>
                            </div>

                            <div class="space-y-2 pt-3 border-t border-zinc-100 text-xs text-zinc-600 font-medium">
                                <template x-if="store.operating_hours">
                                    <div class="flex items-center gap-2">
                                        <svg class="w-4 h-4 text-red-600 shrink-0" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        <span x-text="store.operating_hours"></span>
                                    </div>
                                </template>
                                <template x-if="store.phone">
                                    <div class="flex items-center gap-2">
                                        <svg class="w-4 h-4 text-red-600 shrink-0" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                        </svg>
                                        <a :href="'tel:' + store.phone" class="hover:text-red-600 font-bold underline"
                                            x-text="store.phone"></a>
                                    </div>
                                </template>
                            </div>
                        </div>

                        <div class="pt-6 flex items-center gap-2">
                            <template x-if="store.google_maps_url || (store.latitude && store.longitude)">
                                <a :href="store.google_maps_url || ('https://www.google.com/maps/dir/?api=1&destination=' + store.latitude + ',' + store.longitude)" target="_blank" rel="noopener noreferrer"
                                    class="flex-1 py-2.5 bg-zinc-100 hover:bg-red-600 hover:text-white text-zinc-900 font-bold text-xs uppercase tracking-wider rounded-full text-center block transition-all shadow-xs">
                                    Open Maps &rarr;
                                </a>
                            </template>
                            <template x-if="store.latitude && store.longitude">
                                <button type="button" @click="focusStore(store.id, store.latitude, store.longitude)"
                                    class="px-4 py-2.5 rounded-full border border-zinc-200 text-xs font-bold text-zinc-700 hover:text-red-600 hover:border-red-300 transition-colors">
                                    Pin
                                </button>
                            </template>
                        </div>

                    </div>
                </template>

                <!-- B2B Stockist Partner Card -->
                <div
                    class="app-card p-7 bg-zinc-950 text-white border-2 border-red-600 flex flex-col justify-between relative overflow-hidden">
                    <div class="absolute -right-10 -bottom-10 w-40 h-40 bg-red-600/25 rounded-full blur-2xl"></div>

                    <div class="space-y-4 relative z-10">
                        <span
                            class="inline-block px-3 py-1 rounded-full text-[10px] font-black uppercase tracking-wider bg-red-600 text-white">
                            BECOME AN AUTHORIZED STOCKIST
                        </span>

                        <div>
                            <h3 class="text-xl font-bold text-white">
                                Sell Seven Series in Your Store
                            </h3>
                            <p class="text-zinc-400 text-sm mt-2 leading-relaxed">
                                Do you have a clothing shop or multi-brand boutique in Nepal? Partner with Seven Series
                                to stock authentic denim with verified wholesale prices and marketing assets.
                            </p>
                        </div>
                    </div>

                    <div class="pt-6 relative z-10">
                        <a href="{{ route('b2b') }}"
                            class="w-full py-3.5 bg-red-600 hover:bg-red-700 text-white font-bold text-xs uppercase tracking-wider rounded-full text-center block transition-all shadow-lg shadow-red-600/30">
                            Apply for Wholesale Supply &rarr;
                        </a>
                    </div>
                </div>

            </div>
        </section>

    </main>

    <x-footer />
</x-layout>
