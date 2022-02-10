<?php

namespace LDK\DashboardUI\Views\Components;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\View;
use LDK\DashboardUI\Views\Components;
use Illuminate\View\Component as BaseComponent;
use LDK\DashboardUI\Exceptions\ColorNotSupported;

class Component extends BaseComponent
{
    public $class;
    public $defaultAttributes = [];

    public function class(array $classes = [])
    {
        $this->class = Arr::toCssClasses($classes);

        $this->defaultAttributes['class'] = $this->class;

        return $this;
    }

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