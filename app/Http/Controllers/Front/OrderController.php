<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Judger;
use App\Models\Order;
use App\Models\OrderOffer;
use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\City;
use App\Models\OrderArbitrator;
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
        $this->validate($request,[
            'department_id'=>['required','exists:departments,id'],
            'order_title'=>['required','string'],
            'order_content'=>['required','string'],
            'execution_time'=>['required'],
            'city_id'=>['sometimes'],
            
        ]);
        $request->merge([
            'negotiable'=>$request->has('negotiable')?'yes':'no',
            'order_status'=>'under_review'
        ]);
        $data = $request->except('_token','_method','city_id');
        if ($request->city_id and  $request->city_id != 0)
            $data['city_id'] = $request->city_id;
        $order->update($data);
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
        return redirect()->route('front.orders.index')->with('success', '???? ?????? ?????????? ??????????');
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
        $Order->order_vendors()->syncWithoutDetaching($request->vendors);
        return redirect()->route('front.orders.create',$Order->id)->with('success', '???? ?????????? ??????????');
    }

    public function select_judger($order_id)
    {
        $Order = Order::find($order_id);
        $judgers = User::where('membership_type', 'judger')->get();
        return view('front.orders.select_judger', compact(['Order', 'judgers']));
    }

    public function update_selected_judger(Request $request)
    {
        OrderArbitrator::create($request->all());
        $Order = Order::find($request->order_id);
        $Order->save();
        return redirect()->route('front.orders.show',$Order->hash_code)->with('success', '???? ?????????? ??????????');
    }
    public function accept_judger_by_user(Request $request,$order)
    {
        $Order=Order::findOrFail($order);
        $OrderArbitrator=$Order->arbitrators->last();
        $OrderArbitrator->user_accept_decision='accept';
        $OrderArbitrator->save();
        $Order->assigning_arbitration='yes';
        $Order->save();
        return redirect()->route('front.orders.show',$Order->hash_code)->with('success', '???? ???????? ???????????? ??????????');
    }
    public function reject_judger_by_user(Request $request,$order)
    {
        $Order=Order::findOrFail($order);
        $OrderArbitrator=$Order->arbitrators->last();
        $OrderArbitrator->user_accept_decision='reject';
        $OrderArbitrator->user_refused_message=$request->reject_msg;
        $OrderArbitrator->save();
        return redirect()->route('front.orders.show',$Order->hash_code)->with('success', '???? ?????? ???????????? ??????????');
    }
    
    public function orderAccess($order_id){
        $order = Order::query()->find($order_id);
        $order->accessVendors()->attach(\auth()->id(),\request()->only('option_1','option_2'));
        return redirect()->route('front.orders.show',$order->hash_code)->withSuccess('???? ???????????? ??????????');
    }
    public function negotiation($hash_code){
        $order = Order::query()->firstWhere('hash_code',$hash_code);
        $active_negotiation = $order->active_negotiation;
        return view('front.orders.negotiation',compact('active_negotiation','order'));
    }
    public function MyOrders(){ # vendor orders
        $orders = Order::query()->join('order_offers','orders.id','=','order_offers.order_id','left')
            ->where('order_offers.vendor_id',auth()->id())
            ->where('offer_status','approved')
            ->where(function ($q){
                if (\request()->status)
                    $q->where('orders.order_status',\request('status'));
            })
            ->select('orders.*')
            ->get();
        return view('front.orders.me',compact('orders'));
    }


}
