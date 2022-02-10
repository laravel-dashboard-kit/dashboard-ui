@php
$parameters = [
    'error' => [
        'color' => 'danger',
        'icon' => 'tabler-circle-x',
    ],
    'success' => [
        'color' => 'success',
        'icon' => 'tabler-circle-check',
    ],
    'info' => [
        'color' => 'primary',
        'icon' => 'tabler-circle-check',
    ],
];
@endphp

@foreach (array_keys($parameters) as $type)
    @if (Session::has($type))
        <x-dashboard-alert dismissible
            :color="$parameters[$type]['color']"
            :icon="$parameters[$type]['icon']">
            <p class="mb-0 font-weight-bolder">{!! Session::get($type) !!}</p>
        </x-dashboard-alert>
    @endif
@endforeach
