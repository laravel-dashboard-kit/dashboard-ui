@php
    $cols = ['size', 'sm', 'md', 'lg', 'xl'];

    $classes = [];

    foreach ($cols as $col) {
        if ($attributes->get($col)) {
            $classes[] = sprintf('col-%s%s', $col == 'size' ? '' : "${col}-", $attributes->get($col));
        }
    }

    if ($attributes->get('sizes') && strpos($attributes->get('sizes'), ':')) {
        $classes[] = implode(' ', array_map(fn($view, $size) => "col-{$view}${size}", ['', 'sm-', 'md-', 'lg-', 'xl-'], explode(':', $attributes->get('sizes'))));
    }

    if ($attributes->get('offsets') && strpos($attributes->get('offsets'), ':')) {
        $classes[] = implode(' ', array_map(fn($view, $size) => "offset-{$view}${size}", ['', 'sm-', 'md-', 'lg-', 'xl-'], explode(':', $attributes->get('offsets'))));
    }

    if (count($classes) < 1) {
        $classes = ['col'];
    }
@endphp

<div class="{{ implode(' ', $classes) }}">
    {!! $slot !!}
</div>
