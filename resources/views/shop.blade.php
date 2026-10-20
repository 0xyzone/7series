<x-layout>
    <x-slot:title>Wholesale Line Sheet & Catalog - Seven Series Garment Industry</x-slot>

    <x-nav />

    <main class="pt-32 pb-20 max-w-7xl mx-auto px-6">
        <div class="mb-12">
            <div class="inline-block px-3 py-1 bg-red-100 border border-red-200 rounded-full text-red-600 text-xs font-black tracking-widest uppercase mb-3">
                B2B WHOLESALE & BULK PRODUCTION
            </div>
            <h1 class="text-5xl font-black tracking-tighter mb-4 text-zinc-950 uppercase">
                WHOLESALE <span class="text-red-600">LINE SHEET</span>
            </h1>
            <p class="text-zinc-600 font-medium max-w-xl">
                Seven Series Garment Industry manufactures exclusively for volume wholesalers, retail chains, and private label apparel brands. Direct factory FOB allocation.
            </p>
        </div>

        <div class="p-8 mb-12 rounded-3xl bg-zinc-50 border-2 border-zinc-200 flex flex-col sm:flex-row justify-between items-center gap-6">
            <div class="space-y-1 text-center sm:text-left">
                <h3 class="text-xl font-black text-zinc-950 uppercase">Looking for 2026 Volume Allocation?</h3>
                <p class="text-sm text-zinc-600 font-medium">Download the complete technical line sheet or schedule a physical fabric swatch box delivery.</p>
            </div>
            <a href="/b2b#rfq" class="px-8 py-4 bg-red-600 hover:bg-red-700 text-white font-black text-xs uppercase tracking-widest rounded-xl shadow-lg shadow-red-600/25 transition-all">
                Request Line Sheet & Swatches
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
            <!-- Series 01 -->
            <div class="rounded-3xl bg-white border-2 border-zinc-200 overflow-hidden p-6 space-y-4 hover:border-red-600 hover:shadow-2xl transition-all">
                <img src="{{ asset('images/collection-1.png') }}" class="w-full h-64 object-cover rounded-2xl" alt="Raw Denim">
                <div class="flex justify-between items-baseline">
                    <h3 class="text-xl font-black uppercase text-zinc-950">RAW ARCHITECTURAL SELVEDGE</h3>
                    <span class="text-sm font-black text-red-600">$22.50 – $26.00 FOB</span>
                </div>
                <p class="text-zinc-600 text-sm">14.5oz Japanese Kurabo weave. Triple-felled seams. MOQ 250 units.</p>
                <a href="/b2b#rfq" class="w-full py-3 bg-zinc-950 text-white text-xs font-black uppercase tracking-widest rounded-xl text-center block hover:bg-red-600 transition-colors">
                    Request Spec Pack
                </a>
            </div>

            <!-- Series 02 -->
            <div class="rounded-3xl bg-white border-2 border-zinc-200 overflow-hidden p-6 space-y-4 hover:border-red-600 hover:shadow-2xl transition-all">
                <img src="{{ asset('images/collection-2.png') }}" class="w-full h-64 object-cover rounded-2xl" alt="Tech Trousers">
                <div class="flex justify-between items-baseline">
                    <h3 class="text-xl font-black uppercase text-zinc-950">4-WAY ARTICULATED TROUSER</h3>
                    <span class="text-sm font-black text-red-600">$19.80 – $24.50 FOB</span>
                </div>
                <p class="text-zinc-600 text-sm">280 GSM weatherproof DWR nylon-cotton. Articulated knees. MOQ 300 units.</p>
                <a href="/b2b#rfq" class="w-full py-3 bg-zinc-950 text-white text-xs font-black uppercase tracking-widest rounded-xl text-center block hover:bg-red-600 transition-colors">
                    Request Spec Pack
                </a>
            </div>

            <!-- Series 03 -->
            <div class="rounded-3xl bg-white border-2 border-zinc-200 overflow-hidden p-6 space-y-4 hover:border-red-600 hover:shadow-2xl transition-all">
                <img src="{{ asset('images/collection-3.png') }}" class="w-full h-64 object-cover rounded-2xl" alt="Outerwear">
                <div class="flex justify-between items-baseline">
                    <h3 class="text-xl font-black uppercase text-zinc-950">BONDED TECHNICAL PARKA</h3>
                    <span class="text-sm font-black text-red-600">$34.00 – $42.00 FOB</span>
                </div>
                <p class="text-zinc-600 text-sm">3-layer stormproof bonded cotton shell. Taped seams. MOQ 200 units.</p>
                <a href="/b2b#rfq" class="w-full py-3 bg-zinc-950 text-white text-xs font-black uppercase tracking-widest rounded-xl text-center block hover:bg-red-600 transition-colors">
                    Request Spec Pack
                </a>
            </div>
        </div>
    </main>

    <x-footer />
</x-layout>