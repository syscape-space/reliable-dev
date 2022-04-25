<?php

use Illuminate\Support\Facades\Storage;

function cuteAsset($uri){
    $uri ='/'.$uri;
    $uri = str_replace('//','/',$uri);
    // check if file
    if (env('APP_SERVING',false)){
        if (file_exists(__DIR__.'/public'.$uri)) {
            return url($uri);
        }elseif (file_exists(__DIR__.$uri)){
            return url($uri);
        }
    }else{
        if (file_exists(__DIR__.'/public'.$uri)) {
            return asset($uri);
        }elseif (file_exists(__DIR__.$uri)){
            return asset($uri);
        }
    }

    echo "uri:".asset($uri);
    // return uri if not file or not exists
//    return  abort(404);
}
function cloudUrl($path){
 return Storage::disk('cloud')->url($path);
}
function contractTemplateVars(){
    return [
        'contract-amount'   =>  'المبلغ في العقد',
        'contract-judger-amount'   =>  'مبلغ المحكم من العقد',
        'contract-created-date'  =>  'تاريخ الانشاء',
        'contract-created-time'  =>  'وقت الانشاء',
        'contract-period'       =>  'مدة العقد',
        #
        'order-owner-name'  =>  'اسم صاحب الطلب',
        'order-owner-phone'  =>  'جوال صاحب الطلب',
        'order-owner-id'  =>  'رقم هوية صاحب الطلب',
        'order-owner-address'  =>  'عنوان صاحب الطلب',
        #
        'order-judger-name'  =>  'اسم المحكم',
        'order-judger-phone'  =>  'جوال المحكم',
        'order-judger-id'  =>  'رقم هوية المحكم',
        'order-judger-address'  =>  'عنوان المحكم',
        #
        'order-vendor-name'  =>  'اسم مقدم الخدمة',
        'order-vendor-phone'  =>  'جوال مقدم الخدمة',
        'order-vendor-id'  =>  'رقم هوية مقدم الخدمة',
        'order-vendor-address'  =>  'عنوان مقدم الخدمة',
        'order-vendor-licence'  =>  'الترخيص لـ مقدم الخدمة',
        'order-vendor-commercial'  =>  'سجل تجاري لـ مقدم الخدمة',
        #
        'order-title'   =>  'عنوان الطلب',
        'order-department'   =>  'قسم الطلب',
        'order-execution-time'   =>  'مدة تنفيذ الطلب',
        'order-price'   =>  'قيمة مبلغ الطلب',
        #
        'terms'     =>  'بنود العقد',
        'financial'     =>  'البدلات المالية',
    ];
}