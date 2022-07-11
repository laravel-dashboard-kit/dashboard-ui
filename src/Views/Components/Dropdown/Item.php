<?php

namespace LDK\DashboardUI\Views\Components\Dropdown;

use LDK\DashboardUI\Views\Components\Component;

class Item extends Component
{
    /**
     * Badge color, should be available in your theme
     *
     * @var string
     */
    public $color;

    /**
     * Either dropdown button is active or not
     *
     * @var boolean
     */
    public $active;

    /**
     * Either to hide hr or not
     *
     * @var boolean
     */
    public $hideHr;

    public function __construct(string $color = 'primary', bool $active = false, bool $hideHr = false)
    {
        $this->validateColor($color);

        $this->color = $color;
        $this->active = $active;
        $this->hideHr = $hideHr;
    }
}
