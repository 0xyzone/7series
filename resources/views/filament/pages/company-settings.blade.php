<x-filament-panels::page>
    <form wire:submit.prevent="save" class="space-y-8">
        
        {{-- Banner Overview --}}
        <div class="rounded-2xl bg-zinc-950 text-white p-6 border border-zinc-800 shadow-xl relative overflow-hidden">
            <div class="absolute -right-10 -bottom-10 w-48 h-48 bg-red-600/20 rounded-full blur-3xl pointer-events-none"></div>
            
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 relative z-10">
                <div class="space-y-1">
                    <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-red-600/20 text-red-400 text-xs font-mono font-bold tracking-wider uppercase border border-red-500/30">
                        <span class="w-2 h-2 rounded-full bg-red-500 animate-pulse"></span>
                        <span>DYNAMIC COMPANY SETTINGS & MAP PINS</span>
                    </span>
                    <h2 class="text-2xl font-black uppercase tracking-tight text-white pt-2">
                        Public Identity, Contact Details & Locations
                    </h2>
                    <p class="text-xs text-zinc-400 max-w-2xl">
                        Update official corporate info, factory location, customer correspondence channels, and multiple interactive map pins. All changes reflect instantly on the public Contact Us page.
                    </p>
                </div>

                <div class="shrink-0">
                    <button type="submit" wire:loading.attr="disabled"
                            class="inline-flex items-center gap-2 px-6 py-3 rounded-xl bg-red-600 hover:bg-red-700 text-white font-black text-xs uppercase tracking-wider shadow-lg shadow-red-600/30 transition-all hover:scale-105 active:scale-95 disabled:opacity-50">
                        <svg wire:loading.remove width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        <span wire:loading class="inline-block animate-spin w-4 h-4 border-2 border-white border-t-transparent rounded-full"></span>
                        <span wire:loading.remove>Save All Settings</span>
                        <span wire:loading>Saving...</span>
                    </button>
                </div>
            </div>
        </div>

        {{-- 2 Columns Grid: Identity & Contact Channels --}}
        <div class="grid lg:grid-cols-2 gap-6">
            
            {{-- Card 1: Corporate Identity & Communication --}}
            <div class="p-6 rounded-2xl bg-white dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-800 shadow-sm space-y-4">
                <div class="flex items-center gap-3 pb-3 border-b border-zinc-100 dark:border-zinc-800">
                    <div class="w-9 h-9 rounded-xl bg-red-50 dark:bg-red-950/50 text-red-600 flex items-center justify-center font-black">
                        7S
                    </div>
                    <div>
                        <h3 class="text-base font-extrabold text-zinc-950 dark:text-white">Corporate Identity & Inquiries</h3>
                        <p class="text-xs text-zinc-500">Official company name, correspondence email, and hotline.</p>
                    </div>
                </div>

                <div class="space-y-4 text-xs">
                    <div>
                        <label class="block font-bold text-zinc-700 dark:text-zinc-300 mb-1">Company Name</label>
                        <input type="text" wire:model="company_name" required
                               class="w-full px-3.5 py-2.5 rounded-xl border border-zinc-200 dark:border-zinc-700 bg-zinc-50 dark:bg-zinc-800 text-zinc-900 dark:text-white font-medium focus:bg-white focus:outline-none focus:ring-2 focus:ring-red-600">
                    </div>

                    <div>
                        <label class="block font-bold text-zinc-700 dark:text-zinc-300 mb-1">Brand Tagline</label>
                        <input type="text" wire:model="tagline"
                               class="w-full px-3.5 py-2.5 rounded-xl border border-zinc-200 dark:border-zinc-700 bg-zinc-50 dark:bg-zinc-800 text-zinc-900 dark:text-white font-medium focus:bg-white focus:outline-none focus:ring-2 focus:ring-red-600">
                    </div>

                    <div class="grid sm:grid-cols-2 gap-3">
                        <div>
                            <label class="block font-bold text-zinc-700 dark:text-zinc-300 mb-1">Official Email</label>
                            <input type="email" wire:model="primary_email" required
                                   class="w-full px-3.5 py-2.5 rounded-xl border border-zinc-200 dark:border-zinc-700 bg-zinc-50 dark:bg-zinc-800 text-zinc-900 dark:text-white font-medium focus:bg-white focus:outline-none focus:ring-2 focus:ring-red-600">
                        </div>
                        <div>
                            <label class="block font-bold text-zinc-700 dark:text-zinc-300 mb-1">Customer & Factory Phone</label>
                            <input type="text" wire:model="primary_phone" required
                                   class="w-full px-3.5 py-2.5 rounded-xl border border-zinc-200 dark:border-zinc-700 bg-zinc-50 dark:bg-zinc-800 text-zinc-900 dark:text-white font-medium focus:bg-white focus:outline-none focus:ring-2 focus:ring-red-600">
                        </div>
                    </div>

                    <div class="grid sm:grid-cols-2 gap-3">
                        <div>
                            <label class="block font-bold text-zinc-700 dark:text-zinc-300 mb-1">WhatsApp Dispatch Hotline</label>
                            <input type="text" wire:model="whatsapp_number"
                                   class="w-full px-3.5 py-2.5 rounded-xl border border-zinc-200 dark:border-zinc-700 bg-zinc-50 dark:bg-zinc-800 text-zinc-900 dark:text-white font-medium focus:bg-white focus:outline-none focus:ring-2 focus:ring-red-600">
                        </div>
                        <div>
                            <label class="block font-bold text-zinc-700 dark:text-zinc-300 mb-1">Email Helper Subtext</label>
                            <input type="text" wire:model="email_note"
                                   class="w-full px-3.5 py-2.5 rounded-xl border border-zinc-200 dark:border-zinc-700 bg-zinc-50 dark:bg-zinc-800 text-zinc-900 dark:text-white font-medium focus:bg-white focus:outline-none focus:ring-2 focus:ring-red-600">
                        </div>
                    </div>
                </div>
            </div>

            {{-- Card 2: Factory Physical Address & Timings --}}
            <div class="p-6 rounded-2xl bg-white dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-800 shadow-sm space-y-4">
                <div class="flex items-center gap-3 pb-3 border-b border-zinc-100 dark:border-zinc-800">
                    <div class="w-9 h-9 rounded-xl bg-blue-50 dark:bg-blue-950/50 text-blue-600 flex items-center justify-center font-black">
                        <svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-base font-extrabold text-zinc-950 dark:text-white">Manufacturing Plant & Timings</h3>
                        <p class="text-xs text-zinc-500">Physical factory address, freight navigation note, and hours.</p>
                    </div>
                </div>

                <div class="space-y-4 text-xs">
                    <div>
                        <label class="block font-bold text-zinc-700 dark:text-zinc-300 mb-1">Factory Street Address</label>
                        <input type="text" wire:model="primary_address" required
                               class="w-full px-3.5 py-2.5 rounded-xl border border-zinc-200 dark:border-zinc-700 bg-zinc-50 dark:bg-zinc-800 text-zinc-900 dark:text-white font-medium focus:bg-white focus:outline-none focus:ring-2 focus:ring-red-600">
                    </div>

                    <div class="grid sm:grid-cols-2 gap-3">
                        <div>
                            <label class="block font-bold text-zinc-700 dark:text-zinc-300 mb-1">City</label>
                            <input type="text" wire:model="city" required
                                   class="w-full px-3.5 py-2.5 rounded-xl border border-zinc-200 dark:border-zinc-700 bg-zinc-50 dark:bg-zinc-800 text-zinc-900 dark:text-white font-medium focus:bg-white focus:outline-none focus:ring-2 focus:ring-red-600">
                        </div>
                        <div>
                            <label class="block font-bold text-zinc-700 dark:text-zinc-300 mb-1">State / Region</label>
                            <input type="text" wire:model="state" required
                                   class="w-full px-3.5 py-2.5 rounded-xl border border-zinc-200 dark:border-zinc-700 bg-zinc-50 dark:bg-zinc-800 text-zinc-900 dark:text-white font-medium focus:bg-white focus:outline-none focus:ring-2 focus:ring-red-600">
                        </div>
                    </div>

                    <div>
                        <label class="block font-bold text-zinc-700 dark:text-zinc-300 mb-1">Directions & Freight Loading Note</label>
                        <input type="text" wire:model="directions_note"
                               class="w-full px-3.5 py-2.5 rounded-xl border border-zinc-200 dark:border-zinc-700 bg-zinc-50 dark:bg-zinc-800 text-zinc-900 dark:text-white font-medium focus:bg-white focus:outline-none focus:ring-2 focus:ring-red-600">
                    </div>

                    <div class="grid sm:grid-cols-2 gap-3">
                        <div>
                            <label class="block font-bold text-zinc-700 dark:text-zinc-300 mb-1">Operating Hours</label>
                            <input type="text" wire:model="operating_hours"
                                   class="w-full px-3.5 py-2.5 rounded-xl border border-zinc-200 dark:border-zinc-700 bg-zinc-50 dark:bg-zinc-800 text-zinc-900 dark:text-white font-medium focus:bg-white focus:outline-none focus:ring-2 focus:ring-red-600">
                        </div>
                        <div>
                            <label class="block font-bold text-zinc-700 dark:text-zinc-300 mb-1">Maintenance / Weekend Note</label>
                            <input type="text" wire:model="operating_hours_note"
                                   class="w-full px-3.5 py-2.5 rounded-xl border border-zinc-200 dark:border-zinc-700 bg-zinc-50 dark:bg-zinc-800 text-zinc-900 dark:text-white font-medium focus:bg-white focus:outline-none focus:ring-2 focus:ring-red-600">
                        </div>
                    </div>

                    <div>
                        <label class="block font-bold text-zinc-700 dark:text-zinc-300 mb-1">Direct Google Maps Navigation Link</label>
                        <input type="text" wire:model="google_maps_url" placeholder="https://maps.google.com/?q=..."
                               class="w-full px-3.5 py-2.5 rounded-xl border border-zinc-200 dark:border-zinc-700 bg-zinc-50 dark:bg-zinc-800 text-zinc-900 dark:text-white font-medium focus:bg-white focus:outline-none focus:ring-2 focus:ring-red-600">
                    </div>

                    <div>
                        <div class="flex items-center justify-between mb-1">
                            <label class="block font-bold text-zinc-700 dark:text-zinc-300">Google Maps API Key <span class="text-xs font-normal text-zinc-400">(Optional)</span></label>
                            <a href="https://console.cloud.google.com/google/maps-apis/credentials" target="_blank" class="text-[11px] font-bold text-red-600 hover:underline">
                                Get from Google Cloud Console &rarr;
                            </a>
                        </div>
                        <input type="text" wire:model="google_maps_api_key" placeholder="AIzaSy..."
                               class="w-full px-3.5 py-2.5 rounded-xl border border-zinc-200 dark:border-zinc-700 bg-zinc-50 dark:bg-zinc-800 text-zinc-900 dark:text-white font-mono text-xs focus:bg-white focus:outline-none focus:ring-2 focus:ring-red-600">
                        <p class="text-[11px] text-zinc-500 mt-1">
                            Optional. The public website currently uses Leaflet.js with CartoDB Voyager tiles (free, no quota limits, no credit card required). You only need a Google Maps API Key if you want Google-branded dynamic tiles or Google Places autocomplete.
                        </p>
                    </div>
                </div>
            </div>

        </div>

        {{-- Card 3: Dynamic Map Pins Management --}}
        <div class="p-6 rounded-2xl bg-white dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-800 shadow-sm space-y-6">
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 pb-4 border-b border-zinc-100 dark:border-zinc-800">
                <div class="flex items-center gap-3">
                    <div class="w-9 h-9 rounded-xl bg-emerald-50 dark:bg-emerald-950/50 text-emerald-600 flex items-center justify-center font-black">
                        <svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-base font-extrabold text-zinc-950 dark:text-white">Interactive Map Pins (Multiple Locations)</h3>
                        <p class="text-xs text-zinc-500">Configure pins shown on the interactive branded map. Set latitude/longitude and location badges.</p>
                    </div>
                </div>

                <button type="button" wire:click="addPin"
                        class="inline-flex items-center gap-1.5 px-4 py-2 rounded-xl bg-zinc-900 dark:bg-white text-white dark:text-zinc-900 hover:bg-red-600 dark:hover:bg-red-600 dark:hover:text-white text-xs font-bold transition-all shadow-sm">
                    <svg width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>
                    <span>Add New Map Location Pin</span>
                </button>
            </div>

            {{-- Pins List --}}
            <div class="space-y-4">
                @forelse($map_pins as $index => $pin)
                    <div class="p-5 rounded-2xl border {{ !empty($pin['is_primary']) ? 'border-red-500 bg-red-50/20 dark:bg-red-950/10' : 'border-zinc-200 dark:border-zinc-800 bg-zinc-50/50 dark:bg-zinc-800/40' }} space-y-4">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-2">
                                <span class="w-6 h-6 rounded-full bg-zinc-900 text-white flex items-center justify-center text-xs font-mono font-bold">
                                    {{ $index + 1 }}
                                </span>
                                <span class="font-extrabold text-sm text-zinc-900 dark:text-white">
                                    {{ $pin['title'] ?? 'Unnamed Pin' }}
                                </span>
                                @if(!empty($pin['is_primary']))
                                    <span class="px-2.5 py-0.5 rounded-full bg-red-600 text-white text-[10px] font-black uppercase tracking-wider">
                                        Primary Location
                                    </span>
                                @endif
                            </div>

                            <div class="flex items-center gap-2">
                                @if(empty($pin['is_primary']))
                                    <button type="button" wire:click="setPrimaryPin({{ $index }})" 
                                            class="text-[11px] font-bold text-zinc-600 hover:text-red-600 underline">
                                        Set as Primary
                                    </button>
                                @endif
                                <button type="button" wire:click="removePin({{ $index }})" 
                                        class="p-1.5 rounded-lg text-zinc-400 hover:text-red-600 hover:bg-red-50 dark:hover:bg-red-950 transition-colors"
                                        title="Delete this pin">
                                    <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-3 text-xs">
                            <div>
                                <label class="block font-bold text-zinc-700 dark:text-zinc-300 mb-1">Pin Title</label>
                                <input type="text" wire:model="map_pins.{{ $index }}.title" required
                                       class="w-full px-3 py-2 rounded-xl border border-zinc-200 dark:border-zinc-700 bg-white dark:bg-zinc-900 text-zinc-900 dark:text-white font-medium focus:outline-none focus:ring-1 focus:ring-red-600">
                            </div>
                            <div>
                                <label class="block font-bold text-zinc-700 dark:text-zinc-300 mb-1">Facility Type</label>
                                <input type="text" wire:model="map_pins.{{ $index }}.type" placeholder="e.g. Factory Plant, Showroom"
                                       class="w-full px-3 py-2 rounded-xl border border-zinc-200 dark:border-zinc-700 bg-white dark:bg-zinc-900 text-zinc-900 dark:text-white font-medium focus:outline-none focus:ring-1 focus:ring-red-600">
                            </div>
                            <div>
                                <label class="block font-bold text-zinc-700 dark:text-zinc-300 mb-1">Latitude</label>
                                <input type="number" step="any" wire:model="map_pins.{{ $index }}.latitude" required
                                       class="w-full px-3 py-2 rounded-xl border border-zinc-200 dark:border-zinc-700 bg-white dark:bg-zinc-900 text-zinc-900 dark:text-white font-mono font-medium focus:outline-none focus:ring-1 focus:ring-red-600">
                            </div>
                            <div>
                                <label class="block font-bold text-zinc-700 dark:text-zinc-300 mb-1">Longitude</label>
                                <input type="number" step="any" wire:model="map_pins.{{ $index }}.longitude" required
                                       class="w-full px-3 py-2 rounded-xl border border-zinc-200 dark:border-zinc-700 bg-white dark:bg-zinc-900 text-zinc-900 dark:text-white font-mono font-medium focus:outline-none focus:ring-1 focus:ring-red-600">
                            </div>
                        </div>

                        <div class="grid sm:grid-cols-3 gap-3 text-xs">
                            <div class="sm:col-span-2">
                                <label class="block font-bold text-zinc-700 dark:text-zinc-300 mb-1">Address / Landmark Details</label>
                                <input type="text" wire:model="map_pins.{{ $index }}.address"
                                       class="w-full px-3 py-2 rounded-xl border border-zinc-200 dark:border-zinc-700 bg-white dark:bg-zinc-900 text-zinc-900 dark:text-white font-medium focus:outline-none focus:ring-1 focus:ring-red-600">
                            </div>
                            <div>
                                <label class="block font-bold text-zinc-700 dark:text-zinc-300 mb-1">Direct Phone</label>
                                <input type="text" wire:model="map_pins.{{ $index }}.phone"
                                       class="w-full px-3 py-2 rounded-xl border border-zinc-200 dark:border-zinc-700 bg-white dark:bg-zinc-900 text-zinc-900 dark:text-white font-medium focus:outline-none focus:ring-1 focus:ring-red-600">
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="py-10 text-center border-2 border-dashed border-zinc-200 dark:border-zinc-800 rounded-2xl">
                        <p class="text-xs font-bold text-zinc-400">No custom pins added yet.</p>
                        <button type="button" wire:click="addPin" class="mt-2 text-xs font-extrabold text-red-600 hover:underline">
                            + Add Default Factory Pin
                        </button>
                    </div>
                @endforelse
            </div>
        </div>

        {{-- Bottom Sticky Save Bar --}}
        <div class="sticky bottom-4 z-20 flex justify-end">
            <button type="submit" wire:loading.attr="disabled"
                    class="inline-flex items-center gap-2.5 px-8 py-4 rounded-2xl bg-red-600 hover:bg-red-700 text-white font-black text-xs uppercase tracking-widest shadow-2xl shadow-red-600/40 transition-all hover:scale-105 active:scale-95 disabled:opacity-50">
                <svg wire:loading.remove width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
                </svg>
                <span wire:loading class="inline-block animate-spin w-4 h-4 border-2 border-white border-t-transparent rounded-full"></span>
                <span wire:loading.remove>Save All Company & Map Settings</span>
                <span wire:loading>Saving Settings...</span>
            </button>
        </div>

    </form>
</x-filament-panels::page>
