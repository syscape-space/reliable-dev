<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Judger;
use App\Models\Order;
use App\Models\OrderOffer;
use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\City;
use App\Models\OrderFile;
use App\Models\User;

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


    public function create($id = null)
    {
        
        if ($id == null) {
            $Order = new Order;
            $Order->user_id = auth()->user()->id;
            $Order->order_content = '';
            $Order->order_status = 'archived';
            $Order->save();

        } else {
            $Order = Order::find($id);
        }
       
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
    public function showOffer($hash_code, $offer)
    {
        $offer = OrderOffer::query()->find($offer);
        $order= Order::query()->with($this->arrWith())
            ->firstWhere('hash_code', $hash_code)
            ->append('order_step', 'active_vendor', 'active_negotiation', 'active_offer');
        $order->increment('views');
        return view('front.orders.show-offer', compact('order','offer'));
    }


    public function edit(Order $order)
    {
        //
    }


    public function update(Request $request, Order $order)
    {
        // $order->order_type_id = '';
        // $order->user_id = $request->user_id;
        // $order->department_id = '';
        // $order->main_order_id = '';
        // $order->linked_order = '';
        // $order->show_order_data = '';
        // $order->order_title = $request->order_title;
        // $order->choose_service_provider = '';
        // $order->country_id = $request->country_id;
        // $order->city_id = $request->city_id;
        // $order->execution_time = $request->execution_time;
        // $order->amount = $request->amount;
        $request->merge([
            'negotiable'=>$request->has('negotiable')?'yes':'no',
            'order_status'=>'under_review'
        ]);
        
        $order->update($request->except('_token','_method'));
        if($request->hasFile('pdf')){
            it()->upload($request->file('pdf'), 'orders/' . $order->id);
            $file=new OrderFile();
            $file->order_id=$order->id;
            $file->path=it()->upload($request->file('pdf'), 'orders/' . $order->id);
            $file->type=$request->file('pdf')->getClientMimeType();
            $file->save();
        }
        if($request->hasFile('voice')){
            it()->upload($request->file('voice'), 'orders/' . $order->id);
            $file=new OrderFile();
            $file->order_id=$order->id;
            $file->path=it()->upload($request->file('voice'), 'orders/' . $order->id);
            $file->type=$request->file('voice')->getClientMimeType();
            $file->save();
        }
        return redirect('/profile')->with('success', 'تم حفظ الطلب بنجاح');
    }


    public function destroy($order_id)
    {
        //
    }


    public function select_vendors($order_id)
    {
        $Order = Order::find($order_id);
        $vendors = User::where('membership_type', 'vendor')->get();
        $order_vendors = $Order->order_vendors->pluck('id')->toArray();
        return view('front.orders.select_vendor', compact(['Order', 'vendors', 'order_vendors']));
    }


    public function update_selected_vendors(Request $request)
    {
        $Order = Order::find($request->order_id);
        $Order->order_vendors()->sync($request->vendors);
        return redirect()->route('front.orders.create', $Order->id)->with('success', 'تم الحفظ بنجاح');
    }

    
    public function orderAccess($order_id){
        $order = Order::query()->find($order_id);
        $order->accessVendors()->attach(\auth()->id(),\request()->only('option_1','option_2'));
        return redirect()->route('front.orders.show',$order->hash_code)->withSuccess('تم الدخول بنجاح');
    }
    public function negotiation($hash_code){
        $order = Order::query()->firstWhere('hash_code',$hash_code);
        $active_negotiation = $order->active_negotiation;
        return view('front.orders.negotiation',compact('active_negotiation','order'));
    }


}
