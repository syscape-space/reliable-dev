<?php
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use Spatie\Honeypot\ProtectAgainstSpam;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('/', function(){
	return view('welcome');
});
Route::get('/provider', function(){
	return view('front.user.provider.provider');
});
Route::get('/service_provider1', function(){
	return view('front.user.provider.serviceProviders1');
});
Route::get('/service_provider2', function(){
	return view('front.user.provider.serviceProviders2');
});

Route::group(['middleware' => 'auth'],

	function () {
		Route::any('logout', 'Auth\LoginController@logout')->name('web.logout');
	});
//
//Route::middleware(ProtectAgainstSpam::class)->group(function () {
//	Auth::routes(['verify' => true]);
//});

Route::middleware('app-lang')->group(function (){
    Route::get('/lang',function (){
       session(['lang_loc'=>request('loc')]);
       return redirect()->back();
    });
});
