<x-filament-panels::page>
    <div wire:poll.8s class="sys-page-container">

        {{-- Top Description & Automated Daemon Banner --}}
        <div class="sys-supervisor-banner">
            <div>
                <h2 class="sys-banner-title">
                    Background Daemon & WebSocket Supervisor
                </h2>
                <p class="sys-banner-desc">
                    Manages real-time WebSockets via Laravel Reverb and automated client messaging via Baileys WhatsApp Gateway. Both daemons are monitored by the 24/7 keep-alive schedule.
                </p>
            </div>
            <div class="sys-banner-status">
                <span class="telemetry-pill live">
                    <span class="telemetry-dot"></span>
                    Cron Keep-Alive: Active
                </span>
                <button wire:click="$refresh" type="button" class="sys-sync-btn">
                    <svg width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                    </svg>
                    Sync
                </button>
            </div>
        </div>

        {{-- 2 Columns: Reverb & WhatsApp --}}
        <div class="sys-grid">

            {{-- 1. LARAVEL REVERB CARD --}}
            <div class="sys-card">
                <div>
                    <div class="sys-card-header">
                        <div class="sys-card-header-left">
                            <div class="sys-icon-badge red">
                                <svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 10V3L4 14h7v7l9-11h-7z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="sys-card-title">Laravel Reverb</h3>
                                <p class="sys-card-sub">High-Performance WebSocket Server</p>
                            </div>
                        </div>

                        @if ($this->reverbDetails['running'])
                            <span class="telemetry-pill live">
                                <span class="telemetry-dot"></span>
                                Live & Listening
                            </span>
                        @else
                            <span class="telemetry-pill offline">
                                <span class="telemetry-dot"></span>
                                Stopped
                            </span>
                        @endif
                    </div>

                    {{-- Metrics & Settings --}}
                    <div class="sys-metrics-grid">
                        <div class="sys-metric-cell">
                            <span class="sys-metric-cell-label">Port</span>
                            <p class="sys-metric-cell-val">{{ $this->reverbDetails['port'] }}</p>
                        </div>
                        <div class="sys-metric-cell">
                            <span class="sys-metric-cell-label">Host</span>
                            <p class="sys-metric-cell-val">{{ $this->reverbDetails['host'] }}</p>
                        </div>
                        <div class="sys-metric-cell">
                            <span class="sys-metric-cell-label">App ID</span>
                            <p class="sys-metric-cell-val">{{ $this->reverbDetails['app_id'] ?? 'Configured' }}</p>
                        </div>
                        <div class="sys-metric-cell">
                            <span class="sys-metric-cell-label">Protocol</span>
                            <p class="sys-metric-cell-val">Pusher / RFC6455</p>
                        </div>
                    </div>

                    {{-- Recent Reverb Output --}}
                    @if (!empty($this->reverbDetails['logs']))
                        <div class="sys-terminal-wrap">
                            <label class="sys-terminal-label">Recent Server Output</label>
                            <pre class="sys-terminal-box">{{ $this->reverbDetails['logs'] }}</pre>
                        </div>
                    @endif
                </div>

                {{-- Action Controls --}}
                <div class="sys-card-footer">
                    <span class="sys-footer-label">Control Reverb Process</span>
                    <div class="daemon-btn-group">
                        @if (!$this->reverbDetails['running'])
                            <button
                                wire:click="startReverb"
                                type="button"
                                class="daemon-btn daemon-btn-start"
                            >
                                <svg width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                Start Reverb
                            </button>
                        @else
                            <button
                                wire:click="stopReverb"
                                type="button"
                                class="daemon-btn daemon-btn-stop"
                            >
                                <svg width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 10a1 1 0 011-1h4a1 1 0 011 1v4a1 1 0 01-1 1h-4a1 1 0 01-1-1v-4z" />
                                </svg>
                                Stop Reverb
                            </button>
                        @endif
                    </div>
                </div>
            </div>

            {{-- 2. WHATSAPP GATEWAY (BAILEYS) CARD --}}
            <div class="sys-card">
                <div>
                    <div class="sys-card-header">
                        <div class="sys-card-header-left">
                            <div class="sys-icon-badge green">
                                <svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.77-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.299.045-.677.063-1.092-.069-.252-.08-.575-.187-.988-.365-1.739-.751-2.874-2.502-2.961-2.617-.087-.116-.708-.94-.708-1.793s.448-1.273.607-1.446c.159-.173.346-.217.462-.217l.332.006c.106.005.249-.04.39.298.144.347.491 1.2.534 1.287.043.087.072.188.014.304-.058.116-.087.188-.173.289l-.26.304c-.087.086-.177.18-.076.354.101.174.449.741.964 1.201.662.591 1.221.774 1.394.86.174.086.275.072.376-.043.101-.116.433-.506.549-.68.116-.173.231-.145.39-.087s1.011.477 1.184.564.289.13.332.202c.043.073.043.419-.101.825z" />
                                    <path d="M12 2C6.477 2 2 6.477 2 12c0 1.891.528 3.66 1.445 5.174L2 22l4.957-1.411A9.957 9.957 0 0012 22c5.523 0 10-4.477 10-10S17.523 2 12 2zm0 18.167c-1.63 0-3.149-.49-4.42-1.331l-.317-.208-2.956.842.846-2.903-.223-.331A8.125 8.125 0 013.833 12c0-4.503 3.664-8.167 8.167-8.167 4.503 0 8.167 3.664 8.167 8.167 0 4.503-3.664 8.167-8.167 8.167z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="sys-card-title">WhatsApp Gateway (Baileys)</h3>
                                <p class="sys-card-sub">Direct Server WhatsApp Automation</p>
                            </div>
                        </div>

                        @if ($this->whatsAppStatus['running'] && $this->whatsAppStatus['status'] === 'connected')
                            <span class="telemetry-pill live">
                                <span class="telemetry-dot"></span>
                                Connected & Ready
                            </span>
                        @elseif ($this->whatsAppStatus['running'] && $this->whatsAppStatus['has_qr'])
                            <span class="telemetry-pill qr">
                                <span class="telemetry-dot"></span>
                                QR Scan Required
                            </span>
                        @else
                            <span class="telemetry-pill offline">
                                <span class="telemetry-dot"></span>
                                Offline
                            </span>
                        @endif
                    </div>

                    {{-- Dynamic State Display --}}
                    @if ($this->whatsAppStatus['running'] && $this->whatsAppStatus['status'] === 'connected')
                        <div class="sys-paired-box">
                            <div class="sys-paired-head">
                                <div class="sys-paired-check">✓</div>
                                <div>
                                    <span class="sys-paired-title">WhatsApp Device Paired</span>
                                    <p class="sys-paired-num">+{{ $this->whatsAppStatus['user'] }}</p>
                                </div>
                            </div>
                            <p class="sys-paired-desc">
                                All inquiry submissions from customers trigger instantaneous confirmation WhatsApp messages directly from this number.
                            </p>
                        </div>
                    @elseif ($this->whatsAppStatus['running'] && $this->whatsAppStatus['has_qr'] && !empty($this->whatsAppStatus['qr_data_url']))
                        <div class="sys-qr-box">
                            <p style="font-size: 0.75rem; font-weight: 700; color: #f59e0b; margin: 0;">Scan this QR Code in WhatsApp:</p>
                            <div class="sys-qr-img-wrap">
                                <img src="{{ $this->whatsAppStatus['qr_data_url'] }}" alt="WhatsApp Pairing QR" />
                            </div>
                            <ol class="sys-qr-steps">
                                <li>1. Open WhatsApp on your phone</li>
                                <li>2. Tap <strong>Linked Devices</strong> > <strong>Link a Device</strong></li>
                                <li>3. Point camera at this screen</li>
                            </ol>
                        </div>
                    @else
                        <div class="sys-offline-box">
                            WhatsApp Gateway is currently stopped. Click "Start Gateway" below to activate direct WhatsApp messaging.
                        </div>
                    @endif

                    {{-- Live Test Message Dispatch Form --}}
                    @if ($this->whatsAppStatus['running'])
                        <div class="sys-test-box">
                            <label class="sys-test-label">Send Test WhatsApp Message</label>
                            <div class="sys-test-inputs">
                                <input
                                    wire:model="testPhone"
                                    type="text"
                                    placeholder="Phone (e.g. 9817...)"
                                    class="sys-input"
                                    style="width: 130px;"
                                />
                                <input
                                    wire:model="testMessage"
                                    type="text"
                                    placeholder="Message content"
                                    class="sys-input"
                                    style="flex: 1;"
                                />
                                <button
                                    wire:click="sendTestWhatsApp"
                                    type="button"
                                    class="sys-btn-send"
                                >
                                    Send
                                </button>
                            </div>
                        </div>
                    @endif
                </div>

                {{-- Action Controls --}}
                <div class="sys-card-footer">
                    <span class="sys-footer-label">Control WhatsApp Gateway</span>
                    <div class="daemon-btn-group">
                        @if (!$this->whatsAppStatus['running'])
                            <button
                                wire:click="startWhatsApp"
                                type="button"
                                class="daemon-btn daemon-btn-start"
                                style="background: linear-gradient(135deg, #059669 0%, #047857 100%);"
                            >
                                <svg width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                Start Gateway
                            </button>
                        @else
                            <button
                                wire:click="stopWhatsApp"
                                type="button"
                                class="daemon-btn daemon-btn-stop"
                            >
                                <svg width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 10a1 1 0 011-1h4a1 1 0 011 1v4a1 1 0 01-1 1h-4a1 1 0 01-1-1v-4z" />
                                </svg>
                                Stop Gateway
                            </button>
                        @endif
                    </div>
                </div>
            </div>

        </div>

    </div>
</x-filament-panels::page>
