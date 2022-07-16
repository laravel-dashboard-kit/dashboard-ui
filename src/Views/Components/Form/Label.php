<?php

namespace LDK\DashboardUI\Views\Components\Form;

use LDK\DashboardUI\Views\Components\Component;

class Label extends Component
{
    /**
     * Is required
     *
     * @var bool
     */
    public $required;

    function __construct(bool $required = false)
    {
        $this->required = $required;
    }
}
