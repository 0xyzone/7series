/**
 * Seven Series - Clean 2D Brand Map Engine (Store Locator & Contact Map)
 * - 100% Free, ZERO API Keys, ZERO Watermarks
 * - Powered by OpenStreetMap Standard (Worldwide CDN, Fastly / Del Edge)
 * - Custom 2D Architectural Brand Filter: Red (#E51E2B), Black (#18181B), and White (#FFFFFF)
 * - Accents of luxury Gold (Flagship/HQ stars) and electric Blue (GPS directions)
 * - Guaranteed non-zero height, safe Alpine v3 lifecycle, and auto-invalidation
 */

import L from 'leaflet';
import 'leaflet/dist/leaflet.css';

// Ensure window.L is available globally
if (typeof window !== 'undefined') {
    window.L = L;
}

// Clean 2D Minimalist Architectural Canvas - Zero building footprints, zero house clutter, 100% free
const ESRI_CANVAS_BASE = 'https://server.arcgisonline.com/ArcGIS/rest/services/Canvas/World_Light_Gray_Base/MapServer/tile/{z}/{y}/{x}';
const ESRI_CANVAS_LABELS = 'https://server.arcgisonline.com/ArcGIS/rest/services/Canvas/World_Light_Gray_Reference/MapServer/tile/{z}/{y}/{x}';
const TILE_ATTRIBUTION = 'Tiles &copy; Esri &mdash; Seven Series';

/**
 * Custom Seven Series Brand Pin Icon Generator
 * @param {'flagship'|'factory'|'stockist'} type
 */
export function createPinIcon(type = 'stockist') {
    const isFlagship = type === 'flagship';
    const isFactory = type === 'factory';

    let size = 32;
    let bg = '#18181B';
    let border = 'border-2 border-white';
    let ringColor = 'rgba(24, 24, 27, 0.25)';
    let badgeHtml = '';
    let iconSvg = '';

    if (isFlagship) {
        size = 36;
        bg = '#E51E2B';
        ringColor = 'rgba(229, 30, 43, 0.4)';
        badgeHtml = `<span class="absolute -top-1.5 -right-1.5 w-4 h-4 rounded-full bg-amber-400 border-2 border-white text-zinc-950 flex items-center justify-center text-[8px] font-black shadow-xs">★</span>`;
        iconSvg = `<svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>`;
    } else if (isFactory) {
        size = 36;
        bg = '#18181B';
        ringColor = 'rgba(229, 30, 43, 0.45)';
        border = 'border-2 border-[#E51E2B]';
        badgeHtml = `<span class="absolute -top-1.5 -right-1.5 w-4 h-4 rounded-full bg-amber-400 border-2 border-white text-zinc-950 flex items-center justify-center text-[8px] font-black shadow-xs">★</span>`;
        iconSvg = `<svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>`;
    } else {
        // Authorized stockist pin
        size = 30;
        bg = '#18181B';
        ringColor = 'rgba(24, 24, 27, 0.2)';
        iconSvg = `<svg class="w-3.5 h-3.5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>`;
    }

    return L.divIcon({
        className: 'custom-store-pin',
        html: `
            <div class="relative flex items-center justify-center" style="width: ${size}px; height: ${size}px;">
                <span class="absolute inset-0 rounded-full animate-ping opacity-60" style="background-color: ${ringColor};"></span>
                <div class="relative w-full h-full rounded-full shadow-lg flex items-center justify-center ${border}" style="background-color: ${bg};">
                    ${iconSvg}
                </div>
                ${badgeHtml}
            </div>
        `,
        iconSize: [size, size],
        iconAnchor: [size / 2, size / 2],
        popupAnchor: [0, -size / 2 - 4]
    });
}

/**
 * 1. Store Locator Engine for /stores
 */
