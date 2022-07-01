<div class="card"
    dir="{{ dashboard_rtl('rtl', 'ltr') }}"
    {{ $attributes }}>
    @isset($header)
        {{-- $attributes->get('header-bg'), --}}
        {{-- // "text-white" => in_array($attributes->get('header-bg', 'gray-200'), ['primary']) --}}
        <div @class(['card-header'])>
            {!! $header !!}
        </div>
    @endisset

    <div @class([
        'p-5' => !$inset,
    ])>
        {!! $slot !!}
    </div>

    @isset($footer)
        {{-- <div class="card-footer bg-{{ $attributes->get('footer-bg') }}"> --}}
        <div class="card-footer">
            {!! $footer !!}
        </div>
    @endisset
</div>

{{-- <div {{ $attributes->merge([
    'class' => $classes,
]) }}>
    @if ($attributes->get('image'))
        <img alt="image"
            src="{{ $attributes->get('image') }}"
            class="IE-H-100">
    @endif


    <div class="{{ $card_body_classes }}">
        @if ($attributes->get('title'))
            <h5 class="card-title">{{ $attributes->get('title') }}</h5>
        @endif
        @if ($attributes->get('subtitle'))
            <p class="card-text">{{ $attributes->get('subtitle') }}</p>
        @endif

        <div @class([ "mt-3"=> $attributes->get('subtitle') || $attributes->get('title')
            ])>

        </div>
    </div>
</div> --}}
