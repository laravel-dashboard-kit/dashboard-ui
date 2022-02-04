<?php

namespace LDK\DashboardUI\Views\Components;

use LDK\DashboardAbstract\Views\Components\Component;

class Badge extends Component
{
    public $color;
    public $pill;

    public function __construct(string $color = 'primary', $pill = false)
    {
        parent::__construct();

        $this->color = $color;
        $this->pill = boolval($pill);

        $this->class([
            "badge badge-{$this->color}",
            'badge-pill' => $this->pill
        ]);
    }

    public function render()
    {
        return view('dashboard-ui::components.badge');
    }
}
