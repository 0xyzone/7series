@php
    $currentUrl = request()->url();
    $navItems = [
        [
            'label' => 'Homepage',
            'url' => url('/'),
            'icon' => '<svg width="20" height="20" style="width: 20px; height: 20px;" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>',
            'active' => false,
        ],
        [
            'label' => 'Dashboard',
            'url' => url('/mukhiya'),
            'icon' => '<svg width="20" height="20" style="width: 20px; height: 20px;" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>',
            'active' => request()->is('mukhiya') || request()->is('mukhiya/'),
        ],
        [
            'label' => 'Inquiries',
            'url' => url('/mukhiya/wholesale-inquiries'),
            'icon' => '<svg width="20" height="20" style="width: 20px; height: 20px;" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/></svg>',
            'active' => request()->is('mukhiya/wholesale-inquiries*'),
        ],
        [
            'label' => 'B2B',
            'url' => url('/mukhiya/b2b-offerings'),
            'icon' => '<svg width="20" height="20" style="width: 20px; height: 20px;" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>',
            'active' => request()->is('mukhiya/b2b-offerings*'),
        ],
        [
            'label' => 'Catalog',
            'url' => url('/mukhiya/products'),
            'icon' => '<svg width="20" height="20" style="width: 20px; height: 20px;" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/></svg>',
            'active' => request()->is('mukhiya/products*'),
        ],
        [
            'label' => 'Stores',
            'url' => url('/mukhiya/retail-stores'),
            'icon' => '<svg width="20" height="20" style="width: 20px; height: 20px;" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>',
            'active' => request()->is('mukhiya/retail-stores*'),
        ],
    ];
@endphp

<div class="mobile-dock-wrapper"
     x-data="{}"
     x-show="!$store.sidebar?.isOpen"
     x-transition:enter="transition ease-out duration-200"
     x-transition:enter-start="opacity-0 translate-y-8"
     x-transition:enter-end="opacity-100 translate-y-0"
     x-transition:leave="transition ease-in duration-150"
     x-transition:leave-start="opacity-100 translate-y-0"
     x-transition:leave-end="opacity-0 translate-y-8">
    <div class="mobile-dock-inner">
        @foreach($navItems as $item)
            <a href="{{ $item['url'] }}"
               class="mobile-dock-item {{ $item['active'] ? 'active' : '' }}">
                <div class="mobile-dock-icon">
                    {!! $item['icon'] !!}
                </div>
                <span class="mobile-dock-label">{{ $item['label'] }}</span>
                @if($item['active'])
                    <span class="mobile-dock-pip"></span>
                @endif
            </a>
        @endforeach
    </div>
</div>
