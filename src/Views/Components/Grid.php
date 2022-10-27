<?php

namespace LDK\DashboardUI\Views\Components;

use LDK\DashboardUI\Views\Components\Component;

class Grid extends Component
{
    public ?int $cols = null;

    public ?int $rows = null;

    public ?int $gap = null;

    public function __construct(int $cols = null, int $rows = null, int $gap = null)
    {
        $this->cols = $cols;
        $this->rows = $rows;
        $this->gap = $gap;
    }
}
