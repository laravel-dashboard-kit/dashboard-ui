<?php

namespace LDK\DashboardUI\Views\Components;

use Illuminate\Support\Facades\View;
use LDK\DashboardUI\Views\Components;
use LDK\DashboardUI\Exceptions\ColorNotSupported;
use LDK\DashboardAbstract\Views\Components\Component as BaseComponent;

class Component extends BaseComponent {

    public function render()
    {
        // ex: .buttons.confirm
        $componentName = strtolower(str_replace([Components::class, '\\'], ['','.'], static::class));

        if (View::exists("dashboard-ui::components${componentName}")) {
            return view("dashboard-ui::components${componentName}");
        }

        return view("dashboard-abstract::components${componentName}");
    }

    protected function validateColor(string $color)
    {
        if (!in_array($color, config('dashboard-ui.supported-colors', []))) {
            throw new ColorNotSupported();
        }
    }
}