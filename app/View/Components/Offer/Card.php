<?php

namespace App\View\Components\Offer;

use App\Models\OrderOffer;
use Illuminate\View\Component;

class Card extends Component
{
    public $offer;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(OrderOffer $offer)
    {
        $this->offer = $offer;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.offer.card');
    }
}
