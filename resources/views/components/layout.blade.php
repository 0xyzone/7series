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
    <link href="https://fonts.bunny.net/css?family=poppins:300,400,500,600,700,800,900|inter:400,500,600,700|space-grotesk:500,700" rel="stylesheet" />
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
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
            border-radius: 24px;
            background: #ffffff;
            border: 1px solid rgba(226, 232, 240, 0.9);
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.04), 0 8px 10px -6px rgba(0, 0, 0, 0.02);
            transition: all 0.25s cubic-bezier(0.16, 1, 0.3, 1);
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
    class="bg-white text-zinc-950 font-sans antialiased selection:bg-red-600 selection:text-white overflow-x-hidden">
    <x-preloader />
    {{ $slot }}
</body>

</html>