<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

// Auto Models By Baboon Script
// Baboon Maker has been Created And Developed By  [it v 1.6.37]
// Copyright Reserved  [it v 1.6.37]

class OrderOfferInvoice extends Model {

	protected $table    = 'order_offer_invoices';
	protected $fillable = [
		'id',
		'admin_id',
		'order_id',

		'offer_id',

		'offer_amount',
		'system_tax',
		'remaining_amount_to_vendor',
		'amount_deduction_from_user',

		'added_amount_to_vendor_balance',

		'added_amount_to_vendor_balance_at',
		'inovice_status',

		'system_note',
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
	 * offer_id relation method
	 * @param void
	 * @return object data
	 */
	public function offer_id() {
		return $this->hasOne(\App\Models\OrderOffer::class , 'id', 'offer_id');
	}

	/**
	 * Static Boot method to delete or update or sort Data
	 * @param void
	 * @return void
	 */
	protected static function boot() {
		parent::boot();
		// if you disable constraints should by run this static method to Delete children data
		static ::deleting(function ($orderofferinvoice) {
				//$orderofferinvoice->order_id()->delete();
				//$orderofferinvoice->order_id()->delete();
			});
	}

}
