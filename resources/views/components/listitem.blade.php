<li {{ $attributes->merge(['class' => 'list-group-item flex justify-between']) }}>
    <div class="flex justify-start">
        @isset($start)
            {!! $start !!}
        @endisset

        <div class="d-inline-block">
            {!! $slot !!}
        </div>
    </div>

    @isset($end)
        {!! $end !!}
    @endisset
</li>
