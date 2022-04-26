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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Order = Order::first();
        $main_departments = Department::where('parent', null)->get();
        $second_departments = Department::query()->whereParent($main_departments->first()->id)->get();
        $cities = City::all();

        return view('front.orders.create', compact(['Order', 'main_departments', 'second_departments', 'cities']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
         $order=$order->load(['offers.user','user_id'=>function($q){
            $q->select('id','name');
        }])->loadCount(['offers']);
        return view('front.orders.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        $order->update($request->all());
        return redirect()->back()->with('success', 'تم حفظ الطلب بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
