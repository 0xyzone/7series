<x-filament-widgets::widget>
    <div wire:poll.12s class="inquiries-feed-container">
        <div class="inquiries-feed-header">
            <h3 class="inquiries-feed-title">
                <span class="inquiries-feed-title-dot"></span>
                Recent Wholesale Inquiries Feed
            </h3>
            <a href="/mukhiya/wholesale-inquiries" class="inquiries-feed-link">
                View All Cards →
            </a>
        </div>

        @if ($this->inquiries->isEmpty())
            <div style="padding: 2rem; text-align: center; border-radius: 1rem; border: 1px dashed rgba(120, 113, 108, 0.3);">
                <p style="font-size: 0.75rem; color: #78716c; margin: 0;">No customer wholesale inquiries recorded yet.</p>
            </div>
        @else
            <div class="inquiries-grid">
                @foreach ($this->inquiries as $inquiry)
                    <div class="inquiry-card-item">
                        <div>
                            <div style="display: flex; align-items: flex-start; justify-content: space-between; gap: 0.5rem;">
                                <h4 class="inquiry-company-name" title="{{ $inquiry->company_name }}">
                                    {{ $inquiry->company_name }}
                                </h4>
                                @if ($inquiry->sample_requested)
                                    <span class="inquiry-tag sample">
                                        Sample
                                    </span>
                                @endif
                            </div>

                            <div class="inquiry-contact-row">
                                <svg width="12" height="12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                                <span>{{ $inquiry->contact_name }}</span>
                            </div>

                            <div class="inquiry-tags-row">
                                @if ($inquiry->business_type)
                                    <span class="inquiry-tag general">
                                        {{ $inquiry->business_type }}
                                    </span>
                                @endif
                                @if ($inquiry->target_volume)
                                    <span class="inquiry-tag volume">
                                        {{ $inquiry->target_volume }}
                                    </span>
                                @endif
                            </div>
                        </div>

                        {{-- Quick Status Dropdown --}}
                        <div class="inquiry-status-row">
                            <span class="inquiry-status-label">Status</span>
                            <select
                                wire:change="updateStatus({{ $inquiry->id }}, $event.target.value)"
                                class="inquiry-select"
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
