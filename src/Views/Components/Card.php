<?php

namespace LDK\DashboardUI\Views\Components;

use Illuminate\Support\Arr;
use LDK\DashboardUI\Views\Components\Component;

class Card extends Component
{
    /**
     * Button color
     *
     * @var string
     */
    public $bgColor;

    /**
     * No padding for body
     *
     * @var string
     */
    public $inset;

    /**
     * Body class
     *
     * @var string
     */
    public $bodyClasses = "";

    public function __construct(string $bgColor = null, bool $inset = false)
    {
        if ($bgColor) {
            $this->validateColor($bgColor);

            $this->bgColor = $bgColor;
        }

        $this->inset = $inset;
    }

    public function render()
    {
        // return function(array $data) {
            $this->class([
                "card",
            ]);

            $this->bodyClasses = Arr::toCssClasses([
                'card-body',
                // 'pb-0' => !is_null($data['attributes']->get('footer')),
            ]);

            return parent::render();
        // };
    }
}
