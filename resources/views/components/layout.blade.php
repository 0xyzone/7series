<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" x-data="{ 
    darkMode: localStorage.getItem('theme') === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches),
    toggleTheme() {
        this.darkMode = !this.darkMode;
        localStorage.setItem('theme', this.darkMode ? 'dark' : 'light');
    }
}" :class="{ 'dark': darkMode }" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Seven Series Garment Industry | Precision Apparel for Wholesalers & Retailers' }}</title>
    <meta name="description" content="Seven Series Garment Industry is the technology-driven apparel manufacturer engineered like Apple and scaled like Xiaomi. Supplying high-grade denim, technical fabrics, and bulk apparel to global retailers and wholesalers.">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=outfit:300,400,500,600,700,800,900|space-grotesk:500,700" rel="stylesheet" />
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        [x-cloak] {
            display: none !important;
        }

        .text-glow {
            text-shadow: 0 0 15px rgba(220, 38, 38, 0.45);
        }

        .text-glow-white {
            text-shadow: 0 0 20px rgba(255, 255, 255, 0.4);
        }

        .bg-glass {
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            background-color: rgba(255, 255, 255, 0.75);
        }

        .dark .bg-glass {
            background-color: rgba(9, 9, 11, 0.78);
        }

        .hero-grid {
            background-image: linear-gradient(to right, rgba(220, 38, 38, 0.08) 1px, transparent 1px),
                              linear-gradient(to bottom, rgba(220, 38, 38, 0.08) 1px, transparent 1px);
            background-size: 60px 60px;
        }

        .dark .hero-grid {
            background-image: linear-gradient(to right, rgba(255, 255, 255, 0.04) 1px, transparent 1px),
                              linear-gradient(to bottom, rgba(255, 255, 255, 0.04) 1px, transparent 1px);
            background-size: 60px 60px;
        }
    </style>
</head>

<body
    class="bg-slate-50 dark:bg-zinc-950 text-zinc-900 dark:text-zinc-100 font-sans transition-colors duration-500 overflow-x-hidden">
    {{ $slot }}
</body>

</html>