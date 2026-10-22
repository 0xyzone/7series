<x-filament-panels::page>
    <form wire:submit.prevent="save" class="space-y-10 lg:space-y-12 pb-24">
        
        {{-- Top Description & Action Banner with generous breathing room --}}
        <div class="rounded-3xl bg-gradient-to-r from-zinc-950 via-zinc-900 to-zinc-950 text-white p-8 sm:p-10 border border-zinc-800/80 shadow-2xl relative overflow-hidden">
            <div class="absolute -right-12 -bottom-12 w-64 h-64 bg-red-600/20 rounded-full blur-3xl pointer-events-none"></div>
            <div class="absolute left-1/2 top-0 w-96 h-32 bg-red-500/10 rounded-full blur-3xl pointer-events-none"></div>
            
            <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-6 relative z-10">
                <div class="space-y-3">
                    <div class="inline-flex items-center gap-2.5 px-3.5 py-1.5 rounded-full bg-red-600/20 text-red-400 text-xs font-mono font-bold tracking-wider uppercase border border-red-500/30">
                        <span class="w-2.5 h-2.5 rounded-full bg-red-500 animate-pulse"></span>
                        <span>COMPANY & PUBLIC CONTACT SETTINGS</span>
                    </div>
                    <h2 class="text-2xl sm:text-3xl font-black uppercase tracking-tight text-white pt-1">
                        Brand Identity, Factory Premises & Map Pins
                    </h2>
                    <p class="text-sm text-zinc-400 max-w-3xl leading-relaxed">
                        Control public contact details, manufacturing plant coordinates, operating hours, and interactive map pins displayed across the Contact Us page, footer, and store locator.
                    </p>
                </div>

                <div class="shrink-0 flex items-center gap-3 pt-2 lg:pt-0">
                    <x-filament::button type="submit" size="xl" color="primary" icon="heroicon-m-check">
                        <span wire:loading.remove wire:target="save">Save All Settings</span>
                        <span wire:loading wire:target="save">Saving...</span>
                    </x-filament::button>
                </div>
            </div>
        </div>

        {{-- 2-Column Grid: Section 1 & Section 2 with generous gaps --}}
        <div class="grid grid-cols-1 xl:grid-cols-2 gap-8 lg:gap-10 items-start">
            
            {{-- Section 1: Corporate Identity & Communications --}}
            <x-filament::section icon="heroicon-o-building-office-2">
                <x-slot name="heading">
                    Corporate Identity & Correspondence
                </x-slot>
                <x-slot name="description">
                    Official trading brand name, contact channels, and customer hotline numbers.
                </x-slot>

                <div class="space-y-6 pt-4">
                    {{-- Company Name --}}
                    <div class="space-y-2">
                        <label class="fi-fo-field-wrp-label inline-flex items-center gap-x-1.5 text-xs font-bold uppercase tracking-wider text-gray-700 dark:text-gray-300">
                            <span>Company Name</span>
                            <span class="text-danger-600 dark:text-danger-400 font-bold">*</span>
                        </label>
                        <x-filament::input.wrapper prefix-icon="heroicon-m-building-office">
                            <x-filament::input type="text" wire:model="company_name" required placeholder="Seven Series Garment Industry" />
                        </x-filament::input.wrapper>
                    </div>

                    {{-- Brand Tagline --}}
                    <div class="space-y-2">
                        <label class="fi-fo-field-wrp-label inline-flex items-center gap-x-1.5 text-xs font-bold uppercase tracking-wider text-gray-700 dark:text-gray-300">
                            <span>Brand Slogan / Tagline</span>
                        </label>
                        <x-filament::input.wrapper prefix-icon="heroicon-m-sparkles">
                            <x-filament::input type="text" wire:model="tagline" placeholder="Authentic Denim Clothing Brand & Garment Factory" />
                        </x-filament::input.wrapper>
                    </div>

                    {{-- Email & Phone Grid --}}
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 sm:gap-7">
                        <div class="space-y-2">
                            <label class="fi-fo-field-wrp-label inline-flex items-center gap-x-1.5 text-xs font-bold uppercase tracking-wider text-gray-700 dark:text-gray-300">
                                <span>Official Email</span>
                                <span class="text-danger-600 dark:text-danger-400 font-bold">*</span>
                            </label>
                            <x-filament::input.wrapper prefix-icon="heroicon-m-envelope">
                                <x-filament::input type="email" wire:model="primary_email" required placeholder="samparka@7series.com.np" />
                            </x-filament::input.wrapper>
                        </div>

                        <div class="space-y-2">
                            <label class="fi-fo-field-wrp-label inline-flex items-center gap-x-1.5 text-xs font-bold uppercase tracking-wider text-gray-700 dark:text-gray-300">
                                <span>Factory Hotline Phone</span>
                                <span class="text-danger-600 dark:text-danger-400 font-bold">*</span>
                            </label>
                            <x-filament::input.wrapper prefix-icon="heroicon-m-phone">
                                <x-filament::input type="text" wire:model="primary_phone" required placeholder="+977 9801234567" />
                            </x-filament::input.wrapper>
                        </div>
                    </div>

                    {{-- WhatsApp Hotline & Email Helper Note --}}
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 sm:gap-7">
                        <div class="space-y-2">
                            <label class="fi-fo-field-wrp-label inline-flex items-center gap-x-1.5 text-xs font-bold uppercase tracking-wider text-gray-700 dark:text-gray-300">
                                <span>WhatsApp Dispatch Number</span>
                            </label>
                            <x-filament::input.wrapper prefix-icon="heroicon-m-chat-bubble-left-right">
                                <x-filament::input type="text" wire:model="whatsapp_number" placeholder="+977 9801234567" />
                            </x-filament::input.wrapper>
                        </div>

                        <div class="space-y-2">
                            <label class="fi-fo-field-wrp-label inline-flex items-center gap-x-1.5 text-xs font-bold uppercase tracking-wider text-gray-700 dark:text-gray-300">
                                <span>Email Helper Subtext</span>
                            </label>
                            <x-filament::input.wrapper prefix-icon="heroicon-m-information-circle">
                                <x-filament::input type="text" wire:model="email_note" placeholder="For wholesale pricing and inquiries." />
                            </x-filament::input.wrapper>
                        </div>
                    </div>
                </div>
            </x-filament::section>

            {{-- Section 2: Physical Factory Premises & Timings --}}
            <x-filament::section icon="heroicon-o-map-pin">
                <x-slot name="heading">
                    Manufacturing Plant & Timings
                </x-slot>
                <x-slot name="description">
                    Physical factory location, industrial freight access, and operating hours.
                </x-slot>

                <div class="space-y-6 pt-4">
                    {{-- Primary Address --}}
                    <div class="space-y-2">
                        <label class="fi-fo-field-wrp-label inline-flex items-center gap-x-1.5 text-xs font-bold uppercase tracking-wider text-gray-700 dark:text-gray-300">
                            <span>Factory Street Address</span>
                            <span class="text-danger-600 dark:text-danger-400 font-bold">*</span>
                        </label>
                        <x-filament::input.wrapper prefix-icon="heroicon-m-map-pin">
                            <x-filament::input type="text" wire:model="primary_address" required placeholder="Near Padma Colony Main Entrance, Sitapaila" />
                        </x-filament::input.wrapper>
                    </div>

                    {{-- City & State --}}
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 sm:gap-7">
                        <div class="space-y-2">
                            <label class="fi-fo-field-wrp-label inline-flex items-center gap-x-1.5 text-xs font-bold uppercase tracking-wider text-gray-700 dark:text-gray-300">
                                <span>City</span>
                                <span class="text-danger-600 dark:text-danger-400 font-bold">*</span>
                            </label>
                            <x-filament::input.wrapper>
                                <x-filament::input type="text" wire:model="city" required placeholder="Kathmandu" />
                            </x-filament::input.wrapper>
                        </div>

                        <div class="space-y-2">
                            <label class="fi-fo-field-wrp-label inline-flex items-center gap-x-1.5 text-xs font-bold uppercase tracking-wider text-gray-700 dark:text-gray-300">
                                <span>State / Region</span>
                                <span class="text-danger-600 dark:text-danger-400 font-bold">*</span>
                            </label>
                            <x-filament::input.wrapper>
                                <x-filament::input type="text" wire:model="state" required placeholder="Bagmati Province, Nepal" />
                            </x-filament::input.wrapper>
                        </div>
                    </div>

                    {{-- Directions Note --}}
                    <div class="space-y-2">
                        <label class="fi-fo-field-wrp-label inline-flex items-center gap-x-1.5 text-xs font-bold uppercase tracking-wider text-gray-700 dark:text-gray-300">
                            <span>Directions & Freight Loading Note</span>
                        </label>
                        <x-filament::input.wrapper prefix-icon="heroicon-m-truck">
                            <x-filament::input type="text" wire:model="directions_note" placeholder="Easily accessible from Sitapaila Chowk, Ring Road. Direct freight bay." />
                        </x-filament::input.wrapper>
                    </div>

                    {{-- Operating Hours & Weekend Note --}}
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 sm:gap-7">
                        <div class="space-y-2">
                            <label class="fi-fo-field-wrp-label inline-flex items-center gap-x-1.5 text-xs font-bold uppercase tracking-wider text-gray-700 dark:text-gray-300">
                                <span>Operating Hours</span>
                            </label>
                            <x-filament::input.wrapper prefix-icon="heroicon-m-clock">
                                <x-filament::input type="text" wire:model="operating_hours" placeholder="Sunday – Friday: 09:00 – 18:00" />
                            </x-filament::input.wrapper>
                        </div>

                        <div class="space-y-2">
                            <label class="fi-fo-field-wrp-label inline-flex items-center gap-x-1.5 text-xs font-bold uppercase tracking-wider text-gray-700 dark:text-gray-300">
                                <span>Weekend / Maintenance Note</span>
                            </label>
                            <x-filament::input.wrapper prefix-icon="heroicon-m-wrench-screwdriver">
                                <x-filament::input type="text" wire:model="operating_hours_note" placeholder="Saturday: Factory Closed" />
                            </x-filament::input.wrapper>
                        </div>
                    </div>

                    {{-- Google Maps URL & API Key --}}
                    <div class="space-y-5 pt-2 border-t border-gray-100 dark:border-gray-800">
                        <div class="space-y-2">
                            <label class="fi-fo-field-wrp-label inline-flex items-center gap-x-1.5 text-xs font-bold uppercase tracking-wider text-gray-700 dark:text-gray-300">
                                <span>Direct Google Maps Navigation Link</span>
                            </label>
                            <x-filament::input.wrapper prefix-icon="heroicon-m-arrow-top-right-on-square">
                                <x-filament::input type="text" wire:model="google_maps_url" placeholder="https://maps.google.com/?q=Padma+Colony+Sitapaila+Kathmandu" />
                            </x-filament::input.wrapper>
                        </div>

                        <div class="space-y-2">
                            <div class="flex items-center justify-between">
                                <label class="fi-fo-field-wrp-label inline-flex items-center gap-x-1.5 text-xs font-bold uppercase tracking-wider text-gray-700 dark:text-gray-300">
                                    <span>Google Maps API Key <span class="text-[11px] font-normal lowercase text-gray-400 dark:text-gray-500">(optional)</span></span>
                                </label>
                                <a href="https://console.cloud.google.com/google/maps-apis/credentials" target="_blank" rel="noopener noreferrer" class="text-xs font-bold text-primary-600 dark:text-primary-400 hover:underline inline-flex items-center gap-1">
                                    <span>Google Cloud Console</span>
                                    <span>&rarr;</span>
                                </a>
                            </div>
                            <x-filament::input.wrapper prefix-icon="heroicon-m-key">
                                <x-filament::input type="text" wire:model="google_maps_api_key" placeholder="AIzaSy..." />
                            </x-filament::input.wrapper>
                            <p class="text-xs text-gray-500 dark:text-gray-400 leading-relaxed pt-1">
                                Optional. Leaflet.js with CartoDB Voyager tiles is enabled by default with zero quota limits and high performance.
                            </p>
                        </div>
                    </div>
                </div>
            </x-filament::section>

        </div>

        {{-- Section 3: Interactive Map Pins (Multiple Locations) with spacious cards --}}
        <x-filament::section icon="heroicon-o-map">
            <x-slot name="heading">
                Interactive Map Pins (Multiple Locations)
            </x-slot>
            <x-slot name="description">
                Manage location pins rendered on the interactive map. Visitors can switch between pins or view contact details.
            </x-slot>
            <x-slot name="headerEnd">
                <x-filament::button wire:click="addPin" type="button" size="md" icon="heroicon-m-plus" color="gray">
                    Add Location Pin
                </x-filament::button>
            </x-slot>

            <div class="space-y-8 pt-4">
                @forelse($map_pins as $index => $pin)
                    <div class="p-6 sm:p-8 rounded-2xl border {{ !empty($pin['is_primary']) ? 'border-primary-500/80 bg-primary-50/20 dark:bg-primary-950/20' : 'border-gray-200 dark:border-gray-800 bg-gray-50/50 dark:bg-gray-900/40' }} space-y-6 transition-all shadow-xs">
                        
                        {{-- Pin Header Card --}}
                        <div class="flex flex-wrap items-center justify-between gap-4 pb-4 border-b border-gray-200 dark:border-gray-800">
                            <div class="flex items-center gap-3">
                                <span class="w-7 h-7 rounded-full bg-gray-900 text-white dark:bg-gray-100 dark:text-gray-900 flex items-center justify-center text-xs font-mono font-bold shadow-xs">
                                    {{ $index + 1 }}
                                </span>
                                <span class="font-extrabold text-base text-gray-900 dark:text-white">
                                    {{ $pin['title'] ?? 'Unnamed Location Pin' }}
                                </span>
                                @if(!empty($pin['is_primary']))
                                    <x-filament::badge color="primary">
                                        Primary Location
                                    </x-filament::badge>
                                @endif
                            </div>

                            <div class="flex items-center gap-3">
                                @if(empty($pin['is_primary']))
                                    <x-filament::button wire:click="setPrimaryPin({{ $index }})" type="button" size="xs" color="gray">
                                        Make Primary
                                    </x-filament::button>
                                @endif
                                <x-filament::button wire:click="removePin({{ $index }})" type="button" size="xs" color="danger" icon="heroicon-m-trash">
                                    Remove Pin
                                </x-filament::button>
                            </div>
                        </div>

                        {{-- Pin Form Row 1: Title & Type --}}
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 sm:gap-7">
                            <div class="space-y-2">
                                <label class="fi-fo-field-wrp-label inline-flex items-center gap-x-1.5 text-xs font-bold uppercase tracking-wider text-gray-700 dark:text-gray-300">
                                    <span>Pin Title</span>
                                    <span class="text-danger-600 dark:text-danger-400 font-bold">*</span>
                                </label>
                                <x-filament::input.wrapper prefix-icon="heroicon-m-tag">
                                    <x-filament::input type="text" wire:model="map_pins.{{ $index }}.title" required placeholder="e.g. Sitapaila Manufacturing Plant" />
                                </x-filament::input.wrapper>
                            </div>

                            <div class="space-y-2">
                                <label class="fi-fo-field-wrp-label inline-flex items-center gap-x-1.5 text-xs font-bold uppercase tracking-wider text-gray-700 dark:text-gray-300">
                                    <span>Facility Type</span>
                                </label>
                                <x-filament::input.wrapper prefix-icon="heroicon-m-building-office">
                                    <x-filament::input type="text" wire:model="map_pins.{{ $index }}.type" placeholder="e.g. Factory, Showroom, Central Warehouse" />
                                </x-filament::input.wrapper>
                            </div>
                        </div>

                        {{-- Pin Form Row 2: Latitude & Longitude --}}
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 sm:gap-7">
                            <div class="space-y-2">
                                <label class="fi-fo-field-wrp-label inline-flex items-center gap-x-1.5 text-xs font-bold uppercase tracking-wider text-gray-700 dark:text-gray-300">
                                    <span>Latitude</span>
                                    <span class="text-danger-600 dark:text-danger-400 font-bold">*</span>
                                </label>
                                <x-filament::input.wrapper prefix-icon="heroicon-m-globe-alt">
                                    <x-filament::input type="number" step="any" wire:model="map_pins.{{ $index }}.latitude" required placeholder="27.7125" />
                                </x-filament::input.wrapper>
                            </div>

                            <div class="space-y-2">
                                <label class="fi-fo-field-wrp-label inline-flex items-center gap-x-1.5 text-xs font-bold uppercase tracking-wider text-gray-700 dark:text-gray-300">
                                    <span>Longitude</span>
                                    <span class="text-danger-600 dark:text-danger-400 font-bold">*</span>
                                </label>
                                <x-filament::input.wrapper prefix-icon="heroicon-m-globe-alt">
                                    <x-filament::input type="number" step="any" wire:model="map_pins.{{ $index }}.longitude" required placeholder="85.2850" />
                                </x-filament::input.wrapper>
                            </div>
                        </div>

                        {{-- Pin Form Row 3: Landmark Address & Direct Phone --}}
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 sm:gap-7">
                            <div class="sm:col-span-2 space-y-2">
                                <label class="fi-fo-field-wrp-label inline-flex items-center gap-x-1.5 text-xs font-bold uppercase tracking-wider text-gray-700 dark:text-gray-300">
                                    <span>Address / Landmark Details</span>
                                </label>
                                <x-filament::input.wrapper prefix-icon="heroicon-m-map-pin">
                                    <x-filament::input type="text" wire:model="map_pins.{{ $index }}.address" placeholder="Near Padma Colony Main Gate, Sitapaila, Kathmandu" />
                                </x-filament::input.wrapper>
                            </div>

                            <div class="space-y-2">
                                <label class="fi-fo-field-wrp-label inline-flex items-center gap-x-1.5 text-xs font-bold uppercase tracking-wider text-gray-700 dark:text-gray-300">
                                    <span>Direct Phone Number</span>
                                </label>
                                <x-filament::input.wrapper prefix-icon="heroicon-m-phone">
                                    <x-filament::input type="text" wire:model="map_pins.{{ $index }}.phone" placeholder="+977 9801234567" />
                                </x-filament::input.wrapper>
                            </div>
                        </div>

                    </div>
                @empty
                    <div class="py-14 text-center border-2 border-dashed border-gray-200 dark:border-gray-800 rounded-3xl">
                        <div class="w-12 h-12 mx-auto rounded-full bg-gray-100 dark:bg-gray-800 flex items-center justify-center text-gray-400 mb-3">
                            <x-filament::icon icon="heroicon-o-map-pin" class="w-6 h-6" />
                        </div>
                        <p class="text-sm font-bold text-gray-600 dark:text-gray-300">No custom pins added yet.</p>
                        <p class="text-xs text-gray-400 mt-1">Add branch showrooms, regional warehouses, or depot locations.</p>
                        <x-filament::button wire:click="addPin" type="button" size="md" color="primary" class="mt-4">
                            Add Default Factory Pin
                        </x-filament::button>
                    </div>
                @endforelse
            </div>
        </x-filament::section>

        {{-- Bottom Spacious Floating Save Bar with Backdrop Blur --}}
        <div class="sticky bottom-6 z-20 flex items-center justify-between p-4 sm:p-5 rounded-2xl bg-white/90 dark:bg-zinc-900/90 backdrop-blur-xl border border-gray-200/80 dark:border-zinc-800/80 shadow-2xl">
            <div class="hidden sm:flex items-center gap-2.5 text-xs text-gray-600 dark:text-gray-400">
                <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                <span>All company information and map pins synchronize instantly to the live website.</span>
            </div>
            <div class="w-full sm:w-auto flex justify-end">
                <x-filament::button type="submit" size="xl" color="primary" icon="heroicon-m-check" class="shadow-xl">
                    <span wire:loading.remove wire:target="save">Save All Settings</span>
                    <span wire:loading wire:target="save">Saving Settings...</span>
                </x-filament::button>
            </div>
        </div>

    </form>
</x-filament-panels::page>
