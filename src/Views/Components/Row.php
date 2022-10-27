<?php

namespace LDK\DashboardUI\Views\Components;

use LDK\DashboardUI\Views\Components\Component;

class Row extends Component
{
    public ?int $gap = null;

    function __construct(int $gap = null)
    {
        $this->gap = $gap;
    }
}
