<?php
namespace App\Models;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

// Auto Models By Baboon Script
// Baboon Maker has been Created And Developed By  [it v 1.6.37]
// Copyright Reserved  [it v 1.6.37]
class PackageRequest extends Model {

protected $table    = 'package_requests';
protected $fillable = [
		'id',
		'admin_id',
        'package_id',

        'user_id',

        'request_status',

        'refused_reason',
        'suspended_balance',

        'notes',
        'invoiced',

        'invoice_id',
		'created_at',
		'updated_at',
	];

	/**
    * package_id relation method
    * @param void
    * @return object data
    */
   public function package_id(){
      return $this->hasOne(\App\Models\VendorPackage::class,'id','package_id');
   }
   public function package(){
      return $this->belongsTo(\App\Models\VendorPackage::class,'package_id','id');
   }

	/**
    * user_id relation method
    * @param void
    * @return object data
    */
   public function user_id(){
      return $this->hasOne(\App\Models\User::class,'id','user_id');
   }
   public function getStartAtAttribute(){
       return Carbon::parse($this->updated_at)->format('Y-m-d');
   }
   public function getEndAtAttribute(){
       return Carbon::parse($this->updated_at)->addDays($this->package->duration_package_days)->format('Y-m-d');
   }

 	/**
    * Static Boot method to delete or update or sort Data
    * @param void
    * @return void
    */
   protected static function boot() {
      parent::boot();
      // if you disable constraints should by run this static method to Delete children data
         static::deleting(function($packagerequest) {
			//$packagerequest->package_id()->delete();
			//$packagerequest->package_id()->delete();
         });
   }
		
}
