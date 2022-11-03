<table {{ $attributes->merge([
    'class' => 'table-auto w-full',
]) }}>
    {!! $slot !!}
</table>
