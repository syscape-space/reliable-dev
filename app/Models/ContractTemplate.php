<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class ContractTemplate extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $appends =['title','content'];
    public function getTitleAttribute(){
        return app()->getLocale() === 'ar' ?  $this->title_ar : $this->title_en ;
    }
    public function getContentAttribute(){
        return app()->getLocale() === 'ar' ?  $this->content_ar : $this->content_en ;
    }
    public function renderContent($data){
        $terms = implode('- <br>',$data['terms']);
        $financial_terms = implode('- <br>',$data['financial_terms']);
        $order = Order::query()->find($data['order_id']);
        return str_replace([
            'contract-amount',
            'contract-judger-amount',
            'contract-created-date',
            'contract-created-time',
            'contract-period',
            #
            'order-owner-name',
            'order-owner-phone',
            'order-owner-id' ,
            'order-owner-address',
            #
            'order-judger-name',
            'order-judger-phone',
            'order-judger-id',
            'order-judger-address',
            #
            'order-vendor-name',
            'order-vendor-phone',
            'order-vendor-id',
            'order-vendor-address',
            'order-vendor-licence',
            'order-vendor-commercial',
            #
            'order-title',
            'order-department',
            'order-execution-time',
            'order-price',
            #
            'terms',
            'financial',
            ],[
            $data['amount'],
            0,
            Carbon::now()->toDateString(),
            Carbon::now()->toTimeString(),
            $data['days'],
            #
            $order->user->name,
            $order->user->mobile,
            $order->user->id,
            $order->user->address,
            #
            $order->active_judger->name ?? "",
            $order->active_judger->mobile ?? "",
            $order->active_judger->id ?? "",
            $order->active_judger->address ?? "",
            #
            $order->active_vendor->name,
            $order->active_vendor->phone,
            $order->active_vendor->id,
            $order->active_vendor->address,
            'licence-12',
            'commercial-12',
            #
            $order->order_title,
            'قسم',
            $order->execution_time,
            $order->amount,
            #
            $terms,
            $financial_terms,
        ],$this->content);
    }
}
