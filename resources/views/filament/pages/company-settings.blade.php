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

                    {{-- Google Maps Customer Review Link --}}
                    <div class="cs-field">
                        <div style="display: flex; align-items: center; justify-content: space-between; gap: 0.5rem; margin-bottom: 0.35rem;">
                            <label class="cs-label" style="margin-bottom: 0;">
                                <span>Google Maps Review Request Link</span>
                            </label>
                            @if (!empty($google_review_url))
                                <a href="{{ $google_review_url }}" target="_blank" rel="noopener noreferrer"
                                    style="display: inline-flex; align-items: center; gap: 0.35rem; font-size: 0.68rem; font-weight: 800; color: #eab308; background: rgba(234, 179, 8, 0.12); padding: 0.2rem 0.55rem; border-radius: 9999px; border: 1px solid rgba(234, 179, 8, 0.3); text-decoration: none;">
                                    <span>★ Test Review Link</span>
                                    <span>&rarr;</span>
                                </a>
                            @endif
                        </div>
                        <div class="cs-input-group">
                            <span class="cs-input-icon">
                                <svg fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                                </svg>
                            </span>
                            <input type="text" wire:model="google_review_url"
                                placeholder="https://g.page/r/CWwuPiVj3QleEBM/review"
                                class="cs-input has-icon" />
                        </div>
                        <p style="font-size: 0.72rem; color: #a1a1aa; margin-top: 0.3rem;">
                            Direct short link where customers and retailers can leave 5-star reviews on Google Maps. Integrated into the Contact page, Footer, and Store Locator.
                        </p>
                    </div>
                </div>
            </div>

        </div>

        {{-- Section: Social Media Channels & Public Profiles --}}
        <div class="cs-card">
            <div class="cs-card-header" style="justify-content: space-between; flex-wrap: wrap; gap: 1rem;">
                <div style="display: flex; align-items: center; gap: 0.85rem;">
                    <div class="sys-icon-badge red">
                        <svg fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="cs-card-title">Official Social Media Links & Channels</h3>
                        <p class="cs-card-sub">Manage multiple brand social profiles (Instagram, TikTok, Facebook, YouTube, etc.) displayed in the dedicated Contact Us social section.</p>
                    </div>
                </div>

                <div>
                    <button wire:click="addSocialLink" type="button" class="cs-btn-secondary">
                        <svg width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        <span>Add Social Link</span>
                    </button>
                </div>
            </div>

            <div class="cs-form-stack">
                @forelse($social_links as $index => $social)
                    <div class="cs-pin-card">
                        <div class="cs-pin-card-header">
                            <div class="cs-pin-card-header-left">
                                <span class="cs-pin-num">{{ $index + 1 }}</span>
                                <span class="cs-pin-title-text">{{ $social['platform'] ?? 'Social Platform' }}</span>
                                <span class="cs-badge-primary-pin" style="background: rgba(229, 30, 43, 0.1); color: #E51E2B; border-color: rgba(229, 30, 43, 0.25);">
                                    {{ $social['handle'] ?? '@handle' }}
                                </span>
                            </div>

                            <div>
                                <button wire:click="removeSocialLink({{ $index }})" type="button" class="cs-btn-danger">
                                    <svg width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                    <span>Delete</span>
                                </button>
                            </div>
                        </div>

                        <div class="cs-row-3">
                            <div class="cs-field">
                                <label class="cs-label"><span>Platform <span class="cs-req">*</span></span></label>
                                <select wire:model="social_links.{{ $index }}.platform" class="cs-input" style="height: 42px;">
                                    <option value="Instagram">Instagram</option>
                                    <option value="Facebook">Facebook</option>
                                    <option value="TikTok">TikTok</option>
                                    <option value="YouTube">YouTube</option>
                                    <option value="WhatsApp">WhatsApp</option>
                                    <option value="LinkedIn">LinkedIn</option>
                                    <option value="X">X (Twitter)</option>
                                    <option value="Pinterest">Pinterest</option>
                                    <option value="Custom">Custom Channel</option>
                                </select>
                            </div>

                            <div class="cs-field">
                                <label class="cs-label"><span>Handle / Username</span></label>
                                <input type="text" wire:model="social_links.{{ $index }}.handle" placeholder="e.g. @sevenseries.np" class="cs-input" />
                            </div>

                            <div class="cs-field">
                                <label class="cs-label"><span>Descriptive Label</span></label>
                                <input type="text" wire:model="social_links.{{ $index }}.label" placeholder="e.g. Behind The Scenes & Fit Reels" class="cs-input" />
                            </div>
                        </div>

                        <div class="cs-field">
                            <label class="cs-label"><span>Destination URL <span class="cs-req">*</span></span></label>
                            <div class="cs-input-group">
                                <span class="cs-input-icon">
                                    <svg fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                                    </svg>
                                </span>
                                <input type="url" wire:model="social_links.{{ $index }}.url" placeholder="https://instagram.com/sevenseries.np" class="cs-input has-icon" />
                            </div>
                        </div>
                    </div>
                @empty
                    <div style="padding: 2.5rem 1.5rem; text-align: center; border-radius: 1rem; border: 2px dashed rgba(120, 113, 108, 0.25);">
                        <p style="font-size: 0.85rem; font-weight: 700; color: #78716c; margin: 0 0 0.5rem 0;">No social media links configured yet.</p>
                        <button wire:click="addSocialLink" type="button" class="cs-btn-secondary">
                            Add First Social Channel
                        </button>
                    </div>
                @endforelse
            </div>
        </div>

        {{-- Section: Linktree Hub & Official Factory QR Code Asset --}}
        <div class="cs-card">
            <div class="cs-card-header">
                <div class="sys-icon-badge green">
                    <svg fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm12 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z" />
                    </svg>
                </div>
                <div>
                    <h3 class="cs-card-title">Factory Linktree Hub & Official QR Code</h3>
                    <p class="cs-card-sub">Configure the factory Linktree URL and vector QR SVG asset rendered in the Contact Us page Linktree showcase card.</p>
                </div>
            </div>

            <div class="cs-form-stack">
                <div class="cs-grid" style="grid-template-columns: 1fr; gap: 1.5rem;">
                    <div style="display: flex; flex-direction: column; md:flex-row; gap: 1.5rem; align-items: flex-start;">
                        
                        {{-- QR Preview Card --}}
                        <div style="width: 140px; height: 140px; flex-shrink: 0; background: #ffffff; padding: 10px; border-radius: 16px; border: 2px solid rgba(226, 232, 240, 0.9); box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.05); display: flex; align-items: center; justify-content: center; position: relative;">
                            @if($qr_upload && method_exists($qr_upload, 'temporaryUrl') && in_array(strtolower($qr_upload->getClientOriginalExtension()), ['png', 'jpg', 'jpeg', 'webp']))
                                <img src="{{ $qr_upload->temporaryUrl() }}" alt="Preview Uploaded QR" style="width: 100%; height: 100%; object-fit: contain;">
                            @else
                                <img src="{{ asset($linktree_qr_path ?: 'images/sevenseries linktree.svg') }}" alt="Seven Series Linktree QR Code" style="width: 100%; height: 100%; object-fit: contain;">
                            @endif
                        </div>

                        {{-- Linktree Settings Fields --}}
                        <div style="flex: 1; width: 100%; display: flex; flex-direction: column; gap: 1rem;">
                            <div class="cs-field">
                                <label class="cs-label">
                                    <span>Factory Linktree URL <span class="cs-req">*</span></span>
                                </label>
                                <div class="cs-input-group">
                                    <span class="cs-input-icon">
                                        <svg fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1" />
                                        </svg>
                                    </span>
                                    <input type="url" wire:model="linktree_url" required
                                        placeholder="https://linktr.ee/sevenseries" class="cs-input has-icon" />
                                </div>
                            </div>

                            {{-- File Upload for Linktree QR Code --}}
                            <div class="cs-field">
                                <label class="cs-label">
                                    <span>Upload Linktree QR Asset (File) <span class="cs-req">*</span></span>
                                </label>
                                
                                <div style="border: 2px dashed rgba(229, 30, 43, 0.35); background: rgba(254, 242, 242, 0.4); border-radius: 14px; padding: 1.25rem; text-align: center; cursor: pointer; transition: all 0.2s;"
                                     onclick="document.getElementById('qr_upload_input').click()">
                                    <input type="file" id="qr_upload_input" wire:model="qr_upload" accept=".svg,.png,.jpg,.jpeg,.webp" style="display: none;" />
                                    
                                    <div style="display: flex; flex-direction: column; align-items: center; gap: 0.5rem;">
                                        <div style="width: 38px; height: 38px; border-radius: 10px; background: rgba(229, 30, 43, 0.1); color: #e51e2b; display: flex; align-items: center; justify-content: center;">
                                            <svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                            </svg>
                                        </div>
                                        <div>
                                            <span style="font-size: 0.82rem; font-weight: 700; color: #18181b;">Click to choose or replace QR code file</span>
                                            <p style="font-size: 0.72rem; color: #71717a; margin-top: 2px;">Supports vector .SVG, .PNG, .JPG, .WebP (Max 5MB)</p>
                                        </div>
                                        
                                        <div wire:loading wire:target="qr_upload" style="margin-top: 0.4rem; font-size: 0.75rem; color: #e51e2b; font-weight: 700;">
                                            ⏳ Uploading file... please wait
                                        </div>
                                        
                                        @if($qr_upload)
                                            <div style="margin-top: 0.4rem; display: inline-flex; align-items: center; gap: 0.5rem; padding: 4px 10px; background: #ecfdf5; border: 1px solid #a7f3d0; border-radius: 9999px; font-size: 0.75rem; color: #065f46; font-weight: 700;">
                                                <span>✓ Selected: {{ $qr_upload->getClientOriginalName() }}</span>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                
                                <div style="display: flex; align-items: center; justify-content: space-between; margin-top: 0.6rem; flex-wrap: wrap; gap: 0.5rem;">
                                    <span style="font-size: 0.72rem; color: #78716c;">
                                        Active Asset: <code>{{ $linktree_qr_path ?: 'images/sevenseries linktree.svg' }}</code>
                                    </span>
                                    <button type="button" wire:click="resetQrToDefault" class="cs-btn-secondary" style="font-size: 0.72rem; padding: 4px 10px; height: auto;">
                                        Reset to Default Factory QR
                                    </button>
                                </div>
                                @error('qr_upload')
                                    <span style="font-size: 0.75rem; color: #dc2626; font-weight: 700; margin-top: 0.25rem; display: block;">{{ $message }}</span>
                                @enderror
                            </div>
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
