<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

// Auto Models By Baboon Script
// Baboon Maker has been Created And Developed By  [it v 1.6.37]
// Copyright Reserved  [it v 1.6.37]
class SubscriptionFee extends Model {

protected $table    = 'subscription_fees';
protected $fillable = [
		'id',
		'admin_id',
        'user_id',

        'amount',
        'payment_method',

        'payment_status',

        'refused_reason',
        'electronic_payment_ref',
        'user_note',
        'comment',
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
	   return $this->hasOne(\App\Models\Admin::class, 'id', 'admin_id');
   }
	

	/**
    * user_id relation method
    * @param void
    * @return object data
    */
   public function user_id(){
      return $this->hasOne(\App\Models\User::class,'id','user_id');
   }

 	/**
    * Static Boot method to delete or update or sort Data
    * @param void
    * @return void
    */
   protected static function boot() {
      parent::boot();
      // if you disable constraints should by run this static method to Delete children data
         static::deleting(function($subscriptionfee) {
			//$subscriptionfee->user_id()->delete();
         });
   }
		
}
