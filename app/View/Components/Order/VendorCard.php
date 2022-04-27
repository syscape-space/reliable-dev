<?php

namespace App\View\Components\Order;

use Illuminate\View\Component;

class VendorCard extends Component
{
    public $item;
    public $isOffer;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($item,$isOffer)
    {
        $this->item = $item;
        $this->isOffer = $isOffer;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.order.vendor-card');
    }
}
