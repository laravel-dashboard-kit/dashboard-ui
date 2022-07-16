<?php

namespace LDK\DashboardUI\Views\Components\Form;

use LDK\DashboardUI\Views\Components\Component;

class Select extends Component
{
    /**
     * Select options
     *
     * @var array
     */
    public $items;

    /**
     * Selected items
     *
     * @var array|string
     */
    public $selected;

    /**
     * Input type
     *
     * @var string
     */
    public $label;

    function __construct(array $items = [], $selected = null, string $label = null)
    {
        $this->items = $items;
        $this->selected = $selected;
        $this->label = $label;
    }
}
