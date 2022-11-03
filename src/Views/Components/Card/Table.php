<?php

namespace LDK\DashboardUI\Views\Components\Card;

use LDK\DashboardUI\Views\Components\Component;

class Table extends Component
{
    public ?string $title;
    public ?string $subtitle;

    public function __construct(string $title = null, string $subtitle = null)
    {
        $this->title = $title;
        $this->subtitle = $subtitle;
    }
}
