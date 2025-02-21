<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Tables extends Component
{
    /**
     * Create a new component instance.
     */

     public array $columns;
     public array $items;
     public string $table;
 
     public function __construct(array $columns, array $items, string $table)
     {
         $this->columns = $columns; 
         $this->items = $items;     
         $this->table = $table;     
     }
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.tables');
    }
}
