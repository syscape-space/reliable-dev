<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

// Auto Models By Baboon Script
// Baboon Maker has been Created And Developed By  [it v 1.6.37]
// Copyright Reserved  [it v 1.6.37]
class City extends Model {

protected $table    = 'cities';
protected $fillable = [
		'id',
		'admin_id',
        'city_name_ar',
        'city_name_en',
        'country_id',

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
    * country_id relation method
    * @param void
    * @return object data
    */
   public function country_id(){
      return $this->hasOne(\App\Models\Country::class,'id','country_id');
   }

 	/**
    * Static Boot method to delete or update or sort Data
    * @param void
    * @return void
    */
   protected static function boot() {
      parent::boot();
      // if you disable constraints should by run this static method to Delete children data
         static::deleting(function($city) {
			//$city->country_id()->delete();
         });
   }
		
}
