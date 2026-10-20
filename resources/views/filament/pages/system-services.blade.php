<x-filament-panels::page>
    <div wire:poll.8s class="space-y-6">

        {{-- Top Description & Automated Daemon Banner --}}
        <div class="rounded-xl border border-gray-200 bg-white p-5 shadow-sm dark:border-white/10 dark:bg-gray-900">
            <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                <div>
                    <h2 class="text-base font-bold text-gray-900 dark:text-white">
                        Background Daemon & WebSocket Supervisor
                    </h2>
                    <p class="text-xs text-gray-500 dark:text-gray-400">
                        Manages real-time WebSockets via Laravel Reverb and automated client messaging via Baileys WhatsApp Gateway. Both daemons are monitored by the 24/7 keep-alive schedule.
                    </p>
                </div>
                <div class="flex items-center gap-2">
                    <span class="inline-flex items-center gap-1.5 rounded-full bg-emerald-50 px-3 py-1 text-xs font-semibold text-emerald-700 ring-1 ring-inset ring-emerald-600/20 dark:bg-emerald-950/50 dark:text-emerald-400">
                        <span class="h-1.5 w-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                        Cron Keep-Alive: Active
                    </span>
                    <button wire:click="$refresh" type="button" class="inline-flex items-center gap-1 text-xs font-medium text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200">
                        <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                        </svg>
                        Auto-syncing
                    </button>
                </div>
            </div>
        </div>

        {{-- 2 Columns: Reverb & WhatsApp --}}
        <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">

            {{-- 1. LARAVEL REVERB CARD --}}
            <div class="flex flex-col justify-between rounded-xl border border-gray-200 bg-white p-6 shadow-sm dark:border-white/10 dark:bg-gray-900">
                <div>
                    <div class="flex items-center justify-between border-b border-gray-100 pb-4 dark:border-white/10">
                        <div class="flex items-center gap-3">
                            <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-red-50 text-red-600 dark:bg-red-950/50 dark:text-red-400">
                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-sm font-bold text-gray-900 dark:text-white">Laravel Reverb</h3>
                                <p class="text-xs text-gray-500 dark:text-gray-400">High-Performance WebSocket Server</p>
                            </div>
                        </div>

                        @if ($this->reverbDetails['running'])
                            <span class="inline-flex items-center gap-1.5 rounded-full bg-emerald-50 px-2.5 py-1 text-xs font-semibold text-emerald-700 ring-1 ring-inset ring-emerald-600/20 dark:bg-emerald-950/50 dark:text-emerald-400">
                                <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span>
                                Live & Listening
                            </span>
                        @else
                            <span class="inline-flex items-center gap-1.5 rounded-full bg-red-50 px-2.5 py-1 text-xs font-semibold text-red-700 ring-1 ring-inset ring-red-600/20 dark:bg-red-950/50 dark:text-red-400">
                                <span class="h-1.5 w-1.5 rounded-full bg-red-500"></span>
                                Stopped
                            </span>
                        @endif
                    </div>

                    {{-- Metrics & Settings --}}
                    <div class="mt-5 grid grid-cols-2 gap-3 text-xs">
                        <div class="rounded-lg bg-gray-50 p-3 dark:bg-white/5">
                            <span class="text-gray-500 dark:text-gray-400">Port</span>
                            <p class="font-mono font-bold text-gray-900 dark:text-white">{{ $this->reverbDetails['port'] }}</p>
                        </div>
                        <div class="rounded-lg bg-gray-50 p-3 dark:bg-white/5">
                            <span class="text-gray-500 dark:text-gray-400">Host</span>
                            <p class="font-mono font-bold text-gray-900 dark:text-white">{{ $this->reverbDetails['host'] }}</p>
                        </div>
                        <div class="rounded-lg bg-gray-50 p-3 dark:bg-white/5">
                            <span class="text-gray-500 dark:text-gray-400">App ID</span>
                            <p class="font-mono font-bold text-gray-900 dark:text-white">{{ $this->reverbDetails['app_id'] ?? 'Configured' }}</p>
                        </div>
                        <div class="rounded-lg bg-gray-50 p-3 dark:bg-white/5">
                            <span class="text-gray-500 dark:text-gray-400">Protocol</span>
                            <p class="font-mono font-bold text-gray-900 dark:text-white">Pusher / RFC6455</p>
                        </div>
                    </div>

                    {{-- Recent Reverb Output --}}
                    @if (!empty($this->reverbDetails['logs']))
                        <div class="mt-4">
                            <label class="text-[11px] font-semibold uppercase tracking-wider text-gray-500 dark:text-gray-400">Recent Server Output</label>
                            <pre class="mt-1 max-h-32 overflow-x-auto rounded-lg bg-gray-950 p-2.5 font-mono text-[11px] leading-tight text-gray-300">{{ $this->reverbDetails['logs'] }}</pre>
                        </div>
                    @endif
                </div>

                {{-- Action Controls --}}
                <div class="mt-6 flex items-center justify-between border-t border-gray-100 pt-4 dark:border-white/10">
                    <span class="text-xs text-gray-500 dark:text-gray-400">Control Reverb Process</span>
                    <div class="flex gap-2">
                        @if (!$this->reverbDetails['running'])
                            <button
                                wire:click="startReverb"
                                type="button"
                                class="inline-flex items-center gap-1.5 rounded-lg bg-emerald-600 px-4 py-2 text-xs font-semibold text-white shadow-sm hover:bg-emerald-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-emerald-600"
                            >
                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                Start Reverb Server
                            </button>
                        @else
                            <button
                                wire:click="stopReverb"
                                type="button"
                                class="inline-flex items-center gap-1.5 rounded-lg bg-red-600 px-3.5 py-2 text-xs font-semibold text-white shadow-sm hover:bg-red-500"
                            >
                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 10a1 1 0 011-1h4a1 1 0 011 1v4a1 1 0 01-1 1h-4a1 1 0 01-1-1v-4z" />
                                </svg>
                                Stop Reverb
                            </button>
                        @endif
                    </div>
                </div>
            </div>

            {{-- 2. WHATSAPP GATEWAY (BAILEYS) CARD --}}
            <div class="flex flex-col justify-between rounded-xl border border-gray-200 bg-white p-6 shadow-sm dark:border-white/10 dark:bg-gray-900">
                <div>
                    <div class="flex items-center justify-between border-b border-gray-100 pb-4 dark:border-white/10">
                        <div class="flex items-center gap-3">
                            <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-emerald-50 text-emerald-600 dark:bg-emerald-950/50 dark:text-emerald-400">
                                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.77-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.299.045-.677.063-1.092-.069-.252-.08-.575-.187-.988-.365-1.739-.751-2.874-2.502-2.961-2.617-.087-.116-.708-.94-.708-1.793s.448-1.273.607-1.446c.159-.173.346-.217.462-.217l.332.006c.106.005.249-.04.39.298.144.347.491 1.2.534 1.287.043.087.072.188.014.304-.058.116-.087.188-.173.289l-.26.304c-.087.086-.177.18-.076.354.101.174.449.741.964 1.201.662.591 1.221.774 1.394.86.174.086.275.072.376-.043.101-.116.433-.506.549-.68.116-.173.231-.145.39-.087s1.011.477 1.184.564.289.13.332.202c.043.073.043.419-.101.825z" />
                                    <path d="M12 2C6.477 2 2 6.477 2 12c0 1.891.528 3.66 1.445 5.174L2 22l4.957-1.411A9.957 9.957 0 0012 22c5.523 0 10-4.477 10-10S17.523 2 12 2zm0 18.167c-1.63 0-3.149-.49-4.42-1.331l-.317-.208-2.956.842.846-2.903-.223-.331A8.125 8.125 0 013.833 12c0-4.503 3.664-8.167 8.167-8.167 4.503 0 8.167 3.664 8.167 8.167 0 4.503-3.664 8.167-8.167 8.167z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-sm font-bold text-gray-900 dark:text-white">WhatsApp Gateway (Baileys)</h3>
                                <p class="text-xs text-gray-500 dark:text-gray-400">Direct Server WhatsApp Automation</p>
                            </div>
                        </div>

                        @if ($this->whatsAppStatus['running'] && $this->whatsAppStatus['status'] === 'connected')
                            <span class="inline-flex items-center gap-1.5 rounded-full bg-emerald-50 px-2.5 py-1 text-xs font-semibold text-emerald-700 ring-1 ring-inset ring-emerald-600/20 dark:bg-emerald-950/50 dark:text-emerald-400">
                                <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span>
                                Connected & Ready
                            </span>
                        @elseif ($this->whatsAppStatus['running'] && $this->whatsAppStatus['has_qr'])
                            <span class="inline-flex items-center gap-1.5 rounded-full bg-amber-50 px-2.5 py-1 text-xs font-semibold text-amber-700 ring-1 ring-inset ring-amber-600/20 dark:bg-amber-950/50 dark:text-amber-400">
                                <span class="h-1.5 w-1.5 rounded-full bg-amber-500 animate-pulse"></span>
                                Scan QR Required
                            </span>
                        @else
                            <span class="inline-flex items-center gap-1.5 rounded-full bg-red-50 px-2.5 py-1 text-xs font-semibold text-red-700 ring-1 ring-inset ring-red-600/20 dark:bg-red-950/50 dark:text-red-400">
                                <span class="h-1.5 w-1.5 rounded-full bg-red-500"></span>
                                Offline
                            </span>
                        @endif
                    </div>

                    {{-- Dynamic State Display --}}
                    @if ($this->whatsAppStatus['running'] && $this->whatsAppStatus['status'] === 'connected')
                        <div class="mt-5 rounded-lg border border-emerald-500/20 bg-emerald-50/50 p-4 dark:bg-emerald-950/20">
                            <div class="flex items-center gap-3">
                                <div class="flex h-8 w-8 items-center justify-center rounded-full bg-emerald-500 text-white font-bold text-sm">✓</div>
                                <div>
                                    <p class="text-xs font-semibold text-emerald-800 dark:text-emerald-300">WhatsApp Device Paired</p>
                                    <p class="font-mono text-sm font-bold text-gray-900 dark:text-white">+{{ $this->whatsAppStatus['user'] }}</p>
                                </div>
                            </div>
                            <p class="mt-2 text-xs text-emerald-700 dark:text-emerald-400">
                                All inquiry submissions from customers trigger instantaneous confirmation WhatsApp messages directly from this number.
                            </p>
                        </div>
                    @elseif ($this->whatsAppStatus['running'] && $this->whatsAppStatus['has_qr'] && !empty($this->whatsAppStatus['qr_data_url']))
                        <div class="mt-4 flex flex-col items-center justify-center rounded-lg border border-amber-500/20 bg-amber-50/30 p-4 text-center dark:bg-amber-950/20">
                            <p class="text-xs font-bold text-amber-800 dark:text-amber-300">Scan this QR Code in WhatsApp:</p>
                            <div class="my-3 rounded-lg bg-white p-2 shadow-sm">
                                <img src="{{ $this->whatsAppStatus['qr_data_url'] }}" alt="WhatsApp Pairing QR" class="h-44 w-44" />
                            </div>
                            <ol class="text-left text-[11px] text-gray-600 dark:text-gray-300 leading-tight space-y-1">
                                <li>1. Open WhatsApp on your phone</li>
                                <li>2. Tap <strong>Linked Devices</strong> > <strong>Link a Device</strong></li>
                                <li>3. Point camera at this screen</li>
                            </ol>
                        </div>
                    @else
                        <div class="mt-5 rounded-lg border border-gray-200 bg-gray-50 p-4 text-center dark:border-white/10 dark:bg-white/5">
                            <p class="text-xs text-gray-500 dark:text-gray-400">
                                WhatsApp Gateway is currently stopped. Click "Start Gateway" below to activate direct WhatsApp messaging.
                            </p>
                        </div>
                    @endif

                    {{-- Live Test Message Dispatch Form --}}
                    @if ($this->whatsAppStatus['running'])
                        <div class="mt-5 border-t border-gray-100 pt-4 dark:border-white/10">
                            <label class="text-[11px] font-semibold uppercase tracking-wider text-gray-500 dark:text-gray-400">Send Test WhatsApp Message</label>
                            <div class="mt-2 grid grid-cols-1 gap-2 sm:grid-cols-3">
                                <div class="sm:col-span-1">
                                    <input
                                        wire:model="testPhone"
                                        type="text"
                                        placeholder="Phone (e.g. 9817...)"
                                        class="w-full rounded-lg border-gray-300 px-3 py-1.5 text-xs shadow-sm focus:border-red-500 focus:ring-red-500 dark:border-white/10 dark:bg-gray-800 dark:text-white"
                                    />
                                </div>
                                <div class="sm:col-span-2 flex gap-2">
                                    <input
                                        wire:model="testMessage"
                                        type="text"
                                        placeholder="Message content"
                                        class="w-full rounded-lg border-gray-300 px-3 py-1.5 text-xs shadow-sm focus:border-red-500 focus:ring-red-500 dark:border-white/10 dark:bg-gray-800 dark:text-white"
                                    />
                                    <button
                                        wire:click="sendTestWhatsApp"
                                        type="button"
                                        class="inline-flex shrink-0 items-center rounded-lg bg-emerald-600 px-3 py-1.5 text-xs font-semibold text-white shadow-sm hover:bg-emerald-500"
                                    >
                                        Send
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>

                {{-- Action Controls --}}
                <div class="mt-6 flex items-center justify-between border-t border-gray-100 pt-4 dark:border-white/10">
                    <span class="text-xs text-gray-500 dark:text-gray-400">Control WhatsApp Gateway</span>
                    <div class="flex gap-2">
                        @if (!$this->whatsAppStatus['running'])
                            <button
                                wire:click="startWhatsApp"
                                type="button"
                                class="inline-flex items-center gap-1.5 rounded-lg bg-emerald-600 px-4 py-2 text-xs font-semibold text-white shadow-sm hover:bg-emerald-500"
                            >
                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                Start Gateway
                            </button>
                        @else
                            <button
                                wire:click="stopWhatsApp"
                                type="button"
                                class="inline-flex items-center gap-1.5 rounded-lg bg-red-600 px-3.5 py-2 text-xs font-semibold text-white shadow-sm hover:bg-red-500"
                            >
                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 10a1 1 0 011-1h4a1 1 0 011 1v4a1 1 0 01-1 1h-4a1 1 0 01-1-1v-4z" />
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
