<?php

namespace LDK\DashboardUI\Views\Components;

class Alert extends Component
{
    /**
     * Badge color, should be available in your theme
     *
     * @var string
     */
    public $color;

    /**
     * Can be dismissed
     *
     * @var string
     */
    public $dismissible;

    public function __construct(string $color = 'primary', $dismissible = true)
    {
        $this->validateColor($color);

        $this->color = $color;
        $this->dismissible = boolval($dismissible);
    }
}
