@props(['title' => null, 'subtitle' => null])

<x-dashboard-card :inset="true">
    {{-- Table header --}}
    @if ($title || $subtitle || isset($cardHeader))
        <x-slot name="header">
            @if ($title)
                <h1>{{ $title }}</h1>
            @endif

            @if ($subtitle)
                <h2>{{ $subtitle }}</h2>
            @endif

            @isset($cardHeader)
                {!! $cardHeader !!}
            @endisset
        </x-slot>
    @endif

    {{-- table body --}}
    <x-dashboard::table {{ $attributes }}>
        {!! $slot !!}
    </x-dashboard::table>

    {{-- table footer --}}
    @isset($cardFooter)
        <x-slot name="footer">
            {!! $cardFooter !!}
        </x-slot>
    @endisset
</x-dashboard-card>
