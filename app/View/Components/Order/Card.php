<?php

namespace App\View\Components\Order;

use App\Models\Order;
use Illuminate\View\Component;

class Card extends Component
{
    public $order;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.order.card',['order'=>$this->order]);
    }
}
