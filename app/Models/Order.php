<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

// Auto Models By Baboon Script
// Baboon Maker has been Created And Developed By  [it v 1.6.37]
// Copyright Reserved  [it v 1.6.37]

class Order extends Model {

	protected $table    = 'orders';
	protected $fillable = [
		'id',
		'admin_id',
		'user_id',
		'show_order_data',
		'linked_order',
		'main_order_id',
		'order_title',
		'order_content',
		'order_type_id',
		'department_id',
		'choose_service_provider',
		'country_id',
		'city_id',
		'execution_time',
		'negotiable',
		'amount',
		'refunded',
		'order_status',
		'receive_offers',
		'assigning_arbitration',
		'decisions_status',
		'decisions_refused_reason',
		'reason',
		'created_at',
		'updated_at',
	];

	/**
	 * admin id relation method to get how add this data
	 * @type hasOne
	 * @param void
	 * @return object data
	 */
	public function admin_id() {
		return $this->hasOne(\App\Models\Admin::class , 'id', 'admin_id');
	}

	/**
	 * main_order_id relation method to get how add this data
	 * @type hasOne
	 * @param void
	 * @return object data
	 */
	public function main_order_id() {
		return $this->hasOne(\App\Models\Order::class , 'id', 'main_order_id');
	}

	/**
	 * department_id relation method
	 * @param void
	 * @return object data
	 */
	public function department_id() {
		return $this->hasOne(\App\Models\Department::class , 'id', 'department_id');
	}

	/**
	 * country_id relation method
	 * @param void
	 * @return object data
	 */
	public function country_id() {
		return $this->hasOne(\App\Models\Country::class , 'id', 'country_id');
	}

	/**
	 * city_id relation method
	 * @param void
	 * @return object data
	 */
	public function city_id() {
		return $this->hasOne(\App\Models\City::class , 'id', 'city_id');
	}

	/**
	 * user_id relation method
	 * @param void
	 * @return object data
	 */
	public function user_id() {
		return $this->hasOne(\App\Models\User::class , 'id', 'user_id');
	}
	/**
	 * order_type_id relation method
	 * @param void
	 * @return object data
	 */
	public function order_type_id() {
		return $this->hasOne(\App\Models\OrderType::class , 'id', 'order_type_id');
	}

	/**
	 * order_vendors relation method
	 * @param void
	 * @return object data
	 */
	public function order_vendors() {
		return $this->hasMany(\App\Models\OrderVendors::class , 'order_id', 'id');
	}

	/**
	 * order_case_againsts relation method
	 * @param void
	 * @return object data
	 */
	public function order_case_againsts() {
		return $this->hasMany(\App\Models\OrderCaseAgainst::class , 'order_id', 'id');
	}

	/**
	 * offers relation method
	 * @param void
	 * @return object data
	 */
	public function offers() {
		return $this->hasMany(\App\Models\OrderOffer::class , 'order_id', 'id');
	}

	/**
	 * invoices relation method
	 * @param void
	 * @return object data
	 */
	public function invoices() {
		return $this->hasMany(\App\Models\OrderOfferInvoice::class , 'order_id', 'id');
	}

	/**
	 * arbitrators relation method
	 * @param void
	 * @return object data
	 */
	public function arbitrators() {
		return $this->hasMany(\App\Models\OrderArbitrator::class , 'order_id', 'id');
	}

	/**
	 * arbitrators relation method
	 * @param void
	 * @return object data
	 */
	public function arbitratorInvoices() {
		return $this->hasMany(\App\Models\OrderArbitratorInvoice::class , 'order_id', 'id');
	}

	/**
	 * Static Boot method to delete or update or sort Data
	 * @param void
	 * @return void
	 */
	protected static function boot() {
		parent::boot();
		// if you disable constraints should by run this static method to Delete children data
		static ::deleting(function ($order) {
				//$order->department_id()->delete();
				//$order->department_id()->delete();
				//$order->department_id()->delete();
				//$order->department_id()->delete();
			});
	}

}
