<div {{ $attributes->merge([
    'class' => "grid grid-flow-col gap-{$gap}",
]) }}>
    {!! $slot !!}
</div>
