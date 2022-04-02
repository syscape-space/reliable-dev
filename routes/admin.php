<?php

use Illuminate\Support\Facades\Route;

\L::Panel(app('admin')); ///SetLangredirecttoadmin
\L::LangNonymous(); //RunRouteLang'namespace'=>'Admin',
Route::group(
	['prefix' => app('admin'), 'middleware' => 'Lang'],

	function () {

		Route::view('license', 'admin.users.license-create');
		Route::view('license/show', 'admin.users.license-show');



		Route::get('lock/screen', 'Admin\AdminAuthenticated@lock_screen');
		Route::get('theme/{id}', 'Admin\Dashboard@theme');
		Route::group(['middleware' => 'admin_guest'], function () {
			Route::get('login', 'Admin\AdminAuthenticated@login_page');
			Route::post('login', 'Admin\AdminAuthenticated@login_post');
			Route::view('forgot/password', 'admin.forgot_password');

			Route::post('reset/password', 'Admin\AdminAuthenticated@reset_password');
			Route::get('password/reset/{token}', 'Admin\AdminAuthenticated@reset_password_final');
			Route::post('password/reset/{token}', 'Admin\AdminAuthenticated@reset_password_change');
		});

		Route::view('need/permission', 'admin.no_permission');
		Route::group(['middleware' => 'admin:admin'], function () {
			if (class_exists(\UniSharp\LaravelFilemanager\Lfm::class)) {
				Route::group(['prefix' => 'filemanager'], function () {
					\UniSharp\LaravelFilemanager\Lfm::routes();
				});
			}

			////////AdminRoutes/*Start*///////////////
			Route::get('/', 'Admin\Dashboard@home');
			Route::any('logout', 'Admin\AdminAuthenticated@logout');
			Route::get('account', 'Admin\AdminAuthenticated@account');
			Route::post('account', 'Admin\AdminAuthenticated@account_post');
			Route::resource('settings', 'Admin\Settings');
			Route::resource('admingroups', 'Admin\AdminGroups');
			Route::post('admingroups/multi_delete', 'Admin\AdminGroups@multi_delete');
			Route::resource('admins', 'Admin\Admins');
			Route::post('admins/multi_delete', 'Admin\Admins@multi_delete');
			Route::resource('occupations', 'Admin\Occupations');
			Route::post('occupations/multi_delete', 'Admin\Occupations@multi_delete');
			Route::resource('specialties', 'Admin\Specialties');
			Route::post('specialties/multi_delete', 'Admin\Specialties@multi_delete');
			Route::resource('countries', 'Admin\Countries');
			Route::post('countries/multi_delete', 'Admin\Countries@multi_delete');
			Route::resource('cities', 'Admin\Cities');
			Route::post('cities/multi_delete', 'Admin\Cities@multi_delete');
			Route::resource('socials', 'Admin\Socials');
			Route::post('socials/multi_delete', 'Admin\Socials@multi_delete');
			Route::resource('pages', 'Admin\Pages');
			Route::post('pages/multi_delete', 'Admin\Pages@multi_delete');
			Route::resource('userlicenses', 'Admin\UserLicenses');
			Route::post('userlicenses/multi_delete', 'Admin\UserLicenses@multi_delete');
			Route::resource('userexperiences', 'Admin\UserExperiences');
			Route::post('userexperiences/multi_delete', 'Admin\UserExperiences@multi_delete');
			Route::resource('userqualifications', 'Admin\UserQualifications');
			Route::post('userqualifications/multi_delete', 'Admin\UserQualifications@multi_delete');
			Route::resource('usercommercials', 'Admin\UserCommercials');
			Route::post('usercommercials/multi_delete', 'Admin\UserCommercials@multi_delete');
			Route::resource('useridentity', 'Admin\UserIdentity');
			Route::resource('subscriptionfees', 'Admin\SubscriptionFees');
			Route::post('subscriptionfees/multi_delete', 'Admin\SubscriptionFees@multi_delete');
			Route::resource('faqs', 'Admin\FAQs');
			Route::post('faqs/multi_delete', 'Admin\FAQs@multi_delete');

			Route::resource('departments', 'Admin\Departments');
			Route::post('departments/check/parent', 'Admin\Departments@check_parent');
			Route::post('departments/get/master', 'Admin\Departments@get_master');
			Route::post('departments/check/available/add/order', 'Admin\Departments@check_department');

			Route::resource('ticketdepartments', 'Admin\TicketDepartments');
			Route::post('ticketdepartments/multi_delete', 'Admin\TicketDepartments@multi_delete');
			Route::resource('tickets', 'Admin\Tickets');
			Route::post('tickets/multi_delete', 'Admin\Tickets@multi_delete');
			Route::post('tickets/upload/multi', 'Admin\Tickets@multi_upload');
			Route::post('tickets/delete/file', 'Admin\Tickets@delete_file');
			Route::post('replay/tickets/{id}', 'Admin\Tickets@replay_comment');
			Route::post('tickets/delete/replay/{id}', 'Admin\Tickets@delete_replay');
			Route::resource('users', 'Admin\Users');
			Route::post('users/multi_delete', 'Admin\Users@multi_delete');
			Route::post('users/get/city/id', 'Admin\Users@get_city_id');
			Route::post('users/get/vendor', 'Admin\Users@get_vendor');
			Route::post('users/get/arbitrators', 'Admin\Users@get_arbitrators');
			Route::post('users/get/all/users', 'Admin\Users@get_users');
			Route::post('users/get/user/info', 'Admin\Users@get_user_info');
			Route::get('users/get/departments', 'Admin\Users@get_users_departments')->name('users.department');

			Route::resource('vendorpackages', 'Admin\VendorPackages');
			Route::post('vendorpackages/multi_delete', 'Admin\VendorPackages@multi_delete');
			Route::resource('packagerequests', 'Admin\PackageRequests');
			Route::post('packagerequests/multi_delete', 'Admin\PackageRequests@multi_delete');
			Route::resource('contactus', 'Admin\ContactUs');
			Route::post('contactus/multi_delete', 'Admin\ContactUs@multi_delete');
			Route::post('contactus/replay/{id}', 'Admin\ContactUs@replay_msg');

			Route::resource('orders', 'Admin\Orders');
			Route::post('orders/multi_delete', 'Admin\Orders@multi_delete');
			Route::post('orders/upload/multi', 'Admin\Orders@multi_upload');
			Route::post('orders/delete/file', 'Admin\Orders@delete_file');
			Route::post('orders/get/city/id', 'Admin\Orders@get_city_id');
			Route::post('orders/get/user/orders', 'Admin\Orders@get_user_orders');
			Route::resource('ordertypes', 'Admin\OrderTypes');
			Route::post('ordertypes/multi_delete', 'Admin\OrderTypes@multi_delete');
			Route::resource('userjobs', 'Admin\UserJobs');
			Route::post('userjobs/multi_delete', 'Admin\UserJobs@multi_delete');
			Route::post('userjobs/get/specialtie/id', 'Admin\UserJobs@get_specialtie_id');
			Route::resource('orderoffers', 'Admin\OrderOffers');
			Route::post('orderoffers/multi_delete', 'Admin\OrderOffers@multi_delete');
			Route::post('orderoffers/upload/multi', 'Admin\OrderOffers@multi_upload');
			Route::post('orderoffers/delete/file', 'Admin\OrderOffers@delete_file');
			Route::resource('orderofferinvoices', 'Admin\OrderOfferInvoices');
			Route::post('orderofferinvoices/multi_delete', 'Admin\OrderOfferInvoices@multi_delete');
			Route::resource('orderarbitrators', 'Admin\OrderArbitrators');
			Route::post('orderarbitrators/multi_delete', 'Admin\OrderArbitrators@multi_delete');
			Route::resource('orderarbitratorinvoices', 'Admin\OrderArbitratorInvoices');
			Route::post('orderarbitratorinvoices/multi_delete', 'Admin\OrderArbitratorInvoices@multi_delete');
			Route::resource('systemmessages', 'Admin\SystemMessages');
			Route::post('systemmessages/multi_delete', 'Admin\SystemMessages@multi_delete');
			Route::resource('balancerecharges', 'Admin\BalanceRecharges');
			Route::post('balancerecharges/multi_delete', 'Admin\BalanceRecharges@multi_delete');
			Route::resource('balancewithdrawals', 'Admin\BalanceWithdrawals');
			Route::post('balancewithdrawals/multi_delete', 'Admin\BalanceWithdrawals@multi_delete');


			Route::resource('supportmessages', 'Admin\SupportMessageController');
			Route::post('supportmessages/multi_delete', 'Admin\SupportMessageController@multi_delete');

			Route::resource('careers', 'Admin\CareerController');
			Route::post('careers/multi_delete', 'Admin\CareerController@multi_delete');

			Route::as('admin.')->group(function () {
				Route::resource('our-services', 'Admin\OurServiceController');
			});
			Route::resource('mail-templates', 'Admin\MailTemplatesController');
			Route::resource('partners', 'Admin\PartnerController');
			Route::post('partners/multi_delete', 'Admin\PartnerController@multi_delete');

			Route::get('careerrequests', 'Admin\CareerRequestController@index');
			Route::get('careerrequests/{id}', 'Admin\CareerRequestController@show');
			Route::post('careerrequests/multi_delete', 'Admin\CareerRequestController@multi_delete');
		});
	}
);
