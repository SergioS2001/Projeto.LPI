<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Button extends Component
{
    public $href;
    public $class;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($href = null, $class = null)
    {
        $this->href = $href;
        $this->class = $class;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.button');
    }
}
