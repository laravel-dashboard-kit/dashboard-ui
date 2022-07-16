<?php

namespace LDK\DashboardUI\Views\Components;

use LDK\DashboardUI\Views\Components\Component;

class Button extends Component
{
    /**
     * Button color
     *
     * @var string
     */
    public $color;

    /**
     * If button should be inline
     *
     * @var bool
     */
    public $inline;

    /**
     * If button is disabled
     *
     * @var bool
     */
    public $disabled;

    public function __construct(string $color = 'default', bool $inline = false, bool $disabled = false)
    {
        $this->validateColor($color);

        $this->color = $color;
        $this->inline = $inline;
        $this->disabled = boolval($disabled);

        $this->class([
            "btn btn-{$this->color}",
            "disabled" => $disabled,
            "btn-inline" => $inline,
        ]);
    }
}
