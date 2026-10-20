<x-filament-widgets::widget>
    <div wire:poll.12s class="space-y-4">
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-2">
                <span class="flex h-2.5 w-2.5 rounded-full bg-red-600"></span>
                <h3 class="text-sm font-black uppercase tracking-wider text-stone-900 dark:text-white">
                    Recent Wholesale Inquiries Feed
                </h3>
            </div>
            <a href="/mukhiya/wholesale-inquiries" class="text-xs font-bold text-red-600 hover:text-red-500 dark:text-red-400">
                View All Cards →
            </a>
        </div>

        @if ($this->inquiries->isEmpty())
            <div class="rounded-2xl border border-stone-200/80 bg-white/50 p-8 text-center dark:border-stone-800/80 dark:bg-stone-900/40">
                <p class="text-xs text-stone-500 dark:text-stone-400">No customer wholesale inquiries recorded yet.</p>
            </div>
        @else
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4">
                @foreach ($this->inquiries as $inquiry)
                    <div class="flex flex-col justify-between rounded-2xl border border-stone-200/80 bg-gradient-to-b from-white to-stone-50/80 p-4 shadow-sm transition-all hover:-translate-y-0.5 hover:shadow-md dark:border-stone-800/80 dark:from-[#181615] dark:to-[#12100f]">
                        <div class="space-y-2.5">
                            <div class="flex items-start justify-between gap-2">
                                <h4 class="font-bold text-sm text-stone-900 dark:text-white truncate" title="{{ $inquiry->company_name }}">
                                    {{ $inquiry->company_name }}
                                </h4>
                                @if ($inquiry->sample_requested)
                                    <span class="inline-flex shrink-0 items-center rounded-full bg-amber-100 px-2 py-0.5 text-[9px] font-bold text-amber-800 dark:bg-amber-950/80 dark:text-amber-300">
                                        Sample
                                    </span>
                                @endif
                            </div>

                            <p class="text-xs text-stone-500 dark:text-stone-400 flex items-center gap-1">
                                <svg class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                                {{ $inquiry->contact_name }}
                            </p>

                            <div class="flex flex-wrap items-center gap-1.5 text-[10px]">
                                @if ($inquiry->business_type)
                                    <span class="rounded-md bg-stone-100 px-1.5 py-0.5 font-medium text-stone-600 dark:bg-stone-800 dark:text-stone-300">
                                        {{ $inquiry->business_type }}
                                    </span>
                                @endif
                                @if ($inquiry->target_volume)
                                    <span class="rounded-md bg-red-50 px-1.5 py-0.5 font-medium text-red-700 dark:bg-red-950/50 dark:text-red-400">
                                        {{ $inquiry->target_volume }}
                                    </span>
                                @endif
                            </div>
                        </div>

                        {{-- Quick Status Dropdown --}}
                        <div class="mt-4 pt-3 border-t border-stone-100 dark:border-stone-800/80 flex items-center justify-between gap-2">
                            <span class="text-[10px] font-bold uppercase tracking-wider text-stone-400">Status</span>
                            <select
                                wire:change="updateStatus({{ $inquiry->id }}, $event.target.value)"
                                class="rounded-lg border-stone-200 bg-white px-2 py-1 text-xs font-semibold shadow-sm focus:border-red-500 focus:ring-red-500 dark:border-stone-700 dark:bg-stone-800 dark:text-stone-200"
                            >
                                <option value="new" @selected($inquiry->status === 'new')>New</option>
                                <option value="contacted" @selected($inquiry->status === 'contacted')>Contacted</option>
                                <option value="in_review" @selected($inquiry->status === 'in_review')>In Review</option>
                                <option value="sample_sent" @selected($inquiry->status === 'sample_sent')>Sample Sent</option>
                                <option value="quoted" @selected($inquiry->status === 'quoted')>Quoted</option>
                                <option value="approved" @selected($inquiry->status === 'approved')>Approved</option>
                                <option value="closed" @selected($inquiry->status === 'closed')>Closed</option>
                            </select>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</x-filament-widgets::widget>
