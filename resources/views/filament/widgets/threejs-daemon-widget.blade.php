<x-filament-widgets::widget>
    <div wire:poll.10s class="daemon-widget-card">
        <div class="daemon-widget-inner">

            {{-- Left: Branded Daemon Telemetry Node & System Health --}}
            <div class="daemon-left-section">
                <div class="daemon-telemetry-beacon {{ $this->reverbRunning ? 'online' : 'offline' }}">
                    <div class="beacon-halo"></div>
                    <div class="beacon-inner-core">
                        @if ($this->reverbRunning)
                            {{-- Online Glowing Signal Pulse Icon --}}
                            <svg class="beacon-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                        @else
                            {{-- Standby Daemon Icon --}}
                            <svg class="beacon-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.636 18.364a9 9 0 010-12.728m12.728 0a9 9 0 010 12.728m-9.9-2.828a5 5 0 010-7.072m7.072 0a5 5 0 010 7.072M12 12h.01" />
                            </svg>
                        @endif
                    </div>
                    <span class="beacon-tag">{{ $this->reverbRunning ? 'LIVE' : 'STANDBY' }}</span>
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
    </div>
</x-filament-widgets::widget>
