<?php

namespace LDK\DashboardUI\Views\Components;

use LDK\DashboardUI\Views\Components\Component;

class Loading extends Component
{
    public ?string $image = null;

    function __construct(string $image = null)
    {
        $this->image = $image;
    }
}
