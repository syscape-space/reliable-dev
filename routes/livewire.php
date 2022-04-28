<?php

use App\Http\Livewire\FormRegister;
use App\Http\Livewire\Users\Balance;
use App\Http\Livewire\Users\Home;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Users\Judgers\SelectJudges;
use App\Http\Livewire\Users\Subscription;
use App\Http\Livewire\Users\Tickets;
use App\Http\Livewire\Users\ProfileSettings;
use App\Http\Livewire\Users\Vendors\VendorsSelect;
use App\Http\Livewire\Users\Orders\OrderDetails;
use Illuminate\Support\Facades\Auth;

Auth::routes();
Route::view('register','auth.register' )->middleware('guest')->name('register');
Route::get('/', [Home::class,'render'])->name('home');
    Route::group(
        ['middleware' => 'auth'],
    
        function () {
            Route::get('judges-select', SelectJudges::class);
            Route::get('vendors-select', VendorsSelect::class)->name('vendors-select');
            Route::get('profile/settings', ProfileSettings::class)->name('profile_settings');
            Route::get('tickets', Tickets::class);
            Route::get('subscription', Subscription::class);
            Route::get('order-details', OrderDetails::class);
            
        }
    );