<?php

use App\Http\Controllers\Api\V1\VendorController;
use App\Http\Controllers\Api\V2\UpdateUserProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */
// your api is integerated but if you want reintegrate no problem
// to configure jwt-auth visit this link https://jwt-auth.readthedocs.io/en/docs/

Route::group(['middleware' => ['ApiLang', 'cors'], 'prefix' => 'v2', 'namespace' => 'Api\V2'], function () {
	Route::post('login', 'AuthController@login')->name('api.login');
	Route::post('register', 'AuthController@register')->name('api.register');

	Route::put('update-profile/{id}', 'UpdateUserProfileController@update');

	Route::group(['middleware' => 'guest'], function () {
		Route::get('our-services', 'OurServiceController@index');
		Route::get('careers', 'CareerApi@index');
		Route::get('partners', 'PartnerApi@index');
		Route::post('career-requests', 'CareerRequestApi@store');

		Route::get('vendors', 'VendorController@index');
		Route::get('vendors/{id}', 'VendorController@show');
	});
	Route::group(['middleware' => 'jwt-midd'], function () {
		Route::get('account', 'AuthController@account')->name('api.account');
	});
});


Route::group(
	['middleware' => ['ApiLang', 'cors'], 'prefix' => 'v1', 'namespace' => 'Api\V1'],

	function () {



		Route::apiResource("cities", "CitiesApi", ["as" => "api.cities"]);
		Route::post("cities/multi_delete", "CitiesApi@multi_delete");

		// My Routes [ Mostafa Gamal ]
		Route::get('vendor_profile/{id}', 'VendorController@vendorProfile');
		Route::get('my_tickets/{id}', 'TicketController@getMyTickets');
		Route::get('all_depts', 'TicketController@getAllDepts');
		Route::post('new_ticket', 'TicketController@addNewTicket');
		Route::get('get_specific_ticket/{id}', 'TicketController@getSpecificTicket');
		Route::get('all_jobs', 'JobsController@getAllJobs');
		Route::get('get_this_job_details/{id}', 'JobsController@getThisJobDetails');
		Route::post('apply_now', 'JobsController@makeApply');
		Route::get('get_all_replys_of_this_ticket/{id}', "TicketReplyController@getAllReplysOfThisTicket");
		Route::post('add_comment_for_this_ticket/{ticket_id}', 'TicketController@addCommentForThisTicket');



		Route::get('/', function () {
			echo "HI";
		});
		// Insert your Api Here Start //
		// 		Route::group(['middleware' => 'guest'], function () {
		// 				Route::post('login', 'Auth\AuthAndLogin@login')->name('api.login');
		// 				Route::post('register', 'Auth\Register@register')->name('api.register');
		// 			});

		Route::get("/vendor_profile", [VendorController::class, "getProfile"]);
		/**
		 * 
		 */


		Route::group(['middleware' => 'jwt.auth'], function () {
			Route::get('settings', 'SettingController@index');
			Route::get('account', 'Auth\AuthAndLogin@account')->name('api.account');
			Route::post('logout', 'Auth\AuthAndLogin@logout')->name('api.logout');
			Route::post('refresh', 'Auth\AuthAndLogin@refresh')->name('api.refresh');
			Route::post('me', 'Auth\AuthAndLogin@me')->name('api.me');
			Route::post('change/password', 'Auth\AuthAndLogin@change_password')->name('api.change_password');
			Route::post('verify/password', 'Auth\AuthAndLogin@verify_password')->name('api.change_password');
			//Auth-Api-Start//
			Route::apiResource("occupations", "OccupationsApi", ["as" => "api.occupations"]);
			Route::post("occupations/multi_delete", "OccupationsApi@multi_delete");
			Route::apiResource("specialties", "SpecialtiesApi", ["as" => "api.specialties"]);
			Route::post("specialties/multi_delete", "SpecialtiesApi@multi_delete");
			Route::apiResource("countries", "CountriesApi", ["as" => "api.countries"]);
			Route::post("countries/multi_delete", "CountriesApi@multi_delete");

			Route::apiResource("socials", "SocialsApi", ["as" => "api.socials"]);
			Route::post("socials/multi_delete", "SocialsApi@multi_delete");
			Route::apiResource("pages", "PagesApi", ["as" => "api.pages"]);
			Route::post("pages/multi_delete", "PagesApi@multi_delete");
			Route::apiResource("userlicenses", "UserLicensesApi", ["as" => "api.userlicenses"]);
			Route::post("userlicenses/multi_delete", "UserLicensesApi@multi_delete");
			Route::apiResource("userexperiences", "UserExperiencesApi", ["as" => "api.userexperiences"]);
			Route::post("userexperiences/multi_delete", "UserExperiencesApi@multi_delete");
			Route::apiResource("userqualifications", "UserQualificationsApi", ["as" => "api.userqualifications"]);
			Route::post("userqualifications/multi_delete", "UserQualificationsApi@multi_delete");
			Route::apiResource("usercommercials", "UserCommercialsApi", ["as" => "api.usercommercials"]);
			Route::post("usercommercials/multi_delete", "UserCommercialsApi@multi_delete");
			Route::apiResource("subscriptionfees", "SubscriptionFeesApi", ["as" => "api.subscriptionfees"]);
			Route::post("subscriptionfees/multi_delete", "SubscriptionFeesApi@multi_delete");
			Route::apiResource("faqs", "FAQsApi", ["as" => "api.faqs"]);
			Route::post("faqs/multi_delete", "FAQsApi@multi_delete");
			Route::apiResource("ticketdepartments", "TicketDepartmentsApi", ["as" => "api.ticketdepartments"]);
			Route::post("ticketdepartments/multi_delete", "TicketDepartmentsApi@multi_delete");
			Route::apiResource("tickets", "TicketsApi", ["as" => "api.tickets"]);
			Route::post("tickets/multi_delete", "TicketsApi@multi_delete");
			Route::post("tickets/upload/multi", "TicketsApi@multi_upload");
			Route::post("tickets/delete/file", "TicketsApi@delete_file");
			Route::apiResource("users", "UsersApi", ["as" => "api.users"]);
			Route::post("users/multi_delete", "UsersApi@multi_delete");
			Route::apiResource("vendorpackages", "VendorPackagesApi", ["as" => "api.vendorpackages"]);
			Route::post("vendorpackages/multi_delete", "VendorPackagesApi@multi_delete");
			Route::apiResource("packagerequests", "PackageRequestsApi", ["as" => "api.packagerequests"]);
			Route::post("packagerequests/multi_delete", "PackageRequestsApi@multi_delete");
			Route::apiResource("orders", "OrdersApi", ["as" => "api.orders"]);
			Route::post("orders/multi_delete", "OrdersApi@multi_delete");
			Route::post("orders/upload/multi", "OrdersApi@multi_upload");
			Route::post("orders/delete/file", "OrdersApi@delete_file");
			Route::apiResource("ordertypes", "OrderTypesApi", ["as" => "api.ordertypes"]);
			Route::post("ordertypes/multi_delete", "OrderTypesApi@multi_delete");
			Route::apiResource("userjobs", "UserJobsApi", ["as" => "api.userjobs"]);
			Route::post("userjobs/multi_delete", "UserJobsApi@multi_delete");
			Route::apiResource("orderoffers", "OrderOffersApi", ["as" => "api.orderoffers"]);
			Route::post("orderoffers/multi_delete", "OrderOffersApi@multi_delete");
			Route::post("orderoffers/upload/multi", "OrderOffersApi@multi_upload");
			Route::post("orderoffers/delete/file", "OrderOffersApi@delete_file");
			Route::apiResource("orderofferinvoices", "OrderOfferInvoicesApi", ["as" => "api.orderofferinvoices"]);
			Route::post("orderofferinvoices/multi_delete", "OrderOfferInvoicesApi@multi_delete");
			Route::apiResource("orderarbitrators", "OrderArbitratorsApi", ["as" => "api.orderarbitrators"]);
			Route::post("orderarbitrators/multi_delete", "OrderArbitratorsApi@multi_delete");
			Route::apiResource("orderarbitratorinvoices", "OrderArbitratorInvoicesApi", ["as" => "api.orderarbitratorinvoices"]);
			Route::post("orderarbitratorinvoices/multi_delete", "OrderArbitratorInvoicesApi@multi_delete");
			Route::apiResource("systemmessages", "SystemMessagesApi", ["as" => "api.systemmessages"]);
			Route::post("systemmessages/multi_delete", "SystemMessagesApi@multi_delete");
			Route::apiResource("balancerecharges", "BalanceRechargesApi", ["as" => "api.balancerecharges"]);
			Route::post("balancerecharges/multi_delete", "BalanceRechargesApi@multi_delete");
			Route::apiResource("balancewithdrawals", "BalanceWithdrawalsApi", ["as" => "api.balancewithdrawals"]);
			Route::post("balancewithdrawals/multi_delete", "BalanceWithdrawalsApi@multi_delete");
			Route::resource('departments', 'DepartmentController')->only('index');

			//Auth-Api-End//
		});


		// Insert your Api Here End //
	}
);

Route::get('profile', [UpdateUserProfileController::class, 'index'])->middleware('jwt.auth');
Route::post('profile/license', [UpdateUserProfileController::class, 'storeLicense'])->middleware('jwt.auth');
Route::post('profile/personal', [UpdateUserProfileController::class, 'update'])->middleware('jwt.auth');
Route::post('profile/commercial', [UpdateUserProfileController::class, 'storeCommercial'])->middleware('jwt.auth');
Route::post('profile/experience', [UpdateUserProfileController::class, 'storeExperience'])->middleware('jwt.auth');
Route::post('profile/qualification', [UpdateUserProfileController::class, 'storeQualification'])->middleware('jwt.auth');
