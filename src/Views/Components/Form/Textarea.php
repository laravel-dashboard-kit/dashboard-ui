<?php

namespace LDK\DashboardUI\Views\Components\Form;

use LDK\DashboardUI\Views\Components\Component;

class Textarea extends Component
{
    /**
     * Hide label
     *
     * @var bool
     */
    public $hideLabel;

    /**
     * Textarea should be CKEditor
     *
     * @var bool
     */
    public $ckeditor;

    function __construct(bool $hideLabel = false, bool $ckeditor = false)
    {
        $this->hideLabel = $hideLabel;
        $this->ckeditor = $ckeditor;
    }
}
