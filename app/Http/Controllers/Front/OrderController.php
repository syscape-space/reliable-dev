<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Judger;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\City;

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
        $Order = Order::first();
        $main_departments = Department::where('parent', null)->get();
        $second_departments = Department::query()->whereParent($main_departments->first()->id)->get();
        $cities = City::all();

        return view('front.orders.create', compact(['Order', 'main_departments', 'second_departments', 'cities']));
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
        $order->update($request->all());
        return redirect()->back()->with('success', 'تم حفظ الطلب بنجاح');
    }

    public function destroy(Order $order)
    {
        //
    }
    public function orderAccess($order_id){
        $order = Order::query()->find($order_id);
        $order->accessVendors()->attach(\auth()->id(),\request()->only('option_1','option_2'));
        return redirect()->route('front.orders.show',$order->hash_code)->withSuccess('تم الدخول بنجاح');
    }
}
