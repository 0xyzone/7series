<x-filament-panels::page>
    <form wire:submit.prevent="save" class="cs-page-container">

        {{-- Top Description & Action Banner --}}
        <div class="cs-banner">
            <div class="cs-banner-glow"></div>

            <div style="position: relative; z-index: 2;">
                <div class="cs-badge">
                    <span class="cs-badge-dot"></span>
                    <span>COMPANY & PUBLIC CONTACT SETTINGS</span>
                </div>
                <h2 class="cs-banner-title">
                    Brand Identity, Factory Premises & Map Pins
                </h2>
                <p class="cs-banner-desc">
                    Control public contact details, manufacturing plant coordinates, operating hours, and interactive
                    map pins displayed across the Contact Us page, footer, and store locator.
                </p>
            </div>

            <div style="position: relative; z-index: 2; flex-shrink: 0;">
                <button type="submit" class="cs-btn-save">
                    <svg wire:loading.remove wire:target="save" width="16" height="16" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7" />
                    </svg>
                    <svg wire:loading wire:target="save" class="animate-spin" width="16" height="16"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor">
                        <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="3"
                            stroke-dasharray="31.415, 31.415" stroke-linecap="round" fill="none" />
                    </svg>
                    <span wire:loading.remove wire:target="save">Save All Settings</span>
                    <span wire:loading wire:target="save">Saving...</span>
                </button>
            </div>
        </div>

        {{-- 2-Column Responsive Grid: Section 1 & Section 2 --}}
        <div class="cs-grid">

            {{-- Section 1: Corporate Identity & Communications --}}
            <div class="cs-card">
                <div class="cs-card-header">
                    <div class="sys-icon-badge red">
                        <svg fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="cs-card-title">Corporate Identity & Correspondence</h3>
                        <p class="cs-card-sub">Official trading brand name, contact channels, and customer hotline
                            numbers.</p>
                    </div>
                </div>

                <div class="cs-form-stack">
                    {{-- Company Name --}}
                    <div class="cs-field">
                        <label class="cs-label">
                            <span>Company Name <span class="cs-req">*</span></span>
                        </label>
                        <div class="cs-input-group">
                            <span class="cs-input-icon">
                                <svg fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                </svg>
                            </span>
                            <input type="text" wire:model="company_name" required
                                placeholder="Seven Series Garment Industry" class="cs-input has-icon" />
                        </div>
                    </div>

                    {{-- Brand Tagline --}}
                    <div class="cs-field">
                        <label class="cs-label">
                            <span>Brand Slogan / Tagline</span>
                        </label>
                        <div class="cs-input-group">
                            <span class="cs-input-icon">
                                <svg fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                                </svg>
                            </span>
                            <input type="text" wire:model="tagline"
                                placeholder="Authentic Denim Clothing Brand & Garment Factory"
                                class="cs-input has-icon" />
                        </div>
                    </div>

                    {{-- Email & Phone Grid --}}
                    <div class="cs-row-2">
                        <div class="cs-field">
                            <label class="cs-label">
                                <span>Official Email <span class="cs-req">*</span></span>
                            </label>
                            <div class="cs-input-group">
                                <span class="cs-input-icon">
                                    <svg fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                    </svg>
                                </span>
                                <input type="email" wire:model="primary_email" required
                                    placeholder="samparka@7series.com.np" class="cs-input has-icon" />
                            </div>
                        </div>

                        <div class="cs-field">
                            <label class="cs-label">
                                <span>Factory Hotline Phone <span class="cs-req">*</span></span>
                            </label>
                            <div class="cs-input-group">
                                <span class="cs-input-icon">
                                    <svg fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                    </svg>
                                </span>
                                <input type="text" wire:model="primary_phone" required
                                    placeholder="+977 9801234567" class="cs-input has-icon" />
                            </div>
                        </div>
                    </div>

                    {{-- WhatsApp Hotline & Email Helper Note --}}
                    <div class="cs-row-2">
                        <div class="cs-field">
                            <label class="cs-label">
                                <span>WhatsApp Dispatch Number</span>
                            </label>
                            <div class="cs-input-group">
                                <span class="cs-input-icon">
                                    <svg fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                                    </svg>
                                </span>
                                <input type="text" wire:model="whatsapp_number" placeholder="+977 9801234567"
                                    class="cs-input has-icon" />
                            </div>
                        </div>

                        <div class="cs-field">
                            <label class="cs-label">
                                <span>Email Helper Subtext</span>
                            </label>
                            <div class="cs-input-group">
                                <span class="cs-input-icon">
                                    <svg fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </span>
                                <input type="text" wire:model="email_note"
                                    placeholder="For wholesale pricing and inquiries." class="cs-input has-icon" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Section 2: Physical Factory Premises & Timings --}}
            <div class="cs-card">
                <div class="cs-card-header">
                    <div class="sys-icon-badge green">
                        <svg fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="cs-card-title">Manufacturing Plant & Timings</h3>
                        <p class="cs-card-sub">Physical factory location, industrial freight access, and operating
                            hours.</p>
                    </div>
                </div>

                <div class="cs-form-stack">
                    {{-- Primary Address --}}
                    <div class="cs-field">
                        <label class="cs-label">
                            <span>Factory Street Address <span class="cs-req">*</span></span>
                        </label>
                        <div class="cs-input-group">
                            <span class="cs-input-icon">
                                <svg fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </span>
                            <input type="text" wire:model="primary_address" required
                                placeholder="Near Padma Colony Main Entrance, Sitapaila" class="cs-input has-icon" />
                        </div>
                    </div>

                    {{-- City & State --}}
                    <div class="cs-row-2">
                        <div class="cs-field">
                            <label class="cs-label">
                                <span>City <span class="cs-req">*</span></span>
                            </label>
                            <input type="text" wire:model="city" required placeholder="Kathmandu"
                                class="cs-input" />
                        </div>

                        <div class="cs-field">
                            <label class="cs-label">
                                <span>State / Region <span class="cs-req">*</span></span>
                            </label>
                            <input type="text" wire:model="state" required placeholder="Bagmati Province, Nepal"
                                class="cs-input" />
                        </div>
                    </div>

                    {{-- Directions Note --}}
                    <div class="cs-field">
                        <label class="cs-label">
                            <span>Directions & Freight Loading Note</span>
                        </label>
                        <div class="cs-input-group">
                            <span class="cs-input-icon">
                                <svg fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0" />
                                </svg>
                            </span>
                            <input type="text" wire:model="directions_note"
                                placeholder="Easily accessible from Sitapaila Chowk, Ring Road. Direct freight bay."
                                class="cs-input has-icon" />
                        </div>
                    </div>

                    {{-- Operating Hours & Weekend Note --}}
                    <div class="cs-row-2">
                        <div class="cs-field">
                            <label class="cs-label">
                                <span>Operating Hours</span>
                            </label>
                            <div class="cs-input-group">
                                <span class="cs-input-icon">
                                    <svg fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </span>
                                <input type="text" wire:model="operating_hours"
                                    placeholder="Sunday – Friday: 09:00 – 18:00" class="cs-input has-icon" />
                            </div>
                        </div>

                        <div class="cs-field">
                            <label class="cs-label">
                                <span>Weekend / Maintenance Note</span>
                            </label>
                            <div class="cs-input-group">
                                <span class="cs-input-icon">
                                    <svg fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                </span>
                                <input type="text" wire:model="operating_hours_note"
                                    placeholder="Saturday: Factory Closed" class="cs-input has-icon" />
                            </div>
                        </div>
                    </div>

                    {{-- 100% Free Google Maps Embed & Location --}}
                    <div class="cs-field"
                        style="padding-top: 0.75rem; border-top: 1px solid rgba(120, 113, 108, 0.15);">
                        <div class="cs-label"
                            style="display: flex; flex-wrap: wrap; gap: 0.5rem; align-items: center; justify-content: space-between;">
                            <span>Google Maps Location & Free Embed URL</span>
                            <span
                                style="display: inline-flex; align-items: center; gap: 0.35rem; font-size: 0.68rem; font-weight: 800; color: #10b981; background: rgba(16, 185, 129, 0.12); padding: 0.2rem 0.55rem; border-radius: 9999px; border: 1px solid rgba(16, 185, 129, 0.3);">
                                <span class="cs-badge-dot"
                                    style="background: #10b981; box-shadow: 0 0 6px #10b981;"></span>
                                100% FREE &bull; NO API KEY REQUIRED
                            </span>
                        </div>
                        <div class="cs-input-group">
                            <span class="cs-input-icon">
                                <svg fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </span>
                            <input type="text" wire:model="google_maps_url"
                                placeholder="https://maps.google.com/?q=Padma+Colony+Sitapaila+Kathmandu (or paste Google Maps embed iframe)"
                                class="cs-input has-icon" />
                        </div>
                    </div>
                </div>
            </div>

        </div>

        {{-- Section 3: Interactive Map Pins (Multiple Locations) --}}
        <div class="cs-card">
            <div class="cs-card-header" style="justify-content: space-between; flex-wrap: wrap; gap: 1rem;">
                <div style="display: flex; align-items: center; gap: 0.85rem;">
                    <div class="sys-icon-badge red">
                        <svg fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="cs-card-title">Interactive Map Pins (Multiple Locations)</h3>
                        <p class="cs-card-sub">Manage location pins rendered on the interactive map. Visitors can
                            switch between pins or view contact details.</p>
                    </div>
                </div>

                <div>
                    <button wire:click="addPin" type="button" class="cs-btn-secondary">
                        <svg width="14" height="14" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 4v16m8-8H4" />
                        </svg>
                        <span>Add Location Pin</span>
                    </button>
                </div>
            </div>

            <div class="cs-form-stack">
                @forelse($map_pins as $index => $pin)
                    <div class="cs-pin-card {{ !empty($pin['is_primary']) ? 'is-primary' : '' }}">

                        {{-- Pin Header Card --}}
                        <div class="cs-pin-card-header">
                            <div class="cs-pin-card-header-left">
                                <span class="cs-pin-num">{{ $index + 1 }}</span>
                                <span class="cs-pin-title-text">{{ $pin['title'] ?? 'Unnamed Location Pin' }}</span>
                                @if (!empty($pin['is_primary']))
                                    <span class="cs-badge-primary-pin">Primary</span>
                                @endif
                            </div>

                            <div style="display: flex; align-items: center; gap: 0.5rem;">
                                @if (empty($pin['is_primary']))
                                    <button wire:click="setPrimaryPin({{ $index }})" type="button"
                                        class="cs-btn-secondary">
                                        Make Primary
                                    </button>
                                @endif
                                <button wire:click="removePin({{ $index }})" type="button"
                                    class="cs-btn-danger">
                                    <svg width="14" height="14" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                    <span>Delete</span>
                                </button>
                            </div>
                        </div>

                        {{-- Pin Form Row 1: Title & Type --}}
                        <div class="cs-row-2">
                            <div class="cs-field">
                                <label class="cs-label">
                                    <span>Pin Title <span class="cs-req">*</span></span>
                                </label>
                                <input type="text" wire:model="map_pins.{{ $index }}.title" required
                                    placeholder="e.g. Sitapaila Manufacturing Plant" class="cs-input" />
                            </div>

                            <div class="cs-field">
                                <label class="cs-label">
                                    <span>Facility Type</span>
                                </label>
                                <input type="text" wire:model="map_pins.{{ $index }}.type"
                                    placeholder="e.g. Factory, Showroom, Central Warehouse" class="cs-input" />
                            </div>
                        </div>

                        {{-- Pin Form Row 2: Latitude & Longitude --}}
                        <div class="cs-row-2">
                            <div class="cs-field">
                                <label class="cs-label">
                                    <span>Latitude <span class="cs-req">*</span></span>
                                </label>
                                <div class="cs-input-group">
                                    <span class="cs-input-icon">
                                        <svg fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </span>
                                    <input type="number" step="any"
                                        wire:model="map_pins.{{ $index }}.latitude" required
                                        placeholder="27.7125" class="cs-input has-icon" />
                                </div>
                            </div>

                            <div class="cs-field">
                                <label class="cs-label">
                                    <span>Longitude <span class="cs-req">*</span></span>
                                </label>
                                <div class="cs-input-group">
                                    <span class="cs-input-icon">
                                        <svg fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </span>
                                    <input type="number" step="any"
                                        wire:model="map_pins.{{ $index }}.longitude" required
                                        placeholder="85.2850" class="cs-input has-icon" />
                                </div>
                            </div>
                        </div>

                        {{-- Pin Form Row 3: Landmark Address & Direct Phone --}}
                        <div class="cs-row-3">
                            <div class="cs-field">
                                <label class="cs-label">
                                    <span>Address / Landmark Details</span>
                                </label>
                                <input type="text" wire:model="map_pins.{{ $index }}.address"
                                    placeholder="Near Padma Colony Main Gate, Sitapaila, Kathmandu"
                                    class="cs-input" />
                            </div>

                            <div class="cs-field">
                                <label class="cs-label">
                                    <span>Direct Phone Number</span>
                                </label>
                                <input type="text" wire:model="map_pins.{{ $index }}.phone"
                                    placeholder="+977 9801234567" class="cs-input" />
                            </div>
                        </div>

                    </div>
                @empty
                    <div
                        style="padding: 3rem 1.5rem; text-align: center; border-radius: 1rem; border: 2px dashed rgba(120, 113, 108, 0.25);">
                        <p style="font-size: 0.85rem; font-weight: 700; color: #78716c; margin: 0 0 0.5rem 0;">No
                            custom map pins recorded yet.</p>
                        <button wire:click="addPin" type="button" class="cs-btn-secondary">
                            Add Factory Location Pin
                        </button>
                    </div>
                @endforelse
            </div>
        </div>

        {{-- Bottom Spacious Floating Save Bar with Glassmorphic Backdrop Blur --}}
        <div class="cs-sticky-bar">
            <div class="cs-sticky-info">
                <span class="cs-badge-dot" style="margin-right: 0.35rem;"></span>
                <span>All changes synchronize immediately across the live Contact Us page and Store Locator.</span>
            </div>
            <div>
                <button type="submit" class="cs-btn-save">
                    <svg wire:loading.remove wire:target="save" width="16" height="16" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7" />
                    </svg>
                    <svg wire:loading wire:target="save" class="animate-spin" width="16" height="16"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor">
                        <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="3"
                            stroke-dasharray="31.415, 31.415" stroke-linecap="round" fill="none" />
                    </svg>
                    <span wire:loading.remove wire:target="save">Save All Settings</span>
                    <span wire:loading wire:target="save">Saving Settings...</span>
                </button>
            </div>
        </div>

    </form>
</x-filament-panels::page>
