<?php

use App\Http\Controllers\Api\V2\UpdateUserProfileController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Front\ProfileController;
use App\Models\FAQ;
use Illuminate\Support\Facades\Auth;
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
Auth::routes();
Route::get('/provider', function () {
	return view('front.user.provider.provider');
});
Route::get('/service_provider1', function () {
	return view('front.user.provider.serviceProviders1');
});
Route::get('/service_provider2', function () {
	return view('front.user.provider.serviceProviders2');
});

Route::group(
	['middleware' => 'auth'],

	function () {
		Route::any('logout', 'Auth\LoginController@logout')->name('web.logout');
	}
);
//
//Route::middleware(ProtectAgainstSpam::class)->group(function () {
//	Auth::routes(['verify' => true]);
//});

Route::middleware('app-lang')->group(function () {
	Route::get('/lang', function () {
		session(['lang_loc' => request('loc')]);
		return redirect()->back();
	});
});
Route::resource('orders', 'Front\OrderController');
// Route::resource('profile', UpdateUserProfileController::class);
// Route::group(['middleware' => 'auth'], function () {
Route::get('/profile', [UpdateUserProfileController::class, 'index']);
Route::post('/profile', [UpdateUserProfileController::class, 'update']);
Route::post('/profile/license', [UpdateUserProfileController::class, 'storeLicense']);
Route::post('/profile/commercial', [UpdateUserProfileController::class, 'storeCommercial']);
Route::post('/profile/experience', [UpdateUserProfileController::class, 'storeExperience']);
Route::post('/profile/qualification', [UpdateUserProfileController::class, 'storeQualification']);
Route::get('/faqs', function(){
	$faqs=FAQ::all();
	return view('front.faqs.faqs',compact('faqs'));
});
// });
// Route::post('/profile', [ProfileController::class, 'updatePersonalInfo'])->name('profile.personal.update');
// Route::post('/profile', [ProfileController::class, 'updatePersonalInfo'])->name('profile.personal.update');







