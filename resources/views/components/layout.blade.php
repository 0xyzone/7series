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
    <title>{{ $title ?? '7 Series Denim' }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=outfit:300,400,600,700,800|playfair-display:700,900"
        rel="stylesheet" />
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        [x-cloak] {
            display: none !important;
        }

        .text-glow {
            text-shadow: 0 0 10px rgba(220, 38, 38, 0.5);
        }

        .bg-glass {
            @apply backdrop-blur-lg bg-white/70 dark:bg-black/70;
        }

        .hero-pattern {
            background-image: radial-gradient(circle at 2px 2px, rgba(220, 38, 38, 0.1) 1px, transparent 0);
            background-size: 40px 40px;
        }
    </style>
</head>

<body
    class="bg-slate-50 dark:bg-zinc-950 text-zinc-900 dark:text-zinc-100 font-sans transition-colors duration-500 overflow-x-hidden">
    {{ $slot }}
</body>

</html>