<?php

namespace LDK\DashboardUI\Views\Components\Form;

use LDK\DashboardUI\Views\Components\Component;

class Input extends Component
{
    /**
     * Input type
     *
     * @var string
     */
    public $type;

    function __construct(string $type = 'text')
    {
        $this->type = $type;
    }
}