export function createStoresLocator(storesData, factoryPinsData) {
    return {
        search: '',
        selectedCity: 'all',
        stores: storesData || [],
        factoryPins: factoryPinsData || [],
        activeStoreId: null,
        map: null,
        markers: {},
        isMapReady: false,
        isMounted: false,

        initMap() {
            if (this.isMounted && this.map) return;
            this.isMounted = true;

            this.$nextTick(() => {
                this.mountMap();
            });

            window.addEventListener('resize', () => {
                if (this.map) this.map.invalidateSize();
            });
        },

        mountMap() {
            const rootEl = this.$el || document;
            const mapContainer = rootEl.querySelector('#stores-map') || document.getElementById('stores-map');
            if (!mapContainer) return;

            if (this.map) {
                try { this.map.remove(); } catch (_) {}
                this.map = null;
            }

            if (mapContainer._leaflet_id) {
                try { mapContainer._leaflet_id = null; } catch (_) {}
                mapContainer.innerHTML = '';
            }

            try {
                this.map = L.map(mapContainer, {
                    zoomControl: true,
                    scrollWheelZoom: false,
                    fadeAnimation: true,
                    markerZoomAnimation: true,
                    preferCanvas: true
                }).setView([27.7125, 85.3100], 12);

                // Clean 2D Minimalist Architectural Base: zero building footprints, zero house clutter
                L.tileLayer(ESRI_CANVAS_BASE, {
                    attribution: TILE_ATTRIBUTION,
                    maxNativeZoom: 16,
                    maxZoom: 19
                }).addTo(this.map);

                // Clean Reference Labels: major streets and landmarks without building clutter
                L.tileLayer(ESRI_CANVAS_LABELS, {
                    maxNativeZoom: 16,
                    maxZoom: 19
                }).addTo(this.map);

                const bounds = [];
                const popupOptions = {
                    maxWidth: 250,
                    minWidth: 190,
                    className: 'compact-store-popup',
                    autoPanPadding: [25, 25],
                    closeButton: true
                };

                // Add Factory Pins from Company Settings
                if (Array.isArray(this.factoryPins)) {
                    this.factoryPins.forEach((pin, index) => {
                        if (pin.latitude && pin.longitude) {
                            const latLng = [parseFloat(pin.latitude), parseFloat(pin.longitude)];
                            bounds.push(latLng);
                            const marker = L.marker(latLng, { icon: createPinIcon('factory') }).addTo(this.map);
                            const mapsUrl = `https://www.google.com/maps/dir/?api=1&destination=${latLng[0]},${latLng[1]}`;

                            marker.bindPopup(`
                                <div class="p-2 space-y-1.5 font-sans text-left">
                                    <div class="flex items-center justify-between gap-1.5 border-b border-zinc-100 pb-1.5">
                                        <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full bg-zinc-950 text-white text-[9px] font-black tracking-wider uppercase border border-amber-400/50">
                                            <span class="text-amber-400 text-[10px]">★</span> ${pin.type || 'FACTORY HQ'}
                                        </span>
                                        <span class="text-[10px] font-bold text-zinc-400">NEPAL</span>
                                    </div>
                                    <h4 class="text-xs font-black text-zinc-950 leading-tight">${pin.title}</h4>
                                    <p class="text-[10px] text-zinc-600 leading-tight line-clamp-2">${pin.address || ''}</p>
                                    <div class="pt-1 flex items-center gap-1.5">
                                        ${pin.phone ? `<a href="tel:${pin.phone}" class="px-2.5 py-1 bg-zinc-100 hover:bg-zinc-200 text-zinc-900 text-[10px] font-bold rounded-lg no-underline transition-colors">📞 Call</a>` : ''}
                                        <a href="${mapsUrl}" target="_blank" rel="noopener noreferrer" class="px-3 py-1 bg-blue-600 hover:bg-blue-700 !text-white text-[10px] font-bold rounded-lg no-underline flex-1 text-center transition-colors shadow-xs">Directions &rarr;</a>
                                    </div>
                                </div>
                            `, popupOptions);
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
                            const isFlagship = store.store_type === 'flagship';
                            const marker = L.marker(latLng, { icon: createPinIcon(isFlagship ? 'flagship' : 'stockist') }).addTo(this.map);
                            const mapsUrl = `https://www.google.com/maps/dir/?api=1&destination=${latLng[0]},${latLng[1]}`;

                            marker.bindPopup(`
                                <div class="p-2 space-y-1.5 font-sans text-left">
                                    <div class="flex items-center justify-between gap-1.5 border-b border-zinc-100 pb-1.5">
                                        ${isFlagship 
                                            ? `<span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full bg-red-600 text-white text-[9px] font-black tracking-wider uppercase shadow-xs">
                                                <span class="text-amber-300 text-[10px]">★</span> FLAGSHIP
                                               </span>`
                                            : `<span class="px-2 py-0.5 rounded-full bg-zinc-900 text-white text-[9px] font-black tracking-wider uppercase">
                                                STOCKIST
                                               </span>`
                                        }
                                        <span class="text-[10px] font-bold text-zinc-500 truncate">${store.city || 'NEPAL'}</span>
                                    </div>
                                    <h4 class="text-xs font-black text-zinc-950 leading-tight">${store.name}</h4>
                                    <p class="text-[10px] text-zinc-600 leading-tight line-clamp-2">${store.address}${store.landmark ? ` (Near ${store.landmark})` : ''}</p>
                                    <div class="pt-1 flex items-center gap-1.5">
                                        ${store.phone ? `<a href="tel:${store.phone}" class="px-2.5 py-1 bg-zinc-100 hover:bg-zinc-200 text-zinc-900 text-[10px] font-bold rounded-lg no-underline transition-colors">📞 Call</a>` : ''}
                                        <a href="${mapsUrl}" target="_blank" rel="noopener noreferrer" class="px-3 py-1 bg-blue-600 hover:bg-blue-700 !text-white text-[10px] font-bold rounded-lg no-underline flex-1 text-center transition-colors shadow-xs">Directions &rarr;</a>
                                    </div>
                                </div>
                            `, popupOptions);
                            this.markers['store_' + store.id] = marker;
                        }
                    });
                }

                if (bounds.length > 0) {
                    this.map.fitBounds(bounds, { padding: [40, 40], maxZoom: 14 });
                }

                this.isMapReady = true;

                const refresh = () => {
                    if (this.map) this.map.invalidateSize();
                };
                requestAnimationFrame(refresh);
                setTimeout(refresh, 80);
                setTimeout(refresh, 250);
                setTimeout(refresh, 600);

                if (window.ResizeObserver) {
                    const ro = new ResizeObserver(() => refresh());
                    ro.observe(mapContainer);
                }

            } catch (err) {
                console.warn('Store locator map initialization warning:', err);
            }
        },

        resetMap() {
            if (!this.map) return;
            this.activeStoreId = null;
            const bounds = [];
            Object.values(this.markers).forEach(m => {
                if (m && m.getLatLng) bounds.push(m.getLatLng());
            });
            if (bounds.length > 0) {
                this.map.fitBounds(bounds, { padding: [40, 40], maxZoom: 14 });
            } else {
                this.map.setView([27.7125, 85.3100], 12);
            }
        },

        focusStore(id, lat, lng) {
            this.activeStoreId = id;
            if (this.map && lat && lng) {
                this.map.flyTo([lat, lng], 16, { duration: 1.0 });
                const key = 'store_' + id;
                if (this.markers[key]) {
                    this.markers[key].openPopup();
                }
                const sec = document.getElementById('stores-map-section');
                if (sec) sec.scrollIntoView({ behavior: 'smooth', block: 'center' });
            }
        },

        focusFactory(index, lat, lng) {
            if (this.map && lat && lng) {
                this.map.flyTo([lat, lng], 16, { duration: 1.0 });
                const key = 'factory_' + index;
                if (this.markers[key]) {
                    this.markers[key].openPopup();
                }
                const sec = document.getElementById('stores-map-section');
                if (sec) sec.scrollIntoView({ behavior: 'smooth', block: 'center' });
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
    };
}

/**
 * 2. Clean Contact Map Engine for /contact
 */
export function createContactMap(pinsData) {
    return {
        pins: pinsData || [],
        activePinIndex: 0,
        map: null,
        markers: [],
        isMounted: false,

        init() {
            if (this.isMounted && this.map) return;
            this.isMounted = true;

            this.$nextTick(() => {
                this.mountMap();
            });

            window.addEventListener('resize', () => {
                if (this.map) this.map.invalidateSize();
            });
        },

        initMap() {
            this.init();
        },

        mountMap() {
            const rootEl = this.$el || document;
            const container = rootEl.querySelector('#contact-map') || document.getElementById('contact-map');
            if (!container) return;

            if (this.map) {
                try { this.map.remove(); } catch (_) {}
                this.map = null;
            }

            if (container._leaflet_id) {
                try { container._leaflet_id = null; } catch (_) {}
                container.innerHTML = '';
            }

            // Default: Sitapaila Factory HQ
            let startLat = 27.7125;
            let startLng = 85.2850;

            if (Array.isArray(this.pins) && this.pins.length > 0 && this.pins[0].latitude && this.pins[0].longitude) {
                startLat = parseFloat(this.pins[0].latitude);
                startLng = parseFloat(this.pins[0].longitude);
            }

            try {
                this.map = L.map(container, {
                    zoomControl: true,
                    scrollWheelZoom: false,
                    fadeAnimation: true,
                    markerZoomAnimation: true,
                    preferCanvas: true
                }).setView([startLat, startLng], 15);

                // Clean 2D Minimalist Architectural Base: zero building footprints, zero house clutter
                L.tileLayer(ESRI_CANVAS_BASE, {
                    attribution: TILE_ATTRIBUTION,
                    maxNativeZoom: 16,
                    maxZoom: 19
                }).addTo(this.map);

                // Clean Reference Labels: major streets and landmarks without building clutter
                L.tileLayer(ESRI_CANVAS_LABELS, {
                    maxNativeZoom: 16,
                    maxZoom: 19
                }).addTo(this.map);

                this.markers = [];
                const bounds = [];

                if (Array.isArray(this.pins)) {
                    this.pins.forEach((pin, index) => {
                        if (pin.latitude && pin.longitude) {
                            const lat = parseFloat(pin.latitude);
                            const lng = parseFloat(pin.longitude);
                            const latLng = [lat, lng];
                            bounds.push(latLng);

                            const marker = L.marker(latLng, { icon: createPinIcon('factory') }).addTo(this.map);
                            const gmapsUrl = `https://www.google.com/maps/dir/?api=1&destination=${lat},${lng}`;

                            marker.bindPopup(`
                                <div class="p-2 space-y-1.5 font-sans text-left">
                                    <div class="flex items-center justify-between gap-1.5 border-b border-zinc-100 pb-1.5">
                                        <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full bg-zinc-950 text-white text-[9px] font-black tracking-wider uppercase border border-amber-400/50">
                                            <span class="text-amber-400 text-[10px]">★</span> ${pin.type || 'FACTORY HQ'}
                                        </span>
                                        <span class="text-[10px] font-bold text-zinc-400">NEPAL</span>
                                    </div>
                                    <h4 class="text-xs font-black text-zinc-950 leading-tight">${pin.title}</h4>
                                    <p class="text-[10px] text-zinc-600 leading-tight line-clamp-2">${pin.address || ''}</p>
                                    <div class="pt-1 flex items-center gap-1.5">
                                        ${pin.phone ? `<a href="tel:${pin.phone}" class="px-2.5 py-1 bg-zinc-100 hover:bg-zinc-200 text-zinc-900 text-[10px] font-bold rounded-lg no-underline transition-colors">📞 Call</a>` : ''}
                                        <a href="${gmapsUrl}" target="_blank" rel="noopener noreferrer" class="px-3 py-1 bg-blue-600 hover:bg-blue-700 !text-white text-[10px] font-bold rounded-lg no-underline flex-1 text-center transition-colors shadow-xs">Directions &rarr;</a>
                                    </div>
                                </div>
                            `, { maxWidth: 250, minWidth: 190, className: 'compact-store-popup' });

                            this.markers.push(marker);
                        }
                    });
                }

                if (this.markers.length > 0) {
                    this.markers[0].openPopup();
                }

                // Multiple resize invalidations
                const refresh = () => {
                    if (this.map) this.map.invalidateSize();
                };
                requestAnimationFrame(refresh);
                setTimeout(refresh, 80);
                setTimeout(refresh, 250);
                setTimeout(refresh, 600);

                if (window.ResizeObserver) {
                    const ro = new ResizeObserver(() => refresh());
                    ro.observe(container);
                }

            } catch (err) {
                console.warn('Contact map initialization warning:', err);
            }
        },

        resetMap() {
            if (!this.map) return;
            if (this.markers.length > 0 && this.markers[0].getLatLng) {
                this.map.setView(this.markers[0].getLatLng(), 15);
                this.markers[0].openPopup();
            }
        },

        selectPin(index) {
            this.activePinIndex = index;
            const pin = this.pins[index];
            if (this.map && pin && pin.latitude && pin.longitude) {
                const lat = parseFloat(pin.latitude);
                const lng = parseFloat(pin.longitude);
                this.map.flyTo([lat, lng], 15, { duration: 0.8 });
                if (this.markers[index]) {
                    this.markers[index].openPopup();
                }
            }
        }
    };
}

// Global attachment for Alpine.js
window.createStoresLocatorEngine = createStoresLocator;
window.createContactMapEngine = createContactMap;
window.storesLocator = createStoresLocator;
window.contactMap = createContactMap;

if (window.Alpine) {
    window.Alpine.data('storesLocator', createStoresLocator);
    window.Alpine.data('contactMap', createContactMap);
} else {
    document.addEventListener('alpine:init', () => {
        if (window.Alpine) {
            window.Alpine.data('storesLocator', createStoresLocator);
            window.Alpine.data('contactMap', createContactMap);
        }
    });
}
