<div x-data="{
        visible: true,
        init() {
            const hide = () => {
                setTimeout(() => {
                    this.visible = false;
                }, 400);
            };
            if (document.readyState === 'complete') {
                hide();
            } else {
                window.addEventListener('load', hide);
                setTimeout(hide, 1200);
            }
        }
    }"
    x-show="visible"
    x-transition:leave="transition-opacity ease-in-out duration-500"
    x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0 pointer-events-none"
    class="fixed inset-0 z-[9999] bg-white dark:bg-zinc-950 flex flex-col items-center justify-center overflow-hidden transition-colors duration-500"
    style="display: flex;">
    
    <!-- Memphis & Symbol Background Accents -->
    <div class="absolute inset-0 pointer-events-none overflow-hidden select-none">
        <!-- Floating Red 7 Watermark -->
        <img src="{{ asset('images/brand/logo-symbol.png') }}" alt="" class="absolute -top-16 -right-16 w-80 h-96 opacity-[0.04] dark:opacity-[0.06] pointer-events-none rotate-12">
        <img src="{{ asset('images/brand/logo-symbol.png') }}" alt="" class="absolute -bottom-20 -left-20 w-80 h-96 opacity-[0.03] dark:opacity-[0.05] pointer-events-none -rotate-12">
        
        <!-- Memphis Geometric Crosshairs & Badges -->
        <div class="absolute top-10 left-10 text-red-600/30 text-xs font-mono font-bold tracking-widest">+ + + RAW 14.5OZ</div>
        <div class="absolute bottom-10 right-10 text-red-600/30 text-xs font-mono font-bold tracking-widest">// 07 // SPECIMEN</div>
        <div class="absolute top-1/4 right-1/6 w-28 h-28 border border-dashed border-red-600/20 rounded-full animate-spin [animation-duration:25s]"></div>
    </div>

    <!-- Center Emblem & Reveal Animation -->
    <div class="relative z-10 flex flex-col items-center">
        <!-- Glowing Red 7 Symbol Container -->
        <div class="relative mb-5 group">
            <div class="absolute -inset-4 bg-red-600/20 dark:bg-red-600/35 blur-2xl rounded-full animate-pulse"></div>
            <img src="{{ asset('images/brand/logo-symbol.png') }}" alt="7" class="relative w-16 h-20 sm:w-20 sm:h-24 object-contain transition-transform duration-500 hover:scale-105">
        </div>

        <!-- Typography reveal -->
        <div class="text-center space-y-1.5">
            <div class="flex items-center gap-2 justify-center">
                <span class="text-xs sm:text-sm font-black tracking-[0.35em] text-zinc-950 dark:text-white uppercase">SEVEN SERIES</span>
                <span class="w-1.5 h-1.5 rounded-full bg-red-600 animate-ping"></span>
            </div>
            <p class="text-[10px] font-black tracking-[0.3em] text-red-600 uppercase">AUTHENTIC DENIM</p>
        </div>

        <!-- Sleek Loading Bar -->
        <div class="w-36 h-[2px] bg-zinc-200 dark:bg-zinc-800 rounded-full mt-6 overflow-hidden">
            <div class="h-full bg-red-600 rounded-full animate-progress-flow"></div>
        </div>
    </div>
</div>
