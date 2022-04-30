<?php

use Illuminate\Support\Facades\Route;
Route::middleware('auth:web')->group(function (){
    Route::resource('orders','OrderController')->except(['create']);
    Route::get('order/create/{id?}','OrderController@create')->name('orders.create');
    Route::get('order/{order_id}/select-vendors','OrderController@select_vendors')->name('orders.select-vendors');
    Route::put('order/{order_id}/select-vendors','OrderController@update_selected_vendors')->name('orders.select-vendors.update');


    Route::post('order-access/{order_id}','OrderController@orderAccess')->name('orders.orderAccess');
    Route::resource('tickets','TicketsController');
    Route::get('balance','BalanceController@balance')->name('balance');
    Route::get('profile','ProfileController@profile')->name('profile');
    
    Route::get('order/{hash_code}/offer/{id}','OrderController@showOffer')->name('order.offers.show');
    Route::get('vendor/{id}/profile','VendorContrller@profile')->name('vendor.profile');
    Route::get('vendor/subscription','VendorContrller@subscription')->name('vendor.subscription');

    // Route::get('vendor/{id}/about','VendorContrller@about')->name('vendor.about');
    // Route::get('vendor/{id}/licenses','VendorContrller@licenses')->name('vendor.licenses');
    // Route::get('vendor/{id}/executed-contracts','VendorContrller@executed_contracts')->name('vendor.executed-contracts');
    // Route::get('vendor/{id}/audio-consulting','VendorContrller@audio_consulting')->name('vendor.audio-consulting');
    // Route::get('vendor/{id}/qualifications-and-training','VendorContrller@qualifications_and_training')->name('vendor.qualifications-and-training');
    // Route::get('vendor/{id}/specialty','VendorContrller@specialty')->name('vendor.specialty');
    // Route::get('vendor/{id}/statistics','VendorContrller@statistics')->name('vendor.statistics');
    // Route::get('vendor/{id}/posts','VendorContrller@posts')->name('vendor.posts');
    Route::post('offers','OrderOfferController@store')->name('offers.store');
    Route::get('order/negotiation/{hash_code}','OrderController@negotiation');
});

Route::get('ajax/third-departments','AjaxController@third_departments')->name('ajax.third-departments');
Route::get('ajax/last-seen','AjaxController@last_seen')->name('ajax.last-seen');


