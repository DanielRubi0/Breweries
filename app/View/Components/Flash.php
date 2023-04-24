<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Flash extends Component
{
    public $code;
    public $message;
    public $color;

    /**
     * Create a new component instance.
     *  
     * @return void
     */
    public function __construct($code = -1, $message = '')
    {
        //
        $this->code = $code;
        $this->message = $message;
        if ($this->code == 0) {
            $this->color = 'success';
        }
        else {
            $this->color= 'danger';
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.flash');
    }
}
