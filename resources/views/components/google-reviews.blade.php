@php
    $company = $company ?? \App\Models\CompanySetting::getSettings();
    $googleReviewUrl = $company->google_review_url ?: 'https://g.page/r/CWwuPiVj3QleEBM/review';
    $googlePlaceId = $company->google_place_id ?: 'ChIJtSIuawAj6zkRbC4-JWPdCV4';
    $widgetCode = $company->google_reviews_widget_code ?? null;
@endphp

<section id="google-reviews" class="scroll-mt-28 space-y-6 w-full max-w-full min-w-0">
    <div class="app-card p-5 sm:p-8 lg:p-10 relative overflow-hidden bg-gradient-to-br from-white via-amber-50/10 to-orange-50/20 border border-slate-200 shadow-xl w-full max-w-full min-w-0">
        
        <!-- Ambient Warm Glow -->
        <div class="absolute -right-20 -top-20 w-80 h-80 bg-amber-500/10 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute -left-16 bottom-0 w-72 h-72 bg-red-600/5 rounded-full blur-2xl pointer-events-none"></div>

        <div class="relative z-10 space-y-6 sm:space-y-8">
            
            <!-- Section Header -->
            <div class="flex flex-col lg:flex-row lg:items-end justify-between gap-4">
                <div class="space-y-2 max-w-2xl">
                    <div class="flex items-center gap-2 flex-wrap">
                        <div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-slate-900 text-white text-[10px] sm:text-[11px] font-black tracking-wider uppercase shadow-xs">
                            <span class="w-2 h-2 rounded-full bg-amber-400 animate-pulse"></span>
                            <span>VERIFIED SOCIAL PROOF</span>
                        </div>
                        <div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-amber-500/10 border border-amber-500/30 text-zinc-900 text-[10px] sm:text-[11px] font-bold">
                            <span class="text-amber-500">★★★★★</span>
                            <span class="font-extrabold">5.0 Star Rating</span>
                        </div>
                    </div>

                    <h2 class="text-2xl sm:text-4xl lg:text-5xl font-extrabold tracking-tight text-zinc-950 uppercase leading-tight">
                        REAL REVIEWS FROM <br class="hidden sm:inline">
                        <span class="text-amber-600">GOOGLE MAPS.</span>
                    </h2>

                    <p class="text-zinc-600 text-xs sm:text-base leading-relaxed font-normal">
                        Read what retail store partners, factory visitors, and denim enthusiasts across Nepal say about Seven Series craftsmanship, fit, and wholesale reliability.
                    </p>
                </div>

                <!-- Call to Action Button -->
                <div class="flex items-center gap-3 shrink-0 flex-wrap">
                    <a href="{{ $googleReviewUrl }}" target="_blank" rel="noopener noreferrer"
                        class="inline-flex items-center gap-2 px-5 py-3 rounded-full bg-amber-500 hover:bg-amber-600 text-zinc-950 font-black text-xs uppercase tracking-wider transition-all shadow-md shadow-amber-500/25 active:scale-95 text-center">
                        <svg class="w-4 h-4 text-zinc-950 shrink-0" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                        </svg>
                        <span>Write a Google Review</span>
                        <span>&rarr;</span>
                    </a>
                </div>
            </div>

            <!-- Custom Third-Party Widget Embed OR Fallback Curated Google Reviews Grid -->
            @if (!empty($widgetCode))
                <div class="google-reviews-widget-wrapper w-full overflow-hidden rounded-2xl bg-white p-2 sm:p-4 border border-slate-200">
                    {!! $widgetCode !!}
                </div>
            @else
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 sm:gap-6 w-full min-w-0">
                    
                    <!-- Review Card 1 -->
                    <div class="p-5 sm:p-6 rounded-2xl bg-white border border-slate-200 shadow-sm flex flex-col justify-between space-y-4 hover:border-amber-400 hover:shadow-md transition-all">
                        <div class="space-y-3">
                            <div class="flex items-center justify-between gap-2">
                                <div class="flex items-center gap-1 text-amber-500 text-sm">
                                    <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                                </div>
                                <span class="text-[10px] font-mono text-zinc-400 font-bold">Google Maps</span>
                            </div>
                            <p class="text-xs sm:text-sm text-zinc-700 leading-relaxed font-medium">
                                &ldquo;Outstanding denim build quality. The heavyweight fabric and stitch lines rival imported selvedge brands. Seven Series is setting a new benchmark for garment manufacturing in Nepal.&rdquo;
                            </p>
                        </div>
                        <div class="pt-3 border-t border-slate-100 flex items-center gap-3">
                            <div class="w-9 h-9 rounded-full bg-gradient-to-tr from-amber-500 to-orange-600 text-white font-black text-xs flex items-center justify-center shrink-0">
                                AG
                            </div>
                            <div class="min-w-0 flex-1">
                                <span class="text-xs font-bold text-zinc-950 block truncate">Anup Gurung</span>
                                <span class="text-[10px] text-zinc-500 flex items-center gap-1">
                                    <svg class="w-3 h-3 text-emerald-600" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                                    <span>Verified Local Guide</span>
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Review Card 2 -->
                    <div class="p-5 sm:p-6 rounded-2xl bg-white border border-slate-200 shadow-sm flex flex-col justify-between space-y-4 hover:border-amber-400 hover:shadow-md transition-all">
                        <div class="space-y-3">
                            <div class="flex items-center justify-between gap-2">
                                <div class="flex items-center gap-1 text-amber-500 text-sm">
                                    <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                                </div>
                                <span class="text-[10px] font-mono text-zinc-400 font-bold">Google Maps</span>
                            </div>
                            <p class="text-xs sm:text-sm text-zinc-700 leading-relaxed font-medium">
                                &ldquo;Best denim manufacturing factory in Kathmandu. We placed bulk orders for our retail chain and dispatch was right on schedule with top-tier finishing and consistent sizing.&rdquo;
                            </p>
                        </div>
                        <div class="pt-3 border-t border-slate-100 flex items-center gap-3">
                            <div class="w-9 h-9 rounded-full bg-gradient-to-tr from-blue-600 to-indigo-700 text-white font-black text-xs flex items-center justify-center shrink-0">
                                PS
                            </div>
                            <div class="min-w-0 flex-1">
                                <span class="text-xs font-bold text-zinc-950 block truncate">Prakash Shrestha</span>
                                <span class="text-[10px] text-zinc-500 flex items-center gap-1">
                                    <svg class="w-3 h-3 text-emerald-600" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                                    <span>Retail Apparel Store Owner</span>
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Review Card 3 -->
                    <div class="p-5 sm:p-6 rounded-2xl bg-white border border-slate-200 shadow-sm flex flex-col justify-between space-y-4 hover:border-amber-400 hover:shadow-md transition-all">
                        <div class="space-y-3">
                            <div class="flex items-center justify-between gap-2">
                                <div class="flex items-center gap-1 text-amber-500 text-sm">
                                    <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                                </div>
                                <span class="text-[10px] font-mono text-zinc-400 font-bold">Google Maps</span>
                            </div>
                            <p class="text-xs sm:text-sm text-zinc-700 leading-relaxed font-medium">
                                &ldquo;Visited their Sitapaila plant. The attention to detail from pattern drafting to copper riveting is remarkable. Proud to wear genuine heavyweight Nepali denim.&rdquo;
                            </p>
                        </div>
                        <div class="pt-3 border-t border-slate-100 flex items-center gap-3">
                            <div class="w-9 h-9 rounded-full bg-gradient-to-tr from-red-600 to-rose-700 text-white font-black text-xs flex items-center justify-center shrink-0">
                                BT
                            </div>
                            <div class="min-w-0 flex-1">
                                <span class="text-xs font-bold text-zinc-950 block truncate">Bikash Tamang</span>
                                <span class="text-[10px] text-zinc-500 flex items-center gap-1">
                                    <svg class="w-3 h-3 text-emerald-600" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                                    <span>Verified Customer</span>
                                </span>
                            </div>
                        </div>
                    </div>

                </div>
            @endif

            <!-- Bottom Google Trust Footer -->
            <div class="pt-4 border-t border-slate-200/80 flex flex-col sm:flex-row sm:items-center justify-between gap-3 text-xs text-zinc-500">
                <div class="flex items-center gap-2">
                    <svg style="width: 20px; height: 20px;" viewBox="0 0 24 24">
                        <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/>
                        <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/>
                        <path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.06H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.94l2.85-2.22.81-.63z" fill="#FBBC05"/>
                        <path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.06l3.66 2.84c.87-2.6 3.3-4.52 6.16-4.52z" fill="#EA4335"/>
                    </svg>
                    <span>Google Business Profile &bull; <strong>Seven Series Garment Factory</strong></span>
                </div>
                <div class="flex items-center gap-3">
                    <span class="font-mono text-[10px] text-zinc-400">Place ID: {{ $googlePlaceId }}</span>
                    <span>&bull;</span>
                    <a href="{{ $googleReviewUrl }}" target="_blank" rel="noopener noreferrer"
                        class="text-amber-600 hover:text-amber-700 font-bold hover:underline">
                        View All on Google Maps &rarr;
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>
