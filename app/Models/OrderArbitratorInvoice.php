<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

// Auto Models By Baboon Script
// Baboon Maker has been Created And Developed By  [it v 1.6.38]
// Copyright Reserved  [it v 1.6.38]

class OrderArbitratorInvoice extends Model {

	protected $table    = 'order_arbitrator_invoices';
	protected $fillable = [
		'id',
		'admin_id',
		'order_id',
		'arbitrator_id',
		'order_arbitrator_id',
		'vendor_id',
		'user_id',
		'vendor_amount',
		'amount_deduction_from_vendor',
		'amount_deduction_from_user',
		'total_amount',
		'system_tax',
		'remaining_amount_to_arbitrator',
		'inovice_status',
		'user_amount',
		'created_at',
		'updated_at',
	];

	/**
	 * order_id relation method
	 * @param void
	 * @return object data
	 */
	public function order_id() {
		return $this->hasOne(\App\Models\Order::class , 'id', 'order_id');
	}

	/**
	 * order_arbitrator_id relation method
	 * @param void
	 * @return object data
	 */
	public function order_arbitrator_id() {
		return $this->hasOne(\App\Models\OrderArbitrator::class , 'id', 'order_arbitrator_id');
	}

	/**
	 * arbitrator_id relation method
	 * @param void
	 * @return object data
	 */
	public function arbitrator_id() {
		return $this->hasOne(\App\Models\User::class , 'id', 'arbitrator_id');
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
	 * vendor_id relation method
	 * @param void
	 * @return object data
	 */
	public function vendor_id() {
		return $this->hasOne(\App\Models\User::class , 'id', 'vendor_id');
	}

	/**
	 * Static Boot method to delete or update or sort Data
	 * @param void
	 * @return void
	 */
	protected static function boot() {
		parent::boot();
		// if you disable constraints should by run this static method to Delete children data
		static ::deleting(function ($orderarbitratorinvoice) {
				//$orderarbitratorinvoice->order_id()->delete();
				//$orderarbitratorinvoice->order_id()->delete();
				//$orderarbitratorinvoice->order_id()->delete();
				//$orderarbitratorinvoice->order_id()->delete();
				//$orderarbitratorinvoice->order_id()->delete();
			});
	}

}
