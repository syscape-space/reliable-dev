<?php

namespace App\Http\Livewire\Users\Orders;

use Livewire\Component;
use App\Models\Order;

class OrderDetails extends Component
{
    public function render()
    {

        $order = Order::first();
        return view('livewire.front.users.orders.order-details', compact([
            'order',

        ]))->extends('front.layout.index');
    }
}
