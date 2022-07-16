<?php

namespace LDK\DashboardUI\Views\Components\Form;

use LDK\DashboardUI\Views\Components\Component;

class Submit extends Component
{
    /**
     * Button color
     *
     * @var string
     */
    public $color;

    /**
     * Don't notify toast
     *
     * @var bool
     */
    public $dontNotify;

    function __construct(string $color = 'success', bool $dontNotify = false)
    {
        $this->validateColor($color);

        $this->color = $color;
        $this->dontNotify = $dontNotify;
    }
}
