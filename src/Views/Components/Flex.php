<?php

namespace LDK\DashboardUI\Views\Components;

class Flex extends Component
{
    /**
     * Flex in x-dir
     *
     * @var string
     */
    public $x;

    /**
     * Flex in y-dir
     *
     * @var string
     */
    public $y;

    function __construct(string $x = 'between', string $y = 'center')
    {
        $this->x = $x;
        $this->y = $y;
    }
}
