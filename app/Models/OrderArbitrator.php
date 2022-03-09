<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

// Auto Models By Baboon Script
// Baboon Maker has been Created And Developed By  [it v 1.6.38]
// Copyright Reserved  [it v 1.6.38]

class OrderArbitrator extends Model {

	protected $table    = 'order_arbitrators';
	protected $fillable = [
		'id',
		'admin_id',
		'order_id',
		'arbitrator_id',
		'notify_arbitrator',
		'arbitrator_amount',
		'arbitrator_add_amount',
		'user_accept_amount',
		'vendor_accept_amount',
		'arbitrator_decision',
		'user_accept_decision',
		'vendor_accept_decision',
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
	 * arbitrator_id relation method
	 * @param void
	 * @return object data
	 */
	public function arbitrator_id() {
		return $this->hasOne(\App\Models\User::class , 'id', 'arbitrator_id');
	}

	/**
	 * Static Boot method to delete or update or sort Data
	 * @param void
	 * @return void
	 */
	protected static function boot() {
		parent::boot();
		// if you disable constraints should by run this static method to Delete children data
		static ::deleting(function ($orderarbitrator) {
			//$orderarbitrator->order_id()->delete();
			//$orderarbitrator->order_id()->delete();
		});
	}

}
