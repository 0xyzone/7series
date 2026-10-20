<x-filament-widgets::widget>
    <div wire:poll.10s class="daemon-widget-card">
        <div class="daemon-widget-inner">

            {{-- Left: Interactive 3D WebGL Server Node & Info --}}
            <div class="daemon-left-section">
                <div wire:ignore class="daemon-3d-box" id="threejs-daemon-container">
                    <canvas id="threejs-daemon-canvas" class="daemon-3d-canvas"></canvas>
                    <div class="daemon-3d-label">3D CORE</div>
                </div>

                <div class="daemon-info-section">
                    <div class="daemon-header-row">
                        <span class="daemon-subhead">7Series Core Daemon</span>
                        @if ($this->reverbRunning)
                            <span class="daemon-status-pill online">
                                <span class="daemon-status-dot"></span>
                                WebSocket Online
                            </span>
                        @else
                            <span class="daemon-status-pill offline">
                                <span class="daemon-status-dot"></span>
                                Offline
                            </span>
                        @endif
                    </div>
                    <h3 class="daemon-title">
                        Reverb WebSocket & WhatsApp Core
                    </h3>
                    <p class="daemon-desc">
                        Dual persistent system daemons delivering real-time notification events and automated wholesale inquiries sync.
                    </p>
                </div>
            </div>

            {{-- Right: Live Metric Chips & Quick Controls --}}
            <div class="daemon-right-section">
                <div class="daemon-chip">
                    <span class="daemon-chip-label">WebSocket Port</span>
                    <p class="daemon-chip-val {{ $this->reverbRunning ? 'highlight' : '' }}">
                        {{ $this->reverbRunning ? '8080 (Active)' : 'Closed' }}
                    </p>
                </div>

                <div class="daemon-chip">
                    <span class="daemon-chip-label">WhatsApp Gateway</span>
                    <p class="daemon-chip-val {{ ($this->whatsAppStatus['running'] && $this->whatsAppStatus['status'] === 'connected') ? 'highlight' : '' }}">
                        @if ($this->whatsAppStatus['running'] && $this->whatsAppStatus['status'] === 'connected')
                            +{{ $this->whatsAppStatus['user'] }}
                        @elseif ($this->whatsAppStatus['running'])
                            Scan QR
                        @else
                            Stopped
                        @endif
                    </p>
                </div>

                {{-- Action Controls --}}
                <div class="daemon-btn-group">
                    @if (!$this->reverbRunning)
                        <button
                            wire:click="startReverb"
                            wire:loading.attr="disabled"
                            wire:loading.class="is-loading"
                            wire:target="startReverb"
                            type="button"
                            class="daemon-btn daemon-btn-start"
                        >
                            <svg wire:loading.remove wire:target="startReverb" width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <svg wire:loading wire:target="startReverb" class="animate-spin" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="3" stroke-dasharray="31.415, 31.415" stroke-linecap="round" fill="none" />
                            </svg>
                            <span wire:loading.remove wire:target="startReverb">Start Reverb</span>
                            <span wire:loading wire:target="startReverb">Starting...</span>
                        </button>
                    @else
                        <button
                            wire:click="stopReverb"
                            wire:loading.attr="disabled"
                            wire:loading.class="is-loading"
                            wire:target="stopReverb"
                            type="button"
                            class="daemon-btn daemon-btn-stop"
                        >
                            <svg wire:loading.remove wire:target="stopReverb" width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 10a1 1 0 011-1h4a1 1 0 011 1v4a1 1 0 01-1 1h-4a1 1 0 01-1-1v-4z" />
                            </svg>
                            <svg wire:loading wire:target="stopReverb" class="animate-spin" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="3" stroke-dasharray="31.415, 31.415" stroke-linecap="round" fill="none" />
                            </svg>
                            <span wire:loading.remove wire:target="stopReverb">Stop Reverb</span>
                            <span wire:loading wire:target="stopReverb">Stopping...</span>
                        </button>
                    @endif

                    @if (!$this->whatsAppStatus['running'])
                        <button
                            wire:click="startWhatsApp"
                            wire:loading.attr="disabled"
                            wire:loading.class="is-loading"
                            wire:target="startWhatsApp"
                            type="button"
                            class="daemon-btn daemon-btn-start"
                            style="background: linear-gradient(135deg, #059669 0%, #047857 100%);"
                        >
                            <svg wire:loading.remove wire:target="startWhatsApp" width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                            <svg wire:loading wire:target="startWhatsApp" class="animate-spin" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="3" stroke-dasharray="31.415, 31.415" stroke-linecap="round" fill="none" />
                            </svg>
                            <span wire:loading.remove wire:target="startWhatsApp">Start WA</span>
                            <span wire:loading wire:target="startWhatsApp">Starting...</span>
                        </button>
                    @endif

                    <a
                        href="/mukhiya/system-services"
                        class="daemon-btn-icon"
                        title="Open Control Panel"
                    >
                        <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor">
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

                    if (typeof THREE === 'undefined') {
                        if (!document.getElementById('threejs-cdn-script')) {
                            const script = document.createElement('script');
                            script.id = 'threejs-cdn-script';
                            script.src = 'https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js';
                            script.onload = () => buildScene(canvas, isRunning);
                            document.head.appendChild(script);
                        } else {
                            setTimeout(() => {
                                if (typeof THREE !== 'undefined') buildScene(canvas, isRunning);
                            }, 100);
                        }
                    } else {
                        buildScene(canvas, isRunning);
                    }
                }

                function buildScene(canvas, isRunning) {
                    if (canvas._threeInitialized) {
                        if (canvas._threeSetState) canvas._threeSetState(isRunning);
                        return;
                    }
                    canvas._threeInitialized = true;

                    const width = 110;
                    const height = 110;

                    const scene = new THREE.Scene();
                    const camera = new THREE.PerspectiveCamera(45, width / height, 0.1, 1000);
                    camera.position.z = 4.2;

                    let renderer;
                    try {
                        renderer = new THREE.WebGLRenderer({
                            canvas: canvas,
                            alpha: true,
                            antialias: true,
                            powerPreference: 'high-performance'
                        });
                        renderer.setSize(width, height);
                        renderer.setPixelRatio(Math.min(window.devicePixelRatio, 2));
                    } catch (e) {
                        return;
                    }

                    // Lighting
                    const ambient = new THREE.AmbientLight(0xffffff, 0.9);
                    scene.add(ambient);

                    const dirLight = new THREE.DirectionalLight(0xffffff, 1.2);
                    dirLight.position.set(3, 4, 5);
                    scene.add(dirLight);

                    // Core Mesh
                    const coreGeo = new THREE.IcosahedronGeometry(1.05, 1);
                    const coreMat = new THREE.MeshStandardMaterial({
                        color: isRunning ? 0x10b981 : 0xe51e2b,
                        wireframe: true,
                        roughness: 0.3,
                        metalness: 0.8,
                    });
                    const core = new THREE.Mesh(coreGeo, coreMat);
                    scene.add(core);

                    // Inner Glow Sphere
                    const innerGeo = new THREE.SphereGeometry(0.7, 16, 16);
                    const innerMat = new THREE.MeshBasicMaterial({
                        color: isRunning ? 0x34d399 : 0xf87171,
                        transparent: true,
                        opacity: 0.25,
                    });
                    const inner = new THREE.Mesh(innerGeo, innerMat);
                    scene.add(inner);

                    // Outer Orbit Particles
                    const partCount = 45;
                    const partGeo = new THREE.BufferGeometry();
                    const partPos = new Float32Array(partCount * 3);
                    for (let i = 0; i < partCount; i++) {
                        const radius = 1.45 + Math.random() * 0.5;
                        const theta = Math.random() * Math.PI * 2;
                        const phi = Math.acos((Math.random() * 2) - 1);
                        partPos[i * 3] = radius * Math.sin(phi) * Math.cos(theta);
                        partPos[i * 3 + 1] = radius * Math.sin(phi) * Math.sin(theta);
                        partPos[i * 3 + 2] = radius * Math.cos(phi);
                    }
                    partGeo.setAttribute('position', new THREE.BufferAttribute(partPos, 3));
                    const partMat = new THREE.PointsMaterial({
                        color: isRunning ? 0x6ee7b7 : 0xfca5a5,
                        size: 0.07,
                        transparent: true,
                        opacity: 0.85
                    });
                    const particles = new THREE.Points(partGeo, partMat);
                    scene.add(particles);

                    // Mouse Interaction
                    let isDragging = false;
                    let prevMouseX = 0;
                    let prevMouseY = 0;

                    canvas.addEventListener('mousedown', (e) => {
                        isDragging = true;
                        prevMouseX = e.clientX;
                        prevMouseY = e.clientY;
                    });

                    window.addEventListener('mouseup', () => { isDragging = false; });
                    window.addEventListener('mousemove', (e) => {
                        if (!isDragging) return;
                        const dx = e.clientX - prevMouseX;
                        const dy = e.clientY - prevMouseY;
                        core.rotation.y += dx * 0.02;
                        core.rotation.x += dy * 0.02;
                        prevMouseX = e.clientX;
                        prevMouseY = e.clientY;
                    });

                    canvas._threeSetState = function(running) {
                        coreMat.color.setHex(running ? 0x10b981 : 0xe51e2b);
                        innerMat.color.setHex(running ? 0x34d399 : 0xf87171);
                        partMat.color.setHex(running ? 0x6ee7b7 : 0xfca5a5);
                    };

                    // Animation Loop
                    let reqId;
                    function animate() {
                        reqId = requestAnimationFrame(animate);
                        core.rotation.y += 0.012;
                        core.rotation.x += 0.006;
                        particles.rotation.y -= 0.005;
                        particles.rotation.z += 0.003;
                        renderer.render(scene, camera);
                    }
                    animate();
                }

                if (document.readyState === 'loading') {
                    document.addEventListener('DOMContentLoaded', initDaemon3D);
                } else {
                    initDaemon3D();
                }

                document.addEventListener('livewire:initialized', initDaemon3D);
                document.addEventListener('livewire:navigated', initDaemon3D);
            })();
        </script>
    </div>
</x-filament-widgets::widget>
