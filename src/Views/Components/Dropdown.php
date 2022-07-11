<?php

namespace LDK\DashboardUI\Views\Components;

class Dropdown extends Component
{
    /**
     * Badge color, should be available in your theme
     *
     * @var string
     */
    public $color;

    /**
     * Either dropdown button is active or not
     *
     * @var boolean
     */
    public $active;

    /**
     * The title of dropdown button
     *
     * @var string
     */
    public $title;

    public function __construct(string $color = 'primary', bool $active = false, string $title = null)
    {
        $this->validateColor($color);

        $this->color = $color;
        $this->active = $active;
        $this->title = $title;
    }
}
