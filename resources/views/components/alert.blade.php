<div {{ $attributes->except('class') }}
    @class([
        "alert alert-{$color} " . $attributes->get('class'),
        'alert-dismissible' => $dismissible,
    ])
    role="alert">
    <x-dashboard::flex x="between">
        <x-dashboard::flex>
            @if ($attributes->get('icon'))
                @svg($attributes->get('icon'))
            @endif
            <div>{!! $slot !!}</div>
        </x-dashboard::flex>

        @if ($dismissible)
            <button type="button"
                class="close"
                data-dismiss="alert"
                aria-label="Close">
                <span aria-hidden="true">
                    <x-tabler-x />
                </span>
            </button>
        @endif
    </x-dashboard::flex>
</div>
