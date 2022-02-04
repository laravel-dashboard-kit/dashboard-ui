<?php

namespace LDK\DashboardUI\Views\Components;

class Badge extends Component
{
    /**
     * Badge color, should be available in your theme
     *
     * @var string
     */
    public $color;

    /**
     * Badge has round edges
     *
     * @var string
     */
    public $pill;

    public function __construct(string $color = 'primary', $pill = false)
    {
        $this->validateColor($color);

        $this->color = $color;
        $this->pill = boolval($pill);

        $this->class([
            "badge badge-{$this->color}",
            'badge-pill' => $this->pill
        ]);
    }
}
