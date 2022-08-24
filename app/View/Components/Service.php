<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\Database\Eloquent\Model;

class Service extends Component
{
    public $service;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Model $data)
    {
        $this->service = $data;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.service');
    }
}
