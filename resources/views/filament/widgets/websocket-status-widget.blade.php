<x-filament-widgets::widget>
    <x-filament::section>
        <div wire:poll.10s class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div class="flex flex-col gap-2">
                <div class="flex items-center gap-2">
                    <span class="text-sm font-bold text-gray-900 dark:text-white">Daemon & Real-Time Status</span>
                    <span class="text-xs text-gray-400">·</span>
                    <a href="{{ $this->manageUrl }}" class="text-xs font-semibold text-red-600 hover:text-red-500 dark:text-red-400">
                        Open Full Control Panel →
                    </a>
                </div>

                {{-- Status Pills --}}
                <div class="flex flex-wrap items-center gap-2">
                    {{-- Reverb Pill --}}
                    @if ($this->reverbRunning)
                        <span class="inline-flex items-center gap-1.5 rounded-full bg-emerald-50 px-2.5 py-1 text-xs font-medium text-emerald-700 ring-1 ring-inset ring-emerald-600/20 dark:bg-emerald-950/50 dark:text-emerald-400">
                            <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span>
                            Reverb WebSocket: Live (Port 8080)
                        </span>
                    @else
                        <span class="inline-flex items-center gap-1.5 rounded-full bg-red-50 px-2.5 py-1 text-xs font-medium text-red-700 ring-1 ring-inset ring-red-600/20 dark:bg-red-950/50 dark:text-red-400">
                            <span class="h-1.5 w-1.5 rounded-full bg-red-500"></span>
                            Reverb WebSocket: Stopped
                        </span>
                    @endif

                    {{-- WhatsApp Pill --}}
                    @if ($this->whatsAppStatus['running'] && $this->whatsAppStatus['status'] === 'connected')
                        <span class="inline-flex items-center gap-1.5 rounded-full bg-emerald-50 px-2.5 py-1 text-xs font-medium text-emerald-700 ring-1 ring-inset ring-emerald-600/20 dark:bg-emerald-950/50 dark:text-emerald-400">
                            <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span>
                            WhatsApp: Connected (+{{ $this->whatsAppStatus['user'] }})
                        </span>
                    @elseif ($this->whatsAppStatus['running'] && $this->whatsAppStatus['has_qr'])
                        <span class="inline-flex items-center gap-1.5 rounded-full bg-amber-50 px-2.5 py-1 text-xs font-medium text-amber-700 ring-1 ring-inset ring-amber-600/20 dark:bg-amber-950/50 dark:text-amber-400">
                            <span class="h-1.5 w-1.5 rounded-full bg-amber-500 animate-pulse"></span>
                            WhatsApp: QR Scan Required
                        </span>
                    @else
                        <span class="inline-flex items-center gap-1.5 rounded-full bg-red-50 px-2.5 py-1 text-xs font-medium text-red-700 ring-1 ring-inset ring-red-600/20 dark:bg-red-950/50 dark:text-red-400">
                            <span class="h-1.5 w-1.5 rounded-full bg-red-500"></span>
                            WhatsApp: Gateway Stopped
                        </span>
                    @endif
                </div>
            </div>

            {{-- Action Buttons --}}
            <div class="flex items-center gap-2">
                @if (!$this->reverbRunning)
                    <button
                        wire:click="startReverb"
                        type="button"
                        class="inline-flex items-center gap-1.5 rounded-lg bg-red-600 px-3.5 py-2 text-xs font-semibold text-white shadow-sm hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600"
                    >
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Start Laravel Reverb
                    </button>
                @endif

                @if (!$this->whatsAppStatus['running'])
                    <button
                        wire:click="startWhatsApp"
                        type="button"
                        class="inline-flex items-center gap-1.5 rounded-lg bg-emerald-600 px-3.5 py-2 text-xs font-semibold text-white shadow-sm hover:bg-emerald-500"
                    >
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Start WhatsApp Gateway
                    </button>
                @endif

                <a
                    href="{{ $this->manageUrl }}"
                    class="inline-flex items-center gap-1 rounded-lg border border-gray-300 bg-white px-3 py-2 text-xs font-medium text-gray-700 shadow-sm hover:bg-gray-50 dark:border-white/10 dark:bg-gray-800 dark:text-gray-200 dark:hover:bg-gray-700"
                >
                    Details
                </a>
            </div>
        </div>
    </x-filament::section>
</x-filament-widgets::widget>
