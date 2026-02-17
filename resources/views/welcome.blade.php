<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>7 Series Denim - Premium Fashion Garments</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=poppins:300,400,600,700,800|playfair-display:700,800" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white dark:bg-black text-black dark:text-white font-sans">
    <!-- Navigation -->
    <nav class="fixed top-0 w-full z-50 backdrop-blur-md bg-white/80 dark:bg-black/80 border-b border-red-200 dark:border-red-900">
        <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">
            <div class="text-3xl font-black text-red-600">7SERIES</div>
            <div class="flex gap-8 items-center">
                <a href="#collections" class="hover:text-red-600 transition">Collections</a>
                <a href="#features" class="hover:text-red-600 transition">About</a>
                <a href="#contact" class="hover:text-red-600 transition">Contact</a>
                <button class="px-6 py-2 bg-red-600 text-white rounded-full hover:bg-red-700 transition transform hover:scale-105">Shop Now</button>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="bg-linear-to-br from-black via-red-900 to-black relative overflow-hidden py-60">
        <!-- Animated background elements -->
        <div class="absolute top-10 left-5 w-72 h-72 bg-red-600 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-pulse"></div>
        <div class="absolute top-40 right-5 w-72 h-72 bg-red-400 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-bounce" style="animation-delay: 2s;"></div>

        <div class="max-w-7xl mx-auto px-6 h-full flex items-center relative z-10">
            <div class="grid grid-cols-2 gap-12 items-center w-full">
                <!-- Left Content -->
                <div class="text-white space-y-8 animate-fade-in">
                    <div class="space-y-4">
                        <p class="text-red-400 font-bold text-lg tracking-widest animate-slide-right">PREMIUM DENIM COLLECTION</p>
                        <h1 class="text-6xl md:text-7xl font-black leading-tight animate-slide-up" style="animation-delay: 0.2s;">
                            7 Series<br>
                            <span class="text-red-600">DENIM</span>
                        </h1>
                        <p class="text-xl text-gray-300 max-w-md animate-fade-in" style="animation-delay: 0.4s;">
                            Elevate your style with our meticulously crafted denim. Where quality meets fashion.
                        </p>
                    </div>
                    <div class="flex gap-6 animate-fade-in" style="animation-delay: 0.6s;">
                        <button class="px-8 py-4 bg-red-600 text-white font-bold rounded-full hover:bg-red-700 transition transform hover:scale-110 hover:shadow-lg hover:shadow-red-600/50">
                            Explore Collection
                        </button>
                        <button class="px-8 py-4 border-2 border-white text-white font-bold rounded-full hover:bg-white hover:text-black transition transform hover:scale-110">
                            Learn More
                        </button>
                    </div>
                </div>

                <!-- Right Visual -->
                <div class="relative h-96 animate-float">
                    <div class="absolute inset-0 bg-linear-to-br from-red-600 to-red-900 rounded-lg transform rotate-3 opacity-70"></div>
                    <div class="absolute inset-4 bg-black rounded-lg flex items-center justify-center overflow-hidden">
                        <div class="text-center space-y-4">
                            <div class="text-6xl font-black text-red-600">7</div>
                            <p class="text-2xl font-bold text-white">PREMIUM COLLECTION</p>
                            <p class="text-gray-400">Est. 2024</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Collections Section -->
    <section id="collections" class="py-24 bg-white dark:bg-gray-900">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center space-y-4 mb-16">
                <p class="text-red-600 font-bold tracking-widest">OUR COLLECTIONS</p>
                <h2 class="text-5xl font-black">Crafted to Perfection</h2>
            </div>
            <div class="grid grid-cols-3 gap-8">
                <!-- Product Card 1 -->
                <div class="group cursor-pointer transform transition hover:scale-105 duration-300">
                    <div class="relative bg-black rounded-lg overflow-hidden h-96 mb-4 flex items-center justify-center">
                        <div class="absolute inset-0 bg-linear-to-br from-red-600 to-black opacity-0 group-hover:opacity-100 transition duration-300"></div>
                        <div class="relative z-10 text-center space-y-2">
                            <div class="text-6xl font-black text-red-600 group-hover:text-white transition">
                                01
                            </div>
                            <p class="text-white font-bold">CLASSIC</p>
                        </div>
                    </div>
                    <h3 class="text-2xl font-bold mb-2">Classic Denim</h3>
                    <p class="text-gray-600 dark:text-gray-400 mb-4">Timeless design with premium craftsmanship</p>
                    <button class="text-red-600 font-bold hover:gap-2 flex items-center transition group-hover:translate-x-1">
                        Shop Now → 
                    </button>
                </div>

                <!-- Product Card 2 -->
                <div class="group cursor-pointer transform transition hover:scale-105 duration-300">
                    <div class="relative bg-black rounded-lg overflow-hidden h-96 mb-4 flex items-center justify-center">
                        <div class="absolute inset-0 bg-linear-to-br from-red-500 to-black opacity-0 group-hover:opacity-100 transition duration-300"></div>
                        <div class="relative z-10 text-center space-y-2">
                            <div class="text-6xl font-black text-red-600 group-hover:text-white transition">
                                02
                            </div>
                            <p class="text-white font-bold">ESSENTIAL</p>
                        </div>
                    </div>
                    <h3 class="text-2xl font-bold mb-2">Essential Fit</h3>
                    <p class="text-gray-600 dark:text-gray-400 mb-4">Perfect fit for everyday elegance</p>
                    <button class="text-red-600 font-bold hover:gap-2 flex items-center transition group-hover:translate-x-1">
                        Shop Now → 
                    </button>
                </div>

                <!-- Product Card 3 -->
                <div class="group cursor-pointer transform transition hover:scale-105 duration-300">
                    <div class="relative bg-black rounded-lg overflow-hidden h-96 mb-4 flex items-center justify-center">
                        <div class="absolute inset-0 bg-linear-to-br from-red-700 to-black opacity-0 group-hover:opacity-100 transition duration-300"></div>
                        <div class="relative z-10 text-center space-y-2">
                            <div class="text-6xl font-black text-red-600 group-hover:text-white transition">
                                03
                            </div>
                            <p class="text-white font-bold">PREMIUM</p>
                        </div>
                    </div>
                    <h3 class="text-2xl font-bold mb-2">Premium Collection</h3>
                    <p class="text-gray-600 dark:text-gray-400 mb-4">Luxury meets style in every piece</p>
                    <button class="text-red-600 font-bold hover:gap-2 flex items-center transition group-hover:translate-x-1">
                        Shop Now → 
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="py-24 bg-linear-to-br from-red-600 to-red-900 text-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center space-y-4 mb-16">
                <h2 class="text-5xl font-black">Why Choose 7 Series</h2>
            </div>
            <div class="grid grid-cols-4 gap-8">
                <div class="text-center space-y-4 p-6 rounded-lg bg-white/10 backdrop-blur hover:bg-white/20 transition transform hover:scale-110">
                    <div class="text-4xl">👔</div>
                    <h3 class="text-xl font-bold">Premium Quality</h3>
                    <p class="text-gray-100">Finest materials sourced globally</p>
                </div>
                <div class="text-center space-y-4 p-6 rounded-lg bg-white/10 backdrop-blur hover:bg-white/20 transition transform hover:scale-110">
                    <div class="text-4xl">✂️</div>
                    <h3 class="text-xl font-bold">Perfect Fit</h3>
                    <p class="text-gray-100">Expert tailoring for every body type</p>
                </div>
                <div class="text-center space-y-4 p-6 rounded-lg bg-white/10 backdrop-blur hover:bg-white/20 transition transform hover:scale-110">
                    <div class="text-4xl">🌱</div>
                    <h3 class="text-xl font-bold">Sustainable</h3>
                    <p class="text-gray-100">Eco-friendly production methods</p>
                </div>
                <div class="text-center space-y-4 p-6 rounded-lg bg-white/10 backdrop-blur hover:bg-white/20 transition transform hover:scale-110">
                    <div class="text-4xl">🚚</div>
                    <h3 class="text-xl font-bold">Fast Shipping</h3>
                    <p class="text-gray-100">Worldwide delivery in 5-7 days</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section id="contact" class="py-24 bg-black text-white relative overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-0 left-1/4 w-96 h-96 bg-red-600 rounded-full blur-3xl"></div>
            <div class="absolute bottom-0 right-1/4 w-96 h-96 bg-red-600 rounded-full blur-3xl"></div>
        </div>
        <div class="max-w-4xl mx-auto px-6 relative z-10 text-center space-y-8">
            <h2 class="text-5xl font-black">Ready to Elevate Your Style?</h2>
            <p class="text-xl text-gray-400 max-w-2xl mx-auto">
                Join thousands of fashion enthusiasts who have discovered the perfect denim with 7 Series
            </p>
            <div class="flex gap-6 justify-center flex-wrap">
                <button class="px-8 py-4 bg-red-600 text-white font-bold rounded-full hover:bg-red-700 transition transform hover:scale-110 hover:shadow-lg hover:shadow-red-600/50">
                    Shop Collection
                </button>
                <button class="px-8 py-4 border-2 border-red-600 text-red-600 font-bold rounded-full hover:bg-red-600 hover:text-white transition transform hover:scale-110">
                    Get Newsletter
                </button>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-black border-t border-red-900 text-gray-400 py-12">
        <div class="max-w-7xl mx-auto px-6 grid grid-cols-4 gap-8 mb-8">
            <div>
                <h4 class="text-white font-bold mb-4">7 SERIES</h4>
                <p class="text-sm">Premium denim crafted for perfection.</p>
            </div>
            <div>
                <h4 class="text-white font-bold mb-4">Quick Links</h4>
                <ul class="space-y-2 text-sm">
                    <li><a href="#" class="hover:text-red-600 transition">Shop</a></li>
                    <li><a href="#" class="hover:text-red-600 transition">About Us</a></li>
                    <li><a href="#" class="hover:text-red-600 transition">Contact</a></li>
                </ul>
            </div>
            <div>
                <h4 class="text-white font-bold mb-4">Follow Us</h4>
                <ul class="space-y-2 text-sm">
                    <li><a href="#" class="hover:text-red-600 transition">Instagram</a></li>
                    <li><a href="#" class="hover:text-red-600 transition">Facebook</a></li>
                    <li><a href="#" class="hover:text-red-600 transition">Twitter</a></li>
                </ul>
            </div>
            <div>
                <h4 class="text-white font-bold mb-4">Support</h4>
                <ul class="space-y-2 text-sm">
                    <li><a href="#" class="hover:text-red-600 transition">FAQ</a></li>
                    <li><a href="#" class="hover:text-red-600 transition">Shipping Info</a></li>
                    <li><a href="#" class="hover:text-red-600 transition">Returns</a></li>
                </ul>
            </div>
        </div>
        <div class="border-t border-red-900 pt-8 text-center text-sm">
            <p>&copy; 2024 7 Series Denim. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
