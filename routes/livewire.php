<?php
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Users\Judgers\SelectJudges;
use App\Http\Livewire\Users\Subscription;
use App\Http\Livewire\Users\Tickets;
use App\Http\Livewire\Users\Vendors\VendorSettings;
use App\Http\Livewire\Users\Vendors\VendorsSelect;

Route::get('judges-select', SelectJudges::class);
Route::get('vendors-judges', VendorsSelect::class);
Route::get('vendors-settings', VendorSettings::class);
Route::get('tickets', Tickets::class);
Route::get('subscription',Subscription::class);