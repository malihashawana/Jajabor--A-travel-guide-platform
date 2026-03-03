<?php

namespace App\View\Components;

use Illuminate\View\Component;

class FormLabel extends Component
{
    public $for;
    public $class;

    public function __construct($for, $class = '')
    {
        $this->for = $for;
        $this->class = $class;
    }

    public function render()
    {
        return view('components.form-label');
    }
}
