<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Users\Judgers\SelectJudges;
use App\Http\Livewire\Users\Subscription;
use App\Http\Livewire\Users\Tickets;
use App\Http\Livewire\Users\Vendors\VendorSettings;
use App\Http\Livewire\Users\Vendors\VendorsSelect;
use App\Http\Livewire\Users\Orders\OrderDetails;
use App\Http\Livewire\Users\Orders\CreateOrder;




   


Route::group(['middleware' => 'auth'],function () {

    Route::get('judges-select', SelectJudges::class);
    Route::get('vendors-judges', VendorsSelect::class);
    Route::get('vendors-settings', VendorSettings::class);
    Route::get('tickets', Tickets::class);
    Route::get('subscription', Subscription::class);
    Route::get('order-details', OrderDetails::class);
    Route::get('create-order', CreateOrder::class);

});