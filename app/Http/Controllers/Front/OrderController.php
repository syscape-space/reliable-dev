<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Judger;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function arrWith()
    {
        return ['accessVendors','department', 'entities', 'negotiations', 'country', 'city', 'user', 'offers', 'files', 'judgers', 'judger_requests'];

    }

    public function index()
    {
        return view('front.orders.index');
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }

    public function show($hash_code)
    {
        $order= Order::query()->with($this->arrWith())
            ->firstWhere('hash_code', $hash_code)
            ->append('order_step', 'active_vendor', 'active_negotiation', 'active_offer');
        $order->increment('views');
        return view('front.orders.show', compact('order'));
    }


    public function edit(Order $order)
    {
        //
    }

    public function update(Request $request, Order $order)
    {
        //
    }

    public function destroy(Order $order)
    {
        //
    }
}
