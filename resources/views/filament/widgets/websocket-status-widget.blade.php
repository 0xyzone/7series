<x-filament-widgets::widget>
    <div wire:poll.10s class="telemetry-widget-card">
        <div class="telemetry-left">
            <div class="telemetry-header">
                <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="color: #e51e2b;">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 10V3L4 14h7v7l9-11h-7z" />
                </svg>
                <span>Daemon Telemetry & Health</span>
                <span style="color: #78716c;">·</span>
                <a href="{{ $this->manageUrl }}">Open Control Panel →</a>
            </div>

            <div class="telemetry-pills-row">
                {{-- Reverb WebSocket Pill --}}
                @if ($this->reverbRunning)
                    <span class="telemetry-pill live">
                        <span class="telemetry-dot"></span>
                        Reverb WebSocket: Live (Port 8080)
                    </span>
                @else
                    <span class="telemetry-pill offline">
                        <span class="telemetry-dot"></span>
                        Reverb WebSocket: Stopped
                    </span>
                @endif

                {{-- WhatsApp Gateway Pill --}}
                @if ($this->whatsAppStatus['running'] && $this->whatsAppStatus['status'] === 'connected')
                    <span class="telemetry-pill live">
                        <span class="telemetry-dot"></span>
                        WhatsApp: Connected (+{{ $this->whatsAppStatus['user'] }})
                    </span>
                @elseif ($this->whatsAppStatus['running'] && $this->whatsAppStatus['has_qr'])
                    <span class="telemetry-pill qr">
                        <span class="telemetry-dot"></span>
                        WhatsApp: Scan QR Required
                    </span>
                @else
                    <span class="telemetry-pill offline">
                        <span class="telemetry-dot"></span>
                        WhatsApp: Gateway Stopped
                    </span>
                @endif
            </div>
        </div>

        {{-- Action Buttons --}}
        <div class="telemetry-actions">
            @if (!$this->reverbRunning)
                <button
                    wire:click="startReverb"
                    wire:loading.attr="disabled"
                    wire:loading.class="is-loading"
                    wire:target="startReverb"
                    type="button"
                    class="daemon-btn daemon-btn-start"
                >
                    <span wire:loading.remove wire:target="startReverb" class="daemon-idle-state">
                        <svg width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span>Start Reverb</span>
                    </span>
                    <span wire:loading wire:target="startReverb" class="daemon-loading-state">
                        <svg class="animate-spin" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="3" stroke-dasharray="31.415, 31.415" stroke-linecap="round" fill="none" />
                        </svg>
                        <span>Starting...</span>
                    </span>
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
                    <span wire:loading.remove wire:target="startWhatsApp" class="daemon-idle-state">
                        <svg width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                        <span>Start WA</span>
                    </span>
                    <span wire:loading wire:target="startWhatsApp" class="daemon-loading-state">
                        <svg class="animate-spin" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="3" stroke-dasharray="31.415, 31.415" stroke-linecap="round" fill="none" />
                        </svg>
                        <span>Starting...</span>
                    </span>
                </button>
            @endif

            <a href="{{ $this->manageUrl }}" class="daemon-btn-icon" title="Supervisor Details">
                <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </a>
        </div>
    </div>
</x-filament-widgets::widget>
