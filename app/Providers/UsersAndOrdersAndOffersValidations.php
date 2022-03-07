<?php
namespace App\Providers;

use App\Models\Order;
use App\Models\OrderOffer;
use App\Models\User;
use Illuminate\Support\ServiceProvider;

class UsersAndOrdersAndOffersValidations extends ServiceProvider {

	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */

	public function boot() {
		// User Validations Offer And Orders //
		$this->app['validator']->extend('OrderHadApprovedOffer', function ($attribute, $value, $parameters) {
				if (!empty($parameters) && count($parameters) > 1) {
					$offer = OrderOffer::where('order_id', $parameters[0])->where('id', '!=', $parameters[1])->where('offer_status', 'approved')->first();
				} else {
					$offer = OrderOffer::where('order_id', $parameters[0])->where('offer_status', 'approved')->first();
				}
				return empty($offer)?true:false;
			}, trans('validation.OrderHadApprovedOffer'));

		$this->app['validator']->extend('UserHadOrder', function ($attribute, $value, $parameters) {
				$hadOrder = Order::where('id', $value)->where('user_id', $parameters[0])->count();
				return $hadOrder > 0?true:false;
			}, trans('validation.UserHadOrder'));

		// check user have balance
		$this->app['validator']->extend('UserHaveBalance', function ($attribute, $value, $parameters) {
				$HaveBalance = User::find($parameters[0]);
				return empty($HaveBalance) || $HaveBalance->current_balance >= $value?true:false;
			}, trans('validation.UserHaveBalance'));

		// User Validations Offer And Orders END //

	}

	/**
	 * Register any application services.
	 *
	 * @return void
	 */

	public function register() {

	}
}
