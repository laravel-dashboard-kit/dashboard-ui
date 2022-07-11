<?php

namespace LDK\DashboardUI\Views\Components;

class Form extends Component
{
    /**
     * Confirm form before submit
     *
     * @var string
     */
    public $confirm;

    function __construct(string $confirm = null)
    {
        $this->confirm = $confirm;
    }
}
