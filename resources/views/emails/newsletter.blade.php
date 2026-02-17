<x-mail::message>
    {!! $campaign->content !!}

    Thanks,<br>
    {{ config('app.name') }}
</x-mail::message>