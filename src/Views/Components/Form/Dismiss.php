<?php

namespace LDK\DashboardUI\Views\Components\Form;

use LDK\DashboardUI\Views\Components\Component;

class Dismiss extends Component
{
    /**
     * Button color
     *
     * @var string
     */
    public $color;

    function __construct(string $color = 'danger')
    {
        $this->validateColor($color);

        $this->color = $color;
    }
}
