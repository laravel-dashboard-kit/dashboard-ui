<?php

namespace LDK\DashboardUI\Views\Components\Alert;

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
     * Swal options
     *
     * @see https://sweetalert2.github.io/#configuration
     * @var array
     */
    public $options;

    public function __construct(string $id = null, array $options = [])
    {
        if (!$id) {
            $id = uniqid('confirm');
        }

        $this->id = $id;

        $this->options = array_merge([
            'text' => "You can't revert that",
            'icon' => "warning",
            'showCancelButton' => true,
            'confirmButtonText' => 'Ok',
            'cancelButtonText' => 'Cancel',
        ], $options);
    }
}
