@props([
    'title' => null,
    'description' => null,
    'image' => null,
    'imageAlt' => null,
])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth bg-white text-zinc-950 overflow-x-hidden">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5">

    @php
        $pageTitle = $title ?? 'Seven Series Garment Industry | Authentic Denim Jeans & Clothing Factory';
        $pageDescription = $description ?? 'Seven Series crafts authentic heavyweight denim jeans and casual apparel. Supplying bulk wholesale orders to retailers and welcoming shoppers at official brand stores.';
        $rawImage = $image ?? asset('images/og-home.jpg');
        $pageImage = str_starts_with($rawImage, 'http') ? $rawImage : url($rawImage);
        $pageImageAlt = $imageAlt ?? 'Seven Series Big Logo with Screenshot of the Homepage Denim Jeans Showcase';
        $currentUrl = url()->current();
        $isPng = str_ends_with(strtolower($pageImage), '.png');
        $imageType = $isPng ? 'image/png' : 'image/jpeg';

        $isLocal = \App\Helpers\FaviconHelper::isLocal();
        $favIco = \App\Helpers\FaviconHelper::getFaviconIcoUrl();
        $favPng = \App\Helpers\FaviconHelper::getFaviconPngUrl();
        $favTouch = \App\Helpers\FaviconHelper::getAppleTouchIconUrl();
        $fav192 = $isLocal ? asset('images/brand/icon-white-192.png') : asset('images/brand/icon-192.png');
    @endphp

    <title>{{ $pageTitle }}</title>
    <meta name="description" content="{{ $pageDescription }}">
    <link rel="canonical" href="{{ $currentUrl }}">

    <!-- Open Graph / Facebook / WhatsApp / Instagram / LinkedIn -->
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Seven Series Garment Industry">
    <meta property="og:url" content="{{ $currentUrl }}">
    <meta property="og:title" content="{{ $pageTitle }}">
    <meta property="og:description" content="{{ $pageDescription }}">
    <meta property="og:image" content="{{ $pageImage }}">
    <meta property="og:image:secure_url" content="{{ $pageImage }}">
    <meta property="og:image:type" content="{{ $imageType }}">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:image:alt" content="{{ $pageImageAlt }}">
    <meta property="og:locale" content="en_US">

    <!-- Twitter / X -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="{{ $currentUrl }}">
    <meta name="twitter:title" content="{{ $pageTitle }}">
    <meta name="twitter:description" content="{{ $pageDescription }}">
    <meta name="twitter:image" content="{{ $pageImage }}">
    <meta name="twitter:image:alt" content="{{ $pageImageAlt }}">

    <!-- Brand Favicons & Icons (Red for 7series.com.np production, White for local setup) -->
    <link rel="icon" type="image/x-icon" href="{{ $favIco }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ $favIco }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ $favPng }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ $favPng }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ $fav192 }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ $favTouch }}">
    <meta name="theme-color" content="{{ $isLocal ? '#18181b' : '#dc2626' }}">

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=poppins:300,400,500,600,700,800,900|inter:400,500,600,700|space-grotesk:500,700" rel="stylesheet" />
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @if (app()->environment('local'))
        <script src="{{ asset('js/dev-reloader.js') }}?v={{ filemtime(public_path('js/dev-reloader.js')) }}" defer></script>
    @endif
    <style>
        [x-cloak] {
            display: none !important;
        }

        body {
            font-family: 'Poppins', system-ui, -apple-system, sans-serif;
        }

        .font-mono {
            font-family: 'Space Grotesk', monospace;
        }

        .text-glow {
            text-shadow: 0 0 15px rgba(229, 30, 43, 0.4);
        }

        .app-card {
            border-radius: 20px;
            border: 1px solid rgba(226, 232, 240, 0.9);
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.04), 0 8px 10px -6px rgba(0, 0, 0, 0.02);
            transition: all 0.25s cubic-bezier(0.16, 1, 0.3, 1);
            max-width: 100%;
        }

        .app-card:not([class*="bg-"]) {
            background-color: #ffffff;
        }

        @media (min-width: 640px) {
            .app-card {
                border-radius: 24px;
            }
        }

        .app-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 20px 30px -10px rgba(0, 0, 0, 0.08);
            border-color: rgba(229, 30, 43, 0.3);
        }

        .app-glass {
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            background-color: rgba(255, 255, 255, 0.88);
            border: 1px solid rgba(255, 255, 255, 0.8);
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
    class="bg-white text-zinc-950 font-sans antialiased selection:bg-red-600 selection:text-white overflow-x-clip">
    <x-preloader />

    <!-- Ambient 3D Brand Symbol Depth Canvas -->
    <canvas id="ambient-3d-canvas" class="pointer-events-none fixed inset-0 z-0 w-full h-full opacity-70 transition-opacity duration-700"></canvas>

    <div id="app-viewport" class="relative z-10">
        <div id="app-page-view">
            {{ $slot }}
        </div>
    </div>

    <x-nav />
</body>

</html>