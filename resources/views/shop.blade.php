<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" x-data="{ 
    darkMode: localStorage.getItem('theme') === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches),
    toggleTheme() {
        this.darkMode = !this.darkMode;
        localStorage.setItem('theme', this.darkMode ? 'dark' : 'light');
    }
}" :class="{ 'dark': darkMode }">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Shop - 7 Series Denim</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=outfit:300,400,600,700,800" rel="stylesheet" />
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
</head>

<body class="bg-slate-50 dark:bg-zinc-950 text-zinc-900 dark:text-zinc-100 font-sans transition-colors duration-500">
    <!-- Navigation (Same as welcome) -->
    <nav
        class="fixed top-0 w-full z-[100] bg-white/80 dark:bg-black/80 backdrop-blur-xl py-3 border-b border-zinc-200 dark:border-zinc-800">
        <div class="max-w-7xl mx-auto px-6 flex items-center justify-between">
            <a href="/" class="text-3xl font-black tracking-tighter text-red-600">7SERIES</a>
            <div class="hidden md:flex gap-10 items-center font-semibold text-sm tracking-wide">
                <a href="/" class="hover:text-red-600 transition-colors">HOME</a>
                <a href="/shop" class="text-red-600">SHOP</a>
            </div>
            <div class="flex items-center gap-4">
                <button @click="toggleTheme()"
                    class="p-2.5 rounded-full bg-zinc-200/50 dark:bg-zinc-800/50 hover:bg-red-100 dark:hover:bg-red-900/30 transition-all text-zinc-600 dark:text-zinc-400">
                    <svg x-show="!darkMode" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z">
                        </path>
                    </svg>
                    <svg x-show="darkMode" x-cloak class="w-5 h-5" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z">
                        </path>
                    </svg>
                </button>
            </div>
        </div>
    </nav>

    <main class="pt-32 pb-20 max-w-7xl mx-auto px-6">
        <div class="mb-16">
            <h1 class="text-6xl font-black tracking-tighter mb-4">THE <span class="text-red-600">ARCHIVE</span></h1>
            <p class="text-zinc-500 dark:text-zinc-400 font-medium max-w-xl">Explore our latest drops and architectural
                denim pieces.</p>
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
                                    class="px-3 py-1 bg-white/90 dark:bg-black/90 backdrop-blur rounded-full text-xs font-bold uppercase tracking-widest shadow-xl">{{ $product->category ?? 'General' }}</span>
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
</body>

</html>