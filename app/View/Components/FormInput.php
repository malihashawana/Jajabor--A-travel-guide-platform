<?php

namespace App\View\Components;

use Illuminate\View\Component;

class FormInput extends Component
{
    public $type;
    public $name;
    public $id;
    public $placeholder;
    public $class;
    public $required;

    public function __construct($type, $name, $id = null, $placeholder = '', $class = '', $required = false)
    {
        $this->type = $type;
        $this->name = $name;
        $this->id = $id ?? $name;
        $this->placeholder = $placeholder;
        $this->class = $class;
        $this->required = $required;
    }

    public function render()
    {
        return view('components.form-input');
    }
}
