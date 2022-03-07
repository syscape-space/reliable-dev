<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

// Auto Models By Baboon Script
// Baboon Maker has been Created And Developed By  [it v 1.6.37]
// Copyright Reserved  [it v 1.6.37]
class VendorPackage extends Model {

protected $table    = 'vendor_packages';
protected $fillable = [
		'id',
		'admin_id',
        'user_id',

        'package_title',
        'package_content',
        'package_status',

        'number_purchases',
        'duration_package_days',
        'package_end_at',
        'package_price',
		'created_at',
		'updated_at',
	];

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
         static::deleting(function($vendorpackage) {
			//$vendorpackage->user_id()->delete();
         });
   }
		
}
