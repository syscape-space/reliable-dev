<?php

namespace App\Http\Livewire\Users\Orders;

use Livewire\Component;
use App\Models\Order;

class CreateOrder extends Component
{
    public function render()
    {

        $order = Order::first();
        return view('livewire.front.users.orders.create-order', compact([
            'order',

        ]))->extends('livewire.front.layout.null');
    }
}
