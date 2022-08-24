<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Component
{
    public $doctor;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Model $data)
    {
        $this->doctor = $data;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.doctor');
    }
}
