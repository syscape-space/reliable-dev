<?php

namespace App\Http\Livewire;

use Livewire\Component;

class OfferOrNegotiateForm extends Component
{
    public $order_id;
    public $canOffer;
    public $op = null;
    public function render()
    {
        return view('livewire.offer-or-negotiate-form');
    }
}
