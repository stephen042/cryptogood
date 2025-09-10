<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Button extends Component
{
    public $color;
    public $text;
    public $type;

    public function __construct($color = 'blue', $text = 'Submit', $type = 'button')
    {
        $this->color = $color;
        $this->text = $text;
        $this->type = $type;
    }

    public function render()
    {
        return view('components.button');
    }
}
