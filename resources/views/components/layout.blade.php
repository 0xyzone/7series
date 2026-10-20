<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth bg-white text-zinc-950">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $title ?? 'Seven Series Garment Industry | Authentic Jeanswear & Heavy Denim' }}</title>
    <meta name="description" content="Seven Series Garment Industry crafts authentic heavy denim apparel, supplying wholesale volumes to multi-store retailers and welcoming customers at official brand outlets.">
    
    @php
        $isLocal = \App\Helpers\FaviconHelper::isLocal();
        $favIco = \App\Helpers\FaviconHelper::getFaviconIcoUrl();
        $favPng = \App\Helpers\FaviconHelper::getFaviconPngUrl();
        $favTouch = \App\Helpers\FaviconHelper::getAppleTouchIconUrl();
        $fav192 = $isLocal ? asset('images/brand/icon-white-192.png') : asset('images/brand/icon-192.png');
    @endphp

    <!-- Brand Favicons & Icons (Red for 7series.com.np production, White for local setup) -->
    <link rel="icon" type="image/x-icon" href="{{ $favIco }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ $favIco }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ $favPng }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ $favPng }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ $fav192 }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ $favTouch }}">
    <meta name="theme-color" content="{{ $isLocal ? '#18181b' : '#dc2626' }}">

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

        @keyframes progress-flow {
            0% { transform: translateX(-100%); width: 25%; }
            50% { width: 55%; }
            100% { transform: translateX(350%); width: 25%; }
        }
        .animate-progress-flow {
            animation: progress-flow 1.2s cubic-bezier(0.65, 0, 0.35, 1) infinite;
        }
    </style>
</head>

<body
    class="bg-white text-zinc-950 font-sans antialiased selection:bg-red-600 selection:text-white overflow-x-hidden">
    <x-preloader />
    {{ $slot }}
</body>

</html>