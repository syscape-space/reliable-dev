<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

// Auto Models By Baboon Script
// Baboon Maker has been Created And Developed By  [it v 1.6.37]
// Copyright Reserved  [it v 1.6.37]

class OrderOffer extends Model {

	protected $table    = 'order_offers';
	protected $fillable = [
		'id',
		'admin_id',
		'order_id',
		'vendor_id',
		'vendor_comment',
		'price',
		'execution_time',
		'offer_status',
		'requester_rate',
		'requester_feedback',
		'feedback_requester_status_by_admin',
		'user_offer_objected_status',
		'user_offer_objected_endat',
		'user_offer_rate',
		'user_offer_comment',
		'feedback_user_offer_status_by_admin',
		'requester_objected_status',
		'requester_objected_endat',
		'created_at',
		'updated_at',
		'negotiable',
	];

	/**
	 * vendor_id relation method
	 * @param void
	 * @return object data
	 */
	public function user() {
		return $this->hasOne(User::class , 'id', 'vendor_id')->with(['country']);
	}
// FIXME :: this is really bad
	public function vendor_id() {
		return $this->belongsTo(User::class , 'id');
	}
// NOTE
	public function vendor() {
		return $this->belongsTo(User::class , 'vendor_id','id');
	}
####

	/**
	 * order_id relation method
	 * @param void
	 * @return object data
	 */
	public function order_id() {
		return $this->hasOne(\App\Models\Order::class , 'id', 'order_id');
	}
	public function order() {
		return $this->belongsTo(\App\Models\Order::class , 'order_id','id');
	}
	/**
	 * invoice relation method
	 * @param void
	 * @return object data
	 */
	public function invoice() {
		return $this->hasOne(\App\Models\OrderOfferInvoice::class , 'offer_id', 'id');
	}

	public function getCreatedAtAttribute($value)
	{
		return date("d F Y H:i", strtotime($value));
	}

	/**
	 * Static Boot method to delete or update or sort Data
	 * @param void
	 * @return void
	 */
	protected static function boot() {
		parent::boot();
		// if you disable constraints should by run this static method to Delete children data
		static ::deleting(function ($orderoffer) {
				//$orderoffer->vendor_id()->delete();
			});
	}


}
