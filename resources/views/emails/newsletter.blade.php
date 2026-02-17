<x-mail::message>
    {!! $campaign->content !!}

    <x-mail::subcopy>
        If you wish to stop receiving these emails, you can [unsubscribe here]({{ $unsubscribeUrl }}).
    </x-mail::subcopy>

    Thanks,
    {{ config('app.name') }}
</x-mail::message>