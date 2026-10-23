<div wire:poll.12s="checkStatus" class="fi-reverb-wrap" style="position: relative; display: inline-flex; align-items: center; line-height: 1;">
    
    <style>
        .fi-reverb-wrap {
            display: inline-flex;
            align-items: center;
            position: relative;
        }
        .fi-reverb-btn {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            height: 26px;
            max-height: 26px;
            padding: 0 9px;
            border-radius: 9999px;
            font-size: 11px;
            font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, monospace;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.15s ease;
            white-space: nowrap;
            user-select: none;
            line-height: 1;
            box-sizing: border-box;
            outline: none;
        }
        .fi-reverb-btn.active {
            background-color: rgba(16, 185, 129, 0.12);
            color: #047857;
            border: 1px solid rgba(16, 185, 129, 0.35);
        }
        .fi-reverb-btn.active:hover {
            background-color: rgba(16, 185, 129, 0.22);
            border-color: rgba(16, 185, 129, 0.5);
        }
        .fi-reverb-btn.offline {
            background-color: rgba(239, 68, 68, 0.12);
            color: #b91c1c;
            border: 1px solid rgba(239, 68, 68, 0.35);
        }
        .fi-reverb-btn.offline:hover {
            background-color: rgba(239, 68, 68, 0.22);
            border-color: rgba(239, 68, 68, 0.5);
        }
        .dark .fi-reverb-btn.active {
            background-color: rgba(6, 95, 70, 0.4);
            color: #6ee7b7;
            border-color: rgba(16, 185, 129, 0.45);
        }
        .dark .fi-reverb-btn.offline {
            background-color: rgba(153, 27, 27, 0.4);
            color: #fca5a5;
            border-color: rgba(239, 68, 68, 0.45);
        }
        .fi-reverb-dot-wrap {
            position: relative;
            display: inline-flex;
            width: 7px;
            height: 7px;
            flex-shrink: 0;
        }
        .fi-reverb-dot {
            width: 7px;
            height: 7px;
            border-radius: 9999px;
            display: inline-block;
        }
        .fi-reverb-dot.active {
            background-color: #10b981;
            box-shadow: 0 0 6px #10b981;
        }
        .fi-reverb-dot.offline {
            background-color: #ef4444;
            box-shadow: 0 0 6px #ef4444;
        }
        .fi-reverb-ping {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border-radius: 9999px;
            opacity: 0.75;
            animation: fiReverbPing 1.6s cubic-bezier(0, 0, 0.2, 1) infinite;
        }
        .fi-reverb-ping.active { background-color: #34d399; }
        .fi-reverb-ping.offline { background-color: #f87171; }
        @keyframes fiReverbPing {
            75%, 100% { transform: scale(2.2); opacity: 0; }
        }
        .fi-reverb-modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(15, 23, 42, 0.65);
            backdrop-filter: blur(4px);
            -webkit-backdrop-filter: blur(4px);
            z-index: 999999;
            display: flex;
            align-items: flex-start;
            justify-content: center;
            padding-top: 5rem;
            padding-left: 1rem;
            padding-right: 1rem;
            box-sizing: border-box;
        }
        .fi-reverb-modal-box {
            width: 100%;
            max-width: 360px;
            background: #ffffff;
            border: 1px solid rgba(226, 232, 240, 0.95);
            border-radius: 16px;
            box-shadow: 0 20px 45px -10px rgba(0, 0, 0, 0.25);
            padding: 1.25rem;
            box-sizing: border-box;
            animation: fiReverbSlideDown 0.16s ease-out;
            color: #18181b;
        }
        .dark .fi-reverb-modal-box {
            background: #18181b;
            border-color: rgba(63, 63, 70, 0.9);
            color: #f4f4f5;
        }
        @keyframes fiReverbSlideDown {
            from { opacity: 0; transform: translateY(-8px) scale(0.97); }
            to { opacity: 1; transform: translateY(0) scale(1); }
        }
        @media (max-width: 640px) {
            .fi-reverb-label-desktop { display: none !important; }
            .fi-reverb-label-mobile { display: inline !important; }
        }
        @media (min-width: 641px) {
            .fi-reverb-label-desktop { display: inline !important; }
            .fi-reverb-label-mobile { display: none !important; }
        }
    </style>

    {{-- Topbar Pill Trigger Button --}}
    <button type="button" 
            wire:click="toggleModal"
            class="fi-reverb-btn {{ $isRunning ? 'active' : 'offline' }}"
            title="Laravel Reverb Status: {{ $isRunning ? 'Online & Listening' : 'Offline / Stopped' }}. Click to Manage.">
        
        {{-- Status Pulsing Dot --}}
        <span class="fi-reverb-dot-wrap">
            <span class="fi-reverb-ping {{ $isRunning ? 'active' : 'offline' }}"></span>
            <span class="fi-reverb-dot {{ $isRunning ? 'active' : 'offline' }}"></span>
        </span>

        {{-- WebSocket Bolt Icon --}}
        <svg width="12" height="12" style="flex-shrink: 0;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 10V3L4 14h7v7l9-11h-7z" />
        </svg>

        {{-- Desktop / Mobile Label --}}
        <span class="fi-reverb-label-desktop">
            Reverb: <strong>{{ $isRunning ? 'Active' : 'Offline' }}</strong>
        </span>
        <span class="fi-reverb-label-mobile">
            {{ $isRunning ? 'On' : 'Off' }}
        </span>

        {{-- Dropdown Chevron --}}
        <svg width="10" height="10" style="flex-shrink: 0; opacity: 0.6; transform: {{ $showModal ? 'rotate(180deg)' : 'none' }}; transition: transform 0.15s ease;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7" />
        </svg>
    </button>

    {{-- Interactive Popup Modal / Popover --}}
    @if($showModal)
        <div class="fi-reverb-modal-overlay" wire:click.self="closeModal">
            <div class="fi-reverb-modal-box">
                
                {{-- Header with Close Button --}}
                <div style="display: flex; align-items: center; justify-content: space-between; border-bottom: 1px solid rgba(226, 232, 240, 0.8); padding-bottom: 0.75rem; margin-bottom: 0.85rem;">
                    <div style="display: flex; align-items: center; gap: 8px;">
                        <div style="width: 28px; height: 28px; border-radius: 8px; display: flex; align-items: center; justify-content: center; background: {{ $isRunning ? 'rgba(16, 185, 129, 0.15)' : 'rgba(239, 68, 68, 0.15)' }}; color: {{ $isRunning ? '#059669' : '#dc2626' }};">
                            <svg width="15" height="15" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                        </div>
                        <div>
                            <div style="font-size: 13px; font-weight: 800; line-height: 1.2;">Laravel Reverb</div>
                            <span style="font-size: 10px; font-family: ui-monospace, monospace; color: #71717a;">WebSocket Daemon Server</span>
                        </div>
                    </div>

                    <button type="button" wire:click="closeModal" style="background: transparent; border: none; padding: 4px; border-radius: 6px; cursor: pointer; color: #a1a1aa; display: flex; align-items: center; justify-content: center;">
                        <svg width="15" height="15" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                {{-- Status State Card --}}
                <div style="padding: 10px 12px; border-radius: 10px; display: flex; align-items: center; justify-content: space-between; margin-bottom: 0.85rem; background: {{ $isRunning ? 'rgba(16, 185, 129, 0.08)' : 'rgba(239, 68, 68, 0.08)' }}; border: 1px solid {{ $isRunning ? 'rgba(16, 185, 129, 0.25)' : 'rgba(239, 68, 68, 0.25)' }};">
                    <div>
                        <span style="font-size: 9px; font-family: ui-monospace, monospace; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em; color: #71717a; display: block;">SERVER STATE</span>
                        <div style="display: flex; align-items: center; gap: 6px; margin-top: 2px;">
                            <span style="width: 8px; height: 8px; border-radius: 9999px; background: {{ $isRunning ? '#10b981' : '#ef4444' }};"></span>
                            <span style="font-size: 12px; font-weight: 800; color: {{ $isRunning ? '#047857' : '#b91c1c' }};">
                                {{ $isRunning ? 'ONLINE & LISTENING' : 'OFFLINE / STOPPED' }}
                            </span>
                        </div>
                    </div>

                    <div style="text-align: right;">
                        <span style="font-size: 9px; font-family: ui-monospace, monospace; color: #a1a1aa; display: block;">PORT</span>
                        <span style="font-size: 11px; font-family: ui-monospace, monospace; font-weight: 800;">8080 (TCP)</span>
                    </div>
                </div>

                {{-- Processing Message --}}
                @if($isProcessing)
                    <div style="padding: 8px 12px; border-radius: 8px; background: #eff6ff; border: 1px solid #bfdbfe; font-size: 11px; font-weight: 700; color: #1d4ed8; display: flex; align-items: center; gap: 8px; margin-bottom: 0.85rem;">
                        <svg width="14" height="14" style="animation: spin 1s linear infinite;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <circle opacity="0.25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path opacity="0.75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                        <span>{{ $actionMessage ?: 'Executing daemon command...' }}</span>
                    </div>
                @endif

                {{-- Action Buttons --}}
                <div style="display: flex; flex-direction: column; gap: 8px;">
                    @if(! $isRunning)
                        <button type="button" 
                                wire:click="startServer"
                                wire:loading.attr="disabled"
                                style="width: 100%; padding: 8px 14px; border-radius: 10px; background: #059669; color: #ffffff; border: none; font-size: 11px; font-weight: 800; text-transform: uppercase; letter-spacing: 0.05em; cursor: pointer; display: flex; align-items: center; justify-content: center; gap: 6px; box-shadow: 0 4px 10px rgba(5, 150, 105, 0.25);">
                            <svg width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span>Start Reverb Server</span>
                        </button>
                    @else
                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 8px;">
                            <button type="button" 
                                    wire:click="restartServer"
                                    wire:loading.attr="disabled"
                                    style="padding: 8px 10px; border-radius: 10px; background: #f59e0b; color: #ffffff; border: none; font-size: 11px; font-weight: 800; text-transform: uppercase; letter-spacing: 0.05em; cursor: pointer; display: flex; align-items: center; justify-content: center; gap: 5px; box-shadow: 0 4px 10px rgba(245, 158, 11, 0.25);">
                                <svg width="13" height="13" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                                </svg>
                                <span>Restart</span>
                            </button>

                            <button type="button" 
                                    wire:click="stopServer"
                                    wire:loading.attr="disabled"
                                    style="padding: 8px 10px; border-radius: 10px; background: #dc2626; color: #ffffff; border: none; font-size: 11px; font-weight: 800; text-transform: uppercase; letter-spacing: 0.05em; cursor: pointer; display: flex; align-items: center; justify-content: center; gap: 5px; box-shadow: 0 4px 10px rgba(220, 38, 38, 0.25);">
                                <svg width="13" height="13" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 10a1 1 0 011-1h4a1 1 0 011 1v4a1 1 0 01-1 1h-4a1 1 0 01-1-1v-4z" />
                                </svg>
                                <span>Stop</span>
                            </button>
                        </div>
                    @endif

                    {{-- Footer Links --}}
                    <div style="padding-top: 8px; margin-top: 4px; border-top: 1px solid rgba(226, 232, 240, 0.8); display: flex; align-items: center; justify-content: space-between; font-size: 11px;">
                        <a href="/mukhiya/system-services" style="font-weight: 700; color: #dc2626; text-decoration: none; display: flex; align-items: center; gap: 4px;">
                            <span>Diagnostics & Logs &rarr;</span>
                        </a>
                        <button type="button" wire:click="checkStatus" style="background: none; border: none; color: #71717a; font-weight: 600; cursor: pointer; display: flex; align-items: center; gap: 4px; font-size: 11px;">
                            <svg width="11" height="11" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                            </svg>
                            <span>Refresh</span>
                        </button>
                    </div>
                </div>

            </div>
        </div>
    @endif

</div>
