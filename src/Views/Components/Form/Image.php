<?php

namespace LDK\DashboardUI\Views\Components\Form;

use Illuminate\Support\Str;
use LDK\DashboardUI\Views\Components\Component;

class Image extends Component
{
    /**
     * Input name
     *
     * @var string
     */
    public $name;

    /**
     * Preview source
     *
     * @var string
     */
    public $previewSrc;

    /**
     * ID
     *
     * @var string
     */
    public $id;

    /**
     * Hide label
     *
     * @var bool
     */
    public $hideLabel;

    function __construct(string $name = null, string $previewSrc = 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVR42mNkYPhfDwAChwGA60e6kgAAAABJRU5ErkJggg==', string $id = null, bool $hideLabel = false)
    {
        $this->name = $name ?? uniqid('image-');
        $this->previewSrc = $previewSrc;
        $this->id = $id ?? Str::slug(uniqid($name));
        $this->hideLabel = $hideLabel;
    }
}
