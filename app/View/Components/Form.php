<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;


    /**
     * Create a new component instance.
     */
    class Form extends Component
{
    public string $table;
    public array $fields;

    public string $function;

  
    public function __construct(string $table, array $fields = [] , string $function) {

        $this->fields = $fields;
        $this->table = $table; 
        $this->function = $function;    
    }


    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form');
    }
}
