<x-layout>
    <x-slot:title>Shop - 7 Series Denim</x-slot>

        <x-nav />

        <main class="pt-32 pb-20 max-w-7xl mx-auto px-6">
            <div class="mb-16">
                <h1 class="text-6xl font-black tracking-tighter mb-4">THE <span class="text-red-600">ARCHIVE</span></h1>
                <p class="text-zinc-500 dark:text-zinc-400 font-medium max-w-xl">Explore our latest drops and
                    architectural denim pieces.</p>
            </div>

            @if($products->isEmpty())
                <div class="py-20 text-center border-2 border-dashed border-zinc-200 dark:border-zinc-800 rounded-2xl">
                    <p class="text-zinc-500 font-bold uppercase tracking-widest">No pieces available in the archive yet.</p>
                    <p class="text-sm mt-2 text-zinc-400">Admin: Check Filament panel to add products.</p>
                </div>
            @else
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12">
                    @foreach($products as $product)
                        <div class="group">
                            <div
                                class="relative aspect-[4/5] overflow-hidden rounded-2xl bg-zinc-100 dark:bg-zinc-900 mb-6 transition-transform duration-500 hover:-translate-y-2">
                                @if($product->image)
                                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                                        class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                                @else
                                    <div class="w-full h-full flex items-center justify-center text-zinc-300 dark:text-zinc-700">
                                        <svg class="w-20 h-20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                            </path>
                                        </svg>
                                    </div>
                                @endif
                                <div class="absolute top-4 right-4">
                                    <span
                                        class="px-3 py-1 bg-white/90 dark:bg-black/90 backdrop-blur rounded-full text-xs font-bold uppercase tracking-widest shadow-xl">{{ $product->category->name ?? 'General' }}</span>
                                </div>
                            </div>
                            <div class="flex justify-between items-start mb-2">
                                <h3 class="text-xl font-black uppercase tracking-tight">{{ $product->name }}</h3>
                                <span class="text-xl font-black text-red-600">${{ $product->price }}</span>
                            </div>
                            <p class="text-zinc-500 dark:text-zinc-400 text-sm font-medium line-clamp-2 mb-6">
                                {{ $product->description }}</p>
                            <button
                                class="w-full py-4 bg-zinc-900 dark:bg-white text-white dark:text-zinc-900 font-black rounded-lg transition-all hover:bg-red-600 hover:text-white active:scale-95 uppercase">
                                Add to Cart
                            </button>
                        </div>
                    @endforeach
                </div>
            @endif
        </main>

        <x-footer />
</x-layout>