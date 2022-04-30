<?php

namespace App\Http\Livewire;

use Livewire\Component;

class OfferOrNegotiateForm extends Component
{
    public $order;
    public $canOffer;
    public $active_negotiation;
    public $op = null;
    public function render()
    {
        return view('livewire.offer-or-negotiate-form');
    }
}
