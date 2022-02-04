<?php

namespace LDK\DashboardUI\Views\Components;

use ReflectionClass;
use Illuminate\Support\Facades\View;
use LDK\DashboardAbstract\Views\Components\Component as BaseComponent;
use LDK\DashboardUI\Exceptions\ColorNotSupported;

class Component extends BaseComponent {

    public function render()
    {
        $componentName = strtolower((new ReflectionClass(get_called_class()))->getShortName());

        if (View::exists("dashboard-ui::component.${componentName}")) {
            return view("dashboard-ui::components.${componentName}");
        }

        return view("dashboard-abstract::components.${componentName}");
    }

    protected function validateColor(string $color)
    {
        if (!in_array($color, config('dashboard-ui.supported-colors', []))) {
            throw new ColorNotSupported();
        }
    }
}