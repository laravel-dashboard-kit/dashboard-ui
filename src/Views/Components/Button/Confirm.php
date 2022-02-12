<?php

namespace LDK\DashboardUI\Views\Components\Button;

use LDK\DashboardUI\Views\Components\Component;

class Confirm extends Component
{
    /**
     * ID for alert handler
     *
     * @var string
     */
    public $id;

    /**
     * Button color
     *
     * @var string
     */
    public $color;

    /**
     * Swal options
     *
     * @see https://sweetalert2.github.io/#configuration
     * @var array
     */
    public $options;

    public function __construct(string $id = null, string $color = 'danger', array $options = [])
    {
        if (!$id) {
            $id = uniqid('confirm');
        }

        $this->id = $id;
        $this->color = $color;
        $this->options = $options;
    }
}
