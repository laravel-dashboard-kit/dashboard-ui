@if ($attributes->get('href'))
    <a {{ $attributes->merge($defaultAttributes)->merge([
        'href' => '#',
    ]) }}>
        <x-dashboard-flex class="gap-1"
            x="center">
            {!! $slot ?? __('Click') !!}
        </x-dashboard-flex>
    </a>
@else
    <button {{ $attributes->merge($defaultAttributes)->merge([
        'type' => 'button',
    ]) }}>
        <x-dashboard-flex class="gap-1"
            x="center">
            {!! $slot ?? __('Click') !!}
        </x-dashboard-flex>
    </button>
@endif


{{-- @php
$class = 'btn ' . 'btn-' . $attributes->get('size', 'normal') . ' btn-' . $attributes->get('expand', 'normal');

if ($attributes->get('disabled')) {
    $class .= ' btn-disabled btn-dark';
} else {
    $class .= ' btn-';

    if ($attributes->get('outline')) {
        $class .= 'outline-';
    }

}

if ($attributes->get('display')) {
    $class .= ' btn-' . $attributes->get('display');
}
@endphp

@if ($attributes->get('disabled'))
    <button {{ $attributes->merge([
    'type' => 'button',
    'class' => $class,
]) }}>
        {!! $slot ?? __('Disabled') !!}
    </button> --}}
