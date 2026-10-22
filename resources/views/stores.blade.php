<x-layout>
    <x-slot:title>Official Retail Stores & Store Locator | Seven Series Garment Industry</x-slot>

    <main class="min-h-screen pt-6 sm:pt-10 pb-32 sm:pb-36 px-3.5 sm:px-6 lg:px-10 xl:px-12 w-full max-w-full overflow-hidden space-y-8 sm:space-y-12"
          x-data="{
              search: '',
              selectedCity: 'all',
              stores: {{ Js::from($retailStores) }},
              factoryPins: {{ Js::from($company->map_pins ?? []) }},
              activeStoreId: null,
              map: null,
              markers: {},
              initMap() {
                  this.$nextTick(() => {
                      if (!document.getElementById('stores-map')) return;

                      // Default center: Kathmandu Valley
                      this.map = L.map('stores-map', {
                          zoomControl: true,
                          scrollWheelZoom: false
                      }).setView([27.7125, 85.3100], 12);

                      // Official Free Google Maps Tiles (No API key, no billing, no watermarks)
                      L.tileLayer('https://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}', {
                          maxZoom: 20,
                          subdomains: ['mt0', 'mt1', 'mt2', 'mt3'],
                          attribution: '&copy; <a href="https://maps.google.com" target="_blank" rel="noopener">Google Maps</a>'
                      }).addTo(this.map);

                      const createCustomIcon = (isFlagship = false) => {
                          const fill = isFlagship ? '#ED1C24' : '#18181B';
                          const ring = isFlagship ? '#FCA5A5' : '#D4D4D8';
                          return L.divIcon({
                              className: 'custom-store-pin',
                              html: `<div class='relative flex items-center justify-center'>
                                      <span class='absolute w-8 h-8 rounded-full opacity-40 animate-ping' style='background-color: ${ring};'></span>
                                      <div class='relative w-8 h-8 rounded-full shadow-lg flex items-center justify-center border-2 border-white text-white' style='background-color: ${fill};'>
                                          <svg class='w-4 h-4' fill='none' stroke='currentColor' viewBox='0 0 24 24'>
                                              <path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z'/>
                                              <path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M15 11a3 3 0 11-6 0 3 3 0 016 0z'/>
                                          </svg>
                                      </div>
                                  </div>`,
                              iconSize: [32, 32],
                              iconAnchor: [16, 32],
                              popupAnchor: [0, -32]
                          });
                      };

                      const bounds = [];

                      // Add Factory Pins from Company Settings
                      if (Array.isArray(this.factoryPins)) {
                          this.factoryPins.forEach((pin, index) => {
                              if (pin.latitude && pin.longitude) {
                                  const latLng = [parseFloat(pin.latitude), parseFloat(pin.longitude)];
                                  bounds.push(latLng);
                                  const marker = L.marker(latLng, { icon: createCustomIcon(true) }).addTo(this.map);
                                  marker.bindPopup(`
                                      <div class='p-3 max-w-xs space-y-2 font-sans'>
                                          <div class='flex items-center gap-2'>
                                              <span class='px-2 py-0.5 rounded-full bg-red-600 text-white text-[9px] font-black uppercase'>${pin.type || 'FACTORY'}</span>
                                              <span class='text-[10px] font-bold text-zinc-500'>Headquarters</span>
                                          </div>
                                          <h4 class='text-sm font-extrabold text-zinc-950 leading-tight'>${pin.title}</h4>
                                          <p class='text-xs text-zinc-600 leading-snug'>${pin.address || ''}</p>
                                          ${pin.phone ? `<a href='tel:${pin.phone}' class='text-xs text-red-600 font-bold block pt-1'>${pin.phone}</a>` : ''}
                                          ${pin.google_maps_url ? `<a href='${pin.google_maps_url}' target='_blank' class='inline-block mt-2 px-3 py-1 bg-zinc-900 text-white text-[10px] font-bold rounded-full'>Open in Google Maps &rarr;</a>` : ''}
                                      </div>
                                  `);
                                  this.markers['factory_' + index] = marker;
                              }
                          });
                      }

                      // Add Retail Stores
                      if (Array.isArray(this.stores)) {
                          this.stores.forEach((store) => {
                              if (store.latitude && store.longitude) {
                                  const latLng = [parseFloat(store.latitude), parseFloat(store.longitude)];
                                  bounds.push(latLng);
                                  const marker = L.marker(latLng, { icon: createCustomIcon(store.store_type === 'flagship') }).addTo(this.map);
                                  marker.bindPopup(`
                                      <div class='p-3 max-w-xs space-y-2 font-sans'>
                                          <div class='flex items-center gap-2'>
                                              <span class='px-2 py-0.5 rounded-full ${store.store_type === 'flagship' ? 'bg-red-600 text-white' : 'bg-zinc-800 text-white'} text-[9px] font-black uppercase'>${store.store_type || 'RETAIL'}</span>
                                              <span class='text-[10px] font-bold text-zinc-500'>${store.city}</span>
                                          </div>
                                          <h4 class='text-sm font-extrabold text-zinc-950 leading-tight'>${store.name}</h4>
                                          <p class='text-xs text-zinc-600 leading-snug'>${store.address}${store.landmark ? ` (Near ${store.landmark})` : ''}</p>
                                          ${store.phone ? `<a href='tel:${store.phone}' class='text-xs text-red-600 font-bold block pt-1'>${store.phone}</a>` : ''}
                                          ${store.google_maps_url ? `<a href='${store.google_maps_url}' target='_blank' class='inline-block mt-2 px-3 py-1 bg-red-600 text-white text-[10px] font-bold rounded-full'>Get Directions &rarr;</a>` : ''}
                                      </div>
                                  `);
                                  this.markers['store_' + store.id] = marker;
                              }
                          });
                      }

                      if (bounds.length > 0) {
                          this.map.fitBounds(bounds, { padding: [40, 40], maxZoom: 14 });
                      }
                  });
              },
              focusStore(id, lat, lng) {
                  this.activeStoreId = id;
                  if (this.map && lat && lng) {
                      this.map.flyTo([lat, lng], 16, { duration: 1.2 });
                      const key = 'store_' + id;
                      if (this.markers[key]) {
                          this.markers[key].openPopup();
                      }
                      document.getElementById('stores-map-section').scrollIntoView({ behavior: 'smooth', block: 'center' });
                  }
              },
              focusFactory(index, lat, lng) {
                  if (this.map && lat && lng) {
                      this.map.flyTo([lat, lng], 16, { duration: 1.2 });
                      const key = 'factory_' + index;
                      if (this.markers[key]) {
                          this.markers[key].openPopup();
                      }
                      document.getElementById('stores-map-section').scrollIntoView({ behavior: 'smooth', block: 'center' });
                  }
              },
              filteredStores() {
                  return this.stores.filter(store => {
                      const matchCity = this.selectedCity === 'all' || store.city.toLowerCase() === this.selectedCity.toLowerCase();
                      const query = this.search.trim().toLowerCase();
                      const matchSearch = !query || 
                          store.name.toLowerCase().includes(query) || 
                          (store.address && store.address.toLowerCase().includes(query)) ||
                          (store.landmark && store.landmark.toLowerCase().includes(query)) ||
                          (store.city && store.city.toLowerCase().includes(query));
                      return matchCity && matchSearch;
                  });
              }
          }"
          x-init="initMap()">

        <!-- ========================================================================= -->
        <!-- HEADER HERO SECTION -->
        <!-- ========================================================================= -->
        <section class="relative">
            <div class="app-card p-5 sm:p-8 lg:p-12 relative overflow-hidden bg-gradient-to-br from-white via-slate-50 to-red-50/20 border border-slate-200 shadow-xl">
                <div class="absolute -right-20 -top-20 w-96 h-96 bg-red-600/10 rounded-full blur-3xl pointer-events-none"></div>

                <div class="max-w-3xl space-y-4 relative z-10">
                    <div class="inline-flex items-center gap-2.5 px-3.5 py-1.5 rounded-full bg-slate-900 text-white text-xs font-black tracking-wider uppercase shadow-sm">
                        <span class="w-2 h-2 rounded-full bg-red-500 animate-pulse"></span>
                        <span>STORE LOCATOR & AUTHORIZED PARTNERS</span>
                        <span class="text-zinc-400 font-mono text-[10px]">NEPAL</span>
                    </div>

                    <h1 class="text-2xl sm:text-4xl lg:text-5xl font-extrabold tracking-tight text-zinc-950 uppercase leading-tight break-words">
                        EXPERIENCE SEVEN SERIES <br>
                        <span class="text-red-600">IN PERSON NEAR YOU.</span>
                    </h1>

                    <p class="text-zinc-600 text-base sm:text-lg leading-relaxed font-normal">
                        Step into our official flagship outlets and verified partner retailers to feel the heavyweight cotton fabric, find your custom fit, and buy authentic Nepalese denim.
                    </p>

                    <div class="pt-2 flex flex-wrap items-center gap-3">
                        <a href="#stores-map-section" class="px-5 py-2.5 rounded-full bg-red-600 hover:bg-red-700 text-white text-xs font-black uppercase tracking-wider transition-all shadow-md shadow-red-600/25">
                            View Interactive Map &darr;
                        </a>
                        <a href="{{ route('b2b') }}" class="px-5 py-2.5 rounded-full bg-zinc-900 hover:bg-zinc-800 text-white text-xs font-black uppercase tracking-wider transition-all shadow-sm">
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
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                    </div>
                    <input type="text" x-model="search" placeholder="Search by store name, address, or landmark..."
                           class="w-full pl-10 pr-4 py-2.5 rounded-2xl border border-zinc-200 bg-white text-sm font-medium text-zinc-900 placeholder-zinc-400 focus:outline-none focus:ring-2 focus:ring-red-600 focus:border-red-600 shadow-xs transition-all">
                </div>

                <!-- City Filters -->
                <div class="flex items-center gap-2 p-1.5 bg-zinc-100 rounded-2xl overflow-x-auto no-scrollbar">
                    <button type="button" @click="selectedCity = 'all'"
                            :class="selectedCity === 'all' ? 'bg-red-600 text-white shadow-sm' : 'text-zinc-700 hover:text-red-600'"
                            class="shrink-0 whitespace-nowrap px-4 py-2 rounded-xl text-xs font-bold transition-all">
                        All Outlets
                    </button>
                    @php
                        $cities = $retailStores->pluck('city')->unique()->filter()->values();
                    @endphp
                    @foreach($cities as $city)
                        <button type="button" @click="selectedCity = '{{ strtolower($city) }}'"
                                :class="selectedCity === '{{ strtolower($city) }}' ? 'bg-red-600 text-white shadow-sm' : 'text-zinc-700 hover:text-red-600'"
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
                <div class="flex items-center gap-3 text-xs font-bold text-zinc-500">
                    <span class="inline-flex items-center gap-1.5">
                        <span class="w-3 h-3 rounded-full bg-red-600"></span>
                        <span>Flagship / Factory</span>
                    </span>
                    <span class="inline-flex items-center gap-1.5">
                        <span class="w-3 h-3 rounded-full bg-zinc-900"></span>
                        <span>Authorized Stockist</span>
                    </span>
                </div>
            </div>

            <!-- Leaflet Container -->
            <div class="app-card overflow-hidden border border-zinc-200 shadow-md relative bg-zinc-100 rounded-2xl">
                <div id="stores-map" class="w-full h-80 sm:h-96 md:h-[420px] z-10"></div>
                <div class="p-3 bg-white border-t border-zinc-100 flex flex-wrap items-center justify-between gap-2 text-xs">
                    <span class="text-zinc-500">Scroll to zoom • Click any pin to view store contact details & directions</span>
                    <button type="button" @click="map && map.setView([27.7125, 85.3100], 12)" 
                            class="text-red-600 font-bold hover:underline">
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
                <span class="text-xs font-bold text-zinc-500" x-text="filteredStores().length + ' Stores Found'"></span>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                
                <!-- Main Factory Plant Card (Always Featured from Company Settings) -->
                @if(!empty($company->primary_address))
                    <div class="app-card p-5 sm:p-7 flex flex-col justify-between border-2 border-red-500/80 bg-red-50/20 relative overflow-hidden group">
                        <div class="space-y-4">
                            <div class="flex items-center justify-between">
                                <span class="px-3 py-1 rounded-full text-[10px] font-black uppercase tracking-wider bg-red-600 text-white shadow-xs">
                                    MANUFACTURING PLANT
                                </span>
                                <span class="text-xs font-bold text-zinc-600">{{ $company->city }}</span>
                            </div>

                            <div>
                                <h4 class="text-xl font-black text-zinc-950 group-hover:text-red-600 transition-colors">
                                    {{ $company->company_name }}
                                </h4>
                                <p class="text-zinc-700 text-sm mt-1 leading-relaxed font-medium">
                                    {{ $company->primary_address }}
                                    <span class="block text-xs text-zinc-500 mt-0.5">{{ $company->state }}</span>
                                </p>
                            </div>

                            <div class="space-y-2 pt-3 border-t border-red-200/60 text-xs text-zinc-700 font-medium">
                                @if(!empty($company->operating_hours))
                                    <div class="flex items-center gap-2">
                                        <svg class="w-4 h-4 text-red-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                        <span>{{ $company->operating_hours }}</span>
                                    </div>
                                @endif
                                @if(!empty($company->primary_phone))
                                    <div class="flex items-center gap-2">
                                        <svg class="w-4 h-4 text-red-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                                        <a href="tel:{{ $company->primary_phone }}" class="hover:text-red-600 font-bold underline">{{ $company->primary_phone }}</a>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="pt-6 flex items-center gap-2">
                            @if(!empty($company->google_maps_url))
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
                            <div class="flex items-center justify-between">
                                <span class="px-3 py-1 rounded-full text-[10px] font-black uppercase tracking-wider"
                                      :class="store.store_type === 'flagship' ? 'bg-red-600 text-white' : 'bg-red-50 text-red-600 border border-red-200'"
                                      x-text="(store.store_type || 'RETAIL').toUpperCase().replace('_', ' ')">
                                </span>
                                <span class="text-xs font-bold text-zinc-500" x-text="store.city"></span>
                            </div>

                            <div>
                                <h4 class="text-xl font-bold text-zinc-950 group-hover:text-red-600 transition-colors" x-text="store.name"></h4>
                                <p class="text-zinc-600 text-sm mt-1 leading-relaxed">
                                    <span x-text="store.address"></span>
                                    <template x-if="store.landmark">
                                        <span class="block text-xs text-zinc-400 mt-0.5 font-medium" x-text="'Near: ' + store.landmark"></span>
                                    </template>
                                </p>
                            </div>

                            <div class="space-y-2 pt-3 border-t border-zinc-100 text-xs text-zinc-600 font-medium">
                                <template x-if="store.operating_hours">
                                    <div class="flex items-center gap-2">
                                        <svg class="w-4 h-4 text-red-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                        <span x-text="store.operating_hours"></span>
                                    </div>
                                </template>
                                <template x-if="store.phone">
                                    <div class="flex items-center gap-2">
                                        <svg class="w-4 h-4 text-red-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                                        <a :href="'tel:' + store.phone" class="hover:text-red-600 font-bold underline" x-text="store.phone"></a>
                                    </div>
                                </template>
                            </div>
                        </div>

                        <div class="pt-6 flex items-center gap-2">
                            <template x-if="store.google_maps_url">
                                <a :href="store.google_maps_url" target="_blank" rel="noopener noreferrer" 
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
                <div class="app-card p-7 bg-zinc-950 text-white border-2 border-red-600 flex flex-col justify-between relative overflow-hidden">
                    <div class="absolute -right-10 -bottom-10 w-40 h-40 bg-red-600/25 rounded-full blur-2xl"></div>
                    
                    <div class="space-y-4 relative z-10">
                        <span class="inline-block px-3 py-1 rounded-full text-[10px] font-black uppercase tracking-wider bg-red-600 text-white">
                            BECOME AN AUTHORIZED STOCKIST
                        </span>

                        <div>
                            <h3 class="text-xl font-bold text-white">
                                Sell Seven Series in Your Store
                            </h3>
                            <p class="text-zinc-400 text-sm mt-2 leading-relaxed">
                                Do you have a clothing shop or multi-brand boutique in Nepal? Partner with Seven Series to stock authentic denim with verified wholesale prices and marketing assets.
                            </p>
                        </div>
                    </div>

                    <div class="pt-6 relative z-10">
                        <a href="{{ route('b2b') }}" class="w-full py-3.5 bg-red-600 hover:bg-red-700 text-white font-bold text-xs uppercase tracking-wider rounded-full text-center block transition-all shadow-lg shadow-red-600/30">
                            Apply for Wholesale Supply &rarr;
                        </a>
                    </div>
                </div>

            </div>
        </section>

    </main>

    <x-footer />
</x-layout>
