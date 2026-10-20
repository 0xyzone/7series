<x-filament-widgets::widget>
    <div wire:poll.10s class="relative overflow-hidden rounded-2xl border border-stone-200/80 bg-gradient-to-br from-stone-50 via-white to-stone-100/60 p-5 shadow-sm transition-all dark:border-stone-800/80 dark:from-[#181615] dark:via-[#131110] dark:to-[#0f0e0d] dark:shadow-2xl">
        {{-- Subtle Warm Ambient Glow --}}
        <div class="pointer-events-none absolute -right-20 -top-20 h-64 w-64 rounded-full bg-red-600/10 blur-3xl dark:bg-red-600/15"></div>
        <div class="pointer-events-none absolute -bottom-20 -left-20 h-64 w-64 rounded-full bg-amber-600/10 blur-3xl dark:bg-amber-600/10"></div>

        <div class="relative z-10 flex flex-col gap-6 lg:flex-row lg:items-center lg:justify-between">

            {{-- Left: Interactive 3D WebGL Server Node --}}
            <div class="flex items-center gap-4">
                <div class="relative h-28 w-28 shrink-0 overflow-hidden rounded-2xl border border-stone-200 bg-stone-900 shadow-inner dark:border-stone-800" id="threejs-daemon-container">
                    <canvas id="threejs-daemon-canvas" class="h-full w-full cursor-grab active:cursor-grabbing"></canvas>
                    <div class="pointer-events-none absolute bottom-1.5 left-0 right-0 text-center text-[9px] font-bold tracking-widest text-stone-400">
                        3D NODE
                    </div>
                </div>

                <div class="space-y-1">
                    <div class="flex items-center gap-2">
                        <span class="text-xs font-bold uppercase tracking-wider text-stone-500 dark:text-stone-400">7Series Core Daemon</span>
                        @if ($this->reverbRunning)
                            <span class="inline-flex items-center gap-1 rounded-full bg-emerald-50 px-2 py-0.5 text-[10px] font-bold text-emerald-700 ring-1 ring-inset ring-emerald-600/20 dark:bg-emerald-950/60 dark:text-emerald-400">
                                <span class="h-1.5 w-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                                WEBSOCKET ONLINE
                            </span>
                        @else
                            <span class="inline-flex items-center gap-1 rounded-full bg-rose-50 px-2 py-0.5 text-[10px] font-bold text-rose-700 ring-1 ring-inset ring-rose-600/20 dark:bg-rose-950/60 dark:text-rose-400">
                                <span class="h-1.5 w-1.5 rounded-full bg-rose-500"></span>
                                OFFLINE
                            </span>
                        @endif
                    </div>
                    <h3 class="text-lg font-black tracking-tight text-stone-900 dark:text-stone-100">
                        Reverb WebSocket & WhatsApp Core
                    </h3>
                    <p class="text-xs text-stone-500 dark:text-stone-400 max-w-md leading-relaxed">
                        Dual persistent daemons delivering zero-latency broadcast events and instant automated customer confirmation messaging.
                    </p>
                </div>
            </div>

            {{-- Right: Live Metric Chips & Quick Controls --}}
            <div class="flex flex-col gap-3 sm:flex-row sm:items-center">
                {{-- Live Chips --}}
                <div class="grid grid-cols-2 gap-2 text-xs">
                    <div class="rounded-xl border border-stone-200/80 bg-white/80 p-2.5 backdrop-blur-sm dark:border-stone-800/80 dark:bg-stone-900/60">
                        <span class="text-[10px] uppercase font-bold tracking-wider text-stone-400">WebSocket Port</span>
                        <p class="font-mono font-bold text-stone-800 dark:text-stone-200">
                            {{ $this->reverbRunning ? '8080 (Active)' : 'Closed' }}
                        </p>
                    </div>

                    <div class="rounded-xl border border-stone-200/80 bg-white/80 p-2.5 backdrop-blur-sm dark:border-stone-800/80 dark:bg-stone-900/60">
                        <span class="text-[10px] uppercase font-bold tracking-wider text-stone-400">WhatsApp Gateway</span>
                        <p class="font-mono font-bold text-emerald-600 dark:text-emerald-400 truncate max-w-[130px]">
                            @if ($this->whatsAppStatus['running'] && $this->whatsAppStatus['status'] === 'connected')
                                +{{ $this->whatsAppStatus['user'] }}
                            @elseif ($this->whatsAppStatus['running'])
                                Scan QR
                            @else
                                Stopped
                            @endif
                        </p>
                    </div>
                </div>

                {{-- Action Triggers --}}
                <div class="flex items-center gap-2">
                    @if (!$this->reverbRunning)
                        <button
                            wire:click="startReverb"
                            type="button"
                            class="inline-flex items-center gap-1.5 rounded-xl bg-gradient-to-r from-red-600 to-rose-600 px-4 py-2.5 text-xs font-bold text-white shadow-md shadow-red-600/25 transition-all hover:scale-105 active:scale-95 hover:from-red-500 hover:to-rose-500"
                        >
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            Start Reverb
                        </button>
                    @else
                        <button
                            wire:click="stopReverb"
                            type="button"
                            class="inline-flex items-center gap-1.5 rounded-xl border border-stone-300 bg-white/80 px-3.5 py-2.5 text-xs font-bold text-stone-700 shadow-sm transition-all hover:bg-rose-50 hover:text-rose-600 active:scale-95 dark:border-stone-800 dark:bg-stone-900/60 dark:text-stone-300 dark:hover:bg-rose-950/40 dark:hover:text-rose-400"
                        >
                            Stop Reverb
                        </button>
                    @endif

                    @if (!$this->whatsAppStatus['running'])
                        <button
                            wire:click="startWhatsApp"
                            type="button"
                            class="inline-flex items-center gap-1.5 rounded-xl bg-gradient-to-r from-emerald-600 to-teal-600 px-3.5 py-2.5 text-xs font-bold text-white shadow-md shadow-emerald-600/25 transition-all hover:scale-105 active:scale-95"
                        >
                            Start WA
                        </button>
                    @endif

                    <a
                        href="{{ $this->manageUrl }}"
                        class="inline-flex items-center justify-center rounded-xl border border-stone-200 bg-white p-2.5 text-stone-600 shadow-sm transition-all hover:bg-stone-50 hover:text-stone-900 active:scale-95 dark:border-stone-800 dark:bg-stone-900/60 dark:text-stone-300 dark:hover:bg-stone-800"
                        title="Open Control Panel"
                    >
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </a>
                </div>
            </div>

        </div>

        {{-- Embedded Three.js 3D WebGL Engine --}}
        <script>
            (function() {
                function initDaemon3D() {
                    const canvas = document.getElementById('threejs-daemon-canvas');
                    if (!canvas) return;

                    const isRunning = {{ $this->reverbRunning ? 'true' : 'false' }};
                    const width = canvas.clientWidth || 112;
                    const height = canvas.clientHeight || 112;

                    // Load Three.js dynamically if not already loaded
                    if (typeof THREE === 'undefined') {
                        const script = document.createElement('script');
                        script.src = 'https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js';
                        script.onload = () => buildScene(canvas, isRunning);
                        document.head.appendChild(script);
                    } else {
                        buildScene(canvas, isRunning);
                    }
                }

                function buildScene(canvas, isRunning) {
                    if (canvas._threeLoaded) return;
                    canvas._threeLoaded = true;

                    const width = canvas.clientWidth || 112;
                    const height = canvas.clientHeight || 112;

                    const scene = new THREE.Scene();
                    const camera = new THREE.PerspectiveCamera(45, width / height, 0.1, 100);
                    camera.position.z = 4.2;

                    const renderer = new THREE.WebGLRenderer({ canvas: canvas, alpha: true, antialias: true });
                    renderer.setSize(width, height);
                    renderer.setPixelRatio(Math.min(window.devicePixelRatio, 2));

                    // Core Wireframe Icosahedron
                    const geometry = new THREE.IcosahedronGeometry(1.2, 1);
                    const coreColor = isRunning ? 0x10b981 : 0xe51e2b;
                    const material = new THREE.MeshBasicMaterial({
                        color: coreColor,
                        wireframe: true,
                        transparent: true,
                        opacity: isRunning ? 0.85 : 0.4
                    });
                    const sphere = new THREE.Mesh(geometry, material);
                    scene.add(sphere);

                    // Inner glowing nucleus
                    const innerGeom = new THREE.SphereGeometry(0.5, 16, 16);
                    const innerMat = new THREE.MeshBasicMaterial({
                        color: isRunning ? 0x34d399 : 0xf87171,
                        transparent: true,
                        opacity: isRunning ? 0.9 : 0.3
                    });
                    const nucleus = new THREE.Mesh(innerGeom, innerMat);
                    scene.add(nucleus);

                    // Orbiting particle ring
                    const ringGeom = new THREE.RingGeometry(1.6, 1.68, 32);
                    const ringMat = new THREE.MeshBasicMaterial({
                        color: isRunning ? 0x6ee7b7 : 0xfca5a5,
                        side: THREE.DoubleSide,
                        transparent: true,
                        opacity: isRunning ? 0.6 : 0.2
                    });
                    const ring = new THREE.Mesh(ringGeom, ringMat);
                    ring.rotation.x = Math.PI / 3;
                    scene.add(ring);

                    // Interactive touch / mouse rotation
                    let isDragging = false;
                    let previousMousePosition = { x: 0, y: 0 };

                    canvas.addEventListener('mousedown', (e) => {
                        isDragging = true;
                        previousMousePosition = { x: e.clientX, y: e.clientY };
                    });

                    window.addEventListener('mouseup', () => { isDragging = false; });

                    canvas.addEventListener('mousemove', (e) => {
                        if (!isDragging) return;
                        const deltaX = e.clientX - previousMousePosition.x;
                        const deltaY = e.clientY - previousMousePosition.y;

                        sphere.rotation.y += deltaX * 0.02;
                        sphere.rotation.x += deltaY * 0.02;
                        ring.rotation.z += deltaX * 0.02;

                        previousMousePosition = { x: e.clientX, y: e.clientY };
                    });

                    // Animation Loop
                    let clock = new THREE.Clock();
                    function animate() {
                        requestAnimationFrame(animate);
                        const elapsedTime = clock.getElapsedTime();

                        if (!isDragging) {
                            sphere.rotation.y += isRunning ? 0.015 : 0.004;
                            sphere.rotation.x += isRunning ? 0.008 : 0.002;
                            ring.rotation.z -= isRunning ? 0.02 : 0.005;
                        }

                        // Pulse scale
                        const pulse = 1 + Math.sin(elapsedTime * (isRunning ? 4 : 1.5)) * 0.06;
                        nucleus.scale.set(pulse, pulse, pulse);

                        renderer.render(scene, camera);
                    }

                    animate();
                }

                if (document.readyState === 'loading') {
                    document.addEventListener('DOMContentLoaded', initDaemon3D);
                } else {
                    initDaemon3D();
                }

                document.addEventListener('livewire:navigated', initDaemon3D);
            })();
        </script>
    </div>
</x-filament-widgets::widget>
